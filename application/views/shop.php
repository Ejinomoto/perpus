<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/logo-white.webp'); ?> " />
  <title>Catalog</title>

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

    /* Pagination Container */
    /* Custom Pagination Container */
    .custom-pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      list-style: none;
      padding: 0;
      margin-top: 20px;
    }

    /* Pagination Buttons */
    .custom-pagination li {
      margin: 0 5px;
    }

    .custom-pagination a {
      display: block;
      padding: 10px 15px;
      text-decoration: none;
      color: #007bff;
      /* Blue accent */
      background-color: white;
      border: 2px solid #007bff;
      border-radius: 5px;
      transition: all 0.3s ease-in-out;
      font-weight: bold;
    }

    /* Active Page */
    .custom-pagination .is-active a {
      background-color: #007bff;
      color: white;
    }

    /* Hover Effect */
    .custom-pagination a:hover {
      background-color: #0056b3;
      color: white;
    }

    /* Disabled Pagination */
    .custom-pagination .disabled a {
      pointer-events: none;
      background-color: #ccc;
      border-color: #ccc;
      color: #666;
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

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Catalog</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Catalog</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter" style="margin-bottom:100px">
        <li>
          <a class="<?= empty($_GET['genre']) ? 'is_active' : ''; ?>"
            href="<?= base_url('catalog'); ?>">All</a>
        </li>
        <?php foreach ($genres as $genre): ?>
          <li>
            <a class="<?= (!empty($_GET['genre']) && $_GET['genre'] == $genre['name']) ? 'is_active' : ''; ?>"
              href="<?= base_url('catalog?genre=' . urlencode($genre['name'])); ?>">
              <?= htmlspecialchars($genre['name']); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>



      <div class="row">
        <?php foreach ($books as $book): ?>
          <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items 
     <?php foreach (explode(',', $book['genre_names'] ?? '') as $genre): ?>
         genre-<?= htmlspecialchars(strtolower(str_replace(' ', '-', trim($genre)))); ?>
     <?php endforeach; ?>">

            <div class="item">
              <div class="thumb">
                <a href="<?= base_url('details?book_id=' . htmlspecialchars($book['book_id'] ?? '')); ?>">
                  <span class="price"><?= htmlspecialchars($book['type']); ?></span>
                  <?php if (!empty($book['gambar'])): ?>
                    <?php if (strpos($book['gambar'], 'http') === 0): ?>
                      <img loading="lazy" class="fixed-size-img" src="<?= htmlspecialchars($book['gambar']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
                    <?php else: ?>
                      <img loading="lazy" class="fixed-size-img" src="assets/uploads/covers/<?= htmlspecialchars($book['gambar']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
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
      </div>

      <!-- Pagination -->
      <div class="row">
        <div class="col-lg-12">
          <?= $pagination; ?> <!-- Display pagination links -->
        </div>
      </div>





      <script>
        document.addEventListener("DOMContentLoaded", function() {
          const filterLinks = document.querySelectorAll(".trending-filter a");

          filterLinks.forEach(link => {
            link.addEventListener("click", function(e) {
              e.preventDefault();
              window.location.href = this.href; // Redirect to new URL with genre filter
            });
          });
        });

        const bookItems = document.querySelectorAll(".trending-items");

        filterLinks.forEach(link => {
          link.addEventListener("click", function(e) {
            e.preventDefault();

            // Remove active class from all filters
            filterLinks.forEach(l => l.classList.remove("is_active"));
            this.classList.add("is_active");

            const filter = this.getAttribute("data-filter").substring(1); // Remove the "." from the class

            bookItems.forEach(item => {
              if (filter === "*" || filter === "") {
                item.style.display = "block"; // Show all books
              } else {
                if (item.classList.contains(filter)) {
                  item.style.display = "block"; // Show matching books
                } else {
                  item.style.display = "none"; // Hide non-matching books
                }
              }
            });
          });
        });
      </script>






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
</body>

</html>