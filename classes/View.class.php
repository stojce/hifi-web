<?php
/**
 * This class should do the messaging part between logic and views.
 * Common used values as header/footer location or page title should 
 * use a public static variable, and view-specific values should be 
 * stored through read/write methods
 * 
 *  
 */
class View {
    public static $header = 'layout/header';
    public static $footer = 'layout/footer';
    public static $navbar = 'layout/navbar';
    public static $title = 'High Fidelity';
    
    protected static $stylesheets = array(
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/common.css',
        'css/MyFontsWebfontsKit.css'
    );
    protected static $scripts = array(
        'js/hifi.js',
        '//use.typekit.net/xyu1mnf.js',
        'js/jquery-1.9.0.min.js',
        'js/bootstrap.min.js',
        'js/mustache.js',
        'js/utils.js'
    );
    protected static $values = array();
    
    /**
     * Read a value added from controller/logic side, 
     * should be called from the view side
     */
    public static function read($key, $default = null) {
        if (! array_key_exists($key, self::$values)) {
            return $default;
        }
        return self::$values[$key];
    }

    /**
     * Add/overwrites a value to be read in the view, 
     * should be called from a controller/logic side
     */
    public static function write($key, $value) {
        $ret = array_key_exists($key, self::$values) ? true : 1;
        try {
            self::$values[$key] = $value;
        } catch (Exception $e) {
            $ret = false;
        }
        return $ret;
    }
    
    /**
     * Add a css stylesheet to be used in the view
     */
    public static function addStyle($path) {
        if (array_key_exists($path, self::$stylesheets)) {
            return false;
        }
        self::$stylesheets[] = $path;
        return true;
    }

    /**
     * Removes an existing stylesheet from the view
     */
    public static function removeStyle($path) {
        if (!array_key_exists($path, self::$stylesheets)) {
            return false;
        }
        unset(self::$stylesheets[$path]);
        return true;
    }

    /**
     * Add a script to be ran in the view side
     */
    public static function addScript($path) {
        if (array_key_exists($path, self::$scripts)) {
            return false;
        }
        self::$scripts[] = $path;
        return true;
    }

    /**
     * Removes an existing script from the view
     */
    public static function removeScript($path) {
        if (!array_key_exists($path, self::$scripts)) {
            return false;
        }
        unset(self::$scripts[$path]);
        return true;
    }

    /**
     * Outputs scripts references to the view
     */
    public static function includeScripts() {
        foreach (self::$scripts as $path) {
            printf('<script type="text/javascript" src="%s"></script>', $path);
        }
    }
    
    /**
     * Outputs stylesheets references to the view
     */
    public static function includeStyles() {
        foreach (self::$stylesheets as $path) {
            printf('<link rel="stylesheet" href="%s">', $path);
        }
        if (strlen(self::$navbar) > 0) {
            printf('<link rel="stylesheet" href="css/navbar.css">', $path);
        }
        if (strlen(self::$footer) > 0) {
            printf('<link rel="stylesheet" href="css/footer.css">', $path);
        }
    }
    
    /**
     * Includes the content/php logic of the header file
     */
    public static function renderHeader() {
        if (! file_exists(VIEWS_DIR . self::$header . '.php')) {
            return false;
        }
        self::renderView(self::$header);
    }
    
    /**
     * Includes the content/php logic of the navbar file
     */
    public static function renderNavBar() {
        if (! file_exists(VIEWS_DIR . self::$navbar . '.php')) {
            return false;
        }
        self::renderView(self::$navbar);
    }
    
    /**
     * Includes the content/php logic of a specific view
     */
    public static function renderView($viewName) {
        $filename = $viewName . '.php';
        require(VIEWS_DIR . $filename);
    }
    
    /**
     * Includes the content/php logic of the footer file
     */
    public static function renderFooter() {
        if (! file_exists(VIEWS_DIR . self::$footer . '.php')) {
            return false;
        }
        self::renderView(self::$footer);
    }
    
    /**
     * Wrapper to renderHeader(), renderView($viewName) and renderFooter()
     */
    public static function renderCommonLayout($viewName) {
        self::renderHeader(); 
        self::renderView($viewName);
        self::renderFooter();
    }
}
