  <?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class M_laporanperbaikan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_laporan_all()
    {
        $this->db->select('l.id_laporan as id_laporan, un.namaUnit as UnitKerja, p.permasalahan as Permasalahan, l.laporan as Laporan,p.id_pengajuan, l.Solusi as Solusi, l.waktu as Waktu, us.username as Username');
        $this->db->from('laporanperbaikan l');
        $this->db->join('pengajuanperbaikan p', 'l.id_pengajuan = p.id_pengajuan');
        $this->db->join('unitKerja un', 'p.id_unitKerja = un.id_unitKerja');
        $this->db->join('user us', 'l.id_user = us.id_user');
        $this->db->order_by('l.id_laporan', 'desc');
        return $this->db->get()->result_array();
    }

    public function get_laporanperbaikan($id_laporan)
    {
        // return $this->db->get_where('laporanperbaikan', array('id_laporan'=>$id_laporan))->row_array();

        $this->db->select('id_laporan, jenisPerbaikan, date(Waktu) as tanggal, DATE_FORMAT(Waktu, "%h:%i") as jam, Solusi,laporan ');
        $this->db->from('laporanperbaikan');
        $this->db->where('id_laporan', $id_laporan);
        return $this->db->get()->row_array();
    }


    public function get_laporan_ByUser($iduser)
    {
        $this->db->select('laporan.id_laporan, pengajuan.id_pengajuan, un.namaUnit as UnitKerja, pengajuan.permasalahan,
                laporan.laporan, laporan.solusi, laporan.Waktu, s.status as Status, us.username');
        $this->db->from('laporanperbaikan laporan');
        $this->db->join('pengajuanperbaikan pengajuan', 'laporan.id_pengajuan =pengajuan.id_pengajuan');
        $this->db->join('unitKerja un', 'pengajuan.id_unitKerja = un.id_unitKerja');
        $this->db->join('status s', 'pengajuan.id_status = s.id_status');
        $this->db->join('user us', 'laporan.id_user = us.id_user');
        $this->db->where('laporan.id_user', $iduser);
        $this->db->order_by('laporan.id_laporan ', 'desc');
        return $this->db->get()->result_array();
    }

    public function add_laporanperbaikan($params)
    {
        $this->db->insert('laporanperbaikan', $params);
        return $this->db->insert_id();
    }

    public function get_laporan_byPengajuan($id_pengajuan)
    {
        return $this->db->get_where('laporanperbaikan', array('id_pengajuan'=>$id_pengajuan))->row_array();
    }

    public function update_laporanperbaikan($id_laporan, $params)
    {
        $this->db->where('id_laporan', $id_laporan);
        return $this->db->update('laporanperbaikan', $params);
    }

    public function delete_laporanperbaikan($id_laporan)
    {
        return $this->db->delete('laporanperbaikan', array('id_laporan'=>$id_laporan));
    }

    public function delete_laporan_byPengajuan($id_pengajuan)
    {
        return $this->db->delete('laporanperbaikan', array('id_pengajuan'=>$id_pengajuan));
    }
}
