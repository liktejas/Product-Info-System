<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $products_detail->name ?>  | ECom</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/786/786131.svg" type="image/x-icon">
    <style>
    .custom_font{
        font-family: 'Nunito', sans-serif;
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
        </ul>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url()?>search" method="POST">
            <input class="form-control mr-sm-2" type="text" id="search" name="search_field" placeholder="Search Product" aria-label="Search" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
        </form>
    </div>
    </nav>

    <div class="container-fluid">
        <button id="go_back" class="btn btn-info mt-2 mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</button>
        <div class="jumbotron">
            <div class="row">
                    <div class="col-lg-3">
                        <img width="250" src="<?php echo $products_detail->img?>" alt="Card image cap">
                    </div>
                    <div class="col-lg-9">
                        <h1><?php echo $products_detail->name ?></h1>
                        <h3 class="text-muted"><?php echo $products_detail->company ?></h3>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <div class="text-center mb-3">
                                    <img src="https://image.flaticon.com/icons/svg/2948/2948358.svg" width="50" alt="processor"><div class="text-muted">Processor</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->processor ?></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <div class="text-center mb-3">
                                <img src="https://image.flaticon.com/icons/svg/2359/2359083.svg" alt="battery" width="50">
                                <div class="text-muted">Battery</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->battery ?></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                            <br>
                                <div class="text-center mb-3">
                                <img src="https://image.flaticon.com/icons/svg/1813/1813131.svg" alt="ram" width="50">
                                <div class="text-muted">Display</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->display ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <div class="text-center mb-3">
                                    <img src="https://image.flaticon.com/icons/svg/2206/2206440.svg" width="50" alt="processor"><div class="text-muted">Front Camera</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->fcamera ?></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <div class="text-center mb-3">
                                <img src="https://image.flaticon.com/icons/svg/2597/2597946.svg" alt="battery" width="50">
                                <div class="text-muted">Rear Camera</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->rcamera ?></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                            <br>
                                <div class="text-center mb-3">
                                <img src="https://image.flaticon.com/icons/svg/900/900330.svg" alt="ram" width="50">
                                <div class="text-muted">RAM</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->ram ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <div class="text-center mb-3">
                                    <img src="https://image.flaticon.com/icons/svg/995/995320.svg" width="50" alt="processor"><div class="text-muted">Operating System</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->os ?></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <div class="text-center mb-3">
                                <img src="https://image.flaticon.com/icons/svg/834/834223.svg" alt="battery" width="50">
                                <div class="text-muted">Storage</div>
                                </div>
                                <p class="text-center custom_font"><?php echo $products_detail->storage ?></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <br>
                                <br>
                                <div class="text-center mb-3">
                                    <button id="click_here" class="btn btn-secondary btn-lg btn-block">Watch Review/Unboxing Video</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="iframe_row">
                    <div class="col-lg-3 col-sm-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <div class="text-center mt-3">
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="<?php echo $products_detail->video?>"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3">
                    </div>
                </div>                
            </div>
        </div>

        <!-- RELATED PRODUCTS -->
        <?php
            if(empty($related_products))
            {
                // echo 'empty';
            }
            else
            {
            ?>
                <div class="container-fluid">
                    <h1>Related Products:</h1>
                    <div class="row">
                        <?php
                        foreach($related_products as $related)
                        {
                        ?>
                        <div class="col-md-3 col-lg-3 text-center">
                            <div class="card" style="width: 18rem;">
                                <a href="product_view?id=<?php echo $related->id?>">
                                    <img src="<?php echo $related->img?>" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $related->name ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $related->company ?></h6>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            <?php
            }
            ?>
            
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#iframe_row').hide();
        $('#click_here').click(function () { 
            $('#iframe_row').slideToggle(1000,'swing');
        });
        $('#go_back').click(function(){
            window.history.go(-1);
        });
    });
    </script>
</body>
</html>