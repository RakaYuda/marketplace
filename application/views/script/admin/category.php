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

        show_categories();


        function show_categories() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_category',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + data[i].id_category + '</td>' +
                            '<td>' + data[i].name_category + '</td>' +
                            '<td style="text-align:left;">' +
                            '<button type="button" class="btn btn-primary ml-1 item_edit" data-toggle="modal" data-target="#ModalEdit" data="' + data[i].id_category + '">Edit</button>' +
                            '<button type="button" class="btn btn-outline-danger ml-1 item_hapus" data-toggle="modal" data-target="#ModalHapus" data="' + data[i].id_category + '">Hapus</button>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#table_category').html(html);
                    $('#dataTable_category').DataTable();
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        //Tambah Barang
        $('#btn_simpan').on('click', function() {
            // var id_category = $('#id_category').val();
            var name_category = $('#txt_name_category').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/add_category') ?>",
                dataType: "JSON",
                data: {
                    //   id: id,
                    name_category: name_category,
                },
                success: function(data) {
                    $('[name="name_category"]').val("");
                    $('#ModalAdd').modal('hide');
                    show_categories();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#table_category').on('click', '.item_edit', function() {
            var id_category = $(this).attr('data');
            console.log(id_category);
            $('#ModalEdit').modal('show');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('api/get_category') ?>",
                dataType: "JSON",
                data: {
                    id_category: id_category
                },
                success: function(data) {
                    console.log(data)
                    $.each(data, function(id_category, name_category) {
                        $('[name="id_category_edit"]').val(data.id_category);
                        $('[name="name_category_edit"]').val(data.name_category);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click', function() {
            var id_category = $('#id_category_edit').val();
            var name_category = $('#txt_name_category_edit').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/update_category') ?>",
                dataType: "JSON",
                data: {
                    id_category: id_category,
                    name_category: name_category,
                },
                success: function(data) {
                    $('[name="id_category_edit"]').val("");
                    $('[name="name_category_edit"]').val("");
                    $('#ModalEdit').modal('hide');
                    show_categories();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#table_category').on('click', '.item_hapus', function() {
            console.log("hapus clicked")
            var id_category = $(this).attr('data');
            // console.log(id_buku);
            $('[name="id_category"]').val(id_category);
        });

        //Hapus Barang
        $('#btn_hapus').on('click', function() {
            var id_category = $('#id_category').val();
            // var id_buku = $(this).attr('data');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/delete_category') ?>",
                dataType: "JSON",
                data: {
                    id_category: id_category
                },
                success: function(data) {
                    // $('#ModalHapus').modal('hide');
                    console.log(data)
                    $('#ModalHapus').modal('hide');
                    show_categories();
                }
            });
            return false;
        });

    });
</script>