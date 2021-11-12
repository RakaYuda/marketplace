<!doctype html>
<html>

<head>
   <meta charset="utf-8">
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>User | Dashboard</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="container py-5" style="min-height: 100vh">

   <h2 class="fw-bold">Dashboard User</h2>

   <a href="<?=base_url("/user/export_data_user");?>" class="btn btn-primary">Export</a>

   <button class="btn btn-primary btn-disabled" data-bs-toggle="modal" data-bs-target="#ModalAdd" disabled>Tambah</button>

   <div class="card shadow pt-3 mt-5">
      <table class="table mb-0" cellpadding="1" cellspacing="2">
         <thead>
            <tr>
               <th>No</th>
               <th>NIM</th>
               <th>Nama</th>
               <th>Action</th>
            </tr>
         </thead>

         <tbody id="table_user">
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
    //   var deleteModal = new bootstrap.Modal(document.getElementById('ModalHapus'), {
    //      keyboard: false
    //   })
    //   var editModal = new bootstrap.Modal(document.getElementById('ModalEdit'), {
    //      keyboard: false
    //   })
    //   var addModal = new bootstrap.Modal(document.getElementById('ModalAdd'), {
    //      keyboard: false
    //   })

       $(document).ready(function(){
        show_data_user();   //pemanggilan fungsi tampil barang.

        function show_data_user(){
            $.ajax({
                type  : 'GET',
                url   : '<?php echo base_url() ?>user/get_all_user',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    console.log(data)
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                 '<td>' + (i+1) + '</td>'+
                                 '<td>'+data[i].nim+'</td>'+
                                 '<td>'+data[i].nama+'</td>'+
                                 '<td style="text-align:left;">'+
                                 '<button type="button" class="btn btn-primary me-1 item_edit" data-bs-toggle="modal" data-bs-target="#ModalEdit" data="'+data[i].id+'">Edit</button>'+
                                 '<button type="button" class="btn btn-outline-danger me-1 item_hapus" data-bs-toggle="modal" data-bs-target="#ModalHapus" data="'+data[i].id+'">Hapus</button>'+
                                 '</td>'+
                                 '</tr>';
                    }
                    $('#table_user').html(html);
                },
                error : function (err){
                   console.log(err)
                }

            });
        }

    });

   </script>


</body>

</html>