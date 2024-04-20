<div class="txt-c-black bg-white bor-rad-5 dis-flex gap-10 pad-10 mar-bot-10" >

    <?php
    $now = new DateTime();
    $future_date = new DateTime($createdAt);

    $interval = $future_date->diff($now);
    ?>
<!--            --><?php //= show($data);?>

    <div >
        <img src="<?= ROOT.$image ?>" alt="name png" class="icon" style="border-radius: 50%" >
    </div>

    <div class="dis-flex-col">
        <p class="txt-w-bold"><?= $title ?></p>
        <div class="bg-lightgray bor-rad-5  " style="width: fit-content; height: fit-content">
            <p><?= $interval->format('%H:%Im ago.'); ?></p>
        </div>

    </div>

    <div class="bg-lightblue bor-rad-5" style="width: 350px; height: 20px">
        <div style="position: relative; top: 0; left: 0">Details:</div>
        <div><?= $message ?></div>
    </div>

    <?php if ($type === "Res_Accepted"): ?>
        <a href="<?=ROOT?>/client/reservations/accepted"><button class="btn-lay-s" style="width: fit-content; height: fit-content; background-color: #c1abec ">Reservations >></button></a>
    <?php elseif ($type === "Res_Denied"): ?>
        <a href="<?=ROOT?>/client/reservations/denied"><button class="btn-lay-s" style="width: fit-content; height: fit-content; background-color: #c1abec ">Reservations >></button></a>
    <?php endif; ?>

</div>
