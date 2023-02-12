<?php

namespace App\Http\Controllers;

use App\Models\Message;

class ContactController extends Controller
{
$client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
$user = "faridg3";
$pass = "MasterSMSPass!";
$fromNum = "+983000505";
$toNum = array("9353773537");
$pattern_code = "5b9j5lcy9t";
$input_data = array("mobile" => "1054 4-41");
echo $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
}
