<?php

namespace GES\Http\Controllers\Admin;

use GES\Forms\UserProfileForm;
use Illuminate\Http\Request;
use GES\Http\Controllers\Controller;
use GES\Models\User;

class UserProfileController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserProfileForm::class, [
            'url' => route('admin.users.profile.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user->profile,
            'data' => ['user' => $user]
        ]);
        return view('admin.users.profile.edit', compact('form'));
    }


    public function update(User $user)
    {
        $form = \FormBuilder::create(UserProfileForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErros())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $user->profile->address?$user->profile->update($data):$user->profile->create($data);

        session()->flash('message', 'Dados cadastrados com sucesso');
        return redirect()->route('admin.users.profile.update', ['user' => $user->id]);
    }


    public function destroy($id)
    {
        //
    }
}
