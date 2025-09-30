<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Data Dosen</h2>
        <?php
            $Dosen = [
                'Nama' => 'Elok Nur Hamdana',
                'Domisili' => 'Malang',
                'Jenis Kelamin' => 'Perempuan'
            ];
        ?>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <?php foreach ($Dosen as $key => $value): ?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $value; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>
