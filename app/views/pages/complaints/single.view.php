<a href="#">
    <div class="dis-flex wid-100 bg-white">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
            <div class="txt-c-black">
                <h4>Details:</h4>
                <p><?= $details ?></p>
                <h4>Files:</h4>
                <p><?=$files?></p>
            </div>

            <div class="dis-flex-col ju-co-sa txt-c-black">
                <p class="txt-w-bold">Complaint ID</p>
                <p><?= $comp_id ?></p>
                <p class="txt-w-bold">Date and Time</p>
                <p><?= $date_time ?></p>
            </div>

            <div class="dis-flex-col gap-10 ju-co-ce al-it-ce pad-20 sh bor-rad-5 bg-lightgray txt-c-black">
                <a href="<?= ROOT ?>/home/complaint/update_complaint/<?= $comp_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button></a>
                <a href="<?= ROOT ?>/home/complaint/delete_complaint/<?= $comp_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button></a>
            </div>
        </div>
    </div>
</a>