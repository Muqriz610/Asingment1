<?php
include 'scrape.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wired Headlines</title>
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #000;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Wired Headlines</h1>
    <ul>
    <?php
        if (isset($wiredHeadlines) && is_array($wiredHeadlines)) {
            foreach ($wiredHeadlines as $headline) {
                echo "<li><a href=\"{$headline['link']}\" target=\"_blank\">{$headline['title']}</a> - Published on {$headline['published']}</li>";
            }
        } else {
            echo "<li>No headlines available</li>";
        }
        ?>
    </ul>
</body>
</html>
