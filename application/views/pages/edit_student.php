<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Student Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h3 class="text-center mt-5">Edit Student Information</h3>
    <div class="w-50 mx-auto">
        <form action="<?php echo base_url(); ?>update_student" method="post">
            <div class="mb-2">
                <input type="hidden" name="id" class="form-control" value="<?php echo $student_info->id; ?>">
            </div>
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" name="student_name" class="form-control" value="<?php echo $student_info->student_name; ?>">
            </div>
            <div class="mb-2">
                <label for="">Phone</label>
                <input type="text" name="student_phone" class="form-control" value="<?php echo $student_info->student_phone; ?>">
            </div>
            <div class="mb-2">
                <label for="">Roll</label>
                <input type="text" name="student_roll" class="form-control" value="<?php echo $student_info->student_roll; ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-success" id="submit">
        </form>
    </div>
</body>

</html>