<?php
define ("CONF_COMMENT", "#");


class SConfig {
    var $_def_file_name;
    var $_filename;
    var $_SConfig;
    var $_errors;

    function SConfig() {
        global $SConfig;
        if (!isset($SConfig)) $SConfig = $this;
        $SConfig->_init();
    }

    function create() {
        return new SConfig();
    }

    function _init () {
	  global $config;	
 	  $this->_def_file_name = $config[CONF_FILE];
        $filename = $this->_def_file_name;
        $this->_filename = $filename;

        if (!$file = $this->_read_file()) return false;
            $ar = explode("\n", $file);

        foreach ($ar as $item) {
            if (eregi("\[.*\]", $item)) {
                $section = trim(eregi_replace("\[|\]", "", $item));
            } else {
                $key   = trim(substr($item, 0, strpos($item, "=")));
                $value = trim(substr($item, strpos($item, "=")+1));
                if ($key and !eregi("[[:space:]]*".CONF_COMMENT, $item)) {
                    $res[$section][$key] = $value;
                }
            }
        }
        $this->_SConfig = $res;
    }

    function _check_SConfig_loaded () {
        if (isset($this->_SConfig)) {
            return true;
        } else {
            SError::add("Configuration file has not been loaded");
            return false;
        }
    }

    function get ($section, $key) {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }
        if (!$SConfig->_check_SConfig_loaded()) {
            return false;
        }
        return $SConfig->_SConfig[$section][$key];
    }

    function getSection ($section) {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }
        if (!$SConfig->_check_SConfig_loaded()) {
            return false;
        }
        if (!isset($SConfig->_SConfig[$section])) {
            SError::add("Section $section does not exist");
            return false;
        }
        return $SConfig->_SConfig[$section];
    }

    function getAll () {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }
        if (!$SConfig->_check_SConfig_loaded()) {
            return false;
        }
        return $SConfig->_SConfig;
    }

    function checkSection ($section) {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }
        if (!$SConfig->_check_SConfig_loaded()) {
            return false;
        }
        return (isset($SConfig->_SConfig[$section]));
    }

    function set ($section, $key, $value, $create = true, $is_write = true) {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }

        if (!$SConfig->_check_SConfig_loaded()) {
            return false;
        }
        if (!$SConfig->checkSection($section)) {
            SError::add("Invalid section name \"$section\"");
            return false;
        }
        if (isset($this->_SConfig[$section][$key])) {
            $SConfig->_SConfig[$section][$key] = $value;
        } else {
            if ($create) {
                $SConfig->_SConfig[$section][$key] = $value;
            } else {
                SError::add("Unable to create new key");
                return false;
            }
        }
        if ($is_write) {
           $SConfig->_write();
        }
        return true;
    }

    function write ($filename = null) {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }

        if (!$SConfig->_check_SConfig_loaded()) {
            return false;
        }
        if (!$filename) {
            $filename = $SConfig->_filename;
        }

        $out = "";
        foreach ($this->_SConfig as $section => $values) {
            $out .= "[$section]\n";
            foreach ($values as $key => $value) {
                $out .= "$key = $value\n";
            }
        }
        if (is_writable($filename)) {
            if (!$fp = fopen($filename, 'w')) {
                SError::add("Cannot open file ($filename)");
                return false;
            }
            if (!fwrite($fp, $out)) {
                SError::add("Cannot write to file ($filename).");
                return false;
            }
            fclose($fp);
        } else {
            SError::add("The file $filename is not writable.");
            return false;
        }
        return true;
    }

    function _read_file () {
        global $SConfig;
        if (!isset($SConfig)) {
            SConfig::create();
        }

        if (!file_exists($SConfig->_filename)) {
            SError::add("file ".$SConfig->_filename." does not exists.");
            return false;
        }
        $fd = fopen ($SConfig->_filename, "r");
        if (!$fd) {
            SError::add("error opening file for reading");
            return false;
        }

        $buffer = "";
        while (!feof ($fd)) {
            $buffer .= fgets($fd, 4096);
        }
        fclose ($fd);
        $buffer = eregi_replace("\n\n", "\n", $buffer);
        return $buffer;
    }

    function getErrors () {
        return SError::getErrors();
    }
}
?>