@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Dados do Usuários</h3>
            @php
                $linkEdit = route('admin.users.edit',['user' => $user->id]);
                $linkCancel = route('admin.users.index');
                $linkDelete = route('admin.users.destroy',['user' => $user->id]);
            @endphp
            {!! Button::warning(Icon::create('Pencil').' Editar')->asLinkTo($linkEdit) !!}
            {!!
                Button::danger(Icon::create('trash').' Excluir')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit()"
                ])
            !!}
            {!! Button::success(Icon::create('arrow-left').' Voltar')->asLinkTo($linkCancel) !!}

            @php
                $formDelete = FormBuilder::plain([
                    'id' => 'form-delete',
                    'url' => $linkDelete,
                    'method' => 'DELETE',
                    'style' => 'display:none'
                ])
            @endphp
            {!! form($formDelete) !!}
            <br/><br/>


            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="row">#</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th class="row">Nome</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th class="row">E-mail</th>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection