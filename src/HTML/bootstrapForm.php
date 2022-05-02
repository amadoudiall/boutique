<?php

namespace App\HTML;

class bootstrapForm extends Form
{

    protected function surround($html)
    {
        return "<div class=\"form-field mb-3\">{$html}</div>";
    }
    
     protected function checkboxSurround($html)
    {
        return "<div class=\"form-field form-inline mb-3\">{$html}</div>";
    }

    public function input($type, $name, $phld)
    {
        return $this->surround(
            '<br><input class="form-control" type="' . $type . '" name="' . $name . '" id="' . $name . '" value="' . $this->getDataValue($name) . '"><label for="' . $name . '" class="mb-2" >' . $phld . '</label>'
        );
    }

    public function inputPassword($name, $phld)
    {
        return $this->surround(
            '<input class="form-control" type="password" name="' . $name . '" placeholder="' . $phld . '">'
        );
    }
    
    public function inputCheckbox($name, $id, $label)
    {
        return $this->surround('<label class="form-check"><input class="form-check" type="checkbox" name="' . $name . '" id="' . $id . '" value="' . $this->getDataValue($name) . '"><span> '. $label .'</span></label>'
        );
    }
    
    public function inputCheckboxOption($name, $id, $label)
    {
        return '<label class="form-check"><input class="form-check" type="checkbox" name="' . $name . '" id="' . $id . '" value="' . $this->getDataValue($name) . '"><span> '. $label .'</span></label>';
    }
}
