<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/786/786131.svg" type="image/x-icon">
    <title>Control - Products | ECom</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Product Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url()?>control">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#addproductmodal">Add Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>">View Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>ddsview">DDS Table</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()?>logout">Logout</a>
            </li>
        </ul>
    </div>
    </nav>

    <!--Add Product Modal -->
    <div class="modal fade" id="addproductmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="add_product" method="post">
        <div class="modal-body">
                <div class="form-group">
                    <label for="prod_id">Product ID</label>
                    <input type="text" name="prod_id" id="prod_id" class="form-control" autofocus required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="img">Product Image</label>
                    <input type="text" name="img" id="img" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="processor">Processor</label>
                    <input type="text" name="processor" id="processor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="battery">Battery</label>
                    <input type="text" name="battery" id="battery" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="display">Display</label>
                    <input type="text" name="display" id="display" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ram">RAM</label>
                    <input type="text" name="ram" id="ram" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fcamera">Front Camera</label>
                    <input type="text" name="fcamera" id="fcamera" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rcamera">Rear Camera</label>
                    <input type="text" name="rcamera" id="rcamera" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="os">OS</label>
                    <input type="text" name="os" id="os" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="storage">Storage</label>
                    <input type="text" name="storage" id="storage" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" name="video" id="video" class="form-control" required>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="edit_product" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="edit_prod_id">Product ID</label>
                    <input type="text" name="prod_id" id="edit_prod_id" class="form-control" autofocus required>
                </div>
                <div class="form-group">
                    <label for="edit_category">Category</label>
                    <input type="text" name="category" id="edit_category" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_name">Name</label>
                    <input type="text" name="name" id="edit_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_company">Company</label>
                    <input type="text" name="company" id="edit_company" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_img">Product Image</label>
                    <input type="text" name="img" id="edit_img" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_processor">Processor</label>
                    <input type="text" name="processor" id="edit_processor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_battery">Battery</label>
                    <input type="text" name="battery" id="edit_battery" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_display">Display</label>
                    <input type="text" name="display" id="edit_display" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_ram">RAM</label>
                    <input type="text" name="ram" id="edit_ram" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_fcamera">Front Camera</label>
                    <input type="text" name="fcamera" id="edit_fcamera" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_rcamera">Rear Camera</label>
                    <input type="text" name="rcamera" id="edit_rcamera" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_os">OS</label>
                    <input type="text" name="os" id="edit_os" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_storage">Storage</label>
                    <input type="text" name="storage" id="edit_storage" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="edit_video">Video</label>
                    <input type="text" name="video" id="edit_video" class="form-control" required>
                </div>
                <input type="hidden" name="id" id="edit_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edit_product">Update Changes</button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="delete_product" method="post">
        <div class="modal-body">
            Do you want to delete this product?
            <input type="hidden" name="id" id="delete_id">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" name="delete" class="btn btn-primary">Yes</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    
    <div class="container-fluid">
        <h1 class="mt-2 mb-3">Welcome!!! <?php echo $this->session->userdata('name')?></h1>
        <?php echo $this->session->flashdata('success_msg');?>
        <?php echo $this->session->flashdata('fail_msg');?>
        <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered" id="product_table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Product ID</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Company</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Processor</th>
                    <th class="text-center">Battery</th>
                    <th class="text-center">Display</th>
                    <th class="text-center">RAM</th>
                    <th class="text-center">Front Camera</th>
                    <th class="text-center">Rear Camera</th>
                    <th class="text-center">OS</th>
                    <th class="text-center">Storage</th>
                    <th class="text-center">Video</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($db_products as $products)
            {
        ?>
            <tr>
                <td class="text-center"><?php echo $products->id ?></td>
                <td class="text-center"><?php echo $products->prod_id ?></td>
                <td class="text-center"><?php echo $products->category ?></td>
                <td class="text-center"><?php echo $products->name ?></td>
                <td class="text-center"><?php echo $products->company ?></td>
                <td class="text-center"><img src="<?php echo $products->img ?>" width="50" alt="Image"></td>
                <td class="text-center"><?php echo $products->processor ?></td>
                <td class="text-center"><?php echo $products->battery ?></td>
                <td class="text-center"><?php echo $products->display ?></td>
                <td class="text-center"><?php echo $products->ram ?></td>
                <td class="text-center"><?php echo $products->fcamera ?></td>
                <td class="text-center"><?php echo $products->rcamera ?></td>
                <td class="text-center"><?php echo $products->os ?></td>
                <td class="text-center"><?php echo $products->storage ?></td>
                <td class="text-center"><?php echo $products->video ?></td>

                <td class="text-center"><a href="#" data-toggle="modal" data-target="#editmodal" data-id="<?php echo $products->id?>" data-prod_id="<?php echo $products->prod_id?>" data-category="<?php echo $products->category?>" data-name="<?php echo $products->name?>" data-company="<?php echo $products->company?>" data-img="<?php echo $products->img?>" data-processor="<?php echo $products->processor?>" data-battery="<?php echo $products->battery?>" data-display="<?php echo $products->display?>" data-ram="<?php echo $products->ram?>" data-fcamera="<?php echo $products->fcamera?>" data-rcamera="<?php echo $products->rcamera?>" data-os="<?php echo $products->os?>" data-storage="<?php echo $products->storage?>" data-video="<?php echo $products->video?>" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                
                <td class="text-center"><a href="#" data-toggle="modal" data-target="#deleteModal" data-deleteid="<?php echo $products->id?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Image</th>
                    <th>Processor</th>
                    <th>Battery</th>
                    <th>Display</th>
                    <th>RAM</th>
                    <th>Front Camera</th>
                    <th>Rear Camera</th>
                    <th>OS</th>
                    <th>Storage</th>
                    <th>Video</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editmodal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var prod_id = button.data('prod_id')
            var category = button.data('category')
            var name = button.data('name')
            var company = button.data('company')
            var img = button.data('img')
            var processor = button.data('processor')
            var battery = button.data('battery')
            var display = button.data('display')
            var ram = button.data('ram')
            var fcamera = button.data('fcamera')
            var rcamera = button.data('rcamera')
            var os = button.data('os')
            var storage = button.data('storage')
            var video = button.data('video')
            
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body #edit_id').val(id)
            modal.find('.modal-body #edit_prod_id').val(prod_id)
            modal.find('.modal-body #edit_category').val(category)
            modal.find('.modal-body #edit_name').val(name)
            modal.find('.modal-body #edit_company').val(company)
            modal.find('.modal-body #edit_img').val(img)
            modal.find('.modal-body #edit_processor').val(processor)
            modal.find('.modal-body #edit_battery').val(battery)
            modal.find('.modal-body #edit_display').val(display)
            modal.find('.modal-body #edit_ram').val(ram)
            modal.find('.modal-body #edit_fcamera').val(fcamera)
            modal.find('.modal-body #edit_rcamera').val(rcamera)
            modal.find('.modal-body #edit_os').val(os)
            modal.find('.modal-body #edit_storage').val(storage)
            modal.find('.modal-body #edit_video').val(video)
            })

            $('#deleteModal').on('show.bs.modal', function (event) {
            // console.log("modal open");
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('deleteid') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body #delete_id').val(id)
            })

            $('#product_table tfoot th').each( function () {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            });

            $('#product_table').DataTable({
                "order": [[ 0, "desc" ]],
                initComplete: function () {
                // Apply the search
                    this.api().columns().every( function () {
                        var that = this;
        
                        $( 'input', this.footer() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that
                                    .search( this.value )
                                    .draw();
                            }
                        });
                    });
                }
            }); 
        });
        
    </script>
</body>
</html>