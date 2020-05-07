-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2020 lúc 02:07 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlby`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `hoten`, `email`, `password`, `sdt`, `diachi`, `created_at`, `updated_at`) VALUES
(1, 'Lê Văn Hiếu', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0888537087', '911/1/8 Lạc Long Quân , Q.Tân Bình, TP HCM', '2020-04-27 01:16:47', NULL),
(2, 'Lê Minh Chiến', 'chien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01234567', 'TP Long An', '2020-04-28 03:47:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(10) UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danh_muc`, `mota`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức', 'đọc tin tức', 0, NULL, NULL),
(3, 'Thông báo', 'Đọc thông báo', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_04_26_140854_create_admin_table', 1),
(3, '2020_04_27_043919_create_phuhuynh_table', 2),
(4, '2020_04_27_084259_create_danhmuc_table', 3),
(5, '2020_04_29_035659_create__t_c_d_g_table', 4),
(6, '2020_04_30_045319_create_phieudanhgia_table', 5),
(7, '2020_04_30_050926_create_phieudanhgia_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudanhgia`
--

CREATE TABLE `phieudanhgia` (
  `id_pdg` int(11) NOT NULL,
  `id_phuhuynh` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `tuan` int(11) NOT NULL,
  `diem` float NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudanhgia`
--

INSERT INTO `phieudanhgia` (`id_pdg`, `id_phuhuynh`, `hoten`, `tuoi`, `thang`, `tuan`, `diem`, `created_at`) VALUES
(15, 3, 'Hiếu', 1, 1, 1, 2, '2020-05-02'),
(16, 3, 'Hiếu', 1, 1, 1, 2, '2020-05-02'),
(18, 3, 'Hiếu', 1, 1, 1, 2, '2020-05-02'),
(19, 3, 'Hiếu', 1, 1, 2, 4, '2020-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuhuynh`
--

CREATE TABLE `phuhuynh` (
  `id_phuhuynh` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsinh` date NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuhuynh`
--

INSERT INTO `phuhuynh` (`id_phuhuynh`, `hoten`, `email`, `password`, `namsinh`, `sdt`, `diachi`, `created_at`, `updated_at`) VALUES
(3, 'Lê Văn Hiếu', 'hieule@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1999-01-03', '0888537087', 'Đồng Nai', '2020-04-27 04:43:27', NULL),
(5, 'Trần Nguyễn Quang Phúc', 'phuc@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-04-28', '0000000000', 'Bình Định', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tcdg`
--

CREATE TABLE `tcdg` (
  `id_tcdg` int(10) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuoi` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `tuan` int(11) NOT NULL,
  `diem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tcdg`
--

INSERT INTO `tcdg` (`id_tcdg`, `tieude`, `noidung`, `tuoi`, `thang`, `tuan`, `diem`, `created_at`, `updated_at`) VALUES
(2, 'Tiêu chí 2', 'nội dung 2', 1, 1, 2, 2, NULL, NULL),
(3, 'Tiêu chí 3', 'nội dung 3', 1, 1, 1, 1, NULL, NULL),
(4, 'Tiêu chí 4', 'nội dung 4', 1, 1, 1, 1, NULL, NULL),
(6, 'Tiêu chí 10', '......', 1, 1, 2, 1, NULL, NULL),
(7, 'Tiêu chí 11', '.............', 2, 1, 1, 1, NULL, NULL),
(8, 'Tiêu chí', '............', 1, 3, 1, 1, NULL, NULL),
(9, 'Tiêu chí', '..............', 1, 4, 1, 1, NULL, NULL),
(10, 'tiêu chí', '...............................', 1, 1, 2, 1, NULL, NULL),
(11, 'tiêu chí', '..............................', 1, 1, 3, 1, NULL, NULL),
(12, 'Tiêu chí', '.................................', 1, 1, 4, 1, NULL, NULL),
(13, 'Tiêu chí', 'nội dung ..............', 1, 1, 2, 1, NULL, NULL),
(14, 'tiêu chí', 'nội dung ..............', 1, 1, 2, 1, NULL, NULL),
(15, 'tiêu chí', 'nội dung ..............', 1, 1, 2, 1, NULL, NULL),
(16, 'Tiêu chí', 'nội dung ..............', 1, 1, 1, 1, NULL, NULL),
(17, 'Tiêu chí', 'Nội dung ............................', 1, 1, 1, 1, NULL, NULL),
(18, 'Tiêu chí', 'Nội dung ............................', 1, 1, 1, 1, NULL, NULL),
(20, 'Tiêu chí', 'Nội dung ............................', 1, 1, 1, 1, NULL, NULL),
(21, 'Tiêu chí', 'Nội dung ............................', 2, 2, 1, 1, NULL, NULL),
(22, 'Tiêu chí', 'Nội dung ............................', 3, 1, 1, 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieudanhgia`
--
ALTER TABLE `phieudanhgia`
  ADD PRIMARY KEY (`id_pdg`),
  ADD KEY `id_phuhuynh` (`id_phuhuynh`);

--
-- Chỉ mục cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  ADD PRIMARY KEY (`id_phuhuynh`);

--
-- Chỉ mục cho bảng `tcdg`
--
ALTER TABLE `tcdg`
  ADD PRIMARY KEY (`id_tcdg`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `phieudanhgia`
--
ALTER TABLE `phieudanhgia`
  MODIFY `id_pdg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  MODIFY `id_phuhuynh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tcdg`
--
ALTER TABLE `tcdg`
  MODIFY `id_tcdg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phieudanhgia`
--
ALTER TABLE `phieudanhgia`
  ADD CONSTRAINT `phieudanhgia_ibfk_1` FOREIGN KEY (`id_phuhuynh`) REFERENCES `phuhuynh` (`id_phuhuynh`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
