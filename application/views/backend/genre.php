<body>
    <!-- Layout wrapper -->
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php $this->load->view('assets/sidebar'); ?>



            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->



                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Row to hold both form and table -->
                        <div class="row">
                            <!-- Form Column -->
                            <div class="col-md-3">
                                <div class="card border-success">
                                    <div class="card-body">
                                        <?php echo form_open_multipart('genre/tambah'); ?>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Genre / Category</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Masukan Genre / Category" required>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <!-- Table Column -->
                            <div class="col-md-9">
                                <div class="card">
                                    <h5 class="card-header">Data Fasilitas Kamar</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>Nama Genre</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($row as $r): ?>
                                                        <tr class="text-center">
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $r->name; ?></td>

                                                            <td class="text-center">
                                                                <button
                                                                    class="btn btn-sm btn-success"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#confirmEditModal"
                                                                    data-genre-id="<?= $r->genre_id; ?>"
                                                                    data-genre-name="<?= htmlspecialchars($r->name); ?>">
                                                                    <i class="fa-solid fa-pencil"></i>
                                                                </button>

                                                                <button
                                                                    class="btn btn-sm btn-danger"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#confirmDeleteModal"
                                                                    data-url="<?= base_url('genre/del/' . $r->genre_id); ?>">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete <span id="deleteItemTitle" class="fw-bold"></span>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="#" id="confirmDeleteButton" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Genre Modal -->
                    <div class="modal fade" id="confirmEditModal" tabindex="-1" aria-labelledby="confirmEditModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmEditModalLabel">Edit Genre</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url('genre/edit'); ?>" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="genre_id" id="editGenreId">
                                        <div class="mb-3">
                                            <label for="genre_name" class="form-label">Genre Name</label>
                                            <input type="text" class="form-control" id="editGenreName" name="genre_name" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const editGenreModal = document.getElementById('confirmEditModal');
                            editGenreModal.addEventListener('show.bs.modal', function(event) {
                                const button = event.relatedTarget; // Button that triggered the modal
                                const genreId = button.getAttribute('data-genre-id'); // Extract genre ID from data attribute
                                const genreName = button.getAttribute('data-genre-name'); // Extract genre name from data attribute

                                // Update the modal's content
                                const modalGenreId = editGenreModal.querySelector('#editGenreId');
                                const modalGenreName = editGenreModal.querySelector('#editGenreName');

                                modalGenreId.value = genreId; // Set the genre ID in the hidden input
                                modalGenreName.value = genreName; // Set the genre name in the text input
                            });
                        });
                    </script>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const confirmDeleteModal = document.getElementById('confirmDeleteModal');
                            confirmDeleteModal.addEventListener('show.bs.modal', function(event) {
                                const button = event.relatedTarget;
                                const deleteUrl = button.getAttribute('data-url');
                                const itemTitle = button.getAttribute('data-title');

                                const modalTitle = confirmDeleteModal.querySelector('#deleteItemTitle');
                                const confirmButton = confirmDeleteModal.querySelector('#confirmDeleteButton');

                                modalTitle.textContent = itemTitle;
                                confirmButton.setAttribute('href', deleteUrl);
                            });
                        });
                    </script>

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