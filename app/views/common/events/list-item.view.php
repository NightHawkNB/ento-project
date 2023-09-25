<div class="dis-flex-col bg-white bor-rad-5 f-poppins over-hide event-card shadow">
    <a href="#event-details">
        <img src="<?= ROOT ?>/assets/images/events/<?= $image ?>" alt="<?= $name ?>" class="event-image">
    </a>
    <div class="pad-10 dis-flex-col flex-1">
        <h3 class="mar-0 f-mooli f-space-1 txt-w-bold"><?= ucfirst($name) ?></h3>
        <h5 class="f-inter flex-grow"><?= $details ?></h5>
    </div>
    <a href="#event-buy-tickets">
        <div class="dis-flex-col gap-10  pad-10 mar-0 ju-co-ce bg-indigo-alert txt-c-white flex-wrap">
            <h4 class="flex-1 mar-0 f-space-1">Buy Tickets</h4>
            <div class="dis-flex gap-10 al-it-ce">
                <?php
                    foreach ($ticketing_plan as $ticket) {
                        echo "<div class='bor-rad-10 bor-1-sol-white bg-trans pad-5-10 hover-pointer'>$ticket</div>";
                    }
                ?>
            </div>
        </div>
    </a>
</div>