
<?php
class Book extends CI_Controller
{
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        $this->model = $this->book_model;
    }

    public function index()
    {
        $this->model->get_rows();
        $data = array('model' => $this->model);
        $this->load->view('book/dashboard', $data);
    }

    public function add_book()
    {

        if (isset($_POST['btnSubmit'])) {

            $this->model->judul = $_POST['judul'];
            $this->model->isbn = $_POST['isbn'];
            $this->model->penulis = $_POST['penulis'];
            $this->model->penerbit = $_POST['penerbit'];
            $this->model->tahun_terbit = $_POST['tahun_terbit'];
            $this->model->halaman = $_POST['halaman'];

            $this->model->insert();

            $this->model->get_rows();
            $this->load->view('book/dashboard', ['model' => $this->model]);
        } else {
            $this->load->view('book/form', ['model' => $this->model]);
        }
    }

    public function edit_book()
    {
        $id_book = $this->uri->segment(3);
        $this->model->get_row($id_book);

        $this->load->view('book/form', ['model' => $this->model]);
    }

    public function form_edit_book()
    {

        $this->model->id = $_POST['id'];

        $this->model->judul = $_POST['judul'];
        $this->model->isbn = $_POST['isbn'];
        $this->model->penulis = $_POST['penulis'];
        $this->model->penerbit = $_POST['penerbit'];
        $this->model->tahun_terbit = $_POST['tahun_terbit'];
        $this->model->halaman = $_POST['halaman'];

        $this->model->update();
        redirect('book');
    }

    public function delete_book()
    {
        $id_book = $this->uri->segment(3);
        $this->model->delete($id_book);
        redirect('book');
    }
}
?>