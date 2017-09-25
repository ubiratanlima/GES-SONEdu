@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @php
                $linkCancel = route('admin.users.index');
            @endphp
            <h3>Editar Usuário</h3>
            {!! form($form->add('Edit','submit',[
                'attr' => ['class' => 'btn btn-success btn-block'],
                'label' => Icon::create('floppy-disk').' Gravar'
            ])) !!}

            {!!
                Button::warning(Icon::create('arrow-left').' Voltar')
                      ->asLinkTo($linkCancel)
            !!}

        </div>
    </div>
@endsection