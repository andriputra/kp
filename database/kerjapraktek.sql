-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2024 pada 16.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjapraktek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `tanggal_post` date NOT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `description`, `excerpt`, `tanggal_post`, `kategori`, `gambar`) VALUES
(2, 'Lorem Ipsum Dolor Sit Amet Edit', '<p>Edit Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'Edit Quisque nisl est, rhoncus eu ultricies ut, interdum vel nunc. Aenean ligula arcu, mollis vehicula ante ac, auctor semper ex. Integer ullamcorper dignissim suscipit. Suspendisse lectus est, mollis id nisl quis, aliquet tempor tortor. Aliquam vel convallis sapien. Integer ultricies dolor nec ullamcorper accumsan. Mauris ut laoreet augue, nec consequat sapien. Duis suscipit elit neque, sed eleifend nibh eleifend vitae. Praesent convallis odio leo, ac ultrices est elementum quis. Aliquam erat volutpat. Sed non condimentum erat.', '2024-03-20', 'Edit cat', 'pexels-jesse-zheng-1213294.jpg'),
(3, 'Tambah Artikel Baru', '<p><strong>sadasdasdasd</strong></p><p><strong>asdasdasd</strong></p><p><strong>asdasdas</strong></p>', 'sdasdas', '2024-03-18', 'dasd', 'pexels-maria-geller-2127037.jpg'),
(4, 'Tambah Artikel Baru', '<p>Etiam quam mauris, fermentum a nisi a, tincidunt mollis nisl. Fusce aliquet nibh sit amet aliquet mattis. In non aliquam eros. Pellentesque eget purus ut augue mollis sodales eu eu felis. Nam euismod convallis mauris, a varius orci consequat eu. Ut id egestas sapien. Duis rhoncus leo lacinia vulputate dictum. Donec eget est ante. Nunc accumsan justo libero, vestibulum imperdiet nibh luctus vel. Duis vitae magna dictum, elementum lectus vitae, pretium enim. Quisque lobortis id tortor sed interdum. Maecenas porttitor, orci eget efficitur pulvinar, velit nisi tempus ipsum, eu posuere sapien dolor nec ipsum. Nam scelerisque, nulla nec blandit sodales, neque risus condimentum turpis, porta varius turpis lorem ac tellus.</p><p>Suspendisse et suscipit magna. Etiam id libero eros. In a ultricies metus, sed fringilla quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque varius varius consequat. Nam pretium purus sodales nisl dictum dignissim. Aliquam sem sapien, imperdiet ut dignissim eu, imperdiet ut felis. Aenean consequat mauris urna, et rutrum massa aliquet ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas at dui odio. Integer odio nibh, convallis sit amet metus et, sollicitudin porttitor neque. Fusce a nisl vel nulla porttitor dictum in sit amet ante. Integer varius commodo eros eu dignissim. Nullam eu dui ut orci sagittis tincidunt. Cras eget turpis vitae nibh iaculis efficitur et nec elit. Nunc lobortis turpis eget lectus tempor, sed efficitur neque volutpat.</p><p>Quisque nisl est, rhoncus eu ultricies ut, interdum vel nunc. Aenean ligula arcu, mollis vehicula ante ac, auctor semper ex. Integer ullamcorper dignissim suscipit. Suspendisse lectus est, mollis id nisl quis, aliquet tempor tortor. Aliquam vel convallis sapien. Integer ultricies dolor nec ullamcorper accumsan. Mauris ut laoreet augue, nec consequat sapien. Duis suscipit elit neque, sed eleifend nibh eleifend vitae. Praesent convallis odio leo, ac ultrices est elementum quis. Aliquam erat volutpat. Sed non condimentum erat.</p>', 'Suspendisse et suscipit magna. Etiam id libero eros. In a ultricies metus, sed fringilla quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque varius varius consequat. Nam pretium purus sodales nisl dictum dignissim. Aliquam sem sapien, imperdiet ut dignissim eu, imperdiet ut felis. Aenean consequat mauris urna, et rutrum massa aliquet ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas at dui odio. Integer odio nibh, convallis sit amet metus et, sollicitudin porttitor neque. Fusce a nisl vel nulla porttitor dictum in sit amet ante. Integer varius commodo eros eu dignissim. Nullam eu dui ut orci sagittis tincidunt. Cras eget turpis vitae nibh iaculis efficitur et nec elit. Nunc lobortis turpis eget lectus tempor, sed efficitur neque volutpat.', '2024-03-19', 'Berita Umum', 'pexels-arshad-sutar-1749303.jpg'),
(5, 'Ini adalah lorem ipsum nya', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque sollicitudin felis, nec sodales tellus vehicula facilisis. Phasellus eu sagittis enim. Duis urna sapien, iaculis sit amet felis at, volutpat varius justo. Nulla fermentum lorem eget faucibus tincidunt. In in dictum purus. Praesent eu aliquet sem. Suspendisse eget turpis at ex rhoncus bibendum vel sit amet est. Morbi nec lacinia nibh. Fusce volutpat quis quam vel porttitor.</p><p>Aliquam elit arcu, viverra a semper laoreet, tincidunt id magna. Integer ut elit ac enim porttitor vehicula id nec nunc. In ultrices, est id tempus lacinia, velit quam vestibulum dui, sed efficitur turpis est quis felis. Pellentesque commodo dui id libero suscipit, eget dictum erat bibendum. Proin tristique in nunc eu convallis. Suspendisse at facilisis dui. Aliquam luctus mi et nunc malesuada venenatis. Pellentesque volutpat nunc vel mauris imperdiet, et bibendum purus gravida. Etiam id sollicitudin felis. Proin eu arcu in mi luctus mattis in ac turpis. Ut enim diam, vehicula eget magna eget, tempor commodo lacus. Phasellus viverra varius arcu, ut elementum tellus ullamcorper non. Nam tincidunt dolor vehicula felis lobortis condimentum.</p><p>Etiam quam mauris, fermentum a nisi a, tincidunt mollis nisl. Fusce aliquet nibh sit amet aliquet mattis. In non aliquam eros. Pellentesque eget purus ut augue mollis sodales eu eu felis. Nam euismod convallis mauris, a varius orci consequat eu. Ut id egestas sapien. Duis rhoncus leo lacinia vulputate dictum. Donec eget est ante. Nunc accumsan justo libero, vestibulum imperdiet nibh luctus vel. Duis vitae magna dictum, elementum lectus vitae, pretium enim. Quisque lobortis id tortor sed interdum. Maecenas porttitor, orci eget efficitur pulvinar, velit nisi tempus ipsum, eu posuere sapien dolor nec ipsum. Nam scelerisque, nulla nec blandit sodales, neque risus condimentum turpis, porta varius turpis lorem ac tellus.</p><p>Suspendisse et suscipit magna. Etiam id libero eros. In a ultricies metus, sed fringilla quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque varius varius consequat. Nam pretium purus sodales nisl dictum dignissim. Aliquam sem sapien, imperdiet ut dignissim eu, imperdiet ut felis. Aenean consequat mauris urna, et rutrum massa aliquet ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas at dui odio. Integer odio nibh, convallis sit amet metus et, sollicitudin porttitor neque. Fusce a nisl vel nulla porttitor dictum in sit amet ante. Integer varius commodo eros eu dignissim. Nullam eu dui ut orci sagittis tincidunt. Cras eget turpis vitae nibh iaculis efficitur et nec elit. Nunc lobortis turpis eget lectus tempor, sed efficitur neque volutpat.</p><p>Quisque nisl est, rhoncus eu ultricies ut, interdum vel nunc. Aenean ligula arcu, mollis vehicula ante ac, auctor semper ex. Integer ullamcorper dignissim suscipit. Suspendisse lectus est, mollis id nisl quis, aliquet tempor tortor. Aliquam vel convallis sapien. Integer ultricies dolor nec ullamcorper accumsan. Mauris ut laoreet augue, nec consequat sapien. Duis suscipit elit neque, sed eleifend nibh eleifend vitae. Praesent convallis odio leo, ac ultrices est elementum quis. Aliquam erat volutpat. Sed non condimentum erat.</p>', 'Aenean consequat mauris urna, et rutrum massa aliquet ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas at dui odio. Integer odio nibh, convallis sit amet metus et, sollicitudin porttitor neque. Fusce a nisl vel nulla porttitor dictum in sit amet ante. Integer varius commodo eros eu dignissim. Nullam eu dui ut orci sagittis tincidunt. Cras eget turpis vitae nibh iaculis efficitur et nec elit. Nunc lobortis turpis eget lectus tempor, sed efficitur neque volutpat.', '2024-03-19', 'Berita Umum', 'pexels-carlos-oliva-3586966.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'asd', 'agusandriputra@smarteye.id', 'sdasdas', '2024-03-17 17:12:09'),
(2, 'Agus smart', 'agusandriputra@smarteye.id', 'sdasdassdas tasdas', '2024-03-17 17:15:49'),
(3, 'Agus smart', 'agusandriputra@smarteye.id', 'sdasdassdas tasdas', '2024-03-17 17:16:33'),
(4, 'Agus', 'asdasda@asda.com', 'asdasdewcxasdxcasdas', '2024-03-17 17:16:50'),
(5, 'sdasd', 'sdasd@fasd.com', 'dasd', '2024-03-17 17:17:28'),
(6, 'Agus Andri Putra', 'email@email.com', 'saya tekah menandasdaslio sd asdosnda ', '2024-03-17 17:21:18'),
(7, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'sdasdas', '2024-03-17 17:23:13'),
(8, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'asdas', '2024-03-17 17:24:35'),
(9, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'asdas', '2024-03-17 17:32:17'),
(10, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'sadas', '2024-03-17 17:34:09'),
(11, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'sdasdas', '2024-03-17 17:39:43'),
(12, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'sadasd', '2024-03-17 17:40:24'),
(13, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'sadasd', '2024-03-17 17:41:11'),
(14, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'xzczxczx', '2024-03-17 17:50:41'),
(15, 'Agus Andri Putrac asdas', 'agusandriputra@smarteye.id', 'xzcscasc', '2024-03-17 18:04:54'),
(16, 'radio-384', 'asdas#@fsad.com', 'test message', '2024-03-17 21:57:50'),
(17, 'radio-384asdas', 'asdas#@fsad.com', 'test messagedas', '2024-03-17 21:59:12'),
(18, 'Ahsdiwk;', 'asdas@dasda.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2024-03-17 21:59:48'),
(19, 'Agus Andri Putra', 'agusandriputra@smarteye.id', 'sasZcasc ', '2024-03-17 22:02:45'),
(20, 'Agus Andri Putra asdasdas', 'agusandriputra@smarteye.id', 'sasZcasc sdasda', '2024-03-17 22:02:57'),
(21, 'Agus Andri Putra asdasdasasdasd', 'agusandripsadasutra@smarteye.id', 'sasZcasc sdasdasdassda', '2024-03-17 22:03:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_pelatihan`
--

CREATE TABLE `fasilitas_pelatihan` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas_pelatihan`
--

INSERT INTO `fasilitas_pelatihan` (`id`, `nama_fasilitas`, `gambar`) VALUES
(1, 'pelatihan gratis', 'pexels-fauxels-3183198.jpg'),
(3, 'Sertifikat BNSP', NULL),
(4, 'Materi daging', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer_contact`
--

CREATE TABLE `footer_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `footer_contact`
--

INSERT INTO `footer_contact` (`id`, `email`, `address`, `phone`, `whatsapp`) VALUES
(1, 'email@email.com', 'jalan alamat di surabaya', '085795580512', '085112345589'),
(2, 'email@email.com', 'jalan alamat di surabaya', '085795580512', '085112345589'),
(3, 'email@email.com', 'BPVP SIDOARJO Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '085795580512', '085112345589');

-- --------------------------------------------------------

--
-- Struktur dari tabel `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `logo`, `description`) VALUES
(1, '../../assets/img/logo.png', 'sadasasas'),
(2, '../../assets/img/logo.png', 'sadasasas'),
(3, '../../assets/img/logo.png', 'Aenean mauris lacus, faucibus eu pharetra quis, convallis in lacus. Proin ut tortor sed leo euismod tempor. Fusce efficitur ligula faucibus ligula vehicula, ac viverra tellus facilisis. Donec accumsan, erat quis fringilla vestibulum, purus ante rhoncus nibh, non hendrerit erat elit nec ex. Aliquam eu est in augue maximus varius. Pellentesque in magna sed lectus viverra placerat. Donec ac scelerisque ligula. Nullam gravida mauris nisi, at elementum sapien pulvinar id. Nam non lorem sit amet massa placerat posuere. Proin non nulla nibh. Donec sollicitudin est non nunc iaculis condimentum. Sed sit amet dictum ligula. Praesent in mi efficitur, malesuada lectus eu, viverra quam. Mauris rhoncus, mauris id faucibus dictum, risus mauris varius metus, in lacinia risus justo in enim. Nulla ultricies, tortor vel tincidunt aliquam, diam ipsum tristique tellus, vel eleifend tellus tellus vel neque.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_slider`
--

CREATE TABLE `gambar_slider` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gambar_slider`
--

INSERT INTO `gambar_slider` (`id`, `nama`, `deskripsi`, `path`) VALUES
(2, 'pexels-carlos-oliva-3586966.jpg', 'SAD', '../../assets/img/pexels-carlos-oliva-3586966.jpg'),
(4, 'pexels-maria-geller-2127037.jpg', 'mini cooper', '../../assets/img/pexels-maria-geller-2127037.jpg'),
(5, 'pexels-mike-bird-116675.jpg', 'rover', '../../assets/img/pexels-mike-bird-116675.jpg'),
(6, 'pexels-lukas-1420702.jpg', 'Laptop', '../../assets/img/pexels-lukas-1420702.jpg'),
(7, 'pexels-jess-bailey-designs-743986.jpg', 'Pencil', '../../assets/img/pexels-jess-bailey-designs-743986.jpg'),
(8, 'pexels-fauxels-3183132.jpg', 'foto', '../../assets/img/pexels-fauxels-3183132.jpg'),
(9, 'pexels-andreas-barth-1131774.jpg', 'elang', '../../assets/img/pexels-andreas-barth-1131774.jpg'),
(10, 'pexels-giorgio-de-angelis-1413412.jpg', 'motor', '../../assets/img/pexels-giorgio-de-angelis-1413412.jpg'),
(11, 'pexels-adrian-dorobantu-2127733.jpg', 'Lamborghini', '../../assets/img/pexels-adrian-dorobantu-2127733.jpg'),
(13, '5447520-gundam-anime-cgi.jpg', 'test image', '../../assets/img/5447520-gundam-anime-cgi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `info` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id_pelatihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `info`, `gambar`, `description`, `id_pelatihan`) VALUES
(16, 'Front End Developer Pemula', 'Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.', 'pexels-jay-pizzle-3802510.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae<br>&nbsp;</p><h3>Aenean ut quam</h3><ul><li>Etiam cursus, justo</li><li>Vestibulum viverra neque sapien</li><li>efficitur maximus lacus</li></ul>', 13),
(17, 'Belajar ReactJs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.', 'pexels-lukas-1420702.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>', 13),
(18, 'Belajar JQuery Tingkat Menengah', 'Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo', 'pexels-fauxels-3183198.jpg', '<p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo</p>', 13),
(19, 'Backend Untuk Pemula', 'Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.', 'pexels-pixabay-356056.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae<br>&nbsp;</p><h3>Hasil Pelatihan</h3><ul><li>Dapat memahami logika pemrograman</li><li>Dapat Sertifikat</li></ul>', 18),
(20, 'studi kasus edit', 'ini keterangan edit', 'pexels-aleksandar-pasaric-325185.jpg', '<p>ini paragrap kasus edit</p>', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `memilih_kami`
--

CREATE TABLE `memilih_kami` (
  `id` int(11) NOT NULL,
  `nama_choose` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `memilih_kami`
--

INSERT INTO `memilih_kami` (`id`, `nama_choose`, `gambar`) VALUES
(1, 'Sertifikat Kompetensi', 'pexels-adrian-dorobantu-2127733.jpg'),
(2, 'Pelatihan Kompetensi', NULL),
(3, 'Bimbingan Karir', NULL),
(4, 'Akses & Informasi Pasar Kerja', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra_kerja`
--

CREATE TABLE `mitra_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mitra_kerja`
--

INSERT INTO `mitra_kerja` (`id`, `nama`, `deskripsi`, `path`) VALUES
(1, '5447520-gundam-anime-cgi (1).jpg', 'test image', '../../assets/img/5447520-gundam-anime-cgi (1).jpg'),
(3, '123128.jpg', '', '../../assets/img/123128.jpg'),
(4, '1287239.jpg', 'gundam', '../../assets/img/1287239.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `waktu_post` datetime NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id`, `judul`, `description`, `waktu_post`, `gambar`) VALUES
(13, 'Frontend web developer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque sollicitudin felis, nec sodales tellus vehicula facilisis. Phasellus eu sagittis enim. Duis urna sapien, iaculis sit amet felis at, volutpat varius justo. Nulla fermentum lorem eget faucibus tincidunt. In in dictum purus. Praesent eu aliquet sem. Suspendisse eget turpis at ex rhoncus bibendum vel sit amet est. Morbi nec lacinia nibh. Fusce volutpat quis quam vel porttitor.</p><p>Aliquam elit arcu, viverra a semper laoreet, tincidunt id magna. Integer ut elit ac enim porttitor vehicula id nec nunc. In ultrices, est id tempus lacinia, velit quam vestibulum dui, sed efficitur turpis est quis felis. Pellentesque commodo dui id libero suscipit, eget dictum erat bibendum. Proin tristique in nunc eu convallis. Suspendisse at facilisis dui. Aliquam luctus mi et nunc malesuada venenatis. Pellentesque volutpat nunc vel mauris imperdiet, et bibendum purus gravida. Etiam id sollicitudin felis. Proin eu arcu in mi luctus mattis in ac turpis. Ut enim diam, vehicula eget magna eget, tempor commodo lacus. Phasellus viverra varius arcu, ut elementum tellus ullamcorper non. Nam tincidunt dolor vehicula felis lobortis condimentum.</p><p>Etiam quam mauris, fermentum a nisi a, tincidunt mollis nisl. Fusce aliquet nibh sit amet aliquet mattis. In non aliquam eros. Pellentesque eget purus ut augue mollis sodales eu eu felis. Nam euismod convallis mauris, a varius orci consequat eu. Ut id egestas sapien. Duis rhoncus leo lacinia vulputate dictum. Donec eget est ante. Nunc accumsan justo libero, vestibulum imperdiet nibh luctus vel. Duis vitae magna dictum, elementum lectus vitae, pretium enim. Quisque lobortis id tortor sed interdum. Maecenas porttitor, orci eget efficitur pulvinar, velit nisi tempus ipsum, eu posuere sapien dolor nec ipsum. Nam scelerisque, nulla nec blandit sodales, neque risus condimentum turpis, porta varius turpis lorem ac tellus.</p><p>Suspendisse et suscipit magna. Etiam id libero eros. In a ultricies metus, sed fringilla quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque varius varius consequat. Nam pretium purus sodales nisl dictum dignissim. Aliquam sem sapien, imperdiet ut dignissim eu, imperdiet ut felis. Aenean consequat mauris urna, et rutrum massa aliquet ac. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas at dui odio. Integer odio nibh, convallis sit amet metus et, sollicitudin porttitor neque. Fusce a nisl vel nulla porttitor dictum in sit amet ante. Integer varius commodo eros eu dignissim. Nullam eu dui ut orci sagittis tincidunt. Cras eget turpis vitae nibh iaculis efficitur et nec elit. Nunc lobortis turpis eget lectus tempor, sed efficitur neque volutpat.</p><p>Quisque nisl est, rhoncus eu ultricies ut, interdum vel nunc. Aenean ligula arcu, mollis vehicula ante ac, auctor semper ex. Integer ullamcorper dignissim suscipit. Suspendisse lectus est, mollis id nisl quis, aliquet tempor tortor. Aliquam vel convallis sapien. Integer ultricies dolor nec ullamcorper accumsan. Mauris ut laoreet augue, nec consequat sapien. Duis suscipit elit neque, sed eleifend nibh eleifend vitae. Praesent convallis odio leo, ac ultrices est elementum quis. Aliquam erat volutpat. Sed non condimentum erat.</p>', '2024-03-27 03:57:00', '../assets/img/pexels-lukas-1420702.jpg'),
(16, 'Infrastructure IT', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>', '2024-03-20 22:12:00', '../assets/img/pexels-arshad-sutar-1749303.jpg'),
(17, 'Digital Marketing', '<p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae</p>', '2024-03-21 22:13:00', '../assets/img/pexels-fauxels-3183132.jpg'),
(18, 'Backend Developer', '<p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>', '2024-03-26 22:13:00', '../assets/img/1338166.png'),
(19, 'Project Manager Course', '<p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisi velit, dapibus ut nulla quis, ornare molestie orci. Maecenas auctor quis nulla nec viverra. Sed id bibendum ligula. Duis mi nibh, dictum nec facilisis id, vestibulum at nisl. Proin pulvinar venenatis lorem, non pretium est sollicitudin a. Suspendisse sed libero pretium, luctus magna vel, euismod erat. Suspendisse mollis ipsum risus, non venenatis risus mollis eget. Mauris in augue gravida, ultricies dolor non, pulvinar est. Etiam arcu justo, bibendum in tempor vitae, accumsan porta lacus.</p><p>Vestibulum viverra neque sapien, vel consectetur orci commodo in. Nam maximus, diam vel vulputate tristique, urna sapien cursus enim, nec dictum felis mi eget leo. Donec ac nisi viverra, convallis est vitae, sollicitudin urna. Proin ac condimentum sem. Suspendisse vel fringilla massa. Mauris pellentesque vitae purus sit amet lacinia. Nulla eu mi dapibus, placerat nibh ac, facilisis neque. Cras varius nisi eu consequat tempor. Maecenas aliquet maximus nulla, vel faucibus felis porta nec. Proin eget odio leo.</p><p>Morbi mi lectus, imperdiet ut tellus a, facilisis sagittis est. Nulla dictum lacus sed consequat dignissim. Mauris condimentum nibh ut massa blandit, eget varius justo cursus. Vestibulum condimentum orci eu enim elementum porttitor. Vestibulum id ante tempor, facilisis mi ac, sodales erat. Aenean vel eleifend leo, sodales pellentesque nisl. Curabitur dictum nisl in mi lacinia, id tristique velit dictum. Sed vehicula non est eu lacinia. Maecenas orci lacus, tempus in feugiat eu, elementum ac ante.</p><p>Etiam cursus, justo ut hendrerit vestibulum, diam arcu dignissim felis, sed finibus ante lectus id dolor. Donec a ipsum justo. Proin justo justo, luctus in risus eget, ullamcorper facilisis ipsum. Nunc at turpis eu dui tempus mollis. Nunc viverra porttitor quam at pharetra. Nunc accumsan, leo non iaculis elementum, orci odio gravida orci, sit amet congue urna ligula non neque. Aliquam vel est vitae lorem varius egestas.</p><p>Aenean ut quam sit amet ante aliquam viverra. Phasellus a interdum odio, at facilisis diam. Donec dictum sed arcu a ornare. Praesent porta, velit at vestibulum tempor, nibh risus feugiat dolor, nec pharetra erat dolor quis sem. Donec enim diam, euismod non ante eu, efficitur maximus lacus. Nunc ultricies leo dolor, porttitor rhoncus justo lobortis consectetur. Aenean non dignissim enim. Aliquam tempor eleifend urna at aliquet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;</p>', '2024-03-19 22:14:00', '../assets/img/pexels-andreas-barth-1131774.jpg'),
(20, 'Lapangan', '<p>ini paragrap lapangan</p>', '2024-03-20 20:07:00', '../assets/img/pexels-albin-berlin-919073.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencapaian`
--

CREATE TABLE `pencapaian` (
  `id` int(11) NOT NULL,
  `pelatihan_sukses` varchar(255) NOT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pencapaian`
--

INSERT INTO `pencapaian` (`id`, `pelatihan_sukses`, `jumlah_peserta`) VALUES
(1, '2000', 200),
(2, '300', 2300),
(3, '100', 200),
(4, '300', 2334),
(5, '200', 2500),
(6, '250', 3000),
(7, '100', 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `social_media`
--

INSERT INTO `social_media` (`id`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, 'https://facebook.com', 'https://twitter.com', 'https://intsagram.com', 'https://youtube.com'),
(2, 'https://facebook.com', 'https://twitter.com', 'https://intsagram.com', 'https://youtube.com'),
(3, 'https://facebook.com', 'https://twitter.com', 'https://intsagram.com', 'https://youtube.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_bpvp`
--

CREATE TABLE `tentang_bpvp` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map_embed` text DEFAULT NULL,
  `featured_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tentang_bpvp`
--

INSERT INTO `tentang_bpvp` (`id`, `title`, `description`, `address`, `map_embed`, `featured_image`) VALUES
(1, 'TENTANG BPVP SIDOARJO', 'Deskription tentang Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.8766060872863!2d112.62569987591313!3d-7.4788757737434075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1de519fd213%3A0x9dc1469932d0fd5c!2sBPVP%20SIDOARJO!5e0!3m2!1sen!2sid!4v1710684582031!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'pexels-pixabay-356056.jpg'),
(2, 'Test Judul ', 'ini description', 'alamat', 'sdasd', NULL),
(3, 'qweas', 'dasdsda', 'sdasd', 'sdasdas', 'pexels-mike-bird-244206.jpg'),
(4, 'Tentang BPVP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.506231244595!2d112.6282748!3d-7.4788811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1de519fd213%3A0x9dc1469932d0fd5c!2sBPVP%20SIDOARJO!5e0!3m2!1sen!2sid!4v1710693436345!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'pexels-mike-bird-244206.jpg'),
(5, 'Tentang BPVP', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.506231244595!2d112.6282748!3d-7.4788811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1de519fd213%3A0x9dc1469932d0fd5c!2sBPVP%20SIDOARJO!5e0!3m2!1sen!2sid!4v1710693436345!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL),
(6, 'Tentang BPVP', '<p><strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><ul><li>sadasd</li><li>dasdas</li><li>das</li><li>dasd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li></ul>', 'Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.506231244595!2d112.6282748!3d-7.4788811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1de519fd213%3A0x9dc1469932d0fd5c!2sBPVP%20SIDOARJO!5e0!3m2!1sen!2sid!4v1710693436345!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL),
(7, 'Tentang BPVP', '<p><strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry.&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><ul><li>sadasd</li><li>dasdas</li><li>das</li><li>dasd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li></ul>', 'Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.506231244595!2d112.6282748!3d-7.4788811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1de519fd213%3A0x9dc1469932d0fd5c!2sBPVP%20SIDOARJO!5e0!3m2!1sen!2sid!4v1710693436345!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL),
(8, 'Tentang BPVP', '<p><strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry.&nbsp;</p><p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><ul><li>sadasd</li><li>dasdas</li><li>das</li><li>dasd</li><li>asd</li><li>asd</li><li>asd</li><li>asd</li></ul><p>says update lagi</p>', 'Jl. Raya Kebaron, Kebaron Dua, Kepadangan, Kec. Tulangan, Kabupaten Sidoarjo, Jawa Timur 61273', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15823.506231244595!2d112.6282748!3d-7.4788811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1de519fd213%3A0x9dc1469932d0fd5c!2sBPVP%20SIDOARJO!5e0!3m2!1sen!2sid!4v1710693436345!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimonial`
--

INSERT INTO `testimonial` (`id`, `nama`, `testimoni`) VALUES
(1, 'Agus Andri Putra', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam faucibus vulputate magna, tristique consectetur sem vehicula sed. Ut vehicula turpis in dignissim imperdiet. Proin felis leo, pellentesque a velit scelerisque, pulvinar vestibulum nisl. Nam eget diam luctus lorem imperdiet condimentum. Nulla finibus vulputate nisl quis fringilla.'),
(2, 'Agus', 'Aenean accumsan diam feugiat, dignissim leo nec, feugiat metus. Mauris ex felis, ornare faucibus justo nec, varius dapibus enim.'),
(3, 'Putra', 'Nulla blandit imperdiet rutrum. Pellentesque dictum tincidunt lacus quis ornare. Praesent vulputate arcu ut sapien feugiat, quis iaculis dolor suscipit. Maecenas rutrum bibendum nulla vel facilisis.'),
(4, 'Rasidai', 'Sed quis mi euismod, tempus sem id, eleifend lorem. Ut tempus odio pellentesque, laoreet nunc vitae, ultricies velit. Aenean in dui finibus, tempus neque eget, efficitur metus. In hac habitasse platea dictumst. Fusce vel laoreet leo, ut volutpat justo. Nam sed felis ut justo porta euismod. Ut non placerat dui. Cras tempus massa eu arcu pretium, a elementum odio tempus. Praesent porta odio est, quis blandit felis ullamcorper at. Aliquam '),
(5, 'Zfran', ' tempus eu mi vitae, euismod ultrices dolor. Nulla mollis mattis urna vitae consectetur. Morbi dictum ut velit non aliquam. dNulla a'),
(6, 'Firman', 'ulla accumsan risus augue, ac malesuada mi faucibus vitae. Quisque scelerisque luctus egestas. Suspendisse a dapibus nisl. Quisque lacus mauris, tincidunt ut justo at, porta dictum eros. Quisque efficitur rutrum tempus. Duis fermentum, nunc sit amet bibendum bibendum, metus massa efficitur lacus, eget fringilla nisi quam eu erat. Sed dapibus quam id urna fermentum viverra. Sed ut lacus nisi. Etiam gravida arcu eros'),
(7, 'Vestibu dakoa', 'Vestibulum laoreet est ut sagittis molestie. Nunc scelerisque felis sed nulla ultrices, a sodales nunc egestas. Quisque consequat luctus scelerisque. Etiam eu imperdiet urna. Aliquam vel hendrerit nisl, non consequat dui. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$9ungAWvAi74OgjHb7yiwxuwg.iOk/1w4Rm5p0XbpVH7eE4jwy9u4q');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas_pelatihan`
--
ALTER TABLE `fasilitas_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `footer_contact`
--
ALTER TABLE `footer_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gambar_slider`
--
ALTER TABLE `gambar_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pelatihan` (`id_pelatihan`);

--
-- Indeks untuk tabel `memilih_kami`
--
ALTER TABLE `memilih_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra_kerja`
--
ALTER TABLE `mitra_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pencapaian`
--
ALTER TABLE `pencapaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang_bpvp`
--
ALTER TABLE `tentang_bpvp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_pelatihan`
--
ALTER TABLE `fasilitas_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `footer_contact`
--
ALTER TABLE `footer_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gambar_slider`
--
ALTER TABLE `gambar_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `memilih_kami`
--
ALTER TABLE `memilih_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mitra_kerja`
--
ALTER TABLE `mitra_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pencapaian`
--
ALTER TABLE `pencapaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tentang_bpvp`
--
ALTER TABLE `tentang_bpvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_id_pelatihan` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
