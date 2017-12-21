<?php

include "bootstrap/app.php";

$redis = new \Redis();
$redis->open('127.0.0.1', '6379');
$redis->auth('123456');
dd($redis);
