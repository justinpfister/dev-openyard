<?php

namespace Openyard;

class ProductSearch
{
    private $phrases;
    private $tags;
    private $attributes;
    private $category;


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

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }


    public function hello()
    {
        return 'world';
    }

}