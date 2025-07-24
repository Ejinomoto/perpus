-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2025 at 01:14 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `published_date` date NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publisher`, `published_date`, `type`, `isbn`, `file_path`, `gambar`, `created_at`) VALUES
(1, 'A Street Cat Named Bob', 'James Bowen', 'Serambi Ilmu Semesta', '2012-11-01', 'Fisik', '9789790243934', NULL, 'http://books.google.com/books/content?id=uWnRCgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-20 08:57:15'),
(2, 'The Science of Dune', 'Kevin R. Grazier', 'BenBella Books, Inc.', '2007-12-11', 'Fisik', '9781935251408', NULL, 'http://books.google.com/books/content?id=4kbYExSCa6oC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-20 08:57:29'),
(3, 'Speed Read F1', 'Stuart Codling', 'Motorbooks', '2017-10-10', 'Fisik', '9780760361962', NULL, 'http://books.google.com/books/content?id=ec85DwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-20 08:58:10'),
(4, 'Lewis Hamilton', 'Frank Worrall', 'Kings Road Publishing', '2016-02-15', 'Fisik', '9781786060969', NULL, 'http://books.google.com/books/content?id=XTmtDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-20 08:58:55'),
(5, 'Dark Souls: TBoA', 'George Mann', 'Titan Comics', '2017-09-06', 'Fisik', '9781785865411', NULL, 'http://books.google.com/books/content?id=U50vDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-20 09:00:04'),
(7, 'AI : An Illustrated History', ' Clifford A. Pickover', 'Union Square & Co. Illustrated Histories', '2024-08-27', 'E-Book', '9781454955788', '7bcae948e381f2a64f4c06bbaf6663fb.pdf', '2e1b5cde11311b7adfe44dcb899c1ec1.jpg', '2025-02-20 09:30:21'),
(8, 'Solo Leveling, Vol. 5', 'Chugong', 'Yen On', '2022-08-09', 'Fisik,E-Book', '9781975319359', '6b3cd138fde175648b58bd84a9f0acda1.pdf', '87e34933103372e6eb5af65fc0ee8e21.jpg', '2025-02-20 09:38:07'),
(9, 'Teenage Mutant Ninja Turtles', 'Jason Aaron', 'IDW', '2024-07-24', 'E-Book', 'B0D59NW88D', '7c290f90c6a37fa87088d5a5227113e2.pdf', '90873fe690d50c4cee2c73818805b997.jpg', '2025-02-20 09:41:33'),
(10, 'Mudah Belajar Bahasa Jepang Melalui Anime', 'Emiliana Dewi Aryani', 'TransMedia', '2014-02-01', 'Fisik', '9789797992798', NULL, 'http://books.google.com/books/content?id=kNaCBwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-23 10:50:46'),
(11, 'Spy x Family, Vol. 4', 'Tatsuya Endo', ' VIZ Media LLC', '2020-05-13', 'E-Book', '9781974721030', '6b3cd138fde175648b58bd84a9f0acda.pdf', '184a3076d640fabecf37b135d2bb3867.jpg', '2025-02-23 11:35:52'),
(12, 'Enzo Ferrari', 'Brock Yates', 'Doubleday', '1991-05-01', 'E-Book', ' 9780385263191', '1dacf664fe76dc4a1c61ec24b98b376a.pdf', 'e97dafe68a538d9f1dfd1ba5f4d83d95.jpg', '2025-02-23 12:13:41'),
(13, 'Life at the Limit: Triumph and Tragedy in Formula One', 'Sid Watkins', '‎Macmillan UK', '1996-06-26', 'E-Book', '9780330351393', '51881f37adc435ff5fe85b4982985b2c.pdf', '0dd0513ccb70428057e73dd1b219903d.jpg', '2025-02-23 12:15:13'),
(14, 'My Happy Marriage, Vol. 8 ', 'Akumi Agitogi', 'Fujimi Shobo, Square Enix Manga, Yen Press', '2024-03-24', 'E-Book', '9798855411119', '5e5909e580d615bc7040c53d6817b099.pdf', '29bdf802fe44c49da797fccb69c40345.jpg', '2025-02-23 12:17:57'),
(15, 'NARUTO 22', 'Masashi Kishimoto', 'Elex Media Komputindo', '2006-01-01', 'Fisik', '9789792082821', NULL, 'http://books.google.com/books/content?id=dTTMDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-23 16:13:56'),
(16, 'NARUTO 16', 'Masashi Kishimoto', 'Elex Media Komputindo', '2005-01-01', 'Fisik', '9789792074192', NULL, 'http://books.google.com/books/content?id=cTTMDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-23 16:14:04'),
(17, 'The Dynamic Essence of Transmedia Storytelling', 'Barbara Wall', 'BRILL', '2024-03-11', 'Fisik', '9789004690219', NULL, 'http://books.google.com/books/content?id=9NH7EAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-23 16:14:29'),
(18, 'Indonesia', 'William C. Younce', 'Nova Publishers', '0000-00-00', 'Fisik', '1590332490', NULL, 'http://books.google.com/books/content?id=H6O0K65WqQ8C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '2025-02-24 06:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `book_descriptions`
--

CREATE TABLE `book_descriptions` (
  `id` int NOT NULL,
  `book_id` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_descriptions`
--

INSERT INTO `book_descriptions` (`id`, `book_id`, `description`) VALUES
(1, 1, 'Ketika James Bowen menemukan seekor kucing jalanan yang terluka di koridor rumah susunnya, dia tidak tahu bahwa kucing itu akan mengubah hidupnya. James yang sehari-hari menyambung hidup dari mengamen berpenghasilan tak menentu, dia juga tengah terbelit masalah serius terkait, kecanduannya terhadap narkoba. Kehadiran Bob yang setia perlahan-lahan menyadarkan James untuk menata hidupnya. Dengan Bob di sisinya, James mulai berjuang melepaskan diri dari jeratan narkoba dan menjalin kembali hubungan yang sempat terputus dengan keluarganya di Australia. \" Buku ini membuat kita berfikir, Inilah kisah persahabatan yang unik dan mencerahkan. Kisah nyata ini mengetuk hati kita betapa pertolongan bisa datang dalam berbagai cara, bahkan melalui kasih sayang seekor kucing. Diterbitkan oleh penerbit Serambi Ilmu Semesta\" (Serambi Group)'),
(2, 2, 'Get excited for the 2021 Denis Villeneuve Dune film release, starring Timothée Chalamet, with The Science of Dune! Since its original publication in 1965, the Dune series has entranced generations of readers with its complex plotting, fascinating characters, grand scope, and incredible scientific predictions. This guide offers fascinating scientific speculation on topics including quantum physics, biochemistry, ecology, evolution, psychology, technology, and genetics. It scrutinizes Frank Herbert’s science fiction world by asking questions such as: Is the ecology of Dune realistic? Is it theoretically possible to get information from the future? Could humans really evolve as Herbert suggests? Which of Herbert’s inventions have already come to life? This companion is a must-have for any fan who wants to revisit the world of Dune and explore it even further.'),
(3, 3, 'Get instant access to the history, technology, drivers, rivalries, racing circuits, and business of Formula 1 in this beautifully designed and illustrated essential guide from Motorbooks’ Speed Read series. The world racing championship that now encompasses 20 (and counting) annual races across five continents started in the European racing scene between the first and second world wars. It’s been a long road from the early races held in redundant airfields bounded by old oil drums to today’s extravagant spectacles—a road marked by glory, championships, iteration, technology, and speed. In sections divided by topic, you’ll find the history of the sport, biographies of major drivers and figures who have dominated the sport’s long and storied history, a rundown of the incredible technology that makes its cars so fast, an account of racing accidents and the safety measures they inspired, and more. Each section ends with a glossary of related terms, and informational sidebars provide fun facts, historical tidbits, and mini-bios of key people in Formula 1. Sleek illustrations of the cars, technology, and drivers impart the visual feel of F1 throughout. With Motorbooks’ Speed Read series, become an instant expert in a range of fast-moving subjects, from Formula 1 racing to the Tour de France. Accessible language, compartmentalized sections, fact-filled sidebars, glossaries of key terms, and event timelines deliver quick access to insider knowledge. Their brightly colored covers, modern design, pop art–inspired illustrations, and handy size make them perfect on-the-go reads.'),
(4, 4, 'LEWIS HAMILTON is the undisputed British hero of Formula One. His phenomenal successes have seen him move to third on the all-time Grand Prix winners list and, for a record-equalling third time, plant a British flag onto the mountain-top of motor racing. With behind-the-scenes insight into the intense early rivalry between Hamilton and his teammate Fernando Alonso which threatened to derail the young Briton’s dream, and the low-down on the ‘spy-gate’ scandal, this biography describes how Lewis handled the intensity of the media scrum around his relationship with Nicole Scherzinger and kept his dignity to emerge triumphant as he racked up sensational wins around the world. Now he has even joined iconic speedsters Damon Hill and Bradley Wiggins as a BBC Sports Personality of the Year winner. From 2015’s momentous clinching of a second consecutive World Championship in Texas to the ongoing bitter rivalry with former friend Nico Rosberg -in which the German once seemingly engineered a deliberate high-speed crash - bestselling sports author Frank Worrall traces the slipstream of Hamilton’s incredible career as the fastest driver on the planet. This is the ultimate story of the driver who has gone from being the rookie Sir Jackie Stewart said ‘has rewritten the rule book’ to a triple world champion, accelerating into pole position to perhaps be called Britain’s greatest ever race driver.'),
(5, 5, '“Jaw-droppingly gorgeous from start to finish.” – We The Nerdy Praise the sun – fear the dark! Showcasing the phenomenal artwork of Alan Quah, this exclusive artist’s edition offers a unique spin on Titan Comics’ unmissable adventure based in the world of the critically-acclaimed Dark Souls videogames. As her kingdom collapses into chaos and death, battle-hardened warrior Fira embarks on a perilous, last-ditch quest to save it. Allies are few, campfires are burned to embers, countless hordes of demonic and draconic foes stand in her way. Only with the aid of a duplicitous Scryer can she rekindle the flame that will return light to her world… if she doesn’t perish in the attempt! “I loved the artwork. Alan Quah delights throughout.” – Warped Factor'),
(7, 7, 'An illustrated journey through the past, present, and future of artificial intelligence, from popular science author Cliff Pickover. From medieval robots and Boolean algebra to facial recognition, artificial neural networks, and adversarial patches, this fascinating history takes readers on a vast tour through the world of artificial intelligence. Award-winning author Clifford A. Pickover (The Math Book, The Physics Book, Death and u0026 the Afterlife) explores the historic and current applications of AI in such diverse fields as computing, medicine, popular culture, mythology, and philosophy, and considers the enduring threat to humanity should AI grow out of control. Across 100 illustrated entries, Pickover provides an entertaining and informative look into when artificial intelligence began, how it developed, where it’s going, and what it means for the future of human-machine interaction.'),
(8, 8, 'and “WHO AM I? and “A devastating dungeon break at his sister’s high school is quickly taken care of by Jinwoo…but not before he confirms that magic beasts no longer register him as a human. What’s more, the deceased Byunggu Min sends him a cryptic warning from beyond the grave: Jinwoo’s powers are more frightening that he knows. Left with too many questions and very few answers, his final hope lies in the key to Cartenon Temple. Jinwoo’s determined to find out who–or what–he’s become, and to do so, he’s prepared to return to where it all began!'),
(9, 9, 'The Teenage Mutant Ninja Turtles have all left New York to pursue their own interests, but there are forces gathering that will pull them back together–whether the bad guys like it or not. First up: Raphael! But why is everyone’s favorite brawler in prison?! When a surprise attack behind bars puts Raph’s position in jeopardy, he needs to figure out how to get out of jail and warn his brothers that trouble is coming.'),
(10, 10, 'Salah satu cara paling praktis dalam mempelajari bahasa Jepang adalah melalui anime. Karena, percakapan di dalamnya merupakan bahasa sehari-hari yang sederhana dan mudah dipahami. Buku ini akan membantu Anda memahami tata bahasa dasar sekaligus memperkaya kosakata bahasa Jepang Anda. Selain itu, di dalamnya terdapat enam karakter yang memudahkan Anda untuk membedakan gaya bahasa tergantung tingkat kesopanan, baik formal maupun nonformal. Keenam karakter ini juga membantu Anda membedakan ungkapan mana yang lazim diucapkan oleh laki-laki dan mana yang lazim diucapkan oleh perempuan. -TransMedia Pustaka-'),
(11, 11, 'Master spy Twilight is unparalleled when it comes to going undercover on dangerous missions for the betterment of the world. But when he receives the ultimate assignment–to get married and have a kid–he may finally be in over his head!The Forgers look into adding a dog to their family, but this is no easy task–especially when Twilight has to simultaneously foil an assassination plot against a foreign minister! The perpetrators plan to use trained dogs for the attack, but Twilight gets some unexpected help to stop these terrorists.'),
(12, 12, 'The life of Enzo Ferrari, who made fast, red sports cars known for their precision and who ran a motor-sports empire that dominated automotive industry'),
(13, 13, 'This work offers the memoirs of Grand Prix’s on-track doctor, Professor Sid Watkins. If there is a crash, it is Watkins who gets there first. He is closely involved in improving safety at the circuits and in developing rapid response medical rescue.'),
(14, 14, 'During his student days, Kiyoka was invited by Yoshito Godou’s father to join the Special Anti-Grotesquerie Unit. In this collection of short stories, the beginning of Kiyoka’s military career and the nature of his connection with the Earth Spider are finally revealed! Also included is an episode from Miyo and Kiyoka’s happy married life.'),
(15, 15, 'Suatu hari, hikaru shindo seorang anak kelas 6 sd, menemukan papan permainan go tua di gudang kakeknya. Detik itu juga roh sai fujiwara, pemain go berbakat dari zaman heian yang bersemayan di dalam papan itu, masuk ke dalam pikiran hikaru.'),
(16, 16, 'Demi melindungi orang-orang yang disayanginya, dengan sekuat tenaga Naruto berhasil melukai Goara dengan satu pukulan!! Lalu, pertarungan sampai mati yang sengit antara Orochimaru dan Hokage pun mendekati akhirnya!! Penghancuran Konoha, berakhir!! Tapi, ada dua bayangan ketidakberuntungan yang mendekati Desa Konoha!!'),
(17, 17, 'The Dynamic Essence of Transmedia Storytelling challenges many established truths about popular literary classics by presenting an analysis of sixty Korean variations of The Journey to the West, a set which includes novels and poems, as well as films, comics, paintings, and dance performances dating from the 14th century until today. In contrast to the typical assumption that literary classics like The Journey to the West are stable texts with a single original, Barbara Wall approaches The Journey to the West as a dynamic text comprised of all its variations. She argues that all the creators of such variations, from Korean scholars in the 14th century to “boy bands” like Seventeen in the 21st century, participate in the ongoing story world known as The Journey to the West. Wall employs literary and quantitative analysis, ample graphic visualizations, and in-depth descriptions of classroom games to find new ways to understand the dynamics of transmedia storytelling and popular engagement with story worlds. Her approach opens new frontiers of intertextual analysis to literary scholars and teachers of literature who seek contemporary methods of introducing world literature to new generations of students.'),
(18, 18, 'Indonesia - Issues, Historical Background & Bibliography');

-- --------------------------------------------------------

--
-- Table structure for table `book_genres`
--

CREATE TABLE `book_genres` (
  `id` int NOT NULL,
  `book_id` int DEFAULT NULL,
  `genre_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_genres`
--

INSERT INTO `book_genres` (`id`, `book_id`, `genre_id`) VALUES
(1, 1, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(8, 2, 2),
(23, 9, 6),
(24, 9, 7),
(35, 7, 11),
(36, 7, 13),
(37, 10, 18),
(41, 12, 4),
(42, 13, 4),
(43, 14, 9),
(44, 14, 10),
(45, 15, 5),
(46, 16, 5),
(47, 17, 19),
(48, 11, 6),
(49, 11, 7),
(50, 11, 10),
(51, 18, 20),
(52, 8, 6),
(53, 8, 8),
(54, 8, 9),
(55, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `name`) VALUES
(1, 'Pets'),
(2, 'Social Science'),
(3, 'Sports & Recreation'),
(4, 'Biography & Autobiography'),
(5, 'Comics & Graphic Novels'),
(6, 'Action'),
(7, 'Comic Book'),
(8, 'Fantasy'),
(9, 'Light Novel'),
(10, 'Fiction'),
(11, 'Artificial Intelligence'),
(13, 'Technology'),
(18, 'Foreign Language Study'),
(19, 'Literary Criticism'),
(20, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `tipe_buku` enum('e-book','fisik') NOT NULL,
  `borrow_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `return_date` datetime NOT NULL,
  `actual_return` datetime DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') NOT NULL DEFAULT 'dipinjam',
  `approval_status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `user_id`, `book_id`, `tipe_buku`, `borrow_date`, `return_date`, `actual_return`, `status`, `approval_status`) VALUES
(22, 3, 7, 'e-book', '2025-02-24 04:05:51', '2025-02-23 04:05:51', NULL, 'dipinjam', 'approved'),
(23, 3, 2, 'fisik', '2025-02-24 04:08:00', '2025-03-03 04:08:00', NULL, 'dipinjam', 'rejected'),
(24, 3, 2, 'fisik', '2025-02-24 04:16:38', '2025-03-03 04:16:38', NULL, 'dipinjam', 'approved'),
(25, 3, 8, 'e-book', '2025-02-24 04:18:53', '2025-03-03 04:18:53', NULL, 'dipinjam', 'approved'),
(26, 3, 7, 'e-book', '2025-06-19 12:37:09', '2025-06-26 12:37:09', NULL, 'dipinjam', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','staf','user') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `nama_lengkap`, `alamat`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'Ejinomoto', 'Ezekiel Alden Christiano', 'Jalan Jalan Yuk', '$2y$10$uuyhMQ2rFtxWHmoazxvP.eKRNO7JQF5kV7HdabHivdEKM.jG.BamW', 'ezyalden25@gmail.com', 'admin', '2025-01-15 07:52:09'),
(2, 'Nomoto', 'Ezekiel Alden Christiano Nd', 'Jalan Jalan Yuk ke pantai', '$2y$10$P.TbACiSlGjg/CAU2FwNse8fDETMarl6mSrLfDVjZAfJjvfpxqpR.', 'iforgoragain@gmail.com', 'staf', '2025-01-16 07:24:38'),
(3, 'user', 'Ezekiel Alden Christaaano', 'Friend\'s Pulsa Store', '$2y$10$1rslw8ZE3sAH1BFoFRIkReQNB7Tcfq1aajRn3FmyyyVLOYaxEk9RW', 'ezygaming91@gmail.com', 'user', '2025-01-16 07:25:07'),
(4, 'Akun2', 'adasdas', 'dasdasdasdas', '$2y$10$72Aaf7Tsl56ZMjflgEBDKezSiJH3V2KNP4/C7XCFoznXCo187XfLC', '11sadadsad@gmail.com', 'user', '2025-02-01 21:23:37'),
(5, 'ada', 'ada', 'Friend\'s Pulsa Sto1re', '$2y$10$vl1PzdEAA.MEh4W48KDJV.SmZKoeyIdrBv6LEiLA6rwT/5Xlm8J9G', 'ezyalden111@gmail.com', 'user', '2025-02-02 13:32:01'),
(6, 'Ezy', 'Ezekiel Alden Christia1', 'Jalan Jalan Yuk111', '$2y$10$vuwyilUPnm6F6S2qC7UHIu3lyVAKWwWY15xpzG6qrCxi0zvlobPym', 'ezygantenganjay@gmail.com', 'user', '2025-02-23 12:26:09'),
(7, 'FreakyFart', 'Lelelawar', 'Jalan Jalan Yuk ke pantai', '$2y$10$qbmYBfx69hRhG2I7leCz8uMLJADP7.AS1GfmJusVvLGlQFqED6Kqe', 'meongmeong@gmail.com', 'user', '2025-02-24 10:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `book_id`) VALUES
(5, 3, 1),
(6, 3, 2),
(3, 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_descriptions`
--
ALTER TABLE `book_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_wishlist` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `book_descriptions`
--
ALTER TABLE `book_descriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `book_genres`
--
ALTER TABLE `book_genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_descriptions`
--
ALTER TABLE `book_descriptions`
  ADD CONSTRAINT `book_descriptions_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constraints for table `book_genres`
--
ALTER TABLE `book_genres`
  ADD CONSTRAINT `book_genres_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_genres_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
