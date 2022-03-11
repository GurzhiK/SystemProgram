<?php
define("SALT","gfklhjr09j5FDGfkj49llkrjltreGuxLWQtKweKEMV4");
define("PASSWORD","ejhjkerht9348hhjkehtkjer");

function encode($String, $Password,$Salt) {
    $StrLen = strlen($String);
    $Seq = $Password;
    $Gamma = '';
    while (strlen($Gamma)<$StrLen)
    {
        $Seq = pack("H*",sha1($Gamma.$Seq.$Salt)); 
        $Gamma.=substr($Seq,0,8);
    }
    return $String^$Gamma;
}

$s=readline("Введите содержимое строки");
$enc=encode($s,PASSWORD,SALT);
$dec=encode($enc,PASSWORD,SALT);

echo 'Изначальная строка: '.$s.''; 
echo ' Зашифрованная строка: '.base64_encode($enc).'';
echo ' Расшифрованная строка: '.$dec.'';
?>