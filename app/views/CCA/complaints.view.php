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
                <div id="acceptedsection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($acc as $complaint){
                        $this->view('pages/complaints/single', (array)$complaint);
                    }
                    ?>

                </div>

                <div id="idleSection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php show($data);foreach($idl as $complaint){
                        $this->view('pages/complaints/single', (array)$complaint);
                    }
                    ?>

                </div>

                <div id="assistSection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($assi as $complaint){
                        $this->view('pages/complaints/single', (array)$complaint);
                    }
                    ?>

                </div>
            </section>
        </main>
    </div>
</body>
</html>