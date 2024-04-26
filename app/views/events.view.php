<html lang="en">
<style>
    .image-container {
        position: relative;
    }

    .event-image {
        transition: filter 0.3s ease; /* Add transition for smooth effect */
    }

    .image-container:hover .event-image {
        filter: blur(5px); /* Apply blur effect on hover */
    }

    .hover-button {
        position: absolute;
        top: 50%; /* Position the button in the center */
        left: 50%; /* Position the button in the center */
        transform: translate(-50%, -50%);
        opacity: 0; /* Initially hide the button */
        transition: opacity 0.3s ease; /* Add transition for smooth effect */
    }

    .image-container:hover .hover-button {
        opacity: 1; /* Show the button on hover */
    }

    .more-button {
        padding: 10px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
</style>
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main>
            <div class="dis-flex gap-20 pad-20 flex-wrap">
                <?php
                    if(!empty($record)) {
                        foreach ($record as $event) $this->view('common/events/components/list-item', (array)$event);
                    } else {
                        echo "No events listed yet";
                    }
                ?>
            </div>
        </main>
    </div>
</body>
</html>