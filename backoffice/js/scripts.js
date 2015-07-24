$(document).ready(function() {
			
	$.ajax({  // Remplir liste des clubs //
		"async": false,
		url: 'db.php',
		data: 'clubs', // on envoie $_GET['clubs']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$.each(json, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				$('#club').append('<option value="'+ value +'">'+ value +'</option>');
			});
		}
	});
	
	$.ajax({  // Remplir liste des infrastructures //
		"async": false,
		url: 'db.php',
		data: 'infra', // on envoie $_GET['infra']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$.each(json, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				$('#infra').append('<option value="'+ value +'">'+ value +'</option>');
			});
		}
	});

	$.ajax({  // Remplir liste des utilisateurs //
		"async": false,
		url: 'db.php',
		data: 'utilisateurs', // on envoie $_GET['utilisateurs']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$.each(json, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				$('#table_utilisateurs').append('<option value="'+ value +'">'+ value +'</option>');
				//$('#table_utilisateurs').append('<option type="hidden" value="'+ value +'">'+ value +'</option>');
				//$('#utilisateurs').append('<option value="'+ value +'">'+ value +'</option>');
			});
		}
	});

	$.ajax({  // Remplir liste des alias utilisateurs //
		"async": false,
		url: 'db.php',
		data: 'alias', // on envoie $_GET['alias']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$('#table_alias').clear;
			$('#table_alias').append('<option value="">-- Responsable : --</option>');
			$.each(json, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				$('#table_alias').append('<option value="'+ value +'">'+ value +'</option>');
				//$('#table_utilisateurs').append('<option type="hidden" value="'+ value +'">'+ value +'</option>');
				//$('#utilisateurs').append('<option value="'+ value +'">'+ value +'</option>');
			});
		}
	});

});

