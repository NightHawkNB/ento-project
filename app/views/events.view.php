<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main>
            <div class="dis-flex gap-20 pad-20 flex-wrap">
                <?php
                    foreach ($record as $event) $this->view('common/events/list-item', (array)$event);
                ?>
            </div>
        </main>

        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>