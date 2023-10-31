<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10">
                <h1>complaints page</h1>
                <?php
                if(!empty($complaints)) {
                    foreach ($complaints as $complaint) {
                        $this->view('pages/complaints/single', (array)$complaint);
                    }
                } else {
                    echo "No complaints to show";
                }
                ?>
                <p><?php show($complaints) ?></p>
            </section>
        </main>
    </div>
</body>
</html>