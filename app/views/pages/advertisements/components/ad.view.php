<div class="ad sh" data-category="<?= $category ?>" data-title="<?= $title ?>">

    <?php $preg_match_string = '/'.$category.'\/ads$/' ?>

    <?php if(preg_match($preg_match_string, $_SERVER['REQUEST_URI']) AND $user_id == Auth::getUser_id()): ?>
        <div class="toggle-button-cover">
            <div class="button-cover">
                <p class="js-left-text">VISIBLE</p>
                <div class="button r" id="button-3">
                    <input type="checkbox" class="checkbox" onclick="toggle_visibility(this)"    <?= ($visible == 0) ? 'checked' : '' ?> />
                    <div class="knobs"></div>
                    <div class="layer"></div>
                </div>
                <p class="js-right-text">HIDDEN</p>
            </div>
        </div>
    <?php endif; ?>


    <script>
        function toggle_visibility(element) {

            // console.log(element)

            const checkbox = element
            const visible_text = element.parentElement.parentElement.querySelector('.js-left-text')
            const hidden_text = element.parentElement.parentElement.querySelector('.js-right-text')

            if (!checkbox.checked) {
                visible_text.style.color = 'mediumpurple'
                hidden_text.style.color = 'grey'
            } else {
                visible_text.style.color = 'grey'
                hidden_text.style.color = '#f44336'
            }

            let visibility = checkbox.checked ? 0 : 1
            update_visibility(visibility)

        }

        function update_visibility(visibility) {
            let data = {visibility}
            console.log("RAN")
            fetch(`/ento-project/public/<?= $_SESSION['USER_DATA']->user_type ?>/ads/update-visibility/<?= $ad_id ?>`, {
                method: "PATCH",
                headers: {
                    "Content-Type": "application/json; charset=utf-8"
                },
                body: JSON.stringify(data)
            }).then(res => {
                // console.log(res)
                return res.text()
            }).then(data => {

                if(data !== "success") {
                    alert("Visibility Update Failed");
                    console.log("Visibility Update Failed")
                } else {
                    alert("Visibility Update Successful")
                    console.log("Visibility Update Successful")
                }

                // console.log(data)
            })
        }
    </script>

    <div class="top">
        <div class="vertical">
            <img src="<?= ROOT.$image ?>" style="object-fit: cover" alt="user-01">

            <h2 class="f-poppins"><?= $title ?></h2>
            <h4 class="f-poppins" style="color: slategrey"><?= strtoupper($category) ?></h4>


            <div class="horizontal" style="justify-content: space-between; width: 100%">

                <div class="horizontal stars">

                    <?php if($category != 'venue'): ?>
                        <span>★</span>
                        <p style="font-size: 0.8rem"> <?= ($rating != 0) ? number_format($rating, 1) : 'No Reviews' ?></p>
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
        <!--        <div class="horizontal">-->
        <!--            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>-->
        <!--            <p>--><?php //= $contact_email ?><!--</p>-->
        <!--        </div>-->

        <div class="horizontal" style="height: 60px;">
            <svg style="stroke: var(--purple-primary); fill: none;" class="feather feather-info" fill="none" height="24" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" x2="12" y1="16" y2="12"/>
                <line x1="12" x2="12.01" y1="8" y2="8"/>
            </svg>

            <p style="overflow: hidden; text-overflow: ellipsis; max-height: 80%"><?= $details ?></p>
        </div>

        <div class="horizontal">
            <?php if(Auth::is_eventm()): ?>
                <div class="horizontal">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>
                    <p><?= '2023-10-15' ?></p>
                </div>
            <?php endif; ?>

            <!--            <div class="horizontal">-->
            <!--                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg>-->
            <!--                <p>--><?php //= $contact_num ?><!--</p>-->
            <!--            </div>-->
        </div>
    </div>

    <div class="horizontal">
        <?php if(Auth::logged_in() && Auth::is_client()): ?>
            <a href="<?= ROOT ?>/client/reservation_form/<?= $ad_id ?>">
                <button class="button-s2">Reserve</button>
            </a>
        <?php endif; ?>

        <button class="button-s2" data-modal-target="#<?= $ad_id ?>" onclick="update_viewCount('<?= $ad_id ?>')">More Info</button>

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

                <div class="" style="position: relative">
                    <img src="<?= ROOT.$image ?>" alt="Ad image" style="width: 150px; height: 150px; object-fit: cover" class="bor-rad-5">

                    <?php if($profile_visible == 1 && Auth::logged_in()): ?>
                        <a href="<?= ROOT ?>/<?= Auth::logged_in() ? $_SESSION['USER_DATA']->user_type : 'client' ?>/user_profile/<?= $user_id ?>">
                            <div class="profile-icon">
                                <svg class="feather feather-user" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/></svg>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="pad-20 wid-100 dis-flex-col gap-10">
                    <h4>Details</h4>
                    <?= $details ?>
                </div>

                <div class="pad-20 wid-100 dis-flex gap-10 ju-co-sb">
                    <p><h4>Average rate : </h4> <?= empty($rates) ? 'Not Set' : number_format($rates) ?></p>
                    <p><h4>Posted Date Time : </h4> <?= $datetime ?></p>
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
                    <img src="<?= ROOT.$image ?>" alt="Ad image" style="width: 150px; height: 150px; object-fit: cover" class="bor-rad-5">
                </div>

                <div class="pad-20 wid-100 dis-flex ju-co-ce gap-10">
                    <h4>Seat Count - </h4><?= $seat_count ?>
                </div>

                <div class="pad-20 wid-100 dis-flex-col gap-10">
                    <h4>Details</h4>
                    <?= $details ?>
                </div>

                <div class="pad-20 wid-100 dis-flex gap-10 ju-co-sb">
                    <p><h4>Average rate : </h4> <?= empty($rates) ? 'Not Set' : number_format($rates) ?></p>
                    <p><h4>Posted Date Time : </h4> <?= $datetime ?></p>
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


                <div class="" style="position: relative">
                    <img src="<?= ROOT.$image ?>" alt="Ad image" style="width: 150px; height: 150px; object-fit: cover" class="bor-rad-5">

                    <?php if($profile_visible == 1): ?>
                        <a href="<?= ROOT ?>/<?= Auth::logged_in() ? $_SESSION['USER_DATA']->user_type : 'client' ?>/user_profile/<?= $user_id ?>">
                            <div class="profile-icon">
                                <svg class="feather feather-user" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                    <circle cx="12" cy="7" r="4"/></svg>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="pad-20 wid-100 dis-flex-col gap-10">
                    <h4>Details</h4>
                    <?= $details ?>
                </div>

                <div class="pad-20 wid-100 dis-flex-col gap-10">
                    <h4>Packages Available</h4>
                    <?= $packages ?>
                </div>

                <div class="pad-20 wid-100 dis-flex gap-10 ju-co-sb">
                    <p><h4>Average rate : </h4> <?= empty($rates) ? 'Not Set' : number_format($rates) ?></p>
                    <p><h4>Posted Date Time : </h4> <?= $datetime ?></p>
                </div>

            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Modal for the Popup -->
<div class="" id="overlay"></div>