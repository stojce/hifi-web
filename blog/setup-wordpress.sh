#!/bin/bash

FILE=wp-config.php-default
CURRENT_PATH=`pwd`
USERNAME=`whoami`
BLOG_DIRECTORY=`dirname "$CURRENT_PATH"`
BLOG_DIRECTORY=${BLOG_DIRECTORY##*/}

DB_HOST=${HIFIWEB_WP_DB_HOST:="dev-db-master.highfidelity.io"}
DB_USER=${HIFIWEB_WP_DB_USER:="dev_hifiio"}
DB_NAME=${HIFIWEB_WP_DB_NAME:="dev_highfidelityio"}
DB_PASS=${HIFIWEB_WP_DB_PASS:="unsecure"}

WP_SERVER_NAME=${HIFIWEB_WP_SERVER_NAME:="dev.highfidelity.io"}

WP_URL=https://${WP_SERVER_NAME}/~$USERNAME/$BLOG_DIRECTORY/blog/

UPDATE_DB=0

while test $# -gt 0; do
    case "$1" in
        -h|--help )
            echo "$0 - Setup up a (dev) blog on your HighFidelity sandbox"
            echo " "
            echo "Options:"
            echo " -h, --help           Show quick help"
            echo " -db, --updatedb      Update the siteurl on dev database with the current blog's url"
            echo " "
            exit 0
            ;;
        -db|--updatedb )
            UPDATE_DB=1
            shift
            ;;
        *)
            break
            ;;
    esac
done

echo $WP_URL

if [ ! -f $FILE ];
then
    echo $FILE does not exist in $CURRENT_PATH
    exit -1
fi

cp wp-config.php-default wp-config.php
cp db-config.php-default db-config.php
echo "define('DB_NAME', '${DB_NAME}');"  >> wp-config.php
echo "define('DB_USER', '${DB_USER}');"  >> wp-config.php
echo "define('DB_PASSWORD', '${DB_PASS}');"  >> wp-config.php
echo "define('DB_HOST', '${DB_HOST}');"  >> wp-config.php
echo "define('WP_SITEURL', '${WP_URL}');" >> wp-config.php
echo "define('WP_HOME', '${WP_URL}');" >> wp-config.php
echo "define('WP_NAVBAR_VIEW', dirname(__FILE__) . '/../views/layout/navbar.php');" >> wp-config.php
echo "define('WP_NAVBAR_CSS', '${WP_URL}../css/navbar.css');" >> wp-config.php
echo "define('WP_FOOTER_VIEW', dirname(__FILE__) . '/../views/layout/footer.php');" >> wp-config.php
echo "define('WP_FOOTER_CSS', '${WP_URL}../css/footer.css');" >> wp-config.php
echo "require_once(ABSPATH . 'wp-settings.php');" >> wp-config.php

mkdir wp-content/uploads
chmod 777 wp-content/uploads
cp wp-content/plugins/tantan-s3-cloudfront/wordpress-s3/config.php-default wp-content/plugins/tantan-s3-cloudfront/wordpress-s3/config.php
cp wp-includes/js/tinymce/plugins/spellchecker/config.php-default wp-includes/js/tinymce/plugins/spellchecker/config.php
cp wp-content/plugins/akismet/.htaccess-default wp-content/plugins/akismet/.htaccess

if [ $UPDATE_DB -eq 1 ]
then
    mysql -h $DB_HOST -u $DB_USER -p$DB_PASS -e "UPDATE wp_options SET option_value='$WP_URL' WHERE option_name='siteurl';" $DB_NAME
fi