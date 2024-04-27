<div class="dis-flex wid-100 ">
    <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins "
         style="gap: 100px">
        <div class="txt-c-black dis-flex-col gap-10 flex-1 ">
            <h4>Details:</h4>
            <p><?= $details ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Complaint ID</p>
            <p><?= $comp_id ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Date and Time</p>
            <p><?= $date_time ?></p>
        </div>

        <?php
        $color = "black";
        if ($status == 'Idle') $color = "blue";
        else if ($status == 'Accepted') $color = "purple";
        else if ($status == 'Pending') $color = "orange";
        else if ($status == 'Handled') $color = "lightgreen";
        else if ($status == 'Assist') $color = "brown";
        else $color = "red";
        ?>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Status</p>
            <p style="color: <?= $color ?>"><?= $status ?></p>
        </div>

        <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
        </div>
    </div>
</div>
