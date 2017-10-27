<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
	public function index(){		
		
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
}