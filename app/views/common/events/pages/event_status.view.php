<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/event_status.css', 'components/progress_bar.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10 event_status">

            <div class="event-status-container">

                <div style="text-align: center" class="progress-container-main">
                    <div class="progress-container">
                        <?php $progress = 3; ?>
                        <div class="progress" id="progress" style="width: <?= $progress*20 ?>%"></div>
                        <div class="circle active">
                            <span class="label">General Details</span>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Venue</span>
                            <p>2</p>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Bands</span>
                            <p>3</p>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Singers</span>
                            <p>4</p>
                        </div>
                        <div class="circle <?= (!empty($something)) ? 'active' : '' ?>">
                            <span class="label">Ticketing Plan</span>
                            <p>5</p>
                        </div>
                        <div class="circle <?= (!empty($something)) ? 'active' : '' ?>">
                            <span class="label">Confirmation</span>
                            <p>6</p>
                        </div>
                    </div>

                </div>

                <div>Other Content</div>

            </div>

        </section>

    </main>


    <script>
        const nodes = document.querySelectorAll('.circle')
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>`
        nodes.forEach(node => {
            if(node.classList.contains('active')) {
                node.querySelector('p').remove()
                node.insertAdjacentHTML('beforeend', svg)
            }
        })
    </script>


</div>
</body>
</html>