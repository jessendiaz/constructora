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
  $updateSQL = sprintf("UPDATE tblcostruccion SET strimagen=%s, strlink=%s, intestado=%s WHERE id_construccion=%s",
                       GetSQLValueString($_POST['strimagen'], "text"),
                       GetSQLValueString($_POST['strlink'], "text"),
                       GetSQLValueString($_POST['intestado'], "int"),
                       GetSQLValueString($_POST['id_construccion'], "int"));

  mysql_select_db($database_conexionconstructora, $conexionconstructora);
  $Result1 = mysql_query($updateSQL, $conexionconstructora) or die(mysql_error());

  $updateGoTo = "enconstruccion_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varDato_datoenconstruccion = "0";
if (isset($_GET["recordID"])) {
  $varDato_datoenconstruccion = $_GET["recordID"];
}
mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_datoenconstruccion = sprintf("SELECT * FROM tblcostruccion WHERE tblcostruccion.id_construccion=%s", GetSQLValueString($varDato_datoenconstruccion, "int"));
$datoenconstruccion = mysql_query($query_datoenconstruccion, $conexionconstructora) or die(mysql_error());
$row_datoenconstruccion = mysql_fetch_assoc($datoenconstruccion);
$totalRows_datoenconstruccion = mysql_num_rows($datoenconstruccion);
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
	  remote=open('gestionimagenenconstruccion.php','remote','width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no,status=yes');
	  remote.focus();
	  }
  
  </script>
    <h1>Editar Proyecto en Construcci&oacute;n</h1>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td width="53" align="right" nowrap="nowrap">Imagen:</td>
          <td width="358"><input type="text" name="strimagen" value="<?php echo htmlentities($row_datoenconstruccion['strimagen'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /><input type="button" name="button" id="button" value="Examinar" onclick="javascript:subirimagen();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Link:</td>
          <td><input type="text" name="strlink" value="<?php echo htmlentities($row_datoenconstruccion['strlink'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Estado:</td>
          <td><select name="intestado">
            <option value="1" <?php if (!(strcmp(1, htmlentities($row_datoenconstruccion['intestado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Activado</option>
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_datoenconstruccion['intestado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Desactivado</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Actualizar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="id_construccion" value="<?php echo $row_datoenconstruccion['id_construccion']; ?>" />
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
mysql_free_result($datoenconstruccion);
?>
