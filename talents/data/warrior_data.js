var i = 0;
var t = 0;

var className = "Talents de guerrier";
var talentPath = "/info/basics/talents/";

tree[i] = "Armes"; i++;
tree[i] = "Fureur"; i++;
tree[i] = "Protection"; i++;

i = 0;

talent[i] = [0, "Frappe héroïque améliorée", 3, 1, 1]; i++;
talent[i] = [0, "Déviation", 5, 2, 1]; i++;
talent[i] = [0, "Pourfendre amélioré", 2, 3, 1]; i++;
talent[i] = [0, "Charge améliorée", 2, 1, 2]; i++; 
talent[i] = [0, "Volonté de fer", 3, 2, 2]; i++;
talent[i] = [0, "Maîtrise tactique", 3, 3, 2]; i++;
talent[i] = [0, "Fulgurance améliorée", 2, 1, 3]; i++;
talent[i] = [0, "Maîtrise de la Rage", 1, 2, 3]; i++;
talent[i] = [0, "Empaler", 2, 3, 3]; i++;
talent[i] = [0, "Blessures profondes", 3, 4, 3, [getTalentID("Empaler"),2]]; i++;
talent[i] = [0, "Spécialisation Arme 2M", 3, 2, 4]; i++;
talent[i] = [0, "Goût du sang", 3, 3, 4]; i++;
talent[i] = [0, "Spécialisation Hache d'hast", 5, 1, 5]; i++; 
talent[i] = [0, "Attaques circulaires", 1, 2, 5]; i++;
talent[i] = [0, "Spécialisation Masse", 5, 3, 5]; i++;
talent[i] = [0, "Spécialisation Epée", 5, 4, 5]; i++;
talent[i] = [0, "Interception améliorée", 2, 1, 6]; i++;
talent[i] = [0, "Brise-genou amélioré", 3, 3, 6]; i++;
talent[i] = [0, "Traumatisme", 2, 4, 6]; i++;
talent[i] = [0, "Second souffle", 2, 1, 7]; i++;
talent[i] = [0, "Frappe mortelle", 1, 2, 7, [getTalentID("Attaques circulaires"),1]]; i++;
talent[i] = [0, "Force des armes", 2, 3, 7]; i++;
talent[i] = [0, "Heurtoir amélioré", 2, 4, 7]; i++;
talent[i] = [0, "Frappe mortelle améliorée", 3, 2, 8, [getTalentID("Frappe mortelle"),1]]; i++;
talent[i] = [0, "Assaut continuel", 2, 3, 8]; i++;
talent[i] = [0, "Mort soudaine", 3, 1, 9]; i++;
talent[i] = [0, "Rage infinie", 1, 2, 9]; i++;
talent[i] = [0, "Frénésie sanglante", 2, 3, 9]; i++;
talent[i] = [0, "Démolisseurs", 5, 2, 10]; i++;
talent[i] = [0, "Tempête de lames", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//fury talents
talent[i] = [1, "Armé jusqu'aux dents", 3, 1, 1]; i++;
talent[i] = [1, "Voix tonitruante", 2, 2, 1]; i++;
talent[i] = [1, "Cruauté", 5, 3, 1]; i++;
talent[i] = [1, "Cri démoralisant amélioré", 5, 2, 2]; i++;
talent[i] = [1, "Colère déchaînée", 5, 3, 2]; i++;
talent[i] = [1, "Enchaînement amélioré", 3, 1, 3]; i++;
talent[i] = [1, "Hurlement perçant", 1, 2, 3]; i++;
talent[i] = [1, "Folie sanguinaire", 3, 3, 3]; i++;
talent[i] = [1, "Présence impérieuse", 5, 4, 3]; i++;
talent[i] = [1, "Spécialisation Ambidextrie", 5, 1, 4]; i++;
talent[i] = [1, "Exécution améliorée", 2, 2, 4]; i++;
talent[i] = [1, "Enrager", 5, 3, 4]; i++;
talent[i] = [1, "Précision", 3, 1, 5]; i++;
talent[i] = [1, "Souhait mortel", 1, 2, 5]; i++;
talent[i] = [1, "Maîtrise des armes", 2, 3, 5]; i++;
talent[i] = [1, "Rage berserker améliorée", 2, 1, 6]; i++;
talent[i] = [1, "Rafale", 5, 3, 6]; i++;
talent[i] = [1, "Intensifier la rage", 3, 1, 7]; i++;
talent[i] = [1, "Sanguinaire", 1, 2, 7, [getTalentID("Souhait mortel"),1]]; i++;
talent[i] = [1, "Tourbillon amélioré", 2, 4, 7]; i++;
talent[i] = [1, "Attaques furieuses", 2, 1, 8]; i++;
talent[i] = [1, "Posture berserker améliorée", 5, 4, 8]; i++;
talent[i] = [1, "Fureur héroïque", 1, 1, 9]; i++;
talent[i] = [1, "Saccager", 1, 2, 9, [getTalentID("Sanguinaire"),1]]; i++;
talent[i] = [1, "Afflux sanguin", 3, 3, 9, [getTalentID("Sanguinaire"),1]]; i++;
talent[i] = [1, "Fureur sans fin", 5, 2, 10]; i++;
talent[i] = [1, "Poigne du Titan", 1, 2, 11]; i++;



treeStartStop[t] = i -1;
t++;

//protection talents
talent[i] = [2, "Rage sanguinaire améliorée", 2, 1, 1]; i++;
talent[i] = [2, "Spécialisation Bouclier", 5, 2, 1]; i++;
talent[i] = [2, "Coup de tonnerre amélioré", 3, 3, 1]; i++;
talent[i] = [2, "Emulation", 3, 2, 2]; i++;
talent[i] = [2, "Anticipation", 5, 3, 2]; i++;
talent[i] = [2, "Dernier rempart", 1, 1, 3]; i++;
talent[i] = [2, "Vengeance améliorée", 2, 2, 3]; i++;
talent[i] = [2, "Maîtrise du bouclier", 2, 3, 3]; i++;
talent[i] = [2, "Résistance", 5, 4, 3]; i++;
talent[i] = [2, "Renvoi de sort amélioré", 2, 1, 4]; i++;
talent[i] = [2, "Désarmement amélioré", 2, 2, 4]; i++;
talent[i] = [2, "Percer", 3, 3, 4]; i++;
talent[i] = [2, "Disciplines améliorées", 2, 1, 5]; i++;
talent[i] = [2, "Coup traumatisant", 1, 2, 5]; i++;
talent[i] = [2, "Imposition du silence", 2, 3, 5]; i++;
talent[i] = [2, "Spécialisation Arme 1M", 5, 3, 6]; i++;
talent[i] = [2, "Posture défensive améliorée", 2, 1, 7]; i++;
talent[i] = [2, "Vigilance", 1, 2, 7, [getTalentID("Coup traumatisant"),1]]; i++;
talent[i] = [2, "Rage focalisée", 3, 3, 7]; i++;
talent[i] = [2, "Vitalité", 3, 2, 8]; i++;
talent[i] = [2, "Protéger", 2, 3, 8]; i++;
talent[i] = [2, "Porteguerre", 1, 1, 9]; i++;
talent[i] = [2, "Dévaster", 1, 2, 9]; i++;
talent[i] = [2, "Blocage critique", 3, 3, 9]; i++;
talent[i] = [2, "Epée et bouclier", 3, 2, 10, [getTalentID("Dévaster"),1]]; i++;
talent[i] = [2, "Bouclier de dégâts", 2, 3, 10]; i++;
talent[i] = [2, "Onde de choc", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

i = 0;



//Arms Talents Begin

//Improved Heroic Strike - Arms
rank[i] = [
"Réduit le coût en rage de votre technique Frappe héroïque de 1 points.",
"Réduit le coût en rage de votre technique Frappe héroïque de 2 points.",
"Réduit le coût en rage de votre technique Frappe héroïque de 3 points."
		];
i++;		
		
//Deflection - Arms
rank[i] = [
"Augmente vos chances de Parer de 1%.",
"Augmente vos chances de Parer de 2%.",
"Augmente vos chances de Parer de 3%.",
"Augmente vos chances de Parer de 4%.",
"Augmente vos chances de Parer de 5%."
		];
i++;		

//Improved Rend - Arms
rank[i] = [
"Augmente de 10% les dégâts de saignement infligés par votre technique Pourfendre.",
"Augmente de 20% les dégâts de saignement infligés par votre technique Pourfendre."
		];
i++;		
		
//Improved Charge - Arms 
rank[i] = [
"Augmente la quantité de Rage générée par votre technique Charge de 5.",
"Augmente la quantité de Rage générée par votre technique Charge de 10."
		];
i++;		



//Iron Will - Protection
rank[i]=[
"Réduit de 7% la durée de tous les effets d'étourdissement et de charme utilisés contre vous.",
"Réduit de 14% la durée de tous les effets d'étourdissement et de charme utilisés contre vous.",
"Réduit de 20% la durée de tous les effets d'étourdissement et de charme utilisés contre vous."
		];
i++;		

//Tactical Mastery - Arms
rank[i] = [
"Vous conservez jusqu'à 5 points de rage supplémentaires lorsque vous changez de posture. Augmente aussi considérablement la menace générée par vos techniques Sanguinaire et Frappe mortelle quand vous êtes en posture défensive.",
"Vous conservez jusqu'à 10 points de rage supplémentaires lorsque vous changez de posture. Augmente aussi considérablement la menace générée par vos techniques Sanguinaire et Frappe mortelle quand vous êtes en posture défensive. (Plus efficace que le Rang 1).",
"Vous conservez jusqu'à 15 points de rage supplémentaires lorsque vous changez de posture. Augmente aussi considérablement la menace générée par vos techniques Sanguinaire et Frappe mortelle quand vous êtes en posture défensive. (Plus efficace que le Rang 2)."
		];
i++;		
		
//Improved Overpower - Arms
rank[i] = [
"Augmente de 25% vos chances d'infliger un coup critique avec la technique Fulgurance.",
"Augmente de 50% vos chances d'infliger un coup critique avec la technique Fulgurance."
		];		
i++;		


//Anger Management - Arms	
rank[i] = [ 
"Génère 1 point de rage toutes les 3 secondes."
		];
i++;		

//Impale - Arms	
rank[i] = [
"Augmente de 10% le bonus aux dégâts des coups critiques réussis avec vos techniques.",
"Augmente de 20% le bonus aux dégâts des coups critiques réussis avec vos techniques."
		];
i++;	

//Deep Wounds - Arms
rank[i] = [
"Vos coups critiques font saigner l'adversaire et lui infligent 16% des points de dégâts moyens de votre arme de mêlée en 6 sec.",
"Vos coups critiques font saigner l'adversaire et lui infligent 32% des points de dégâts moyens de votre arme de mêlée en 6 sec.",
"Vos coups critiques font saigner l'adversaire et lui infligent 48% des points de dégâts moyens de votre arme de mêlée en 6 sec."
		];
i++;	



//Two-Handed Weapon Specialization - Arms
rank[i] = [
"Augmente de 2% les points de dégâts que vous infligez avec les armes à deux mains.",
"Augmente de 4% les points de dégâts que vous infligez avec les armes à deux mains.",
"Augmente de 6% les points de dégâts que vous infligez avec les armes à deux mains."
		];
i++;	

//Taste for Blood - Arms
rank[i] = [
"Chaque fois que votre technique Pourfendre inflige des dégâts, vous avez 10% de chances de permettre l'utilisation de votre technique Fulgurance pendant 5 sec. 1 charge.",
"Chaque fois que votre technique Pourfendre inflige des dégâts, vous avez 20% de chances de permettre l'utilisation de votre technique Fulgurance pendant 5 sec. 1 charge.",
"Chaque fois que votre technique Pourfendre inflige des dégâts, vous avez 30% de chances de permettre l'utilisation de votre technique Fulgurance pendant 5 sec. 1 charge."
		];
i++;


//PoleAxe Specialization - Arms
rank[i] = [
"Augmente de 1% vos chances d'infliger un coup critique avec les haches et les armes d'hast ainsi que les dégâts de ces critiques.",
"Augmente de 2% vos chances d'infliger un coup critique avec les haches et les armes d'hast ainsi que les dégâts de ces critiques.",
"Augmente de 3% vos chances d'infliger un coup critique avec les haches et les armes d'hast ainsi que les dégâts de ces critiques.",
"Augmente de 4% vos chances d'infliger un coup critique avec les haches et les armes d'hast ainsi que les dégâts de ces critiques.",
"Augmente de 5% vos chances d'infliger un coup critique avec les haches et les armes d'hast ainsi que les dégâts de ces critiques."
		];
i++;		

//Sweeping Strikes - Arms - TALENT DIFFERENT - description
rank[i] = [
"30 Rage<br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Requiert Posture de combat, Posture berserker<br>Vos 5 prochaines attaques de mêlée frappent un adversaire proche supplémentaire."
		];
i++;

//Mace Specialization - Arms	
rank[i] = [
"Vos attaques avec les masses ignorent jusqu'à 3% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 6% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 9% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 12% de l'armure de votre adversaire.",
"Vos attaques avec les masses ignorent jusqu'à 15% de l'armure de votre adversaire."
		];		
i++;		

//Sword Specialization - Arms				
rank[i] = [
"Vous confère 1% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée. Cet effet ne survient pas plus d'une fois toutes les 6 secondes.",
"Vous confère 2% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée. Cet effet ne survient pas plus d'une fois toutes les 6 secondes.",
"Vous confère 3% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée. Cet effet ne survient pas plus d'une fois toutes les 6 secondes.",
"Vous confère 4% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée. Cet effet ne survient pas plus d'une fois toutes les 6 secondes.",
"Vous confère 5% de chances de bénéficier d'une attaque supplémentaire sur la même cible après avoir infligé des dégâts avec votre épée. Cet effet ne survient pas plus d'une fois toutes les 6 secondes."
		];
i++;		


//Improved Intercept - Arms
rank[i]=[
"Réduit le temps de recharge de votre technique Interception de 5 sec.",
"Réduit le temps de recharge de votre technique Interception de 10 sec."
		];
i++;	


//Improved Hamstring - Arms	
rank[i] = [
"Confère à votre technique Brise-genou 5% de chances d'immobiliser votre cible pendant 5 sec.",
"Confère à votre technique Brise-genou 10% de chances d'immobiliser votre cible pendant 5 sec.",
"Confère à votre technique Brise-genou 15% de chances d'immobiliser votre cible pendant 5 sec."
		];
i++;



//Trauma - Arms - TALENT DIFFERENT - description
rank[i] = [
"Vos coups critiques normaux en mêlée augmentent l'efficacité des effets de saignement sur la cible de 15% pendant 15 sec.",
"Vos coups critiques normaux en mêlée augmentent l'efficacité des effets de saignement sur la cible de 30% pendant 15 sec."
		];
i++;

//Second Wind - Arms
rank[i] = [
"Chaque fois que vous êtes atteint par un effet d'étourdissement ou d'immobilisation, vous gagnez 10 points de rage et 5% de votre total de points de vie en 10 sec.",
"Chaque fois que vous êtes atteint par un effet d'étourdissement ou d'immobilisation, vous gagnez 20 points de rage et 10% de votre total de points de vie en 10 sec."
		];
i++;

//Mortal Strike - Arms - TALENT DIFFERENT - value changed, trainable ranks removed
rank[i] = [
		"<span style=text-align:left;float:left;>30 points de rage</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>Requiert une arme de mêlée<br>Une attaque vicieuse qui inflige les dégâts de l'arme plus 380 et blesse la cible. L'effet des sorts de soins dont elle est la cible est réduit de 50% pendant 10 sec.<br><br>\
		&nbsp;Talent à plusieurs rangs"
		];		
i++;



//Strength of Arms - Arms
rank[i] = [
"Augmente votre total de Force et d'Endurance de 2% et votre expertise de 2.",
"Augmente votre total de Force et d'Endurance de 4% et votre expertise de 4."
		];
i++;


//Improved Slam - Arms
rank[i] = [
"Réduit le temps de frappe de votre technique Heurtoir de 0,5 sec.",
"Réduit le temps de frappe de votre technique Heurtoir de 1 sec."
		];
i++;



//Improved Mortal Strike - Arms	
rank[i] = [
"Augmente les dégâts infligés par votre technique Frappe mortelle de 3% et réduit le temps de recharge de 0,3 sec.",
"Augmente les dégâts infligés par votre technique Frappe mortelle de 6% et réduit le temps de recharge de 0,7 sec.",
"Augmente les dégâts infligés par votre technique Frappe mortelle de 10% et réduit le temps de recharge de 1 sec."
		];
i++;



//Unrelenting Assault - Arms
rank[i] = [
"Réduit le temps de recharge de vos techniques Fulgurance et Vengeance de 2 secondes.",
"Réduit le temps de recharge de vos techniques Fulgurance et Vengeance de 4 secondes."
		];
i++;

//Sudden Death - Arms	
rank[i] = [
"Vos coups critiques en mêlée ont 10% de chances de permettre l'utilisation d'Exécution quel que soit le nombre de points de vie restant à la cible. De plus, vous conservez 3 points de rage après avoir utilisé Exécution.",
"Vos coups critiques en mêlée ont 20% de chances de permettre l'utilisation d'Exécution quel que soit le nombre de points de vie restant à la cible. De plus, vous conservez 7 points de rage après avoir utilisé Exécution.",
"Vos coups critiques en mêlée ont 30% de chances de permettre l'utilisation d'Exécution quel que soit le nombre de points de vie restant à la cible. De plus, vous conservez 10 points de rage après avoir utilisé Exécution."
		];
i++;




//Endless Rage - Arms
rank[i] = [
				"Vous générez 25% de rage supplémentaires lorsque vous infligez des dégâts."
];		
i++;

//Blood Frenzy - Arms
rank[i] = [
"Augmente votre vitesse d'attaque de 3%. De plus, vos techniques Pourfendre et Blessures profondes augmentent aussi tous les dégâts physiques infligés à cette cible de 1%.",
"Augmente votre vitesse d'attaque de 6%. De plus, vos techniques Pourfendre et Blessures profondes augmentent aussi tous les dégâts physiques infligés à cette cible de 2%."
		];
i++;

//Wrecking Crew - Arms
rank[i] = [
"Vos coups critiques en mêlée vous font Enrager, ce qui augmente tous les dégâts infligés de 2% pendant 12 sec.",
"Vos coups critiques en mêlée vous font Enrager, ce qui augmente tous les dégâts infligés de 4% pendant 12 sec.",
"Vos coups critiques en mêlée vous font Enrager, ce qui augmente tous les dégâts infligés de 6% pendant 12 sec.",
"Vos coups critiques en mêlée vous font Enrager, ce qui augmente tous les dégâts infligés de 8% pendant 12 sec.",
"Vos coups critiques en mêlée vous font Enrager, ce qui augmente tous les dégâts infligés de 10% pendant 12 sec."
];i++;

//Bladestorm - Arms
rank[i] = [
"<span style=text-align:left;float:left;>25 points de rage</span><span style=text-align:right;float:right;>Instantané</span><br><span style=text-align:left;float:left;>Requiert une arme de mêlée</span><span style=text-align:right;float:right;>1,5 min de recharge</span><br><br/>Exécute instantanément une attaque Tourbillon et pendant les prochaines 6 sec, vous exécuterez une attaque Tourbillon toutes les 1 sec. Tant que vous êtes sous l'effet de Tempête de lames, vous pouvez vous déplacer mais vous ne pouvez pas exécuter d'autres techniques. Cependant, vous ne ressentez ni pitié, ni remords, ni peur et vous ne pouvez être arrêté à moins d'être tué.<br><br>\ "
		];		
i++;




//FURY TREE ------------------------------

//Armored to the Teeth - Fury
rank[i] = [
"Augmente votre puissance d'attaque de 1 pour chaque tranche de 180 points de votre valeur d'armure.",
"Augmente votre puissance d'attaque de 2 pour chaque tranche de 180 points de votre valeur d'armure.",
"Augmente votre puissance d'attaque de 3 pour chaque tranche de 180 points de votre valeur d'armure."
		];
i++;

//Booming Voice - Fury
rank[i] = [
"Augmente de 25% la zone d'effet et la durée de vos techniques Cri de guerre, Cri démoralisant et Cri de commandement.",
"Augmente de 50% la zone d'effet et la durée de vos techniques Cri de guerre, Cri démoralisant et Cri de commandement."
		];
i++;		

//Cruelty - Fury
rank[i] = [
"Augmente vos chances d'infliger un coup critique avec les armes de mêlée de 1%.",
"Augmente vos chances d'infliger un coup critique avec les armes de mêlée de 2%.",
"Augmente vos chances d'infliger un coup critique avec les armes de mêlée de 3%.",
"Augmente vos chances d'infliger un coup critique avec les armes de mêlée de 4%.",
"Augmente vos chances d'infliger un coup critique avec les armes de mêlée de 5%."
		];
i++;

//Improved Demoralizing Shout - Fury	
rank[i] = [
"Augmente la réduction de puissance d'attaque en mêlée de votre Cri démoralisant de 8%.",
"Augmente la réduction de puissance d'attaque en mêlée de votre Cri démoralisant de 16%.",
"Augmente la réduction de puissance d'attaque en mêlée de votre Cri démoralisant de 24%.",
"Augmente la réduction de puissance d'attaque en mêlée de votre Cri démoralisant de 32%.",
"Augmente la réduction de puissance d'attaque en mêlée de votre Cri démoralisant de 40%."
		];
i++;		

//Unbridled Wrath - Fury
rank[i] = [
"Vous confère une chance de gagner un point de rage supplémentaire quand vous infligez des dégâts en mêlée avec une arme.",
"Vous confère une chance de gagner un point de rage supplémentaire quand vous infligez des dégâts en mêlée avec une arme.  L'effet se produit plus souvent qu'avec Colère déchaînée (Rang 1).",
"Vous confère une chance de gagner un point de rage supplémentaire quand vous infligez des dégâts en mêlée avec une arme.  L'effet se produit plus souvent qu'avec Colère déchaînée (Rang 2).",
"Vous confère une chance de gagner un point de rage supplémentaire quand vous infligez des dégâts en mêlée avec une arme.  L'effet se produit plus souvent qu'avec Colère déchaînée (Rang 3).",
"Vous confère une chance de gagner un point de rage supplémentaire quand vous infligez des dégâts en mêlée avec une arme.  L'effet se produit plus souvent qu'avec Colère déchaînée (Rang 4)."
		];		
i++;		

//Improved Cleave - Fury
rank[i] = [

"Augmente le bonus de dégâts infligé par votre technique Enchaînement de 40%.",
"Augmente le bonus de dégâts infligé par votre technique Enchaînement de 80%.",
"Augmente le bonus de dégâts infligé par votre technique Enchaînement de 120%."
		];
i++;		

//Piercing Howl - Fury
rank[i] = [
		"10 points de rage<br>Instantané<br>Tous les ennemis se trouvant à moins de 10 mètres du guerrier sont hébétés, et leur vitesse de déplacement est réduite de 50% pendant 6 sec."
		];
i++;		

//Blood Craze - Fury	
rank[i] = [
"Régénère 2% de votre nombre total de points de vie sur 6 sec après avoir reçu un coup critique.",
"Régénère 4% de votre nombre total de points de vie sur 6 sec après avoir reçu un coup critique.",
"Régénère 6% de votre nombre total de points de vie sur 6 sec après avoir reçu un coup critique."
		];
i++;		

//Commanding Presence - Fury (ex. Improved Battle Shout)
rank[i] = [
"Augmente de 5% le bonus à la puissance d'attaque en mêlée de votre Cri de guerre et le bonus aux points de vie de votre Cri de commandement.",
"Augmente de 10% le bonus à la puissance d'attaque en mêlée de votre Cri de guerre et le bonus aux points de vie de votre Cri de commandement.",
"Augmente de 15% le bonus à la puissance d'attaque en mêlée de votre Cri de guerre et le bonus aux points de vie de votre Cri de commandement.",
"Augmente de 20% le bonus à la puissance d'attaque en mêlée de votre Cri de guerre et le bonus aux points de vie de votre Cri de commandement.",
"Augmente de 25% le bonus à la puissance d'attaque en mêlée de votre Cri de guerre et le bonus aux points de vie de votre Cri de commandement."
		];
i++;		

//Dual Wield Specialization - Fury
rank[i] = [
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 5%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 10%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 15%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 20%.",
"Augmente les points de dégâts infligés par l'arme que vous utilisez en main gauche de 25%."
		];i++;		

//Improved Execute - Fury
rank[i] = [
"Réduit le coût en rage de votre technique Exécution de 2.",
"Réduit le coût en rage de votre technique Exécution de 5."
		];
i++;		

//Enrage - Fury
rank[i] = [
"Vous confère 30% de chances de bénéficier d'un bonus aux dégâts en mêlée de 2% pendant 12 sec lorsque vous êtes victime d'une attaque qui vous inflige des dégâts.",
"Vous confère 30% de chances de bénéficier d'un bonus aux dégâts en mêlée de 4% pendant 12 sec lorsque vous êtes victime d'une attaque qui vous inflige des dégâts.",
"Vous confère 30% de chances de bénéficier d'un bonus aux dégâts en mêlée de 6% pendant 12 sec lorsque vous êtes victime d'une attaque qui vous inflige des dégâts.",
"Vous confère 30% de chances de bénéficier d'un bonus aux dégâts en mêlée de 8% pendant 12 sec lorsque vous êtes victime d'une attaque qui vous inflige des dégâts.",
"Vous confère 30% de chances de bénéficier d'un bonus aux dégâts en mêlée de 10% pendant 12 sec lorsque vous êtes victime d'une attaque qui vous inflige des dégâts."
		];
i++;

	


//Precision - Fury
rank[i]=[
"Augmente vos chances de toucher l'ennemi avec vos armes de mêlée de 1%.",
"Augmente vos chances de toucher l'ennemi avec vos armes de mêlée de 2%.",
"Augmente vos chances de toucher l'ennemi avec vos armes de mêlée de 3%."
		];
i++;	

//Death Wish - Arms - TALENT DIFFERENT - description
rank[i]=[
"10 points de rage<br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsque cette technique est activée, vous enragez et vos dégâts physiques sont augmentés de 20% mais tous les dégâts subis sont augmentés de 5%. Dure 30 sec."
			];
i++;
			

//Weapon Mastery - Fury
rank[i] = [
"Réduit la probabilité que vos attaques soient esquivées de 1% et réduit la durée de tous les effets de désarmement utilisés contre vous de 25%. Non cumulable avec les autres effets qui réduisent la durée du désarmement.",
"Réduit la probabilité que vos attaques soient esquivées de 2% et réduit la durée de tous les effets de désarmement utilisés contre vous de 50%. Non cumulable avec les autres effets qui réduisent la durée du désarmement."
		];
i++;	
		
//Improved Berserker Rage - Fury
rank[i]=[
"La technique Rage berserker génère 10 points de rage quand elle est utilisée.",
"La technique Rage berserker génère 20 points de rage quand elle est utilisée."
		];
i++;		
		
//Flurry - Fury
rank[i]=[
"Lorsque vous infligez un coup critique en mêlée, augmente votre vitesse d'attaque de 5% pour les 3 prochains coups.",
"Lorsque vous infligez un coup critique en mêlée, augmente votre vitesse d'attaque de 10% pour les 3 prochains coups.",
"Lorsque vous infligez un coup critique en mêlée, augmente votre vitesse d'attaque de 15% pour les 3 prochains coups.",
"Lorsque vous infligez un coup critique en mêlée, augmente votre vitesse d'attaque de 20% pour les 3 prochains coups.",
"Lorsque vous infligez un coup critique en mêlée, augmente votre vitesse d'attaque de 25% pour les 3 prochains coups."
		];
i++;		
		


//Intensify Rage - Fury
rank[i] = [

"Réduit le temps de recharge de vos techniques Rage sanguinaire, Rage berserker, Témérité et Souhait mortel de 11%.",
"Réduit le temps de recharge de vos techniques Rage sanguinaire, Rage berserker, Témérité et Souhait mortel de 22%.",
"Réduit le temps de recharge de vos techniques Rage sanguinaire, Rage berserker, Témérité et Souhait mortel de 33%."
		];
i++;



		
//Bloodthirst - Fury
rank[i]=[
		"<span style=text-align:left;float:left;>30 points de rage</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>5 sec de recharge</span><br>Attaque instantanément la cible et lui inflige 260 points de dégâts. De plus, les 5 prochaines attaques de mêlée réussies rendent 0,6% du maximum de points de vie. Cet effet dure 8 sec. Les dégâts sont proportionnels à votre puissance d'attaque."
		];
i++;	

//Improved Whirlwind - Fury
rank[i]=[
"Increases the damage of your Whirlwind ability by 10%.",
"Increases the damage of your Whirlwind ability by 20%."
		];
i++;				

//Furious Attacks - Fury
rank[i]=[
"Your normal melee attacks have a chance to reduce all healing done to the target by 25% for 10 sec. This can stack up to 2 times.",
"Your normal melee attacks have a chance to reduce all healing done to the target by 25% for 10 sec. This occurs more often than Furious Attacks (Rank 1)."
		];
i++;			

//Improved Berserker Stance - Fury
rank[i]=[
"Augmente la puissance d'attaque de 2% et réduit la menace générée de 2% lorsque vous êtes en posture berserker.",
"Augmente la puissance d'attaque de 4% et réduit la menace générée de 4% lorsque vous êtes en posture berserker.",
"Augmente la puissance d'attaque de 6% et réduit la menace générée de 6% lorsque vous êtes en posture berserker.",
"Augmente la puissance d'attaque de 8% et réduit la menace générée de 8% lorsque vous êtes en posture berserker.",
"Augmente la puissance d'attaque de 10% et réduit la menace générée de 10% lorsque vous êtes en posture berserker."
		];
i++;	

//Heroic Fury - Fury
rank[i] = [
"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>45 sec de recharge</span><br>Dissipe tous les effets d'immobilisation et met fin au temps de recharge de votre technique Interception."
		];		
i++;


//Rampage - Fury - TALENT DIFFERENT - description
rank[i]=[
		"Your melee critical hits cause you to go on a rampage, increasing ranged and melee critical hit chance of all party and raid members within 45 yds by 5%. Lasts 10 sec."
		];
i++;


//Bloodsurge - Fury
rank[i] = [
"Vos coups critiques réussis avec Sanguinaire ont 33% de chances de rendre votre prochain Heurtoir instantané pendant 5 sec.",
"Vos coups critiques réussis avec Sanguinaire ont 66% de chances de rendre votre prochain Heurtoir instantané pendant 5 sec.",
"Vos coups critiques réussis avec Sanguinaire ont 100% de chances de rendre votre prochain Heurtoir instantané pendant 5 sec."
		];
i++;

//Unending Fury - Fury
rank[i] = [
"Augmente les dégâts infligés par vos techniques Heurtoir, Tourbillon et Sanguinaire de 2%.",
"Augmente les dégâts infligés par vos techniques Heurtoir, Tourbillon et Sanguinaire de 4%.",
"Augmente les dégâts infligés par vos techniques Heurtoir, Tourbillon et Sanguinaire de 6%.",
"Augmente les dégâts infligés par vos techniques Heurtoir, Tourbillon et Sanguinaire de 8%.",
"Augmente les dégâts infligés par vos techniques Heurtoir, Tourbillon et Sanguinaire de 10%."
		];
i++;

//Titan's Grip - Fury
rank[i] = [
"Vous permet de manier les haches, les masses et les épées à deux mains d’une seule main. Réduit également vos chances de toucher avec les techniques infligeant des dégâts qui nécessitent des armes de 5%."
		];
i++;


		
//PROTECTION TREE----------------------------------------------------------------------		
//Improved Bloodrage - Protection
rank[i]=[
"Augmente la rage instantanée générée par votre technique Rage sanguinaire de 25%.",
"Augmente la rage instantanée générée par votre technique Rage sanguinaire de 50%."
		];
i++;

//Shield Specialization - Protection
rank[i]=[
"Augmente de 1% vos chances de bloquer les attaques avec votre bouclier, avec 20% de chances de générer 2 points de Rage quand vous bloquez une attaque.",
"Augmente de 2% vos chances de bloquer les attaques avec votre bouclier, avec 40% de chances de générer 2 points de Rage quand vous bloquez une attaque.",
"Augmente de 3% vos chances de bloquer les attaques avec votre bouclier, avec 60% de chances de générer 2 points de Rage quand vous bloquez une attaque.",
"Augmente de 4% vos chances de bloquer les attaques avec votre bouclier, avec 80% de chances de générer 2 points de Rage quand vous bloquez une attaque.",
"Augmente de 5% vos chances de bloquer les attaques avec votre bouclier, avec 100% de chances de générer 2 points de Rage quand vous bloquez une attaque."
		];
i++;


//Improved Thunder Clap - Protection
rank[i] = [
"Réduit le coût de votre technique Coup de tonnerre de 1 points de rage et augmente les dégâts de 10% et l'effet de ralentissement de 4% supplémentaires.",
"Réduit le coût de votre technique Coup de tonnerre de 2 points de rage et augmente les dégâts de 20% et l'effet de ralentissement de 7% supplémentaires.",
"Réduit le coût de votre technique Coup de tonnerre de 4 points de rage et augmente les dégâts de 30% et l'effet de ralentissement de 10% supplémentaires."
];
i++;	

//Incite - Protection
rank[i]=[
"Augmente de 5% vos chances de réaliser un coup critique avec les techniques Frappe héroïque, Coup de tonnerre et Enchaînement.",
"Augmente de 10% vos chances de réaliser un coup critique avec les techniques Frappe héroïque, Coup de tonnerre et Enchaînement.",
"Augmente de 15% vos chances de réaliser un coup critique avec les techniques Frappe héroïque, Coup de tonnerre et Enchaînement."
		];
i++;
	
//Anticipation - Protection - TALENT DIFFERENT - decription
rank[i]=[
"Augmente vos chances d'esquiver une attaque de 1%.",
"Augmente vos chances d'esquiver une attaque de 2%.",
"Augmente vos chances d'esquiver une attaque de 3%.",
"Augmente vos chances d'esquiver une attaque de 4%.",
"Augmente vos chances d'esquiver une attaque de 5%."
		];
i++;		
		
//Last Stand - Protection
rank[i]=[
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>5 min de recharge</span><br>Activée, cette technique vous confère temporairement 30% de votre maximum de points de vie en plus pendant 20 sec. Lorsque l'effet expire, les points de vie sont perdus."
		];
i++;		
		
		
//Improved Revenge - Protection
rank[i]=[
"Augmente les dégâts de votre technique Vengeance de 10% et vous confère 25% de chances d'étourdir la cible pendant 3 sec.",
"Augmente les dégâts de votre technique Vengeance de 20% et vous confère 50% de chances d'étourdir la cible pendant 3 sec."
		];
i++;	


//Shield Mastery - Protection
rank[i]=[
"Augmente de 15% votre valeur de blocage et réduit de 10 sec. le temps de recharge de votre technique Maîtrise du blocage.",
"Augmente de 30% votre valeur de blocage et réduit de 20 sec. le temps de recharge de votre technique Maîtrise du blocage."
		];
i++;


		
//Toughness - Protection
rank[i]=[
"Augmente la valeur d'armure des objets de 2% et réduit la durée de tous les effets affectant le déplacement de 6%.",
"Augmente la valeur d'armure des objets de 4% et réduit la durée de tous les effets affectant le déplacement de 12%.",
"Augmente la valeur d'armure des objets de 6% et réduit la durée de tous les effets affectant le déplacement de 18%.",
"Augmente la valeur d'armure des objets de 8% et réduit la durée de tous les effets affectant le déplacement de 24%.",
"Augmente la valeur d'armure des objets de 10% et réduit la durée de tous les effets affectant le déplacement de 30%."
		];
i++;
		
//Improved Spell Reflection - Protection
rank[i]=[
"Réduit la probabilité que vous soyez touché par les sorts de 2% , et quand la technique est utilisée, elle renvoie le premier sort lancé contre les 2 membres du groupe les plus proches.",
"Réduit la probabilité que vous soyez touché par les sorts de 4% , et quand la technique est utilisée, elle renvoie le premier sort lancé contre les 4 membres du groupe les plus proches."
		];
i++;	
		
//Improved Disarm - Protection
rank[i]=[
"Réduit le temps de recharge de votre technique Désarmement de 10 secondes et fait subir à la cible 5% de dégâts supplémentaires quand elle est désarmée.",
"Réduit le temps de recharge de votre technique Désarmement de 20 secondes et fait subir à la cible 10% de dégâts supplémentaires quand elle est désarmée."
		];
i++;	


//Puncture - Protection
rank[i]=[
"Réduit le coût en rage de vos techniques Fracasser armure et Dévaster de 1.",
"Réduit le coût en rage de vos techniques Fracasser armure et Dévaster de 2.",
"Réduit le coût en rage de vos techniques Fracasser armure et Dévaster de 3."
		];
i++;	

//Improved Disciplines - Protection
rank[i]=[
"Réduit le temps de recharge de vos techniques Mur protecteur, Représailles et Témérité de 30 sec.",
"Réduit le temps de recharge de vos techniques Mur protecteur, Représailles et Témérité de 60 sec."
		];
i++;	


//Concussion Blow - Protection
rank[i]=[
		"<span style=text-align:left;float:left;>15 points de rage</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Requiert une arme de mêlée<br>Etourdit l'adversaire pendant 5 sec et lui inflige 426 points de dégâts (en fonction de la puissance d'attaque)."
		];
i++;	

//Gag Order - Protection
rank[i]=[
"Confère à vos techniques Coup de bouclier et Lancer héroïque 50% de chances de réduire la cible au silence pendant 3 sec et augmente les dégâts de votre technique Heurt de bouclier de 5%.",
"Confère à vos techniques Coup de bouclier et Lancer héroïque 100% de chances de réduire la cible au silence pendant 3 sec et augmente les dégâts de votre technique Heurt de bouclier de 10%."
		];
i++;	



//One-Handed Weapon Specialization - Protection
rank[i]=[
"Augmente de 2% les dégâts physiques que vous infligez quand une arme de mêlée à une main est équipée.",
"Augmente de 4% les dégâts physiques que vous infligez quand une arme de mêlée à une main est équipée.",
"Augmente de 6% les dégâts physiques que vous infligez quand une arme de mêlée à une main est équipée.",
"Augmente de 8% les dégâts physiques que vous infligez quand une arme de mêlée à une main est équipée.",
"Augmente de 10% les dégâts physiques que vous infligez quand une arme de mêlée à une main est équipée."
		];
i++;	

//Improved Defensive Stance - Protection
rank[i]=[
"Lorsque vous êtes en posture défensive, tous les dégâts des sorts sont réduits de 3% et lorsque vous parez, bloquez ou esquivez une attaque, vous avez 50% de chances d'enrager, ce qui augmente les dégâts de mêlée infligés de 5% pendant 12 sec.",
"Lorsque vous êtes en posture défensive, tous les dégâts des sorts sont réduits de 6% et lorsque vous parez, bloquez ou esquivez une attaque, vous avez 100% de chances d'enrager, ce qui augmente les dégâts de mêlée infligés de 10% pendant 12 sec."
		];
i++;	

//Vigilance - Protection
rank[i]=[
		"<span style=text-align:left;float:left;>30 m de portée</span><br><span style=text-align:left;float:left;>Instantané</span><br>Focalise votre regard protecteur sur une cible appartenant au groupe ou raid, ce qui réduit les dégâts qu'elle subit de 3% et vous transfère 10% de la menace qu'elle génère. De plus, chaque fois qu'elle est touchée par une attaque, le temps de recharge de votre Provocation prend fin. Dure 30 min. Une seule cible à la fois peut bénéficier de cet effet."
		];
i++;	

//Focussed Rage - Protection - TALENT DIFFERENT - name and ranks
rank[i]=[
"Réduit le coût en rage de vos techniques offensives de 1.",
"Réduit le coût en rage de vos techniques offensives de 2.",
"Réduit le coût en rage de vos techniques offensives de 3.",
		];
i++;	

//Vitality - Protection
rank[i]=[
"Augmente votre total de Force et d'Endurance de 2% et votre expertise de 2.",
"Augmente votre total de Force et d'Endurance de 4% et votre expertise de 4.",
"Augmente votre total de Force et d'Endurance de 6% et votre expertise de 6."
		];
i++;	

//Safeguard - Protection
rank[i] = [
"Réduit les dégâts subis par la cible de votre technique Intervention de 15% pendant 6 sec.",
"Réduit les dégâts subis par la cible de votre technique Intervention de 30% pendant 6 sec."
		];
i++;
		
		
//Warbringer - Protection
rank[i] = [
"Votre technique Charge est à présent utilisable en combat et avec n'importe quelle posture. De plus, vos techniques Charge, Interception et Intervention dissipent tous les effets affectant le déplacement."
		];
i++;

//Devastate - Protection - TALENT DIFFERENT - cost changed and trainable ranks removed
rank[i]=[
		"<span style=text-align:left;float:left;>15 points de rage</span><span style=text-align:right;float:right;>Allonge</span><br>Instantané<br>Requiert une arme de mêlée à une main<br>Fracasse l'armure de la cible, provoquant l'effet Fracasser armure. De plus, inflige 50% des dégâts de l'arme plus 101 pour chaque utilisation de Fracasser armure sur la cible. L'effet de fracassement d'armure peut être cumulé jusqu'à 5 fois.<br><br>\
		&nbsp;Talent à plusieurs rangs"
		];
i++;	

//Critical Block - Arms	
rank[i] = [
"Vos blocages réussis ont 10% de chances de bloquer le double du montant normal et ils augmentent vos chances d'infliger un coup critique avec votre technique Heurt de bouclier de 5% supplémentaires.",
"Vos blocages réussis ont 20% de chances de bloquer le double du montant normal et ils augmentent vos chances d'infliger un coup critique avec votre technique Heurt de bouclier de 10% supplémentaires.",
"Vos blocages réussis ont 30% de chances de bloquer le double du montant normal et ils augmentent vos chances d'infliger un coup critique avec votre technique Heurt de bouclier de 15% supplémentaires."
		];
i++;

//Sword and Board - Protection
rank[i]=[
"Augmente les chances de coup critique de votre technique Dévaster de 5% et quand votre technique Dévaster ou Vengeance inflige des dégâts, elle a 10% de chances de mettre fin au temps de recharge de votre technique Heurt de bouclier et de réduire son coût de 100% pendant 5 sec.",
"Augmente les chances de coup critique de votre technique Dévaster de 10% et quand votre technique Dévaster ou Vengeance inflige des dégâts, elle a 20% de chances de mettre fin au temps de recharge de votre technique Heurt de bouclier et de réduire son coût de 100% pendant 5 sec.",
"Augmente les chances de coup critique de votre technique Dévaster de 15% et quand votre technique Dévaster ou Vengeance inflige des dégâts, elle a 30% de chances de mettre fin au temps de recharge de votre technique Heurt de bouclier et de réduire son coût de 100% pendant 5 sec."
		];
i++;

//Damage Shield - Protection
rank[i] = [
"Chaque fois qu'une attaque en mêlée vous inflige des dégâts ou que vous la bloquez, vous infligez un montant de dégâts égal à 10% de votre valeur de blocage.",
"Chaque fois qu'une attaque en mêlée vous inflige des dégâts ou que vous la bloquez, vous infligez un montant de dégâts égal à 20% de votre valeur de blocage."
		];
i++;

//Shockwave - Prtection
rank[i] = [
"<span style=text-align:left;float:left;>15 points de rage</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>20 sec de recharge</span><br>Envoie une onde de force devant le guerrier, qui inflige 449 points de dégâts (en fonction de la puissance d'attaque) et étourdit toutes les cibles ennemies se trouvant à moins de 10 mètres dans un cône devant lui pendant 4 sec."
		];		
i++;
		
//Protection Talents End^^

