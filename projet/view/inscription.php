<?php
	require_once "./librairies/template.inc";

	$tpl = new template();
	$tpl->set_file("page","view/template.html");

	$tpl->set_block("page","zone_onglet","bloc1");
	$tpl->set_var("titreOnglet", " - Inscription");
	$tpl->parse("bloc1","zone_onglet",true);


	$tpl->set_block("page","zone_contenu","bloc2");
	$contenu = '
		<div class="formulaire" id="Inscription">
			<form method="post" action="index.php?page=inscription">
			
				<div class="form-group">
					<label>Email</label><br />
					<input type="email" name="mail" placeholder="Votre mail" required><br /><br />

					<label>Nom</label><br />
					<input type="text" name="nom" placeholder="Votre pseudo" required><br /><br />
					
					<label>Mot de passe</label><br />
					<input type="password" name="pass" required><br /><br />


				</div>
					<fieldset>
					<legend>Adresse</legend>
						<div class="haut">							
							<div class="gauche">
								<label for="numero">N° </label> <br />
								<input type="text" name="numero" id="petitInput0" placeholder="N° rue" required>
							</div>
							<div class="droite">
								<label for="rue">Rue </label> 
								<input type="text" name="rue" placeholder="Nom de la rue" required>
							</div>
						</div><br /><br />
						<div class="bas">								
							<div class="gauche">
								<label for="code_p">Code Postal </label> 
								<input type="text" name="code_p" id="petitInput1" placeholder="Code Postal" required>
							</div>
							<div class="droite">
								<label for="ville">Ville </label> 
								<input type="text" name="ville" required placeholder="Nom de votre ville" required><br /><br />
							</div>	
						</div>
				</fieldset>
				<input type="submit" value="Valider" class="inputButtons"/>
			</form>
		</div>';
		

	if ($_SESSION['message'] != "") {
		$contenu = $contenu . '
			<script>
				displayOverlay();
			</script>';
		$tpl->set_var("overlay", $_SESSION['message']);
		$_SESSION['message'] = "";
	}
	

	$tpl->set_var("titre", "<h1>Inscription<hr></h1>");
	$tpl->set_var("contenu", $contenu);

	$tpl->parse("bloc2","zone_contenu",true);


	//$tpl->set_block("page","zone_panier","bloc3");
	//$tpl->set_var("montantPanier", " : " . $montant . "€");
	//$tpl->parse("bloc3","zone_panier",true);


	$tpl->set_block("page","zone_menu","bloc4");
	$tpl->set_var("menu", $menu);
	$tpl->set_var("bouton", $bouton);

	if($panier){
		$tpl->set_var("montantPanier", " : " . $montant . "€");
	}

	$tpl->parse("bloc4","zone_menu",true);

	$tpl->pparse("view","page");
?>