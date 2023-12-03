
<div class="dis-flex wid-100">
    <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins" style="gap: 100px">
        <div class="txt-c-black dis-flex-col gap-10 flex-1">
            <h4>Name:</h4>
<!--            <p>--><?php //= $details ?><!--</p>-->
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Reservation ID</p>
            <p><?= $reservation_id ?></p>
        </div>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Date and Time</p>
<!--            <p>--><?php //= $date_time ?><!--</p>-->
        </div>

<!--        --><?php
//        $color = "black";
//        if($status == 'Idle') $color = "blue";
//        else if ($status == 'Accepted') $color = "purple";
//        else if ($status == 'Pending') $color = "orange";
//        else if ($status == 'Handled') $color = "lightgreen";
//        else if ($status == 'Assist') $color = "brown";
//        else $color = "red";
//        ?>

        <div class="dis-flex-col txt-c-black gap-10">
            <p class="txt-w-bold">Status</p>
<!--            <p style="color: --><?php //= $color ?><!--">--><?php //= $status ?><!--</p>-->
        </div>

<!--        <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">-->
<!---->
<!---->
<!--            <div class="dis-flex-col gap-10 al-it-ce">-->
<!--                --><?php //if (Auth::is_cca()): ?>
<!--                    <a href="--><?php //= ROOT ?><!--/cca/complaints/assists/--><?php //= $comp_id ?><!--">-->
<!--                        <button class="btn-lay-2 hover-pointer btn-anima-hover">Assist Request</button>-->
<!--                    </a>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php //if (!Auth::is_cca()): ?>
<!--                    <a href="--><?php //= ROOT ?><!--/home/complaint/update_complaint/--><?php //= $comp_id ?><!--">-->
<!--                        <button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button>-->
<!--                    </a>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
<!---->
<!--            <div class="dis-flex-col gap-10 al-it-ce">-->
<!--                --><?php //if (Auth::is_cca()): ?>
<!--                    <a href="--><?php //= ROOT ?><!--/cca/complaints/handle/--><?php //= $comp_id ?><!--"><button class="btn-lay-2 hover-pointer btn-anima-hover">Handle</button></a>-->
<!--                --><?php //endif; ?>
<!---->
<!--                <a href="--><?php //= ROOT ?><!--/home/complaint/delete_complaint/--><?php //= $comp_id ?><!--">-->
<!--                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>