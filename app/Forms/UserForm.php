<?php

namespace GES\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = $this->getData('id');
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'rules' => 'required|max:100'

            ])
            ->add('email', 'email',[
                'email' => 'E-mail',
                'rules' => "required|max:255|unique:users,email,{$id}"
            ]);
    }
}
