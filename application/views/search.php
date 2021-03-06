<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/786/786131.svg" type="image/x-icon">
    <title>Searched Results | ECom</title>
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
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url()?>search" method="POST">
            <input class="form-control mr-sm-2" type="text" id="search" name="search_field" placeholder="Search Product" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
        </form>
    </div>
    </nav>
    
    <div class="container mt-3">
    
        <h3>You searched for "<?php echo $searched_query?>"</h3>
        <div class="row">
            <?php
            foreach($product_result as $products)
            {
            ?>
            <div class="col-md-3 col-lg-3 text-center mb-4">
                <div class="card" style="width: 18rem;">
                    <a href="product_view?id=<?php echo $products->id?>">
                        <img src="<?php echo $products->img?>" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $products->name ?></h5>
                        <h6 class="card-subtitle text-muted"><?php echo $products->company ?></h6>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        

        According to your search, Total No. of Products found is <?php echo $number_of_results?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>