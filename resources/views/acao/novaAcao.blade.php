<!doctype html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <title>Curso de bootstrap 3</title>
   <meta name="description" content="curso de bootstrap 3">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron">
   <div class="container">
       <div class="panel panel-primary">
           <div class="panel-heading">
               <h3 class="panel-title">Professores</h3>
           </div>
           <div class="panel-body">
               <table class="table">
                   <thead>
                       <tr>
                           <th>Nome curso</th>
                           <th>Nível</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>Sistemas de Informação</td>
                           <td>Superior</td>
                       </tr>
                       <tr>
                           <td>Mecatrônica Industrial</td>
                           <td>Superior</td>
                       </tr>
                       <tr>
                           <td>Matemátaica</td>
                           <td>Superior</td>
                       </tr>
                   </tbody>
               </table>
           </div>
           <div class="panel-footer">
                                                       <!--data-toggle= gatilho para chamar o modal javascript-->
               <button class="btn btn-primary" data-toggle="modal" data-target="#cadastra">
                   Novo
               </button>


               <div class="modal fade" id="cadastra">
                   <div class="modal-dialog"> <!--Coloca-se aqui os componentes modificadores do modal: modal-sm ou -lg-->
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                               <h4 class="modal-title">Titulo Modal</h4>
                           </div>
                           <div class="modal-body">
                               <p>One file body&hellip;</p>
                           </div>
                           <div class="modal-footer">
                               <button class="btn btn-default" data-dismiss="modal">Close</button>
                               <button class="btn btn-primary">Save</button>
                           </div>
                       </div><!-- /.modal-content-->
                   </div><!-- /.modal-dialog-->
               </div> <!-- /.modal-->
           </div>
       </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>
