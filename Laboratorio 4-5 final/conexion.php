<?php
$con=new mysqli("localhost","root","","db_citas_medicas");
if ($con->connect_error)    
    { 
        die ("conexion fallada".$con->connect_error);
    }
			
	?>