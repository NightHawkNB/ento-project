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
    if($status == 'Pending'){
        echo "<div style='background-color: lightgreen; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
    } elseif($status == 'Accepted'){
        echo "<div style='background-color: lightblue; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
    }elseif($status == 'Declined'){
        echo "<div style='background-color: lightcoral; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";

    }
    ?>


</div>
