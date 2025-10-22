<!DOCTYPE html>
<html>
<head>
    <title>Multiupload Gambar</title>
</head>
<body>

    <h2>Unggah Beberapa Gambar</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="multiple" accept=".jpg, .jpeg, .png, .gif">
        <input type="submit" name="submit" value="Unggah" />
    </form>

    <hr>

    <?php
    if (isset($_POST['submit'])) {
        $targetDirectory = "images/"; 

        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        if ($_FILES['files']['name'][0]) {
            $totalFiles = count($_FILES['files']['name']);
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            $maxsize = 5 * 1024 * 1024;

            for ($i = 0; $i < $totalFiles; $i++) {
                $fileName = $_FILES['files']['name'][$i];
                $fileTmp = $_FILES['files']['tmp_name'][$i];
                $targetFile = $targetDirectory . $fileName;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                if (in_array($fileType, $allowedExtensions) && $_FILES['files']['size'][$i] <= $maxsize) {
                    if (move_uploaded_file($fileTmp, $targetFile)) {
                        echo "File <b>$fileName</b> berhasil diunggah.<br>";
                        echo "<img src='$targetFile' width='200' style='height:auto; border:1px solid #ccc; margin:10px;'>";
                    } else {
                        echo "Gagal mengunggah file <b>$fileName</b>.<br>";
                    }
                } else {
                    echo "File <b>$fileName</b> tidak valid atau melebihi ukuran maksimum.<br>";
                }
            }
        } else {
            echo "Tidak ada file yang diunggah.";
        }
    }
    ?>
</body>
</html>
