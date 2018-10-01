<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class API extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        // $this->load->database();
        $this->load->model('M_pengajuanperbaikan');
        $this->load->model('M_notifpengajuan');
        $this->load->model('M_user');
        $this->load->library('session');
    }

    public function index_get()
    {
        $this->response("Ok :)", 200);
    }

    public function get_pengajuan_ByUser_get()
    {
        $data = $this->M_notifpengajuan->get_notifpengajuan_byUser($this->session->userdata('id_user'));
        $this->response($data->result(), 200);
    }

    public function get_teknisidetail_get()
    {
        $data = $this->M_notifpengajuan->get_teknisidetail_byStatus();
        $this->response($data->result(), 200);
    }

    public function get_jumNotif_ByUser_get()
    {
        $data = $this->M_notifpengajuan->get_jumNotif_ByUser($this->session->userdata('id_user'));
        $this->response($data, 200);
    }

    public function get_pencarian_get($id_unitKerja)
    {
        $data = $this->M_pengajuanperbaikan->get_pencarian_ByUnitKerja($id_unitKerja);
        $this->response($data->result(), 200);
    }

    // public function get_teknisipengajuan_get($id_pengajuan)
    // {
    //     $data = $this->M_pengajuanperbaikan->get_teknisipengajuan($id_pengajuan);
    //     $this->response($data->result(), 200);
    // }

    public function get_jumpengajuan_byMonth_get()
    {
        $data = $this->M_pengajuanperbaikan->get_jumpengajuan_byMonth();
        $this->response($data->result(), 200);
    }

    public function get_detailpengajuan_byPengajuan_get($id_pengajuan)
    {
        $data = $this->M_pengajuanperbaikan->get_detailpengajuan_byPengajuan($id_pengajuan);
        $this->response($data->result(), 200);
    }

    public function get_detailpengajuan_get($id_pengajuan)
    {
        $data = $this->M_pengajuanperbaikan->get_detailpengajuan($id_pengajuan);
        $this->response($data->result(), 200);
    }

    public function get_notif_get($id_pengajuan)
    {
        $data = $this->M_notifpengajuan->get_notifuser_byPengajuan($id_pengajuan);
        $this->response($data->result(), 200);
    }

    public function get_pengajuan_all_unit_get()
    {
        $data = $this->M_pengajuanperbaikan->get_pengajuan_all_unit();
        $this->response($data->result(), 200);
    }
}
