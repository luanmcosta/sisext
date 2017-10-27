<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\servidor;
use App\Acao;
use Auth;

class ServidorController extends Controller
{
    private $servidorObj;
	public function __Construct(servidor $serv){
		$this->servidorObj = $serv;
	}
	
	public function index(){	
		return view('servidor.dashUsuario');
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
		$serv->telefone = $r->input('telefone');
		$serv->cargo = $r->input('cargo');
		$serv->siap = $r->input('siap');
		$serv->email = $r->input('email');
		$serv->senha = Hash::make($r->input('senha'));
		
		
		$resp = $serv->save();
		if($resp){
			return redirect()->route('admin.servidor.index');
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
		if ($r->input('senha')!=''){
			$serv->senha = Hash::make($r->input('senha'));
		}
		$serv->SIAP = $r->input('siap');
		
		$resp = $serv->save();
		
		if($resp){
			return redirect()->route('admin.servidor.index');
		}
		else{
			echo "Erro ao tentar atualizar!";
		}
	}
	
	public function destroy($id){
		$serv = servidor::find($id);
		$result = $serv->delete();
		
		if($result){
			return redirect()->route('admin.servidor.index');
		}
		else{
			echo "Não foi possível excluir!";
		}
	}


	/////////////////////////
	public function listarAcoes(){
      $acoes = Acao::where('autor', Auth::guard('servidor')->user()->id)->get();
      return view('servidor.dashAcao')->with('acoes', $acoes);
    }

    public function adicionarAcao(Request $request){
		$r = \App::call('App\Http\Controllers\AcaoController@store', [$request]);
		if($r)
			return redirect('/servidor/acao');
		return redirect('/servidor/acao');
	}

    public function atualizarAcao(Request $request, $id){
		$r = \App::call('App\Http\Controllers\AcaoController@update', ['r' => $request, 'id' => $id]);
		if($r)
			return redirect('/servidor/acao');
		return redirect('/servidor/acao');
	}
	
	public function deletarAcao($id){
		$r = \App::call('App\Http\Controllers\AcaoController@destroy', ['id' => $id]);
		if($r)
			return redirect('/servidor/acao');
		return redirect('/servidor/acao');
	}
	
}
