$('form.ajxCall').on('submit',function(){
	url = $(this).attr('action');
	type = $(this).attr('method');
	data = {};

	$(this).find('[name]').each(function(index,value){
		name = $(this).attr('name');
		value = $(this).val();

		data[name] = value;
	});

	$.ajax({
		url: url,
		type: type,
		data: data,

		success: function(response){
			console.log(response);
		}
	});

	return false;
});
