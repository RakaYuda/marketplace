<?php

class Api extends CI_Controller
{

    public $brand_model;
    public $category_model;
    public $product_model;
    public $transaction_model;
    public $user_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('print_pdf');

        $this->load->model('product/brand_model');
        $this->load->model('product/category_model');
        $this->load->model('product/product_model');

        $this->load->model('transaction/transaction_model');

        $this->load->model('user/user_model');

        $this->brand_model = $this->brand_model;
        $this->category_model = $this->category_model;
        $this->product_model = $this->product_model;
        $this->transaction_model = $this->transaction_model;
        $this->user_model = $this->user_model;

    }

    // public function index()
    // {
    //     $this->brand_model->get_rows();
    //     $data = array('model' => $this->brand_model);
    //     // $data['categories'] = $this->categories;
    //     $this->load->view('storage/index');
    // }

    // public function get_all_ruang()
    // {
    //     $this->load->model('ruang_model');
    //     $this->ruang_model->get_rows();
    //     $data = $this->ruang_model->rows;
    //     echo json_encode($data);
    // }

    // public function get_all_brand()
    // {
    //     $this->brand_model->get_rows();
    //     $data = $this->brand_model->rows;
    //     echo json_encode($data);
    // }

    // API endpoint for fetching brand data

    public function get_all_brand()
    {
        $this->brand_model->get_rows();
        $data = $this->brand_model->rows;
        echo json_encode($data);
    }

    public function get_brand()
    {
        $id_brand = $_GET['id_brand'];
        $this->brand_model->get_row($id_brand);
        $data = $this->brand_model->row;
        echo json_encode($data);
    }

    public function add_brand()
    {
        $this->brand_model->name_brand = $_POST['name_brand'];

        $this->brand_model->insert();
        echo json_encode("item added");

    }

    public function update_brand()
    {
        $this->brand_model->id_brand = $_POST['id_brand'];
        $this->brand_model->name_brand = $_POST['name_brand'];

        $this->brand_model->update();
        echo json_encode("item updated");
    }

    public function delete_brand()
    {
        $id_brand = $_POST['id_brand'];

        $this->brand_model->delete($id_brand);
        echo json_encode("item deleted");
    }

    // End of API endpoint for fetching brand data

    // API endpoint for fetching product data

    public function get_all_product()
    {
        $this->product_model->get_rows();
        $data = $this->product_model->rows;
        echo json_encode($data);
    }

    public function get_product()
    {
        $id_product = $_GET['id_product'];
        $this->product_model->get_row($id_product);
        $data = $this->product_model->row;
        echo json_encode($data);
    }

    public function add_product()
    {
        $this->product_model->name_product = $_POST['name_product'];
        $this->product_model->stock_product = $_POST['stock_product'];
        $this->product_model->category_product = $_POST['category_product'];
        $this->product_model->brand_product = $_POST['brand_product'];
        $this->product_model->image_product = $_POST['image_product'];
        $this->product_model->price_product = $_POST['price_product'];

        $this->product_model->insert();
        echo json_encode("item added");

    }

    public function update_product()
    {
        $this->product_model->id_product = $_POST['id_product'];
        $this->product_model->name_product = $_POST['name_product'];
        $this->product_model->stock_product = $_POST['stock_product'];
        $this->product_model->category_product = $_POST['category_product'];
        $this->product_model->brand_product = $_POST['brand_product'];
        $this->product_model->image_product = $_POST['image_product'];
        $this->product_model->price_product = $_POST['price_product'];

        $this->product_model->update();
        echo json_encode("item updated");
    }

    public function delete_product()
    {
        $id_product = $_POST['id_product'];

        $this->product_model->delete($id_product);
        echo json_encode("item deleted");
    }

    // End of API endpoint for fetching product data

    // API endpoint for fetching category product data

    public function get_all_category()
    {
        $this->category_model->get_rows();
        $data = $this->category_model->rows;
        echo json_encode($data);
    }

    public function get_category()
    {
        $id_category = $_GET['id_category'];
        $this->category_model->get_row($id_category);
        $data = $this->category_model->row;
        echo json_encode($data);
    }

    public function add_category()
    {
        $this->category_model->name_category = $_POST['name_category'];

        $this->category_model->insert();
        echo json_encode("item added");

    }

    public function update_category()
    {
        $this->category_model->id_category = $_POST['id_category'];
        $this->category_model->name_category = $_POST['name_category'];

        $this->category_model->update();
        echo json_encode("item updated");
    }

    public function delete_category()
    {
        $id_category = $_POST['id_category'];

        $this->category_model->delete($id_category);
        echo json_encode("item deleted");
    }

    // End of API endpoint for fetching category product data

    // API endpoint for fetching transaction data

    public function get_all_transaction()
    {
        $this->transaction_model->get_rows();
        $data = $this->transaction_model->rows;
        echo json_encode($data);
    }

    public function get_transaction()
    {
        $id_transaction = $_GET['id_transaction'];
        $this->transaction_model->get_row($id_transaction);
        $data = $this->transaction_model->row;
        echo json_encode($data);
    }

    public function add_transaction()
    {
        $this->transaction_model->customer_id = $_POST['customer_id'];
        $this->transaction_model->cart_products = $_POST['cart_products'];
        $this->transaction_model->date_transaction = $_POST['date_transaction'];
        $this->transaction_model->total = $_POST['total'];
        $this->transaction_model->is_pay = $_POST['is_pay'];

        $this->transaction_model->insert();
        echo json_encode("item added");

    }

    public function update_transaction()
    {
        $this->transaction_model->id_transaction = $_POST['id_transaction'];
        $this->transaction_model->customer_id = $_POST['customer_id'];
        $this->transaction_model->cart_products = $_POST['cart_products'];
        $this->transaction_model->date_transaction = $_POST['date_transaction'];
        $this->transaction_model->total = $_POST['total'];
        $this->transaction_model->is_pay = $_POST['is_pay'];

        $this->transaction_model->update();
        echo json_encode("item updated");
    }

    public function delete_transaction()
    {
        $id_transaction = $_POST['id_transaction'];

        $this->transaction_model->delete($id_transaction);
        echo json_encode("item deleted");
    }

    // End of API endpoint for fetching transaction data

    // API endpoint for fetching user data

    public function get_all_user()
    {
        $this->user_model->get_rows();
        $data = $this->user_model->rows;
        echo json_encode($data);
    }

    public function get_user()
    {
        $id_user = $_GET['id_user'];
        $this->user_model->get_row($id_user);
        $data = $this->user_model->row;
        echo json_encode($data);
    }

    public function add_user()
    {
        $this->user_model->username = $_POST['username'];

        $this->user_model->insert();
        echo json_encode("item added");

    }

    // End of API endpoint for fetching user data
}
