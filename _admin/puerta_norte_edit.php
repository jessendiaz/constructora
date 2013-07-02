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
  $updateSQL = sprintf("UPDATE tblpuertanorte SET strimagen=%s, strdescripcion=%s, intestado=%s WHERE id_puertanorte=%s",
                       GetSQLValueString($_POST['strimagen'], "text"),
                       GetSQLValueString($_POST['strdescripcion'], "text"),
                       GetSQLValueString($_POST['intestado'], "int"),
                       GetSQLValueString($_POST['id_puertanorte'], "int"));

  mysql_select_db($database_conexionconstructora, $conexionconstructora);
  $Result1 = mysql_query($updateSQL, $conexionconstructora) or die(mysql_error());

  $updateGoTo = "puerta_norte_lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$varDato_datoimagen = "-1";
if (isset($_GET["recordID"])) {
  $varDato_datoimagen = $_GET["recordID"];
}
mysql_select_db($database_conexionconstructora, $conexionconstructora);
$query_datoimagen = sprintf("SELECT * FROM tblpuertanorte WHERE tblpuertanorte.id_puertanorte=%s", GetSQLValueString($varDato_datoimagen, "int"));
$datoimagen = mysql_query($query_datoimagen, $conexionconstructora) or die(mysql_error());
$row_datoimagen = mysql_fetch_assoc($datoimagen);
$totalRows_datoimagen = mysql_num_rows($datoimagen);
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
	  remote=open('gestionimagenpuertanorte.php','remote','width=400,height=150,location=no,scrollbars=yes,menubars=no,toolbars=no,resizable=yes,fullscreen=no,status=yes');
	  remote.focus();
	  }
  
  </script>
    <h1>Editar  Imagen Puerta Norte</h1>
    <p>&nbsp;</p>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td width="93" align="right" nowrap="nowrap">Strimagen:</td>
          <td width="341"><input type="text" name="strimagen" value="<?php echo htmlentities($row_datoimagen['strimagen'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /><input type="button" name="button" id="button" value="Examinar" onclick="javascript:subirimagen();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Strdescripcion:</td>
          <td><input type="text" name="strdescripcion" value="<?php echo htmlentities($row_datoimagen['strdescripcion'], ENT_COMPAT, 'iso-8859-1'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">Intestado:</td>
          <td><select name="intestado">
            <option value="1" <?php if (!(strcmp(1, htmlentities($row_datoimagen['intestado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Activado</option>
            <option value="0" <?php if (!(strcmp(0, htmlentities($row_datoimagen['intestado'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Desactivado</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="Actualizar registro" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="id_puertanorte" value="<?php echo $row_datoimagen['id_puertanorte']; ?>" />
    </form>
    <p>&nbsp;</p>
  <!-- InstanceEndEditable -->
    
    <!-- end .content --></div>
  <div class="footer">
    <?php include("../includes/pie_admin.php"); ?></div>
  <!-- end .container --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($datoimagen);
?>
