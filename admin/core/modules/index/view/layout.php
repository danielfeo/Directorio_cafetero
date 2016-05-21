<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>.: Directorio Cafetero :.</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

  <link rel="stylesheet" type="text/css" href="res/lat-lng-picker/css/jquery-gmaps-latlon-picker.css"/>
  <script src="res/lat-lng-picker/js/jquery-gmaps-latlon-picker.js"></script>


<script src="res/morris/raphael-min.js"></script>
<script src="res/morris/morris.js"></script>
  <link rel="stylesheet" href="res/morris/morris.css">
  <link rel="stylesheet" href="res/morris/example.css">

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Directorio Cafetero </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php 
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
         <ul class="nav navbar-nav">
          <li><a href="../"><i class="fa fa-globe"></i> Ver Sitio Web</a></li>
          <li><a href="index.php?view=newpost"><i class="fa fa-asterisk"></i> Nuevo Anuncio</a></li>
          </ul> 
          <ul class="nav navbar-nav side-nav">

<li><a href="./"><i class="fa fa-fw fa-dashboard"></i> Inicio</a></li>
<li><a href="./?view=posts"><i class="fa fa-fw fa-th-large"></i> Anuncios</a></li>
                    <li><a href="./?view=galery"><i class="fa fa-fw fa-picture-o"></i> Galeria</a></li>
                    <li><a href="./?view=pages"><i class="fa fa-fw fa-file"></i> Paginas</a></li>
                    <li><a href="./?view=comments"><i class="fa fa-fw fa-comments"></i> Comentarios</a></li>
                    <li><a href="./?view=msgs"><i class="fa fa-fw fa-envelope-o"></i> Mensajes</a></li>
                    <li><a href="./?view=categories"><i class="fa fa-fw fa-th-list"></i> Categorias</a></li>    
                    <li>        <a href="./?view=users"><i class="fa fa-fw fa-users"></i> Usuarios</a></li>
                    <li><a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-cogs"></i> Configuracion <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./?view=generalcfg">General</a>
                            </li>
                        </ul>
                    </li>

          </ul>




<?php endif;?>



<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php 
if(isset($_SESSION["user_id"])):
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("index");

?>
<?php else:?>
<br><br><br><br><br><div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
        <div class="panel-heading">
        Login
        </div>
        <div class="panel-body">
        <form role="form" method="post" action="./?action=processlogin">
  <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-block btn-default">Acceder</button>
<!--<br>  <a href="./?r=auth/recover">Olvide mi contrase&ntilde;a ...</a>-->
</form>
        </div>
        </div>
        <!-- -->

        </div>
    </div>
</div>

<?php endif;?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/bootstrap3/js/bootstrap.min.js"></script>

  </body>
</html>
