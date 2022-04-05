CREATE TABLE `krs` (
  `id` int(15) NOT NULL,
  `mahasiswa_npm` char(15) NOT NULL,
  `matakuliah_kodemk` char(10) NOT NULL
) ;

##  Data untuk tabel `krs`

INSERT INTO `krs` (`id`, `mahasiswa_npm`, `matakuliah_kodemk`) VALUES
(1, '2010631170145', '02345'),
(2, '2010631170146', '12542'),
(3, '2010631170147', '66842');



## Structure dari tabel `mahasiswa`


CREATE TABLE `mahasiswa` (
  `npm` char(15) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi') NOT NULL,
  `alamat` text NOT NULL
);


## Data untuk tabel `mahasiswa`


INSERT INTO `mahasiswa` (`npm`, `nama`, `jurusan`, `alamat`) VALUES
('2010631170145', 'Habillah Darma', 'Teknik Informatika', 'Karawang'),
('2010631170146', 'Harvian Arga Adi Putra', 'Teknik Informatika', 'Karawang'),
('2010631170147', 'Hilda Ayu Pradini', 'Teknik Informatika', 'Karawang');


## Structure dari tabel `matakuliah`


CREATE TABLE `matakuliah` (
  `kodemk` char(10) NOT NULL,
  `nama_mk` varchar(70) NOT NULL,
  `jumlah_sks` int(10) NOT NULL
);


## Data untuk tabel `matakuliah`


INSERT INTO `matakuliah` (`kodemk`, `nama_mk`, `jumlah_sks`) VALUES
('02345', 'Basis Data', 3),
('12542', 'Pemrograman Berbasis Web', 3),
('66842', 'Algoritma Dan Struktur Data', 3);

## INDEKS UNTUK TABLE 
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_npm` (`mahasiswa_npm`),
  ADD KEY `matakuliah_kodemk` (`matakuliah_kodemk`);


ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);


ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodemk`);


ALTER TABLE `krs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `krs`
  ADD CONSTRAINT `mahasiswa_npm` FOREIGN KEY (`mahasiswa_npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `matakuliah_kodemk` FOREIGN KEY (`matakuliah_kodemk`) REFERENCES `matakuliah` (`kodemk`);
;
