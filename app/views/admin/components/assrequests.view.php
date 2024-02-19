<a href="<?=ROOT?>/<?=strtolower($_SESSION['USER_DATA']->user_type)?>/ccareq/<?=$comp_id?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins mar-5" style="gap: 100px">
            <div class="txt-c-black dis-flex-col gap-10 flex-1">
                <h4>ID:</h4>
                <p><?= $comp_id ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <p class="txt-w-bold">Date and Time</p>
                <p><?= $date_time ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <p class="txt-w-bold">Status</p>
                <p><?= $status ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <p class="txt-w-bold">Comment</p>
                <p><?= $comment ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <p class="txt-w-bold">CCA</p>
                <p><?= $cca_user_id ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10">
                <p class="txt-w-bold">User ID</p>
                <p><?= $user_id ?></p>
            </div>

        </div>
    </div>
</a>
