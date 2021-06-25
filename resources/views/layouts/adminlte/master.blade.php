<!DOCTYPE html>
<html dir="{{ Locales::getDir() }}" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ isset($title) ? 
        $title .' | '. (Settings::locale(app()->getLocale())->get('title') ?: config('app.name', 'Laravel')) : 
        (Settings::locale(app()->getLocale())->get('title') ?: config('app.name', 'Laravel'))}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Admin Lte -->
    @if(Locales::getDir() == 'rtl')
        <link rel="stylesheet" href="{{ asset(mix('/css/adminlte.rtl.css')) }}">
    @else
        <link rel="stylesheet" href="{{ asset(mix('/css/adminlte.css')) }}">
    @endif

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3 d-none d-md-flex">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Language Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
                    <img src="{{ Locales::getFlag() }}" alt="">
                    <span class="d-none d-md-inline">
                        {{ Locales::getName() }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0">
                    @foreach(Locales::get() as $locale)
                        <a href="{{ route('dashboard.locale', $locale->code) }}"
                           class="dropdown-item {{ app()->getLocale() == $locale->code ? 'active' : '' }}">
                            <img src="{{ $locale->flag }}" alt="">
                            {{ $locale->name }}
                        </a>
                    @endforeach
                </div>
            </li>

            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown user-dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right user-dropdown-menu">
                    <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit()" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> @lang('dashboard.auth.logout')
                    </a>
                    <form style="display: none;" action="{{ route('logout') }}" method="post" id="logoutForm">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <img src="{{ optional(Settings::instance('dashboardLogo'))->getFirstMediaUrl('dashboardLogo') ?: '/images/AdminLTELogo.png' }}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">{{ \Settings::locale(\App::getLocale())->get('title') ?: config('app.name') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    @include('layouts.sidebar')
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex float-sm-right">
                            @isset($breadcrumbs)
                                {{ Breadcrumbs::render(...$breadcrumbs) }}
                            @endisset
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('flash::message')
                {{ $slot }}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        {{ Settings::get('footer') ?: 'Copyright &copy; 2020 All rights reserved.'  }}
    </footer>
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset(mix('/js/adminlte.js')) }}"></script>

@stack('scripts')
</body>
</html>
