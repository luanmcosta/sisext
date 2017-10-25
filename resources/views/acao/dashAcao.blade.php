@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard - <b>Ações</b>
                  <div class="text-right">
                    <button style="margin-top:-25px" class="btn btn-success" data-toggle="modal" data-target="#cadastra" style=" color: #FFF; margin-left: 15px;">
                      Novo registro
                    </button>
                  </div>
              </div>

                <div style="margin-left: 25px" class="panel-body">
                    @if(count($acoes)==0)
                        <div class="text-center" style="padding: 5px 0px;">
                            <h4>Não possui registos de <b>Ações</b></h4>
                            <h5>Utilize o botão <b style="color: #27ae60">"novo"</b> para inserir um novo registro de cursos</h5>
                        </div>

                    @else
                        @foreach($acoes as $obj)
                            <div style="width:170px; margin-right: 10px;" class="col-xs-2 well well-sm">
                              <div class="text-center">
                                <i class="material-icons" style="font-size:100px;">event</i><br>
                                <h4 style="margin-top: -5px; margin-bottom: -3px">{{$obj->nome}}</h4>
                                {{$obj->created_at->format('d/m/Y')}}
                                @foreach($servidores as $autor)
                                  @if($autor->id == $obj->autor)
                                    <h5 style="margin-bottom: -3px">Autor: {{$autor->nome}}</h5>
                                  @endif
                                @endforeach

                                <h5 style="margin-bottom: -3px">Inicio: {{$obj->data_inicio}}</h5>
                                <h5>Fim: {{$obj->data_fim}}</h5>

                              </div>
                                <div class="text-center">
                                    <form action="{{route('admin.acao.destroy', $obj->id)}}" method="POST" style="display: inline-block;">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="material-icons" title="Deletar">delete</i>
                                        </button>
                                        <input type="hidden" name="{{$obj->id}}" id="idBD">
                                    </form>

                                    <a class="btn btn-info btn-sm" role="button" data-toggle="modal" data-target="#editar">
                                            <i class="material-icons" title="Editar">create</i>
                                        </button>
                                    </a>

                                    </a>
                                    <div class="modal fade" id="editar">
                                        <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Editar ação</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <form class="" action="{{route('admin.acao.update', $obj->id)}}"" method="POST">
                                                    <input type="hidden" name="autor" value="{{$obj->autor}}">
                                                    <h4><label for="nome">Nome</label> <input type="text" id="nome" value="{{$obj->nome}}" name="nome"></h4>
                                                    <h4><label for="descricao">Descrição</label> <textarea rows="4" cols="30" id="descricao" name="descricao">{{$obj->descricao}}</textarea></h4>
                                                    <h4><label for="inicio">Data início</label> <input type="date" id="inicio" value="{{$obj->data_inicio}}" name="data_inicio"></h4>
                                                    <h4><label for="fim">Data fim</label> <input type="date" id="fim" value="{{$obj->data_fim}}" name="data_fim"></h4>
                                                    <h4><label for="estado">Estado</label> <select style="width:180px" class="form-control" id="estado">
                                                      <option value="Estado1">Estado1</option>
                                                      <option value="Estado2">Estado2</option>
                                                      <option value="Estado3">Estado3</option>
                                                    </select></h4>
                                                    {{method_field('PUT')}}
                                                    {{csrf_field()}}
                                                    <!-- <input type="submit" value="Cadastrar"> -->
                                                    <div class="modal-footer">
                                                      <button class="btn btn-primary">Salvar</button>
                                                    </div>
                                                  </form>
                                                </div>
                                            </div><!-- /.modal-content-->
                                        </div><!-- /.modal-dialog-->
                                    </div> <!-- /.modal-->

                                    <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#visualizar">
                                        <i class="material-icons" title="Visualizar">remove_red_eye</i>
                                    </a>
                                    <div class="modal fade" id="visualizar">
                                        <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Visualizar</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <i class="material-icons" style="font-size:150px;">event</i><br>
                                                  <h4>Nome: {{$obj->nome}}</h4>
                                                  <h4>Autor: </h4>
                                                  <h4>Data da submissão: {{$obj->created_at->format('d/m/Y')}}</h4>
                                                  <h4>Data de início: {{$obj->data_inicio}}</h4>
                                                  <h4>Data de término: {{$obj->data_fim}}</h4>
                                                  <h4>Descrição: {{$obj->descricao}}</h4>
                                                  <h4>Estado: {{$obj->estado}}</h4>
                                                  <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                  </div>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div> -->
                                            </div><!-- /.modal-content-->
                                        </div><!-- /.modal-dialog-->
                                    </div> <!-- /.modal-->
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="modal fade" id="cadastra">
                        <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Cadastrar nova ação</h4>
                                </div>
                                <div class="modal-body">
                                  <form class="" action="{{route('admin.acao.store')}}" method="POST">
                                    <h4>Autor: <input type="text" name="autor"></h4>
                                    <h4>Nome: <input type="text" name="nome"></h4>
                                    <h4>Descricao: <input type="text" name="descricao"></h4>
                                    <h4>Data início: <input type="date" name="data_inicio"></h4>
                                    <h4>Data fim: <input type="date" name="data_fim"></h4>
                                    <h4>Estado: <input type="text" name="estado"></h4>

                                    {{csrf_field()}}
                                    {{method_field("POST")}}
                                    <!-- <input type="submit" value="Cadastrar"> -->
                                    <div class="modal-footer">
                                      <button class="btn btn-primary">Salvar</button>
                                    </div>
                                  </form>
                                </div>
                            </div><!-- /.modal-content-->
                        </div><!-- /.modal-dialog-->
                    </div> <!-- /.modal-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
