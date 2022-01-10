<?php
class Category_model extends CI_Model
{
    public $id_category;
    public $name_category;

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
        $sql = sprintf("SELECT * FROM mp_category_product WHERE id_category='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM mp_category_product ORDER BY id_category";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO mp_category_product(name_category) VALUES('%s')",
            $this->name_category,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE mp_category_product SET name_category='%s' WHERE id_category='%d' ",
            $this->name_category,
            $this->id_category
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM mp_category_product WHERE id_category='%s'", $id);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'id_category' => 'id_category: ',
            'name_category' => 'name_category: ',
        ];
    }
}
