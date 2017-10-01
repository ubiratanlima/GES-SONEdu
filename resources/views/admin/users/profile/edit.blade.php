@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar Dados do Usuário</h3>
            {!! form($form->add('salve','submit',[
                'attr' => ['class' => 'btn btn-primary btn-block'],
                'label' => Icon::create('floppy-disk').' Gravar'
            ])) !!}

        </div>
    </div>
@endsection