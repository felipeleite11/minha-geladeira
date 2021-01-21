<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Util\Notification;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('login', $request->login)->first();

        if(!isset($user)) {
            return redirect('/session')->with('notification', new Notification('Usuário não existe.', 'danger'));
        }

        if($user->password == $request->password) {
            $request->session()->put('login', $user->login);

            return redirect('product');
        }

        return redirect('/session')->with('notification', new Notification('Erro na autenticação.', 'danger'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->flush();

        return redirect('/session');
    }
}
