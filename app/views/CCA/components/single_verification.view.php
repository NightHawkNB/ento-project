<a href="<?= ROOT ?>/cca/verify/<?= $userVreq_id ?>">
<div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins">
            <div class="txt-c-black dis-flex gap-20 ju-co-sb wid-100" style="gap: 100px">
                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Verify ID</h4>
                    <p><?= $userVreq_id ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10 flex-1">
                    <h4>User Id</h4>
                    <p><?= $user_id ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Timestamp</h4>
                    <p><?=$timestamps?></p>
                </div>
            </div>
        
        </div>
    </div>
</a>