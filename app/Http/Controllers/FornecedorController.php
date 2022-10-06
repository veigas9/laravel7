<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
        ->where('site', 'like', '%' . $request->input('site') . '%')
        ->where('uf', 'like', '%' . $request->input('uf') . '%')
        ->where('email', 'like', '%' . $request->input('email') . '%')
        ->get();
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '') {
            //VALIDAÇÃO
            $regras = [
                'nome' => 'required|min:3|max:40' ,
                'site' => 'required',
                'uf' => 'required',
                'email' => 'email'
            ];
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'email' => 'O campo deve conter um email válido '
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
