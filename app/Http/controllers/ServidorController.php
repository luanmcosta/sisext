<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servidor;

class ServidorController extends Controller
{
    private $servidorObj;
	public function __Construct(servidor $serv){
		$this->servidorObj = $serv;
	}
	
	public function index(){		
		echo "PAGINA INICIAL";
	}
	
	public function show(){
		$serv = $this->servidorObj->all();
		$servidores = servidor::all();
		return view('servidor.listar',compact('serv'));
	}
	
	public function create(){
		return view('servidor.InserirServidor');
	}
	
	public function store(Request $r){
		$serv = new servidor;
		
		$serv->nome = $r->input('nome');
		$serv->senha = $r->input('senha');
		
		
		$resp = $serv->save();
		if($resp){
			return redirect()->route('servidor.index');
		}
		return "Erro ao inserir";
	}
	
	public function edit($id){
		$serv = servidor::find($id);
		return view('servidor.AtualizarServidor',compact('serv'));
	}
	
	public function update(Request $r, $id){
		$serv = servidor::find($id);
		
		$serv->nome = $r->input('nome');
		$serv->cargo = $r->input('cargo');
		$serv->telefone = $r->input('telefone');
		$serv->email = $r->input('email');
		$serv->senha = $r->input('senha');
		$serv->SIAP = $r->input('siap');
		
		$resp = $serv->save();
		
		if($resp){
			return redirect()->route('servidor.index');
		}
		else{
			echo "Erro ao tentar atualizar!";
		}
	}
	
	public function destroy($id){
		$serv = servidor::find($id);
		$result = $serv->delete();
		
		if($result){
			return redirect()->route('servidor.index');
		}
		else{
			echo "Não foi possível excluir!";
		}
	}
}
