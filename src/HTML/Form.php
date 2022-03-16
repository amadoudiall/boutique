<?php

namespace App\HTML;

class Form
{

    protected $data;
    protected $file = array();
    public $surround = 'div';

    public function __construct($data = array(), $file = null)
    {
        $this->data = $data;
        $this->file = $file;
    }

    protected function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    protected function getDataValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    protected function getFileValue($index)
    {
        return isset($this->file[$index]['name']) ? $this->file[$index] : null;
    }

    public function input($type, $name, $phld)
    {
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getDataValue($name) . '" placeholder="' . $phld . '">'
        );
    }

    public function inputFile($name, $phld)
    {
        return '<div class="form-file"><input type="file" name="' . $name . '" id="' . $name . '" accept="image/png, image/jpeg"><label for="' . $name . '" class="btn primary rounded-1 shadow-1">' . $phld . '</label><div class="form-file-path"></div></div>';
    }

    public function inputPassword($name, $phld)
    {
        return $this->surround(
            '<input type="password" name="' . $name . '" placeholder="' . $phld . '">'
        );
    }

    public function submit($name, $value)
    {
        echo '<button class="btn btn-primary" type="submit" name="' . $name . '">' . $value . '</button>';
    }

    public function textarea($name, $placehold){
        return $this->surround(
            '<textarea class="form-control" name="'. $name .'" id="" cols="15" rows="5" placeholder="'. $placehold .'" value="' . $this->getDataValue($name) .'"></textarea>'
        );
    }
}
