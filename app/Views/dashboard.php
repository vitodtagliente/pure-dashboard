@extends('template.php')

@begin('page-title')
{{config('app.name')}} - @section('module-title')
@end

@begin('css')
<link href="/public/css/dashboard.css" rel="stylesheet">
@end

@begin('header-js')
<script type="text/javascript" charset="utf8" src="/public/js/dashboard.js"></script>
@end

@begin('body')
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>{{config('app.name')}}</h3>
            <strong>{{config('app.shortname')}}</strong>
        </div>

        <ul class="list-unstyled components">

            <?php
            foreach (\App\Libraries\Dashboard::main()->sidebar()->categories() as $category)
            {
                ?>
                <li class=''>
                    <a href="#<?php echo $category; ?>Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class=""></i>
                        <?php echo $category; ?>
                    </a>
                    <ul class="collapse list-unstyled" id="<?php echo $category; ?>Submenu">
                    <?php
                    foreach (\App\Libraries\Dashboard::main()->sidebar()->modules($category) as $module)
                    {
                        ?>
                        <li>
                            <a class="nav-link" href="<?php echo $module->link; ?>">
                                <i class="fas fa-<?php echo $module->icon; ?>"></i>
                                <?php echo $module->name; ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                </li>
                <?php
            }
            ?>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id='content' class='container-fluid'>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <a class="nav-link px-3" href="#">{{\Pure\Auth::user()->email}}</a>
                    <ul class="navbar-nav px-3">
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="{{base_url('logout')}}">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class='container-fluid'>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@section('module-title')</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    @section('module-navbar')
                </div>
            </div>
            <div class='container-fluid'>
                <div id='alerts'></div>
                @section('module-content')
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <span class="align-middle">powered by <a href="https://github.com/vitodtagliente/pure" target="_blank">pure</a>.</span>
        </div>
    </footer>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
@end
