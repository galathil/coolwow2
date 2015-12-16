var i = 0;
var t = 0;

var className = "Talents de paladin";
var talentPath = "/info/basics/talents/";

tree[i] = "Sacré"; i++;
tree[i] = "Protection"; i++;
tree[i] = "Vindicte"; i++;

i = 0;
talent[i] = [0, "Focalisation spirituelle", 5, 2, 1]; i++;
talent[i] = [0, "Sceaux des purs", 5, 3, 1]; i++; 
talent[i] = [0, "Lumière guérisseuse", 3, 1, 2]; i++;
talent[i] = [0, "Intelligence divine", 5, 2, 2]; i++;
talent[i] = [0, "Foi inflexible", 2, 3, 2]; i++;
talent[i] = [0, "Maîtrise des auras", 1, 1, 3]; i++;
talent[i] = [0, "Illumination", 5, 2, 3]; i++;
talent[i] = [0, "Imposition des mains améliorée", 2, 3, 3]; i++;
talent[i] = [0, "Aura de concentration améliorée", 3, 1, 4]; i++;
talent[i] = [0, "Bénédiction de sagesse améliorée", 2, 3, 4]; i++;
talent[i] = [0, "Pur de coeur", 2, 1, 5]; i++;
talent[i] = [0, "Faveur divine", 1, 2, 5, [getTalentID("Illumination"),5]]; i++;
talent[i] = [0, "Lumière sanctifiée", 3, 3, 5]; i++;
talent[i] = [0, "Mains bénies", 2, 4, 5]; i++;
talent[i] = [0, "Puissance purifiante", 2, 1, 6]; i++;
talent[i] = [0, "Puissance sacrée", 5, 3, 6]; i++;
talent[i] = [0, "Grâce de la lumière", 3, 1, 7]; i++;
talent[i] = [0, "Horion sacré", 1, 2, 7, [getTalentID("Faveur divine"),1]]; i++;
talent[i] = [0, "Vie bénie", 3, 3, 7]; i++;
talent[i] = [0, "Imprégnation de lumière", 2, 2, 8, [getTalentID("Horion sacré"),1]]; i++;
talent[i] = [0, "Soutien sacré", 5, 3, 8]; i++;
talent[i] = [0, "Purification sacrée", 3, 1, 9]; i++;
talent[i] = [0, "Illumination divine", 1, 2, 9]; i++;
talent[i] = [0, "Jugements éclairés", 2, 3, 9]; i++;
talent[i] = [0, "Jugements des purs", 5, 2, 10]; i++;
talent[i] = [0, "Guide de lumière", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//protection talents

talent[i] = [1, "Bénédiction des rois", 1, 1, 1]; i++;
talent[i] = [1, "Bénédiction des rois améliorée", 4, 2, 1, [getTalentID("Bénédiction des rois"),1]]; i++;
talent[i] = [1, "Force divine", 5, 3, 1]; i++;
talent[i] = [1, "Stoïcisme", 3, 1, 2]; i++;
talent[i] = [1, "Faveur du Gardien", 2, 2, 2]; i++;
talent[i] = [1, "Anticipation", 5, 3, 2]; i++;
talent[i] = [1, "Fureur vertueuse améliorée", 3, 2, 3]; i++;
talent[i] = [1, "Résistance", 5, 3, 3]; i++;
talent[i] = [1, "Gardien divin", 2, 1, 4]; i++;
talent[i] = [1, "Marteau de la justice amélioré", 3, 2, 4]; i++;
talent[i] = [1, "Aura de dévotion améliorée", 3, 3, 4]; i++;
talent[i] = [1, "Bénédiction du sanctuaire", 1, 2, 5]; i++;
talent[i] = [1, "Rétribution", 5, 3, 5]; i++;
talent[i] = [1, "Devoir sacré", 2, 1, 6]; i++;
talent[i] = [1, "Spécialisation Arme 1M", 5, 3, 6]; i++;
talent[i] = [1, "Bouclier sacré", 1, 2, 7, [getTalentID("Bénédiction du sanctuaire"),1]]; i++;
talent[i] = [1, "Ardent défenseur", 5, 3, 7]; i++;
talent[i] = [1, "Redoute", 3, 1, 8]; i++;
talent[i] = [1, "Expertise en combat", 3, 3, 8]; i++;
talent[i] = [1, "Touché par la Lumière", 3, 1, 9]; i++;
talent[i] = [1, "Bouclier du vengeur", 1, 2, 9, [getTalentID("Bouclier sacré"),1]]; i++;
talent[i] = [1, "Gardé par la Lumière", 2, 3, 9]; i++;
talent[i] = [1, "Bouclier du templier", 3, 2, 10, [getTalentID("Bouclier du vengeur"),1]]; i++;
talent[i] = [1, "Jugements des justes", 2, 3, 10]; i++;
talent[i] = [1, "Marteau du vertueux", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//retribution talents
talent[i] = [2, "Déviation", 5, 2, 1]; i++;
talent[i] = [2, "Bénédiction", 5, 3, 1]; i++;
talent[i] = [2, "Jugements améliorés", 2, 1, 2]; i++;
talent[i] = [2, "Coeur du Croisé", 3, 2, 2]; i++;
talent[i] = [2, "Bénédiction de puissance améliorée", 2, 3, 2]; i++;
talent[i] = [2, "Justification", 2, 1, 3]; i++;
talent[i] = [2, "Conviction", 5, 2, 3]; i++;
talent[i] = [2, "Sceau d'autorité", 1, 3, 3]; i++;
talent[i] = [2, "Poursuite de la justice", 2, 4, 3]; i++;
talent[i] = [2, "Oeil pour oeil", 2, 1, 4]; i++;
talent[i] = [2, "Sceaux sanctifiés", 3, 3, 4]; i++;
talent[i] = [2, "Croisade", 3, 4, 4]; i++;
talent[i] = [2, "Spécialisation Arme 2M", 3, 1, 5]; i++;
talent[i] = [2, "Vindicte sanctifiée", 1, 3, 5]; i++;
talent[i] = [2, "Dessein divin", 2, 4, 5]; i++;
talent[i] = [2, "Vengeance", 3, 2, 6, [getTalentID("Conviction"),5]]; i++;
talent[i] = [2, "Aura de vindicte améliorée", 2, 3, 6]; i++;
talent[i] = [2, "L'art de la guerre", 2, 1, 7]; i++;
talent[i] = [2, "Repentir", 1, 2, 7]; i++;
talent[i] = [2, "Jugements des sages", 3, 3, 7]; i++;
talent[i] = [2, "Fanatisme", 5, 2, 8, [getTalentID("Repentir"),1]]; i++;
talent[i] = [2, "Courroux sanctifié", 2, 3, 8]; i++;
talent[i] = [2, "Vindicte rapide", 3, 1, 9]; i++;
talent[i] = [2, "Inquisition", 1, 2, 9]; i++;
talent[i] = [2, "Fourreau de lumière", 3, 3, 9]; i++;
talent[i] = [2, "Vengeance vertueuse", 5, 2, 10]; i++;
talent[i] = [2, "Tempête divine", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

i = 0;


//Holy Talents Begin

//Spiritual Focus - Holy
rank[i] = [
"Réduit de 14% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Lumière sacrée et Eclair lumineux.",
"Réduit de 28% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Lumière sacrée et Eclair lumineux.",
"Réduit de 42% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Lumière sacrée et Eclair lumineux.",
"Réduit de 56% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Lumière sacrée et Eclair lumineux.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Lumière sacrée et Eclair lumineux."
		];
i++;

//Seals of the Pure - Holy
rank[i] = [
"Augmente de 3% les dégâts infligés par vos Sceaux de piété, de vengeance et de corruption ainsi que les effets de leurs Jugements.",
"Augmente de 6% les dégâts infligés par vos Sceaux de piété, de vengeance et de corruption ainsi que les effets de leurs Jugements.",
"Augmente de 9% les dégâts infligés par vos Sceaux de piété, de vengeance et de corruption ainsi que les effets de leurs Jugements.",
"Augmente de 12% les dégâts infligés par vos Sceaux de piété, de vengeance et de corruption ainsi que les effets de leurs Jugements.",
"Augmente de 15% les dégâts infligés par vos Sceaux de piété, de vengeance et de corruption ainsi que les effets de leurs Jugements."
		];
i++;	

//Healing Light - Holy
rank[i] = [
"Augmente le montant de points de vie rendus par vos sorts Lumière sacrée et Eclair lumineux ainsi que l'efficacité des sorts Horion sacré de 4%.",
"Augmente le montant de points de vie rendus par vos sorts Lumière sacrée et Eclair lumineux ainsi que l'efficacité des sorts Horion sacré de 8%.",
"Augmente le montant de points de vie rendus par vos sorts Lumière sacrée et Eclair lumineux ainsi que l'efficacité des sorts Horion sacré de 12%."
		];
i++;
		
//Divine Intellect - Holy
rank[i] = [
"Augmente votre total d'Intelligence de 3%.",
"Augmente votre total d'Intelligence de 6%.",
"Augmente votre total d'Intelligence de 9%.",
"Augmente votre total d'Intelligence de 12%.",
"Augmente votre total d'Intelligence de 15%."
		];
i++;		

		//Unyielding Faith - Holy
rank[i] = [ 
"Réduit de 15% la durée de tous les effets de Peur et de Désorientation.",
"Réduit de 30% la durée de tous les effets de Peur et de Désorientation."
		];
i++;
		
	

		

//Aura Mastery - Retribution 
rank[i]=[
		"Porte le rayon de vos auras à 40 mètres."
		];
i++;	

//Illumination - Holy
rank[i] = [
"Lorsque vous obtenez un effet critique avec Eclair lumineux, Lumière sacrée, ou le sort de soins Horion sacré, vous avez 20% de chances de recevoir un montant de mana égal à 60% du coût de base du sort.",
"Lorsque vous obtenez un effet critique avec Eclair lumineux, Lumière sacrée, ou le sort de soins Horion sacré, vous avez 40% de chances de recevoir un montant de mana égal à 60% du coût de base du sort.",
"Lorsque vous obtenez un effet critique avec Eclair lumineux, Lumière sacrée, ou le sort de soins Horion sacré, vous avez 60% de chances de recevoir un montant de mana égal à 60% du coût de base du sort.",
"Lorsque vous obtenez un effet critique avec Eclair lumineux, Lumière sacrée, ou le sort de soins Horion sacré, vous avez 80% de chances de recevoir un montant de mana égal à 60% du coût de base du sort.",
"Lorsque vous obtenez un effet critique avec Eclair lumineux, Lumière sacrée, ou le sort de soins Horion sacré, vous avez 100% de chances de recevoir un montant de mana égal à 60% du coût de base du sort."
		];
i++;

//Improved Lay on Hands - Holy
rank[i] = [
"La cible de votre sort Imposition des mains bénéficie d'un bonus de 25% à la valeur d'armure de ses objets pendant 15 sec. De plus, le temps de recharge de votre sort Imposition des mains est réduit de 2 min.",
"La cible de votre sort Imposition des mains bénéficie d'un bonus de 50% à la valeur d'armure de ses objets pendant 15 sec. De plus, le temps de recharge de votre sort Imposition des mains est réduit de 4 min."
		];		
i++;		


		
//Improved Concentration Aura - Protection
rank[i] = [
"Augmente de 5% supplémentaires l'effet de votre Aura de concentration et réduit de 10% la durée de tout effet de silence ou d'interruption utilisé contre un membre du groupe affecté. La réduction de durée ne se cumule pas avec tout autre effet.",
"Augmente de 10% supplémentaires l'effet de votre Aura de concentration et réduit de 20% la durée de tout effet de silence ou d'interruption utilisé contre un membre du groupe affecté. La réduction de durée ne se cumule pas avec tout autre effet.",
"Augmente de 15% supplémentaires l'effet de votre Aura de concentration et réduit de 30% la durée de tout effet de silence ou d'interruption utilisé contre un membre du groupe affecté. La réduction de durée ne se cumule pas avec tout autre effet."
		];i++;	
		

//Improved Blessing of Wisdom - Holy 
rank[i] = [
"Augmente l'effet de votre sort de Bénédiction de sagesse de 10%.",
"Augmente l'effet de votre sort de Bénédiction de sagesse de 20%."
		];
i++;		

//Pure of Heart - Holy 
rank[i] = [
"Réduit de 25% la durée des effets de malédiction et de maladie.",
"Réduit de 50% la durée des effets de malédiction et de maladie."
		];
i++;		

//Divine Favor - Holy TALENT DIFFERENT
rank[i] = [
		"3% du mana de base<br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Une fois activé, confère 100% de chances à votre prochain sort Eclair lumineux, Lumière sacrée ou Horion sacré d'avoir un effet critique."
		];
i++;			

//Sanctified Light - Holy
rank[i] = [
		"Augmente de 2% vos chances de réaliser un effet critique avec vos sorts Lumière sacrée et Horion sacré.",
		"Augmente de 4% vos chances de réaliser un effet critique avec vos sorts Lumière sacrée et Horion sacré.",
		"Augmente de 6% vos chances de réaliser un effet critique avec vos sorts Lumière sacrée et Horion sacré."	
		];
i++;		
		
//Blessed Hands - Holy
rank[i] = [
"Réduit le coût en mana et augmente la résistance aux effets de dissipation de tous les sorts de Mains de 15%.",
"Réduit le coût en mana et augmente la résistance aux effets de dissipation de tous les sorts de Mains de 30%."
		];
i++;		
		

//Purifying Power - Holy
rank[i] = [
		"Réduit de 5% le coût en mana de vos sorts Epuration, Purification et Consécration et augmente de 10% les chances d'infliger un coup critique avec vos sorts Exorcisme et Colère divine.",
		"Réduit de 10% le coût en mana de vos sorts Epuration, Purification et Consécration et augmente de 20% les chances d'infliger un coup critique avec vos sorts Exorcisme et Colère divine."
		];
i++;		


//Holy Power - Holy
rank[i] = [
"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 1%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 2%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 3%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 4%.",
"Augmente les chances d'obtenir un effet critique avec vos sorts du Sacré de 5%."
		];
i++;		

//Light's Grace - Holy
rank[i] = [
"Confère à votre sort Lumière sacrée 33% de chances de réduire le temps d'incantation de votre prochain sort Lumière sacrée de 0,5 sec. Cet effet dure 15 sec.",
"Confère à votre sort Lumière sacrée 66% de chances de réduire le temps d'incantation de votre prochain sort Lumière sacrée de 0,5 sec. Cet effet dure 15 sec.",
"Confère à votre sort Lumière sacrée 100% de chances de réduire le temps d'incantation de votre prochain sort Lumière sacrée de 0,5 sec. Cet effet dure 15 sec."
		];
i++;		

//Holy Shock - Holy	TALENT DIFFERENT has trainable ranks	
rank[i] = [
"<span style=text-align:right;float:right;>Ennemi : 20 m de portée</span><br><span style=text-align:left;float:left;>18% du mana de base</span><span style=text-align:right;float:right;>Allié : 40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>L'énergie sacrée frappe la cible et inflige 1296 à 1402 points de dégâts du Sacré à un ennemi, ou bien rend à un allié 2401 à 2599 points de vie."
		];
i++;	

//Blessed Life - Holy
rank[i] = [
"Vous confère 4% de chances que les attaques contre vous n'infligent que la moitié des dégâts.",
"Vous confère 7% de chances que les attaques contre vous n'infligent que la moitié des dégâts.",
"Vous confère 10% de chances que les attaques contre vous n'infligent que la moitié des dégâts."
		];
i++;

//Infusion of Light - Holy
rank[i] = [
"Vos coups critiques réussis avec Horion sacré réduisent le temps d'incantation de votre prochain sort Lumière sacrée de 0,50 secs.",
"Vos coups critiques réussis avec Horion sacré réduisent le temps d'incantation de votre prochain sort Lumière sacrée de 1 secs."
		];
i++;

//Holy Guidance - Holy
rank[i] = [
"Augmente la puissance de vos sorts de 4% de votre total d'Intelligence.",
"Augmente la puissance de vos sorts de 8% de votre total d'Intelligence.",
"Augmente la puissance de vos sorts de 12% de votre total d'Intelligence.",
"Augmente la puissance de vos sorts de 16% de votre total d'Intelligence.",
"Augmente la puissance de vos sorts de 20% de votre total d'Intelligence."
		];
i++;

//Sacred Cleansing - Holy
rank[i] = [
"Votre sort Epuration a 10% de chances d'augmenter la résistance de la cible aux maladies, à la magie et au poison de 30% pendant 10 sec.",
"Votre sort Epuration a 20% de chances d'augmenter la résistance de la cible aux maladies, à la magie et au poison de 30% pendant 10 sec.",
"Votre sort Epuration a 30% de chances d'augmenter la résistance de la cible aux maladies, à la magie et au poison de 30% pendant 10 sec."
		];
i++;

//Divine Illumination - Holy			
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Réduit le coût en mana de tous les sorts de 50% pendant 15 sec."
		];
i++;

//Enlightened Judgements - Holy
rank[i] = [
"Augmente de 15 mètres la portée de vos sorts de Jugement et augmente de 2% vos chances de toucher.",
"Augmente de 30 mètres la portée de vos sorts de Jugement et augmente de 4% vos chances de toucher."
		];
i++;

//Judgements of the Pure - Holy
rank[i] = [
"Vos sorts de Jugement augmentent votre vitesse d'incantation et votre hâte en mêlée de 3% pendant 1 min.",
"Vos sorts de Jugement augmentent votre vitesse d'incantation et votre hâte en mêlée de 6% pendant 1 min.",
"Vos sorts de Jugement augmentent votre vitesse d'incantation et votre hâte en mêlée de 9% pendant 1 min.",
"Vos sorts de Jugement augmentent votre vitesse d'incantation et votre hâte en mêlée de 12% pendant 1 min.",
"Vos sorts de Jugement augmentent votre vitesse d'incantation et votre hâte en mêlée de 15% pendant 1 min."
		];
i++;

//Beacon of Light - Holy TALENT DIFFERENT	
rank[i] = [
		"<span style=text-align:left;float:left;>35% du mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><br>La cible devient un guide de lumière pour toutes les cibles se trouvant dans un rayon de 40 mètres. Tous les soins que vous lancez sur ces cibles soignent également le Guide pour un montant de points de vie égal à 100% des soins prodigués. Une seule cible à la fois peut être le Guide de lumière. Dure 1 min."
		];
i++;

// PROTECTION TREE--------------------------------------------------------------------------


//Blessing of Kings - Retribution TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>6% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br>Incantation immédiate<br>Place une Bénédiction sur une cible amie qui augmente les totaux de ses caractéristiques de 2% pendant 10 min. Les joueurs ne peuvent bénéficier des effets que d'une seule Bénédiction par paladin à la fois."
		];
i++;

//Improved Blessing of Kings - Protection
rank[i] = [
"Augmente l'efficacité de Bénédiction des rois de 2% supplémentaires.",
"Augmente l'efficacité de Bénédiction des rois de 4% supplémentaires.",
"Augmente l'efficacité de Bénédiction des rois de 6% supplémentaires.",
"Augmente l'efficacité de Bénédiction des rois de 8% supplémentaires."
		];
i++;

//Divine Strength - Protection
rank[i] = [
"Augmente votre total de Force de 3%.",
"Augmente votre total de Force de 6%.",
"Augmente votre total de Force de 9%.",
"Augmente votre total de Force de 12%.",
"Augmente votre total de Force de 15%."
		];
i++;


//Stoicism - Protection
rank[i] = [
"Réduit la durée de tous les effets d'étourdissement de 10% supplémentaires, et réduit la probabilité que vos sorts soient dissipés de 10% supplémentaires.",
"Réduit la durée de tous les effets d'étourdissement de 20% supplémentaires, et réduit la probabilité que vos sorts soient dissipés de 20% supplémentaires.",
"Réduit la durée de tous les effets d'étourdissement de 30% supplémentaires, et réduit la probabilité que vos sorts soient dissipés de 30% supplémentaires."
		];
i++;


//Guardian's Favor - Protection 
rank[i] = [
"Réduit le temps de recharge de votre Main de protection de 60 sec et augmente la durée de votre Main de liberté de 2 sec.",
"Réduit le temps de recharge de votre Main de protection de 120 sec et augmente la durée de votre Main de liberté de 4 sec."
		];		
i++;	



//Anticipation - Protection
rank[i] = [
"Augmente vos chances d'esquiver de 1%.",
"Augmente vos chances d'esquiver de 2%.",
"Augmente vos chances d'esquiver de 3%.",
"Augmente vos chances d'esquiver de 4%.",
"Augmente vos chances d'esquiver de 5%."
		];
i++;		



//Improved Righteous Fury - Protection 
rank[i] = [
"Tant que la Fureur vertueuse est active, tous les dégâts subis sont réduits de 2%.",
"Tant que la Fureur vertueuse est active, tous les dégâts subis sont réduits de 4%.",
"Tant que la Fureur vertueuse est active, tous les dégâts subis sont réduits de 6%."
		];
i++;		

//Toughness - Protection 
rank[i] = [
"Augmente la valeur d'armure des objets de 2% et réduit la durée de tous les effets affectant le déplacement de 6%.",
"Augmente la valeur d'armure des objets de 4% et réduit la durée de tous les effets affectant le déplacement de 12%.",
"Augmente la valeur d'armure des objets de 6% et réduit la durée de tous les effets affectant le déplacement de 18%.",
"Augmente la valeur d'armure des objets de 8% et réduit la durée de tous les effets affectant le déplacement de 24%.",
"Augmente la valeur d'armure des objets de 10% et réduit la durée de tous les effets affectant le déplacement de 30%."		
		];
i++;
	
//Divine Guardian - Protection 
rank[i] = [
"Tant que Bouclier divin est actif 15% de tous les dégâts subis par les membres du groupe ou du raid se trouvant à moins de 30 mètres sont redirigés vers le paladin.",
"Tant que Bouclier divin est actif 30% de tous les dégâts subis par les membres du groupe ou du raid se trouvant à moins de 30 mètres sont redirigés vers le paladin."
		];
i++;
		

//Improved Hammer of Justice - Protection 
rank[i] = [
"Réduit le temps de recharge de votre sort Marteau de la justice de 10 sec.",
"Réduit le temps de recharge de votre sort Marteau de la justice de 20 sec.",
"Réduit le temps de recharge de votre sort Marteau de la justice de 30 sec."
		];
i++;		

//Improved Devotion Aura - Protection 
rank[i] = [
"Augmente de 17% le bonus d'armure que confère votre Aura de dévotion et augmente de 2% le montant de points de vie rendus à n'importe quelle cible affectée par Aura de dévotion.",
"Augmente de 34% le bonus d'armure que confère votre Aura de dévotion et augmente de 4% le montant de points de vie rendus à n'importe quelle cible affectée par Aura de dévotion.",
"Augmente de 50% le bonus d'armure que confère votre Aura de dévotion et augmente de 6% le montant de points de vie rendus à n'importe quelle cible affectée par Aura de dévotion."
		];
i++;			

//Blessing of Sanctuary - Protection TALENT DIFFERENT
rank[i] = [
		"<span style=text-align:left;float:left;>7% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br>Incantation immédiate<br>Place une Bénédiction sur la cible alliée et réduit les dégâts de tous types qu'elle subit de 3% pendant 10 min. De plus, quand la cible bloque, pare ou esquive une attaque de mêlée, la cible reçoit 10 points de rage, 20 points de puissance runique, ou 2% de son mana maximum. Les joueurs ne peuvent bénéficier des effets que d'une seule Bénédiction par paladin à la fois."
		];
i++;		

//Reckoning - Protection
rank[i] = [
		"Confère 2% de chances lorsque vous êtes victime d'une attaque qui vous inflige des dégâts de bénéficier d'une attaque supplémentaire avec les 4 frappes suivantes dans les 8 sec.",
		"Confère 4% de chances lorsque vous êtes victime d'une attaque qui vous inflige des dégâts de bénéficier d'une attaque supplémentaire avec les 4 frappes suivantes dans les 8 sec.",
		"Confère 6% de chances lorsque vous êtes victime d'une attaque qui vous inflige des dégâts de bénéficier d'une attaque supplémentaire avec les 4 frappes suivantes dans les 8 sec.",
		"Confère 8% de chances lorsque vous êtes victime d'une attaque qui vous inflige des dégâts de bénéficier d'une attaque supplémentaire avec les 4 frappes suivantes dans les 8 sec.",
		"Confère 10% de chances lorsque vous êtes victime d'une attaque qui vous inflige des dégâts de bénéficier d'une attaque supplémentaire avec les 4 frappes suivantes dans les 8 sec."						
		];
i++;

//Sacred Duty - Protection
rank[i] = [
		"Augmente votre total d'Endurance de 3%, réduit le temps de recharge de vos sorts Bouclier divin et Protection divine de 30 sec et réduit la pénalité affectant la vitesse d'attaque de 50%.",
		"Augmente votre total d'Endurance de 6%, réduit le temps de recharge de vos sorts Bouclier divin et Protection divine de 60 sec et réduit la pénalité affectant la vitesse d'attaque de 100%."
		];
i++;

//One-Handed Weapon Specialization - Protection
rank[i]=[
"Augmente tous les dégâts que vous infligez de 2% quand une arme de mêlée à une main est équipée.",
"Augmente tous les dégâts que vous infligez de 4% quand une arme de mêlée à une main est équipée.",
"Augmente tous les dégâts que vous infligez de 6% quand une arme de mêlée à une main est équipée.",
"Augmente tous les dégâts que vous infligez de 8% quand une arme de mêlée à une main est équipée.",
"Augmente tous les dégâts que vous infligez de 10% quand une arme de mêlée à une main est équipée."
			];
i++;			

		
//Holy Shield - Protection TALENT DIFFERENT has trainable ranks
rank[i] = [
"10% du mana de base<br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>8 sec de recharge</span><br>Requiert un bouclier<br>Augmente les chances de bloquer de 30% pedant 10 sec et inflige 211 points de dégâts du Sacré pour chaque attaque bloquée pendant qu'il est actif. Chaque blocage dépense une charge. 8 charges.<br><br>"
		];
i++;

//Ardent Defender - Protection
rank[i]=[
"Lorsque vous avez moins de 35% de points de vie, tous les dégâts subis sont réduits de 6%.",
"Lorsque vous avez moins de 35% de points de vie, tous les dégâts subis sont réduits de 12%.",
"Lorsque vous avez moins de 35% de points de vie, tous les dégâts subis sont réduits de 18%.",
"Lorsque vous avez moins de 35% de points de vie, tous les dégâts subis sont réduits de 24%.",
"Lorsque vous avez moins de 35% de points de vie, tous les dégâts subis sont réduits de 30%."
			];
i++;

//Redoubt - Protection
rank[i] = [
"Augmente votre valeur de blocage de 10% et les attaques en mêlée et à distance contre vous qui infligent des dégâts ont 10% de chances d’augmenter vos chances de blocage de 10%.  Dure 10 sec ou bloque 5 attaques.",
"Augmente votre valeur de blocage de 20% et les attaques en mêlée et à distance contre vous qui infligent des dégâts ont 10% de chances d’augmenter vos chances de blocage de 20%.  Dure 10 sec ou bloque 5 attaques.",
"Augmente votre valeur de blocage de 30% et les attaques en mêlée et à distance contre vous qui infligent des dégâts ont 10% de chances d’augmenter vos chances de blocage de 30%.  Dure 10 sec ou bloque 5 attaques."
		];
i++;
		
//Combat Expertise - Protection
rank[i]=[
"Augmente votre expertise de 2, ainsi que votre total d'Endurance et vos chances de coup critique de 2%.",
"Augmente votre expertise de 4, ainsi que votre total d'Endurance et vos chances de coup critique de 4%.",
"Augmente votre expertise de 6, ainsi que votre total d'Endurance et vos chances de coup critique de 6%."
			];
i++;		

//Touched by the Light - Protection
rank[i] = [
		"Augmente votre puissance des sorts d'un montant égal à 10% de votre Endurance et augmente les points de vie rendus par vos soins critiques de 10%.",
		"Augmente votre puissance des sorts d'un montant égal à 20% de votre Endurance et augmente les points de vie rendus par vos soins critiques de 20%.",
		"Augmente votre puissance des sorts d'un montant égal à 30% de votre Endurance et augmente les points de vie rendus par vos soins critiques de 30%."		
		];
i++;	
	
//Avenger's Shield - Protection TALENT DIFFERENT has trainable ranks
rank[i] = [
		"<span style=text-align:left;float:left;>26% du mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Lance un bouclier sacré sur un ennemi, qui inflige 376 à 450 points de dégâts du Sacré, l'Hébète et rebondit ensuite sur les ennemis proches. Le sort frappe 3 cibles au total. Dure 10 sec.<br><br>"
		];
i++;

//Guarded by the Light - Protection
rank[i]=[
"Réduit les dégâts des sorts subis de 3% et réduit le coût en mana de vos sorts Bouclier sacré, Bouclier du vengeur et Bouclier de piété de 15%.",
"Réduit les dégâts des sorts subis de 6% et réduit le coût en mana de vos sorts Bouclier sacré, Bouclier du vengeur et Bouclier de piété de 30%."
			];
i++;	

//Shield of the Templar - Protection
rank[i]=[
"Réduit tous les dégâts subis de 1% et augmente les dégâts de vos sorts Bouclier sacré, Bouclier du vengeur et Bouclier de piété de 10%.",
"Réduit tous les dégâts subis de 2% et augmente les dégâts de vos sorts Bouclier sacré, Bouclier du vengeur et Bouclier de piété de 20%.",
"Réduit tous les dégâts subis de 3% et augmente les dégâts de vos sorts Bouclier sacré, Bouclier du vengeur et Bouclier de piété de 30%."

];
i++;	

//Judgements of the Just - Holy
rank[i] = [
"Vos sorts de Jugement réduisent également la vitesse d'attaque en mêlée de la cible de 10%.",
"Vos sorts de Jugement réduisent également la vitesse d'attaque en mêlée de la cible de 20%."
		];
i++;

//Hammer of the Righteous - Retribution TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>6% du mana de base</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>6 sec de recharge</span><br><span style=text-align:left;float:left;>Requiert arme de mêlée à une main</span><br/>Frappe avec un marteau la cible actuelle ainsi que 2 cibles proches supplémentaires au plus, infligeant 4 fois les dégâts de votre arme en main droite sous forme de dégâts du Sacré."
		];
i++;
		
//RETRIBUTION TREE------------------------------------------------------------------------		

//Deflection - Retribution
rank[i]=[
"Augmente vos chances de Parer de 1%.",
"Augmente vos chances de Parer de 2%.",
"Augmente vos chances de Parer de 3%.",
"Augmente vos chances de Parer de 4%.",
"Augmente vos chances de Parer de 5%."
		];
i++;
	
		
//Benediction - Retribution  
rank[i]=[
"Réduit le coût en mana de tous les sorts à l'incantation instantané de 2%.",
"Réduit le coût en mana de tous les sorts à l'incantation instantané de 4%.",
"Réduit le coût en mana de tous les sorts à l'incantation instantané de 6%.",
"Réduit le coût en mana de tous les sorts à l'incantation instantané de 8%.",
"Réduit le coût en mana de tous les sorts à l'incantation instantané de 10%."
		];
i++;		
		
//Improved Judgements - Retribution 
rank[i]=[
"Réduit le temps de recharge de vos sorts de Jugement de 1 sec.",
"Réduit le temps de recharge de vos sorts de Jugement de 2 sec."
		];
i++;		
		
//Heart of the Crusader - Retribution  
rank[i]=[
"En plus des effets normaux, vos sorts de Jugement augmentent de 1% supplémentaires les chances de coup critique de toutes les attaques effectuées contre cette cible.",
"En plus des effets normaux, vos sorts de Jugement augmentent de 2% supplémentaires les chances de coup critique de toutes les attaques effectuées contre cette cible.",
"En plus des effets normaux, vos sorts de Jugement augmentent de 3% supplémentaires les chances de coup critique de toutes les attaques effectuées contre cette cible."
		];
i++;

//Improved Blessing of Might - Retribution
rank[i]=[
"Augmente le bonus à la puissance d'attaque conféré par votre Bénédiction de puissance de 12%.",
"Augmente le bonus à la puissance d'attaque conféré par votre Bénédiction de puissance de 25%."
		];
i++;	
		
		
		
//Vindication - Retribution
rank[i]=[
"Confère aux attaques du paladin qui infligent des dégâts une chance de diminuer les caractéristiques de la cible de 10% pendant 15 sec.",
"Confère aux attaques du paladin qui infligent des dégâts une chance de diminuer les caractéristiques de la cible de 20% pendant 15 sec."
		];
i++;		
	
//Conviction - Retribution
rank[i]=[
		"Augmente vos chances d'infliger un coup critique avec tous les sorts et les attaques de 1%.",
		"Augmente vos chances d'infliger un coup critique avec tous les sorts et les attaques de 2%.",
		"Augmente vos chances d'infliger un coup critique avec tous les sorts et les attaques de 3%.",
		"Augmente vos chances d'infliger un coup critique avec tous les sorts et les attaques de 4%.",
		"Augmente vos chances d'infliger un coup critique avec tous les sorts et les attaques de 5%."				
		];
i++;	
		
//Seal of Command - Retribution TALENT DIFFERENT
rank[i]=[
"14% du mana de base<br/>Incantation immédiate<br/>Confère au paladin une chance d'infliger de 62 à 64 apoints de dégâts du Sacré supplémentaires. Un seul Sceau peut être actif sur le paladin à la fois. Dure 2 min.<br/><br/>Libérez l'énergie de ce Sceau pour juger un ennemi et lui infliger instantanément de 145 à 146 points de dégâts du Sacré. Cette attaque est toujours un coup critique si la cible est étourdie ou stupéfiée.<br><br>"
		];
i++;	
		
//Pursuit of Justice - Retribution
rank[i]=[
"Réduit la durée de tous les effets de désarmement de 25% et augmente votre vitesse de déplacement et la vitesse de déplacement de votre monture de 8%. Ne s'additionne pas avec les autres effets qui augmentent la vitesse de déplacement.",
"Réduit la durée de tous les effets de désarmement de 50% et augmente votre vitesse de déplacement et la vitesse de déplacement de votre monture de 15%. Ne s'additionne pas avec les autres effets qui augmentent la vitesse de déplacement."
		];
i++;		
		
//Eye for an Eye - Retribution  
rank[i]=[
"Tous les coups critiques contre vous infligent également 10% des dégâts que vous subissez au lanceur de sorts. Les points de dégâts causés par Oeil pour oeil ne peuvent excéder 50% du total des points de vie du paladin.",
"Tous les coups critiques contre vous infligent également 20% des dégâts que vous subissez au lanceur de sorts. Les points de dégâts causés par Oeil pour oeil ne peuvent excéder 50% du total des points de vie du paladin."
		];
i++;

//Sanctified Seals - Retribution 
rank[i]=[
		"Augmente vos chances de réussir des coups critiques avec tous les sorts et attaques de 1% et réduit le risque que vos Sceaux soient dissipés de 33%.",
		"Augmente vos chances de réussir des coups critiques avec tous les sorts et attaques de 2% et réduit le risque que vos Sceaux soient dissipés de 66%.",
		"Augmente vos chances de réussir des coups critiques avec tous les sorts et attaques de 3% et réduit le risque que vos Sceaux soient dissipés de 100%."
		];
i++;
		
	

//Crusade - Retribution 
rank[i]=[
"Augmente tous les dégâts infligés de 1% et tous les dégâts infligés aux humanoïdes, démons, morts-vivants et élémentaires de 1% supplémentaires.",
"Augmente tous les dégâts infligés de 2% et tous les dégâts infligés aux humanoïdes, démons, morts-vivants et élémentaires de 2% supplémentaires.",
"Augmente tous les dégâts infligés de 3% et tous les dégâts infligés aux humanoïdes, démons, morts-vivants et élémentaires de 3% supplémentaires."
		];
i++;

//Two-Handed Weapon Specialization - Retribution 
rank[i]=[
		"Augmente les points de dégâts que vous infligez avec les armes de mêlée à deux mains de 2%.",
		"Augmente les points de dégâts que vous infligez avec les armes de mêlée à deux mains de 4%.",
		"Augmente les points de dégâts que vous infligez avec les armes de mêlée à deux mains de 6%."
		];
i++;	


//Sanctified Retribution - Holy
rank[i] = [
		"Damage caused by targets affected by Retribution Aura is increased by 2%."
		];
i++;		


//Divine Purpose - Retribution 
rank[i]=[
"Réduit la probabilité que vous soyez touché par les sorts et les attaques à distance de 2% et confère à votre sort Main de liberté 50% de chances d'annuler tous les effets d'étourdissement sur la cible.",
"Réduit la probabilité que vous soyez touché par les sorts et les attaques à distance de 4% et confère à votre sort Main de liberté 100% de chances d'annuler tous les effets d'étourdissement sur la cible."							
		];
i++;

//Vengeance - Retribution  
rank[i]=[
"Après un coup critique obtenu en frappant avec une arme, ou avec un sort ou une technique, vous infligez 1% de points de dégâts physiques et du Sacré supplémentaires pendant 30 sec. Cet effet est cumulable jusqu'à 3 fois.",
"Après un coup critique obtenu en frappant avec une arme, ou avec un sort ou une technique, vous infligez 2% de points de dégâts physiques et du Sacré supplémentaires pendant 30 sec. Cet effet est cumulable jusqu'à 3 fois.",
"Après un coup critique obtenu en frappant avec une arme, ou avec un sort ou une technique, vous infligez 3% de points de dégâts physiques et du Sacré supplémentaires pendant 30 sec. Cet effet est cumulable jusqu'à 3 fois."
		];
i++;

//Improved Retribution Aura - Retribution  
rank[i]=[
"Augmente les points de dégâts infligés par votre sort d'Aura de vindicte de 25%.",
"Augmente les points de dégâts infligés par votre sort d'Aura de vindicte de 50%."
		];
i++;

//The Art of War - Retribution 
rank[i]=[
"Augmente les dégâts des coups critiques réussis avec vos techniques de Jugement, Inquisition et Tempête divine de 10% et quand vous réussissez un coup critique avec ces techniques, le temps d'incantation de votre prochain Eclair lumineux est réduit de 0175 sec.",
"Augmente les dégâts des coups critiques réussis avec vos techniques de Jugement, Inquisition et Tempête divine de 20% et quand vous réussissez un coup critique avec ces techniques, votre prochain Eclair lumineux est instantané."			
		];
i++;

//Repentance - Protection TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>9% du mana de base</span><span style=text-align:right;float:right;>20 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>1 min de recharge</span><br>Plonge la cible ennemie dans une transe méditative qui la stupéfie pendant 1 min. au maximum. Si la cible subit des dégâts, elle se réveille. Ne fonctionne que sur les démons, les draconiens, les géants, les humanoïdes et les morts-vivants."
		];
i++;

//Judgements of the Wise- Retribution 
rank[i]=[
"Vos sorts de Jugement ont 33% de chances de conférer à jusqu'à 10 membres du groupe ou raid l'effet Requinquage, qui les fait bénéficier d'une régénération de mana égale à 0,25% de leur maximum de mana par seconde, ainsi que de vous rendre instantanément 15% de votre mana de base.",
"Vos sorts de Jugement ont 66% de chances de conférer à jusqu'à 10 membres du groupe ou raid l'effet Requinquage, qui les fait bénéficier d'une régénération de mana égale à 0,25% de leur maximum de mana par seconde, ainsi que de vous rendre instantanément 15% de votre mana de base.",
"Vos sorts de Jugement ont 100% de chances de conférer à jusqu'à 10 membres du groupe ou raid l'effet Requinquage, qui les fait bénéficier d'une régénération de mana égale à 0,25% de leur maximum de mana par seconde, ainsi que de vous rendre instantanément 15% de votre mana de base."
		];
i++;	




	

//Fanaticism - Retribution 
rank[i]=[
		"Augmente de 5% les chances d'obtenir un coup critique avec tous les Jugements qui peuvent en infliger et réduit la menace de toutes les actions de 6% sauf sous l'effet de Fureur vertueuse.",
		"Augmente de 10% les chances d'obtenir un coup critique avec tous les Jugements qui peuvent en infliger et réduit la menace de toutes les actions de 12% sauf sous l'effet de Fureur vertueuse.",
		"Augmente de 15% les chances d'obtenir un coup critique avec tous les Jugements qui peuvent en infliger et réduit la menace de toutes les actions de 18% sauf sous l'effet de Fureur vertueuse.",
		"Augmente de 20% les chances d'obtenir un coup critique avec tous les Jugements qui peuvent en infliger et réduit la menace de toutes les actions de 24% sauf sous l'effet de Fureur vertueuse.",
		"Augmente de 25% les chances d'obtenir un coup critique avec tous les Jugements qui peuvent en infliger et réduit la menace de toutes les actions de 30% sauf sous l'effet de Fureur vertueuse."								
		];
i++;

//Sanctified Wrath - Retribution 
rank[i]=[
		"Augmente les chances de coup critique de Marteau de courroux de 25%, réduit le temps de recharge de Courroux vengeur de 30 secs et tant que vous êtes affecté par Courroux vengeur 25% de tous les dégâts infligés évitent les effets de réduction des dégâts.",
		"Augmente les chances de coup critique de Marteau de courroux de 50%, réduit le temps de recharge de Courroux vengeur de 60 secs et tant que vous êtes affecté par Courroux vengeur 50% de tous les dégâts infligés évitent les effets de réduction des dégâts."							
		];
i++;

//Swift Retribution - Retribution 
rank[i]=[
		"Votre Aura de vindicte augmente également vos vitesses d'incantation et d'attaque en mêlée et à distance de 1%.",
		"Votre Aura de vindicte augmente également vos vitesses d'incantation et d'attaque en mêlée et à distance de 2%.",
		"Votre Aura de vindicte augmente également vos vitesses d'incantation et d'attaque en mêlée et à distance de 3%."							
		];
i++;

//Crusader Strike - Retribution TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>8% du mana de base</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>Requiert arme de mêlée<br>Une attaque instantanée qui inflige 110% des dégâts de l'arme."						
		];
i++;

//Sheath of Light - Retribution 
rank[i]=[
"Augmente votre puissance des sorts d'un montant égal à 10% de votre puissance d'attaque et vos sorts de soins critiques rendent à la cible un montant de points de vie égal à 20% des points de vie rendus en 12 secondes.",
"Augmente votre puissance des sorts d'un montant égal à 20% de votre puissance d'attaque et vos sorts de soins critiques rendent à la cible un montant de points de vie égal à 40% des points de vie rendus en 12 secondes.",
"Augmente votre puissance des sorts d'un montant égal à 30% de votre puissance d'attaque et vos sorts de soins critiques rendent à la cible un montant de points de vie égal à 60% des points de vie rendus en 12 secondes."
		];
i++;	




//Righteous Vengeance - Retribution TALENT CHANGED
rank[i]=[
		"Quand vos sorts de Jugement et de Tempête divine infligent un coup critique, votre cible subira 8% de dégâts supplémentaires en 8 sec.",
		"Quand vos sorts de Jugement et de Tempête divine infligent un coup critique, votre cible subira 16% de dégâts supplémentaires en 8 sec.",
		"Quand vos sorts de Jugement et de Tempête divine infligent un coup critique, votre cible subira 24% de dégâts supplémentaires en 8 sec.",
		"Quand vos sorts de Jugement et de Tempête divine infligent un coup critique, votre cible subira 32% de dégâts supplémentaires en 8 sec.",
		"Quand vos sorts de Jugement et de Tempête divine infligent un coup critique, votre cible subira 40% de dégâts supplémentaires en 8 sec.",
		];
i++;

//Divine Storm - Retribution TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>12% du mana de base</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>10 sec de recharge</span><br>Requiert arme de mêlée<br>Une attaque instantanée avec une arme qui inflige des dégâts du Sacré à un maximum de 4 ennemis se trouvant à moins de 8 mètres. La Tempête divine soigne jusqu'à 3 membres du groupe ou du raid pour un total de 20% des dégâts infligés."						
		];
i++;

//Retribution Talents End^^
jsLoaded=true;//needed for ajax script loading


