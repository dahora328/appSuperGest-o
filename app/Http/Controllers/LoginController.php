<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';

        if ($request->get('erro') == 1){
            $erro = 'Usuário e ou senha não existe';
        }

        if ($request->get('erro') == 2){
            $erro = 'Necessário ter acesso está logado para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }


    public function authenticate(Request $request)
    {
        $roules = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedack = [
            'usuario.email' => 'O campo usuário (email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];


        $request->validate($roules, $feedack);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo '<br>';

        $user = new User();

        $registerUser = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($registerUser->name)){
           session_start();
           $_SESSION['nome'] = $registerUser->name;
           $_SESSION['email'] = $registerUser->email;

           return redirect()->route('app.home', ['erro' => 2]);
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function exit()
    {
        session_destroy();
        return redirect()->route('site.home');
    }
}
