<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('comments', 'textarea');
    }
}
