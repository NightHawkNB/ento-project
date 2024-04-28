<?php show($data); ?>

<?php foreach ($singers as $singer) : ?>
    <div class="participants singer">
        <div>
            <img class="es-image"
                 src="<?= (ROOT.$singer->singer_image) ?: ROOT . '/assets/images/singer/general.png' ?>"
                 alt="singer-image">
            <?php
                switch ($singer->status) {
                    case 'Pending':
                        $venue_color = 'var(--status-pending-bg)';
                        break;

                    case 'Accepted':
                        $venue_color = 'var(--status-approve-bg)';
                        break;

                    case 'Denied':
                        $venue_color = 'var(--status-error-bg)';
                        break;

                    default:
                        $venue_color = 'var(--status-unknown-bg)';
                        break;
                }
            ?>
            <div class="es-content">
                <div class="es-status">
                    <p> Request Status : </p>
                    <span style="background-color: <?= $venue_color ?>"><?= ($singer->status) ? ucfirst($singer->status) : 'Unknown' ?></span>
                </div>

                <div class="es-title">
                    <h3>Name : </h3>
                    <span><?= ($singer->singer_id) ? ucfirst($singer->fname)." ".ucfirst($singer->lname) : $singer->custom_name ?></span>
                </div>

                <div class="es-buttons">
                    <button class="button-s2 es-button main-button">
                        <svg class="feather feather-x" fill="none" stroke="currentColor"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <line x1="18" x2="6" y1="6" y2="18"/>
                            <line x1="6" x2="18" y1="6" y2="18"/>
                        </svg>
                        <span><?= ($singer->status == "Accepted" || $singer->custom_name) ? 'Remove' : 'Choose Singer' ?></span>
                    </button>
                    <button class="button-s2 es-button"
                            type="button">
                        <svg class="feather feather-phone" fill="none" stroke="currentColor"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <span>Call</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>