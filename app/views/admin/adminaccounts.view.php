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
                <div class="bg-black-2 mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">
                    <a href="profile/verify" class="push-right">
                        <button class="btn-lay-2 hover-pointer"  style="background-color:purple; text-align:right; border: none" >Filter by</button>
                    </a>

                    <div class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10">
                        <a href="#req-01">
                            <div class="bg-white txt-c-black dis-flex ju-co-sb pad-10 bor-rad-5">
                                <p>Admin01</p>
                                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >View</button>
                            </div>
                        </a>

                        <a href="#req-02">
                            <div class="bg-white txt-c-black dis-flex ju-co-sb pad-10 bor-rad-5">
                                <p>Admin02</p>
                                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >View</button>
                            </div>
                        </a>

                        <a href="#req-03">
                            <div class="bg-white txt-c-black dis-flex ju-co-sb pad-10 bor-rad-5">
                                <p>Admin03</p>
                                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >View</button>
                            </div>
                        </a>
                    </div>

                    <div class="dis-flex ju-co-se">
                        <a href="profile/verify">
                            <button class="btn-lay-2 push-right hover-pointer"  style="background-color:purple; text-align:right; border: none" >+ Add New</button>
                        </a>
                    </div>
                
                </div >
            </section>
        </main>
    </div>
</body>
</html>