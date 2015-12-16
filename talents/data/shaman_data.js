var i = 0;
var t = 0;

var className = "Talents de chaman";
var talentPath = "/info/basics/talents/";

tree[i] = "Élémentaire"; i++;
tree[i] = "Amélioration"; i++;
tree[i] = "Restauration"; i++;

i = 0;


talent[i] = [0, "Convection", 5, 2, 1]; i++;
talent[i] = [0, "Commotion", 5, 3, 1]; i++;
talent[i] = [0, "Appel des flammes", 3, 1, 2]; i++;
talent[i] = [0, "Protection contre les éléments", 3, 2, 2]; i++; 
talent[i] = [0, "Dévastation élémentaire", 3, 3, 2]; i++;
talent[i] = [0, "Réverbération", 5, 1, 3]; i++;
talent[i] = [0, "Focalisation élémentaire", 1, 2, 3]; i++;
talent[i] = [0, "Fureur élémentaire", 5, 3, 3]; i++;
talent[i] = [0, "Totems Nova de feu améliorés", 2, 1, 4]; i++;
talent[i] = [0, "Oeil du cyclone", 3, 4, 4]; i++;
talent[i] = [0, "Allonge élémentaire", 2, 1, 5]; i++;
talent[i] = [0, "Appel de la foudre", 1, 2, 5, [getTalentID("Focalisation élémentaire"),1]]; i++;
talent[i] = [0, "Tempête continuelle", 5, 4, 5]; i++;
talent[i] = [0, "Précision élémentaire", 3, 1, 6]; i++;
talent[i] = [0, "Maîtrise de la foudre", 5, 3, 6, [getTalentID("Fureur élémentaire"),5]]; i++;
talent[i] = [0, "Maîtrise élémentaire", 1, 2, 7, [getTalentID("Appel de la foudre"),1]]; i++;
talent[i] = [0, "Boucliers élémentaires", 3, 3, 7]; i++;
talent[i] = [0, "Serment des éléments", 2, 2, 8, [getTalentID("Maîtrise élémentaire"),1]]; i++;
talent[i] = [0, "Surcharge de foudre", 5, 3, 8]; i++;
talent[i] = [0, "Transfert astral", 3, 1, 9]; i++;
talent[i] = [0, "Totem de courroux", 1, 2, 9]; i++;
talent[i] = [0, "Flots de lave", 3, 3, 9]; i++;
talent[i] = [0, "Tempête, terre et feu", 5, 2, 10]; i++;
talent[i] = [0, "Orage", 1, 2, 11, [getTalentID("Tempête, terre et feu"),5]]; i++;

treeStartStop[t] = i -1;
t++;

//enhancement talents
talent[i] = [1, "Totems renforcés", 3, 1, 1]; i++;
talent[i] = [1, "Emprise de la terre", 2, 2, 1]; i++;
talent[i] = [1, "Connaissance ancestrale", 5, 3, 1]; i++;
talent[i] = [1, "Totems gardiens", 2, 1, 2]; i++;
talent[i] = [1, "Frappe foudroyante", 5, 2, 2]; i++;
talent[i] = [1, "Loup fantôme amélioré", 2, 3, 2]; i++;
talent[i] = [1, "Boucliers améliorés", 3, 4, 2]; i++;
talent[i] = [1, "Armes élémentaires", 3, 1, 3]; i++;
talent[i] = [1, "Focalisation chamanique", 1, 3, 3]; i++;
talent[i] = [1, "Anticipation", 3, 4, 3]; i++;
talent[i] = [1, "Rafale", 5, 2, 4, [getTalentID("Frappe foudroyante"),5]]; i++;
talent[i] = [1, "Résistance", 5, 3, 4]; i++;
talent[i] = [1, "Totems Furie-des-vents améliorés", 2, 1, 5]; i++;
talent[i] = [1, "Armes spirituelles", 1, 2, 5]; i++;
talent[i] = [1, "Dextérité mentale", 3, 3, 5]; i++;
talent[i] = [1, "Rage libérée", 5, 1, 6]; i++;  
talent[i] = [1, "Maîtrise des armes", 3, 3, 6]; i++;
talent[i] = [1, "Spécialisation Ambidextrie", 3, 1, 7, [i+1,1]]; i++;
talent[i] = [1, "Ambidextrie", 1, 2, 7, [getTalentID("Armes spirituelles"),1]]; i++;
talent[i] = [1, "Frappe-tempête", 1, 3, 7]; i++;
talent[i] = [1, "Rapidité mentale", 3, 1, 8]; i++; 
talent[i] = [1, "Fouet de lave", 1, 2, 8, [getTalentID("Ambidextrie"),1]]; i++;
talent[i] = [1, "Frappe-tempête amélioré", 2, 3, 8, [getTalentID("Frappe-tempête"),1]]; i++;
talent[i] = [1, "Horion statique", 3, 1, 9]; i++;
talent[i] = [1, "Rage du chaman", 1, 2, 9]; i++;
talent[i] = [1, "Puissance terrestre", 2, 3, 9]; i++;
talent[i] = [1, "Arme du Maelström", 5, 2, 10]; i++;
talent[i] = [1, "Esprit farouche", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//restoration talents
talent[i] = [2, "Vague de soins améliorée", 5, 2, 1]; i++;
talent[i] = [2, "Focalisation totémique", 5, 3, 1]; i++;
talent[i] = [2, "Réincarnation améliorée", 2, 1, 2]; i++;
talent[i] = [2, "Guérison des anciens", 3, 2, 2]; i++;
talent[i] = [2, "Focalisation des flots", 5, 3, 2]; i++;
talent[i] = [2, "Bouclier d'eau amélioré", 3, 1, 3]; i++;
talent[i] = [2, "Focalisation des soins", 3, 2, 3]; i++;
talent[i] = [2, "Force des flots", 1, 3, 3]; i++;
talent[i] = [2, "Grâce guérisseuse", 3, 4, 3]; i++;
talent[i] = [2, "Totems de restauration", 5, 2, 4]; i++;
talent[i] = [2, "Maîtrise des flots", 5, 3, 4]; i++;
talent[i] = [2, "Flots de soins", 3, 1, 5]; i++;
talent[i] = [2, "Rapidité de la nature", 1, 3, 5]; i++;
talent[i] = [2, "Esprit focalisé", 3, 4, 5]; i++;
talent[i] = [2, "Purification", 5, 3, 6]; i++;
talent[i] = [2, "Gardien de la nature", 5, 1, 7]; i++;
talent[i] = [2, "Totem de Vague de mana", 1, 2, 7, [getTalentID("Totems de restauration"),5]]; i++;
talent[i] = [2, "Purifier l'esprit", 1, 3, 7, [getTalentID("Purification"),5]]; i++;
talent[i] = [2, "Bénédiction des Eternels", 2, 1, 8]; i++;
talent[i] = [2, "Salve de guérison améliorée", 2, 2, 8]; i++;
talent[i] = [2, "Bénédiction de la nature", 3, 3, 8]; i++;
talent[i] = [2, "Eveil ancestral", 3, 1, 9]; i++;
talent[i] = [2, "Bouclier de terre", 1, 2, 9,]; i++;
talent[i] = [2, "Bouclier de terre amélioré", 2, 3, 9, [getTalentID("Bouclier de terre"),1]]; i++;
talent[i] = [2, "Raz-de-marée", 5, 2, 10,]; i++;
talent[i] = [2, "Remous", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

i = 0;


//Elemental Talents Begin




//Convection - Elemental
rank[i] = [
"Réduit le coût en mana de vos Horions ainsi que de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 2%.",
"Réduit le coût en mana de vos Horions ainsi que de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 4%.",
"Réduit le coût en mana de vos Horions ainsi que de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 6%.",
"Réduit le coût en mana de vos Horions ainsi que de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 8%.",
"Réduit le coût en mana de vos Horions ainsi que de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 10%."
		];
i++;		
		
//Concussion - Elemental
rank[i] = [
"Augmente les dégâts infligés par vos sorts Eclair, Chaîne d'éclairs, Orage et Explosion de lave ainsi que vos Horions de 1%.",
"Augmente les dégâts infligés par vos sorts Eclair, Chaîne d'éclairs, Orage et Explosion de lave ainsi que vos Horions de 2%.",
"Augmente les dégâts infligés par vos sorts Eclair, Chaîne d'éclairs, Orage et Explosion de lave ainsi que vos Horions de 3%.",
"Augmente les dégâts infligés par vos sorts Eclair, Chaîne d'éclairs, Orage et Explosion de lave ainsi que vos Horions de 4%.",
"Augmente les dégâts infligés par vos sorts Eclair, Chaîne d'éclairs, Orage et Explosion de lave ainsi que vos Horions de 5%."
		];
i++;		

//Call of Flame - Elemental
rank[i] = [
"Augmente de 5% les dégâts infligés par vos Totems de feu et de 2% les dégâts infligés par votre sort Explosion de lave.",
"Augmente de 10% les dégâts infligés par vos Totems de feu et de 4% les dégâts infligés par votre sort Explosion de lave.",
"Augmente de 15% les dégâts infligés par vos Totems de feu et de 6% les dégâts infligés par votre sort Explosion de lave."
		];
i++;	
		
		
//Elemental Warding - Elemental
rank[i] = [
"Réduit les dégâts que vous infligent les effets de Feu, de Givre et de Nature de 4%.",
"Réduit les dégâts que vous infligent les effets de Feu, de Givre et de Nature de 7%.",
"Réduit les dégâts que vous infligent les effets de Feu, de Givre et de Nature de 10%."
		];
i++;				
		
	
//Elemental Devistation - Elemental 
rank[i] = [
"Vos coups critiques obtenus avec des sorts offensifs augmentent de 3% vos chances d'obtenir un coup critique avec les attaques de mêlée pendant 10 sec.",
"Vos coups critiques obtenus avec des sorts offensifs augmentent de 6% vos chances d'obtenir un coup critique avec les attaques de mêlée pendant 10 sec.",
"Vos coups critiques obtenus avec des sorts offensifs augmentent de 9% vos chances d'obtenir un coup critique avec les attaques de mêlée pendant 10 sec."
		];
i++;

//Reverberation - Elemental
rank[i] = [
"Réduit le temps de recharge de vos Horions de 0,2 sec.",
"Réduit le temps de recharge de vos Horions de 0,4 sec.",
"Réduit le temps de recharge de vos Horions de 0,6 sec.",
"Réduit le temps de recharge de vos Horions de 0,8 sec.",
"Réduit le temps de recharge de vos Horions de 1 sec."
		];
i++;

//Elemental Focus - Elemental
rank[i] = [
"Après avoir réussi un coup critique avec un sort de dégâts de Feu, de Givre ou de Nature, vous entrez dans un état d'Idées claires. Idées claires réduit le coût en mana de vos 2 prochains sorts de dégâts ou de soins de 40%."
		];		
i++;		
	

//Elemental Fury - Elemental 
rank[i] = [
"Augmente de 20% le bonus en points de dégâts des coups critiques obtenus avec les Totems incendiaires, de Magma et Nova de feu ainsi qu'avec les sorts de Feu, de Givre et de Nature.",
"Augmente de 40% le bonus en points de dégâts des coups critiques obtenus avec les Totems incendiaires, de Magma et Nova de feu ainsi qu'avec les sorts de Feu, de Givre et de Nature.",
"Augmente de 60% le bonus en points de dégâts des coups critiques obtenus avec les Totems incendiaires, de Magma et Nova de feu ainsi qu'avec les sorts de Feu, de Givre et de Nature.",
"Augmente de 80% le bonus en points de dégâts des coups critiques obtenus avec les Totems incendiaires, de Magma et Nova de feu ainsi qu'avec les sorts de Feu, de Givre et de Nature.",
"Augmente de 100% le bonus en points de dégâts des coups critiques obtenus avec les Totems incendiaires, de Magma et Nova de feu ainsi qu'avec les sorts de Feu, de Givre et de Nature."
		];
i++;

//Improved Fire Nova Totem - Elemental
rank[i] = [
"Augmente les dégâts infligés par votre Totem Nova de feu de 10% et votre Totem Nova de feu a 50% de chances d'étourdir toutes les cibles auxquelles il a infligé des dégâts pendant 2 sec.",
"Augmente les dégâts infligés par votre Totem Nova de feu de 20% et votre Totem Nova de feu a 100% de chances d'étourdir toutes les cibles auxquelles il a infligé des dégâts pendant 2 sec."
		];
i++;		

//Eye of the Storm - Elemental
rank[i] = [
"Réduit de 23% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez les sorts Eclair, Chaîne d'éclairs, Explosion de lave ou Maléfice.",
"Réduit de 46% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez les sorts Eclair, Chaîne d'éclairs, Explosion de lave ou Maléfice.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez les sorts Eclair, Chaîne d'éclairs, Explosion de lave ou Maléfice."
		];
i++;		

		

//Elemental Reach Reach - Elemental 
rank[i] = [
"Augmente la portée de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 3 mètres et augmente le rayon de votre sort Orage de 10%.",
"Augmente la portée de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 6 mètres et augmente le rayon de votre sort Orage de 20%."

];
i++;	

//Call of Thunder - Elemental
rank[i] = [ 
"Augmente vos chances de réaliser un coup critique avec vos sorts Eclair, Chaîne d'éclairs et Orage de 5% supplémentaires."
		];
i++;

		

//Unrelenting Storm - Elemental 
rank[i] = [
"Régénère une quantité de mana égale à 2% de votre Intelligence toutes les 5 sec., même pendant l'incantation.",
"Régénère une quantité de mana égale à 4% de votre Intelligence toutes les 5 sec., même pendant l'incantation.",
"Régénère une quantité de mana égale à 6% de votre Intelligence toutes les 5 sec., même pendant l'incantation.",
"Régénère une quantité de mana égale à 8% de votre Intelligence toutes les 5 sec., même pendant l'incantation.",
"Régénère une quantité de mana égale à 10% de votre Intelligence toutes les 5 sec., même pendant l'incantation."
		];
i++;		

//Elemental Precision - Elemental 
rank[i] = [
"Augmente de 1% vos chances de toucher avec les sorts de Feu, de Givre et de Nature, et réduit de 10% la menace générée par les sorts de Feu, Givre et Nature.",
"Augmente de 2% vos chances de toucher avec les sorts de Feu, de Givre et de Nature, et réduit de 20% la menace générée par les sorts de Feu, Givre et Nature.",
"Augmente de 3% vos chances de toucher avec les sorts de Feu, de Givre et de Nature, et réduit de 30% la menace générée par les sorts de Feu, Givre et Nature."
		];
i++;		

//Lightning Mastery - Elemental  
rank[i] = [
"Réduit le temps d'incantation de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 0,1 sec.",
"Réduit le temps d'incantation de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 0,2 sec.",
"Réduit le temps d'incantation de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 0,3 sec.",
"Réduit le temps d'incantation de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 0,4 sec.",
"Réduit le temps d'incantation de vos sorts Eclair, Chaîne d'éclairs et Explosion de lave de 0,5 sec."
		];
i++;		

//Elemental Mastery - Elemental				
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsqu'il est activé, ce sort confère 100% de chances à vos sorts de dégâts de Feu, de Givre et de Nature d'infliger un coup critique et il réduit le coût en mana de 100%."
		];
i++;		

//Elemental Shields - Elemental  
rank[i] = [
"Réduit tous les dégâts physiques subis de 2%.",
"Réduit tous les dégâts physiques subis de 4%.",
"Réduit tous les dégâts physiques subis de 6%."
		];
i++;

//Elemental Oath - Elemental  
rank[i] = [
"Vos coups critiques avec les sorts font bénéficier les membres de votre groupe ou raid se trouvant à moins de 100 mètres du Serment des éléments, qui augmente les chances de coup critique avec les sorts de 3%. Dure 15 secondes.",
"Vos coups critiques avec les sorts font bénéficier les membres de votre groupe ou raid se trouvant à moins de 100 mètres du Serment des éléments, qui augmente les chances de coup critique avec les sorts de 5%. Dure 15 secondes.",
		];
i++;



//Lightning Overload - Elemental
rank[i] = [
"Donne à vos sorts Eclair et Chaîne d'éclairs 4% de chances de lancer un second sort semblable sur la même cible sans coût supplémentaire. Ce sort n'inflige que la moitié des dégâts et ne génère pas de menace.",
"Donne à vos sorts Eclair et Chaîne d'éclairs 8% de chances de lancer un second sort semblable sur la même cible sans coût supplémentaire. Ce sort n'inflige que la moitié des dégâts et ne génère pas de menace.",
"Donne à vos sorts Eclair et Chaîne d'éclairs 12% de chances de lancer un second sort semblable sur la même cible sans coût supplémentaire. Ce sort n'inflige que la moitié des dégâts et ne génère pas de menace.",
"Donne à vos sorts Eclair et Chaîne d'éclairs 16% de chances de lancer un second sort semblable sur la même cible sans coût supplémentaire. Ce sort n'inflige que la moitié des dégâts et ne génère pas de menace.",
"Donne à vos sorts Eclair et Chaîne d'éclairs 20% de chances de lancer un second sort semblable sur la même cible sans coût supplémentaire. Ce sort n'inflige que la moitié des dégâts et ne génère pas de menace."
		];
i++;

//Astral Shift - Elemental
rank[i] = [
"Quand vous êtes étourdi, apeuré ou réduit au silence, vous entrez dans le Plan astral afin de réduire tous les dégâts subis de 10% pendant la durée de l'effet d'étourdissement, de peur ou de silence.",
"Quand vous êtes étourdi, apeuré ou réduit au silence, vous entrez dans le Plan astral afin de réduire tous les dégâts subis de 20% pendant la durée de l'effet d'étourdissement, de peur ou de silence.",
"Quand vous êtes étourdi, apeuré ou réduit au silence, vous entrez dans le Plan astral afin de réduire tous les dégâts subis de 30% pendant la durée de l'effet d'étourdissement, de peur ou de silence."
		];
i++;

//Totem of Wrath - Elemental
rank[i] = [
	"5% du mana de base<br>Incantation immédiate<br>Nécessite : Totem de feu<br>Invoque un Totem de courroux qui dispose de 5 points de vie aux pieds du lanceur de sorts. Il augmente de 280 les dégâts infligés par les sorts et effets de tous les membres du groupe et du raid, et augmente de 3% les chances de coup critique des sorts et effets contre tous les ennemis se trouvant à moins de 40 mètres. Dure 5 min."
		];
i++;	

//Lava Flows - Elemental
rank[i] = [
"Augmente la portée de votre Horion de flammes de 5 mètres et augmente le bonus aux dégâts des coups critiques de votre sort Explosion de lave de 6% supplémentaires.",
"Augmente la portée de votre Horion de flammes de 10 mètres et augmente le bonus aux dégâts des coups critiques de votre sort Explosion de lave de 12% supplémentaires.",
"Augmente la portée de votre Horion de flammes de 15 mètres et augmente le bonus aux dégâts des coups critiques de votre sort Explosion de lave de 24% supplémentaires."
		];
i++;

//Storm, Earth and Fire - Elemental
rank[i] = [
"Réduit le temps de recharge de votre sort Chaîne d'éclairs de 0,5 sec, la portée de votre Horion de terre est augmentée de 1 mètres et les dégâts périodiques infligés par votre Horion de flammes sont augmentés de 10%.",
"Réduit le temps de recharge de votre sort Chaîne d'éclairs de 1 sec, la portée de votre Horion de terre est augmentée de 2 mètres et les dégâts périodiques infligés par votre Horion de flammes sont augmentés de 20%.",
"Réduit le temps de recharge de votre sort Chaîne d'éclairs de 1,5 sec, la portée de votre Horion de terre est augmentée de 3 mètres et les dégâts périodiques infligés par votre Horion de flammes sont augmentés de 30%.",
"Réduit le temps de recharge de votre sort Chaîne d'éclairs de 2 sec, la portée de votre Horion de terre est augmentée de 4 mètres et les dégâts périodiques infligés par votre Horion de flammes sont augmentés de 40%.",
"Réduit le temps de recharge de votre sort Chaîne d'éclairs de 2,5 sec, la portée de votre Horion de terre est augmentée de 5 mètres et les dégâts périodiques infligés par votre Horion de flammes sont augmentés de 50%.",
		];
i++;

//Thunderstorm - Elemental
rank[i] = [
	"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>45 sec de recharge</span><br>Vous appelez la foudre, qui vous charge d'énergie et inflige des dégâts aux ennemis se trouvant à moins de 10 mètres. Vous rend 8% de mana et inflige 566 à 644 points de dégâts de Nature à tous les ennemis proches, les faisant tomber à la renverse 20 mètres plus loin.<br><br>\
		&nbsp;Talents à plusieurs rangs"
		];
i++;

//ENHANCEMENT TREE---------------------------------------------------------------------------------->

//Enhancing Totems - Enhancement	
rank[i] = [
"Augmente de 5% l'effet de vos Totems de Force de la Terre et Langue de feu.",
"Augmente de 10% l'effet de vos Totems de Force de la Terre et Langue de feu.",
"Augmente de 15% l'effet de vos Totems de Force de la Terre et Langue de feu."
		];
i++;	


//Earth's Grasp - Elemental
rank[i] = [
"Augmente les points de vie de votre Totem Griffe de pierre de 25% et le rayon de votre Totem de lien terrestre de 10%.",
"Augmente les points de vie de votre Totem Griffe de pierre de 50% et le rayon de votre Totem de lien terrestre de 20%."
		];
i++;

//Ancestral Knowledge - Enhancement
rank[i] = [
"Augmente votre Intelligence de 2%.",
"Augmente votre Intelligence de 4%.",
"Augmente votre Intelligence de 6%.",
"Augmente votre Intelligence de 8%.",
"Augmente votre Intelligence de 10%."
		];
i++;		

//Guardian Totems - Enhancement
rank[i] = [
"Augmente de 10% le montant de points d'armure augmentés par votre Totem Peau de pierre et réduit le temps de recharge de votre Totem de Glèbe de 1 sec.",
"Augmente de 20% le montant de points d'armure augmentés par votre Totem Peau de pierre et réduit le temps de recharge de votre Totem de Glèbe de 2 sec."
		];
i++;		

//Thundering Strikes - Enhancement 
rank[i] = [
"Augmente de 1% vos chances d'infliger un coup critique avec tous les sorts et attaques.",
"Augmente de 2% vos chances d'infliger un coup critique avec tous les sorts et attaques.",
"Augmente de 3% vos chances d'infliger un coup critique avec tous les sorts et attaques.",
"Augmente de 4% vos chances d'infliger un coup critique avec tous les sorts et attaques.",
"Augmente de 5% vos chances d'infliger un coup critique avec tous les sorts et attaques."
		];		
i++;		

//Improved Ghost Wolf - Enhancement 
rank[i] = [

"Réduit le temps d'incantation de votre sort Loup fantôme de 1 sec.",
"Réduit le temps d'incantation de votre sort Loup fantôme de 2 sec."
		];
i++;		

//Improved Shields - Enhancement
rank[i] = [
"Augmente de 5% les dégâts infligés par les orbes de votre Bouclier de foudre, de 5% la quantité de mana obtenue grâce aux orbes de votre Bouclier d'eau et de 5% la quantité de soins obtenus avec vos orbes de Bouclier de terre.",
"Augmente de 10% les dégâts infligés par les orbes de votre Bouclier de foudre, de 10% la quantité de mana obtenue grâce aux orbes de votre Bouclier d'eau et de 10% la quantité de soins obtenus avec vos orbes de Bouclier de terre.",
"Augmente de 15% les dégâts infligés par les orbes de votre Bouclier de foudre, de 15% la quantité de mana obtenue grâce aux orbes de votre Bouclier d'eau et de 15% la quantité de soins obtenus avec vos orbes de Bouclier de terre."
		];
i++;	

//Elemental Weapons - Enhancement 

rank[i] = [
"Augmente de 13% les dégâts infligés par l'effet de votre Arme Furie-des-vents, de 10% les dégâts infligés par votre Arme Langue de feu et de 10% le bonus aux soins de votre Arme Viveterre.",
"Augmente de 27% les dégâts infligés par l'effet de votre Arme Furie-des-vents, de 20% les dégâts infligés par votre Arme Langue de feu et de 20% le bonus aux soins de votre Arme Viveterre.",
"Augmente de 40% les dégâts infligés par l'effet de votre Arme Furie-des-vents, de 30% les dégâts infligés par votre Arme Langue de feu et de 30% le bonus aux soins de votre Arme Viveterre."
		];
i++;

	
	

//Shamanistic Focus - Enhancement  
rank[i] = [
"Réduit le coût en mana de vos horions de 45%."
		];
i++;		

//Anticipation - Enhancement 
rank[i] = [
"Augmente de 1% vos chances d'esquiver et réduit de 16% la durée de tous les effets de désarmement utilisés contre vous. Non cumulable avec les autres effets qui réduisent la durée du désarmement.",
"Augmente de 2% vos chances d'esquiver et réduit de 25% la durée de tous les effets de désarmement utilisés contre vous. Non cumulable avec les autres effets qui réduisent la durée du désarmement.",
"Augmente de 3% vos chances d'esquiver et réduit de 50% la durée de tous les effets de désarmement utilisés contre vous. Non cumulable avec les autres effets qui réduisent la durée du désarmement."
		];i++;		

//Flurry - Enhancement
rank[i] = [
"Lorsque vous infligez un coup critique, augmente votre vitesse d'attaque de 10% pour les 3 prochaines attaques.",
"Lorsque vous infligez un coup critique, augmente votre vitesse d'attaque de 15% pour les 3 prochaines attaques.",
"Lorsque vous infligez un coup critique, augmente votre vitesse d'attaque de 20% pour les 3 prochaines attaques.",
"Lorsque vous infligez un coup critique, augmente votre vitesse d'attaque de 25% pour les 3 prochaines attaques.",
"Lorsque vous infligez un coup critique, augmente votre vitesse d'attaque de 30% pour les 3 prochaines attaques."
		];
i++;		

//Toughness - Enhancement 
rank[i]=[
"Augmente la valeur d'armure des objets de 2% et réduit sur vous la durée des effets ralentissant le mouvement de 6%.",
"Augmente la valeur d'armure des objets de 4% et réduit sur vous la durée des effets ralentissant le mouvement de 12%.",
"Augmente la valeur d'armure des objets de 6% et réduit sur vous la durée des effets ralentissant le mouvement de 18%.",
"Augmente la valeur d'armure des objets de 8% et réduit sur vous la durée des effets ralentissant le mouvement de 24%.",
"Augmente la valeur d'armure des objets de 10% et réduit sur vous la durée des effets ralentissant le mouvement de 30%."
		];
i++;		

//Improved Windfury Weapon - Enhancement  
rank[i] = [
"Augmente la hâte en mêlée de votre totem Furie-des-vents de 2%.",
"Augmente la hâte en mêlée de votre totem Furie-des-vents de 4%."
		];
i++;

//Spirit Weapons - Enhancement
rank[i]=[
"Donne une chance de parer les attaques de mêlée des ennemis et réduit la menace générée par vos attaques de mêlée de 30%."
			];
i++;			

//Mental Dexterity - Enhancement 
rank[i] = [
"Augmente votre puissance d'attaque de 33% de votre Intelligence.",
"Augmente votre puissance d'attaque de 66% de votre Intelligence.",
"Augmente votre puissance d'attaque de 100% de votre Intelligence."
		];
i++;

	
//Unleashed Rage - Enhancement  - TALENT DIFFERENT - description
rank[i] = [
"Vos coups critiques obtenus avec les attaques de mêlée augmentent de 2% la puissance d'attaque de tous les membres du groupe ou du raid s'ils se trouvent à moins de 45 mètres du chaman. Dure 10 sec.",
"Vos coups critiques obtenus avec les attaques de mêlée augmentent de 4% la puissance d'attaque de tous les membres du groupe ou du raid s'ils se trouvent à moins de 45 mètres du chaman. Dure 10 sec.",
"Vos coups critiques obtenus avec les attaques de mêlée augmentent de 6% la puissance d'attaque de tous les membres du groupe ou du raid s'ils se trouvent à moins de 45 mètres du chaman. Dure 10 sec.",
"Vos coups critiques obtenus avec les attaques de mêlée augmentent de 8% la puissance d'attaque de tous les membres du groupe ou du raid s'ils se trouvent à moins de 45 mètres du chaman. Dure 10 sec.",
"Vos coups critiques obtenus avec les attaques de mêlée augmentent de 10% la puissance d'attaque de tous les membres du groupe ou du raid s'ils se trouvent à moins de 45 mètres du chaman. Dure 10 sec."
		];
i++;		
			
//Weapon Mastery - Enhancement
rank[i]=[
"Augmente de 4% les dégâts que vous infligez avec toutes les armes.",
"Augmente de 7% les dégâts que vous infligez avec toutes les armes.",
"Augmente de 10% les dégâts que vous infligez avec toutes les armes."
		];
i++;		

//Dual Wield Specialization - Enhancement
rank[i]=[
"Augmente de 2% supplémentaires vos chances de toucher lorsque vous portez deux armes.",
"Augmente de 4% supplémentaires vos chances de toucher lorsque vous portez deux armes.",
"Augmente de 6% supplémentaires vos chances de toucher lorsque vous portez deux armes."
		];
i++;		

//Dual Wield - Enhancement
rank[i]=[
"Permet d'équiper les armes à une main dans la main gauche."
		];
i++;		

//Stormstrike - Enhancement - TALENT DIFFERENT - description
rank[i]=[
		"<span style=text-align:left;float:left;>8% du mana de base</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>10 sec de recharge</span><br><span style=text-align:left;float:left;>Requiert une arme de mêlée</span><BR>Attaque instantanément avec les deux armes. De plus, les 2 prochaines sources de dégâts de Nature infligés à la cible par le chaman sont augmentées de 20%. Dure 12 sec."
		];
i++;

//Mental Quickness - Enhancement
rank[i]=[
"Réduit le coût en mana de vos sorts instantanés de chaman de 2% et augmente la puissance de vos sorts d'un montant égal à 10% de votre puissance d'attaque.",
"Réduit le coût en mana de vos sorts instantanés de chaman de 4% et augmente la puissance de vos sorts d'un montant égal à 20% de votre puissance d'attaque.",
"Réduit le coût en mana de vos sorts instantanés de chaman de 6% et augmente la puissance de vos sorts d'un montant égal à 30% de votre puissance d'attaque."
		];
i++;
		
//Lava Lash - Enhancement
rank[i]=[
"<span style=text-align:left;float:left;>4% du mana de base</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>Vous chargez votre arme en main gauche de lave, infligeant instantanément 100% des dégâts de l'arme en main gauche. Les dégâts sont augmentés de 25% si votre arme en main gauche est enchantée avec Langue de feu."
		];
i++;		


//Improved Stormstrike - Enhancement
rank[i]=[
"Augmente le nombre de charges de Frappe-tempête de 1, et réduit le temps de recharge de 1 sec.",
"Augmente le nombre de charges de Frappe-tempête de 2, et réduit le temps de recharge de 2 sec."
		];
i++;

//Static Shock - Enhancement 
rank[i] = [
"Vous avez 2% de chances de toucher votre cible avec une charge d'orbe de Bouclier de foudre quand vous infligez des dégâts. Augmente le nombre de charges de votre Bouclier de foudre de 2.",
"Vous avez 4% de chances de toucher votre cible avec une charge d'orbe de Bouclier de foudre quand vous infligez des dégâts. Augmente le nombre de charges de votre Bouclier de foudre de 4.",
"Vous avez 6% de chances de toucher votre cible avec une charge d'orbe de Bouclier de foudre quand vous infligez des dégâts. Augmente le nombre de charges de votre Bouclier de foudre de 6."
		];
i++;

//Shamanistic Rage - Enhancement 
rank[i]=[
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Réduit tous les dégâts subis de 30% et donne à vos attaques en mêlée réussies une chance de régénérer un montant de mana égal à 30% de votre puissance d'attaque. Dure 15 sec."
		];
i++;

//Earthen Power - Enhancement 
rank[i] = [
"Votre Totem de lien terrestre a 50% de chances d'enlever tous les effets de ralentissement sur vous ainsi que sur les cibles alliées proches à chacune de ses pulsations.",
"Votre Totem de lien terrestre a 100% de chances d'enlever tous les effets de ralentissement sur vous ainsi que sur les cibles alliées proches à chacune de ses pulsations."
		];
i++;

//Maelstrom Weapon - Enhancement - TALENT DIFFERENT - chance of proc
rank[i] = [
"Quand vous infligez des dégâts avec une arme de mêlée, vous avez 100% de chances de réduire le temps d'incantation de votre prochain sort Eclair, Chaîne d'éclairs, Explosion de lave, Vague de soins inférieurs, Salve de guérison ou Vague de soins de 20%. Cumulable jusqu'à 5 fois. Dure 30 secondes.",
"Quand vous infligez des dégâts avec une arme de mêlée, vous avez 100% de chances de réduire le temps d'incantation de votre prochain sort Eclair, Chaîne d'éclairs, Explosion de lave, Vague de soins inférieurs, Salve de guérison ou Vague de soins de 20%. Cumulable jusqu'à 5 fois. Dure 30 secondes.",
"Quand vous infligez des dégâts avec une arme de mêlée, vous avez 100% de chances de réduire le temps d'incantation de votre prochain sort Eclair, Chaîne d'éclairs, Explosion de lave, Vague de soins inférieurs, Salve de guérison ou Vague de soins de 20%. Cumulable jusqu'à 5 fois. Dure 30 secondes.",
"Quand vous infligez des dégâts avec une arme de mêlée, vous avez 100% de chances de réduire le temps d'incantation de votre prochain sort Eclair, Chaîne d'éclairs, Explosion de lave, Vague de soins inférieurs, Salve de guérison ou Vague de soins de 20%. Cumulable jusqu'à 5 fois. Dure 30 secondes.",
"Quand vous infligez des dégâts avec une arme de mêlée, vous avez 100% de chances de réduire le temps d'incantation de votre prochain sort Eclair, Chaîne d'éclairs, Explosion de lave, Vague de soins inférieurs, Salve de guérison ou Vague de soins de 20%. Cumulable jusqu'à 5 fois. Dure 30 secondes."

		];
i++;

//Feral Spirit - Enhancement
rank[i] = [
	"<span style=text-align:left;float:left;>12% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Invoque deux Esprits du loup qui obéissent au chaman. Dure 45 sec."
		];
i++;


//RESTORATION TREE------------------------------------------------------------------------------->
//Improved Healing Wave - Restoration 
rank[i]=[
"Réduit le temps d'incantation de votre sort Vague de soins de 0,1 sec.",
"Réduit le temps d'incantation de votre sort Vague de soins de 0,2 sec.",
"Réduit le temps d'incantation de votre sort Vague de soins de 0,3 sec.",
"Réduit le temps d'incantation de votre sort Vague de soins de 0,4 sec.",
"Réduit le temps d'incantation de votre sort Vague de soins de 0,5 sec."
		];
i++;		
		
	
//Totemic Focus - Restoration
rank[i]=[
"Réduit le coût en mana de vos totems de 5%.",
"Réduit le coût en mana de vos totems de 10%.",
"Réduit le coût en mana de vos totems de 15%.",
"Réduit le coût en mana de vos totems de 20%.",
"Réduit le coût en mana de vos totems de 25%."
		];
i++;
		
//Improved Reincarnation - Restoration 
rank[i]=[
"Réduit le temps de recharge de votre sort Réincarnation de 10 minutes et augmente le nombre de points de vie et de mana avec lesquels vous vous réincarnez de 10% supplémentaires.",
"Réduit le temps de recharge de votre sort Réincarnation de 20 minutes et augmente le nombre de points de vie et de mana avec lesquels vous vous réincarnez de 20% supplémentaires."
		];
i++;		
		
//Ancestral Healing - Restoration 
rank[i]=[
"Augmente la valeur d'armure de la cible de 8% pendant 15 sec lorsque vous obtenez un effet critique en la soignant.",
"Augmente la valeur d'armure de la cible de 16% pendant 15 sec lorsque vous obtenez un effet critique en la soignant.",
"Augmente la valeur d'armure de la cible de 25% pendant 15 sec lorsque vous obtenez un effet critique en la soignant."
		];
i++;		
		
//Tidal Focus - Restoration 
rank[i]=[
"Réduit de 1% le coût en mana de vos sorts de soins.",
"Réduit de 2% le coût en mana de vos sorts de soins.",
"Réduit de 3% le coût en mana de vos sorts de soins.",
"Réduit de 4% le coût en mana de vos sorts de soins.",
"Réduit de 5% le coût en mana de vos sorts de soins."
		];
i++;		
		
//Improved Water Shield - Restoration      
rank[i]=[
"Quand vous obtenez un effet critique avec les sorts Vague de soins, Vague de soins inférieurs ou Remous, vous avez 33% de chances de consommer instantanément un orbe de Bouclier d'eau.",
"Quand vous obtenez un effet critique avec les sorts Vague de soins, Vague de soins inférieurs ou Remous, vous avez 66% de chances de consommer instantanément un orbe de Bouclier d'eau.",
"Quand vous obtenez un effet critique avec les sorts Vague de soins, Vague de soins inférieurs ou Remous, vous avez 100% de chances de consommer instantanément un orbe de Bouclier d'eau."
		];
i++;		
	
//Healing Focus - Restoration  
rank[i]=[
"Réduit de 23% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez tout sort de soins de chaman.",
"Réduit de 46% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez tout sort de soins de chaman.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez tout sort de soins de chaman."
		];
i++;		
		
//Tidal Force - Restoration 
rank[i]=[
"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Augmente les chances d'obtenir un effet critique avec vos sorts Vague de soins, Vague de soins inférieurs et Salve de guérison de 60%. Chaque soin critique réduit les chances de 20%. Dure 20 sec."
		];
i++;		

//Healing Grace - Restoration 
rank[i]=[
"Diminue le niveau de menace généré par vos sorts de soins de 5% et réduit la probabilité que vos sorts soient dissipés de 10%.",
"Diminue le niveau de menace généré par vos sorts de soins de 10% et réduit la probabilité que vos sorts soient dissipés de 20%.",
"Diminue le niveau de menace généré par vos sorts de soins de 15% et réduit la probabilité que vos sorts soient dissipés de 30%."
		];
i++;	

//Improved Mana Spring Totem - Restoration  
rank[i]=[
"Augmente de 5% les effets de votre Totem Fontaine de mana et de votre Totem guérisseur.",
"Augmente de 10% les effets de votre Totem Fontaine de mana et de votre Totem guérisseur.",
"Augmente de 15% les effets de votre Totem Fontaine de mana et de votre Totem guérisseur.",
"Augmente de 20% les effets de votre Totem Fontaine de mana et de votre Totem guérisseur.",
"Augmente de 25% les effets de votre Totem Fontaine de mana et de votre Totem guérisseur."
		];
i++;	

		
//Tidal Mastery - Restoration 
rank[i]=[
"Augmente les chances d'obtenir un effet critique avec vos sorts de soins et d'éclair de 1%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts de soins et d'éclair de 2%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts de soins et d'éclair de 3%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts de soins et d'éclair de 4%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts de soins et d'éclair de 5%."
		];
i++;	
		
//Healing Way - Restoration  
rank[i]=[
"Vos Vagues de soins ont 33% de chances d'augmenter les effets des vagues de soins suivantes sur cette cible de 6% pendant 15 sec. Cet effet peut se cumuler au maximum 3 fois.",
"Vos Vagues de soins ont 66% de chances d'augmenter les effets des vagues de soins suivantes sur cette cible de 6% pendant 15 sec. Cet effet peut se cumuler au maximum 3 fois.",
"Vos Vagues de soins ont 100% de chances d'augmenter les effets des vagues de soins suivantes sur cette cible de 6% pendant 15 sec. Cet effet peut se cumuler au maximum 3 fois."
		];
i++;

//Nature's Swiftness - Restoration
rank[i]=[
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Activé, votre prochain sort de Nature dont le temps d'incantation est inférieur à 10 secondes devient un sort instantané."
		];
i++;	

//Focused Mind - Restoration  
rank[i]=[
"Réduit de 10% la durée de tous les effets de silence ou d'interruption utilisés contre le chaman. Cet effet ne se cumule pas avec d'autres effets similaires.",
"Réduit de 20% la durée de tous les effets de silence ou d'interruption utilisés contre le chaman. Cet effet ne se cumule pas avec d'autres effets similaires.",
"Réduit de 30% la durée de tous les effets de silence ou d'interruption utilisés contre le chaman. Cet effet ne se cumule pas avec d'autres effets similaires."
		];
i++;	

//Purification - Restoration  
rank[i]=[
"Augmente de 2% l'efficacité de vos sorts de soins.",
"Augmente de 4% l'efficacité de vos sorts de soins.",
"Augmente de 6% l'efficacité de vos sorts de soins.",
"Augmente de 8% l'efficacité de vos sorts de soins.",
"Augmente de 10% l'efficacité de vos sorts de soins."
		];
i++;

//Nature's Guardian - Restoration  
rank[i]=[
"Chaque fois qu'une attaque vous inflige des dégâts qui vous font passer sous les 30% de points de vie, vous avez 10% de chances de recevoir 10% du total de vos points de vie et de réduire votre niveau de menace envers cette cible. Temps de recharge de 8 secondes.",
"Chaque fois qu'une attaque vous inflige des dégâts qui vous font passer sous les 30% de points de vie, vous avez 20% de chances de recevoir 10% du total de vos points de vie et de réduire votre niveau de menace envers cette cible. Temps de recharge de 8 secondes.",
"Chaque fois qu'une attaque vous inflige des dégâts qui vous font passer sous les 30% de points de vie, vous avez 30% de chances de recevoir 10% du total de vos points de vie et de réduire votre niveau de menace envers cette cible. Temps de recharge de 8 secondes.",
"Chaque fois qu'une attaque vous inflige des dégâts qui vous font passer sous les 30% de points de vie, vous avez 40% de chances de recevoir 10% du total de vos points de vie et de réduire votre niveau de menace envers cette cible. Temps de recharge de 8 secondes.",
"Chaque fois qu'une attaque vous inflige des dégâts qui vous font passer sous les 30% de points de vie, vous avez 50% de chances de recevoir 10% du total de vos points de vie et de réduire votre niveau de menace envers cette cible. Temps de recharge de 8 secondes."
		];
i++;


//Mana Tide Totem - Restoration 
rank[i]=[
"3% du mana de base<br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>5 min de recharge</span><br>Nécessite : Water Totem<br>Invoque aux pieds du lanceur de sorts un Totem de Vague de mana pendant 12 sec. Il dispose de 5 points de vie et rend 6% du total de mana toutes les 3 secondes aux membres du groupe qui se trouvent à moins de 30 mètres."
		];
i++;

//Cleanse Spirit - Restoration 
rank[i]=[
"<span style=text-align:left;float:left;>7% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br>Incantation immédiate<br>Purifie l'esprit d'une cible alliée en annulant 1 effet de poison, 1 effet de maladie et 1 effet de malédiction."
				];
i++;

//Blessing of the Eternals - Restoration  
rank[i]=[
"Augmente les chances d'effet critique de vos sorts de 2%, et augmente les chances d'appliquer sur la cible l'effet de soins sur la durée de Viveterre de 40% quand elle dispose de 35% ou moins de ses points de vie.",
"Augmente les chances d'effet critique de vos sorts de 4%, et augmente les chances d'appliquer sur la cible l'effet de soins sur la durée de Viveterre de 80% quand elle dispose de 35% ou moins de ses points de vie."
		];
i++;

//Improved Chain Heal - Restoration  
rank[i]=[
"Augmente de 10% le montant de points de vie rendus par votre sort Salve de guérison.",
"Augmente de 20% le montant de points de vie rendus par votre sort Salve de guérison."
		];
i++;	

	
//Nature's Blessing - Restoration  
rank[i]=[
"Augmente vos soins d'un montant égal à 5% de votre Intelligence.",
"Augmente vos soins d'un montant égal à 10% de votre Intelligence.",
"Augmente vos soins d'un montant égal à 15% de votre Intelligence."
		];
i++;			
	
//Ancestral Awakening - Restoration  
rank[i]=[
"Quand vous réussissez des soins critiques avec Vague de soins, Vague de soins inférieurs ou Remous, vous invoquez un Esprit ancestral à votre aide. Il rend instantanément à la cible alliée membre du groupe ou raid dans un rayon de 40 mètres dont le pourcentage de points de vie est le plus bas 10% du montant soigné.",
"Quand vous réussissez des soins critiques avec Vague de soins, Vague de soins inférieurs ou Remous, vous invoquez un Esprit ancestral à votre aide. Il rend instantanément à la cible alliée membre du groupe ou raid dans un rayon de 40 mètres dont le pourcentage de points de vie est le plus bas 20% du montant soigné.",
"Quand vous réussissez des soins critiques avec Vague de soins, Vague de soins inférieurs ou Remous, vous invoquez un Esprit ancestral à votre aide. Il rend instantanément à la cible alliée membre du groupe ou raid dans un rayon de 40 mètres dont le pourcentage de points de vie est le plus bas 30% du montant soigné."
		];
i++;		
				
		
//Earth Shield - Restoration 
rank[i]=[
"<span style=text-align:left;float:left;>15% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br>Incantation immédiate<br>Protège la cible avec un bouclier de terre, qui lui confère 30% de chances d’ignorer les interruptions de sort quand elle reçoit des dégâts. Les attaques rendent 150 points de vie à la cible protégée. Cet effet ne peut se produire qu’une fois toutes les quelques secondes. 6 charges. Dure 10 min. Bouclier de terre ne peut être placé que sur une cible à la fois et un seul Bouclier élémentaire peut être actif sur une cible à la fois.<br><br>\
		&nbsp;Talents à plusieurs rangs"
				];
i++;

//Improved Earth Shield - Restoration  
rank[i]=[
"Augmente le nombre de charges de votre Bouclier de terre de 1, et augmente les soins prodigués par votre Bouclier de terre de 5%.",
"Augmente le nombre de charges de votre Bouclier de terre de 2, et augmente les soins prodigués par votre Bouclier de terre de 10%."
		];
i++;	

//Tidal Waves - Restoration   - TALENT DIFFERENT - description
rank[i]=[
"Vous avez 20% de chances après avoir lancé Salve de guérison ou Remous de réduire le temps d'incantation de vos deux prochaines Vagues de soins inférieurs ou Vagues de soins de 30%. De plus, votre Vague de soins bénéficie de 4% supplémentaires des effets du bonus relatif aux soins et votre Vague de soins inférieurs de 2% supplémentaires des effets du bonus relatif aux soins.",
"Vous avez 40% de chances après avoir lancé Salve de guérison ou Remous de réduire le temps d'incantation de vos deux prochaines Vagues de soins inférieurs ou Vagues de soins de 30%. De plus, votre Vague de soins bénéficie de 8% supplémentaires des effets du bonus relatif aux soins et votre Vague de soins inférieurs de 4% supplémentaires des effets du bonus relatif aux soins.",
"Vous avez 60% de chances après avoir lancé Salve de guérison ou Remous de réduire le temps d'incantation de vos deux prochaines Vagues de soins inférieurs ou Vagues de soins de 30%. De plus, votre Vague de soins bénéficie de 12% supplémentaires des effets du bonus relatif aux soins et votre Vague de soins inférieurs de 6% supplémentaires des effets du bonus relatif aux soins.",
"Vous avez 80% de chances après avoir lancé Salve de guérison ou Remous de réduire le temps d'incantation de vos deux prochaines Vagues de soins inférieurs ou Vagues de soins de 30%. De plus, votre Vague de soins bénéficie de 16% supplémentaires des effets du bonus relatif aux soins et votre Vague de soins inférieurs de 8% supplémentaires des effets du bonus relatif aux soins.",
"Vous avez 100% de chances après avoir lancé Salve de guérison ou Remous de réduire le temps d'incantation de vos deux prochaines Vagues de soins inférieurs ou Vagues de soins de 30%. De plus, votre Vague de soins bénéficie de 20% supplémentaires des effets du bonus relatif aux soins et votre Vague de soins inférieurs de 10% supplémentaires des effets du bonus relatif aux soins."
		];
i++;	

//Riptide - Restoration 
rank[i]=[
"<span style=text-align:left;float:left;>18% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>Rend à une cible alliée 639 à 691 de points de vie plus 500 points de vie en 15 sec. Votre prochaine Salve de guérison lancée sur cette cible primaire dans les 15 sec consommera l'effet de soins sur la durée et augmentera le montant de soins de votre Salve de guérison de 25%."
				];
i++;
		
//Restoration Talents End^^

