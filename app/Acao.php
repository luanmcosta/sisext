<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    protected $table = "acoes";
    protected $fillable = ['id', 'autor', 'nome', 'descricao', 'data_inicio', 'data_fim', 'estado'];
	protected $hidden = [];
}
