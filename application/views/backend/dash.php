<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book DataTable</title>
    <!-- Include DataTables CSS -->

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

        body {
            overflow-x: hidden;
        }
    </style>

    <?php $this->load->view('assets/sidebar'); ?>
</head>

<body>
    <!-- Layout wrapper -->
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->





            <!-- Layout container -->
            <div class="layout-page">
                <!-- Admin Greeting Card -->
                <div class="row g-4 mb-4 px-4">
                    <div class="col-12">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h3 class="mb-2" style="color:white;">Welcome back, <?php echo $this->session->userdata('username'); ?>! 👋</h3>
                                <p>Here's an overview of your library system's current stats.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mb-4 px-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="content-left">
                                        <span>Total Fisik Books</span>
                                        <div class="d-flex align-items-center my-1">
                                            <h4 class="mb-0 me-2"><?= $total_fisik_books; ?></h4>
                                        </div>
                                    </div>
                                    <span class="badge bg-label-primary rounded p-2">
                                        <i class="ti ti-book ti-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="content-left">
                                        <span>Total E-Book Books</span>
                                        <div class="d-flex align-items-center my-1">
                                            <h4 class="mb-0 me-2"><?= $total_ebook_books; ?></h4>
                                        </div>
                                    </div>
                                    <span class="badge bg-label-danger rounded p-2">
                                        <i class="ti ti-book ti-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="content-left">
                                        <span>Total Users</span>
                                        <div class="d-flex align-items-center my-1">
                                            <h4 class="mb-0 me-2"><?= $total_users; ?></h4>
                                        </div>
                                    </div>
                                    <span class="badge bg-label-success rounded p-2">
                                        <i class="ti ti-user ti-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="content-left">
                                        <span>Pending Transactions</span>
                                        <div class="d-flex align-items-center my-1">
                                            <h4 class="mb-0 me-2"><?= $pending_transactions; ?></h4>
                                        </div>
                                    </div>
                                    <span class="badge bg-label-warning rounded p-2">
                                        <i class="ti ti-clock ti-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>