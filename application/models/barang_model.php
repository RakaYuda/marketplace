
<?php
class Barang_model extends CI_Model
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
        $this->labels = $this->_attributeLabels();
        $this->load->database();
    }

    public function get_row($id)
    {
        $sql = sprintf("SELECT * FROM barang WHERE id_barang='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_count_by_tipe()
    {
        $sql = sprintf("SELECT b.nama_tipe, COUNT(1) as count FROM barang a INNER JOIN tipe_barang b ON b.id_tipe_barang = a.tipe_barang GROUP BY tipe_barang");

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_count_by_ruang()
    {
        $sql = sprintf("SELECT b.nama_ruang, COUNT(1) as count FROM barang a INNER JOIN ruang b ON b.id_ruang = a.ruang GROUP BY ruang");

        $query = $this->db->query($sql);
        return $query->result();
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

    public function insert()
    {
        $sql = sprintf("INSERT INTO barang(nama_barang, tipe_barang, ruang) VALUES('%s', '%d', '%d')",
            $this->nama_barang,
            $this->tipe_barang,
            $this->ruang,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE barang SET nama_barang='%s', tipe_barang='%d', ruang='%d' WHERE id_barang='%d' ",
            $this->nama_barang,
            $this->tipe_barang,
            $this->ruang,
            $this->id_barang
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM barang WHERE id_barang='%s'", $id);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'id_barang' => 'id_barang: ',
            'nama_barang' => 'nama_barang: ',
            'tipe_barang' => 'tipe_barang: ',
            'ruang' => 'ruang: ',
        ];
    }
}
