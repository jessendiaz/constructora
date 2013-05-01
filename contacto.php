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
$query_empleados = "SELECT * FROM tblempleados";
$empleados = mysql_query($query_empleados, $conexionconstructora) or die(mysql_error());
$row_empleados = mysql_fetch_assoc($empleados);
$totalRows_empleados = mysql_num_rows($empleados);
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
  <div class="content"><!-- InstanceBeginEditable name="cuerpo" -->
    <h1>Contacto</h1>
    <p>Tenga e</p>
    <form action="enviar.php" method="post"><table width="679" border="0">
      <tr>
        <td width="230" align="right">*Nombre Completo:</td>
        <td width="439"><span id="sprytextfield1">
        <input name="nombre" type="text" id="nombre" size="30" />
        <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldMinCharsMsg">Escriba su nombre.</span></span></td>
        </tr>
      <tr>
        <td align="right">*Correo:</td>
        <td><span id="sprytextfield2">
        <input name="correo" type="text" id="correo" size="30" />
        <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no v�lido.</span></span></td>
        </tr>
      <tr>
        <td align="right">Direcci&oacute;n:</td>
        <td><input name="direccion" type="text" id="direccion" size="30" /></td>
        </tr>
      <tr>
        <td align="right">Telefono:</td>
        <td><span id="sprytextfield3">
        <input name="telefono" type="text" id="telefono" size="30" />
<span class="textfieldInvalidFormatMsg">Formato no v�lido.</span></span></td>
        </tr>
      <tr>
        <td align="right">Enviar al area de:</td>
        <td><select name="menuarea" id="menuarea">
          <?php
do {  
?>
          <option value="<?php echo $row_empleados['strarea']?>"><?php echo $row_empleados['strarea']?></option>
          <?php
} while ($row_empleados = mysql_fetch_assoc($empleados));
  $rows = mysql_num_rows($empleados);
  if($rows > 0) {
      mysql_data_seek($empleados, 0);
	  $row_empleados = mysql_fetch_assoc($empleados);
  }
?>
        </select></td>
        </tr>
      <tr>
        <td align="right">Mensaje:</td>
        <td><span id="sprytextarea1">
        <textarea name="mensaje" id="mensaje" cols="45" rows="5"></textarea>
        <span id="countsprytextarea1">&nbsp;</span><span class="textareaMaxCharsMsg">Se ha superado el n�mero m�ximo de caracteres.</span><span class="textareaRequiredMsg">Se necesita un valor.</span></span></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><a class="button" href="javascript:document.form1.submit();"><span>Enviar</span></a></td>
        </tr>
  </table>
</form>
    
    
   
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:3});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:500, counterId:"countsprytextarea1", counterType:"chars_remaining"});
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
mysql_free_result($empleados);
?>
