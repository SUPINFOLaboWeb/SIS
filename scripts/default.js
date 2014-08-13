$(document).ready(function() {

	$('.navbar .campus').text(getCookie('defaultCampus'));
	campus 	= getActualCampusName();

	$('.campusName').click(function() {
		addCampusToNavBar($(this));
		campus 		= getActualCampusName();
	});

	$('.sidebarLink').click(function(){
		var page 	 	= $(this).attr('id');
		loadPageContent(campus, page);

	});

	$('.main').on('click', '.createTodo', function(){
		var name 	= $('.todo #name').val();
		var content = $('.todo #content').val();

		createTodo(name, content);
	});
})






