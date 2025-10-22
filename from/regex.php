<!DOCTYPE html>
<html>
<head>
    <title>Regex PHP</title>
</head>
<body>
    <h2>Regex PHP</h2>

    <?php
    $pattern = '/[0-9]+/';
    $text = 'There are 123 apples.';

    if (preg_match($pattern, $text, $matches)) {
        echo "<h3>Hasil preg_match:</h3>";
        echo "Cocokkan: " . $matches[0] . "<br><br>";
    } else {
        echo "Tidak ada yang cocok!<br><br>";
    }

    $pattern = '/apple/';
    $replacement = 'banana';
    $text = 'I like apple pie.';

    $new_text = preg_replace($pattern, $replacement, $text);
    echo "<h3>Hasil preg_replace:</h3>";
    echo $new_text . "<br><br>";

    $pattern = '/go*d/';
    $text = 'god is good.';

    if (preg_match($pattern, $text, $matches)) {
        echo "<h3>Hasil preg_match (Huruf dengan *):</h3>";
        echo "Cocokkan: " . $matches[0] . "<br><br>";
    } else {
        echo "Tidak ada yang cocok!<br><br>";
    }

    $pattern = '/go{2,4}d/';
    $text = 'god is good, goood, and goooood.';

    if (preg_match_all($pattern, $text, $matches)) {
        echo "<h3>Hasil preg_match ({n,m}):</h3>";
        echo "Cocokkan: " . implode(", ", $matches[0]);
    } else {
        echo "Tidak ada yang cocok!";
    }
    ?>
</body>
</html>
