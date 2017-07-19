<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        error_reporting(0);

        if ($this->session->userdata('admin') == '') {
            echo "<script> window.location.assign('" . base_url() . "login?ReturnUrl=" . $_SERVER['REQUEST_URI'] . "');</script>";
        }
        $this->load->helper('array');
        $this->load->model('client_model');
        $this->load->library('resize');
        $this->menu = 'Client';
    }

	public function index()
	{
        $data['menu'] = $this->menu;
		$data['q'] = $this->client_model->all();
		$this->load->view('template/left');
		$this->load->view('client',$data);
	}

    public function create()
    {

        $coverImage = null;
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/content/";
            $coverImage = date("His").'-'.$_FILES['coverimg']['name'];
            $this->upload($destination,$coverImage,'coverimg');
        }

        $data = array(
            'name' => $this->input->post('name') ,
            'img' => $coverImage,
            'url' => $this->input->post('url') ,
            'create_date' => date("Y-m-d H:i:s"),
            'create_by' => $this->session->userdata('admin'),
            'enable' => '1');

        $this->client_model->insert($data);

        echo "<script>window.location.assign('".base_url()."client');</script>";
    }

    public function update()
    {
        $coverImage = $this->input->post('oldCoverImg');
        if($_FILES['coverimg']['name']) //check file upload
        {
            $destination = "../images/content/";
            $coverImage = date("His").'-'.$_FILES['coverimg']['name'];
            $this->upload($destination,$coverImage,'coverimg');
            unlink("../images/content/".$this->input->post('oldCoverImg'));
        }
        $data = array(
            'name' => $this->input->post('name') ,
            'img' => $coverImage,
            'url' => $this->input->post('url') ,
            'update_date' => date("Y-m-d H:i:s"),
            'update_by' => $this->session->userdata('admin'),
            );

        $this->client_model->update($this->input->post('id'),$data);
        echo "<script>window.location.assign('".base_url()."client');</script>";
    }

	public function enable($checked,$id)
	{		
		$this->db->where('id', $id);
		$this->db->update('client', array( 'enable' => $checked));
		echo "<script>window.location.assign('".base_url()."client');</script>";
	}

	public function delete($checked,$id)
	{	
		$sql ="select * from client where id = '".$id."' ";
		$query = $this->db->query($sql);
		foreach($query->result_array() as $arr){
			unlink("../images/client/".$arr['CoverImage']);
		}

		$this->db->delete('client', array('id' => $id));
		echo "<script> window.location.assign('".base_url()."client'); </script>";
	}



	protected function upload($dest,$filename,$field)
    {
    	$config['upload_path'] = $dest;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';
		$config['file_name']  = $filename;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload($field))
		{
			return array('error' => $this->upload->display_errors());
		}
		else
		{
			return  array('upload_data' => $this->upload->data());
		}
		$this->image_lib->clear();
    }


}