<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h5 class="text-center my-4">Admin Registration</h5>
    <div class="w-50 mx-auto">
        <form action="<?php echo base_url(); ?>admin_register" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <label for="" form-label>Admin Name</label>
                <input type="text" name="admin_name" class="form-control">
            </div>
            <div class="mb-2">
                <label for="" form-label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-2">
                <label for="" form-label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" form-label>Admin Image</label>
                <input type="file" name="profile_image" class="form-control" required>
            </div>

            <input type="submit" name="submit" class="btn btn-success" value="Register" id="submit">
            <input type="reset" name="clear" class="btn btn-danger" value="Clear">
        </form>
    </div>
</body>

</html>