<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class browse extends CI_Controller {
	public function index()
	{

		//$this->load->view('browse');
		
		$url = 'images/'.time()."_".$_FILES['upload']['name'];



	 //extensive suitability check before doing anything with the file...
		if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
		{
		   $message = "No file uploaded.";
		}
		else if ($_FILES['upload']["size"] == 0)
		{
		   $message = "The file is of zero length.";
		}
		else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png") AND ($_FILES['upload']["type"] != "image/gif"))
		{
		   $message = "The image must be in either GIF , JPG or PNG format. Please upload a JPG or PNG instead.";
		}
		
		else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
		{
		   $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
		}
		else {
		  $message = "";
		
		  $move =  move_uploaded_file($_FILES['upload']['tmp_name'], $url);
		  $this->watermark($url);
		  $this->watermark2($url);
		 
		  if(!$move)
		  {
			 $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
		  }
		  //$url = "../" . $url;
		}

		
		if($message != "")
		{
			$url = "";
		}
		$path = 'http://jakgajeebunturng.com/systemadmin/';//base_url();


		$funcNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$path$url', '$message');</script>";
	}
	protected function watermark2($sourcefile)
    {
    	//echo $sourcefile;exit();
    	
    	$this->load->library('image_lib');    	
    	$config['source_image'] = $sourcefile;
    	$config['wm_type'] = 'overlay';
    	$config['wm_overlay_path'] = './images/logo3.png';
    	$config['wm_opacity'] = '50';
		$config['wm_vrt_alignment'] = 'middle';
		$config['wm_hor_alignment'] = 'center';
		$config['wm_padding'] = '1';
		$this->image_lib->initialize($config);
		$this->image_lib->watermark();
		$this->image_lib->clear();
		
		
    }
    protected function watermark($sourcefile)
    {
    	//echo $sourcefile;exit();
    	
    	$this->load->library('image_lib');    	
    	$config['source_image'] = $sourcefile;
    	$config['wm_type'] = 'overlay';
    	$config['wm_overlay_path'] = './images/logo.png';
    	$config['wm_opacity'] = '50';
		//$config['wm_text'] = 'JAKGAJEEBUNTERNG.COM';
		//$config['wm_type'] = 'text';
		//$config['wm_font_path'] = './system/fonts/texb.ttf';
		//$config['wm_font_size'] = '20';
		//$config['wm_font_color'] = 'ffffff';
		$config['wm_vrt_alignment'] = 'bottom';
		$config['wm_hor_alignment'] = 'right';
		$config['wm_padding'] = '1';
		$config['wm_hor_offset'] = '30';
        $config['wm_vrt_offset'] = '30';
		$this->image_lib->initialize($config);
		$this->image_lib->watermark();
		$this->image_lib->clear();
		
		
    }
}