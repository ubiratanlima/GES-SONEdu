@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Usuários</h3>
            {!! Button::success(Icon::create('plus').' Adicionar Usuário')->asLinkTo(route('admin.users.create')) !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($users->items())
                ->striped()
                ->callback('Ações', function($field,$model){
                    $linkEdit = route('admin.users.edit',['user' => $model->id]);
                    $linkShow = route('admin.users.show',['user' => $model->id]);
                    $linkDestroy = route('admin.users.destroy',['user' => $model->id]);
                    return  Button::warning(Icon::create('pencil'))->asLinkTo($linkEdit).' '.
                            Button::primary(Icon::create('eye-open'))->asLinkTo($linkShow).' '.
                            Button::danger(Icon::create('trash'))->asLinkTo($linkDestroy);
                })
            !!}
        </div>
        {!! $users->links() !!}
    </div>
@endsection