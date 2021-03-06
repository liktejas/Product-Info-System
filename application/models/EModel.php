<?php

class EModel extends CI_Model{

    public function get_items($limit, $offset)
    {
        $products = $this->db->get('products', $limit, $offset);
        return $products->result();
    }

    public function get_items_for_control()
    {
        $products = $this->db->get('products');
        return $products->result();
    }

    public function view_item($id)
    {
        $products = $this->db->get_where('products', array('id' => $id));
        return $products->row();
    }

    public function login_superadmin($data)
    {
        $login = $this->db->get_where('superadmin', $data);
        if($login->row())
        {
            return $login->row();
        }
        else
        {
            return false;
        }
    }

    public function add_product_to_db($data)
    {
        $insert_confirm = $this->db->insert('products', $data);
        return $insert_confirm;
    }
    public function update_product_to_db($data,$id)
    {
        $update_confirm = $this->db->where('id',$id)->update('products',$data);
        return $update_confirm;
    }
    public function delete_product_to_db($id)
    {
        $delete_confirm = $this->db->delete('products', array('id' => $id));
        return $delete_confirm;
    }
    public function get_total_rows()
    {
        $total_num_rows = $this->db->get('products');
        return $total_num_rows->num_rows();
    }
    public function search_product($search_field)
    {
        $search_result = $this->db->like('name',$search_field)->get('products');
        if($search_result->num_rows() > 0)
        {
            return $search_result->result();
        }
        else
        {
            $this->load->view('no_search');
        }
    }
    public function get_total_searched_rows($search_field)
    {
        $search_result = $this->db->like('name',$search_field)->get('products');
        return $search_result->num_rows();
    }
    public function get_category()
    {
        $category_list = $this->db->get('category');
        return $category_list->result();
    }
    public function get_company()
    {
        $company_list = $this->db->get('company');
        return $company_list->result();
    }
    public function get_items_list()
    {
        $items_list = $this->db->get('items');
        return $items_list->result();
    }
    public function related($view_company_name, $product_view_name)
    {
        $data = array('company' => $view_company_name);
        $related_products = $this->db->where_not_in('name', $product_view_name)->get_where('products',array('company' => $view_company_name));
        return $related_products->result();
    }
    
}

?>