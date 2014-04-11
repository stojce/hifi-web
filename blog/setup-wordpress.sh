#!/bin/bash

FILE=wp-config.php-default
CURRENT_PATH=`pwd`
USERNAME=`whoami`
BLOG_DIRECTORY=`dirname "$CURRENT_PATH"`
BLOG_DIRECTORY=${BLOG_DIRECTORY##*/}

DB_HOST=dev-db-master.highfidelity.io
DB_USER=dev_hifiio
DB_NAME=dev_highfidelityio
DB_PASS=unsecure

WP_URL=http://dev.highfidelity.io/~$USERNAME/$BLOG_DIRECTORY/blog/
WP_SITE_DEFINE="define('WP_SITEURL', '${WP_URL}');"
WP_HOME_DEFINE="define('WP_HOME', '${WP_URL}');"
WP_NAVBAR_VIEW_DEFINE="define('WP_NAVBAR_VIEW', dirname(__FILE__) . '/../views/layout/navbar.php');"
WP_NAVBAR_CSS_DEFINE="define('WP_NAVBAR_CSS', '${WP_URL}../css/navbar.css');"
WP_FOOTER_VIEW_DEFINE="define('WP_FOOTER_VIEW', dirname(__FILE__) . '/../views/layout/footer.php');"
WP_FOOTER_CSS_DEFINE="define('WP_FOOTER_CSS', '${WP_URL}../css/footer.css');"

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
echo $WP_SITE_DEFINE >> wp-config.php
echo $WP_HOME_DEFINE >> wp-config.php
echo $WP_NAVBAR_VIEW_DEFINE >> wp-config.php
echo $WP_NAVBAR_CSS_DEFINE >> wp-config.php
echo $WP_FOOTER_VIEW_DEFINE >> wp-config.php
echo $WP_FOOTER_CSS_DEFINE >> wp-config.php
mkdir wp-content/uploads
chmod 777 wp-content/uploads
cp wp-content/plugins/tantan-s3-cloudfront/wordpress-s3/config.php-default wp-content/plugins/tantan-s3-cloudfront/wordpress-s3/config.php
cp wp-includes/js/tinymce/plugins/spellchecker/config.php-default wp-includes/js/tinymce/plugins/spellchecker/config.php
cp wp-content/plugins/akismet/.htaccess-default wp-content/plugins/akismet/.htaccess

if [ $UPDATE_DB -eq 1 ]
then
    mysql -h $DB_HOST -u $DB_USER -p$DB_PASS -e "UPDATE wp_options SET option_value='$WP_URL' WHERE option_name='siteurl';" $DB_NAME
fi