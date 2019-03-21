-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2018 at 06:39 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u4539270_mnwbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertise`
--

CREATE TABLE `advertise` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `adv_img` varchar(255) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertise`
--

INSERT INTO `advertise` (`id`, `title`, `adv_img`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 'susu kental', '23f0364514b23b7753af1e389d1dbdb8.png', 1, '2017-10-16', 1, '2017-10-16', 0, '0000-00-00'),
(2, 'susu manis', 'd17e2be492cb79976b3e70b7f5c0a1cc.png', 1, '2017-10-16', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(12) NOT NULL,
  `angkatan` varchar(120) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(90) NOT NULL,
  `biography` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `group` varchar(120) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `angkatan`, `firstname`, `lastname`, `biography`, `website`, `email`, `phone_number`, `img`, `group`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(11, '2013', 'Muhammad Aldrie', 'Hermianto', 'Selama kuliah di MP-WNBK, Aldrie si manis adalah mahasiswa yang paling banyak membuat kejutan. Di awal kuliah, Aldrie sulit untuk didekati dan takut terhadap banyak hal. Namun, tak lama kemudian, bakat berakting dan pantomimnya muncul dan menonjol. Terutama di Gemilang Talentaku, penampilan Aldrie begitu lincah dan menghibur, pokoknya keren banget. Padahal waktu latihan Aldrie sering mogok, tak mau latihan. Namun begitu tampil di atas panggung, Aldrie membuktikan bahwa diam-diam dia mengamati dan menghafal gerakan-gerakan tarian operet yang diajarkan.', '', '', '', 'e819b48152cc1ae383c443ab9f7afb40.jpg', 'craft', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(12, '2013', 'Fahkriy', 'Al Farisi', 'Fakhry adalah mahasiswa yang sangat mandiri. Dia sering bergaul dengan mahasiswa jurusan lain di PNJ. Fakhry terkenal baik hati dan berani. Ketika LDK, misalnya, Fakhry bisa dipercaya untuk menjaga teman-temannya.', '', '', '', 'c973ebb3ea34fb768ee20ac4c74ace18.JPG', 'craft', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(13, '2013', 'Rifayantono Suryahadi', 'Nugroho', 'Di Gemilang Talentaku, Rifa berhasil membuktikan bahwa dirinya mampu bekerjasama dengan baik. Rifa ternyata bisa mengikuti akting dan gerakan tarian yang cukup rumit dan luar biasa...', '', '', '', '743275456ed7a8ecf176522e18764c8b.JPG', 'craft', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(14, '2013', 'Tata Imam', 'Purdi', 'Selama kuliah, Tata sangat datar dan sangat biasa sekali. Sulit melihat kemampuan dan bakatnya. Tetapi, Tata adalah salah satu mahasiswa yang paling mandiri dan paling bertanggung-jawab bagi dirinya sendiri. Ada satu kejadian yang paling berkesan tentang Tata. Suatu hari, Tata harus menyerahkan foto ke Bu Nino, namun yang ada di ruang dosen hanya Budebar. Untuk memastikan bahwa Budebar menyerahkan fotonya ke Bu Nino, Tata memotret Budebar yang sedang memegang fotonya sebagai bukti bahwa foto sudah diserahkan…. Hebat!', '', '', '', '024429e688bea7e492becda47d7c69cc.JPG', 'craft', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(15, '2013', 'Yogi', 'Samudra', 'Yoghi adalah mahasiswa yang sangat manis dan mempunyai semangat belajar yang tinggi. Para dosen mengenalnya sebagai mahasiswa yang ramah dan senang bercerita. Yang paling mengagumkan dari Yoghi adalah kemampuannya mengikuti mata kuliah kriya yang dibimbing oleh ibu-ibu IWK. Dia mempunyai ketelitian dan ketekunan yang tinggi, dan hasil karyanya selalu jadi salah satu yang terbaik.', '', '', '', 'e7aecdb95565039bf4518b2987402250.jpg', 'craft', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(16, '2013', 'Damar Thobias', 'Yudasama', 'Damar selalu peduli dan membela teman-temannya. Selain itu, Damar mempunyai semangat kuliah dan ketekunan yang tinggi. Di awal kuliah, sebelum Damar dikelompokkan ke dalam konsentrasi desain, hasil kerajinan tangan Damar (membuat keramik dan kriya) adalah salah satu yang terbaik.', '', '', '', '917c855042e48a86fd8a45299b5487cc.JPG', 'desain', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(17, '2013', 'Eldwin Raditya', 'Antony', 'Kata Budebar, Adi adalah Si Juru Kunci. Adi selalu memeriksa kunci, memeriksa AC, dan apabila ada masalah dengan AC di kelas (misalnya terlalu dingin atau terlalu panas), Adi-lah yang melapor Ac kurang dingin atau rusak. Adi disukai oleh teman-teman dan para dosen karena dia ceria dan lucu. Sebagai contohnya, di awal masa kuliah, Adi sering nyeletuk, “Aduh, aku jerawatan, nih! Aku mikirin pacar terus, sih!” So cute...', '', '', '', '84b674b8bfd5b7ba8d07862cc76ac232.jpg', 'desain', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(18, '2013', 'Rifki', 'Khuarizmi', 'Rifqy adalah mahasiswa penuh talenta. Rifqy mempunyai banyak kemampuan, seperti menggambar, bermain gitar, menari, dll. Walaupun Rifqy sering emosian, tetapi para dosen sangat mengagumi bakat artistik Rifqy, terutama ketika memperhatikan sebuah objek gambar yang rumit dan menggambarnya ulang sampai ke setiap detail.', '', '', '', '0381a5576f1a39d00b7e98a9b9c3e60e.jpg', 'desain', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(19, '2013', 'Gianni Thalitha', 'Syafitri', 'Di awal mata kuliah desain, dosen desain Fitri melihat bakat terpendam Fitri, yaitu menggambar dan menyatukan bentuk-bentuk dasar menjadi sebuah objek yang indah. Kini, dengan dukungan orangtuanya, Fitri menjadi seorang desainer tas (tote bag), mug dan pin. Dia menggambar sendiri semua corak/layout yang kemudian dicetak di permukaan tas, desainnya sangat original khas Fitri, hanya dengan menggunakan progam Paint di komputer. Tas hasil desainnya sudah dipakai dan dibeli oleh banyak orang.', '', '', '', '1fdcfcc7b4c6aa1423e69dd2d66b165e.jpg', 'desain', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(20, '2013', 'Aztika', 'Aprilia', 'Tika adalah primadona angkatan ini. Suaranya lembut, sikapnya manis, dan rajin menolong teman waktu belajar. Tika juga murah senyum dan baik hati. Di acara Gemilang Talentaku, Tika sangat cantik sekali dan tampil dengan baik sekali.', '', '', '', 'c3f3156720741039ae23bd72adc70414.jpg', 'desain', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(21, '2013', 'Arianda Wiradipa', 'Prabowo', 'Arya mempunyai segudang prestasi, baik di MP-WNBK maupun di luar kampus. Selain berbakat di bidang musik (menyanyi dan bermain alat musik), Arya mempunyai bakat komunikasi yang sangat mengagumkan. Terlihat pada acara Kerohanian Kilat (Roki) dan Edu-Day PNJ, dia yang menjadi MC selama acara berlangsung. Dia mempunyai kepercayaan diri yang tinggi, yang membuat penampilannya selalu memukau. Di MP-WNBK, Arya sering jadi pusat perhatian, karena dia ramah dan senang mengobrol dengan banyak orang.', '', '', '', '4276786af9d943923b78148c1e04064c.jpg', 'seni', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(22, '2013', 'Ridho Mohammad', 'Qamaruzzaman', 'Perkembangan Edo selama kuliah di MP-WNBK benar-benar membuat para dosen bangga kepadanya. Edo bisa bekerjasama dan berkomunikasi dengan sangat baik. Edo pun terkenal mempunyai pribadi yang manis dan menyenangkan. Ternyata Edo juga baik hati dan peduli kepada teman-temannya. Dia bahkan berani membela teman yang diganggu oleh teman lain.', '', '', '', '6b8b68292dfd990d7933dc6578b2cd74.jpg', 'seni', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(23, '2013', 'Mar\'ii', 'Habiibii', 'Habibii adalah mahasiswa yang suka jahil tetapi dia pandai bergaul. Dia mudah bergaul dengan mahasiswa dari jurusan lain di PNJ. Dia menunjukkan bakat, antusiasme dan kebolehannya pada Gemilang Talentaku sebagai pemeran utama (Sang Raja) dengan sangat baik sekali.', '', '', '', '7948037cecf0d0a29d4a7970003a1c74.JPG', 'seni', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(24, '2013', 'Samuel Bona', 'Panjaitan', 'Kemajuan Samuel di MP-WNBK sangat pesat. Samuel mempunyai banyak kebolehan, misalnya melukis dan menyanyi. Di acara Gemilang Talentaku, lukisannya menjadi kenang-kenangan dari MP-WNBK untuk Pak Sandiaga Uno dan membuat banyak penonton mengucap wow secara bersamaan, Samuel yang sebelumnya tertutup dan agak sulit didekati, kini terlihat percaya diri dan mampu berkomunikasi dengan baik dengan para dosen dan teman-teman di kampus. Samuel juga berhasil membuktikan bahwa dirinya mampu mandiri. Dia tinggal di kosan setiap Kamis-Sabtu dan pulang-pergi ke kampus sendiri dengan naik ojek.', '', '', '', '001311904fbfbbb6a46107605c539c48.jpg', 'seni', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(25, '2013', 'Tito Oktaviano Budi', 'Priyono', 'Tito adalah mahasiswa yang sangat mandiri. Dia kos di dekat kampus dan pulang-pergi sendiri dengan kendaraan umum. Tito juga terkenal manis, baik hati, bertanggung-jawab dan mempunyai sifat mengayomi. Dia membantu dosen-dosen menjaga dan membantu teman-teman lainnya, misalnya ketika LDK dan pada mata kuliah yang dilaksanakan di luar kelas seperti fotografi.', '', '', '', '91ab1127722c8dcb3ea55afbc304efd4.JPG', 'seni', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(26, '2013', 'Made Dwara', 'Abhysma', 'Abhy adalah mahasiswa yang penuh prestasi, baik di kampus maupun di luar kampus. Terkenang bulan pertama Abhy di kampus, Abhy selalu marah ketika mendengar lagu Indonesia Raya sehingga ada beberapa teman yang jahil yang sering mengganggunya dengan menyanyikan lagu Indonesia Raya. Tetapi, setelah diberikan pengertian dan latihan, sekarang Abhy tidak marah lagi jika mendengar lagu Indonesia Raya. Para dosen pun kagum dengan kemampuan Abhy dalam membagi konsentrasinya dan mengerjakan berbagai tugas sekaligus dalam satu waktu (multi-tasking), misalnya memainkan satu lagu dengan keyboard dan menyanyikan lagu yang lain di dalam kepalanya. Yang paling mengaggumkan, Abhy dapat menghitung hari lahir dengan mengetahui tanggal bulan dan tahun lahir kita.', '', '', '', 'ae3d90b1292e0bb2a483fc4896a3d604.JPG', 'komputer', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(27, '2013', 'Erhandi Deynes', 'Safa', 'Erhandi adalah seorang mahasiswa yang patuh dan mandiri. Erhandi berani datang ke kampus dengan menggunakan transportasi publik. Erhandi juga dikenal dosen-dosen sebagai mahasiswa yang rajin menabung di bank karena cita-citanya adalah menjadi pegawai BNI.', '', '', '', 'e07d47743f8660948365b8cde8b6f913.jpg', 'komputer', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(28, '2013', 'Fauzi Rahman', 'Asikin', 'Fauzi memiliki opini yang kuat tentang apa yang dia bisa lakukan. Fauzi selalu berkata, “Saya bukan mahasiswa berkebutuhan khsusus.” Karena itulah di Gemilang Talentaku, Fauzi hanya mau menjadi panitia. Ketika LDK pun, Fauzi menunjukkan jiwa kepemimpinannya dengan membantu bapak-ibu dan kakak-kakak panitia menjaga teman-teman', '', '', '', '0efbf0589ff59807af30e043a5065b8d.jpg', 'komputer', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(29, '2013', 'Orisa', 'Pradito', 'Orisa adalah mahasiswa yang luar biasa. Orisa mempunyai berbagai talenta dan segudang prestasi yang mengagumkan. Orisa adalah mahasiswa terbaik pada saat PKKP (pengenalan kampus) dan Orisa juga merupakan lulusan terbaik dengan predikat Cum Laude dari program studi MP-WNBK.', '', '', '', '3c15136a5815c7cf20d1f27cc09f6afb.JPG', 'komputer', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(30, '2013', 'Putri', '-', 'Di acara Gemilang Talentaku, Putri tampil sangat memukau. Gerakannya yang lincah namun gemulai ketika menari sebagai Puteri dari negeri Cina sungguh mengejutkan karena Putri termasuk mahasiswi yang biasanya pendiam. Di mata para dosen, Putri adalah mahasiswi yang manis dan mampu bekerjasama dengan baik sekali.', '', '', '', '222cc7420183b71b906a6e75e8f71a40.jpg', 'komputer', 1, '2018-04-07', 1, '2018-04-11', 0, '0000-00-00'),
(31, '2014', 'Azhar', 'Nugraha', 'Azhar adalah anak yang sangat berbakat dalam bidang fotografi dan mahasiwa yang cerdas', '', '', '', 'eee2114fd1dcc0b96fcb7b8b7897c469.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(32, '2014', 'Fajar Achmad', 'Abdillah', 'Fajar adalah anak yang rajin dan mudah bergaul', '', '', '', '0045e077f061b0e690f8990538911015.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(33, '2014', 'Galih Aziz', 'Satriawan', 'Galih anak yang sangat rajin dan humoris', '', '', '', '4e9d8166dc6089270cf2b85bcd5b4626.jpg', 'desain', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(34, '2014', 'Heryandi', 'Heikal', 'Heikal adalah anak yang sangat lucu dan juga tekun', '', '', '', '8349898fbb69599825c7b3b83d4d05ae.jpg', 'desain', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(35, '2014', 'Mohamad Raka Arya', 'Bisma', 'Raka adalah anak yang sangat rajin, pandai dan paling aktif untuk bertanya kepada dosen', '', '', '', 'bc122682fa6ee77d4f5f14f3185c2dbf.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(36, '2014', 'Wismoyo', 'Grahito', 'Ito adalah anak yang baik dan mudah berpartisipasi untuk segala kegiatan.', '', '', '', '3e1b44d87f500e0fd82e67ca7794c0c9.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(37, '2014', 'Muhammad Alif', 'Nugroho', 'Alif pandai melukis menggunakan kuas maupun perangkat lunak, desainnya bagus dan rajin mencatat', '', '', '', '99185f2831fa2106828698aa59850533.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(38, '2014', 'M Ziyan', 'Sajjad', 'Ziyan sangat berbakat dalam bidang fotografi, terlihat dari karya fotonya yang luar biasa mengagumkan (Keren banget)', '', '', '', 'd2cad058f4789fabb79798e5a4a34c02.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(39, '2014', 'Margareta Ratih', 'Dwi Hartanti', 'Maggy desainnya bagus, perfectionis dan kreatif', '', '', '', 'cb9809dfa2b2e7c1a2778cae221aef9e.jpg', 'desain', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(40, '2014', 'Alvino', 'Adama', 'Vino pintar, baik dalam akademis maupun diluar bidang akademis. Terlihat dari kemampuan dia bermain drum', '', '', '', 'bdce06a90e97249bf1492042a10de88c.jpg', 'komputer', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(41, '2014', 'Dwinta Mayaratri', 'Putri', 'walaupun pemalu, tetapi Dwinta sangat ramah dan baik hati', '', '', '', 'd3c99ebcba438453ebdd062a01c4abe7.jpg', 'komputer', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(42, '2014', 'Fitria Diniati', 'Saleha', 'Pintar adalah kata yang tepat untuk Fitria', '', '', '', '34d76e50c00626db3b84a9a628d34014.jpg', 'komputer', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(43, '2014', 'Garin Jalu Panengah', 'Jati', 'Garin adalah anak yang periang', '', '', '', 'd28ec27243c4e38a8349c3fe7bef750f.jpg', 'komputer', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(44, '2014', 'Muhammad Dani', 'Sabri', 'Dani, si mahasiswa yang tidak pernah membolos', '', '', '', '53e66f553d2046d79d932b86489f30d8.jpg', 'komputer', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(45, '2014', 'Nicholas', 'Hadi', 'Nicko adalah anak yang tekun', '', '', '', 'b8a73f02ee22759c290048de91fc1e37.jpg', 'komputer', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(46, '2014', 'Riyadi Cahyo', 'Utomo', 'Adi adalah anak yang pintar', '', '', '', 'dea8903a6b67a4178977ea9e54bb65bd.jpg', 'komputer', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(47, '2014', 'Sarah Adini', 'Putri', 'cerdas, pintar dan aktif', '', '', '', '353df7d85eda48e2f1c7283106fec968.jpg', 'komputer', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(48, '2014', 'Sarah Anggita', 'Noor', 'Mempunyai semangat yang tinggi, sangat periang, ramah dan menyenangkan teman temannya maupun pengajar.', '', '', '', '4b464d751f08a0a879ffa9f8bfc4728d.jpg', 'komputer', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(49, '2014', 'Syarifa', 'Aini', 'Lembut, ramah, mudah beradaptasi dan mudah bergaul.', '', '', '', '54408dd97c1da9cb1f9ca8a95644443a.jpg', 'komputer', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(50, '2014', 'Rosie Nur', 'Hafizah', 'Fizah salah satu mahasiswi yang cukup cerdas, peduli terhadap teman dan senang membantu mahasiswa lain dalam kegiatan perkuliahan.', '', '', '', 'a9fdd7c5e62f65441e934695d15528c6.jpg', 'komputer', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(51, '2014', 'Harley Valentino', 'Bramantyo', 'Senang menyanyi, berbakat dalam bidang seni. Terlihat dari puisi puisinya yang sangat menyentuh yang disalurkan ke dalam lagu lagu ciptaannya.', '', '', '', '4e7016ec9b568c9952014365e8ab097f.jpg', 'seni', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(52, '2014', 'Muhammad Fadillah', 'Yusif', 'Walaupun tidak banyak bergaul tetapi Fadil senang bernyanyi lagu lagu Barat dengan pengucapan kata yang baik.', '', '', '', '5570b6080a69039b8def28c088ee592b.jpg', 'seni', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(53, '2014', 'Tanya', 'Eldinda', 'Sangat ramah dan tidak pernah absen untuk mengucapkan salam kepada semua pengajar, dia juga pintar berdandan,pintar memadupadankan warna warna pakaian sehingga penampilannya sangat serasi.', '', '', '', '236efb439897625b1292015b77454fbc.jpg', 'seni', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(54, '2014', 'Annisa  Agustini', 'Utami', 'Si manis yang rajin dan senang membantu teman temanya.', '', '', '', '4d93dfe4aa7fed5834c8838758686e78.jpg', 'craft', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(55, '2014', 'Clara Alverina', 'S', 'Tegas, rajin tetapi senang bercanda dengan teman temannya', '', '', '', 'c5e847da110247ab4b7cada231359815.jpg', 'craft', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(56, '2014', 'Gregorius Andiriano Wardana Parangin', 'Angin', 'Cerdas dan cepat dalam mengerjakan semua tugasnya.', '', '', '', 'b459b5d09a4239960acdb1e05740f54b.jpg', 'craft', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(57, '2014', 'Khanza Azmi', 'Luthfi', 'Rajin dan pandai menjahit', '', '', '', '680247e6d6ef255cdedb4789804afb09.jpg', 'craft', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(58, '2014', 'Nur Alia', 'Istiqomah', 'Isti sangat peduli terhadap teman temannya', '', '', '', 'da236f779b5293d724ca10b7dd08ef71.jpg', 'craft', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(59, '2014', 'Wahyudi', '-', 'Sang penolong dan penuh kasih sayang terhadap teman teman', '', '', '', '44a202923f5b0878537f5c917bed2d7d.jpg', 'craft', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00'),
(60, '2014', 'Saefuloh', '-', 'Pendiam, pemalu tetapi pintar menjahit.', '', '', '', '28974cdf0174043dcadcc87abba019ba.jpg', 'craft', 1, '2018-04-11', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_groups`
--

CREATE TABLE `alumni_groups` (
  `id` int(12) NOT NULL,
  `name` varchar(130) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni_groups`
--

INSERT INTO `alumni_groups` (`id`, `name`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 'Art & Craft', 1, '2017-11-13', 1, '2018-04-07', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `background_site`
--

CREATE TABLE `background_site` (
  `id` int(12) NOT NULL,
  `image` varchar(255) NOT NULL,
  `page` enum('home','about','alumni','info','kontak','seni','art','desain') NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background_site`
--

INSERT INTO `background_site` (`id`, `image`, `page`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 'b633e7fd747acc8dea0dd6ecbe98af98.jpg', 'home', 1, '2018-02-10', 1, '2018-04-07', 0, '0000-00-00'),
(2, '24890f80bf1ddcc4859885dda1432f28.jpg', 'about', 1, '2018-02-10', 1, '2018-04-07', 0, '0000-00-00'),
(3, '43749df841042c518d2a088ede5a6545.jpg', 'alumni', 1, '2018-02-10', 1, '2018-04-07', 0, '0000-00-00'),
(4, '5b26170584c22b5538ac92f7586c9a9c.jpg', 'info', 1, '2018-02-10', 1, '2018-04-07', 0, '0000-00-00'),
(5, 'ac4e9f95571a7982793872a6a5d777b6.jpg', 'kontak', 1, '2018-02-10', 1, '2018-04-07', 0, '0000-00-00'),
(6, 'bde66a7efa1bfa2e49f3f025ef475d8d.jpg', 'seni', 1, '2018-02-10', 1, '2018-02-12', 0, '0000-00-00'),
(7, 'c7116c9e1b792a4820d2632912eef46a.JPG', 'art', 1, '2018-02-10', 1, '2018-02-12', 0, '0000-00-00'),
(8, 'cadea11a991358429da6b02b310cda18.jpg', 'desain', 1, '2018-04-10', 1, '2018-04-10', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `flag` enum('history','fasilitas','visi','misi','about','struktur','poma','ksrpd','') NOT NULL,
  `date_created` datetime NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_modified` datetime NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_deleted` datetime NOT NULL,
  `user_deleted` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `title`, `description`, `picture`, `flag`, `date_created`, `user_created`, `date_modified`, `user_modified`, `date_deleted`, `user_deleted`) VALUES
(1, '', '<ol>\r\n  <li>\r\n    <p class=\"p1\" style=\"text-align: justify;\">Membentuk karakter mahasiswa menjadi manusia yang berakhlak mulia dan percaya diri.</p>\r\n  </li>\r\n  <li style=\"text-align: justify;\">\r\n    <p class=\"p1\">Membentuk kemandirian mahasiswa dengan menggabungkan potensi yang dimilikinya untuk berkarya dimasyarakat dengan prilaku yang dapat diterima oleh lingkungan / masyarakat.</p>\r\n  </li>\r\n  <li>\r\n    <p class=\"p1\" style=\"text-align: justify;\">Membentuk mahasiswa memiliki ketrampilan menjual produk / jasa yang sesuai dengan minat dan kemampuan baik dikerjakan untuk perusahaan lain ataupun usaha sendiri.</p>\r\n  </li>\r\n</ol>', '404f5fabe32173f69499790fbd98880c.jpeg', 'misi', '2017-10-20 22:00:00', 1, '2018-02-12 02:18:57', 1, '0000-00-00 00:00:00', 0),
(2, '', '<p class=\"p1\" style=\"text-align: justify;\">Menjadi program studi percontohan di Indonesia dengan sistem pembelajaran yang tepat dan sesuai bagi Warga Negara Berkebutuhan Khusus dengan menge-depankan iman dan takwa dalam lingkungan yang sehat, menyenangkan, serta mampu membentuk kemandirian mahasiswa dengan perilaku yang dapat diterima masyarakat.</p>', '01c12f6ac0d87d41e029a0113bf94a42.jpeg', 'visi', '2017-10-20 11:50:47', 1, '2018-02-12 02:15:48', 1, '0000-00-00 00:00:00', 0),
(3, '', '<p class=\"p1\" style=\"text-align: justify;\">Program Studi Manajemen Pemasaran untuk Warga Negara Berkebutuhan Khusus disingkat menjadi MP-WNBK dengan SK DIRJEN DIKTI No:96/F/0/2013 Tanggal 17 April 2013 Sebagai wadah bagi lulusan SMA/SMK LB serta SMA/SMK Inklusi, MP-WNBK adalah program studi <em>vocational</em> yang akan melaksanakan <em>Individual Educational Program </em>berdasarkan pada <em>adapting thematic integrated curriculum </em>untuk melatih, mendidik dan membekali mahasiswa agar dapat menguasai bidang yang sesuai kemampuan dan minat masing-masing dengan beban 25% pendidikan kognitif (<em>knowledge)</em> dan 75% ketrampilan (<em>skill)</em>, merupakan Program Studi Perguruan Tinggi Negeri pertama dan satu-satunya di Indonesia.</p>', '34b04c250f625dd0570f1f28e6eeaaef.jpeg', 'about', '2018-02-10 03:33:18', 1, '2018-02-12 02:13:27', 1, '0000-00-00 00:00:00', 0),
(4, '', '<p style=\"text-align: justify;\">POMA MP-WNBK PNJ adalah singkatan dari Persatuan Orangtua Mahasiswa Program Studi Manajemen Pemasaran untuk Warga Negara Berkebutuhan Khusus Politeknik Negeri Jakarta. Merupakan satu wadah orangtua mahasiswa MP-WNBK PNJ yang mempunyai misi untuk memajukan anak-anak/warganegara berkebutuhan khusus melalui ketrampilan-ketrampilan, sehingga mereka mempunyai masa depan dan dapat bekerja secara mandiri.</p>', '186cb14b5ebc7cd866c91dfc09a1f7f1.jpeg', 'poma', '2018-02-10 03:34:40', 1, '2018-04-07 03:13:03', 1, '0000-00-00 00:00:00', 0),
(5, '', '<p style=\"text-align: justify;\">Pusat Pelatihan Teknologi Informasi Komunikasi dan Program Pencapaian Kesempatan Kerja untuk Para Penyandang Disabilitas yang baru saja dibangun dan dibuka di Politeknik Negeri Jakarta merupakan kerjasama antara Korean Society for Rehabilitation of Persons with Disabilities (KSRPD) dan Persatuan Orangtua Mahasiswa Program Studi Manajemen Pemasaran untuk Warga Negara Berkebutuhan Khusus Politeknik Negeri Jakarta (yang disingkat POMA MP-WNBK PNJ). Pusat Pelatihan ini didanai oleh Community Chest of Korea (CCK). Selain diajarkan keahlian-keahlian komputer dasar, para peserta pelatihan juga disiapkan untuk bekerja, seperti bagaimana menulis CV, bagaimana menghadapi wawancara kerja, dan bagaimana memulai bisnis sendiri, kesekertariatan dan office manner. Pusat pelatihan ini memiliki 2 kelas dengan 2 orang pengajar dan 40 orang peserta pelatihan.</p>', 'e6fdeba7b5622c037a9484f25c094e16.jpeg', 'ksrpd', '2018-02-10 03:37:12', 1, '2018-02-12 02:20:22', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(12) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `directive_home`
--

CREATE TABLE `directive_home` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `position` enum('wakil','direksi','','') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_modified` datetime NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_deleted` datetime NOT NULL,
  `user_deleted` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directive_home`
--

INSERT INTO `directive_home` (`id`, `name`, `description`, `position`, `picture`, `url`, `date_created`, `user_created`, `date_modified`, `user_modified`, `date_deleted`, `user_deleted`) VALUES
(5, 'Direktur Politeknik Negeri Jakarta', '“Politeknik Negeri Jakarta adalah pendidikan tinggi yang menyelenggarakan bidang vokasi. PNJ mempunyai 7 jurusan dan 34 program studi. Untuk tahun ini kami merencanakan ada 30 lulusan mahasiswa dari program studi D-3 MP-WNBK. Lulusan yang sudah ada untuk prodi ini sejumlah 20 mahasiswa. Saya mengajak kepada pemerintah dan para pengusaha untuk membantu program studi ini karena tanpa bantuan dari pemerintah dan pihak-pihak lain maka kami sangat berat untuk meningkatkan kemampuan anak didik.”<br>                                                            \r\n<b>Abdillah, S.E., M.Si</b>', 'direksi', '280266f62f3eb35b605502caf8cf0ea3.JPG', 'https://youtu.be/htaERfTVh6w', '2018-02-12 00:00:00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'Pembantu Direktur IV Bidang Kerjasama', '“PNJ telah bekerjasama dengan KSRPD dan program studi D-III MP-WNBK yang merupakan program studi termuda di PNJ. Harapan saya ke depan, semua lulusan dapat diserap oleh industri sesuai UU No. 8 tentang Penyandang Disabilitas. Pesan saya, prodi MP-WNBK ini dapat mempertahankan terus apa yang telah dicapai saat ini dan ke depannya dapat lebih ditingkatkan lagi.”<br>\r\n<b>Dr. Dianta Mustofa Kamal, S.T., M.T.</b>', 'wakil', 'ef90e253dd59edfccf35f607d9e069a2.jpg', 'https://youtu.be/_r47mNxOD8o', '2018-04-18 00:00:00', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `general_site`
--

CREATE TABLE `general_site` (
  `id` int(12) NOT NULL,
  `meta_tag_title` varchar(255) NOT NULL,
  `meta_tag_keywords` varchar(255) NOT NULL,
  `meta_tag_description` text NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_site`
--

INSERT INTO `general_site` (`id`, `meta_tag_title`, `meta_tag_keywords`, `meta_tag_description`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 'politeknik negeri jakarta sekolah berkebutuhan khusus jakarta bogor depok tanggerang bekasi jabodetabek', 'politeknik negeri jakarta', 'Politeknik Negeri Jakarta adalah salah satu perguruan tinggi negeri yang terdapat di areal kampus Universitas Indonesia, Depok, Jawa Barat, Indonesia', 1, '2017-09-11', 1, '2017-09-22', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `ic_logo`
--

CREATE TABLE `ic_logo` (
  `id` int(12) NOT NULL,
  `logo_title` varchar(255) NOT NULL,
  `logo_subtitle` varchar(120) NOT NULL,
  `logo_picture` varchar(255) NOT NULL,
  `favicon_picture` varchar(255) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ic_logo`
--

INSERT INTO `ic_logo` (`id`, `logo_title`, `logo_subtitle`, `logo_picture`, `favicon_picture`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 'MANAJEMEN PEMASARAN', 'Untuk Warga Negara Berkebutuhan Khusus', 'e4d00ac4bf96638eb748b1dd22bb6f3b.png', '5eb43c216dbd34e4d9b03c003291d4e0.png', 1, '2017-09-14', 1, '2018-02-28', 1, '2017-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `konsentrasi`
--

CREATE TABLE `konsentrasi` (
  `id` int(12) NOT NULL,
  `title` varchar(130) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `flag` enum('seni','art','desain','') NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` datetime NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsentrasi`
--

INSERT INTO `konsentrasi` (`id`, `title`, `image`, `description`, `flag`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(2, 'Art and Craft', '', '<p style=\"text-align: justify;\">Konsentrasi Art and Craft, mahasiswa diajarkan dan dilatih untuk mampu membuat keramik, menjahit, kriya dan landscape. Mata kuliah keramik adalah kuliah kerjasama dengan Rumah Seni Keramik Widajanto. Hasil keramik buatan mahasiswa MP-WNBK bentuknya macam-macam, seperti mangkuk, asbak dan relief untuk hiasan dinding/lantai. Menjahit dan kriya diajarkan oleh ibu-ibu IWK, yakni Ibu Heni, Ibu Diah, Ibu Utin dan Ibu Erna. Landscape diajarkan oleh Pak Budhi.</p>', 'art', 1, '2018-02-10 00:00:00', 1, '2018-04-10 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'desain', '', '<p style=\"text-align: justify;\">Konsentrasi Desain, mahasiswa diajarkan dan dilatih untuk mampu membuat sablon dengan media kaos, tas mug, pin dan gantungan kunci. Mereka juga belajar fotografi, animasi dan desain grafis. Mata kuliah sablon dan animasi diajarkan oleh Pak Nanto. Sementara mata kuliah fotografi dan desain grafis diajarkan oleh Kak Wadhi.</p>', 'desain', 1, '2018-02-10 00:00:00', 1, '2018-04-10 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'seni', '', '<p style=\"text-align: justify;\">Konsentrasi Seni, mahasiswa diajarkan dan dilatih agar mampu menampilkan seni tari, seni lukis, seni musik dan teater. Seni tari diajarkan oleh Bu Nur Hassanah. Seni lukis diajarkan Kak Resty. Seni musik diajarkan oleh Kak Fedly dan Kak Baraka. Teater diajarkan oleh Pak Jamal. Para mahasiswa konsentrasi seni dikenal sebagai The HEATS (Habibii, Edo, Arya, Tito, Samuel) yang telah menciptakan lagu Kami Bisa dan Kebersamaan Terindah serta&nbsp; mempertunjukkan kebolehan mereka di berbagai acara seperti acara Green Day&nbsp; PNJ dan Gemilang Talentaku.</p>', 'seni', 1, '2018-04-10 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id` int(12) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_created` int(12) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `user_modified` int(12) DEFAULT NULL,
  `date_modified` date DEFAULT NULL,
  `user_deleted` int(12) DEFAULT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id`, `name`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(12) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `latitude`, `longitude`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, '-6.370603', '106.823629', 1, '2017-09-11', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `logging`
--

CREATE TABLE `logging` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `aktifitas` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `from` varchar(255) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logging`
--

INSERT INTO `logging` (`id`, `user_id`, `user_name`, `class`, `link`, `ip`, `aktifitas`, `date`, `time`, `from`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '05:57:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(2, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:00:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(3, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:04:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(4, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:04:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(5, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:07:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(6, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:15:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(7, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:16:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(8, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:16:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(9, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:17:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(10, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:18:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(11, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:22:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(12, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:22:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(13, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:23:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(14, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:23:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(15, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:24:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(16, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:26:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(17, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:26:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(18, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:27:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(19, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:28:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(20, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:28:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(21, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:30:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(22, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:31:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(23, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:31:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(24, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:31:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(25, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:33:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(26, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '06:34:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(27, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:00:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(28, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:00:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(29, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:02:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(30, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-10', '07:03:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(31, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:03:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(32, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:03:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(33, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:29:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(34, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '07:29:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(35, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-10', '07:30:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(36, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2017-08-10', '07:30:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(37, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '08:02:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(38, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-10', '08:06:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(39, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '10:24:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(40, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-10', '10:24:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(41, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-12', '00:30:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(42, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-13', '21:23:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(43, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-13', '21:30:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(44, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-13', '21:32:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(45, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-13', '21:41:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(46, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-13', '21:41:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(47, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-13', '22:08:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(48, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '06:03:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(49, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '01:54:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(50, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:07:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(51, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:09:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(52, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:09:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(53, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:10:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(54, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:12:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(55, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:21:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(56, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:23:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(57, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:25:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(58, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:27:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(59, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:28:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(60, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:30:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(61, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:32:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(62, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:33:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(63, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:33:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(64, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '02:50:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(65, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-16', '03:01:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(66, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-18', '13:00:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(67, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-18', '13:12:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(68, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-18', '13:45:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(69, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-18', '13:45:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(70, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-18', '14:08:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(71, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-18', '14:12:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(72, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-18', '14:14:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(73, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-18', '14:15:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(74, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-18', '14:15:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(75, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '00:08:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(76, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '01:18:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(77, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '01:41:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(78, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '01:42:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(79, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '01:43:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(80, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '01:44:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(81, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-19', '01:44:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(82, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-20', '06:16:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(83, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-20', '06:16:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(84, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-20', '06:17:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(85, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-20', '06:18:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(86, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-20', '06:30:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(87, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-20', '06:30:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(88, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '18:45:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(89, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '18:48:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(90, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '18:50:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(91, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '18:51:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(92, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '18:51:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(93, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '18:54:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(94, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '18:58:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(95, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '18:58:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(96, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '18:58:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(97, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '18:59:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(98, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '18:59:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(99, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '19:02:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(100, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '19:02:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(101, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '19:04:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(102, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '19:05:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(103, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '19:05:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(104, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '19:05:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(105, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '19:06:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(106, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-24', '19:30:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(107, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-24', '19:31:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(108, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-24', '19:31:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(109, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-24', '19:33:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(110, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-24', '19:47:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(111, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'adding poma', '2017-08-24', '19:53:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(112, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'adding poma', '2017-08-24', '19:56:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(113, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-24', '19:59:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(114, 0, '', 'ti-trash', 'c_poma', '127.0.0.1', 'delete poma', '2017-08-24', '20:04:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(115, 0, '', 'ti-trash', 'c_poma', '127.0.0.1', 'delete poma', '2017-08-24', '20:04:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(116, 0, '', 'ti-trash', 'c_info', '127.0.0.1', 'delete info', '2017-08-24', '20:04:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(117, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-24', '20:04:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(118, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-24', '20:05:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(119, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-24', '20:05:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(120, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-24', '21:59:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(121, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-08-24', '00:01:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(122, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-08-24', '00:05:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(123, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-08-25', '06:39:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(124, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-08-25', '06:47:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(125, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-08-25', '06:58:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(126, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-25', '07:25:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(127, 0, '', 'ti-trash', 'c_ksrpd', '127.0.0.1', 'delete ksrpd', '2017-08-25', '13:15:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(128, 0, '', 'ti-trash', 'c_ksrpd', '127.0.0.1', 'delete ksrpd', '2017-08-25', '13:16:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(129, 0, '', 'ti-trash', 'c_ksrpd', '127.0.0.1', 'delete ksrpd', '2017-08-25', '13:16:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(130, 0, '', 'ti-trash', 'c_ksrpd', '127.0.0.1', 'delete ksrpd', '2017-08-25', '13:17:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(131, 0, '', 'ti-trash', 'c_ksrpd', '127.0.0.1', 'delete ksrpd', '2017-08-25', '13:17:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(132, 0, '', 'ti-trash', 'c_info', '127.0.0.1', 'delete info', '2017-08-25', '14:15:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(133, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-08-25', '15:00:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(134, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-25', '15:19:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(135, 0, '', 'ti-trash', 'c_ksrpd', '127.0.0.1', 'delete ksrpd', '2017-08-25', '15:45:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(136, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-25', '19:00:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(137, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-25', '22:10:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(138, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-25', '22:11:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(139, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-25', '22:11:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(140, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-29', '16:32:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(141, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:32:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(142, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-29', '16:33:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(143, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:33:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(144, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:33:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(145, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-29', '16:34:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(146, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-08-29', '16:35:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(147, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:35:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(148, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:36:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(149, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:36:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(150, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:36:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(151, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:37:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(152, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-08-29', '16:37:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(153, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-30', '07:14:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(154, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-30', '07:44:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(155, 0, '', 'ti-trash', 'c_info', '127.0.0.1', 'delete info', '2017-08-30', '07:45:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(156, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-08-30', '08:21:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(157, 0, '', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-08-30', '10:21:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(158, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-30', '11:38:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(159, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-30', '11:38:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(160, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-30', '11:38:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(161, 0, '', 'ti-trash', 'c_article', '127.0.0.1', 'Delete article', '2017-08-30', '11:38:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(162, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-08-30', '11:39:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(163, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-30', '11:47:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(164, 0, '', 'ti-trash', 'c_info', '127.0.0.1', 'delete info', '2017-08-30', '11:53:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(165, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-30', '11:54:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(166, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:17:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(167, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:20:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(168, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:21:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(169, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:23:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(170, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:24:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(171, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:25:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(172, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:26:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(173, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:54:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(174, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-08-30', '15:55:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(175, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-08-30', '15:56:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(176, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-08-30', '15:57:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(177, 1, '', 'ti-plus', 'c_info', '127.0.0.1', 'adding info', '2017-08-31', '13:03:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(178, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'adding poma', '2017-08-31', '22:29:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(179, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'adding poma', '2017-08-31', '22:30:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(180, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'adding poma', '2017-08-31', '22:31:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(181, 0, '', 'ti-trash', 'c_poma', '127.0.0.1', 'delete poma', '2017-08-31', '22:31:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(182, 0, '', 'ti-trash', 'c_poma', '127.0.0.1', 'delete poma', '2017-08-31', '22:31:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(183, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-08-31', '22:40:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(184, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-08-31', '22:40:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(185, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-08-31', '22:41:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(186, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-08-31', '22:41:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(187, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-08-31', '22:41:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(188, 0, '', 'ti-trash', 'c_poma', '127.0.0.1', 'delete poma', '2017-09-01', '05:12:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(189, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'adding poma', '2017-09-01', '05:13:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(190, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-09-01', '05:15:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(191, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-09-01', '05:17:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(192, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-09-01', '05:18:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(193, 1, '', 'ti-plus', 'c_article', '127.0.0.1', 'adding article', '2017-09-01', '05:19:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(194, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-09-01', '05:20:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(195, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-09-01', '05:21:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(196, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-01', '10:36:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(197, 1, '', 'ti-plus', 'c_poma', '127.0.0.1', 'updating poma', '2017-09-01', '13:59:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(198, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:02:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(199, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:03:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(200, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:05:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(201, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:06:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(202, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:25:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(203, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:31:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(204, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:31:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(205, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:32:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(206, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '09:33:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(207, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '10:09:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(208, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '10:09:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(209, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '10:13:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(210, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '10:13:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(211, 0, '', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-02', '10:14:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(212, 0, '', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-02', '10:14:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(213, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '10:19:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(214, 0, '', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-02', '10:19:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(215, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '10:21:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(216, 0, '', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-02', '10:21:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(217, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '13:40:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(218, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '16:35:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(219, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '16:39:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(220, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '16:41:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(221, 0, '', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-02', '16:42:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(222, 1, '', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-02', '16:42:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(223, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-02', '20:16:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(224, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-02', '20:16:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(225, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-02', '20:16:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(226, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-02', '20:17:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(227, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'adding ksrpd', '2017-09-02', '21:01:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(228, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-02', '21:04:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(229, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2017-09-03', '16:45:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(230, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2017-09-04', '21:55:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(231, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2017-09-04', '21:55:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(232, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2017-09-04', '21:55:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(233, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2017-09-04', '21:56:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(234, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2017-09-04', '21:59:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(235, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2017-09-04', '22:00:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(236, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2017-09-04', '22:00:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(237, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2017-09-04', '22:04:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(238, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2017-09-06', '23:55:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(239, 1, '', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2017-09-06', '01:08:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(240, 0, '', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2017-09-06', '01:11:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(241, 1, '', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2017-09-07', '06:26:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(242, 1, '', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2017-09-07', '07:20:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(243, 1, '', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2017-09-07', '19:44:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(244, 1, '', 'ti-plus', 'c_ksrpd', '127.0.0.1', 'updating ksrpd', '2017-09-07', '22:37:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(245, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2017-09-08', '07:53:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(246, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2017-09-08', '07:54:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(247, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2017-09-08', '07:54:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(248, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2017-09-08', '07:54:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(249, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-08', '07:55:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(250, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2017-09-08', '07:55:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(251, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-08', '07:56:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(252, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-08', '07:56:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(253, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-08', '08:34:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(254, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-08', '08:34:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(255, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-08', '08:40:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(256, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-08', '08:41:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(257, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-08', '08:49:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(258, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-08', '12:50:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(259, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2017-09-09', '11:58:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(260, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2017-09-09', '11:58:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(261, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2017-09-09', '11:58:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(262, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2017-09-09', '12:00:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(263, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2017-09-09', '12:00:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(264, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-10', '09:49:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(265, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-10', '09:52:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(266, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-10', '09:53:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(267, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '13:00:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(268, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '13:00:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(269, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '13:03:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(270, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '17:42:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(271, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '17:43:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(272, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '17:44:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(273, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '17:44:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(274, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '17:44:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(275, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '17:45:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(276, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding heading', '2017-09-10', '17:46:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(277, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '17:46:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(278, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-10', '17:50:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(279, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-10', '17:50:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(280, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-10', '17:51:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(281, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-10', '17:51:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(282, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-10', '17:51:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(283, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '17:56:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(284, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '17:57:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(285, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:02:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(286, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:25:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(287, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:28:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(288, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:28:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(289, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:30:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(290, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:39:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(291, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:39:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(292, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:40:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(293, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:40:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(294, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:42:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(295, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:52:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(296, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:53:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(297, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '18:54:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(298, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '18:56:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(299, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:30:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(300, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:32:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(301, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'update header', '2017-09-10', '19:39:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(302, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:41:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(303, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:41:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(304, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:41:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(305, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:41:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(306, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:41:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(307, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:41:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(308, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:45:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(309, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:46:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(310, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:46:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(311, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:46:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(312, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:47:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(313, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:47:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(314, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:48:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(315, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:49:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(316, 1, 'Admin', 'ti-plus', 'c_slideheader', '127.0.0.1', 'adding header', '2017-09-10', '19:50:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(317, 1, 'Admin', 'ti-trash', 'c_slideheader', '127.0.0.1', 'delete header', '2017-09-10', '19:50:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(318, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-11', '06:32:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(319, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:37:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(320, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:37:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(321, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:37:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00');
INSERT INTO `logging` (`id`, `user_id`, `user_name`, `class`, `link`, `ip`, `aktifitas`, `date`, `time`, `from`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(322, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:37:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(323, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:39:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(324, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag description', '2017-09-11', '11:41:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(325, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2017-09-11', '11:41:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(326, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:41:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(327, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:43:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(328, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '11:43:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(329, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2017-09-11', '11:54:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(330, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '13:57:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(331, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '14:10:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(332, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '14:10:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(333, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '14:11:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(334, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '14:12:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(335, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '14:13:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(336, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '14:15:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(337, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '14:15:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(338, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '14:16:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(339, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '14:16:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(340, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '14:17:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(341, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '14:17:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(342, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '14:17:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(343, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating latitude', '2017-09-11', '14:36:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(344, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating latitude', '2017-09-11', '14:36:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(345, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '14:38:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(346, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '14:38:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(347, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-11', '14:38:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(348, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating longtitude', '2017-09-11', '14:47:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(349, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating longtitude', '2017-09-11', '14:47:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(350, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2017-09-11', '15:01:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(351, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-11', '15:02:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(352, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2017-09-11', '15:04:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(353, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-11', '16:16:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(354, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-11', '18:03:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(355, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '18:22:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(356, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-11', '18:22:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(357, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-11', '18:22:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(358, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2017-09-12', '07:51:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(359, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-12', '07:53:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(360, 1, 'Admin', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-09-12', '07:55:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(361, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2017-09-12', '07:56:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(362, 1, 'Admin', 'ti-plus', 'c_video', '127.0.0.1', 'adding video', '2017-09-12', '07:59:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(363, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-12', '11:10:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(364, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-12', '11:10:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(365, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-12', '15:13:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(366, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-12', '15:13:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(367, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-09-13', '10:15:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(368, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-09-13', '10:17:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(369, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2017-09-14', '18:21:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(370, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2017-09-14', '18:21:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(371, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-14', '18:39:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(372, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete logo favicon', '2017-09-14', '20:37:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(373, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete logo favicon', '2017-09-14', '20:37:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(374, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-14', '20:43:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(375, 1, 'Admin', 'ti-trash', 'c_configsite', '127.0.0.1', 'delete logo favicon', '2017-09-14', '20:43:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(376, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-14', '20:48:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(377, 1, 'Admin', 'ti-trash', 'c_configsite', '127.0.0.1', 'delete logo favicon', '2017-09-14', '20:48:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(378, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-09-19', '11:36:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(379, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-09-19', '11:50:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(380, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-09-19', '11:50:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(381, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2017-09-21', '07:42:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(382, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-21', '07:42:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(383, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-09-22', '14:58:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(384, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-09-22', '14:59:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(385, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-09-22', '14:59:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(386, 1, 'Admin', 'ti-trash', 'c_message', '127.0.0.1', 'Delete message by one id', '2017-09-22', '14:59:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(387, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2017-09-22', '15:14:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(388, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2017-09-22', '15:14:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(389, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag description', '2017-09-22', '15:14:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(390, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-22', '15:14:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(391, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-22', '15:14:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(392, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-22', '15:15:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(393, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-22', '15:15:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(394, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag keywords', '2017-09-22', '15:15:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(395, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-09-22', '15:16:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(396, 1, 'Admin', 'ti-trash', 'c_message', '127.0.0.1', 'Delete message use check box', '2017-09-25', '16:06:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(397, 1, 'Admin', 'ti-trash', 'c_message', '127.0.0.1', 'Delete message use check box', '2017-09-25', '16:58:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(398, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2017-09-29', '23:13:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(399, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-29', '00:03:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(400, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-29', '00:03:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(401, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-29', '00:21:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(402, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-29', '00:32:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(403, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '05:42:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(404, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '05:45:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(405, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '08:58:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(406, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '08:59:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(407, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '10:21:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(408, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '10:26:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(409, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '10:27:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(410, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '10:31:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(411, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '10:31:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(412, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '10:32:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(413, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '10:32:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(414, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '10:33:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(415, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '10:33:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(416, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:08:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(417, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:09:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(418, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:13:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(419, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:14:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(420, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:19:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(421, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:21:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(422, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:22:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(423, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:23:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(424, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:23:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(425, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:25:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(426, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:25:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(427, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:26:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(428, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:27:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(429, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:28:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(430, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:30:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(431, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:31:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(432, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:31:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(433, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:46:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(434, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:47:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(435, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:47:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(436, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:50:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(437, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:50:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(438, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:53:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(439, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-09-30', '11:53:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(440, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-09-30', '11:54:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(441, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:12:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(442, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:12:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(443, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:13:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(444, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:15:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(445, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:16:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(446, 1, 'Admin', 'ti-trash', 'c_configsite', '127.0.0.1', 'delete logo favicon', '2017-10-01', '16:16:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(447, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:16:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(448, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:18:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(449, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:18:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(450, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:20:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(451, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating favicon website', '2017-10-01', '16:20:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(452, 1, 'Admin', 'ti-trash', 'c_article', '127.0.0.1', 'delete posting', '2017-10-01', '16:52:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(453, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-10-03', '18:30:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(454, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-10-03', '18:33:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(455, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-10-03', '18:33:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(456, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-03', '04:44:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(457, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-03', '04:45:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(458, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-03', '04:55:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(459, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-03', '04:55:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(460, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-04', '05:01:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(461, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:24:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(462, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-04', '05:26:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(463, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-04', '05:26:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(464, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-04', '05:26:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(465, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:29:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(466, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:32:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(467, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:32:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(468, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:33:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(469, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:33:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(470, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:34:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(471, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:35:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(472, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-04', '05:35:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(473, 1, 'Admin', 'ti-plus', 'c_video', '127.0.0.1', 'update video', '2017-10-09', '19:56:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(474, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-16', '17:20:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(475, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'adding advertise', '2017-10-16', '17:20:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(476, 1, 'Admin', 'ti-plus', 'c_advertise', '127.0.0.1', 'updating advertise', '2017-10-16', '17:20:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(477, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-10-20', '19:03:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(478, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding profilewebsite', '2017-10-20', '04:50:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(479, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-10-31', '07:28:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(480, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-10-31', '10:07:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(481, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding posting', '2017-10-31', '13:06:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(482, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2017-10-31', '13:26:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(483, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-10-31', '15:35:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(484, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add group alumni', '2017-11-13', '17:45:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(485, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2017-11-15', '19:54:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(486, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-12-12', '17:45:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(487, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2017-12-12', '18:04:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(488, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:05:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(489, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:09:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(490, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:22:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(491, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:22:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(492, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:23:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(493, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:25:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(494, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:26:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(495, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '12:58:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(496, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:00:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(497, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:27:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(498, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:27:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(499, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:29:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(500, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:29:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(501, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:31:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(502, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '13:32:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(503, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2018-01-28', '13:59:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(504, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2018-01-28', '14:06:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(505, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2018-01-28', '15:01:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(506, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2018-01-28', '15:20:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(507, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2018-01-28', '15:25:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(508, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-01-28', '15:57:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(509, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-01-28', '16:01:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(510, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-01-28', '16:56:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(511, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-01-28', '17:00:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(512, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-01-28', '17:01:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(513, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-01-28', '17:14:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(514, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-01-28', '17:41:10', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(515, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '17:57:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(516, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '17:58:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(517, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2018-01-28', '18:10:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(518, 1, 'Admin', 'ti-trash', 'c_pageslide', '127.0.0.1', 'Delete slider header', '2018-01-28', '18:10:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(519, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '18:39:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(520, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '18:39:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(521, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-01-28', '18:40:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(522, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-02-05', '23:59:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(523, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-02-05', '00:01:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(524, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-05', '06:09:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(525, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-06', '20:25:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(526, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-02-10', '20:33:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(527, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-02-10', '21:15:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(528, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '22:23:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(529, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-02-10', '22:30:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(530, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '22:31:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(531, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-10', '22:32:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(532, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-10', '22:32:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(533, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding profilewebsite', '2018-02-10', '22:33:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(534, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-10', '22:33:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(535, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding profilewebsite', '2018-02-10', '22:34:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(536, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-10', '22:35:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(537, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-10', '22:36:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(538, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'adding profilewebsite', '2018-02-10', '22:37:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(539, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '22:52:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(540, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '22:57:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(541, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '22:58:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(542, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '22:58:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(543, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '23:00:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(544, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '23:00:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(545, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-10', '23:00:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(546, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '23:03:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(547, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '23:04:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(548, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '23:04:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(549, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '23:04:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(550, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '23:05:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(551, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-02-10', '23:06:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(552, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-02-10', '23:28:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(553, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add konsentrasi', '2018-02-10', '00:02:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(554, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add konsentrasi', '2018-02-10', '00:03:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(555, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add konsentrasi', '2018-02-10', '00:04:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(556, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete konsentrasi', '2018-02-10', '03:02:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(557, 1, 'Admin', 'ti-trash', 'direksi', '127.0.0.1', 'Delete background', '2018-02-10', '03:11:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(558, 1, 'Admin', 'ti-trash', 'direksi', '127.0.0.1', 'Delete background', '2018-02-10', '03:12:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(559, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-02-11', '11:40:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(560, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-02-11', '13:09:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(561, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-02-11', '13:09:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(562, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-02-11', '13:10:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(563, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-02-11', '13:10:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(564, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-11', '13:24:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(565, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-11', '13:24:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(566, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-11', '13:27:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(567, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-11', '13:28:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(568, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '14:36:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(569, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '19:40:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(570, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:17:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(571, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:19:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(572, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:19:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(573, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:20:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(574, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:23:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(575, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:24:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(576, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:24:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(577, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '20:26:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(578, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '20:29:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(579, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '20:29:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(580, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '20:43:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(581, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '20:45:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(582, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '20:46:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(583, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:10:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(584, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:11:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(585, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:11:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(586, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:12:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(587, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:12:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(588, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:13:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(589, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:13:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(590, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:13:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(591, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:14:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(592, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:14:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(593, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:15:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(594, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:15:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(595, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:17:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(596, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:18:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(597, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:18:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(598, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:19:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(599, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-02-12', '21:20:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(600, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:26:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(601, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:27:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(602, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:28:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(603, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-02-12', '21:28:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(604, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:29:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(605, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:29:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(606, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:30:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(607, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:30:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(608, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-02-12', '21:37:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(609, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:37:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(610, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-02-12', '21:38:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(611, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-02-12', '21:38:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(612, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-02-12', '21:38:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(613, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-02-12', '21:39:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(614, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:39:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(615, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-02-12', '21:40:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(616, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:41:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(617, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '21:42:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(618, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '21:44:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(619, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-02-12', '21:48:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(620, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '21:48:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(621, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '21:54:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(622, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '21:54:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(623, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '21:57:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(624, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '21:59:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00');
INSERT INTO `logging` (`id`, `user_id`, `user_name`, `class`, `link`, `ip`, `aktifitas`, `date`, `time`, `from`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(625, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '22:01:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(626, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-02-12', '22:08:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(627, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '22:10:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(628, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '22:11:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(629, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '22:12:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(630, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '22:13:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(631, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-02-12', '22:16:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(632, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-02-12', '22:24:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(633, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-02-12', '22:24:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(634, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '14:54:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(635, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-02-15', '15:05:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(636, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-02-15', '17:36:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(637, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-02-15', '17:36:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(638, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:40:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(639, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-02-15', '17:40:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(640, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:41:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(641, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:43:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(642, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:45:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(643, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:47:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(644, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:50:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(645, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:50:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(646, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-02-15', '17:51:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(647, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-02-15', '17:52:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(648, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-02-15', '17:53:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(649, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:53:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(650, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:56:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(651, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '17:58:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(652, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:00:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(653, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:02:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(654, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:06:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(655, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-02-15', '18:07:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(656, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-02-15', '18:08:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(657, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:11:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(658, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:13:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(659, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:16:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(660, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:17:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(661, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:19:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(662, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:22:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(663, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:27:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(664, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:29:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(665, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-02-15', '18:30:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(666, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-02-20', '17:27:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(667, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-02-22', '21:14:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(668, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-02-22', '21:19:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(669, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-02-22', '21:22:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(670, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-02-25', '23:41:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(671, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating logo website', '2018-02-28', '15:38:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(672, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-02-28', '15:39:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(673, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-02-28', '15:41:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(674, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-02-28', '15:42:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(675, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-02-28', '15:43:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(676, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-03-05', '14:54:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(677, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-03-18', '19:41:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(678, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-03-18', '19:45:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(679, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-03-18', '20:34:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(680, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-03-18', '20:45:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(681, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-03-20', '00:10:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(682, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-03-20', '00:11:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(683, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-03-24', '18:30:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(684, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-03-25', '12:53:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(685, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-03-25', '12:54:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(686, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:11:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(687, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:12:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(688, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:12:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(689, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:12:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(690, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:12:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(691, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:12:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(692, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:12:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(693, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '21:15:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(694, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '21:17:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(695, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:20:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(696, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '21:20:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(697, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:26:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(698, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:30:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(699, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:33:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(700, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:37:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(701, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:39:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(702, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:40:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(703, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:41:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(704, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:41:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(705, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:41:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(706, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:41:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(707, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:41:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(708, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:41:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(709, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(710, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:42:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(711, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(712, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(713, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(714, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(715, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(716, 1, 'Admin', 'ti-trash', 'c_angkatan', '127.0.0.1', 'delete angkatan', '2018-04-07', '21:42:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(717, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2018-04-07', '21:42:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(718, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2018-04-07', '21:42:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(719, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2018-04-07', '21:43:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(720, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2018-04-07', '21:43:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(721, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2018-04-07', '21:43:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(722, 1, 'Admin', 'ti-trash', 'c_video', '127.0.0.1', 'delete video', '2018-04-07', '21:43:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(723, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:43:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(724, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:43:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(725, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(726, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(727, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(728, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(729, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(730, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(731, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(732, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(733, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:44:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(734, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(735, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:44:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(736, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(737, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(738, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(739, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(740, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:45:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(741, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(742, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(743, 1, 'Admin', 'ti-trash', 'c_photo', '127.0.0.1', 'delete photo', '2018-04-07', '21:45:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(744, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:46:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(745, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:46:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(746, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-07', '21:46:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(747, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-07', '21:49:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(748, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-04-07', '22:02:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(749, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-04-07', '22:11:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(750, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-04-07', '22:11:59', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(751, 1, 'Admin', 'ti-plus', 'c_article', '127.0.0.1', 'updating profilewebsite', '2018-04-07', '22:13:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(752, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-04-07', '22:31:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(753, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-04-07', '22:32:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(754, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '22:48:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(755, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '23:03:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(756, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '23:06:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(757, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '23:12:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(758, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit group alumni', '2018-04-07', '23:14:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(759, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:16:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(760, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:17:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(761, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:18:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(762, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '23:20:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(763, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-07', '23:23:31', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(764, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-04-07', '23:27:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(765, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add menu', '2018-04-07', '23:29:53', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(766, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2018-04-07', '23:31:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(767, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2018-04-07', '23:34:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(768, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2018-04-07', '23:34:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(769, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:36:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(770, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '23:36:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(771, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '23:36:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(772, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit menu', '2018-04-07', '23:37:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(773, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:38:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(774, 1, 'Admin', 'ti-trash', 'menu', '127.0.0.1', 'Delete menu', '2018-04-07', '23:49:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(775, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-04-07', '23:50:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(776, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:53:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(777, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:55:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(778, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit photo activity', '2018-04-07', '23:56:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(779, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '23:57:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(780, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:01:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(781, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:03:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(782, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '00:04:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(783, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:06:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(784, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:09:07', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(785, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:14:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(786, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:16:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(787, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:18:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(788, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:20:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(789, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '00:21:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(790, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-04-07', '00:24:33', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(791, 1, 'Admin', 'ti-plus', 'c_configsite', '127.0.0.1', 'updating meta tag title', '2018-04-07', '00:24:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(792, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '01:06:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(793, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:08:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(794, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '01:08:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(795, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:08:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(796, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:08:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(797, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:08:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(798, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(799, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(800, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(801, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(802, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(803, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(804, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:46', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(805, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:09:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(806, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:10:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(807, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:10:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(808, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '01:12:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(809, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '01:14:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(810, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '01:16:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(811, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-07', '01:19:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(812, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '01:19:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(813, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-07', '01:20:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(814, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '03:36:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(815, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '03:36:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(816, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-07', '03:43:13', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(817, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-07', '03:43:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(818, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-08', '22:42:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(819, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit konsentrasi', '2018-04-10', '17:01:41', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(820, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit konsentrasi', '2018-04-10', '17:02:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(821, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add konsentrasi', '2018-04-10', '17:04:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(822, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:10:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(823, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:11:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(824, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:11:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(825, 1, 'Admin', 'ti-save', 'menu', '127.0.0.1', 'Add background', '2018-04-10', '17:22:35', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(826, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:25:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(827, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:28:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(828, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:31:27', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(829, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit konsentrasi', '2018-04-10', '17:33:37', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(830, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:33:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(831, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '17:37:43', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(832, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-10', '17:43:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(833, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-10', '17:49:03', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(834, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-10', '17:53:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(835, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-10', '17:54:21', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(836, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-10', '17:55:11', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(837, 1, 'Admin', 'ti-pencil-alt', 'menu', '127.0.0.1', 'Edit background', '2018-04-10', '18:00:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(838, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '18:05:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(839, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-10', '18:15:05', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(840, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'adding photo', '2018-04-10', '18:42:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(841, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-04-10', '20:50:58', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(842, 1, 'Admin', 'ti-plus', 'c_information', '127.0.0.1', 'updating information', '2018-04-10', '20:52:49', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(843, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-10', '21:38:14', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(844, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:23:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(845, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:24:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(846, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:25:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(847, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:25:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(848, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:25:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(849, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:26:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(850, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:26:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(851, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:27:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(852, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:27:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(853, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:28:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(854, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:29:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(855, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:29:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(856, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:30:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(857, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:31:51', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(858, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:32:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(859, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:32:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(860, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:34:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(861, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:34:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(862, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:35:08', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(863, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:35:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(864, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '10:38:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(865, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '10:53:36', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(866, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '10:57:18', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(867, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '10:58:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(868, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '11:11:19', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(869, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '11:14:34', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(870, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:27:40', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(871, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:29:24', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(872, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:33:29', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(873, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:34:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(874, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:35:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(875, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:36:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(876, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:37:55', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(877, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:40:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(878, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:43:23', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(879, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:44:32', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(880, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:45:47', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(881, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:47:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(882, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '19:59:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(883, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:02:25', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(884, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:05:00', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(885, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:11:39', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(886, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:14:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(887, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:21:45', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(888, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:25:57', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(889, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:28:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(890, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:30:50', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(891, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:31:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(892, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:32:30', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(893, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:35:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(894, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:38:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(895, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'adding angkatan', '2018-04-11', '20:39:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(896, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:41:01', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(897, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:42:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(898, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:43:22', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(899, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:44:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(900, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:45:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(901, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:45:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(902, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:45:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(903, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:45:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(904, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:45:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(905, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:49:17', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(906, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:50:12', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(907, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:53:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(908, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:54:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(909, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:55:42', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(910, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:57:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(911, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:57:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(912, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '20:59:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(913, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '21:01:09', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(914, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '21:03:06', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(915, 1, 'Admin', 'ti-plus', 'c_angkatan', '127.0.0.1', 'update angkatan', '2018-04-11', '21:04:26', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(916, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-11', '21:18:38', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(917, 1, 'Admin', 'ti-trash', 'post', '127.0.0.1', 'delete posting', '2018-04-11', '21:18:56', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(918, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-11', '21:33:20', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(919, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:00:16', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(920, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:02:54', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(921, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:21:04', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(922, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:21:15', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(923, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:21:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(924, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:31:02', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(925, 1, 'Admin', 'ti-plus', 'c_photo', '127.0.0.1', 'update photo', '2018-04-15', '12:31:52', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(926, 1, 'Admin', 'ti-plus', 'direksi', '127.0.0.1', 'adding direksi', '2018-04-18', '14:58:44', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(927, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-27', '02:40:48', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(928, 1, 'Admin', 'ti-plus', 'post', '127.0.0.1', 'adding posting', '2018-04-27', '02:41:28', 'unknown', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(12) NOT NULL,
  `url` varchar(255) NOT NULL,
  `flag` enum('facebook','twitter','youtube','instagram') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(12) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `link` varchar(30) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `parent_id` int(12) NOT NULL DEFAULT '0',
  `level` varchar(30) DEFAULT NULL,
  `active` int(2) NOT NULL,
  `date_created` date NOT NULL,
  `user_created` int(12) NOT NULL DEFAULT '0',
  `date_modified` date NOT NULL,
  `user_modified` int(12) NOT NULL DEFAULT '0',
  `date_deleted` date NOT NULL,
  `user_deleted` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `class`, `parent_id`, `level`, `active`, `date_created`, `user_created`, `date_modified`, `user_modified`, `date_deleted`, `user_deleted`) VALUES
(2, 'Master', 'admin/home_c', 'ti-write', 0, '1', 1, '2017-08-09', 1, '2017-09-08', 1, '0000-00-00', 0),
(3, 'menu', 'ad-min/c_menu', '', 5, '1', 1, '2017-08-09', 1, '2017-08-13', 1, '0000-00-00', 0),
(4, 'access privilege', 'ad-min/c_accessprivilege', '', 5, '1', 1, '2017-08-09', 1, '2017-08-10', 1, '0000-00-00', 0),
(5, 'Pengaturan', 'admin/home_c', 'ti-settings', 0, '1', 1, '2017-08-10', 1, '2017-08-29', 1, '0000-00-00', 0),
(7, 'general posting', 'ad-min/post', '', 2, '1', 1, '2017-08-10', 1, '2017-12-12', 1, '0000-00-00', 0),
(11, 'Alumni', 'admin/home_c', 'ti-user', 0, '1', 1, '2017-08-24', 1, '2017-08-29', 1, '0000-00-00', 0),
(12, 'angkatan', 'ad-min/c_angkatan', '', 11, '1', 1, '2017-08-24', 1, '2017-09-02', 1, '0000-00-00', 0),
(14, 'Kegiatan', 'admin/home_c', 'ti-camera', 0, '1', 1, '2017-08-29', 1, '2017-08-29', 1, '0000-00-00', 0),
(15, 'video', 'ad-min/c_video', '', 14, '1', 1, '2017-08-29', 1, '0000-00-00', 0, '0000-00-00', 0),
(16, 'photo', 'ad-min/c_photo', '', 14, '1', 1, '2017-08-29', 1, '0000-00-00', 0, '0000-00-00', 0),
(18, 'halaman informasi', 'ad-min/c_information', '', 5, '1', 1, '2017-09-02', 1, '0000-00-00', 0, '0000-00-00', 0),
(19, 'Hubungi kami', 'admin/home_c', 'ti-email', 0, '1', 1, '2017-09-02', 1, '2017-09-02', 1, '0000-00-00', 0),
(20, 'pesan', 'ad-min/c_message', '', 19, '1', 1, '2017-09-02', 1, '0000-00-00', 0, '0000-00-00', 0),
(22, 'gambar slider halaman', 'ad-min/c_pageslide', '', 5, '1', 1, '2017-09-10', 1, '2017-10-31', 1, '0000-00-00', 0),
(23, 'general site', 'ad-min/c_configsite', '', 5, '1', 1, '2017-09-11', 1, '0000-00-00', 0, '0000-00-00', 0),
(24, 'akun administrator', 'ad-min/c_alpha/account', '', 5, '1', 1, '2017-09-13', 1, '2018-04-07', 1, '0000-00-00', 0),
(25, 'advertise', 'ad-min/c_advertise', '', 5, '1', 1, '2017-10-03', 1, '0000-00-00', 0, '0000-00-00', 0),
(26, 'profil website', 'ad-min/c_profilewebsite', '', 5, '1', 1, '2017-10-20', 1, '0000-00-00', 0, '0000-00-00', 0),
(27, 'alumni grup', 'ad-min/c_group_alumni', '', 2, '1', 1, '2017-10-31', 1, '2017-10-31', 1, '0000-00-00', 0),
(28, 'Tentang', 'admin/home_c', '', 0, '1', 1, '2018-01-28', 1, '0000-00-00', 0, '0000-00-00', 0),
(29, 'direksi', 'ad-min/direksi', '', 5, '1', 1, '2018-01-28', 1, '0000-00-00', 0, '0000-00-00', 0),
(31, 'gambar background', 'ad-min/background', '', 5, '1', 1, '2018-02-10', 1, '0000-00-00', 0, '0000-00-00', 0),
(32, 'konsentrasi', 'ad-min/konsentrasi', '', 2, '1', 1, '2018-02-10', 1, '0000-00-00', 0, '0000-00-00', 0),
(33, 'foto aktifitas alumni', 'ad-min/photoactivities', '', 14, '1', 1, '2018-02-11', 1, '0000-00-00', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` int(11) NOT NULL COMMENT '1 = active 0 = not active',
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `title`, `text`, `image`, `position`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(24, 'Dosen Pelopor', 'Dosen Pelopor', '1a9dbebc24bdf7085231b5a99b7f86eb.jpeg', 1, 1, '2018-04-07', 1, '2018-04-15', 0, '0000-00-00'),
(25, 'LDK 2016', 'Peserta kali ini diwajibkan untuk bekerja sama antar sesama kelompok', '82c7d3ad48fb4e11f9b1891c0a9eed46.JPG', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(26, 'LDK 2016', 'Peserta kali ini diwajibkan untuk bekerja sama antar sesama kelompok', '9e8abf07d8ede05482bec7b31d1ccdc5.JPG', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(27, 'LDK 2016', 'Peserta kali ini diwajibkan untuk bekerja sama antar sesama kelompok', 'da9c68aedd31fb888c60c7f8452c8467.JPG', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(28, '', '', 'b9a3a14c6b796238a075ed2522fac65d.jpg', 0, 1, '2018-04-10', 1, '2018-04-10', 0, '0000-00-00'),
(29, 'Kegiatan Belajar', 'Kegiatan Pengajaran', '068eaacdabeb66b66317606bc1aba933.jpg', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(30, 'testing atas', 'testing atas', '1ac463e202f54d69532f2afb8e81a1d9.jpg', 1, 1, '2018-04-10', 1, '2018-04-15', 0, '0000-00-00'),
(31, 'Rohani Kilat', 'Shalat Berjamaah', '58e262b200af9f52b99dbba2dd3ee2a7.JPG', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(32, 'Wisuda', 'Selebrasi Para Wisudawan dan Wisudawati', 'd58f587aee75bcbbeffcae7b69339509.jpg', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(33, 'LDK', 'Latihan Dasar Kemandirian', 'd4964a146e47ceb1bd0c589c2e4f7620.jpg', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00'),
(34, 'Maken Bersama', 'Makan ramai-ramai', '49f84e82fa40cadb054970d56ded362a.JPG', 0, 1, '2018-04-10', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `photo_activities`
--

CREATE TABLE `photo_activities` (
  `id` int(12) NOT NULL,
  `alumni_id` int(12) NOT NULL,
  `title` varchar(155) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo_activities`
--

INSERT INTO `photo_activities` (`id`, `alumni_id`, `title`, `picture`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(1, 12, 'Fakhry coy', 'd677f709963d0fba161a8912a6cbf307.jpeg', 1, '2018-02-06', 1, '2018-04-07', 0, '0000-00-00'),
(2, 2, 'ke gunung', 'fa324e53efbdcc3dd2740d38923bcbe9.jpeg', 1, '2018-02-06', 1, '2018-03-20', 0, '0000-00-00'),
(3, 11, 'LDK', '3450d4e564e2a438b649a28ab1838785.JPG', 1, '2018-04-07', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `thumb_file` varchar(255) NOT NULL,
  `meta_tag_title` varchar(255) NOT NULL,
  `meta_tag_keywords` text NOT NULL,
  `meta_tag_description` text NOT NULL,
  `type` enum('article','event','info','') NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `title`, `text`, `img`, `thumb_file`, `meta_tag_title`, `meta_tag_keywords`, `meta_tag_description`, `type`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(14, 'LDK ( Latihan Dasar Kemandirian ) ke - IV', '<p>Tahun ini merupakan tahun yang baru untuk kita semua, tidak terkecuali bagi mahasiswa/i manajemen pemasaran. Karena mereka tidak hanya berada di lokasi yang berdekatan dengan alam. Tetapi, mereka pun juga langsung menyatu dengan alam bahkan untuk melihat air terjun saja harus rela berkenalan dengan lumpur</p>', '147432438a00abdc17d3dca9ecf27f11.JPG', '147432438a00abdc17d3dca9ecf27f11_thumb.JPG', '', '', '', 'info', 1, '2018-04-08', 1, '2018-04-10', 0, '0000-00-00'),
(16, 'Berpartisipasi dalam acara World Autism Awareness Bazaar 2018', '<p><span style=\"font-size:18px\"><strong>BE INFORMED, BE INSPIRED, GET A JOB</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '3458bb3c0c1da401af85edeedd932fbc.jpeg', '3458bb3c0c1da401af85edeedd932fbc_thumb.jpeg', '', '', '', 'info', 1, '2018-04-11', 1, '2018-04-11', 0, '0000-00-00'),
(17, 'WELCOME TO A1 PREMIUM', '<p>1334645</p>', 'e25688944740cba497113b9cf6206ebb.jpg', 'e25688944740cba497113b9cf6206ebb_thumb.jpg', '', '', '', 'article', 1, '2018-04-27', 0, '0000-00-00', 0, '0000-00-00'),
(18, '1334645', '<p>1334645</p>', 'cda1547269ec12e207454825402de25a.jpg', 'cda1547269ec12e207454825402de25a_thumb.jpg', '', '', '', 'event', 1, '2018-04-27', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `site_information`
--

CREATE TABLE `site_information` (
  `id` int(12) NOT NULL,
  `information` text NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `email_address` varchar(40) NOT NULL,
  `date_created` date NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_deleted` date NOT NULL,
  `user_deleted` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_information`
--

INSERT INTO `site_information` (`id`, `information`, `address`, `phone_number`, `email_address`, `date_created`, `user_created`, `date_modified`, `user_modified`, `date_deleted`, `user_deleted`) VALUES
(1, 'Ext 292', 'Jl. Prof. Dr. G.A Siwabessy, Kampus Baru UI Depok \nPoBox 16424', '0217270036', 'mpwnbk@pnj.ac.id', '2017-09-09', 1, '0000-00-00', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(12) NOT NULL,
  `maintenance_mode` int(12) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider_image`
--

CREATE TABLE `slider_image` (
  `id` int(12) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `subheading` varchar(150) NOT NULL,
  `header_img` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_image`
--

INSERT INTO `slider_image` (`id`, `heading`, `subheading`, `header_img`, `token`, `user_created`, `date_created`, `user_modified`, `date_modified`, `user_deleted`, `date_deleted`) VALUES
(9, 'manajemen pemesaran berkebutuhan khusus', 'Politeknik negeri jakarta', '586483b14a553b9d3f2005a89816c6aa.jpeg', '0.7434243989526724', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00'),
(10, 'manajemen pemesaran berkebutuhan khusus', 'Politeknik negeri jakarta', '74adedafbe4defc8e07cb327a2d01b50.jpeg', '0.40894764647598325', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `slider_video`
--

CREATE TABLE `slider_video` (
  `id` int(12) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_video`
--

INSERT INTO `slider_video` (`id`, `url`) VALUES
(1, 'https://youtu.be/BGu2_FGVoNU');

-- --------------------------------------------------------

--
-- Table structure for table `usermenu`
--

CREATE TABLE `usermenu` (
  `user_id` int(12) NOT NULL DEFAULT '0',
  `menu_id` int(12) NOT NULL DEFAULT '0',
  `add` int(1) DEFAULT '0',
  `view` int(4) DEFAULT '0',
  `update` int(4) DEFAULT '0',
  `delete` int(4) DEFAULT '0',
  `active` int(2) NOT NULL DEFAULT '0',
  `date_created` date NOT NULL,
  `user_created` int(12) NOT NULL DEFAULT '0',
  `date_modified` date NOT NULL,
  `user_modified` int(12) NOT NULL DEFAULT '0',
  `date_deleted` date NOT NULL,
  `user_deleted` int(12) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermenu`
--

INSERT INTO `usermenu` (`user_id`, `menu_id`, `add`, `view`, `update`, `delete`, `active`, `date_created`, `user_created`, `date_modified`, `user_modified`, `date_deleted`, `user_deleted`) VALUES
(1, 2, 1, 1, 1, 1, 1, '2017-08-09', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 3, 1, 1, 1, 1, 1, '2017-08-09', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 4, 1, 1, 1, 1, 1, '2017-08-09', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 5, 1, 1, 1, 1, 1, '2017-08-10', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 7, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 8, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 9, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 10, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 11, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 12, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 13, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 14, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 15, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 16, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 17, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 18, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 19, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 20, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 21, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 22, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 23, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 24, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 25, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 26, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 27, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 29, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 30, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 31, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 32, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 33, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 34, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(1, 35, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 2, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 3, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 4, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 5, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 7, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 11, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 12, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 14, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 15, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 16, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 18, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 19, 0, 1, 0, 0, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 20, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 21, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 22, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0),
(2, 23, 1, 1, 1, 1, 1, '0000-00-00', 1, '0000-00-00', 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `description` text,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(180) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `description`, `phone`, `image`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$iSqbYGvsmKbqnADK4vWWRe/.TzVPzVfY7hqTWxldSmWCMxAWSGA5i', '', 'maulana.achmaddev@gmail.com', '', 'jYEAxaqVjVPKWO8AdWySd.0a1c816f4493420310', 1523763038, 'cPIwidoeGq1odXDHLfpZvO', 1268889823, 1524857743, 1, 'Admin', 'istrator', 'Politeknik Negeri Jakarta adalah salah satu perguruan tinggi negeri yang terdapat di areal kampus Universitas Indonesia, Depok, Jawa Barat, Indonesia', '0', ''),
(2, '103.47.135.155', 'wadi.ranuna@gmail.com', '$2y$08$Ugf4bgb1cSSeGrRa0gDDWO.Y5zc7Sik5Df5sQu/saoLiTCUbYeU6u', NULL, 'wadi.ranuna@gmail.com', '006d841bed621e6bb27efc52c6bab2d199d158dd', NULL, NULL, NULL, 1523119283, NULL, 0, 'wadi', 'ranuna', NULL, '081218006060', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(16, 1, 1),
(17, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(12) NOT NULL,
  `embed_url` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `user_created` int(12) NOT NULL,
  `date_created` date NOT NULL,
  `user_modified` int(12) NOT NULL,
  `date_modified` date NOT NULL,
  `user_deleted` int(12) NOT NULL,
  `date_deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumni_groups`
--
ALTER TABLE `alumni_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `background_site`
--
ALTER TABLE `background_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `contact_us` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `contact_us` ADD FULLTEXT KEY `message` (`message`);
ALTER TABLE `contact_us` ADD FULLTEXT KEY `email` (`email`);
ALTER TABLE `contact_us` ADD FULLTEXT KEY `name_2` (`name`,`email`,`message`);

--
-- Indexes for table `directive_home`
--
ALTER TABLE `directive_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_site`
--
ALTER TABLE `general_site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic_logo`
--
ALTER TABLE `ic_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsentrasi`
--
ALTER TABLE `konsentrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logging`
--
ALTER TABLE `logging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Kd_Menu` (`id`) USING BTREE;

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_activities`
--
ALTER TABLE `photo_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_information`
--
ALTER TABLE `site_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_image`
--
ALTER TABLE `slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_video`
--
ALTER TABLE `slider_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermenu`
--
ALTER TABLE `usermenu`
  ADD UNIQUE KEY `key01` (`user_id`,`menu_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `alumni_groups`
--
ALTER TABLE `alumni_groups`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `background_site`
--
ALTER TABLE `background_site`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `directive_home`
--
ALTER TABLE `directive_home`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ic_logo`
--
ALTER TABLE `ic_logo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsentrasi`
--
ALTER TABLE `konsentrasi`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logging`
--
ALTER TABLE `logging`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=929;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `photo_activities`
--
ALTER TABLE `photo_activities`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_image`
--
ALTER TABLE `slider_image`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider_video`
--
ALTER TABLE `slider_video`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
