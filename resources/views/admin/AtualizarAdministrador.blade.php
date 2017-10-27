@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuários do sistema</div>

                <div class="panel-body">
                    <form action =  "{{url('administrador/$adm->id}}" method = "POST">
						{{csrf_field()}}
						{{method_field('PUT')}}
						<h3> SERVIDOR </h3></br>
						Nome: 			<input type = "text" value = "{{$adm->nome}}" name = "nome"/></br>
						Email: 			<input type = "text" value = "{{$adm->email}}" name = "email"/></br>
						Senha: 			<input type = "text" value = "{{$adm->senha}}" name = "senha"/></br>
						<input type = "submit"/>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
