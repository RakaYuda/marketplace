<?php
class Role_model extends CI_Model
{
    public $id_role;
    public $name_role;
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
        $sql = sprintf("SELECT * FROM mp_brand WHERE id_brand='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM mp_brand ORDER BY id_brand";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO mp_brand(name_brand) VALUES('%s')",
            $this->name_brand,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE mp_brand SET name_brand='%s' WHERE id_brand='%d' ",
            $this->name_brand,
            $this->id_brand
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM mp_brand WHERE id_brand='%s'", $id);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'id_brand' => 'id_brand: ',
            'name_brand' => 'name_brand: ',
        ];
    }
}
