<label for="VEN_<?= $venue_id ?>" class="venue_label" onclick="radio_check(this)">
    <div class="venue-item" data-location="<?= $location ?>">
        <img src="<?= ROOT.$image ?>" alt="venue-image" style="width: 50px; aspect-ratio: 1/1; border-radius: 50%">
        <p><?= $title ?></p>
        <p><?= $seat_count ?></p>
        <p><?= $details ?></p>
        <p><?= $location ?></p>
    </div>
    <input type="radio" name="venue_id" id="VEN_<?= $venue_id ?>" value="<?= $venue_id ?>" style="display: none">
</label>