<div class="reservation">
    <div>
        <p><?=$name?></p>
    </div>
    <div>
        <?php
        $start_dateTime = new DateTime($start_time);
        $end_dateTime = new DateTime($end_time);
        echo $start_dateTime->format("Y-m-d");
        ?>
    </div>
    <div>
        <p><?=$start_dateTime->format("H:i")?></p>
    </div>
    <div>
        <p><?=$end_dateTime->format("H:i")?></p>
    </div>
    <div>
        <a href="<?=ROOT?>/client/bought_tickets/<?=$event_id?>">
            <button>Show Tickets</button>
        </a>
    </div>

</div>
