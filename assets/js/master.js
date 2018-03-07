//DOCUMENT READY
$(function () {
//cardId=0;
//answer =0;

// BOUTON 'question suivante'
    $(".nextButton").click(function () {
        //id du bouton = id de la question dans la bdd
        cardId = $(this).attr('id');
        cardId = parseInt(cardId);
        //id de la card contenant le bouton
        parent = $('#card-' + cardId);
        parentNext = $('#card-' + (cardId + 1));
        //masque la card et affiche la suivante
        if (parent.hasClass("visible")) {
            parent.removeClass("visible");
            parent.addClass("hidden");
            parentNext.removeClass("hidden");
            parentNext.addClass("visible");
        }
        //active les input
        $('input').prop('disabled', false);
        //masque l'encart réponse 'le saviez vous'
        $('#description-' + (cardId)).removeClass("visible");
        $('#description-' + (cardId)).addClass("hidden");
        console.log($('#description-' + cardId).attr('id'));
        //tests
        console.log(cardId);
        console.log(parent.attr('id'));
        console.log(parentNext.attr('id'));
    });

//choix d'une réponse
    $('input').click(function () {
        //desactive les inputs
        $('input').prop('disabled', true);
        //affichage de  l'encart réponse 'le saviez vous'
        $('#description-' + (cardId + 1)).removeClass("hidden");
        $('#description-' + (cardId + 1)).addClass("visible");
        // stocke la validité de la réponse de l'utilisateur : bool
        answer = $(this).attr('data-answer');

        // met en surbrillance la bonne réponse
        $('#card-' + (cardId + 1) + ' label').each(function () {
//  console.log($(this).attr('data-iscorrect'));
//  console.log(answer);
            if ($(this).attr('data-iscorrect') == 1) {
                $(this).parent().addClass('success');
            }
        });
// message de retour à l'utilisateur
        if (answer == 1) {
            $('#description-' + (cardId + 1)).prepend('<h3 class="text-uppercase right p-3 mb-3"><i class="fas fa-check-circle"></i> Bonne réponse</h3>');
        } else {
            $('#description-' + (cardId + 1)).prepend('<h3 class="text-uppercase wrong p-3 mb-3"><i class="fas fa-times-circle"></i> Mauvaise réponse</h3>');
        }
        console.log($('#description-' + (cardId + 1)).attr('id'));
    });

