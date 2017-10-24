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

                <div style="margin-left: 25px" class="panel-body">

                    @if(count($acoes)==0)
                        <div class="text-center" style="padding: 5px 0px;">
                            <h4>Não possui registos de <b>Ações</b></h4>
                            <h5>Utilize o botão <b style="color: #27ae60">"novo"</b> para inserir um novo registro de cursos</h5>
                        </div>

                    @else
                        @foreach($acoes as $obj)
                            <div style="width:160px; margin-right: 10px;" class="col-xs-2 well well-sm">
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
                                    <form action="{{route('acao.destroy', $obj->id)}}" method="POST" style="display: inline-block;">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="material-icons" title="Deletar">delete</i>
                                        </button>
                                        <input type="hidden" name="{{$obj->id}}" id="idBD">
                                    </form>

                                    <a href="{{$obj->id}}/edit">
                                        <button type="submit" class="btn btn-info btn-sm">
                                            <i class="material-icons" title="Editar">create</i>
                                        </button>
                                    </a>
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
                                      <button class="btn btn-primary">Save</button>
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
