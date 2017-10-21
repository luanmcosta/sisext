<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar de acao</title>
  </head>
  <body>
    <form class="" action="http://localhost/sisext/public/acao/{{$acao->id}}" method="post" >
      <h4>Autor: <input type="text" name="autor" value="{{$acao->autor}}"></h4>
      <h4>Nome: <input type="text" name="nome" value="{{$acao->nome}}"></h4>
      <h4>Descricao: <input type="text" name="descricao" value="{{$acao->descricao}}"></h4>
      <h4>Data início: <input type="date" name="data_inicio" value="{{$acao->data_inicio}}"></h4>
      <h4>Data fim: <input type="date" name="data_fim" value="{{$acao->data_fim}}"></h4>
      <h4>Estado: <input type="text" name="estado" value="{{$acao->estado}}"></h4>
      {{method_field('PUT')}}
      {{csrf_field()}}
      <input type="submit" value="Editar">
    </form>

  </body>
</html>
