@extends('servidor.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuários do sistema</div>

                <div class="panel-body">
                    <form action = "{{url('admin/servidor/update/'.$serv->id)}}" method = "POST">
			{{csrf_field()}}
			<h3> SERVIDOR </h3></br>
			Nome: 			<input type = "text" value = "{{$serv->nome}}" name = "nome"/></br>
			Cargo: 			<input type = "text" value = "{{$serv->cargo}}" name = "cargo"/></br>
			Telefone: 		<input type = "text" value = "{{$serv->telefone}}" name = "telefone"/></br>
			Email: 			<input type = "email" value = "{{$serv->email}}" name = "email"/></br>
			Senha: 			<input type = "password" value = "" name = "senha"/></br>
			SIAP: 			<input type = "text" value = "{{$serv->siap}}" name = "siap"/></br>
			<input type = "submit"/>
		</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
