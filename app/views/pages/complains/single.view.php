<!--comp_id] => 0-->
<!--[details] => kjhkj-->
<!--[files] => ool-->
<!--[date_time] => 2023-10-02 12:00:53-->
<!--[user_id] => 37-->
<!--[cust_id] =>-->
<div class="dis-flex wid-100 bg-white">
        <div class="bg-white pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 flex-wrap al-it-ce ads sh f-poppins">

            <div class="dis-grid-c3 flex-1">

                <div class="flex-1 cols-2">
                    <h4>Details:</h4>
                    <p><?= $details ?></p>
                    <h4>Files:</h4>
                    <?=$files?>
                </div>
            </div>

            <div class="dis-flex-col ju-co-sa">
                <p class="txt-w-bold">Complain ID</p>
                <p><?= $comp_id ?></p>
                <p class="txt-w-bold">Date and Time</p>
                <p><?= $date_time ?></p>
            </div>
            <div class="dis-flex-col gap-10 ju-co-ce al-it-ce pad-20 sh bor-rad-5 bg-lightgray">
                <a href="<?= ROOT ?>/home/complain/update_complain/<?= $comp_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button></a>
                <a href="<?= ROOT ?>/home/complain/delete_complain/<?= $comp_id ?>"><button class="btn-lay-2 hover-pointer btn-anima-hover">Delete</button></a>
            </div>
        </div>
</div>
