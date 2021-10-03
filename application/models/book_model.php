<?php
class Book_model extends CI_Model
{
    public $id;
    public $judul;
    public $isbn;
    public $penulis;
    public $penerbit;
    public $tahun_terbit;
    public $halaman;
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
        $sql = sprintf("SELECT * FROM buku WHERE id='%s'", $kode);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM buku ORDER BY id";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO buku(judul, isbn, penulis, penerbit, tahun_terbit, halaman) VALUES('%s', '%s', '%s', '%s', '%s', '%d')",
            $this->judul,
            $this->isbn,
            $this->penulis,
            $this->penerbit,
            $this->tahun_terbit,
            $this->halaman,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE buku SET judul='%s', isbn='%s', penulis='%s', penerbit='%s', tahun_terbit='%s', halaman='%d' WHERE id='%d' ",
            $this->judul,
            $this->isbn,
            $this->penulis,
            $this->penerbit,
            $this->tahun_terbit,
            $this->halaman,
            $this->id
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($kode)
    {
        $sql = sprintf("DELETE FROM buku WHERE id='%s'", $kode);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'judul' => 'judul: ',
            'isbn' => 'isbn: ',
            'penulis' => 'penulis: ',
            'penerbit' => 'penerbit: ',
            'tahun_terbit' => 'tahun_terbit: ',
            'halaman' => 'halaman: ',
        ];
    }
}
