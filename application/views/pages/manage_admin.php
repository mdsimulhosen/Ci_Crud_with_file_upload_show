<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="w-75 mx-auto mt-5 text-center text-uppercase">
        <h1>Manage Admin List</h1>
    </div>
    <?php
    $admin_name = $this->session->userdata('admin_name');
    $message = $this->session->userdata('message');
    echo "<p class='bg-info py-3 text-uppercase text-center fw-bold'>Login as : $admin_name</p>";
    if ($message) {
        echo "<p class='alert alert-danger py-3 text-center fw-bold'>$message </p>";
        $this->session->unset_userdata('message');
    }
    ?>
    <div class="px-5">
        <a href="<?php echo base_url() ?>admin/admin_register" class="btn btn-primary mb-4 float-end">Add Admin</a>
        <table id="tab_owner" class="table table-hover table-responsive table-bordered text-center">
            <thead>

                <tr>
                    <th class="text-uppercase">Admin Name</th>
                    <th class="text-uppercase">Admin Email</th>
                    <th class="text-uppercase">Admin Photo</th>
                    <th class="text-uppercase">Action</th>

                </tr>


            </thead>
            <tbody>
                <?php
                foreach ($manage_admin as $view_info) { ?>
                    <tr>
                        <td><?php echo $view_info->admin_name; ?></td>
                        <td><?php echo $view_info->email; ?></td>
                        <td><img src="<?php echo base_url() ?>/<?php echo $view_info->admin_image; ?>" class="h-25 w-25" alt=""></td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <div><a href="<?php echo base_url() ?>admin/admin_registration/$<?php echo $view_info->id ?>"><i class="fa-solid fa-edit text-success p-1"></i></a></div>
                                <div><a href="<?php echo base_url() ?>/delete_student<?php echo $view_info->id ?>" class=""><i class="fa-solid fa-trash-can text-danger p-1"></i></a></div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="<?php echo base_url() ?>logout" class="btn btn-danger float-end text-white font-size-20 text-dark text-center">Logout</a>
    </div>
    <img src="/admin-images/024685f4b6d94de94ad92858e5a77030.png" alt="">
    <script src="<?php echo base_url() ?>assets/js/pages/jquery-3.2.1.min.js"></script>
</body>

</html>