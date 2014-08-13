/*****************************************
				General
*****************************************/
function getActualCampusName() {
	return $('.navbar .campus').text().toUpperCase();
}
/*****************************************
				Sidebar/Navbar
*****************************************/

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

function addCampusToNavBar(campusName) {
	var campus 		= $(campusName).attr('id');
	$('.navbar .campus').text(campus);
}
/*****************************************
				Cookies
*****************************************/
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

/*****************************************
				Todo
*****************************************/
function createTodo(name, content) {
	var campus = getActualCampusName();
	console.log(campus);
	$.ajax({
		url: 'dbActionTodo.php',
		type: 'POST',
		data: 'name=' + name + '&content=' + content + '&campus' + campus + '&action=create',
		success: function(data) {
			loadPageContent(campus, 'todo');
		},
		error: function(data) {
			alert('ERROR : Unable to create new todo');
		}
	});
}