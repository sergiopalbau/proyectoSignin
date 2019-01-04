<?php

?>

 <div class="">
    <nav class="navbar navbar-light nav-fill" style="background-color: #e3f2fd;">
	    <ul class="nav nav-pills">
	     <li class="nav-item">
	       <a class="nav-link  <?php echo $menu2['explotaciones'];?>"" href="<?php echo base_url."sadmin.php/?controller=Explotacion&action=index"?>">Explotaciones</a>
	     </li>
	     <li class="nav-item">
	       <a class="nav-link <?php echo $menu2['instalaciones'];?>" href="<?php echo base_url."sadmin.php/?controller=Instalacion&action=index"?>">Instalaciones</a>
	     </li>
	     <li class="nav-item">
	       <a class="nav-link <?php echo $menu2['operarios'];?> " href="<?php echo base_url."sadmin.php/?controller=Usuario&action=index"?>">Operarios</a>
	     </li>
	   </ul>
	 </nav>
 </div>
