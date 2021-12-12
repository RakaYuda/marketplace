
<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Inventory extends CI_Controller
{

    public $barang_model;
    public $ruang_model;
    public $tipe_barang_model;
    public $categories;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('print_pdf');

        $this->load->model('barang_model');
        $this->load->model('ruang_model');
        $this->load->model('tipe_barang_model');

        $this->barang_model = $this->barang_model;
        $this->ruang_model = $this->ruang_model;
        $this->tipe_barang_model = $this->tipe_barang_model;

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
        $this->barang_model->get_rows();
        $data = array('model' => $this->barang_model);
        // $data['categories'] = $this->categories;
        $this->load->view('storage/index');
    }

    public function storage()
    {
        $this->barang_model->get_rows();
        $this->ruang_model->get_rows();
        $this->tipe_barang_model->get_rows();
        $data = [
            'model' => $this->barang_model->rows,
            'ruang' => $this->ruang_model->rows,
            'tipe' => $this->tipe_barang_model->rows,
        ];
        $this->load->view('storage/storage', $data);
    }

    public function chart()
    {
        $data_tipe_count = $this->barang_model->get_count_by_tipe();
        $data_ruang_count = $this->barang_model->get_count_by_ruang();

        $data_pie_chart = (object) [
            'label' => array_map(function ($data) {
                return $data->nama_tipe;
            }, $data_tipe_count),
            'value' => array_map(function ($data) {
                return $data->count;
            }, $data_tipe_count),
        ];

        $data_bar_chart = (object) [
            'label' => array_map(function ($data) {
                return $data->nama_ruang;
            }, $data_ruang_count),
            'value' => array_map(function ($data) {
                return $data->count;
            }, $data_ruang_count),
        ];

        $data = (object) [
            'count' => (object) [
                'tipe' => $data_tipe_count,
                'ruang' => $data_ruang_count,
            ],
            'chart' => (object) [
                'tipe' => $data_pie_chart,
                'ruang' => $data_bar_chart,
            ],
        ];

        // var_dump($data);
        // exit;

        $this->load->view('storage/chart', $data);
    }

    public function storage_view()
    {
        $this->load->view('storage/dashboard');
    }

    public function get_all_tipe()
    {
        $this->load->model('tipe_barang_model');
        $this->tipe_barang_model->get_rows();
        $data = $this->tipe_barang_model->rows;
        echo json_encode($data);
    }

    public function get_all_ruang()
    {
        $this->load->model('ruang_model');
        $this->ruang_model->get_rows();
        $data = $this->ruang_model->rows;
        echo json_encode($data);
    }

    public function get_all_barang()
    {
        $this->barang_model->get_rows();
        $data = $this->barang_model->rows;
        echo json_encode($data);
    }

    public function get_barang()
    {
        $id_barang = $_GET['id_barang'];
        $this->barang_model->get_row($id_barang);
        $data = $this->barang_model->row;
        echo json_encode($data);
    }

    public function add_barang()
    {
        $this->barang_model->nama_barang = $_POST['nama_barang'];
        $this->barang_model->tipe_barang = $_POST['tipe_barang'];
        $this->barang_model->ruang = $_POST['ruang'];

        $this->barang_model->insert();
        echo json_encode("item added");

    }

    public function update_barang()
    {
        $this->barang_model->id_barang = $_POST['id_barang'];
        $this->barang_model->nama_barang = $_POST['nama_barang'];
        $this->barang_model->tipe_barang = $_POST['tipe_barang'];
        $this->barang_model->ruang = $_POST['ruang'];

        $this->barang_model->update();
        echo json_encode("item updated");
    }

    public function delete_barang()
    {
        $id_barang = $_POST['id_barang'];

        $this->barang_model->delete($id_barang);
        echo json_encode("item deleted");
    }

    // public function search_book()
    // {
    //     $category = $_POST['search-category'];

    //     $this->barang_model->$category = $_POST['search-value'];
    //     $this->barang_model->search_by_category($category);
    //     $data = array('model' => $this->model);
    //     $data['categories'] = $this->categories;
    //     $data['category'] = $_POST['search-category'];
    //     $data['value'] = $_POST['search-value'];
    //     $this->load->view('book/dashboard', $data);
    // }

    public function print_pdf()
    {
        error_reporting(0);

        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(0, 7, 'Daftar Barang Gedung Kampus', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(20, 6, 'ID Barang', 1, 0, 'C');
        $pdf->Cell(100, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tipe Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Ruang', 1, 1, 'C');

        $this->barang_model->get_rows();
        $data_barang = $this->barang_model->rows;

        $pdf->SetFont('Arial', '', 10);

        $no = 0;
        foreach ($data_barang as $row) {
            $this->tipe_barang_model->get_row($row->tipe_barang);
            $tipe = $this->tipe_barang_model->row->nama_tipe;

            $this->ruang_model->get_row($row->ruang);
            $ruang = $this->ruang_model->row->nama_ruang;

            $no++;
            $pdf->Cell(10, 6, $no, 1, 0, 'C');
            $pdf->Cell(20, 6, $row->id_barang, 1, 0);
            $pdf->Cell(100, 6, $row->nama_barang, 1, 0);
            $pdf->Cell(30, 6, $tipe, 1, 0);
            $pdf->Cell(30, 6, $ruang, 1, 1);
        }
        $pdf->Output();
    }

    public function export_excel()
    {
        // echo "exit";
        // exit;
        // $mahasiswa = json_decode($this->get_all_user());

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = [
            'font' => ['bold' => true], // Set font nya jadi bold
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border right dengan garis tipis
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border left dengan garis tipis
            ],
        ];
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Set text jadi di tengah secara vertical (middle)
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border right dengan garis tipis
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border left dengan garis tipis
            ],
        ];
        $sheet->setCellValue('A1', "Daftar Barang Gedung Kampus"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "ID Barang"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "Nama Barang"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "Tipe Barang"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('E3', "Ruang"); // Set kolom C3 dengan tulisan "NAMA"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

        $this->barang_model->get_rows();
        $data_barang = $this->barang_model->rows;

        foreach ($data_barang as $data) { // Lakukan looping pada variabel siswa

            $this->tipe_barang_model->get_row($data->tipe_barang);
            $tipe = $this->tipe_barang_model->row->nama_tipe;

            $this->ruang_model->get_row($data->ruang);
            $ruang = $this->ruang_model->row->nama_ruang;

            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->id_barang);
            $sheet->setCellValue('C' . $numrow, $data->nama_barang);
            $sheet->setCellValue('D' . $numrow, $tipe);
            $sheet->setCellValue('E' . $numrow, $ruang);
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(10); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom C
        $sheet->getColumnDimension('E')->setWidth(20); // Set width kolom C

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $sheet->setTitle("Daftar Barang Kampus");
        // Proses file excel
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Daftar Barang Kampus.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
?>