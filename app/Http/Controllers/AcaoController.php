<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acao;

class AcaoController extends Controller
{
    private $acao;

    public function __construct(Acao $acao){
      $this->acao = $acao;
    }

    public function index(){

    }

    public function create(){

    }

    public function edit($id){

    }

    public function show(){

    }

    public function store(Request $r){

    }

    public function update(Request $r, $id){

    }

    public function destroy($id){
      
    }
}
