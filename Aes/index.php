<?php
    require 'aes.php';     //  Triển khai PHP AES
    require 'CtrAes.php';  //  Triển khai Chế độ đếm AES
    $timer = microtime(true);

    //khởi tạo key và plaintext 
    $pw = empty($_POST['pw']) ? 'keykeykey' : $_POST['pw'];
    $pt = empty($_POST['pt']) ? 'mesagez' : $_POST['pt'];
    $cipher = empty($_POST['cipher']) ? '' : $_POST['cipher'];
    $plain  = empty($_POST['plain'])  ? '' : $_POST['plain'];

    // thực hiện mã hóa và giải mã
    $encr = empty($_POST['encr']) ? $cipher : AesCtr::encrypt($pt, $pw, 256);
    $decr = empty($_POST['decr']) ? $plain  : AesCtr::decrypt($cipher, $pw, 256);
?>
<!DOCTYPE html>
<html lang="en" style="background-color: aqua;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <title>AES in PHP test harness</title>
</head>

<body class="container" style="padding-top:50px ">
<h1 style="text-align: center;font-weight: bold;">MÃ hóa AES</h1>
    <form method="post">
        <table width="600" hight="800" align="center" cellpadding="5" cellspacing="5">
            <tr>
                <td>Key:</td>
                <td>
                    <input type="text" name="pw" size="80" value="<?php echo $pw ?>">
                    </br>
                </td>
            </tr>
            <tr>
                    <td>&nbsp</td>
            </tr>
           
            <tr>
                <td>Mesa:</td>
                <td>
                    <input type="text" name="pt" size="80" value="<?php echo htmlspecialchars($pt) ?>">
                </td>
            </tr>
            <tr>
                    <td>&nbsp</td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="encr" value="Encrypt it" class="btn btn-success">Encrypt it</button>
                </td>
                <td>
                    <input type="text" name="cipher" size="80" value="<?php echo $encr ?>">
                </td>
            </tr>
            <tr>
                    <td>&nbsp</td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="decr" value="Decrypt it" class="btn btn-primary">Decrypt it</button>
                </td>
                <td>
                    <input type="text" name="plain" size="80" value="<?php echo htmlspecialchars($decr) ?>">
                </td>
            </tr>
            
        </table>

    </form>

</body>

</html>