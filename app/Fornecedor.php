<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //Incorporar SoftDeletes
    use SoftDeletes;

    //indicar o nome da tabela modelo
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
