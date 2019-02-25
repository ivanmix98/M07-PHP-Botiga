<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<TITLE>Accés a la sessió com a user</TITLE>
</HEAD>
<BODY>
<?php
  if(($_POST['Rebut'])){

    $nom_fitxer="rebut.txt";
    $compra=$_COOKIE[ 'tvcookie' ]." - TV de 80 pulgades"."\r\n".$_COOKIE[ 'ps4cookie' ]." - PS4 de 1TB"."\r\n".$_COOKIE[ 'tecladocookie' ]." - Teclat amb llums LED"."\r\n";
    if (file_exists($nom_fitxer)){
        $fitxer=fopen($nom_fitxer,"a") or die ("No s'ha pogut efectuar el rebut");
        fwrite($fitxer,$compra);
        fclose($fitxer);
        echo "S'ha efectuat el rebut";
}	else 
    $fitxer=fopen($nom_fitxer,"w") or die ("No s'ha pogut crear el rebut");
    fwrite($fitxer,$compra);
    fclose($fitxer);
    echo "S'ha creat el rebut<br>";


}
?>
</BODY>
</HTML>