<?php

namespace GES\Forms;

use Kris\LaravelFormBuilder\Form;

class UserProfileForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('address', 'text',[
                'label' => 'Endereço',
                'rules' => 'required|max:255'
            ])
            ->add('cep', 'text',[
                'label' => 'CEP',
                'rules' => 'max:8'
            ])
            ->add('numero', 'text',[
                'label' => 'Nº',
                'rules' => 'required|max:7'
            ])
            ->add('complemento', 'text',[
                'label' => 'Complemento',
                'rules' => 'max:255'
            ])
            ->add('bairro', 'text',[
                'label' => 'Bairro',
                'rules' => 'required|max:255'
            ])
            ->add('cidade', 'text',[
                'label' => 'Cidade',
                'rules' => 'required|max:255'
            ])
            ->add('uf', 'text',[
                'label' => 'Estado',
                'rules' => 'required|max:2'
            ]);
    }
}
