<?php 
include("conexion.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$ID=$_GET['id'];
$EliminarJugador="DELETE FROM campeonato WHERE Idcampeonato='$ID'";
$resultado=$conexion->query($EliminarJugador);
  echo "<script>
    function ConfirmDelete(){
      var respuesta = confirm('Estas seguro que deseas Eliminar al Jugador?');

      if(respuesta == true)
      {
          return true;
      }
      else{

        return false;
      }
  }
       alert('Jugador Eliminado');
       window.location='admin.php';
       </script>";
$conexion->close();


?>