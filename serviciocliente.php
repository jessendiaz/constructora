<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<!-- InstanceBegin template="/Templates/plantillabase.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<link href="images/iconespiral.ico" type="image/x-icon" rel="shortcut icon" />
<link href='http://fonts.googleapis.com/css?family=Arbutus+Slab' rel='stylesheet' type='text/css'>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<?php $menuseleccionado=5;?>
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

    <h1><img src="images/iconespiral.png" width="22" height="22" /> Servicio al cliente</h1>
    <p>Estimado Cliente, Constructora Alcántara Ltda. Pone a su disposición todos sus esfuerzos para dar solución a su problema, para orientarlo en uso y para dar los mejores consejos de la correcta mantención de su vivienda</p>
    <p>Contáctese con nosotros y un profesional del área lo visitara.</p>
    
    <form action="enviar2.php" method="post" id="form1" name="form1">
      <table width="579" border="0">
        <tr>
          <td width="255" align="right"><span class="obligatorio">*</span>Nombre Completo:</td>
          <td width="304"><input name="nombre" type="text" id="nombre" required="required" size="30" /></td>
        </tr>
        <tr>
          <td align="right" valign="top"><span class="obligatorio">*</span>Correo:</td>
          <td><span id="sprytextfield1">
          <input name="correo" type="text" id="correo" required="required"size="30" />
          <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></td>
        </tr>
        <tr>
          <td align="right"><span class="obligatorio">*</span>Direcci&oacute;n:</td>
          <td><input name="direccion" type="text" id="direccion" required="required" size="30" /></td>
        </tr>
        
        
        <tr>
          <td align="right"><span class="obligatorio">*</span>Problema:</td>
          <td><span id="sprytextarea2">
          <textarea name="problema" id="problema" required="required" cols="45" rows="5"></textarea>
          <span id="countsprytextarea2">&nbsp;</span><span class="textareaRequiredMsg">Se necesita un valor.</span><span class="textareaMaxCharsMsg">Se ha superado el número máximo de caracteres.</span></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td ><input class="btnimageningresar" type="submit" name="enviar" value=""  /> <span class="obligatorio">* Campos Obligatorios</span></td>
          <td width="6"></td>
        </tr>
      </table>
    </form>

 
    
    <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["change"]});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {maxChars:500, counterId:"countsprytextarea2", counterType:"chars_remaining"});
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
