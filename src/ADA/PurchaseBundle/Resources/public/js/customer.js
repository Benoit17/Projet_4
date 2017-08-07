$(document).ready(function() {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#ticket_customers');

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('.ui-spinner-up').click(function(e) {
        addCustomer($container);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('.ui-spinner-down').click(function(e) {
        $('#ticket_customers>div.form-group:last-child').remove();

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // La fonction qui ajoute un formulaire CustomerType
    function addCustomer($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var value = $( ".spinner" ).spinner( 'value' );

        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Billet n°' + (value))
            .replace(/__name__/g,        index);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);

        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        index++;
    }
});