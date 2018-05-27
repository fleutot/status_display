<?php
/**
 * Created by PhpStorm.
 * User: andrei
 * Date: 25.05.2018
 * Time: 23:13
 */

if (isset ($_FILES['u_file'])) {
    header('Content-Type: text/html; charset=utf-8');

    try {

        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (
            !isset($_FILES['u_file']['error']) ||
            is_array($_FILES['u_file']['error'])
        ) {
            throw new RuntimeException('Invalid parameters.');
        }

        switch ($_FILES['u_file']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }


        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
                $finfo->file($_FILES['u_file']['tmp_name']),
                array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
            throw new RuntimeException('Invalid file format.');
        }

        if (!move_uploaded_file(
            $_FILES['u_file']['tmp_name'],
            __DIR__ . '/../resources/updated_image.jpg'
        )) {
            throw new RuntimeException('Failed to move uploaded file.');
        } else {
            file_put_contents(__DIR__ . '/../timestamp.txt', time());
            echo 'File was uploaded successfully.';
        }

    } catch (RuntimeException $e) {

        echo $e->getMessage();

    }
}

?>

<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Upload an image</title>
    <link rel="stylesheet" href="../w3.css">
</head>
<body>
<div class="w3-container w3-green">
    <h1>Upload an image</h1>
</div>

<form enctype="multipart/form-data" action="./" method="POST">
    Send this file: <input name="u_file" type="file"/>
    <input type="submit" value="Send File"/>
</form>
</body>
</html>
