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
                                                        <th>Status</th>
                                                        <th>Detail Buku</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($rentals as $rental): ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($rental['nama_lengkap']); ?></td>
                                                            <td><?= htmlspecialchars($rental['book_id']); ?></td>
                                                            <?php
                                                            $current_date = date('Y-m-d'); // Get today's date
                                                            $return_date = $rental['return_date'];

                                                            // Determine status
                                                            if ($return_date < $current_date) {
                                                                $status = 'Returned';
                                                                $badge_class = 'secondary'; // Grey badge for returned status
                                                            } else {
                                                                $status = $rental['approval_status'];
                                                                $badge_class = $rental['approval_status'] === 'approved' ? 'success' : 'warning';
                                                            }
                                                            ?>

                                                            <td><?= htmlspecialchars($return_date); ?></td>
                                                            <td>
                                                                <span class="badge bg-<?= $badge_class; ?>">
                                                                    <?= htmlspecialchars($status); ?>
                                                                </span>
                                                            </td>

                                                            <td>
                                                                <strong><?= htmlspecialchars($rental['book_name']); ?></strong><br>
                                                                <em>by <?= htmlspecialchars($rental['author']); ?></em><br>


                                                                <?php if (!empty($rental['book_image'])): ?>
                                                                    <?php
                                                                    $image_src = (strpos($rental['book_image'], 'http') === 0)
                                                                        ? $rental['book_image']
                                                                        : base_url('assets/uploads/covers/' . $rental['book_image']);
                                                                    ?>
                                                                    <img style="width: 50px;" src="<?= htmlspecialchars($image_src); ?>" alt="<?= htmlspecialchars($rental['book_name']); ?>">
                                                                <?php else: ?>
                                                                    <img src="<?= base_url('assets/images/default-cover.jpg'); ?>" alt="No Image Available">
                                                                <?php endif; ?>

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