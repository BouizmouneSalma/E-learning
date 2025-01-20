<?php

class Cours_Tags
{
    private $courseId;
    private $tags;  
    
    public function __construct($courseId, $tags)
    {
        $this->courseId = $courseId;
        $this->tags = $tags;
    }

    
}