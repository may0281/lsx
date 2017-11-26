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
        if(empty($response))
        {

            echo $this->load->view('template/header','',true);
            echo $this->load->view('template/404','',true);
            echo$this->load->view('template/footer-2','',true);
            die();

        }
        if($response)
        {
            $actual_link = "http://lsxthailand.com/".$_SERVER[REQUEST_URI];
            $images = 'http://lsxthailand.com/images/blog/'.$response[0]['CoverImage'];
            $title = $response[0]['Name'.strtoupper($this->session->userdata('lang'))];
            $des = strip_tags($response[0]['Description'.strtoupper($this->session->userdata('lang'))]);
            echo '<meta property="fb:app_id" content="423173011418416" />';
            echo '<meta property="og:image" content="' .$images.'" />';
            echo '<meta property="og:title" content="' .$title.'" />';
            echo '<meta property="og:type"	content="article">';
            echo '<meta property="og:url"	content="' .$actual_link.'" />';
            echo '<meta property="og:description"	content="' .$des.'" />';
            echo '<meta property="og:site_name" content="www.lsxthailand.com">';

            echo '<link rel="canonical" href="'.$actual_link.'">';
            echo '<link rel="image_src" href="'.$images.' ">';

        }
        $this->load->view('template/header');

        $data['blog'] = $response[0];
        $page_title = array('menu'=>'Blog','subMenu'=>'Detail');
        $this->load->view('blog/page-title',$page_title);
        $this->load->view('blog/detail',$data);
        $this->load->view('template/footer-2');

    }






	
	
}