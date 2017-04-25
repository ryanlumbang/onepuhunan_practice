<html>

<head>
    <title>Upload Form</title>
</head>

<body>
<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>

<form method="post" enctype="multipart/form-data">
    <label>Choose File</label>
    <input type="file" name="file" />
    <input type="submit" name="submit" value="Upload">
</form>

</body>

</html>