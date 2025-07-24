<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
	data-assets-path="<?php echo base_url('assets/vuexy/assets/)') ?>"
	data-template="vertical-menu-template-no-customizer">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
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
				<!-- Login -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center mb-4 mt-2">
							<a href="index.html" class="app-brand-link gap-2">
								<img src="
                            <?php echo base_url('assets/logo.webp'); ?>
                            " alt="" style="width: 50px;">
								<span class="app-brand-text demo text-body fw-bold ms-1">ElyArchives</span>
							</a>
						</div>
						<!-- /Logo -->
						<h4 class="mb-1 pt-2">Welcome to ElyArchives! ❤️</h4>
						<p class="mb-4">Please sign-in to your account and start the adventure</p>


						<div class="alert alert-danger" hidden role="alert">Username or password is incorrect</div>

						<!-- Display error message if login fails -->
						<?php if ($this->session->flashdata('success')): ?>
							<div class="alert alert-success" role="alert">
								<?= $this->session->flashdata('success'); ?>
							</div>
						<?php endif; ?>

						<!-- Display error message if login fails -->
						<?php if ($this->session->flashdata('error')): ?>
							<div class="alert alert-danger" role="alert">
								<?= $this->session->flashdata('error'); ?>
							</div>
						<?php endif; ?>

						<form id="formAuthentication" class="mb-3" action="<?= site_url('auth/login_action'); ?>" method="POST">
							<div class="mb-3">
								<label for="email" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus />
							</div>
							<div class="mb-3 form-password-toggle">
								<div class="d-flex justify-content-between">
									<label class="form-label" for="password">Password</label>
									<a href="auth-forgot-password-basic.html"></a>
								</div>
								<div class="input-group input-group-merge">
									<input type="password" id="password" class="form-control" name="password"
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
							<div class="mb-3">
								<button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
							</div>
						</form>

						<p class="text-center">
							<span>New on our platform?</span>
							<a href="<?php echo site_url('auth/register'); ?>">
								<span>Create an account</span>
							</a>
						</p>


					</div>
				</div>
				<!-- /Register -->
			</div>
		</div>
	</div>

	<!-- / Content -->


</body>

</html>