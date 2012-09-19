<?php


class SError {
    var $_errors;

    function create() {
        return new SError();
    }

    function add($error) {
        global $SError;
        if (!isset($SError)) {
            SError::create();
        }
        $SError->_errors[] = $error;
    }

    function getErrors() {
        global $SError;
        if (!isset($SError)) {
            SError::create();
        }
        return $SError->_errors;
    }

    function getLastError() {
        global $SError;
        if (!isset($SError)) {
            SError::create();
        }
        return $SError->_errors[count($SError->_errors)-1];
    }

    function clear() {
        global $SError;
        if (!isset($SError)) {
            SError::create();
        }
        $SError->_errors = array();
        return false;
    }
}

?>