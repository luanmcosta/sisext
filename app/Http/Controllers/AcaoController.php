<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acao;
use App\Servidor;

class AcaoController extends Controller
{
    private $acao;

    public function __construct(Acao $acao){
      $this->acao = $acao;
    }

    public function index(){
      $acoes = Acao::all();
      $servidores = Servidor::all();
      return view('acao.dashAcao', compact('acoes', 'servidores'));
    }

    public function create(){
      return view('acao.novaAcao');
    }

    public function edit($id){
      $acao = Acao::find($id);
      return view('acao.editar', compact('acao'));
    }

    public function show(){
    }

    public function store(Request $r){
      $this->acao->autor = $r->input('autor');
      $this->acao->nome = $r->input('nome');
      $this->acao->descricao = $r->input('descricao');
      $this->acao->data_inicio = $r->input('data_inicio');
      $this->acao->data_fim = $r->input('data_fim');
      $this->acao->estado = $r->input('estado');

      $resp = $this->acao->save();
      return $resp;
    }

    public function update(Request $r, $id){
      $acao = Acao::find($id);

      $acao->autor = $r->input('autor');
      $acao->nome = $r->input('nome');
      $acao->descricao = $r->input('descricao');
      $acao->data_inicio = $r->input('data_inicio');
      $acao->data_fim = $r->input('data_fim');
      $acao->estado = $r->input('estado');

      $resp = $acao->save();
      if($resp) return redirect()->route('admin.acao.index');
      else echo "Erro ao tentar atualizar";
    }

    public function destroy($id){
      $this->acao = Acao::find($id);

      $result = $this->acao->delete();
      if($result) return redirect()->route('admin.acao.index');
      else echo "Não foi possível excluir";
    }
}
