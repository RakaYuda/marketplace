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
        let dataCategories = [];
        let dataBrands = [];

        show_categories();
        show_brands();

        show_products();


        function show_products() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_product',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + data[i].id_product + '</td>' +
                            '<td>' + data[i].name_product + '</td>' +
                            '<td>' + data[i].stock_product + '</td>' +
                            '<td>' + data[i].category_product + '</td>' +
                            '<td>' + data[i].brand_product + '</td>' +
                            '<td>' + data[i].image_product + '</td>' +
                            '<td>' + data[i].price_product + '</td>' +
                            '<td style="text-align:left;">' +
                            '<button type="button" class="btn btn-primary ml-1 item_edit" data-toggle="modal" data-target="#ModalEdit" data="' + data[i].id_product + '">Edit</button>' +
                            '<button type="button" class="btn btn-outline-danger ml-1 item_hapus" data-toggle="modal" data-target="#ModalHapus" data="' + data[i].id_product + '">Hapus</button>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#table_product').html(html);
                    $('#dataTable_product').DataTable();
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function show_categories() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_category',
                async: true,
                dataType: 'json',
                success: function(data) {
                    dataCategories = data;
                    var htmlSelectCategoryModal = "";
                    for (i = 0; i < data.length; i++) {
                        htmlSelectCategoryModal += '<option value=' + data[i].id_category + '>' + data[i].name_category + '</option>'
                    }
                    $('#txt_category_product').html(htmlSelectCategoryModal);
                    $('#txt_category_product_edit').html(htmlSelectCategoryModal);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function show_brands() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_brand',
                async: true,
                dataType: 'json',
                success: function(data) {
                    dataBrands = data;
                    var htmlSelectBrandModal = "";
                    for (i = 0; i < data.length; i++) {
                        htmlSelectBrandModal += '<option value=' + data[i].id_brand + '>' + data[i].name_brand + '</option>'
                    }
                    $('#txt_brand_product').html(htmlSelectBrandModal);
                    $('#txt_brand_product_edit').html(htmlSelectBrandModal);
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        //Tambah Barang
        $('#btn_simpan').on('click', function() {
            // var id_product = $('#id_product').val();
            var name_product = $('#txt_name_product').val();
            var stock_product = $('#txt_stock_product').val();
            var category_product = $('#txt_category_product').val();
            var brand_product = $('#txt_brand_product').val();
            var image_product = $('#txt_image_product').val();
            var price_product = $('#txt_price_product').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/add_product') ?>",
                dataType: "JSON",
                data: {
                    //   id: id,
                    name_product: name_product,
                    stock_product: stock_product,
                    category_product: category_product,
                    brand_product: brand_product,
                    image_product: image_product,
                    price_product: price_product,
                },
                success: function(data) {
                    $('[name="name_product"]').val("");
                    $('[name="stock_product"]').val("");
                    $('[name="category_product"]').val("");
                    $('[name="brand_product"]').val("");
                    $('[name="image_product"]').val("");
                    $('[name="price_product"]').val("");
                    $('#ModalAdd').modal('hide');
                    show_products();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#table_product').on('click', '.item_edit', function() {
            var id_product = $(this).attr('data');
            $('#ModalEdit').modal('show');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('api/get_product') ?>",
                dataType: "JSON",
                data: {
                    id_product: id_product
                },
                success: function(data) {
                    console.log(data)
                    $.each(data, function(id_product, name_product, stock_product, category_product, brand_product, image_product, price_product) {
                        $('[name="id_product_edit"]').val(data.id_product);
                        $('[name="name_product_edit"]').val(data.name_product);
                        $('[name="stock_product_edit"]').val(data.stock_product);
                        $('[name="category_product_edit"]').val(data.category_product);
                        $('[name="brand_product_edit"]').val(data.brand_product);
                        $('[name="image_product_edit"]').val(data.image_product);
                        $('[name="price_product_edit"]').val(data.price_product);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click', function() {
            var id_product = $('#id_product_edit').val();
            var name_product = $('#txt_name_product_edit').val();
            var stock_product = $('#txt_stock_product_edit').val();
            var category_product = $('#txt_category_product_edit').val();
            var brand_product = $('#txt_brand_product_edit').val();
            var image_product = $('#txt_image_product_edit').val();
            var price_product = $('#txt_price_product_edit').val();
            // console.log(id_product)
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/update_product') ?>",
                dataType: "JSON",
                data: {
                    id_product: id_product,
                    name_product: name_product,
                    stock_product: stock_product,
                    category_product: category_product,
                    brand_product: brand_product,
                    image_product: image_product,
                    price_product: price_product,
                },
                success: function(data) {
                    $('[name="id_product_edit"]').val("");
                    $('[name="name_product_edit"]').val("");
                    $('[name="stock_product_edit"]').val("");
                    $('[name="category_product_edit"]').val("");
                    $('[name="brand_product_edit"]').val("");
                    $('[name="image_product_edit"]').val("");
                    $('[name="price_product_edit"]').val("");
                    $('#ModalEdit').modal('hide');
                    show_products();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#table_product').on('click', '.item_hapus', function() {
            console.log("hapus clicked")
            var id_product = $(this).attr('data');
            // console.log(id_buku);
            $('[name="id_product"]').val(id_product);
        });

        //Hapus Barang
        $('#btn_hapus').on('click', function() {
            var id_product = $('#id_product').val();
            // var id_buku = $(this).attr('data');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/delete_product') ?>",
                dataType: "JSON",
                data: {
                    id_product: id_product
                },
                success: function(data) {
                    // $('#ModalHapus').modal('hide');
                    console.log(data)
                    $('#ModalHapus').modal('hide');
                    show_products();
                }
            });
            return false;
        });

    });
</script>