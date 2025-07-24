<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/logo-white.webp'); ?> " />
  <title>Book Details</title>

  <style>
    .fixed-size-img {
      width: 400px;
      height: 100%;
      padding-right: 50px;
    }

    .disabled-option {
      background-color: #e0e0e0;
      /* Abu-abu */
      color: #888;
      /* Warna teks lebih pudar */
      pointer-events: none;
      /* Nonaktifkan klik */
    }

    /* Custom Modal Styles */
    .custom-modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      z-index: 1050;
      /* Ensure it's on top of other elements */
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.5);
      /* Semi-transparent black background */
    }

    .custom-modal-content {
      position: relative;
      background-color: #ffffff;
      margin: 10% auto;
      /* Center the modal vertically */
      padding: 20px;
      border: 1px solid #888;
      border-radius: 8px;
      width: 90%;
      max-width: 500px;
      /* Limit the maximum width */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .custom-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid #e5e5e5;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .custom-modal-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin: 0;
    }

    .custom-modal-close {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: #888;
    }

    .custom-modal-close:hover {
      color: #000;
    }

    .custom-modal-body {
      margin-bottom: 20px;
    }

    .custom-modal-footer {
      display: flex;
      justify-content: flex-end;
      border-top: 1px solid #e5e5e5;
      padding-top: 10px;
    }

    .custom-modal-footer .btn {
      margin-left: 10px;
    }

    /* Custom Radio Button Styles */
    .custom-option {
      display: block;
      margin-bottom: 15px;
      padding: 10px;
      border: 1px solid #e5e5e5;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .custom-option:hover {
      background-color: #f9f9f9;
    }

    .custom-option input[type="radio"] {
      display: none;
      width: 100%;
    }

    .custom-option input[type="radio"]:checked+.custom-option-content {
      background-color: rgb(149, 195, 233);
      border-color: rgb(1, 21, 43);
    }

    .custom-option-content {
      padding: 10px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }

    .custom-option-header {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .custom-option-body {
      font-size: 0.9rem;
      color: #666;
    }
  </style>
  <!-- jQuery (Required) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JavaScript (Ensure it's included after jQuery) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
          <h3><?= htmlspecialchars($book['title'] ?? 'No Title'); ?></h3>
          <span class="breadcrumb"><a href="#">Home</a> > <a href="#">Shop</a> > <?= htmlspecialchars($book['title'] ?? 'No Title'); ?></span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row" style="padding-bottom: 50px;">
        <div class="col-lg-6">
          <div class="left-image">
            <?php if (!empty($book['gambar'])): ?>
              <?php if (strpos($book['gambar'], 'http') === 0): ?>
                <img class="fixed-size-img" src="<?= htmlspecialchars($book['gambar']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
              <?php else: ?>
                <img class="fixed-size-img" src="assets/uploads/covers/<?= htmlspecialchars($book['gambar']); ?>" alt="<?= htmlspecialchars($book['title']); ?>">
              <?php endif; ?>
            <?php else: ?>
              <img src="assets/images/default-cover.jpg" alt="No Image Available">
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4><?= htmlspecialchars($book['title'] ?? 'No Title'); ?></h4>
          <br>

          <!-- <p><?= htmlspecialchars($book['description'] ?? 'Unknown Description'); ?></p> -->
          <br>
          <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
          <?php endif; ?>

          <?php
          $user_id = $this->session->userdata('user_id'); // Get user session
          $disabled = empty($user_id) ? 'disabled' : ''; // Disable if user is not logged in
          ?>

          <!-- Wishlist Button -->
          <button <?= $disabled; ?> style="background-color: <?= empty($user_id) ? '#ccc' : ''; ?>; color:white; text-transform: capitalize;">
            <a style="color:white; text-transform: capitalize; <?= empty($user_id) ? 'pointer-events: none;' : ''; ?>"
              href="<?= empty($user_id) ? '#' : site_url('wishlist/add/' . ($book['book_id'] ?? '')); ?>">
              <i class="fa-solid fa-star"></i> Add to Wishlist
            </a>
          </button>

          <!-- Rent Button -->
          <button <?= $disabled; ?> style="background-color: <?= empty($user_id) ? '#ccc' : ''; ?>; text-transform: capitalize;"
            type="button" class="btn btn-primary" id="rentButton" data-book-types="e-book,fisik">
            <i class="fa fa-shopping-bag"></i> Rent
          </button>


          <!-- Custom Modal for Book Type Selection -->
          <div id="rentModal" class="custom-modal">
            <div class="custom-modal-content">
              <div class="custom-modal-header">
                <h3 class="custom-modal-title">Select Book Type</h3>
                <button class="custom-modal-close" onclick="closeModal()">&times;</button>
              </div>
              <div class="custom-modal-body">
                <form id="rentForm">
                  <input type="hidden" name="book_id" id="book_id" value="<?= htmlspecialchars($book['book_id'] ?? ''); ?>">
                  <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user_id'] ?? ''; ?>">
                  <input type="hidden" name="tipe_buku" id="tipe_buku" value=""> <!-- Add this hidden input -->
                  <input type="hidden" name="days" id="days" value="7"> <!-- Set days to 7 by default -->
                  <?php
                  // Ambil tipe buku dari database
                  $bookType = strtolower($book['type'] ?? ''); // Pastikan lowercase agar tidak case-sensitive
                  $isEbookAvailable = strpos($bookType, 'e-book') !== false;
                  $isFisikAvailable = strpos($bookType, 'fisik') !== false;
                  ?>

                  <div class="custom-option">
                    <label style="display:block;" for="customRadioEbook">
                      <input type="radio" name="bookType" id="customRadioEbook" value="e-book" <?= $isEbookAvailable ? '' : 'disabled'; ?>>
                      <div class="custom-option-content <?= $isEbookAvailable ? '' : 'disabled-option'; ?>">
                        <div class="custom-option-header">E-Book</div>
                        <div class="custom-option-body">Borrow the electronic version of the book.</div>
                      </div>
                    </label>
                  </div>

                  <div class="custom-option">
                    <label style="display:block;" for="customRadioFisik">
                      <input type="radio" name="bookType" id="customRadioFisik" value="fisik" <?= $isFisikAvailable ? '' : 'disabled'; ?>>
                      <div class="custom-option-content <?= $isFisikAvailable ? '' : 'disabled-option'; ?>">
                        <div class="custom-option-header">Fisik</div>
                        <div class="custom-option-body">Borrow the physical version of the book.</div>
                      </div>
                    </label>
                  </div>
                  <div class="custom-modal-footer">
                    <button type="submit" class="btn btn-primary">Submit Rent Request</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Custom Modal for Response Message -->
          <div id="responseModal" class="custom-modal">
            <div class="custom-modal-content">
              <div class="custom-modal-header">
                <h3 class="custom-modal-title">Rent Request Status</h3>
                <button class="custom-modal-close" onclick="closeResponseModal()">&times;</button>
              </div>
              <div class="custom-modal-body" id="responseMessage">
                <!-- Response message will be displayed here -->
              </div>
              <div class="custom-modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeResponseModal()">Close</button>
              </div>
            </div>
          </div>

          <script>
            // Open the rent modal
            document.getElementById('rentButton').addEventListener('click', function() {
              const bookTypes = this.getAttribute('data-book-types').split(',');

              if (bookTypes.includes('e-book') && bookTypes.includes('fisik')) {
                document.getElementById('rentModal').style.display = 'block';
              } else if (bookTypes.includes('e-book')) {
                document.getElementById('book_type').value = 'e-book';
                document.getElementById('rentModal').style.display = 'block';
              } else if (bookTypes.includes('fisik')) {
                document.getElementById('book_type').value = 'fisik';
                document.getElementById('rentModal').style.display = 'block';
              } else {
                alert('No available book types to rent.');
              }
            });

            // Close the rent modal
            function closeModal() {
              document.getElementById('rentModal').style.display = 'none';
            }

            // Close the response modal
            function closeResponseModal() {
              document.getElementById('responseModal').style.display = 'none';
            }

            // Update the book_type hidden input when a radio button is selected
            document.querySelectorAll('input[name="bookType"]').forEach((radio) => {
              radio.addEventListener('change', function() {
                document.getElementById('tipe_buku').value = this.value;
              });
            });

            // Handle form submission
            document.getElementById('rentForm').addEventListener('submit', function(event) {
              event.preventDefault(); // Prevent default form submission

              const formData = new FormData(this);

              // Log the form data for debugging
              for (let [key, value] of formData.entries()) {
                console.log(key, value);
              }

              fetch('rental/request_rent', { // Replace with your controller URL
                  method: 'POST',
                  body: formData
                })
                .then(response => response.text())
                .then(data => {
                  // Display the response in the response modal
                  document.getElementById('responseMessage').innerText = data;
                  document.getElementById('responseModal').style.display = 'block';
                  closeModal(); // Close the rent modal
                })
                .catch(error => {
                  console.error('Error:', error);
                  document.getElementById('responseMessage').innerText = '❌ An error occurred while submitting the request.';
                  document.getElementById('responseModal').style.display = 'block';
                });
            });
          </script>
          <!-- <pre><?php print_r($book); ?></pre> Debugging: Show book array -->

          <ul>
            <li><span>Author :</span> <?= htmlspecialchars($book['author'] ?? 'Unknown Author'); ?></li>
            <li><span>Type :</span> <?= htmlspecialchars($book['type'] ?? 'Unknown Type'); ?></li>
            <li><span>Publisher :</span> <a href="#"><?= htmlspecialchars($book['publisher'] ?? 'Unknown Publisher'); ?></a></li>
            <li>
              <span>Published Date :</span>
              <a href="#">
                <?= htmlspecialchars((isset($book['published_date']) && $book['published_date']) ? (new DateTime($book['published_date']))->format('j F Y') : 'Unknown Published Date'); ?>
              </a>
            </li>

            <li><span>Genres :</span> <a href="#"><?= htmlspecialchars($book['genre_names'] ?? 'N/A'); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Rent Modal -->
  <div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="rentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rentModalLabel">Rent This Book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('rental/request_rent'); ?>" method="POST">
            <input type="hidden" name="book_id" value="<?= isset($book['book_id']) ? htmlspecialchars($book['book_id']) : ''; ?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?? ''; ?>">

            <div class="form-group">
              <label for="days">Number of Days:</label>
              <input type="number" name="days" id="days" class="form-control" min="1" required>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit Request</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>




  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li>
                  <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link " id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (3)</button>
                  </li> -->
                </ul>
              </div>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <p><?= htmlspecialchars($book['description'] ?? 'No description available.'); ?></p>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean shorts edison bulb poutine next level humblebrag la croix adaptogen. <br><br>Hashtag poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard succulents street art.</p>
                </div>
              </div>
            </div>
          </div>
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
</body>

</html>