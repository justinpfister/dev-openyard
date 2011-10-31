<?php

namespace Openyard;

/**
 * Lets start by saying hello!
 *
 * @author justin.pfister
 */
class ProductProvider {

    private $size;
    private $color;

    public function hello() {
        return "world";
    }

    public function setSize($size) {
        $this->size = $size;
        return true;
    }

    public function getSize() {
        return $this->size;
    }

}
