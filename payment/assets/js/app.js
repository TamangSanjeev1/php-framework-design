//for hiding 
// function myCode(){
// 	$(".images_gallery").hide().show('slow');	
// }

// myCode();

//for hiding 
$(function($){
	$('.images_gallery').click(function(){
		var image = $(this).attr("src");
		var appear_image = "<div id='images_gallery_appear' onClick='closeImage()'></div>";
		appear_image = appear_image.concat("<img id='image_pop' src='"+image+"' class='img-responsive' >>");		
		$('body').append(appear_image);
	});
});

function closeImage(){
	$('#images_gallery_appear').remove();
	$('#image_pop').remove();
}



