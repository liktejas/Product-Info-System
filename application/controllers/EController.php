<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('EModel');
        $this->load->model('SModel');
        $this->load->model('DDSModel');
        date_default_timezone_set('Asia/Kolkata');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
    }

	public function index()
	{
        $config['base_url'] = base_url('display');
        $config['per_page'] = 8;
        $config['total_rows'] = $this->EModel->get_total_rows();
        $config['attributes'] = array('class' => 'page-link');
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = "</ul>";
        $config['next_tag_open'] = "<li class='page-item'>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li class='page-item'>";
        $config['prev_tag_close'] = "</li>";
        $config['num_tag_open'] = "<li class='page-item'>";
        $config['num_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='page-link active'><a>";
        $config['cur_tag_close'] = "</a></li>";

        $this->pagination->initialize($config);
        $db_products = $this->EModel->get_items($config['per_page'], $this->uri->segment(2));
        $category = $this->SModel->fetch_category();
        $data = array(
            'db_products'=> $db_products,
            'category' => $category
        );
        $this->load->view('products',$data);
    }
    
    public function product_view()
    {
        $id = $_GET['id'];
        $products_detail = $this->EModel->view_item($id);
        $product_view_name = $products_detail->name;
        $view_company_name = $products_detail->company;
        $related_products = $this->EModel->related($view_company_name,$product_view_name);
        // echo '<pre>';
        // print_r($related_products);
        // echo '</pre>';
        $data = array('products_detail'=> $products_detail, 'related_products' => $related_products);
        $this->load->view('product_view',$data);
    }

    // public function superadmin()
    // {
    //     $this->load->view('superadmin');
    // }

    // public function superadmin_login()
    // {
    //     if(isset($_POST['login']))
    //     {
    //         $username = $_POST['username'];
    //         $password = $_POST['password'];
    //         $data = array(
    //             'username' => $username,
    //             'password' => $password
    //         );
    //         $login = $this->EModel->login_superadmin($data);
    //         if($login)
    //         {
    //             $session_data = array(
    //                 'username' => $login->username,
    //                 'name' => $login->name,
    //                 'id' => $login->id
    //             );
    //             $this->session->set_userdata($session_data);
    //             redirect(base_url().'control');
    //         }
    //         else
    //         {
    //             $this->session->set_flashdata('err_message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Login Failed</strong></div>');
    //             $this->load->view('superadmin');
    //         }
    //     }
    //     else
    //     {
    //         $this->load->view('superadmin'); 
    //     }
    // }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect(base_url().'superadmin');
    // }

    // public function control_panel()
    // {
    //     if(empty($_SESSION['name']))
    //     {
    //         redirect(base_url().'superadmin');
    //     }
    //     $db_products = $this->EModel->get_items_for_control();
    //     $data = array('db_products'=> $db_products);
    //     $this->load->view('products_control',$data);
    // }

    public function add_product()
    {
        if(isset($_POST['add_product']))
        {
            $category = $this->input->post('category');
            $name = $this->input->post('name');
            $company = $this->input->post('company');
            $data = array(
                'prod_id' => $this->input->post('prod_id'),
                'category' => $this->input->post('category'),
                'name' => $this->input->post('name'),
                'company' => $this->input->post('company'),
                'img' => $this->input->post('img'),
                'processor' => $this->input->post('processor'),
                'battery' => $this->input->post('battery'),
                'display' => $this->input->post('display'),
                'ram' => $this->input->post('ram'),
                'fcamera' => $this->input->post('fcamera'),
                'rcamera' => $this->input->post('rcamera'),
                'os' => $this->input->post('os'),
                'storage' => $this->input->post('storage'),
                'video' => $this->input->post('video')
            );
            $insert_confirm = $this->EModel->add_product_to_db($data);
            $sql = $this->db->get_where('category', array('cat_name' => $category));
            $rows = $sql->num_rows();
            if($rows > 0)
            {
                // echo 'do not insert category<br>';
            }
            else
            {
                // echo 'insert category<br>';
                $insert_category = $this->db->insert('category',array('cat_name' => $category));
            }
            $sql1 = $this->db->get_where('company',array('comp_name' => $company));
            $rows1 = $sql1->num_rows();
            if($rows1 > 0)
            {
                // echo 'do not insert company<br>';
            }
            else
            {
                // echo 'insert company<br>';
                $select_company = $this->db->get_where('category', array('cat_name' => $category));
                $select_company_rows = $select_company->num_rows();
                if($select_company_rows > 0)
                {
                    $category_id = $select_company->row()->cat_id;
                    // print_r($category_id->cat_id);
                }
                $company_data = array(
                    'cat_id' => $category_id,
                    'comp_name' => $company
                );
                $insert_company = $this->db->insert('company', $company_data);
            }
            $sql2 = $this->db->get_where('items', array('item_name' => $name));
            $rows2 = $sql2->num_rows();
            if($rows2 > 0)
            {
                // echo 'do not insert item<br>';
            }
            else
            {
                // echo 'insert item<br>';
                $select_item = $this->db->get_where('company', array('comp_name' => $company));
                $select_item_rows = $select_item->num_rows();
                if($select_item_rows > 0)
                {
                    $company_id = $select_item->row()->comp_id;
                    // print_r($company_id);
                }
                $item_data = array(
                    'comp_id' => $company_id,
                    'item_name' => $name
                );
                $insert_item = $this->db->insert('items', $item_data);
            }
            // exit();
            if($insert_confirm)
            {
                $this->session->set_flashdata('success_msg',
                 '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 <strong>Product Added Successfully</strong>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                </div>');
                redirect(base_url().'control');
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                 '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <strong>Fail to Add Product</strong>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
                </div>');
                redirect(base_url().'control');
            }
        }
        else
        {
            redirect(base_url().'control');
        }
    }

    public function edit_product()
    {
        if(isset($_POST['edit_product']))
        {
            $id = $this->input->post('id');
            $format="%Y-%m-%d %H:%M:%S";
            $updated_at = strftime($format);

            $data = array(
                'prod_id' => $this->input->post('prod_id'),
                'category' => $this->input->post('category'),
                'name' => $this->input->post('name'),
                'company' => $this->input->post('company'),
                'img' => $this->input->post('img'),
                'processor' => $this->input->post('processor'),
                'battery' => $this->input->post('battery'),
                'display' => $this->input->post('display'),
                'ram' => $this->input->post('ram'),
                'fcamera' => $this->input->post('fcamera'),
                'rcamera' => $this->input->post('rcamera'),
                'os' => $this->input->post('os'),
                'storage' => $this->input->post('storage'),
                'video' => $this->input->post('video'),
                'updated_at' => $updated_at
            );
            $update_confirm = $this->EModel->update_product_to_db($data, $id);
            if($update_confirm)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Product Updated Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'control');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Update Product</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'control'); 
            }
        }
        else
        {
            redirect(base_url().'control');
        }
    }

    public function delete_product()
    {
        if(isset($_POST['delete']))
        {
            $id = $this->input->post('id');
            $delete_confirm = $this->EModel->delete_product_to_db($id);
            if($delete_confirm)
            {
                $this->session->set_flashdata('success_msg',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Product Deleted Successfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url().'control');
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed to Delete Product</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url().'control');
            }
        }
        else
        {
            redirect(base_url().'control');
        }
    }
    public function search()
    {
        if(isset($_POST['search']))
        {
            $search_field = $_POST['search_field'];
            $number_of_results = $this->EModel->get_total_searched_rows($search_field);
            $product_result = $this->EModel->search_product($search_field);
            if($product_result)
            {
                $data = array(
                'product_result' => $product_result,
                'searched_query' => $search_field,
                'number_of_results' => $number_of_results
                );
                $this->load->view('search',$data);
            }
        }
        if(isset($_POST['drop_search']))
        {
            $item = $_POST['item'];
            $searched_item = $this->db->get_where('items', array('item_id' => $item));
            $searched_item_name = $searched_item->row()->item_name;
            $product_name = $this->db->get_where('products', array('name' => $searched_item_name));
            $product_id = $product_name->row()->id;

            $products_detail = $this->EModel->view_item($product_id);
            $data = array('products_detail'=> $products_detail);
            $this->load->view('product_view',$data);
        }
    }
    public function fetch_company()
    {
        if($this->input->post('cat_id'))
        {
            echo $this->SModel->fetch_company($this->input->post('cat_id'));
        }
    }
    public function fetch_item()
    {
        if($this->input->post('comp_id'))
        {
            echo $this->SModel->fetch_item($this->input->post('comp_id'));
        }
    }
    public function ddsview()
    {
        if(empty($_SESSION['name']))
        {
            redirect(base_url().'superadmin');
        }
        $category_list = $this->EModel->get_category();
        $company_list = $this->EModel->get_company();
        $items_list =  $this->EModel->get_items_list();
        $data = array(
            'category_list' => $category_list,
            'company_list' => $company_list,
            'items_list' => $items_list
        );
        $this->load->view('ddstable',$data);
    }
    public function edit_category()
    {
        if(isset($_POST['edit_category_btn']))
        {
            $cat_id = $this->input->post('category_cat_id');
            $cat_name = $this->input->post('category_cat_name');
            $cat_update_success = $this->DDSModel->update_category($cat_id, $cat_name);
            if($cat_update_success)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Category Updated Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Update Category</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');
            }
        }
        else
        {
            redirect(base_url().'ddsview');
        }
    }
    public function edit_company()
    {
        if(isset($_POST['edit_company_btn']))
        {
            $company_comp_id = $this->input->post('company_comp_id');
            $company_cat_id = $this->input->post('company_cat_id');
            $company_comp_name = $this->input->post('company_comp_name');
            $comp_update_success = $this->DDSModel->update_company($company_comp_id, $company_cat_id, $company_comp_name);
            if($comp_update_success)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Company Updated Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Update Company</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');
            }
        }
        else
        {
            redirect(base_url().'ddsview');
        }
    }
    public function edit_items()
    {
        if(isset($_POST['edit_items_btn']))
        {
            $items_item_id = $this->input->post('items_item_id');
            $items_comp_id = $this->input->post('items_comp_id');
            $items_item_name = $this->input->post('items_item_name');
            $items_update_success = $this->DDSModel->update_items($items_item_id, $items_comp_id, $items_item_name);
            if($items_update_success)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Item Updated Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Update Item</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');
            }
        }
        else
        {
            redirect(base_url().'ddsview');
        }
    }
    public function delete_category()
    {
        if(isset($_POST['cat_delete']))
        {
            $delete_cat_id = $this->input->post('delete_cat_id');
            $category_delete_success = $this->DDSModel->delete_category($delete_cat_id);
            if($category_delete_success)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Category Deleted Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Delete Category</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');
            }
        }
        else
        {
            redirect(base_url().'ddsview');
        }
    }
    public function delete_company()
    {
        if(isset($_POST['comp_delete']))
        {
            $delete_comp_id = $this->input->post('delete_comp_id');
            $company_delete_success = $this->DDSModel->delete_company($delete_comp_id);
            if($company_delete_success)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Company Deleted Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Delete Company</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');
            }
        }
        else
        {
            redirect(base_url().'ddsview');
        }
    }
    public function delete_items()
    {
        if(isset($_POST['item_delete']))
        {
            $delete_item_id = $this->input->post('delete_item_id');
            $item_delete_success = $this->DDSModel->delete_item($delete_item_id);
            if($item_delete_success)
            {
                $this->session->set_flashdata('success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Item Deleted Successfully</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');  
            }
            else
            {
                $this->session->set_flashdata('fail_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed to Delete Item</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect(base_url().'ddsview');
            }
        }
        else
        {
            redirect(base_url().'ddsview');
        }
    }
}
