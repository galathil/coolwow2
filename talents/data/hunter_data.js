var i = 0;

var t = 0;

var className = "Talents de Chasseur";
var talentPath = "/info/basics/talents/";

tree[i] = "Maîtrise des bêtes"; i++;
tree[i] = "Précision"; i++;
tree[i] = "Survie"; i++;

i = 0;
talent[i] = [0, "Aspect du faucon amélioré", 5, 2, 1]; i++;
talent[i] = [0, "Entraînement à l'Endurance", 5, 3, 1]; i++;
talent[i] = [0, "Feu focalisé", 2, 1, 2]; i++;
talent[i] = [0, "Aspect du singe amélioré", 3, 2, 2]; i++; 
talent[i] = [0, "Peau épaisse", 3, 3, 2]; i++;
talent[i] = [0, "Ressusciter le familier amélioré", 2, 4, 2]; i++;
talent[i] = [0, "Science des chemins", 2, 1, 3]; i++;
talent[i] = [0, "Maîtrise des aspects", 1, 2, 3]; i++;
talent[i] = [0, "Fureur libérée", 5, 3, 3]; i++;
talent[i] = [0, "Guérison du familier améliorée", 2, 2, 4]; i++;
talent[i] = [0, "Ferocité", 5, 3, 4]; i++;
talent[i] = [0, "Engagement spirituel", 2, 1, 5]; i++;
talent[i] = [0, "Intimidation", 1, 2, 5]; i++;
talent[i] = [0, "Discipline bestiale", 2, 4, 5]; i++;
talent[i] = [0, "Dresseur", 2, 1, 6]; i++;
talent[i] = [0, "Frénésie", 5, 3, 6, [getTalentID("Ferocité"),5]]; i++;
talent[i] = [0, "Inspiration féroce", 3, 1, 7]; i++;
talent[i] = [0, "Courroux bestial", 1, 2, 7, [getTalentID("Intimidation"),1]]; i++;
talent[i] = [0, "Réflexes félins", 3, 3, 7]; i++;
talent[i] = [0, "Revigoration", 2, 1, 8, [getTalentID("Inspiration féroce"),3]]; i++;
talent[i] = [0, "Rapidité du serpent", 5, 3, 8]; i++;
talent[i] = [0, "Longévité", 3, 1, 9]; i++;
talent[i] = [0, "La bête intérieure", 1, 2, 9, [getTalentID("Courroux bestial"),1]]; i++;
talent[i] = [0, "Frappes de cobra", 3, 3, 9, [getTalentID("Rapidité du serpent"),5]]; i++;
talent[i] = [0, "Ames soeurs", 5, 2, 10]; i++;
talent[i] = [0, "Maîtrise des bêtes", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//marksmanship talents
talent[i] = [1, "Trait de choc amélioré", 2, 1, 1]; i++;
talent[i] = [1, "Visée focalisée", 3, 2, 1]; i++;
talent[i] = [1, "Coups fatals", 5, 3, 1]; i++;
talent[i] = [1, "Visée minutieuse", 3, 1, 2]; i++;
talent[i] = [1, "Marque du chasseur améliorée", 3, 2, 2]; i++;
talent[i] = [1, "Coups mortels", 5, 3, 2]; i++;
talent[i] = [1, "À la gorge", 2, 1, 3]; i++;
talent[i] = [1, "Tir des arcanes amélioré", 3, 2, 3]; i++;
talent[i] = [1, "Visée", 1, 3, 3, [getTalentID("Coups mortels"),5]]; i++;
talent[i] = [1, "Tueur rapide", 2, 4, 3]; i++;
talent[i] = [1, "Morsures et piqûres améliorées", 3, 2, 4]; i++;
talent[i] = [1, "Efficacité", 5, 3, 4]; i++;
talent[i] = [1, "Barrage commotionnant", 3, 1, 5]; i++;
talent[i] = [1, "Promptitude", 1, 2, 5]; i++;
talent[i] = [1, "Barrage", 3, 3, 5]; i++;
talent[i] = [1, "Expérience du combat", 2, 1, 6]; i++;
talent[i] = [1, "Spécialisation Armes à distance", 5, 4, 6]; i++;
talent[i] = [1, "Tirs perforants", 3, 1, 7]; i++;
talent[i] = [1, "Aura de précision", 1, 2, 7, [getTalentID("Promptitude"),1]]; i++;
talent[i] = [1, "Barrage amélioré", 3, 3, 7, [getTalentID("Barrage"),3]]; i++;
talent[i] = [1, "Maître tireur", 5, 2, 8]; i++;
talent[i] = [1, "Recouvrement rapide", 2, 3, 8]; i++;
talent[i] = [1, "Carquois sauvage", 3, 1, 9]; i++;
talent[i] = [1, "Flèche-bâillon", 1, 2, 9, [getTalentID("Maître tireur"),5]]; i++;
talent[i] = [1, "Tir assuré amélioré", 3, 3, 9]; i++;
talent[i] = [1, "Désigné pour mourir", 5, 2, 10]; i++;
talent[i] = [1, "Tir de la chimère", 1, 2, 11]; i++;

treeStartStop[t] = i -1;
t++;

//survival talents
talent[i] = [2, "Pistage amélioré", 5, 1, 1]; i++;
talent[i] = [2, "Œil de faucon", 3, 2, 1]; i++;
talent[i] = [2, "Frappes sauvages", 2, 3, 1]; i++;
talent[i] = [2, "Pied sûr", 3, 1, 2]; i++;
talent[i] = [2, "Piège", 3, 2, 2]; i++;
talent[i] = [2, "Coupure d'ailes améliorée", 3, 3, 2]; i++;
talent[i] = [2, "Instincts de survie", 2, 4, 2]; i++;
talent[i] = [2, "Survivant", 5, 1, 3]; i++;
talent[i] = [2, "Flèche de dispersion", 1, 2, 3]; i++;
talent[i] = [2, "Déviation", 3, 3, 3]; i++;
talent[i] = [2, "Tactique de survie", 2, 4, 3]; i++;
talent[i] = [2, "T.N.T.", 3, 2, 4]; i++;
talent[i] = [2, "Prêt à tirer", 3, 4, 4]; i++;
talent[i] = [2, "Face à la nature", 3, 1, 5, [getTalentID("Survivant"),5]]; i++;
talent[i] = [2, "Instinct du tueur", 3, 2, 5]; i++;
talent[i] = [2, "Contre-attaque", 1, 3, 5, [getTalentID("Déviation"),3]]; i++;
talent[i] = [2, "Réflexes éclairs", 5, 1, 6]; i++;
talent[i] = [2, "Ressource", 3, 3, 6]; i++;
talent[i] = [2, "Perce-faille", 3, 1, 7, [getTalentID("Réflexes éclairs"),5]]; i++;
talent[i] = [2, "Piqûre de wyverne", 1, 2, 7, [getTalentID("Instinct du tueur"),3]]; i++;
talent[i] = [2, "Frisson de la chasse", 3, 3, 7]; i++;
talent[i] = [2, "Maître tacticien", 5, 1, 8]; i++;
talent[i] = [2, "Piqûres nocives", 3, 2, 8, [getTalentID("Piqûre de wyverne"),1]]; i++;
talent[i] = [2, "Plus d'échappatoire", 2, 1, 9]; i++;
talent[i] = [2, "Maîtrise des pièges", 1, 2, 9]; i++;
talent[i] = [2, "Entraînement de sniper", 3, 4, 9]; i++;
talent[i] = [2, "Partie de chasse", 5, 3, 10, [getTalentID("Frisson de la chasse"),3]]; i++;
talent[i] = [2, "Tir explosif", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

i = 0;

//Beast Mastery Talents Begin

//Improved Aspect of the Hawk - Beast Mastery
rank[i] = [
"Pendant qu'Aspect du faucon ou Aspect du faucon-dragon est activé, toutes les attaques à distance normales ont 10% de chances d'augmenter la vitesse d'attaque à distance de 3% pendant 12 sec.",
"Pendant qu'Aspect du faucon ou Aspect du faucon-dragon est activé, toutes les attaques à distance normales ont 10% de chances d'augmenter la vitesse d'attaque à distance de 6% pendant 12 sec.",
"Pendant qu'Aspect du faucon ou Aspect du faucon-dragon est activé, toutes les attaques à distance normales ont 10% de chances d'augmenter la vitesse d'attaque à distance de 9% pendant",
"Pendant qu'Aspect du faucon ou Aspect du faucon-dragon est activé, toutes les attaques à distance normales ont 10% de chances d'augmenter la vitesse d'attaque à distance de 12% pendant 12 sec.",
"Pendant qu'Aspect du faucon ou Aspect du faucon-dragon est activé, toutes les attaques à distance normales ont 10% de chances d'augmenter la vitesse d'attaque à distance de 15% pendant 12 sec."
		];
i++;		
		
//Endurance Training - Beast Mastery
rank[i] = [
"Augmente les points de vie de votre familier de 2% et votre total de points de vie de 1%.",
"Augmente les points de vie de votre familier de 4% et votre total de points de vie de 2%.",
"Augmente les points de vie de votre familier de 6% et votre total de points de vie de 3%.",
"Augmente les points de vie de votre familier de 8% et votre total de points de vie de 4%.",
"Augmente les points de vie de votre familier de 10% et votre total de points de vie de 5%."
		];
i++;		

//Focused Fire - Beast Mastery
rank[i] = [
"Tous les dégâts que vous infligez sont augmentés de 1% tant que votre familier est actif et les chances de coup critique des techniques spéciales de votre familier sont augmentées de 10% tant qu'Ordre de tuer est actif.",
"Tous les dégâts que vous infligez sont augmentés de 2% tant que votre familier est actif et les chances de coup critique des techniques spéciales de votre familier sont augmentées de 20% tant qu'Ordre de tuer est actif."
		];
i++;		
		
//Improved Aspect of the Monkey - Beast Mastery
rank[i] = [
"Augmente le bonus d'Esquive conféré par Aspect du singe de 2%.",
"Augmente le bonus d'Esquive conféré par Aspect du singe de 4%.",
"Augmente le bonus d'Esquive conféré par Aspect du singe de 6%."
		];
i++;		

//Thick Hide - Beast Mastery
rank[i] = [
"Augmente le score d'armure de vos familiers de 7% et la valeur d'armure que vous apportent les objets de 4%.",
"Augmente le score d'armure de vos familiers de 14% et la valeur d'armure que vous apportent les objets de 7%.",
"Augmente le score d'armure de vos familiers de 20% et la valeur d'armure que vous apportent les objets de 10%.",

		];
i++;		

//Improved Revive Pet - Beast Mastery
rank[i] = [
"Le temps d'incantation du sort Ressusciter le familier est réduit de 3 sec., son coût en mana est diminué de 20% et le familier revient avec 15% de points de vie supplémentaires.",
"Le temps d'incantation du sort Ressusciter le familier est réduit de 6 sec., son coût en mana est diminué de 40% et le familier revient avec 30% de points de vie supplémentaires."
		];
i++;		


//Pathfinding - Beast Mastery
rank[i] = [
"Augmente le bonus de vitesse de vos Aspects de la meute et du guépard de 4% et augmente la vitesse de votre monture de 5%. Ne se cumule pas avec les autres effets d'augmentation de vitesse de la monture.",
"Augmente le bonus de vitesse de vos Aspects de la meute et du guépard de 8% et augmente la vitesse de votre monture de 10%. Ne se cumule pas avec les autres effets d'augmentation de vitesse de la monture."
		];
i++;	

		
//Aspect Mastery - Beast Mastery
rank[i] = [
"Aspect de la vipère - Réduit la pénalité aux dégâts de $10%.<br/><br/>Aspect du singe - Réduit les dégâts que vous subissez pendant qu'il est actif de 5%.<br/><br/>Aspect du faucon - Augmente le bonus à la puissance d'attaque de 30%.<br/><br/>Aspect du faucon-dragon - Combine les bonus des aspects du singe et du faucon.",
		];		
i++;		


//Unleashed Fury - Beast Mastery
rank[i] = [ 
"Augmente les dégâts infligés par vos familiers de 4%.",
"Augmente les dégâts infligés par vos familiers de 8%.",
"Augmente les dégâts infligés par vos familiers de 12%.",
"Augmente les dégâts infligés par vos familiers de 16%.",
"Augmente les dégâts infligés par vos familiers de 20%."
		];
i++;		
	

//Improved Mend Pet - Beast Mastery
rank[i] = [ 
"Réduit le coût en mana de votre sort Guérison du familier de 10% et lui donne 25% de chances de faire disparaître 1 effet(s) de malédiction, maladie, magie ou poison du familier à chaque itération.",
"Réduit le coût en mana de votre sort Guérison du familier de 20% et lui donne 50% de chances de faire disparaître 1 effet(s) de malédiction, maladie, magie ou poison du familier à chaque itération."
		];
i++;	

//Ferocity - Beast Mastery
rank[i] = [
"Augmente de 2% les chances de votre familier d'infliger un coup critique.",
"Augmente de 4% les chances de votre familier d'infliger un coup critique.",
"Augmente de 6% les chances de votre familier d'infliger un coup critique.",
"Augmente de 8% les chances de votre familier d'infliger un coup critique.",
"Augmente de 10% les chances de votre familier d'infliger un coup critique."

		];
i++;		

//Spirit Bond - Beast Mastery 
rank[i] = [
"Tant que votre familier est actif, vous et votre familier retrouvez 1% du total de vos points de vie toutes les 10 sec., et les soins prodigués à vous-même et à votre familier sont augmentés de 5%.",
"Tant que votre familier est actif, vous et votre familier retrouvez 2% du total de vos points de vie toutes les 10 sec., et les soins prodigués à vous-même et à votre familier sont augmentés de 10%."
		];
i++;

//Intimidation - Beast Mastery TALENT DIFFERENT
rank[i] = [
		"<span style=text-align:left;float:left;>8% en mana de base</span><span style=text-align:right;float:right;>100 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>1 min de recharge</span><br>Ordonne à votre familier d'intimider la cible à la prochaine attaque en mêlée réussie, générant un haut niveau de menace et étourdissant la cible pendant 3 sec."
		];
i++;		

//Bestial Discipline - Beast Mastery
rank[i] = [
"Augmente de 50% la régénération de focalisation de vos Familiers.",
"Augmente de 100% la régénération de focalisation de vos Familiers."
		];
i++;		

//Animal Handler - Beast Mastery
rank[i] = [
"Augmente de 5 l'expertise de votre familier et réduit le temps de recharge de votre technique Appel du maître de 5 sec.",
"Augmente de 10 l'expertise de votre familier et réduit le temps de recharge de votre technique Appel du maître de 10 sec."
		];
i++;		

//Frenzy - Beast Mastery
rank[i] = [
"Confère à votre familier 20% de chances de bénéficier d'un bonus de 30% à la vitesse d'attaque pendant 8 sec. après qu'il a infligé un coup critique.",
"Confère à votre familier 40% de chances de bénéficier d'un bonus de 30% à la vitesse d'attaque pendant 8 sec. après qu'il a infligé un coup critique.",
"Confère à votre familier 60% de chances de bénéficier d'un bonus de 30% à la vitesse d'attaque pendant 8 sec. après qu'il a infligé un coup critique.",
"Confère à votre familier 80% de chances de bénéficier d'un bonus de 30% à la vitesse d'attaque pendant 8 sec. après qu'il a infligé un coup critique.",
"Confère à votre familier 100% de chances de bénéficier d'un bonus de 30% à la vitesse d'attaque pendant 8 sec. après qu'il a infligé un coup critique."

		];		
i++;		

//Ferocious Inspiration - Beast Mastery
rank[i] = [
"Quand votre familier réussit un coup critique, les dégâts infligés par tous les membres du groupe augmentent de 1% pendant 10 sec.",
"Quand votre familier réussit un coup critique, les dégâts infligés par tous les membres du groupe augmentent de 2% pendant 10 sec.",
"Quand votre familier réussit un coup critique, les dégâts infligés par tous les membres du groupe augmentent de 3% pendant 10 sec."

		];		
i++;		

//Bestial Wrath - Beast Mastery	TALENT DIFFERENT
rank[i] = [
		"<span style=text-align:left;float:left;>10% en mana de base</span><span style=text-align:right;float:right;>100 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>2 min de recharge</span><br>Votre familier, fou de rage, inflige 50% de points de dégâts supplémentaires pendant 18 sec. Lorsqu’il est dans cet état, il n'éprouve ni pitié, ni remords, ni peur et ne peut plus être arrêté à moins d'être tué."
		];
i++;		

//Catlike Reflexes - Beast Mastery
rank[i] = [
"Augmente vos chances d'esquiver de 1% et celles de votre familier de 3% supplémentaires.",
"Augmente vos chances d'esquiver de 2% et celles de votre familier de 6% supplémentaires.",
"Augmente vos chances d'esquiver de 3% et celles de votre familier de 9% supplémentaires."
		];		
i++;

//Invigoration - Beast Mastery
rank[i] = [ 
"Quand votre familier réussit un coup critique avec une technique spéciale, vous avez 50% de chances de récupérer instantanément 1% de votre mana.",
"Quand votre familier réussit un coup critique avec une technique spéciale, vous avez 100% de chances de récupérer instantanément 1% de votre mana."
		];
i++;	

//Serpent's Swiftness - Beast Mastery
rank[i] = [
"Augmente votre vitesse d'attaque en combat à distance de 4% et la vitesse d'attaque en mêlée de votre familier de 4%.",
"Augmente votre vitesse d'attaque en combat à distance de 8% et la vitesse d'attaque en mêlée de votre familier de 8%.",
"Augmente votre vitesse d'attaque en combat à distance de 12% et la vitesse d'attaque en mêlée de votre familier de 12%.",
"Augmente votre vitesse d'attaque en combat à distance de 16% et la vitesse d'attaque en mêlée de votre familier de 16%.",
"Augmente votre vitesse d'attaque en combat à distance de 20% et la vitesse d'attaque en mêlée de votre familier de 20%."
		];		
i++;

//Longevity - Beast Mastery
rank[i] = [
"Réduit le temps de recharge de Courroux bestial, Intimidation et des techniques spéciales de familier de 10%.",
"Réduit le temps de recharge de Courroux bestial, Intimidation et des techniques spéciales de familier de 20%.",
"Réduit le temps de recharge de Courroux bestial, Intimidation et des techniques spéciales de familier de 30%."
		];		
i++;

//The Beast Within - Beast Mastery
rank[i] = [
"Lorsque votre familier est sous l'effet de Courroux bestial, vous aussi devenez fou de rage. Vous infligez 10% de points de dégâts supplémentaires et le coût en mana de tous vos sorts est réduit de 20% pendant 18 sec. Tant que vous êtes dans cet état, vous n'éprouvez ni pitié, ni remords, ni peur, et vous ne pouvez plus être arrêté à moins d'être tué."
		];		
i++;

//Cobra Strikes - Beast Mastery
rank[i] = [
"Lorsque vous réussissez un coup critique avec Tir des arcanes, Tir assuré ou Tir mortel, vous avez 20% de chances de permettre aux 2 prochaines attaques spéciales de votre familier d'être des coups critiques.",
"Lorsque vous réussissez un coup critique avec Tir des arcanes, Tir assuré ou Tir mortel, vous avez 40% de chances de permettre aux 2 prochaines attaques spéciales de votre familier d'être des coups critiques.",
"Lorsque vous réussissez un coup critique avec Tir des arcanes, Tir assuré ou Tir mortel, vous avez 60% de chances de permettre aux 2 prochaines attaques spéciales de votre familier d'être des coups critiques."
		];		
i++;


//Kindred Spirits - Beast Mastery
rank[i]=[
"Increases your pet's damage by 4% and you and your pet's movement speed by 2% while your pet is active. This does not stack with other movement speed increasing effects.",
"Increases your pet's damage by 8% and you and your pet's movement speed by 4% while your pet is active. This does not stack with other movement speed increasing effects.",
"Increases your pet's damage by 12% and you and your pet's movement speed by 6% while your pet is active. This does not stack with other movement speed increasing effects.",
"Increases your pet's damage by 16% and you and your pet's movement speed by 8% while your pet is active. This does not stack with other movement speed increasing effects.",
"Increases your pet's damage by 20% and you and your pet's movement speed by 10% while your pet is active. This does not stack with other movement speed increasing effects."
		];
i++;

//Beast Mastery - Beast Mastery
rank[i] = [
"Vous maîtrisez l'art de la maîtrise des bêtes, ce qui vous permet de dompter les familiers exotiques et augmente votre montant total de points en compétence de familiers de 4."
		];		
i++;

// MARKSMANSHIP----------------------------------------------------------------->
//Improved Concussive Shot - Marksmanship
rank[i] = [
"Augmente la durée de l'effet d'hébétement de votre Trait de choc de 1 sec.",
"Augmente la durée de l'effet d'hébétement de votre Trait de choc de 2 sec."
		];
i++;

//Focused Aim - Marksmanship
rank[i] = [
"Réduit de 23% l'interruption causée par les attaques infligeant des dégâts pendant que vous lancez Tir assuré et augmente de 1% les chances de toucher.",
"Réduit de 46% l'interruption causée par les attaques infligeant des dégâts pendant que vous lancez Tir assuré et augmente de 2% les chances de toucher.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous lancez Tir assuré et augmente de 3% les chances de toucher."
		];
i++;

//Lethal Shots - Marksmanship 
rank[i] = [
"Augmente vos chances d'infliger un coup critique avec vos armes à distance de 1%.",
"Augmente vos chances d'infliger un coup critique avec vos armes à distance de 2%.",
"Augmente vos chances d'infliger un coup critique avec vos armes à distance de 3%.",
"Augmente vos chances d'infliger un coup critique avec vos armes à distance de 4%.",
"Augmente vos chances d'infliger un coup critique avec vos armes à distance de 5%."
		];		
i++;	

//Careful Aim - Marksmanship 
rank[i]=[
"Augmente votre puissance d'attaque à distance d'un montant égal à 33% de votre total d'Intelligence.",
"Augmente votre puissance d'attaque à distance d'un montant égal à 66% de votre total d'Intelligence.",
"Augmente votre puissance d'attaque à distance d'un montant égal à 100% de votre total d'Intelligence."
		];
i++;	

//Improved Hunter's Mark - Marksmanship
rank[i] = [
"Augmente le bonus à la puissance d'attaque conféré par votre technique Marque du chasseur de 10% et réduit le coût en mana de votre technique Marque du chasseur de 33%.",
"Augmente le bonus à la puissance d'attaque conféré par votre technique Marque du chasseur de 20% et réduit le coût en mana de votre technique Marque du chasseur de 66%.",
"Augmente le bonus à la puissance d'attaque conféré par votre technique Marque du chasseur de 30% et réduit le coût en mana de votre technique Marque du chasseur de 100%."
		];
i++;

//Mortal Shots - Marksmanship
rank[i] = [
"Augmente le bonus de dégâts de vos coups critiques avec les armes à distance de 6%.",
"Augmente le bonus de dégâts de vos coups critiques avec les armes à distance de 12%.",
"Augmente le bonus de dégâts de vos coups critiques avec les armes à distance de 18%.",
"Augmente le bonus de dégâts de vos coups critiques avec les armes à distance de 24%.",
"Augmente le bonus de dégâts de vos coups critiques avec les armes à distance de 30%."
		];
i++;	



//Go for the Throat - Marksmanship
rank[i] = [
"Vos coups critiques à distance font générer à votre familier 25 points de focalisation.",
"Vos coups critiques à distance font générer à votre familier 50 points de focalisation."
		];
i++;

//Improved Arcane Shot - Marksmanship
rank[i] = [
		"Augmente les dégâts infligés par votre Tir des arcanes de 5%.",
		"Augmente les dégâts infligés par votre Tir des arcanes de 10%.",
		"Augmente les dégâts infligés par votre Tir des arcanes de 15%."
		];
i++;		

//Aimed Shot - Marksmanship TALENT DIFFERENT has trainable ranks
rank[i] = [
		"<span style=text-align:left;float:left;>8% en mana de base</span><span style=text-align:right;float:right;>5-35 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><BR><span style=text-align:left;float:left;>10 sec de recharge</span><br><br>Un tir précis qui augmente les points de dégâts infligés par votre attaque à distance de 408 et réduit les soins prodigués à cette cible de 50%. Dure 10 sec.<br><br>"
		];
i++;		

//Rapid Killing - Marksmanship TALENT DIFFERENT
rank[i] = [
		"Réduit le temps de recharge de votre technique Tir rapide de 1 min. De plus, lorsque vous tuez un adversaire qui vous rapporte de l'expérience ou de l'honneur, votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère inflige 10% de dégâts supplémentaires. Dure 20 sec.",
		"Réduit le temps de recharge de votre technique Tir rapide de 2 min. De plus, lorsque vous tuez un adversaire qui vous rapporte de l'expérience ou de l'honneur, votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère inflige 20% de dégâts supplémentaires. Dure 20 sec." 
		];
i++;		

//Improved Stings - Marksmanship
rank[i] = [
"Augmente les points de dégâts infligés par Morsure de serpent et Piqûre de wyverne de 10% et les points de mana drainés par votre Morsure de vipère de 10%. De plus, réduit la probabilité que vos morsures et piqûres soient dissipées de 10%.",
"Augmente les points de dégâts infligés par Morsure de serpent et Piqûre de wyverne de 20% et les points de mana drainés par votre Morsure de vipère de 20%. De plus, réduit la probabilité que vos morsures et piqûres soient dissipées de 20%.",
"Augmente les points de dégâts infligés par Morsure de serpent et Piqûre de wyverne de 30% et les points de mana drainés par votre Morsure de vipère de 30%. De plus, réduit la probabilité que vos morsures et piqûres soient dissipées de 30%."
		];
i++;		

//Efficiency - Marksmanship
rank[i] = [
"Réduit le coût en mana de vos Tirs, Morsures et Piqûres de 2%.",
"Réduit le coût en mana de vos Tirs, Morsures et Piqûres de 4%.",
"Réduit le coût en mana de vos Tirs, Morsures et Piqûres de 6%.",
"Réduit le coût en mana de vos Tirs, Morsures et Piqûres de 8%.",
"Réduit le coût en mana de vos Tirs, Morsures et Piqûres de 10%."
		];
i++;		

//Concussive Barrage - Marksmanship

rank[i] = [
		"Vos attaques réussies avec Tir automatique, Flèches multiples et Salve vous confèrent 2% de chances d'hébéter la cible pendant 4 sec.",
		"Vos attaques réussies avec Tir automatique, Flèches multiples et Salve vous confèrent 4% de chances d'hébéter la cible pendant 4 sec.",
		"Vos attaques réussies avec Tir automatique, Flèches multiples et Salve vous confèrent 6% de chances d'hébéter la cible pendant 4 sec."		
			];
i++;		
		
//Readiness - Marksmanship 
rank[i] = [
"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Quand on active cette technique, le temps de recharge de vos autres techniques de chasseur prend immédiatement fin."
		];
i++;		

//Barrage - Marksmanship
rank[i] = [
"Augmente les dégâts infligés par vos sorts Flèches multiples, Visée et Salve de 4%.",
"Augmente les dégâts infligés par vos sorts Flèches multiples, Visée et Salve de 8%.",
"Augmente les dégâts infligés par vos sorts Flèches multiples, Visée et Salve de 12%."
		];
i++;


//Combat Experience - Marksmanship TALENT DIFFERENT
rank[i] = [
		"Augmente votre total d'Agilité et votre total d'Intelligence de 2%.",
		"Augmente votre total d'Agilité et votre total d'Intelligence de 4%."
			];
i++;	
		
//Ranged Weapon Specialization - Marksmanship 
rank[i]=[
"Augmente les points de dégâts que vous infligez avec les armes à distance de 1%.",
"Augmente les points de dégâts que vous infligez avec les armes à distance de 2%.",
"Augmente les points de dégâts que vous infligez avec les armes à distance de 3%.",
"Augmente les points de dégâts que vous infligez avec les armes à distance de 4%.",
"Augmente les points de dégâts que vous infligez avec les armes à distance de 5%."
		];
i++;			

//Piercing Shots - Marksmanship 
rank[i]=[
"Vos techniques Tir assuré et Visée ignorent 2% de l'armure de votre cible.",
"Vos techniques Tir assuré et Visée ignorent 4% de l'armure de votre cible.",
"Vos techniques Tir assuré et Visée ignorent 6% de l'armure de votre cible."
		];
i++;	
	

//Trueshot Aura - Marksmanship 
rank[i]=[
		"Incantation immédiate<br>Augmente de 10% la puissance d'attaque des membres du groupe ou du raid qui se trouvent dans un rayon de 45 mètres. Dure jusqu’à annulation."
		];
i++;		

//Improved Barrage - Marksmanship TALENT DIFFERENT (first number 4/8/12)
rank[i]=[
"Augmente vos chances de réaliser un coup critique avec vos techniques Flèches multiples et Visée de 4% et réduit de 33% les interruptions causées par les attaques infligeant des dégâts pendant que vous canalisez Salve.",
"Augmente vos chances de réaliser un coup critique avec vos techniques Flèches multiples et Visée de 8% et réduit de 66% les interruptions causées par les attaques infligeant des dégâts pendant que vous canalisez Salve.",
"Augmente vos chances de réaliser un coup critique avec vos techniques Flèches multiples et Visée de 12% et réduit de 100% les interruptions causées par les attaques infligeant des dégâts pendant que vous canalisez Salve."
		];
i++;		

//Master Marksman - Marksmanship 
rank[i]=[
"Augmente vos chances de coup critique de 1% et réduit le coût en mana de votre Tir assuré de 5%.",
"Augmente vos chances de coup critique de 2% et réduit le coût en mana de votre Tir assuré de 10%.",
"Augmente vos chances de coup critique de 3% et réduit le coût en mana de votre Tir assuré de 15%.",
"Augmente vos chances de coup critique de 4% et réduit le coût en mana de votre Tir assuré de 20%.",
"Augmente vos chances de coup critique de 5% et réduit le coût en mana de votre Tir assuré de 25%."
		];
i++;	

//Rapid Recuperation - Marksmanship 
rank[i]=[
"Reduces the mana and focus cost of all shots and abilities by you and your pet by 30% while under the effect of Rapid Fire, and you gain 1% of your mana every 2 sec for 6 sec when you gain Rapid Killing.",
"Reduces the mana and focus cost of all shots and abilities by you and your pet by 60% while under the effect of Rapid Fire, and you gain 2% of your mana every 2 sec for 6 sec when you gain Rapid Killing."
		];
i++;	

//Wild Quiver - Marksmanship 
rank[i]=[
"Vous avez 4% de chances de réaliser un tir supplémentaire lorsque vous infligez des dégâts avec votre tir automatique, infligeant 50% de dégâts de Nature. Carquois sauvage ne consomme pas de munitions.",
"Vous avez 7% de chances de réaliser un tir supplémentaire lorsque vous infligez des dégâts avec votre tir automatique, infligeant 50% de dégâts de Nature. Carquois sauvage ne consomme pas de munitions.",
"Vous avez 10% de chances de réaliser un tir supplémentaire lorsque vous infligez des dégâts avec votre tir automatique, infligeant 50% de dégâts de Nature. Carquois sauvage ne consomme pas de munitions."
		];
i++;	

//Silencing Shot - Marksmanship TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>\
6% en mana de base</span><span style=text-align:right;float:right;>\
5-35 m de portée</span><br><span style=text-align:left;float:left;>\
Incantation immédiate</span><span style=text-align:right;float:right;>\
20 sec de recharge</span><br>\
		Un tir qui inflige 50% des dégâts de l'arme et réduit la cible au silence pendant 3 sec."
		];
i++;	

//Improved Steady Shot - Marksmanship TALENT DIFFERENT
rank[i]=[
"Vos Tirs assurés réussis ont 5% de chances d'augmenter les dégâts infligés par votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère de 15%, ainsi que de réduire le coût en mana de votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère de 20%.",
"Vos Tirs assurés réussis ont 10% de chances d'augmenter les dégâts infligés par votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère de 15%, ainsi que de réduire le coût en mana de votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère de 20%.",
"Vos Tirs assurés réussis ont 15% de chances d'augmenter les dégâts infligés par votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère de 15%, ainsi que de réduire le coût en mana de votre prochaine utilisation de Visée, Tir des arcanes ou Tir de la chimère de 20%."
		];
i++;	
	
//Marked for Death - Marksmanship TALENT DIFFERENT
rank[i]=[
"Augmente de 1% les dégâts infligés par vos tirs et par les techniques spéciales de votre familier sur les cibles marquées et augmente de 2% le bonus aux dégâts des coups critiques de Visée, Tir assuré, Tir mortel et Tir de la chimère.",
"Augmente de 2% les dégâts infligés par vos tirs et par les techniques spéciales de votre familier sur les cibles marquées et augmente de 4% le bonus aux dégâts des coups critiques de Visée, Tir assuré, Tir mortel et Tir de la chimère.",
"Augmente de 3% les dégâts infligés par vos tirs et par les techniques spéciales de votre familier sur les cibles marquées et augmente de 6% le bonus aux dégâts des coups critiques de Visée, Tir assuré, Tir mortel et Tir de la chimère.",
"Augmente de 4% les dégâts infligés par vos tirs et par les techniques spéciales de votre familier sur les cibles marquées et augmente de 8% le bonus aux dégâts des coups critiques de Visée, Tir assuré, Tir mortel et Tir de la chimère.",
"Augmente de 5% les dégâts infligés par vos tirs et par les techniques spéciales de votre familier sur les cibles marquées et augmente de 10% le bonus aux dégâts des coups critiques de Visée, Tir assuré, Tir mortel et Tir de la chimère."
];
i++;		
	
	
//Chimera Shot - Survival TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>16% en mana de base</span><span style=text-align:right;float:right;>5-35 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>10 sec de recharge</span><span style=text-align:left;float:left;>Arme à distance Requiert</span><br><br/>Vous infligez 125% des dégâts de l'arme, réinitialisez la piqûre ou morsure actuelle sur votre cible et déclenchez un effet :<br/><br/>Morsure de serpent - Inflige instantanément 40% des dégâts de votre Morsure de serpent.<br/><br/>Morsure de vipère - Vous rend instantanément un montant de mana égal à 60% du total drainé par votre Morsure de vipère.<br/><br/>Piqûre de scorpide - Tente de désarmer la cible pendant 10 sec. Cet effet ne peut se produire plus d'une fois par minute."
		];
i++;		
	
	
	
//SURVIVAL TAB--------------------------------------------------->

//Improved Tracking - Survival TALENT DIFFERENT
rank[i]=[
"Augmente de 1% tous les dégâts non périodiques infligés aux cibles traquées.",
"Augmente de 2% tous les dégâts non périodiques infligés aux cibles traquées.",
"Augmente de 3% tous les dégâts non périodiques infligés aux cibles traquées.",
"Augmente de 4% tous les dégâts non périodiques infligés aux cibles traquées.",
"Augmente de 5% tous les dégâts non périodiques infligés aux cibles traquées."
		];
i++;


//Hawk Eye - Survival
rank[i]=[
"Augmente la portée de vos armes à distance de 2 mètres.",
"Augmente la portée de vos armes à distance de 4 mètres.",
"Augmente la portée de vos armes à distance de 6 mètres."
		];
i++;

//Savage Strikes - Survival TALENT DIFFERENT
rank[i]=[
"Augmente de 10% les chances d'infliger un coup critique avec Attaque du raptor, Morsure de la mangouste et Contre-attaque.",
"Augmente de 20% les chances d'infliger un coup critique avec Attaque du raptor, Morsure de la mangouste et Contre-attaque."
		];
i++;

//Surefooted - Survival 
rank[i]=[
"Diminue la durée des effets affectant le mouvement de 10%.",
"Diminue la durée des effets affectant le mouvement de 20%.",
"Diminue la durée des effets affectant le mouvement de 30%."
		];
i++;	

//Entrapment - Survival
rank[i]=[
"Confère à vos Pièges d'immolation, Pièges de givre, Pièges explosifs et Pièges à serpent 8% de chances d'emprisonner la cible, l'empêchant de se déplacer pendant 4 sec.",
"Confère à vos Pièges d'immolation, Pièges de givre, Pièges explosifs et Pièges à serpent 16% de chances d'emprisonner la cible, l'empêchant de se déplacer pendant 4 sec.",
"Confère à vos Pièges d'immolation, Pièges de givre, Pièges explosifs et Pièges à serpent 25% de chances d'emprisonner la cible, l'empêchant de se déplacer pendant 4 sec."
		];
i++;

//Improved Wing Clip - Survival
rank[i]=[
"Confère à votre technique Coupure d'ailes 7% de chances d'immobiliser la cible pendant 5 sec.",
"Confère à votre technique Coupure d'ailes 14% de chances d'immobiliser la cible pendant 5 sec.",
"Confère à votre technique Coupure d'ailes 20% de chances d'immobiliser la cible pendant 5 sec."
		];
i++;	

//Survival Instincts - Survival
rank[i]=[
"Réduit tous les dégâts subis de 2% et augmente les chances de coup critique de vos Tirs des arcanes, Tirs assurés et Tirs explosifs de 2%. 2%.",
"Réduit tous les dégâts subis de 4% et augmente les chances de coup critique de vos Tirs des arcanes, Tirs assurés et Tirs explosifs de 4%. 4%."
		];
i++;
	
		
//Survivalist - Survival
rank[i]=[
"Augmente votre Endurance de 2%.",
"Augmente votre Endurance de 4%.",
"Augmente votre Endurance de 6%.",
"Augmente votre Endurance de 8%.",
"Augmente votre Endurance de 10%."
		];
i++;		

//Scatter Shot - Survival TALENT DIFFERENT
rank[i]=[
"<span style=text-align:left;float:left;>8% en mana de base</span><span style=text-align:right;float:right;>15 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>30 sec de recharge</span><br><span style=text-align:left;float:left;>Arme à distance Requiert</span><br/> Un tir à courte distance qui inflige 50% des dégâts de l'arme et désoriente la cible pendant 4 sec. Si la cible subit des dégâts, l'effet est annulé. Interrompt l'attaque lors de son utilisation."
		];
i++;	
		
	
//Deflection - Survival
rank[i]=[
"Augmente vos chances de Parer de 1% et réduit la durée de tous les effets de désarmement sur vous de 16%. Non cumulable avec les autres effets qui réduisent la durée du désarmement.",
"Augmente vos chances de Parer de 2% et réduit la durée de tous les effets de désarmement sur vous de 25%. Non cumulable avec les autres effets qui réduisent la durée du désarmement.",
"Augmente vos chances de Parer de 3% et réduit la durée de tous les effets de désarmement sur vous de 50%. Non cumulable avec les autres effets qui réduisent la durée du désarmement."
		];
i++;	

//Survival Tactics - Survival TALENT DIFFERENT
rank[i]=[
"Réduit la probabilité que l'on résiste à votre technique Feindre la mort et à tous vos sorts de pièges de 2% et réduit le temps de recharge de votre technique Désengagement de 2 sec.",
"Réduit la probabilité que l'on résiste à votre technique Feindre la mort et à tous vos sorts de pièges de 4% et réduit le temps de recharge de votre technique Désengagement de 4 sec."
		];
i++;	

		

//T.N.T. - Survival
rank[i]=[
"Piège d'immolation, Piège explosif et Tir explosif ont 5% de chances d'étourdir les cibles pendant 3 sec. quand ils atteignent leur cible. Augmente également les chances de coup critique de Tir explosif de 3%.",
"Piège d'immolation, Piège explosif et Tir explosif ont 10% de chances d'étourdir les cibles pendant 3 sec. quand ils atteignent leur cible. Augmente également les chances de coup critique de Tir explosif de 6%.",
"Piège d'immolation, Piège explosif et Tir explosif ont 15% de chances d'étourdir les cibles pendant 3 sec. quand ils atteignent leur cible. Augmente également les chances de coup critique de Tir explosif de 9%."
		];
i++;


//Lock and Load - Survival TALENT DIFFERENT (first numbers 33/66/100, second 2/4/6)
rank[i]=[
"Vous avez 33% de chances lorsque vous piégez une cible et 2% de chances lorsque vous infligez des dégâts périodiques avec votre Morsure de serpent que vos 2 prochains sorts Tir des arcanes ou Tir explosif ne déclenchent pas de temps de recharge, ne coûtent pas de mana et ne consomment pas de munitions.",
"Vous avez 66% de chances lorsque vous piégez une cible et 4% de chances lorsque vous infligez des dégâts périodiques avec votre Morsure de serpent que vos 2 prochains sorts Tir des arcanes ou Tir explosif ne déclenchent pas de temps de recharge, ne coûtent pas de mana et ne consomment pas de munitions.",
"Vous avez 100% de chances lorsque vous piégez une cible et 6% de chances lorsque vous infligez des dégâts périodiques avec votre Morsure de serpent que vos 2 prochains sorts Tir des arcanes ou Tir explosif ne déclenchent pas de temps de recharge, ne coûtent pas de mana et ne consomment pas de munitions.."
		];
i++;	

//Hunter vs. Wild - Survival
rank[i]=[
"Augmente votre puissance d'attaque et votre puissance d'attaque à distance, ainsi que celles de votre familier, d'un montant égal à 10% de votre total d'Endurance.",
"Augmente votre puissance d'attaque et votre puissance d'attaque à distance, ainsi que celles de votre familier, d'un montant égal à 20% de votre total d'Endurance.",
"Augmente votre puissance d'attaque et votre puissance d'attaque à distance, ainsi que celles de votre familier, d'un montant égal à 30% de votre total d'Endurance."
		];
i++;	


//Killer Instinct - Survival
rank[i]=[
"Augmente vos chances d'infliger un coup critique avec toutes vos attaques de 1%.",
"Augmente vos chances d'infliger un coup critique avec toutes vos attaques de 2%.",
"Augmente vos chances d'infliger un coup critique avec toutes vos attaques de 3%."
		];
i++;	


//Counterattack - Survival TALENT DIFFERNT has trainable ranks
rank[i]=[
		"<span style=text-align:left;float:left;>3% en mana de base</span><span style=text-align:right;float:right;>Allonge</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>5 sec de recharge</span><br>Une attaque disponible après avoir paré une attaque de l'adversaire. Elle inflige 40 points de dégâts et immobilise la cible pendant 5 sec. Contre-attaque ne peut pas être bloquée, esquivée ou parée.<br><br>"
		];
i++;	

//Lightning Reflexes - Survival
rank[i]=[
"Augmente votre Agilité de 3%.",
"Augmente votre Agilité de 6%.",
"Augmente votre Agilité de 9%.",
"Augmente votre Agilité de 12%.",
"Augmente votre Agilité de 15%."
		];
i++;

//Resourcefulness - Survival
rank[i]=[
"Réduit le coût en mana de tous les pièges et techniques de mêlée de 20% et réduit le temps de recharge de tous les pièges de 2 sec.",
"Réduit le coût en mana de tous les pièges et techniques de mêlée de 40% et réduit le temps de recharge de tous les pièges de 4 sec.",
"Réduit le coût en mana de tous les pièges et techniques de mêlée de 60% et réduit le temps de recharge de tous les pièges de 6 sec."
		];
i++;	

	
//Expose Weakness - Survival TALENT DIFFERENT
rank[i]=[
"Vos coups critiques à distance ont 33% de chances de vous faire bénéficier de Perce-faille. Perce-faille augmente votre puissance d'attaque de 25% de votre Agilité pendant 7 sec.",
"Vos coups critiques à distance ont 66% de chances de vous faire bénéficier de Perce-faille. Perce-faille augmente votre puissance d'attaque de 25% de votre Agilité pendant 7 sec.",
"Vos coups critiques à distance ont 100% de chances de vous faire bénéficier de Perce-faille. Perce-faille augmente votre puissance d'attaque de 25% de votre Agilité pendant 7 sec."
		];
i++;	



//Wyvern Sting - Survival TALENT DIFFERENT has trainable ranks
rank[i]=[
		"<span style=text-align:left;float:left;>8% en mana de base</span><span style=text-align:right;float:right;>5-35 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>1 min de recharge</span><br>Une piqûre qui endort la cible pendant 12 sec. Tout point de dégâts subi par la cible annule l'effet. Quand la cible se réveille, la Piqûre inflige 2460 points de dégâts de Nature en 6 sec. Une seule technique de Morsure ou de Piqûre par chasseur peut être active sur la cible en même temps.<br><br>"
		];
i++;	
	


//Thrill of the Hunt - Survival
rank[i]=[
"Vous confère 33% de chances de récupérer 40% du coût en mana de n'importe quel tir lorsqu'il inflige un coup critique.",
"Vous confère 66% de chances de récupérer 40% du coût en mana de n'importe quel tir lorsqu'il inflige un coup critique.",
"Vous confère 100% de chances de récupérer 40% du coût en mana de n'importe quel tir lorsqu'il inflige un coup critique."
		];
i++;


	
//Master Tactician - Survival
rank[i]=[
"Vos attaques à distance réussies ont 10% de chances d'augmenter vos chances de coup critique avec toutes les attaques de 2% pendant 8 sec.",
"Vos attaques à distance réussies ont 10% de chances d'augmenter vos chances de coup critique avec toutes les attaques de 4% pendant 8 sec.",
"Vos attaques à distance réussies ont 10% de chances d'augmenter vos chances de coup critique avec toutes les attaques de 6% pendant 8 sec.",
"Vos attaques à distance réussies ont 10% de chances d'augmenter vos chances de coup critique avec toutes les attaques de 8% pendant 8 sec.",
"Vos attaques à distance réussies ont 10% de chances d'augmenter vos chances de coup critique avec toutes les attaques de 10% pendant 8 sec."
		];
i++;

//Noxious Stings - Survival
rank[i]=[
"Si Piqûre de wyverne est dissipée, celui qui la dissipe est également affecté par Piqûre de wyverne pour une durée de 16% du temps restant. Augmente également tous les dégâts que vous infligez aux cibles affectées par votre Morsure de serpent de 1%.",
"Si Piqûre de wyverne est dissipée, celui qui la dissipe est également affecté par Piqûre de wyverne pour une durée de 25% du temps restant. Augmente également tous les dégâts que vous infligez aux cibles affectées par votre Morsure de serpent de 2%.",
"Si Piqûre de wyverne est dissipée, celui qui la dissipe est également affecté par Piqûre de wyverne pour une durée de 50% du temps restant. Augmente également tous les dégâts que vous infligez aux cibles affectées par votre Morsure de serpent de 3%."
		];
i++;

//Point of No Escape - Survival
rank[i]=[
"Augmente de 3% les chances de réussir un coup critique avec toutes les attaques sur les cibles affectées par vos Pièges de givre, Pièges givrants et Flèches givrantes.",
"Augmente de 6% les chances de réussir un coup critique avec toutes les attaques sur les cibles affectées par vos Pièges de givre, Pièges givrants et Flèches givrantes."
		];
i++;
	
//Trap Mastery - Survival
rank[i]=[
"Piège de givre et Piège givrant - Augmente la durée de 30%.<br/><br/>Piège d'immolation et Piège explosif - Augmente les dégâts infligés de 30%.<br/><br/>Piège à serpent - Augmente le nombre de serpents invoqués de 30%."
		];
i++;	
	
//Sniper Training - Survival
rank[i]=[
"Augmente les dégâts infligés par vos Tirs assurés, Visées et Flèches explosives de 2% si vous vous trouvez à 30 mètres ou plus de votre cible, et augmente les chances de coup critique de votre technique Tir mortel de 5%.",
"Augmente les dégâts infligés par vos Tirs assurés, Visées et Flèches explosives de 4% si vous vous trouvez à 30 mètres ou plus de votre cible, et augmente les chances de coup critique de votre technique Tir mortel de 10%.",
"Augmente les dégâts infligés par vos Tirs assurés, Visées et Flèches explosives de 6% si vous vous trouvez à 30 mètres ou plus de votre cible, et augmente les chances de coup critique de votre technique Tir mortel de 15%."
		];
i++;	

//Hunting Party - Survival
rank[i]=[
"Vos coups critiques réussis avec Tir des arcanes, Tir explosif et Tir assuré ont 20% de chances de faire bénéficier jusqu'à 10 membres du groupe ou raid d'une régénération de mana égale à 0,25% du maximum de mana par seconde. Dure 15 sec.",
"Vos coups critiques réussis avec Tir des arcanes, Tir explosif et Tir assuré ont 40% de chances de faire bénéficier jusqu'à 10 membres du groupe ou raid d'une régénération de mana égale à 0,25% du maximum de mana par seconde. Dure 15 sec.",
"Vos coups critiques réussis avec Tir des arcanes, Tir explosif et Tir assuré ont 60% de chances de faire bénéficier jusqu'à 10 membres du groupe ou raid d'une régénération de mana égale à 0,25% du maximum de mana par seconde. Dure 15 sec.",
"Vos coups critiques réussis avec Tir des arcanes, Tir explosif et Tir assuré ont 80% de chances de faire bénéficier jusqu'à 10 membres du groupe ou raid d'une régénération de mana égale à 0,25% du maximum de mana par seconde. Dure 15 sec.",
"Vos coups critiques réussis avec Tir des arcanes, Tir explosif et Tir assuré ont 100% de chances de faire bénéficier jusqu'à 10 membres du groupe ou raid d'une régénération de mana égale à 0,25% du maximum de mana par seconde. Dure 15 sec."
		];
i++;	

//Explosive Shot - Survival TALENT DIFFERENT
rank[i]=[
		"<span style=text-align:left;float:left;>7% en mana de base</span><span style=text-align:right;float:right;>5-35 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>6 sec de recharge</span><br>Arme à distance Requiert<br>Vous lancez une charge explosive sur la cible, infligeant 121-139 points de dégâts de Feu. La charge explose ensuite sur la cible toutes les secondes pendant 2 sec. Chaque charge inflige aussi 30-35 points de dégâts de Feu à tous les ennemis proches se trouvant à moins de 5 mètres de la cible."
		];
i++;	
	
//Survival Talents End^^

