<?php
    //require_once("resources/config.php");
    require_once( "header.php");
?>
<div></div>

<div class="header">
    <div class="menupositie">
        <form action="#">
            <input type="submit" value="Reservering toevoegen">
        </form>
        <form action="#">
            <input type="submit" value="Reservering aanpassen">
        </form>
        <form action="#">
            <input type="submit" value="Menu aanpassen">
        </form>
    </div>
</div>
<hr>
<div class="container">
  <button>print rekening</button>
  <textarea class="rekeningselectie" placeholder="voorbeeldnaam"></textarea>
</div>
<?php
	require_once( "footer.php");
?>