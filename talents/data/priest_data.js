var i = 0;
var t = 0;

var className = "Talents de prêtre";
var talentPath = "/info/basics/talents/";

tree[i] = "Discipline"; i++;
tree[i] = "Sacré"; i++;
tree[i] = "Ombre"; i++;

i = 0;

talent[i] = [0, "Volonté inflexible", 5, 2, 1]; i++;
talent[i] = [0, "Disciplines jumelles", 5, 3, 1]; i++;
talent[i] = [0, "Résolution silencieuse", 3, 1, 2]; i++;
talent[i] = [0, "Feu intérieur amélioré", 3, 2, 2]; i++;
talent[i] = [0, "Mot de pouvoir : Robustesse amélioré", 2, 3, 2]; i++;
talent[i] = [0, "Martyre", 2, 4, 2]; i++; 
talent[i] = [0, "Mot de pouvoir : Bouclier amélioré", 3, 1, 3]; i++;
talent[i] = [0, "Focalisation améliorée", 1, 2, 3]; i++;
talent[i] = [0, "Méditation", 3, 3, 3]; i++;
talent[i] = [0, "Absolution", 3, 1, 4]; i++;
talent[i] = [0, "Sagacité", 5, 2, 4]; i++;
talent[i] = [0, "Brûlure de mana améliorée", 2, 4, 4]; i++;
talent[i] = [0, "Force mentale", 5, 2, 5]; i++;
talent[i] = [0, "Esprit divin", 1, 3, 5, [getTalentID("Méditation"),3]]; i++;
talent[i] = [0, "Esprit divin amélioré", 2, 4, 5, [getTalentID("Esprit divin"),1]]; i++;
talent[i] = [0, "Puissance focalisée", 2, 1, 6]; i++;
talent[i] = [0, "Illumination", 5, 3, 6]; i++;
talent[i] = [0, "Volonté focalisée", 3, 1, 7]; i++;
talent[i] = [0, "Infusion de puissance", 1, 2, 7, [getTalentID("Force mentale"),5]]; i++;
talent[i] = [0, "Bouclier réflecteur", 3, 3, 7]; i++;
talent[i] = [0, "Regain d'espoir", 2, 1, 8]; i++;
talent[i] = [0, "Extase", 5, 2, 8]; i++;
talent[i] = [0, "Aspiration", 2, 3, 8]; i++;
talent[i] = [0, "Egide divine", 3, 1, 9]; i++;
talent[i] = [0, "Suppression de la douleur", 1, 2, 9]; i++;
talent[i] = [0, "Grâce", 2, 3, 9]; i++;
talent[i] = [0, "Sursis", 5, 2, 10]; i++;
talent[i] = [0, "Pénitence", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//holy talents
talent[i] = [1, "Focalisation des soins", 2, 1, 1]; i++;
talent[i] = [1, "Rénovation améliorée", 3, 2, 1]; i++;
talent[i] = [1, "Spécialisation (Sacré)", 5, 3, 1]; i++;
talent[i] = [1, "Protection contre les sorts", 5, 2, 2]; i++;
talent[i] = [1, "Fureur divine", 5, 3, 2]; i++;
talent[i] = [1, "Prière du désespoir", 1, 1, 3]; i++;
talent[i] = [1, "Rétablissement béni", 3, 2, 3]; i++;
talent[i] = [1, "Inspiration", 3, 4, 3]; i++;
talent[i] = [1, "Allonge du Sacré", 2, 1, 4]; i++;
talent[i] = [1, "Soin amélioré", 3, 2, 4]; i++;
talent[i] = [1, "Lumière incendiaire", 2, 3, 4, [getTalentID("Fureur divine"),5]]; i++;
talent[i] = [1, "Prières guérisseuses", 2, 1, 5]; i++;
talent[i] = [1, "Esprit de rédemption", 1, 2, 5]; i++;
talent[i] = [1, "Direction spirituelle", 5, 3, 5]; i++;
talent[i] = [1, "Vague de Lumière", 2, 1, 6]; i++; 
talent[i] = [1, "Soins spirituels", 5, 3, 6]; i++;
talent[i] = [1, "Concentration sacrée", 3, 1, 7]; i++; 
talent[i] = [1, "Puits de lumière", 1, 2, 7, [getTalentID("Esprit de rédemption"),1]]; i++;
talent[i] = [1, "Résilience bénie", 3, 3, 7]; i++;
talent[i] = [1, "Soins surpuissants", 5, 2, 8]; i++;
talent[i] = [1, "Heureux hasard", 3, 3, 8]; i++;
talent[i] = [1, "Concentration sacrée améliorée", 3, 1, 9, [getTalentID("Concentration sacrée"),3]]; i++;
talent[i] = [1, "Cercle de soins", 1, 2, 9]; i++;
talent[i] = [1, "Epreuve de la Foi", 3, 3, 9]; i++; 
talent[i] = [1, "Providence divine", 5, 2, 10]; i++; 
talent[i] = [1, "Esprit gardien", 1, 2, 11]; i++; 
treeStartStop[t] = i -1;
t++;

//shadow talents
talent[i] = [2, "Connexion spirituelle", 3, 1, 1]; i++;
talent[i] = [2, "Connexion spirituelle améliorée", 2, 2, 1, [getTalentID("Connexion spirituelle"),3]]; i++;
talent[i] = [2, "Aveuglement", 5, 3, 1]; i++;
talent[i] = [2, "Affinité avec l'Ombre", 3, 1, 2]; i++;
talent[i] = [2, "Mot de l'ombre : Douleur amélioré", 2, 2, 2]; i++;
talent[i] = [2, "Focalisation de l'ombre", 3, 3, 2]; i++;
talent[i] = [2, "Cri psychique amélioré", 2, 1, 3]; i++;
talent[i] = [2, "Attaque mentale améliorée", 5, 2, 3]; i++;
talent[i] = [2, "Fouet mental", 1, 3, 3]; i++;
talent[i] = [2, "Ombres voilées", 2, 2, 4]; i++;
talent[i] = [2, "Allonge de l'Ombre", 2, 3, 4]; i++;
talent[i] = [2, "Tissage de l'ombre", 3, 4, 4]; i++;
talent[i] = [2, "Silence", 1, 1, 5, [getTalentID("Cri psychique amélioré"),2]]; i++;
talent[i] = [2, "Etreinte vampirique", 1, 2, 5]; i++;
talent[i] = [2, "Etreinte vampirique améliorée", 2, 3, 5, [getTalentID("Etreinte vampirique"),1]]; i++;
talent[i] = [2, "Esprit focalisé", 3, 4, 5]; i++; 
talent[i] = [2, "Fonte de l'esprit", 2, 1, 6]; i++;
talent[i] = [2, "Ténèbres", 5, 3, 6]; i++;
talent[i] = [2, "Forme d'Ombre", 1, 2, 7, [getTalentID("Etreinte vampirique"),1]]; i++;
talent[i] = [2, "Puissance de l'ombre", 5, 3, 7]; i++;
talent[i] = [2, "Forme d'Ombre améliorée", 2, 1, 8, [getTalentID("Forme d'Ombre"),1]]; i++;
talent[i] = [2, "Misère", 3, 3, 8]; i++; 
talent[i] = [2, "Horreur psychique", 2, 1, 9]; i++;
talent[i] = [2, "Toucher vampirique", 1, 2, 9, [getTalentID("Forme d'Ombre"),1]]; i++; 
talent[i] = [2, "Douleur et souffrance", 3, 3, 9]; i++;
talent[i] = [2, "Foi distordue", 5, 3, 10]; i++;
talent[i] = [2, "Dispersion", 1, 2, 11, [getTalentID("Toucher vampirique"),1]]; i++; 
treeStartStop[t] = i -1;
t++;

i = 0;


//Discipline Talents Begin


//Unbreakable Will - Discipline
rank[i] = [
		"Réduit la durée des effets d'étourdissement, de peur et de silence contre vous de 3% supplémentaires.",
		"Réduit la durée des effets d'étourdissement, de peur et de silence contre vous de 6% supplémentaires.",
		"Réduit la durée des effets d'étourdissement, de peur et de silence contre vous de 9% supplémentaires.",
		"Réduit la durée des effets d'étourdissement, de peur et de silence contre vous de 12% supplémentaires.",
		"Réduit la durée des effets d'étourdissement, de peur et de silence contre vous de 15% supplémentaires."
		];
i++;


	
//Twin Disciplines - Discipline
rank[i] = [
"Augmente de 1% les dégâts et les soins produits par vos sorts instantanés.",
"Augmente de 2% les dégâts et les soins produits par vos sorts instantanés.",
"Augmente de 3% les dégâts et les soins produits par vos sorts instantanés.",
"Augmente de 4% les dégâts et les soins produits par vos sorts instantanés.",
"Augmente de 5% les dégâts et les soins produits par vos sorts instantanés."
		];
i++;
				
		
//Silent Resolve - Discipline
rank[i] = [
		"Diminue la menace générée par vos sorts du Sacré et de Discipline de 7% et réduit la probabilité que vos sorts soient dissipés de 10%.",
		"Diminue la menace générée par vos sorts du Sacré et de Discipline de 14% et réduit la probabilité que vos sorts soient dissipés de 20%.",
		"Diminue la menace générée par vos sorts du Sacré et de Discipline de 20% et réduit la probabilité que vos sorts soient dissipés de 30%.",
		];

i++;	

//Improved Inner Fire - Discipline		
rank[i] = [
		"Augmente l'effet de votre sort Feu intérieur de 15%, et augmente son nombre total de charges de 4.",
		"Augmente l'effet de votre sort Feu intérieur de 30%, et augmente son nombre total de charges de 8.",
		"Augmente l'effet de votre sort Feu intérieur de 45%, et augmente son nombre total de charges de 12."
		];

i++;

	

//Improved Power Word: Fortitude - Discipline		
rank[i] = [
		"Augmente les effets de vos sorts Mot de pouvoir : Robustesse et Prière de robustesse de 15%.",
		"Augmente les effets de vos sorts Mot de pouvoir : Robustesse et Prière de robustesse de 30%."
		];

i++;	
		

		
//Martyrdom - Discipline TALENT DIFFERENT	
rank[i] = [
		"Vous confère 50% de chances de bénéficier de l'effet Incantation focalisée pendant 6 sec après avoir été victime d'un coup critique en mêlée ou à distance. Cet effet réduit les interruptions causées par les attaques infligeant des dégâts pendant l'incantation de sorts de prêtre et réduit la durée des effets d'interruption de 10%.",
		"Vous confère 100% de chances de bénéficier de l'effet Incantation focalisée pendant 6 sec après avoir été victime d'un coup critique en mêlée ou à distance. Cet effet réduit les interruptions causées par les attaques infligeant des dégâts pendant l'incantation de sorts de prêtre et réduit la durée des effets d'interruption de 20%."
		];

i++;	

//Improved Power Word: Shield - Discipline		
rank[i] = [
		"Augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier de 5%.",
"Augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier de 10%.",
"Augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier de 15%."
		];

i++;	

	

//Inner Focus - Discipline		
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsqu'elle est activée, cette technique réduit de 100% le coût en mana de votre prochain sort et augmente ses chances d'infliger un effet critique de 25% si ce sort peut avoir un effet critique."
		];

i++;		


//Meditation - Discipline
rank[i] = [
		"Vous confère 10% de votre vitesse de récupération du mana normale pendant l'incantation.",
		"Vous confère 20% de votre vitesse de récupération du mana normale pendant l'incantation.",
		"Vous confère 30% de votre vitesse de récupération du mana normale pendant l'incantation.",
		];

i++;	




//Absolution - Discipline 3
rank[i] = [
		"Réduit le coût en mana de vos sorts Dissipation de la magie, Guérison des maladies, Abolir maladie et Dissipation de masse de 5%.",
		"Réduit le coût en mana de vos sorts Dissipation de la magie, Guérison des maladies, Abolir maladie et Dissipation de masse de 10%.",
		"Réduit le coût en mana de vos sorts Dissipation de la magie, Guérison des maladies, Abolir maladie et Dissipation de masse de 15%."				
		];

i++;	


//Mental Agility - Discipline		
rank[i] = [ 
		"Réduit le coût en mana de vos sorts instantanés de 2%.",
		"Réduit le coût en mana de vos sorts instantanés de 4%.",
		"Réduit le coût en mana de vos sorts instantanés de 6%.",
		"Réduit le coût en mana de vos sorts instantanés de 8%.",
		"Réduit le coût en mana de vos sorts instantanés de 10%."
		];

i++;		

//Improved Mana Burn - Discipline		
rank[i] = [
		"Réduit le temps d'incantation du sort Brûlure de mana de 0,5 sec.",
		"Réduit le temps d'incantation du sort Brûlure de mana de 1,0 sec."
		];

i++;		


//Mental Strength - Discipline		
rank[i] = [
		"Augmente votre total d'Intelligence de 3%.",
		"Augmente votre total d'Intelligence de 6%.",
		"Augmente votre total d'Intelligence de 9%.",
		"Augmente votre total d'Intelligence de 12%.",
		"Augmente votre total d'Intelligence de 15%."
		];

i++;		


//Divine Spirit - Discipline TALENT DIFFERENT has trainable ranks			
rank[i] = [
			"<span style=text-align:left;float:left;>26% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br>Incantation immédiate<br>La puissance sacrée envahit le corps de la cible et augmente son Esprit de 80 pendant 30 min.<br><br>"
		];

i++;		

//Improved Divine Spirit - Discipline				
rank[i] = [
"Vos sorts Esprit divin et Prière d'Esprit augmentent aussi la puissance des sorts de la cible d'un montant égal à 50% de l'Esprit conféré.",
"Vos sorts Esprit divin et Prière d'Esprit augmentent aussi la puissance des sorts de la cible d'un montant égal à 100% de l'Esprit conféré."
		];

i++;		
		
//Focused Power - Discipline 				
rank[i] = [
"Augmente les dégâts et les soins produits par vos sorts de 2%. De plus, le temps d'incantation de Dissipation de masse est réduit de 0,5 sec.",
"Augmente les dégâts et les soins produits par vos sorts de 4%. De plus, le temps d'incantation de Dissipation de masse est réduit de 1 sec."			
		];

i++;			


//Enlightenment - Discipline		
rank[i] = [
"Augmente votre total d'Endurance et d'Esprit de 1% et augmente votre hâte des sorts de 1%.",
"Augmente votre total d'Endurance et d'Esprit de 2% et augmente votre hâte des sorts de 2%.",
"Augmente votre total d'Endurance et d'Esprit de 3% et augmente votre hâte des sorts de 3%.",
"Augmente votre total d'Endurance et d'Esprit de 4% et augmente votre hâte des sorts de 4%.",
"Augmente votre total d'Endurance et d'Esprit de 5% et augmente votre hâte des sorts de 5%."
		];

i++;		


//Focused Will - Discipline		
rank[i] = [
		"Après avoir subi un coup critique, vous bénéficiez de l'effet Volonté focalisée, qui réduit tous les dégâts subis de 2% et augmente les effets des soins sur vous de 3%. Cumulable jusqu'à 3 fois. Dure 8 sec.",
		"Après avoir subi un coup critique, vous bénéficiez de l'effet Volonté focalisée, qui réduit tous les dégâts subis de 3% et augmente les effets des soins sur vous de 4%. Cumulable jusqu'à 3 fois. Dure 8 sec.",
		"Après avoir subi un coup critique, vous bénéficiez de l'effet Volonté focalisée, qui réduit tous les dégâts subis de 4% et augmente les effets des soins sur vous de 5%. Cumulable jusqu'à 3 fois. Dure 8 sec.",
		];

i++;		


//Power Infusion - Discipline				
rank[i] = [
			"<span style=text-align:left;float:left;>419 Mana</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Imprègne la cible de puissance, ce qui augmente la vitesse d'incantation des sorts de 20% et réduit le coût en mana de tous les sorts d 20%. Dure 15 sec."
		];
i++;			
		
//Reflective Shield - Discipline		
rank[i] = [
		"Renvoie 15% des dégâts absorbés par votre Mot de pouvoir : Bouclier à l'attaquant. Ces dégâts ne génèrent pas de menace.",
		"Renvoie 30% des dégâts absorbés par votre Mot de pouvoir : Bouclier à l'attaquant. Ces dégâts ne génèrent pas de menace.",
		"Renvoie 45% des dégâts absorbés par votre Mot de pouvoir : Bouclier à l'attaquant. Ces dégâts ne génèrent pas de menace."								
		];

i++;

//Renewed Hope - Discipline		
rank[i] = [
"Augmente les chances de coup critique de vos sorts Soins rapides, Soins supérieurs et Pénitence de 2% sur les cibles affectées par l'effet Ame affaiblie.",
"Augmente les chances de coup critique de vos sorts Soins rapides, Soins supérieurs et Pénitence de 4% sur les cibles affectées par l'effet Ame affaiblie."								
		];

i++;

	

//Rapture - Discipline TALENT DIFFERENT
rank[i] = [
"Vous recevez un montant de mana pouvant atteindre 0,5% de votre mana maximum chaque fois que vous soignez avec Soins supérieurs, Soins rapides et Pénitence ou que des dégâts sont absorbés par vos Mot de pouvoir : Bouclier et Egide divine. Le montant de mana rendu est proportionnel au montant soigné ou absorbé.",
"Vous recevez un montant de mana pouvant atteindre 1,0% de votre mana maximum chaque fois que vous soignez avec Soins supérieurs, Soins rapides et Pénitence ou que des dégâts sont absorbés par vos Mot de pouvoir : Bouclier et Egide divine. Le montant de mana rendu est proportionnel au montant soigné ou absorbé.",
"Vous recevez un montant de mana pouvant atteindre 1,5% de votre mana maximum chaque fois que vous soignez avec Soins supérieurs, Soins rapides et Pénitence ou que des dégâts sont absorbés par vos Mot de pouvoir : Bouclier et Egide divine. Le montant de mana rendu est proportionnel au montant soigné ou absorbé.",
"Vous recevez un montant de mana pouvant atteindre 2,0% de votre mana maximum chaque fois que vous soignez avec Soins supérieurs, Soins rapides et Pénitence ou que des dégâts sont absorbés par vos Mot de pouvoir : Bouclier et Egide divine. Le montant de mana rendu est proportionnel au montant soigné ou absorbé.",
"Vous recevez un montant de mana pouvant atteindre 2,5% de votre mana maximum chaque fois que vous soignez avec Soins supérieurs, Soins rapides et Pénitence ou que des dégâts sont absorbés par vos Mot de pouvoir : Bouclier et Egide divine. Le montant de mana rendu est proportionnel au montant soigné ou absorbé."
		];
i++;

//Aspiration - Discipline 	
rank[i] = [
"Réduit le temps de recharge de vos sorts Focalisation améliorée, Infusion de puissance, Suppression de la douleur et Pénitence de 10%.",
"Réduit le temps de recharge de vos sorts Focalisation améliorée, Infusion de puissance, Suppression de la douleur et Pénitence de 20%."
		];

i++;

//Divine Aegis - Discipline 	
rank[i] = [
"Les soins critiques créent un bouclier de protection autour de la cible, qui absorbe un montant de dégâts égal à 10% des soins reçus. Dure 12 sec.",
"Les soins critiques créent un bouclier de protection autour de la cible, qui absorbe un montant de dégâts égal à 20% des soins reçus. Dure 12 sec.",
"Les soins critiques créent un bouclier de protection autour de la cible, qui absorbe un montant de dégâts égal à 30% des soins reçus. Dure 12 sec."
		];
i++;



//Pain Suppression - Discipline	TALENT DIFFERENT	
rank[i] = [
			"<span style=text-align:left;float:left;>8% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Réduit instantanément la menace d'une cible alliée de 5%, réduit tous les dégâts subis de 40% et augmente la résistance aux mécanismes de Dissipation de 65% pendant 8 sec."
		];
i++;			
	
	
//Grace - Discipline 	
rank[i] = [
"Vos sorts Soins rapides, Soins supérieurs et Pénitence ont 50% de chances de donner la Grâce à la cible, ce qui réduit les dégâts qui lui sont infligés de 1% et augmente tous les soins que lui prodigue le prêtre de 2%. Cet effet est cumulable jusqu'à 3 fois et dure 8 sec.",
"Vos sorts Soins rapides, Soins supérieurs et Pénitence ont 100% de chances de donner la Grâce à la cible, ce qui réduit les dégâts qui lui sont infligés de 1% et augmente tous les soins que lui prodigue le prêtre de 2%. Cet effet est cumulable jusqu'à 3 fois et dure 8 sec."
		];
i++;	

//Borrowed Time - Discipline 	
rank[i] = [
"Fait bénéficier votre prochain sort de 5% de hâte des sorts supplémentaire après avoir lancé Mot de pouvoir : Bouclier, et augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier d'un montant égal à 8% de votre puissance des sorts.",
"Fait bénéficier votre prochain sort de 10% de hâte des sorts supplémentaire après avoir lancé Mot de pouvoir : Bouclier, et augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier d'un montant égal à 16% de votre puissance des sorts.",
"Fait bénéficier votre prochain sort de 15% de hâte des sorts supplémentaire après avoir lancé Mot de pouvoir : Bouclier, et augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier d'un montant égal à 24% de votre puissance des sorts.",
"Fait bénéficier votre prochain sort de 20% de hâte des sorts supplémentaire après avoir lancé Mot de pouvoir : Bouclier, et augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier d'un montant égal à 32% de votre puissance des sorts.",
"Fait bénéficier votre prochain sort de 25% de hâte des sorts supplémentaire après avoir lancé Mot de pouvoir : Bouclier, et augmente les dégâts absorbés par votre Mot de pouvoir : Bouclier d'un montant égal à 40% de votre puissance des sorts."
		];
i++;


//Penance - Discipline TALENT DIFFERENT
rank[i]=[
			"<span style=text-align:right;float:right;>Ennemi : 30 m de portée</span><br><span style=text-align:left;float:left;>16% du mana de base</span><span style=text-align:right;float:right;>Allié : 40 m de portée</span><br><span style=text-align:left;float:left;>Canalisé</span><span style=text-align:right;float:right;>10 sec de recharge</span><br>Lance une salve de lumière sacrée sur la cible et inflige 288 points de dégâts du Sacré à un ennemi ou rend 1484 à 1676 points de vie à un allié toutes les 1 sec pendant 2 sec."
		];

i++;
	
//HOLY SPELLS------------------------------------------------------------------------------	
//Healing Focus - Holy
	
rank[i] = [
"Réduit de 35% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez tout sort de soins.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez tout sort de soins."
		];		

i++;				
		
		
//Improved Renew - Holy 
	
rank[i] = [
			"Augmente de 5% le nombre de points de vie rendus par votre sort Rénovation.",
			"Augmente de 10% le nombre de points de vie rendus par votre sort Rénovation.",
			"Augmente de 15% le nombre de points de vie rendus par votre sort Rénovation."
		];		

i++;		
		
//Holy Specialization - Holy

rank[i] = [
			"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 1%.",
			"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 2%.",
			"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 3%.",
			"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 4%.",
			"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 5%."
		];

i++;		


//Spell Warding - Holy
		
rank[i] = [
			"Réduit tous les dégâts des sorts subis de 2%.",
			"Réduit tous les dégâts des sorts subis de 4%.",
			"Réduit tous les dégâts des sorts subis de 6%.",
			"Réduit tous les dégâts des sorts subis de 8%.",
			"Réduit tous les dégâts des sorts subis de 10%."
		];

i++;	


//Divine Fury - Holy

rank[i] = [
			"Réduit le temps d'incantation de vos sorts Châtiment, Flammes sacrées, Soins et Soins supérieurs de 0,1 sec.",
			"Réduit le temps d'incantation de vos sorts Châtiment, Flammes sacrées, Soins et Soins supérieurs de 0,2 sec.",
			"Réduit le temps d'incantation de vos sorts Châtiment, Flammes sacrées, Soins et Soins supérieurs de 0,3 sec.",
			"Réduit le temps d'incantation de vos sorts Châtiment, Flammes sacrées, Soins et Soins supérieurs de 0,4 sec.",
			"Réduit le temps d'incantation de vos sorts Châtiment, Flammes sacrées, Soins et Soins supérieurs de 0,5 sec."
		];

i++;

//Desperate Prayer - Discipline TALENT DIFFERENT has trainable ranks
rank[i]=[
			"<span style=text-align:left;float:left;>21% du mana de base</span><br/><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Rend instantanément 3716 à 4384 points de vie au lanceur de sorts.<br>"
];

i++;


//Blessed Recovery - Holy	
		
rank[i] = [
"Lorsque vous avez été frappé par un coup critique en mêlée ou à distance, rend 5% des points de dégâts subis en 6 sec. Les coups critiques supplémentaires subis pendant l'effet augmentent les soins reçus.",
"Lorsque vous avez été frappé par un coup critique en mêlée ou à distance, rend 10% des points de dégâts subis en 6 sec. Les coups critiques supplémentaires subis pendant l'effet augmentent les soins reçus",
"Lorsque vous avez été frappé par un coup critique en mêlée ou à distance, rend 15% des points de dégâts subis en 6 sec. Les coups critiques supplémentaires subis pendant l'effet augmentent les soins reçus"
		];

i++;	

//Inspiration - Holy 
		
rank[i] = [
			"Augmente l'Armure de la cible de 8% pendant 15 sec après avoir reçu un effet critique de l'un des sorts suivants : Soins rapides, Soins, Soins supérieurs, Soins de lien, Pénitence, Prière de soins ou Cercle de soins.",
			"Augmente l'Armure de la cible de 16% pendant 15 sec après avoir reçu un effet critique de l'un des sorts suivants : Soins rapides, Soins, Soins supérieurs, Soins de lien, Pénitence, Prière de soins ou Cercle de soins.",
			"Augmente l'Armure de la cible de 25% pendant 15 sec après avoir reçu un effet critique de l'un des sorts suivants : Soins rapides, Soins, Soins supérieurs, Soins de lien, Pénitence, Prière de soins ou Cercle de soins."
		];

i++;		





//Holy Reach - Holy 
rank[i] = [
"Augmente de 10% la portée de vos sorts Châtiment et Flammes sacrées et le rayon d'effet de vos sorts Prière de soins, Nova sacrée, Hymne divin et Cercle de soins.",
"Augmente de 20% la portée de vos sorts Châtiment et Flammes sacrées et le rayon d'effet de vos sorts Prière de soins, Nova sacrée, Hymne divin et Cercle de soins."
		];

i++;		

//Improved Healing - Holy

rank[i] = [
			"Réduit le coût en mana de vos sorts Soins inférieurs, Soins, Soins supérieurs, Hymne divin et Pénitence de 5%.",
			"Réduit le coût en mana de vos sorts Soins inférieurs, Soins, Soins supérieurs, Hymne divin et Pénitence de 10%.",
			"Réduit le coût en mana de vos sorts Soins inférieurs, Soins, Soins supérieurs, Hymne divin et Pénitence de 15%."
		];

i++;		

//Searing Light - Holy

rank[i] = [
			"Augmente de 5% les dégâts infligés par vos sorts Châtiment, Flammes sacrées, Nova sacrée et Pénitence.",
			"Augmente de 10% les dégâts infligés par vos sorts Châtiment, Flammes sacrées, Nova sacrée et Pénitence."
		];

i++;		




//Healing Prayers - Holy	
		
rank[i] = [
			"Réduit le coût en mana de vos sorts Prière de soins et Prière de guérison de 10%.",
			"Réduit le coût en mana de vos sorts Prière de soins et Prière de guérison de 20%."
		];

i++;

//Spirit of Redemption - Holy
		
rank[i] = [
			"Augmente le total d'Esprit de 5%, et au moment de sa mort, le prêtre devient l'Esprit de rédemption pendant 15 sec. L'Esprit de rédemption ne peut pas se déplacer ou attaquer, ni être attaqué ou ciblé par aucun sort ou effet. Tant qu'il est sous cette forme, le prêtre peut lancer tout sort de soins sans le moindre coût. À la fin de l'effet, le prêtre meurt."
		];

i++;		




//Spiritual Guidance - Holy TALENT DIFFERENT
		
rank[i] = [
			"Augmente la puissance des sorts d'un montant égal à 5% de votre Esprit total.",
			"Augmente la puissance des sorts d'un montant égal à 10% de votre Esprit total.",
			"Augmente la puissance des sorts d'un montant égal à 15% de votre Esprit total.",
			"Augmente la puissance des sorts d'un montant égal à 20% de votre Esprit total.",
			"Augmente la puissance des sorts d'un montant égal à 25% de votre Esprit total."
		];

i++;

//Surge of Light - Holy
rank[i]=[
			"Vos coups critiques avec les sorts confèrent 25% de chances à votre prochain sort Châtiment ou Soins rapides d'être instantané et de ne pas coûter de mana, mais sans pouvoir être un coup critique. Cet effet dure 10 sec.",
			"Vos coups critiques avec les sorts confèrent 50% de chances à votre prochain sort Châtiment ou Soins rapides d'être instantané et de ne pas coûter de mana, mais sans pouvoir être un coup critique. Cet effet dure 10 sec."
			];
i++;	

//Spiritual Healing - Holy

rank[i] = [
			"Augmente le nombre de points de vie rendus par vos sorts de soins de 2%.",
			"Augmente le nombre de points de vie rendus par vos sorts de soins de 4%.",
			"Augmente le nombre de points de vie rendus par vos sorts de soins de 6%.",
			"Augmente le nombre de points de vie rendus par vos sorts de soins de 8%.",
			"Augmente le nombre de points de vie rendus par vos sorts de soins de 10%."
		];		

i++;

//Holy Concentration - Holy
rank[i] = [
"Vous confère 10% de chances d'entrer dans un état d'Idées claires après avoir lancé un sort Soins rapides, Soins de lien ou Soins supérieurs critique. Idées claires réduit le coût en mana de votre prochain sort Soins rapides, Soins de lien ou Soins supérieurs de 100%.",
"Vous confère 20% de chances d'entrer dans un état d'Idées claires après avoir lancé un sort Soins rapides, Soins de lien ou Soins supérieurs critique. Idées claires réduit le coût en mana de votre prochain sort Soins rapides, Soins de lien ou Soins supérieurs de100%.",
"Vous confère 30% de chances d'entrer dans un état d'Idées claires après avoir lancé un sort Soins rapides, Soins de lien ou Soins supérieurs critique. Idées claires réduit le coût en mana de votre prochain sort Soins rapides, Soins de lien ou Soins supérieurs de%."			
		];		

i++;	


//Lightwell - Holy TALENT DIFFERENT has trainable ranks

rank[i] = [
			"<span style=text-align:left;float:left;>17% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>0,5 sec d'incantation</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Crée un Puits de lumière sacré. Les membres du groupe ou du raid peuvent cliquer sur le Puits de lumière pour recevoir 4620 points de vie en 6 sec. L'effet est annulé si vous subissez des dégâts directs égaux à 30% de vos points de vie. La durée du Puits de lumière est de 3 min ou bien 10 utilisations.<br><br>"

		];		

i++;		

//Blessed Resilience - Holy
rank[i] = [
			"Les coups critiques contre vous ont 20% de chances de vous empêcher d'être à nouveau frappé par un coup critique pendant 6 sec.",
			"Les coups critiques contre vous ont 40% de chances de vous empêcher d'être à nouveau frappé par un coup critique pendant 6 sec.",
			"Les coups critiques contre vous ont 60% de chances de vous empêcher d'être à nouveau frappé par un coup critique pendant 6 sec."						
		];

i++;		

//Empowered Healing - Holy
rank[i]=[
"Votre sort Soins supérieurs bénéficie de 8% supplémentaires, tandis que vos Soins rapides et Soins de lien bénéficient de 4% supplémentaires des effets du bonus relatif aux soins.",
"Votre sort Soins supérieurs bénéficie de 16% supplémentaires, tandis que vos Soins rapides et Soins de lien bénéficient de 8% supplémentaires des effets du bonus relatif aux soins.",
"Votre sort Soins supérieurs bénéficie de 24% supplémentaires, tandis que vos Soins rapides et Soins de lien bénéficient de 12% supplémentaires des effets du bonus relatif aux soins.",
"Votre sort Soins supérieurs bénéficie de 32% supplémentaires, tandis que vos Soins rapides et Soins de lien bénéficient de 16% supplémentaires des effets du bonus relatif aux soins.",
"Votre sort Soins supérieurs bénéficie de 40% supplémentaires, tandis que vos Soins rapides et Soins de lien bénéficient de 20% supplémentaires des effets du bonus relatif aux soins."												
			];
i++;

//Serendipity - Holy
rank[i]=[
"Si vos sorts Soins supérieurs ou Soins rapides prodiguent un excès de soins à la cible, vous êtes instantanément remboursé de 8% du coût en mana du sort.",
"Si vos sorts Soins supérieurs ou Soins rapides prodiguent un excès de soins à la cible, vous êtes instantanément remboursé de 17% du coût en mana du sort.",
"Si vos sorts Soins supérieurs ou Soins rapides prodiguent un excès de soins à la cible, vous êtes instantanément remboursé de 25% du coût en mana du sort."								
			];
i++;

//Improved Holy Concentration - Holy
rank[i] = [
"Augmente vos chances d'entrer dans un état de Concentration sacrée de 5%, et augmente également votre hâte de sorts de 10% pour les deux prochains sorts Soins supérieurs, Soins rapides ou Soins de lien suivant votre Concentration sacrée. Dure 20 sec.",
"Augmente vos chances d'entrer dans un état de Concentration sacrée de 10%, et augmente également votre hâte de sorts de 20% pour les deux prochains sorts Soins supérieurs, Soins rapides ou Soins de lien suivant votre Concentration sacrée. Dure 20 sec.",
"Augmente vos chances d'entrer dans un état de Concentration sacrée de 15%, et augmente également votre hâte de sorts de 30% pour les deux prochains sorts Soins supérieurs, Soins rapides ou Soins de lien suivant votre Concentration sacrée. Dure 20 sec."
		];

i++;
		
//Circle of Healing - Holy TALENT DIFFFERENT has trainable ranks
rank[i]=[
			"<span style=text-align:left;float:left;>21% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><br>Rend à 5 membres au maximum du groupe ou du raid alliés se trouvant à moins de 15 mètres de la cible 684 à 756 points de vie.<br><br>"
			];
i++;

//Test of Faith - Holy
rank[i] = [
"Augmente les soins de 2% et les chances d'effet critique avec les sorts de 2% sur les cibles alliées à qui il reste 50% de leurs points de vie.",
"Augmente les soins de 4% et les chances d'effet critique avec les sorts de 4% sur les cibles alliées à qui il reste 50% de leurs points de vie.",
"Augmente les soins de 6% et les chances d'effet critique avec les sorts de 6% sur les cibles alliées à qui il reste 50% de leurs points de vie."
		];

i++;

//Divine Providence - Holy
rank[i] = [
"Augmente de 2% le montant de points de vie rendus par Cercle de soins, Soins de lien, Nova sacrée, Prière de soins, Hymne divin et Prière de guérison, et réduit de 6% le temps de recharge de votre Prière de guérison.",
"Augmente de 4% le montant de points de vie rendus par Cercle de soins, Soins de lien, Nova sacrée, Prière de soins, Hymne divin et Prière de guérison, et réduit de 12% le temps de recharge de votre Prière de guérison.",
"Augmente de 6% le montant de points de vie rendus par Cercle de soins, Soins de lien, Nova sacrée, Prière de soins, Hymne divin et Prière de guérison, et réduit de 18% le temps de recharge de votre Prière de guérison.",
"Augmente de 8% le montant de points de vie rendus par Cercle de soins, Soins de lien, Nova sacrée, Prière de soins, Hymne divin et Prière de guérison, et réduit de 24% le temps de recharge de votre Prière de guérison.",
"Augmente de 10% le montant de points de vie rendus par Cercle de soins, Soins de lien, Nova sacrée, Prière de soins, Hymne divin et Prière de guérison, et réduit de 30% le temps de recharge de votre Prière de guérison."

];		

i++;

//Guardian Spirit - Discipline TALENT DIFFERENT
rank[i] = [
			"<span style=text-align:left;float:left;>6% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Fait appel à un esprit gardien pour veiller sur la cible alliée. L'esprit augmente les soins prodigués à la cible de 40%, et l'empêche également de mourir en se sacrifiant pour elle. Ce sacrifice met fin à l'effet mais rend à la cible 50% de ses points de vie maximum. Dure 10 sec."
		];

i++;
	
//SHADOW TALENTS---------------------------------------------------------------->	

//Spirit Tap - Shadow
rank[i]=[
"Vous donne 33% de chances de gagner un bonus de 100% à l'Esprit après avoir tué une cible qui rapporte de l'expérience ou de l'honneur. Votre mana se régénère à 50% de la vitesse de récupération normale pendant l'incantation de sorts. Dure 15 sec.",
"Vous donne 66% de chances de gagner un bonus de 100% à l'Esprit après avoir tué une cible qui rapporte de l'expérience ou de l'honneur. Votre mana se régénère à 50% de la vitesse de récupération normale pendant l'incantation de sorts. Dure 15 sec.",
"Vous donne 100% de chances de gagner un bonus de 100% à l'Esprit après avoir tué une cible qui rapporte de l'expérience ou de l'honneur. Votre mana se régénère à 50% de la vitesse de récupération normale pendant l'incantation de sorts. Dure 15 sec."
			];
i++;

//Improved Spirit Tap - Shadow
rank[i]=[
"Vos coups critiques réussis avec Attaque mentale et Mot de l'ombre : Mort augmentent votre total d'Esprit de 5%. Pendant ce temps, votre mana se régénèrera à un taux de 10% lors des incantations. Dure 8 sec.",
"Vos coups critiques réussis avec Attaque mentale et Mot de l'ombre : Mort augmentent votre total d'Esprit de 10%. Pendant ce temps, votre mana se régénèrera à un taux de 20% lors des incantations. Dure 8 sec."
			];
i++;
			
//Blackout - Shadow
rank[i]=[
			"Confère 2% de chances à vos sorts de dégâts d'Ombre d'étourdir la cible pendant 3 sec.",
			"Confère 4% de chances à vos sorts de dégâts d'Ombre d'étourdir la cible pendant 3 sec.",
			"Confère 6% de chances à vos sorts de dégâts d'Ombre d'étourdir la cible pendant 3 sec.",
			"Confère 8% de chances à vos sorts de dégâts d'Ombre d'étourdir la cible pendant 3 sec.",
			"Confère 10% de chances à vos sorts de dégâts d'Ombre d'étourdir la cible pendant 3 sec."
		];

i++;		
		
//Shadow Affinity - Shadow
rank[i]=[
			"Diminue le niveau de menace généré par vos sorts d'Ombre de 8%.",
			"Diminue le niveau de menace généré par vos sorts d'Ombre de 16%.",
			"Diminue le niveau de menace généré par vos sorts d'Ombre de 25%."
		];

i++;		
		
//Improved Shadow Word: Pain - Shadow
rank[i]=[
"Augmente les dégâts infligés par votre sort Mot de l'ombre : Douleur de 3%.",
"Augmente les dégâts infligés par votre sort Mot de l'ombre : Douleur de 6%."
		];

i++;		
		
//Shadow Focus - Shadow
rank[i]=[
"Augmente vos chances de toucher avec vos sorts d'Ombre de 1%, et réduit le coût en mana de vos sorts d'Ombre de 2%.",
"Augmente vos chances de toucher avec vos sorts d'Ombre de 2%, et réduit le coût en mana de vos sorts d'Ombre de 4%.",
"Augmente vos chances de toucher avec vos sorts d'Ombre de 3%, et réduit le coût en mana de vos sorts d'Ombre de 6%."
		];

i++;		
		
//Improved Psychic Scream - Shadow
rank[i]=[
			"Réduit le temps de recharge de votre sort Cri psychique de 2 sec.",
			"Réduit le temps de recharge de votre sort Cri psychique de 4 sec."
		];

i++;		
		
//Improved Mind Blast - Shadow
rank[i]=[
			"Réduit le temps de recharge du sort Attaque mentale de 0,5 sec.",
			"Réduit le temps de recharge du sort Attaque mentale de 1 sec.",
			"Réduit le temps de recharge du sort Attaque mentale de 1,5 sec.",
			"Réduit le temps de recharge du sort Attaque mentale de 2 sec.",
			"Réduit le temps de recharge du sort Attaque mentale de 2,5 sec."
		];

i++;		
		
//Mind Flay - Shadow TALENT DIFFERENT has trainable ranks
rank[i]=[
			"<span style=text-align:left;float:left;>9% du mana de base</span><span style=text-align:right;float:right;>20 m de portée</span><br>Canalisé<br>Attaque l'esprit de la cible avec l'énergie de l'Ombre. Inflige 588 points de dégâts d'Ombre en 3 sec et réduit la vitesse de la cible de 50%."
		];

i++;			
		
//Veiled Shadows - Shadow
rank[i]=[
"Réduit le temps de recharge de votre technique Oubli de 3 sec, et celui de votre technique Ombrefiel de 1 minute.",
"Réduit le temps de recharge de votre technique Oubli de 6 sec, et celui de votre technique Ombrefiel de 2 minutes."
		];

i++;		
		
//Shadow Reach - Shadow
rank[i]=[
			"Augmente de 10% la portée de vos sorts offensifs d'Ombre.",
			"Augmente de 20% la portée de vos sorts offensifs d'Ombre."
		];

i++;		
		
		
//Shadow Weaving - Shadow
rank[i]=[
"Vos sorts d'Ombre infligeant des dégâts ont 33% d'augmenter les dégâts d'Ombre que vous infligez de 2% pendant 15 sec. Cumulable jusqu'à 5 fois.",
"Vos sorts d'Ombre infligeant des dégâts ont 66% d'augmenter les dégâts d'Ombre que vous infligez de 2% pendant 15 sec. Cumulable jusqu'à 5 fois.",
"Vos sorts d'Ombre infligeant des dégâts ont 100% d'augmenter les dégâts d'Ombre que vous infligez de 2% pendant 15 sec. Cumulable jusqu'à 5 fois."
		];

i++;				
		
//Silence - Shadow
rank[i]=[
			"<span style=text-align:left;float:left;>225 Mana</span><span style=text-align:right;float:right;>20 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>45 sec de recharge</span><br>Rend la cible silencieuse, l'empêchant de lancer des sorts pendant 5 sec."
		];

i++;		
		

		
//Vampiric Embrace TALENT DIFFERENT
rank[i]=[
			"<span style=text-align:left;float:left;>2% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>10 sec de recharge</span><br>Libère sur votre cible de l'énergie de l'Ombre grâce à laquelle tous les membres de votre groupe sont soignés pour 15% de tout dégât de sort d'Ombre que vous infligez pendant 1 min."
		];

i++;	


//Improved Vampiric Embrace
rank[i]=[
			"Ajoute 5% supplémentaires au pourcentage des soins produits par Etreinte vampirique.",
			"Ajoute 10% supplémentaires au pourcentage des soins produits par Etreinte vampirique."
		];

i++;		
		
//Focused Mind - Shadow 
rank[i]=[
			"Réduit le coût en mana de vos sorts Attaque mentale, Contrôle mental, Fouet mental et Incandescence mentale de 5%.",
			"Réduit le coût en mana de vos sorts Attaque mentale, Contrôle mental, Fouet mental et Incandescence mentale de 10%.",
			"Réduit le coût en mana de vos sorts Attaque mentale, Contrôle mental, Fouet mental et Incandescence mentale de 15%."
		];

i++;				
		
//Mind Melt - Shadow
rank[i]=[
"Augmente les chances de coup critique de vos sorts Attaque mentale, Fouet mental et Incandescence mentale de 2%.",
"Augmente les chances de coup critique de vos sorts Attaque mentale, Fouet mental et Incandescence mentale de 4%."		
		];

i++;						
		
//Darkness - Shadow
rank[i]=[
			"Augmente les dégâts de vos sorts d'Ombre de 2%.",
			"Augmente les dégâts de vos sorts d'Ombre de 4%.",
			"Augmente les dégâts de vos sorts d'Ombre de 6%.",
			"Augmente les dégâts de vos sorts d'Ombre de 8%.",
			"Augmente les dégâts de vos sorts d'Ombre de 10%."
		];

i++;		
		
//Shadow Form - Shadoow TALENT DIFFERENT
rank[i]=[
			"32% du mana de base<br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>1,5 sec de recharge</span><br>Adopte une Forme d'ombre qui augmente de 15% les dégâts d'Ombre que vous infligez en plus de réduire de 15% les dégâts physiques que vous subissez et de 30% la menace générée. Cependant, vous ne pouvez pas lancer de sorts du Sacré lorsque vous êtes sous cette forme."
		];
i++;		
		
//Shadow Power - Shadow
rank[i]=[
"Augmente le bonus de dégâts des coups critiques de vos sorts Attaque mentale, Fouet mental et Mot de l'ombre : Mort de 20%.",
"Augmente le bonus de dégâts des coups critiques de vos sorts Attaque mentale, Fouet mental et Mot de l'ombre : Mort de 40%.",
"Augmente le bonus de dégâts des coups critiques de vos sorts Attaque mentale, Fouet mental et Mot de l'ombre : Mort de 60%.",
"Augmente le bonus de dégâts des coups critiques de vos sorts Attaque mentale, Fouet mental et Mot de l'ombre : Mort de 80%.",
"Augmente le bonus de dégâts des coups critiques de vos sorts Attaque mentale, Fouet mental et Mot de l'ombre : Mort de 100%."								
		];

i++;

//Improved Shadowform - Shadow
rank[i]=[
"Votre technique Oubli a maintenant 50% de chances d'annuler tous les effets affectant le déplacement lorsque vous êtes en forme d'Ombre. Réduit de 35% le temps d'incantation ou de canalisation perdu provoqué par les dégâts pendant l'incantation des sorts d'Ombre lorsque vous êtes en forme d'Ombre.",
"Votre technique Oubli a maintenant 100% de chances d'annuler tous les effets affectant le déplacement lorsque vous êtes en forme d'Ombre. Réduit de 70% le temps d'incantation ou de canalisation perdu provoqué par les dégâts pendant l'incantation des sorts d'Ombre lorsque vous êtes en forme d'Ombre."										
		];

i++;
		
		
//Misery - Shadow 
rank[i] = [
"Vos sorts Mot de l'ombre : Douleur, Fouet mental et Toucher vampirique augmentent aussi les chances de toucher des sorts néfastes de 1% pendant 24 sec. Augmente également les dégâts de vos sorts Attaque mentale, Fouet mental et Incadescence mentale d'un montant égal à 5% de votre puissance des sorts.",
"Vos sorts Mot de l'ombre : Douleur, Fouet mental et Toucher vampirique augmentent aussi les chances de toucher des sorts néfastes de 2% pendant 24 sec. Augmente également les dégâts de vos sorts Attaque mentale, Fouet mental et Incadescence mentale d'un montant égal à 10% de votre puissance des sorts.",
"Vos sorts Mot de l'ombre : Douleur, Fouet mental et Toucher vampirique augmentent aussi les chances de toucher des sorts néfastes de 3% pendant 24 sec. Augmente également les dégâts de vos sorts Attaque mentale, Fouet mental et Incadescence mentale d'un montant égal à 15% de votre puissance des sorts."
		];

i++;

//Psychic Horror - Shadow
rank[i]=[
"Votre technique Cri psychique inflige Horreur psychique à la cible lorsque l'effet de peur prend fin. Horreur psychique réduit tous les dégâts infligés par la cible de 15% pendant 6 sec.",
"Votre technique Cri psychique inflige Horreur psychique à la cible lorsque l'effet de peur prend fin. Horreur psychique réduit tous les dégâts infligés par la cible de 30% pendant 6 sec."											
		];
i++;

//Vampiric Touch - Shadow TALENT DIFFERENT has trainable ranks
rank[i]=[
			"<span style=text-align:left;float:left;>16% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br>1,5 sec d'incantation<br>\
			Inflige 850 points de dégâts d'Ombre en 15 sec à votre cible et fait recevoir à un maximum de 10 membres du groupe ou du raid un montant de mana égal à 0,25% de leur maximum de mana par seconde pendant que vous infligez des dégâts avec Attaque mentale."
		];		
		
i++;

//Pain and Suffering - Shadow
rank[i]=[
"Votre Fouet mental a 33% de chances de réinitialiser la durée de Mot de l'ombre : Douleur sur la cible et il réduit les dégâts que vous inflige votre propre Mot de l'ombre : Mort de 10%.",
"Votre Fouet mental a 66% de chances de réinitialiser la durée de Mot de l'ombre : Douleur sur la cible et il réduit les dégâts que vous inflige votre propre Mot de l'ombre : Mort de 20%.",	
"Votre Fouet mental a 100% de chances de réinitialiser la durée de Mot de l'ombre : Douleur sur la cible et il réduit les dégâts que vous inflige votre propre Mot de l'ombre : Mort de 30%."	
		];
i++;

//Twisted Faith - Shadow
rank[i]=[
"Augmente la puissance de vos sorts de 2% de votre total d'Esprit, et les dégâts que vous infligez avec Fouet mental et Attaque mentale sont augmentés de 2% si votre cible est affectée par Mot de l'ombre : Douleur.",
"Augmente la puissance de vos sorts de 4% de votre total d'Esprit, et les dégâts que vous infligez avec Fouet mental et Attaque mentale sont augmentés de 4% si votre cible est affectée par Mot de l'ombre : Douleur.",
"Augmente la puissance de vos sorts de 6% de votre total d'Esprit, et les dégâts que vous infligez avec Fouet mental et Attaque mentale sont augmentés de 6% si votre cible est affectée par Mot de l'ombre : Douleur.",
"Augmente la puissance de vos sorts de 8% de votre total d'Esprit, et les dégâts que vous infligez avec Fouet mental et Attaque mentale sont augmentés de 8% si votre cible est affectée par Mot de l'ombre : Douleur.",
"Augmente la puissance de vos sorts de 10% de votre total d'Esprit, et les dégâts que vous infligez avec Fouet mental et Attaque mentale sont augmentés de 10% si votre cible est affectée par Mot de l'ombre : Douleur."									
		];
i++;

//Dispersion - Shadow 
rank[i]=[
"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Votre corps devient de l'énergie d'ombre pure, ce qui réduit tous les dégâts subis de 90%. Vous ne pouvez pas attaquer ni lancer de sorts, mais vous régénérez 6% de votre mana toutes les sec. pendant 6 sec. Dispersion peut être lancé lorsque vous êtes étourdi, apeuré ou réduit au silence."
		];		
		
i++;

//Shadow Talents End^^

