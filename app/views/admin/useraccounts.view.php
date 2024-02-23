<html lang="en">
<?php $this->view('includes/head',['style'=>['admin/usermanagement.css']]) ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.1/css/boxicons.min.css">
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
            .fa
            .select-menu-container{
                position: relative;
            }

            .select-menu{
                pos
            }

            .clear-btn{
                padding: 10px 10px;
                background: #7b51d3;
                color: var(--font-secondary);
                border-radius: 5px;
                max-height: fit-content;
                border: none;
                outline: none;
                transition: 0.3s;
                width: 140px;

            }

        </style>

        <section class="cols-10 dis-flex wid-90">
            <div class="glass-bg mar-10 wid-100  dis-flex-col pad-20 gap-10 bor-rad-5">
                <div class="wrapper">
                    <div class="dis-flex ju-co-se">
                        <div id="search-container" style="width: 50%; min-width: 525px">
                            <i class="fa fa-search"></i>
                            <input type="search" id="search-input" class='js-search' placeholder="search product name here..."/>
                        </div>
                        <div class=" select-menu-container style="width: 50%; background-color: #1a9be6;">
                        <div class="select-menu" style="">
                            <div class="dis-flex">
                                <button id="clear-filter" class="clear-btn" style="margin-right: 10px;">Clear Filter</button>
                                <div class="select-btn">
                                    <span class="sBtn-text">Filter by user</span>
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                            </div>

                            <ul class="options">
                                <li class="option" data-category="client">
                                    <span class="option-text">Client</span>
                                </li>
                                <li class="option" data-category="admin">
                                    <span class="option-text">Admin</span>
                                </li>
                                <li class="option" data-category="singer">
                                    <span class="option-text">Singer</span>
                                </li>
                                <li class="option" data-category="band">
                                    <span class="option-text">Band</span>
                                </li>
                                <li class="option" data-category="cca">
                                    <span class="option-text">CCA</span>
                                </li>
                                <li class="option" data-category="venueo">
                                    <span class="option-text">Venue Operator</span>
                                </li>
                                <li class="option" data-category="venuem">
                                    <span class="option-text">Venue manager</span>
                                </li>
                            </ul>
                        </div>
                    </div>

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
        </section>
    </main>
</div >


<script>
    const users = document.querySelectorAll('.u');
    const searchInput = document.querySelector('.js-search');
    const filterButtons = document.querySelectorAll('.blue-btn');
    const options = document.querySelectorAll('.options .option');
    const clearFilterButton = document.getElementById('clear-filter');

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

    // Event listener for select options
    options.forEach(option => {
        option.addEventListener('click', function() {
            const category = option.dataset.category.toLowerCase();
            filterUsers(category);
        });
    });

    // Clear filter button functionality
    clearFilterButton.addEventListener('click', function() {
        // Remove 'active' class from all filter buttons
        filterButtons.forEach(btn => btn.classList.remove('active'));
        // Show all users
        filterUsers('all');
    });

    // Show all users by default
    filterUsers('all');

    const optionMenu = document.querySelector(".select-menu"),
        selectBtn = optionMenu.querySelector(".select-btn"),
        sBtn_text = optionMenu.querySelector(".sBtn-text");

    selectBtn.addEventListener("click", ()=> optionMenu.classList.toggle("active"));

    options.forEach(option=>{
        option.addEventListener("click",()=>{
            let selectedOption = option.querySelector(".option-text").innerText;
            sBtn_text.innerText=selectedOption;

            optionMenu.classList.remove("active");
        })
    })

</script>
</body>
</html>
