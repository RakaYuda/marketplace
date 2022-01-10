
<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require_once APPPATH . 'Api.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends CI_Controller
{

    public $transaction_model;

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');
        $this->load->library('print_pdf');

        $this->load->model('transaction/transaction_model');

        $this->transaction_model = $this->transaction_model;

    }

    public function index()
    {
        $data['title_page'] = 'Admin';
        // $data['']
        $this->load->view('layout/admin-layout', $data);
    }

    public function brands()
    {
        $data['title_page'] = 'Brands';
        $data['main_content'] = $this->load->view('admin/brand', null, true);
        $data['script'] = $this->load->view('script/admin/brand', null, true);
        $this->load->view('layout/admin-layout', $data);
    }

    public function categories()
    {
        $data['title_page'] = 'Categories';
        $data['main_content'] = $this->load->view('admin/category', null, true);
        $data['script'] = $this->load->view('script/admin/category', null, true);
        $this->load->view('layout/admin-layout', $data);
    }

    public function products()
    {
        $data['title_page'] = 'Admin - Products';
        $data['main_content'] = $this->load->view('admin/product', null, true);
        $data['script'] = $this->load->view('script/admin/product', null, true);
        $this->load->view('layout/admin-layout', $data);
    }

    public function transactions()
    {
        // $data['chart'] = a
        $data_chart = $this->chart();

        $data['chart'] = $data_chart['chart'];
        $data['title_page'] = 'Admin - Transactions';
        $data['main_content'] = $this->load->view('admin/transaction', null, true);
        $data['script'] = $this->load->view('script/admin/transaction', $data_chart, true);
        $this->load->view('layout/admin-layout', $data);
    }

    public function chart()
    {
        $data_daily = $this->transaction_model->get_data_chart_daily();
        $data_monthly = $this->transaction_model->get_data_chart_monthly();
        // $data_transaction = $this->transaction_model->rows;

        $data['chart'] = [
            'daily' => [
                'label' => [],
                'value' => [],
            ],
            'monthly' => [
                'label' => [],
                'value' => [],
            ],
        ];

        foreach ($data_daily as $item) {
            array_push($data['chart']['daily']['label'], 'Date ' . $item->DATE);
            array_push($data['chart']['daily']['value'], $item->COUNT);
        }

        foreach ($data_monthly as $item) {
            array_push($data['chart']['monthly']['label'], 'Month ' . $item->MONTH . '-' . $item->YEAR);
            array_push($data['chart']['monthly']['value'], $item->COUNT);
        }

        return $data;
        // var_dump($data);
        // exit;
    }

    public function invoice($id_transaction = 0)
    {
        $this->transaction_model->get_row($id_transaction);
        $data_transaction = $this->transaction_model->row;

        error_reporting(0);

        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(0, 7, 'Invoice Marketplace', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(30, 6, 'ID Transaction', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Customer ID', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Cart Products', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Date Transaction', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Total', 1, 1, 'C');

        // $this->barang_model->get_rows();
        // $data_barang = $this->barang_model->rows;

        $pdf->SetFont('Arial', '', 10);

        $no = 0;
        // foreach ($data_transaction as $row) {
        // $this->tipe_barang_model->get_row($row->tipe_barang);
        // $tipe = $this->tipe_barang_model->row->nama_tipe;

        // $this->ruang_model->get_row($row->ruang);
        // $ruang = $this->ruang_model->row->nama_ruang;

        $no++;
        $pdf->Cell(10, 6, $no, 1, 0, 'C');
        $pdf->Cell(30, 6, $data_transaction->id_transaction, 1, 0);
        $pdf->Cell(30, 6, $data_transaction->customer_id, 1, 0);
        $pdf->Cell(30, 6, $data_transaction->cart_products, 1, 0);
        $pdf->Cell(40, 6, $data_transaction->date_transaction, 1, 0);
        $pdf->Cell(50, 6, '$ ' . $data_transaction->total, 1, 1);
        // }
        $pdf->Output();
    }

    public function report($group_by = 'daily')
    {

        if ($group_by == 'daily') {
            $this->transaction_model->get_data_daily();
            $data_transaction = $this->transaction_model->rows;
        } else {
            $this->transaction_model->get_data_monthly();
            $data_transaction = $this->transaction_model->rows;
        }
        // var_dump($data_transaction);

        // exit;

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
        $sheet->setCellValue('A1', "Report Transaction " . ucfirst($group_by)); // Set kolom A1 dengan tulisan "DATA SISWA"
        $sheet->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        // Buat header tabel nya pada baris ke 3
        $sheet->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
        $sheet->setCellValue('B3', "ID Transaction"); // Set kolom B3 dengan tulisan "NIS"
        $sheet->setCellValue('C3', "Cart Products"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('D3', "Date Transaction"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('E3', "Total"); // Set kolom C3 dengan tulisan "NAMA"
        $sheet->setCellValue('F3', "Is Pay"); // Set kolom C3 dengan tulisan "NAMA"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);
        $sheet->getStyle('F3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
        $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

        foreach ($data_transaction as $data) { // Lakukan looping pada variabel siswa

            $sheet->setCellValue('A' . $numrow, $no);
            $sheet->setCellValue('B' . $numrow, $data->id_transaction);
            $sheet->setCellValue('C' . $numrow, $data->cart_products);
            $sheet->setCellValue('D' . $numrow, $data->date_transaction);
            $sheet->setCellValue('E' . $numrow, $data->total);
            $sheet->setCellValue('F' . $numrow, $data->is_pay);
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('F' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $sheet->getColumnDimension('B')->setWidth(10); // Set width kolom B
        $sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $sheet->getColumnDimension('D')->setWidth(20); // Set width kolom C
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20); // Set width kolom C

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya

        $sheet->setTitle("Report " . ucfirst($group_by));

        // Proses file excel
        ob_end_clean();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Report ' . ucfirst($group_by) . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    // public function proses()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     if ($this->auth->login_user($username, $password)) {
    //         redirect('home');
    //     } else {
    //         $this->session->set_flashdata('error', 'Username & Password salah');
    //         redirect('login');
    //     }
    // }

    // public function logout()
    // {
    //     $this->session->unset_userdata('username');
    //     $this->session->unset_userdata('nama');
    //     $this->session->unset_userdata('is_login');
    //     redirect('login');
    // }

}