<?php
class Transaction_model extends CI_Model
{

    public $id_transaction;
    public $customer_id;
    public $cart_products;
    public $date_transaction;
    public $total;
    public $is_pay;

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
        $sql = sprintf("SELECT * FROM mp_transaction WHERE id_transaction='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM mp_transaction ORDER BY id_transaction";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function insert()
    {
        $sql = sprintf("INSERT INTO mp_transaction(customer_id, cart_products, date_transaction, total, is_pay) VALUES('%s', '%s', '%s', '%s', '%s')",
            $this->customer_id,
            $this->cart_products,
            $this->date_transaction,
            $this->total,
            $this->is_pay,
        );

        $this->db->query($sql);
    }

    public function update()
    {
        $sql = sprintf("UPDATE mp_transaction SET customer_id='%s', cart_products='%s', date_transaction='%s', total='%s', is_pay='%s' WHERE id_transaction='%d' ",
            $this->customer_id,
            $this->cart_products,
            $this->date_transaction,
            $this->total,
            $this->is_pay,
            $this->id_transaction,
        );
        #echo $sql; exit;

        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = sprintf("DELETE FROM mp_transaction WHERE id_transaction='%s'", $id);
        $this->db->query($sql);
    }

    public function get_data_monthly()
    {
        $sql = sprintf("SELECT * FROM mp_transaction WHERE MONTH(date_transaction) = MONTH(CURRENT_DATE()) AND YEAR(date_transaction) = YEAR(CURRENT_DATE())");

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function get_data_daily()
    {
        $sql = sprintf("SELECT * FROM mp_transaction WHERE date_transaction = CURRENT_DATE()");

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function get_data_chart_daily()
    {
        $sql = sprintf("SELECT count(id_transaction) as COUNT, DAY(date_transaction) as DATE FROM mp_transaction WHERE MONTH(date_transaction) = MONTH(CURRENT_DATE()) AND YEAR(date_transaction) = YEAR(CURRENT_DATE()) GROUP BY DAY(date_transaction)");

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function get_data_chart_monthly()
    {
        $sql = sprintf("SELECT COUNT(id_transaction) as COUNT, MONTH(date_transaction) as MONTH, YEAR(date_transaction) as YEAR FROM mp_transaction GROUP BY MONTH(date_transaction), YEAR(date_transaction) ORDER BY YEAR(date_transaction) ASC");

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function _attributeLabels()
    {
        return [
            'id_transaction' => 'id_transaction: ',
            'customer_id' => 'customer_id: ',
            'cart_products' => 'cart_products: ',
            'date_transaction' => 'date_transaction: ',
            'total' => 'total: ',
            'is_pay' => 'is_pay: ',
        ];
    }
}
