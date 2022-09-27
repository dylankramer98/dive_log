<?php

require('functions.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dive_log</title>
    <link href="css/normalizer.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="titleBar">
    <div>
        <h1>Dylan's Dive Log</h1>
        <h2>“For most of history, man has had to fight nature to survive; in this century he is beginning to realize that, in order to survive, he must protect it.” ~ Jacques-Yves Cousteau</h2>
    </div>

</div>

<div class="container">
    <?php
    $db = connect_to_db('diver_log');
    $dives = extract_from_db($db);
    ?>
</div>
</body>

</html>