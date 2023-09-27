<!--
    TODO Create a details page for each Event when clicking on the image
    TODO Create ticket buying and paying interfaces
    IMPORTANT https://mytickets.lk/https://mytickets.lk/
-->
<div class="dis-flex-col bg-white bor-rad-5 f-poppins over-hide event-card sh">
    <a href=<?= ROOT."/home/events/".$event_id ?>>
        <img src="<?= ROOT ?>/assets/images/events/<?= $image ?>" alt="<?= $name ?>" class="event-image">
    </a>
    <div class="dis-flex ju-co-sb p-0-10 bg-black-1 txt-c-white fill-white">
        <div class="dis-flex al-it-ce gap-10">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
            <p>2023-10-15</p>
        </div>
        <div class="dis-flex al-it-ce gap-10">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
            <p>17:00</p>
        </div>
    </div>
    <div class="pad-10 dis-flex-col flex-1">
        <h3 class="mar-0 f-mooli f-space-1 txt-w-bold"><?= ucfirst($name) ?></h3>
        <h5 class="f-inter flex-grow"><?= $details ?></h5>
    </div>
    <a href=<?= ROOT."/home/events/".$event_id."/buy" ?>>
        <div class="dis-flex-col gap-10  pad-10 mar-0 ju-co-ce bg-indigo-alert txt-c-white flex-wrap">
            <h5 class="flex-1 mar-0 f-space-1">Buy Tickets</h5>
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