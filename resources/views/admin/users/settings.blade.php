@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @php
                $linkCancel = route('admin.users.index');
            @endphp
            <h3>Editar Perfil do Usuário</h3>
            {!!
                form($form->add('insert','submit',[
                    'attr' => ['class' => 'btn btn-primary btn-block'],
                    'label' => Icon::create('floppy-disk').' Gravar'
                ]))
            !!}

            {!! Button::warning(Icon::create('arrow-left').' Voltar')->asLinkTo($linkCancel) !!}

        </div>
    </div>
@endsection