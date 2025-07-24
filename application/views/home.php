<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/logo-white.webp'); ?> " />
    <title>Home</title>
    <style>
        .fixed-size-img {
            width: 100%;
            height: 450px;
            /* Adjust this height to your preference */
            object-fit: cover;
            /* Ensures the image maintains aspect ratio */
            border-radius: 8px;
            /* Optional: Adds rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Adds a subtle shadow */
        }

        .trending-items .down-content {
            min-height: 100px;
            /* Adjust as needed */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .trending-items h4 {
            font-size: 16px;
            /* Consistent font size */
            font-weight: bold;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            /* Prevent overflow */
        }

        .trending-items p {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
        }

        .trending-items {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            /* Makes all items equal height */
        }

        .trending-items h4:hover {
            white-space: normal;
            overflow: visible;
        }
    </style>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <?php include('assets/navbar_user.php') ?>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="caption header-text">
                        <h6>Welcome to ElyArchive</h6>
                        <h2>BEST READING SITE EVER!</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ullam dolorum ipsa dolor enim, magni at, possimus autem adipisci accusamus exercitationem, modi quae harum nobis aliquid aperiam nesciunt incidunt recusandae.</p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="right-image">
                        <img style="width: 500px;" src="
                        <?php echo base_url('assets/lux/assets/images/ebook.webp'); ?>
                        " alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <i style="color: white; padding-top: 20px;" class="fas fa-book-reader fa-3x"></i> <!-- Rent Book Icon -->
                            </div>
                            <h4>Rent Book</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <i style="color: white; padding-top: 20px;" class="fas fa-book-open fa-3x"></i> <!-- Read Book Icon -->
                            </div>
                            <h4>Read Book</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <i style="color: white; padding-top: 20px;" class="fas fa-heart fa-3x"></i> <!-- Wishlist Book Icon -->
                            </div>
                            <h4>Wishlist Book</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <i style="color: white; padding-top: 20px;" class="fas fa-laptop fa-3x"></i> <!-- Online Reading Icon -->
                            </div>
                            <h4>Online Reading</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>




    <div class="section trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>Random Books</h6>
                        <h2>Random Picks!</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-button">
                        <a href="<?php echo base_url('catalog'); ?>">View All</a>
                    </div>
                </div>
                <div class="row">
                    <?php if (!empty($random_books)): ?>
                        <?php foreach (array_slice($random_books, 0, 4) as $book): ?>
                            <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
                                <div class="item">
                                    <div class="thumb">
                                        <span class="price"><?= htmlspecialchars($book['type']); ?></span>
                                        <a href="<?= base_url('details?book_id=' . htmlspecialchars($book['book_id'] ?? '')); ?>">
                                            <?php if (!empty($book['gambar'])): ?>
                                                <?php if (strpos($book['gambar'], 'http') === 0): ?>
                                                    <img class="fixed-size-img" src="<?= htmlspecialchars($book['gambar']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                                                <?php else: ?>
                                                    <img class="fixed-size-img" src="assets/uploads/covers/<?= htmlspecialchars($book['gambar']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <img src="assets/images/default-cover.jpg" alt="No Image Available">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <a href="<?= base_url('details?book_id=' . htmlspecialchars($book['book_id'] ?? '')); ?>">
                                        <div class="down-content">
                                            <span class="category"><?= htmlspecialchars($book['genre_names'] ?? ''); ?></span>
                                            <h4><?= htmlspecialchars($book['title']); ?></h4>
                                            <p>by <?= htmlspecialchars($book['author']); ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No books available.</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>








    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2025 Nomoto. All rights reserved. &nbsp;&nbsp; </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <?php include('assets/css_user.php') ?>

    <script>
        function fetchNotifications() {
            $.ajax({
                url: "<?= base_url('NotificationController/getNotifications') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let notifContainer = $(".dropdown-notifications-list ul");
                    notifContainer.empty(); // Clear existing notifications

                    if (data.length > 0) {
                        data.forEach(notif => {
                            let notifHtml = `
                        <li class="list-group-item list-group-item-action dropdown-notifications-item">
                          <div class="d-flex">
                            <div class="flex-grow-1">
                              <h6 class="mb-1">Notification</h6>
                              <p class="mb-0">${notif.message}</p>
                              <small class="text-muted">Just now</small>
                            </div>
                          </div>
                        </li>
                    `;
                            notifContainer.append(notifHtml);
                        });

                        // Show an alert sound or popup if needed
                        new Audio("notification.mp3").play();
                    }
                }
            });
        }

        // Refresh notifications every 5 seconds
        setInterval(fetchNotifications, 5000);

        $(".dropdown-notifications-all").on("click", function() {
            $.ajax({
                url: "<?= base_url('NotificationController/markAsRead') ?>",
                type: "POST",
                success: function() {
                    $(".dropdown-notifications-list ul").empty();
                }
            });
        });
    </script>
</body>

</html>