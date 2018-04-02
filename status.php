<?php
if($_POST['statusFormSubmit'] == "Submit")
{
    //alert("in php");
    $varStatus = $_POST['statusInput'];
    //alert("$varStatus");
    $path=$_SERVER['DOCUMENT_ROOT'] . '/mydata.txt';

    $fs = fopen($path, "w");
    if ( !$fs) {
        echo 'last error: ';
        var_dump(error_get_last());
        exit;
    }

    $result = fwrite($fs, $varStatus . "\n");
    if ( !$result ) {
        echo 'last error: ';
        var_dump(error_get_last());
        exit;
    }

    header("Location: thankyou.html");
    exit;
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

<html>
  <head >
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title >Form page: status</title>
  </head>
  <body>
    <h1>Your status:</h1>

    <form id='form_status' method='post' action='status.php' >
      <p>
        <input type='text' name='statusInput' maxlength="140" value="<?=$varStatus;?>">
      </p>
      <p>
        <input type='submit' name='statusFormSubmit' value='Submit' />
      </p>
    </form>

  </body>
</html>
