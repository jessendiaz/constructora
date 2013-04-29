  
<div id='cssmenu'>

<ul>
   <li><a href='index.php'<?php if($menuseleccionado==1){?>class="seleccionado"<?php }?>>Inicio</a></li>
   <li><a href='empresa.php'<?php if($menuseleccionado==2){?>class="seleccionado"<?php }?>>Empresa</a></li>
   <li class='has-sub '><a href='enventa.php'<?php if($menuseleccionado==3){?>class="seleccionado"<?php }?>>Proyectos en venta</a>
      <ul>
        <li ><a href='#'>Proyecto 1</a> </li>      
      </ul>
   </li>
   <li class='has-sub'><a href='enconstruccion.php'<?php if($menuseleccionado==4){?>class="seleccionado"<?php }?>>Proyectos en construcci&oacute;n</a>
      <ul>
        <li class='has-sub '><a href='#'>Proyecto 1</a> </li>      
        <li class='has-sub '><a href='#'>Proyecto 2</a>
         </li>
      </ul>
   </li>
   <li><a href='serviciocliente.php'<?php if($menuseleccionado==5){?>class="seleccionado"<?php }?>>Servicio al cliente</a></li>
   <li><a href='contacto.php'<?php if($menuseleccionado==6){?>class="seleccionado"<?php }?>>Contacto</a></li>
</ul>

</div>