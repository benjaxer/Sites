<?php
include("conexion.php");
if (!empty($_POST)) {
  $apodo = trim(mysqli_real_escape_string($conexion, $_POST['nom']));
  $semanario = mysqli_real_escape_string($conexion,$_POST['sem']);
  $tcampeonato = trim(mysqli_real_escape_string($conexion,$_POST['tcam']));
  $tiros = mysqli_real_escape_string($conexion,$_POST['gol']);
  $correo = mysqli_real_escape_string($conexion,$_POST['mail']);
  $versujeto="SELECT Idcampeonato,nombre,semana,tipocampeonato,goles,email
              FROM campeonato 
              WHERE nombre = '$apodo' AND
                    semana = '$semanario' AND
                    tipocampeonato = '$tcampeonato' AND  
                    goles = '$tiros' AND        
                    email = '$correo'";     

  $existepersona=$conexion->query($versujeto);
  $filas=$existepersona->num_rows;
  if ($filas>0){ 
   
 $jugador = $existepersona->fetch_array(MYSQLI_BOTH);
//sumar goles
$sumagoles = ($jugador['goles'] + $tiros);
//if(isset($_REQUEST["editar"])){
    $apodo=$_REQUEST["nom"];
    $semanario=$_REQUEST["sem"];
    $tcampeonato=$_REQUEST["tcam"];
    $tiros=$_REQUEST["gol"];
    $id=$_REQUEST["ID"];
    $update="UPDATE campeonato SET goles='$sumagoles'          
                WHERE nombre = '$apodo' AND
                      semana = '$semanario' AND
                      tipocampeonato = '$tcampeonato' AND          
                      email = '$correo'";
  
  $existepersona=$conexion->query($update); 

    echo "<script>
        alert('Registro Modificado');
        window.location='admin.php';
        </script>";
  }else{
        $sqlpartido="INSERT INTO campeonato(nombre,semana,tipocampeonato,goles,email)
                     VALUES('$apodo','$semanario','$tcampeonato','$tiros','$correo')";
        $resultado=$conexion->query($sqlpartido);
       
        
        if($resultado>0){
        echo "<script>
        alert('Exito');
        window.location='admin.php';
        </script>";
        }else{
          echo "<script>
        alert('Error al Registrar');
        window.location='admin.php';
        </script>";
          }
      }
}
   ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Registrar Nuevos Jugadores</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet"in tegrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       <a class="navbar-brand" href="admin.php">Atras</a>
  
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
 
  </ul>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
    </form>
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <br>
      <h1 class="display-3">Agregar Jugadores</h1>


    </div>
  </div>

 

    <hr>
     <div class="container-fluid">
  <div class="row">
  <div class="col-sm-0"></div>


  <div class="col-lg-12">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
    
      <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Agregar Nombre</label>
        <input type="text" name="nom" class="form-control"  placeholder="Nombres" title="Rellene este Campo" required>
      </div>
      <div class="form-group col-md-6">
        <la  <label for="inputEmail4">Campeonato</label>
      <input type="text" class="form-control"  name="tcam" placeholder="Campeonato" title="Rellene este Campo" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Goles</label>
        <input type="number" min="0" max="50" name="gol" value="0" class="form-control"  placeholder="Goles" title="Rellene este Campo" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Email</label>
        <input type="email" name="mail" class="form-control" placeholder="Emails" title="Rellene este Campo" required>
      </div>
      <div>
      <input type="hidden" name="id" value="<?php echo $id;?>">
     </div>
     <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Agregar Jugador</button>      
   </div>
</form>
    <?php
    $sql="SELECT Idcampeonato,nombre,semana,tipocampeonato,goles,email
      FROM campeonato"; 
    $resultado=$conexion->query($sql);
       while($registros=$resultado->fetch_array(MYSQLI_BOTH)){         
          }
  $conexion->close();
    ?>
</div>
<div class="col-sm-0"></div>
</div>
</div>
  </div> <!-- /container -->

</main>
<hr>
<footer class="container">
<?php require_once("piedepagina.php"); ?>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>
