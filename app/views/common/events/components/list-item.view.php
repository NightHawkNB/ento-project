<?php
$dateTime = new DateTime($start_time);
?>
<div class="dis-flex-col bg-white bor-rad-5 f-poppins over-hide event-card sh"
     style="width: 350px; height: 400px">
    <!-- Wrap the image and hover effect in a container -->
    <div class="image-container" style="width: fit-content; height: 250px">
        <a href=<?= ROOT . "/home/events/" . $event_id ?>>
            <!-- Add a class to the image for styling -->
            <img src="<?= ROOT . $image ?>" alt="<?= $name ?>" class="event-image" style="object-fit: cover; width: 100%; height: 250px">
            <!-- Add a button that appears on hover -->
            <div class="hover-button">
                <a href="<?= ROOT . "/home/events/" . $event_id ?>" class="more-button">More Details</a>
            </div>
        </a>
    </div>
    <div class="dis-flex ju-co-sb pad-10 bg-black-1 txt-c-white fill-white">
        <div class="dis-flex al-it-ce gap-10">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/>
            </svg>
            <p><?= $dateTime->format("Y-m-d") ?></p>
        </div>
        <div class="dis-flex al-it-ce gap-10">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
            </svg>
            <p><?= $dateTime->format("H:i:s") ?></p>
        </div>
    </div>
    <div class="pad-10 dis-flex-col flex-1" style="overflow: hidden; text-overflow: ellipsis">
        <h3 class="mar-0 f-mooli f-space-1 txt-w-bold"><?= ucfirst($name) ?></h3>
        <h5 class="f-inter flex-grow"><?= $details ?></h5>
    </div>
</div>



