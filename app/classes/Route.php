<?php
class Route
{
    private $path;
    private $controller;
    private $action;
    private $method;
    
    public function __construct($path, $controller, $action, $method = "GET")
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
        $this->method = $method;
    }
    
    public function __get($property)
    {
        return $this->$property;
    }
}