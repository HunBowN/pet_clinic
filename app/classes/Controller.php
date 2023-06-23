<?php
class Controller
{
    protected $layout = 'default';
    
    protected function render($view, $data = []) {
        return new Page($this->layout, $this->title, $view, $data);
    }
    protected function jsonResponse( $data = []) {
        return new Page('json', '', null, $data);
    }
}

