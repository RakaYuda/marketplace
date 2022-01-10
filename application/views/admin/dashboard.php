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
            <h6 class="m-0 font-weight-bold text-primary">List Brands</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">List Action:</div>
                    <a class="dropdown-item" href="<?php echo base_url('admin/dashboard/export_excel') ?>">Generate Report Excel </a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/dashboard/print_pdf') ?>">Generate Report PDF</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable_brands" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Brands</th>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Brands</th>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="table_brands">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

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
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <!-- <input type="hidden" name="id_barang" id="id_barang" value=""> -->
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="txt_nama_barang" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Tipe Barang</label><select class="form-control" name="tipe_barang" id="txt_tipe_barang">
                            <?php
foreach ($tipe as $row) {
    echo "<option value=" . $row->id_tipe_barang . " >" . $row->nama_tipe . "</option>";
}
?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Ruangan</label><select class="form-control" name="ruang" id="txt_ruang">
                            <?php
foreach ($ruang as $row) {
    echo "<option value=" . $row->id_ruang . " >" . $row->nama_ruang . "</option>";
}
?>

                        </select>
                    </div>

                    <!-- <div class="mb-3">
                            <label for="exampleFormControlSelect1">Tipe Barang</label>
                            <div class="form-check">
                                <input class="form-check-input" id="flexRadioDefault1" type="radio" name="flexRadioDefault">
                                <label class="form-check-label" for="flexRadioDefault1">Default radio</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="flexRadioDefault2" type="radio" name="flexRadioDefault" checked>
                                <label class="form-check-label" for="flexRadioDefault2">Default checked radio</label>
                            </div>
                        </div> -->
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
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="id_barang_edit" id="id_barang_edit" value="">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang_edit" id="txt_nama_barang_edit" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Tipe Barang</label><select class="form-control" name="tipe_barang_edit" id="txt_tipe_barang_edit">
                            <?php
foreach ($tipe as $row) {
    echo "<option value=" . $row->id_tipe_barang . " >" . $row->nama_tipe . "</option>";
}
?>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Ruangan</label><select class="form-control" name="ruang_edit" id="txt_ruang_edit">
                            <?php
foreach ($ruang as $row) {
    echo "<option value=" . $row->id_ruang . " >" . $row->nama_ruang . "</option>";
}
?>

                        </select>
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
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="id_barang" id="id_barang" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau menghapus barang ini?</p>
                    </div>

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
