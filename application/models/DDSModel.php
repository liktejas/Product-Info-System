<?php

class DDSModel extends CI_Model{

    public function update_category($cat_id, $cat_name)
    {
        $cat_update_success = $this->db->where('cat_id', $cat_id)->update('category', array('cat_name' => $cat_name));
        return $cat_update_success;
    }
    public function update_company($company_comp_id, $company_cat_id, $company_comp_name)
    {
        $data = array(
            'cat_id' => $company_cat_id,
            'comp_name' => $company_comp_name
        );
        $comp_update_success = $this->db->where('comp_id',$company_comp_id)->update('company', $data);
        return $comp_update_success;
    }
    public function update_items($items_item_id, $items_comp_id, $items_item_name)
    {
        $data = array(
            'comp_id' => $items_comp_id,
            'item_name' => $items_item_name
        );
        $items_update_success = $this->db->where('item_id',$items_item_id)->update('items', $data);
        return $items_update_success;
    }
    public function delete_category($delete_cat_id)
    {
        $category_delete_success = $this->db->delete('category', array('cat_id' => $delete_cat_id));
        return $category_delete_success;
    }
    public function delete_company($delete_comp_id)
    {
        $company_delete_success = $this->db->delete('company', array('comp_id' => $delete_comp_id));
        return $company_delete_success;
    }
    public function delete_item($delete_item_id)
    {
        $company_delete_success = $this->db->delete('items', array('item_id' => $delete_item_id));
        return $company_delete_success;
    }
}

?>