var i = 0;
var t = 0;

var className = "Talents de chevalier de la mort";
var talentPath = "/info/basics/talents/";

tree[i] = "Sang"; i++;
tree[i] = "Givre"; i++;
tree[i] = "Impie"; i++;


i = 0;

//rank
//horizontal position
//vertical position
//Blood talents
talent[i] = [0, "Boucherie", 2, 1, 1]; i++;
talent[i] = [0, "Subversion", 3, 2, 1]; i++;
talent[i] = [0, "Barrière de lame", 5, 3, 1]; i++;
talent[i] = [0, "Armure tranchante", 5, 1, 2]; i++;
talent[i] = [0, "Odeur du sang", 3, 2, 2]; i++;
talent[i] = [0, "Spécialisation Arme 2M", 2, 3, 2]; i++;
talent[i] = [0, "Connexion runique", 1, 1, 3]; i++;
talent[i] = [0, "Sombre conviction", 5, 2, 3]; i++;
talent[i] = [0, "Maîtrise des runes de la mort", 3, 3, 3]; i++;
talent[i] = [0, "Connexion runique améliorée", 3, 1, 4, [getTalentID("Connexion runique"),1]]; i++;
talent[i] = [0, "Déviation de sort", 3, 3, 4]; i++;
talent[i] = [0, "Vendetta", 3, 4, 4]; i++;
talent[i] = [0, "Frappes sanglantes", 3, 1, 5]; i++;
talent[i] = [0, "Vétéran de la Troisième guerre", 3, 3, 5]; i++;
talent[i] = [0, "Marque de sang", 1, 4, 5]; i++;
talent[i] = [0, "Vengeance sanglante", 3, 2, 6, [getTalentID("Sombre conviction"),5]]; i++;
talent[i] = [0, "Puissance de l'abomination", 2, 3, 6]; i++;
talent[i] = [0, "Vers de sang", 3, 1, 7]; i++;
talent[i] = [0, "Hystérie", 1, 2, 7]; i++;
talent[i] = [0, "Aura de sang", 2, 3, 7]; i++;
talent[i] = [0, "Malédiction soudaine", 5, 2, 8]; i++;
talent[i] = [0, "Sang vampirique", 1, 3, 8]; i++;
talent[i] = [0, "Volonté de la nécropole", 3, 1, 9]; i++;
talent[i] = [0, "Frappe au cœur", 1, 2, 9]; i++;
talent[i] = [0, "La puissance de Mograine", 3, 3, 9]; i++;
talent[i] = [0, "Gorgé de sang", 5, 2, 10]; i++;
talent[i] = [0, "Arme runique dansante", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//Frost talents
talent[i] = [1, "Toucher de glace amélioré", 3, 1, 1]; i++;
talent[i] = [1, "Pourriture des glaciers", 2, 2, 1]; i++;
talent[i] = [1, "Résistance", 5, 3, 1]; i++;
talent[i] = [1, "Allonge glaciale", 2, 2, 2]; i++;
talent[i] = [1, "Glace noire", 5, 3, 2]; i++;
talent[i] = [1, "Nerfs d'acier glacé", 3, 4, 2]; i++;
talent[i] = [1, "Serres de glace", 5, 1, 3, [getTalentID("Toucher de glace amélioré"),3]]; i++;
talent[i] = [1, "Changeliche", 1, 2, 3]; i++;
talent[i] = [1, "Annihilation", 3, 3, 3]; i++;
talent[i] = [1, "Maîtrise de la puissance runique", 3, 2, 4]; i++;
talent[i] = [1, "Machine à tuer", 5, 3, 4]; i++;
talent[i] = [1, "Plaques d'effroi algides", 3, 2, 5]; i++;
talent[i] = [1, "Froid de la tombe", 2, 3, 5]; i++;
talent[i] = [1, "Froid de la mort", 1, 4, 5]; i++;
talent[i] = [1, "Serres de glace améliorées", 1, 1, 6, [getTalentID("Serres de glace"),5]]; i++;
talent[i] = [1, "Combat impitoyable", 2, 2, 6]; i++
talent[i] = [1, "Frimas", 3, 3, 6]; i++;
talent[i] = [1, "Hiver sans fin", 2, 4, 6]; i++;
talent[i] = [1, "Rafale hurlante", 1, 2, 7]; i++;
talent[i] = [1, "Aura de givre", 2, 3, 7]; i++;
talent[i] = [1, "Engelures", 3, 4, 7, [getTalentID("Hiver sans fin"),2]]; i++;
talent[i] = [1, "Sang du Nord", 5, 2, 8]; i++;
talent[i] = [1, "Armure incassable", 1, 3, 8]; i++;
talent[i] = [1, "Acclimatation", 3, 1, 9]; i++;
talent[i] = [1, "Frappe de givre", 1, 2, 9]; i++;
talent[i] = [1, "Ruse de Fielsang", 3, 3, 9]; i++;
talent[i] = [1, "Traqueur de la toundra", 5, 2, 10]; i++;
talent[i] = [1, "Froid dévorant", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//Unholy talents
talent[i] = [2, "Attaques vicieuses", 2, 1, 1]; i++;
talent[i] = [2, "Morbidité", 3, 2, 1]; i++;
talent[i] = [2, "Anticipation", 5, 3, 1]; i++;
talent[i] = [2, "Épidémie", 2, 1, 2]; i++;
talent[i] = [2, "Virulence", 3, 2, 2]; i++;
talent[i] = [2, "Autorité impie", 2, 3, 2]; i++;
talent[i] = [2, "Morts voraces", 3, 4, 2]; i++;
talent[i] = [2, "Poussée de fièvre", 3, 1, 3]; i++;
talent[i] = [2, "Nécrose", 5, 2, 3]; i++;
talent[i] = [2, "Explosion morbide", 1, 3, 3]; i++;
talent[i] = [2, "Sur un cheval pâle", 2, 2, 4]; i++;
talent[i] = [2, "Lame incrustée de sang", 3, 3, 4]; i++;
talent[i] = [2, "Ombre de la mort", 1, 4, 4]; i++;
talent[i] = [2, "Invocation d'une gargouille", 1, 1, 5]; i++;
talent[i] = [2, "Impureté", 5, 2, 5]; i++;
talent[i] = [2, "Complainte", 2, 3, 5]; i++;
talent[i] = [2, "Suppression de la magie", 5, 2, 6]; i++;
talent[i] = [2, "Moisson", 3, 3, 6]; i++;
talent[i] = [2, "Maître des goules", 1, 4, 6, [getTalentID("Ombre de la mort"),1]]; i++;
talent[i] = [2, "Violation", 5, 1, 7]; i++;
talent[i] = [2, "Zone anti-magie", 1, 2, 7, [getTalentID("Suppression de la magie"),5]]; i++;
talent[i] = [2, "Aura impie", 2, 3, 7]; i++;
talent[i] = [2, "Nuit des morts", 2, 1, 8]; i++;
talent[i] = [2, "Fièvre de la crypte", 3, 2, 8]; i++;
talent[i] = [2, "Bouclier d'os", 1, 3, 8]; i++;
talent[i] = [2, "Peste galopante", 3, 1, 9]; i++;
talent[i] = [2, "Porte-peste d'ébène", 3, 2, 9, [getTalentID("Fièvre de la crypte"),3]]; i++;
talent[i] = [2, "Frappe du Fléau", 1, 3, 9]; i++;
talent[i] = [2, "Rage de Vaillefendre", 5, 2, 10]; i++;
talent[i] = [2, "Chancre impie", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

i = 0;


//Blood Talents Begin

//Butchery - BLOOD
rank[i] = [
"Chaque fois que vous tuez un ennemi qui rapporte de l'expérience ou de l'honneur, vous générez jusqu'à 10 points de Puissance runique. De plus, vous générez 1 point de Puissance runique toutes les 5 sec. pendant que vous êtes en combat.",
"Chaque fois que vous tuez un ennemi qui rapporte de l'expérience ou de l'honneur, vous générez jusqu'à 20 points de Puissance runique. De plus, vous générez 2 point de Puissance runique toutes les 5 sec. pendant que vous êtes en combat."
		];
i++;	
//Blood Talents End

//SUBVERSION - BLOOD
rank[i] = [
"Augmente les chances de coup critique de Frappe de sang, Frappe au cœur et Anéantissement de 3%, et réduit la menace générée lorsque vous êtes en Présence de Sang ou impie de 8%.",
"Augmente les chances de coup critique de Frappe de sang, Frappe au cœur et Anéantissement de 6%, et réduit la menace générée lorsque vous êtes en Présence de Sang ou impie de 16%.",
"Augmente les chances de coup critique de Frappe de sang, Frappe au cœur et Anéantissement de 9%, et réduit la menace générée lorsque vous êtes en Présence de Sang ou impie de 25%%."
		];
i++;

//BLADE BARRIER - BLOOD
rank[i] = [
"Chaque fois que vos runes de Sang sont en cours de recharge, vos chances de parer sont augmentées de 2% pendant 10 sec.",
"WheneChaque fois que vos runes de Sang sont en cours de recharge, vos chances de parer sont augmentées de 4% pendant 10 sec.",
"WheneChaque fois que vos runes de Sang sont en cours de recharge, vos chances de parer sont augmentées de 6% pendant 10 sec.",
"WheneChaque fois que vos runes de Sang sont en cours de recharge, vos chances de parer sont augmentées de 8% pendant 10 sec.",
"WheneChaque fois que vos runes de Sang sont en cours de recharge, vos chances de parer sont augmentées de 10% pendant 10 sec."
		];
i++;

//Bladed Armor - Blood
rank[i] = [
"Augmente votre puissance d'attaque de 1 pour chaque tranche de 180 pts. de votre valeur d'armure.",
"Augmente votre puissance d'attaque de 2 pour chaque tranche de 180 pts. de votre valeur d'armure.",
"Augmente votre puissance d'attaque de 3 pour chaque tranche de 180 pts. de votre valeur d'armure.",
"Augmente votre puissance d'attaque de 4 pour chaque tranche de 180 pts. de votre valeur d'armure.",
"Augmente votre puissance d'attaque de 5 pour chaque tranche de 180 pts. de votre valeur d'armure."
		];
i++;



//SCENT OF BLOOD - BLOOD
rank[i] = [
"Vous avez 15% de chances après avoir été frappé par un coup en mêlée ou à distance de bénéficier de l'effet Odeur du sang, qui fait générer à votre prochain coup en mêlée 5 points de Puissance runique. Cet effet ne peut se produire plus d'une fois toutes les 20 sec.",
"Vous avez 15% de chances après avoir été frappé par un coup en mêlée ou à distance de bénéficier de l'effet Odeur du sang, qui fait générer à vos 2 prochains coup en mêlée 5 points de Puissance runique. Cet effet ne peut se produire plus d'une fois toutes les 20 sec.",
"Vous avez 15% de chances après avoir été frappé par un coup en mêlée ou à distance de bénéficier de l'effet Odeur du sang, qui fait générer à vos 3 prochains coup en mêlée 5 points de Puissance runique. Cet effet ne peut se produire plus d'une fois toutes les 20 sec."
		];
i++;

	
//Two-Handed Weapon Specialization - BLOOD
rank[i] = [
"Augmente les points de dégâts que vous infligez avec les armes de mêlée à deux mains de 2%.",
"Augmente les points de dégâts que vous infligez avec les armes de mêlée à deux mains de 4%."
		];
i++;	
	
//Rune Tap - Blood
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. de Sang<br></span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>1 min. de recharge</span><br>Convertit 1 Rune de Sang en 10% de vos points de vie maximum."
		];
i++;
	
//DARK CONVICTION - BLOOD
rank[i] = [
"Augmente de 1% vos chances d'infliger un coup critique avec les armes, les sorts et les techniques.",
"Augmente de 2% vos chances d'infliger un coup critique avec les armes, les sorts et les techniques.",
"Augmente de 3% vos chances d'infliger un coup critique avec les armes, les sorts et les techniques.",
"Augmente de 4% vos chances d'infliger un coup critique avec les armes, les sorts et les techniques.",
"Augmente de 5% vos chances d'infliger un coup critique avec les armes, les sorts et les techniques."
		];
i++;

//DEATH RUNE MASTERY - BLOOD
rank[i] = [
"Chaque fois que vous touchez avec Frappe de mort ou Anéantissement, il y a 33% de chances que les runes de givre et impie deviennent des runes de la mort lors de leur activation.",
"Chaque fois que vous touchez avec Frappe de mort ou Anéantissement, il y a 66% de chances que les runes de givre et impie deviennent des runes de la mort lors de leur activation.",
"Chaque fois que vous touchez avec Frappe de mort ou Anéantissement, il y a 100% de chances que les runes de givre et impie deviennent des runes de la mort lors de leur activation."
		];
i++;


//Improved Rune Tap - Blood
rank[i] = [
"Augmente de 33% les points de vie prodigués par Connexion runique et réduit son temps de recharge de 10 sec.",
"Augmente de 66% les points de vie prodigués par Connexion runique et réduit son temps de recharge de 20 sec.",
"Augmente de 100% les points de vie prodigués par Connexion runique et réduit son temps de recharge de 30 sec."
		];
i++;

//SPELL DEFLECTION - BLOOD
rank[i] = [
"Vous avez une chance égale à votre chance de parer que les sorts de dégâts directs vous infligent 10% de dégâts en moins.",
"Vous avez une chance égale à votre chance de parer que les sorts de dégâts directs vous infligent 20% de dégâts en moins.",
"Vous avez une chance égale à votre chance de parer que les sorts de dégâts directs vous infligent 30% de dégâts en moins."
		];
i++;

//VENDETTA - BLOOD
rank[i] = [
"Chaque fois que vous tuez une cible qui rapporte de l'expérience ou de l'honneur, vous êtes soigné pour un montant égal à 2% au plus de votre maximum de points de vie.",
"Chaque fois que vous tuez une cible qui rapporte de l'expérience ou de l'honneur, vous êtes soigné pour un montant égal à 4% au plus de votre maximum de points de vie.",
"Chaque fois que vous tuez une cible qui rapporte de l'expérience ou de l'honneur, vous êtes soigné pour un montant égal à 6% au plus de votre maximum de points de vie."
		];
i++;



//Bloody Strikes - Blood
rank[i] = [
"Augmente les dégâts de 6% et le bonus de dégâts des maladies de vos Frappes de Sang et Frappes au cœur de 20%.",
"Augmente les dégâts de 12% et le bonus de dégâts des maladies de vos Frappes de Sang et Frappes au cœur de 40%.",
"Augmente les dégâts de 18% et le bonus de dégâts des maladies de vos Frappes de Sang et Frappes au cœur de 60%."
		];
i++;




//Veteran of the Third War - Blood
rank[i] = [
"Augmente votre total de Force et votre total d'Endurance de 2%, ainsi que votre expertise de 2.",
"Augmente votre total de Force et votre total d'Endurance de 4%, ainsi que votre expertise de 4.",
"Augmente votre total de Force et votre total d'Endurance de 6%, ainsi que votre expertise de 6."
		];
i++;

//Mark of Blood - Blood
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. de Sang</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min. de recharge</span><br> Place une Marque de sang sur un ennemi. Chaque fois que l'ennemi marqué inflige des dégâts à une cible, cette cible reçoit 4% de ses points de vie maximum. Dure 20 sec."
		];
i++;






//Bloody Vengeance - Blood
rank[i] = [
"Confère un bonus de 1% aux dégâts physiques que vous infligez pendant 30 sec. après avoir réussi un coup critique avec une arme, un sort ou une technique. L'effet est cumulable jusqu'à 3 fois.",
"Confère un bonus de 2% aux dégâts physiques que vous infligez pendant 30 sec. après avoir réussi un coup critique avec une arme, un sort ou une technique. L'effet est cumulable jusqu'à 3 fois.",
"Confère un bonus de 3% aux dégâts physiques que vous infligez pendant 30 sec. après avoir réussi un coup critique avec une arme, un sort ou une technique. L'effet est cumulable jusqu'à 3 fois."
		];
i++;

//Abomination's Might - Blood
rank[i] = [
"Vos Frappes de Sang et Frappes au cœur ont 25% de chances et vos Anéantissements 50% de chances d'augmenter la puissance d'attaque des membres du raid se trouvant à moins de 45 mètres mètres de 10% pendant 10 sec. Augmente également votre total de Force de 1%.",
"Vos Frappes de sang et Frappes au cœur ont 50% de chances et vos Anéantissements 100% de chances d'augmenter la puissance d'attaque des membres du raid se trouvant à moins de 45 mètres mètres de 10% pendant 10 sec. Augmente également votre total de Force de 2%."
		];
i++;
	

//Bloodworms - Blood
rank[i] = [
"Vos coups portés avec des armes ont 3% de chances de faire produire à la cible de 2 à 4 vers de sang. Les vers de sang attaquent vos ennemis et vous rendent un montant de points de vie égal aux dégâts qu'ils infligent pendant 20 sec. ou jusqu'à ce qu'ils soient tués.",
"Vos coups portés avec des armes ont 6% de chances de faire produire à la cible de 2 à 4 vers de sang. Les vers de sang attaquent vos ennemis et vous rendent un montant de points de vie égal aux dégâts qu'ils infligent pendant 20 sec. ou jusqu'à ce qu'ils soient tués.",
"Vos coups portés avec des armes ont 9% de chances de faire produire à la cible de 2 à 4 vers de sang. Les vers de sang attaquent vos ennemis et vous rendent un montant de points de vie égal aux dégâts qu'ils infligent pendant 20 sec. ou jusqu'à ce qu'ils soient tués."
		];
i++;

//Hysteria - Blood
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. de Sang</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>2 min. de recharge</span><br> Plonge une unité alliée dans une frénésie meurtrière pendant 30 sec., augmentant les dégâts physiques qu'elle inflige de  20%, mais elle subit aussi toutes les secondes un montant de dégâts égal à 1% de ses points de vie maximum."
		];
i++;

//Blood Aura - Blood
rank[i] = [
"Tous les membres du groupe ou du raid se trouvant à moins de 45 mètres du chevalier de la mort reçoivent des soins d'un montant égal à 1% des dégâts qu'ils infligent. Seuls les dégâts infligés à des cibles qui rapportent de l'expérience ou de l'honneur peuvent déclencher ces soins.",
"Tous les membres du groupe ou du raid se trouvant à moins de 45 mètres du chevalier de la mort reçoivent des soins d'un montant égal à 2% des dégâts qu'ils infligent. Seuls les dégâts infligés à des cibles qui rapportent de l'expérience ou de l'honneur peuvent déclencher ces soins..",
		];
i++;


//SUDDEN DOOM - BLOOD
rank[i] = [
"Vos Frappes de sang et Frappes au cœur ont 4% de chances de permettre à votre prochain Voile mortel de ne pas coûter de Puissance runique et d'infliger un coup critique s'il est lancé dans les 15 sec.",
"Vos Frappes de sang et Frappes au cœur ont 8% de chances de permettre à votre prochain Voile mortel de ne pas coûter de Puissance runique et d'infliger un coup critique s'il est lancé dans les 15 sec.",
"Vos Frappes de sang et Frappes au cœur ont 12% de chances de permettre à votre prochain Voile mortel de ne pas coûter de Puissance runique et d'infliger un coup critique s'il est lancé dans les 15 sec.",
"Vos Frappes de sang et Frappes au cœur ont 16% de chances de permettre à votre prochain Voile mortel de ne pas coûter de Puissance runique et d'infliger un coup critique s'il est lancé dans les 15 sec.",
"Vos Frappes de sang et Frappes au cœur ont 20% de chances de permettre à votre prochain Voile mortel de ne pas coûter de Puissance runique et d'infliger un coup critique s'il est lancé dans les 15 sec."
		];
i++;


//Vampiric Blood - Blood
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. de Sang</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>1 min. de recharge</span><br>Augmente le nombre de points de vie restaurés par les sorts et les effets de 50% pendant 20 sec."
		];
i++;

//Will of the Necropolis - BLOOD
rank[i] = [
"Réduit le temps de recharge de votre Carapace anti-magie de 4 sec. De plus, quand vous disposez de moins de 35% de vos points de vie, votre total d'armure augmente de 10%.",
"Réduit le temps de recharge de votre Carapace anti-magie de 8 sec. De plus, quand vous disposez de moins de 35% de vos points de vie, votre total d'armure augmente de 20%.",
"Réduit le temps de recharge de votre Carapace anti-magie de 12 sec. De plus, quand vous disposez de moins de 35% de vos points de vie, votre total d'armure augmente de 30%.",
		];
i++;

//Heart Strike - Blood
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. de Sang</span><span style=text-align:right;float:right;>Portée corps à corps</span><br><span style=text-align:left;float:left;>Instantané</span><br><span style=text-align:left;float:left;>Nécessite une arme de corps à corps</span><br> Frappe instantanément l'ennemi et lui inflige 60% des dégâts de l'arme plus 75, et 38 points de dégâts supplémentaires par maladie. Empêche la cible d'utiliser des effets de hâte pendant 10 sec."
		];
i++;

//Might of Mograine - BLOOD
rank[i] = [
"Augmente de 15% le bonus aux dégâts des coups critiques réussis avec vos techniques Furoncle sanglant, Frappe de sang, Frappe de mort, Frappe au cœur et Anéantissement.",
"Augmente de 30% le bonus aux dégâts des coups critiques réussis avec vos techniques Furoncle sanglant, Frappe de sang, Frappe de mort, Frappe au cœur et Anéantissement.",
"Augmente de 45% le bonus aux dégâts des coups critiques réussis avec vos techniques Furoncle sanglant, Frappe de sang, Frappe de mort, Frappe au cœur et Anéantissement."
		];
i++;

//Blood Gorged - Blood
rank[i] = [
"Quand vous disposez de plus de 75% de vos points de vie, vos dégâts sont augmentés de 2%. Augmente également votre expertise de 1.",
"Quand vous disposez de plus de 75% de vos points de vie, vos dégâts sont augmentés de 4%. Augmente également votre expertise de 2.",
"Quand vous disposez de plus de 75% de vos points de vie, vos dégâts sont augmentés de 6%. Augmente également votre expertise de 3.",
"Quand vous disposez de plus de 75% de vos points de vie, vos dégâts sont augmentés de 8%. Augmente également votre expertise de 4.",
"Quand vous disposez de plus de 75% de vos points de vie, vos dégâts sont augmentés de 10%. Augmente également votre expertise de 5."
		];
i++;

//Dancing Rune Weapon - Blood
rank[i] = [
"<span style=text-align:left;float:left;>50 pts. de Puissance runique</span><span style=text-align:right;float:right;>Portée de 30 m.</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min. de recharge</span><br><span style=text-align:left;float:left;>Nécessite une arme de corps à corps</span><br> Déchaîne toute la puissance runique disponible pour invoquer une seconde arme runique qui combat toute seule pendant 10 sec. plus 1 sec. par tranche de 5 points de Puissance runique, en effectuant les mêmes attaques que le chevalier de la mort."
		];
i++;

//FROST TALENTS BEGIN----------------------------------------------------------------------
//Improved Icy Touch - Frost
rank[i] = [
"Votre Toucher de glace inflige 10% de dégâts supplémentaires, et votre Fièvre de givre réduit les vitesses d'attaque en mêlée et à distance de 2% supplémentaires.",
"Votre Toucher de glace inflige 20% de dégâts supplémentaires, et votre Fièvre de givre réduit les vitesses d'attaque en mêlée et à distance de 4% supplémentaires..",
"Votre Toucher de glace inflige 30% de dégâts supplémentaires, et votre Fièvre de givre réduit les vitesses d'attaque en mêlée et à distance de 6% supplémentaires.."
		];
i++;		


//GLACIER ROT - FROST
rank[i]=[
"Vos sorts Toucher de glace, Rafale hurlante et Frappe de givre infligent 5% de dégâts supplémentaires aux cibles malades.",
"Vos sorts Toucher de glace, Rafale hurlante et Frappe de givre infligent 10% de dégâts supplémentaires aux cibles malades."
	];
i++;

//Toughness - Frost
rank[i]=[
"Augmente la valeur d'armure des objets de 3% et réduit la durée de tous les effets affectant le déplacement de 6%.",
"Augmente la valeur d'armure des objets de 6% et réduit la durée de tous les effets affectant le déplacement de 12%.",
"Augmente la valeur d'armure des objets de 9% et réduit la durée de tous les effets affectant le déplacement de 18%.",
"Augmente la valeur d'armure des objets de 12% et réduit la durée de tous les effets affectant le déplacement de 24%.",
"Augmente la valeur d'armure des objets de 15% et réduit la durée de tous les effets affectant le déplacement de 30%."
	];
i++;

//Icy Reach - Frost
rank[i]=[
"Augmente la portée de vos sorts Toucher de glace, Chaînes de glace et Rafale hurlante de 5 mètres.",
"Augmente la portée de vos sorts Toucher de glace, Chaînes de glace et Rafale hurlante de 10 mètres."
	];
i++;

//Black Ice - Frost
rank[i] = [
"Augmente vos dégâts de Givre de 6%.",
"Augmente vos dégâts de Givre de 12%.",
"Augmente vos dégâts de Givre de 18%.",
"Augmente vos dégâts de Givre de 24%.",
"Augmente vos dégâts de Givre de 30%."
		];
i++;

//Nerves of Cold Steel - FROST
rank[i] = [
"Augmente de 1% vos chances de toucher avec les armes de mêlée à une main, et augmente de 5% les dégâts infligés par l'arme que vous utilisez en main gauche.",
"Augmente de 2% vos chances de toucher avec les armes de mêlée à une main, et augmente de 10% les dégâts infligés par l'arme que vous utilisez en main gauche.",
"Augmente de 3% vos chances de toucher avec les armes de mêlée à une main, et augmente de 15% les dégâts infligés par l'arme que vous utilisez en main gauche."
		];
i++;

//ICY TALONS - FROST
rank[i] = [
"Vous volez la chaleur des victimes de votre Fièvre de givre, de sorte que lorsque leur vitesse d'attaque en mêlée est réduite, la vôtre augmente de 4% pendant 20 sec.",
"Vous volez la chaleur des victimes de votre Fièvre de givre, de sorte que lorsque leur vitesse d'attaque en mêlée est réduite, la vôtre augmente de 8% pendant 20 sec.",
"Vous volez la chaleur des victimes de votre Fièvre de givre, de sorte que lorsque leur vitesse d'attaque en mêlée est réduite, la vôtre augmente de 12% pendant 20 sec.",
"Vous volez la chaleur des victimes de votre Fièvre de givre, de sorte que lorsque leur vitesse d'attaque en mêlée est réduite, la vôtre augmente de 16%  pendant 20 sec.",
"Vous volez la chaleur des victimes de votre Fièvre de givre, de sorte que lorsque leur vitesse d'attaque en mêlée est réduite, la vôtre augmente de 20% pendant 20 sec."
		];
i++;

//Lichborne - Frost
rank[i] = [
"<span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>3 min. de recharge</span><br>Utilise de l'énergie impie pour devenir mort-vivant pendant 15 sec. Tant que vous êtes mort-vivant, vous êtes insensible aux effets de charme, de peur et de sommeil, et grâce à votre visage terrifiant les attaques de mêlée ont 25% de chances supplémentaires de vous manquer."
		];
i++;

//Annihilation - Frost
rank[i] = [
"Augmente vos chances de réaliser un coup critique avec vos techniques spéciales de mêlée de 1%. De plus, il y a 33% de chances que votre Anéantissement inflige ses dégâts sans consommer de maladie.",
"Augmente vos chances de réaliser un coup critique avec vos techniques spéciales de mêlée de 2%. De plus, il y a 66% de chances que votre Anéantissement inflige ses dégâts sans consommer de maladie.",
"Augmente vos chances de réaliser un coup critique avec vos techniques spéciales de mêlée de 3%. De plus, il y a 100% de chances que votre Anéantissement inflige ses dégâts sans consommer de maladie.",
		];
i++;


//RUNIC POWER MASTERY - FROST
rank[i]=[
"Augmente votre puissance runique maximale de 10.",
"Augmente votre puissance runique maximale de 20.",
"Augmente votre puissance runique maximale de 30."
	];
i++;



//Killing Machine - Frost
rank[i] = [
"Après avoir réussi un coup critique avec une attaque automatique, il y a 10% de chances que votre prochain sort Toucher de glace, Rafale hurlante ou Frappe de givre soit un coup critique.",
"Après avoir réussi un coup critique avec une attaque automatique, il y a 20% de chances que votre prochain sort Toucher de glace, Rafale hurlante ou Frappe de givre soit un coup critique.",
"Après avoir réussi un coup critique avec une attaque automatique, il y a 30% de chances que votre prochain sort Toucher de glace, Rafale hurlante ou Frappe de givre soit un coup critique.",
"Après avoir réussi un coup critique avec une attaque automatique, il y a 40% de chances que votre prochain sort Toucher de glace, Rafale hurlante ou Frappe de givre soit un coup critique.",
"Après avoir réussi un coup critique avec une attaque automatique, il y a 50% de chances que votre prochain sort Toucher de glace, Rafale hurlante ou Frappe de givre soit un coup critique.",
		];
i++;	



//Frigid Dreadplate - Frost
rank[i]=[
"Réduit les chances de vous toucher en mêlée de 1%.",
"Réduit les chances de vous toucher en mêlée de 2%.",
"Réduit les chances de vous toucher en mêlée de 3%."
	];
i++;

//Chill of the Grave - Frost
rank[i] = [
"Vos sorts Chaînes de glace, Rafale hurlante, Toucher de glace et Anéantissement génèrent 2,5 points de Puissance runique supplémentaires.",
"Vos sorts Chaînes de glace, Rafale hurlante, Toucher de glace et Anéantissement génèrent 5 points de Puissance runique supplémentaires. "
		];
i++;

//Deathchill - Frost
rank[i] = [
"<span style=text-align:left;float:left;>Instantané<br></span><br><span style=text-align:right;float:right;>2 min. de recharge</span><br>Quand il est activé, il fait de votre prochain sort Toucher de glace, Rafale hurlante, Frappe de givre ou Anéantissement un coup critique si utilisé en 30 sec. maximum."
		];
i++;

//Improved Icy Talons - Frost
rank[i] = [
"L'effet de vos Serres de glace augmente la hâte en mêlée de votre groupe ou raid de 20% pendant les 20 prochaines sec. De plus, il augmente en permanence votre hâte en mêlée de 5%."
		];
i++;



//Merciless Combat - Frost
rank[i] = [
"Toucher de glace, Rafale hurlante, Anéantissement et Frappe de givre infligent 6% de dégâts supplémentaires aux cibles qui disposent de moins de 35% de leurs points de vie.",
"Toucher de glace, Rafale hurlante, Anéantissement et Frappe de givre infligent 12% de dégâts supplémentaires aux cibles qui disposent de moins de 35% de leurs points de vie."
		];
i++;

//Rime - Frost
rank[i] = [
"Augmente les chances de coup critique de vos sorts Toucher de glace et Anéantissement de 5% et l'incantation de Toucher de glace a 5% de chances de permettre à votre Rafale hurlante de ne pas consommer de runes.",
"Augmente les chances de coup critique de vos sorts Toucher de glace et Anéantissement de 10% et l'incantation de Toucher de glace a 10% de chances de permettre à votre Rafale hurlante de ne pas consommer de runes..",
"Augmente les chances de coup critique de vos sorts Toucher de glace et Anéantissement de 15% et l'incantation de Toucher de glace a 15% de chances de permettre à votre Rafale hurlante de ne pas consommer de runes.",
		];
i++;



//ENDLESS WINTER - FROST
rank[i] = [
"Votre sort Chaînes de glace a 50% de chances d'infliger une Fièvre de givre et le coût de Gel de l'esprit est réduit à 10 points de Puissance runique.",
"Votre sort Chaînes de glace a 100% de chances d'infliger une Fièvre de givre et le coût de Gel de l'esprit est réduit à aucune puissance runique."
];
i++;



//Howling Blast - FROST
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. d'impie 1, pt. de givre<br></span><span style=text-align:right;float:right;>Portée de 25 mètres</span><br> <span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>6 sec. de recharge</span><br>Un vent glacial frappe la cible et inflige de 99 à 107 points de dégâts de Givre à tous les ennemis se trouvant à moins de 10 mètres. Inflige des dégâts doubles aux cibles souffrant de Fièvre de givre."
		];
i++;

//FROST AURA - FROST
rank[i] = [
"Tous les membres du groupe ou du raid se trouvant à moins de 45 mètres du chevalier de la mort reçoivent 40 points de résistance aux sorts.",
"Tous les membres du groupe ou du raid se trouvant à moins de 45 mètres du chevalier de la mort reçoivent 80 points de résistance aux sorts."
		];
i++;


//Chilbrains - Frost
rank[i] = [
"Les victimes de votre Fièvre de givre sont transies, ce qui réduit leur vitesse de déplacement de 10% pendant 10 sec.",
"Les victimes de votre Fièvre de givre sont transies, ce qui réduit leur vitesse de déplacement de 20% pendant 10 sec.",
"Les victimes de votre Fièvre de givre sont transies, ce qui réduit leur vitesse de déplacement de 30% pendant 10 sec."
		];
i++;



//Blood of the North - FROST
rank[i] = [
"Augmente les dégâts de Frappe de sang de 3%. De plus, chaque fois que vous touchez avec Frappe de sang ou Pestilence, il y a 20% de chances que la rune de sang devienne une rune de la mort à son activation.",
"Augmente les dégâts de Frappe de sang de 6%. De plus, chaque fois que vous touchez avec Frappe de sang ou Pestilence, il y a 40% de chances que la rune de sang devienne une rune de la mort à son activation.",
"Augmente les dégâts de Frappe de sang de 9%. De plus, chaque fois que vous touchez avec Frappe de sang ou Pestilence, il y a 60% de chances que la rune de sang devienne une rune de la mort à son activation.",
"Augmente les dégâts de Frappe de sang de 12%. De plus, chaque fois que vous touchez avec Frappe de sang ou Pestilence, il y a 80% de chances que la rune de sang devienne une rune de la mort à son activation.",
"Augmente les dégâts de Frappe de sang de 15%. De plus, chaque fois que vous touchez avec Frappe de sang ou Pestilence, il y a 100% de chances que la rune de sang devienne une rune de la mort à son activation."
		];
i++;


//UNBREAKABLE ARMOR - FROST
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. de givre<br></span><br><span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>1 min. de recharge</span><br>Augmente votre armure de 25%, votre total de Force de 10% and et vos chances de parer de 5% pendant 20 sec."
		];
i++;



//Acclimation - Frost
rank[i] = [
"Quand vous êtes touché par un sort, vous avez 10% cde chances d'améliorer votre résistance à ce type de magie pendant 18 sec. Cumulable jusqu'à 3 fois.",
"Quand vous êtes touché par un sort, vous avez 20% de chances d'améliorer votre résistance à ce type de magie pendant 18 sec. Cumulable jusqu'à 3 fois.",
"Quand vous êtes touché par un sort, vous avez 30% de chances d'améliorer votre résistance à ce type de magie pendant 18 sec. Cumulable jusqu'à 3 fois.",
		];
i++;

//Frost Strike - Frost
rank[i] = [
"<span style=text-align:left;float:left;>40 pts. de Puissance runique<br></span><span style=text-align:right;float:right;>Portée corps à corps</span><br><span style=text-align:left;float:left;>Instantané</span><br/><span style=text-align:left;float:left;>Nécessite une arme de corps à corps<br></span><br>Frappe instantanément l'ennemi et lui inflige 60% des dégâts de l'arme plus 52 sous forme de dégâts de Givre. Cette attaque ne peut être esquivée, bloquée ou parée."
		];
i++;

//Guile of Gorefiend - Frost
rank[i] = [
"Augmente de 15%, le bonus aux dégâts des coups critiques réussis avec vos techniques Frappe de sang, Frappe de givre, Rafale hurlante et Anéantissement en plus d'augmenter de 2 sec. la durée de votre Robustesse glaciale.",
"Augmente de 30%, le bonus aux dégâts des coups critiques réussis avec vos techniques Frappe de sang, Frappe de givre, Rafale hurlante et Anéantissement en plus d'augmenter de 4 sec. la durée de votre Robustesse glaciale.",
"Augmente de 45%, le bonus aux dégâts des coups critiques réussis avec vos techniques Frappe de sang, Frappe de givre, Rafale hurlante et Anéantissement en plus d'augmenter de 6 sec. la durée de votre Robustesse glaciale."
		];
i++;

//Tundra Stalker - Frost
rank[i] = [
"Vos sorts et techniques infligent 2% de dégâts supplémentaires aux cibles souffrant de la Fièvre de givre. Augmente également votre expertise de 1. ",
"Vos sorts et techniques infligent 4% de dégâts supplémentaires aux cibles souffrant de la Fièvre de givre. Augmente également votre expertise de 2. ",
"Vos sorts et techniques infligent 6% de dégâts supplémentaires aux cibles souffrant de la Fièvre de givre. Augmente également votre expertise de 3. ",
"Vos sorts et techniques infligent 8% de dégâts supplémentaires aux cibles souffrant de la Fièvre de givre. Augmente également votre expertise de 4. ",
"Vos sorts et techniques infligent 10% de dégâts supplémentaires aux cibles souffrant de la Fièvre de givre. Augmente également votre expertise de 5. "
		];
i++;

//HUNGERING COLD - FROST
rank[i] = [
"<span style=text-align:left;float:left;>60 pts. de Puissance runique<br></span><br> <span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>1 min. de recharge</span><br>Eradique toute chaleur de la terre autour du chevalier de la mort. Les ennemis se trouvant à moins de 10 mètres sont pris dans la glace, ce qui les empêche de réaliser toute action pendant 10 sec. et leur fait contracter la Fièvre de givre. Les ennemis sont considérés comme gelés, mais tous les dégâts autres que les maladies brisent la glace."
		];
i++;

//UNHOLY TALENTS BEGIN--------------------------------------------------------

//Vicious Strikes - UNHOLY
rank[i]=[
"Augmente de 3% les chances de coup critique et de 15% le bonus de dégâts des coups critiques de vos sorts Frappe de peste, Frappe de mort et Frappe du Fléau.",
"Augmente de 6% les chances de coup critique et de 30% le bonus de dégâts des coups critiques de vos sorts Frappe de peste, Frappe de mort et Frappe du Fléau.",
	];
i++;

//Morbidity - UNHOLY
rank[i] = [
"Augmente de 5% les dégâts et les soins de votre sort Voile mortel et réduit le temps de recharge de votre sort Mort et décomposition de 5 sec.",
"Augmente de 10% les dégâts et les soins de votre sort Voile mortel et réduit le temps de recharge de votre sort Mort et décomposition de 10 sec.",
"Augmente de 15% les dégâts et les soins de votre sort Voile mortel et réduit le temps de recharge de votre sort Mort et décomposition de 15 sec."
		];
i++;


//Anticipation - UNHOLY
rank[i]=[
"Augmente vos chances d'esquiver de 1%.",
"Augmente vos chances d'esquiver de 2%.",
"Augmente vos chances d'esquiver de 3%.",
"Augmente vos chances d'esquiver de 4%.",
"Augmente vos chances d'esquiver de 5%."
	];
i++;

//EPIDEMIC - UNHOLY
rank[i]=[
"Augmente la durée de Peste de sang et Fièvre de givre de 3 sec.",
"Augmente la durée de Peste de sang et Fièvre de givre de 6 sec."
	];
i++;

//VIRULENCE - UNHOLY
rank[i]=[
"Augmente vos chances de toucher avec vos sorts de 1% et réduit de 10% la probabilité que vos sorts et maladies puissent être soignés.",
"Augmente vos chances de toucher avec vos sorts de 2% et réduit de 20% la probabilité que vos sorts et maladies puissent être soignés.",
"Augmente vos chances de toucher avec vos sorts de 3% et réduit de 30% la probabilité que vos sorts et maladies puissent être soignés."
	];
i++;




//Unholy Command - Unholy
rank[i]=[
"Réduit le temps de recharge de votre technique Poigne de la mort de 5 sec.",
"Réduit le temps de recharge de votre technique Poigne de la mort de 10 sec."
	];
i++;

//Ravenous Dead - Unholy
rank[i]=[
"Augmente votre total de Force ainsi que celui des vos goules de 1% et réduit le temps de recharge de Réanimation morbide de 20%.",
"Augmente votre total de Force ainsi que celui des vos goules de 2% et réduit le temps de recharge de Réanimation morbide de 40%.",
"Augmente votre total de Force ainsi que celui des vos goules de 3% et réduit le temps de recharge de Réanimation morbide de 60%."
	];
i++;

//Outbreak - UNHOLY
rank[i]=[
"Augmente les dégâts infligés par Frappe de peste, Pestilence et Furoncle sanglant de 10%.",
"Augmente les dégâts infligés par Frappe de peste, Pestilence et Furoncle sanglant de 20%.",
"Augmente les dégâts infligés par Frappe de peste, Pestilence et Furoncle sanglant de 30%."
	];
i++;

//Necrosis - Unholy
rank[i]=[
"Vos attaques automatiques infligent 2% de dégâts d'Ombre supplémentaires.",
"Vos attaques automatiques infligent 4% de dégâts d'Ombre supplémentaires.",
"Vos attaques automatiques infligent 6% de dégâts d'Ombre supplémentaires.",
"Vos attaques automatiques infligent 8% de dégâts d'Ombre supplémentaires.",
"Vos attaques automatiques infligent 10% de dégâts d'Ombre supplémentaires."
	];
i++;

//CORPSE EXPLOSION - UNHOLY
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. d'Impie<br></span><span style=text-align:right;float:right;>Portée de 20 m.</span><br><span style=text-align:left;float:left;>Instantané<br></span><br>Fait exploser un cadavre et inflige 216 points de dégâts d'Ombre à tous les ennemis se trouvant à moins de 20 mètres. Utilise un cadavre proche si la cible n'est pas un cadavre. Ne fonctionne pas sur les cadavres mécaniques ou d'élémentaires."
		];
i++;



//ON A PALE HORSE - UNHOLY
rank[i]=[
"Vous devenez aussi difficile à arrêter que la mort elle-même. La durée de tous les effets d'étourdissement et de peur contre vous est réduite de 10%, et la vitesse de votre monture est augmentée de 10%. Ne s'additionne pas avec les autres effets qui augmentent la vitesse de déplacement.",
"Vous devenez aussi difficile à arrêter que la mort elle-même. La durée de tous les effets d'étourdissement et de peur contre vous est réduite de 20%, et la vitesse de votre monture est augmentée de 20%. Ne s'additionne pas avec les autres effets qui augmentent la vitesse de déplacement."
	];
i++;

//Blood-Caked Blade – Unholy 
rank[i] = [
"Vos attaques automatiques ont 10% de chances de causer une Frappe incrustée de sang, qui inflige 25% des dégâts de l'arme plus 13% pour chacune de vos maladies sur la cible.",
"Vos attaques automatiques ont 20% de chances de causer une Frappe incrustée de sang, qui inflige 25% des dégâts de l'arme plus 13% pour chacune de vos maladies sur la cible.",
"Vos attaques automatiques ont 30% de chances de causer une Frappe incrustée de sang, qui inflige 25% des dégâts de l'arme plus 13% pour chacune de vos maladies sur la cible."
		];
i++;

//SHADOW OF DEATH - UNHOLY
rank[i] = [
"Augmente votre total de Force et d'Endurance de 2%. De plus, chaque fois que vous mourez, vous continuez à vous battre en tant que goule pendant 45 sec."
		];
i++;

//SUMMON GARGOYLE - UNHOLY
rank[i] = [
"<span style=text-align:left;float:left;>50 de Puissance runique<br></span><span style=text-align:right;float:right;>Portée de 30 m.</span><br> <span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>3 min. de recharge</span><br>Une gargouille bombarde la cible et lui inflige des dégâts de Nature modifiés par la puissance d'attaque du chevalier de la mort. Persiste pendant 10 secondes, plus 1 seconde par tranche de 8 points de Puissance runique, à concurrence de 1 min."
		];
i++;

//IMPURITY - UNHOLY
rank[i] = [
"Vos sorts reçoivent un bénéfice supplémentaire de 5% de votre puissance d'attaque.",
"Vos sorts reçoivent un bénéfice supplémentaire de 10% de votre puissance d'attaque.",
"Vos sorts reçoivent un bénéfice supplémentaire de 15% de votre puissance d'attaque.",
"Vos sorts reçoivent un bénéfice supplémentaire de 20% de votre puissance d'attaque.",
"Vos sorts reçoivent un bénéfice supplémentaire de 25% de votre puissance d'attaque."
		];
i++;

//Dirge - Unholy
rank[i] = [
"Vos sorts Frappe de mort, Anéantissement, Frappe de peste et Frappe du Fléau génèrent 2,5 points de Puissance runique supplémentaires.",
"Vos sorts Frappe de mort, Anéantissement, Frappe de peste et Frappe du Fléau génèrent 5 points de Puissance runique supplémentaires."
		];
i++;

//Magic Suppression - UNHOLY
rank[i] = [
"Toutes les formes de magie vous infligent 1% de dégâts en moins. De plus, votre Carapace anti-magie absorbe 5% de dégâts des sorts supplémentaires.",
"Toutes les formes de magie vous infligent 2% de dégâts en moins. De plus, votre Carapace anti-magie absorbe 10% de dégâts des sorts supplémentaires.",
"Toutes les formes de magie vous infligent 3% de dégâts en moins. De plus, votre Carapace anti-magie absorbe 15% de dégâts des sorts supplémentaires.",
"Toutes les formes de magie vous infligent 4% de dégâts en moins. De plus, votre Carapace anti-magie absorbe 20% de dégâts des sorts supplémentaires.",
"Toutes les formes de magie vous infligent 5% de dégâts en moins. De plus, votre Carapace anti-magie absorbe 25% de dégâts des sorts supplémentaires.",
		];
i++;

//Reaping - Unholy
rank[i] = [
"Chaque fois que vous touchez avec Frappe de sang ou Furoncle sanglant, il y a 33% de chances que la rune de sang devienne une rune de la mort lors de son activation.",
"Chaque fois que vous touchez avec Frappe de sang ou Furoncle sanglant, il y a 66% de chances que la rune de sang devienne une rune de la mort lors de son activation.",
"Chaque fois que vous touchez avec Frappe de sang ou Furoncle sanglant, il y a 100% de chances que la rune de sang devienne une rune de la mort lors de son activation."
		];
i++;

//Master of Ghouls - Unholy
rank[i]=[
"La goule invoquée par votre sort Réanimation morbide est considérée comme un familier et elle est sous votre contrôle. Contrairement aux goules normales de chevalier de la mort, votre familier n'a pas de durée limitée."
	];
i++;

//Desecration - Unholy 
rank[i] = [
"Vos Frappes du Fléau ont 20% de chances de provoquer l'effet Terre profanée. Les cibles dans la zone sont ralenties de 50% par les bras avides des morts et vous infligez 5% de dégâts supplémentaires tant que vous restez sur la terre impie. Dure 12 sec.",
"Vos Frappes du Fléau ont 40% de chances de provoquer l'effet Terre profanée. Les cibles dans la zone sont ralenties de 50% par les bras avides des morts et vous infligez 5% de dégâts supplémentaires tant que vous restez sur la terre impie. Dure 12 sec.",
"Vos Frappes du Fléau ont 60% de chances de provoquer l'effet Terre profanée. Les cibles dans la zone sont ralenties de 50% par les bras avides des morts et vous infligez 5% de dégâts supplémentaires tant que vous restez sur la terre impie. Dure 12 sec.",
"Vos Frappes du Fléau ont 80% de chances de provoquer l'effet Terre profanée. Les cibles dans la zone sont ralenties de 50% par les bras avides des morts et vous infligez 5% de dégâts supplémentaires tant que vous restez sur la terre impie. Dure 12 sec.",
"Vos Frappes du Fléau ont 100% de chances de provoquer l'effet Terre profanée. Les cibles dans la zone sont ralenties de 50% par les bras avides des morts et vous infligez 5% de dégâts supplémentaires tant que vous restez sur la terre impie. Dure 12 sec."
		];
i++;


//Anti-Magic Zone - Unholy
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. d'Impie<br></span><br><span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>2 min. de recharge</span><br> Places a large, stationary Anti-Magic Zone that reduces spell damage done to party or raid members inside it by 75%. The Anti-Magic Zone lasts for 30 sec or until it absorbs 111,376 spell damage."
		];
i++;

//UNHOLY AURA - UNHOLY
rank[i] = [
"Tous les membres du groupe ou du raid se trouvant à moins de 45 mètres du chevalier de la mort se déplacent 8% plus vite. Cet effet n'est pas cumulable avec d'autres effets améliorant le déplacement.",
"Tous les membres du groupe ou du raid se trouvant à moins de 45 mètres du chevalier de la mort se déplacent 15% plus vite. Cet effet n'est pas cumulable avec d'autres effets améliorant le déplacement."
		];
i++;

//Night of the Dead - Unholy
rank[i] = [
"Vos 10 prochaines Frappes de peste et Frappes du Fléau réduisent le temps de recharge de Réanimation morbide de 15 sec. et celui d'Armée des morts de 30 sec. par frappe.",
"Vos 10 prochaines Frappes de peste et Frappes du Fléau réduisent le temps de recharge de Réanimation morbide de 30 sec. et celui d'Armée des morts de 60 sec. par frappe."
		];
i++;


//Crypt Fever - Unholy
rank[i] = [
"Vos maladies entraînent également la Fièvre de la crypte, qui augmente de 10% les dégâts infligés par les maladies à la cible.",
"Vos maladies entraînent également la Fièvre de la crypte, qui augmente de 20% les dégâts infligés par les maladies à la cible.",
"Vos maladies entraînent également la Fièvre de la crypte, qui augmente de 30% les dégâts infligés par les maladies à la cible."
		];
i++;



//Bone Shield - Unholy
rank[i] = [
"<span style=text-align:left;float:left;>1 pt. d'Impie<br></span><br><span style=text-align:left;float:left;>Instantané<br></span><span style=text-align:right;float:right;>1 min. de recharge</span><br><br>Le chevalier de la mort est entouré de 4 os tourbillonnants. Tant qu'il reste au moins un os, toutes les attaques contre le chevalier infligent 40% de dégâts en moins et les attaques, techniques et sorts du chevalier infligent 2% de dégâts en plus. Chaque attaque infligeant des dégâts consomme un os. Dure 5 min."
		];
i++;



//Wandering Plague - UNHOLY
rank[i] = [
"Quand vos maladies infligent des dégâts à un ennemi, il y a une chance égale à vos chances de coup critique en mêlée qu'elles infligent 33% de dégâts supplémentaires à la cible et à tous les ennemis se trouvant à moins de 8 mètres. Ignore les cibles porteuses d'un effet de sort annulé lorsque des dégâts sont subis.",
"Quand vos maladies infligent des dégâts à un ennemi, il y a une chance égale à vos chances de coup critique en mêlée qu'elles infligent 66% de dégâts supplémentaires à la cible et à tous les ennemis se trouvant à moins de 8 mètres. Ignore les cibles porteuses d'un effet de sort annulé lorsque des dégâts sont subis.",
"Quand vos maladies infligent des dégâts à un ennemi, il y a une chance égale à vos chances de coup critique en mêlée qu'elles infligent 100% de dégâts supplémentaires à la cible et à tous les ennemis se trouvant à moins de 8 mètres. Ignore les cibles porteuses d'un effet de sort annulé lorsque des dégâts sont subis."
		];
i++;

//EBON PLAGUEBRINGER - UNHOLY
rank[i] = [
"Votre Fièvre de la crypte devient une Peste d'ébène, qui augmente les dégâts magiques subis de 4% en plus d'augmenter les dégâts infligés par les maladies. Augmente en permanence vos chances de coup critique avec les armes et les sorts de 1%.",
"Votre Fièvre de la crypte devient une Peste d'ébène, qui augmente les dégâts magiques subis de 9% en plus d'augmenter les dégâts infligés par les maladies. Augmente en permanence vos chances de coup critique avec les armes et les sorts de 2%.",
"Votre Fièvre de la crypte devient une Peste d'ébène, qui augmente les dégâts magiques subis de 13% en plus d'augmenter les dégâts infligés par les maladies. Augmente en permanence vos chances de coup critique avec les armes et les sorts de 3%."
		];
i++;

//Scourge Strike - Unholy
rank[i] = [
"<span style=text-align:left;float:left;>1 Unholy 1 Frost<br></span><span style=text-align:right;float:right;>Melee range</span><br> <span style=text-align:left;float:left;>Instantané<br></span><br><span style=text-align:left;float:left;>Requires Melee Weapon<br></span><br>An unholy strike that deals 60% weapon damage as Shadow damage plus 81, and an additional 41 bonus damage per disease."
		];
i++;


//Rage of Rivendare - Unholy
rank[i] = [
"Vos sorts et techniques infligent 2% de dégâts supplémentaires aux cibles atteintes de la Peste de sang. Augmente également votre expertise de 1.",
"Vos sorts et techniques infligent 4% de dégâts supplémentaires aux cibles atteintes de la Peste de sang. Augmente également votre expertise de 2.",
"Vos sorts et techniques infligent 6% de dégâts supplémentaires aux cibles atteintes de la Peste de sang. Augmente également votre expertise de 3.",
"Vos sorts et techniques infligent 8% de dégâts supplémentaires aux cibles atteintes de la Peste de sang. Augmente également votre expertise de 4.",
"Vos sorts et techniques infligent 10% de dégâts supplémentaires aux cibles atteintes de la Peste de sang. Augmente également votre expertise de 5."
		];
i++;

//Unholy Blight - Unholy
rank[i] = [
"<span style=text-align:left;float:left;>60 pts. de Puissance runique<br></span><br> <span style=text-align:left;float:left;>Instantané<br></span><br>Un essaim infect d'insectes impies s'abat dans un rayon de 10 mètres autour du chevalier de la mort. Les ennemis pris dans l'essaim subissent 21 points de dégâts d'Ombre par sec. Dure 20 sec."
		];
i++;

//UNHOLY Talents End^^

