<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 * Project Created By
 * Hanif R 
 */

class C_pengajuanperbaikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengajuanperbaikan');
        $this->load->model('M_laporanperbaikan');
        $this->load->model('M_user');
        $this->load->model('M_notifpengajuan');

        $this->load->library('session');        
        if ($this->session->userdata('username')) {
        } else {
            redirect('C_User');
        }
    }

    /*
     * Listing of pengajuanperbaikan
     */
    public function index()
    {
        if ($this->session->userdata('tipe_user')=='Admin') {
            $data['all_pengajuan'] = $this->M_pengajuanperbaikan->get_pengajuan_all();
            $data['_view'] = 'pengajuan/admin';
            $this->load->view('layouts/main', $data);
        } else {
            $data['all_pengajuan'] = $this->M_pengajuanperbaikan->get_pengajuan_all();
            $data['_view'] = 'pengajuan/teknisi';
            $this->load->view('layouts/main', $data);            
        }
    }
        
    public function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_unitKerja' => $this->input->post('id_unitKerja'),
                'id_status' => 1,
                'id_user' => $this->session->userdata('id_user'),
                'permasalahan' => $this->input->post('permasalahan'),
                'waktu' => $this->input->post('waktu')
            );
            $pengajuanperbaikan_id = $this->M_pengajuanperbaikan->add_pengajuanperbaikan($params);

            $this->load->model('M_user');
            $params2 = array();            
            foreach ($this->input->post('teknisi[]') as $teknisi) {
                $params2[]= array(
                'id_pengajuan' => $pengajuanperbaikan_id,
                'id_user' => $teknisi,
                'StatusNotif' => 'No'
              );
            }
            $notifpengajuan_id = $this->M_notifpengajuan->add_notifpengajuan($params2);
            $this->session->set_flashdata('msg-insert', 'berhasil');
            redirect('C_pengajuanperbaikan/index');
        } else {
            $data['all_unitkerja'] = $this->M_pengajuanperbaikan->get_all_unitkerja();
            $data['all_teknisi'] = $this->M_notifpengajuan->get_teknisidetail_byStatus();
            $this->load->view('pengajuan/add', $data);
        }
    }    

    public function edit($id_pengajuan)
    {
        $data['pengajuanperbaikan'] = $this->M_pengajuanperbaikan->get_pengajuanperbaikan($id_pengajuan);

        if (isset($data['pengajuanperbaikan']['id_pengajuan'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'id_unitKerja' => $this->input->post('id_unitKerja'),
                    'id_status' => $this->input->post('id_status'),
                    'permasalahan' => $this->input->post('permasalahan'),
                    'waktu' => $this->input->post('tanggal').' '.$this->input->post('jam'),
                );

                $this->M_pengajuanperbaikan->update_pengajuanperbaikan($id_pengajuan, $params);

                $this->load->model('M_user');

                for ($i=0; $i <= count($this->input->post('id_teknisi[]')); $i++) {
                    $params2[]= array(
                  'id_notif' => $this->input->post('id_notif['.$i.']'),
                  'id_user' => $this->input->post('id_teknisi['.$i.']')
                );
                }
                $notifpengajuan_id = $this->M_notifpengajuan->edit_notifpengajuan($params2);
                
                $cek = $this->input->post('id_nonteknisi[]');
                if ($cek[0] != '') {
                    foreach ($this->input->post('id_nonteknisi[]') as $teknisi) {
                        $params3[]= array(
                      'id_pengajuan' => $id_pengajuan,
                      'id_user' => $teknisi
                    );
                    }
                    $notifpengajuan_id = $this->M_notifpengajuan->add_notifpengajuan($params3);
                }
                $this->session->set_flashdata('msg-update-berhasil', 'berhasil');
                redirect('c_pengajuanperbaikan/index');
            } else {
                $data['all_unitkerja'] = $this->M_pengajuanperbaikan->get_all_unitkerja();
                $data['all_status'] = $this->M_pengajuanperbaikan->get_all_status();                
                $data['all_teknisi'] = $this->M_notifpengajuan->get_teknisi($id_pengajuan);
                $data['all_user'] = $this->M_user->get_user_exadmin();
                $data['all_nonteknisi'] = $this->M_notifpengajuan->get_teknisidetail_byStatus();

                $this->load->view('pengajuan/edit', $data);
            }
        } else {
            show_error('The pengajuanperbaikan you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting pengajuanperbaikan
     */
    public function delpengajuan($id_pengajuan)
    {
        if (isset($_POST) && count($_POST) > 0) {
            $pengajuanperbaikan = $this->M_pengajuanperbaikan->get_pengajuanperbaikan($id_pengajuan);
            $laporanperbaikan = $this->M_laporanperbaikan->get_laporan_byPengajuan($id_pengajuan);
            $notifpengajuan = $this->M_notifpengajuan->get_notifuser_byPengajuan($id_pengajuan);

            // check if the pengajuanperbaikan exists before trying to delete it
            if (isset($pengajuanperbaikan['id_pengajuan'])) {
                if (isset($laporanperbaikan['id_pengajuan'])) {
                    $this->M_laporanperbaikan->delete_laporan_byPengajuan($id_pengajuan);
                }
                if (isset($notifpengajuan['id_pengajuan'])) {
                    $this->M_notifpengajuan->delete_notifikasi_byPengajuan($id_pengajuan);
                }

                $this->M_pengajuanperbaikan->delete_pengajuanperbaikan($id_pengajuan);
                $this->session->set_flashdata('msg-del', 'berhasil');
                redirect('c_pengajuanperbaikan/index');
            } else {
                echo "data pengajuan tidak ditemukan";
            }
        } else {
            $data["url_del"] = base_url()."C_pengajuanperbaikan/delpengajuan/".$this->input->get('id_delete');
            $data["id_delete"] = $this->input->get('id_delete');
            $this->load->view('layouts/delete', $data);
        }
    }

    public function delteknisi($id_notif)
    {
        if (isset($_POST) && count($_POST) > 0) {
            $this->load->model('M_laporanperbaikan');

            $notif = $this->M_notifpengajuan->get_notif($id_notif);
            $laporanperbaikan = $this->M_laporanperbaikan->get_laporan_byPengajuan($notif['id_pengajuan']);
            $id_pengajuan = $notif['id_pengajuan'];
            // check if the pengajuanperbaikan exists before trying to delete it
            if (isset($notif['id_notif'])) {
                if (isset($laporanperbaikan['id_pengajuan'])) {
                    $this->M_laporanperbaikan->delete_laporan_byPengajuan($id_pengajuan);
                }
                $this->M_notifpengajuan->delete_teknisi($id_notif);
                $this->session->set_flashdata('msg-del', 'berhasil');
                redirect('C_pengajuanperbaikan/index');
            } else {
                show_error('The pengajuanperbaikan you are trying to delete does not exist.');
            }
        } else {
            // $data["url_del"] = base_url()."C_pengajuanperbaikan/delteknisi/".$this->input->post('id_delete');
            // $this->session->set_flashdata('msg-del', 'berhasil');
            // $this->load->view('layouts/delete', $data);

            $data["url_del"] = base_url()."C_pengajuanperbaikan/delteknisi/".$this->input->get('id_delete');
            $data["id_del"] = $this->input->get('id_delete');
            $this->load->view('layouts/delete-teknisi', $data);
        }
    }

    public function dashboard()
    {
        $data['baru']=$this->M_pengajuanperbaikan->get_jumpengajuan_byStatus(1);
        $data['sedang']=$this->M_pengajuanperbaikan->get_jumpengajuan_byStatus(2);
        $data['selesai']=$this->M_pengajuanperbaikan->get_jumpengajuan_byStatus(3);
        $data['all_pengajuan'] = $this->M_pengajuanperbaikan->get_pengajuan_all();

        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);
    }

    public function detail($id_pengajuan)
    {
        $data['id_pengajuan'] = $id_pengajuan;        
        $data['all_teknisi'] = $this->M_notifpengajuan->get_teknisi($id_pengajuan);
        $data['detail_pengajuan'] = $this->M_pengajuanperbaikan->get_pengajuanperbaikan($id_pengajuan);
        $this->load->view('layouts/detail', $data);
    }

    public function datapengajuan_Byuser()
    {
        $arr = $this->M_pengajuanperbaikan->$this->M_pengajuanperbaikan->get_pengajuan_all();
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

    public function teknisipengajuan($id_pengajuan)
    {
        $arr = $this->M_pengajuanperbaikan->get_teknisipengajuan($id_pengajuan);
        header('Content-Type: application/json');
        echo json_encode($arr);
    }

    public function tes()
    {
        // $data['all_pengajuan'] = $this->M_pengajuanperbaikan->get_pengajuan_all();
        $data['all_teknisi'] = $this->M_notifpengajuan->get_teknisidetail_byStatus();
        $data['all_unitkerja'] = $this->M_pengajuanperbaikan->get_all_unitkerja();
        $data['_view'] = 'tes';
        $this->load->view('layouts/main', $data);
    }

    public function tesinput()
    {
        $data['all_teknisi'] = $this->input->post('teknisi[]');
        foreach ($data['all_teknisi'] as $key) {
            echo $key;
            echo "<br>";
        }
    }

    public function cek()
    {
        $this->load->model('M_user');
        $data['all_teknisi'] = $this->M_user->get_all_user();
        $this->load->view('cek', $data);
    }
}
