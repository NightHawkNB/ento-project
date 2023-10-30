<div class="dis-flex wid-100">
        <div class="bg-white bor-rad-5 pad-10-20 wid-100 dis-flex gap-20 al-it-ce ads sh f-poppins">
            <img src="<?= ROOT ?>/assets/images/users/<?= $image ?>" class="profile-image-2 profile" alt="user-01">

            <div class="dis-grid-c4 flex-1">
                <div class="dis-flex-col gap-10 mar-0-20">
                    <h2 class="f-poppins"><?= $title ?></h2>
                    <img src="<?= ROOT ?>/assets/images/stars.png" alt="rating in stars" style="width: 100px; height: auto; margin: 0">
                </div>
                <div class="flex-1 cols-3 dis-flex-col gap-10">
                    <h4>Details</h4>
                    <p class="flex-1"><?= $details ?></p>
                </div>
            </div>

            <div class="dis-flex-col gap-10 flex-1">
                <div>
                    <p class="txt-w-bold">Rates</p>
                    <p>LKR <?= $rates ?></p>
                </div>
                <div>
                    <p class="txt-w-bold">Posted On</p>
                    <p><?= $datetime ?></p>
                </div>
            </div>

            <div class="dis-flex ju-co-ce al-it-ce">
                <div class="txt-ali-rig dis-flex ju-co-ce al-it-ce">
                    <p class=""> 30% OFF </p>
                </div>
            </div>

            <?php if(Auth::logged_in() && Auth::is_client()): ?>
                <a href="#">
                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Reserve</button>
                </a>
            <?php endif; ?>

            <?php if(Auth::logged_in() && (Auth::is_singer() || Auth::is_admin() || Auth::is_cca()) && !str_contains($_SERVER['QUERY_STRING'], "home/ads") && !str_contains($_SERVER['QUERY_STRING'], "/ads/all-ads") ): ?>
                <?php if($pending != 1): ?>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/promote-ad/<?= $ad_id ?>">
                        <button class="btn-lay-2 hover-pointer btn-anima-hover">Promote</button>
                    </a>
                <?php endif; ?>
                <div class="dis-flex-col gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/update-ad/<?= $ad_id ?>">
                        <button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button>
                    </a>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/delete-ad/<?= $ad_id ?>">
                        <button type="submit" class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button>
                    </a>
                </div>
            <?php endif; ?>
        </div>
</div>