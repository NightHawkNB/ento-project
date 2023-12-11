<div class="reservations">

    <?php
    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);
    ?>

    <p><?= $fname." ".$lname ?></p>
    <p><?= $start_time ?></p>
    <p><?= $location ?></p>
    <p><?= $interval->format("%a days : %h hours : %i minutes") ?></p>
    <?php
    if($status == 'pending'){
        echo "<div style='background-color: lightgreen; border-radius: 10px'> <p><?= {$status} ?></p></div>";
    }
    ?>


</div>
