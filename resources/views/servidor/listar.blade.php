@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Usuários do sistema</b>
                	<div class="text-right">
                		<a href="{{url('/admin/servidor/create')}}" class="btn btn-success">Adicionar Servidor</a>
	              	</div>
	            </div>
	               
                <div class="panel-body">
                	@if(count($serv) == 0)
                		<h4>Não há servidores cadastrados</h4>
                	@endif
                    <article>
					@foreach($serv as $obj)			
						<div class="frame" >
							<div class="imagem">
								<img src='../img/servidor{{$obj->img}}'/>
							</div>
							<div class="título">
								<h3> {{$obj->nome}} </h3>
							</div>
							<form action = "{{url('/admin/servidor/destroy/'. $obj->id)}}" method = "POST">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<button> apagar </button>
							</form>
						</div>
						@endforeach
					</article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
