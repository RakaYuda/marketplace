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
        let dataCustomer = [];
        let dataTipeBarang = [];

        show_customer();

        show_transactions();


        function show_transactions() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_transaction',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + data[i].id_transaction + '</td>' +
                            '<td>' + data[i].customer_id + '</td>' +
                            '<td>' + data[i].cart_products + '</td>' +
                            '<td>' + data[i].date_transaction + '</td>' +
                            '<td>' + '$ ' + data[i].total + '</td>' +
                            '<td>' + data[i].is_pay + '</td>' +
                            '<td style="text-align:left;">' +
                            '<button type="button" class="btn btn-primary ml-1 item_edit" data-toggle="modal" data-target="#ModalEdit" data="' + data[i].id_transaction + '">Edit</button>' +
                            '<button type="button" class="btn btn-outline-danger ml-1 item_hapus" data-toggle="modal" data-target="#ModalHapus" data="' + data[i].id_transaction + '">Hapus</button>' +
                            '<a href="<?php echo base_url() ?>admin/dashboard/invoice/' + data[i].id_transaction + '" target="_blank" class="btn btn-primary ml-1 item_invoice" data="' + data[i].id_transaction + '">Invoice</button>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#table_transaction').html(html);
                    $('#dataTable_transaction').DataTable();
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        function show_customer() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>api/get_all_user',
                async: true,
                dataType: 'json',
                success: function(data) {
                    dataCustomer = data;
                    dataBrands = data;
                    var htmlSelectCustomerModal = "";
                    for (i = 0; i < data.length; i++) {
                        htmlSelectCustomerModal += '<option value=' + data[i].id_user + '>' + data[i].username + '</option>'
                    }
                    $('#txt_customer_id').html(htmlSelectCustomerModal);
                    $('#txt_customer_id_edit').html(htmlSelectCustomerModal);
                    htmlSelectCustomerModal
                },
                error: function(err) {
                    console.log(err)
                }
            });
        }

        //Tambah Barang
        $('#btn_simpan').on('click', function() {
            // var id_transaction = $('#id_transaction').val();
            var customer_id = $('#txt_customer_id').val();
            var cart_products = $('#txt_cart_products').val();
            var date_transaction = $('#txt_date_transaction').val();
            var total = $('#txt_total').val();
            var is_pay = $('#txt_is_pay').val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/add_transaction') ?>",
                dataType: "JSON",
                data: {
                    //   id: id,
                    customer_id: customer_id,
                    cart_products: cart_products,
                    date_transaction: date_transaction,
                    total: total,
                    is_pay: is_pay,
                },
                success: function(data) {
                    console.log(date_transaction)
                    $('[name="customer_id"]').val("");
                    $('[name="cart_products"]').val("");
                    $('[name="date_transaction"]').val("");
                    $('[name="total"]').val("");
                    $('[name="is_pay"]').val("");
                    $('#ModalAdd').modal('hide');
                    show_transactions();
                }
            });
            return false;
        });

        //GET UPDATE
        $('#table_transaction').on('click', '.item_edit', function() {
            var id_transaction = $(this).attr('data');
            $('#ModalEdit').modal('show');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('api/get_transaction') ?>",
                dataType: "JSON",
                data: {
                    id_transaction: id_transaction
                },
                success: function(data) {
                    console.log(data)
                    $.each(data, function(id_transaction, customer_id, cart_products, date_transaction, total, is_pay) {
                        $('[name="id_transaction_edit"]').val(data.id_transaction);
                        $('[name="customer_id_edit"]').val(data.customer_id);
                        $('[name="cart_products_edit"]').val(data.cart_products);
                        $('[name="date_transaction_edit"]').val(data.date_transaction);
                        $('[name="total_edit"]').val(data.total);
                        $('[name="is_pay_edit"]').val(data.is_pay);
                    });
                }
            });
            return false;
        });

        //Update Barang
        $('#btn_update').on('click', function() {
            var id_transaction = $('#id_transaction_edit').val();
            var customer_id = $('#txt_customer_id_edit').val();
            var cart_products = $('#txt_cart_products_edit').val();
            var date_transaction = $('#txt_date_transaction_edit').val();
            var total = $('#txt_total_edit').val();
            var is_pay = $('#txt_is_pay_edit').val();
            // console.log(judul)
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/update_transaction') ?>",
                dataType: "JSON",
                data: {
                    id_transaction: id_transaction,
                    customer_id: customer_id,
                    cart_products: cart_products,
                    date_transaction: date_transaction,
                    total: total,
                    is_pay: is_pay,
                },
                success: function(data) {
                    $('[name="id_transaction_edit"]').val("");
                    $('[name="customer_id_edit"]').val("");
                    $('[name="cart_products_edit"]').val("");
                    $('[name="date_transaction_edit"]').val("");
                    $('[name="total_edit"]').val("");
                    $('[name="is_pay_edit"]').val("");
                    $('#ModalEdit').modal('hide');
                    show_transactions();
                }
            });
            return false;
        });

        //GET HAPUS
        $('#table_transaction').on('click', '.item_hapus', function() {
            console.log("hapus clicked")
            var id_transaction = $(this).attr('data');
            // console.log(id_buku);
            $('[name="id_transaction"]').val(id_transaction);
        });

        //Hapus Barang
        $('#btn_hapus').on('click', function() {
            var id_transaction = $('#id_transaction').val();
            // var id_buku = $(this).attr('data');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('api/delete_transaction') ?>",
                dataType: "JSON",
                data: {
                    id_transaction: id_transaction
                },
                success: function(data) {
                    // $('#ModalHapus').modal('hide');
                    console.log(data)
                    $('#ModalHapus').modal('hide');
                    show_transactions();
                }
            });
            return false;
        });

        let chart = <?php echo json_encode($chart); ?>;
        console.log(chart)

        // Pie Chart Example
        var ctx = document.getElementById("barChartDaily");
        var barChartDaily = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: ["Direct", "Referral", "Social"],
                labels: chart.daily.label,
                datasets: [{
                    data: chart.daily.value,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });

        // Pie Chart Example
        var ctx = document.getElementById("barChartMonthly");
        var barChartMonthly = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: ["Direct", "Referral", "Social"],
                labels: chart.monthly.label,
                datasets: [{
                    data: chart.monthly.value,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });

    });
</script>