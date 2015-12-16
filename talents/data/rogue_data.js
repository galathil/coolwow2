var i = 0;
var t = 0;

var className = "Talents de voleur";
var talentPath = "/info/basics/talents/";

tree[i] = "Assassinat"; i++;
tree[i] = "Combat"; i++;
tree[i] = "Finesse"; i++;

i = 0;

talent[i] = [0, "Eviscération améliorée", 3, 1, 1]; i++;
talent[i] = [0, "Attaques impitoyables", 2, 2, 1]; i++;
talent[i] = [0, "Malice", 5, 3, 1]; i++;
talent[i] = [0, "Némésis", 3, 1, 2]; i++; 
talent[i] = [0, "Eclaboussure de sang", 2, 2, 2]; i++;
talent[i] = [0, "Blessures transperçantes", 3, 4, 2]; i++;
talent[i] = [0, "Vigueur", 1, 1, 3]; i++;
talent[i] = [0, "Exposer l'armure amélioré", 2, 2, 3]; i++;
talent[i] = [0, "Mortalité", 5, 3, 3, [getTalentID("Malice"),5]]; i++;
talent[i] = [0, "Poisons abominables", 3, 2, 4]; i++;
talent[i] = [0, "Poisons améliorés", 5, 3, 4]; i++;
talent[i] = [0, "Pied léger", 2, 1, 5]; i++;
talent[i] = [0, "Sang froid", 1, 2, 5]; i++;
talent[i] = [0, "Aiguillon perfide amélioré", 3, 3, 5]; i++;
talent[i] = [0, "Rétablissement rapide", 2, 4, 5]; i++;
talent[i] = [0, "Scelle le destin", 5, 2, 6, [getTalentID("Sang froid"),1]]; i++;
talent[i] = [0, "Meurtre", 2, 3, 6]; i++;
talent[i] = [0, "Breuvage mortel", 2, 1, 7]; i++;
talent[i] = [0, "Outrance meurtrière", 1, 2, 7]; i++;
talent[i] = [0, "Anesthésie nerveuse", 3, 3, 7]; i++;
talent[i] = [0, "Attaques focalisées", 3, 1, 8]; i++;
talent[i] = [0, "Découverte des faiblesses", 3, 3, 8]; i++;
talent[i] = [0, "Maître empoisonneur", 3, 1, 9]; i++;
talent[i] = [0, "Estropier", 1, 2, 9, [getTalentID("Outrance meurtrière"),1]]; i++;
talent[i] = [0, "Retour à l'envoyeur", 3, 3, 9]; i++;
talent[i] = [0, "Tailler dans le vif", 5, 2, 10]; i++;
talent[i] = [0, "Soif de sang", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

talent[i] = [1, "Suriner amélioré", 3, 1, 1]; i++;
talent[i] = [1, "Attaque pernicieuse améliorée", 2, 2, 1]; i++;
talent[i] = [1, "Spécialisation Ambidextrie", 5, 3, 1]; i++;
talent[i] = [1, "Débiter amélioré", 2, 1, 2]; i++;
talent[i] = [1, "Déviation", 3, 2, 2]; i++;
talent[i] = [1, "Précision", 5, 4, 2]; i++;
talent[i] = [1, "Endurcissement", 2, 1, 3]; i++;
talent[i] = [1, "Riposte", 1, 2, 3, [getTalentID("Déviation"),3]]; i++;
talent[i] = [1, "Combat rapproché", 5, 3, 3, [getTalentID("Spécialisation Ambidextrie"),5]]; i++;
talent[i] = [1, "Coup de pied amélioré", 2, 1, 4]; i++;
talent[i] = [1, "Sprint amélioré", 2, 2, 4]; i++;
talent[i] = [1, "Réflexes éclairs", 5, 3, 4]; i++;
talent[i] = [1, "Agressivité", 5, 4, 4]; i++;
talent[i] = [1, "Spécialisation Masse", 5, 1, 5]; i++;
talent[i] = [1, "Déluge de lames", 1, 2, 5]; i++;
talent[i] = [1, "Spécialisation Epée", 5, 3, 5]; i++;
talent[i] = [1, "Expertise en armes", 2, 2, 6, [getTalentID("Déluge de lames"),1]]; i++;
talent[i] = [1, "Tournoiement de lames", 2, 3, 6]; i++;
talent[i] = [1, "Vitalité", 3, 1, 7]; i++;
talent[i] = [1, "Poussée d'adrénaline", 1, 2, 7]; i++;
talent[i] = [1, "Nerfs d'acier", 2, 3, 7]; i++;
talent[i] = [1, "Spécialisation Armes de jet", 2, 1, 8]; i++;
talent[i] = [1, "Toute-puissance de combat", 5, 3, 8]; i++;
talent[i] = [1, "Avantage déloyal", 2, 1, 9]; i++;
talent[i] = [1, "Attaques surprises", 1, 2, 9, [getTalentID("Poussée d'adrénaline"),1]]; i++;
talent[i] = [1, "Combat sauvage", 2, 3, 9]; i++;
talent[i] = [1, "Attaquer les faibles", 5, 2, 10]; i++;
talent[i] = [1, "Série meurtrière", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//shadow talents
talent[i] = [2, "Frappes implacables", 5, 1, 1]; i++;
talent[i] = [2, "Maître des illusions", 3, 2, 1]; i++;
talent[i] = [2, "Opportunité", 2, 3, 1]; i++;
talent[i] = [2, "Passe-passe", 2, 1, 2]; i++;
talent[i] = [2, "Coup tordu", 2, 2, 2]; i++;
talent[i] = [2, "Dissimulation", 3, 3, 2]; i++;
talent[i] = [2, "Insaisissable", 2, 1, 3]; i++;
talent[i] = [2, "Frappe fantomatique", 1, 2, 3]; i++;
talent[i] = [2, "Lames dentelées", 3, 3, 3]; i++;
talent[i] = [2, "Préparatifs", 3, 1, 4]; i++;
talent[i] = [2, "Initiative", 3, 2, 4]; i++;
talent[i] = [2, "Embuscade améliorée", 2, 3, 4]; i++;
talent[i] = [2, "Sens amplifiés", 2, 1, 5]; i++;
talent[i] = [2, "Préparation", 1, 2, 5]; i++;
talent[i] = [2, "Coups fourrés", 2, 3, 5]; i++;
talent[i] = [2, "Hémorragie", 1, 4, 5, [getTalentID("Lames dentelées"),3]]; i++;
talent[i] = [2, "Maître de la discrétion", 3, 1, 6]; i++;
talent[i] = [2, "Meurtrier", 5, 3, 6]; i++;
talent[i] = [2, "Linceul d'ombres", 3, 1, 7]; i++;
talent[i] = [2, "Préméditation", 1, 2, 7, [getTalentID("Préparation"),1]]; i++;
talent[i] = [2, "Trompe-la-mort", 3, 3, 7]; i++;
talent[i] = [2, "Vocation pernicieuse", 5, 2, 8, [getTalentID("Préméditation"),1]]; i++;
talent[i] = [2, "Assaillir", 2, 3, 8]; i++;
talent[i] = [2, "Honneur des voleurs", 3, 1, 9]; i++;
talent[i] = [2, "Pas de l'ombre", 1, 2, 9]; i++;
talent[i] = [2, "Tours pendables", 2, 3, 9]; i++;
talent[i] = [2, "Ombres meurtrières", 5, 2, 10]; i++;
talent[i] = [2, "Danse de l'ombre", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

i = 0;


//Assassination Talents Begin

//Improved Eviscerate - Assassination
rank[i] = [
"Augmente les points de dégâts infligés par votre technique Eviscération de 7%.",
"Augmente les points de dégâts infligés par votre technique Eviscération de 14%.",
"Augmente les points de dégâts infligés par votre technique Eviscération de 20%."
		];
i++;		
		
//Remorseless Attacks - Assassination - TALENT DIFFERENT - description
rank[i] = [
"Lorsque vous tuez un adversaire qui vous fait gagner de l'expérience ou de l'honneur, vous avez 20% de chances d'infliger un coup critique lors de votre prochaine attaque avec Attaque pernicieuse, Hémorragie, Attaque sournoise, Estropier, Embuscade ou Frappe fantomatique. Dure 20 sec.",
"Lorsque vous tuez un adversaire qui vous fait gagner de l'expérience ou de l'honneur, vous avez 40% de chances d'infliger un coup critique lors de votre prochaine attaque avec Attaque pernicieuse, Hémorragie, Attaque sournoise, Estropier, Embuscade ou Frappe fantomatique. Dure 20 sec."
		];
i++;		

//Malice - Assassination	
rank[i] = [
"Augmente vos chances d'infliger un coup critique de 1%.",
"Augmente vos chances d'infliger un coup critique de 2%.",
"Augmente vos chances d'infliger un coup critique de 3%.",
"Augmente vos chances d'infliger un coup critique de 4%.",
"Augmente vos chances d'infliger un coup critique de 5%."
		];
i++;		
		
//Ruthlessness - Assassination	
rank[i] = [
"Confère à vos coups de grâce en mêlée 20% de chances d'ajouter un point de combo à votre cible.",
"Confère à vos coups de grâce en mêlée 40% de chances d'ajouter un point de combo à votre cible.",
"Confère à vos coups de grâce en mêlée 60% de chances d'ajouter un point de combo à votre cible."
		];
i++;		

//Blood Spatter - Assassination
rank[i] = [
"Augmente les points de dégâts infligés par vos techniques Garrot et Rupture de 15%.",
"Augmente les points de dégâts infligés par vos techniques Garrot et Rupture de 30%."
		];
i++;


//Puncturing Wounds - Assassination
rank[i] = [
"Augmente vos chances d'infliger un coup critique avec la technique Attaque sournoise de 10%, et vos chances d'infliger un coup critique avec la technique Estropier de 5%.",
"Augmente vos chances d'infliger un coup critique avec la technique Attaque sournoise de 20%, et vos chances d'infliger un coup critique avec la technique Estropier de 10%.",
"Augmente vos chances d'infliger un coup critique avec la technique Attaque sournoise de 30%, et vos chances d'infliger un coup critique avec la technique Estropier de 15%."
		];
i++;	

//Vigor - Assassination
rank[i] = [
"Augmente votre maximum d'Energie de 10."
		];
i++;	
		

//Improved Expose Armor - Assassination	
rank[i] = [ 
"Réduit le coût en énergie de votre technique Exposer l'armure de 5.",
"Réduit le coût en énergie de votre technique Exposer l'armure de 10."
		];
i++;		

//Lethality - Assassination
rank[i] = [
"Augmente de 6% le bonus aux dégâts des coups critiques de toutes vos actions de combo.",
"Augmente de 12% le bonus aux dégâts des coups critiques de toutes vos actions de combo.",
"Augmente de 18% le bonus aux dégâts des coups critiques de toutes vos actions de combo.",
"Augmente de 24% le bonus aux dégâts des coups critiques de toutes vos actions de combo.",
"Augmente de 30% le bonus aux dégâts des coups critiques de toutes vos actions de combo.",		
	];
i++;		

//Vile Poisons - Assassination
rank[i] = [
"Augmente de 7% les points de dégâts infligés par vos poisons et votre technique Envenimer et donne à vos poisons 10% de chances supplémentaires de résister aux effets de dissipation.",
"Augmente de 14% les points de dégâts infligés par vos poisons et votre technique Envenimer et donne à vos poisons 20% de chances supplémentaires de résister aux effets de dissipation.",
"Augmente de 20% les points de dégâts infligés par vos poisons et votre technique Envenimer et donne à vos poisons 30% de chances supplémentaires de résister aux effets de dissipation."

		];
i++;		

//Improved Poisons - Assassination	
rank[i] = [
"Augmente vos chances d'appliquer Poison instantané et Poison mortel sur votre cible de 2%.",
"Augmente vos chances d'appliquer Poison instantané et Poison mortel sur votre cible de 4%.",
"Augmente vos chances d'appliquer Poison instantané et Poison mortel sur votre cible de 6%.",
"Augmente vos chances d'appliquer Poison instantané et Poison mortel sur votre cible de 8%.",
"Augmente vos chances d'appliquer Poison instantané et Poison mortel sur votre cible de 10%."
		];
i++;		

//Fleet Footed - Assassination	
rank[i] = [
"Réduit de 15% la durée de tous les effets affectant le mouvement et augmente de 8% votre vitesse de déplacement. Ne se cumule pas avec les autres effets qui augmentent la vitesse de déplacement.",
"Réduit de 30% la durée de tous les effets affectant le mouvement et augmente de 15% votre vitesse de déplacement. Ne se cumule pas avec les autres effets qui augmentent la vitesse de déplacement."
		];
i++;

//Cold Blood - Assassination
rank[i] = [
			"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsque vous déclenchez ce talent, vos chances d'infliger un coup critique avec votre prochaine technique offensive augmentent de 100%."
		];
i++;		

//Improved Kidney Shot - Assassination
rank[i] = [
"Lorsqu'elle est affectée par votre technique Aiguillon perfide, la cible subit 3% de points de dégâts supplémentaires de toutes les sources.",
"Lorsqu'elle est affectée par votre technique Aiguillon perfide, la cible subit 6% de points de dégâts supplémentaires de toutes les sources.",
"Lorsqu'elle est affectée par votre technique Aiguillon perfide, la cible subit 9% de points de dégâts supplémentaires de toutes les sources."
		];
i++;		

//Quick Recovery - Assassination
rank[i] = [
"Augmente tous les effets de soins utilisés sur vous de 10%. De plus, vos coups de grâce coûtent 40% d’Energie de moins s’ils ne touchent pas la cible.",
"Augmente tous les effets de soins utilisés sur vous de 20%. De plus, vos coups de grâce coûtent 80% d’Energie de moins s’ils ne touchent pas la cible."
		];
i++;		

//Seal Fate - Assassination		
rank[i] = [
"Les coups critiques infligés par les techniques qui ajoutent un point de combo ont 20% de chances de vous faire gagner un point de combo supplémentaire.",
"Les coups critiques infligés par les techniques qui ajoutent un point de combo ont 40% de chances de vous faire gagner un point de combo supplémentaire.",
"Les coups critiques infligés par les techniques qui ajoutent un point de combo ont 60% de chances de vous faire gagner un point de combo supplémentaire.",
"Les coups critiques infligés par les techniques qui ajoutent un point de combo ont 80% de chances de vous faire gagner un point de combo supplémentaire.",
"Les coups critiques infligés par les techniques qui ajoutent un point de combo ont 100% de chances de vous faire gagner un point de combo supplémentaire."
		];
i++;

//Murder - Assassination - TALENT DIFFERENT - values changed
rank[i] = [
"Augmente tous les dégâts infligés aux humanoïdes, géants, bêtes et draconiens de 2%",
"Augmente tous les dégâts infligés aux humanoïdes, géants, bêtes et draconiens de 4%"
		];
i++;		



//Deadly Brew - Assassination
rank[i] = [
"Quand vous appliquez Poison instantané, douloureux ou de distraction mentale à une cible, vous avez 50% de chances d'appliquer Poison affaiblissant.",
"Quand vous appliquez Poison instantané, douloureux ou de distraction mentale à une cible, vous avez 100% de chances d'appliquer Poison affaiblissant."
		];
i++;	

//Overkill - Assassination
rank[i] = [
"Les techniques utilisées lorsque vous êtes camouflé et pendant 6 secondes après la fin du camouflage coûtent 10 points d'énergie en moins.",
		];
i++;	
	

//Deadened Nerves - Assassination - TALENT DIFFERENT - description changed
rank[i] = [
"Réduit tous les dégâts subis de 2%.",
"Réduit tous les dégâts subis de 4%.",
"Réduit tous les dégâts subis de 6%."
		];
i++;	

//Focused Attacks - Assassination
rank[i] = [
"Vos frappes critiques en mêlée ont 33% de chances de vous donner 2 points d'énergie.",
"Vos frappes critiques en mêlée ont 66% de chances de vous donner 2 points d'énergie.",
"Vos frappes critiques en mêlée ont 100% de chances de vous donner 2 points d'énergie."
		];
i++;



//Find Weakness - Assassination
rank[i] = [
"Dégâts des techniques offensives augmentés de 2%.",
"Dégâts des techniques offensives augmentés de 4%.",
"Dégâts des techniques offensives augmentés de 6%."
		];
i++;	

//Master Poisoner - Assassination
rank[i] = [
"Augmente de 1% les chances de coup critique de toutes les attaques contre une cible que vous avez empoisonnée et réduit de 17% la durée de tous les effets de poison appliqués sur vous.",
"Augmente de 2% les chances de coup critique de toutes les attaques contre une cible que vous avez empoisonnée et réduit de 34% la durée de tous les effets de poison appliqués sur vous.",
"Augmente de 3% les chances de coup critique de toutes les attaques contre une cible que vous avez empoisonnée et réduit de 50% la durée de tous les effets de poison appliqués sur vous."
		];
i++;

//Mutilate - Assassination
rank[i] = [
			"<span style=text-align:left;float:left;>60 points d'énergie</span><span style=text-align:right;float:right;>Allonge</span><br>Instantané<br>Requiert une dague<br>Attaque instantanément avec les deux armes et inflige 44 points de dégâts supplémentaires avec chacune d'elles. Les dégâts sont augmentés de 50% contre les cibles empoisonnées. Vous gagnez 2 points de combo.<br><br>\
			&nbsp;Talent à plusieurs rangs"
		];
i++;	

//Turn the Tables - Assassination
rank[i] = [
"Chaque fois qu'un membre de votre groupe ou raid bloque, esquive ou pare une attaque, vos chances de critique avec les actions de combo sont augmentées de 2% pendant 8 sec.",
"Chaque fois qu'un membre de votre groupe ou raid bloque, esquive ou pare une attaque, vos chances de critique avec les actions de combo sont augmentées de 4% pendant 8 sec.",
"Chaque fois qu'un membre de votre groupe ou raid bloque, esquive ou pare une attaque, vos chances de critique avec les actions de combo sont augmentées de 6% pendant 8 sec."
		];
i++;	

//Cut to the Chase - Assassination - TALENT DIFFERENT - description
rank[i] = [
"Vos coups critiques réussis avec Eviscération et Envenimer ont 20% de chances de réinitialiser la durée de Débiter à son maximum de 5 points de combo.",
"Vos coups critiques réussis avec Eviscération et Envenimer ont 40% de chances de réinitialiser la durée de Débiter à son maximum de 5 points de combo.",
"Vos coups critiques réussis avec Eviscération et Envenimer ont 60% de chances de réinitialiser la durée de Débiter à son maximum de 5 points de combo.",
"Vos coups critiques réussis avec Eviscération et Envenimer ont 80% de chances de réinitialiser la durée de Débiter à son maximum de 5 points de combo.",
"Vos coups critiques réussis avec Eviscération et Envenimer ont 100% de chances de réinitialiser la durée de Débiter à son maximum de 5 points de combo."
		];
i++;

//Hunger For Blood - Assassination - TALENT DIFFERENT - description and duration
rank[i] = [
			"<span style=text-align:left;float:left;>30 points d'énergie</span><br><span style=text-align:left;float:left;>Instantané</span><br>Vous fait enrager, ce qui augmente tous les dégâts causés de 3%. Si vous l'utilisez pendant qu'un effet de saignement vous affecte, elle tente de l'annuler et vous rend 15 points d'énergie. Cet effet est cumulable jusqu'à 3 fois. Dure 30 sec."
		];
i++;


//COMBAT TREE------------------------------------------------------------------------------
//Improved Gouge - Combat
rank[i] = [
"Augmente la durée de l'effet de votre technique Suriner de 0,5 sec.",
"Augmente la durée de l'effet de votre technique Suriner de 1 sec.",
"Augmente la durée de l'effet de votre technique Suriner de 1,5 sec."
		];
i++;		

//Improved Sinister Strike - Combat 
rank[i] = [
"Réduit de 3 le coût en énergie de votre technique Attaque pernicieuse.",
"Réduit de 5 le coût en énergie de votre technique Attaque pernicieuse."
		];
i++;		

//Dual Wield Specialization - Combat  
rank[i] = [
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 10%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 20%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 30%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 40%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 50%."
		];
i++;	

		

//Improved Slice and Dice - Combat
rank[i] = [
"Augmente la durée de votre technique Débiter de 25%.",
"Augmente la durée de votre technique Débiter de 50%."

		];
i++;		
	
//Deflection - Combat	
rank[i] = [
"Augmente vos chances de Parer de 2%.",
"Augmente vos chances de Parer de 4%.",
"Augmente vos chances de Parer de 6%."
		];
i++;		

//Precision - Combat 
rank[i] = [
"Augmente vos chances de toucher avec les armes et les attaques empoisonnées de 1%.",
"Augmente vos chances de toucher avec les armes et les attaques empoisonnées de 2%.",
"Augmente vos chances de toucher avec les armes et les attaques empoisonnées de 3%.",
"Augmente vos chances de toucher avec les armes et les attaques empoisonnées de 4%.",
"Augmente vos chances de toucher avec les armes et les attaques empoisonnées de 5%."
		];
i++;		

//Endurance - Combat
rank[i] = [
"Réduit le temps de recharge de vos techniques Sprint et Evasion de 30 sec et augmente votre total d'Endurance de 2%.",
"Réduit le temps de recharge de vos techniques Sprint et Evasion de 60 sec et augmente votre total d'Endurance de 4%."
		];
i++;		

//Riposte - Combat
rank[i] = [
			"<span style=text-align:left;float:left;>10 points d'énergie</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>Une attaque disponible après avoir paré une attaque de l'adversaire. Elle inflige 150% des dégâts de l'arme et réduit la vitesse d'attaque en mêlée de la cible de 20% pendant 30 sec. Vous gagnez 1 points de combo."
		];
i++;	

	
//Close Quarters Combat - Combat  
rank[i] = [
"Augmente vos chances d'infliger un coup critique avec les Dagues et les Armes de pugilat de 1%.",
"Augmente vos chances d'infliger un coup critique avec les Dagues et les Armes de pugilat de 2%.",
"Augmente vos chances d'infliger un coup critique avec les Dagues et les Armes de pugilat de 3%.",
"Augmente vos chances d'infliger un coup critique avec les Dagues et les Armes de pugilat de 4%.",
"Augmente vos chances d'infliger un coup critique avec les Dagues et les Armes de pugilat de 5%."
];
i++;	




//Improved Kick - Combat 
rank[i] = [
"Confère à votre technique Coup de pied 50% de chances de rendre la cible muette pendant 2 sec.",
"Confère à votre technique Coup de pied 100% de chances de rendre la cible muette pendant 2 sec."
		];
i++;		

//Improved Sprint - Combat
rank[i] = [
"Confère 50% de chances d'annuler tous les effets affectant le mouvement lorsque vous activez votre technique Sprint.",
"Confère 100% de chances d'annuler tous les effets affectant le mouvement lorsque vous activez votre technique Sprint."
		];
i++;

//Lightning Reflexes - Combat
rank[i] = [
"Augmente vos chances d'esquiver une attaque de 1%.",
"Augmente vos chances d'esquiver une attaque de 2%.",
"Augmente vos chances d'esquiver une attaque de 3%.",
"Augmente vos chances d'esquiver une attaque de 4%.",
"Augmente vos chances d'esquiver une attaque de 5%."
		];
i++;

//Aggression - Combat 
rank[i]=[
"Augmente de 3% les points de dégâts infligés par vos techniques Attaque pernicieuse, Attaque sournoise et Eviscération.",
"Augmente de 6% les points de dégâts infligés par vos techniques Attaque pernicieuse, Attaque sournoise et Eviscération.",
"Augmente de 9% les points de dégâts infligés par vos techniques Attaque pernicieuse, Attaque sournoise et Eviscération.",
"Augmente de 12% les points de dégâts infligés par vos techniques Attaque pernicieuse, Attaque sournoise et Eviscération.",
"Augmente de 15% les points de dégâts infligés par vos techniques Attaque pernicieuse, Attaque sournoise et Eviscération."
		];
i++;

//Mace Specialization - Combat 
rank[i] = [
"Vos attaques avec les masses ignorent jusqu'à 3% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 6% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 9% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 12% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 15% de l'armure de votre adversaire.",
];
i++;
		
//Blade Flurry - Combat  
rank[i]=[
			"25 points d'énergie<br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Augmente votre vitesse d'attaque de 20%. De plus, vos attaques frappent un adversaire proche supplémentaire. Dure 15 sec."
			];
i++;			
			
//Sword Specialization - Combat
rank[i]=[
"Vous confère 1% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée.",
"Vous confère 2% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée.",
"Vous confère 3% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée.",
"Vous confère 4% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée.",
"Vous confère 5% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée."
		];
i++;

	
		


//Weapon Expertise - Combat 
rank[i]=[
"Augmente votre expertise de 5.",
"Augmente votre expertise de 10."
		];
i++;		

//Blade Twisting - Combat 
rank[i]=[
"Augmente de 5% les dégâts infligés par Attaque pernicieuse et Attaque sournoise. De plus, vos attaques en mêlée qui infligent des dégâts ont 10%  de chances d'hébéter la cible pendant 4 sec.",
"Augmente de 10% les dégâts infligés par Attaque pernicieuse et Attaque sournoise. De plus, vos attaques en mêlée qui infligent des dégâts ont 10%  de chances d'hébéter la cible pendant 8 sec."
];
i++;	

//Vitality - Combat 
rank[i]=[
"Augmente votre taux de régénération d'énergie de 8%.",
"Augmente votre taux de régénération d'énergie de 16%.",
"Augmente votre taux de régénération d'énergie de 25%."
		];
i++;
		
//Adrenaline Rush - Combat  
rank[i]=[
			"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>5 min de recharge</span><br>Augmente la vitesse de régénération de votre Energie de 100% pendant 15 sec."
		];
i++;		

//Nerves of Steel - Combat 
rank[i]=[
"Réduit de 15% les dégâts subis lorsque vous êtes affecté par des effets d'étourdissement et de peur.",
"Réduit de 30% les dégâts subis lorsque vous êtes affecté par des effets d'étourdissement et de peur."
		];
i++;

//Throwing Specialization - Combat 
rank[i]=[
"Augmente la portée de Lancer et Lancer mortel de 2 mètres et confère à vos techniques Lancer mortel et Eventail de couteaux 50% de chances d'interrompre la cible pendant 3 sec.",
"Augmente la portée de Lancer et Lancer mortel de 4 mètres et confère à vos techniques Lancer mortel et Eventail de couteaux 100% de chances d'interrompre la cible pendant 3 sec."
		];
i++;

//Combat Potency - Combat 
rank[i]=[
"Confère à vos attaques de mêlée avec la main gauche 20% de chances de générer 3 points d'énergie.",
"Confère à vos attaques de mêlée avec la main gauche 20% de chances de générer 6 points d'énergie.",
"Confère à vos attaques de mêlée avec la main gauche 20% de chances de générer 9 points d'énergie.",
"Confère à vos attaques de mêlée avec la main gauche 20% de chances de générer 12 points d'énergie.",
"Confère à vos attaques de mêlée avec la main gauche 20% de chances de générer 15 points d'énergie."
		];
i++;

//Unfair Advantage - Combat 
rank[i]=[
"Chaque fois que vous esquivez une attaque, vous bénéficiez d'un Avantage déloyal, qui vous permet de contre-attaquer en infligeant 50% des dégâts de votre arme en main droite. Cela ne peut se produire plus d'une fois par seconde.",
"Chaque fois que vous esquivez une attaque, vous bénéficiez d'un Avantage déloyal, qui vous permet de contre-attaquer en infligeant 100% des dégâts de votre arme en main droite. Cela ne peut se produire plus d'une fois par seconde."
		];
i++;

//Surprise Attack - Combat
rank[i] = [
"Vos coups de grâce ne peuvent plus être esquivés et les dégâts de vos techniques Attaque pernicieuse, Attaque sournoise, Kriss, Hémorragie et Suriner sont augmentés de 10%."
		];
i++;		

//Savage Combat - Combat
rank[i]=[
"Augmente votre total de puissance d'attaque de 2% et tous les dégâts physiques infligés aux ennemis que vous avez empoisonnés sont augmentés de 1%.",
"Augmente votre total de puissance d'attaque de 4% et tous les dégâts physiques infligés aux ennemis que vous avez empoisonnés sont augmentés de 2%."
		];
i++;


//Prey on the Weak - Combat 
rank[i]=[
"Les dégâts de vos coups critiques sont augmentés de 4% quand la cible a moins de points de vie que vous (en pourcentage du total de points de vie).",
"Les dégâts de vos coups critiques sont augmentés de 8% quand la cible a moins de points de vie que vous (en pourcentage du total de points de vie).",
"Les dégâts de vos coups critiques sont augmentés de 12% quand la cible a moins de points de vie que vous (en pourcentage du total de points de vie).",
"Les dégâts de vos coups critiques sont augmentés de 16% quand la cible a moins de points de vie que vous (en pourcentage du total de points de vie).",
"Les dégâts de vos coups critiques sont augmentés de 20% quand la cible a moins de points de vie que vous (en pourcentage du total de points de vie)."
		];
i++;

//Killing Spree - Combat
rank[i]=[
			"<span style=text-align:left;float:left;>10 m de portée</span><br/><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>2 min de recharge</span><br><span style=text-align:left;float:left;>Requiert une arme de mêlée</span><br/>Marche à travers les ombres d'ennemi en ennemi se trouvant à moins de 10 mètres et attaque un ennemi toutes les 0,5 sec. avec les deux armes jusqu'à ce que 5 assauts aient été effectués. Peut toucher la même cible plusieurs fois. Ne peut pas toucher les cibles invisibles ou camouflées."
		];
i++;	


//SUBTLETY------------------------------------------------------------------------------------->	

//Relentless Strikes - Subtlety
rank[i]=[
"Vos coups de grâce ont 4% de chances par point de combo de vous rendre 25 points d'énergie.",
"Vos coups de grâce ont 8% de chances par point de combo de vous rendre 25 points d'énergie.",
"Vos coups de grâce ont 12% de chances par point de combo de vous rendre 25 points d'énergie.",
"Vos coups de grâce ont 16% de chances par point de combo de vous rendre 25 points d'énergie.",
"Vos coups de grâce ont 20% de chances par point de combo de vous rendre 25 points d'énergie."
		];
i++;		





//Master of Deception - Subtlety
rank[i]=[
"Réduit les chances de vos ennemis de vous détecter lorsque vous êtes en camouflage.",
"Réduit les chances de vos ennemis de vous détecter lorsque vous êtes en camouflage. Plus efficace que Maître des illusions (Rang 1).",
"Réduit les chances de vos ennemis de vous détecter lorsque vous êtes en camouflage. Plus efficace que Maître des illusions (Rang 2)."
		];
i++;		

//Opportunity - Subtlety
rank[i]=[
"Augmente de 10% les dégâts infligés avec vos techniques Attaque sournoise, Estropier, Garrot et Embuscade.",
"Augmente de 20% les dégâts infligés avec vos techniques Attaque sournoise, Estropier, Garrot et Embuscade."
		];
i++;		
		
//Sleight of Hand - Subtlety 
rank[i]=[
"Réduit de 1% la probabilité que vous soyez touché par un coup critique infligé par une attaque en mêlée ou à distance, et augmente la réduction du niveau de menace de votre technique Feinte de 10%.",
"Réduit de 2% la probabilité que vous soyez touché par un coup critique infligé par une attaque en mêlée ou à distance, et augmente la réduction du niveau de menace de votre technique Feinte de 20%."
		];
i++;				
		
//Dirty Tricks - Subtlety
rank[i]=[
"Augmente la portée de vos techniques Cécité et Assommer de 2 mètres et réduit leur coût en énergie de 25%.",
"Augmente la portée de vos techniques Cécité et Assommer de 5 mètres et réduit leur coût en énergie de 50%."

		];
i++;		

//Camouflage - Subtlety 
rank[i]=[
"Augmente de 5% votre vitesse de déplacement lorsque vous êtes camouflé et réduit de 2 sec. le temps de recharge de votre technique Camouflage.",
"Augmente de 10% votre vitesse de déplacement lorsque vous êtes camouflé et réduit de 4 sec. le temps de recharge de votre technique Camouflage.",
"Augmente de 15% votre vitesse de déplacement lorsque vous êtes camouflé et réduit de 6 sec. le temps de recharge de votre technique Camouflage."
		];
i++;	

//Elusiveness - Subtlety 
rank[i]=[
"Réduit le temps de recharge de vos techniques Disparition et Cécité de 30 sec. et de votre technique Cape d'ombre de 15 sec.",
"Réduit le temps de recharge de vos techniques Disparition et Cécité de 60 sec. et de votre technique Cape d'ombre de 30 sec."
		];
i++;		
		
		
	

		
//Ghostly Strike - Subtlety - TALENT DIFFERENT - range changed
rank[i]=[
			"<span style=text-align:left;float:left;>40 points d'énergie</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>20 sec de recharge</span><br><span style='text-align:left;float:left;'>Requiert une arme de mêlée</span><br>Une attaque qui inflige 125% des dégâts de l'arme et qui augmente vos chances d'esquiver de 15% pendant 7 sec. Vous gagnez 1 points de combo."
		];
i++;		
		
//Serrated Blades - Subtlety
rank[i]=[
"Vos attaques ignorent 213 points de l'Armure de votre cible. Augmente les points de dégâts infligés par votre technique Rupture de 10%. Le nombre de points d'Armure réduits augmente avec votre niveau.",
"Vos attaques ignorent 427 points de l'Armure de votre cible. Augmente les points de dégâts infligés par votre technique Rupture de 20%. Le nombre de points d'Armure réduits augmente avec votre niveau.",
"Vos attaques ignorent 640 points de l'Armure de votre cible. Augmente les points de dégâts infligés par votre technique Rupture de 30%. Le nombre de points d'Armure réduits augmente avec votre niveau."
		];
i++;
		
//Setup - Subtlety 
rank[i]=[
"Vous confère 33% de chances d'ajouter un point de combo à votre cible après avoir esquivé son attaque ou entièrement résisté à un de ses sorts. Ne peut pas se produire plus d'une fois par seconde.",
"Vous confère 66% de chances d'ajouter un point de combo à votre cible après avoir esquivé son attaque ou entièrement résisté à un de ses sorts. Ne peut pas se produire plus d'une fois par seconde.",
"Vous confère 100% de chances d'ajouter un point de combo à votre cible après avoir esquivé son attaque ou entièrement résisté à un de ses sorts. Ne peut pas se produire plus d'une fois par seconde."
		];
i++;		
		
//Initiative - Subtlety 
rank[i]=[
"Vous confère 33% de chances de gagner un point de combo supplémentaire lorsque vous utilisez les techniques Embuscade, Garrot et Coup bas.",
"Vous confère 66% de chances de gagner un point de combo supplémentaire lorsque vous utilisez les techniques Embuscade, Garrot et Coup bas.",
"Vous confère 100% de chances de gagner un point de combo supplémentaire lorsque vous utilisez les techniques Embuscade, Garrot et Coup bas."
		];
i++;

//Improved Ambush - Subtlety
rank[i]=[
"Augmente les chances d'infliger un coup critique avec votre technique Embuscade de 25%.",
"Augmente les chances d'infliger un coup critique avec votre technique Embuscade de 50%."
		];
i++;

				
		
//Heightened Senses - Subtlety
rank[i]=[
"Augmente votre détection du camouflage et réduit de 2% la probabilité que vous soyez touché par les sorts et les attaques à distance.",
"Augmente votre détection du camouflage et réduit de 4% la probabilité que vous soyez touché par les sorts et les attaques à distance. Plus efficace que Sens amplifiés (Rang 1)."
		];
i++;			
		
//Preparation - Subtlety 
rank[i]=[
			"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>10 min de recharge</span><br>Lorsque vous la déclenchez, cette technique met immédiatement fin au temps de recharge de vos techniques Evasion, Sprint, Disparition, Sang froid et Pas de l'ombre."
		];
i++;		
	
//Dirty Deeds - Subtlety 
rank[i]=[
			"Réduit de 10 le coût en énergie de vos techniques Coup bas et Garrot. De plus, vos techniques spéciales infligent 10% de dégâts supplémentaires aux cibles qui possèdent moins de 35% de leurs points de vie.",
			"Réduit de 20 le coût en énergie de vos techniques Coup bas et Garrot. De plus, vos techniques spéciales infligent 20% de dégâts supplémentaires aux cibles qui possèdent moins de 35% de leurs points de vie."
		];
i++;	
		
//Hemorrhage - Subtlety 
rank[i]=[
			"<span style=text-align:left;float:left;>35 points d'énergie</span><span style=text-align:right;float:right;>Allonge</span><br>Instantané<br>Requiert une arme de mêlée<br>Une frappe instantanée qui inflige 110% des dégâts de l'arme à l'adversaire et provoque une hémorragie. Augmente tous les dégâts physiques infligés à la cible de 13 au maximum. Utilisable 10 fois ou pendant 15 sec. Vous gagnez 1 points de combo.<br><br>\
			&nbsp;Talent à plusieurs rangs"
		];
i++;		
		
//Master of Subtlety - Subtlety
rank[i]=[
"Les attaques effectuées alors que vous êtes camouflé et pendant les 6 secondes suivant l'annulation du camouflage infligent 4% de dégâts supplémentaires.",
"Les attaques effectuées alors que vous êtes camouflé et pendant les 6 secondes suivant l'annulation du camouflage infligent 7% de dégâts supplémentaires.",
"Les attaques effectuées alors que vous êtes camouflé et pendant les 6 secondes suivant l'annulation du camouflage infligent 10% de dégâts supplémentaires."		];
i++;				
		
		
//Deadliness - Subtlety
rank[i]=[
"Augmente votre puissance d'attaque de 2%.",
"Augmente votre puissance d'attaque de 4%.",
"Augmente votre puissance d'attaque de 6%.",
"Augmente votre puissance d'attaque de 8%.",
"Augmente votre puissance d'attaque de 10%."
		];
i++;		
		
//Enveloping Shadows - Subtlety
rank[i]=[
"Réduit les dégâts que vous infligent les attaques à zone d'effet de 10%.",
"Réduit les dégâts que vous infligent les attaques à zone d'effet de 20%.",
"Réduit les dégâts que vous infligent les attaques à zone d'effet de 30%."
		];
i++;				
	
//Premeditation - Subtlety - TALENT DIFFERENT - cooldown
rank[i]=[
			"30 m de portée<br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>20 sec de recharge</span><br><span style=color:eb0504>Requiert Camouflage</span><br>Lorsqu'elle est utilisée, cette technique ajoute 2 points de combo à la cible. Vous devez ajouter à ces points de combo ou les utiliser avant 20 sec sinon les points de combo sont perdus."
		];
i++;	
	
//Cheat Death - Subtlety
rank[i]=[
"Vous avez 33% de chances qu'une attaque infligeant des dégâts qui devrait normalement vous tuer réduise à 10% votre vie maximale. De plus, réduit tous les dégâts subis jusqu'à 90% pendant 3 sec (modifié par résilience). Cet effet ne peut se produire plus d'une fois par minute.",
"Vous avez 66% de chances qu'une attaque infligeant des dégâts qui devrait normalement vous tuer réduise à 10% votre vie maximale. De plus, réduit tous les dégâts subis jusqu'à 90% pendant 3 sec (modifié par résilience). Cet effet ne peut se produire plus d'une fois par minute.",
"Vous avez 100% de chances qu'une attaque infligeant des dégâts qui devrait normalement vous tuer réduise à 10% votre vie maximale. De plus, réduit tous les dégâts subis jusqu'à 90% pendant 3 sec (modifié par résilience). Cet effet ne peut se produire plus d'une fois par minute."
		];
i++;	
		
//Sinister Calling - Subtlety
rank[i]=[
"Augmente votre total d'Agilité de 3% et augmente de 1% supplémentaires le bonus aux dégâts d'Attaque sournoise et Hémorragie.",
"Augmente votre total d'Agilité de 6% et augmente de 2% supplémentaires le bonus aux dégâts d'Attaque sournoise et Hémorragie.",
"Augmente votre total d'Agilité de 9% et augmente de 3% supplémentaires le bonus aux dégâts d'Attaque sournoise et Hémorragie.",
"Augmente votre total d'Agilité de 12% et augmente de 4% supplémentaires le bonus aux dégâts d'Attaque sournoise et Hémorragie.",
"Augmente votre total d'Agilité de 15% et augmente de 5% supplémentaires le bonus aux dégâts d'Attaque sournoise et Hémorragie."
		];
i++;	

//Waylay - Subtlety
rank[i]=[
"Vos coups critiques avec Embuscade ont 50% de chances de réduire de 20% la vitesse d'attaque en mêlée et à distance et de 70% sa vitesse de déplacement pendant 8 sec.",
"Vos coups critiques avec Embuscade ont 100% de chances de réduire de 20% la vitesse d'attaque en mêlée et à distance et de 70% sa vitesse de déplacement pendant 8 sec."
		];
i++;

//Honor Among Thieves - Subtlety
rank[i]=[
"Chaque fois qu'un membre de votre groupe réussit un coup critique avec un sort de dégâts ou de soins ou une technique, vous avez 33% de chances de gagner un point de combo sur votre cible actuelle. Cet effet ne peut se produire plus d'une fois toutes les secondes.",
"Chaque fois qu'un membre de votre groupe réussit un coup critique avec un sort de dégâts ou de soins ou une technique, vous avez 66% de chances de gagner un point de combo sur votre cible actuelle. Cet effet ne peut se produire plus d'une fois toutes les secondes.",
"Chaque fois qu'un membre de votre groupe réussit un coup critique avec un sort de dégâts ou de soins ou une technique, vous avez 100% de chances de gagner un point de combo sur votre cible actuelle. Cet effet ne peut se produire plus d'une fois toutes les secondes."
		];
i++;

//Shadowstep - Subtlety 
rank[i]=[
			"<span style=text-align:left;float:left;>10 points d'énergie</span><span style=text-align:right;float:right;>25 m de portée</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Vous tentez de marcher à travers les ombres et de réapparaître derrière votre ennemi. Votre vitesse de déplacement est augmentée de 70% pendant 3 sec. Les dégâts de votre prochaine technique sont augmentés de 20% et la menace générée est réduite de 50%. Dure 10 sec."
		];
i++;

//Filthy Tricks - Subtlety
rank[i]=[
"Réduit le temps de recharge de vos techniques Ficelles du métier et Distraction de 5 sec. et celui de votre Préparation de 2,5 min.",
"Réduit le temps de recharge de vos techniques Ficelles du métier et Distraction de 10 sec. et celui de votre Préparation de 5 min."
		];
i++;

//Slaughter form the Shadows - Subtlety
rank[i]=[
"Réduit de 3 le coût en énergie de vos techniques Attaque sournoise et Embuscade et de 1 le coût en énergie d'Hémorragie.",
"Réduit de 6 le coût en énergie de vos techniques Attaque sournoise et Embuscade et de 2 le coût en énergie d'Hémorragie.",
"Réduit de 9 le coût en énergie de vos techniques Attaque sournoise et Embuscade et de 3 le coût en énergie d'Hémorragie.",
"Réduit de 12 le coût en énergie de vos techniques Attaque sournoise et Embuscade et de 4 le coût en énergie d'Hémorragie.",
"Réduit de 15 le coût en énergie de vos techniques Attaque sournoise et Embuscade et de 5 le coût en énergie d'Hémorragie."
		];
i++;

//Shadow Dance - Subtlety 
rank[i]=[
			"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Entame la Danse de l'ombre, qui permet l'utilisation d'Assommer, Garrot, Embuscade, Coup bas, Préméditation, Vol à la tire et Désarmement de piège même sans être camouflé. Ces techniques reçoivent chacune un temps de recharge de 2 sec. Dure 10 sec."
		];
i++;

		
//Subtlety Talents End^^
jsLoaded=true;//needed for ajax script loading
