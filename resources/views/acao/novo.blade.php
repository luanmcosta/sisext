<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro de filial</title>
  </head>
  <body>
    <form class="" action="{{route('acao.store')}}" method="POST">
      <h4>Autor: <input type="text" name="autor"></h4>
      <h4>Nome: <input type="text" name="nome"></h4>
      <h4>Descricao: <input type="text" name="descricao"></h4>
      <h4>Data início: <input type="date" name="data_inicio"></h4>
      <h4>Data fim: <input type="date" name="data_fim"></h4>
      <h4>Estado: <input type="text" name="estado"></h4>
      {{csrf_field()}}
      {{method_field("POST")}}
      <input type="submit" value="Cadastrar">
    </form>

  </body>
</html>
