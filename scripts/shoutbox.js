var shoutbox_refresh;
function Shout_Refresh() {
/*active le refresh de la shoutbox toute les 10 secondes*/
	shoutbox_refresh=setTimeout("Shout_reload()",10000);
}
function Shout_reload() {
/*Envoie la fonction XMLHTTPRequest de chargement de la shoutbox */
	AJAXRequest("../kernel/shoutbox.php","Shout_Show","POST","shout=1");
}
function Shout_Show(v) {
/*Affiche le contenu de la shoutbox et initie le prochain refresh*/
	document.getElementById('shoutbox_content').innerHTML=v;
	shout_Scroll();
	Shout_Refresh();
}
function shout_Scroll() {
/*Scroll la div vers le bas (en position 99999. Si cette position n'existe pas, c'est la plus grande existante qui sera prise par le navigateur*/
	document.getElementById("shoutbox_content").scrollTop = 99999;
}
function Shout_Send() {
/*Envoie le message*/
	if (validateForm('shoutform')) {
		AJAXRequest("../kernel/shoutbox.php","Shout_Show","POST","shout=2&n="+escape(document.getElementById('shout_nick').value)+"&t="+escape(document.getElementById('shout_txt').value));
		document.getElementById('shout_txt').value='';
	}
}

function AJAXRequest(page,retfonc,methode,data) {
	var xhr_object = null;
	if(window.XMLHttpRequest) // Firefox
	   xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}
	if (data=="")
		data=null;
	if(methode == "GET" && data != null) { 
	   page += "?"+data; 
	   data = null; 
	}
	xhr_object.open(methode, page, true);
	xhr_object.onreadystatechange = function() {
		if(xhr_object.readyState == 4) {
			var RetAjax=xhr_object.responseText;
			eval(retfonc+'(RetAjax);');
                }
	}
	if(methode == "POST")
	   xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr_object.send(data);
}
function validateForm() { //argument facultatif : nom du formulaire
	if (arguments.length>=1) {
		var x = document.forms[arguments[0]].elements;
 
	} else {
		var x = document.getElementsByTagName("input");
	}
	var msg='';
	var tmp='';
	var msgF='';
	var format=true;
	for (i = 0; i < x.length; i++) {	
		if ((x[i].title != '') && (x[i].title != null) && (x[i].style.display != 'none')) {
			if ((x[i].title.lastIndexOf(')') == x[i].title.length-1) || (x[i].title.lastIndexOf('(') == 0)) {
				tmp=x[i].title.substring(x[i].title.lastIndexOf('(')+1,x[i].title.lastIndexOf(')'));
				var vnospace=replace(x[i].value,' ','');
				if (((tmp=='INT') || (tmp=='MNT')) && (isNaN(vnospace))) {
					format=false;
					msgF=' Il doit être au format numérique.';
				}
				if ((tmp=='CAR') && (!isNaN(x[i].value))) {
					format=false;
					msgF=' Il doit être au format alpha-numérique.';
				}
				if (tmp=='DAT') {
					if (!isNaN(x[i].value)) {
						format=false;
						msgF=' Il doit être au format JJ/MM/AAAA.';
					} else if (x[i].value.length!=10) {
						format=false;
						msgF=' Il doit être au format JJ/MM/AAAA.';
					} else {
						if (
							   (isNaN(x[i].value.charAt(0)+x[i].value.charAt(1)))
							|| (x[i].value.charAt(2) != '/')
							|| (isNaN(x[i].value.charAt(3)+x[i].value.charAt(4)))
							|| (x[i].value.charAt(5) != '/')
							|| (isNaN(x[i].value.charAt(6)+x[i].value.charAt(7)+x[i].value.charAt(8)+x[i].value.charAt(9)))
							) {
								format=false;
								msgF=' Il doit être au format JJ/MM/AAAA.';
							}
					}
				}
				if ((tmp == 'EML') && ((x[i].value.indexOf('@')<1) || (x[i].value.indexOf('@')==(x[i].value.length-1)))) {
					msgF=' Il doit être au format email (@ obligatoire).';
					format=false;
				}
			} 
			if ((x[i].title.lastIndexOf('(') == 0) && (format==false) && ((x[i].value != null) && (x[i].value != ''))) {
				msg+='Le champs "'+x[i].title.substring(x[i].title.lastIndexOf(')')+1,x[i].title.length)+'" est obligatoire.'+msgF.substring(3,msgF.length)+'\n';
			} 
			if (((x[i].value == null) || (x[i].value == '') || (format == false)) && (x[i].title.lastIndexOf('(') != 0)) {
				var z=x[i].title.length;
				if (x[i].title.lastIndexOf('(') != -1) {
					var z=x[i].title.lastIndexOf('(');
				}
				msg+='Le champs "'+x[i].title.substring(0,z)+'" est obligatoire.'+msgF+'\n';
			}
		}
		format=true;
		msgF='';
	}
	if (msg) alert('Les erreurs suivantes sont apparues :\n'+msg);
	return (msg == '');
}
function replace(string,text,by) {
// Replaces text with by in string
    var strLength = string.length, txtLength = text.length;
    if ((strLength == 0) || (txtLength == 0)) return string;
    var i = string.indexOf(text);
    if ((!i) && (text != string.substring(0,txtLength))) return string;
    if (i == -1) return string;
    var newstr = string.substring(0,i) + by;
    if (i+txtLength < strLength)
        newstr += replace(string.substring(i+txtLength,strLength),text,by);
    return newstr;
}