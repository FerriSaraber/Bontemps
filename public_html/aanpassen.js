$('.linkerdiv ul li a').click(function(){
   $('#selectedReservation').val($(this).attr('data-id'));
   $('#lblSelectedReservation').html($(this).html());
   var geselecteerd = $(this).html();
   Session['reservering'] = geselecteerd;
});