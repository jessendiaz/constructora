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
$query_Recordset1 = "SELECT * FROM tbltejasverdes";
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
<?php $menuseleccionado=4;?>
<title>Tejas Verdes|Constructora Alcantara</title>
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
 
  <div class="clearfloat"></div>
  <!-- end .header -->
</div>
<!-- InstanceEndEditable -->
<?php include("includes/menu.php"); ?>

<div class="container">
  <div class="content"><!-- InstanceBeginEditable name="cuerpo" --><br />

    <h1><img src="images/iconespiral.png" width="22" height="22" /> Conjunto Residencial Tejas Verdes</h1>
    <div class="texto">
      <p>Es un proyecto ubicado en el coraz�n de Las Rastras, sector exclusivo y de gran plusval�a. Con viviendas de 250 mts2 construidos  y emplazadas en terrenos de 560 mts2 aproximados.</p>
<p>Estas viviendas cuentan con una arquitectura moderna, amplios espacios interiores y una distribuci�n acogedora y confortable. La vivienda dispone de una amplia cocina, living y comedor independientes, 5 dormitorios , tres de ellos en suite, 5 ba�os y una amplia sala de estar, adem�s cuenta con terrazas, balcones y una hermosa piscina que permiten disfrutar de la tranquilidad y naturaleza del sector.
</p>
</div><br />



<div class="img_content">
  <?php do { ?>
  <a class="thumbnail" href="#thumb"><img src="documentos/img_tejasverdes/<?php echo $row_Recordset1['strimagen']; ?>" width="790px" height="315px" border="0" /><span><img src="documentos/img_tejasverdes/<?php echo $row_Recordset1['strimagen']; ?>" />

    <?php echo $row_Recordset1['strdescripcion']; ?></span></a>
  <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  
</div>
<div class="clearfloat"></div>
<div class="video"><iframe width="620" height="315" src="//www.youtube.com/embed/opeWhzk_MRQ" frameborder="0" allowfullscreen></iframe></div>

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
