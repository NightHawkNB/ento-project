
<div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
            <div class="txt-c-black">
                <h4>Complaint ID</h4>
                <p><?= $comp_Id ?></p>
                <h4>Timestamp</h4>
                <p><?=$date_time?></p>
            </div>

            <div class="dis-flex-col ju-co-sa txt-c-black">
                <p class="txt-w-bold">handled Status</p>
                <p><?= ($handled) ?"handled":"pending" ?></p>
               
            </div>
            
            <div class="dis-flex-col gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
           
                <?php if (!Auth::is_cca()): ?>
                <a href="<?= ROOT ?>/home/complaint/update_complaint/<?= $comp_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button></a>
                <?php endif; ?>
                <a href="<?= ROOT ?>/home/complaint/delete_complaint/<?= $comp_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button></a>
            </div>
        </div>
    </div>