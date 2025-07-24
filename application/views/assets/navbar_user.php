<header class="header-area header-sticky">
    <style>
        .notif-button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            position: relative;
        }

        .notif-button:focus {
            outline: none;
        }

        /* Modal Notifikasi */
        .notif-modal {
            display: none;
            /* Default hidden */
            position: fixed;
            top: 50px;
            right: 20px;
            width: 300px;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            z-index: 1000;
            padding: 15px;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .notif-modal-content {
            position: relative;
        }

        /* Tombol Close */
        .close-btn {
            position: absolute;
            top: 5px;
            right: 10px;
            font-size: 18px;
            cursor: pointer;
            color: #555;
        }

        .close-btn:hover {
            color: red;
        }

        /* Daftar Notifikasi */
        #notifList {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
        }

        #notifList li {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        #notifList li:last-child {
            border-bottom: none;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="<?php echo base_url('assets/logo-white.webp'); ?>" alt="" style="width: 40px;">
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">


                        <li><a href="<?php echo base_url('welcome'); ?>" class="<?= ($this->uri->segment(1) === 'welcome') ? 'active' : ''; ?>">Home</a></li>
                        <li><a href="<?php echo base_url('catalog'); ?>" class="<?= ($this->uri->segment(1) === 'catalog') ? 'active' : ''; ?>">Catalog</a></li>
                        <li>
                            <?php if ($this->session->userdata('username')): ?>
                                <a href="<?php echo base_url('user'); ?>"><i class="fa-solid fa-user"></i></a>
                            <?php else: ?>
                                <a href="<?php echo base_url('auth/login'); ?>">Sign In</a>
                            <?php endif; ?>
                        </li>
                    </ul>

                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>



            </div>
        </div>

    </div>
</header>