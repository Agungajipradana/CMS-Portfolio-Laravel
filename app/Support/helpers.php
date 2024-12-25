<?php

if (!function_exists('isInvalidError')) {
    function isInvalidError($fieldName, $errorBag = null)
    {
        $errors = session()->get('errors');

        if ($errors && $errors->has($fieldName)) {
            if ($errorBag) {
                return $errors->getBag($errorBag)->has($fieldName);
            }
            return true;
        }

        return false;
    }
}
