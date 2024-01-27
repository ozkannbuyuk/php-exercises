<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Currency Rate</title>
    <style>
        body {
            background-color: #f0f0f0;
            height: 100vh;
            display: grid;
            place-items: center;
            font-family: 'Arial', sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 60%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 15px 20px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #000000;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    $jsonData = file_get_contents("https://finans.truncgil.com/today.json");
    $data = json_decode($jsonData, true);
    ?>

    <table>
        <thead>
            <tr>
                <th>Currency</th>
                <th>Buy</th>
                <th>Sell</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Dollar</td>
                <td>
                    <?= $data["USD"]["Alış"] ?>
                </td>
                <td>
                    <?= $data["USD"]["Satış"] ?>
                </td>
            </tr>
            <tr>
                <td>Euro</td>
                <td>
                    <?= $data["EUR"]["Alış"] ?>
                </td>
                <td>
                    <?= $data["EUR"]["Satış"] ?>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>