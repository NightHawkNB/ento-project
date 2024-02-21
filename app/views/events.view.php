<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main>
            <div class="dis-flex gap-20 pad-20 flex-wrap">
                <?php
                    if(!empty($record)) {
                        foreach ($record as $event) $this->view('common/events/components/list-item', (array)$event);
                    } else {
                        echo "No events listed yet";
                    }
                ?>
            </div>
        </main>
    </div>
</body>
</html>