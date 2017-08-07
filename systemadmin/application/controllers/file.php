<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class file extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);

        if ($this->session->userdata('admin') == '') {
            echo "<script> window.location.assign('" . base_url() . "login?ReturnUrl=" . $_SERVER['REQUEST_URI'] . "');</script>";
        }
        $lang = $this->session->userdata("lang") == null ? "th" : $this->session->userdata("lang");
        $this->lang->load($lang, $lang);
        $this->dir = "../upload/";
    }


    public function index()
    {
        $files = array();
        if ($dh = opendir($this->dir)) {
            while (($file = readdir($dh)) !== false) {
                $files[] = $file;
            }
        }

        $data['files'] = $files;
        $this->load->view('template/left');
        $this->load->view('file', $data);

    }

    public function upload()
    {
        if ($_FILES['file']['name']) //check file upload
        {
            $find = array('!','+',' ','(',')');
            $name = str_replace($find,"-",$_FILES['file']['name']);
            $status = copy($_FILES['file']["tmp_name"], $this->dir.$name);
            if($status == 1)
            {
                echo "<script>alert('Success!!');window.location.assign('".base_url()."file');</script>";
            }
            else
            {
                echo "<script>alert('Fail!!. Please try again.');window.location.assign('".base_url()."file');</script>";
            }
        }
        echo "<script>alert('Error!!. File is empty.');window.location.assign('".base_url()."file');</script>";

    }
    public function delete($file)
    {
        if(file_exists($this->dir.$file))
        {
            $deleted = unlink($this->dir.$file);
            if($deleted)
            {
                echo "<script>alert('Deleted!!');window.location.assign('".base_url()."file');</script>";
            }
            echo "<script>alert('Error! Please try again.');window.location.assign('".base_url()."file');</script>";
        }

        echo "<script>alert('Error! Please try again.');window.location.assign('".base_url()."file');</script>";

    }
}