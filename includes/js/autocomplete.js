$(document).ready(function() {
	$(function() {
		$( "#autocomplete" ).autocomplete({
			source: function(request, response) {
				$.ajax({
				url : 'http://localhost/auth/autocomplete/suggestions',
				data: { term: $("#autocomplete").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					
					 
					response(data);
				}
			});
		},
		minLength: 2
		});
	});
});