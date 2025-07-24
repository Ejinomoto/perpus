<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/logo-white.webp'); ?> " />
    <title>Profile</title>

    <style>
        table {
            width: 100% !important;
            border-radius: 70%;
        }

        table.dataTable {
            width: 100% !important;
            table-layout: fixed;
            border-radius: 70%;
        }

        table th,
        table td {
            white-space: nowrap;
            text-align: center;
            border-radius: 70%;
            /* Center text */
            vertical-align: middle !important;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <?php include('assets/navbar_user.php') ?>
    <!-- ***** Header Area End ***** -->

    <div class="main-banner">

        <div class="text-center  rounded">
            <h1 style="color: white;">Selamat Datang, <?php echo $this->session->userdata('username'); ?>!</h1>
            <p style="color: white;">Kelola peminjaman buku fisik dan baca e-book favorit Anda di sini.</p>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="row">
                <!-- User Sidebar -->
                <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                    <!-- User Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="user-avatar-section">
                                <div class="d-flex align-items-center flex-column">
                                    <img class="img-fluid rounded mb-3 pt-1 mt-4" src="<?php echo base_url('assets/img/pfp/pfp.png'); ?>" style="width: 30%;" height="50" width="50" alt="User avatar">
                                    <div class="user-info text-center">
                                        <h4 class="mb-2"><?php echo $this->session->userdata('username'); ?></h4>

                                    </div>
                                </div>
                            </div>


                            <div class="info-container">
                                <ul class="list-unstyled"><br>
                                    <li class="mb-2">
                                        <span class="fw-semibold me-1">Username:</span>
                                        <span><?php echo $this->session->userdata('username'); ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="fw-semibold me-1">Nama Lengkap:</span>
                                        <span><?php echo $this->session->userdata('nama_lengkap'); ?></span>
                                    </li>
                                    <li class="mb-2 pt-1">
                                        <span class="fw-semibold me-1">Email:</span>
                                        <span><?php echo $this->session->userdata('email'); ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="fw-semibold me-1">Alamat:</span>
                                        <span><?php echo $this->session->userdata('alamat'); ?></span>
                                    </li>

                                </ul>







                                <a href="<?php echo base_url('auth/logout'); ?>"><button type="button" class="btn btn-secondary">Log Out</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <h5 class="card-header">Riwayat Peminjaman</h5>
                        <table style="margin-bottom: 0;" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Return</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($expired_rentals)): ?>
                                    <?php foreach ($expired_rentals as $rental): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($rental['book_name']); ?></td>
                                            <td><?= date('d/m/Y', strtotime($rental['return_date'])); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada riwayat peminjaman.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /User Card -->

                </div>
                <!--/ User Sidebar -->

                <!-- User Content -->
                <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                    <div class="card mb-4">
                        <h5 class="card-header">Status Peminjaman</h5>
                        <div class="table" style=" margin-bottom: 0px;">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                <table class="table datatable-project border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 923px;  margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th class="sorting">Buku</th>
                                            <th class="sorting">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($pending_rentals)): ?>
                                            <?php foreach ($pending_rentals as $rental): ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar avatar-sm me-3">
                                                                    <a href="<?= base_url('details?book_id=' . htmlspecialchars($rental['book_id'] ?? '')); ?>">
                                                                        <?php if (!empty($rental['gambar'])): ?>
                                                                            <?php if (strpos($rental['gambar'], 'http') === 0): ?>
                                                                                <img style="width: 100px;" src="<?= htmlspecialchars($rental['gambar']); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                            <?php else: ?>
                                                                                <img style="width: 100px;" src="<?= base_url('assets/uploads/covers/' . htmlspecialchars($rental['gambar'])); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <img src="<?= base_url('assets/images/default-cover.jpg'); ?>" alt="No Image Available">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-truncate fw-semibold"><?= htmlspecialchars($rental['book_name']); ?></span>
                                                                <small class="text-muted"><?= htmlspecialchars($rental['author']); ?></small>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <span class="btn btn-warning">Pending</span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada peminjaman yang sedang menunggu persetujuan.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- Project table -->
                    <div class="card mb-4">
                        <h5 class="card-header">Peminjaman Buku 📚</h5>
                        <div class="table" style=" margin-bottom: 0px; ">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <table class="table datatable-project border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 923px;  margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_desc">Buku</th>
                                            <th class="text-nowrap sorting_disabled">Batas Pengembalian</th>
                                            <th class="sorting">Baca Buku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($current_rentals)): ?>
                                            <?php foreach ($current_rentals as $rental): ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar avatar-sm me-3">
                                                                    <a href="<?= base_url('details?book_id=' . htmlspecialchars($rental['book_id'] ?? '')); ?>">
                                                                        <?php if (!empty($rental['gambar'])): ?>
                                                                            <?php if (strpos($rental['gambar'], 'http') === 0): ?>
                                                                                <img style="width: 100px;" src="<?= htmlspecialchars($rental['gambar']); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                            <?php else: ?>
                                                                                <img style="width: 100px;" src="<?= base_url('assets/uploads/covers/' . htmlspecialchars($rental['gambar'])); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <img src="<?= base_url('assets/images/default-cover.jpg'); ?>" alt="No Image Available">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span class="text-truncate fw-semibold"><?= htmlspecialchars($rental['book_name']); ?></span>
                                                                <small class="text-muted"><?= htmlspecialchars($rental['author']); ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?= date('d/m/Y', strtotime($rental['return_date'])); ?></td>

                                                    <td>

                                                        <?php if (strtolower(trim($rental['tipe_buku'])) === 'fisik'): ?>
                                                            <button class="btn btn-secondary" disabled>Fisik</button>
                                                        <?php else: ?>
                                                            <a href="<?= site_url('rental/read/' . $rental['transaction_id']); ?>" class="btn btn-info" target="_blank">
                                                                Read Book
                                                            </a>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">Anda belum meminjam buku apa pun.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- /Project table -->

                    <!-- Activity Timeline -->

                    <div class="card mb-4">
                        <h5 class="card-header">Wishlist ⭐</h5>
                        <div class="table" style="margin-bottom: 0px;">
                            <div id="wishlist_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <table class="table datatable-project border-top dataTable no-footer dtr-column" id="wishlist_table" aria-describedby="wishlist_info" style="width: 923px; margin-bottom: 0px;">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_desc">Buku</th>
                                            <th class="sorting">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($wishlist)): ?>
                                            <?php foreach ($wishlist as $book): ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class="avatar-wrapper">
                                                                <div class="avatar avatar-sm me-3">
                                                                    <a href="<?= base_url('details?book_id=' . htmlspecialchars($book->book_id ?? '')); ?>">

                                                                        <?php if (!empty($book->gambar)): ?>
                                                                            <?php if (strpos($book->gambar, 'http') === 0): ?>
                                                                                <img style="width: 100px;" src="<?= htmlspecialchars($book->gambar); ?>" alt="<?= htmlspecialchars($book->title); ?>">
                                                                            <?php else: ?>
                                                                                <img style="width: 100px;" src="<?= base_url('assets/uploads/covers/' . htmlspecialchars($book->gambar)); ?>" alt="<?= htmlspecialchars($book->title); ?>">
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <img src="<?= base_url('assets/images/default-cover.jpg'); ?>" alt="No Image Available">
                                                                        <?php endif; ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <a href="<?= base_url('details?book_id=' . htmlspecialchars($book->book_id ?? '')); ?>" class="text-decoration-none">
                                                                    <span class="text-truncate fw-semibold"><?= htmlspecialchars($book->title); ?></span>
                                                                </a>
                                                                <small class="text-muted"><?= isset($book->author) ? htmlspecialchars($book->author) : 'Unknown Author'; ?></small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('wishlist/remove/' . htmlspecialchars($book->book_id)); ?>" class="btn btn-danger btn-sm">
                                                            Remove
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="2" class="text-center">No books in wishlist.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <!-- /Activity Timeline -->

                    <!-- Invoice table -->

                </div>
                <!--/ User Content -->
            </div>
            <!-- Profile Information -->




        </div>

        <!-- Borrowing History -->

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