
<?php
class User_model extends CI_Model
{
    public $id_user;
    public $username;
    public $password;
    public $name;
    public $email;
    public $address;
    public $role;

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
        $sql = sprintf("SELECT * FROM mp_user WHERE id_user='%s'", $id);

        $query = $this->db->query($sql);
        $this->row = $query->row();
    }

    public function get_rows()
    {
        $sql = "SELECT * FROM mp_user ORDER BY id_user";

        $query = $this->db->query($sql);
        $rows = array();
        foreach ($query->result() as $row) {
            $rows[] = $row;
        }

        $this->rows = $rows;
    }

    public function register($username, $password, $name)
    {
        $data_user = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'email' => '',
            'address' => '',
            'role' => 1,
        );
        $this->db->insert('mp_user', $data_user);
    }

    public function login_user($username, $password)
    {
        $query = $this->db->get_where('mp_user', array('username' => $username));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('nama', $data_user->nama);
                $this->session->set_userdata('is_login', true);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function cek_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('login');
        }
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
    //     $sql = sprintf("INSERT INTO barang(nama_barang, tipe_barang, ruang) VALUES('%s', '%d', '%d')",
    //         $this->nama_barang,
    //         $this->tipe_barang,
    //         $this->ruang,
    //     );

    //     $this->db->query($sql);
    // }

    // public function update()
    // {
    //     $sql = sprintf("UPDATE barang SET nama_barang='%s', tipe_barang='%d', ruang='%d' WHERE id_barang='%d' ",
    //         $this->nama_barang,
    //         $this->tipe_barang,
    //         $this->ruang,
    //         $this->id_barang
    //     );
    //     #echo $sql; exit;

    //     $this->db->query($sql);
    // }

    // public function delete($id)
    // {
    //     $sql = sprintf("DELETE FROM barang WHERE id_barang='%s'", $id);
    //     $this->db->query($sql);
    // }

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
