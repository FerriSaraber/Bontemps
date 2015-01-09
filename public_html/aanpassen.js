$('.linkerdiv ul li a').click(function(){
   $('#selectedReservation').val($(this).attr('data-id'));
   $('#lblSelectedReservation').html($(this).html());
   var geselecteerd = $(this).html();
   document.cookie="reservering="+ geselecteerd +"; path=/";
});



$('.menupositie a').click(function(){
    document.cookie = 'reservering' + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    window.location.href='index.php';
});