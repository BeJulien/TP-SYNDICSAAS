$( document ).ready(function() {

    let $deleteCroixGestionnaire = $('.deleteCroixGestionnaire') // Tableau de tous les boutons de suppression (gestionnaires)
    let $modifEngrenageGestionnaire = $('.modifEngrenageGestionnaire') // Tableau de tous les boutons de modification (gestionnaires)
    
    let $deleteCroixCopropriete = $('.deleteCroixCopropriete') // Tableau de tous les boutons de suppression (copropriétés)
    let $modifEngrenageCopropriete = $('.modifEngrenageCopropriete') // Tableau de tous les boutons de suppression (copropriétés)

    $deleteCroixGestionnaire.each((index, element) => {
        $(element).on('click', () => {
            let idUtilisateur = $(element).attr('id')
            if(confirm("Voulez-vous supprimer ce gestionnaire de copropriété ?")){
                $.ajax({
                    url: 'model/admin/supprGestionnaire.php',
                    type: 'POST',
                    data: 'suppr=' + idUtilisateur,
                    success: function() {
                        location.reload()
                    }
                })
            }
        })
    })

    $modifEngrenageGestionnaire.each((index, element) => {
        $(element).on('click', () => {
            let idUtilisateur = $(element).attr('id')

            window.location = 'index.php?act=modifierGestionnaireForm&modif=' + idUtilisateur
        })
    })

    $deleteCroixCopropriete.each((index, element) => {
        $(element).on('click', () => {
            let idCopropriete = $(element).attr('id')
            if(confirm("Voulez-vous supprimer cette copropriété ?")){
                $.ajax({
                    url: 'model/admin/supprCopropriete.php',
                    type: 'POST',
                    data: 'suppr=' + idCopropriete,
                    success: function() {
                        location.reload()
                    }
                })
            }
        })
    })

    $modifEngrenageCopropriete.each((index, element) => {
        $(element).on('click', () => {
            let idCopropriete = $(element).attr('id')

            window.location = 'index.php?act=modifierCoproprieteForm&modif=' + idCopropriete
        })
    })

});
