<?php


   require_once('SHIN_Image.php');


   $result = move_uploaded_file($_FILES['img']['tmp_name'], $_FILES['img']['name']);
   
   if($result) {
    
    $image  =   new SHIN_Image();
       
    $image->load($_FILES['img']['name'])->resize(90, 50)->saveToFile('thumb_' . $_FILES['img']['name']); 
       
    echo 'alert("File was uploaded.")';    
   } else {
    switch($_FILES['img']['error']) {
        case 1:
            $message    =   'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
            break;
        case 2:
            $message    =   'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
            break;
        case 3:
            $message    =   'The uploaded file was only partially uploaded.';
            break;
        case 4:
            $message    =   'No file was uploaded.';
            break;
        case 5:
            $message    =   'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
            break;
        case 6:
            $message    =   'Failed to write file to disk. Introduced in PHP 5.1.0.';
            break;
        case 7:
            $message    =   'File upload stopped by extension. Introduced in PHP 5.2.0.';
            break;
    }   
    echo 'alert("Error while occure while upload file. Error:' . $message . '")';    
   }
   