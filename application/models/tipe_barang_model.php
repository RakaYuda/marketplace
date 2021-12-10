
<?php
class Tipe_barang_model extends CI_Model
{
    public $id_tipe_barang;
    public $nama_tipe;
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
        $sql = sprintf("SELECT * FROM tipe_barang WHERE id_tipe_barang='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM tipe_barang ORDER BY id_tipe_barang";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO tipe_barang(nama_tipe) VALUES('%s')",
            $this->nama_tipe,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE tipe_barang SET nama_tipe='%s' WHERE id_tipe_barang='%d' ",
            $this->nama_ruanama_tipeng,
            $this->id_tipe_barang
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM tipe_barang WHERE id_tipe_barang='%d'", $id);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'id_tipe_barang' => 'id_tipe_barang: ',
            'nama_tipe' => 'nama_tipe: ',
        ];
    }
}
