var linkMap = new Object();

function loadItemData(itemName) {
  var xmlhttp;

  // code for Mozilla, etc.
  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest();
  }
  // code for IE
  else if (window.ActiveXObject) {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if (xmlhttp != null) {
    // set proxy url
    var url = location.href.substring(0, location.href.lastIndexOf("/")) + 
              "/proxy.php?url=http://www.wowhead.com/?item=" + escape(itemName) + "%26xml";
    
    // set response handler
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {
        if (xmlhttp.status == 200) {
          var xmlItemName = xmlhttp.responseXML.getElementsByTagName("name")[0].childNodes[0].nodeValue.replace(/ /g, "%20").toLowerCase();

          if (linkMap[xmlItemName]) {
            for (var i = 0; i < linkMap[xmlItemName].length; ++i) {
              var link = linkMap[xmlItemName][i];
              link.href = xmlhttp.responseXML.getElementsByTagName("link")[0].childNodes[0].nodeValue;
              link.className = "q" + xmlhttp.responseXML.getElementsByTagName("quality")[0].attributes.getNamedItem("id").nodeValue;
            }
          }

          var itemId = xmlhttp.responseXML.getElementsByTagName("item")[0].attributes.getNamedItem("id").nodeValue;

          if (linkMap[itemId]) {
            for (var i = 0; i < linkMap[itemId].length; ++i) {
              var link = linkMap[itemId][i];
              link.className = "q" + xmlhttp.responseXML.getElementsByTagName("quality")[0].attributes.getNamedItem("id").nodeValue;
            }
          }
        }
        else {
          alert("Problem retrieving XML data");
        }
      }
    };

    // send request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
  }
  else {
    alert("Your browser does not support XMLHTTP.");
  }
}

function init() { 
  var oldonload = window.onload;

  if (typeof window.onload != 'function') {
    window.onload = createLinks;
  } 
  else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }

      createLinks();
    };
  }
}

function createLinks() {
  // replace <item> tags with links
  document.body.innerHTML = document.body.innerHTML.replace(/<item>(.+?)<\/item>/gi, "<a href=\"http://www.wowhead.com/?item=$1\">$1</a>");

  var links = document.getElementsByTagName("a");

  for (var i = 0; i < links.length; ++i) {
    var link = links[i];

    if (!link.href.length) {
      continue;
    }

    // fix href spaces
    link.href = link.href.replace(/ /g, "%20");

    var m = link.href.match(/http:\/\/(www\.)?wowhead\.com\/\?item=(.+)/);

    if (m) {
      var itemName = m[2].toLowerCase();

      if (!linkMap[itemName]) {
        linkMap[itemName] = new Array();
      }

      linkMap[itemName].push(link);
      loadItemData(itemName);
    }
  }

  for (var i = 0; i < linkMap.length; ++i) {
    loadItemData(linkMap[i]);
  }
}

init();
