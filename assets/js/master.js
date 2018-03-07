        $(document).ready(function () {
    $(".nextButton").click(function () {
        $parent = $(this).parent().parent().parent();
        $parentNext = $(this).parent().parent().parent().next();
        if ($parent.hasClass("visible")) {
            $parent.removeClass("visible");
            $parent.addClass("hidden");
            $parentNext.removeClass("hidden");
            $parentNext.addClass("visible");
        }
         $('input').prop('disabled', false);
             $('.answer').removeClass("visible");
    $('.answer').addClass("hidden");
    });
    
});

$('input').click(function(){
    $('input:not(:checked)').prop('disabled', true);
    $('.answer').removeClass("hidden");
    $('.answer').addClass("visible");
});