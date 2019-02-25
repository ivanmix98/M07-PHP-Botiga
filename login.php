<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<TITLE>Accés a la sessió com a user</TITLE>
</HEAD>
<BODY>
<?php
session_start();
  if(($_POST["nom"]!="") && ($_POST["clau"]!="")) {

	$nom_fitxer="usuaris.txt";
	if (file_exists($nom_fitxer)){
		$fitxer=fopen($nom_fitxer,"r") or die ("No es pot llegir la llista d'usuaris de l'aplicació");
		$validat=FALSE;
		while (!feof($fitxer) && ($validat == FALSE)){
			$usuari=explode(":",fgets($fitxer));
			if (($usuari[0] == $_POST["nom"]) && ($usuari[1] == $_POST["clau"])) $validat=TRUE;
		}
		fclose($fitxer);
		if ($validat) {
			$_SESSION['acces']=1;
			$_SESSION["nom"] = $_POST["nom"];
			echo  "<a href=botiga/shop.php class='btn btn-primary m-4'>Compra</a>";
			if($_SESSION["nom"] == 'admin'){
			echo " <p class='ml-1'>Hola admin </p> <a href=register.html class='btn btn-link ml-1'>Registra un compte aquí</a>";
		}
        //require '../pasapalabra/pasapalabra.php';
			//Nota 1: substr($usuari[2],0,3) llegeix els 3 primer caràcters de la cadena $usuari[2]
			//Nota 2: S'ha de fer perquè dins de la cadena $usuari[2] també està el canvi de línia \n
			//if (substr($usuari[2],0,3) == "adm") echo "L'usuari <b>".$_POST["nom"]."</b> ha estat validat. Aquest usuari pot utilitzar l'aplicació amb permissos d'administrador.<br>";
		//	else echo "L'usuari <b>".$_POST["nom"]."</b> ha estat validat. Aquest usuari pot utilitzar l'aplicació amb permissos d'usuari estàndard.<br>";
    //  require '../pasapalabra/pasapalabra.php';
		}
		else echo "L'usuari <b>".$_POST["nom"]."</b> no ha pogut ser validat. Aquest usuari no pot utilitzar l'aplicació<br>";
	}
	else echo "Encara no s'ha creat la llista d'usuaris de l'aplicació. No es pot validar l'usuari <b>".$_POST["nom"]."</b><br>";
				
  }
	else echo "<b>NO HI HA DADES DISPONIBLES PER LA VALIDACIÓ DE  L'USUARI DE L'APLICACIÓ</b><br>";
			 
  //header("refresh: 3; url=user_ok.html");
?>
</BODY>
</HTML>