<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10 dis-flex-col pad-20 gap-10">

                <!-- Dummy Data Start -->
                    <?php
                        foreach ($ads as $ad) {
                            $this->view('includes/ad-component', (array)$ad);
                        }
                    ?>
                <!-- Dummy Data End -->

            </section>
        </main>
    </div>
</body>
</html>