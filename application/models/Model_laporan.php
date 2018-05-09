<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model{

    public function create($nrp,$latitude,$longitude,$pukul,$apa,$bgmn,$brgbkt,$tindakan,$tgl){
        $data = array('nrp' => $nrp,
        'latitude'=>$latitude,
        'longitude'=>$longitude
        'pukul'=>$pukul
        'apa'=>$apa
        'bagaimana'=>$bgmn
        'barang_bukti'=>$brgbkt
        'tindakan'=>$tindakan
        'tanggal'=>$tgl);
        $query = $this->db->insert('laporan', $data);
        return $query;
    }
    public function getAll(){
        $this->db->select('*');//kita akan mengambil semua data
        $this->db->from('laporan');
        $this->db->join('personil', 'personil.nrp = laporan.nrp');//kita join personil dengan foreign key nrp
        $query = $this->db->get();
        return $query;
    }
    public function read($id){
        $this->db->select('*');//kita akan mengambil semua data
        $this->db->from('laporan');
        $this->db->join('tbl_jalan', 'personil.nrp = laporan.nrp');//kita join personil dengan foreign key nrp
        $this->db->where('no_laporan', $no);
        $query = $this->db->get();
        return $query;
    }
    public function update($nrp,$latitude,$longitude,$pukul,$apa,$bgmn,$brgbkt,$tindakan,$tgl,$no){
        $data = array('nrp' => $nrp,
        'latitude'=>$latitude,
        'longitude'=>$longitude
        'pukul'=>$pukul
        'apa'=>$apa
        'bagaimana'=>$bgmn
        'barang_bukti'=>$brgbkt
        'tindakan'=>$tindakan
        'tanggal'=>$tgl);
        $this->db->where('no_laporan', $no);
        $query = $this->db->update('lapor',$data);
        return $query;
    }
    public function delete($id){
        $this->db->where('no_laporan', $no);
        $query = $this->db->delete('laporan');
        return $query;
    }

}