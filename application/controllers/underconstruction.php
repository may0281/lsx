<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class underconstruction extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	
	}
	public function index()
	{
//        echo '<pre>';
        $xml=simplexml_load_file("lsx.wordpress.xml");
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $items = $array['channel'];
        foreach ($items as $item)
        {
            foreach ($item as $r)
            {
                $cat = $r['category'];
//                print_r($cat);
                $category = null;
                $product_code = null;
                $type_code = null;
                $product_tag = null;
                $description = null;
                foreach ($cat as $c)
                {
                    $attr = $c['@attributes'];
                    $domain = $attr['domain'];
                    $nicename = $attr['nicename'];

                    if($domain == 'pa_product')
                    {
                        $type_code = $nicename;
                    }
                    if($domain == 'product_tag')
                    {
                        $product_code .= $nicename.',';
                    }
                    if($domain == 'pa_thickness')
                    {
                        $description .= "<span><strong>Thickness</strong>  :  ".$nicename."</span> <br>";
                    }
                    if($domain == 'pa_size')
                    {
                        $description .= "<span><strong>Size</strong>  :  ".$nicename."</span> <br>";
                    }
                    if($domain == 'pa_surface-finish')
                    {
                        $description .= "<span><strong>Surface Finish</strong>  :  ".$nicename."</span> <br>";
                    }
                    if($domain == 'pa_pattern-direction')
                    {
                        $description .= "<span><strong>Pattern Direction</strong>  :  ".$nicename."</span> <br>";
                    }
                    if($domain == 'pa_core')
                    {
                        $description .= "<span><strong>Core</strong>  :  ".$nicename."</span> <br>";
                    }
                    if($domain == 'product_cat')
                    {
                        $category .= $nicename.',';
                    }

                }
                $data[] = array(
                    'name_th' => $r['title'],
                    'name_en' => $r['title'],
                    'product_code' => $product_code,
                    'cover_img' => $product_code.'jpg',
                    'category' => $category,
                    'type_code' => $type_code,
                    'desc_en' => $description,
                    'desc_th' => $description,
                    'desc_cn' => $description,
                    'create_date' => date('Y-m-d H:i:s',strtotime($r['pubDate'])),
                    'create_by' => 'system',
                    'note_th' => '* Colours may differ depending on your display. Please contact and liaise with our account consultants to provide actual laminate samples for colour and surface texture verification.',
                    'note_en' => '* Colours may differ depending on your display. Please contact and liaise with our account consultants to provide actual laminate samples for colour and surface texture verification.',
                    'enable' => 1,
                );

            }
//            print_r($data);
        }
        return $data;
	}

	public function getCat()
    {
        echo '<pre>';
        $data = $this->index();
        $i=1;
        foreach ($data as $d)
        {
            $cat = explode(',',$d['category']);
            $p = explode(',',$d['product_code']);


            $data = array(
                'product_code' => $p[0],
                'cat_code' => $cat[0],
                'sub_cat_code' => $cat[1],
                'sku' => strtoupper($p[0]),
                'type_code' => $d['type_code'],
                'cover_img' => $p['0'].'.jpg',
                'name_th' => $d['name_th'],
                'name_en' => $d['name_en'],
                'tags' => $d['category'].$p[1],
                'desc_en' => $d['desc_en'],
                'desc_th' => $d['desc_th'],
                'note_en' => $d['note_en'],
                'note_th' => $d['note_th'],
                'create_date' => $d['create_date'],
                'create_by' => 'system',
                'enable' => 1,
            );
//            $this->db->insert('product', $data);
            echo $i.'<br>';
            $i++;

        }
    }

    public function read()
    {
        $dir = "image/HPL2/";

        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                $i=1;
                while (($file = readdir($dh)) !== false){
//                    echo $file ."<br>";

                    $path = FCPATH.$dir;

//                    $find = array('-');
//                    $newFile = str_replace($find,"",$file);
//                    rename($path.$file,$path.$newFile);

//                    $find2 = array('.R');
//                    $newFile2 = str_replace($find2,"-R",$file);
//                    rename($path.$file,$path.$newFile2);

                    $file_ex = explode('-',$file);
                    if($file_ex[1] == 'R.jpg')
                    {
//                        $data = array(
//                            'product_code'=>strtolower($file_ex[0]),
//                            'cat_code'=> 'altyno-film',
//                            'sub_cat_code'=> 'plain-colors',
//                            'sku'=> $file_ex[0],
//                            'cover_img'=> $file,
//                            'type_code'=> 'altyno',
//                            'name_en'=> '(Altyno)',
//                            'name_th'=> '(Altyno)',
//                            'tags'=> 'altyno-film,plain-colors',
//                            'desc_en'=> '<span><strong>Thickness</strong>  :  0-2-mm-0-05-0-10</span> <br><span><strong>Size</strong>  :  1230-mm-x-50-meter</span> <br><span><strong>Pattern Direction</strong>  :  vertical</span> <br>',
//                            'desc_th'=> '<span><strong>Thickness</strong>  :  0-2-mm-0-05-0-10</span> <br><span><strong>Size</strong>  :  1230-mm-x-50-meter</span> <br><span><strong>Pattern Direction</strong>  :  vertical</span> <br>',
//                            'note_en'=> '* Colours may differ depending on your display. Please contact and liaise with our account consultants to provide actual laminate samples for colour and surface texture verification.',
//                            'note_th'=> '* Colours may differ depending on your display. Please contact and liaise with our account consultants to provide actual laminate samples for colour and surface texture verification.',
//                            'create_date'=> date('Y-m-d H:i:s'),
//                            'create_by'=> 'system',
//                            'enable'=> 1,
//                            );
//                        $this->db->insert('product',$data);
                        $file_ex_dot = explode('.',$file_ex[0]);

//                        $this->db->where('sku', $file_ex_dot[0]);
//                        $this->db->update('product', array('cover_img'=>$file));

                        echo $i.'-'.$file_ex_dot[0].'<br>';
                    }

                    else
                    {
                        $file_gall = explode('.',$file);
//                        $data = array('product_code'=>strtolower($file_gall[0]),'Image'=>$file);
//                        $this->db->insert('product_gallery',$data);
                        echo $i.'-'.$file_gall[0].'<br>';
                    }

                    $i++;
                }
                closedir($dh);
            }
        }
    }

    public function altyno()
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('type_code', 'cerarl');
        $query = $this->db->get();
        $product = $query->result_array();

        foreach ($product as $r)
        {
            $this->db->where('ID', $r['ID']);
            $this->db->update('product', array('sub_cat_code'=>''));
        }

    }



	
}
