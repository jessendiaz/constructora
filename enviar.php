<?php require_once('Connections/conexionconstructora.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$varDato_mail = "0";
if (isset($_GET['$departamento'])) {
  $varDato_mail = $_GET['$departamento'];
}
mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_mail = sprintf("SELECT tbldepartamento.strcorreo FROM tbldepartamento WHERE tbldepartamento.strnombre=%s", GetSQLValueString($varDato_mail, "text"));
$mail = mysql_query($query_mail, $conexionconstructora) or die(mysql_error());
$row_mail = mysql_fetch_assoc($mail);
$varDato_mail = "0";
if (isset($_POST['menudepartamento'])) {
  $varDato_mail = $_POST['menudepartamento'];
}
mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_mail = sprintf("SELECT tbldepartamento.strcorreo FROM tbldepartamento WHERE tbldepartamento.strnombre=%s", GetSQLValueString($varDato_mail, "text"));
$mail = mysql_query($query_mail, $conexionconstructora) or die(mysql_error());
$row_mail = mysql_fetch_assoc($mail);
$totalRows_mail = mysql_num_rows($mail);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillabase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<?php $menuseleccionado=6;?>
<title>Constructora Alcantara</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<!-- InstanceEndEditable -->
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/estiloprincipal.css" rel="stylesheet" type="text/css" />
<?php include("includes/google.php"); ?>
<!-- InstanceParam name="slider" type="boolean" value="true" -->
</head>

<body>
<!-- InstanceBeginEditable name="Cabecera" -->
<div class="header">
  <?php include("includes/cabecera.php"); ?>
  Aca poner eslogan de la empresa y alguna otra imagen para rellenar la cabecera....
  <div class="clearfloat"></div>  
  
  <!-- end .header -->
</div>

<!-- InstanceEndEditable -->
<?php include("includes/menu.php"); ?>

<div class="container">
  <div class="content"><!-- InstanceBeginEditable name="cuerpo" -->

 
    <h1>Enviado</h1>
    Su mensaje fue enviado al area correspondiente. Gracias
    <?php
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$departamento = $_POST['menudepartamento'];
$comentario = $_POST['mensaje'];




$header = 'From: ' . $correo . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre ."\r\n";
$mensaje .= "Nombre: " . $nombre . " \r\n"; 
$mensaje .= "Correo es: " . $correo . " \r\n";
$mensaje .= "Dirección: " . $direccion . " \r\n";
$mensaje .= "Telefono: " . $telefono . " \r\n";
$mensaje .= "Mensaje: " . $comentario . " \r\n";
$mensaje .= "Enviado el: " . date('d/m/Y', time());
$para = $row_mail['strcorreo'];
$asunto = 'Contacto Constructora Alcantara';

mail($para, $asunto, $mensaje, $header);

?>

    

  <!-- InstanceEndEditable -->
    <!-- end .content -->
  </div>
  <!-- end .container -->
</div>

<div class="menupie">
<?php include("includes/menupie.php"); ?></div>
  <div class="footer">  
  
  <?php include("includes/pie.php"); ?></div> 
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($mail);
?>
