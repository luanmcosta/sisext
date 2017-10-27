@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuários do sistema</div>

                <div class="panel-body">
                    <form action = "{{url('/admin/servidor/store')}}" method = "POST">
					{{csrf_field()}}
					<h3> SERVIDOR </h3></br>
					Nome: 			<input type = "text" value = "" name = "nome"/></br>
					Cargo: 			<input type = "text" value = "" name = "cargo"/></br>
					Email: 			<input type = "text" value = "" name = "email"/></br>
					Telefone: 		<input type = "text" value = "" name = "telefone"/></br>
					SIAP: 			<input type = "text" value = "" name = "siap"/></br>
					Senha: 			<input type = "text" value = "" name = "senha"/></br>
						<input type = "submit"/>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
