<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use App\Servidor;

class AdminController extends Controller
{
    //
	public function index(){		
		return view('admin.home');
	}
	
	public function edit($id){
		$adm = Admin::find($id);
		return view('admin.AtualizarAdministrador',compact('adm'));
	}
	
	public function update(Request $r, $id){
		$adm = Admin::find($id);
		
		$adm->nome = $r->input('nome');
		$adm->email = $r->input('email');
		if ($r->input('senha')!=''){
			$adm->senha = Hash::make($r->input('senha'));
		}
		
		$resp = $adm->save();
		
		if($resp){
			return redirect()->route('admin.index');
		}
		else{
			echo "Erro ao tentar atualizar!";
		}
	}


	/////////////////////////
	public function listarAcoes(){
		return \App::call('App\Http\Controllers\AcaoController@index');
	}
	public function atualizarAcao(Request $request, $id){
		$r = \App::call('App\Http\Controllers\AcaoController@update', ['r' => $request, 'id' => $id]);
		if($r)
			return redirect('/admin/acao');
		return redirect('/admin/acao');
	}
	public function deletarAcao(){
		return 0;
	}
	public function salvarAcao(Request $request){
		$r = \App::call('App\Http\Controllers\AcaoController@store', ['request', $request]);
		if($r)
			return redirect('/admin/acao');
		return redirect('/admin/acao');
	}

	public function listarServidores(){
		$servidores = Servidor::all();
		return view('servidor.listar')->with('serv', $servidores);
	}

}