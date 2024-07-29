<?php

namespace Fw\Core;

class Page
{

    // private static ?self $instance = null;
    private array $head = [
        'js' => [],
        'css' => [],
        'str' => [],
    ];

    private array $properties = [];    

    private function __construct()
    {

    }

    public static function get() : self
    {
        return new self;
    }


    public function addJs(string $src) : void
    {
        if (!in_array($src, $this->head['js'])) {
            $this->head['js'][] = $src;
        }

    }

    public function addCss(string $link) : void
    {
        if (!in_array($link, $this->head['css'])) {
            $this->head['css'][] = $link;
        }
    }

    public function addString(string $str) : void
    {
        $this->head['str'][] = $str;
    }

    public function setProperty(string $id, mixed $value) : void
    {
        $this->properties[$id] = $value;
    }

    public function getProperty(string $id)
    {
        return $this->properties[$id] ?? '';
    }

    public function showProperty(string $id) : void
    {
        echo "#FW_PAGE_PROPERTY_{$id}#";
    }

    public function getAllReplace() : array
    {
        $allReplace = [];
        foreach ($this->properties as $key=>$property) {
            $allReplace["#FW_PAGE_PROPERTY_{$key}#"] = $property;
        }
        return $allReplace;
    }

    public function showHead() : void
    {
        echo "#FW_PAGE_MACRO_HEAD#";
    }

    public function getHead() : string
    {
        $content = '';
        foreach ($this->head as $key=>$el) {
            switch ($key) {
                case 'js':
                    foreach ($el as $js) {
                        $content .= "<script src=$js></script>";
                    }                    
                    break;
                case 'css':
                    foreach ($el as $css) {
                        $content .= "<link rel='stylesheet' href=$css>";
                    }
                    break;
                case 'str':
                    foreach ($el as $str) {
                        $content .= $str;
                    } 
                    break;                
            }
        }
        return $content;
      }

}