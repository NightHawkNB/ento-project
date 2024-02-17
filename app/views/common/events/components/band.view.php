<label for="BAND_<?= $ad_id ?>" class="venue_label" onclick="radio_check(this, 3)">
    <div class="venue-item">
        <img src="<?= ROOT.$image ?>" alt="band-image" style="width: 50px; aspect-ratio: 1/1; border-radius: 50%">
        <p><?= $title ?></p>
        <p><?= $details ?></p>
    </div>
    <input type="radio" name="venue_id" id="BAND_<?= $ad_id ?>" value="<?= $venue_id ?>" style="display: none">
</label>