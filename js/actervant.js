$( document ).ready(function() {

// Initiatie van de tiny mce textbox
 tinymce.init({ selector:'textarea'});

$(function() {
	var wall = new Freewall(".innerContainers");
	wall.fitWidth();
})

 })



