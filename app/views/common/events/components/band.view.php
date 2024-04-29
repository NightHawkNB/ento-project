<label for="BAND_<?= $ad_id ?>" class="venue_label" onclick="radio_check(this, 3)">
    <div class="venue-item">
        <img src="<?= ROOT.$image ?>" alt="band-image" style="width: 50px; aspect-ratio: 1/1; border-radius: 50%">

        <div>
            <span class="headings">Name</span>
            <p><?= $title ?></p>
        </div>

        <div>
            <span class="headings">Details</span>
            <p class="sp-details"><?= $details ?></p>
        </div>

    </div>
    <input type="radio" name="band_data" id="BAND_<?= $ad_id ?>" value="<?= $ad_id ?>" style="display: none">
</label>