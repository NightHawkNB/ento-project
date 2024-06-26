<html lang="en">
<?php $this->view('includes/head', ['style' => ['components/filter.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="wid-100 al-it-ce pad-10 dis-flex-col">

            <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Staff Management</h1>

            <div class="hei-100 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5">
                <div class="dis-flex wid-100 ju-co-sb">
                    <a href="<?= ROOT ?>/venuem/staff/insert">
                        <button class="blue-btn">+ Add New</button>
                    </a>

                    <div class="filter-outer-container">

                        <div class="filter-inner-container">
                            <div  class="filter-content">
                                <div class="filter-items">
                                    <button class="filter-header" onclick="drop_filter(this)">
                                        <p>Venue</p>
                                        <p>&downarrow;</p>
                                    </button>

                                    <div class="items">
                                        <?php foreach($venues as $venue) echo "<div class='item'> $venue->name </div>" ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="overflow-y: auto; padding-right: 5px;">
                    <?php
                        if(!empty($users)) {
                            foreach ($users as $user) {
                                $user->venues = $venues;
                                $this->view('venuem/staff/components/user', (array)$user);
                            }
                        } else {
                            echo "<p class='txt-c-white'>No Users Found</p>";
                        }
                    ?>
                </div>

            </div >
        </section>
    </main>

</div>
</body>
</html>