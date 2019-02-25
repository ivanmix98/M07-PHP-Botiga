<HTML>
<HEAD>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<TITLE>Benvingut</TITLE>
</HEAD>
<BODY>

<?php session_start(); 
	//session_start();
	$valor = $_SESSION['acces'];
	
	if ($_SESSION['acces']!="1"){
		//echo "No s'ha iniciat correctament aquesta sessió";
		echo "No heu accedit correctament";
		print '<META HTTP-EQUIV="refresh" CONTENT="1;URL=../index.html">';
	}else{ 
		$usuari = 	$_SESSION["nom"];
		if($usuari == 'admin'){
			echo "Conectat com: admin";
			echo "<h1 class='ml-5'>AFEGIR PRODUCTE</h1>";
			echo " <FORM enctype='multipart/form-data' METHOD=POST ACTION=shop.php class='ml-2'>";
            echo "Nom producte : <INPUT TYPE=TEXT NAME=nom class='ml-4'><BR><BR>";
			echo " Descripció breu :  <INPUT TYPE=TEXT NAME=descripcio class='ml-3'><BR><BR>";
			echo " Preu del producte:  <INPUT TYPE=TEXT NAME=preu class='ml-1'><BR><BR>";
			echo " Imatge ruta:  <INPUT TYPE=TEXT NAME=imatge class='ml-3'><BR><BR>";
			echo " <INPUT TYPE=SUBMIT VALUE='Tramet' class='btn btn-dark ml-2'>";
			echo " </FORM>";

			if(($_POST['nom']!="") && ($_POST["descripcio"]!="") && ($_POST["preu"]!="") && ($_POST['imatge']!="")) {

				echo "<div class='ml-3'>";
				echo "<table class='bg-light' > ";
				echo "<tr>"; 
				echo "<td width='150'>";
				echo "<img src=" .$_POST['imatge'] .">";
				echo "<br />";
				echo $_POST['nom'];
				echo "<br />";
				echo $_POST['descripcio'];
				echo "<br />";
				echo $_POST['preu'] ;
				echo " €";
				echo "<br />";
				echo "<form>";
				echo "<input type='Submit' class='btn btn-outline-primary btn-sm' name='comprar' id='button3' value='Afegir a la cistella'>";
				echo "<input type='Submit' class='btn btn-outline-danger btn-sm' name='borrar' id='button3' value='Borrar producte'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";

			}else echo "";
			

		} else echo "Conectat com: ".$usuari;
		//echo "Valor de la sessió : $valor<BR>\n";
		//echo "Benvingut a la pàgina privada<BR><BR>\n";
		//echo "<a href=surt.php>Surt de la sessió</a>\n";

		class Titol{
			private $titol;

			function __construct($titol){
				$this->titol = $titol;
			}
			public function __toString()
   			 {
				return $this->titol;
    		}
		}
		class Producte{
			
			private $imatge;
			public $nom;
			private $descripcio;
			private $preu;
			private $cookie;
			private $nocookie;
		
			function __construct($imatge,$nom, $descripcio, $preu,$cookie,$nocookie) {
				$this->imatge = $imatge;
				$this->nom = $nom;
				$this->descripcio = $descripcio;
				$this->preu = $preu;
				$this->cookie = $cookie;
				$this->nocookie = $nocookie;
			}
			public function oferta(){
				print "2x1 la semana del Black Friday!!";
			}
			
			public function comparar($producte){
				return $producte->preu > $this->preu;
			}

			public function __clone(){ 
				$this->_nom = 'TV two'; 
			}

			function info() {
				echo "<div class='ml-3'>";
				echo "<table class='bg-light float-left' > ";
				echo "<tr>"; 
				echo "<td width='150'>";
				echo "$this->imatge\n";
				echo "<br />";
				echo "$this->nom\n";
				echo "<br />";
				echo "$this->descripcio\n";
				echo "<br />";
				echo "$this->preu € \n";
				echo "<br />";
				echo "<form action='shop.php' method='post'>";
				echo "<input type='Submit' class='btn btn-outline-primary btn-sm' name='$this->cookie' id='button3' value='Afegir a la cistella'>";
				
				echo "<input type='Submit' class='btn btn-outline-danger btn-sm' name='$this->nocookie' id='button3' value='Borrar producte'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
				echo "</table>";
				echo "</div>";
				
			}
		}

		class Oferta extends Producte{
				
			
			public function oferta(){
				echo "2x1 proximament a la setmana del Black Friday!!";
			}
		}

		
		
		
		$titol= new Titol("Llista de productes");
		echo "<h1 class='ml-5'>".$titol ."</h1>";
		
		$producte1= new Producte("<img src=../tv.png width=150 height=100>","TV", "80 Pulgadas", "1500","tvcookie","tvnocookie");
		
		
		$producte1->info();
		//$producte1->oferta(); 
		//$producte00= new Oferta(); Instancia de la clase filla
		$producte2= new Producte("<img src=../ps4.png width=150 height=100>","PS4", "1TB", "400","ps4cookie","ps4nocookie");
		
		$producte2->info();

		

		$producte3= new Producte("<img src=../teclado.png width=150 height=100>","Teclat", "Llums LED", "89","tecladocookie","tecladonocookie");
		$producte3->info();
		
		
				echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
				
			echo "<form action='' method='post'><br>";
			echo "<input type='checkbox' name='Comparar' value='1'>Comparar preu<br<br>";
			echo "<br><input class='btn btn-primary ml-2' type='submit' name='enviar' value='Enviar'/>";
			echo "</form>";

				//Comparar objetos
				if(isset($_POST['enviar'])){
					if (isset($_POST['Comparar']) && $_POST['Comparar'] == '1'){
						if($producte1->comparar($producte2)){
					echo 'La ' . $producte2->nom . ' és més car';
					echo "<br><br>";
				}else {
					echo 'La ' . $producte1->nom . ' és més car';
					echo "<br><br>";
				}
				$producte1->comparar($producte2);
			}else echo "";
			
			}

			echo "<form action='' method='post'><br>";
			echo "<input type='checkbox' name='Clonar' value='1'>Clonar TV<br<br>";
			echo "<br><input class='btn btn-primary ml-2' type='submit' name='enviar2' value='Enviar'/>";
			echo "</form>";

			if(isset($_POST['enviar2'])){
				if (isset($_POST['Clonar']) && $_POST['Clonar'] == '1'){
		$producte4 = clone $producte1;
		echo "<br><br>";
		var_dump($producte1);
		echo "<br><br>";
		var_dump($producte4); 
				} else echo "";
			}

?>
		<div class='ml-2'>
		<br><br><h1>En la cistella tens els següents productes</h1>
<?php
		if(isset($_POST['tvcookie'])){
			
			setcookie( 'tvcookie', $_COOKIE[ 'tvcookie' ] + 1, time() + 3600 * 24 );
			
		}
			if($_COOKIE[ 'tvcookie' ]!=0){
			$mensaje = 'TV: '.$_COOKIE[ 'tvcookie' ];
			echo $mensaje .'<br>';}

		if(isset($_POST['tvnocookie'])){
				if ( isset( $_COOKIE[ 'tvcookie' ] ) ) {
			
					setcookie( 'tvcookie', $_COOKIE[ 'tvcookie' ] -$_COOKIE[ 'tvcookie' ], time() + 3600 * 24 );
					
				}
			}

		if(isset($_POST['ps4cookie'])){
			
			setcookie( 'ps4cookie', $_COOKIE[ 'ps4cookie' ] + 1, time() + 3600 * 24 );
		}
		if($_COOKIE[ 'ps4cookie' ]!=0){
			$mensaje2 = 'PS4: '.$_COOKIE[ 'ps4cookie' ];
			echo $mensaje2.'<br>';}

		if(isset($_POST['ps4nocookie'])){
				if ( isset( $_COOKIE[ 'ps4cookie' ] ) ) {
			
					setcookie( 'ps4cookie', $_COOKIE[ 'ps4cookie' ] -$_COOKIE[ 'ps4cookie' ], time() + 3600 * 24 );
					
				}
			}

		if(isset($_POST['tecladocookie'])){
			
				setcookie( 'tecladocookie', $_COOKIE[ 'tecladocookie' ] + 1, time() + 3600 * 24 );
				
			}
				if($_COOKIE[ 'tecladocookie' ]!=0){
				$mensaje3 = 'Teclat: '.$_COOKIE[ 'tecladocookie' ];
				echo $mensaje3 .'<br>';}
	
			if(isset($_POST['tecladonocookie'])){
					if ( isset( $_COOKIE[ 'tecladocookie' ] ) ) {
				
						setcookie( 'tecladocookie', $_COOKIE[ 'tecladocookie' ] -$_COOKIE[ 'tecladocookie' ], time() + 3600 * 24 );
						
					}
				}	

			$tv=1500*$_COOKIE[ 'tvcookie' ];
			$ps4=400*$_COOKIE[ 'ps4cookie' ];
			$teclado=89*$_COOKIE[ 'tecladocookie'];
			$total=$tv+$ps4+$teclado;
			if($total!=0){
			echo "------------"."<br>";
			echo "Total: " . $total . " €";
			echo "<form action='' method='post'><br>";
			echo "<input type='Submit' class='btn btn-success' name='Comprar' value='Confirmar compra'>";
			echo "</form>";}

			else
			{echo "Cistella buida";};

			
?>
		
	
		
		</div>

		

<?php
	if(isset($_POST['Comprar'])){
		echo "<div class='ml-2'>";
		echo "Has comprat: <br><br>";
		
		echo $_COOKIE[ 'tvcookie' ]. ' - TV de 80 pulgades<br>';
		
		echo $_COOKIE[ 'ps4cookie' ]. ' - PS4 de 1TB<br>';
		
		echo $_COOKIE[ 'tecladocookie' ]. ' - Teclat amb llums LED<br>';
		echo "</div><br><br>";

		echo "<form action='rebut.php' method='post'><br>";
			echo "<input type='Submit' class='btn btn-warning' name='Rebut' value='Descarregar rebut'>";
			echo "</form>";

			


	}
}
	?>
<BR><br><a href=../logout.php class='btn btn-dark ml-2'>Surt de la sessió</a><br><br>
</BODY>
</HTML>

