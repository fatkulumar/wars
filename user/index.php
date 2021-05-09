<?php 
  session_start();

  if(!isset($_SESSION["id"])){
    header("Location: ../index.php");
  }
  
  include "../koneksi.php";
  $id = $_SESSION["id"];
  $sql_select_user = mysqli_query($koneksi, "SELECT `nama_user`, `foto_user` FROM `tb_user` WHERE `id_user` = '$id'");
  $row_user = mysqli_fetch_array($sql_select_user);
  
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- jquery -->
  <script src="../jquery/jquery.min.js"></script>

  <script>
    function alert(pesan) {
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: pesan
        })
    }
</script>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


<!-- <script>
  alert("umar")
</script> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cog"></i>
        </a>
        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> -->
        <div class="dropdown-menu">
          <div>
            <a style="padding-left: 17px;" href="index.php?profil"><i class="fas fa-envelope mr-2"></i>Profil</a>
          </div>
          <div>
            <a style="padding-left: 17px;" href="../logout.php"><i class="fas fa-envelope mr-2"></i>Logout</a>
          </div>
        </div>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../gambar/<?= $row_user["foto_user"]; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php?profil" class="d-block"><?= $row_user["nama_user"]; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?table_jadwal" class="nav-link <?php if(isset($_GET["table_users"])) {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?table_pembayaran" class="nav-link <?php if(isset($_GET["table_pembayaran"])) {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bukti TF</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Biodata
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?table_anak" class="nav-link <?php if(isset($_GET["table_anak"])) {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?table_wali" class="nav-link <?php if(isset($_GET["table_wali"])) {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wali/Ayah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?table_ibu" class="nav-link <?php if(isset($_GET["table_ibu"])) {echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ibu</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Starter Page</h1> -->
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div>/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <?php
        if(isset($_GET["table_users"])) {
          include "form/table_users.php";
        }elseif(isset($_GET["table_jadwal"])){
          include "form/table_jadwal.php";
        }elseif(isset($_GET["table_pembayaran"])){
          include "form/table_pembayaran.php";
        }elseif(isset($_GET["edit_pembayaran"])){
          include "form/edit_pembayaran.php";
        }elseif(isset($_GET["tambah_pembayaran"])){
          include "form/tambah_pembayaran.php";
        }elseif(isset($_GET["tambah_jadwal"])){
          include "form/tambah_jadwal.php";
        }elseif(isset($_GET["table_anak"])){
          include "form/table_anak.php";
        }elseif(isset($_GET["edit_anak"])){
          include "form/edit_anak.php";
        }elseif(isset($_GET["edit_wali"])){
          include "form/edit_wali.php";
        }elseif(isset($_GET["table_wali"])){
          include "form/table_wali.php";
        }elseif(isset($_GET["table_ibu"])){
          include "form/table_ibu.php";
        }elseif(isset($_GET["edit_ibu"])){
          include "form/edit_ibu.php";
        }elseif(isset($_GET["profil"])){
          include "form/profil.php";
        }elseif(isset($_GET["edit_profil"])){
          include "form/edit_profil.php";
        }else{
          include "form/welcome.php";
        }
      ?>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
  <div id="result"></div>
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>


<link rel="stylesheet" href="../datatables/jquery.dataTables.min.css">
<script src="../datatables/jquery.dataTables.min.js"></script>



<script>
    // $(document).ready( function () {
    //   $('#table_user').DataTable();
    // });

    // function save_pembayaran(id)
    // {
    //   var biaya = $("#biaya_gelombang"+id).val()
    //   $('#modalPembayaran'+id).modal('hide')
    //   $.ajax({
    //     url: "proses/ajax_pembayaran.php",
    //     data: {"id": id, "biaya_gelombang": biaya },
    //     type: "POST",
    //     dataType: "JSON",
    //     success: function(data) {
    //       $('#'+id).html(data)
    //     }
    //   })
    // }

    function displayRadioValue() {
            var ele = document.getElementsByName('id_jadwal_wawancara_wawancara');
              
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked==true)
                // document.getElementById("result").innerHTML
                //         = "Gender: "+ele[i].value;
                        // console.log(ele[i].value)
                        var c = ele[i].value
                        alert(c)
            }
        }

    function modalWawancara(id){
      $('#exampleModalWawancara').modal('show')
    }

    function save_wawancara(id){
      
      var ele = document.getElementsByName('id_jadwal_wawancara_wawancara');
      
      var id_jadwal_wawancara_wawancara = []
      for(i = 0; i < ele.length; i++) {
        if(ele[i].checked==true)
        var id_jadwal_wawancara_wawancara = ele[i].value
      }
      $.ajax({
        url: "proses/ajax_wawancara.php",
        type: "POST",
        data: {"id_wawancara_wawancara" : id_jadwal_wawancara_wawancara, "id_user_wawancara" : id},
        dataType: "JSON",
        success: function(data) {
          var jadwal_wawancara = data[0].jadwal_wawancara
          var jam_wawancara = data[0].jam_wawancara
          alert("Berhasil")
          console.log(data)
          $('#jadwal').html(jadwal_wawancara + " " + jam_wawancara )
          $('#exampleModalWawancara').modal('hide')
        }
      })
    }

    

</script>
</body>
</html>
