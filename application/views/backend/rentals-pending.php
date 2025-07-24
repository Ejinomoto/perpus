<body>
    <!-- Layout wrapper -->
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php $this->load->view('assets/sidebar'); ?>



            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">

                        <!-- Row to hold both form and table -->
                        <div class="row">
                            <!-- Form Column -->


                            <!-- Table Column -->
                            <div class="col-md-11 mx-auto">

                                <div class="card">
                                    <h5 class="card-header">Data Rental</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered text-center">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Nama Lengkap</th>
                                                        <th>Book ID</th>
                                                        <th>Return Date</th>
                                                        <th>Tipe Buku</th>
                                                        <th>Status</th>
                                                        <th>Detail Buku</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($rentals as $rental): ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($rental['nama_lengkap']); ?></td>
                                                            <td><?= htmlspecialchars($rental['book_id']); ?></td>
                                                            <td><?= htmlspecialchars($rental['return_date']); ?></td>
                                                            <td><?= htmlspecialchars($rental['tipe_buku']); ?></td>
                                                            <td> <span class="badge bg-<?= $rental['approval_status'] === 'approved' ? 'success' : 'warning'; ?>">
                                                                    <?= htmlspecialchars($rental['approval_status']); ?>
                                                                </span></td>
                                                            <td>
                                                                <strong><?= htmlspecialchars($rental['book_name']); ?></strong><br>
                                                                <em>by <?= htmlspecialchars($rental['author']); ?></em><br>

                                                                <?php if (!empty($rental['book_image'])): ?>
                                                                    <?php if (strpos($rental['book_image'], 'http') === 0): ?>
                                                                        <img style="width: 50px;" src="<?= htmlspecialchars($rental['book_image']); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                    <?php else: ?>
                                                                        <img style="width: 50px;" src="assets/uploads/covers/<?= htmlspecialchars($rental['book_image']); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <img src="assets/images/default-cover.jpg" alt="No Image Available">
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url('backend/approve/' . $rental['transaction_id']); ?>" class="btn btn-success">Approve</a>
                                                                <a href="<?= base_url('backend/reject/' . $rental['transaction_id']); ?>" class="btn btn-danger">Reject</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank"
                                        class="fw-semibold">Pixinvent</a>
                                </div>
                                <div>
                                    <a href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/"
                                        target="_blank" class="footer-link me-4">Documentation</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->


    <!-- Page JS -->
</body>

</html>