<?php
class Coba1 extends CI_Controller {
	
	public function index(){
		echo "Coba1";
	}
	
	public function terima(){
		$nama_barang = $this->uri->segment(3);
		echo $nama_barang;
	}
	
	public function terima2($nama_barang){
		echo $nama_barang;
	}
}
?>