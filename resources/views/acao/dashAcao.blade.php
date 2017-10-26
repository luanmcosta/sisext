@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard - Ações
                  <div class="text-right">
                    <button style="margin-top:-25px" class="btn btn-success" data-toggle="modal" data-target="#cadastra" style=" color: #FFF; margin-left: 15px;">
                      Nova
                    </button>
                  </div>
              </div>

                <div style="margin-left: -5px" class="panel-body">

                    @if(count($acoes)==0)
                        <div class="text-center" style="padding: 5px 0px;">
                            <h4>Não possui registos de <b>Ações</b></h4>
                            <h5>Utilize o botão <b style="color: #27ae60">"novo"</b> para inserir um novo registro de cursos</h5>
                        </div>

                    @else
                        @foreach($acoes as $obj)
                            <div style="width:170px; margin-right: 10.5px;" class="col-xs-2 well well-sm">
                              <div class="text-center">
                                <i class="material-icons" style="font-size:100px;">event</i><br>
                                <h4 style="margin-top: -5px; margin-bottom: -3px"><b>{{$obj->nome}}</b></h4>
                                {{$obj->created_at->format('d/m/Y')}}
                                @foreach($servidores as $autor)
                                  @if($autor->id == $obj->autor)
                                    <h5 style="margin-bottom: -3px"><b>Autor:</b> {{$autor->nome}}</h5>
                                  @endif
                                @endforeach

                                <h5 style="margin-bottom: -3px"><b>Inicio:</b> {{date('d/m/Y', strtotime($obj->data_inicio))}}</h5>
                                <h5><b>Fim:</b> {{date('d/m/Y', strtotime($obj->data_fim))}}</h5>

                              </div>
                                <div class="text-center">
                                    <form action="{{route('acao.destroy', $obj->id)}}" method="POST" style="display: inline-block;">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="material-icons" title="Deletar">delete</i>
                                        </button>
                                        <input type="hidden" name="{{$obj->id}}" id="idBD">
                                    </form>

                                    <a class="btn btn-info btn-sm" role="button" data-toggle="modal" data-target="#editar{{$obj->id}}">
                                            <i class="material-icons" title="Editar">create</i>
                                    </a>
                                    <div class="modal fade" id="editar{{$obj->id}}">
                                        <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Editar ação</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <form class="" action="acao/{{$obj->id}}" method="POST">
                                                    <input type="hidden" name="autor" value="{{$obj->autor}}">
                                                    <h4><label for="nome">Nome</label> <input type="text" id="nome" value="{{$obj->nome}}" name="nome"></h4>
                                                    <h4><label for="descricao">Descrição</label> <textarea rows="4" cols="25" id="descricao" name="descricao">{{$obj->descricao}}</textarea></h4>
                                                    <h4><label for="inicio">Data início</label> <input type="date" id="inicio" value="{{$obj->data_inicio}}" name="data_inicio"></h4>
                                                    <h4><label for="fim">Data fim</label> <input type="date" id="fim" value="{{$obj->data_fim}}" name="data_fim"></h4>
                                                    <h4><label for="estado">Estado</label> <select style="width:180px" class="selectpicker" id="estado" name="estado">
                                                      <option value="Em análise">Em análise</option>
                                                      <option value="Aprovada">Aprovada</option>
                                                      <option value="Recusada">Recusada</option>
                                                      <option value="Em andamento">Em andamento</option>
                                                      <option value="Concluida">Concluida</option>
                                                    </select></h4>
                                                    {{method_field('PUT')}}
                                                    {{csrf_field()}}
                                                    <!-- <input type="submit" value="Cadastrar"> -->
                                                    <div class="modal-footer">
                                                      <button class="btn btn-primary">Salvar</button>
                                                    </div>
                                                  </form>
                                                </div>
                                                <!-- <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary">Save</button>
                                                </div> -->
                                            </div><!-- /.modal-content-->
                                        </div><!-- /.modal-dialog-->
                                    </div> <!-- /.modal-->

                                    <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#visualizar{{$obj->id}}">
                                        <i class="material-icons" title="Visualizar">remove_red_eye</i>
                                    </a>
                                    <div class="modal fade" id="visualizar{{$obj->id}}">
                                        <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Visualizar</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <i class="material-icons" style="font-size:150px;">event</i><br>
                                                  <h4><b>Nome:</b> {{$obj->nome}}</h4>
                                                  @foreach($servidores as $autor)
                                                    @if($autor->id == $obj->autor)
                                                      <h4><b>Autor:</b> {{$autor->nome}}</h4>
                                                      @break
                                                    @endif
                                                  @endforeach
                                                  <h4><b>Data da submissão:</b> {{$obj->created_at->format('d/m/Y')}}</h4>
                                                  <h4><b>Data de início:</b> {{date('d/m/Y', strtotime($obj->data_inicio))}}</h4>
                                                  <h4><b>Data de término:</b> {{date('d/m/Y', strtotime($obj->data_fim))}}</h4>
                                                  <h4><b>Descrição:</b></h4><h4 style="width: 250px; margin-left: 160px;"> {{$obj->descricao}}</h4>
                                                  <h4><b>Estado:</b> {{$obj->estado}}</h4>
                                                  <div class="modal-footer">
                                                    @if(date("Y-m-d") >= $obj->data_fim)
                                                      <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#relatorio{{$obj->id}}">
                                                          <i class="material-icons" title="Cadastrar Relatório">description</i>
                                                      </button>
                                                    @else
                                                      <button type="submit" class="btn btn-success btn-sm" disabled>
                                                          <i class="material-icons" title="Cadastrar Relatório">description</i>
                                                      </button>
                                                    @endif
                                                    <button class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                                  </div>
                                                  <!--RELATORIO -->
                                                  <div class="modal fade" id="relatorio{{$obj->id}}">
                                                      <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Cadastrar relatório</h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form class="" action="#" method="POST">
                                                                  <h4><label for="descricao">Descrição</label><br><textarea rows="8" cols="50" id="descricao" name="descricao"></textarea></h4>
                                                                  @foreach($servidores as $autor)
                                                                    @if($autor->id == $obj->autor)
                                                                      <input type="hidden" name="autor" value="{{$autor->nome}}">
                                                                      @break
                                                                    @endif
                                                                  @endforeach
                                                                  <input type="hidden" name="acao" value="{{$obj->id}}">
                                                                  {{csrf_field()}}
                                                                  {{method_field("POST")}}
                                                                  <div class="modal-footer">
                                                                    <button class="btn btn-primary">Salvar</button>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                              <!-- <div class="modal-footer">
                                                                  <button class="btn btn-default" data-dismiss="modal">Close</button>
                                                                  <button class="btn btn-primary">Save</button>
                                                              </div> -->
                                                          </div><!-- /.modal-content-->
                                                      </div><!-- /.modal-dialog-->
                                                  </div> <!-- /.modal-->
                                                </div>
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
                                  <form class="" action="{{route('acao.store')}}" method="POST">
                                    <h4><label for="autor">Autor</label> <input type="text" id="autor" name="autor"></h4>
                                    <h4><label for="nome">Nome</label> <input type="text" id="nome" name="nome"></h4>
                                    <h4><label for="descricao">Descrição</label> <textarea rows="4" cols="30" id="descricao" name="descricao"></textarea></h4>
                                    <h4><label for="inicio">Data início</label> <input type="date" id="inicio" name="data_inicio"></h4>
                                    <h4><label for="fim">Data fim</label> <input type="date" id="fim" name="data_fim"></h4>
                                    <input type="hidden" name="estado" value="Em análise">
                                    {{csrf_field()}}
                                    {{method_field("POST")}}
                                    <!-- <input type="submit" value="Cadastrar"> -->
                                    <div class="modal-footer">
                                      <button class="btn btn-primary">Salvar</button>
                                    </div>
                                  </form>
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
        </div>
    </div>
</div>
@endsection
