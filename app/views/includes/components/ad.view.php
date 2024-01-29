<div class="ad sh" data-category="<?= $category ?>" >

    <div class="top">
        <div class="vertical">
            <img src="<?= $image ?>" style="object-fit: cover" alt="user-01">

            <h2 class="f-poppins"><?= $title ?></h2>
            <h4 class="f-poppins" style="color: slategrey"><?= strtoupper($category) ?></h4>


            <div class="horizontal" style="justify-content: space-between; width: 100%">

                <div class="horizontal" style="align-items: center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M444-200h70v-50q50-9 86-39t36-89q0-42-24-77t-96-61q-60-20-83-35t-23-41q0-26 18.5-41t53.5-15q32 0 50 15.5t26 38.5l64-26q-11-35-40.5-61T516-710v-50h-70v50q-50 11-78 44t-28 74q0 47 27.5 76t86.5 50q63 23 87.5 41t24.5 47q0 33-23.5 48.5T486-314q-33 0-58.5-20.5T390-396l-66 26q14 48 43.5 77.5T444-252v52Zm36 120q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                    <p>LKR <?= number_format($rates) ?></p>
                </div>

                <?php $rating = 3 ?>

                <div class="horizontal stars">

                    <?php if($category != 'venue'): ?>
                        <span>★</span>
                        <p> <?= number_format($rating, 1) ?></p>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M340-720q-33 0-56.5-23.5T260-800q0-33 23.5-56.5T340-880q33 0 56.5 23.5T420-800q0 33-23.5 56.5T340-720Zm220 560H302q-33 0-60.5-23.5T207-240l-87-440h82l88 440h270v80Zm220 80L664-280H386q-29 0-50.5-17.5T308-344l-44-214q-11-48 22.5-85t81.5-37q35 0 63.5 21t36.5 57l44 202h130q21 0 39 11t29 29l140 240-70 40Z"/></svg>
                        <p><?= $seat_count ?></p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>

    <hr color="rebeccapurple" width="100%">

    <div class="bottom">
        <div class="horizontal">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>
            <p><?= $contact_email ?></p>
        </div>

        <div class="horizontal">
            <div class="horizontal">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>
                <p><?= '2023-10-15' ?></p>
            </div>

            <div class="horizontal">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg>
                <p><?= $contact_num ?></p>
            </div>
        </div>
    </div>

    <div class="horizontal">
        <?php if(Auth::logged_in() && Auth::is_client()): ?>
            <a href="<?= ROOT ?>/client/reservation_form/<?= $ad_id ?>">
                <button class="button-s2">Reserve</button>
            </a>
        <?php endif; ?>

        <?php if(Auth::logged_in()): ?>
            <button class="button-s2" data-modal-target="#<?= $ad_id ?>">More Info</button>
        <?php endif; ?>

        <?php if($pending != 1 && Auth::logged_in() && (!Auth::is_client()) && !str_contains($_SERVER['QUERY_STRING'], "home/ads") && !str_contains($_SERVER['QUERY_STRING'], "/ads/all-ads") ): ?>
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/promote-ad/<?= $ad_id ?>">
                <button class="button-s2">Promote</button>
            </a>
        <?php endif; ?>
    </div>

    <?php if(Auth::logged_in() && (!Auth::is_client()) && !str_contains($_SERVER['QUERY_STRING'], "home/ads") && !str_contains($_SERVER['QUERY_STRING'], "/ads/all-ads") ): ?>
        <div class="horizontal">
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/update-ad/<?= $ad_id ?>">
                <button class="button-s2">Update</button>
            </a>
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/delete-ad/<?= $ad_id ?>">
                <button type="submit" class="button-s2">Delete</button>
            </a>
        </div>
    <?php endif; ?>
</div>

<?php if($category == "singer"): ?>
<!-- Modal for the Popup SINGER -->
<div class="modal" id="<?= $ad_id ?>">
    <div class="modal-header">
        <div class="title"><?= $title ?></div>
        <button data-close-btn class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body">
        <div class="dis-flex-col al-it-ce ju-co-ce gap-10">

            <div class="dis-flex al-it-ce ju-co-ce gap-20">
                <svg class="feather feather-eye" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <?= ($views) ? $views : 'view count' ?>
            </div>

            <div class="">
                <img src="<?= $image ?>" alt="Ad image" style="width: 150px; height: 150px; object-fit: cover" class="bor-rad-5">
            </div>
            
            <div>
                <audio controls>
                    <source src="<?= ROOT ?>/assets/audio/sample.mp3" type="audio/mpeg">
                    No audio supported
                </audio>
            </div>

            <div class="pad-20 wid-100 dis-flex-col gap-10">
                <h4 class="f-mooli">Details</h4>
                <?= $details ?>
            </div>

            <div class="pad-20 wid-100 dis-flex gap-10 ju-co-sb">
                <p><span class="txt-w-bold f-mooli">Average rate : </span> <?= number_format($rates) ?></p>
                <p><span class="txt-w-bold f-mooli">Posted Date Time : </span> <?= $datetime ?></p>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>

<?php if($category == "venue"): ?>
<!-- Modal for the Popup VENUE -->
<div class="modal" id="<?= $ad_id ?>">
    <div class="modal-header">
        <div class="title"><?= $title ?></div>
        <button data-close-btn class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body">
        <div class="dis-flex-col al-it-ce ju-co-ce gap-10">

            <div class="dis-flex al-it-ce ju-co-ce gap-20">
                <svg class="feather feather-eye" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <?= ($views) ? $views : 'view count' ?>
            </div>

            <div class="">
                <img src="<?= $image ?>" alt="Ad image" style="width: 150px; height: 150px; object-fit: cover" class="bor-rad-5">
            </div>

            <div>
                <audio controls>
                    <source src="<?= ROOT ?>/assets/audio/sample.mp3" type="audio/mpeg">
                    No audio supported
                </audio>
            </div>

            <div class="pad-20 wid-100 dis-flex ju-co-ce gap-10">
                <h4 class="f-mooli">Seat Count - </h4><?= $seat_count ?>
            </div>

            <div class="pad-20 wid-100 dis-flex-col gap-10">
                <h4 class="f-mooli">Details</h4>
                <?= $details ?>
            </div>

            <div class="dis-flex-col gap-10 wid-100 pad-20">
                <h4 class="f-mooli">Seating Arrangements</h4>
                <div class="dis-flex gap-10 flex-wrap ju-co-ce">
                    <img src="<?= $image ?>" alt="Ad image" style="width: 100px; height: 100px; object-fit: cover" class="bor-rad-5">
                    <img src="<?= $image ?>" alt="Ad image" style="width: 100px; height: 100px; object-fit: cover" class="bor-rad-5">
                    <img src="<?= $image ?>" alt="Ad image" style="width: 100px; height: 100px; object-fit: cover" class="bor-rad-5">
                </div>
            </div>

            <div class="pad-20 wid-100 dis-flex gap-10 ju-co-sb">
                <p><span class="txt-w-bold f-mooli">Average rate : </span> <?= number_format($rates) ?></p>
                <p><span class="txt-w-bold f-mooli">Posted Date Time : </span> <?= $datetime ?></p>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>

<?php if($category == "band"): ?>
<!-- Modal for the Popup BAND -->
<div class="modal" id="<?= $ad_id ?>">
    <div class="modal-header">
        <div class="title"><?= $title ?></div>
        <button data-close-btn class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body">
        <div class="dis-flex-col al-it-ce ju-co-ce gap-10">

            <div class="dis-flex al-it-ce ju-co-ce gap-20">
                <svg class="feather feather-eye" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <?= ($views) ? $views : 'view count' ?>
            </div>

            <div class="">
                <img src="<?= $image ?>" alt="Ad image" style="width: 150px; height: 150px; object-fit: cover" class="bor-rad-5">
            </div>

            <div>
                <audio controls>
                    <source src="<?= ROOT ?>/assets/audio/sample.mp3" type="audio/mpeg">
                    No audio supported
                </audio>
            </div>

            <div class="pad-20 wid-100 dis-flex-col gap-10">
                <h4 class="f-mooli">Details</h4>
                <?= $details ?>
            </div>

            <div class="pad-20 wid-100 dis-flex-col gap-10">
                <h4 class="f-mooli">Packages Available</h4>
                <?= $packages ?>
            </div>

            <div class="pad-20 wid-100 dis-flex gap-10 ju-co-sb">
                <p><span class="txt-w-bold f-mooli">Average rate : </span> <?= number_format($rates) ?></p>
                <p><span class="txt-w-bold f-mooli">Posted Date Time : </span> <?= $datetime ?></p>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal for the Popup -->
<div class="" id="overlay"></div>