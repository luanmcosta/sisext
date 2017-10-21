<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard</title>
    <meta name="description" content="Login">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="container"  style="border: 1px solid #ccc; background: #FFF;">
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<img src="{{asset('img/if.png')}}">
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="#"><i class="material-icons">home</i>Home</a></li>
						<li><a href="#"><i class="material-icons">event</i>Ações</a></li>
						<li><a href="#"><i class="material-icons">perm_identity</i>Usuários</a></li>
						<li><a href="#"><i class="material-icons">build</i>Configurações</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
            			<li><a href="#" title="Usuário"><img src="" alt="{{$_SESSION['nomeUser']}}"></a></li>
            			<li><a href="logout"> Logout<i class="material-icons right">exit_to_app</i></a></li>
            		</ul>
				</div>
			</nav>
		</header> 
		<div class="jambotron"></div>
    </div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
