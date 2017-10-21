<!DOCTYPE HTML>
<html = lang = "pt-br">
	<head>
		<title> ServidorCadastro </title>
		<meta charset="UTF-8">
	 </head>
	<body>
		<form action = "http://localhost/sisext/public/servidor" method = "POST">
			{{csrf_field()}}
			<h3> SERVIDOR </h3></br>
			Nome: 			<input type = "text" value = "" name = "nome"/></br>
			Senha: 			<input type = "text" value = "" name = "senha"/></br>
			<input type = "submit"/>
		</form>
	</body>
</html>