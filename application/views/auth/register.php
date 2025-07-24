<!DOCTYPE html>

<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url('assets/vuexy/assets/)') ?>"
  data-template="vertical-menu-template-no-customizer">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login Basic - Pages | Vuexy - Bootstrap Admin Template</title>

  <meta name="description" content="" />

  <?php $this->load->view('assets/css'); ?>
</head>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2">
              <a href="index.html" class="app-brand-link gap-2">
                <a href="index.html" class="app-brand-link gap-2">
                  <img src="
                            <?php echo base_url('assets/logo.webp'); ?>
                            " alt="" style="width: 50px;">
                  <span class="app-brand-text demo text-body fw-bold ms-1">ElyArchives</span>
                </a>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1 pt-2">Adventure starts here 🚀</h4>
            <p class="mb-4">Make your app management easy and fun!</p>

            <!-- Display error message if registration fails -->
            <?php if ($this->session->flashdata('error')): ?>
              <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error'); ?>
              </div>
            <?php endif; ?>

            <!-- Display success message if registration is successful -->
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>


            <div class="alert alert-success" hidden role="alert">Your account has been created!</div>

            <form id="formAuthentication" class="mb-3" action="<?php echo site_url('auth/register_action'); ?>" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Enter your username"
                  autofocus />
              </div>
              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input
                  type="text"
                  class="form-control"
                  id="nama_lengkap"
                  name="nama_lengkap"
                  placeholder="Enter your Full Name"
                  autofocus />
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input
                  type="text"
                  class="form-control"
                  id="alamat"
                  name="alamat"
                  placeholder="Enter your Full Address"
                  autofocus />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer" id="togglePassword">
                    <i class="ti ti-eye-off" id="icon"></i>
                  </span>
                  <script>
                    // Get the elements
                    const togglePassword = document.querySelector('#togglePassword');
                    const passwordField = document.querySelector('#password');
                    const icon = document.querySelector('#icon');

                    // Add a click event listener to the toggle icon
                    togglePassword.addEventListener('click', function() {
                      // Toggle the password field between 'password' and 'text'
                      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                      passwordField.setAttribute('type', type);

                      // Toggle the icon between eye and eye-off
                      icon.classList.toggle('ti-eye');
                      icon.classList.toggle('ti-eye-off');
                    });
                  </script>
                </div>
              </div>


              <button class="btn btn-primary d-grid w-100">Sign up</button>
            </form>

            <p class="text-center">
              <span>Already have an account?</span>
              <a <a href="<?php echo site_url('auth/login'); ?>">
                <span>Sign in instead</span>
              </a>
            </p>


          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->


</body>

</html>