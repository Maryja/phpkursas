<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="data.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
Yours photo: <input name="file[]" type="file" multiple>
    <input type="submit" value="Send File" />


</form>

<?php
    $read = 'files.txt';
    if(!empty($read)):
        $file_data = file($read);
        foreach($file_data as $read):
            echo $read."<br>";
        endforeach;
    endif;
?>
</body>
</html>