<?php
$dateTime = new DateTime($event->start_time);
//$custom_band_image =
?>
<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
<!--        --><?php //=show($data)?>

        <div class="mar-10 bor-rad-5 dis-flex-col sh" style="overflow: auto">
            <img src="<?= ROOT ?>/assets/images/events/event-01.cover.jpeg" alt="cover-image" class="wid-100 event-cover-image">
            <div class="dis-flex-col txt-c-black">
                <div class="bg-black-1 txt-c-white pad-10-20 dis-flex gap-20 fill-white sh">
                    <h1 class="f-mooli txt-w-bold"><?=$event->name?></h1>
                    <div class="dis-flex al-it-ce gap-10 push-right">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                        <p><?=$dateTime->format("Y-m-d")?></p>
                    </div>
                    <div class="dis-flex al-it-ce gap-10">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                        <p><?=$dateTime->format("H:i")?></p>
                    </div>
                </div>
                <div>
                    <div class="dis-flex al-it-ce gap-10  pad-10 mar-0 ju-co-ce bg-indigo-alert txt-c-white flex-wrap">
                        <h5 class="flex-1 mar-0 f-space-1">Buy Tickets</h5>
                        <div class="dis-flex gap-10 al-it-ce">
                            <a href=<?= ROOT."/home/events/1/pay" ?>><div class='bor-rad-10 bor-1-sol-white bg-trans pad-5-10 hover-pointer'>5000</div></a>
                            <a href=<?= ROOT."/home/events/1/pay" ?>><div class='bor-rad-10 bor-1-sol-white bg-trans pad-5-10 hover-pointer'>3000</div></a>
                        </div>
                    </div>
                </div>
                <div class="bg-white pad-20">
                    <p class="f-poppins pad-10">
                        <ul type="none" class="mar-0 dis-flex-col gap-10">
                            <li>01. All tickets purchased are non-refundable.</li>
                            <li>01. අන්තර්ජාල ප්‍රවේශපත්‍රය කිසිදු ආකාරයකින් නැවත ගෙවීමක් සිදු කරනු නොලැබේ.</li>

                            <li>02. Please note that our online tickets cannot be changed once purchased. This includes changes to the category, show, seat, price, or any other aspects of the ticket. We highly recommend that you carefully review your selection before completing your online purchase to ensure that you have chosen the correct ticket.</li>
                            <li>02. අන්තර්ජාල ප්‍රවේශපත්‍රයක් කිසිදු අයුරකින් හෝ කිසිදු හේතුවක් මත වෙනස් කිරීමකට ( ඛාණ්ඩය / ප්‍රසංගය / ආසන හෝ ආසනය / මිළ ආදී කිසිවක්... ) හැකියාවක් නොමැති අතර කිසිදු අයුරකින් නැවත ගෙවීමක් අප විසින් සිදු කරනු නොලැබේ. එම නිසා ඔබගේ අන්තර්ජාල ප්‍රවේශ පත්‍රය නිවැරදි ලෙස තෝරා ලබාගන්න.</li>
                        </ul>
                    </p>
                </div>
                <div class="bg-black-1 txt-c-white pad-10 dis-flex ju-co-ce gap-20">
<!--
<!--                    for singers-->

                    <?php if (!empty($singers)): ?>
                        <?php foreach ($singers as $singer): ?>
                            <a href="#user_02">
                                <?php $this->view('common/events/components/event_singer', (array)$singer); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>

<!--                    For bands-->

                    <?php if (!empty($band)): ?>
                    <a href="#user_03">
                        <div class="card-profile bg-black-2 pad-10 bor-rad-5 dis-flex-col al-it-ce">
                            <img src="<?= ROOT ?><?=$band->band_image?>>" alt="user-03" class="profile-image-2">
                            <h3 class="mar-10"><?=$band->$band_name?></h3>
                            <h4 class="mar-10">Band</h4>
                        </div>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($event->custom_band)): ?>
                        <a href="#user_03">
                            <div class="card-profile bg-black-2 pad-10 bor-rad-5 dis-flex-col al-it-ce">
<!--                                I have to use default image here as $custom_band_image-->
<!--                                <img src="--><?php //= ROOT ?><!----><?php //=$band->band_image?><!--" alt="user-03" class="profile-image-2">-->
                                <h3 class="mar-10"><?=$event->custom_band?></h3>
                                <h4 class="mar-10">Band</h4>
                            </div>
                        </a>
                    <?php endif; ?>

<!--                    For venue-->

                    <?php if (!empty($venue)): ?>
                    <a href="#venue_01">
                        <div class="card-profile bg-black-2 pad-10 bor-rad-5 dis-flex-col al-it-ce">
                            <img src="<?= ROOT ?><?=$venue->venue_image?>" alt="venue_01" class="venue-image">
                            <h3 class="mar-10"><?=$venue->venue_name?></h3>
                            <h4 class="mar-10">Venue</h4>
                        </div>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($event->custom_venue)): ?>
                        <a href="#venue_01">
                            <div class="card-profile bg-black-2 pad-10 bor-rad-5 dis-flex-col al-it-ce">
<!--                                I have to use default image as $custom_venue_image-->
<!--                                <img src="--><?php //= ROOT ?><!----><?php //=$venue->venue_image?><!--" alt="venue_01" class="venue-image">-->
                                <h3 class="mar-10"><?=$event->custom_venue?></h3>
                                <h4 class="mar-10">Venue</h4>
                            </div>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </main>
</div>
</body>
</html>