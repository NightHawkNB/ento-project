<div class="reservation">
    <div>
        <p><?=$name?></p>
    </div>
    <div>
        <?php
        $start_dateTime = new DateTime($start_time);
        $end_dateTime = new DateTime($end_time);
        echo $start_dateTime->format("Y-m-d")." ".$start_dateTime->format("H:i")."-".$end_dateTime->format("H:i");
        ?>
    </div>
    <div>
        <p><?=$price?></p>
    </div>
    <div>
        <p><?=$type?></p>
    </div>
    <div>
        <a href="<?=ROOT?>/client/bought_tickets/<?=$event_id?>">
            <button>Show Tickets</button>
        </a>
    </div>

</div>
