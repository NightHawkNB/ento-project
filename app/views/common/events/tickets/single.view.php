
<div class="dis-flex wid-100">
    <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins">
        <div class="txt-c-black dis-flex gap-20 ju-co-sb wid-100" style="gap: 100px">

            <div class="dis-flex-col txt-c-black gap-10">
                <p class="txt-w-bold">QR code</p>
                <p><?= $qr_code ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <h4>Serial number</h4>
                <p><?= $serial_num ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <h4>Ticket type</h4>
                <p><?= $type ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <h4>Price</h4>
                <p><?=$price?></p>
            </div>

<!--            <div class="dis-flex-col txt-c-black gap-10">-->
<!--                <h4>Event</h4>-->
<!--                <p>--><?php //=$name?><!--</p>-->
<!---->
<!--                <h4>Venue</h4>-->
<!--                <p>--><?php //=$venue?><!--</p>-->
<!---->
<!--                <h4>Date and Time</h4>-->
<!--                <p>--><?php //=$DateTime?><!--</p>-->
<!--            </div>-->

        </div>

        <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
            <a href="<?= ROOT ?>/client/tickets/delete/<?= $ticket_id ?>">
                <button class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button>
            </a>
        </div>

    </div>
</div>