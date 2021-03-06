<?php

class SModel extends CI_Model{

    public function fetch_category()
    {
        $this->db->order_by("cat_name","ASC");
        $query = $this->db->get("category");
        return $query->result();
    }
    public function fetch_company($cat_id)
    {
        $this->db->where('cat_id',$cat_id);
        $this->db->order_by('comp_name', 'ASC');
        $query = $this->db->get('company');
        $output = '<option value="">Select Company</option>';
        foreach ($query->result() as $row)
        {
            $output .= '<option value="'.$row->comp_id.'">'.$row->comp_name.'</option>';
        }
        return $output;
    }
    public function fetch_item($comp_id)
    {
        $this->db->where('comp_id',$comp_id);
        $this->db->order_by('item_name', 'ASC');
        $query = $this->db->get('items');
        $output ='<option value="">Select Item</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->item_id.'">'.$row->item_name.'</option>';
        }
        return $output;
    }

}
?>