<html lang="en">
<?php $this->view('includes/head',['style'=>'admin/usermanagement.css']) ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>

            <section class="cols-10 dis-flex">
                <div class="glass-bg mar-10 wid-100  dis-flex-col pad-20 gap-10 bor-rad-5">
                    <div class="wrapper">
                        <div id="search-container">
                            <input type="search" id="search-input" class='js-search' placeholder="search product name here..."/>
                            <button id="search">Search</button>
                        </div>

                        <div id="buttons">
                            <button class="button-value">All</button>
                            <button class="button-value">Client</button>
                            <button class="button-value">Admin</button>
                            <button class="button-value">CCA</button>
                            <button class="button-value">SP</button>
                            <button class="button-value">VenueOperator</button>
                        </div>
                    </div>

                    <div class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow: auto; padding-right: 10px">
                        <?php
                            foreach ($users as $user) {
                                $this->view('admin/components/user', (array)$user);
                            }
                        ?>
                    </div>

                    <div class="dis-flex ju-co-se">
                        <a href="<?= ROOT ?>/admin/usermng/add-user">
                            <button class="blue-btn push-right hover-pointer"  style="text-align:right; border: none" >+ Add New</button>
                        </a>
                    </div>                
                </div >
            </section>

            <script>
                const users = document.querySelectorAll('.u');
                const searchInput = document.querySelector('.js-search');

                function searchUsers() {
                    const searchTerm = searchInput.value.toLowerCase();

                    users.forEach(user => {
                        const userTitle = user.dataset.title.toLowerCase();

                        if (userTitle.indexOf(searchTerm) === -1) {
                            user.style.display = 'none';
                        } else {
                            user.style.display = 'flex';
                        }
                    });
                }

                // Event listener changed from 'input' to 'click'
                document.getElementById('search').addEventListener('click', searchUsers);

                // Call the search function when the page loads
                searchUsers();
            </script>
        </main>
    </div>
</body>
</html>