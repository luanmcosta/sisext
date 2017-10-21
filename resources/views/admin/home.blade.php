@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(count($objetos)==0)
                        <div class="text-center" style="padding: 5px 0px;">
                            <h4>Não possui registos de <b>Eventos</b></h4>
                            <h5>Utilize o botão <b style="color: #27ae60">"novo"</b> para inserir um novo registro de cursos</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
