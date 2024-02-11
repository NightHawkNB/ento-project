<html lang="en">
<?php $this->view('includes/head',['style'=>'admin/adverification.css']) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="glass-bg mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

                <nav class="amazing-tabs">
                    <div class="filters-container">
                        <div class="filters-wrapper">
                            <ul class="filter-tabs">
                                <li>
                                    <button class="filter-button filter-active" data-filter="pending-assist" data-translate-value="0">
                                        Pending Assist
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-filter="assisting" data-translate-value="100%">
                                        Assisting
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-filter="handled" data-translate-value="200%">
                                        Handled
                                    </button>
                                </li>
                            </ul>
                            <div class="filter-slider" aria-hidden="true">
                                <div class="filter-slider-rect">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </nav>

                <div id="pending-assist" class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10">
                    <?php foreach($idlerequests as $request){
                        $this->view('admin/components/assrequests',(array)$request);
                    } ?>
                </div>
                <div id="assisting" class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="display: none;">
                    <?php foreach($assistrequests as $request){
                        $this->view('admin/components/assrequests',(array)$request);
                    } ?>
                </div>
                <div id="handled" class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="display: none;">
                    <?php foreach($handledrequests as $request){
                        $this->view('admin/components/assrequests',(array)$request);
                    } ?>
                </div>

            </div >
        </section>
    </main>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterButtons = document.querySelectorAll(".filter-button");
        const filterSlider = document.querySelector(".filter-slider-rect");
        const filterSections = document.querySelectorAll(".flex-1");

        filterButtons.forEach(button => {
            button.addEventListener("click", function() {
                const targetTranslateValue = this.getAttribute("data-translate-value");
                const targetFilter = this.getAttribute("data-filter");

                // Update active button
                filterButtons.forEach(btn => {
                    btn.classList.remove("filter-active");
                });
                this.classList.add("filter-active");

                // Move slider
                filterSlider.style.transform = `translateX(${targetTranslateValue})`;

                // Toggle corresponding section
                filterSections.forEach(section => {
                    if (section.id === targetFilter) {
                        section.style.display = section.style.display === "flex" ? "none" : "flex";
                    } else {
                        section.style.display = "none";
                    }
                });
            });
        });
    });
</script>


</body>
</html>
