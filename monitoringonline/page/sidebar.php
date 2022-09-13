
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?Open">
        <div class="sidebar-brand-icon ">
            <!--<i class="fas fa-laugh-wink"></i>-->
            <img src="/assets/img/logo.png" alt="logo" style="width:80%">
        </div>
        <div class="sidebar-brand-text mx-2">Fullobster</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="?Open">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <?php
        include 'page/menu.php';
    ?>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>