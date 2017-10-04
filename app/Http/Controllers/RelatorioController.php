<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relatorio;

class RelatorioController extends Controller
{
    
 	public function enviar($id)
 	{
 		$dados = Relatorio::find($id);
 		return view("relatorio.enviar")->with('dados', $dados);
 	}  	

 	public function salvar(Request $request, $id)
 	{
 		$re = new Relatorio();
 		$re->acao = $id;
 		$re->autor = Auth::guard('servidor')->user()->id;
 		$re->descricao = $request->all()['descricao'];
 		$re->save();
 		
 		return back();
 	}

 	public function editar($id)
 	{
 		$dados = Relatorio::find($id);
 		return view("relatorio.editar")->with('dados', $dados);
 	}

 	public function atualizar(Request $request, $id)
 	{
 		$re = Relatorio::find($id);
 		$re->descricao = $request()->all()['descricao'];
 		$re->save();

 		return back();
 	}

 	public function remover($id)
 	{
 		$re = Relatorio::find($id);
 		$re->destroy();

 		return back();
 	}
}
