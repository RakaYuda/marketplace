<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('/inventory')?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/inventory')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('/inventory/storage')?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Inventory</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('/inventory/chart')?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Graphics</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="<?=base_url('assets/')?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fas fa-plus fa-sm text-white-50 pr-3"></i>Tambah Data</button>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">List Inventory</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">List Action:</div>
                                    <a class="dropdown-item" href="#">Generate Report Excel </a>
                                    <a class="dropdown-item" href="#">Generate Report PDF</a>
                                    <!-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable_inventory" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tipe Barang</th>
                                            <th>Ruangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tipe Barang</th>
                                            <th>Ruangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="table_inventory">
                                        <?php
// $no = 1;
// foreach ($model->rows as $row) {
//     echo " <tr>
//         <td>" . $row->id_barang . "</td>
//         <td>" . $row->id_barang . "</td>
//         <td>" . $row->nama_barang . "</td>
//         <td>" . $row->tipe_barang . "</td>
//         <td>" . $row->ruang . "</td>
//     </tr>";
//     $no++;
// }
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ADD -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal Add</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                <!-- <input type="hidden" name="id_barang" id="id_barang" value=""> -->
                  <div class="mb-3">
                     <label for="nama_barang" class="form-label">Nama Barang</label>
                     <input type="text" class="form-control" name="nama_barang" id="txt_nama_barang" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="tipe_barang" class="form-label">Tipe Barang</label>
                     <input type="text" class="form-control" name="tipe_barang" id="txt_tipe_barang" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="ruang" class="form-label">Ruangan</label>
                     <input type="text" class="form-control" name="ruang" id="txt_ruang" value="" required>
                  </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                  <input type="hidden" name="id_barang_edit" id="id_barang_edit" value="">
                  <div class="mb-3">
                     <label for="nama_barang" class="form-label">nama_barang</label>
                     <input type="text" class="form-control" name="nama_barang_edit" id="txt_nama_barang_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="tipe_barang" class="form-label">tipe_barang</label>
                     <input type="text" class="form-control" name="tipe_barang_edit" id="txt_tipe_barang_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="ruang" class="form-label">ruang</label>
                     <input type="text" class="form-control" name="ruang_edit" id="txt_ruang_edit" value="" required>
                  </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->

        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Modal Hapus</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                    <form class="form-horizontal">
                    <div class="modal-body">

                            <input type="hidden" name="id_barang" id="id_barang" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus barang ini?</p></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
      var deleteModal = new bootstrap.Modal(document.getElementById('ModalHapus'), {
         keyboard: false
      })
      var editModal = new bootstrap.Modal(document.getElementById('ModalEdit'), {
         keyboard: false
      })
      var addModal = new bootstrap.Modal(document.getElementById('ModalAdd'), {
         keyboard: false
      })

       $(document).ready(function(){
        $('#dataTable_inventory').DataTable();

        tampil_data_barang();

        function tampil_data_barang(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url() ?>inventory/get_all_barang',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    console.log(data)
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                 '<td>' + (i+1) + '</td>'+
                                 '<td>'+data[i].id_barang+'</td>'+
                                 '<td>'+data[i].nama_barang+'</td>'+
                                 '<td>'+data[i].tipe_barang+'</td>'+
                                 '<td>'+data[i].ruang+'</td>'+
                                 '<td style="text-align:left;">'+
                                 '<button type="button" class="btn btn-primary ml-1 item_edit" data-toggle="modal" data-target="#ModalEdit" data="'+data[i].id_barang+'">Edit</button>'+
                                 '<button type="button" class="btn btn-outline-danger ml-1 item_hapus" data-toggle="modal" data-target="#ModalHapus" data="'+data[i].id_barang+'">Hapus</button>'+
                                 '</td>'+
                                 '</tr>';
                    }
                    $('#table_inventory').html(html);
                },
                error : function (err){
                   console.log(err)
                }

            });
        }

        //Tambah Barang
        $('#btn_simpan').on('click',function(){
            // var id_barang = $('#id_barang').val();
            var nama_barang = $('#txt_nama_barang').val();
            var tipe_barang = $('#txt_tipe_barang').val();
            var ruang = $('#txt_ruang').val();

            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('inventory/add_barang') ?>",
                dataType : "JSON",
                data : {
                //   id: id,
                  nama_barang: nama_barang,
                  tipe_barang: tipe_barang,
                  ruang: ruang,
               },
               success: function(data){
                  $('[name="nama_barang"]').val("");
                  $('[name="tipe_barang"]').val("");
                  $('[name="ruang"]').val("");
                  $('#ModalAdd').modal('hide');
                  tampil_data_barang();
               }
            });
            return false;
        });

        //GET UPDATE
        $('#table_inventory').on('click','.item_edit',function(){
            var id_barang=$(this).attr('data');
            $('#ModalEdit').modal('show');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('inventory/get_barang') ?>",
                dataType : "JSON",
                data : {
                    id_barang:id_barang
               },
                success: function(data){
                   console.log(data)
                    $.each(data,function(id_barang, nama_barang, tipe_barang, ruang){
                        $('[name="id_barang_edit"]').val(data.id_barang);
                        $('[name="nama_barang_edit"]').val(data.nama_barang);
                        $('[name="tipe_barang_edit"]').val(data.tipe_barang);
                        $('[name="ruang_edit"]').val(data.ruang);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id_barang = $('#id_barang_edit').val();
            var nama_barang = $('#txt_nama_barang_edit').val();
            var tipe_barang = $('#txt_tipe_barang_edit').val();
            var ruang = $('#txt_ruang_edit').val();
            // console.log(judul)
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('inventory/update_barang') ?>",
                dataType : "JSON",
                data : {
                  id_barang: id_barang,
                  nama_barang: nama_barang,
                  tipe_barang: tipe_barang,
                  ruang: ruang,
               },
                success: function(data){
                     $('[name="id_barang_edit"]').val("");
                     $('[name="nama_barang_edit"]').val("");
                     $('[name="tipe_barang_edit"]').val("");
                     $('[name="ruang_edit"]').val("");
                     $('#ModalEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#table_inventory').on('click','.item_hapus',function(){
            console.log("hapus clicked")
            var id_barang = $(this).attr('data');
            // console.log(id_buku);
            $('[name="id_barang"]').val(id_barang);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var id_barang = $('#id_barang').val();
            // var id_buku = $(this).attr('data');
               $.ajax({
               type : "POST",
               url  : "<?php echo base_url('inventory/delete_barang') ?>",
               dataType : "JSON",
               data : {
                id_barang: id_barang
               },
               success: function(data){
                     // $('#ModalHapus').modal('hide');
                     console.log(data)
                     $('#ModalHapus').modal('hide');
                     tampil_data_barang();
                  }
               });
            return false;
         });

    });

   </script>

</body>

</html>