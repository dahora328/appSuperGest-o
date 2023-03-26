<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index() {
        return view('app.provider.index');
    }

    public function list(Request $request)
    {
        $providers = Provider::with('products')->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(6);

        return view('app.provider.list', ['providers' => $providers, 'request' => $request->all()]);
    }

    public function add(Request $request)
    {
        $msg = '';
        //inclusão
        if ($request->input('_token') != '' && $request->input('id') == ''){
            $roules = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedack = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínino 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínino 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($roules, $feedack);

            $provider = new Provider();
            $provider->create($request->all());

            $msg = 'Cadastro realizado';
        }

        //edição
        if ($request->input('_token') != '' && $request->input('id') != ''){
            $provider = Provider::find($request->input('id'));
            $update = $provider->update($request->all());
            if($update){
                $msg = 'Update realizado com sucesso';
            }else{
                $msg = 'Update não foi realizado';
            }

            return redirect()->route('app.provider.edit', ['id' => $request->input('id') ,'msg' => $msg]);
        }

        return view('app.provider.add', ['msg' => $msg]);
    }

    public function edit($id, $msg = '')
    {
        $provider = Provider::find($id);
        return view('app.provider.add', ['provider' => $provider, 'msg' => $msg]);
    }

    public function delete($id)
    {
        Provider::find($id)->delete();

        return redirect()->route('app.provider');
    }
}
