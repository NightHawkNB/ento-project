<label for="SING_<?= $ad_id ?>" class="venue_label" onclick="checkbox_select()">
    <div class="venue-item">
        <img src="<?= ROOT.$image ?>" alt="singer-image" style="width: 50px; aspect-ratio: 1/1; border-radius: 50%">

        <div>
            <span class="headings">Name</span>
            <span><?= $title ?></span>
        </div>

        <div>
            <span class="headings">Details</span>
            <span class="sp-details"><?= $details ?></span>
        </div>

    </div>
    <input type="checkbox" name="SING_<?= $ad_id ?>" id="SING_<?= $ad_id ?>" value="<?= $ad_id ?>" style="display: none">
</label>