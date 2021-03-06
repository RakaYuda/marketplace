<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Library | Dashboard</title>
</head>

<body class="container py-5" style="min-height: 100vh">

   <h2 class="fw-bold">Daftar Barang</h2>

   <a href="<?php echo site_url('book/add_book') ?>">Tambah</a><br /><br />

   <div class="card shadow p-4 mb-3 w-100">
      <form action="<?php echo site_url('book/search_book') ?>" method="post">
         <div class="row d-flex">
            <div class="col-4">
            <label for="judul" class="form-label">Category</label>
               <select name="search-category" id="search-category" class="form-select" aria-label="Default select example">
                  <?php
foreach ($categories as $val) {
    if ($category == $val) {
        echo "<option value=" . $val . " selected> " . ucwords($val) . "</option>";
    } else {
        echo "<option value=" . $val . "> " . ucwords($val) . "</option>";
    }

}
?>
               </select>
            </div>
            <div class="col-8">
               <div class="mb-3">
                  <label for="judul" class="form-label">Value</label>
                  <input type="text" class="form-control" name="search-value" id="search-value" value="<?php echo ($value) ?? '' ?>" required>
               </div>
            </div>
         </div>
         <div class="mb-3">
            <input class="btn btn-primary me-2" type="submit" name="btnSearch" id="btnSearch" value="Search" />
         </div>
      </form>
   </div>

   <div class="card shadow pt-3">
      <table class="table mb-0" cellpadding="1" cellspacing="2">
         <thead>
            <tr>
               <th>Judul</th>
               <th>ISBN</th>
               <th>Penulis</th>
               <th>Penerbit</th>
               <th>Tahun terbit</th>
               <th>Halaman</th>
               <th>Action</th>
            </tr>
         </thead>

         <tbody>
            <?php
if (count($model->rows) === 0) {
    echo "<tr><td colspan='7'><p class='text-center py-2 mb-0'>Sorry, we don't have any books here</p></td></tr>";
} else {
    foreach ($model->rows as $row) {

        ?>
                  <tr>
                     <td><?php echo $row->judul; ?></td>
                     <td><?php echo $row->isbn; ?></td>
                     <td><?php echo $row->penulis; ?></td>
                     <td><?php echo $row->penerbit; ?></td>
                     <td><?php echo $row->tahun_terbit; ?></td>
                     <td><?php echo $row->halaman; ?></td>
                     <td>
                        <a href="<?php echo base_url('book/edit_book/' . $row->id); ?>">Edit</a> |
                        <a href="<?php echo base_url('book/delete_book/' . $row->id); ?>" onClick="return confirm('Yakin akan dihapus?')">Hapus</a>
                     </td>
                  </tr>
            <?php
}
}

?>
         </tbody>
      </table>
   </div>

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>