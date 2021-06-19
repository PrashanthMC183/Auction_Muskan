<?php
require('../textlocal.class.php');

$textlocal = new Textlocal('shmr_ahmed@hotmail.com', 'Aa@12345');

$numbers = array(918722197768);
$sender = 'TXTLCL';
$message = 'This is a message';

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    print_r($result);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>