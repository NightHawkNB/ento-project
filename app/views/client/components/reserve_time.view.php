<?php
// Sample datetime string
$start_time = new DateTime($start_time);
$end_time = new DateTime($end_time);
?>
<div class="pad-10  "">

    <style>
        .res-datetime {

            display: flex;
            align-items: center;
            gap: 10px;

            .res-date {
                background-color: red;
                padding: 10px;
                border-radius: 5px;
                color: var(--font-secondary);
            }

            .res-time {
                padding: 10px;
                background-color: white;
                color: var(--font-primary);
                border-radius: 5px;
                display: flex;
                gap: 10px;
                align-items: center;
            }
        }
    </style>

    <div class="res-datetime">
        <span class="res-date"><?= $start_time->format("m-d") ?></span>

        <span class="res-time">
            <span><?= $start_time->format("H:i") ?></span>
            to
            <span><?= $end_time->format("H:i") ?></span>
        </span>

    </div>

</div>