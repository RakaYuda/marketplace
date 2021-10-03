<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Library | Success Add</title>
</head>

<body>
<h2>Sukses Tambah Data</h2>
<p>Data berikut berhasil ditambahkan</p>

<?php echo $model->labels['kode'] . $model->kode; ?> <br/>
<?php echo $model->labels['nama'] . $model->nama; ?> <br/>
<?php echo $model->labels['harga'] . $model->harga; ?> <br/>
<?php echo $model->labels['stok'] . $model->stok; ?> <br/>
</body>
</html>