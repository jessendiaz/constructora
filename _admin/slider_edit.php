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
  $updateSQL = sprintf("UPDATE tblslider SET strImagen=%s, strDescripcion=%s, intEstado=%s WHERE idContador=%s",
                       GetSQLValueString($_POST['strImagen'], "text"),
                       GetSQLValueString($_POST['strDescripcion'], "text"),
                       GetSQLValueString($_POST['intEstado'], "int"),
                       GetSQLValueString($_POST['idContador'], "int"));

  mysql_select_db($database_conexionconstructora, $conexionconstructora);
  $Result1 = mysql_query($updateSQL, $conexionconstructora) or die(mysql_error());

  $updateGoTo = "sliderlista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varDato_datoImagen = "0";
if (isset($_GET["recordID"])) {
  $varDato_datoImagen = $_GET["recordID"];
}
mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_datoImagen = sprintf("SELECT * FROM tblslider WHERE tblslider.idContador=%s", GetSQLValueString($varDato_datoImagen, "int"));
$datoImagen = mysql_query($query_datoImagen, $conexionconstructora) or die(mysql_error());
$row_datoImagen = mysql_fetch_assoc($datoImagen);
$totalRows_datoImagen = mysql_num_rows($datoImagen);
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
	  remote=open('gestionimagen.php','remote','width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no,status=yes');
	  remote.focus();
	  }
  
  </script>
    <h1>Editar Imagen Slider</h1>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td width="133" align="right" nowrap="nowrap">Imagen(990x394px):</td>
          <td width="327"><input type="text" name="strImagen" value="<?php echo htmlentities($row_datoImagen['strImagen'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" />
          <input type="button" name="button" id="button" value="Examinar" onclick="javascript:subirimagen();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">StrDescripcion:</td>
          <td><input type="text" name="strDescripcion" value="<?php echo htmlentities($row_datoImagen['strDescripcion'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">IntEstado:</td>
          <td><select name="intEstado">
            <option value="1" <?php if (!(strcmp(1, htmlentities($row_datoImagen['intEstado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Activado</option>
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_datoImagen['intEstado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Desactivado</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td align="right"><a class="button" href="javascript:document.form1.submit();"><span>Actualizar registro</span></a></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="idContador" value="<?php echo $row_datoImagen['idContador']; ?>" />
    </form>
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
mysql_free_result($datoImagen);
?>
