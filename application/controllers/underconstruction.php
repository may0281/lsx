<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class underconstruction extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	
	}
	public function index()
	{
        echo '<pre>';
        $xml=simplexml_load_file("lsx.wordpress.xml");


        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $items = $array['channel'];
        foreach ($items as $item)
        {
            foreach ($item as $r)
            {
                $cat = $r['category'];
                foreach ($cat as $c)
                {
                    $attr = $c['@attributes'];
                    print_r($attr);
//                    if($attr['domain'] == 'product_tag')
//                    {
//                        print($attr).'<br>';
//                    }
                }
            }
        }


	}

	
}
