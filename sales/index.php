<?php
if($_POST['statusFormSubmit'] == "Submit")
{
    //alert("in php");
    $varStatus = $_POST['statusInput'];
    //alert("$varStatus");
    $path=$_SERVER['DOCUMENT_ROOT'] . '/resources/sales.txt';
    alert("$path");
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

    $thankyou="/resources/thankyou.html";
    header("Location: $thankyou");
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
    <link rel="stylesheet" href="../w3.css">
  </head>
  <body>
    <div class="w3-container w3-red">
      <h1>sales</h1>
    </div>

    Status:

    <form id='form_status' method='post' action='index.php' >
      <p>
        <input type='text' name='statusInput' maxlength="140" value="<?=$varStatus;?>">
      </p>
      <p>
        <input type='submit' name='statusFormSubmit' value='Submit' />
      </p>
    </form>

  </body>
</html>
