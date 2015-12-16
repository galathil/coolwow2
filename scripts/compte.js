function writediv(texte)
     {
     document.getElementById('pseudobox').innerHTML = texte;
     }

function verifPseudo(pseudo)
     {
     if(pseudo != '')
               {
               if(pseudo.length<2)
                         writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> ce pseudo est trop court</span>');
               else if(pseudo.length>15)
                         writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> ce pseudo est trop long</span>');
               else if(texte = file('kernel/compte-core.php?pseudo='+escape(pseudo)))
                         {
          if(texte == 1)
               writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> ce pseudo est deja pris</span>');
          else if(texte == 2)
               writediv('<span style="color:#1A7917"><b>'+pseudo+' :</b> ce pseudo est libre</span>');
          else
               writediv(texte);
                         }
               }
     }
	 
function verifPseudo2(pseudo)
{
    if(pseudo != '')
    {
        if(pseudo.length<2)
		{
            writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> ce pseudo est trop court</span>');
		}
        else if(pseudo.length>15)
		{
            writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> ce pseudo est trop long</span>');
		}
        else if(texte = file('kernel/verifie-pseudo.php?pseudo='+escape(pseudo)))
		{
			if(texte == 1)
			{
				writediv('<span style="color:#cc0000"><b>'+pseudo+' :</b> ce pseudo est deja pris</span>');
			}
			else if(texte == 2)
			{
               writediv('<span style="color:#1A7917"><b>'+pseudo+' :</b> ce pseudo est libre</span>');
			}
			else
			{
				writediv(texte);
			}
		}
    }
}

function file(fichier)
     {
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
     }

function evalPwd(s)
{
	var cmpx = 0;
	
	if (s.length >= 6)
	{
		cmpx++;
		
		if (s.search("[A-Z]") != -1)
		{
			cmpx++;
		}
		
		if (s.search("[0-9]") != -1)
		{
			cmpx++;
		}
		
		if (s.length >= 8 || s.search("[\x20-\x2F\x3A-\x40\x5B-\x60\x7B-\x7E]") != -1)
		{
			cmpx++;
		}
	}
	
	if (cmpx == 0)
	{
		document.getElementById("weak").className = "nrm";
		document.getElementById("medium").className = "nrm";
		document.getElementById("strong").className = "nrm";
	}
	else if (cmpx == 1)
	{
		document.getElementById("weak").className = "red";
		document.getElementById("medium").className = "nrm";
		document.getElementById("strong").className = "nrm";
	}
	else if (cmpx == 2)
	{
		document.getElementById("weak").className = "yellow";
		document.getElementById("medium").className = "yellow";
		document.getElementById("strong").className = "nrm";
	}
	else
	{
		document.getElementById("weak").className = "green";
		document.getElementById("medium").className = "green";
		document.getElementById("strong").className = "green";
	}
}