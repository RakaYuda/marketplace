<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fas fa-plus fa-sm text-white-50 pr-3"></i>Tambah Data</button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">List Transaction</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">List Action:</div>
                    <a class="dropdown-item" href="<?php echo base_url('admin/dashboard/report/daily') ?>">Generate Report Per Days </a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/dashboard/report/monthly') ?>">Generate Report Per Month</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable_transaction" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>id_transaction</th>
                            <th>customer_id</th>
                            <th>cart_products</th>
                            <th>date_transaction</th>
                            <th>total</th>
                            <th>is_pay</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>id_transaction</th>
                            <th>customer_id</th>
                            <th>cart_products</th>
                            <th>date_transaction</th>
                            <th>total</th>
                            <th>is_pay</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="table_transaction">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daily Transaction</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="barChartDaily"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Transaction</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="barChartMonthly"></canvas>
                    </div>


                </div>
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
                        <label for="cart_product" class="form-label">Cart Products</label>
                        <input type="text" class="form-control" name="cart_products" id="txt_cart_products" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_transaction" class="form-label">Date Transaction</label>
                        <input type="date" class="form-control" name="date_transaction" id="txt_date_transaction" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control" name="total" id="txt_total" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="is_pay" class="form-label">Is Pay</label>
                        <input type="text" class="form-control" name="is_pay" id="txt_is_pay" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Customer</label><select class="form-control" name="customer_id" id="txt_customer_id">
                            <?php
// foreach ($customer as $row) {
//     echo "<option value=" . $row->id_user . " >" . $row->username . "</option>";
// }
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
                    <input type="hidden" name="id_transaction_edit" id="id_transaction_edit" value="">

                    <div class="mb-3">
                        <label for="cart_product" class="form-label">Cart Products</label>
                        <input type="text" class="form-control" name="cart_products_edit" id="txt_cart_products_edit" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_transaction" class="form-label">Date Transaction</label>
                        <input type="date" class="form-control" name="date_transaction_edit" id="txt_date_transaction_edit" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control" name="total_edit" id="txt_total_edit" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="is_pay" class="form-label">Is Pay</label>
                        <input type="text" class="form-control" name="is_pay_edit" id="txt_is_pay_edit" value="" required>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlSelect1">Customer</label><select class="form-control" name="customer_id_edit" id="txt_customer_id_edit">
                            <?php
foreach ($customer as $row) {
    echo "<option value=" . $row->id_user . " >" . $row->username . "</option>";
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

                    <input type="hidden" name="id_transaction" id="id_transaction" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau menghapus data ini?</p>
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