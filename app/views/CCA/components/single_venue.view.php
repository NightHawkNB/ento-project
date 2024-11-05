<!--single verify div view-->
<style>
    .cc{
        border-left: 5px solid #7d38ff;
        border: 0.5px solid black;
    }
</style>
<a href="<?= ROOT ?>/cca/venue/<?= $venuevreq_id ?>">
    <div class="dis-flex wid-100 ">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins cc">
            <div class="txt-c-black dis-flex gap-20 ju-co-sb wid-100" style="gap: 100px">
                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Venue Request ID</h4>
                    <p><?= $venuevreq_id ?></p>
                </div>

<!--                <div class="dis-flex-col txt-c-black gap-10 flex-1">-->
<!--                    <h4>Venue Id</h4>-->
<!--                    <p>--><?php //= $venue_id ?><!--</p>-->
<!--                </div>-->


                <div class="dis-flex-col txt-c-black gap-10 flex-1">
                    <h4>Name</h4>
                    <p><?= $name ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Timestamp</h4>
                    <p><?=$created_at?></p>
                </div>
            </div>
            <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-10 bor-rad-5 txt-c-black">
                <a href="<?= ROOT ?>/cca/venue/<?= $venuevreq_id ?>">
                    <button class="button-s2">View</button>
                </a>
            </div>
        </div>
    </div>
</a>
