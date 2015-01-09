$('.linkerdiv ul li a').click(function(){
   $('#selectedReservation').val($(this).attr('data-id'));
   $('#lblSelectedReservation').html($(this).html());
   var geselecteerd = $(this).html();
   document.cookie="reservering= "+ geselecteerd +"; path=/";
});

