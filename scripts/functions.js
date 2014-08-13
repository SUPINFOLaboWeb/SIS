/*****************************************
				General
*****************************************/
	
/* 
 * Retourne le nom du campus actuel (depuis la barre du haut)
 */

function getActualCampusName() {
	return $('.navbar .campus').text().toUpperCase();
}
/*****************************************
				Sidebar/Navbar
*****************************************/

/* 
 * Demande a 'loadPage.php' de charger la page 'pageName' pour le campus 'campus'.
 * Si le chargement s'effectue, le contenu de la page demandee pour le campus choisi
 * est ajoute a la div 'main'.
 * Sinon une erreur est affichee.
 */

function loadPageContent(campus, pageName) {
	$.ajax({
		url: 'loadPage.php',
		type: 'POST',
		data: 'page=' + pageName + '&campus=' + campus,
		datatype: 'html',
		success: function(data) {
			$('.main').text('');
			$('.main').append(data);
		},
		error: function(data) {
			alert('ERROR : Unable to retrieve informations');
		}
	});
}

/*
 * Afficher dans la navbar le nom du campus
 * Permet de savoir en permanance sur quel campus l'utilisateur navigue.
 */
function addCampusToNavBar(campusName) {
	var campus 		= $(campusName).attr('id');
	$('.navbar .campus').text(campus);
}


/*****************************************
				Cookies
*****************************************/
/*
 * Pour gerer les cookies en JS.
 * Faut retrouver la source sur Internet.
 */

function setCookie(name, value, days) {
	if (days) {
		var date 	= new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		var expires = "; expires=" + date.toGMTString();
	}
	else 
		var expires 	= "";
	
	document.cookie 	= name + "=" + value + expires + "; path=/";
}

function getCookie(name) {
	var nameEQ 	= name + "=";
	var ca 		= document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') 
			c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) 
			return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function deleteCookie(name) {
	setCookie(name,"",-1);
}