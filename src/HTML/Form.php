<?php

namespace App\HTML;

class Form
{

    protected $data;
    public $surround = 'div';

    public function __construct($data = array())
    {
        $this->data = $data;
    }

    protected function surround($html)
    {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    protected function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($type, $name, $phld)
    {
        return $this->surround(
            '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" placeholder="' . $phld . '">'
        );
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
}
