<div class="dis-flex wid-100" id="main-container">

    <div id="sub-container" class="bg-white bor-rad-5 pad-10-20 wid-100 gap-20 al-it-ce ads sh f-poppins">
        <div class="dis-flex ju-co-ce al-it-ce">
            <img src="<?= $image ?>" class="profile-image-2 profile" alt="user-01">
        </div>

        <div class="dis-flex-col gap-10 mar-0-20 wid-200px">
            <h2 class="f-poppins"><?= $title ?></h2>
            <img src="<?= ROOT ?>/assets/images/stars.png" alt="rating in stars" style="width: 100px; height: auto; margin: 0">
        </div>

        <div class="dis-flex-col gap-10 flex-1 wid-200px">
            <div>
                <p class="txt-w-bold">Rates</p>
                <p>LKR <?= number_format($rates) ?></p>
            </div>
            <div>
                <p class="txt-w-bold">Posted On</p>
                <p><?= $datetime ?></p>
            </div>
        </div>

        <div class="dis-flex-col gap-10 flex-1 wid-200px">
            <div>
                <p class="txt-w-bold">Email</p>
                <p><?= $contact_email ?></p>
            </div>
            <div>
                <p class="txt-w-bold">Phone</p>
                <p><?= $contact_num ?></p>
            </div>
        </div>

        <div class="dis-flex-col gap-10 flex-1 wid-200px">
            <p class="txt-w-bold">Sample Audio</p>
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

        <?php if(Auth::logged_in()): ?>
            <button class="btn-lay-2 btn-anima-hover hover-pointer" data-modal-target="#modal">More Info</button>
        <?php endif; ?>

        <?php if(Auth::logged_in() && (!Auth::is_client()) && !str_contains($_SERVER['QUERY_STRING'], "home/ads") && !str_contains($_SERVER['QUERY_STRING'], "/ads/all-ads") ): ?>
            <div>
                <?php if($pending != 1): ?>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/promote-ad/<?= $ad_id ?>">
                        <button class="btn-lay-2 hover-pointer btn-anima-hover">Promote</button>
                    </a>
                <?php endif; ?>
            </div>
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

<div class="modal" id="modal">
    <div class="modal-header">
        <div class="title"><?= $title ?></div>
        <button data-close-btn class="modal-close-btn">&times;</button>
    </div>
    <div class="modal-body">
        <div class="dis-flex-col al-it-ce ju-co-ce gap-10">

            <div class="">
                <img src="<?= $image ?>" alt="Ad image" style="width: 150px; height: 150px" class="bor-rad-5">
            </div>
            
            <div>
                <audio controls>
                    <source src="<?= ROOT ?>/assets/audio/sample.mp3" type="audio/mpeg">
                    No audio tag supported
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

<div class="" id="overlay"></div>