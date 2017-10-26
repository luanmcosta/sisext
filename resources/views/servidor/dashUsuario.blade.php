@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuários do sistema</div>

                <div class="panel-body">
                    <div class="text-right">
                        <button class="btn btn-success" data-toggle="modal" style=" color: #FFF; margin-left: 15px;">
                            <strong>+</strong> Novo
                        </button>                        
                    </div>

 
                    @if(count($usuarios)==0)
                        <div class="text-center" style="padding: 5px 0px;">
                            <h4>Não possui registos de <b>Usuários</b> no sistema.</h4>
                            <h5>Utilize o botão <b style="color: #27ae60">"novo"</b> para inserir um novo registro de Usuário</h5>
                        </div>

                    @else
                        @foreach($usuarios as $obj)
                            <div style="border: 1px solid #ccc; width: 150px">
                                {{$obj->id}} <br>
                                {{$obj->created_at}} <br>
                                {{$obj->updated_at}} <br>
                                <div class="text-right">
                                    <form action="{{route('usuario.destroy', $obj->id)}}" method="POST" style="display: inline-block;">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
