<div class="dis-flex wid-100">
    <a href="#ad-01" class="wid-100">
        <div class="bg-white pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 flex-wrap al-it-ce ads sh f-poppins">
            <img src="<?= ROOT ?>/assets/images/users/<?= $image ?>" class="profile-image-2 profile" alt="user-01">

            <div class="dis-grid-c3 flex-1">
                <div class="dis-flex-col gap-10 mar-0-20">
                    <h2><?= $title ?></h2>
                    <h3><?= $views ?></h3>
                </div>
                <div class="flex-1 cols-2">
                    <h4>Details</h4>
                    <p><?= $details ?></p>
                </div>
            </div>

            <div class="dis-flex-col ju-co-sa">
                <p class="txt-w-bold">Rates</p>
                <p><?= $rates ?></p>
                <p class="txt-w-bold">Posted On</p>
                <p><?= $datetime ?></p>
            </div>
        </div>
    </a>
    <?php if(Auth::logged_in()): ?>
        <div class="dis-flex-col gap-10 ju-co-ce al-it-ce pad-20 sh bor-rad-5">
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/update-ad/<?= $ad_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button></a>
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/delete-ad/<?= $ad_id ?>"><button type="submit" class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button></a>
        </div>
    <?php endif; ?>
</div>