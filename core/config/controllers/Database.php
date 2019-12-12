<?php

global $conn;


$conn = $observer['wConnect']->exeMethod('connectDB', wINFO['hostName'], wINFO['dataBase'], wINFO['userName'], wINFO['passWord']);