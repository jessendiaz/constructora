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

mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_Recordset1 = "SELECT * FROM tblpuertanorte";
$Recordset1 = mysql_query($query_Recordset1, $conexionconstructora) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillabase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="images/iconespiral.ico" type="image/x-icon" rel="shortcut icon" />
<link href='http://fonts.googleapis.com/css?family=Arbutus+Slab' rel='stylesheet' type='text/css'>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<?php $menuseleccionado=3;?>
<title>Documento sin título</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
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
  <div class="content"><!-- InstanceBeginEditable name="cuerpo" --><br />

    <h1><img src="images/iconespiral.png" width="22" height="22" /> Condominio Puerta Norte</h1>
    <div>
      Este condominio cuenta con viviendas de 105 m2 construidos, Living y comedor en diferentes niveles, baño de visitas, una amplia cocina equipada, y tres dormitorios en segundo piso, además cuenta con acceso controlado, estacionamientos de visitas y amplios espacios para el desarrollo de la vida en familia.
      
Cada casa cuenta con aéreas verdes terminadas y riego automático, estacionamiento propio, sistema de citofonía  y portero automático.
Estas casas además tienen ventanas de termopanel y están revestidas interiormente en poligyp, sistema de aislación termo-acústica, que produce un ahorro en calefacción y aumento en el confort de la vivienda.
</div><br />



  <?php do { ?>
  <a class="thumbnail" href="#thumb"><img src="documentos/img_puertanorte/<?php echo $row_Recordset1['strimagen']; ?>" width="200px" height="200px" border="0" /><span><img src="documentos/img_puertanorte/<?php echo $row_Recordset1['strimagen']; ?>" /><br />
    <?php echo $row_Recordset1['strdescripcion']; ?></span></a>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

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
mysql_free_result($Recordset1);
?>
