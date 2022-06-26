<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Student</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h5 class="text-center my-4">Registration Page</h5>
    <?php
    $message = $this->session->userdata('message');
    if ($message) {
        echo "<p class='alert alert-danger'>$message</p>";
        $this->session->unset_userdata('message');
    }
    ?>
    <div class="w-50 mx-auto">
        <form action="<?php echo base_url(); ?>save_student" method="post">
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" name="student_name" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">Phone</label>
                <input type="text" name="student_phone" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">Roll</label>
                <input type="text" name="student_roll" class="form-control">
            </div>
            <input type="submit" name="submit" class="btn btn-success" id="submit">
        </form>
    </div>
</body>

</html>