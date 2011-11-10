<?php

namespace Openyard;

class ProductSearch
{
    private $phrases;
    private $tags = array();
    private $attributes = array();
    private $categoryid;
    private $categoryname;


    function __construct() {}

    public function addAttributes($attributes)
    {
        $this->attributes[] = $attributes;
    }

    public function removeAttributes($attributes)
    {
        $this->attributes = $attributes;
    }
    public function setPhrases($phrases)
    {
        $this->phrases = $phrases;
    }

    public function addTags($tags)
    {
        $this->tags[] = $tags;
    }

    public function hello()
    {
        return 'world';
    }

    public function setCategoryId($categoryid)
    {
        $this->categoryid = $categoryid;
    }

    public function getCategoryId()
    {
        return $this->categoryid;
    }

    public function setCategoryName($categoryname)
    {
        $this->categoryname = $categoryname;
    }

    public function getCategoryName()
    {
        return $this->categoryname;
    }

}