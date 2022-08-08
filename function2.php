<?php function head(){ ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 2 rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 5 rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">IMIGRASI MANOKWARI</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form-datang.php">
              <span data-feather="file"></span>
              Entry Kedatangan Kapal
            </a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="form-berangkat.php">
              <span data-feather="file"></span>
              Entry Keberangkatan Kapal
            </a>
          </li>
     
          <li class="nav-item">
            <a class="nav-link" href="form-kapal.php">
              <span data-feather="bar-chart-2"></span>
              Laporan Kapal Asing
            </a>
          </li>
          
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>EAZY PASSPORT</span>
          
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="daftar-rencana-on-call.php">
              <span data-feather="file-text"></span>
              Rencana Passport On Call
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar-pelaksanaan-on-call.php">
              <span data-feather="file-text"></span>
              Pelaksanaan Passport On Call
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form-rencana-on-call.php">
              <span data-feather="file-text"></span>
              Laporan Passport On Call
            </a>
          </li>
          
        </ul>
      </div>
    </nav>



 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">PENDATAAN RENCANA PELAKSANAAN PASSPORT ON CALL</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
          
          
        </div>
      </div>
<?php } ?>