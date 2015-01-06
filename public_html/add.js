$('.gast-zoeken ul li a').click(function(){
    $('#selectedGuest').val($(this).attr('data-id'));
    $('#lblSelectedGuest').html($(this).html());
});