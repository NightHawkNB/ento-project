<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="bg-lightgray dis-flex al-it-ce ju-co-ce">
        <div class="bg-black-2 flex-1 pad-20">
<!--          <h1 class="txt-c-white">comlain list</h1>-->
            <div class="txt-c-white">
                <?php
                foreach ($complains as $complain) {
//                    show($complain);
                    $this->view('pages/complains/single', (array)$complain);
                }
                ?>
            </div>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>