<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/786/786131.svg" type="image/x-icon">
    <title>DDS Table | ECom</title>
  </head>
  <body>
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Product Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>control">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>">View Products</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()?>ddsview">DDS Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>logout">Logout</a>
            </li>
        </ul>
    </div>
    </nav>

    <!--Category Modal -->
    <div class="modal fade" id="editcategorymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="edit_category" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="category_cat_name">Category Name</label>
                      <input type="text" name="category_cat_name" id="category_cat_name" class="form-control" placeholder="Category Name" required>
                    </div>
                    <input type="hidden" name="category_cat_id" id="category_cat_id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit_category_btn" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <!--Company Modal -->
    <div class="modal fade" id="editcompanymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="edit_company" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="company_cat_id">Category ID</label>
                      <input type="text" name="company_cat_id" id="company_cat_id" class="form-control" placeholder="Category ID" required>
                    </div>
                    <div class="form-group">
                      <label for="company_comp_name">Company Name</label>
                      <input type="text" name="company_comp_name" id="company_comp_name" class="form-control" placeholder="Company Name" required>
                    </div>
                    <input type="hidden" name="company_comp_id" id="company_comp_id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit_company_btn" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!--Items Modal -->
    <div class="modal fade" id="edititemsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="edit_items" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="items_comp_id">Company ID</label>
                      <input type="text" name="items_comp_id" id="items_comp_id" class="form-control" placeholder="Company ID" required>
                    </div>
                    <div class="form-group">
                      <label for="items_item_name">Item Name</label>
                      <input type="text" name="items_item_name" id="items_item_name" class="form-control" placeholder="Item Name" required>
                    </div>
                    <input type="hidden" name="items_item_id" id="items_item_id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit_items_btn" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Category -->
    <div class="modal fade" id="deletecategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="delete_category" method="post">
        <div class="modal-body">
            Do you want to delete this category?
            <input type="hidden" name="delete_cat_id" id="delete_cat_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" name="cat_delete" class="btn btn-primary">Yes</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Delete Company -->
    <div class="modal fade" id="deletecompanyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Company</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="delete_company" method="post">
        <div class="modal-body">
            Do you want to delete this company?
            <input type="hidden" name="delete_comp_id" id="delete_comp_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" name="comp_delete" class="btn btn-primary">Yes</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Delete Items -->
    <div class="modal fade" id="deleteitemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Items</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="delete_items" method="post">
        <div class="modal-body">
            Do you want to delete this Item?
            <input type="hidden" name="delete_item_id" id="delete_item_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" name="item_delete" class="btn btn-primary">Yes</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <div class="container mt-3">
    <?php echo $this->session->flashdata('success_msg');?>
    <?php echo $this->session->flashdata('fail_msg');?>
        <h2 class="text-center">Table for Category</h2>
        <table class="table table-striped table-hover table-bordered" id="table_category">
          <thead class="thead-dark">
            <tr>
                <th class="text-center">Category ID</th>
                <th class="text-center">Category Name</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($category_list as $category)
          {
          ?>
            <tr>
                <td class="text-center"><?php echo $category->cat_id?></td>
                <td class="text-center"><?php echo $category->cat_name?></td>

                <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#editcategorymodal" data-cat_id="<?php echo $category->cat_id?>" data-cat_name="<?php echo $category->cat_name?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

                <td class="text-center"><a href="" class="btn btn-danger" data-toggle="modal" data-target="#deletecategoryModal" data-delete_cat_id="<?php echo $category->cat_id?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
        
        <h2 class="text-center mt-3">Table for Company</h2>
        <table class="table table-striped table-hover table-bordered" id="table_company">
          <thead class="thead-dark">
            <tr>
                <th class="text-center">Company ID</th>
                <th class="text-center">Category ID</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($company_list as $company)
          {
          ?>
            <tr>
                <td class="text-center"><?php echo $company->comp_id?></td>
                <td class="text-center"><?php echo $company->cat_id?></td>
                <td class="text-center"><?php echo $company->comp_name?></td>
                <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#editcompanymodal" data-comp_id="<?php echo $company->comp_id?>" data-cat_id="<?php echo $company->cat_id?>" data-comp_name="<?php echo $company->comp_name?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td class="text-center"><a href="" class="btn btn-danger" data-toggle="modal" data-target="#deletecompanyModal" data-delete_comp_id="<?php echo $company->comp_id?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>

        <h2 class="text-center mt-3">Table for Items</h2>
        <table class="table table-striped table-hover table-bordered" id="table_items">
          <thead class="thead-dark">
            <tr>
                <th class="text-center">Item ID</th>
                <th class="text-center">Company ID</th>
                <th class="text-center">Item Name</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach($items_list as $items)
          {
          ?>
            <tr>
                <td class="text-center"><?php echo $items->item_id?></td>
                <td class="text-center"><?php echo $items->comp_id?></td>
                <td class="text-center"><?php echo $items->item_name?></td>
                <td class="text-center"><a href="" class="btn btn-info" data-toggle="modal" data-target="#edititemsmodal" data-item_id="<?php echo $items->item_id?>" data-comp_id="<?php echo $items->comp_id?>" data-item_name="<?php echo $items->item_name?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                <td class="text-center"><a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteitemsModal" data-delete_item_id="<?php echo $items->item_id?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#table_category').DataTable();
        $('#table_company').DataTable();
        $('#table_items').DataTable();

        $('#editcategorymodal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var cat_id = button.data('cat_id') // Extract info from data-* attributes
            var cat_name = button.data('cat_name')

            var modal = $(this)
            modal.find('.modal-body #category_cat_id').val(cat_id)
            modal.find('.modal-body #category_cat_name').val(cat_name)
            })

        $('#editcompanymodal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var cat_id = button.data('cat_id') // Extract info from data-* attributes
            var comp_name = button.data('comp_name')
            var comp_id = button.data('comp_id')

            var modal = $(this)
            modal.find('.modal-body #company_cat_id').val(cat_id)
            modal.find('.modal-body #company_comp_name').val(comp_name)
            modal.find('.modal-body #company_comp_id').val(comp_id)
            })

        $('#edititemsmodal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var item_id = button.data('item_id') // Extract info from data-* attributes
            var comp_id = button.data('comp_id')
            var item_name = button.data('item_name')

            var modal = $(this)
            modal.find('.modal-body #items_item_id').val(item_id)
            modal.find('.modal-body #items_comp_id').val(comp_id)
            modal.find('.modal-body #items_item_name').val(item_name)
            })

        $('#deletecategoryModal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var delete_cat_id = button.data('delete_cat_id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-body #delete_cat_id').val(delete_cat_id)
            })

        $('#deletecompanyModal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var delete_comp_id = button.data('delete_comp_id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-body #delete_comp_id').val(delete_comp_id)
            })

        $('#deleteitemsModal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var delete_item_id = button.data('delete_item_id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-body #delete_item_id').val(delete_item_id)
            })
            
    } );
    </script>
  </body>
</html>