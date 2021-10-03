<?php
class Coba extends CI_Controller {
	
	public function index(){
		$nama_barang = 'Buku';
		redirect('coba1/terima/'.$nama_barang);
	}
	
	public function kedua(){
		$nama_barang = 'Buku';
		redirect('coba1/terima2/'.$nama_barang);
	}
	
	
}
?>