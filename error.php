<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #ff0000;
            background: rebeccapurple;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Oh no you've encounter an error, please go back!</p>
    </div>
    <?php
$item = array(1, 2, 3, 4, 5);
foreach ($item as &$value) {
    shuffle($item);
    echo "<br>" . $value;
}
?>
</body>

</html>