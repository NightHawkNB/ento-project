<ul class="nav-list">

<!--      ------------------------------START OF MAIN MENU----------------------------------- -->

<!--     Static Nav Buttons-->
    <?php $this->view('includes/sidebar/main/static'); ?>

<!--     Service Provider's Nav Buttons-->
    <?php if(!(Auth::is_client() || Auth::is_cca() || Auth::is_admin())): ?>
        <?php $this->view('includes/sidebar/main/sp'); ?>
    <?php endif; ?>

    <!-- Client's Nav Buttons -->
    <?php if(Auth::is_client()): ?>
        <?php $this->view('includes/sidebar/main/client'); ?>
    <?php endif; ?>

    <!-- Administrator's Nav Buttons -->
    <?php if(Auth::is_admin()): ?>
        <?php $this->view('includes/sidebar/main/admin'); ?>
    <?php endif; ?>

    <!-- Customer Care Agent's Nav Buttons -->
    <?php if(Auth::is_cca()): ?>
        <?php $this->view('includes/sidebar/main/cca'); ?>
    <?php endif; ?>
    <!--  ------------------------------END OF MAIN MENU----------------------------------- -->
</ul>