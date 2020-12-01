<?php
define("SERVER", "https://electionapp.000webhostapp.com");
define("API_KEY", "02edf5fb39e269185678a23a728b18b19f0008c0");

define("USE_SPECIFIED", 0);
define("USE_ALL_DEVICES", 1);
define("USE_ALL_SIMS", 2);

require 'vendor/autoload.php';
use App\SmsClass;

//SmsClass::sendSingleMessage('+2348062811575','testing an API');
var_dump(SmsClass::getBalance());