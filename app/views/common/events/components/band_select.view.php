<label
        for="BAND_<?= $ad_id ?>"
        class="venue_label"
        data-spid="<?= $sp_id ?>"
        data-adid="<?= $ad_id ?>"
        onclick="select_band(this)"
>

    <div class="band-item">
        <img src="<?= ROOT.$image ?>" alt="venue-image" style="min-width: 50px; width: 50px; aspect-ratio: 1/1; border-radius: 50%">
        <p class="item-title"><?= $title ?></p>
        <p style="max-height: 50px; max-width: 350px; overflow: hidden; text-overflow: ellipsis"><?= $details ?></p>
    </div>
</label>