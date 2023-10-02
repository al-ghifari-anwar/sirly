CREATE TABLE `tb_judul` (
  `id_judul` int PRIMARY KEY AUTO_INCREMENT,
  `nama_judul` varchar(25),
  `img_judul` varchar(100)
);

CREATE TABLE `tb_percobaan` (
  `id_percobaan` int PRIMARY KEY AUTO_INCREMENT,
  `id_judul` int,
  `nama_percobaan` varchar(25),
  `img_percobaan` varchar(100)
);

CREATE TABLE `tb_materi` (
  `id_materi` int PRIMARY KEY AUTO_INCREMENT,
  `id_percobaan` int,
  `isi_materi` text,
  `img_materi` varchar(100)
);

CREATE TABLE `tb_petunjuk` (
  `id_petunjuk` int PRIMARY KEY AUTO_INCREMENT,
  `id_percobaan` int,
  `isi_petunjuk` text
);
