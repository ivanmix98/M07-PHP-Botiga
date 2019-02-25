<?php session_start(); ?>
<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<TITLE>Accés al despatx</TITLE>
</HEAD>
<BODY>
	<?php
//	session_start();
	$_SESSION['acces']=0;
	session_destroy();
	echo "Heu sortit del sistema<BR><BR>\n";
	echo "<a href=index.html class='btn btn-primary m-4'>Torneu a l'inici</a>\n";
	print '<META HTTP-EQUIV="refresh" CONTENT="2;URL=./index.html">';
	?>
</BODY>
</HTML>	
