<a href="<?=ROOT."/eventm/reports/".$event_id?>">
    <div class="txt-c-black bg-white pad-10 bor-rad-10 mar-10 bg-purple">
        <h3><?=$name?></h3>
        <?php
        $start_dateTime = new DateTime("$start_time");
        $end_dateTime = new DateTime("$end_time");
        echo $start_dateTime->format("Y-m-d")." ";
        echo $start_dateTime->format("H:i")."-".$end_dateTime->format("H:i");
        ?>

    </div>
</a>