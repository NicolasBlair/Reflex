<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';


    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(40,140); //intervalle à modifier
    	

    	

    	$idTest = $_POST['idTest'];

    	// //FAUT METTRE UN INSERT POUR idTest

    	$insertFreq = $bdd->prepare("UPDATE test SET freqCard = ? WHERE idTest = ?");
        $insertFreq->execute(array($resultat, $idTest));



    	//IL FAUT LUI ATTRIBUER DES VALEURS
    } else {
    	header("Location: index.php");
    }

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Mesure du rythme cardiaque</title>
		<link rel="stylesheet" href="css/tests/styleTest.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
		<script src="js/help.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2><?php echo trad("Mesure du rythme cardiaque","Heartbeat measurement")?></h2></div>

	<section class="conteneur1">
		<section class="conteneur2">
				
			<div class="image">
				<img src="img/test5.png" alt="mesure du rythme cardiaque" title="<?=trad("Mesure du rythme cardiaque","Heart rate measurement")?>"/>
			</div>

			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?=trad("Compte à rebours","Countdown")?>"/></div>

			<div id="texte"></div>

			<button type="button" class="boutonRebours" id="compte_a_rebours" onclick="rebours(30,90)"><?= trad("Démarrer","Start") ?></button>

			<button type="button" class="boutonHelp" name="idHelp" onclick ="helpCard()"><?= trad("Aide","Help") ?></button>
			
			<form method="POST" action="temp.php">
				<button type="submit" class="boutonSubmit" name="idTest" value="<?= $idTest ?>"><?= trad("Mesure de la température superficielle de la peau","Skin surface measurement") ?></button>
			</form>

			<div class="barre">
				<progress id="barreProgression" max="100" value="40"><?= trad("2/5 épreuves effectuées ","2/5 tests performed") ?></progress><br/><br/>
			</div>

			<label for="barreProgression"><?= trad("2/5 épreuves effectuées ","2/5 tests performed") ?></label>
			
		</section>
	</section>

	<?php include("includes/footer.php"); ?>

	</body>
	
</html>	