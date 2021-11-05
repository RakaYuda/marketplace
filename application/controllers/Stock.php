
<?php
class Stock extends CI_Controller
{
    public $model;
    public $categories;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->model = $this->book_model;
        $this->categories = [
            'judul',
            'isbn',
            'penulis',
            'penerbit',
            'tahun_terbit',
            'halaman',
        ];
    }

    public function index()
    {
        $this->model->get_rows();
        $data = array('model' => $this->model);
        $data['categories'] = $this->categories;
        $this->load->view('stock/dashboard', $data);
    }

    public function get_all_barang()
    {
        $this->model->get_rows();
        $data = $this->model->rows;
        echo json_encode($data);
    }

    public function get_barang()
    {
        $id_book = $_GET['id_buku'];
        $this->model->get_row($id_book);
        $data = $this->model->row;
        echo json_encode($data);
    }

    public function add_barang()
    {
        $this->model->judul = $_POST['judul'];
        $this->model->isbn = $_POST['isbn'];
        $this->model->penulis = $_POST['penulis'];
        $this->model->penerbit = $_POST['penerbit'];
        $this->model->tahun_terbit = $_POST['tahun_terbit'];
        $this->model->halaman = $_POST['halaman'];

        $this->model->insert();
        echo json_encode("item added");

    }

    public function update_barang()
    {
        $this->model->id = $_POST['id'];
        $this->model->judul = $_POST['judul'];
        $this->model->isbn = $_POST['isbn'];
        $this->model->penulis = $_POST['penulis'];
        $this->model->penerbit = $_POST['penerbit'];
        $this->model->tahun_terbit = $_POST['tahun_terbit'];
        $this->model->halaman = $_POST['halaman'];

        $this->model->update();
        echo json_encode("item updated");
    }

    public function delete_barang()
    {
        $id_book = $_POST['id_buku'];
        $this->model->delete($id_book);
        echo json_encode("item deleted");
    }

    public function search_book()
    {
        $category = $_POST['search-category'];

        $this->model->$category = $_POST['search-value'];
        $this->model->search_by_category($category);
        $data = array('model' => $this->model);
        $data['categories'] = $this->categories;
        $data['category'] = $_POST['search-category'];
        $data['value'] = $_POST['search-value'];
        $this->load->view('book/dashboard', $data);
    }
}
?>