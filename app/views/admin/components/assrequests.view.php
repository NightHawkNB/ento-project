<a href="<?=ROOT?>/<?=strtolower($_SESSION['USER_DATA']->user_type)?>/ccareq/<?=$comp_id?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh
         f-poppins mar-5" style="gap: 10px;margin: 5px;">
            <div class="txt-c-black dis-flex-col gap-10" style="width: 150px;">
                <p class="txt-w-bold txt-c-dark-purple">User</p>
                <p><?= $username ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10" style="width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                <p class="txt-w-bold txt-c-dark-purple">Details</p>
                <p><?= $details ?></p>
            </div>


            <div class="dis-flex-col txt-c-black gap-10" style="width: 150px;">
                <p class="txt-w-bold txt-c-dark-purple" style="">Comment</p>
                <p><?= $comment ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10" style="width: 150px;">
                <p class="txt-w-bold txt-c-dark-purple">Date and Time</p>
                <p><?= $created_at ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10" style="width: 60px;">
                <p class="txt-w-bold txt-c-dark-purple">Status</p>
                <?php
                $statusColor = '';
                switch ($status) {
                    case 'Idle':
                        $statusColor = 'txt-c-red';
                        break;
                    case 'Todo':
                        $statusColor = 'txt-c-green';
                        break;
                    case 'Handled':
                        $statusColor = 'txt-c-indigo-2';
                        break;
                }
                ?>
                <p class="<?= $statusColor ?> txt-w-bold"><?= strtoupper($status) ?></p>

            </div>

            <?php if ($status === 'Handled'): ?>
                <div class="dis-flex-col txt-c-black gap-10" style="width: 50px;">
                    <p class="txt-w-bold txt-c-dark-purple">Admin</p>
                    <p><?= $admin_user_id ?></p>
                </div>
            <?php endif; ?>


            <div class="dis-flex-col txt-c-black gap-10" style="width: 50px;">
                <p class="txt-w-bold txt-c-dark-purple ">CCA</p>
                <p><?= $cca_user_id ?></p>
            </div>
        </div>
    </div>
</a>
