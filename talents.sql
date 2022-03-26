-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2022 pada 15.52
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talents`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'Chess'),
(2, 'Fashion'),
(3, 'Photography'),
(4, 'Programming'),
(5, 'Swimming');

-- --------------------------------------------------------

--
-- Struktur dari tabel `photo_profile`
--

CREATE TABLE `photo_profile` (
  `id` int(11) NOT NULL,
  `photo_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `photo_profile`
--

INSERT INTO `photo_profile` (`id`, `photo_profile`) VALUES
(1, 'default.webp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `talent`
--

CREATE TABLE `talent` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `id_photo_profile` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Male','Female','','') NOT NULL,
  `skills` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `aboutme` text NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `talent`
--

INSERT INTO `talent` (`id`, `email`, `phone_number`, `age`, `id_photo_profile`, `name`, `gender`, `skills`, `location`, `aboutme`, `id_category`) VALUES
(239, 'gasti.maheswara@gmail.com', '0869 5717 5279', 22, 1, 'Agnes Pudjiastuti', 'Male', 'Breaststroke', 'Cimahi', 'Ipsum consequatur aut quis est nemo nobis. Tempore consequatur aut nisi magnam quia architecto. Omnis facilis expedita ut dolorem repellendus deleniti fugit inventore. Est explicabo sit voluptate.', 5),
(240, 'gamani.iswahyudi@yahoo.com', '0301 5734 139', 20, 1, 'Safina Mulyani', 'Male', 'Breaststroke', 'Sibolga', 'Aut occaecati nostrum aperiam ut illo tempore. Ratione inventore consequatur et in aspernatur quod fugit temporibus. Id enim quisquam nostrum ut quam dolor.', 5),
(241, 'farah10@gmail.co.id', '(+62) 897 727 603', 43, 1, 'Wage Daryani Salahudin S.Farm', 'Female', 'Vintage', 'Banjarmasin', 'Aut officiis necessitatibus et voluptatem. Voluptatem architecto ut sed. Consequatur optio ea soluta nobis dignissimos error corporis dolorem. Sint laudantium nemo eum recusandae et neque.', 2),
(242, 'tina.novitasari@yahoo.co.id', '0413 0869 108', 48, 1, 'Lanjar Nashiruddin', 'Male', 'Vintage', 'Sungai Penuh', 'Molestias culpa illo dignissimos dolores voluptatem. Aut consequatur et in et nihil. Aut accusantium placeat accusantium quibusdam.', 2),
(243, 'waskita.dinda@yahoo.co.id', '(+62) 705 7709 619', 31, 1, 'Kanda Uwais', 'Male', 'Contemporary', 'Banda Aceh', 'Veritatis facere nulla alias assumenda et. Quidem aliquam cum eum dolor sunt hic est provident. Deleniti aperiam doloremque sequi amet et tempore.', 2),
(244, 'varyani@purnawati.org', '(+62) 20 1333 0958', 39, 1, 'Mitra Zulkarnain', 'Female', 'Vintage', 'Pekanbaru', 'Ut nostrum omnis quasi id. Id ad est perspiciatis aut. Voluptas esse quibusdam iusto modi quos quas dolor.', 2),
(245, 'rini28@purnawati.co', '0795 2722 2530', 24, 1, 'Umay Daruna Tarihoran S.Ked', 'Male', 'Landscape', 'Pekalongan', 'Est aut sit vero voluptate officiis eum. Culpa est maiores et consequuntur voluptate. Placeat animi pariatur delectus eos. Corrupti sunt rerum optio id animi.', 3),
(246, 'vera29@laksita.net', '(+62) 379 9743 9140', 37, 1, 'Emin Sihombing S.Gz', 'Male', 'Landscape', 'Mojokerto', 'Autem facere quisquam totam harum. Enim incidunt beatae magnam sit aperiam magnam nam. Voluptates placeat ut illum nihil totam.', 3),
(247, 'puput37@budiman.biz', '(+62) 350 0337 250', 40, 1, 'Hana Wijayanti', 'Male', 'Backstroke', 'Lubuklinggau', 'Dolorem est ut aut architecto praesentium. Consequatur quam velit in unde. Ratione blanditiis repudiandae occaecati perferendis.', 5),
(248, 'dhutagalung@gmail.com', '0322 2710 043', 43, 1, 'Saka Megantara', 'Male', 'PHP', 'Banjarbaru', 'Nesciunt ut et est dolor fugit. Vero consectetur omnis deserunt facere est aut. Ipsam ut quas saepe corrupti. Nihil corporis eius dignissimos.', 4),
(249, 'febi.oktaviani@agustina.net', '0852 7821 875', 29, 1, 'Lanjar Manah Prabowo S.Gz', 'Male', 'Breaststroke', 'Padang', 'Recusandae voluptatem dolorem et consequatur praesentium et aperiam. Dolor recusandae et velit fugiat consequatur. Ipsam autem assumenda dolorem officia.', 5),
(250, 'prasetya.kariman@handayani.com', '(+62) 23 2096 222', 45, 1, 'Ivan Dabukke', 'Male', 'Modern', 'Administrasi Jakarta Timur', 'Perferendis aperiam sequi quos aliquam quo aut iste. Ipsam officiis minus ut pariatur. Facere porro sunt vitae vero aut.', 2),
(251, 'safitri.latika@yahoo.co.id', '0818 3739 964', 28, 1, 'Hafshah Padmasari S.Sos', 'Male', 'Portrait', 'Tebing Tinggi', 'Libero ad adipisci omnis vel provident ut. Quibusdam provident beatae perspiciatis nam esse sunt. Sit minima voluptatem dignissimos qui accusantium. Voluptate repellendus similique sequi.', 3),
(252, 'cakrajiya.laksmiwati@kuswandari.go.id', '022 8185 467', 31, 1, 'Bajragin Hutapea S.Pt', 'Female', 'Backstroke', 'Solok', 'Beatae nihil delectus repellat sunt ea. Dolor fuga et tenetur voluptatem aut. Est nobis perferendis iure perspiciatis.', 5),
(253, 'kuyainah@yahoo.co.id', '(+62) 885 5332 963', 34, 1, 'Warsa Unggul Nugroho M.Ak', 'Male', 'Expert', 'Solok', 'Autem qui nam quibusdam ex ea. Et perspiciatis animi assumenda et in sed omnis. Debitis vero aperiam et asperiores alias accusantium non.', 1),
(254, 'rina91@astuti.org', '(+62) 493 2672 0961', 50, 1, 'Lulut Pradipta S.Pd', 'Male', 'Landscape', 'Payakumbuh', 'Velit et quae vel fugit quasi ipsam numquam. Aliquid tempora iste consequuntur tenetur alias laudantium consequuntur. Facere ratione molestiae dolore debitis.', 3),
(255, 'iswahyudi.yessi@yahoo.com', '(+62) 424 4173 0581', 42, 1, 'Zelda Dewi Hariyah', 'Female', 'Butterfly', 'Tidore Kepulauan', 'Assumenda ea autem eos autem quaerat. Sequi quos aut facilis recusandae sint. Non alias ut dolores at officia eveniet. Nulla recusandae repellat aut at rem id dolor.', 5),
(256, 'harjo70@mardhiyah.my.id', '(+62) 29 5463 6633', 20, 1, 'Hasna Pratiwi', 'Female', 'Landscape', 'Surabaya', 'Nemo eum vitae est. Blanditiis fugit accusantium ut natus. Vitae doloremque saepe inventore placeat accusamus assumenda architecto. Magni molestiae velit autem deleniti.', 3),
(257, 'hamima.puspita@gmail.com', '0938 8910 0074', 44, 1, 'Endah Oktaviani', 'Female', 'Grandmaster', 'Administrasi Jakarta Utara', 'Iste ut soluta est qui distinctio. Cupiditate accusantium nisi eos labore. Omnis harum excepturi doloremque blanditiis et itaque eos. Atque nobis molestias velit dolores soluta et aut minima.', 1),
(258, 'jnuraini@prabowo.desa.id', '0298 3943 5235', 24, 1, 'Maman Natsir M.Farm', 'Female', 'Breaststroke', 'Pangkal Pinang', 'Molestiae nesciunt sint ducimus voluptas accusamus. Nam ipsam vero et inventore omnis excepturi. Ea repudiandae quibusdam laudantium enim at.', 5),
(259, 'dwi12@gunawan.co.id', '0805 7295 457', 41, 1, 'Kemba Irawan S.E.', 'Female', 'Contemporary', 'Dumai', 'Tenetur laborum rerum amet temporibus assumenda nihil saepe. Non sit alias sint sit aspernatur consequatur. Eveniet harum quam dolorum et consequatur.', 2),
(260, 'karimah.suartini@yahoo.com', '0310 3447 2877', 26, 1, 'Queen Laksmiwati', 'Male', 'Vintage', 'Administrasi Jakarta Utara', 'Optio amet repudiandae voluptas. Officiis maiores vitae officiis doloremque molestiae qui dolor repellat. Pariatur quo autem animi quia quidem vero. Ut sit est esse officiis minus maiores eum.', 2),
(261, 'capa34@suryatmi.sch.id', '(+62) 717 9969 0062', 30, 1, 'Karen Anggraini', 'Female', 'Grandmaster', 'Bukittinggi', 'Voluptatem ipsa hic veritatis qui et. At qui inventore et ullam optio doloremque minima ut. Assumenda aut eius corporis rerum. Et quia commodi error est voluptatem eaque corrupti.', 1),
(262, 'gandewa.maryati@yahoo.com', '(+62) 771 3099 344', 38, 1, 'Kezia Gasti Pertiwi', 'Female', 'Master', 'Makassar', 'Dolor sed sint et sunt saepe. Hic eaque aliquid amet alias qui eveniet veritatis. Debitis id doloremque veritatis ut. Qui ut facilis rerum nostrum.', 1),
(263, 'rajata.siti@yahoo.com', '0710 5864 1427', 49, 1, 'Tomi Samosir', 'Female', 'Vintage', 'Bau-Bau', 'Et voluptas dolor sit. Id qui numquam quod iusto recusandae inventore. Deserunt quia laborum nisi voluptatum sit laborum.', 2),
(264, 'nhalim@yahoo.com', '0498 9391 5177', 19, 1, 'Prabawa Januar', 'Male', 'Breaststroke', 'Tarakan', 'Sed optio rem aliquam reiciendis accusamus voluptatibus. Eum debitis dolorem blanditiis. Numquam cumque cumque voluptatem blanditiis ut et et.', 5),
(265, 'ozy.ramadan@gmail.com', '0519 0694 245', 30, 1, 'Vino Waluyo', 'Male', 'Breaststroke', 'Padang', 'Qui unde et rerum quis eius ducimus impedit dolor. Ipsum quo quibusdam sequi fugit. Sed dolorem est non in. Doloribus est accusantium exercitationem autem. Temporibus sapiente dolores eum et cum.', 5),
(266, 'putri.suartini@yahoo.co.id', '0430 1297 922', 46, 1, 'Ira Restu Andriani', 'Male', 'PHP', 'Bontang', 'Suscipit enim voluptate ea est et aliquam et. Quia dolorum nam officiis porro modi doloremque. Consequatur esse voluptatem voluptates inventore aliquid rem ullam iure.', 4),
(267, 'ulya42@anggraini.ac.id', '0876 084 659', 29, 1, 'Cakrawangsa Sitompul', 'Male', 'Master', 'Administrasi Jakarta Pusat', 'Vel dolor rem minus nemo iusto. Corporis eveniet qui alias provident quod tempore sit. Facilis minima quae nostrum eos minus vitae. Excepturi eum cum ipsa consequatur ut veniam fugiat.', 1),
(268, 'whalim@haryanti.biz', '0391 6369 8841', 42, 1, 'Heru Winarno', 'Male', 'Master', 'Kotamobagu', 'Optio neque fuga illo autem. Qui quia aspernatur excepturi qui corrupti sapiente. Est eum qui aperiam ipsa eveniet autem.', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `photo_profile`
--
ALTER TABLE `photo_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT untuk tabel `photo_profile`
--
ALTER TABLE `photo_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `talent`
--
ALTER TABLE `talent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
