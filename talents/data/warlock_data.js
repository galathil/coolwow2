var i = 0;
var t = 0;

var className = "Talents de démoniste";
var talentPath = "/info/basics/talents/";

tree[i] = "Affliction"; i++;
tree[i] = "Démonologie"; i++;
tree[i] = "Destruction"; i++;

i = 0;

//rank
//horizontal position
//vertical position
talent[i] = [0, "Malédiction d’agonie améliorée", 2, 1, 1]; i++;
talent[i] = [0, "Suppression", 3, 2, 1]; i++;
talent[i] = [0, "Corruption améliorée", 5, 3, 1]; i++;
talent[i] = [0, "Fragilité", 2, 1, 2]; i++;
talent[i] = [0, "Drain d’âme amélioré", 2, 2, 2]; i++; 
talent[i] = [0, "Connexion améliorée", 2, 3, 2]; i++;
talent[i] = [0, "Siphon d’âme", 2, 4, 2]; i++;
talent[i] = [0, "Peur améliorée", 2, 1, 3]; i++;
talent[i] = [0, "Concentration corrompue", 3, 2, 3]; i++;
talent[i] = [0, "Malédiction amplifiée", 1, 3, 3]; i++;
talent[i] = [0, "Allonge sinistre", 2, 1, 4]; i++;
talent[i] = [0, "Crépuscule", 2, 2, 4]; i++;
talent[i] = [0, "Corruption surpuissante", 3, 4, 4]; i++;
talent[i] = [0, "Etreinte de l’ombre", 5, 1, 5]; i++;
talent[i] = [0, "Siphon de vie", 1, 2, 5]; i++;
talent[i] = [0, "Malédiction d’épuisement", 1, 3, 5, [getTalentID("Malédiction amplifiée"),1]]; i++;
talent[i] = [0, "Chasseur corrompu amélioré", 2, 1, 6]; i++;
talent[i] = [0, "Maîtrise de l’ombre", 5, 2, 6, [getTalentID("Siphon de vie"),1]]; i++;
talent[i] = [0, "Éradication", 3, 1, 7]; i++;
talent[i] = [0, "Contagion", 5, 2, 7]; i++;
talent[i] = [0, "Pacte noir", 1, 3, 7]; i++;
talent[i] = [0, "Hurlement de terreur amélioré", 2, 1, 8]; i++;
talent[i] = [0, "Imprécation", 3, 3, 8]; i++;
talent[i] = [0, "Caresse de la Mort", 3, 1, 9]; i++;
talent[i] = [0, "Affliction instable", 1, 2, 9, [getTalentID("Contagion"),5]]; i++;
talent[i] = [0, "Pandémie", 3, 3, 9, [getTalentID("Affliction instable"),1]]; i++;
talent[i] = [0, "Affliction éternelle", 5, 2, 10]; i++;
talent[i] = [0, "Hanter", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//demonology talents
talent[i] = [1, "Pierre de soins améliorée", 2, 1, 1]; i++;
talent[i] = [1, "Diablotin amélioré", 3, 2, 1]; i++;
talent[i] = [1, "Baiser démoniaque", 5, 3, 1]; i++;
talent[i] = [1, "Captation de vie améliorée", 2, 1, 2]; i++;
talent[i] = [1, "Brutalité démoniaque", 3, 2, 2]; i++;
talent[i] = [1, "Vitalité gangrenée", 3, 3, 2]; i++;
talent[i] = [1, "Succube améliorée", 3, 1, 3]; i++;
talent[i] = [1, "Lien spirituel", 1, 2, 3]; i++;
talent[i] = [1, "Domination corrompue", 1, 3, 3]; i++;
talent[i] = [1, "Egide démoniaque", 3, 4, 3]; i++;
talent[i] = [1, "Puissance impie", 5, 2, 4, [getTalentID("Lien spirituel"),1]]; i++;
talent[i] = [1, "Maître invocateur", 2, 3, 4, [getTalentID("Domination corrompue"),1]]; i++;
talent[i] = [1, "Sacrifice démoniaque", 1, 1, 5, [getTalentID("Puissance impie"),5]]; i++;
talent[i] = [1, "Maître conjurateur", 2, 3, 5]; i++;
talent[i] = [1, "Festin de mana", 3, 1, 6]; i++;
talent[i] = [1, "Maître démonologue", 5, 2, 6, [getTalentID("Puissance impie"),5]]; i++;
talent[i] = [1, "Asservir démon amélioré", 2, 3, 6]; i++;
talent[i] = [1, "Résilience démoniaque", 3, 1, 7]; i++;
talent[i] = [1, "Renforcement démoniaque", 1, 2, 7, [getTalentID("Maître démonologue"),5]]; i++;
talent[i] = [1, "Connaissance démoniaque", 3, 3, 7]; i++;
talent[i] = [1, "Tactique démoniaque", 5, 2, 8]; i++;
talent[i] = [1, "Synergie gangrenée", 2, 3, 8]; i++;
talent[i] = [1, "Tactique démoniaque améliorée", 3, 1, 9, [getTalentID("Tactique démoniaque"),5]]; i++;
talent[i] = [1, "Invocation d’un gangregarde", 1, 2, 9]; i++;
talent[i] = [1, "Empathie démoniaque", 3, 3, 9]; i++;
talent[i] = [1, "Pacte démoniaque", 5, 2, 10]; i++;
talent[i] = [1, "Métamorphose", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//destruction talents
talent[i] = [2, "Trait de l’ombre amélioré", 5, 2, 1]; i++;
talent[i] = [2, "Fléau", 5, 3, 1]; i++;
talent[i] = [2, "Conséquences", 2, 1, 2]; i++;
talent[i] = [2, "Cœur de la fournaise", 3, 2, 2]; i++;
talent[i] = [2, "Cataclysme", 3, 3, 2]; i++;
talent[i] = [2, "Puissance démoniaque", 2, 1, 3]; i++;
talent[i] = [2, "Brûlure de l’ombre", 1, 2, 3]; i++;
talent[i] = [2, "Ruine", 5, 3, 3]; i++;
talent[i] = [2, "Intensité", 2, 1, 4]; i++;
talent[i] = [2, "Allonge de destruction", 2, 2, 4]; i++;
talent[i] = [2, "Douleur brûlante améliorée", 3, 4, 4]; i++;
talent[i] = [2, "Pyroclasme", 2, 1, 5, [getTalentID("Intensité"),2]]; i++;
talent[i] = [2, "Immolation améliorée", 3, 2, 5]; i++;
talent[i] = [2, "Dévastation", 1, 3, 5, [getTalentID("Ruine"),5]]; i++;
talent[i] = [2, "Protection du Néant", 3, 1, 6]; i++;
talent[i] = [2, "Tempête ardente", 5, 3, 6]; i++;
talent[i] = [2, "Conflagration", 1, 2, 7, [getTalentID("Immolation améliorée"),3]]; i++;
talent[i] = [2, "Suceur d’âme", 3, 3, 7]; i++;
talent[i] = [2, "Contrecoup", 3, 4, 7]; i++; 
talent[i] = [2, "Ombre et flammes", 5, 2, 8]; i++;
talent[i] = [2, "Suceur d’âme amélioré", 2, 3, 8, [getTalentID("Suceur d’âme"),3]]; i++;
talent[i] = [2, "Explosion de fumées", 3, 1, 9, [getTalentID("Conflagration"),1]]; i++;
talent[i] = [2, "Furie de l’ombre", 1, 2, 9]; i++;
talent[i] = [2, "Diablotin surpuissant", 3, 3, 9]; i++;
talent[i] = [2, "Feu et soufre", 5, 2, 10]; i++;
talent[i] = [2, "Trait du chaos", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

i = 0;


//Affliction Talents Begin


//Improved Curse of Agony - Affliction
rank[i] = [
"Augmente les points de dégâts infligés par votre sort Malédiction d'agonie de 5%.",
"Augmente les points de dégâts infligés par votre sort Malédiction d'agonie de 10%."
		];		
i++;	

//Suppression - Affliction
rank[i] = [
"Augmente de 1% vos chances de toucher avec vos sorts d’Affliction, et réduit de 2% leur coût en mana.",
"Augmente de 2% vos chances de toucher avec vos sorts d’Affliction, et réduit de 4% leur coût en mana.",
"Augmente de 3% vos chances de toucher avec vos sorts d’Affliction, et réduit de 6% leur coût en mana."
		];
i++;		
		
//Improved Corruption - Affliction
rank[i] = [
"Augmente les dégâts infligés par votre Corruption de 2% et augmente les chances de coup critique de votre Graine de Corruption de 1%.",
"Augmente les dégâts infligés par votre Corruption de 4% et augmente les chances de coup critique de votre Graine de Corruption de 2%.",
"Augmente les dégâts infligés par votre Corruption de 12% et augmente les chances de coup critique de votre Graine de Corruption de 3%.",
"Augmente les dégâts infligés par votre Corruption de 16% et augmente les chances de coup critique de votre Graine de Corruption de 4%.",
"Augmente les dégâts infligés par votre Corruption de 20% et augmente les chances de coup critique de votre Graine de Corruption de 5%."
		];
i++;		

//Frailty - Affliction
rank[i] = [
"Augmente de 10% le montant de puissance d’attaque réduit par votre Malédiction de faiblesse, et réduit de 50% le montant de puissance d’attaque conféré par votre Malédiction de témérité.",
"Augmente de 20% le montant de puissance d’attaque réduit par votre Malédiction de faiblesse, et réduit de 100% le montant de puissance d’attaque conféré par votre Malédiction de témérité."
		];
i++;		
		
//Improved Drain Soul - Affliction
rank[i] = [
"Vous rend 7% de votre maximum de points de mana si vous tuez la cible pendant que vous drainez son âme. De plus, vos sorts d’Affliction génèrent 5% de menace en moins.",
"Vous rend 15% de votre maximum de points de mana si vous tuez la cible pendant que vous drainez son âme. De plus, vos sorts d’Affliction génèrent 10% de menace en moins."
		];
i++;		

//Improved Life Tap - Affliction
rank[i] = [
"Augmente de 10% le montant de mana octroyé par votre sort Connexion.",
"Augmente de 20% le montant de mana octroyé par votre sort Connexion."
		];
i++;		

//Soul Siphon - Affliction
rank[i] = [
"Augmente le nombre de points drainé par vos sorts Drain de vie et Drain d’âme de 2% supplémentaires pour chaque effet d’Affliction sur la cible, jusqu'à un maximum de 24% d’effet supplémentaire.",
"Augmente le nombre de points drainé par vos sorts Drain de vie et Drain d’âme de 4% supplémentaires pour chaque effet d’Affliction sur la cible, jusqu'à un maximum de 60% d’effet supplémentaire."
		];
i++;		
		
//Improved Fear - Affliction
rank[i] = [
"Votre sort Peur inflige un Cauchemar à la cible lorsque l’effet de peur prend fin. Cauchemar réduit la vitesse de déplacement de la cible de 15% pendant 5 sec.",
"Votre sort Peur inflige un Cauchemar à la cible lorsque l’effet de peur prend fin. Cauchemar réduit la vitesse de déplacement de la cible de 30% pendant 5 sec."
		];
i++;	


//Fel Concentration - Affliction
rank[i] = [ 
"Réduit de 23% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez les sorts Drain de vie, Drain de pts. mana, Drain d'âme, Affliction instable et Hanter.",
"Réduit de 46% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez les sorts Drain de vie, Drain de pts. mana, Drain d'âme, Affliction instable et Hanter.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez les sorts Drain de vie, Drain de pts. mana, Drain d'âme, Affliction instable et Hanter."
		];
i++;		


//Amplify Curse - Affliction
rank[i] = [
"Réduit le temps de recharge global de vos Malédictions de 0,5 sec."
		];
i++;		

//Grim Reach - Affliction
rank[i] = [
"Augmente la portée de vos sorts d'Affliction de 10%.",
"Augmente la portée de vos sorts d'Affliction de 20%."
		];
i++;		

//Nightfall - Affliction	
rank[i] = [
"Confère à vos sorts Corruption et Drain de vie, 2% de chances de vous plonger dans un état de Transe de l'ombre après avoir infligé des dégâts à un adversaire. Cet état réduit le temps d'incantation de votre prochain sort Trait de l'ombre de 100%.",
"Confère à vos sorts Corruption et Drain de vie, 4% de chances de vous plonger dans un état de Transe de l'ombre après avoir infligé des dégâts à un adversaire. Cet état réduit le temps d'incantation de votre prochain sort Trait de l'ombre de 100%."
		];
i++;		

//Empowered Corruption - Affliction
rank[i] = [
"Augmente les dégâts de votre sort Corruption d'un montant égal à 12% de votre puissance des sorts.",
"Augmente les dégâts de votre sort Corruption d'un montant égal à 24% de votre puissance des sorts.",
"Augmente les dégâts de votre sort Corruption d'un montant égal à 36% de votre puissance des sorts."
		];
i++;		

//Shadow Embrace - Affliction
rank[i] = [
"Vos sorts Trait de l'ombre et Hanter provoquent aussi l'effet Etreinte de l'ombre, qui augmente tous les dégâts périodiques que vous infligez à la cible de 1%, et réduit tous les soins périodiques prodigués à la cible de 3%. Dure 12 sec. Cumulable jusqu'à 2 fois.",
"Vos sorts Trait de l'ombre et Hanter provoquent aussi l'effet Etreinte de l'ombre, qui augmente tous les dégâts périodiques que vous infligez à la cible de 2%, et réduit tous les soins périodiques prodigués à la cible de 6%. Dure 12 sec. Cumulable jusqu'à 2 fois.",
"Vos sorts Trait de l'ombre et Hanter provoquent aussi l'effet Etreinte de l'ombre, qui augmente tous les dégâts périodiques que vous infligez à la cible de 3%, et réduit tous les soins périodiques prodigués à la cible de 9%. Dure 12 sec. Cumulable jusqu'à 2 fois.",
"Vos sorts Trait de l'ombre et Hanter provoquent aussi l'effet Etreinte de l'ombre, qui augmente tous les dégâts périodiques que vous infligez à la cible de 4%, et réduit tous les soins périodiques prodigués à la cible de 12%. Dure 12 sec. Cumulable jusqu'à 2 fois.",
"Vos sorts Trait de l'ombre et Hanter provoquent aussi l'effet Etreinte de l'ombre, qui augmente tous les dégâts périodiques que vous infligez à la cible de 5%, et réduit tous les soins périodiques prodigués à la cible de 15%. Dure 12 sec. Cumulable jusqu'à 2 fois."
		];
i++;

//Siphon Life - Affliction
rank[i] = [
		"<span style=text-align:left;float:left;>16% de mana de base</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br>Instantané<br>Transfère 81 points de vie de la cible vers le lanceur de sorts toutes les 3 sec. Lasts 30 sec.<br><br>\
		&nbsp;Talent à plusieurs rangs"
		];
i++;		

//Curse of Exhaustion - Affliction
rank[i] = [
		"<span style=text-align:left;float:left;>6% de mana de base</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br>Instantané<br>Réduit la vitesse de la cible de 30% pendant 12 sec. La cible ne peut être victime que d'une malédiction par démoniste présent à la fois."
		];		
i++;		

//Improved Felhunter - Affliction
rank[i] = [
"Votre chasseur corrompu reçoit 4% de son maximum de mana chaque fois qu'il touche avec sa technique Morsure de l'ombre. Augmente également l'effet de l'Intelligence gangrenée de votre chasseur corrompu de 5%.",
"Votre chasseur corrompu reçoit 8% de son maximum de mana chaque fois qu'il touche avec sa technique Morsure de l'ombre. Augmente également l'effet de l'Intelligence gangrenée de votre chasseur corrompu de 10%.",
		];
i++;

//Shadow Mastery - Affliction
rank[i] = [
"Augmente de 3% les points de dégâts infligés ou les points de vie drainés par vos sorts d'Ombre.",
"Augmente de 6% les points de dégâts infligés ou les points de vie drainés par vos sorts d'Ombre.",
"Augmente de 9% les points de dégâts infligés ou les points de vie drainés par vos sorts d'Ombre.",
"Augmente de 12% les points de dégâts infligés ou les points de vie drainés par vos sorts d'Ombre.",
"Augmente de 15% les points de dégâts infligés ou les points de vie drainés par vos sorts d'Ombre."
		];
i++;

//ERADICATION - Affliction 
rank[i]=[
"Vos itérations de Corruption ont 4% de chances d'augmenter votre vitesse d'incantation des sorts de 20% pendant 12 sec. Cet effet ne peut se produire plus d'une fois toutes les 30 sec.",
"Vos itérations de Corruption ont 7% de chances d'augmenter votre vitesse d'incantation des sorts de 20% pendant 12 sec. Cet effet ne peut se produire plus d'une fois toutes les 30 sec.",
"Vos itérations de Corruption ont 10% de chances d'augmenter votre vitesse d'incantation des sorts de 20% pendant 12 sec. Cet effet ne peut se produire plus d'une fois toutes les 30 sec."
			];
i++;	

//Contagion - Affliction
rank[i] = [
"Augmente les points de dégâts infligés par Malédiction d'agonie, Corruption et Graine de Corruption de 1% et réduit la probabilité que vos sorts d'Affliction soient dissipés de 6% supplémentaires.",
"Augmente les points de dégâts infligés par Malédiction d'agonie, Corruption et Graine de Corruption de 2% et réduit la probabilité que vos sorts d'Affliction soient dissipés de 12% supplémentaires.",
"Augmente les points de dégâts infligés par Malédiction d'agonie, Corruption et Graine de Corruption de 3% et réduit la probabilité que vos sorts d'Affliction soient dissipés de 18% supplémentaires.",
"Augmente les points de dégâts infligés par Malédiction d'agonie, Corruption et Graine de Corruption de 4% et réduit la probabilité que vos sorts d'Affliction soient dissipés de 24% supplémentaires.",
"Augmente les points de dégâts infligés par Malédiction d'agonie, Corruption et Graine de Corruption de 5% et réduit la probabilité que vos sorts d'Affliction soient dissipés de 30% supplémentaires."
		];
i++;


//Dark Pact - Affliction
rank[i] = [
		"Portée de 30 m.<br>Instantané<br>Draine 305 points de mana à votre démon invoqué et vous rend 100% du montant.<br><br>\
		&nbsp;Talent à plusieurs rangs"
		];
i++;

//Improved Howl of Terror - Affliction
rank[i] = [
"Réduit le temps d'incantation de votre sort Hurlement de terreur de 0,8 sec.",
"Réduit le temps d'incantation de votre sort Hurlement de terreur de 1,5 sec."
		];
i++;

//Malediction - Affliction
rank[i] = [
"Augmente les effets du bonus relatif aux dégâts de votre sort Malédiction des éléments de 1% supplémentaires, et augmente vos dégâts des sorts de 1%.",
"Augmente les effets du bonus relatif aux dégâts de votre sort Malédiction des éléments de 2% supplémentaires, et augmente vos dégâts des sorts de 2%.",
"Augmente les effets du bonus relatif aux dégâts de votre sort Malédiction des éléments de 3% supplémentaires, et augmente vos dégâts des sorts de 3%."
		];
i++;

//Death's Embrace - Affliction
rank[i] = [
"Augmente le montant de points de vie drainés par votre Drain de vie de 10% quand vous disposez de 20% ou moins de vos points de vie, et augmente les dégâts infligés par vos sorts d'Ombre de 4% quand votre cible dispose de 35% ou moins de ses points de vie.",
"Augmente le montant de points de vie drainés par votre Drain de vie de 20% quand vous disposez de 20% ou moins de vos points de vie, et augmente les dégâts infligés par vos sorts d'Ombre de 8% quand votre cible dispose de 35% ou moins de ses points de vie.",
"Augmente le montant de points de vie drainés par votre Drain de vie de 30% quand vous disposez de 20% ou moins de vos points de vie, et augmente les dégâts infligés par vos sorts d'Ombre de 12% quand votre cible dispose de 35% ou moins de ses points de vie."
		];
i++;

//Unstable Affliction - Affliction  
rank[i]=[
		"<span style=text-align:left;float:left;>15% de mana de base</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br>Incantation de 1,5 sec.<br>L’énergie de l’Ombre détruit lentement la cible, infligeant 660 points de dégâts 660 en 15 sec. De plus, si l'Affliction instable est dissipée, celui qui la dissipe subit 990 points de dégâts et est réduit au silence pendant 5 sec.<br><br>\
		&nbsp;Talent à plusieurs rangs"
			];
i++;	

//Pandemic - Affliction
rank[i] = [
"Chaque fois que vous infligez des dégâts avec Corruption ou Affliction instable, vous avez une chance égale à vos chances de coup critique avec les sorts d'infliger 33% de dégâts supplémentaires.",
"Chaque fois que vous infligez des dégâts avec Corruption ou Affliction instable, vous avez une chance égale à vos chances de coup critique avec les sorts d'infliger 66% de dégâts supplémentaires.",
"Chaque fois que vous infligez des dégâts avec Corruption ou Affliction instable, vous avez une chance égale à vos chances de coup critique avec les sorts d'infliger 100% de dégâts supplémentaires."
		];
i++;


//EVERLASTING AFFLICTION - Affliction
rank[i] = [
"Vos sorts Corruption, Siphon de vie et Affliction instable bénéficient de 1% supplémentaire de vos effets de bonus aux dégâts des sorts, et vos sorts Drain de vie et Hanter ont 20% de chances de réinitialiser la durée de votre sort Corruption sur la cible.",
"Vos sorts Corruption, Siphon de vie et Affliction instable bénéficient de 2% supplémentaires de vos effets de bonus aux dégâts des sorts, et vos sorts Drain de vie et Hanter ont 40% de chances de réinitialiser la durée de votre sort Corruption sur la cible.",
"Vos sorts Corruption, Siphon de vie et Affliction instable bénéficient de 3% supplémentaires de vos effets de bonus aux dégâts des sorts, et vos sorts Drain de vie et Hanter ont 60% de chances de réinitialiser la durée de votre sort Corruption sur la cible.",
"Vos sorts Corruption, Siphon de vie et Affliction instable bénéficient de 4% supplémentaires de vos effets de bonus aux dégâts des sorts, et vos sorts Drain de vie et Hanter ont 80% de chances de réinitialiser la durée de votre sort Corruption sur la cible.",
"Vos sorts Corruption, Siphon de vie et Affliction instable bénéficient de 5% supplémentaires de vos effets de bonus aux dégâts des sorts, et vos sorts Drain de vie et Hanter ont 100% de chances de réinitialiser la durée de votre sort Corruption sur la cible."
		];
i++;

//HAUNT - Affliction 
rank[i] = [
"<span style=text-align:left;float:left;>12% de mana de base</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br><span style=text-align:left;float:left;>Incantation de 1,5 sec.</span><span style=text-align:right;float:right;>8 sec. de recharge</span><br> Vous envoyez une âme fantomatique à l'intérieur de la cible, ce qui lui inflige de 645 à 753 points de dégâts d'Ombre et augmente tous les dégâts infligés par vos effets de dégâts sur la durée de 20% pendant 12 sec. Quand le sort Hanter prend fin ou est dissipé, l'âme vous revient et vous soigne pour un montant de points de vie égal à 100% des dégâts qu'elle a infligés à la cible."
		];
i++;		


// DEMONOLOGY-------------------------------------------------------------->
//Improved Healthstone - Demonology
rank[i] = [
"Augmente le montant de points de vie restaurés par votre Pierre de soin de 10%.",
"Augmente le montant de points de vie restaurés par votre Pierre de soin de 20%."
		];
i++;		

//Improved Imp - Demonology
rank[i] = [
"Augmente les effets des sorts Eclair de feu, Bouclier de feu et Pacte de sang de votre diablotin de 10%.",
"Augmente les effets des sorts Eclair de feu, Bouclier de feu et Pacte de sang de votre diablotin de 20%.",
"Augmente les effets des sorts Eclair de feu, Bouclier de feu et Pacte de sang de votre diablotin de 30%."
		];
i++;

//Demonic Embrace - Demonology
rank[i] = [
"Augmente votre total d'Endurance de 2%.",
"Augmente votre total d'Endurance de 4%.",
"Augmente votre total d'Endurance de 6%.",
"Augmente votre total d'Endurance de 8%.",
"Augmente votre total d'Endurance de 10%."
		];
i++;		

//Improved Health Funnel - Demonology
rank[i] = [
"Augmente le montant de points de vie transférés par votre sort Captation de vie de 10% et réduit le coût initial en points de vie de 10%. De plus, votre démon invoqué subit 15% de dégâts en moins pendant qu'il est sous l'effet de votre Captation de vie.",
"Augmente le montant de points de vie transférés par votre sort Captation de vie de 20% et réduit le coût initial en points de vie de 20%. De plus, votre démon invoqué subit 30% de dégâts en moins pendant qu'il est sous l'effet de votre Captation de vie."
		];		
i++;		

//Demonic Brutality - Demonology
rank[i] = [

"Augmente de 10% l'Endurance et l'Intelligence de votre diablotin, marcheur du Vide, succube, chasseur corrompu et gangregarde et de 1% votre maximum de points de vie et de mana.",
"Augmente de 20% l'Endurance et l'Intelligence de votre diablotin, marcheur du Vide, succube, chasseur corrompu et gangregarde et de 2% votre maximum de points de vie et de mana.",
"Augmente de 30% l'Endurance et l'Intelligence de votre diablotin, marcheur du Vide, succube, chasseur corrompu et gangregarde et de 3% votre maximum de points de vie et de mana."
		];
i++;		

//Fel Vitality - Demonology
rank[i] = [
"Augmente de 5% l'Endurance et l'Intelligence de votre diablotin, marcheur du Vide, succube, chasseur corrompu et gangregarde et de 1% votre maximum de points de vie et de mana.",
"Augmente de 10% l'Endurance et l'Intelligence de votre diablotin, marcheur du Vide, succube, chasseur corrompu et gangregarde et de 2% votre maximum de points de vie et de mana.",
"Augmente de 15% l'Endurance et l'Intelligence de votre diablotin, marcheur du Vide, succube, chasseur corrompu et gangregarde et de 3% votre maximum de points de vie et de mana."
		];
i++;		

//Improved Succubus - Demonology
rank[i] = [
"Réduit le temps d'incantation de la Séduction de votre succube de 33% et augmente la durée de ses sorts Séduction et Invisibilité inférieure de 10%.",
"Réduit le temps d'incantation de la Séduction de votre succube de 66% et augmente la durée de ses sorts Séduction et Invisibilité inférieure de 20%.",
"Réduit le temps d'incantation de la Séduction de votre succube de 100% et augmente la durée de ses sorts Séduction et Invisibilité inférieure de 30%."
		];
i++;

//Soul Link - Demonology
rank[i]=[
		"<span style=text-align:left;float:left;>16% de mana de base</span><span style=text-align:right;float:right;>Portée de 100 m.</span><br>Instantané<br>Une fois activé, 20% de tous les points de dégâts infligés au lanceur de sorts sont subis à sa place par son diablotin, son marcheur du Vide, sa succube, son chasseur corrompu, son gangregarde ou son démon asservi. Ces dégâts ne peuvent être évités. Dure aussi longtemps que le démon est actif et sous contrôle."
		];
i++;	

//Fel Domination - Demonology
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>15 min de recharge</span><br>Le temps d'incantation de votre prochain sort d'invocation de diablotin, de marcheur du Vide, de succube, de chasseur corrompu ou de gangregarde est réduit de 5,5 sec. et son coût en mana est réduit de 50%."
		];
i++;		

//Demonic Aegis - Demonology 
rank[i] = [
"Augmente de 10% l'efficacité de votre Armure démoniaque et de votre Gangrarmure.",
"Augmente de 20% l'efficacité de votre Armure démoniaque et de votre Gangrarmure.",
"Augmente de 30% l'efficacité de votre Armure démoniaque et de votre Gangrarmure."
		];
i++;	

//Unholy Power - Demonology 
rank[i] = [
"Augmente de 4% les dégâts infligés par les attaques de mêlée du marcheur du Vide, de la succube, du chasseur corrompu et du gangregarde et par l'Eclair de feu du diablotin.",
"Augmente de 8% les dégâts infligés par les attaques de mêlée du marcheur du Vide, de la succube, du chasseur corrompu et du gangregarde et par l'Eclair de feu du diablotin.",
"Augmente de 12% les dégâts infligés par les attaques de mêlée du marcheur du Vide, de la succube, du chasseur corrompu et du gangregarde et par l'Eclair de feu du diablotin.",
"Augmente de 16% les dégâts infligés par les attaques de mêlée du marcheur du Vide, de la succube, du chasseur corrompu et du gangregarde et par l'Eclair de feu du diablotin.",
"Augmente de 20% les dégâts infligés par les attaques de mêlée du marcheur du Vide, de la succube, du chasseur corrompu et du gangregarde et par l'Eclair de feu du diablotin."
		];
i++;
		
//Master Summoner - Demonology 
rank[i] = [
"Réduit le temps d'incantation de vos sorts d'invocations de diablotin, de succube, de marcheur du Vide, de chasseur corrompu et de gangregarde de 2 sec et leur coût en mana de 20%.",
"Réduit le temps d'incantation de vos sorts d'invocations de diablotin, de succube, de marcheur du Vide, de chasseur corrompu et de gangregarde de 4 sec et leur coût en mana de 40%."
		];
i++;		

		
//Demonic Sacrifice - Demonology 
rank[i]=[
		"Portée de 100 m.<br>Instantané<br>Lorsque cette technique est activée, votre démon invoqué est sacrifié pour vous faire bénéficier d'un effet qui dure 30 min. L'effet est annulé si vous invoquez un nouveau démon.<br><br>Diablotin : augmente de 10% vos dégâts de Feu.<br><br>Marcheur du Vide : rend 2% de votre total de points de vie toutes les 4 sec.<br><br>Succube : augmente de 10% vos dégâts d’Ombre.<br><br>Chasseur corrompu : rend 3% de votre total de points de mana toutes les 4 sec.<br><br>Gangregarde : augmente de 7% vos dégâts d'Ombre et de Feu et rend 2% de votre total de points de mana toutes les 4 sec."
			];
i++;			
			
//Master Conjuror - Demonology
rank[i]=[
"Augmente de 15% les effets conférés par vos Pierres de feu et Pierres de sort invoquées.",
"Augmente de 30% les effets conférés par vos Pierres de feu et Pierres de sort invoquées."
		];
i++;		

//Mana Feed - Demonology
rank[i]=[
"Lorsque vous recevez du mana grâce aux sorts Drain de mana ou Connexion, votre démon invoqué reçoit lui aussi 33% de ce montant de mana.",
"Lorsque vous recevez du mana grâce aux sorts Drain de mana ou Connexion, votre démon invoqué reçoit lui aussi 66% de ce montant de mana.",
"Lorsque vous recevez du mana grâce aux sorts Drain de mana ou Connexion, votre démon invoqué reçoit lui aussi 100% de ce montant de mana."
		];
i++;				
		
//Master Demonologist - Demonology 
rank[i]=[
"Fait bénéficier le démoniste et le démon invoqué d'un effet aussi longtemps que le démon est actif.<br><br>Diablotin - Augmente vos dégâts de Feu de 1%, et augmente les chances d'effet critique de vos sorts de Feu de 1%.<br><br>Marcheur du Vide - Réduit les dégâts physiques subis de 2%.<br><br>Succube - Augmente vos dégâts d'Ombre de 1%, et augmente les chances d'effet critique de vos sorts d'Ombre de 1%.<br><br>Chasseur corrompu - Réduit tous les dégâts des sorts subis de 2%.<br><br>Gangregarde - Augmente tous les dégâts infligés de 1%, et réduit tous les dégâts subis de 1%.",
"Fait bénéficier le démoniste et le démon invoqué d'un effet aussi longtemps que le démon est actif.<br><br>Diablotin - Augmente vos dégâts de Feu de 2%, et augmente les chances d'effet critique de vos sorts de Feu de 1%.<br><br>Marcheur du Vide - Réduit les dégâts physiques subis de 4%.<br><br>Succube - Augmente vos dégâts d'Ombre de 2%, et augmente les chances d'effet critique de vos sorts d'Ombre de 2%.<br><br>Chasseur corrompu - Réduit tous les dégâts des sorts subis de 4%.<br><br>Gangregarde - Augmente tous les dégâts infligés de 2%, et réduit tous les dégâts subis de 2%.",
"Fait bénéficier le démoniste et le démon invoqué d'un effet aussi longtemps que le démon est actif.<br><br>Diablotin - Augmente vos dégâts de Feu de 3%, et augmente les chances d'effet critique de vos sorts de Feu de 3%.<br><br>Marcheur du Vide - Réduit les dégâts physiques subis de 6%.<br><br>Succube - Augmente vos dégâts d'Ombre de 3%, et augmente les chances d'effet critique de vos sorts d'Ombre de 3%.<br><br>Chasseur corrompu - Réduit tous les dégâts des sorts subis de 6%.<br><br>Gangregarde - Augmente tous les dégâts infligés de 3%, et réduit tous les dégâts subis de 3%.",
"Fait bénéficier le démoniste et le démon invoqué d'un effet aussi longtemps que le démon est actif.<br><br>Diablotin - Augmente vos dégâts de Feu de 4%, et augmente les chances d'effet critique de vos sorts de Feu de 4%.<br><br>Marcheur du Vide - Réduit les dégâts physiques subis de 8%.<br><br>Succube - Augmente vos dégâts d'Ombre de 4%, et augmente les chances d'effet critique de vos sorts d'Ombre de 4%.<br><br>Chasseur corrompu - Réduit tous les dégâts des sorts subis de 8%.<br><br>Gangregarde - Augmente tous les dégâts infligés de 4%, et réduit tous les dégâts subis de 4%.",
"Fait bénéficier le démoniste et le démon invoqué d'un effet aussi longtemps que le démon est actif.<br><br>Diablotin - Augmente vos dégâts de Feu de 5%, et augmente les chances d'effet critique de vos sorts de Feu de 5%.<br><br>Marcheur du Vide - Réduit les dégâts physiques subis de 10%.<br><br>Succube - Augmente vos dégâts d'Ombre de 5%, et augmente les chances d'effet critique de vos sorts d'Ombre de 5%.<br><br>Chasseur corrompu - Réduit tous les dégâts des sorts subis de 10%.<br><br>Gangregarde - Augmente tous les dégâts infligés de 5%, et réduit tous les dégâts subis de 5%."
		];
i++;

//Improved Enslave Demon - Demonology

rank[i] = [
"Réduit les pénalités de vitesse d'attaque et de vitesse d'incantation de votre sort Asservir démon de 5% et réduit les chances de résistance de 5%.",
"Réduit les pénalités de vitesse d'attaque et de vitesse d'incantation de votre sort Asservir démon de 10% et réduit les chances de résistance de 10%."
		];
i++;

//Demonic Resilience - Demonology 
rank[i]=[
"Réduit de 1% la probabilité que vous soyez touché par un coup critique infligé en mêlée ou par un sort et réduit de 5% tous les dégâts que subit votre démon invoqué.",
"Réduit de 2% la probabilité que vous soyez touché par un coup critique infligé en mêlée ou par un sort et réduit de 10% tous les dégâts que subit votre démon invoqué.",
"Réduit de 3% la probabilité que vous soyez touché par un coup critique infligé en mêlée ou par un sort et réduit de 15% tous les dégâts que subit votre démon invoqué."
		];
i++;
		
//Demonic EMPOWERMENT - Demonology - TALENT DIFFERENT - description durations
rank[i]=[
"Confère un renforcement au démon invoqué du démoniste.<br><br> Succube - Disparition immédiate qui la fait entrer dans un état d'nvisibilité améliorée. L'effet de disparition annule tous les étourdissements, ralentissements et effets affectant le déplacement sur la succube.<br><br> Marcheur du Vide - Augmente ses points de vie de 20% et augmente la menace générée par ses sorts et attaques de 20% pendant 20 sec.<br><br> Diablotin - Augmente ses chances de critique avec les sorts de 20% pendant 30 sec. <br><br> Chasseur corrompu - Dissipe tous les effets magiques sur le chasseur corrompu.<br/><br/> Gangregarde - Augmente sa vitesse d'attaque de 20%, annule tous les étourdissements, ralentissements et effets affectant le déplacement et rend le gangregarde insensible à ces effets. Dure 15 sec.<br><br>"
		];
i++;		
	
		
//Demonic Knowledge - Demonology 
rank[i]=[
"Augmente les dégâts de vos sorts d'un montant égal à 4% du total de l'Endurance plus l'Intelligence de votre démon actif.",
"Augmente les dégâts de vos sorts d'un montant égal à 8% du total de l'Endurance plus l'Intelligence de votre démon actif.",
"Augmente les dégâts de vos sorts d'un montant égal à 12% du total de l'Endurance plus l'Intelligence de votre démon actif."
		];
i++;		


//Demonic Tactics - Demonology 
rank[i]=[
"Augmente vos chances de coup critique en mêlée et avec les sorts ainsi que celles de votre démon invoqué de 2%.",
"Augmente vos chances de coup critique en mêlée et avec les sorts ainsi que celles de votre démon invoqué de 4%.",
"Augmente vos chances de coup critique en mêlée et avec les sorts ainsi que celles de votre démon invoqué de 6%.",
"Augmente vos chances de coup critique en mêlée et avec les sorts ainsi que celles de votre démon invoqué de 8%.",
"Augmente vos chances de coup critique en mêlée et avec les sorts ainsi que celles de votre démon invoqué de 10%."
		];
i++;	


//FEL SYNERGY - Demonology 
rank[i]=[
"Vos démons invoqués partagent 5% supplémentaires de votre Armure, votre Intelligence et votre Endurance, et vous avez 50% de chances de soigner votre familier pour un montant de points de vie égal à 15% des dégâts que vous infligez.",
"Vos démons invoqués partagent 10% supplémentaires de votre Armure, votre Intelligence et votre Endurance, et vous avez 100% de chances de soigner votre familier pour un montant de points de vie égal à 15% des dégâts que vous infligez."
		];
i++;	

//Improved Demonic Tactics - Demonology
rank[i]=[
"Augmente les chances de coup critique de vos démons invoqués, les rendant égales à 10% de vos propres chances.",
"Augmente les chances de coup critique de vos démons invoqués, les rendant égales à 20% de vos propres chances.",
"Augmente les chances de coup critique de vos démons invoqués, les rendant égales à 30% de vos propres chances."
		];
i++;

//Summon Felguard - Demonology 
rank[i]=[
	"<span style=text-align:left;float:left;>80% de mana de base</span><BR><span style=text-align:left;float:left;>Incantation de 10 sec.</span><br>Composant : fragment d'âme<BR>Invoque un gangregarde qui exécute les ordres du démoniste."
		];
i++;


//Demonic Empathy - Demonology 
rank[i]=[
"Quand vous ou votre familier réussissez un coup critique avec un sort ou une technique, les dégâts infligés par l'autre avec ses trois prochains sorts ou techniques sont augmentés de 1%. Dure 15 sec.",
"Quand vous ou votre familier réussissez un coup critique avec un sort ou une technique, les dégâts infligés par l'autre avec ses trois prochains sorts ou techniques sont augmentés de 2%. Dure 15 sec.",
"Quand vous ou votre familier réussissez un coup critique avec un sort ou une technique, les dégâts infligés par l'autre avec ses trois prochains sorts ou techniques sont augmentés de 3%. Dure 15 sec."
		];
i++;

//Demonic Pact - Demonology - TALENT DIFFERENT - description changed
rank[i]=[
"Les critiques de votre familier appliquent l'effet Pacte démoniaque sur les membres de votre groupe ou raid. Le Pacte démoniaque augmente la puissance des sorts de 2% de vos dégâts des sorts pendant 12 sec. Ne fonctionne pas sur les démons asservis.",
"Les critiques de votre familier appliquent l'effet Pacte démoniaque sur les membres de votre groupe ou raid. Le Pacte démoniaque augmente la puissance des sorts de 4% de vos dégâts des sorts pendant 12 sec. Ne fonctionne pas sur les démons asservis.",
"Les critiques de votre familier appliquent l'effet Pacte démoniaque sur les membres de votre groupe ou raid. Le Pacte démoniaque augmente la puissance des sorts de 6% de vos dégâts des sorts pendant 12 sec. Ne fonctionne pas sur les démons asservis.",
"Les critiques de votre familier appliquent l'effet Pacte démoniaque sur les membres de votre groupe ou raid. Le Pacte démoniaque augmente la puissance des sorts de 8% de vos dégâts des sorts pendant 12 sec. Ne fonctionne pas sur les démons asservis.",
"Les critiques de votre familier appliquent l'effet Pacte démoniaque sur les membres de votre groupe ou raid. Le Pacte démoniaque augmente la puissance des sorts de 10% de vos dégâts des sorts pendant 12 sec. Ne fonctionne pas sur les démons asservis."
		];
i++;

//Metamorphosis - Demonology 
rank[i]=[
"<span style=text-align:left;float:left;>Instantané</span><br><br>Vous vous transformez en démon pendant 30 sec. Cette forme augmente votre armure de 600% et vos dégâts de 20%, réduit la probabilité que vous soyez touché par des coups critiques en mêlée de 6% et réduit la durée des effets d'étourdissement et de ralentissement qui vous affectent de 50%. Vous bénéficiez de techniques démoniaques spécifiques en plus de vos techniques normales."
		];
i++;





//DESTRUCTION ----------------------------------------------
//Improved Shadow Bolt - Destruction  
rank[i]=[
"Les coups critiques de votre sort Trait de l'ombre augmentent de 2% les dégâts d'Ombre infligés jusqu'à ce que 4 sources de dégâts non périodiques aient été appliquées. Cet effet dure 12 sec.",
"Les coups critiques de votre sort Trait de l'ombre augmentent de 4% les dégâts d'Ombre infligés jusqu'à ce que 4 sources de dégâts non périodiques aient été appliquées. Cet effet dure 12 sec.",
"Les coups critiques de votre sort Trait de l'ombre augmentent de 6% les dégâts d'Ombre infligés jusqu'à ce que 4 sources de dégâts non périodiques aient été appliquées. Cet effet dure 12 sec.",
"Les coups critiques de votre sort Trait de l'ombre augmentent de 8% les dégâts d'Ombre infligés jusqu'à ce que 4 sources de dégâts non périodiques aient été appliquées. Cet effet dure 12 sec.",
"Les coups critiques de votre sort Trait de l'ombre augmentent de 10% les dégâts d'Ombre infligés jusqu'à ce que 4 sources de dégâts non périodiques aient été appliquées. Cet effet dure 12 sec."
		];
i++;		
		
//Bane - Destruction
rank[i]=[
"Réduit le temps d'incantation de vos sorts Trait de l'ombre, Trait du chaos et Immolation de 0,1 sec et Feu de l'âme de 0,4 sec.",
"Réduit le temps d'incantation de vos sorts Trait de l'ombre, Trait du chaos et Immolation de 0,2 sec et Feu de l'âme de 0,8 sec.",
"Réduit le temps d'incantation de vos sorts Trait de l'ombre, Trait du chaos et Immolation de 0,3 sec et Feu de l'âme de 1,2 sec.",
"Réduit le temps d'incantation de vos sorts Trait de l'ombre, Trait du chaos et Immolation de 0,4 sec et Feu de l'âme de 1,6 sec.",
"Réduit le temps d'incantation de vos sorts Trait de l'ombre, Trait du chaos et Immolation de 0,5 sec et Feu de l'âme de 2,0 sec."
		];
i++;


//Aftermath - Destruction
rank[i]=[
"Confère 5% de chances à vos sorts de Destruction d'hébéter la cible pendant 5 sec.",
"Confère 10% de chances à vos sorts de Destruction d'hébéter la cible pendant 5 sec."

		];
i++;

//Molten Core - Destruction
rank[i]=[
"Vos sorts et effets de dégâts sur la durée d'Ombre ont 5% de chances d'augmenter les dégâts de vos sorts de Feu de 10% pendant 6 sec.",
"Vos sorts et effets de dégâts sur la durée d'Ombre ont 10% de chances d'augmenter les dégâts de vos sorts de Feu de 10% pendant 6 sec.",
"Vos sorts et effets de dégâts sur la durée d'Ombre ont 15% de chances d'augmenter les dégâts de vos sorts de Feu de 10% pendant 6 sec."
		];
i++;
		
//Cataclysm - Destruction
rank[i]=[
"Réduit le coût en mana de vos sorts de Destruction de 1% et augmente vos chances de toucher avec les sorts de Destruction de 1%.",
"Réduit le coût en mana de vos sorts de Destruction de 2% et augmente vos chances de toucher avec les sorts de Destruction de 2%.",
"Réduit le coût en mana de vos sorts de Destruction de 3% et augmente vos chances de toucher avec les sorts de Destruction de 3%."
		];
i++;			
		
	


		
//Demonic Power - Destruction
rank[i]=[
"Reduces the de recharge of your Succubus' Lash of Pain spell by 3 sec, and reduces the casting time of your Imp's Firebolt spell by 0.25 sec",
"Reduces the de recharge of your Succubus' Lash of Pain spell by 6 sec, and reduces the casting time of your Imp's Firebolt spell by 0.50 sec"
		];
i++;	

//Shadowburn - Destruction 
rank[i]=[
		"<span style=text-align:left;float:left;>105 pts. mana</span><span style=text-align:right;float:right;>Portée de 20 m.</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>15 sec. de recharge</span><br>Composant : fragment d'âme<br>Frappe instantanément la cible et lui inflige de 91 à 104 points de dégâts d'Ombre. Si la cible meurt dans les 5 sec. sous l'effet du sort Brûlure de l'ombre et rapporte de l'expérience ou de l'honneur, le lanceur gagne un Fragment d'âme.<br><br>\
		&nbsp;Rangs disponibles :<br>\
		&nbsp;Rang 2: 130 pts. mana, 123-140 pts. dégâts<br>\
		&nbsp;Rang 3: 190 pts. mana, 196-221 pts. dégâts<br>\
		&nbsp;Rang 4: 245 pts. mana, 274-307 pts. dégâts<br>\
		&nbsp;Rang 5: 305 pts. mana, 365-408 pts. dégâts<br>\
		&nbsp;Rang 6: 365 pts. mana, 468-520 pts. dégâts<br>\
		&nbsp;Rang 7: 435 pts. mana, 538-599 pts. dégâts<br>\
		&nbsp;Rang 8: 515 pts. mana, 597-665 pts. dégâts"
		];
i++;
		


//Ruin - Destruction  
rank[i]=[
"Augmente de 20% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Destruction.",
"Augmente de 40% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Destruction.",
"Augmente de 60% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Destruction.",
"Augmente de 80% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Destruction.",
"Augmente de 100% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Destruction."
		];
i++;
		
		
//Intensity - Destruction
rank[i]=[
"Réduit de 35% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez ou canalisez tout sort de Destruction.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez ou canalisez tout sort de Destruction."
		];
i++;		
		
//Destructive Reach - Destruction  
rank[i]=[
"Augmente de 10% la portée de vos sorts de Destruction et réduit de 5% la menace générée par les sorts de Destruction.",
"Augmente de 20% la portée de vos sorts de Destruction et réduit de 10% la menace générée par les sorts de Destruction."
		];
i++;	
		
//Improved Searing Pain - Destruction   
rank[i]=[
"Augmente de 4% les chances d'infliger un coup critique avec votre sort Douleur brûlante.",
"Augmente de 7% les chances d'infliger un coup critique avec votre sort Douleur brûlante.",
"Augmente de 10% les chances d'infliger un coup critique avec votre sort Douleur brûlante."
		];
i++;	


//Pyroclasm - Destruction
rank[i]=[
"Confère 13% de chances à vos sorts Pluie de feu, Flammes infernales, Conflagration et Feu de l'âme d'étourdir la cible pendant 3 sec.",
"Confère 26% de chances à vos sorts Pluie de feu, Flammes infernales, Conflagration et Feu de l'âme d'étourdir la cible pendant 3 sec."
		];
i++;	


//Improved Immolate - Destruction 
rank[i]=[
"Augmente les dégâts initiaux de votre sort Immolation de 10%.",
"Augmente les dégâts initiaux de votre sort Immolation de 20%.",
"Augmente les dégâts initiaux de votre sort Immolation de 30%."
		];
i++;	



//Devastation - Destruction
rank[i]=[
"Augmente de 5% vos chances d'infliger un coup critique avec vos sorts de Destruction."
		];
i++;


//Nether Protection - Destruction 
rank[i]=[
"Après avoir été touché par un sort, vous avez 10% de chances de recevoir la Protection du Néant, qui réduit tous les dégâts de la même école de 60% pendant 8 sec.",
"Après avoir été touché par un sort, vous avez 20% de chances de recevoir la Protection du Néant, qui réduit tous les dégâts de la même école de 60% pendant 8 sec.",
"Après avoir été touché par un sort, vous avez 30% de chances de recevoir la Protection du Néant, qui réduit tous les dégâts de la même école de 60% pendant 8 sec."
		];
i++;

//Emberstorm - Destruction 
rank[i]=[
"Augmente les dégâts infligés par vos sorts de Feu de 3% et réduit le temps d'incantation de votre sort Incinérer de 0,05 sec.",
"Augmente les dégâts infligés par vos sorts de Feu de 6% et réduit le temps d'incantation de votre sort Incinérer de 0,10 sec.",
"Augmente les dégâts infligés par vos sorts de Feu de 9% et réduit le temps d'incantation de votre sort Incinérer de 0,15 sec.",
"Augmente les dégâts infligés par vos sorts de Feu de 12% et réduit le temps d'incantation de votre sort Incinérer de 0,20 sec.",
"Augmente les dégâts infligés par vos sorts de Feu de 15% et réduit le temps d'incantation de votre sort Incinérer de 0,5 sec."
		];
i++;	



//Conflagrate - Destruction 
rank[i]=[

		"<span style=text-align:left;float:left;>165 pts. mana</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>10 sec. de recharge</span><br>Enflamme une cible qui est déjà affectée par votre Immolation, lui inflige de 249 à 316 points de dégâts de Feu et annule le sort Immolation.<br><br>\
		&nbsp;Rangs disponibles :<br>\
		&nbsp;Rang 2: 200 pts. mana, 326-407 pts. dégâts<br>\
		&nbsp;Rang 3: 230 pts. mana, 395-491 pts. dégâts<br>\
		&nbsp;Rang 4: 255 pts. mana, 455-566 pts. dégâts<br>\
		&nbsp;Rang 5: 280 pts. mana, 521-648 pts. dégâts<br>\
		&nbsp;Rang 6: 305 pts. mana, 579-721 pts. dégâts"
		];
i++;	

//Soul Leech - Destruction 
rank[i]=[
"Confère à vos sorts Trait de l'ombre, Brûlure de l'ombre, Trait du chaos, Feu de l'âme, Incinérer, Douleur brûlante et Conflagration 10% de chances de vous rendre un montant de points de vie égal à 20% des dégâts infligés.",
"Confère à vos sorts Trait de l'ombre, Brûlure de l'ombre, Trait du chaos, Feu de l'âme, Incinérer, Douleur brûlante et Conflagration 20% de chances de vous rendre un montant de points de vie égal à 20% des dégâts infligés.",
"Confère à vos sorts Trait de l'ombre, Brûlure de l'ombre, Trait du chaos, Feu de l'âme, Incinérer, Douleur brûlante et Conflagration 30% de chances de vous rendre un montant de points de vie égal à 20% des dégâts infligés."
		];
i++;

//Backlash - Destruction //New/Changed
rank[i]=[
"Augmente vos chances d'infliger un coup critique avec les sorts de 1% supplémentaires et vous confère 8% de chances lorsque vous êtes touché par une attaque physique de réduire le temps d'incantation de votre prochain sort Trait de l'ombre ou Incinérer de 100%. Cet effet dure 8 sec. et ne peut se produire plus d'une fois toutes les 8 secondes.",
"Augmente vos chances d'infliger un coup critique avec les sorts de 2% supplémentaires et vous confère 16% de chances lorsque vous êtes touché par une attaque physique de réduire le temps d'incantation de votre prochain sort Trait de l'ombre ou Incinérer de 100%. Cet effet dure 8 sec. et ne peut se produire plus d'une fois toutes les 8 secondes.",
"Augmente vos chances d'infliger un coup critique avec les sorts de 3% supplémentaires et vous confère 25% de chances lorsque vous êtes touché par une attaque physique de réduire le temps d'incantation de votre prochain sort Trait de l'ombre ou Incinérer de 100%. Cet effet dure 8 sec. et ne peut se produire plus d'une fois toutes les 8 secondes."
		];
i++;

//Shadow and Flame - Destruction 
rank[i]=[
"Vos sorts Trait de l'ombre, Trait du chaos et Incinérer bénéficient de 4% supplémentaires des effets du bonus relatif aux dégâts des sorts.",
"Vos sorts Trait de l'ombre, Trait du chaos et Incinérer bénéficient de 8% supplémentaires des effets du bonus relatif aux dégâts des sorts.",
"Vos sorts Trait de l'ombre, Trait du chaos et Incinérer bénéficient de 12% supplémentaires des effets du bonus relatif aux dégâts des sorts.",
"Vos sorts Trait de l'ombre, Trait du chaos et Incinérer bénéficient de 16% supplémentaires des effets du bonus relatif aux dégâts des sorts.",
"Vos sorts Trait de l'ombre, Trait du chaos et Incinérer bénéficient de 20% supplémentaires des effets du bonus relatif aux dégâts des sorts."
		];
i++;

//Improved Soul Leech - Destruction 
rank[i]=[
"L'effet de votre Suceur d'âme rend également à vous-même et à votre démon invoqué un montant de mana égal à 1% du maximum de mana.",
"L'effet de votre Suceur d'âme rend également à vous-même et à votre démon invoqué un montant de mana égal à 2% du maximum de mana."
		];
i++;

//Backdraft - Destruction 
rank[i]=[
"Quand vous lancez Conflagration, le temps d'incantation de vos trois prochains sorts de Destruction est réduit de 10%. Dure 15 sec.",
"Quand vous lancez Conflagration, le temps d'incantation de vos trois prochains sorts de Destruction est réduit de 20%. Dure 15 sec.",
"Quand vous lancez Conflagration, le temps d'incantation de vos trois prochains sorts de Destruction est réduit de 30%. Dure 15 sec."
		];
i++;

//Shadowfury - Destruction
rank[i]=[
		"<span style=text-align:left;float:left;>1383 pts. mana</span><span style=text-align:right;float:right;>Portée de 36 m.</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>20 sec. de recharge</span><br>La furie de l'ombre est libérée. Elle inflige de 357 à 422 points de dégâts d'Ombre et étourdit tous les ennemis dans un rayon de 8 mètres pendant 3 sec.<br><br>\
		&nbsp;Rangs disponibles :<br>\
		&nbsp;Rang 2: 545 pts. mana, 476-565 pts. dégâts<br>\
		&nbsp;Rang 3: 710 pts. mana, 612-728 pts. dégâts<br>"
		];
i++;

//Empowered Imp - Destruction 
rank[i]=[
"Augmente les dégâts infligés par votre diablotin de 5%, et tous les coups critiques qu'il réussit ont 33% de chances d'augmenter les chances de coup critique de votre prochain sort de 20%. Cet effet dure 8 sec.",
"Augmente les dégâts infligés par votre diablotin de 10%, et tous les coups critiques qu'il réussit ont 66% de chances d'augmenter les chances de coup critique de votre prochain sort de 20%. Cet effet dure 8 sec.",
"Augmente les dégâts infligés par votre diablotin de 15%, et tous les coups critiques qu'il réussit ont 100% de chances d'augmenter les chances de coup critique de votre prochain sort de 20%. Cet effet dure 8 sec."
		];
i++;

//Fire and Brimstone - Destruction 
rank[i]=[
"Augmente les dégâts de votre sort Immolation d'un montant égal à 3% de votre puissance des sorts, et les chances de coup critique de votre sort Conflagration sont augmentées de 5% s'il reste 5 secondes ou moins à l'Immolation sur la cible.",
"Augmente les dégâts de votre sort Immolation d'un montant égal à 6% de votre puissance des sorts, et les chances de coup critique de votre sort Conflagration sont augmentées de 10% s'il reste 5 secondes ou moins à l'Immolation sur la cible.",
"Augmente les dégâts de votre sort Immolation d'un montant égal à 9% de votre puissance des sorts, et les chances de coup critique de votre sort Conflagration sont augmentées de 15% s'il reste 5 secondes ou moins à l'Immolation sur la cible.",
"Augmente les dégâts de votre sort Immolation d'un montant égal à 12% de votre puissance des sorts, et les chances de coup critique de votre sort Conflagration sont augmentées de 20% s'il reste 5 secondes ou moins à l'Immolation sur la cible.",
"Augmente les dégâts de votre sort Immolation d'un montant égal à 15% de votre puissance des sorts, et les chances de coup critique de votre sort Conflagration sont augmentées de 25% s'il reste 5 secondes ou moins à l'Immolation sur la cible."
		];
i++;

//Chaos Bolt - Destruction 
rank[i]=[
	"<span style=text-align:left;float:left;>336 pts. mana</span><span style=text-align:right;float:right;>Portée de 36 m.</span><br><span style=text-align:left;float:left;>Incantation de 1,5 sec.</span><span style=text-align:right;float:right;>12 sec. de recharge</span><BR> Lance un éclair de feu chaotique sur l'ennemi et lui inflige de 685 à 861 points de dégâts de Feu. On ne peut pas résister à Trait du chaos, et il traverse tous les effets d'absorption."
		];
i++;
		
//Destruction Talents End^^

