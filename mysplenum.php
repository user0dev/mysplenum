<?php

//namespace MySplEnum;

class SplEnum {
    private $value = null;

    public function __construct($initial_value = null) {
        if (isset($initial_value)) {
            $this->value = $initial_value;
        } else {
            //$refl = new ReflectionClass(get_called_class());
            if ($refl->hasConstant("__default")) {
//            if (isset($this->__default)) {
                $this->value = $refl->getConstant("__default");
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




class Mounth extends SplEnum {
    const __default = Mounth::January;
    const January = "0";
    const February = "1";
    const Match = "2";
}

$test = new Mounth();//Mounth::February);


var_dump($test == Mounth::January);
var_dump($test == Mounth::February);

switch ($test) {
case Mounth::January:
    var_dump("January");
    break;
case Mounth::February:
    var_dump("February");
    break;
}