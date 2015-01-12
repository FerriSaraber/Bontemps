$('.linkerdiv ul li a').click(function(){
   $('#selectedReservation').val($(this).attr('data-id'));
   $('#lblSelectedReservation').html($(this).html());
   var geselecteerd = $(this).html();
   document.cookie = 
           'reservering=' + geselecteerd + '; expires=Fri, 1 Feb 2025 20:00:00 UTC; path=/'
});

$('.menu-item-overzicht ul li a').click(function(){
    var geselecteerd = $(this).html();
    document.cookie = 
           'orderedItem=' + geselecteerd + '; expires=Fri, 1 Feb 2025 20:00:00 UTC; path=/'
   window.location = "aanpassen.php";
});

var aanpaspagina = true;