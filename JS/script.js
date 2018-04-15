$(document).ready(function() {
	var comutMenu = function(clat,arata,ascuns1,ascuns2,ascuns3,ascuns4,ascuns5){
		$(clat).click(function() {
			$(arata).show();
			$(ascuns1).hide();
			$(ascuns2).hide();
			$(ascuns3).hide();
			$(ascuns4).hide();
			$(ascuns5).hide();
		});
	}

	var schimb = function (din, spre, url) {
		$(din).click(function() {
			$.ajax({
				type: "POST",
				url: url,
				data: $(this).serialize(),
				success: function (argument) {
					$(spre).html(argument);
				}
			}).done(function() {
				$(this).find("input").val("");
			});
		});
	};
$('#tehnica').change(function() {
	$('#_model').html('<select class="form-control"></select>');
});


	schimb('#tehnica' ,'#_marca', '../marca.php');
		$('#_marca').click(function() {
			$.ajax({
				type: "POST",
				url: '../model.php',
				data: $('#marca').serialize(),
				success: function (argument) {
					$('#_model').html(argument);
				}
			}).done(function() {
				$(this).find("input").val("");
			});
		});
	schimb('#tehnica' ,'#_servicii', '../tip_servicii.php');

	$('.sets').click(function() {

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

	$('.rol_schimb').change(function() {

		$.ajax({
			type: "POST",
			url: '../inginer/rol_change.php',
			data: $(this).serialize(),
			success: function(html){
				alert('Sa schimbat rolul');
			}
		});
	});

  //	var cicu = function(asupra){
	// 	var cic=false;
	// 	$(asupra).hover(function() {
	// 		$(this).children('div.triunghi').show();
	// 		$(this).click(function() {
	// 			cic=true;
	// 		});
	// 	}, function() {
	// 		if (cic==false) {
	// 		$(this).children('div.triunghi').hide();
	// 		}
	// 	});
	// }

	// cicu("#list-menu1");
	// cicu("#list-menu2");
	// cicu("#list-menu3");

	comutMenu('#profil',   '#page1','#page2','#page3','#page4','#page5','#page6');
	comutMenu('#inscriere','#page2','#page1','#page3','#page4','#page5','#page6');
	comutMenu('#inscrieri','#page3','#page1','#page2','#page4','#page5','#page6');
	comutMenu('#settings', '#page4','#page1','#page2','#page3','#page5','#page6');
	comutMenu('#user_info','#page5','#page1','#page2','#page3','#page4','#page6');
	comutMenu('#add_base', '#page6','#page1','#page2','#page3','#page4','#page5');

	$('#caut_but').click(function() {
		$.ajax({
			url: '../tabel.php',
			type: 'POST',
			dataType: 'html',
			data: $('#caut_form').serialize(),
			success: function(argument){
				$('#tablea').html(argument);
			}
		})
	});

	$('.ord_but').click( function(){
		$.ajax({
			url:'../ordonarea.php',
			type:'POST',
			dataType:'html',
			data : { ord : $(this).val() },
			success: function (html) {
				$('#tablea').html(html);
			}
		});
	});

});
