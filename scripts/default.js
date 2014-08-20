$(document).ready(function() {

	var campus 	= getActualCampusName();

	// Au clic sur un campus dans la sidebar, on change de campus (=> dans la navbar)
	$('.campusName').click(function() {
		addCampusToNavBar($(this));
		campus 		= getActualCampusName();
	});

	// Au clic sur un module dans la sidebar, on charge le module en question pour le campus choisi
	$('.sidebarLink').click(function(){
		var page 	 	= $(this).attr('id');
		loadPageContent(campus, page);
	});
})
