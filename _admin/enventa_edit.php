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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE venta SET strImagen=%s, strLink=%s, intestado=%s WHERE id_venta=%s",
                       GetSQLValueString($_POST['strImagen'], "text"),
                       GetSQLValueString($_POST['strLink'], "text"),
                       GetSQLValueString($_POST['intestado'], "int"),
                       GetSQLValueString($_POST['id_venta'], "int"));

  mysql_select_db($database_conexionconstructora, $conexionconstructora);
  $Result1 = mysql_query($updateSQL, $conexionconstructora) or die(mysql_error());

  $updateGoTo = "enventa_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varDato_datoenventa = "-1";
if (isset($_GET["recordID"])) {
  $varDato_datoenventa = $_GET["recordID"];
}
mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_datoenventa = sprintf("SELECT * FROM venta WHERE venta.id_venta=%s", GetSQLValueString($varDato_datoenventa, "int"));
$datoenventa = mysql_query($query_datoenventa, $conexionconstructora) or die(mysql_error());
$row_datoenventa = mysql_fetch_assoc($datoenventa);
$totalRows_datoenventa = mysql_num_rows($datoenventa);
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
  function subirimagen(){
	  self.name='opener';
	  remote=open('gestionimagenenventa.php','remote','width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no,status=yes');
	  remote.focus();
	  }
  
  </script>
    <h1>Editar Proyectos en venta</h1>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td width="53" align="right" nowrap="nowrap">Imagen:</td>
          <td width="327"><input type="text" name="strImagen" value="<?php echo htmlentities($row_datoenventa['strImagen'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /><input type="button" name="button" id="button" value="Examinar" onclick="javascript:subirimagen();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Link:</td>
          <td><input type="text" name="strLink" value="<?php echo htmlentities($row_datoenventa['strLink'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Estado:</td>
          <td><select name="intestado">
            <option value="1" <?php if (!(strcmp(1, htmlentities($row_datoenventa['intestado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Activado</option>
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_datoenventa['intestado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Desactivado</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Actualizar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="id_venta" value="<?php echo $row_datoenventa['id_venta']; ?>" />
    </form>
    <p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
  <!-- InstanceEndEditable -->
    
  <!-- end .content --></div>
  <div class="footer">
    <?php include("../includes/pie_admin.php"); ?></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($datoenventa);

?>
