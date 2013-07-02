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
$query_datosSlider = "SELECT * FROM tblslider WHERE tblslider.intEstado=1";
$datosSlider = mysql_query($query_datosSlider, $conexionconstructora) or die(mysql_error());
$row_datosSlider = mysql_fetch_assoc($datosSlider);
$totalRows_datosSlider = mysql_num_rows($datosSlider);
?>
<link rel="stylesheet" href="css/estiloslider.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="css/sliderdefault.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
 <?php $contador=1?>
 <div id="wrapper">
 <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider"> 
              <?php do { ?>
              <img src="documentos/img_slider/<?php echo $row_datosSlider['strImagen']; ?>" width="990px" height="394px" alt=""title="<?php echo $row_datosSlider['strDescripcion']; ?>" name="imagen_$contador<?php echo $contador; ?>" id="imagen_$contador" />
                <?php $contador++;} while ($row_datosSlider = mysql_fetch_assoc($datosSlider)); ?>
              
            </div>
    </div>
    </div>
 <?php
mysql_free_result($datosSlider);
?>
