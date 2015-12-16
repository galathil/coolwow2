			<h2>Etape 1 - compatibilité de l'environnement :</h2>
			<p>Version de PHP (au minimum <?= $min_version ?>) : <span class="<?= $b_min_version ? 'green': 'red' ?> fwb"><?= PHP_VERSION ?></span></p>
			<p>Paramètre register_globals désactivé : <span class="<?= $b_register_globals_disabled ? 'green': 'red' ?> fwb"><?= $b_register_globals_disabled ? 'Oui': 'NON' ?></span></p>
			<p>Librairie GD installée : <span class="<?= $b_lib_gd ? 'green': 'red' ?> fwb"><?= $b_lib_gd ? 'Oui': 'NON' ?></span></p>
			<p>Réécriture d'url activée : <span class="<?= $b_rewrite_module ? 'green': 'red' ?> fwb"><?= $b_rewrite_module ? 'Oui': 'NON' ?></span></p>
			<p>Prenez soin de désactiver l'affichage des erreurs PHP si vous êtes en production !</p>
			
			<?php if($b_min_version && $b_register_globals_disabled && $b_lib_gd && $b_rewrite_module) : ?>
				<p class="tac"><br/><br/><a href="index.php?etape=2">Cliquez ici pour passer à la prochaine étape !</a><br/><br/></p>
			<?php else : ?>
				<p class="tac fwb red"><br/><br/>Environnement incompatible : corrigez les problèmes et actualisez cette page.<br/><br/></p>
			<?php endif; ?>