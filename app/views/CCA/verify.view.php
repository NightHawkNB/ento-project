<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10 dis-flex-col gap-20 pad-10 hei-100%">
                <div>
                    <?php
                    foreach($assists as $assist ){
                        $this->view("CCA/components/verification", (array)$assist);
                    }
                    ?>
                </div>
                </section>
        </main>
    </div>
</body>
</html>