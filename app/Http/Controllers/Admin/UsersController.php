<?php

namespace GES\Http\Controllers\Admin;

use GES\Forms\UserForm;
use GES\Models\User;
use Illuminate\Http\Request;
use GES\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.store'),
            'method' => 'POST'
        ]);
        return view('admin.users.create',compact('form'));
    }

    public function store(Request $request)
    {
        $form = \FormBuilder::create(UserForm::class);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $password = str_random(6);
        $data['password'] = $password;

        User::create($data);

        return redirect()->route('admin.users.index');

    }

    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GES\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.update',['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user
        ]);
        return view('admin.users.edit',compact('form'));
    }

    public function update(User $user)
    {
        $form = \FormBuilder::create(UserForm::class, [
            'data' => [
                'id' => $user->id
            ]
        ]);

        if (!$form->isValid()){
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GES\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
