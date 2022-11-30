-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 12:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `korisnicko_ime` varchar(100) NOT NULL,
  `lozinka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jezik`
--

CREATE TABLE `jezik` (
  `id` varchar(100) NOT NULL,
  `naziv` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jezik`
--

INSERT INTO `jezik` (`id`, `naziv`) VALUES
('eng', 'Engleski'),
('hrv', 'Hrvatski');

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `br_mob` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `facebook` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `ime`, `prezime`, `br_mob`, `email`, `facebook`) VALUES
(1, 'Mateo', 'Muhoberac', '+385 98 166 6290', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `jezik` varchar(100) NOT NULL,
  `naziv` text NOT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `jezik`, `naziv`, `opis`) VALUES
(1, 'hrv', 'Plata \"Stara Kuća\"', 'domaći pršut, kobasica,govedina, panceta, \r\nsv.vrat, 3 vrste sira, razni namazi, kiselo '),
(2, 'hrv', 'Pečena Janjetina s Ražnja', 'domaća janjetina lagano pečena na žaru'),
(3, 'hrv', 'Peka \"Osojnik\"', 'teletina, janjetina + domaći krumpir'),
(4, 'hrv', 'Makaruli ', 'jelo od tjestenine sa umakom od mesa'),
(5, 'hrv', 'Zelena Menestra', 'tri vrste suhog mesa kuhano sa zelenim kupusom '),
(6, 'hrv', 'Desert \"Rozata\"', 'karamelizirana slastica pripremljena sa rozulinom '),
(7, 'eng', '\"Old House\" mix', 'homemade prosciutto, sausage, beef, bacon, pork neck, varieties of cheese, +various spreads, +sour'),
(8, 'eng', 'Split-roasted lamb', 'homemade lamb lightly grilled '),
(9, 'eng', 'Backing lid \"Osojnik\"', 'Veal and lamb + homemade potatoes'),
(10, 'eng', 'Macaroni ', 'pasta with meat sauce'),
(11, 'eng', 'Green Menestra', 'three varieties of smoked meat with green cabbage'),
(12, 'eng', 'Dessert \"Rozata\"', 'cake made with caramel and rozulin');

-- --------------------------------------------------------

--
-- Table structure for table `opg`
--

CREATE TABLE `opg` (
  `id` int(11) NOT NULL,
  `jezik` varchar(100) NOT NULL,
  `naslov` text NOT NULL,
  `opis` text DEFAULT NULL,
  `zakljucak` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opg`
--

INSERT INTO `opg` (`id`, `jezik`, `naslov`, `opis`, `zakljucak`) VALUES
(1, 'hrv', 'Domaći uzgoj', 'Za vrijeme lockdowna 2019. godine u doba pandemije COVID-19, odlučili smo ponovno aktivirati naše malo obiteljsko gospodarstvo. \r\nVelika potražnja za domaćim proizvodima natjerala nas je da našu ponudu proširimo i budemo što bolji i pristupačniji kako starom, tako i svakom novom kupcu. Svoje proizvode na tržište plasiramo putem \"Virtualne place\". \r\nNaš trud prepoznat je od strane Gosp. Blanke Kufner koja je na internet stranici\r\nAgroklub.com (stranica za poljoprivredu) uspješno promovirala naš tradicionalni proizvod kontonjatu (slasticu od dunje) poznatu za dubrovački kraj. LINK \r\nUvijek se trudimo i nastojimo zadovoljiti naše kupce stalnom ponudom voća i povrća, mesnih proizvoda, likera i slastica koje imamo u ograničenim količinama zbog velike potražnje domaćeg i prirodno uzgojenog.\r\n', 'Svu našu ponudu gostima u našoj konobi trudimo se što izvornije\r\ni ukusnije pripremiti da bi osjetili blagodati domaćeg proizvoda\r\nuzgojenog na škrtoj zemlji dubrovačkog zaleđa. \r\n'),
(3, 'eng', 'Domestic cultivation', 'During the COVID-19 lockdown in 2019., we decided to reactivate our small family farm. The great demand for domestic products forced us to expand our offer and be as good and accessible as possible to both old and new customers. \r\nWe market our products via \"Virtual salary\". Our effort was recognized by Mrs. Blanka Kufner, who is on the website\r\nAgroklub.com (site for agriculture) successfully promoted our traditional product \"kontonjata\" (quince dessert) known for the Dubrovnik area. LINK\r\nWe always try to satisfy our customers with a constant offer of fruits and vegetables, meat products, liqueurs and desserts, which we have in limited quantities due to the high demand for domestic and naturally grown products.\r\n\r\n\r\n', 'We try to make all our offer to guests in our tavern as original as possible\r\nand prepare more deliciously so that you can feel the benefits of the homemade product\r\ngrown on the scarce land of the Dubrovnik hinterland.');

-- --------------------------------------------------------

--
-- Table structure for table `opgponuda`
--

CREATE TABLE `opgponuda` (
  `id` int(11) NOT NULL,
  `jezik` varchar(100) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opgponuda`
--

INSERT INTO `opgponuda` (`id`, `jezik`, `naziv`, `opis`) VALUES
(1, 'hrv', 'svježa jaja', '(iz slobodnog podnog uzgoja)'),
(2, 'hrv', 'povrće', '(kupusnjače, luk, patate, batat, rajčice, tikvice, krastavci, ...)'),
(3, 'hrv', 'voće ', '(naranče, narančini, limuni, smokve, dunje, ...)'),
(4, 'hrv', 'marmelade', '(smokva, dunja, šljiva)'),
(5, 'hrv', 'likeri ', '(rozulin - mirisni liker od cvijeta ruže)'),
(6, 'hrv', 'kontonjata', '(slastica od voća dunje - mrkatunja)'),
(7, 'eng', 'fresh eggs', '(from free floor cultivation)'),
(8, 'eng', 'vegetables', '(cabbage, onions, potatoes, sweet potatoes, tomatoes, zucchini, cucumbers, ...)\r\n'),
(9, 'eng', 'fruits', '(oranges, lemons, figs, quinces, ...)\r\n'),
(10, 'eng', 'jam', '(fig, quince, plum)\r\n'),
(11, 'eng', 'liqueurs', '(\"rozulin\"- fragrant rose flower liqueur)\r\n'),
(12, 'eng', 'kontonjata', '(dessert made from quince fruit - \"mrkatunja\")\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `o_nama`
--

CREATE TABLE `o_nama` (
  `id` int(11) NOT NULL,
  `jezik` varchar(100) NOT NULL,
  `opis` text DEFAULT NULL,
  `tkosmo` text DEFAULT NULL,
  `lokacija` text DEFAULT NULL,
  `slogan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `o_nama`
--

INSERT INTO `o_nama` (`id`, `jezik`, `opis`, `tkosmo`, `lokacija`, `slogan`) VALUES
(1, 'hrv', 'Samo 13km od grada Dubrovnika u selu Osojniku, smjestila se naša mala obiteljska konoba, Stara Kuća. Ideja \"Stare Kuće\" je nastavak već utemeljene priče koja poseže iz davne 1980. god. Naša obitelj je u svom seoskom domaćinstvu uspješno otkrivala ponudu okusa i mirisa našeg kraja. U 2022. god. motivirani lijepim uspomenama i slikama na koje podsjećaju zidovi naše konobe, odlučili smo ih opet oživjeti. Seosku idilu upotpunjuju zvuci domaćih životinja sa naše male farme i svježe ubrano voće i povrće iz našeg vrta. Pripremajući i poslužujući autentična pića i jela iz našega kraja, želimo da se svaki naš gost osjeća dobrodošao u našem malom kutku tradicije. ', 'Mi smo obitelj Muhoberac, koju čine 8 članova. Za dobrodošlicu u našu konobu srdačno će vas dočekati nasmijana lica domaćice i domaćina. Neće vas zaobići ni osmijeh i razigranost naše djece. Kroz našu ponudu osjetit ćete trud koje su naše vrijedne ruke pripremale za vas.\r\nIako smo mnogobrojni, trudimo se da svaki naš gost nađe mjesto u našoj obitelji. \r\nDa bi vam uspomena na \"Staru Kuću\" bila što draža postoji jedno malo pravilo koje vam uz nas neće biti teško slijediti,  ono kaže: \"NOSITE NAŠU PRIČU SVUDA, VI STE RAZLOG NAŠEG TRUDA\".', 'Naše selo nalazi se u dubrovačkom zaleđu, samo 15ak minuta vožnje od stare gradske jezgre. Dolazeći do nas uživati ćete u prekrasnim pogledima na rijeku Dubrovačku, padine Srđa, te Elafitske otoke s Vidikovca (crkva sv.Ilije), nedaleko od naše konobe. \r\nOsim starih kamenih kuća, selo krasi i mjesna crkva sv.Đorđa i spomenik poginulim braniteljima u Domovinskom ratu. Selo je prepoznatljivo i po djelovanju KuDa sv.Juraj Osojnik.\r\nStanovnici, ujedno i članovi čuvaju običaje i društveni život balajući linđo uz zvuk lijerice, dobro poznati stari ples primorskog kraja koji ćemo vam dočarati u ambijentu naše konobe. ', 'Nosite našu priču svuda, vi ste razlog našeg truda.'),
(2, 'eng', 'Only 13 km away from the city of Dubrovnik in the village of Osojnik, is located our small family tavern \"Stara Kuća“ (Old House). The idea of the \"Stara Kuća\" is a continuation of an already established story that dates back to the 1980s. Our family successfully discovered the offer of flavors and aromas of our region in their rural household. In 2022, motivated by beautiful memories and paintings reminiscent of the walls of our tavern, we decided to revive those memories The rural idyll is complemented by the sounds of domestic animals from our small farm and freshly picked fruits and vegetables from our garden. By preparing and serving authentic drinks and dishes of our region, we want each of our guests to feel welcome in our little corner of tradition.', 'We are a Muhoberac family consisting of 8 members. The smiling faces of the hostess and the host will warmly welcome you to our tavern. You will not miss the laughter and playfulness of our children. Through our offer you will feel the effort that our diligent hands have prepared for you.\r\n\r\nAlthough we are numerous, we will do our best that each of our guests finds a place in our family.\r\n\r\nTo make the memory of the \"Stara Kuća\" as nice as possible, there is one small rule that will not be difficult for you to follow, and it says: \"Carry the story of us everywhere, you are the reason for our efforts\"!\r\n\r\n\r\n', 'Our village is located in the hinterland of Dubrovnik, only 15 minutes’ drive from the Old town. Coming to us, you will enjoy beautiful views of the significant landscape Rijeka dubrovačka and the slopes of mount Srđ, as well as the Elaphite Islands from the viewpoint next to the Church of St. Elijah, not far from our tavern.\r\n\r\nIn addition to the old stone houses, the village is adorned with the parish church of St. George and a monument to the fallen veterans of the Homeland War. The village is also recognizable for the activities of the Cultural and Artistic Society Sveti Juraj Osojnik.\r\n\r\nResidents, as well as members keep the customs and social life by dancing linđo with the sound of lijerica, a well-known dance of the coastal region that we will evoke in the ambience of our tavern.\r\n', 'Carry the story of us everywhere, you are the reason for our efforts!'),
(3, 'hrv', 'Samo 13km od grada Dubrovnika u selu Osojniku, smjestila se naša mala obiteljska konoba, Stara Kuća. Ideja \"Stare Kuće\" je nastavak već utemeljene priče koja poseže iz davne 1980. god. Naša obitelj je u svom seoskom domaćinstvu uspješno otkrivala ponudu okusa i mirisa našeg kraja. U 2022. god. motivirani lijepim uspomenama i slikama na koje podsjećaju zidovi naše konobe, odlučili smo ih opet oživjeti. Seosku idilu upotpunjuju zvuci domaćih životinja sa naše male farme i svježe ubrano voće i povrće iz našeg vrta. Pripremajući i poslužujući autentična pića i jela iz našega kraja, želimo da se svaki naš gost osjeća dobrodošao u našem malom kutku tradicije. ', 'Mi smo obitelj Muhoberac, koju čine 8 članova. Za dobrodošlicu u našu konobu srdačno će vas dočekati nasmijana lica domaćice i domaćina. Neće vas zaobići ni osmijeh i razigranost naše djece. Kroz našu ponudu osjetit ćete trud koje su naše vrijedne ruke pripremale za vas.\r\nIako smo mnogobrojni, trudimo se da svaki naš gost nađe mjesto u našoj obitelji. \r\nDa bi vam uspomena na \"Staru Kuću\" bila što draža postoji jedno malo pravilo koje vam uz nas neće biti teško slijediti,  ono kaže: \"NOSITE NAŠU PRIČU SVUDA, VI STE RAZLOG NAŠEG TRUDA\".', 'Naše selo nalazi se u dubrovačkom zaleđu, samo 15ak minuta vožnje od stare gradske jezgre. Dolazeći do nas uživati ćete u prekrasnim pogledima na rijeku Dubrovačku, padine Srđa, te Elafitske otoke s Vidikovca (crkva sv.Ilije), nedaleko od naše konobe. \r\nOsim starih kamenih kuća, selo krasi i mjesna crkva sv.Đorđa i spomenik poginulim braniteljima u Domovinskom ratu. Selo je prepoznatljivo i po djelovanju KuDa sv.Juraj Osojnik.\r\nStanovnici, ujedno i članovi čuvaju običaje i društveni život balajući linđo uz zvuk lijerice, dobro poznati stari ples primorskog kraja koji ćemo vam dočarati u ambijentu naše konobe. ', 'Nosite našu priču svuda, vi ste razlog našeg truda.');

-- --------------------------------------------------------

--
-- Table structure for table `recenzije`
--

CREATE TABLE `recenzije` (
  `id` int(11) NOT NULL,
  `ime` varchar(200) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recenzije`
--

INSERT INTO `recenzije` (`id`, `ime`, `komentar`) VALUES
(1, 'pero', 'dobar restoran'),
(2, 'ivana', 'odlicna hrana'),
(3, 'vlaho', 'fin restoran'),
(4, 'mario', 'top sve'),
(5, 'marin', 'dobro sve');

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE `slike` (
  `id` int(11) NOT NULL,
  `putanja` varchar(250) NOT NULL,
  `kategorija` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slike`
--

INSERT INTO `slike` (`id`, `putanja`, `kategorija`) VALUES
(1, 'assets/slike/02.jpeg', 'galerija'),
(2, 'assets/slike/03.jpeg', 'galerija'),
(3, 'assets/slike/04.jpeg', 'galerija'),
(4, 'assets/slike/06.jpeg', 'galerija'),
(5, 'assets/slike/01.jpeg', 'info'),
(6, 'assets/slike/03.jpeg', 'info'),
(7, 'assets/slike/05.jpeg', 'info'),
(11, 'assets/slike/07.jpeg', 'opg'),
(12, 'assets/slike/08.jpeg', 'opg'),
(13, 'assets/slike/09.jpeg', 'opg'),
(19, 'assets/slike/07.jpeg', 'slider'),
(20, 'assets/slike/08.jpeg', 'slider'),
(21, 'assets/slike/05.jpeg', 'slider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jezik`
--
ALTER TABLE `jezik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jezik` (`jezik`);

--
-- Indexes for table `opg`
--
ALTER TABLE `opg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jezik` (`jezik`);

--
-- Indexes for table `opgponuda`
--
ALTER TABLE `opgponuda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jezik` (`jezik`);

--
-- Indexes for table `o_nama`
--
ALTER TABLE `o_nama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jezik` (`jezik`);

--
-- Indexes for table `recenzije`
--
ALTER TABLE `recenzije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `opg`
--
ALTER TABLE `opg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opgponuda`
--
ALTER TABLE `opgponuda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `o_nama`
--
ALTER TABLE `o_nama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recenzije`
--
ALTER TABLE `recenzije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slike`
--
ALTER TABLE `slike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`jezik`) REFERENCES `jezik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opg`
--
ALTER TABLE `opg`
  ADD CONSTRAINT `opg_ibfk_1` FOREIGN KEY (`jezik`) REFERENCES `jezik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opgponuda`
--
ALTER TABLE `opgponuda`
  ADD CONSTRAINT `opgponuda_ibfk_1` FOREIGN KEY (`jezik`) REFERENCES `jezik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `o_nama`
--
ALTER TABLE `o_nama`
  ADD CONSTRAINT `o_nama_ibfk_1` FOREIGN KEY (`jezik`) REFERENCES `jezik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
