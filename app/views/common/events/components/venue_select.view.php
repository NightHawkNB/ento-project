<label
        for="VEN_<?= $venue_id ?>"
        class="venue_label"
        data-venueid="<?= $venue_id ?>"
        data-spid="<?= $sp_id ?>"
        data-adid="<?= $ad_id ?>"
        onclick="select_venue(this)"
>

    <div class="venue-item" data-location="<?= $location ?>">
        <img src="<?= ROOT.$image ?>" alt="venue-image" style="min-width: 50px; width: 50px; aspect-ratio: 1/1; border-radius: 50%">
        <p class="item-title"><?= $title ?></p>
        <p><?= $seat_count ?></p>
        <p><?= $details ?></p>
        <p><?= $location ?></p>
    </div>
</label>