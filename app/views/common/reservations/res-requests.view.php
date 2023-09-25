<div class="list-comp dis-flex bg-lightgray txt-c-black pad-10 bor-rad-5 gap-20">
    <div>
        <p>Req ID : </p>
        <span>
            <?= $req_id ?>
        </span>
    </div>

    <div>
        <p>VUSER_ID : </p>
        <span>
            <?= $vuser_id ?>
        </span>
    </div>

    <div>
        <p>Created Date : </p>
        <span>
            <?= $createdDate ?>
        </span>
    </div>

    <div id="req-details">
        <p>Details : </p>
        <span>
            <?= $details ?>
        </span>
    </div>
    <div class="push-right">
        <a href="reservation-requests/1" class="btn-lay-2 bg-grey txt-c-white txt-d-none">Details</a>
    </div>
</div>
