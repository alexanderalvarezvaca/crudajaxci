<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
	
	foreach ($maestros as $key => $value) {
		echo "<h4><small>$value->mae_id</small> $value->mae_name<br><small>$value->mae_detail</small><h4>";
	}
	
?>