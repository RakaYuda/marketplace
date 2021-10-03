<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Library | Book Form</title>
</head>

<body class="container py-5" style="min-height: 100vh">
    <div class="row">
        <h2 class="fw-bold mb-4">Form <?php echo isset($model->row->id) ? 'Ubah' : 'Tambah'; ?> Data</h2>
    </div>

<div class="d-flex h-100 align-items-center">



    <?php
if (isset($model->row->id)) {
    $kode_hidden = '<input type="hidden" name="id" id="id" value="' . $model->row->id . '">';
    $kode_disable = ' disabled ';
    $action = site_url('book/form_edit_book');
} else {
    $kode_hidden = '';
    $kode_disable = '';
    $action = site_url('book/add_book');
}
?>
    <div class="card shadow p-4 w-100">
        <form action="<?php echo $action; ?>" method="post">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" id="txt_judul" value="<?php echo @$model->row->judul; ?>" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" name="isbn" id="txt_isbn" value="<?php echo @$model->row->isbn; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" name="penulis" id="penulis" value="<?php echo @$model->row->penulis; ?>" required>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="txt_penerbit" value="<?php echo @$model->row->penerbit; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="text" class="form-control" name="tahun_terbit" id="txt_tahun_terbit" value="<?php echo @$model->row->tahun_terbit; ?>" required>
            </div>
            <div class="mb-3">
                <label for="halaman" class="form-label">Halaman</label>
                <input type="text" class="form-control" name="halaman" id="txt_halaman" value="<?php echo @$model->row->halaman; ?>" required>
            </div>
            <?php echo $kode_hidden; ?>

            <div class="mb-3">
                <input class="btn btn-primary me-2" type="submit" name="btnSubmit" id="btnSubmit" value="Simpan" />
                <input class="btn btn-secondary" type="reset" name="btn_reset" id="btn_reset" value="Reset" />
            </div>
        </form>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>