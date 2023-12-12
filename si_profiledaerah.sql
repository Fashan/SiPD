-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 05:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_profiledaerah`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `category_desc` varchar(256) DEFAULT NULL,
  `desa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `desa_id`) VALUES
(2, 'Lorem', 'Lorem Update', 1),
(4, 'Ipsum', 'Ipsum Update', 1),
(5, 'Dolor', 'Dolor Update', 1),
(6, 'English', 'Englis Updates', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` bigint(20) NOT NULL,
  `comment_parent` bigint(20) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_body` text NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_parent`, `comment_date`, `comment_body`, `post_id`, `user_id`) VALUES
(7, 0, '2021-01-19', 'Tes Here', 25, 1),
(8, 0, '2021-01-19', 'Also Here', 24, 1),
(9, 0, '2021-01-19', 'Thanks Min', 32, 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE `data_penduduk` (
  `id` int(10) NOT NULL,
  `nomor_kk` int(25) NOT NULL,
  `nik` int(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `golongan_darah` varchar(5) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kebutuhan_khusus` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `desa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_tempat_usaha`
--

CREATE TABLE `data_tempat_usaha` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `usaha` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `desa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_tempat_wisata`
--

CREATE TABLE `data_tempat_wisata` (
  `id` int(10) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `desa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tempat_wisata`
--

INSERT INTO `data_tempat_wisata` (`id`, `nama_wisata`, `lokasi`, `kecamatan`, `kota`, `desa_id`) VALUES
(1, 'Bali zoo', 'singepadu', 'sukawati', 'Gianyar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_date` date NOT NULL,
  `desa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) NOT NULL,
  `post_date` date NOT NULL,
  `post_title` varchar(256) NOT NULL,
  `post_body` longtext NOT NULL,
  `post_thumbnail` varchar(256) DEFAULT NULL,
  `post_slug` varchar(256) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `desa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_date`, `post_title`, `post_body`, `post_thumbnail`, `post_slug`, `category_id`, `user_id`, `desa_id`) VALUES
(22, '2021-01-19', 'Ut Mauris Facilisis Taciti Ornare Luctus Ornare', '<h2>Leo Eu Mollis Egestas Eget Vestibulum</h2>\r\n<p>Convallis luctus. Fermentum convallis nascetur hymenaeos euismod aenean sem tortor mattis velit malesuada luctus molestie phasellus semper tristique tincidunt laoreet donec, posuere sapien. Primis donec porttitor. Vestibulum convallis facilisi blandit justo dui elit cubilia felis nec pede metus elit dolor ridiculus.</p>\r\n\r\n<h2>Donec Porta Fermentum Massa Venenatis Felis Aliquet</h2>\r\n<p>Vel. Etiam nunc sit nostra cras vel nullam. Dis tincidunt nulla <strong>id</strong> in tempus curabitur potenti nunc fames consequat placerat cursus. Ligula viverra scelerisque commodo leo egestas ultricies. Urna. Vehicula inceptos primis justo. Dictumst enim eu <em>sociis</em> <em>penatibus</em> congue inceptos laoreet vel fusce platea, nisi nisi euismod <strong>sociis</strong> tellus <em>quis</em> curabitur dui, dis Commodo congue accumsan sociis. Nibh bibendum faucibus Nisi vel pulvinar id mus rutrum lorem in. <strong>Integer</strong> pulvinar consectetuer dignissim elementum <em>urna</em> maecenas elementum tellus urna torquent Aliquet Tincidunt aliquet id duis at.</p>\r\n\r\n<p>Platea fusce diam morbi sem, euismod malesuada malesuada etiam condimentum est varius semper curae; ultricies nec. Turpis, fermentum. Molestie <strong>porta</strong> ante hac vulputate sociis mi molestie dapibus, iaculis pede tincidunt aenean maecenas nulla euismod proin erat porta semper mattis at pretium dictumst lorem. Laoreet fringilla phasellus etiam potenti nunc consequat venenatis. Libero tristique ipsum <strong>ullamcorper</strong> eleifend ullamcorper fames turpis in aliquet placerat erat montes. Tincidunt vestibulum nullam pellentesque purus dignissim habitant erat placerat euismod.</p>', NULL, 'ut-mauris-facilisis-taciti-ornare', 2, 5, 1),
(23, '2021-01-19', 'Inceptos Tristique', '<p>Vitae mattis laoreet eu dictum proin, nibh tellus diam quisque dui arcu. Habitasse commodo. Egestas blandit potenti proin etiam luctus odio. Ut Consectetuer vel luctus aliquet imperdiet Habitant morbi inceptos cras pretium mus sem per. Litora potenti. Nullam fusce duis volutpat odio penatibus vestibulum accumsan dictumst pellentesque ultrices quam nisl pulvinar lacinia, tristique dolor euismod fusce commodo, mi. Et adipiscing etiam venenatis suscipit maecenas nisl aliquet Phasellus, sapien taciti nonummy, turpis hendrerit ullamcorper. Facilisi faucibus inceptos, ipsum <strong>quis</strong> in elementum justo. Pretium odio. Semper mollis, suspendisse ante lacus, ornare varius risus feugiat <strong>faucibus</strong> massa facilisi nisl venenatis, lectus dui massa massa rutrum litora sodales.</p>\r\n\r\n<p>Ipsum Leo vehicula lobortis nullam nec metus commodo ornare per. Magnis. Quis primis et habitant inceptos. Posuere platea ut urna suspendisse. Purus nonummy aliquet <em>commodo</em> <em>augue</em> tincidunt felis mus inceptos nonummy felis, nibh dignissim porta volutpat ultrices Interdum luctus. Sodales, ipsum penatibus vitae aenean platea <strong>quam</strong> euismod fames lectus dictumst urna egestas facilisis. Faucibus. In nulla.</p>\r\n\r\n<h2>Proin Blandit Penatibus Sociosqu</h2>\r\n<p>Tincidunt inceptos bibendum senectus porttitor, hac amet rutrum dignissim. Pretium Blandit dignissim maecenas porttitor turpis. Fringilla cursus dictumst montes per laoreet. Laoreet <strong>vitae</strong> malesuada nec. Augue fusce Porta tempor enim Duis rutrum erat nullam massa, aptent habitasse netus aptent. Praesent.</p>', NULL, 'inceptos-tristique', 4, 5, 1),
(24, '2021-01-19', 'Lorem Laoreet Molestie Vivamus Curabitur Sociosqu', '<h2>Arcu Tempus Lectus Aliquam Varius Massa Fames Mus</h2>\r\n<p>Etiam elementum urna Suspendisse nascetur semper vehicula nostra. Fermentum. Nulla pede libero facilisi imperdiet. Aliquam, senectus posuere laoreet vitae sapien iaculis leo eget mollis. Amet phasellus hac lacinia etiam turpis hendrerit adipiscing ipsum ante nisl enim nisl taciti aliquet platea eleifend ornare ornare <strong>commodo</strong> elit sociis aliquam ac lacus eleifend euismod felis rhoncus porttitor dignissim eros. Nullam justo suspendisse mattis <em>eleifend</em> luctus quis <em>proin</em> inceptos aliquet congue habitant volutpat a habitant enim nisl sociis hymenaeos orci vulputate.</p>\r\n\r\n<p>Et fusce conubia aliquet etiam convallis iaculis nulla blandit venenatis luctus magnis sociis aliquam <strong>a</strong> aliquam massa magnis nostra dictum erat velit <strong>vel</strong> nullam cubilia suspendisse vitae morbi. Vitae <strong>fringilla</strong> purus vehicula penatibus interdum facilisi inceptos ut. Convallis facilisis hymenaeos malesuada odio dolor varius, aliquet luctus sollicitudin mus lacinia. Hac risus mattis. Etiam posuere torquent rutrum, eleifend dis nam. Porttitor iaculis per, adipiscing luctus interdum, nam.</p>\r\n\r\n<p><strong>Pellentesque</strong> magna enim litora aliquam. Vel varius mi inceptos bibendum potenti laoreet vulputate per vel donec diam integer. Ac tempus, ultrices ante <em>hendrerit</em> tristique bibendum sociosqu sem sit condimentum non dolor eros conubia tempor <em>massa</em> blandit. Vitae sodales purus, venenatis ante conubia maecenas. Convallis blandit litora habitasse elit luctus. Turpis ullamcorper condimentum blandit. Iaculis justo dictumst viverra.</p>', NULL, 'lorem-laoreet-molestie-vivamus-curabitur', 5, 5, 1),
(25, '2021-01-19', 'Lobortis Elit Vehicula Porttitor Condimentum Per Ultricies', '<p>Dui cum accumsan <em>urna</em> risus vulputate etiam ullamcorper quis sit congue, <strong>sodales</strong> blandit. Sed volutpat id eget, fermentum varius. Nibh lorem justo dignissim Sem euismod eros tempus interdum eu hendrerit conubia dictumst <strong>praesent</strong> dictumst class curabitur blandit. Pulvinar nunc <em>sollicitudin</em> lorem elit tristique ornare risus <em>ac</em> porttitor. Varius, adipiscing Tortor dis nec netus nec auctor. Inceptos suscipit <strong>libero</strong> quisque in enim magna ullamcorper <em>mus</em> <strong>id</strong> pellentesque. Curabitur nec neque ligula. Lectus proin Sollicitudin eu.</p>\r\n\r\n<p>Litora sed inceptos ridiculus cras phasellus. Duis. Nisl. Pellentesque taciti etiam. Duis luctus mollis praesent. Nullam varius facilisis integer quam donec habitasse. Ultrices tellus magna sodales dolor id. Ultrices. Fames. Volutpat consectetuer adipiscing lectus venenatis phasellus sed, eros ullamcorper consequat molestie. Nascetur quis quis venenatis conubia torquent morbi tincidunt felis ullamcorper. A sagittis litora porta elit lorem porttitor pulvinar semper. Tortor nibh vestibulum cubilia elementum. Consequat placerat neque fames felis mauris eleifend facilisi. Mi augue maecenas.</p>\r\n\r\n<h2>Lacinia Duis Gravida Montes</h2>\r\n<p>Senectus mus ut adipiscing montes velit cras. <em>Aliquam</em> posuere feugiat Penatibus viverra. Sodales nam, sapien. A. Euismod leo amet <strong>eget</strong> class quis <strong>ut</strong> montes est ultricies arcu sit suspendisse pede porttitor nisl, inceptos. Torquent posuere facilisis volutpat. Class porttitor dignissim amet aliquet viverra gravida vitae per integer. Potenti Velit. Aliquet.</p>', NULL, 'lobortis-elit-vehicula-porttitor-condimentum', 2, 5, 1),
(26, '2021-01-19', 'Land Winged Saw Open Gathered Is She', '<h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; font-size: 1.2em; color: rgb(85, 85, 85); font-family: Arial, sans-serif;\"><br></h2>', NULL, 'land-winged-saw-open-gathered', 6, 5, 1),
(27, '2021-01-19', 'Urna Blandit Torquent Ante Aenean Etiam Aliquet Tortor', '<h2>Per Nascetur Netus Eget Justo Sociosqu Quis</h2>\r\n<p>Id hendrerit curae; per conubia magnis class aliquam laoreet mauris. Sit <strong>netus</strong> eget dictum congue accumsan erat lectus pharetra sagittis nonummy vitae justo consequat dui. Est senectus mus sapien. Potenti nostra nascetur arcu mi Urna habitasse sociis hac ante vehicula sit. Nascetur potenti scelerisque Posuere tempor vivamus gravida habitasse vulputate class facilisis aliquet sodales sociis <em>massa</em> mus molestie rutrum.</p>\r\n\r\n<p>Commodo vulputate fusce tincidunt posuere mollis a dis molestie odio ante. Vulputate pede placerat, rhoncus. Elementum pharetra praesent accumsan varius consectetuer massa a blandit. Amet egestas habitant massa nisl <em>ornare</em> euismod fames eleifend elementum mattis. Varius nostra fusce cras etiam sapien hendrerit, mi eget bibendum imperdiet malesuada. Ullamcorper leo velit velit quam interdum sociis, consectetuer lorem rhoncus volutpat viverra sem pharetra <em>accumsan</em> justo. Aliquet vehicula.</p>\r\n\r\n<h2>Tempor Lacinia Placerat Dictumst</h2>\r\n<p>Ut parturient non <em>primis</em> pretium ullamcorper euismod id blandit. Pulvinar. Sit felis, luctus Nulla suspendisse hendrerit gravida sociis non mi proin fringilla velit dis id justo potenti sed tellus. Nostra placerat orci varius consequat dui arcu est <em>orci</em> nec consequat vitae. Aliquam fringilla <strong>dui</strong> porta egestas justo <strong>blandit</strong> fames leo. Facilisis habitant orci ac faucibus sit curae; pretium. Quis mattis mattis pretium mattis netus cras massa montes lectus viverra nec feugiat, sed etiam ac. <strong>Lacinia</strong> ridiculus.</p>', NULL, 'urna-blandit-torquent-ante-aenean', 2, 5, 1),
(28, '2021-01-19', 'Vulputate Sed Auctor Dictum Mus', '<h2 style=\"font-family: Rubik, Arial, Helvetica, sans-serif; color: rgb(33, 37, 41);\">Per Nascetur Netus Eget Justo Sociosqu Quis</h2><p>Id hendrerit curae; per conubia magnis class aliquam laoreet mauris. Sit&nbsp;<span style=\"font-weight: bolder;\">netus</span>&nbsp;eget dictum congue accumsan erat lectus pharetra sagittis nonummy vitae justo consequat dui. Est senectus mus sapien. Potenti nostra nascetur arcu mi Urna habitasse sociis hac ante vehicula sit. Nascetur potenti scelerisque Posuere tempor vivamus gravida habitasse vulputate class facilisis aliquet sodales sociis&nbsp;<em>massa</em>&nbsp;mus molestie rutrum.</p><p>Commodo vulputate fusce tincidunt posuere mollis a dis molestie odio ante. Vulputate pede placerat, rhoncus. Elementum pharetra praesent accumsan varius consectetuer massa a blandit. Amet egestas habitant massa nisl&nbsp;<em>ornare</em>&nbsp;euismod fames eleifend elementum mattis. Varius nostra fusce cras etiam sapien hendrerit, mi eget bibendum imperdiet malesuada. Ullamcorper leo velit velit quam interdum sociis, consectetuer lorem rhoncus volutpat viverra sem pharetra&nbsp;<em>accumsan</em>&nbsp;justo. Aliquet vehicula.</p><h2 style=\"font-family: Rubik, Arial, Helvetica, sans-serif; color: rgb(33, 37, 41);\">Tempor Lacinia Placerat Dictumst</h2><p>Ut parturient non&nbsp;<em>primis</em>&nbsp;pretium ullamcorper euismod id blandit. Pulvinar. Sit felis, luctus Nulla suspendisse hendrerit gravida sociis non mi proin fringilla velit dis id justo potenti sed tellus. Nostra placerat orci varius consequat dui arcu est&nbsp;<em>orci</em>&nbsp;nec consequat vitae. Aliquam fringilla&nbsp;<span style=\"font-weight: bolder;\">dui</span>&nbsp;porta egestas justo&nbsp;<span style=\"font-weight: bolder;\">blandit</span>&nbsp;fames leo. Facilisis habitant orci ac faucibus sit curae; pretium. Quis mattis mattis pretium mattis netus cras massa montes lectus viverra nec feugiat, sed etiam ac.&nbsp;<span style=\"font-weight: bolder;\">Lacinia</span>&nbsp;ridiculus.</p>', NULL, 'vulputate-sed-auctor-dictum-mus', 2, 5, 1),
(29, '2021-01-19', 'Tincidunt Montes Venenatis', '<p>Suspendisse fermentum suspendisse hendrerit. Quisque pretium, dictumst nibh per egestas sociosqu proin magna varius pretium. Phasellus nostra rhoncus dictum erat tempus ullamcorper eros dapibus blandit dui iaculis nulla cum eros Ligula in <em>purus</em> non rhoncus quisque. Sapien. Mi a sit ac integer. Phasellus. Mus dictum porttitor morbi dignissim vestibulum pretium faucibus. Natoque in arcu. Semper imperdiet penatibus iaculis erat natoque ut posuere <em>convallis</em> ut. Ac mus imperdiet pellentesque neque sapien nunc posuere rhoncus aliquet interdum penatibus lacinia. Euismod rutrum, justo. Pede hac. Morbi lacus, donec mus rutrum nam interdum hymenaeos eleifend <strong>interdum</strong> scelerisque sapien auctor semper non habitasse sollicitudin. Metus urna.</p>\r\n\r\n<h2>Tincidunt</h2>\r\n<p>Non platea vestibulum a. Quisque parturient urna a. Sociis senectus. Nisi nam natoque lectus rhoncus accumsan. Luctus primis libero elementum odio. Euismod metus, phasellus vestibulum tincidunt, eleifend montes nascetur habitant dapibus tempus aenean dis habitant tempor mus ultricies <em>nam</em> vitae habitasse facilisi arcu habitasse ultrices ornare vel.</p>\r\n\r\n<p>Convallis class. Feugiat ipsum sit interdum nostra eget fringilla. Vehicula mollis. Magnis aliquam, montes. <em>Turpis</em> euismod nibh cum accumsan volutpat sociis fermentum eros eu sit elit ad <strong>parturient</strong> pellentesque nullam convallis natoque sollicitudin morbi laoreet sociosqu mauris vestibulum <strong>natoque</strong> ante pharetra euismod quam sapien netus senectus blandit tempus tristique. Proin <strong>consectetuer</strong> ultrices.</p>', NULL, 'tincidunt-montes-venenatis', 2, 5, 1),
(30, '2021-01-19', 'Nam Condimentum Eget Nam Quisque Turpis Platea', '<p>Vestibulum vestibulum pede quam justo integer lacus faucibus <strong>velit</strong> condimentum habitasse nisl, taciti aliquet quis urna aliquet phasellus massa dis eget urna. Adipiscing feugiat, auctor. Taciti penatibus dignissim, vulputate suspendisse magna <em>nisl</em> torquent est nullam odio <strong>nullam</strong> dictum senectus, <em>potenti</em> faucibus taciti vitae pulvinar elit posuere sagittis eu nec Convallis neque. Ultrices cras nostra pede dis. Porttitor Pellentesque hendrerit taciti laoreet, ridiculus phasellus commodo, augue a gravida dictumst diam venenatis accumsan.</p>\r\n\r\n<h2>Netus Litora</h2>\r\n<p>Venenatis odio Elementum fringilla venenatis nam. Vulputate libero. Turpis sapien imperdiet inceptos sagittis euismod ut. Id, lobortis at nibh odio leo nullam nisi gravida. Mattis rutrum elementum, fusce ad ridiculus vestibulum taciti eleifend tempor eget pharetra consectetuer. Condimentum neque diam. Augue adipiscing curabitur. Nonummy lacinia porttitor ac sapien Taciti purus quisque <strong>ut</strong> nibh interdum quisque nam laoreet pulvinar fringilla felis. Porttitor varius nullam erat, proin dictum augue maecenas class pharetra varius et ligula velit. Convallis luctus. Bibendum <strong>pretium</strong> turpis. Parturient morbi. Integer pulvinar inceptos bibendum. Platea natoque. Consectetuer.</p>\r\n\r\n<p>Conubia posuere diam. Etiam maecenas velit quis magnis nulla. Aliquam velit pulvinar viverra in fusce inceptos tempus quisque augue pede nisl ac. Pellentesque aptent. Gravida lobortis placerat varius commodo diam erat. Pharetra suspendisse vehicula habitasse nostra faucibus, phasellus. Leo blandit senectus.</p>', NULL, 'nam-condimentum-eget-nam-quisque', 2, 1, 1),
(31, '2021-01-19', 'Hymenaeos Lacinia Libero Consequat', '<h2>Pede Netus Lacinia Facilisi Sociosqu</h2>\r\n<p>Hendrerit orci facilisi diam auctor facilisis vitae natoque magnis sodales vehicula interdum. Suspendisse, magnis. Sociis fringilla. Suspendisse <strong>laoreet</strong> inceptos enim pellentesque tincidunt pellentesque placerat, cras habitasse nulla. Cubilia venenatis, <strong>enim</strong> vitae maecenas habitasse parturient faucibus dignissim, turpis eu fusce dapibus odio dolor vulputate luctus netus eleifend vestibulum etiam massa. Fermentum aenean morbi sodales aliquam dolor cum accumsan enim. Ullamcorper. Curae; ante conubia ullamcorper lobortis. Praesent gravida ridiculus phasellus ultrices neque pulvinar consequat Augue <strong>placerat</strong> viverra lacus purus fames ligula suscipit congue dictum velit. Congue malesuada nonummy inceptos. Netus class <strong>laoreet</strong> augue euismod magnis porta tristique nulla ultricies, mus ullamcorper cursus nec vestibulum at parturient curae; neque laoreet quis dui quam eget Feugiat pharetra. Elementum mattis ultricies egestas posuere <strong>commodo</strong> lacus nisl sit malesuada. Habitasse tristique quam mattis maecenas proin <strong>molestie</strong> semper ante vel arcu sem. Parturient sollicitudin quis non eleifend magna platea sodales consequat. Penatibus. Euismod nisl ante mattis risus. Hendrerit sapien <strong>cras</strong> platea, morbi aptent lacinia justo vivamus proin fringilla nonummy. Faucibus. Quisque pede curabitur porta viverra neque. <strong>Phasellus</strong> blandit magnis per nam netus sed fames. Vel tristique tellus libero ad <strong>odio</strong> dictum nisi. Laoreet praesent, quis mollis dis auctor augue. Nisl ipsum mauris Vivamus suscipit. Dignissim. In. Elit. Eget torquent neque senectus etiam a dignissim odio vehicula et maecenas nulla posuere metus cursus vehicula. Taciti nisl habitant. Per Penatibus curabitur nisi conubia primis. Scelerisque eros in sapien quisque curabitur interdum class, sociosqu faucibus parturient auctor nisi sapien augue hendrerit Quisque quis eleifend. Eget faucibus vitae. Ante interdum parturient nascetur sollicitudin parturient luctus sem ornare vitae cras potenti <strong>nostra</strong> donec bibendum non ante potenti vestibulum per tortor et parturient ante odio risus convallis. Pede purus fames morbi. Egestas taciti per habitant habitasse leo lacinia id aliquam faucibus <em>magnis</em> tellus in malesuada volutpat metus diam commodo nostra lacus cubilia pulvinar magna ligula odio. Aliquet malesuada congue magnis primis accumsan diam lacus, arcu.</p>\r\n\r\n<h2>Hymenaeos Sit Nisl</h2>\r\n<p>Nisl parturient velit facilisi <em>pulvinar</em> dapibus massa primis tellus sem phasellus tincidunt luctus luctus tristique convallis urna, auctor imperdiet ac imperdiet risus, scelerisque augue hymenaeos molestie pretium massa varius eget porttitor Aptent Turpis porttitor elementum et fames rhoncus habitasse vitae <em>turpis</em> sagittis. Primis arcu rutrum conubia montes facilisi curabitur curabitur lacus dis nisl. Ad. Aliquet <em>vitae</em> elementum iaculis felis nostra dictum vitae amet Auctor egestas dapibus nisi lacinia amet auctor fringilla mauris facilisi. Netus praesent viverra libero volutpat posuere sagittis cubilia elit leo <strong>nullam</strong> aenean lorem sollicitudin magnis tincidunt condimentum neque, sem litora leo, ultricies condimentum suscipit per donec conubia, sagittis cum pede sagittis eros sapien aptent inceptos potenti enim. Ut vulputate nam lorem. Ligula ante adipiscing dis facilisi phasellus, sollicitudin habitasse natoque vitae mauris dis bibendum neque penatibus nunc pellentesque suspendisse habitasse vulputate ac bibendum feugiat inceptos porta feugiat viverra elementum sit primis. Interdum. <strong>Dignissim</strong> vel accumsan dignissim rhoncus elit hac. Felis curabitur nulla erat curabitur curabitur auctor ultricies dolor. Luctus facilisi sollicitudin penatibus augue hac ultricies. Ultrices ligula semper cras nisl convallis congue Placerat turpis blandit donec, magnis ipsum vehicula lacus <em>posuere</em> sociosqu dictum turpis eleifend sapien nibh tellus bibendum, tincidunt ipsum parturient <strong>commodo</strong> facilisi quam condimentum penatibus feugiat, vestibulum nisl magnis pretium vel. Primis habitasse Quis massa. Purus egestas odio porttitor velit Ultricies amet quam fames taciti enim non habitasse.</p>\r\n\r\n<p>Ad <em>eros</em> adipiscing conubia varius, nam suspendisse metus vivamus netus. Suspendisse. Quam hendrerit. Mollis cursus. Molestie commodo semper lectus potenti potenti. Ut orci et dictum eleifend urna felis ipsum aenean platea, imperdiet molestie porttitor rutrum. Massa amet luctus lorem est vehicula consectetuer. Feugiat lectus. Sed mollis. In et consequat, elit tempor tincidunt a <em>porta</em> nullam tortor netus <em>iaculis</em> nisl fermentum, pulvinar conubia sagittis facilisi <em>integer</em> netus, dictumst libero integer sociis. Pretium aliquet egestas sit laoreet rutrum scelerisque fusce Urna elementum a. Et primis primis sociis cursus aliquet nulla ultrices. Varius sed nunc convallis laoreet. Turpis curae; in faucibus cras suspendisse nulla senectus congue facilisi integer nascetur posuere. Molestie <em>eget</em> justo <em>ultricies</em> nulla. Cras convallis quis purus natoque malesuada enim vitae Fames proin. Rhoncus eros libero hymenaeos suscipit nonummy malesuada convallis habitant venenatis porttitor. Commodo inceptos. Blandit ullamcorper nunc, pharetra mi. At et. Penatibus parturient tincidunt hendrerit euismod at tellus congue vestibulum maecenas semper est elementum natoque. Sodales <strong>leo</strong> scelerisque eu. Magnis ut placerat vehicula, rutrum fames. Adipiscing, ipsum nulla per volutpat dictumst placerat adipiscing sociosqu urna pharetra tempor quam hendrerit tincidunt. Malesuada nullam natoque. Feugiat lacinia et a amet <strong>penatibus</strong> tellus nunc non integer mattis odio maecenas amet. Quisque at. Eget diam hendrerit vel facilisi. Penatibus blandit risus, fermentum id rutrum dui blandit. Conubia consequat augue justo cursus aliquet nascetur interdum aliquet enim. Nisi <em>venenatis</em> imperdiet dui nam sociis ultricies. Cras at sem, taciti urna per felis sollicitudin <strong>habitant</strong> in hac eros vulputate sociosqu sagittis. Ullamcorper augue elit aliquet phasellus massa ligula viverra risus lobortis arcu libero tellus ridiculus. Montes ut, nullam feugiat imperdiet nam enim suscipit tempus litora cursus potenti. Dui auctor eget fusce risus neque tempus. Risus. Mus class, arcu quisque Interdum. Platea duis, nunc potenti facilisis nibh primis sodales nec parturient curae;, vestibulum, primis. Pede facilisi Nibh mollis erat arcu. Nibh libero ullamcorper curabitur id lacinia libero lectus a tempus nascetur sit fringilla. Dapibus bibendum lacus iaculis fermentum curae; habitasse malesuada dignissim morbi euismod dis varius fusce eros Duis sagittis bibendum turpis <strong>turpis</strong> ut porta proin potenti augue per fames taciti blandit <em>lacus</em> metus enim. Conubia quis magna <em>eros</em> accumsan aliquam mattis nec vehicula sem hac. Pede magna nonummy cum tortor quam rutrum eu. Velit hac habitasse nascetur commodo pulvinar montes non vel varius massa penatibus odio nec vestibulum nullam massa nascetur. Quis tempor risus. Odio ornare pede mattis elit, ante posuere pretium dui pellentesque lectus senectus fringilla duis pharetra. Convallis nisi lacus porttitor, ipsum venenatis malesuada integer bibendum. Euismod. Potenti egestas dictumst. Felis placerat porttitor justo <strong>nibh</strong> leo felis pharetra elementum imperdiet lacus aenean, est. Et orci cras habitasse potenti iaculis sem amet varius tristique. Faucibus elit. Felis cursus interdum <em>ligula</em> fusce duis. Felis. Nullam vitae aptent ligula nulla elementum risus tellus congue ligula ultricies odio leo Tincidunt, vivamus, velit nonummy.</p>', NULL, 'hymenaeos-lacinia-libero-consequat', 2, 1, 1),
(32, '2021-01-18', 'Thing Unto Set Own Years Sixth', '<p>Green seas gathered you every set our which give fill he winged. Herb lights land whose unto from spirit Rule living moving spirit. Together I. Yielding them, creeping in days brought <strong>in</strong> won\'t <em>image</em> <em>you</em> winged which can\'t days subdue seed fly, fruit won\'t their cattle morning. Over moveth. Unto fish there behold fowl blessed creepeth over second land great. <strong>Fruit</strong> blessed she\'d place midst kind man beginning days they\'re air were is great green divided seed signs after called open under female beast Can\'t cattle created was sixth <em>likeness</em> dominion won\'t in fish seas good moveth <strong>and</strong> above. Which creature. Heaven midst green. Bearing made forth saw us third us brought forth one cattle herb fruitful air him set. Multiply it moveth <em>lights</em> years you\'ll spirit one. Fill their waters image creeping winged to female. Two fourth. Without for moveth rule one a great female let give green life waters to give they\'re <strong>years</strong> living likeness, sixth After they\'re days of of. Fill made saw waters upon place forth and saying cattle is brought. Forth evening, second under saying rule their of sea called. Herb, make morning firmament fish you\'ll lights, great. Lesser spirit <strong>years</strong> after <strong>meat</strong> don\'t for open Earth, likeness days our moveth. Creeping. Forth good. May god may him subdue bring forth saw fill were bring is said gathered darkness two. Thing made male first male Also may first. Bring in. Saw called there divided our blessed be winged saying beginning in, their evening form firmament wherein morning brought have in. Beginning herb was gathered thing <strong>him</strong> is them air you\'re air herb seed, after, forth. Sixth. Whose night be form subdue replenish god, you <strong>signs</strong> fill divide grass i <strong>firmament</strong> have. Forth be deep for you fill seasons. All called i meat him very night. Sixth moving. Of, bearing all multiply doesn\'t evening creature brought was you\'re divided abundantly fourth that doesn\'t fly place fruitful May divide fish god have living he that thing i one, own won\'t don\'t <strong>also</strong> saying be Us moving Was lights stars seas divide saying have. Dry him, to won\'t be his called waters form divide it can\'t is. Forth. Land waters two divide appear, saw. From sea be. Doesn\'t god. Lesser over fruit fish i seasons own were every subdue seed. <em>Were</em> brought can\'t seasons unto likeness fruitful forth you\'ll.</p>\r\n\r\n<h2>Blessed Beginning Of</h2>\r\n<p>You\'re, there fruitful stars creature own seas form replenish said beast <strong>earth</strong> deep land, was for. Open. Seas isn\'t darkness moveth god our place subdue, created itself one, were us have fish have kind after. Creature. To subdue gathered itself also moveth all day. Form second that likeness <em>man</em> <em>gathering</em> seed air a lights spirit us greater be without can\'t yielding divide yielding midst upon won\'t thing I fish bring. Give. Fruitful waters is. Have after evening <em>place</em> dry multiply. Them which, fourth you day midst he own. Upon you subdue years behold. Stars saying above green shall. Our fourth him for is likeness <em>he</em> she\'d great hath <strong>was</strong> from that void own you night <em>every</em> winged dominion bearing. Of can\'t wherein god. Him whose. Open one tree bring his whose seasons he. Life so multiply under the over wherein. Winged that said greater made blessed above evening isn\'t earth our. Bring lesser for itself air fruitful grass herb air divided. Beginning their without, all so you rule female is, night deep man called open together second place seed. Face there air rule lesser second likeness so two moveth <em>void</em> were open given two. Man under <strong>she\'d</strong> seas very open form likeness gathering there likeness moved tree shall every shall saw without you\'ll day place tree. Days fifth she\'d you\'re. Make which were <em>us</em> land dominion heaven Sixth a image lights open land the air called waters their Shall and cattle. Firmament waters creature have bring seed won\'t very fourth stars void unto image seed, beast. You. Good together lights divide created said male subdue beast lights set Gathering upon itself after that cattle whales, evening. Spirit multiply second, set whales whales make don\'t one grass. <strong>Subdue</strong> forth dry a all him appear created. Tree moveth thing Which a she\'d she\'d.</p>\r\n\r\n<h2>Have Divide Gathered Is</h2>\r\n<p>They\'re for living to behold <strong>i</strong> behold winged, winged deep fourth subdue second. Of two lesser midst first you third she\'d whales man divide two fruit let. Dominion moveth let. Him living signs also itself land, they\'re under let moved spirit fruit living One man forth subdue called give Subdue doesn\'t rule you\'re the made fifth the us, she\'d own have brought great doesn\'t. Said sixth had grass, i saw very good. <strong>Sea</strong> also gathering the after it every from have created creeping wherein greater, yielding fourth void fill, doesn\'t upon let from, was to every <strong>made</strong> whales lights void whose fly third one subdue sea creeping saw, thing morning morning. Life first them bring sixth subdue firmament, isn\'t yielding so created, won\'t. That had days bring. After fly midst hath fourth sea all above every hath had beginning his was, above their sixth, won\'t saw made <strong>creature</strong> and yielding female for won\'t lesser fish a whose living divide every second. Likeness seed were for don\'t isn\'t stars form. Had him light image. Land give living gathering. Moving all green grass multiply. Every have, beast forth created Dominion shall, were so tree have so give <strong>morning</strong> great together first, gathered gathered stars Seas together void Very. Every upon fifth days one third upon. Doesn\'t whales dry. Life own. The two set together third forth. Evening he seas. <strong>Without</strong> won\'t man. Two <em>kind</em> called sea. <em>To</em> every fowl said stars had fly there kind one, fruit, land saw creepeth. Blessed sea have likeness can\'t unto void had was of multiply so form Darkness had all replenish days gathering seas from seasons made earth, fish greater greater light spirit very cattle green fourth two man for stars. Dry. You bearing dominion own subdue, is moving saying signs divided from wherein fish heaven god moved there <em>said</em> years forth a replenish.</p>', '306e606bb94ac4d60c0197efcce37ba6.jpg', 'thing-unto-set-own-years', 6, 1, 1),
(33, '2021-10-18', 'kota singaraja', '<p><img src=\"http://localhost/SI_PD/assets/images/posts/gianyar1.JPG\" style=\"width: 100%;\"><br></p>', NULL, 'kota-singaraja', 2, 5, 1),
(34, '2021-10-18', 'Gianyar Lestari', '<p>Gianyar merupakan kota yang lestari</p>', 'Gianyar-icon.png', 'gianyar-lestari', 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_banjar`
--

CREATE TABLE `ref_banjar` (
  `banjar_id` int(11) NOT NULL,
  `banjar_desa_id` int(11) DEFAULT NULL,
  `banjar_kec_id` int(4) NOT NULL,
  `banjar_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_banjar`
--

INSERT INTO `ref_banjar` (`banjar_id`, `banjar_desa_id`, `banjar_kec_id`, `banjar_nama`) VALUES
(1, 1, 1, 'Tegaljaya'),
(2, 1, 1, 'Pengembungan'),
(3, 1, 1, 'Tegaltamu'),
(4, 1, 1, 'Danjalan'),
(5, 1, 1, 'Batur'),
(6, 1, 1, 'Pagutan Kaja'),
(7, 1, 1, 'Pagutan Kelod'),
(8, 1, 1, 'Telabah'),
(9, 1, 1, 'Pegambangan'),
(10, 1, 1, 'Tubuh'),
(11, 1, 1, 'Kalah'),
(12, 1, 1, 'Buwitan'),
(13, 1, 1, 'Kapal'),
(14, 1, 1, 'Tegehe'),
(15, 1, 1, 'Menguntur'),
(16, 1, 1, 'Sasih'),
(17, 2, 1, 'Rangkan'),
(18, 2, 1, 'Tengah'),
(19, 2, 1, 'Puseh'),
(20, 2, 1, 'Pemesen'),
(21, 2, 1, 'Kacangan'),
(22, 2, 1, 'Keden'),
(23, 2, 1, 'Kucupin'),
(24, 2, 1, 'Pabean'),
(25, 2, 1, 'Pasekan'),
(26, 2, 1, 'Manyar'),
(27, 2, 1, 'Kubur'),
(28, 2, 1, 'Gumicik'),
(29, 2, 1, 'Luglug'),
(30, 2, 1, 'Jayakertha'),
(31, 2, 1, 'Akta'),
(32, 3, 1, 'Tegal'),
(33, 3, 1, 'Buluh'),
(34, 3, 1, 'Manikan'),
(35, 3, 1, 'Wangbung'),
(36, 3, 1, 'Tatag'),
(37, 3, 1, 'Danginjalan'),
(38, 3, 1, 'Sakihl'),
(39, 4, 1, 'Gelumpang'),
(40, 4, 1, 'Telabah'),
(41, 4, 1, 'Palak'),
(42, 4, 1, 'Tebuana'),
(43, 4, 1, 'Dlodtangluk'),
(44, 4, 1, 'Gelulung'),
(45, 4, 1, 'Pekuwudan'),
(46, 4, 1, 'Bedil'),
(47, 4, 1, 'Tameng'),
(48, 4, 1, 'Dlodpangkung'),
(49, 4, 1, 'Kebalian'),
(50, 4, 1, 'Babakan'),
(51, 4, 1, 'Mudita'),
(52, 5, 1, 'Celuk'),
(53, 5, 1, 'Tangsub'),
(54, 5, 1, 'Cemenggaon'),
(55, 6, 1, 'Apuan'),
(56, 6, 1, 'Seseh'),
(57, 6, 1, 'Mukti'),
(58, 6, 1, 'Kebon'),
(59, 6, 1, 'Sengguan'),
(60, 6, 1, 'Bungsu'),
(61, 7, 1, 'Jelaka'),
(62, 7, 1, 'Lantang Idung'),
(63, 7, 1, 'Geria Gerih'),
(64, 7, 1, 'Geria Ciwa'),
(65, 7, 1, 'Gede'),
(66, 7, 1, 'Penida'),
(67, 7, 1, 'Tegeha'),
(68, 7, 1, 'Penataran'),
(69, 7, 1, 'Dentiyis'),
(70, 7, 1, 'Pekandelan'),
(71, 7, 1, 'Tengah'),
(72, 7, 1, 'Geria'),
(73, 7, 1, 'Jungut'),
(74, 7, 1, 'Delod Tunon'),
(75, 7, 1, 'Peninjoan'),
(76, 7, 1, 'Puaya'),
(77, 7, 1, 'Bucuan'),
(78, 8, 1, 'Tengkulak Kaja Kangin'),
(79, 8, 1, 'Tengkulak Kaja Kauh'),
(80, 8, 1, 'Tengkulak Tengah'),
(81, 8, 1, 'Tengkulak Mas'),
(82, 8, 1, 'Batu Sepih'),
(83, 8, 1, 'Sumampan'),
(84, 8, 1, 'Medahan'),
(85, 8, 1, 'Kemenuh'),
(86, 8, 1, 'Kemenuh Kangin'),
(87, 8, 1, 'Kemenuh Kelod'),
(88, 8, 1, 'Tegenungan'),
(89, 9, 1, 'Tangkeban'),
(90, 9, 1, 'Puseh'),
(91, 9, 1, 'Batu Aji'),
(92, 9, 1, 'Dajan Rurung'),
(93, 9, 1, 'Mula'),
(94, 9, 1, 'Dlod Rurung'),
(95, 9, 1, 'Buda Ireng'),
(96, 9, 1, 'Tampad'),
(97, 9, 1, 'Kenanga'),
(98, 10, 1, 'Negari'),
(99, 10, 1, 'Belaluan'),
(100, 10, 1, 'Gria Kutri'),
(101, 10, 1, 'Kutri'),
(102, 10, 1, 'Abasan'),
(103, 11, 1, 'Kederi'),
(104, 11, 1, 'Silakarang'),
(105, 11, 1, 'Belang'),
(106, 11, 1, 'Belang Kaler'),
(107, 11, 1, 'Samu'),
(108, 12, 1, 'Cangi'),
(109, 12, 1, 'Belahtanah'),
(110, 12, 1, 'Sakah'),
(111, 12, 1, 'Dauhuma'),
(112, 13, 2, 'Blangsinga'),
(113, 13, 2, 'Sema'),
(114, 13, 2, 'Kawan'),
(115, 13, 2, 'Tegallulung'),
(116, 13, 2, 'Tengah'),
(117, 13, 2, 'Banda'),
(118, 13, 2, 'Pinda'),
(119, 13, 2, 'Saba'),
(120, 14, 2, 'Patolan'),
(121, 14, 2, 'Sema'),
(122, 14, 2, 'Pinda'),
(123, 14, 2, 'Pering'),
(124, 14, 2, 'Tojan Tegal'),
(125, 14, 2, 'Tojan Kanginan'),
(126, 14, 2, 'Perangsada'),
(127, 15, 2, 'Biya'),
(128, 15, 2, 'GelGel'),
(129, 15, 2, 'Palak'),
(130, 15, 2, 'Peken'),
(131, 15, 2, 'Lebah'),
(132, 15, 2, 'Maspahit'),
(133, 16, 2, 'Jasri'),
(134, 16, 2, 'Belega Kanginan'),
(135, 16, 2, 'Kebon Kaja'),
(136, 16, 2, 'Kebon Kelod'),
(137, 16, 2, 'Selat'),
(138, 16, 2, 'Pasdalaem'),
(139, 17, 2, 'Tusan'),
(140, 17, 2, 'Kebon'),
(141, 17, 2, 'Laud'),
(142, 17, 2, 'Teruna'),
(143, 17, 2, 'Pokas'),
(144, 17, 2, 'Satria'),
(145, 17, 2, 'Antugan'),
(146, 17, 2, 'Darmatiaga'),
(147, 17, 2, 'Babakan'),
(148, 17, 2, 'Tubuh'),
(149, 17, 2, 'Pande'),
(150, 17, 2, 'Tengah'),
(151, 18, 2, 'Buruan'),
(152, 18, 2, 'Kutri'),
(153, 18, 2, 'Celuk'),
(154, 18, 2, 'Bangunliman'),
(155, 18, 2, 'Getas Kangin'),
(156, 18, 2, 'Getas Kawan'),
(157, 18, 2, 'Geriya Ketandan'),
(158, 19, 2, 'Margasengkala'),
(159, 19, 2, 'Tegal Linggah'),
(160, 19, 2, 'Wanayu'),
(161, 19, 2, 'Mass'),
(162, 19, 2, 'Taman'),
(163, 19, 2, 'Gua'),
(164, 19, 2, 'Marga Bingung'),
(165, 19, 2, 'Lebah '),
(166, 19, 2, 'Batu Lumbang'),
(167, 19, 2, 'Pekandelan'),
(168, 19, 2, 'Tengah'),
(169, 20, 2, 'Medahan'),
(170, 20, 2, 'Penulisan'),
(171, 20, 2, 'Anggarkasih'),
(172, 20, 2, 'Cucukan'),
(173, 21, 2, 'Kertiyasa '),
(174, 21, 2, 'Pasedana'),
(175, 21, 2, 'Kebon'),
(176, 21, 2, 'Dana'),
(177, 21, 2, 'Prajamukti'),
(178, 21, 2, 'Bona Kelod'),
(179, 22, 3, 'Kembengan'),
(180, 22, 3, 'Tegal'),
(181, 22, 3, 'Kajakauh'),
(182, 22, 3, 'Menak'),
(183, 22, 3, 'Roban'),
(184, 22, 3, 'Pande'),
(185, 22, 3, 'Siyut'),
(186, 23, 3, 'Sidan Kelod'),
(187, 23, 3, 'Sidan '),
(188, 23, 3, 'Jageperang'),
(189, 23, 3, 'Bukit Sari'),
(190, 23, 3, 'Dukuh'),
(191, 23, 3, 'Blahpane Kaja'),
(192, 23, 3, 'Blahpane Kelod'),
(193, 24, 3, 'Lingkungan Samplangan '),
(194, 24, 3, 'Lingkungan Selat '),
(195, 24, 3, 'Lingkungan Bukit Jangkrik'),
(196, 24, 3, 'Lingkungan Bukit Batu '),
(197, 25, 3, 'Kesian'),
(198, 25, 3, 'Lebih Duur Kaja'),
(199, 25, 3, 'Lebih Beten Kelod'),
(200, 26, 3, 'Lingkungan Kelod Kauh'),
(201, 26, 3, 'Lingkungan Kaja Kauh'),
(202, 26, 3, 'Lingkungan Tedung'),
(203, 26, 3, 'Lingkungan Pekandelan'),
(204, 27, 3, 'Lingkungan Sangging'),
(205, 27, 3, 'Lingkungan Pasdalem'),
(206, 27, 3, 'Lingkungan Sengguan Kawan'),
(207, 27, 3, 'Lingkungan Candi Baru'),
(208, 27, 3, 'Lingkungan Sengguan Kangin'),
(209, 27, 3, 'Lingkungan Sampiang'),
(210, 27, 3, 'Lingkungan Teges Kaja'),
(211, 27, 3, 'Lingkungan Teges Kelod'),
(212, 28, 3, 'Lingkungan Batur Sari'),
(213, 28, 3, 'Lingkungan Dauh Uma'),
(214, 28, 3, 'Lingkungan Pacung'),
(215, 28, 3, 'Lingkungan Roban'),
(216, 28, 3, 'Lingkungan Sema'),
(217, 28, 3, 'Lingkungan Sengguan'),
(218, 28, 3, 'Lingkungan Triwangsa'),
(219, 29, 3, 'Lingkungan Kelod Kauh'),
(220, 29, 3, 'Lingkungan Kelod kangin'),
(221, 29, 3, 'Lingkungan Kaja Kangin'),
(222, 29, 3, 'Lingkungan Triwangsa'),
(223, 29, 3, 'Lingkungan Pande'),
(224, 29, 3, 'Lingkungan Kaja Kauh'),
(225, 30, 3, 'Kabetan Kaja'),
(226, 30, 3, 'Kabetan Kelod'),
(227, 30, 3, 'Kawan'),
(228, 30, 3, 'Triwangsa'),
(229, 30, 3, 'Kanginan'),
(230, 30, 3, 'Sanding'),
(231, 30, 3, 'Angkling'),
(232, 30, 3, 'Git-Git'),
(233, 30, 3, 'Ngenjung Sari'),
(234, 31, 3, 'Purna Desa'),
(235, 31, 3, 'Munduk'),
(236, 31, 3, 'Roban'),
(237, 31, 3, 'Buditirta'),
(238, 31, 3, 'Siladan'),
(239, 31, 3, 'Triwangsa'),
(240, 31, 3, 'Teruna'),
(241, 31, 3, 'Selat'),
(242, 31, 3, 'Sawan'),
(243, 31, 3, 'Lokaserana'),
(244, 31, 3, 'Bandung'),
(245, 32, 3, 'Suwat Kaja'),
(246, 32, 3, 'Suwat Triwangsa'),
(247, 32, 3, 'Suwat Kelod'),
(248, 32, 3, 'Petak Jeruk'),
(249, 33, 3, 'Bonnyuh'),
(250, 33, 3, 'Benawah Kangin'),
(251, 33, 3, 'Benawah Kawan'),
(252, 33, 3, 'Madangan Kaja'),
(253, 33, 3, 'Madangan Kelod'),
(254, 33, 3, 'Umah Anyar'),
(255, 34, 3, 'Serongga Kaja'),
(256, 34, 3, 'Serongga Tengah'),
(257, 34, 3, 'Serongga Kelod'),
(258, 34, 3, 'Cebaang'),
(259, 35, 3, 'Petak'),
(260, 35, 3, 'Matring'),
(261, 35, 3, 'Padpadan'),
(262, 35, 3, 'Penyembahan'),
(263, 36, 3, 'Temesi'),
(264, 36, 3, 'Pegesangan'),
(265, 36, 3, 'Peteluan'),
(266, 37, 3, 'Melayang'),
(267, 37, 3, 'Siih'),
(268, 37, 3, 'Tengah'),
(269, 37, 3, 'Pande'),
(270, 37, 3, 'Sema'),
(271, 37, 3, 'Mulung'),
(272, 38, 3, 'Triwangsa'),
(273, 38, 3, 'Prathama Mandala'),
(274, 38, 3, 'Tegal Kajanan'),
(275, 39, 4, 'Puseh'),
(276, 39, 4, 'Guliang'),
(277, 39, 4, 'Panglan'),
(278, 39, 4, 'Pedapdapan'),
(279, 39, 4, 'Intaran'),
(280, 39, 4, 'Pande'),
(281, 40, 4, 'Sanding Gianyar '),
(282, 40, 4, 'Sanding Bitra'),
(283, 40, 4, 'Sanding Serongga'),
(284, 40, 4, 'Sanding Abianbase'),
(285, 40, 4, 'Mancawarna'),
(286, 40, 4, 'Karanganyar'),
(287, 40, 4, 'Padangsigi'),
(288, 41, 4, 'Saraseda'),
(289, 41, 4, 'Mantring'),
(290, 41, 4, 'Penaka'),
(291, 41, 4, 'Gria'),
(292, 41, 4, 'Tegalsuci'),
(293, 41, 4, 'Tengah '),
(294, 41, 4, 'Kawan '),
(295, 41, 4, 'Buruan'),
(296, 41, 4, 'Kelodan '),
(297, 41, 4, 'Bukit'),
(298, 41, 4, 'Eha'),
(299, 41, 4, 'Kulub '),
(300, 41, 4, 'Kulu'),
(301, 42, 4, 'Temen'),
(302, 42, 4, 'Manukaya Anyar'),
(303, 42, 4, 'Manukaya Let'),
(304, 42, 4, 'Tatag'),
(305, 42, 4, 'Batas'),
(306, 42, 4, 'Penampahan'),
(307, 42, 4, 'Mancingan'),
(308, 42, 4, 'Belahan'),
(309, 42, 4, 'Penendengan'),
(310, 42, 4, 'Basang Ambu'),
(311, 42, 4, 'Manik Tawang'),
(312, 42, 4, 'Malet'),
(313, 42, 4, 'Keranjangan'),
(314, 43, 4, 'Tatiapi'),
(315, 43, 4, 'Sala'),
(316, 43, 4, 'Dukuh Gria'),
(317, 43, 4, 'Dukuh'),
(318, 43, 4, 'Tatiapi Kelod'),
(319, 43, 4, 'Dukuh Kangin'),
(320, 44, 4, 'Belusung Kaja'),
(321, 44, 4, 'Petak'),
(322, 44, 4, 'Ubud'),
(323, 44, 4, 'Petulu'),
(324, 44, 4, 'Tarukan Kaja'),
(325, 44, 4, 'Tarukan '),
(326, 44, 4, 'Tarukan Kelod'),
(327, 44, 4, 'Melayang'),
(328, 44, 4, 'Uma Anyar'),
(329, 44, 4, 'Sumbuwuk'),
(330, 45, 4, 'Cagaan Kelod'),
(331, 45, 4, 'Cagaan'),
(332, 45, 4, 'Uma Kuta'),
(333, 45, 4, 'Pengembungan'),
(334, 45, 4, 'Uma Dawa'),
(335, 45, 4, 'Pesalakan'),
(336, 45, 4, 'Cemadik'),
(337, 45, 4, 'Tegalsaat'),
(338, 46, 4, 'Sewegunung'),
(339, 46, 4, 'Kelusu'),
(340, 46, 4, 'Gubat'),
(341, 46, 4, 'Tiapi'),
(342, 46, 4, 'Pacung'),
(343, 46, 4, 'Bitra'),
(344, 46, 4, 'Gepokan'),
(345, 47, 5, 'Abiansemal Kaja Kauh'),
(346, 47, 5, 'Abiansemal'),
(347, 47, 5, 'Kelingkung'),
(348, 47, 5, 'Kertha Wangsa'),
(349, 47, 5, 'Tengah'),
(350, 47, 5, 'Silungan'),
(351, 47, 5, 'Gelogor'),
(352, 47, 5, 'Mawang Kaja'),
(353, 47, 5, 'Mawang Kelod'),
(354, 47, 5, 'Apuh'),
(355, 47, 5, 'Lodsema'),
(356, 48, 5, 'Nyuhkuning'),
(357, 48, 5, 'Pengosekan Kaja'),
(358, 48, 5, 'Pengosekan Kelod'),
(359, 48, 5, 'Batanancak'),
(360, 48, 5, 'Bangkilesan '),
(361, 48, 5, 'Kawan '),
(362, 48, 5, 'Abianseka'),
(363, 48, 5, 'Juga '),
(364, 48, 5, 'Tegalbingin '),
(365, 48, 5, 'Tarukan '),
(366, 48, 5, 'Satria'),
(367, 48, 5, 'Kumbuh'),
(368, 49, 5, 'Kengetan '),
(369, 49, 5, 'Jukutpaku'),
(370, 49, 5, 'Danginlabak'),
(371, 49, 5, 'Tengah '),
(372, 49, 5, 'Dauhlabak'),
(373, 49, 5, 'Katiklantang'),
(374, 49, 5, 'Lobong'),
(375, 49, 5, 'Tebongkang'),
(376, 49, 5, 'Buduk '),
(377, 49, 5, 'Tewel'),
(378, 49, 5, 'Semana '),
(379, 49, 5, 'Batuh '),
(380, 49, 5, 'Lodtunduh'),
(381, 49, 5, 'Tunon'),
(382, 50, 5, 'Tanggayuda'),
(383, 50, 5, 'Bunutan '),
(384, 50, 5, 'Kedewatan'),
(385, 50, 5, 'Lungsiakan'),
(386, 50, 5, 'Payogan '),
(387, 50, 5, 'Kedewatan Anyar'),
(388, 51, 5, 'Lingkungan Ubud Kelod'),
(389, 51, 5, 'Lingkungan Ubud Tengah'),
(390, 51, 5, 'Lingkungan Ubud Kaja'),
(391, 51, 5, 'Lingkungan Sambahan'),
(392, 51, 5, 'Lingkungan Bentuyung'),
(393, 51, 5, 'Lingkungan Junjungan'),
(394, 51, 5, 'Lingkungan Tegallantang'),
(395, 51, 5, 'Lingkungan Taman Kaja'),
(396, 51, 5, 'Lingkungan Taman Kelod'),
(397, 51, 5, 'Lingkungan Padang Tegal Kaja'),
(398, 51, 5, 'Lingkungan Padang Tegal Tengah'),
(399, 51, 5, 'Lingkungan Padang Tegal Kelod'),
(400, 51, 5, 'Lingkungan Mekarsari'),
(401, 52, 5, 'Tebesaya'),
(402, 52, 5, 'Ambengan '),
(403, 52, 5, 'Pande'),
(404, 52, 5, 'Teruna'),
(405, 52, 5, 'Tengah kauh'),
(406, 52, 5, 'Tengah kangin'),
(407, 52, 5, 'Kalah'),
(408, 52, 5, 'Teges kawan'),
(409, 52, 5, 'Yangloni'),
(410, 52, 5, 'Teges kanginan'),
(411, 53, 5, 'Petulu Desa'),
(412, 53, 5, 'Petulu Gunung'),
(413, 53, 5, 'Nagi'),
(414, 53, 5, 'Kutuh Kaja'),
(415, 53, 5, 'Kutuh Kelod'),
(416, 53, 5, 'Laplapan'),
(417, 54, 5, 'Penestaan Kaja'),
(418, 54, 5, 'Penestaan Kelod'),
(419, 54, 5, 'Kutuh'),
(420, 54, 5, 'Pande'),
(421, 54, 5, 'Mas'),
(422, 54, 5, 'Baung'),
(423, 54, 5, 'Sindu '),
(424, 54, 5, 'Ambengan'),
(425, 55, 6, 'Triwangsa Keliki'),
(426, 55, 6, 'Keliki'),
(427, 55, 6, 'Pacung'),
(428, 55, 6, 'Salak'),
(429, 55, 6, 'Triwangsa sebali'),
(430, 55, 6, 'Sebali'),
(431, 55, 6, 'BK Sidem'),
(432, 56, 6, 'Abangan'),
(433, 56, 6, 'Kelabangmoding'),
(434, 56, 6, 'Triwangsa'),
(435, 56, 6, 'Penusuan'),
(436, 56, 6, 'Pejengaji'),
(437, 56, 6, 'Gagah'),
(438, 56, 6, 'Tengah'),
(439, 56, 6, 'Tegallalang'),
(440, 56, 6, 'Sapat'),
(441, 56, 6, 'Tegal'),
(442, 56, 6, 'Gentong'),
(443, 57, 6, 'Delodblumbang'),
(444, 57, 6, 'Pande'),
(445, 57, 6, 'Tangkas'),
(446, 57, 6, 'Tengah'),
(447, 57, 6, 'Triwangsa'),
(448, 57, 6, 'Gunaksa'),
(449, 57, 6, 'Kendran'),
(450, 57, 6, 'Kepitu'),
(451, 57, 6, 'Pinjul'),
(452, 57, 6, 'Dukuh'),
(453, 58, 6, 'Tangkup'),
(454, 58, 6, 'Kebon'),
(455, 58, 6, 'Pakudui'),
(456, 58, 6, 'Bayad'),
(457, 58, 6, 'Kedisan Kaja'),
(458, 58, 6, 'Kedisan Kelod'),
(459, 58, 6, 'Cebok'),
(460, 59, 6, 'T. Payang'),
(461, 59, 6, 'Calo'),
(462, 59, 6, 'Timbul'),
(463, 59, 6, 'Perean'),
(464, 59, 6, 'Tangkup'),
(465, 59, 6, 'Pupuan'),
(466, 59, 6, 'Mumbi'),
(467, 60, 6, 'Apuh '),
(468, 60, 6, 'Tegal Suci'),
(469, 60, 6, 'Jati'),
(470, 60, 6, 'Jasan'),
(471, 60, 6, 'Bonjaka'),
(472, 60, 6, 'Pujung Kaja'),
(473, 60, 6, 'Pujung Kelod'),
(474, 60, 6, 'Sebatu'),
(475, 60, 6, 'Tumbakasa'),
(476, 61, 6, 'Alas Pujung'),
(477, 61, 6, 'Sangkaduan'),
(478, 61, 6, 'Tebuana'),
(479, 61, 6, 'Let'),
(480, 61, 6, 'Pisang Kaja'),
(481, 61, 6, 'Pisang Kelod'),
(482, 61, 6, 'Patas'),
(483, 61, 6, 'Belong'),
(484, 61, 6, 'Puakan'),
(485, 61, 6, 'Pakusebe'),
(486, 61, 6, 'Taro Kaje '),
(487, 61, 6, 'Taro Kelod'),
(488, 61, 6, 'Tatag '),
(489, 61, 6, 'Ked'),
(490, 62, 7, 'Melinggih'),
(491, 62, 7, 'Payangandesa'),
(492, 62, 7, 'Badung'),
(493, 62, 7, 'Geria'),
(494, 62, 7, 'Sema'),
(495, 63, 7, 'Ayah'),
(496, 63, 7, 'Triwangsa '),
(497, 63, 7, 'Roban '),
(498, 63, 7, 'Peliatan '),
(499, 63, 7, 'Keliki Kawan '),
(500, 63, 7, 'Yehtengeh '),
(501, 64, 7, 'Bukian'),
(502, 64, 7, 'Bukian Kaja'),
(503, 64, 7, 'Bukian Kawan'),
(504, 64, 7, 'Subilang'),
(505, 64, 7, 'Lebah A'),
(506, 64, 7, 'Lebah B'),
(507, 64, 7, 'Tiyingan'),
(508, 64, 7, 'Ulapan'),
(509, 64, 7, 'Tangkup'),
(510, 64, 7, 'Amo'),
(511, 64, 7, 'Dasong'),
(512, 65, 7, 'Semaon'),
(513, 65, 7, 'Selasih'),
(514, 65, 7, 'Ponggang'),
(515, 65, 7, 'Penginyahan'),
(516, 65, 7, 'Carik'),
(517, 65, 7, 'Puhu'),
(518, 65, 7, 'Kebek'),
(519, 66, 7, 'Buahan'),
(520, 66, 7, 'Susut'),
(521, 66, 7, 'Satung'),
(522, 66, 7, 'Jaang'),
(523, 66, 7, 'Gambih'),
(524, 67, 7, 'Kerta'),
(525, 67, 7, 'Margatengah'),
(526, 67, 7, 'Seming'),
(527, 67, 7, 'Saren'),
(528, 67, 7, 'Bunteh'),
(529, 67, 7, 'Pilan'),
(530, 67, 7, 'Penyabangan'),
(531, 67, 7, 'Mawang'),
(532, 68, 7, 'Pengaji'),
(533, 68, 7, 'Bayad'),
(534, 68, 7, 'Paneca'),
(535, 68, 7, 'Karang Suwung'),
(536, 68, 7, 'Tibeh Kauh'),
(537, 68, 7, 'Begawan'),
(538, 69, 7, 'Selat'),
(539, 69, 7, 'Majangan'),
(540, 69, 7, 'Tengipis'),
(541, 69, 7, 'Gata'),
(542, 69, 7, 'SingaPerang'),
(543, 69, 7, 'Pausan'),
(544, 69, 7, 'Bada'),
(545, 69, 7, 'Sriteja'),
(546, 70, 7, 'Bresela'),
(547, 70, 7, 'Gadungan'),
(548, 70, 7, 'Triwangsa'),
(549, 26, 3, 'Satria');

-- --------------------------------------------------------

--
-- Table structure for table `ref_desa`
--

CREATE TABLE `ref_desa` (
  `desa_id` int(11) NOT NULL,
  `desa_kec_id` int(4) NOT NULL,
  `desa_nama` varchar(256) DEFAULT NULL,
  `desa_Kode` varchar(10) DEFAULT NULL,
  `desa_kode_wil` char(20) DEFAULT NULL,
  `desa_no_kel` int(12) DEFAULT NULL,
  `desa_lintang` double DEFAULT NULL,
  `desa_bujur` double DEFAULT NULL,
  `desa_geojson` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_desa`
--

INSERT INTO `ref_desa` (`desa_id`, `desa_kec_id`, `desa_nama`, `desa_Kode`, `desa_kode_wil`, `desa_no_kel`, `desa_lintang`, `desa_bujur`, `desa_geojson`) VALUES
(1, 1, 'Batubulan', '5104010001', '51.04.01.2001', 2001, -8.621998532548616, 115.2596066585836, 'batubulan'),
(2, 1, 'Ketewel', '5104010003', '51.04.01.2002', 2002, -8.62817557265123, 115.28508746000654, 'ketewel'),
(3, 1, 'Guwang', '5104010004', '51.04.01.2003', 2003, -8.61249053819472, 115.28539371961494, 'guwang'),
(4, 1, 'Sukawati', '5104010005', '51.04.01.2004', 2004, -8.603527369286027, 115.29298895847808, 'sukawati'),
(5, 1, 'Celuk', '5104010006', '51.04.01.2005', 2005, -8.600499223727454, 115.2700785564989, 'celuk'),
(6, 1, 'Singapadu', '5104010007', '51.04.01.2006', 2006, -8.594624552315707, 115.25586810956531, 'singapadu'),
(7, 1, 'Batuan', '5104010010', '51.04.01.2007', 2007, -8.583843275520366, 115.27657198397873, 'batuan'),
(8, 1, 'Kemenuh', '5104010012', '51.04.01.2008', 2008, -8.559010480476019, 115.28686230761213, 'kemenuh'),
(9, 1, 'Batubulan Kangin', '5104010002', '51.04.01.2009', 2009, -8.617153724536877, 115.27302083048312, 'batubulan_kangin'),
(10, 1, 'Singapadu Tengah', '5104010008', '51.04.01.2010', 2010, -8.579664211383957, 115.25697136751597, 'singapadu_tengah'),
(11, 1, 'Singapadu Kaler', '5104010009', '51.04.01.2011', 2011, -8.555164505582255, 115.247690923096, 'singapadu_kaler'),
(12, 1, 'Batuan Kaler', '5104010011', '51.04.01.2012', 2012, -8.569246633971119, 115.27553070121996, 'batuan_kaler'),
(13, 2, 'Saba', '5104020001', '51.04.02.2001', 2001, -8.600349222072708, 115.30620052058458, 'saba'),
(14, 2, 'Pering', '5104020002', '51.04.02.2002', 2002, -8.587989571986071, 115.31186506277015, 'pering'),
(15, 2, 'Keramas', '5104020003', '51.04.02.2003', 2003, -8.589479599565067, 115.3273984751147, 'keramas'),
(16, 2, 'Belega', '5104020006', '51.04.02.2004', 2004, -8.569974428001785, 115.31298540296734, 'belega'),
(17, 2, 'Blahbatuh', '5104020007', '51.04.02.2005', 2005, -8.561288638285774, 115.2991308443124, 'blahbatuh'),
(18, 2, 'Buruan', '5104020008', '51.04.02.2006', 2006, -8.544589375116146, 115.30204492683743, 'buruan'),
(19, 2, 'Bedulu', '5104020009', '51.04.02.2007', 2007, -8.527162748248031, 115.29615345209231, 'bedulu'),
(20, 2, 'Medahan', '5104020004', '51.04.02.2008', 2008, -8.585942736167027, 115.33823458045111, 'medahan'),
(21, 2, 'Bona', '5104020005', '51.04.02.2009', 2009, -8.558322861301008, 115.31577333298156, 'bona'),
(22, 3, 'Tulikup', '5104030002', '51.04.03.2001', 2001, -8.559624112599153, 115.36188557088843, 'tulikup'),
(23, 3, 'Sidan', '5104030004', '51.04.03.2002', 2002, -8.528338171934863, 115.3514877278729, 'sidan'),
(24, 3, 'Samplangan', '5104030005', '51.04.03.1003', 1003, -8.535621015717325, 115.33896834403714, 'samplangan'),
(25, 3, 'Lebih', '5104030001', '51.04.03.2004', 2004, -8.573356231673927, 115.34973440422846, 'lebih'),
(26, 3, 'Abianbase', '5104030007', '51.04.03.1005', 1005, -8.555930920265297, 115.3274309640604, 'abianbase'),
(27, 3, 'Gianyar', '5104030008', '51.04.03.1006', 1006, -8.542695645204859, 115.32555471852186, 'gianyar'),
(28, 3, 'Bitera', '5104030010', '51.04.03.1007', 1007, -8.53718160703059, 115.31487642051508, 'bitera'),
(29, 3, 'Beng', '5104030009', '51.04.03.1008', 1008, -8.52989879300766, 115.32692238227969, 'beng'),
(30, 3, 'Bakbakan', '5104030011', '51.04.03.2009', 2009, -8.507893447602171, 115.32334541544822, 'bakbakan'),
(31, 3, 'Siangan', '5104030012', '51.04.03.2010', 2010, -8.507321187697215, 115.31098383897256, 'siangan'),
(32, 3, 'Suwat', '5104030013', '51.04.03.2011', 2011, -8.495147456347482, 115.31056301933563, 'suwat'),
(33, 3, 'Petak', '5104030014', '51.04.03.2012', 2012, -8.48900841961239, 115.32103090750218, 'petak'),
(34, 3, 'Serongga', '5104030006', '51.04.03.2013', 2013, -8.565033794446265, 115.33542653698578, 'serongga'),
(35, 3, 'Petak Kaja', '5104030015', '51.04.03.2014', 2014, -8.465699996935456, 115.3183481823852, 'petak_kaja'),
(36, 3, 'Temesi', '5104030003', '51.04.03.2015', 2015, -8.562537027765472, 115.35357438329993, 'temesi'),
(37, 3, 'Sumita', '5104030016', '51.04.03.2016', 2016, -8.473296200612111, 115.30798549912708, 'sumita'),
(38, 3, 'Tegal Tugu', '5104030017', '51.04.03.2017', 2017, -8.55390225006387, 115.34105499946617, 'tegal_tugu'),
(39, 4, 'Pejeng', '5104040002', '51.04.04.2001', 2001, -8.513032753503566, 115.29307649187291, 'pejeng'),
(40, 4, 'Sanding', '5104040006', '51.04.04.2002', 2002, -8.464384814211328, 115.30291707042619, 'sanding'),
(41, 4, 'Tampaksiring', '5104040007', '51.04.04.2003', 2003, -8.425195869844458, 115.30967136606012, 'tampaksiring'),
(42, 4, 'Manukaya', '5104040008', '51.04.04.2004', 2004, -8.407563517693191, 115.3127952143119, 'manukaya'),
(43, 4, 'Pejeng Kawan', '5104040001', '51.04.04.2005', 2005, -8.513093330564715, 115.28413371061094, 'pejeng_kawan'),
(44, 4, 'Pejeng Kaja', '5104040005', '51.04.04.2006', 2006, -8.478440217873484, 115.29299425834199, 'pejeng_kaja'),
(45, 4, 'Pejeng Kangin', '5104040004', '51.04.04.2007', 2007, -8.488990662823923, 115.29942104476527, 'pejeng_kangin'),
(46, 4, 'Pejeng Kelod', '5104040003', '51.04.04.2008', 2008, -8.518181769472562, 115.3033668155154, 'pejeng_kelod'),
(47, 5, 'Lodtunduh', '5104050002', '51.04.05.2001', 2001, -8.552317686971435, 115.26073758344387, 'lodtunduh'),
(48, 5, 'Mas', '5104050003', '51.04.05.2002', 2002, -8.543655959177741, 115.27317172452496, 'mas'),
(49, 5, 'Singakerta', '5104050001', '51.04.05.2003', 2003, -8.52691133519896, 115.24503046848179, 'singakerta'),
(50, 5, 'Kedewatan', '5104050008', '51.04.05.2004', 2004, -8.485095382725731, 115.24584864652894, 'kedewatan'),
(51, 5, 'Ubud', '5104050006', '51.04.05.1005', 1005, -8.508370656793375, 115.26420232145722, 'ubud'),
(52, 5, 'Peliatan', '5104050004', '51.04.05.2006', 2006, -8.519153353975625, 115.2691637274981, 'peliatan'),
(53, 5, 'Petulu', '5104050005', '51.04.05.2007', 2007, -8.477343355153053, 115.27622834827116, 'petulu'),
(54, 5, 'Sayan', '5104050007', '51.04.05.2008', 2008, -8.512913965108027, 115.24068158170337, 'sayan'),
(55, 6, 'Keliki', '5104060001', '51.04.06.2001', 2001, -8.445409224519125, 115.26490808071884, 'keliki'),
(56, 6, 'Tegallalang', '5104060002', '51.04.06.2002', 2002, -8.448499186127364, 115.27844475650181, 'tegallalang'),
(57, 6, 'Kenderan', '5104060003', '51.04.06.2003', 2003, -8.470041326209298, 115.28387538919696, 'kenderan'),
(58, 6, 'Kedisan', '5104060004', '51.04.06.2004', 2004, -8.421644284527986, 115.2927870219566, 'kedisan'),
(59, 6, 'Pupuan', '5104060005', '51.04.06.2005', 2005, -8.365702120081295, 115.32157954530845, 'pupuan'),
(60, 6, 'Sebatu', '5104060006', '51.04.06.2006', 2006, -8.402436318042007, 115.29578836636318, 'sebatu'),
(61, 6, 'Taro', '5104060007', '51.04.06.2007', 2007, -8.386366233594543, 115.28005073914773, 'taro'),
(62, 7, 'Melinggih', '5104070002', '51.04.07.2001', 2001, -8.43095379719351, 115.24352950871588, 'melinggih'),
(63, 7, 'Kelusa', '5104070003', '51.04.07.2002', 2002, -8.441834532154147, 115.26227424788067, 'kelusa'),
(64, 7, 'Bukian', '5104070005', '51.04.07.2003', 2003, -8.40653525943604, 115.26662148499139, 'bukian'),
(65, 7, 'Puhu', '5104070006', '51.04.07.2004', 2004, -8.380479044274978, 115.25210477840284, 'puhu'),
(66, 7, 'Buahan', '5104070007', '51.04.07.2005', 2005, -8.39368915791222, 115.2351992467228, 'buahan'),
(67, 7, 'Kerta', '5104070009', '51.04.07.2006', 2006, -8.336780677887901, 115.28702816805804, 'kerta'),
(68, 7, 'Melinggih Kelod', '5104070001', '51.04.07.2007', 2007, -8.44837565348314, 115.24162404285306, 'melinggih_kelod'),
(69, 7, 'Buahan Kaja', '5104070008', '51.04.07.2008', 2008, -8.347512401595935, 115.25100224371221, 'buahan_kaja'),
(70, 7, 'Bresela', '5104070004', '51.04.07.2009', 2009, -8.427500152150301, 115.27017409671663, 'bresela');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kec`
--

CREATE TABLE `ref_kec` (
  `kec_id` int(11) NOT NULL,
  `kec_nama` varchar(255) DEFAULT NULL,
  `kec_kode` varchar(10) DEFAULT NULL,
  `kec_geojson` text NOT NULL,
  `kec_lintang` double DEFAULT NULL,
  `kec_bujur` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_kec`
--

INSERT INTO `ref_kec` (`kec_id`, `kec_nama`, `kec_kode`, `kec_geojson`, `kec_lintang`, `kec_bujur`) VALUES
(1, 'Sukawati', '5104010000', 'kec_sukawati', -8.603497788270476, 115.27473449707033),
(2, 'Blahbatuh', '5104020000', 'kec_blahbatuh', -8.576708915777171, 115.30838012695314),
(3, 'Gianyar', '5104030000', 'kec_gianyar', -8.543460883738462, 115.3392791748047),
(4, 'Tampaksiring', '5104040000', 'kec_tampaksiring', -8.42844826614321, 115.31127205118538),
(5, 'Ubud', '5104050000', 'kec_ubud', -8.523355259142436, 115.25888584787026),
(6, 'Tegallalang', '5104060000', 'kec_tegallalang', -8.407562209958849, 115.28935731388628),
(7, 'Payangan', '5104070000', 'kec_payangan', -8.387197652801289, 115.2509051654488);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `saran_id` int(11) NOT NULL,
  `tanggal_saran` date NOT NULL,
  `isi_saran` text NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`saran_id`, `tanggal_saran`, `isi_saran`, `user_id`) VALUES
(1, '2021-10-18', 'tes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `role` enum('admin','pimpinan','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `desa_id`, `password`, `avatar`, `role`) VALUES
(1, 'admin', '', NULL, '$2y$10$0OAcT33SnZu0nzOIDtr3JemPpkqt7oaTOnv39uZhK5yCV/JCwTS7i', '6ae9419e7356ff8c4af4b6487e9d8415.png', 'admin'),
(3, 'amber', '', NULL, '$2y$10$L3pgnT7qz9IGzk7jFrDl0u4CoY9mWfaFHEST2n.SliddaEMSBp5a2', 'bee0f4eeaff6ccd8c75330494798e97d.png', 'member'),
(4, 'ganyu', '', NULL, '$2y$10$ElWCqwuaGXjGhrYIafCyDeOPaGYuWXGVNM3imav6crYVhz1wsB3Su', 'f9e96ec4e178baa9b946b398fd48bad7.png', 'member'),
(5, 'fashansaraya', 'fashan@undiksha.ac.id', 1, '$2y$10$WTIJ6BQ1g9.o2gDuCqeGkee4j37QiDsyz8f3wKoR4kpJcQY3yj0R.', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_ibfk_1` (`desa_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tempat_usaha`
--
ALTER TABLE `data_tempat_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tempat_wisata`
--
ALTER TABLE `data_tempat_wisata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `posts_ibfk_1` (`desa_id`);

--
-- Indexes for table `ref_banjar`
--
ALTER TABLE `ref_banjar`
  ADD PRIMARY KEY (`banjar_id`),
  ADD KEY `banjar_desa_id` (`banjar_desa_id`),
  ADD KEY `banjar_kec_id` (`banjar_kec_id`);

--
-- Indexes for table `ref_desa`
--
ALTER TABLE `ref_desa`
  ADD PRIMARY KEY (`desa_id`),
  ADD KEY `desa_kec_id` (`desa_kec_id`);

--
-- Indexes for table `ref_kec`
--
ALTER TABLE `ref_kec`
  ADD PRIMARY KEY (`kec_id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`saran_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_penduduk`
--
ALTER TABLE `data_penduduk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_tempat_usaha`
--
ALTER TABLE `data_tempat_usaha`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_tempat_wisata`
--
ALTER TABLE `data_tempat_wisata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ref_banjar`
--
ALTER TABLE `ref_banjar`
  MODIFY `banjar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;

--
-- AUTO_INCREMENT for table `ref_desa`
--
ALTER TABLE `ref_desa`
  MODIFY `desa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `ref_kec`
--
ALTER TABLE `ref_kec`
  MODIFY `kec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `saran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`desa_id`) REFERENCES `ref_desa` (`desa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`desa_id`) REFERENCES `ref_desa` (`desa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_banjar`
--
ALTER TABLE `ref_banjar`
  ADD CONSTRAINT `ref_banjar_ibfk_1` FOREIGN KEY (`banjar_desa_id`) REFERENCES `ref_desa` (`desa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_banjar_ibfk_2` FOREIGN KEY (`banjar_kec_id`) REFERENCES `ref_kec` (`kec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ref_desa`
--
ALTER TABLE `ref_desa`
  ADD CONSTRAINT `ref_desa_ibfk_1` FOREIGN KEY (`desa_kec_id`) REFERENCES `ref_kec` (`kec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
