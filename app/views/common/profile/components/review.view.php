<div class="pes-item" style="align-items: center; gap:20px;">
    <img class="pes-image" src="<?= ROOT ?>/<?= $image ?>" alt="Event Cover Image">

    <div class="pes-details" style="height: 100%; justify-content: center;">
        <span style="font-weight: bold">
            <?= ucfirst($fname). " " . ucfirst($lname) ?>
        </span>

        <div class="rating">
            <?php for($i = 1; $i <= 5; $i++): ?>
                <?php if($i <= $rating): ?>
                    <span class="star gold">★</span>
                <?php else: ?>
                    <span class="star silver">★</span>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>



    <div class="pes-details" style="height: 100%; justify-content: center">
        <span style="font-size: 0.8rem">
            <?= $content ?>
        </span>
    </div>

    <div class="pes-details" style="height: 100%; justify-content: center;">
        <span style="font-size: 0.8rem">
            <?= $created_at ?>
        </span>
    </div>
</div>