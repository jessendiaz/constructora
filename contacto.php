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
$query_departamento = "SELECT * FROM tbldepartamento";
$departamento = mysql_query($query_departamento, $conexionconstructora) or die(mysql_error());
$row_departamento = mysql_fetch_assoc($departamento);
$totalRows_departamento = mysql_num_rows($departamento);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>



<!-- InstanceBegin template="/Templates/plantillabase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<link href='http://fonts.googleapis.com/css?family=Arbutus+Slab' rel='stylesheet' type='text/css'>
<?php $menuseleccionado=6;?>
<title>Contacto | Constructora Alcantara</title>
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

    <h1><img src="images/iconespiral.png" width="22" height="22" /> Contacto</h1>
    
  <form action="enviar.php" method="post" id="form1" name="form1">
    <table width="579" border="0">
      <tr>
        <td width="255" align="right"><span class="obligatorio">*</span>Nombre Completo:</td>
        <td width="304"><span id="sprytextfield1">
          <input name="nombre" type="text" required id="nombre" size="30"/>
          <span class="textfieldRequiredMsg">Se necesita un valor.</span></span></td>
        </tr>
      <tr>
        <td align="right" valign="top"><span class="obligatorio">*</span>Correo:</td>
        <td><span id="sprytextfield2">
          <input name="correo" type="text" required id="correo" size="30"/>
          <span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
        </tr>
      <tr>
        <td align="right">Direcci&oacute;n:</td>
        <td><input name="direccion" type="text" id="direccion" size="30" /></td>
        </tr>
      <tr>
        <td align="right">Tel&eacute;fono</td>
        <td><input name="telefono" type="text" id="telefono" size="30" /></td>
        </tr>
      <tr>
        <td align="right">Mensaje al area:</td>
        <td><select name="menudepartamento" id="menudepartamento">
          <?php
do {  
?>
          <option value="<?php echo $row_departamento['strnombre']?>"><?php echo $row_departamento['strnombre']?></option>
          <?php
} while ($row_departamento = mysql_fetch_assoc($departamento));
  $rows = mysql_num_rows($departamento);
  if($rows > 0) {
      mysql_data_seek($departamento, 0);
	  $row_departamento = mysql_fetch_assoc($departamento);
  }
?>
        </select></td>
        </tr>
      <tr>
        <td align="right"><span class="obligatorio">*</span>Mensaje:</td>
        <td><span id="sprytextarea1">
          <textarea name="mensaje" id="mensaje" required="required" cols="45" rows="5"></textarea>
          <span id="countsprytextarea1">&nbsp;</span><span class="textareaMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td ><input class="btnimageningresar" type="submit" name="enviar" value=""  />
        <span class="obligatorio">* Campos Obligatorios</span></td>
        <td width="6"></td>
        </tr>
      </table>
  </form>
  <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {isRequired:false, validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {isRequired:false, maxChars:500, counterId:"countsprytextarea1", counterType:"chars_remaining", validateOn:["change"]});
  </script>
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
mysql_free_result($departamento);
?>
