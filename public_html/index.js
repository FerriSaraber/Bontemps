$('#printRekening ul li a').click(function(){
   var geselecteerd = $(this).attr('data-id');
   document.cookie = 'reserveringID=' + geselecteerd + '; expires=Fri, 1 Feb 2025 20:00:00 UTC; path=/'
   window.location = "index.php";
});