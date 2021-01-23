$( document ).ready(function() {

	//Modifier la copropriete que le gestionnaire va choisir
	$('.changerCoproprieteCheck').on('click',function(){

		idCopropriete = $(this).attr('value')
		console.log(idCopropriete)
		$.ajax({
			url: 'model/gestionnaire/changerCopropriete.php',
			type: 'POST',
			data: 'idCopropriete='+ idCopropriete,
			success : function(response){
				window.location.reload()
			},
			error : function(response){
				console.log(response)
			}
		})


	})

	/* Click sur bouton supprimer d'un copropriétaire*/
	$('.supprimerCoproprietaireCross').on('click',function(){

		if(confirm("Voulez-vous vraiment supprimer ce copropriétaire ?")){

			idCoproprietaire = $(this).attr('value')
			$.ajax({
				url: 'model/gestionnaire/supprimerCoproprietaire.php',
				type: 'POST',
				data: 'idCoproprietaire='+ idCoproprietaire,
				success : function(response){
					console.log(response)
					window.location.reload()
				},
				error : function(response){
					console.log(response)
				}
			})
		}
	})

	/* Click sur bouton modifier d'un copropriétaire*/
	$('.modifierCoproprietaireLine').on('click',function(){
		idCoproprietaire = $(this).attr('value')
		window.location = "index.php?act=modifierCoproprietaireForm&id="+idCoproprietaire;
	})
	

	/* Click sur bouton modifier d'un bien*/
	$('.modifierBienLine').on('click',function(){
		idBien = $(this).attr('value')
		window.location = "index.php?act=modifierBienForm&id="+idBien;
	})


	/* Click sur bouton supprimer d'un copropriétaire*/
	$('.supprimerBienCross').on('click',function(){

		if(confirm("Voulez-vous vraiment supprimer ce copropriétaire ?")){

			idBien = $(this).attr('value')
			console.log(idBien)
			$.ajax({
				url: 'model/gestionnaire/supprimerBien.php',
				type: 'POST',
				data: 'idBien='+ idBien,
				success : function(response){
					console.log(response)
					window.location.reload()
				},
				error : function(response){
					console.log(response)
				}
			})
		}
	})

});