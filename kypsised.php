
<?php include("config.php"); ?>
<?php 

//kontrollime kas küpsised on olemas 
//kui pole, siis tekitame 
//kui on, lisame väärtusele ühe juurde 
if (!isset($_COOKIE["nimi"])) { 
	setcookie("nimi", 1, time()+3600); 
	echo "See on sinu esimene kylastus"; 
	} else { 
		$kylastus = $_COOKIE["nimi"]; 
		$kylastus++; 
		setcookie("nimi", $kylastus, time()+3600); 
		echo "See on sinu $kylastus kord<br>"; 
//kustutamise osa 
//loome lingi, kus k=1 
	$sait = $_SERVER["PHP_SELF"]; 
	echo "<a href='$sait?k=1'>Kustuta küpsised</a>";
	//kui k=1, siis muudame küpsise tähtaega 
	//ja suuname esilehele tagasi 
	if (!empty($_GET['k'])) { 
		$k = $_GET['k']; 
		if ($k==1) { 
			echo "$k"; 
			setcookie("nimi", $kylastus, time()-3600); 
			header("location: $sait"); 
		} 
	} 
}
?>