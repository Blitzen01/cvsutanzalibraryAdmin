<?php
    include '../connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';

    if(isset($_GET['mainText'])) {
        $mainText = $_GET['mainText'];
        $pages = $_GET['pages'];
    }

    // Corrected SELECT query
    $stmt = $pdo->prepare("SELECT subText FROM librarypages WHERE mainText = :mainText AND pages = :pages");
    $stmt->bindParam(':mainText', $mainText);
    $stmt->bindParam(':pages', $pages);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentSubText = $result['subText'];

    if(isset($_POST['saveChanges'])) {
        $subText = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadedFile = $_FILES['image'];
            $imageUploadDirectory = "../uploads/images/";
            $uploadPath = $imageUploadDirectory . basename($uploadedFile['name']);

            if (move_uploaded_file($uploadedFile['tmp_name'], $uploadPath)) {
                // File upload successful
                // Update the database with the new subText and image name
                $subText = $uploadedFile['name'];

                $sql = "UPDATE librarypages SET subText = :subText WHERE mainText = :mainText AND pages = :pages";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':subText', $subText);
                $stmt->bindParam(':mainText', $mainText);
                $stmt->bindParam(':pages', $pages);
                $stmt->execute();

                echo "Changes saved successfully.";
                echo "<script>window.location.href = '../../librarypages/opacSearch.php';</script>";
            } else {
                // File upload failed
                echo "Failed to upload the image.";
            }
        } else {
            // No file uploaded
            echo "Please choose an image to upload.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Opac Search Background</title>

        <link rel="stylesheet" href="../assets/style/style.css">

        <style>
            textarea {
                resize: none;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5 card p-2">
            <div class="text-end">
                <a class="nav-link p-2" href="../../libraryPages/opacSearch.php"><i class="fa-solid fa-x"></i></a>
            </div>
            <h1 class="text-center">Update Opac Search Background</h1>

            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="mainText" value="<?php echo $mainText; ?>">
                <input type="hidden" name="pages" value="<?php echo $pages; ?>">

                <div class="input-group p-3">
                    <label class="input-group-text" for="image">Upload</label>
                    <input class="form-control" type="file" name="image" id="image" accept="image/*">
                </div>

                <div class="text-end">
                    <button type="submit" name="saveChanges" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </body>

</html>