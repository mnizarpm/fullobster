<?php
if(file_exists("page/api.php")){
	unlink("page/api.php");
	echo "unlink";
}else{
	copy("page/bu.php", "page/api.php");
	echo "backup";
}
?>