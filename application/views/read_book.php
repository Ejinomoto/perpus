<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/logo-white.webp'); ?> " />
    <title>Read Book</title>

    <style>
        .pdf-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            /* Beri jarak antara tombol dan PDF */
        }

        #pdf-render {
            pointer-events: none;
            /* Disable interactions */
            user-select: none;
            max-width: 1600px;
            /* Atur lebar maksimum */
            max-height: 800px;
            /* Atur tinggi maksimum */
            /* Prevent text selection */
        }

        .nav-button {
            background-color: #6c757d;
            /* Warna tombol */
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 24px;
            /* Perbesar tombol */
            cursor: pointer;
            transition: background 0.3s;
        }

        .nav-button:hover {
            background-color: #5a6268;
        }

        body {
            -webkit-user-select: none;
            /* Disable text selection for all browsers */
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
    <!-- jQuery (Required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- PDF.js Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.4.120/pdf.min.js"></script>

    <!-- Bootstrap JavaScript (Ensure it's included after jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <!-- <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <?php include('assets/navbar_user.php') ?>
    <!-- ***** Header Area End ***** -->

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center"><?= $title; ?></h3>

                    <!-- Back to Library -->
                    <div class="text-center mt-3">
                        <a href="<?= base_url('user'); ?>" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4 text-center">
        <!-- PDF Viewer Wrapper -->
        <div class="pdf-wrapper">
            <!-- Tombol Previous -->
            <button id="prev-page" class="btn btn-secondary nav-button">❮</button>

            <!-- PDF Viewer Container -->
            <div id="pdf-container">
                <canvas id="pdf-render"></canvas>
            </div>

            <!-- Tombol Next -->
            <button id="next-page" class="btn btn-secondary nav-button">❯</button>
        </div>

        <!-- Page Counter -->
        <div class="mt-3">
            <span>Page <span id="page-num"></span> of <span id="page-count"></span></span>
        </div>

    </div>


    <script>
        // Disable right-click on the canvas
        document.getElementById("pdf-render").addEventListener("contextmenu", event => {
            event.preventDefault();
        });

        document.addEventListener("keydown", function(event) {
            // Block Ctrl + S (Save)
            if (event.ctrlKey && event.key === "s") {
                event.preventDefault();
                alert("Saving is disabled!");
            }

            // Block Ctrl + U (View Source)
            if (event.ctrlKey && event.key === "u") {
                event.preventDefault();
                alert("Viewing source is disabled!");
            }

            // Block Ctrl + Shift + I (DevTools)
            if (event.ctrlKey && event.shiftKey && event.key === "I") {
                event.preventDefault();
                alert("Inspecting is disabled!");
            }

            // Block Ctrl + P (Print)
            if (event.ctrlKey && event.key === "p") {
                event.preventDefault();
                alert("Printing is disabled!");
            }
        });


        const url = "<?= $ebook_url; ?>"; // Get the PDF file URL from PHP

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumPending = null;

        const scale = 1.5, // Zoom Level
            canvas = document.getElementById("pdf-render"),
            ctx = canvas.getContext("2d");

        // Render the page
        const renderPage = num => {
            pageIsRendering = true;

            // Get page
            pdfDoc.getPage(num).then(page => {
                const viewport = page.getViewport({
                    scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport: viewport
                };

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });

                document.getElementById("page-num").textContent = num;
            });
        };

        // If another render is in progress, queue it
        const queueRenderPage = num => {
            if (pageIsRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        };

        // Show previous page
        document.getElementById("prev-page").addEventListener("click", () => {
            if (pageNum <= 1) return;
            pageNum--;
            queueRenderPage(pageNum);
        });

        // Show next page
        document.getElementById("next-page").addEventListener("click", () => {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            queueRenderPage(pageNum);
        });

        // Load the PDF
        pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
            pdfDoc = pdfDoc_;
            document.getElementById("page-count").textContent = pdfDoc.numPages;
            renderPage(pageNum);
        });
    </script>

    <footer style="margin-top: 50px;">
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->

    <?php include('assets/css_user.php') ?>
</body>

</html>