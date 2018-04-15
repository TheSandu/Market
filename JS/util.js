$(document).ready(function() {

	$('.login').click(function() {
		$.ajax({
			url: '../Utilizatori/change.php',
			type: 'POST',
			data: {log: $(this).text()},
			success: function(argument) {
				$('#contain').html(argument);
			}
		});
	});

	$('#rol_but').click(function() {

		$.ajax({
			type: "POST",
			url: '../inginer/pocazati.php',
			data: $(this).parent().children('select').serialize(),
			success: function(html){
				$("#footer").html(html);
			}
		});
			alert('Sa incarcat');
	});

});
