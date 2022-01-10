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

    $(document).ready(function() {
        console.log('render this script')
        let dataRuang = [];
        let dataTipebrand = [];

        show_brands();


        function show_brands() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_brand',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + data[i].id_brand + '</td>' +
                            '<td>' + data[i].name_brand + '</td>' +
                            '<td style="text-align:left;">' +
                            '<button type="button" class="btn btn-primary ml-1 item_edit" data-toggle="modal" data-target="#ModalEdit" data="' + data[i].id_brand + '">Edit</button>' +
                            '<button type="button" class="btn btn-outline-danger ml-1 item_hapus" data-toggle="modal" data-target="#ModalHapus" data="' + data[i].id_brand + '">Hapus</button>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#table_brand').html(html);
                    $('#dataTable_brand').DataTable();
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        //Tambah brand
        $('#btn_simpan').on('click', function() {
            // var id_brand = $('#id_brand').val();
            var name_brand = $('#txt_name_brand').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/add_brand') ?>",
                dataType: "JSON",
                data: {
                    //   id: id,
                    name_brand: name_brand,
                },
                success: function(data) {
                    $('[name="name_brand"]').val("");
                    $('#ModalAdd').modal('hide');
                    show_brands();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#table_brand').on('click', '.item_edit', function() {
            var id_brand = $(this).attr('data');
            $('#ModalEdit').modal('show');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('api/get_brand') ?>",
                dataType: "JSON",
                data: {
                    id_brand: id_brand
                },
                success: function(data) {
                    console.log(data)
                    $.each(data, function(id_brand, name_brand) {
                        $('[name="id_brand_edit"]').val(data.id_brand);
                        $('[name="name_brand_edit"]').val(data.name_brand);
                    });
                }
            });
            return false;
        });

        //Update brand
        $('#btn_update').on('click', function() {
            var id_brand = $('#id_brand_edit').val();
            var name_brand = $('#txt_name_brand_edit').val();
            // console.log(judul)
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/update_brand') ?>",
                dataType: "JSON",
                data: {
                    id_brand: id_brand,
                    name_brand: name_brand,
                },
                success: function(data) {
                    $('[name="id_brand_edit"]').val("");
                    $('[name="name_brand_edit"]').val("");
                    $('#ModalEdit').modal('hide');
                    show_brands();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#table_brand').on('click', '.item_hapus', function() {
            console.log("hapus clicked")
            var id_brand = $(this).attr('data');
            // console.log(id_buku);
            $('[name="id_brand"]').val(id_brand);
        });

        //Hapus brand
        $('#btn_hapus').on('click', function() {
            var id_brand = $('#id_brand').val();
            // var id_buku = $(this).attr('data');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/delete_brand') ?>",
                dataType: "JSON",
                data: {
                    id_brand: id_brand
                },
                success: function(data) {
                    // $('#ModalHapus').modal('hide');
                    console.log(data)
                    $('#ModalHapus').modal('hide');
                    show_brands();
                }
            });
            return false;
        });

    });
</script>