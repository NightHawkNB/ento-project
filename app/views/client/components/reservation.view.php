
<div class="dis-flex wid-100">
    <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins" style="gap: 100px">
        <div class="txt-c-black dis-flex-col gap-10 flex-1">
            <h4>Name:</h4>
            <p><?= $fname." ".$lname ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Created date</p>
            <p><?= $createdDate ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Event</p>
            <p><?= $details ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Start date and time</p>
            <p><?= $start_time ?></p>
            <p class="txt-w-bold">End date and time</p>
            <p><?= $end_time ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Location</p>
            <p><?= $location ?></p>
        </div>

        <?php
        $color = "black";
        if($status == 'Pending') $color = "orange";
        else if ($status == 'Accepted') $color = "lightgreen";
        else if ($status == 'Decline') $color = "red";
        ?>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Status</p>
            <p style="color: <?= $color ?>;"><?= $status ?></p>
        </div>

    </div>
</div>