<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

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
        $contato = new SiteContato();
        $contato->fill($request->all());
        $contato->save();



        return view('site.contato', ['titulo' => 'Contato']);
    }
}
