<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/login.css">
    <link rel="shortcut icon" href="https://image.flaticon.com/icons/svg/786/786131.svg" type="image/x-icon">
    <title>Superadmin Login | ECom</title>
    <style>
        #h1{
            background-color:black;
            color:white
        }
    </style>
</head>
<body>


    <div class="container">
        <div class="containerr">
            <h1 id="h1" class="text-center">SuperAdmin Login</h1>
                <center><strong><?php echo $this->session->flashdata('err_message');?></strong></center>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="superadmin_login" method="post">
                        
                        <label for="username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="username" id="username" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required>
                            
                        <button type="submit" name="login">Login</button>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>