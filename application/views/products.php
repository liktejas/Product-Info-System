<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/786/786131.svg" type="image/x-icon">
    <title>Products | ECom</title>
    <style>
        .card-img-top{
            width: 60%;
            height: 15vw;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand mb-0 h1" href="#">ECom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url()?>">Home</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="#" id="ad_search">Advance Search</span></a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url()?>search" method="POST">
            <input class="form-control mr-sm-2" type="text" id="search" name="search_field" placeholder="Search Product" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
        </form>
    </div>
    </nav>
    <div class="container mt-3">
        <div id="select_box" class="text-center mb-3">
            <form action="<?php echo base_url()?>search" method="post">
                <select name="category" id="category" class="form-control mb-2">
                    <option value="">Select Category</option>
                    <?php
                    foreach($category as $row)
                    {
                        echo '<option value="'.$row->cat_id.'">'.$row->cat_name.'</option>';
                    }
                    ?>
                </select>
                <select name="company" id="company" class="form-control mb-2">
                    <option value="">Select Company</option>
                </select>
                <select name="item" id="item" class="form-control mb-2">
                    <option>Select Item</option>
                </select>
                <button type="submit" name="drop_search" class="btn btn-dark" id="adv_search">Search</button>
            </form>
        </div>
        <div class="row">
        <?php
            foreach ($db_products as $products)
            {
        ?>
            <div class="col-md-3 col-lg-3 text-center mb-3">
            <div class="card" style="width: 18rem;">
				  <a href="product_view?id=<?php echo $products->id?>">
                    <img class="card-img-top" src="<?php echo $products->img?>" alt="Card image cap">
                  </a>
				  <div class="card-body">
				  	<h5 class="card-title"><?php echo $products->name ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $products->company ?></h6>
				  </div>
			</div>
            </div>
            <?php
            }
            ?>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#select_box').hide();
            $('#adv_search').attr('disabled',true);
            $('#ad_search').click(function () { 
                $('#select_box').slideToggle();
            });

            $('#category').change(function () { 
                var category_id = $(this).val();
                if(category_id != '')
                {
                    $.ajax({
                        url: "<?php echo base_url();?>EController/fetch_company",
                        method: "POST",
                        data: {cat_id:category_id},
                        success: function (data)
                        {
                            $('#company').html(data);
                            $('#item').html('<option value="">Select Item</option>');
                        }
                    });
                }
                else
                {
                    $('#company').html('<option value="">Select Company</option>');
                    $('#item').html('<option value="">Select Item</option>');
                }
            });

            $('#company').change(function () { 
                var company_id = $(this).val();
                if(company_id != '')
                {
                    $.ajax({
                        url: "<?php echo base_url();?>EController/fetch_item",
                        method: "POST",
                        data: {comp_id:company_id},
                        success: function (data)
                        {
                            $('#item').html(data);    
                        }
                    });
                }
                else
                {
                    $('#item').html('<option value="">Select Item</option>');
                }
            });

            $('#item').change(function () {
                $('#adv_search').attr('disabled',false);
            });
        });
    </script>
</body>
</html>