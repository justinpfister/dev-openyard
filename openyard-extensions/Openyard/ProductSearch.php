<?php

namespace Openyard;

class ProductSearch
{
    private $phrases;
    private $tags;
    private $attributes;


    function __construct() {}

    public function addAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function removeAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
    public function setPhrases($phrases)
    {
        $this->phrases = $phrases;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function hello()
    {
        return 'world';
    }

}