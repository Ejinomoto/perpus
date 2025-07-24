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

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Row to hold both form and table -->
                        <div class="row">
                            <div class="card">
                                <div class="card-datatable table-responsive pt-0">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="DataTables_Table_1_length">
                                                    <!-- <label>Show
                                                        <select name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="form-select">
                                                            <option value="7">7</option>
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="75">75</option>
                                                            <option value="100">100</option>
                                                        </select> entries
                                                    </label> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="dt-complex-header table table-bordered dataTable no-footer" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info" style="width: 1394px;">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Number: activate to sort column ascending" style="width: 25px;">No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" style="width: 240px;">Username</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Nama Lengkap: activate to sort column ascending" style="width: 79px;">Nama Lengkap</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Alamat: activate to sort column ascending" style="width: 79px;">Alamat</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 79px;">Email</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 79px;">Role</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Created At: activate to sort column ascending" style="width: 79px;">Created At</th>
                                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 95px;" aria-label="Actions">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($row as $r): ?>
                                                        <tr class="text-center">
                                                            <td><?= $no++; ?></td>
                                                            <td><?= htmlspecialchars($r->username); ?></td>
                                                            <td><?= htmlspecialchars($r->nama_lengkap); ?></td>
                                                            <td><?= htmlspecialchars($r->alamat); ?></td>
                                                            <td><?= htmlspecialchars($r->email); ?></td>
                                                            <td><?= htmlspecialchars($r->role); ?></td>
                                                            <td><?= htmlspecialchars($r->created_at); ?></td>
                                                            <td class="text-center">
                                                                <div>
                                                                    <!-- Edit Button -->
                                                                    <button class="btn btn-sm btn-success mb-1"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editUserModal<?= $r->user_id; ?>">
                                                                        <i class="fa-solid fa-edit"></i>
                                                                    </button>

                                                                    <!-- Delete Button -->
                                                                    <button class="btn btn-sm btn-danger"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#confirmDeleteModal">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <!-- Unique Modal for Each User -->
                                                        <div class="modal fade" id="editUserModal<?= $r->user_id; ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?= $r->user_id; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editUserModalLabel<?= $r->user_id; ?>">Edit User</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="<?= base_url('backend/edit_user'); ?>" method="post">
                                                                            <input type="hidden" name="user_id" value="<?= $r->user_id; ?>">
                                                                            <div class="mb-3">
                                                                                <label for="editUsername" class="form-label">Username</label>
                                                                                <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($r->username); ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="editNamaLengkap" class="form-label">Nama Lengkap</label>
                                                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= htmlspecialchars($r->nama_lengkap); ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="editAlamat" class="form-label">Alamat</label>
                                                                                <input type="text" class="form-control" name="alamat" value="<?= htmlspecialchars($r->alamat); ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="editEmail" class="form-label">Email</label>
                                                                                <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($r->email); ?>" required>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="editRole" class="form-label">Role</label>
                                                                                <select class="form-select" name="role" required>
                                                                                    <option value="admin" <?= ($r->role === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                                                    <option value="staf" <?= ($r->role === 'staf') ? 'selected' : ''; ?>>Staf</option>
                                                                                    <option value="user" <?= ($r->role === 'user') ? 'selected' : ''; ?>>User</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




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