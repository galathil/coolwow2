var i = 0;
var t = 0;

var className = "Talents de druide";
var talentPath = "/info/basics/talents/";

tree[i] = "Équilibre"; i++;
tree[i] = "Combat farouche"; i++;
tree[i] = "Restauration"; i++;

i = 0;

talent[i] = [0, "Colère stellaire", 5, 2, 1]; i++;
talent[i] = [0, "Genèse", 5, 3, 1]; i++;
talent[i] = [0, "Lueur de la lune", 3, 1, 2]; i++;
talent[i] = [0, "Majesté de la nature", 2, 2, 2]; i++;
talent[i] = [0, "Eclat lunaire amélioré", 2, 4, 2]; i++;
talent[i] = [0, "Ronces", 3, 1, 3]; i++;
talent[i] = [0, "Grâce de la nature", 3, 2, 3, [getTalentID("Majesté de la nature"),2]]; i++;
talent[i] = [0, "Splendeur de la nature", 1, 3, 3, [getTalentID("Majesté de la nature"),2]]; i++;
talent[i] = [0, "Allonge de la Nature", 2, 4, 3]; i++;
talent[i] = [0, "Vengeance", 5, 2, 4]; i++;
talent[i] = [0, "Focalisation céleste", 3, 3, 4]; i++;
talent[i] = [0, "Soutien lunaire", 3, 1, 5]; i++;
talent[i] = [0, "Essaim d'insectes", 1, 2, 5]; i++;
talent[i] = [0, "Essaim d'insectes amélioré", 3, 3, 5, [getTalentID("Essaim d'insectes"),1]]; i++;
talent[i] = [0, "Etat de rêve", 3, 1, 6]; i++;
talent[i] = [0, "Fureur lunaire", 3, 2, 6]; i++;
talent[i] = [0, "Equilibre de la puissance", 2, 3, 6]; i++;
talent[i] = [0, "Forme de sélénien", 1, 2, 7]; i++;
talent[i] = [0, "Forme de sélénien améliorée", 3, 3, 7, [getTalentID("Forme de sélénien"),1]]; i++;
talent[i] = [0, "Lucioles améliorées", 3, 4, 7]; i++;
talent[i] = [0, "Frénésie du chouettide", 3, 1, 8, [getTalentID("Forme de sélénien"),1]]; i++;
talent[i] = [0, "Colère de Cénarius", 5, 3, 8]; i++;
talent[i] = [0, "Eclipse", 3, 1, 9]; i++;
talent[i] = [0, "Typhon", 1, 2, 9, [getTalentID("Forme de sélénien"),1]]; i++;
talent[i] = [0, "Force de la nature", 1, 3, 9]; i++;
talent[i] = [0, "Grands vents", 2, 4, 9]; i++;
talent[i] = [0, "Terre et lune", 3, 2, 10]; i++;
talent[i] = [0, "Météores", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//feral combat talents
talent[i] = [1, "Férocité", 5, 2, 1]; i++;
talent[i] = [1, "Agressivité farouche", 5, 3, 1]; i++;
talent[i] = [1, "Instinct farouche", 3, 1, 2]; i++;
talent[i] = [1, "Furie sauvage", 2, 2, 2]; i++;
talent[i] = [1, "Peau épaisse", 3, 3, 2]; i++;
talent[i] = [1, "Célérité farouche", 2, 1, 3]; i++;
talent[i] = [1, "Instincts de survie", 1, 2, 3]; i++;
talent[i] = [1, "Griffes aiguisées", 3, 3, 3]; i++;
talent[i] = [1, "Attaques lacérantes", 2, 1, 4]; i++;
talent[i] = [1, "Frappes de prédateur", 3, 2, 4]; i++;
talent[i] = [1, "Fureur primitive", 2, 3, 4, [getTalentID("Griffes aiguisées"),3]]; i++;
talent[i] = [1, "Précision primale", 2, 4, 4, [getTalentID("Griffes aiguisées"),3]]; i++;
talent[i] = [1, "Impact brutal", 2, 1, 5]; i++;
talent[i] = [1, "Charge farouche", 1, 3, 5]; i++;
talent[i] = [1, "Instinct nourricier", 2, 4, 5]; i++;
talent[i] = [1, "Réaction naturelle", 3, 1, 6]; i++;
talent[i] = [1, "Effet de Cœur de fauve", 5, 2, 6, [getTalentID("Frappes de prédateur"),3]]; i++;
talent[i] = [1, "Survie du plus apte", 3, 3, 6]; i++;
talent[i] = [1, "Chef de la meute", 1, 2, 7]; i++;
talent[i] = [1, "Chef de la meute amélioré", 2, 3, 7, [getTalentID("Chef de la meute"),1]]; i++;
talent[i] = [1, "Ténacité primordiale", 3, 4, 7]; i++;
talent[i] = [1, "Protecteur de la meute", 3, 1, 8, [getTalentID("Chef de la meute"),1]]; i++;
talent[i] = [1, "Instincts de prédateur", 3, 3, 8]; i++;
talent[i] = [1, "Blessures infectées", 3, 4, 8]; i++;
talent[i] = [1, "Roi de la jungle", 3, 1, 9]; i++;
talent[i] = [1, "Mutilation", 1, 2, 9, [getTalentID("Chef de la meute"),1]]; i++;
talent[i] = [1, "Mutilation améliorée", 3, 3, 9, [getTalentID("Mutilation"),1]]; i++;
talent[i] = [1, "Pourfendre et déchirer", 5, 2, 10]; i++;
talent[i] = [1, "Berserk", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//restoration talents
talent[i] = [2, "Marque du fauve améliorée", 2, 1, 1]; i++;
talent[i] = [2, "Focalisation de la nature", 3, 2, 1]; i++;
talent[i] = [2, "Fureur", 5, 3, 1]; i++;
talent[i] = [2, "Naturaliste", 5, 1, 2]; i++;
talent[i] = [2, "Discrétion", 3, 2, 2]; i++;
talent[i] = [2, "Changeforme naturel", 3, 3, 2]; i++;
talent[i] = [2, "Intensité", 3, 1, 3]; i++;
talent[i] = [2, "Augure de clarté", 1, 2, 3]; i++;
talent[i] = [2, "Maître changeforme", 2, 3, 3, [getTalentID("Changeforme naturel"),3]]; i++;
talent[i] = [2, "Tranquillité de l'esprit", 5, 2, 4]; i++;
talent[i] = [2, "Récupération améliorée", 3, 3, 4]; i++;
talent[i] = [2, "Rapidité de la nature", 1, 1, 5, [getTalentID("Intensité"),3]]; i++;
talent[i] = [2, "Don de la Nature", 5, 2, 5]; i++;
talent[i] = [2, "Tranquillité améliorée", 2, 4, 5]; i++;
talent[i] = [2, "Toucher surpuissant", 2, 1, 6]; i++;
talent[i] = [2, "Rétablissement amélioré", 5, 3, 6, [getTalentID("Récupération améliorée"),3]]; i++;
talent[i] = [2, "Esprit vif", 3, 1, 7]; i++;
talent[i] = [2, "Prompte guérison", 1, 2, 7, [getTalentID("Don de la Nature"),5]]; i++;
talent[i] = [2, "Perfection naturelle", 3, 3, 7]; i++;
talent[i] = [2, "Récupération surpuissante", 5, 2, 8]; i++;
talent[i] = [2, "Graine de vie", 3, 3, 8]; i++;
talent[i] = [2, "Récupérer", 3, 1, 9]; i++;
talent[i] = [2, "Arbre de vie", 1, 2, 9, [getTalentID("Récupération surpuissante"),5]]; i++;
talent[i] = [2, "Arbre de vie amélioréfe", 3, 3, 9, [getTalentID("Arbre de vie"),1]]; i++;
talent[i] = [2, "Don de la Terre-mère", 5, 3, 10]; i++;
talent[i] = [2, "Croissance sauvage", 1, 2, 11, [getTalentID("Arbre de vie"),1]]; i++;

treeStartStop[t] = i -1;
t++;

i = 0;


//Balance Talents Begin---------------------------------------------------------------

//Starlight Wrath - Balance 
rank[i] = [
"Réduit le temps d'incantation de vos sorts Colère et Feu Stellaire de 0.1 sec.",
"Réduit le temps d'incantation de vos sorts Colère et Feu Stellaire de 0.2 sec.",
"Réduit le temps d'incantation de vos sorts Colère et Feu Stellaire de 0.3 sec.",
"Réduit le temps d'incantation de vos sorts Colère et Feu Stellaire de 0.4 sec.",
"Réduit le temps d'incantation de vos sorts Colère et Feu Stellaire de 0.5 sec."
		];
i++;

//Genesis - Balance 
rank[i] = [
"Augmente les dégâts et les soins produits par vos effets de dégâts et de soins périodiques de 1%.",
"Augmente les dégâts et les soins produits par vos effets de dégâts et de soins périodiques de 2%.",
"Augmente les dégâts et les soins produits par vos effets de dégâts et de soins périodiques de 3%.",
"Augmente les dégâts et les soins produits par vos effets de dégâts et de soins périodiques de 4%.",
"Augmente les dégâts et les soins produits par vos effets de dégâts et de soins périodiques de 5%."

];
i++;

//Moonglow - Balance
rank[i] = [
"Réduit de 3% le coût en mana de vos sorts Eclat lunaire, Feu stellaire, Météores, Colère, Toucher guérisseur, Rétablissement et Récupération.",
"Réduit de 6% le coût en mana de vos sorts Eclat lunaire, Feu stellaire, Météores, Colère, Toucher guérisseur, Rétablissement et Récupération.",
"Réduit de 9% le coût en mana de vos sorts Eclat lunaire, Feu stellaire, Météores, Colère, Toucher guérisseur, Rétablissement et Récupération."
		];		
i++;	
		

//Nature's Mastery - Balance 
rank[i] = [
"Augmente de 2% les chances d'infliger un coup critique avec vos sorts Colère, Feu stellaire, Météores, Nourrir et Toucher guérisseur.",
"Augmente de 4% les chances d'infliger un coup critique avec vos sorts Colère, Feu stellaire, Météores, Nourrir et Toucher guérisseur."
		];
i++;		

//Improved Moonfire - Balance
rank[i] = [
"Augmente les points de dégâts et les chances de porter un coup critique avec votre sort Eclat lunaire de 5%.",
"Augmente les points de dégâts et les chances de porter un coup critique avec votre sort Eclat lunaire de 10%."
		];
i++;		

//Brambles - Balance
rank[i] = [ 
"Les dégâts infligés par vos Epines et Sarments sont augmentés de 25% et les attaques de vos Tréants sont augmentées de 5%. De plus, les dégâts infligés par vos Tréants et les attaques avec Ecorce activé ont 5% de chances d'hébéter la cible pendant 3 sec.",
"Les dégâts infligés par vos Epines et Sarments sont augmentés de 50% et les attaques de vos Tréants sont augmentées de 10%. De plus, les dégâts infligés par vos Tréants et les attaques avec Ecorce activé ont 10% de chances d'hébéter la cible pendant 3 sec.",
"Les dégâts infligés par vos Epines et Sarments sont augmentés de 75% et les attaques de vos Tréants sont augmentées de 15%. De plus, les dégâts infligés par vos Tréants et les attaques avec Ecorce activé ont 15% de chances d'hébéter la cible pendant 3 sec."
		];
i++;		

//Nature's Grace - Balance
rank[i] = [
"Tous les coups critiques des sorts ont 33% de chances de vous octroyer une Bénédiction de la nature. Cette dernière réduit de 0.5 sec. le temps d'incantation de votre prochain sort.",
"Tous les coups critiques des sorts ont 66% de chances de vous octroyer une Bénédiction de la nature. Cette dernière réduit de 0.5 sec. le temps d'incantation de votre prochain sort.",
"Tous les coups critiques des sorts ont 100% de chances de vous octroyer une Bénédiction de la nature. Cette dernière réduit de 0.5 sec. le temps d'incantation de votre prochain sort."
		];
i++;	

//Nature's Splendor - Balance //UPDATED
rank[i] = [
"Augmente la durée de vos sorts Eclat lunaire et Récupération de 3 sec., Rétablissement de 6 sec. ainsi qu'Essaim d'insectes et Fleur de vie de 2 sec."
		];
i++;
	

//Nature's Reach - Balance
rank[i] = [
"Augmente la portée de vos sorts d'Équilibre et de la technique Lucioles (farouche) de 10%, et réduit la menace générée par vos sorts d'Equilibre de 15%.",
"Augmente la portée de vos sorts d'Équilibre et de la technique Lucioles (farouche) de 20%, et réduit la menace générée par vos sorts d'Equilibre de 30%."
		];
i++;		

//Vengeance - Balance
rank[i] = [
"Augmente de 20% le bonus de dégâts supplémentaires infligés par les coups critiques avec vos sorts Feu stellaire, Météores, Eclat lunaire et Colère.",
"Augmente de 40% le bonus de dégâts supplémentaires infligés par les coups critiques avec vos sorts Feu stellaire, Météores, Eclat lunaire et Colère.",
"Augmente de 60% le bonus de dégâts supplémentaires infligés par les coups critiques avec vos sorts Feu stellaire, Météores, Eclat lunaire et Colère.",
"Augmente de 80% le bonus de dégâts supplémentaires infligés par les coups critiques avec vos sorts Feu stellaire, Météores, Eclat lunaire et Colère.",
"Augmente de 100% le bonus de dégâts supplémentaires infligés par les coups critiques avec vos sorts Feu stellaire, Météores, Eclat lunaire et Colère."
		];
i++;		

//Celestial Focus - Balance  
rank[i] = [
"Confère à vos sorts Feu stellaire et Météores 5% de chances d'étourdir la cible pendant 3 sec. et augmente de 1% votre total de hâte des sorts.",
"Confère à vos sorts Feu stellaire et Météores 10% de chances d'étourdir la cible pendant 3 sec. et augmente de 2% votre total de hâte des sorts.",
"Confère à vos sorts Feu stellaire et Météores 15% de chances d'étourdir la cible pendant 3 sec. et augmente de 3% votre total de hâte des sorts."
		];
i++;

//Lunar Guidance - Balance  
rank[i] = [
"Augmente la puissance de vos sorts de 4% de votre total d'Intelligence.",
"Augmente la puissance de vos sorts de 8% de votre total d'Intelligence.",
"Augmente la puissance de vos sorts de 12% de votre total d'Intelligence."
		];
i++;

//Insect Swarm - Balance
rank[i]=[
		"<span style=text-align:left;float:left;>50 points de mana</span><span style=text-align:right;float:right;>30 m de portée</span><br>Incantation immédiate<br>La cible ennemie est assaillie par des insectes. Ses chances de toucher avec les attaques de mêlée et à distance sont diminuées de 3% et elle subit 1290 points de dégâts de Nature en 12 sec."
		];
i++;

//Improved Insect Swarm - Balance
rank[i] = [
"Augmente les dégâts infligés par votre sort Colère aux cibles affectées par votre sort Essaim d'insectes de 1%, et augmente les chances de coup critique de votre sort Feu stellaire de 1% sur les cibles affectées par votre sort Eclat lunaire.",
"Augmente les dégâts infligés par votre sort Colère aux cibles affectées par votre sort Essaim d'insectes de 2%, et augmente les chances de coup critique de votre sort Feu stellaire de 2% sur les cibles affectées par votre sort Eclat lunaire.",
"Augmente les dégâts infligés par votre sort Colère aux cibles affectées par votre sort Essaim d'insectes de 3%, et augmente les chances de coup critique de votre sort Feu stellaire de 3% sur les cibles affectées par votre sort Eclat lunaire."
		];		
i++;

//Dreamstate - Balance
rank[i] = [
"Régénère une quantité de mana égale à 4% de votre Intelligence toutes les 5 sec., même pendant l'incantation.",
"Régénère une quantité de mana égale à 7% de votre Intelligence toutes les 5 sec., même pendant l'incantation.",
"Régénère une quantité de mana égale à 10% de votre Intelligence toutes les 5 sec., même pendant l'incantation."
		];		
i++;

//Moonfury - Balance  			
rank[i] = [
"Augmente les points de dégâts infligés par vos sorts Feu stellaire, Eclat lunaire et Colère de 3%.",
"Augmente les points de dégâts infligés par vos sorts Feu stellaire, Eclat lunaire et Colère de 6%.",
"Augmente les points de dégâts infligés par vos sorts Feu stellaire, Eclat lunaire et Colère de 10%."
		];
i++;		


//Nature's Warrior - Balance  			
rank[i] = [
"Augmente vos chances de toucher avec tous les sorts et réduit la probabilité que vous soyez touché par des sorts de 2%.",
"Augmente vos chances de toucher avec tous les sorts et réduit la probabilité que vous soyez touché par des sorts de 4%."
		];
i++;


//Moonkin Form - Balance  //UPDATED
rank[i] = [
		"769 Mana<br><span style=text-align:left;float:left;>Incantation immédiate</span><br>Le druide adopte sa forme de sélénien. Tant qu'il est sous cette forme, la valeur d'armure apportée par les objets est augmentée de 370% et tous les membres du groupe et du raid se trouvant à moins de 45 mètres voient leurs chances d'obtenir un coup critique avec les sorts augmenter de 5%. Les critiques réussis avec les sorts sous cette forme ont une chance de régénérer instantanément 2% de votre total de mana. Le sélénien peut uniquement lancer des sorts d'Équilibre et des Délivrances de la malédiction tant qu'il est transformé. La transformation libère le lanceur de sorts des métamorphoses et des effets qui affectent le déplacement."
		];
i++;

//Improved Moonkin Form - Balance  			
rank[i] = [
"Votre Aura de sélénien permet aussi aux cibles affectées de voir leur hâte augmenter de 1%, et vous bénéficiez d'un montant de dégâts des sorts supplémentaire égal à 5% de votre Esprit.",
"Votre Aura de sélénien permet aussi aux cibles affectées de voir leur hâte augmenter de 2%, et vous bénéficiez d'un montant de dégâts des sorts supplémentaire égal à 10% de votre Esprit.",
"Votre Aura de sélénien permet aussi aux cibles affectées de voir leur hâte augmenter de 3%, et vous bénéficiez d'un montant de dégâts des sorts supplémentaire égal à 15% de votre Esprit."
		];
i++;


//Improved Faerie Fire - Balance  			
rank[i] = [
"Votre sort Lucioles augmente aussi les chances que la cible soit touchée par les attaques avec les sorts de 1% ainsi que vos chances de coup critique avec les sorts infligeant des dégâts sur les cibles affectées par Lucioles de 1%.",
"Votre sort Lucioles augmente aussi les chances que la cible soit touchée par les attaques avec les sorts de 2% ainsi que vos chances de coup critique avec les sorts infligeant des dégâts sur les cibles affectées par Lucioles de 2%.",
"Votre sort Lucioles augmente aussi les chances que la cible soit touchée par les attaques avec les sorts de 3% ainsi que vos chances de coup critique avec les sorts infligeant des dégâts sur les cibles affectées par Lucioles de 3%."
		];
i++;

//Owlkin Frenzy - Balance  			
rank[i] = [
"Les attaques que vous subissez lorsque vous êtes en forme de sélénien ont 5% de chances de vous faire entrer dans un état de frénésie, qui augmente vos dégâts de 10% et vous rend insensible aux interruptions pendant l'incantation de sorts d'Equilibre. Dure 10 sec.",
"Les attaques que vous subissez lorsque vous êtes en forme de sélénien ont 10% de chances de vous faire entrer dans un état de frénésie, qui augmente vos dégâts de 10% et vous rend insensible aux interruptions pendant l'incantation de sorts d'Equilibre. Dure 10 sec.",
"Les attaques que vous subissez lorsque vous êtes en forme de sélénien ont 15% de chances de vous faire entrer dans un état de frénésie, qui augmente vos dégâts de 10% et vous rend insensible aux interruptions pendant l'incantation de sorts d'Equilibre. Dure 10 sec."
		];
i++;

//Wrath of Cenarius - Balance  			
rank[i] = [
"Votre sort Feu stellaire bénéficie de 4% supplémentaires et votre Colère de 2% supplémentaires des effets du bonus aux dégâts.",
"Votre sort Feu stellaire bénéficie de 8% supplémentaires et votre Colère de 4% supplémentaires des effets du bonus aux dégâts.",
"Votre sort Feu stellaire bénéficie de 12% supplémentaires et votre Colère de 6% supplémentaires des effets du bonus aux dégâts.",
"Votre sort Feu stellaire bénéficie de 16% supplémentaires et votre Colère de 8% supplémentaires des effets du bonus aux dégâts.",
"Votre sort Feu stellaire bénéficie de 20% supplémentaires et votre Colère de 10% supplémentaires des effets du bonus aux dégâts."
		];
i++;

//Eclipse - Balance  			
rank[i] = [
"Quand vous réussissez un coup critique avec Feu stellaire, vous avez 33% de chances d'augmenter de 10% les dégâts infligés par Colère. Quand vous réussissez un coup critique avec Colère, vous avez 20% de chances d'augmenter vos chances de coup critique avec Feu stellaire de 15%. L'effet dure 15 sec. et a un temps de recharge de 30 sec.",
"Quand vous réussissez un coup critique avec Feu stellaire, vous avez 66% de chances d'augmenter de 10% les dégâts infligés par Colère. Quand vous réussissez un coup critique avec Colère, vous avez 40% de chances d'augmenter vos chances de coup critique avec Feu stellaire de 15%. L'effet dure 15 sec. et a un temps de recharge de 30 sec.",
"Quand vous réussissez un coup critique avec Feu stellaire, vous avez 100% de chances d'augmenter de 10% les dégâts infligés par Colère. Quand vous réussissez un coup critique avec Colère, vous avez 60% de chances d'augmenter vos chances de coup critique avec Feu stellaire de 15%. L'effet dure 15 sec. et a un temps de recharge de 30 sec."
		];
i++;

//Typhoon - Balance  //UPDATED
rank[i] = [
"<span style=text-align:left;float:left;>32% de mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>20 sec de recharge</span><br>Vous invoquez un violent Typhon qui inflige 1190 points de dégâts de Nature quand il est en contact avec des cibles hostiles, en les faisant tomber 5 mètres plus loin."
		];
i++;



//Force of Nature - Balance  
rank[i] = [
		"<span style=text-align:left;float:left;>284 Mana</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Invoque 3 Forces de la nature pour aider le lanceur de sorts à combattre, pendant 30 sec."
		];
i++;

//Gale Winds - Balance
rank[i] = [
"Augmente de 15% les dégâts infligés par vos sorts Ouragan et Typhon, et augmente la portée de votre sort Cyclone de 2 mètres.",
"Augmente de 30% les dégâts infligés par vos sorts Ouragan et Typhon, et augmente la portée de votre sort Cyclone de 4 mètres."
		];
i++;

//Earth and Moon - Balance TALENT CHANGED
rank[i] = [
"Vos sorts Colère et Feu stellaire ont 100% de chances d'appliquer l'effet Terre et lune sur la cible. Celui-ci augmente les dégâts des sorts subis de 4% pendant 12 sec. Augmente également vos dégâts des sorts de 1%.",
"Vos sorts Colère et Feu stellaire ont 100% de chances d'appliquer l'effet Terre et lune sur la cible. Celui-ci augmente les dégâts des sorts subis de 9% pendant 12 sec. Augmente également vos dégâts des sorts de 2%.",
"Vos sorts Colère et Feu stellaire ont 100% de chances d'appliquer l'effet Terre et lune sur la cible. Celui-ci augmente les dégâts des sorts subis de 13% pendant 12 sec. Augmente également vos dégâts des sorts de 3%."
		];
i++;

//Starfall - Balance  
rank[i] = [
		"<span style=text-align:left;float:left;>35% de mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Un déluge de météores tombe du ciel sur les cibles se trouvant à moins de 30 mètres du lanceur de sorts, infligeant chacune 433 à 503 points de dégâts des Arcanes, plus 78 points de dégâts des Arcanes supplémentaires à toutes les cibles se trouvant à moins de 5 mètres. 20 météores au maximum. Dure 10 sec."
		];
i++;



//Ferocity - Feral 
rank[i] = [
"Réduit le coût en rage ou en énergie de vos techniques Mutiler, Balayage, Griffe, Griffure et Mutilation de 1.",
"Réduit le coût en rage ou en énergie de vos techniques Mutiler, Balayage, Griffe, Griffure et Mutilation de 2.",
"Réduit le coût en rage ou en énergie de vos techniques Mutiler, Balayage, Griffe, Griffure et Mutilation de 3.",
"Réduit le coût en rage ou en énergie de vos techniques Mutiler, Balayage, Griffe, Griffure et Mutilation de 4.",
"Réduit le coût en rage ou en énergie de vos techniques Mutiler, Balayage, Griffe, Griffure et Mutilation de 5."
		];
i++;

//Feral Aggression - Feral
rank[i] = [
"Augmente les effets de réduction de la puissance d'attaque de votre Rugissement démoralisant de 8% et les dégâts infligés par votre Morsure féroce de 3%.",
"Augmente les effets de réduction de la puissance d'attaque de votre Rugissement démoralisant de 16% et les dégâts infligés par votre Morsure féroce de 6%.",
"Augmente les effets de réduction de la puissance d'attaque de votre Rugissement démoralisant de 24% et les dégâts infligés par votre Morsure féroce de 9%.",
"Augmente les effets de réduction de la puissance d'attaque de votre Rugissement démoralisant de 32% et les dégâts infligés par votre Morsure féroce de 12%.",
"Augmente les effets de réduction de la puissance d'attaque de votre Rugissement démoralisant de 40% et les dégâts infligés par votre Morsure féroce de 15%."
		];
i++;

//Feral Instinct - Feral
rank[i] = [
"Augmente de 10% les dégâts infligés par votre technique Balayage (ours) et réduit les chances de vous détecter de vos ennemis lorsque vous rôdez.",
"Augmente de 20% les dégâts infligés par votre technique Balayage (ours) et réduit les chances de vous détecter de vos ennemis lorsque vous rôdez.",
"Augmente de 30% les dégâts infligés par votre technique Balayage (ours) et réduit les chances de vous détecter de vos ennemis lorsque vous rôdez."
		];
i++;		



//Savage Fury - Feral 
rank[i] = [
		"Augmente les dégâts infligés par vos techniques Griffe, Griffure, Mutilation (félin), Mutilation (ours) et Mutiler de 10%.",
		"Augmente les dégâts infligés par vos techniques Griffe, Griffure, Mutilation (félin), Mutilation (ours) et Mutiler de 20%."		
		];
i++;	


//Thick Hide - Feral 
rank[i] = [
"Augmente de 4% la valeur d'armure apportée par les objets.",
"Augmente de 7% la valeur d'armure apportée par les objets.",
"Augmente de 10% la valeur d'armure apportée par les objets."
		];		
i++;		

//Feral Swiftness - Feral
rank[i] = [
"Augmente votre vitesse de déplacement de 15% avec votre forme de félin et augmente vos chances d'esquiver lorsque vous êtes en forme de félin, d'ours et d'ours redoutable de 2%.",
"Augmente votre vitesse de déplacement de 30% avec votre forme de félin et augmente vos chances d'esquiver lorsque vous êtes en forme de félin, d'ours et d'ours redoutable de 4%."
		];
i++;		

//Survival Instincts - Feral 
rank[i] = [
"<span style=text-align:left;float:left;>Effet immédiat</span><span style=text-align:right;float:right;>5 min de recharge</span><br>Activée, cette technique vous confère temporairement 30% de votre maximum de points de vie en plus pendant 20 sec. lorsque vous êtes en forme d'ours, de félin ou d'ours redoutable. Lorsque l'effet expire, les points de vie sont perdus."
		];
i++;		

//Sharpened Claws - Feral  
rank[i] = [
"Augmente de 2% vos chances d'infliger un coup critique lorsque vous êtes transformé en ours, en ours redoutable ou en félin.",
"Augmente de 4% vos chances d'infliger un coup critique lorsque vous êtes transformé en ours, en ours redoutable ou en félin.",
"Augmente de 6% vos chances d'infliger un coup critique lorsque vous êtes transformé en ours, en ours redoutable ou en félin."
		];
i++;		

//Shredding Attacks - Feral 
rank[i] = [
"Réduit de 9 le coût en énergie de votre technique Lambeau et de 1 le coût en rage de votre technique Lacérer.",
"Réduit de 18 le coût en énergie de votre technique Lambeau et de 2 le coût en rage de votre technique Lacérer."
		];
i++;		

//Predatory Strikes - Feral  
rank[i] = [
"Augmente votre puissance d'attaque en mêlée en forme de félin, d'ours, d'ours redoutable et de sélénien de 50% de votre niveau et de 7% la puissance d'attaque de votre arme équipée.",
"Augmente votre puissance d'attaque en mêlée en forme de félin, d'ours, d'ours redoutable et de sélénien de 100% de votre niveau et de 14% la puissance d'attaque de votre arme équipée.",
"Augmente votre puissance d'attaque en mêlée en forme de félin, d'ours, d'ours redoutable et de sélénien de 150% de votre niveau et de 20% la puissance d'attaque de votre arme équipée."
		];
i++;				
	
//Primal Fury - Feral 
rank[i] = [
"Vous confère 50% de chances de gagner un bonus supplémentaire de 5 points de rage à chaque fois que vous assénez un coup critique alors que vous êtes en forme ours ou d'ours redoutable.",
"Vous confère 100% de chances de gagner un bonus supplémentaire de 5 points de rage à chaque fois que vous assénez un coup critique alors que vous êtes en forme ours ou d'ours redoutable."
		];
i++;

//Primal Precision - Feral 
rank[i] = [
"Augmente votre expertise de 5, et vous êtes remboursé de 40% du coût en énergie d'un coup de grâce si celui-ci échoue.",
"Augmente votre expertise de 10, et vous êtes remboursé de 80% du coût en énergie d'un coup de grâce si celui-ci échoue."
		];
i++;



//Brutal Impact - Feral
rank[i] = [
"Augmente la durée d'étourdissement de vos techniques Sonner et Traquenard de 0.5 sec. et réduit le temps de recharge de Sonner de 15 sec.",
"Augmente la durée d'étourdissement de vos techniques Sonner et Traquenard de 1 sec. et réduit le temps de recharge de Sonner de 30 sec."
		];
i++;	


	
//Feral Charge - Feral 
rank[i] = [
		"Apprend Charge farouche (ours) et Charge farouche (félin).<br/><br/> Charge farouche (ours) - Vous chargez un ennemi, l'immobilisez et interrompez le sort qu'il incantait pendant $19675d. Cette technique ne peut être utilisée qu'en forme d'ours et d'ours redoutable. Temps de recharge de 15 secondes.<br/><br/> Charge farouche (félin) - Vous bondissez derrière un ennemi et l'hébétez pendant $50259d. Temps de recharge de 30 secondes."
		];
i++;			


//Nurturing Instinct - Feral
rank[i]=[
"Augmente vos sorts de soins d'un montant égal à 35% au maximum de votre Agilité, et augmente les soins qui vous sont prodigués de 10% quand vous êtes en forme de félin.",
"Augmente vos sorts de soins d'un montant égal à 70% au maximum de votre Agilité, et augmente les soins qui vous sont prodigués de 20% quand vous êtes en forme de félin."
		];
i++;		

//Natural Reaction - Feral
rank[i]=[
"Augmente votre score d'esquive en forme d'ours ou d'ours redoutable de 2%, et vous régénérez 1 points de rage chaque fois que vous esquivez en forme d'ours ou d'ours redoutable.",
"Augmente votre score d'esquive en forme d'ours ou d'ours redoutable de 4%, et vous régénérez 2 points de rage chaque fois que vous esquivez en forme d'ours ou d'ours redoutable.",
"Augmente votre score d'esquive en forme d'ours ou d'ours redoutable de 6%, et vous régénérez 3 points de rage chaque fois que vous esquivez en forme d'ours ou d'ours redoutable."
		];
i++;

	
//Heart of the Wild - Feral
rank[i]=[
"Augmente votre Intelligence de 4%. De plus, votre Endurance est augmentée de 4% lorsque vous êtes en forme d'ours ou d'ours redoutable et votre puissance d'attaque est augmentée de 2% lorsque vous êtes en forme de félin.",
"Augmente votre Intelligence de 8%. De plus, votre Endurance est augmentée de 8% lorsque vous êtes en forme d'ours ou d'ours redoutable et votre puissance d'attaque est augmentée de 4% lorsque vous êtes en forme de félin.",
"Augmente votre Intelligence de 12%. De plus, votre Endurance est augmentée de 12% lorsque vous êtes en forme d'ours ou d'ours redoutable et votre puissance d'attaque est augmentée de 6% lorsque vous êtes en forme de félin.",
"Augmente votre Intelligence de 16%. De plus, votre Endurance est augmentée de 16% lorsque vous êtes en forme d'ours ou d'ours redoutable et votre puissance d'attaque est augmentée de 8% lorsque vous êtes en forme de félin.",
"Augmente votre Intelligence de 20%. De plus, votre Endurance est augmentée de 20% lorsque vous êtes en forme d'ours ou d'ours redoutable et votre puissance d'attaque est augmentée de 10% lorsque vous êtes en forme de félin."
		];
i++;

//Survival of the Fittest - Feral
rank[i]=[
"Augmente toutes les caractéristiques de $2% et réduit la probabilité que vous soyez touché par un coup critique infligé par une attaque en mêlée de 2%.",
"Augmente toutes les caractéristiques de 4% et réduit la probabilité que vous soyez touché par un coup critique infligé par une attaque en mêlée de 4%.",
"Augmente toutes les caractéristiques de 6% et réduit la probabilité que vous soyez touché par un coup critique infligé par une attaque en mêlée de 6%."
		];
i++;



//Leader of the Pack - Feral
rank[i]=[
"Pendant qu'il est en forme de félin, d'ours ou d'ours redoutable, le Chef de la meute augmente de 5% les chances de tous les membres du groupe se trouvant à moins de 45 mètres d'obtenir un coup critique avec les attaques à distance et en mêlée."
		];
i++;

//Improved Leader of the Pack - Feral
rank[i]=[
"Votre technique Chef de la meute permet aussi aux cibles affectées d'être soignées pour un montant égal à 2% de leur total de points de vie lorsqu'elles réussissent un coup critique avec une attaque en mêlée ou à distance. L'effet de soins ne peut se produire plus d'une fois toutes les 6 sec. De plus, vous recevez 4% de votre maximum de mana quand vous bénéficiez de ce soin.",
"Votre technique Chef de la meute permet aussi aux cibles affectées d'être soignées pour un montant égal à 4% de leur total de points de vie lorsqu'elles réussissent un coup critique avec une attaque en mêlée ou à distance. L'effet de soins ne peut se produire plus d'une fois toutes les 6 sec. De plus, vous recevez 8% de votre maximum de mana quand vous bénéficiez de ce soin."
		];
i++;

	
//Primal Tenacity - Feral
rank[i]=[
"Réduit de 10% la durée des effets de Peur, et réduit de 10% tous les dégâts subis alors que vous êtes étourdi.",
"Réduit de 20% la durée des effets de Peur, et réduit de 20% tous les dégâts subis alors que vous êtes étourdi.",
"Réduit de 30% la durée des effets de Peur, et réduit de 30% tous les dégâts subis alors que vous êtes étourdi."
		];
i++;

//Protector of the Pack - Feral  
rank[i] = [
"Augmente votre puissance d'attaque en forme d'ours et d'ours redoutable de 1%, et pour chaque joueur allié dans votre groupe au moment où vous adoptez la forme d'ours ou d'ours redoutable, les dégâts que vous subissez sont réduits de 3% tant que vous êtes en forme d'ours ou d'ours redoutable.",
"Augmente votre puissance d'attaque en forme d'ours et d'ours redoutable de 2%, et pour chaque joueur allié dans votre groupe au moment où vous adoptez la forme d'ours ou d'ours redoutable, les dégâts que vous subissez sont réduits de 3% tant que vous êtes en forme d'ours ou d'ours redoutable.",
"Augmente votre puissance d'attaque en forme d'ours et d'ours redoutable de 3%, et pour chaque joueur allié dans votre groupe au moment où vous adoptez la forme d'ours ou d'ours redoutable, les dégâts que vous subissez sont réduits de 3% tant que vous êtes en forme d'ours ou d'ours redoutable."
		];
i++;		

//Predatory Instincts - Feral //UPDATED
rank[i]=[
"En forme de félin augmente les dégâts de vos coups critiques en mêlée de 3% et réduit les dégâts que vous infligent les attaques à zone d'effet de 10%.",
"En forme de félin augmente les dégâts de vos coups critiques en mêlée de 7% et réduit les dégâts que vous infligent les attaques à zone d'effet de 20%.",
"En forme de félin augmente les dégâts de vos coups critiques en mêlée de 10% et réduit les dégâts que vous infligent les attaques à zone d'effet de 30%."
		];
i++;

//Infected Wounds - Feral
rank[i] = [ 
"Vos attaques Lambeau, Mutiler et Mutilation infligent une blessure infectée à la cible. La Blessure infectée réduit la vitesse de déplacement de la cible de 8% et sa vitesse d'attaque de 3%. Cumulable jusqu'à 2 fois. Dure 12 sec.",
"Vos attaques Lambeau, Mutiler et Mutilation infligent une blessure infectée à la cible. La Blessure infectée réduit la vitesse de déplacement de la cible de 17% et sa vitesse d'attaque de 7%. Cumulable jusqu'à 2 fois. Dure 12 sec.",
"Vos attaques Lambeau, Mutiler et Mutilation infligent une blessure infectée à la cible. La Blessure infectée réduit la vitesse de déplacement de la cible de 25% et sa vitesse d'attaque de 10%. Cumulable jusqu'à 2 fois. Dure 12 sec."
		];
i++;

//King of the Jungle - Feral
rank[i] = [ 
"Lorsque vous utilisez votre technique Enragé en forme d'ours ou d'ours redoutable, vos dégâts sont augmentés de 5%, et votre technique Fureur du tigre vous rend aussi immédiatement 20 points d'énergie.",
"Lorsque vous utilisez votre technique Enragé en forme d'ours ou d'ours redoutable, vos dégâts sont augmentés de 10%, et votre technique Fureur du tigre vous rend aussi immédiatement 40 points d'énergie.",
"Lorsque vous utilisez votre technique Enragé en forme d'ours ou d'ours redoutable, vos dégâts sont augmentés de 15%, et votre technique Fureur du tigre vous rend aussi immédiatement 60 points d'énergie."
		];
i++;	

//Mangle - Feral
rank[i]=[
"Mutile la cible, lui inflige des dégâts et fait augmenter les dégâts infligés par les effets de saignement pendant 12 sec. Cette technique peut être utilisée en forme de félin ou d'ours redoutable."
		];
i++;

//Improved Mangle - Feral
rank[i] = [
"Réduit le temps de recharge de votre technique Mutilation (ours) de 0.5 sec., et réduit le coût en énergie de votre technique Mutilation (félin) de 2.",
"Réduit le temps de recharge de votre technique Mutilation (ours) de 1 sec., et réduit le coût en énergie de votre technique Mutilation (félin) de 4.",
"Réduit le temps de recharge de votre technique Mutilation (ours) de 1.5 sec., et réduit le coût en énergie de votre technique Mutilation (félin) de 6."
		];
i++;

//Rend and Tear - Feral
rank[i] = [
"Augmente les dégâts infligés par les attaques Mutiler et Lambeau sur les cibles qui saignent de 4%, et augmente les chances de coup critique de votre technique Morsure féroce sur les cibles qui saignent de 10%.",
"Augmente les dégâts infligés par les attaques Mutiler et Lambeau sur les cibles qui saignent de 8%, et augmente les chances de coup critique de votre technique Morsure féroce sur les cibles qui saignent de 20%.",
"Augmente les dégâts infligés par les attaques Mutiler et Lambeau sur les cibles qui saignent de 12%, et augmente les chances de coup critique de votre technique Morsure féroce sur les cibles qui saignent de 30%.",
"Augmente les dégâts infligés par les attaques Mutiler et Lambeau sur les cibles qui saignent de 16%, et augmente les chances de coup critique de votre technique Morsure féroce sur les cibles qui saignent de 40%.",
"Augmente les dégâts infligés par les attaques Mutiler et Lambeau sur les cibles qui saignent de 20%, et augmente les chances de coup critique de votre technique Morsure féroce sur les cibles qui saignent de 50%."
		];
i++;	

//Berserk - Feral
rank[i]=[
"<span style=text-align:left;float:left;>Effet immédiat</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Activée, cette technique permet à votre technique Mutilation (ours) d'atteindre un maximum de 3 cibles en plus de fonctionner sans temps de recharge, et réduit le coût en énergie de toutes vos techniques en forme de félin de 50%. Dure 15 sec. Vous ne pouvez pas utiliser Fureur du tigre quand Berserk est actif. <br/><br/>Annule l'effet de Peur et vous rend insensible à Peur pendant toute sa durée."
		];
i++;	

//RESTORATION--------------------------------------------------------------

//Improved Mark of the Wild - Restoration
rank[i]=[
"Augmente les effets de vos sorts Marque du fauve et Don du fauve de 20%.",
"Augmente les effets de vos sorts Marque du fauve et Don du fauve de 40%."
		];
i++;	

//Nature's Focus - Restoration 
rank[i]=[
"Réduit de 23% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Toucher guérisseur, Colère, Sarments, Cyclone, Nourrir, Rétablissement et Tranquillité.",
"Réduit de 46% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Toucher guérisseur, Colère, Sarments, Cyclone, Nourrir, Rétablissement et Tranquillité.",
"Réduit de 70% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Toucher guérisseur, Colère, Sarments, Cyclone, Nourrir, Rétablissement et Tranquillité."
		];
i++;	
		
//Furor - Restoration
rank[i]=[
"Vous confère 20% de chances de gagner 10 points de rage lorsque vous vous transformez en ours et ours redoutable. Vous conservez jusqu'à 20 de vos points d'énergie lorsque vous vous transformez en félin. Augmente de 2% votre total d'Intelligence lorsque vous êtes en forme de sélénien.",
"Vous confère 40% de chances de gagner 10 points de rage lorsque vous vous transformez en ours et ours redoutable. Vous conservez jusqu'à 40 de vos points d'énergie lorsque vous vous transformez en félin. Augmente de 4% votre total d'Intelligence lorsque vous êtes en forme de sélénien.",
"Vous confère 60% de chances de gagner 10 points de rage lorsque vous vous transformez en ours et ours redoutable. Vous conservez jusqu'à 60 de vos points d'énergie lorsque vous vous transformez en félin. Augmente de 6% votre total d'Intelligence lorsque vous êtes en forme de sélénien.",
"Vous confère 80% de chances de gagner 10 points de rage lorsque vous vous transformez en ours et ours redoutable. Vous conservez jusqu'à 80 de vos points d'énergie lorsque vous vous transformez en félin. Augmente de 8% votre total d'Intelligence lorsque vous êtes en forme de sélénien.",
"Vous confère 100% de chances de gagner 10 points de rage lorsque vous vous transformez en ours et ours redoutable. Vous conservez jusqu'à 100 de vos points d'énergie lorsque vous vous transformez en félin. Augmente de 10% votre total d'Intelligence lorsque vous êtes en forme de sélénien."
		];
i++;		

//Naturalist - Restoration
rank[i]=[
"Réduit le temps d'incantation de votre sort Toucher guérisseur de 0.1 sec. et augmente les dégâts que vous infligez avec les attaques physiques sous toutes les formes de 2%.",
"Réduit le temps d'incantation de votre sort Toucher guérisseur de 0.2 sec. et augmente les dégâts que vous infligez avec les attaques physiques sous toutes les formes de 4%.",
"Réduit le temps d'incantation de votre sort Toucher guérisseur de 0.3 sec. et augmente les dégâts que vous infligez avec les attaques physiques sous toutes les formes de 6%.",
"Réduit le temps d'incantation de votre sort Toucher guérisseur de 0.4 sec. et augmente les dégâts que vous infligez avec les attaques physiques sous toutes les formes de 8%.",
"Réduit le temps d'incantation de votre sort Toucher guérisseur de 0.5 sec. et augmente les dégâts que vous infligez avec les attaques physiques sous toutes les formes de 10%."
		];
i++;		
		
//Subtlety - Restoration 
rank[i]=[
"Réduit de 10% la menace générée par vos sorts de restauration et réduit de 10% la probabilité que vos sorts soient dissipés.",
"Réduit de 20% la menace générée par vos sorts de restauration et réduit de 20% la probabilité que vos sorts soient dissipés..",
"Réduit de 30% la menace générée par vos sorts de restauration et réduit de 30% la probabilité que vos sorts soient dissipés."
		];
i++;	
	
//Natural Shapeshifter - Balance 
rank[i] = [
"Réduit le coût en mana de tous les changements de forme de 10%.",
"Réduit le coût en mana de tous les changements de forme de 20%.",
"Réduit le coût en mana de tous les changements de forme de 30%."
		];		
i++;		
		
//Intensity - Restoration 
rank[i]=[
"Vous confère 10% de votre vitesse de récupération du mana normale pendant l'incantation. Votre technique Enrager génère instantanément 4 points de rage.",
"Vous confère 20% de votre vitesse de récupération du mana normale pendant l'incantation. Votre technique Enrager génère instantanément 7 points de rage.",
"Vous confère 30% de votre vitesse de récupération du mana normale pendant l'incantation. Votre technique Enrager génère instantanément 10 points de rage."
		];
i++;


		
//Omen of Clarity - Restoration //UPDATED
rank[i] = [
"Tous les dégâts, sorts de soins et attaques automatiques du druide ont une chance de faire entrer le lanceur de sorts dans un état d'Idées claires. Cet état réduit le coût en mana, en rage ou en énergie de votre prochain sort de dégât ou de soins ou de votre prochaine technique offensive de 100%."
		];
i++;
		
//MASTER SHAPESHIFTER - Restoration 
rank[i]=[
"Le druide bénéficie d'un effet tant qu'il conserve la forme concernée.<br><br>Forme d'ours - Augmente les dégâts physiques de 2%.<br><br>Forme de félin - Augmente les chances de coup critique de 2%.<br><br>Forme de sélénien - Augmente les dégâts des sorts de 2%.<br><br>Forme d'arbre de vie - Augmente les soins de 2%.",
"Le druide bénéficie d'un effet tant qu'il conserve la forme concernée.<br><br>Forme d'ours - Augmente les dégâts physiques de 4%.<br><br>Forme de félin - Augmente les chances de coup critique de 4%.<br><br>Forme de sélénien - Augmente les dégâts des sorts de 4%.<br><br>Forme d'arbre de vie - Augmente les soins de 4%."
		];
i++;		
		
		
//Tranquil Spirit - Restoration  
rank[i]=[
"Réduit le coût en mana de vos sorts Toucher guérisseur, Nourriture et Tranquillité de 2%.",
"Réduit le coût en mana de vos sorts Toucher guérisseur, Nourriture et Tranquillité de 4%.",
"Réduit le coût en mana de vos sorts Toucher guérisseur, Nourriture et Tranquillité de 6%.",
"Réduit le coût en mana de vos sorts Toucher guérisseur, Nourriture et Tranquillité de 8%.",
"Réduit le coût en mana de vos sorts Toucher guérisseur, Nourriture et Tranquillité de 10%."
		];
i++;		
		
//Improved Rejuvenation - Restoration   
rank[i]=[
"Augmente les effets de votre sort Récupération de 5%.",
"Augmente les effets de votre sort Récupération de 10%.",
"Augmente les effets de votre sort Récupération de 15%."
		];
i++;	
		
//Nature's Swiftness - Restoration   
rank[i]=[
		"<span style=text-align:left;float:left;>Effet immédiat</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Activé, votre prochain sort de Nature dont le temps d'incantation est inférieur à 10 secondes devient un sort instantané."
		];
i++;	


//Gift of Nature - Restoration 
rank[i]=[
"Augmente les effets de tous les sorts de soins de 2%.",
"Augmente les effets de tous les sorts de soins de 4%.",
"Augmente les effets de tous les sorts de soins de 6%.",
"Augmente les effets de tous les sorts de soins de 8%.",
"Augmente les effets de tous les sorts de soins de 10%."
		];
i++;	


//Improved Tranquility - Restoration
rank[i]=[
"Diminue le niveau de menace généré par Tranquillité de 50%, et réduit le temps de recharge de 30%.",
"Diminue le niveau de menace généré par Tranquillité de 100%, et réduit le temps de recharge de 60%."
		];
i++;	


//Empowered Touch - Restoration
rank[i]=[
"Votre sort Toucher guérisseur bénéficie de 20% supplémentaires des effets du bonus relatif aux soins.",
"Votre sort Toucher guérisseur bénéficie de 40% supplémentaires des effets du bonus relatif aux soins."
		];
i++;	


//Improved Regrowth - Restoration 
rank[i]=[
"Augmente les chances d'obtenir un effet critique avec votre sort Rétablissement de 10%.",
"Augmente les chances d'obtenir un effet critique avec votre sort Rétablissement de 20%.",
"Augmente les chances d'obtenir un effet critique avec votre sort Rétablissement de 30%.",
"Augmente les chances d'obtenir un effet critique avec votre sort Rétablissement de 40%.",
"Augmente les chances d'obtenir un effet critique avec votre sort Rétablissement de 50%."
		];
i++;

//Living Spirit - Restoration 
rank[i]=[
"Augmente votre total d'Esprit de 5%.",
"Augmente votre total d'Esprit de 10%.",
"Augmente votre total d'Esprit de 15%."
		];
i++;	

//Swiftmend - Restoration 
rank[i]=[
		"<span style=text-align:left;float:left;>16% de mana de base</span><span style=text-align:right;float:right;>40 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>15 sec de recharge</span><br>Consume un effet de Récupération ou de Rétablissement sur une cible alliée pour lui rendre instantanément le nombre de points de vie équivalent à 12 sec. de Récupération ou 18 sec. de Rétablissement."
		];
i++;


//Natural Perfection - Restoration 
rank[i]=[
"Vos chances d'obtenir un coup critique avec tous les sorts sont augmentées de 1% et les coups critiques contre vous vous font bénéficier de l'effet de Perfection naturelle qui réduit tous les dégâts que vous subissez de 2%. Cumulable jusqu'à 3 fois. Dure 8 sec.",
"Vos chances d'obtenir un coup critique avec tous les sorts sont augmentées de 2% et les coups critiques contre vous vous font bénéficier de l'effet de Perfection naturelle qui réduit tous les dégâts que vous subissez de 3%. Cumulable jusqu'à 3 fois. Dure 8 sec.",
"Vos chances d'obtenir un coup critique avec tous les sorts sont augmentées de 3% et les coups critiques contre vous vous font bénéficier de l'effet de Perfection naturelle qui réduit tous les dégâts que vous subissez de 4%. Cumulable jusqu'à 3 fois. Dure 8 sec."
		];
i++;

//Empowered Rejuvenation - Restoration 
rank[i]=[
"Les effets du bonus relatif aux soins de vos sorts de soins sur la durée sont augmentés de 4%.",
"Les effets du bonus relatif aux soins de vos sorts de soins sur la durée sont augmentés de 8%.",
"Les effets du bonus relatif aux soins de vos sorts de soins sur la durée sont augmentés de 12%.",
"Les effets du bonus relatif aux soins de vos sorts de soins sur la durée sont augmentés de 16%.",
"Les effets du bonus relatif aux soins de vos sorts de soins sur la durée sont augmentés de 20%."
		];
i++;

//Living Seed - Restoration
rank[i]=[
"Quand vous réussissez des soins critiques avec vos sorts Prompte guérison, Rétablissement, Nourrir ou Toucher guérisseur, vous avez 33% de chances de planter une Graine de vie sur la cible pour un montant égal à 30% des points de vie rendus. La Graine de vie fleurira lors de la prochaine attaque sur la cible. Dure 15 sec.",
"Quand vous réussissez des soins critiques avec vos sorts Prompte guérison, Rétablissement, Nourrir ou Toucher guérisseur, vous avez 66% de chances de planter une Graine de vie sur la cible pour un montant égal à 30% des points de vie rendus. La Graine de vie fleurira lors de la prochaine attaque sur la cible. Dure 15 sec.",
"Quand vous réussissez des soins critiques avec vos sorts Prompte guérison, Rétablissement, Nourrir ou Toucher guérisseur, vous avez 100% de chances de planter une Graine de vie sur la cible pour un montant égal à 30% des points de vie rendus. La Graine de vie fleurira lors de la prochaine attaque sur la cible. Dure 15 sec."
		];
i++;

//REPLENISH - Restoration 
rank[i]=[
"Votre sort Régénération a 5% des chances de rendre 8 points d'énergie, 4 points de rage, 1% du mana ou 16 points de puissance runique par itération.",
"Votre sort Régénération a 10% des chances de rendre 8 points d'énergie, 4 points de rage, 1% du mana ou 16 points de puissance runique par itération.",
"Votre sort Régénération a 15% des chances de rendre 8 points d'énergie, 4 points de rage, 1% du mana ou 16 points de puissance runique par itération."
		];
i++;

//Tree of Life - Restoration 
rank[i]=[
		"<span>978 Mana</span><br><span>Incantation immédiate</span><br>Le druide adopte sa forme d 'Arbre de vie. Tant qu'il est sous cette forme, les soins reçus sont augmentés de 6% pour tous les membres du groupe et du raid se trouvant à moins de 45 mètres, et il ne peut lancer que des sorts de Restauration, Innervation et Ecorce, mais le coût en mana de ses sorts de soins sur la durée est réduit de 20%.<br><br>La transformation libère le lanceur de sorts des effets qui le ralentissent et des métamorphoses."
		];
i++;

//IMPROVED TREE OF LIFE - Restoration 
rank[i]=[
"Augmente votre Armure lorsque vous êtes en forme d'Arbre de vie de 33%, et augmente votre puissance des sorts de 5% de votre Esprit lorsque vous êtes en forme d'Arbre de vie.",
"Augmente votre Armure lorsque vous êtes en forme d'Arbre de vie de 66%, et augmente votre puissance des sorts de 10% de votre Esprit lorsque vous êtes en forme d'Arbre de vie.",
"Augmente votre Armure lorsque vous êtes en forme d'Arbre de vie de 100%, et augmente votre puissance des sorts de 15% de votre Esprit lorsque vous êtes en forme d'Arbre de vie.."
		];
i++;

//GIFT OF THE EARTHMOTHER - Restoration 
rank[i]=[
"Réduit le temps de recharge global de vos sorts Récupération, Fleur de vie et Croissance sauvage de 4%.",
"Réduit le temps de recharge global de vos sorts Récupération, Fleur de vie et Croissance sauvage de 8%.",
"Réduit le temps de recharge global de vos sorts Récupération, Fleur de vie et Croissance sauvage de 12%.",
"Réduit le temps de recharge global de vos sorts Récupération, Fleur de vie et Croissance sauvage de 16%.",
"Réduit le temps de recharge global de vos sorts Récupération, Fleur de vie et Croissance sauvage de 20%."
		];
i++;

//Wild Growth - Restoration //UPDATED
rank[i]=[
		"<span style=text-align:left;float:left;>903 Mana</span><span style=text-align:right;float:right;>40 m de portée</span><br>Incantation immédiate<br>Rend à 5 membres au maximum du groupe ou du raid alliés se trouvant à moins de 15 mètres de la cible 686 points de vie en 7 sec. Les soins sont prodigués rapidement au début, et ralentissent au fur et à mesure que Croissance sauvage atteint la fin de sa durée."
		];
i++;
	
//Restoration Talents End^^

