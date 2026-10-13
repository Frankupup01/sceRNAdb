
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// TRACK/track.php
session_start();
$DS = DIRECTORY_SEPARATOR;
require dirname(__DIR__)."{$DS}app{$DS}Db.class.php";
require dirname(__DIR__)."{$DS}app{$DS}Func.php";

// 获取访客 IP
$ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';

// 调用 IP 定位 API
$response = @file_get_contents("http://ip-api.com/json/{$ip}?fields=status,country,regionName,city,query");
$data = json_decode($response, true);

$country = $data['country'] ?? 'Unknown';
$region  = $data['regionName'] ?? 'Unknown';
$city    = $data['city'] ?? 'Unknown';

// 插入数据库
Db::table('user_tracking')->insert([
    'ip_address' => $ip,
    'country'    => $country,
    'region'     => $region,
    'city'       => $city,
    'visit_time' => date('Y-m-d H:i:s')
]);

// 返回简单信息，可选
echo json_encode(['status'=>'ok','ip'=>$ip]);
?>