<?php require_once('../Connections/conexionconstructora.php'); ?>
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
$query_datospuertanorte = "SELECT * FROM tblpuertanorte";
$datospuertanorte = mysql_query($query_datospuertanorte, $conexionconstructora) or die(mysql_error());
$row_datospuertanorte = mysql_fetch_assoc($datospuertanorte);
$totalRows_datospuertanorte = mysql_num_rows($datospuertanorte);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantillaadmin.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administracion Constructora Alcantara</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="../css/estiloadmin.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header">
    <?php include("../includes/cabecera_admin.php"); ?></div>
  <div class="sidebar1">
  <?php include("../includes/menuizquierda_admin.php"); ?>
    
    <p>&nbsp;</p>
    <!-- end .sidebar1 --></div>
  <div class="content"><!-- InstanceBeginEditable name="partederechaadmin" -->
   <script>
  function asegurar(){
	  rc=confirm("¿Seguro desea eliminar?");
	  return rc;
	  }
  
  
  </script>
    <h1>Lista de Imagenes Puerta Norte</h1>
    <p><a href="puerta_norte_add.php"><img src="../iconos/agregar.png" width="16" height="16" />Añadir Imagen</a><br />
    </p>
    <p>&nbsp; </p>
    <table width="100%" border="0" cellpadding="2" cellspacing="2">
      <tr class="tablacabecera">
        <td width="44%">Imagen</td>
        <td width="25%">Descripcion</td>
        <td width="12%">Estado</td>
        <td width="19%">Acciones</td>
      </tr>
      <?php do { ?>
      <tr>
    <td><p><img src="../documentos/img_enventa/<?php echo $row_datospuertanorte['strimagen']; ?>" width="300" height="119" /></p>
      <p></p></td>
    <td><?php echo $row_datospuertanorte['strdescripcion']; ?></td>
    <td><?php 
	if( $row_datospuertanorte['intestado']==1)echo "ACTIVO";
	else echo"INACTIVO";?></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;<a href="puertanorte_edit.php?recordID=<?php echo $row_datospuertanorte['id_puertanorte']; ?>"><img src="../iconos/editar32.png" width="32" height="32" /></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="puertanorte_remove.php?recordID=<?php echo $row_datospuertanorte['id_puertanorte']; ?>"><img src="../iconos/eliminar.png" width="32" height="32" onclick="javascript:return asegurar();" /></a></td>
  </tr>
      <?php } while ($row_datospuertanorte = mysql_fetch_assoc($datospuertanorte)); ?>
    </table>
  <!-- InstanceEndEditable -->
    
    <!-- end .content --></div>
  <div class="footer">
    <?php include("../includes/pie_admin.php"); ?></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($datospuertanorte);
?>
