<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        
        <link rel="stylesheet" href="../assets/style/style.css">

        <style>
            /* admin home | embed */
            .embed-container {
                max-width: 100%;
                overflow: hidden;
            }

            .custom-embed {
                position: relative;
                /* Adjust the padding-bottom value for your desired aspect ratio */
                padding-bottom: 125%; /* Example: 3:4 aspect ratio */
                height: 0;
                overflow: hidden;
                max-width: 100%;
            }

            .custom-embed iframe,
            .custom-embed object,
            .custom-embed embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            /* admin home | embed */

            /* resign for the mobile device */
            @media screen and (max-width: 600px) {
                .custom-embed {
                    padding-bottom: 200%;
                }
            }
        </style>
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">Home</h1>
                
                <div class="text-center p-4 mx-auto w-lg-40 ">
                    <div id="createPostBtn" class="pointer mt-2 mb-5">
                        <div class="shadow border rounded">
                            <div class="col-lg-10 my-3 mx-auto">
                                <div class="row text-center pb-2">
                                    <span class="border border-dark rounded-pill p-2 post-text">CREATE ANNOUNCEMENT</span>
                                </div>
                                <div class="row post-text-icon">
                                    <div class="col border border-dark rounded-pill m-1 ">
                                        <span><i class="fa-solid fa-camera"></i> PHOTO</span>
                                    </div>
                                    <div class="col border border-dark rounded-pill m-1">
                                        <span><i class="fa-solid fa-video"></i> VIDEO</span>
                                    </div>
                                    <div class="col border border-dark rounded-pill m-1">
                                        <span>&lt;/&gt; EMBED</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <?php
                        # Select data
                        $select_sql = "SELECT * FROM createpost ORDER BY timestamp DESC";
                        $select_sql1 = mysqli_query($conn, $select_sql);

                        if ($select_sql1) { // Check if the query was successful
                            while ($row = mysqli_fetch_array($select_sql1)) {
                                ?>
                                <div class="row shadow border rounded mb-3">
                                    <div class="row">
                                        <div class="col-1 ms-auto">
                                            <button class="btn delete-post-btn" data-post-id="<?php echo $row['id']; ?>"><i class="fa-solid fa-x"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 mx-auto">
                                        <div class="">
                                            <?php if (isset($row['text']) || isset($row['image_url']) || isset($row['video_url'])) { ?>
                                                <div class="mb-3 pb-3 px-auto text-center border rounded">
                                                    <?php if (isset($row['text'])) { ?>
                                                        <p><?php echo $row['text']; ?></p>
                                                    <?php } ?>

                                                    <?php if (isset($row['image_url']) && !empty($row['image_url'])) {
                                                        $images = explode(',', $row['image_url']);
                                                        if (!empty($images)) {
                                                            foreach ($images as $image) { ?>
                                                                <img src="../render/uploads/images/<?php echo $image; ?>" alt="" srcset="" class="mb-2">
                                                            <?php }
                                                        }
                                                    } ?>

                                                    <?php if (isset($row['video_url']) && !empty($row['video_url'])) { ?>
                                                        <video width="100%" height="auto" controls class="mb-2">
                                                            <source src="../render/uploads/videos/<?php echo $row['video_url']; ?>" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    <?php } ?>

                                                    <?php if (isset($row['embed_code']) && !empty($row['embed_code'])) { ?>
                                                        <div class="embed-container p-2">
                                                            <div class="custom-embed">
                                                                <?php echo $row['embed_code']; ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                </div>
                                            <?php } else { ?>
                                                <p>No content available</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn); // Output the error message
                        }
                        ?>
                    </div>

                </div>
            </section>
        </div>

        
        <script src="../assets/script/script.js"></script>

        <script>
            // admin create post
            const createPostBtn = document.getElementById('createPostBtn');
            createPostBtn.onclick = function() {
                window.location.href = "../render/uploadForm.php";
            }

            // AJAX script for deleting announcement
            $(document).ready(function () {
                $('.delete-post-btn').click(function () {
                    // Get the post ID from the data attribute
                    var postId = $(this).data('post-id');

                    // Redirect to the confirmation page with the post ID as a parameter
                    window.location.href = '../render/confirm_delete.php?postId=' + postId;
                });
            });

                // AJAX script for deleting announcement

        </script>
        
    </body>
</html>