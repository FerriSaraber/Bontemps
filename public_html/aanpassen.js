$('.linkerdiv ul li a').click(function(){
   $('#selectedReservation').val($(this).attr('data-id'));
   $('#lblSelectedReservation').html($(this).html());
   var geselecteerd = $(this).html();
   var reservationID = $(this).attr('data-id');
   document.cookie = 
           'reservering=' + geselecteerd + '; expires=Fri, 1 Feb 2025 20:00:00 UTC; path=/bontemps/public_html';
   document.cookie = 
           'reservationID=' + reservationID + '; expires=Fri, 1 Feb 2025 20:00:00 UTC; path=/bontemps/public_html';
   
   
   console.log(document.cookie.reservering);
});

$('.menu-item-overzicht ul li a').click(function(){
    var geselecteerd = $(this).html();
    document.cookie = 
           'orderedItem=' + geselecteerd + '; expires=Fri, 1 Feb 2025 20:00:00 UTC; path=/bontemps/public_html'
   window.location = "aanpassen.php";
});

var aanpaspagina = true;