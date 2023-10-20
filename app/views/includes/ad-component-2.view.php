<script>
    myStyles = `border-color: var(--indigo-2)`
    myStyles2 = `border-color: transparent`

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
<label for="ad_<?= $ad_id ?>" class="wid-100" onclick="highlight(<?= $ad_id ?>)">
    <div id="div_<?= $ad_id ?>" class="bg-white pad-10-20 bor-rad-5 wid-100 flex-grow dis-flex gap-10 al-it-ce ads sh f-poppins" style="height: 120px">

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
                <p><?= $rates ?></p>
            </div>
            <div>
                <p class="txt-w-bold">Posted On</p>
                <p><?= $datetime ?></p>
            </div>
        </div>
    </div>
</label>