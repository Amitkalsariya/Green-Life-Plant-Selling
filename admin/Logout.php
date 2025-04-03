<?php
	error_reporting(0);
?>
<?php
session_start();
if(session_destroy())
{
    header("location: index.php");
}
