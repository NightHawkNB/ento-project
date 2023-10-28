<script>
    myStyles = `border-color: var(--indigo-2); height: 120px`
    myStyles2 = `border-color: transparent; height: 120px`

    function highlight(id = null) {
        // By the time the checking occurs, the value of "checked" is flipped.
        // So, to if the box was checked, we have to check for it being unchecked
        if(document.querySelector('#ad_'+id).checked) {
            console.log(document.querySelector('#ad_'+id).checked)
            document.querySelector('#div_'+id).style.cssText = myStyles
        } else {
            document.querySelector('#div_'+id).style.cssText = myStyles2
        }
    }
</script>
<label for="ad_<?= $ad_id ?>" class="wid-100 dis-flex pt-10 pb-10" onclick="highlight(<?= $ad_id ?>)">
    <div id="div_<?= $ad_id ?>" class="bg-white pl-10 bor-rad-5 dis-flex gap-10 al-it-ce ads sh f-poppins over-hide" style="height: 120px">

        <input class="hide" type="checkbox" name="ad_<?= $ad_id ?>" id="ad_<?= $ad_id ?>">

        <img src="<?php echo ROOT ?>/assets/images/users/<?= $image ?>" class="profile-image-2 profile" style="width: 100px; height: 100px" alt="user-01">

        <div class="dis-flex">
            <div class="dis-flex-col gap-10 mar-0-20">
                <h2 class="f-poppins"><?= $title ?></h2>
                <img src="<?= ROOT ?>/assets/images/stars.png" alt="rating in stars" style="width: 100px; height: auto; margin: 0">
            </div>
        </div>

        <div class="dis-flex-col gap-10">
            <div>
                <p class="txt-w-bold">Rates</p>
                <p>LKR <?= $rates ?></p>
            </div>
            <div>
                <p class="txt-w-bold">Posted On</p>
                <p><?= $datetime ?></p>
            </div>
        </div>

        <div class="dis-flex ju-co-ce al-it-ce promotion-parent">
            <div class="promotions txt-ali-rig dis-flex ju-co-ce al-it-ce">
                <p class="hide"> 30% OFF </p>
            </div>
        </div>
    </div>

</label>