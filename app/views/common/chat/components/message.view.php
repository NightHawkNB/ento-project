<?php

    if(Auth::is_client()) {
        if($user == "receiver") $user = "sender";
        else if($user == "sender") $user = "receiver";
    }

?>

<div class="message <?= $user ?>">
    <div class="m-content">
        <?= $content ?>
    </div>

    <div class="m-meta">
<!--        <div class="m-date">-->
<!--            --><?php //= $date ?>
<!--        </div>-->

        <div class="m-time">
            <?= $time ?>
        </div>
    </div>
</div>