<?php 
    class Pengembalian_Controller extends CI_Controller{
        
        function __construct(){
            parent:: __construct(); 
            $this->load->model('model_inventaris');

        }

        function hello(){
            $page=$this->uri->segment(3);
            if(empty($page)){
                $page='home';
            }
            $data['page']=$page;
            if($page=='pengembalian'){
                $data['open']='Pengembalian_Controller/simpan';

                $this->load->view('index',$data);
            }
        }


        public function cari()
        {
            $id=$this->input->post("cari_id");
            $data=array(
                        'tampil_pinjam'=> $this->db->query("SELECT peminjaman.* FROM peminjaman WHERE id_peminjaman='$id'")->result(),
                    );
            $this->load->view("content/tabel_kembali",$data);
        }


        public function cari_kembali()
        {
            $lol=$this->db->query("SELECT * FROM detail_pinjam WHERE id_peminjaman='PNJM-012'");
            $lol->row_array();
            foreach ($lol->result() as $data) {
                $cari=$this->db->query("SELECT * FROM inventaris WHERE id_inventaris='$data->id_inventaris'")->row_array();
                $id['id_inventaris']=$data->id_inventaris;
                $data=array(
                    'jumlah'=>intval($cari['jumlah']+$data->jumlah_pinjam),
                );
                $this->db->update("inventaris",$data,$id);
            }
        }

}