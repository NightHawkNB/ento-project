<html lang="en">
<?php $this->view('includes/head', ['style' => 'components/ads.css']) ?>
<body>

<style>
    .ad-container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .ad-container .ad-sub-container {
        padding: 10px;
        flex: 1;
        display: flex;
        gap: 10px;
        justify-content: left;
        align-items: baseline;
        flex-wrap: wrap;
    }

    @media screen and (min-width: 1350px) {
        .ad-container .ad-sub-container {
            max-width: 1350px;
        }
    }

    @media screen and (min-width: 1030px) and (max-width: 1350px) {
        .ad-container .ad-sub-container {
            max-width: 1015px;
        }
    }

    @media screen and (min-width: 700px) and (max-width: 1030px) {
        .ad-container .ad-sub-container {
            max-width: 680px;
        }

        .filter-bar {
            height: fit-content;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    }

    @media screen and (max-width: 700px) {
        .ad-container .ad-sub-container {
            max-width: 345px;
        }

        .filter-bar {
            height: fit-content;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .filter-bar .category_filter {
            flex-wrap: wrap;
        }
    }

    .search-container{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-container input[type=text]{
        height: 50px;
        position: relative;
        padding: 15px 40px 15px 20px;
        width: 20px;
        color: #525252;
        font-size: 16px;
        font-weight: 100;
        letter-spacing: 2px;
        border: none;
        border-radius: 5px;
        background: linear-gradient(to right, #FFFFFF 0%,#464747 #F9F9F9 100%);
        transform-origin: right;
        transition: width 0.4s ease;
        outline: none;

        &:focus{ width: 350px; }
    }

    .search-container i{
        position: relative;
        left: -37px;
        color: #8233C5;
    }

    .search-container i:hover {cursor: pointer}

    .filter-bar {
        background-color: ghostwhite;
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        flex-wrap: wrap;
    }

    .filter-bar .category_filter {
        display: flex;
        align-items: center;
        height: 50px;
        gap: 10px;
    }

    .filter-bar .category_filter label {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        height: 100%;
        width: 100px;
        padding: 10px 15px;
        border-radius: 5px;
    }

    .filter-bar .category_filter label:hover {
        cursor: pointer;
        background-color: #b46ad9;
        color: var(--font-secondary);
    }

    .filter-bar .category_filter input[type=checkbox] {
        display: none;
    }

    .filter-bar .category_filter label.selected {
        background-color: mediumpurple;
        color: var(--font-secondary);
    }

</style>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dis-flex ju-co-st al-it-st">
        <div class="ad-container">

            <div class="filter-bar">
                <div class="category_filter">

                    <button class="button-s2" onclick="clear_filters()">Clear Filters</button>

                    <label class="sh filter-option" onclick="filter_category()" for="singer-filter">
                        <span>Singers</span>
                        <input type="checkbox" data-category="singer" id="singer-filter">
                    </label>
                    <label class="sh filter-option" onclick="filter_category()" for="band-filter">
                        <span>Bands</span>
                        <input type="checkbox" data-category="band" id="band-filter">
                    </label>
                    <label class="sh filter-option" onclick="filter_category()" for="venue-filter">
                        <span>Venues</span>
                        <input type="checkbox" data-category="venue" id="venue-filter">
                    </label>
                </div>

                <div class="search-container">
                    <input placeholder='Search...' class='sh js-search' id="search" type="text">
                    <label for="search"><i class="fa fa-search"></i></label>
                </div>
            </div>

            <div class="ad-sub-container">

                <?php

                    // Merging the category separated ads(arrays) to a single array
                    $ads = [];
                    if(!empty($ad_singer)) $ads = array_merge_recursive($ads, $ad_singer);
                    if(!empty($ad_band)) $ads = array_merge_recursive($ads, $ad_band);
                    if(!empty($ad_venue)) $ads = array_merge_recursive($ads, $ad_venue);

                    foreach ($ads as $ad) {
                        $this->view('pages/advertisements/components/ad', (array)$ad);
                    }

                ?>
            </div>
        </div>
    </main>

    <script>

        function update_viewCount(ad_id) {
            let data = {
                'ad_id' : `${ad_id}`
            }

            try {
                fetch(`/ento-project/public/home/ads`, {
                    method: "PATCH",
                    headers: {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    // console.log(res)
                    return res.text()
                }).then(data => {
                    // Shows the data printed by the targeted php file.
                    // (stopped printing all data in php file by using die command)
                    console.log(data)
                })
            } catch (e) {
                console.log("View count updating failed")
            }
        }

    </script>

    <?php $this->view('includes/footer') ?>

    <script>
        const ads = document.querySelectorAll('.ad')
        const search_bar = document.querySelector('.js-search')

        const category_filters = document.querySelectorAll('.filter-option input')

        const singer_filter = document.querySelector('#singer-filter')
        const band_filter = document.querySelector('#band-filter')
        const venue_filter = document.querySelector('#venue-filter')

        function filter_category() {

            let filter_array = []

            category_filters.forEach(filter => {
                console.log(filter)
                if(filter.checked) {
                    filter_array.push(filter.dataset.category.toLowerCase())
                    if(!filter.parentElement.classList.contains('selected')) filter.parentElement.classList.add('selected')
                } else {
                    if(filter.parentElement.classList.contains('selected')) filter.parentElement.classList.remove('selected')
                }
            })

            ads.forEach(ad => {
                if(filter_array.length > 0) {
                    if(filter_array.includes(ad.dataset.category.toLowerCase())) ad.style.display = 'flex'
                    else ad.style.display = 'none'
                } else {
                    ad.style.display = 'flex'
                }
            })
        }

        search_bar.addEventListener('input', () => {

            ads.forEach(ad => {
                if(ad.dataset.title.toLowerCase().indexOf(search_bar.value) === -1) ad.style.display = 'none'
                else ad.style.display = 'flex'
            })
        })

        function clear_filters() {
            ads.forEach(ad => {
                ad.style.display = 'flex'
            })

            category_filters.forEach(filter => {
                filter.checked = 0
                if(filter.parentElement.classList.contains('selected')) filter.parentElement.classList.remove('selected')
            })

            search_bar.value = ''
        }

    </script>

</div>
</body>
</html>