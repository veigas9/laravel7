<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        $motivo_contatos = MotivoContato::all();

        /**
         * Instanciar o objeto SiteContato e atribuir os valor do formulario para persistir no banco
         */
        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivoContato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();
        */

        //SEGUNDA FORMA DE PERSISTIR OS DADOS DO FORMULÁRIO NO BANCO DE DADOS
        //$contato = new SiteContato();
        //$contato->fill($request->all());
        //$contato->save();



        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        //VALIDAÇÃO DOS DADOS DO FORMULÁRIO
        $request->validate(
            [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:400'
            ],
            [
                'nome.required' => 'O campo nome precisa ser preenchido',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximmo 40 caracteres',
                'telefone.required' => 'O campo telefone precisa ser preenchido',
                'email.email' => 'O campo email não é válido',
                'motivo_contatos_id.required' => 'O campo motivo contato precisa ser preenchido',
                'mensagem.required' => 'O campo motivo mensagem precisa ser preenchido'
            ]
        );
        //TERCEIRA FORMA DE PERSISTIR OS DADOS DO FORMULÁRIO
        SiteContato::create($request->all());
        return redirect()->route('site.index');
        //$contato->save();
    }
}
