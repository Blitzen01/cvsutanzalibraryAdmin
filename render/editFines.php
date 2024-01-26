<?php
    include 'connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';

    if(isset($_GET['mainText'])) {
        $mainText = $_GET['mainText'];
        $subText = $_GET['subText'];
        $links = $_GET['links'];
    }

    if(isset($_POST['saveChanges'])) {
        $links = $_POST['links'];
        $mainText = $_POST['mainText'];
        $subText = $_POST['subText'];

        // Update the record in the database using prepared statement
        $updateQuery = "UPDATE librarypages SET links = ? WHERE mainText = ? AND subText = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("sss", $links, $mainText, $subText);
        
        if($stmt->execute()) {
            echo "Record updated successfully.";
            echo '<script type="text/javascript">setTimeout(function(){ location.href = "../librarypages/opacSearch.php"; }, 500);</script>';
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Fines</title>

        <link rel="stylesheet" href="../assets/style/style.css">

        <style>
            textarea {
                resize: none;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5 card p-2 w-50">
            <div class="text-end">
                <a class="nav-link p-2" href="../libraryPages/opacSearch.php"><i class="fa-solid fa-x"></i></a>
            </div>
            <h1 class="text-center">UPDATE FINES</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label class="ps-3" for="links"><?php echo strtoupper($mainText . ' ' . $subText); ?></label>
                    <input class="form-control mb-2" name="links" id="links" value="<?php echo $links; ?>">
                </div>

                <input type="hidden" name="mainText" value="<?php echo $mainText; ?>">
                <input type="hidden" name="subText" value="<?php echo $subText; ?>">

                <div class="text-end">
                    <button type="submit" name="saveChanges" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </body>

</html>