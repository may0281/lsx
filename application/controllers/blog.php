<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blog extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();

        $lang = $this->session->userdata("lang");
        if($this->session->userdata("lang") == null)
        {
            $lang = 'th';
            $this->session->set_userdata("lang","th");
        }
		$this->lang->load($lang,$lang);

		date_default_timezone_set('Asia/Bangkok');

		$this->load->model('blog_model');
		$this->load->model('home_model');

	}
	
	public function index($page = 1)
	{
        $category = null;
        $category = $this->input->get('categories');
        $total = $this->getCountBlog($category);
        $pagination = ceil($total/4);

        $data = array(
            'page' => $page,
            'pagi' => $pagination,
            'blogs' => $this->blog_model->getBlog($page, 4, $category),

        );
		$this->load->view("template/header",array('lang'=>$this->session->userdata("lang")));
        $this->load->view('blog/page-title',array('menu'=>'Blog','header'=>'LATEST BLOG POSTS'));
		$this->load->view("blog/index", $data);
		$this->load->view("template/footer-2");

	}

	private function getCountBlog($category = null)
    {
        $this->db->select('*');
        $this->db->from('blog');
        $this->db->join('blog_category','blog_category.id = blog.CatID');
        $this->db->where('blog.Enable',1);
        if($category)
        {
            $this->db->where('blog_category.url',$category);
        }
        $total = $this->db->count_all_results();
        return $total;

    }

    public function detail($id,$name)
    {
        $response = $this->blog_model->getBlogDetail($id);
        $this->load->view('template/header');
        if(empty($response))
        {
            echo $this->load->view('template/header','',true);
            echo $this->load->view('template/404','',true);
            echo$this->load->view('template/footer-2','',true);
            die();

        }
        $data['blog'] = $response[0];
        $page_title = array('menu'=>'Blog','subMenu'=>'Detail');
        $this->load->view('blog/page-title',$page_title);
        $this->load->view('blog/detail',$data);
        $this->load->view('template/footer-2');

    }
	
	
}