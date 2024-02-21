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
                <div>
                    <?php
                    foreach($assists as $assist ){
                        $this->view("CCA/components/single_verification", (array)$assist);
                    }
                    ?>
                </div>
                </section>
        </main>
    </div>
</body>
</html>