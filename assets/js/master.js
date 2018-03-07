$(document).ready(function () {
  cardId = 0;
  answer = 0;
  $(".nextButton").click(function () {



    cardId = $(this).attr('id');
    cardId = parseInt(cardId);
    parent = $('#card-' + cardId);
    parentNext = $('#card-' + (cardId + 1));


    if (parent.hasClass("visible")) {
      parent.removeClass("visible");
      parent.addClass("hidden");
      parentNext.removeClass("hidden");
      parentNext.addClass("visible");
    }
    $('input').prop('disabled', false);

    $('#description-' + (cardId)).removeClass("visible");
    $('#description-' + (cardId)).addClass("hidden");
    console.log($('#description-' + cardId).attr('id'));
    console.log(cardId);
    console.log(parent.attr('id'));
    console.log(parentNext.attr('id'));
  });
});

$('input').click(function () {
  $('input:not(:checked)').prop('disabled', true);
  $('#description-' + (cardId + 1)).removeClass("hidden");
  $('#description-' + (cardId + 1)).addClass("visible");
  console.log($('#description-' + (cardId + 1)).attr('id'));
  answer = $(this).attr('data-answer');
  $('#card-' + (cardId + 1) + ' label').each(function () {
    console.log($(this).attr('data-iscorrect'));
    console.log(answer);
    if ($(this).attr('data-iscorrect') == 1) {
      $(this).addClass('bg-success');
    }
  });
  if (answer == 1) {
    $('#description-' + (cardId + 1)).prepend('<h3 class="text-uppercase">Bonne réponse</h3>');
  } else {
    $('#description-' + (cardId + 1)).prepend('<h3 class="text-uppercase">Mauvaise réponse</h3>');
  }


  //console.log($('#card-' + (cardId + 1) + ' label').attr('data-iscorrect'));    
  //   $(this).next('label').addClass('bg-success');    
});