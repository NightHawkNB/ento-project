<a href="<?=ROOT?>/<?=strtolower($_SESSION['USER_DATA']->user_type)?>/adverify/<?=$ad_id?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins" style="gap: 100px">

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <img style="width: 50px; height: 50px; border-radius: 50%" src="<?=ROOT.$image?>" alt="image">
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p><?= $title ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p><?= $datetime ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p><?= $username ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10 flex-1">
                <p class="txt-w-bold" style="color: brown"><?= $category ?></p>
            </div>

        </div>
    </div>
</a>

