<?php

/**
 * Created by PhpStorm.
 * User: sukanyatibadee
 * Date: 10/7/16
 * Time: 5:49 PM
 */
class landing_model extends  ci_model
{

    public function getLanding($uri)
    {
        $this->db->select('*');
        $this->db->from('landing');
        $this->db->where('url',$uri);
        $this->db->where('Enable',1);
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }



}