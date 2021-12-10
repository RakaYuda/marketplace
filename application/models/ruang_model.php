
<?php
class Ruang_model extends CI_Model
{
    public $id_ruang;
    public $nama_ruang;
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
        $sql = sprintf("SELECT * FROM ruang WHERE id_ruang='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM ruang ORDER BY id_ruang";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO ruang(nama_ruang) VALUES('%s')",
            $this->nama_ruang,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE ruang SET nama_ruang='%s' WHERE id_ruang='%d' ",
            $this->nama_ruang,
            $this->id_barang
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM ruang WHERE id_ruang='%d'", $id);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'id_ruang' => 'id_ruang: ',
            'nama_ruang' => 'nama_ruang: ',
        ];
    }
}
