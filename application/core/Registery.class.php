<?php

class Registery {

    private $var = array();

    public function __set($name, $value) {
        $this->var[$name] = $value;
    }

    public function __get($name) {
        return $this->var[$name];
    }

}
