<?php
class Product_model extends CI_Model
{

    public $id_product;
    public $name_product;
    public $stock_product;
    public $category_product;
    public $brand_product;
    public $image_product;
    public $price_product;

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
        $sql = sprintf("SELECT * FROM mp_product WHERE id_product='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM mp_product ORDER BY id_product";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO mp_product(name_product,stock_product ,category_product ,brand_product ,image_product ,price_product) VALUES('%s', '%s', '%s', '%s', '%s', '%s')",
            $this->name_product,
            $this->stock_product,
            $this->category_product,
            $this->brand_product,
            $this->image_product,
            $this->price_product,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE mp_product SET name_product='%s', stock_product='%s', category_product='%s', brand_product='%s', image_product='%s', price_product='%s' WHERE id_product='%d' ",
            $this->name_product,
            $this->stock_product,
            $this->category_product,
            $this->brand_product,
            $this->image_product,
            $this->price_product,
            $this->id_product
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM mp_product WHERE id_product='%s'", $id);
        $this->db->query($sql);
    }

    public function _attributeLabels()
    {
        return [
            'id_product' => 'id_product: ',
            'name_product' => 'name_product: ',
            'stock_product' => 'stock_product: ',
            'category_product' => 'category_product: ',
            'brand_product' => 'brand_product: ',
            'image_product' => 'image_product: ',
            'price_product' => 'price_product: ',

        ];
    }
}
