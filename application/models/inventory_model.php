
<?php
class Inventory_model extends CI_Model
{
    public $id_barang;
    public $nama_barang;
    public $tipe_barang;
    public $ruang;
    public $rows;
    public $row;

    public $labels = [];

    public function __construct()
    {
        parent::__construct();
        // $this->labels = $this->_attributeLabels();
        $this->load->database();
    }

    public function get_row($kode)
    {
        $sql = sprintf("SELECT * FROM barang WHERE id_barang='%s'", $kode);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM barang ORDER BY id_barang";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    // public function search_by_category($category = '')
    // {

    //     if (strlen($category) !== 0) {

    //         $value = $this->$category;

    //         $sql = "SELECT * FROM buku WHERE $category LIKE '%$value%'";

    //         $query = $this->db->query($sql);
    //         $rows = array();
    //         foreach ($query->result() as $row) {
    //             $rows[] = $row;
    //         }

    //         $this->rows = $rows;

    //     } else {
    //         $this->rows = [];
    //     }

    // }

    // public function insert()
    // {
    //     $sql = sprintf("INSERT INTO buku(judul, isbn, penulis, penerbit, tahun_terbit, halaman) VALUES('%s', '%s', '%s', '%s', '%s', '%d')",
    //         $this->judul,
    //         $this->isbn,
    //         $this->penulis,
    //         $this->penerbit,
    //         $this->tahun_terbit,
    //         $this->halaman,
    //     );

    //     $this->db->query($sql);
    // }

    // public function update()
    // {
    //     $sql = sprintf("UPDATE buku SET judul='%s', isbn='%s', penulis='%s', penerbit='%s', tahun_terbit='%s', halaman='%d' WHERE id='%d' ",
    //         $this->judul,
    //         $this->isbn,
    //         $this->penulis,
    //         $this->penerbit,
    //         $this->tahun_terbit,
    //         $this->halaman,
    //         $this->id
    //     );
    //     #echo $sql; exit;

    //     $this->db->query($sql);
    // }

    // public function delete($kode)
    // {
    //     $sql = sprintf("DELETE FROM buku WHERE id='%s'", $kode);
    //     $this->db->query($sql);
    // }

    // public function _attributeLabels()
    // {
    //     return [
    //         'judul' => 'judul: ',
    //         'isbn' => 'isbn: ',
    //         'penulis' => 'penulis: ',
    //         'penerbit' => 'penerbit: ',
    //         'tahun_terbit' => 'tahun_terbit: ',
    //         'halaman' => 'halaman: ',
    //     ];
    // }
}
