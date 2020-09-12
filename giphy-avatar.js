jQuery(document).ready(function ($) {
	var word;
	$('#giphy-images').on('submit', function(e) {
		e.preventDefault();
		word = $("#giphy-word").val();
	});

	$(document).on('click', '#giphy-button', function() {
		var list_markup;
		$.get( 'https://api.giphy.com/v1/gifs/search?api_key=hryzkrY8pFUC5LOeNT6V25X0Eim6T2q3&q=' + word + '&limit=5', function( rsponse ) {			
			for(var i in response.data) {

				list_markup += '<div class="list-item">';
				list_markup += '<img src="' + response.data[i].images.original.url + '" />';
				list_markup += '<button class="set-avatar">Set as avatar</button>';
				list_markup += '</div>';

				$('#giphy-images').html(list_markup);

				//console.log(data.data);
			}			
		});
	});

	/*$('.set-avatar').on('click', function(e)  {
		e.preventDefault();
		$.ajax({
            type: "post",
            url: ajax_var.url,
            data: {},
            success: function(result){
                $('#my-events-list').html(result);
            }
        });
	});*/
});