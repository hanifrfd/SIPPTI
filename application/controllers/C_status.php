<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */

class C_status extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_status');
        $this->load->library('session');
        
        if ($this->session->userdata('username')) {
        } else {
            redirect('C_User');
        }
    }

    /*
     * Listing of statuss
     */
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('status/index?');
        $config['total_rows'] = $this->M_status->get_all_statuss_count();
        $this->pagination->initialize($config);

        $data['statuss'] = $this->M_status->get_all_statuss($params);

        $data['_view'] = 'statu/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new status
     */
    public function add()
    {
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'status' => $this->input->post('status'),
                'keterangan' => $this->input->post('keterangan'),
            );

            $status_id = $this->M_status->add_status($params);
            redirect('c_status/index');
        } else {
            $data['_view'] = 'statu/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a status
     */
    public function edit($id_status)
    {
        // check if the status exists before trying to edit it
        $data['status'] = $this->M_status->get_status($id_status);

        if (isset($data['status']['id_status'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'status' => $this->input->post('status'),
                    'keterangan' => $this->input->post('keterangan'),
                );

                $this->M_status->update_status($id_status, $params);
                redirect('c_status/index');
            } else {
                $data['_view'] = 'statu/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The status you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting status
     */
    public function remove($id_status)
    {
        $status = $this->M_status->get_status($id_status);

        // check if the status exists before trying to delete it
        if (isset($status['id_status'])) {
            $this->M_status->delete_status($id_status);
            redirect('c_status/index');
        } else {
            show_error('The status you are trying to delete does not exist.');
        }
    }
}