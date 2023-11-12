<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10">

            <h1 class="mar-10-0 txt-c-white f-mooli txt-w-bold" style="font-size: 1.5rem">Reservation Requests Details</h1>

            <?php
                extract((array)$request);
                show($request);
            ?>

        </section>
    </main>
</div>
</body>
</html>