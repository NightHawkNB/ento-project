<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

                <div class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10">

                    <?php foreach($ads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>


            </div >
        </section>
    </main>
</div>
</body>
</html>
