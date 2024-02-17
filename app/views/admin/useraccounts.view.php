<html lang="en">
<?php $this->view('includes/head',['style'=>'admin/usermanagement.css']) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <style>
            .fa.fa-search {
                color: white;
            }
        </style>

        <section class="cols-10 dis-flex">
            <div class="glass-bg mar-10 wid-100  dis-flex-col pad-20 gap-10 bor-rad-5">
                <div class="wrapper">
                    <div id="search-container">
                        <i class="fa fa-search"></i>
                        <input type="search" id="search-input" class='js-search' placeholder="search product name here..."/>
                    </div>

                    <div id="buttons" class="dis-flex ju-co-sb">
                        <button class="blue-btn" data-category="all">All</button>
                        <button class="blue-btn" data-category="client">Client</button>
                        <button class="blue-btn" data-category="admin">Admin</button>
                        <button class="blue-btn" data-category="singer">Singer</button>
                        <button class="blue-btn" data-category="band">Band</button>
                        <button class="blue-btn" data-category="cca">CCA</button>
                        <button class="blue-btn" data-category="venueo">V-Operator</button>
                        <button class="blue-btn" data-category="venuem">V-Manager</button>
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
            const filterButtons = document.querySelectorAll('.blue-btn');

            function filterUsers(category) {
                users.forEach(user => {
                    const userCategory = user.dataset.category.toLowerCase();

                    if (category === 'all' || userCategory === category) {
                        user.style.display = 'flex';
                    } else {
                        user.style.display = 'none';
                    }
                });
            }

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

            // Event listener for search input
            //document.getElementById('search').addEventListener('click', searchUsers);
            searchInput.addEventListener('input', searchUsers);

            // Event listener for filter buttons
            filterButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Remove 'active' class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));

                    // Add 'active' class to the clicked button
                    button.classList.add('active');

                    // Get the category from the button's dataset
                    const category = button.dataset.category.toLowerCase();

                    // Filter users based on the selected category
                    filterUsers(category);
                });
            });

            // Set 'All' as the default active button and show all users on page load
            filterButtons[0].click();
        </script>
    </main>
</div>
</body>
</html>
