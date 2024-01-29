<?php

function getClientIP()
{
    $ipaddress = '';

    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

$ip = getClientIP();
$url = "http://ip-api.com/json/" . $ip;
$content = file_get_contents($url);
$json = json_decode($content, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PHP - IP Address & Location</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e0e0e0;
        }

        .ip-info {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .info {
            margin-top: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        .info p strong {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="ip-info">
        <h1>IP Address & Location</h1>
        <div class="info">
            <p><strong>City:</strong> <span>
                    <?php echo $json["city"]; ?>
                </span></p>
            <p><strong>Country:</strong> <span>
                    <?php echo $json["country"]; ?>
                </span></p>
        </div>
    </div>
</body>

</html>