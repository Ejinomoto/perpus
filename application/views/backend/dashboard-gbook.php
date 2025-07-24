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
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success" role="alert">
							<?= $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>
					<div class="container-xxl flex-grow-1 container-p-y">
						<!-- Row to hold both form and table -->
						<div class="row">
							<!-- Form Column -->
							<div class="col">
								<div class="card border-success">
									<div class="card-body">
										<!-- Search Form -->
										<h5 class="card-title">Search Google Books</h5>
										<?php echo form_open('gbook/search', ['method' => 'post']); ?>
										<div class="mb-3">
											<label for="query" class="form-label">Search Books</label>
											<input type="text" id="query" name="query" class="form-control" placeholder="Enter book title or author" required>
										</div>
										<button type="submit" class="btn btn-primary">Search</button>
										<?php echo form_close(); ?>
									</div>
								</div>
							</div>

							<!-- Search Results and Add Book Form -->
							<div>
								<br>
								<div class="card">
									<h5 class="card-header">Search Results</h5>
									<div class="card-body">
										<?php if (!empty($books)): ?>
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
														<tr class="text-center">
															<th>Cover</th>
															<th>Title</th>
															<th>Author</th>
															<th>Genres</th>
															<th>ISBN</th>
															<th>Description</th>
															<th>Publisher</th>
															<th>Published Date</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($books as $book): ?>
															<tr class="text-center">
																<td>
																	<?php
																	$thumbnail = $book['volumeInfo']['imageLinks']['thumbnail'] ?? null;
																	if ($thumbnail): ?>
																		<img src="<?= htmlspecialchars($thumbnail); ?>" alt="Book Cover" style="height: 100px;">
																	<?php else: ?>
																		<span>No Image</span>
																	<?php endif; ?>
																</td>
																<td><?= htmlspecialchars($book['volumeInfo']['title'] ?? 'Unknown'); ?></td>
																<td><?= htmlspecialchars(implode(', ', $book['volumeInfo']['authors'] ?? ['Unknown'])); ?></td>
																<td><?= htmlspecialchars(implode(', ', $book['volumeInfo']['categories'] ?? ['None'])); ?></td>
																<td><?= htmlspecialchars($book['volumeInfo']['industryIdentifiers'][0]['identifier'] ?? 'N/A'); ?></td>
																<td><?= htmlspecialchars($book['volumeInfo']['description'] ?? 'No description available'); ?></td>
																<td><?= htmlspecialchars($book['volumeInfo']['publisher'] ?? 'Unknown'); ?></td>
																<td><?= htmlspecialchars($book['volumeInfo']['publishedDate'] ?? 'Unknown'); ?></td>
																<td>
																	<!-- Button to trigger the modal -->
																	<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBookModal"
																		onclick="populateModal(
                                                        '<?= htmlspecialchars($book['volumeInfo']['title'] ?? 'Unknown', ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars(implode(', ', $book['volumeInfo']['authors'] ?? ['Unknown']), ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars($book['volumeInfo']['industryIdentifiers'][0]['identifier'] ?? 'N/A', ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars(implode(', ', $book['volumeInfo']['categories'] ?? []), ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars($thumbnail ?? '', ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars($book['volumeInfo']['description'] ?? '', ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars($book['volumeInfo']['publisher'] ?? '', ENT_QUOTES); ?>',
                                                        '<?= htmlspecialchars($book['volumeInfo']['publishedDate'] ?? '', ENT_QUOTES); ?>'
                                                    )">
																		Add
																	</button>
																</td>
															</tr>
														<?php endforeach; ?>
													</tbody>
												</table>
											</div>
										<?php else: ?>
											<p>No results found. Try searching for another book.</p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Add Book Modal -->
					<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="addBookModalLabel">Add Book</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<?php echo form_open('gbook/addBook', ['method' => 'post']); ?>
									<div class="mb-3">
										<label for="title" class="form-label">Title</label>
										<input type="text" id="title" name="title" class="form-control" required>
									</div>
									<div class="mb-3">
										<label for="author" class="form-label">Author</label>
										<input type="text" id="author" name="author" class="form-control" required>
									</div>
									<div class="mb-3">
										<label for="isbn" class="form-label">ISBN</label>
										<input type="text" id="isbn" name="isbn" class="form-control">
									</div>
									<div class="mb-3">
										<label for="genres" class="form-label">Genres</label>
										<input type="text" id="genres" name="genres" class="form-control">
									</div>

									<div class="mb-3">
										<label for="gambar" class="form-label">Cover Image URL</label>
										<input type="text" id="gambar" name="gambar" class="form-control">
									</div>

									<div class="mb-3">
										<label for="description" class="form-label">Description</label>
										<textarea id="description" name="description" class="form-control" rows="4"></textarea>
									</div>
									<div class="mb-3">
										<label for="publisher" class="form-label">Publisher</label>
										<input type="text" id="publisher" name="publisher" class="form-control">
									</div>
									<div class="mb-3">
										<label for="published_date" class="form-label">Published Date</label>
										<input type="date" id="published_date" name="published_date" class="form-control">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Add Book</button>
									</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>

					<!-- JavaScript to populate the modal -->
					<script>
						function populateModal(title, author, isbn, genres, gambar, description, publisher, publishedDate) {
							document.getElementById('title').value = title;
							document.getElementById('author').value = author;
							document.getElementById('isbn').value = isbn;
							document.getElementById('genres').value = genres;
							document.getElementById('gambar').value = gambar;
							document.getElementById('description').value = description;
							document.getElementById('publisher').value = publisher;
							document.getElementById('published_date').value = publishedDate;
						}
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