<title>SPPD Online Kabupaten Demak</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  

</head>
<body>
<img src='./assets/img/demak.png' width='40' height='50'/> 
  <span class="sppd">SPPD ONLINE</span>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Home.php">Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="">Home</a></li> -->
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Prefrensi<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="data_user.php">User</a></li>
          <li><a href="hakakses.php">Hak Akses</a></li>
          <li><a href="transportasi.php">Data Alat Trasnportasi</a></li>
          <li><a href="pangkat_golongan.php">Pangkat Golongan</a></li>
          <li><a href="setting.php">Setting</a></li>
          <li><a href="opd.php">OPD</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Dasar<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="data_pns.php">Data PNS</a></li>
          <li><a href="pejabat.php">Daftar Pejabat</a></li>
        </ul>
      </li>
      <li><a href="sppd.php">SPPD</a></li>
      <!-- <li><a href="download.php">Download</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>