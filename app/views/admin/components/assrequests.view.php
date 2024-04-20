<a href="<?=ROOT?>/<?=strtolower($_SESSION['USER_DATA']->user_type)?>/ccareq/<?=$comp_id?>">
    <div class="dis-flex wid-100">
        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex al-it-ce ju-co-sb ads sh f-poppins mar-5" style="gap: 100px;margin: 5px;">
            <div class="txt-c-black dis-flex-col gap-10" style="width: 150px;">
                <h4>User </h4>
                <p><?= $username ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10" style="width: 350px;">
                <p class="txt-w-bold">Details</p>
                <p><?= $details ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10" style="width: 150px;">
                <p class="txt-w-bold" style="">Comment</p>
                <p><?= $comment ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-" style="width: 150px;">
                <p class="txt-w-bold">Date and Time</p>
                <p><?= $created_at ?></p>
            </div>

            <div class="dis-flex-col txt-c-black gap-10" style="width: 60px;">
                <p class="txt-w-bold">Status</p>
                <?php
                $statusColor = '';
                switch ($status) {
                    case 'Idle':
                        $statusColor = 'txt-c-red'; // Red color for Idle
                        break;
                    case 'Todo':
                        $statusColor = 'txt-c-green'; // Purple color for Todo
                        break;
                    case 'Handled':
                        $statusColor = 'txt-c-indigo-2'; // Blue color for Handled
                        break;
                }
                ?>
                <p class="<?= $statusColor ?> txt-w-bold"><?= $status ?></p>

            </div>

            <?php if ($status === 'Handled'): ?>
                <div class="dis-flex-col txt-c-black gap-10" style="width: 50px;">
                    <p class="txt-w-bold">Admin ID</p>
                    <p><?= $admin_user_id ?></p>
                </div>
            <?php endif; ?>


            <div class="dis-flex-col txt-c-black gap-10" style="width: 50px;">
                <p class="txt-w-bold">CCA</p>
                <p><?= $cca_user_id ?></p>
            </div>
        </div>
    </div>
</a>
