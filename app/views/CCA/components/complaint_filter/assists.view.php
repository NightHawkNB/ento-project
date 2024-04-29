<a href="<?= ROOT ?>/cca/complaints/complaintdetails/<?= $comp_id ?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins">
            <div class="txt-c-black dis-flex gap-20 ju-co-sb wid-100" style="gap: 100px">
                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Complaint ID</h4>
                    <p><?= $comp_id ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10 flex-1">
                    <h4>Comment</h4>
                    <p><?= ($comment) ? $comment : "No comments yet" ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10 flex-1">
                    <h4>details</h4>
                    <p><?= ($details) ? $details : "No details" ?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10">
                    <h4>Timestamp</h4>
                    <p><?=$date_time?></p>
                </div>

                <div class="dis-flex-col txt-c-black gap-10">
                    <p class="txt-w-bold">Status</p>
                    <p><?= $status ?></p>
                </div>
            </div>
            
            <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                <a href="<?= ROOT ?>/cca/complaints/assists/update/<?= $comp_id ?>">
                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button>
                </a>
                <a href="<?= ROOT ?>/cca/complaints/assists/handle/<?= $comp_id ?>">
                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Handle</button>
                </a>
            </div>
        </div>
    </div>
</a>