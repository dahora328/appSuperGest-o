<?php

namespace App\Http\Controllers;

use App\Models\ContactReason;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $request) {

        $motivo_contatos = ContactReason::all();

        return view('site.contact', ['motivo_contatos' => $motivo_contatos]);
    }

    public function save(Request $request){
        $rules =  [
            'nome' => 'required|min:3|max:40|unique',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',

            'email' => 'O email informado não é valido',

            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',

            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($rules, $feedback);
        Contact::create($request->all());
        return redirect()->route('site.home');
    }
}
