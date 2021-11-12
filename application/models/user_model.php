<?php
class User_model extends CI_Model
{
    public $nim;
    public $nama;
    public $rows;
    public $row;

    public $labels = [];

    public function __construct()
    {
        parent::__construct();
        $this->labels = $this->_attributeLabels();
        $this->load->database();
    }

    public function get_row($kode)
    {
        $sql = sprintf("SELECT * FROM user WHERE nim='%s'", $kode);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM user ORDER BY nim";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

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

    public function _attributeLabels()
    {
        return [
            'nim' => 'nim: ',
            'nama' => 'nama: ',
        ];
    }
}
