<?php

//namespace MySplEnum;

abstract class MySplEnum {
    private $value = null;

    public function __construct($initial_value = null) {
        if (isset($initial_value)) {
            if (!in_array(self::getConstList(true))) {
                throw new UnexpectedValueException("Value not a const in enum " . get_called_class());
            }
            $this->value = $initial_value;
        } else {
            $refl = new ReflectionClass(get_called_class());
            if ($refl->hasConstant("__default")) {
        //    if (isset(self::__default)) {
                $this->value = self::__default;
            } 
        }
    }
    public static function getConstList($include_default = false) {
        $refl = new ReflectionClass(get_called_class());
        $consts = $refl->getConstants();
        if (!$include_default) {
            unset($consts["__default"]);
        }
        return $consts;
    }
    public function __toString() {
        return (string) $this->value;
    }
}

//class_alias("MySplEnum", "SplEnum");