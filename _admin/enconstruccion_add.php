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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tblcostruccion (strimagen, strlink, intestado) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['strimagen'], "text"),
                       GetSQLValueString($_POST['strlink'], "text"),
                       GetSQLValueString($_POST['intestado'], "int"));

  mysql_select_db($database_conexionconstructora, $conexionconstructora);
  $Result1 = mysql_query($insertSQL, $conexionconstructora) or die(mysql_error());

  $insertGoTo = "enconstruccion_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_datoenconstruccion = "SELECT * FROM tblcostruccion";
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
    <h1>Añadir Proyecto en Construcci&oacute;n</h1>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table width="441" align="center">
        <tr valign="baseline">
          <td width="69" align="right" nowrap="nowrap">Strimagen:</td>
          <td width="692"><input type="text" name="strimagen" value="" size="32" />
          <input type="button" name="button" id="button" value="Examinar" onclick="javascript:subirimagen();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Strlink:</td>
          <td><input type="text" name="strlink" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Intestado:</td>
          <td><select name="intestado">
            <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>Activado</option>
            <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>Desactivado</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Insertar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
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
mysql_free_result($datoenconstruccion);
?>
