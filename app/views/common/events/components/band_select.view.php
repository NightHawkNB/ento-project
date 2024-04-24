<label for="BAND_<?= $ad_id ?>" class="venue_label" data-spid="<?= $sp_id ?>" data-adid="<?= $ad_id ?>" onclick="select_band(this)">
    <div class="venue-item" >
        <img src="<?= ROOT.$image ?>" alt="venue-image" style="width: 50px; aspect-ratio: 1/1; border-radius: 50%">
        <p><?= $title ?></p>
        <p><?= $details ?></p>
    </div>
</label>