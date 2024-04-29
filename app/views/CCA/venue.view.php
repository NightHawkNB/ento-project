<html lang="en">
<?php $this->view('includes/head' ,['style'=>['cca/verify.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <?php if(Auth::logged_in()): ?>
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
        <?php endif; ?>
        <section class="cols-10 pad-20 mar-bot-10"　 style="width: 100%">
            <div class="bg-trans dis-flex-col gap-20 bg-lightgray flex-1 pad-20">
                <div class="dis-flex-col bg-trans gap-10 pad-20 txt-ali-cen">
                    <nav class="amazing-tabs">
                        <div class="filters-container">
                            <div class="filters-wrapper">
                                <ul class="filter-tabs">
                                    <li>
                                        <button class="filter-button filter-active" data-translate-value="0">
                                            New Venue
                                        </button>
                                    </li>
                                    <li>
                                        <button class="filter-button" data-translate-value="100%">
                                            Verified
                                        </button>
                                    </li>
                                    <li>
                                        <button class="filter-button" data-translate-value="200%">
                                            Declined
                                        </button>
                                    </li>
                                </ul>
                                <div class="filter-slider" aria-hidden="true">
                                    <div class="filter-slider-rect">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div id="newvenuesection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                        <?php
                        if(!empty($userid)){
                            foreach($assists as $assist ){
                                $this->view("CCA/components/verification", (array)$assist);
                            }
                        }
                        ?>

                    </div>

                    <div id="verifiedsection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                        <?php
                        if(!empty($verified)) {
                            foreach($new as $verified){
                                $this->view('CCA/components/verify_filter/verified', (array)$verified);
                            }
                        } else {
                            echo "No Verified Users";
                        }


                        ?>

                    </div>

                    <div id="declinedsection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                        <?php
                        if(!empty($new)) {
                            foreach($new as $declined){
                                $this->view('CCA/components/verify_filter/declined', (array)$declined);
                            }
                        } else {
                            echo "No Declined Users";
                        }


                        ?>

                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>