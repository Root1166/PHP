<?php
include 'Des.php';
include 'convert.php';


//-------Start Sinh khoa
function convertKeyToHex($input){
	$hex = convert::stringToHex($input);
	$hex = "1234567890ABCD";
	$len = strlen($hex);
	// echo $len;
	if ($len >= 16) {
		$hex = substr($hex, 0, 16);
	} else {
		$soKyTuThem = 16 - $len;
		$padding = "";
		for ($i=0; $i<$soKyTuThem; $i++){
			$padding = $padding . "0";
		}
		$hex = $hex . $padding;
	}
	return $hex;
}
$key_string = empty($_POST['key']) ? '123456789ABCDF' : $_POST['key'];
$key_hex = convertKeyToHex($key_string); 
$key = $key_hex; 
// echo $key . "---- <br>";
$key_bin = convert::hexToBin($key);
$key_pc1 = convert::hoanVi($key_bin, destable::$pc1);
$catkey = convert::cat2($key_pc1);
$C[0] = $catkey[0];
$D[0] = $catkey[1];
for ($i=1; $i<=16; $i++){
	$bit = 2;
	if (($i==1) || ($i==2) || ($i==9) || ($i==16) ){
		$bit = 1;
	}
	$C[$i] = convert::dichTrai($C[$i-1], $bit);
	$D[$i] = convert::dichTrai($D[$i-1], $bit);
	$CD[$i] = $C[$i] . $D[$i];
	$K[$i] = convert::hoanVi($CD[$i], destable::$pc2);
	$K_hex[$i] = convert::binToHex($K[$i]);
}

//-------Start MA HOA
function Sbox($bit,$stt){
	if($stt==1){
		$arr2Chieu = convert::toArray2Chieu(destable::$s1);
	}
	if($stt==2){
		$arr2Chieu = convert::toArray2Chieu(destable::$s2);
	}
	if($stt==3){
		$arr2Chieu = convert::toArray2Chieu(destable::$s3);
	}
	if($stt==4){
		$arr2Chieu = convert::toArray2Chieu(destable::$s4);
	}
	if($stt==5){
		$arr2Chieu = convert::toArray2Chieu(destable::$s5);
	}
	if($stt==6){
		$arr2Chieu = convert::toArray2Chieu(destable::$s6);
	}
	if($stt==7){
		$arr2Chieu = convert::toArray2Chieu(destable::$s7);
	}
	if($stt==8){
		$arr2Chieu = convert::toArray2Chieu(destable::$s8);
	}
	$arrDec = convert::binTo2Dec($bit);
	$hang=$arrDec[0];
	$cot=$arrDec[1];
	$output = convert::dec16ToBin($arr2Chieu[$hang][$cot]);
	return $output;
}
function hamF($R, $K){
	$Rmorong = convert::hoanVi($R, destable::$e);
	$xorRK = convert::phepXOR($Rmorong, $K);
	$catxorRK = convert::cat8($xorRK);
	$strSbox = "";
	for ($i=1;$i<=8;$i++){
		$B[$i] = $catxorRK[$i-1];
		$BS[$i] = Sbox($B[$i], $i);
		$strSbox .= $BS[$i];
	}
	$f = convert::hoanVi($strSbox, destable::$p);
	return $f;
}
function catNho($input){
	$lenInput = strlen($input);
	$soKyTuThem = 16 - $lenInput % 16;
	if ($soKyTuThem > 0 && $soKyTuThem < 16){
		$padding = "";
		for ($i=0; $i<$soKyTuThem; $i++){
			$padding = $padding . "0";
		}
		$input_padding = $input . $padding;
	} else {
		$input_padding = $input;
	}
	$soKhoi = strlen($input_padding) / 16;
	$output = array();
	for ($i=0; $i<$soKhoi; $i++){
		$khoi = substr($input_padding, $i*16, 16);
		array_push($output, $khoi);
	}
	
	return $output;
}
$chuoi_can_ma_hoa = empty($_POST['mes']) ? 'text text text text' : $_POST['mes'];
$hex_chuoi_can_ma_hoa = convert::stringToHex($chuoi_can_ma_hoa);
// echo $chuoi_can_ma_hoa . "<br>";
$cacKhoi = catNho($hex_chuoi_can_ma_hoa);
$soKhoi = count($cacKhoi);

$banMa = "";
for ($j=0; $j<$soKhoi; $j++){
	// echo "<br>>>>>> Khoi " . ($j+1) . " : " . $cacKhoi[$j];
	$x = $cacKhoi[$j];//"AABA39284B27C849";
	$x_bin = convert::hexToBin($x);
	$x_ip = convert::hoanVi($x_bin, destable::$ip);
	$catx = convert::cat2($x_ip);
	$L[0] = $catx[0];
	$R[0] = $catx[1];
	for ($i=1; $i<=16; $i++){
		$L[$i] = $R[$i-1];
		$F = hamF($R[$i-1], $K[$i]);
		$R[$i] = convert::phepXOR($L[$i-1], $F);
	}
	$R16L16 = $R[16].$L[16];
	$y = convert::hoanVi($R16L16, destable::$ip_1);
	$y_hex = convert::binToHex($y);

	$banMa = $banMa . $y_hex;
}
// echo "<br> Ban ma tong: " . $banMa;


$cacKhoiMaHoa = catNho($banMa);
$soKhoiBanMa = count($cacKhoiMaHoa);
$banRoHex = "";
for ($j=0; $j<$soKhoiBanMa; $j++){
	// echo "<br>>>>>> Khoi ban ma " . ($j+1) . " : " . $cacKhoiMaHoa[$j];
	$x2 = $cacKhoiMaHoa[$j]; //$y_hex;//"29A68BA8BE7C3D4A";
	$x_bin = convert::hexToBin($x2);
	$x_ip = convert::hoanVi($x_bin, destable::$ip);
	$catx = convert::cat2($x_ip);
	$L[0] = $catx[0];
	$R[0] = $catx[1];
	for ($i=1; $i<=16; $i++){
		$L[$i] = $R[$i-1];
		$F = hamF($R[$i-1], $K[17-$i]);
		$R[$i] = convert::phepXOR($L[$i-1], $F);
	}
	$R16L16 = $R[16].$L[16];
	$y = convert::hoanVi($R16L16, destable::$ip_1);
	$y_hex = convert::binToHex($y);
	// echo "<br>Giai ma: ".$y_hex;
	$banRoHex = $banRoHex . $y_hex;
}
$banRo = convert::hexToString($banRoHex);
// echo "<br>Ban ro: " . $banRo;
//-------End GiA MA
?>
<!DOCTYPE html>
<html lang="en" style="background-color: aqua;">

<head>
    <title>Mã hóa des</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lab1.css">
</head>

<body class="container" style="padding-top:50px ">
    <div class="container">
        <h1 style="text-align: center;font-weight: bold;">Mã hóa DES</h1>
        <form method="post">
            <table width="600" hight="800" align="center" cellpadding="5" cellspacing="5">
                <tr>
                    <td>Key:</td>
                    <td>
                        <input type="text" name="key" size="80" value="<?php echo $key_string ?>">
                        </br>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                </tr>

                <tr>
                    <td>Mesa:</td>
                    <td>
                        <input type="text" name="mes" size="80" value="<?php echo $chuoi_can_ma_hoa ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="encr" size="30" value="Encrypt it">Submit</button>
                    </td>
                </tr>

            </table>
            <div class="row" style="font-size: 20px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h1 style="text-align: center;font-weight: bold;">Mã hóa và Giải mã DES</h1>
                    <br>
                    <p>
                        Mã hóa: <?php echo $banMa?>
                    </p>
                    <p>
                        Giải mã: <?php echo $banRo?>
                    </p>
                </div>
            </div>


        </form>


</body>

</html>