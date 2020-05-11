<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class GrapesFormField extends AbstractHandler
{
    protected $codename = 'grapesJS';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.grapesJS', [
            'row'             => $row,
            'options'         => $options,
            'dataType'        => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}
