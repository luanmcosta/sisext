<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    
	protected $fillable = ['autor', 'acao', 'descricao'];

	public function autor(){
		return $this->belongsTo('App\Servidor');
	}

	public function acao(){
		return $this->belongsTo('App\Acao');
	}

}
