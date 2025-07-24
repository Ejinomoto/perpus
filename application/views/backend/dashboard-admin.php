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
				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success" role="alert">
							<?= $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="row align-items-center mb-3">
							<div class="col-md-auto">
								<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addBookModal">
									Add Book
								</button>
							</div>

						</div>

						<div class="row">
							<?php foreach ($row as $r): ?>
								<div class="col-md-6 col-lg-4 mb-3">
									<div class="card h-100">
										<div class="card-body">
											<h5 class="card-title"><?= htmlspecialchars($r->title); ?></h5>
											<h6 class="card-subtitle text-muted mb-2"><?= htmlspecialchars($r->author); ?></h6>

											<!-- Book Image -->
											<?php if (!empty($r->gambar)): ?>
												<?php if (strpos($r->gambar, 'http') === 0): ?>
													<img class="fixed-size-img" src="<?= htmlspecialchars($r->gambar); ?>" class="img-fluid" alt="Book Cover">
												<?php else: ?>
													<img class="fixed-size-img" src="<?= base_url('assets/uploads/covers/' . htmlspecialchars($r->gambar)); ?>" class="img-fluid" alt="Book Cover">
												<?php endif; ?>
											<?php else: ?>
												<span>No Image</span>
											<?php endif; ?>

											<p class="card-text mt-2">Genre: <?= htmlspecialchars($r->genre_names); ?></p>

											<!-- Open File Button -->
											<?php if (!empty($r->file_path)): ?>
												<button class="btn btn-sm btn-primary open-file-btn"
													data-file-path="<?= base_url('assets/uploads/file_path/' . htmlspecialchars($r->file_path)); ?>">
													<i class="fa-solid fa-folder-open"></i> Open File
												</button>
											<?php else: ?>
												<button class="btn btn-sm btn-secondary" disabled>
													No File Available
												</button>
											<?php endif; ?>

											<!-- Edit Button -->
											<button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editBookModal<?= $r->book_id; ?>">
												<i class="fa-solid fa-edit"></i> Edit Book
											</button>

											<!-- Delete Button -->
											<button class="btn btn-sm btn-danger"
												data-bs-toggle="modal"
												data-bs-target="#confirmDeleteModal"
												data-url="<?= base_url('backend/del/' . $r->book_id); ?>"
												data-title="<?= htmlspecialchars($r->title); ?>">
												<i class="fa-solid fa-trash"></i> Delete Book
											</button>
										</div>
									</div>
								</div>

								<!-- Unique Modal for Each Book -->
								<div class="modal fade" id="editBookModal<?= $r->book_id; ?>" tabindex="-1" aria-labelledby="editBookModalLabel<?= $r->book_id; ?>" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="editBookModalLabel<?= $r->book_id; ?>">Edit Book</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<?= form_open_multipart('backend/edit'); ?>
												<input type="hidden" name="book_id" value="<?= $r->book_id; ?>">

												<!-- Book Image in Modal -->
												<div class="mb-3">
													<label class="form-label">Current Book Cover</label>
													<?php if (!empty($r->gambar)): ?>
														<?php if (strpos($r->gambar, 'http') === 0): ?>
															<img class="fixed-size-img" src="<?= htmlspecialchars($r->gambar); ?>" class="img-fluid" alt="Book Cover">
														<?php else: ?>
															<img class="fixed-size-img" src="<?= base_url('assets/uploads/covers/' . htmlspecialchars($r->gambar)); ?>" class="img-fluid" alt="Book Cover">
														<?php endif; ?>
													<?php else: ?>
														<span>No Image</span>
													<?php endif; ?>
												</div>

												<!-- Form Fields -->
												<div class="mb-3">
													<label class="form-label">Title</label>
													<input type="text" class="form-control" name="title" value="<?= htmlspecialchars($r->title); ?>" required>
												</div>

												<div class="mb-3">
													<label class="form-label">Author</label>
													<input type="text" class="form-control" name="author" value="<?= htmlspecialchars($r->author); ?>" required>
												</div>

												<div class="mb-3">
													<label class="form-label">Publisher</label>
													<input type="text" class="form-control" name="publisher" value="<?= htmlspecialchars($r->publisher); ?>" required>
												</div>

												<div class="mb-3">
													<label class="form-label">Published Date</label>
													<input class="form-control" type="date" name="published_date" value="<?= htmlspecialchars($r->published_date); ?>" required>
												</div>

												<div class="mb-3">
													<label class="form-label">Tipe Buku</label>
													<br>
													<div>
														<input type="checkbox" id="editFisik<?= $r->book_id; ?>" name="type[]" value="Fisik" <?= (strpos($r->type, 'Fisik') !== false) ? 'checked' : ''; ?>>
														<label for="editFisik<?= $r->book_id; ?>">Fisik</label>
													</div>
													<div>
														<input type="checkbox" id="editEbook<?= $r->book_id; ?>" name="type[]" value="E-Book" <?= (strpos($r->type, 'E-Book') !== false) ? 'checked' : ''; ?>>
														<label for="editEbook<?= $r->book_id; ?>">E-Book</label>
													</div>
												</div>

												<div class="mb-3">
													<label class="form-label">Genre</label>
													<div id="editGenreContainer">
														<?php if (!empty($genres)): ?>
															<?php foreach ($genres as $genre): ?>
																<div class="form-check">
																	<input type="checkbox" class="form-check-input" id="edit_genre_<?= $genre['genre_id']; ?>_<?= $r->book_id; ?>" name="genres[]" value="<?= $genre['genre_id']; ?>"
																		<?= (in_array($genre['genre_id'], explode(', ', $r->genre_ids))) ? 'checked' : ''; ?>>
																	<label class="form-check-label" for="edit_genre_<?= $genre['genre_id']; ?>_<?= $r->book_id; ?>">
																		<?= htmlspecialchars($genre['name']); ?>
																	</label>
																</div>
															<?php endforeach; ?>
														<?php else: ?>
															<p>No genres available.</p>
														<?php endif; ?>
													</div>
												</div>

												<div class="mb-3">
													<label class="form-label">ISBN</label>
													<input type="text" class="form-control" name="isbn" value="<?= htmlspecialchars($r->isbn); ?>" required>
												</div>

												<div class="mb-3">
													<label class="form-label">Description</label>
													<textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($r->description); ?></textarea>
												</div>

												<div class="mb-3">
													<label class="form-label">File Path (Maks 40MB)</label>
													<input type="file" name="file_path" class="form-control">
												</div>

												<div class="mb-3">
													<label class="form-label">Gambar (Maks 5MB)</label>
													<input type="file" name="gambar" class="form-control">
												</div>

												<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>


					<script>
						document.addEventListener("DOMContentLoaded", function() {
							document.querySelectorAll(".open-file-btn").forEach(button => {
								button.addEventListener("click", function() {
									let filePath = this.getAttribute("data-file-path");
									if (filePath && filePath !== "<?= base_url('assets/uploads/file_path/'); ?>") {
										window.open(filePath, "_blank");
									} else {
										alert("No file available.");
									}
								});
							});
						});
					</script>



					<div class="row">
						<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="addBookModalLabel">Add New Book</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<?php echo form_open_multipart('backend/tambah'); ?>
										<div class="mb-3">
											<label class="form-label">Judul Buku</label>
											<input type="text" name="title" class="form-control" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Author</label>
											<input type="text" name="author" class="form-control" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Publisher</label>
											<input type="text" name="publisher" class="form-control" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Published Date</label>
											<input class="form-control" type="date" name="published_date" id="html5-date-input">
										</div>

										<div class="mb-3">
											<label class="form-label">Tipe Buku</label>
											<br>
											<div>
												<input type="checkbox" id="fisik" name="type[]" value="Fisik">
												<label for="fisik">Fisik</label>
											</div>
											<div>
												<input type="checkbox" id="ebook" name="type[]" value="E-Book">
												<label for="ebook">E-Book</label>
											</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Genre</label>
											<div id="editGenreContainer">
												<?php if (!empty($genres)): ?>
													<?php foreach ($genres as $genre): ?>
														<div class="form-check">
															<input type="checkbox" class="form-check-input" id="edit_genre_<?= $genre['genre_id']; ?>_<?= $r->book_id; ?>" name="genres[]" value="<?= $genre['genre_id']; ?>"
																<?= (in_array($genre['genre_id'], explode(', ', $r->genre_ids))) ? 'checked' : ''; ?>>
															<label class="form-check-label" for="edit_genre_<?= $genre['genre_id']; ?>_<?= $r->book_id; ?>">
																<?= htmlspecialchars($genre['name']); ?>
															</label>
														</div>
													<?php endforeach; ?>
												<?php else: ?>
													<p>No genres available.</p>
												<?php endif; ?>
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">ISBN</label>
											<input type="text" name="isbn" class="form-control" required>
										</div>
										<div class="mb-3">
											<label class="form-label">Description</label>
											<textarea name="description" class="form-control" rows="4"></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label">File Path (Maks 40MB)</label>
											<input type="file" name="file_path" class="form-control">
										</div>


										<div class="mb-3">
											<label class="form-label">Gambar (Maks 5MB)</label>
											<input type="file" name="gambar" class="form-control">
										</div>
										<button type="submit" name="submit" class="btn btn-primary">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<script>
							document.addEventListener("DOMContentLoaded", function() {
								document.querySelectorAll("[data-bs-target='#editBookModal']").forEach(button => {
									button.addEventListener("click", function() {
										let bookId = this.getAttribute("data-book-id");
										let title = this.getAttribute("data-title");
										let author = this.getAttribute("data-author");
										let publisher = this.getAttribute("data-publisher");
										let publishedDate = this.getAttribute("data-published_date");
										let description = this.getAttribute("data-description");
										let isbn = this.getAttribute("data-isbn");
										let selectedGenres = this.getAttribute("data-genre").split(", "); // Split genre names

										document.getElementById("editBookId").value = bookId;
										document.getElementById("editTitle").value = title;
										document.getElementById("editAuthor").value = author;
										document.getElementById("editPublisher").value = publisher;
										document.getElementById("editPublishedDate").value = publishedDate;
										document.getElementById("editISBN").value = isbn;
										document.getElementById("editDescription").value = description;

										// Uncheck all checkboxes first
										document.querySelectorAll(".edit-genre-checkbox").forEach(checkbox => {
											checkbox.checked = false;
										});

										// Handle book type checkboxes
										let bookTypes = this.getAttribute("data-type").split(", ");
										document.querySelector("#editFisik").checked = bookTypes.includes("Fisik");
										document.querySelector("#editEbook").checked = bookTypes.includes("E-Book");

										// Check the selected genres
										selectedGenres.forEach(genre => {
											// Trim any extra spaces and compare
											genre = genre.trim();
											document.querySelectorAll(".edit-genre-checkbox").forEach(checkbox => {
												if (checkbox.value === genre) {
													checkbox.checked = true;
												}
											});
										});
									});
								});
							});
						</script>

						<!-- Edit Modal -->
						<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="editBookModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editBookModalLabel">Edit Book</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<?= form_open_multipart('backend/edit'); ?>
										<input type="hidden" name="book_id" id="editBookId">

										<div class="mb-3">
											<label class="form-label">Title</label>
											<input type="text" class="form-control" id="editTitle" name="title" required>
										</div>

										<div class="mb-3">
											<label class="form-label">Author</label>
											<input type="text" class="form-control" id="editAuthor" name="author" required>
										</div>

										<div class="mb-3">
											<label class="form-label">Publisher</label>
											<input type="text" class="form-control" id="editPublisher" name="publisher" required>
										</div>

										<div class="mb-3">
											<label class="form-label">Published Date</label>
											<input class="form-control" type="date" name="published_date" id="editPublishedDate" required>
										</div>

										<div class="mb-3">
											<label class="form-label">Tipe Buku</label>
											<br>
											<div>
												<input type="checkbox" id="editFisik" name="type[]" value="Fisik">
												<label for="editFisik">Fisik</label>
											</div>
											<div>
												<input type="checkbox" id="editEbook" name="type[]" value="E-Book">
												<label for="editEbook">E-Book</label>
											</div>
										</div>

										<div class="mb-3">
											<label class="form-label">Genre</label>
											<div id="editGenreContainer">
												<?php if (!empty($genres)): ?>
													<?php foreach ($genres as $genre): ?>
														<div class="form-check">
															<input type="checkbox" class="form-check-input edit-genre-checkbox" id="edit_genre_<?= $genre['genre_id']; ?>" name="genres[]" value="<?= $genre['genre_id']; ?>">
															<label class="form-check-label" for="edit_genre_<?= $genre['genre_id']; ?>">
																<?= htmlspecialchars($genre['name']); ?>
															</label>
														</div>
													<?php endforeach; ?>
												<?php else: ?>
													<p>No genres available.</p>
												<?php endif; ?>
											</div>
										</div>


										<div class="mb-3">
											<label class="form-label">ISBN</label>
											<input type="text" class="form-control" id="editISBN" name="isbn" required>
										</div>

										<div class="mb-3">
											<label class="form-label">Description</label>
											<textarea name="description" class="form-control" id="editDescription" rows="4"></textarea>
										</div>

										<div class="mb-3">
											<label class="form-label">File Path (Maks 20MB)</label>
											<input type="file" name="file_path" class="form-control">
										</div>

										<div class="mb-3">
											<label class="form-label">Gambar (Maks 5MB)</label>
											<input type="file" name="gambar" class="form-control">
										</div>

										<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
										</form>
									</div>
								</div>
							</div>
						</div>





						<!-- Confirmation Modal -->
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