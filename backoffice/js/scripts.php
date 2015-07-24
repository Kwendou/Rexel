$(function() {
	$( "#tabs" ).tabs();
});

$('#sec_nr').autocomplete({
	source: 'sec_nr.php',
	autoFocus : true,
	minLength: 1,
});

$('#customer').autocomplete({
	source: 'customer.php',
	autoFocus : true,
	minLength: 1,
});

$('#name').autocomplete({
	source: 'name.php',
	autoFocus : true,
	minLength: 1,
});

$('#user').autocomplete({
	source: 'user.php',
	autoFocus : true,
	minLength: 1,
});

$('#dossier').autocomplete({
	source: 'dossier.php',
	autoFocus : true,
	minLength: 1,
});

$('#class').autocomplete({
	source: 'class.php',
	autoFocus : true,
	minLength: 1,
});

$('#id').autocomplete({
	source: 'id.php',
	autoFocus : true,
	minLength: 1,
});

$('#zipcode').autocomplete({
	source: 'zipcode.php',
	autoFocus : true,
	minLength: 1,
});

$('#city').autocomplete({
	source: 'city.php',
	autoFocus : true,
	minLength: 1,
});

$(function() {
    var spinner = $( "#spinner" ).spinner();
 
    $( "#disable" ).click(function() {
      if ( spinner.spinner( "option", "disabled" ) ) {
        spinner.spinner( "enable" );
      } else {
        spinner.spinner( "disable" );
      }
    });
    $( "#destroy" ).click(function() {
      if ( spinner.spinner( "instance" ) ) {
        spinner.spinner( "destroy" );
      } else {
        spinner.spinner();
      }
    });
    $( "#getvalue" ).click(function() {
      alert( spinner.spinner( "value" ) );
    });
    $( "#setvalue" ).click(function() {
      spinner.spinner( "value", 5 );
    });
 
    $( "button" ).button();
});
 
$(function() {
	$( "#accordion" ).accordion({
	  collapsible: true,
	  heightStyle: "content",
	  active: false
	});
});

$(function() {
	$( "#accordion2" ).accordion({
	  collapsible: true,
	  heightStyle: "content",
	  active: false
	});
});

$(function() {
	$( "#accordion3" ).accordion({
	  collapsible: true,
	  heightStyle: "content",
	  active: false
	});
});

$(function() {
	$( "#accordion4" ).accordion({
	  collapsible: true,
	  heightStyle: "content",
	  active: false
	});
});

$(function() {
	$( "#accordion5" ).accordion({
	  collapsible: true,
	  heightStyle: "content",
	  active: false
	});
});

$(function() {
	$( "#accordion6" ).accordion({
	  collapsible: true,
	  heightStyle: "content",
	  active: false
	});
});

$(function() {
var icons = {
  header: "ui-icon-circle-arrow-e",
  activeHeader: "ui-icon-circle-arrow-s"
};
$( "#accordion" ).accordion({
  icons: icons
});
$( "#toggle" ).button().click(function() {
  if ( $( "#accordion" ).accordion( "option", "icons" ) ) {
	$( "#accordion" ).accordion( "option", "icons", null );
  } else {
	$( "#accordion" ).accordion( "option", "icons", icons );
  }
});
$( "#accordion5" ).accordion({
  icons: icons
});
$( "#toggle" ).button().click(function() {
  if ( $( "#accordion5" ).accordion( "option", "icons" ) ) {
	$( "#accordion5" ).accordion( "option", "icons", null );
  } else {
	$( "#accordion5" ).accordion( "option", "icons", icons );
  }
});

});

function cp_change() {
	
	if ($("#cp").val() >= 1000){
		$("#div_localite_ok").css("display","block");
	} else {
		$("#div_localite_ok").css("display","none");
	}
}

function reset_criteres() {
	alert("Reset !");
	$("#sec_nr").val("-");
}

function recherche() {
//	var $liste=$('#liste_accessoires_pac');
//	var $releve=$("#releve").val();		
	$.ajax(
	"/sheets/recherche.php?sec_nr=" + $("#sec_nr").val() +
	"&customer=" + $("#customer").val() +
	"&name=" + $("#name").val() +
	"&user=" + $("#user").val() +
	"&dossier=" + $("#dossier").val() +
	"&class=" + $("#class").val() +
	"&zipcode=" + $("#zipcode").val() +
	"&city=" + $("#city").val(), { 
	"type": "GET",
	"cache": false,
	"dataType": "html"
	}).done(function(json) {
		$("#tableau").html(json);
		});
	
}

function accordeon_change($offset) {
	var offset = $($offset).offset();
	//$('html,body').animate({scrollTop: offset.top}, 1000);
}


$(document).ready(function() {
	//document.getElementById("city").onchange = recherche;
	//document.getElementById("zipcode").onchange = recherche;
	//document.getElementById("sec_nr").onchange = alert("Sec number");
	//document.getElementById("bouton_reset").onclick = reset_criteres;
	
	$('#accordion').bind('click', function (e) {
	// bind to the the header / anchor clicks
	//	accordeon_change("#accordion:first");
	});
	
	$('#accordion1').bind('click', function (e) {
	// bind to the the header / anchor clicks
		accordeon_change("#accordion:first");
	});
	
	$('#accordion2').bind('click', function (e) {
	// bind to the the header / anchor clicks
		accordeon_change("#accordion:first");
	});
	
	$('#accordion3').bind('click', function (e) {
	// bind to the the header / anchor clicks
		accordeon_change("#accordion:first");
	});

	$('#accordion4').bind('click', function (e) {
	// bind to the the header / anchor clicks
		accordeon_change("#accordion:first");
	});
	
	$('#accordion5').bind('click', function (e) {
	// bind to the the header / anchor clicks
		accordeon_change("#accordion5:first");
	});
			
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

	/*$.ajax({  // Remplir liste code postaux //
		"async": false,
		url: 'sheets/belgique.php',
		data: 'go', // on envoie $_GET['go']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$.each(json, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				$cp.append('<option value="'+ value +'">'+ value +'</option>');
			});
		}
	});

	$.ajax({  // Remplir infos projet //
		"async": false,
		url: 'sheets/lireprojet.php',
		data: 'lire', // on envoie $_GET['lire']
		dataType: 'json', // on veut un retour JSON
		success: function(json) {
			$.each(json, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				switch (index) {
					case "CodePostal": {
						$('#cp').val(value);
						break;
					}
					
					case "Localite": {
						$('#localite').append('<option value="'+ value +'">'+ value +'</option>');
						$('#localite').val(value);
						break;
					}

					case "Tbase": {
						$('#t_base').html(value); 
						break;
					}
					
					case "type_ecs": { 
						$type_ecs=$("#type_ecs").val();
						$valeur=value;
						if ($valeur=="boiler séparé") {
							$("#ecs_check").attr('checked', true);
							$("#div_ecs").css("display","block");
							$type_ecs="separe";
						}
						if ($valeur=="boiler intégré") {
							$("#ecs_check").attr('checked', true);
							$("#div_ecs").css("display","block");
							$type_ecs="integre";
						}	
						if ($valeur=="") {
							$("#ecs_check").attr('checked', false);
							$("#div_ecs").css("display","none");
							$type_ecs="integre";
						}	
						break;
					}
					
					case "utils_ecs": {
						$("#utils_ecs").val(value);
						break;
					}
					
					case "2zones": {		
						if (value == "VRAI") {
							$('input[type=radio][name=nbre_zones][value=2]').attr('checked', true);
							$("#temp_depart_z2").css("display","block");
							$deuxzones=true;
						} else {
							$('input[type=radio][name=nbre_zones][value=1]').attr('checked', true);
							$("#temp_depart_z2").css("display","none");
							$deuxzones=false;
						}
						break;
					}

					case "t_depart_z1": {
						$('#t_depart_z1').val(value);
						if (value>60) {
							$("#div_releve").css("display","block");
						}
						break;
					}
					case "t_depart_z2": {
						$('#t_depart_z2').val(value);
						if (value>60) {
							$("#div_releve").css("display","block");
						}
						break;
					}
					case "Deperditions": {
						$('#deperdition_t_base').val(value);
						break;
					}
				}
			});
			cp_change();
		}
	});

	// Sélection d un code postal dans la liste
	$cp.on('change', function() {
		var val = $(this).val(); // on récupère le code postal
 
		if(val != '') {
			$localite.empty(); // on vide la liste des localités

			$.ajax({
				"async": false,
				url: 'sheets/belgique.php',
				data: 'cp='+ val, // on envoie $_GET['cp']
				dataType: 'json',
				success: function(json) {
					$.each(json, function(index, value) {
						$localite.append('<option value="'+ value +'">'+ value +'</option>');
						align="right"
					});
				}
			});
			
			$.ajax(
			{
				"async": false,
				url: 'sheets/t_base.php',
				data: 'cp='+ val, // on envoie $_GET['localite']
				dataType: 'json',
				success: function(json) {
					$.each(json, function(index, value) {
						$("#t_base").html(value);
						$tbase=value;
					});
				}
			});
		}
		
		listePAC();			

		
		$('#t_depart_z1').val("35");
		$('#releve option[value="pac_seule"]').prop('selected', true);
		releve_change();
	});
	
	if ($('#type_ecs').val()=="integre" && $('#utils_ecs').val()>5) {
		$('#type_ecs option[value="separe"]').prop('selected', true);
	}
	
	listePAC();			
*/	
});

