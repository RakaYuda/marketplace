<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Stock | Dashboard</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="container py-5" style="min-height: 100vh">

   <h2 class="fw-bold">Stok Barang</h2>

   <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAdd">Tambah</button>

   <div class="card shadow pt-3 mt-5">
      <table class="table mb-0" cellpadding="1" cellspacing="2">
         <thead>
            <tr>
               <th>No</th>
               <th>Kode</th>
               <th>Nama</th>
               <th>Harga</th>
               <th>Stok</th>
               <th>Action</th>
            </tr>
         </thead>

         <tbody id="table_stock">
         </tbody>
      </table>
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

                <input type="hidden" name="id" id="id" value="">
                  <div class="mb-3">
                     <label for="judul" class="form-label">Judul</label>
                     <input type="text" class="form-control" name="judul" id="txt_judul" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="isbn" class="form-label">ISBN</label>
                     <input type="text" class="form-control" name="isbn" id="txt_isbn" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="penulis" class="form-label">Penulis</label>
                     <input type="text" class="form-control" name="penulis" id="txt_penulis" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="penerbit" class="form-label">Penerbit</label>
                     <input type="text" class="form-control" name="penerbit" id="txt_penerbit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                     <input type="text" class="form-control" name="tahun_terbit" id="txt_tahun_terbit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="halaman" class="form-label">Halaman</label>
                     <input type="text" class="form-control" name="halaman" id="txt_halaman" value="" required>
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
                  <input type="hidden" name="id_edit" id="id_edit" value="">
                  <div class="mb-3">
                     <label for="judul" class="form-label">Judul</label>
                     <input type="text" class="form-control" name="judul_edit" id="txt_judul_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="isbn" class="form-label">ISBN</label>
                     <input type="text" class="form-control" name="isbn_edit" id="txt_isbn_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="penulis" class="form-label">Penulis</label>
                     <input type="text" class="form-control" name="penulis_edit" id="txt_penulis_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="penerbit" class="form-label">Penerbit</label>
                     <input type="text" class="form-control" name="penerbit_edit" id="txt_penerbit_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                     <input type="text" class="form-control" name="tahun_terbit_edit" id="txt_tahun_terbit_edit" value="" required>
                  </div>
                  <div class="mb-3">
                     <label for="halaman" class="form-label">Halaman</label>
                     <input type="text" class="form-control" name="halaman_edit" id="txt_halaman_edit" value="" required>
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

                            <input type="hidden" name="id_buku" id="id_buku" value="">
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
        <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
        tampil_data_barang();   //pemanggilan fungsi tampil barang.

        function tampil_data_barang(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url() ?>stock/get_all_barang',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    console.log(data)
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                 '<td>' + (i+1) + '</td>'+
                                 '<td>'+data[i].judul+'</td>'+
                                 '<td>'+data[i].isbn+'</td>'+
                                 '<td>'+data[i].penulis+'</td>'+
                                 '<td>'+data[i].penerbit+'</td>'+
                                 '<td style="text-align:left;">'+
                                 '<button type="button" class="btn btn-primary me-1 item_edit" data-bs-toggle="modal" data-bs-target="#ModalEdit" data="'+data[i].id+'">Edit</button>'+
                                 '<button type="button" class="btn btn-outline-danger me-1 item_hapus" data-bs-toggle="modal" data-bs-target="#ModalHapus" data="'+data[i].id+'">Hapus</button>'+
                                 '</td>'+
                                 '</tr>';
                    }
                    $('#table_stock').html(html);
                },
                error : function (err){
                   console.log(err)
                }

            });
        }

        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            var id = $('#id').val();
            var judul = $('#txt_judul').val();
            var isbn = $('#txt_isbn').val();
            var penulis = $('#txt_penulis').val();
            var penerbit = $('#txt_penerbit').val();
            var tahun_terbit = $('#txt_tahun_terbit').val();
            var halaman = $('#txt_halaman').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('stock/add_barang') ?>",
                dataType : "JSON",
                data : {
                  id: id,
                  judul: judul,
                  isbn: isbn,
                  penulis: penulis,
                  penerbit: penerbit,
                  tahun_terbit: tahun_terbit,
                  halaman: halaman,
               },
               success: function(data){
                  $('[name="id"]').val("");
                  $('[name="judul"]').val("");
                  $('[name="isbn"]').val("");
                  $('[name="penulis"]').val("");
                  $('[name="penerbit"]').val("");
                  $('[name="tahun_terbit"]').val("");
                  $('[name="halaman"]').val("");
                  addModal.hide();
                  tampil_data_barang();
               }
            });
            return false;
        });

        //GET UPDATE
        $('#table_stock').on('click','.item_edit',function(){
            var id_buku=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('stock/get_barang') ?>",
                dataType : "JSON",
                data : {
                   id_buku:id_buku
               },
                success: function(data){
                   console.log(data)
                    $.each(data,function(id, judul, isbn, penulis, penerbit, tahun_terbit, halaman){
                        $('[name="id_edit"]').val(data.id);
                        $('[name="judul_edit"]').val(data.judul);
                        $('[name="isbn_edit"]').val(data.isbn);
                        $('[name="penulis_edit"]').val(data.penulis);
                        $('[name="penerbit_edit"]').val(data.penerbit);
                        $('[name="tahun_terbit_edit"]').val(data.tahun_terbit);
                        $('[name="halaman_edit"]').val(data.halaman);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click',function(){
            var id = $('#id_edit').val();
            var judul = $('#txt_judul_edit').val();
            var isbn = $('#txt_isbn_edit').val();
            var penulis = $('#txt_penulis_edit').val();
            var penerbit = $('#txt_penerbit_edit').val();
            var tahun_terbit = $('#txt_tahun_terbit_edit').val();
            var halaman = $('#txt_halaman_edit').val();
            // console.log(judul)
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('stock/update_barang') ?>",
                dataType : "JSON",
                data : {
                  id: id,
                  judul: judul,
                  isbn: isbn,
                  penulis: penulis,
                  penerbit: penerbit,
                  tahun_terbit: tahun_terbit,
                  halaman: halaman,
               },
                success: function(data){
                     $('[name="id_edit"]').val("");
                     $('[name="judul_edit"]').val("");
                     $('[name="isbn_edit"]').val("");
                     $('[name="penulis_edit"]').val("");
                     $('[name="penerbit_edit"]').val("");
                     $('[name="tahun_terbit_edit"]').val("");
                     $('[name="halaman_edit"]').val("");
                    editModal.hide();
                    tampil_data_barang();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#table_stock').on('click','.item_hapus',function(){
            console.log("hapus clicked")
            var id_buku = $(this).attr('data');
            console.log(id_buku);
            $('[name="id_buku"]').val(id_buku);
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var id_buku = $('#id_buku').val();
            // var id_buku = $(this).attr('data');
            console.log(id_buku)
               $.ajax({
               type : "POST",
               url  : "<?php echo base_url('stock/delete_barang') ?>",
               dataType : "JSON",
               data : {
                  id_buku: id_buku
               },
               success: function(data){
                     // $('#ModalHapus').modal('hide');
                     console.log(data)
                     deleteModal.hide();
                     tampil_data_barang();
                  }
               });
            return false;
         });

    });

   </script>


</body>

</html>