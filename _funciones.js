function limpia(control,valor) {
	if(control=="login" && valor=="usuario") {
		document.getElementById("login").value = '';
	}
	if(control=="passw" && valor=="password") {
		document.getElementById("passw").value = '';
	}
}

function viewfile(fichero) {
	window.location.replace('webftpdoc.asp?id='+fichero);
}

function getScrollX() {
  var scrOfX = 0;
  if( typeof( window.pageXOffset ) == 'number' ) {
    scrOfX = window.pageXOffset;
  } else if( document.body && document.body.scrollLeft ) {
    //DOM compliant
    scrOfX = document.body.scrollLeft;
  } else if( document.documentElement && document.documentElement.scrollLeft ) {
    //IE6 standards compliant mode
    scrOfX = document.documentElement.scrollLeft;
  }
  return scrOfX;
}

function getScrollY() {
  var scrOfY = 0;
  if( typeof( window.pageYOffset ) == 'number' ) {
    //Netscape compliant
    scrOfY = window.pageYOffset;
  } else if( document.body && document.body.scrollTop ) {
    //DOM compliant
    scrOfY = document.body.scrollTop;
  } else if( document.documentElement && document.documentElement.scrollTop ) {
    //IE6 standards compliant mode
    scrOfY = document.documentElement.scrollTop;
  }
  return scrOfY;
}

function verficha(id) {
	cerrarficha();
	newf = document.getElementById("socio_"+id);
	var newposY = getScrollY()+200;
	newf.style.top = newposY+'px';
	//newf.style.left = '200px';
	newf.style.display = 'block';
}

function cerrarficha() {
	var parent = document.getElementById("fichas");
	var children = parent.getElementsByTagName("div");
	for(var i=0;i<children.length;i++) {
		children[i].style.display = 'none';
	}
}

function checkforblanks() {
	for (var i=0; i<arguments.length; i+=2) {
		if (!arguments[i]) {
			alert("El campo " + arguments[i+1] + " es obligatorio.");
			return false;
		}
	}
	return true;
}

function URLDecode(strDecode) {
   // Replace + with ' '
   // Replace %xx with equivalent character
   // Put [ERROR] in output if %xx is invalid.
   var HEXCHARS = "0123456789ABCDEFabcdef"; 
   var encoded = strDecode;
   var plaintext = "";
   var i = 0;
   while (i < encoded.length) {
       var ch = encoded.charAt(i);
	   if (ch == "+") {
	       plaintext += " ";
		   i++;
	   } else if (ch == "%") {
			if (i < (encoded.length-2) 
					&& HEXCHARS.indexOf(encoded.charAt(i+1)) != -1 
					&& HEXCHARS.indexOf(encoded.charAt(i+2)) != -1 ) {
				plaintext += unescape( encoded.substr(i,3) );
				i += 3;
			} else {
				alert( 'Bad escape combination near ...' + encoded.substr(i) );
				plaintext += "%[ERROR]";
				i++;
			}
		} else {
		   plaintext += ch;
		   i++;
		}
	} // while
   return plaintext;
   return false;
}

function loadUrl(strurl,strdest) {
	ajaxurl = strurl;
	ajaxtarget = strdest;
	if (window.XMLHttpRequest) { // code for Mozilla, etc.
		xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=xmlhttpChange;
		xmlhttp.open("GET",ajaxurl,true);
		xmlhttp.send(null);
	}
	else if (window.ActiveXObject) { // code for IE
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		if (xmlhttp) {
			xmlhttp.onreadystatechange=xmlhttpChange;
			xmlhttp.open("POST",ajaxurl,true);
			xmlhttp.send();
		}
	}
}

function xmlhttpChange() {
	var nuevoTexto = "";
	if (xmlhttp.readyState==4) {
		if (xmlhttp.status==200) {
			if (xmlhttp.responseText!="") {
				nuevoTexto = xmlhttp.responseText;
				document.getElementById(ajaxtarget).innerHTML = URLDecode(nuevoTexto);
			}
		} else {
			alert("Ha ocurrido un error al intentar recuperar los datos.");
		}
	}
}

function CreateControlFlash(divid, objectid, width, height, url, mode) {
	var d = document.getElementById(divid);
	var strHTML = '<object id="' + objectid + '" type="application/x-shockwave-flash" data="' + url + '" width="' + width + '" height="' + height + '">';
	strHTML = strHTML + '<param name="movie" value="' + url + '" />';
	if(mode=='1') { strHTML = strHTML + '<param name="wmode" value="transparent" />'; }
	strHTML = strHTML + '<a href="http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&amp;Lang=Spanish&amp;P5_Language=Spanish"><img src="flash/noflash.gif" border="0" alt="no tiene flash" /></a>';
	strHTML = strHTML + '</object>';
	d.innerHTML = strHTML;
}

function mkm(usuario, dominio, tld, desc) {
	var arroba = '@';
	var punto = '.';
	var etiqueta = 'ma' + '' + 'il';
	var dospuntos = 'to:';
	var localizador = usuario;
	localizador = localizador + arroba + dominio;
	localizador = localizador + punto + tld;
	if(desc=='') {
		enlace = localizador;
	} else {
		enlace = desc;
	}
	document.write('<a href="' + etiqueta + dospuntos + localizador + '">' + enlace + '</a>');
}

function EsEntero(inputVal,inputNm) {
	inputStr=""+inputVal;
	for (var i=0; i<inputStr.length; i++) {
		var oneChar=inputStr.charAt(i)
		//no admitimos valores negativos
		//if (i==0 && oneChar=="-") {
		//	continue;
		//}
		if (oneChar<"0" || oneChar>"9") {
			document.getElementById(inputNm).focus();
			return false;
		}
	}
	return true;
}

function godoc(doc) {
	document.location.href = doc;
}

function validate() {
	var isFull = checkforblanks(document.getElementById("nombre").value, "[Nombre y apellidos]",
		document.getElementById("email").value, "[E-mail]");
	if (!isFull) {
		return false;
	}
	var dirmail = document.getElementById("email").value;
	var filter = /^.+@.+\..{2,4}$/;
	if (!filter.test(dirmail)) {
		alert("La dirección de correo electrónico no es correcta.");
		return false;
	}
}

/* CODE LIFTER */

// Script Source: CodeLifter.com
// Copyright 2003
// Do not remove this notice.

// SETUPS:
// ===============================

// Set the horizontal and vertical position for the popup

PositionX = 50;
PositionY = 50;

// Set these value approximately 20 pixels greater than the
// size of the largest image to be used (needed for Netscape)

defaultWidth  = 500;
defaultHeight = 500;

// Set autoclose true to have the window close automatically
// Set autoclose false to allow multiple popup windows

var AutoClose = true;

// Do not edit below this line...
// ================================
if (parseInt(navigator.appVersion.charAt(0))>=4){
var isNN=(navigator.appName=="Netscape")?1:0;
var isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}
var optNN='scrollbars=no,width='+defaultWidth+',height='+defaultHeight+',left='+PositionX+',top='+PositionY;
var optIE='scrollbars=no,width=150,height=100,left='+PositionX+',top='+PositionY;

function popImage(imageURL,imageTitle){
if (isNN){imgWin=window.open('about:blank','',optNN);}
if (isIE){imgWin=window.open('about:blank','',optIE);}
with (imgWin.document){
writeln('<html><head><title>Loading...</title><style>body{margin:0px;}</style>');writeln('<sc'+'ript>');
writeln('var isNN,isIE;');writeln('if (parseInt(navigator.appVersion.charAt(0))>=4){');
writeln('isNN=(navigator.appName=="Netscape")?1:0;');writeln('isIE=(navigator.appName.indexOf("Microsoft")!=-1)?1:0;}');
writeln('function reSizeToImage(){');writeln('if (isIE){');writeln('window.resizeTo(300,300);');
writeln('width=300-(document.body.clientWidth-document.images[0].width);');
writeln('height=300-(document.body.clientHeight-document.images[0].height);');
writeln('window.resizeTo(width,height);}');writeln('if (isNN){');       
writeln('window.innerWidth=document.images["George"].width;');writeln('window.innerHeight=document.images["George"].height;}}');
writeln('function doTitle(){document.title="'+imageTitle+'";}');writeln('</sc'+'ript>');
if (!AutoClose) writeln('</head><body bgcolor=000000 scroll="no" onload="reSizeToImage();doTitle();self.focus()">')
else writeln('</head><body bgcolor=000000 scroll="no" onload="reSizeToImage();doTitle();self.focus()" onblur="self.close()">');
writeln('<img name="George" src='+imageURL+' style="display:block"></body></html>');
close();		
}}

/* FIN CODE LIFTER */