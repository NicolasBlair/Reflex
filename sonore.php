<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=reflex', 'root', '');
    include 'function/cookie.php';
    include 'function/numberUserLive.php';


    if(isset($_POST['idTest']) AND !empty($_POST['idTest'])){
    	

    	$resultat = rand(40,50); //intervalle à modifier


    	$idTest = $_POST['idTest'];

    	

    	$insertSon = $bdd->prepare("UPDATE test SET refSonore = ? WHERE idTest = ?");
        $insertSon->execute(array($resultat, $idTest));
        
    } else {
    	header("Location: index.php");
    }

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Réflexe sonore</title>
		<link rel="stylesheet" href="css/tests/styleTest.css" />
		<script type="text/javascript" src="js/rebours.js"></script>
		<script src="js/help.js"></script>
	</head>

	<body>

	<?php include("includes/header.php"); ?>

	<div class="titre"><h2><?= trad("Réflexe sonore","Sound reflex") ?></h2></div>

	<section class="conteneur1">
		<section class="conteneur2">
				
			<div class="image">
				<img src="img/test9.png" alt="sonore" title="<?=trad("Mesure à un stimulus sonore","Measurement to a sound stimulus")?>"/>
			</div>

			<div class="rebours"><img src="img/compteRebours.jpg" alt="compteRebours" title="<?=trad("Compte à rebours","Countdown")?>"/></div>

			<div id="texte"></div>

			<button type="button" class="boutonRebours" id="compte_a_rebours" onclick="rebours(30,90)"><?= trad("Démarrer","Start") ?></button>

			<button type="button" class="boutonHelp" name="idHelp" onclick ="helpSonore()"><?= trad("Aide","Help") ?></button>
			
			<form method="POST" action="visuel.php">
				<button type="submit" class="boutonSubmit" name="idTest" value="<?= $idTest ?>"><?= trad("Réflexe visuel","Visual reflex") ?></button>
			</form>

			<div class="barre">
				<progress id="barreProgression" max="100" value="80"><?= trad("4/5 épreuves effectuées","4/5 tests performed") ?></progress><br/><br/>
			</div>

			<label for="barreProgression"><?= trad("4/5 épreuves effectuées","4/5 tests performed") ?></label>

		</section>
	</section>

	<?php include("includes/footer.php"); ?>

	</body>
</html>	