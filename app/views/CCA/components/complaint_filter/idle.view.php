<style>
    .cc{
        border-left: 5px solid #7d38ff;
        border: 0.5px solid black;
    }
    .cc:hover{
        /*background-image: linear-gradient(to right, #7d38ff, #be9bf8);*/
        background-color: #e6dff1;
        border-left: 5px solid #ffffff;
        box-shadow: 1px 2px 3px #110f29;
    }
</style>
<a href="<?= ROOT ?>/cca/complaints/complaintdetails/<?= $comp_id ?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins cc">
            <div class="txt-c-black dis-flex gap-20 ju-co-sb wid-100" style="gap: 100px">
<!--                <div class="dis-flex-col txt-c-black gap-10">-->
<!--                    <h4>Complaint ID</h4>-->
<!--                    <p>--><?php //= $comp_id ?><!--</p>-->
<!--                </div>-->

<!--                <div class="dis-flex-col txt-c-black gap-10 flex-1">-->
<!--                    <h4>Comment</h4>-->
<!--                    <p>--><?php //= ($comment) ? $comment : "No comments yet" ?><!--</p>-->
<!--                </div>-->
                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>User Type</h4>
                    <p><?= $user_type ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10 flex-1">
                    <h4>Details</h4>
                    <?php
                    if (strlen($details) > 10) {
                        $shortDetails = substr($details, 0, 10) . '...';
                    } else {
                        $shortDetails = $details;
                    }
                    ?>
                    <p><?= ($details) ? $shortDetails : "No details" ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Timestamp</h4>
                    <p><?=$date_time?></p>
                </div>

<!--                <div class="dis-flex-col txt-c-black gap-10">-->
<!--                    <p class="txt-w-bold">Status</p>-->
<!--                    <p>--><?php //= $status ?><!--</p>-->
<!--                </div>-->
            </div>
            <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-10 bor-rad-5 txt-c-black">
                <a href="<?= ROOT ?>/cca/complaints/complaintdetails/<?= $comp_id ?>">
                    <button class="btn-lay-2 hover-pointer btn-anima-hover">View</button>
                </a>
            </div>
<!--            <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">-->
<!--                <a href="--><?php //= ROOT ?><!--/cca/complaints/idle/accept/--><?php //= $comp_id ?><!--">-->
<!--                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Accept</button>-->
<!--                </a>-->
<!--                <a href="--><?php //= ROOT ?><!--/cca/complaints/idle/handle/--><?php //= $comp_id ?><!--">-->
<!--                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Handle</button>-->
<!--                </a>-->
<!--            </div>-->
        </div>
    </div>
</a>