<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/estilo.css')}}"/>
    <title>Listagem de ações</title>
  </head>
  <body>
    <article>
      <h1>Ações</h1>
      @foreach($acoes as $acao)
        <div class="frame">
          <div class="nome">
            <h3>{{$acao->nome}}</h3>
          </div>
          <div class="opcoes">
            <form action="{{route('acao.destroy', $acao->id)}}" method="post">
              {{method_field('DELETE')}}
              <button>Apagar</button>
              {{csrf_field()}}
            </form>
            <form action="{{route('acao.edit', $acao->id)}}" method="get">
              <!-- {{method_field('GET')}} -->
              <button>Editar</button>
              {{csrf_field()}}
            </form>
          </div>
        </div>
      @endforeach
    </article>
  </body>
</html>
