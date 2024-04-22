<a href="<?=ROOT?>/<?=strtolower($_SESSION['USER_DATA']->user_type)?>/adverify/<?=$ad_id?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins" style="gap: 100px">

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p class="txt-w-bold">Title</p>
                <p><?= $title ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p class="txt-w-bold">Date</p>
                <p><?= $datetime ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p class="txt-w-bold">User Name</p>
                <p><?= $username ?></p>
            </div>

            <?php if ($category === 'band'): ?>
                <div class="dis-flex-col txt-c-black gap-10 flex-1">
                    <p class="txt-w-bold">Package</p>
                    <p><?= $packages ?></p>
                </div>
            <?php endif; ?>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p class="txt-w-bold">Category</p>
                <p class="txt-w-bold" style="color: brown"><?= $category ?></p>
            </div>


        </div>
    </div>
</a>

