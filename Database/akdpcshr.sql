-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2020 at 03:02 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akdpcshr`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `admincheck`(IN `eml` VARCHAR(50), IN `pwd` VARCHAR(50), OUT `cod` INT)
    NO SQL
begin
declare actpwd varchar(50);
select upwd from adlog where uname=eml into @actpwd;
if pwd=@actpwd then
select regcod from adlog where uname=eml into cod;
else
set cod=-1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delalb`(IN `acod` INT)
    NO SQL
begin
delete from tbalb where albcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delalbpic`(IN `apcod` INT)
    NO SQL
begin
delete from tbalbpic where albpiccod=apcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delcmt`(IN `ccod` INT)
    NO SQL
begin
delete from tbcmt where cmtcod=ccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delreg`(IN `rcod` INT)
    NO SQL
begin
delete from tbreg where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delshr`(IN `scod` INT)
    NO SQL
begin
delete from tbshr where shrcod=scod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispalb`()
    NO SQL
begin
select * from tbalb;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispalbpic`(IN `acod` INT)
    NO SQL
begin
select * from tbalbpic where albpicalbcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispalbshr`(IN `albcod` INT)
    NO SQL
begin
select regcod,regnam from tbreg where regcod not
in (select shrregcod from tbshr where shralbcod=albcod);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispcmt`()
    NO SQL
begin
select * from tbcmt;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `disppiccmt`(IN `piccod` INT)
    NO SQL
begin
select cmtdat,regnam,cmtdsc from tbcmt,tbreg
where cmtregcod=regcod and cmtalbpiccod=piccod 
order by cmtdat desc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispreg`()
    NO SQL
begin
select * from tbreg;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dispshr`()
    NO SQL
begin
select * from tbshr;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspmyalb`(IN `regcod` INT)
    NO SQL
begin
select albcod,albtit,albdsc,albdat,albregcod,
albcvrpiccod from tbalb where albregcod=regcod
and albcvrpiccod=-1
union all
select albcod,albtit,albdsc,albdat,albregcod,
concat(albcvrpiccod,albpicfil) from tbalb, tbalbpic
where albregcod=regcod  and albcvrpiccod=albpiccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `dspshralb`(IN `regcod` INT)
    NO SQL
begin
select albcod,albtit,albdsc,albdat,albregcod,
albcvrpiccod from tbalb where albcod in 
(select shralbcod from tbshr where shrregcod=regcod)
and albcvrpiccod=-1
union all
select albcod,albtit,albdsc,albdat,albregcod,
concat(albcvrpiccod,albpicfil) from tbalb, tbalbpic
where albcod in 
(select shralbcod from tbshr where shrregcod=regcod)
and albcvrpiccod=albpiccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findalb`(IN `acod` INT)
    NO SQL
begin
select * from tbalb where albcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findalbpic`(IN `apcod` INT)
    NO SQL
begin
select * from tbalbpic where albpiccod=apcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findcmt`(IN `ccod` INT)
    NO SQL
begin
select * from tbcmt where cmtcod=ccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findreg`(IN `rcod` INT)
    NO SQL
begin
select * from tbreg where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `findshr`(IN `scod` INT)
    NO SQL
begin
select * from tbshr where shrcod=scod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `frgpwd`(IN `eml` VARCHAR(50), OUT `pwd` VARCHAR(50))
    NO SQL
begin
select regpwd from tbreg where regeml=eml into pwd;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insalb`(IN `atit` VARCHAR(100), IN `adsc` VARCHAR(1000), IN `adat` DATETIME, IN `arcod` INT, IN `acpcod` INT)
    NO SQL
begin
insert tbalb values(null,atit,adsc,adat,arcod,acpcod);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insalbpic`(IN `apacod` INT, IN `apfil` VARCHAR(50), IN `apdsc` VARCHAR(500), OUT `apcod` INT)
    NO SQL
begin
insert tbalbpic values(null,apacod,apfil,apdsc);
select last_insert_id() into apcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inscmt`(IN `cdat` DATETIME, IN `crcod` INT, IN `cdsc` VARCHAR(500), IN `capcod` INT)
    NO SQL
begin
insert tbcmt values(null,cdat,crcod,cdsc,capcod);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insreg`(IN `rnam` VARCHAR(50), IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)
    NO SQL
begin
insert tbreg values(null,rnam,reml,rpwd,rdat);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insrep`(IN `rnam` VARCHAR(50), IN `rpic` VARCHAR(50), IN `rdat` DATE, IN `rexp` VARCHAR(150))
    NO SQL
begin
insert tbrpt values(rnam,rpic,rdat,rexp);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insshr`(IN `srcod` INT, IN `sacod` INT)
    NO SQL
begin
insert tbshr values(null,srcod,sacod);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `inssug`(IN `rsug` VARCHAR(250), IN `rdat` DATE)
    NO SQL
begin
insert tbsug values(null,rsug,rdat);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logincheck`(IN `eml` VARCHAR(50), IN `pwd` VARCHAR(50), OUT `cod` INT)
    NO SQL
begin
declare actpwd varchar(50);
select regpwd from tbreg where regeml=eml into @actpwd;
if pwd=@actpwd then
select regcod from tbreg where regeml=eml into cod;
else
set cod=-1;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updalb`(IN `acod` INT, IN `atit` VARCHAR(100), IN `adsc` VARCHAR(1000))
    NO SQL
begin
update tbalb set albtit=atit,albdsc=adsc where albcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updalbpic`(IN `apcod` INT, IN `apacod` INT, IN `apfil` VARCHAR(50), IN `apdsc` VARCHAR(500))
    NO SQL
begin
update tbalbpic set albpicalbcod=apacod,albpicfil=apfil,albpicdsc=apdsc where albpiccod=apcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updcmt`(IN `ccod` INT, IN `cdat` DATETIME, IN `crcod` INT, IN `cdsc` VARCHAR(500), IN `capcod` INT)
    NO SQL
begin
update tbcmt set cmtdat=cdat,cmtregcod=crcod,cmtdsc=dsc,cmtalbpiccod=capcod where cmtcod=ccod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updcvrpic`(IN `acod` INT, IN `acvrpiccod` INT)
    NO SQL
begin
update tbalb set albcvrpiccod=acvrpiccod where albcod=acod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updreg`(IN `rcod` INT, IN `rnam` VARCHAR(50), IN `reml` VARCHAR(50), IN `rpwd` VARCHAR(50), IN `rdat` DATETIME)
    NO SQL
begin
update tbreg set regnam=rnam,regeml=reml,regpwd=rpwd,regdat=rdat where regcod=rcod;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updshr`(IN `scod` INT, IN `srcod` INT, IN `sacod` INT)
    NO SQL
begin
update tbshr set shrregcod=srcod,shralbcod=sacod where shrcod=scod;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adlog`
--

CREATE TABLE IF NOT EXISTS `adlog` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `upwd` varchar(50) NOT NULL,
  PRIMARY KEY (`regcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adlog`
--

INSERT INTO `adlog` (`regcod`, `uname`, `upwd`) VALUES
(1, 'avi@ak.com', 'avi123');

-- --------------------------------------------------------

--
-- Table structure for table `tbalb`
--

CREATE TABLE IF NOT EXISTS `tbalb` (
  `albcod` int(11) NOT NULL AUTO_INCREMENT,
  `albtit` varchar(100) NOT NULL,
  `albdsc` varchar(1000) NOT NULL,
  `albdat` date NOT NULL,
  `albregcod` int(11) NOT NULL,
  `albcvrpiccod` int(11) NOT NULL,
  PRIMARY KEY (`albcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbalb`
--

INSERT INTO `tbalb` (`albcod`, `albtit`, `albdsc`, `albdat`, `albregcod`, `albcvrpiccod`) VALUES
(16, 'First Album', 'Adding new pics to share              ', '2013-07-30', 38, 25),
(17, 'Ak Collection', '                                                ', '2013-07-30', 38, -1),
(18, 'happiee birthdayy', '     wondrful 18th birthdy                   ', '2013-08-04', 39, 30),
(19, 'Nature', 'Beauty of Nature         ', '2013-08-04', 40, -1),
(20, 'new', '       my choice                 ', '2014-10-29', 41, 38),
(21, 'new', 'ggg                        ', '2014-11-17', 43, 39);

-- --------------------------------------------------------

--
-- Table structure for table `tbalbpic`
--

CREATE TABLE IF NOT EXISTS `tbalbpic` (
  `albpiccod` int(11) NOT NULL AUTO_INCREMENT,
  `albpicalbcod` int(11) NOT NULL,
  `albpicfil` varchar(50) NOT NULL,
  `albpicdcs` varchar(500) NOT NULL,
  PRIMARY KEY (`albpiccod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbalbpic`
--

INSERT INTO `tbalbpic` (`albpiccod`, `albpicalbcod`, `albpicfil`, `albpicdcs`) VALUES
(22, 16, '.jpg', 'Beach'),
(23, 16, '.jpg', 'Lord Krishna     '),
(24, 16, '.jpg', 'Car       '),
(25, 16, '.JPG', 'Ak Logo'),
(26, 16, '.JPG', 'Ak Project'),
(27, 17, '.jpg', 'Clouds            '),
(28, 17, '.jpg', 'Need Water            '),
(29, 17, '.jpg', 'Road            '),
(30, 18, '.jpg', '            '),
(32, 18, '.jpg', '            '),
(33, 18, '.jpg', '            '),
(34, 19, '.jpg', 'Mountains            '),
(35, 19, '.jpg', 'Tree'),
(36, 19, '.jpg', 'Landscape'),
(37, 19, '.jpg', 'Waterfall            '),
(38, 20, '.jpg', '         Its Avi   ');

-- --------------------------------------------------------

--
-- Table structure for table `tbcmt`
--

CREATE TABLE IF NOT EXISTS `tbcmt` (
  `cmtcod` int(11) NOT NULL AUTO_INCREMENT,
  `cmtdat` date NOT NULL,
  `cmtregcod` int(11) NOT NULL,
  `cmtdsc` varchar(500) NOT NULL,
  `cmtalbpiccod` int(11) NOT NULL,
  PRIMARY KEY (`cmtcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbcmt`
--

INSERT INTO `tbcmt` (`cmtcod`, `cmtdat`, `cmtregcod`, `cmtdsc`, `cmtalbpiccod`) VALUES
(4, '2013-07-30', 38, 'Clouds are Blue but this view is true....', 27),
(5, '2013-07-30', 38, 'Depletion of water is the rising problem.', 28),
(6, '2013-07-30', 38, 'Just try to travel on road in car, Its really amazing specially on hilly areas....', 29),
(7, '2013-07-30', 38, 'This view shows us the beautiful beach on earth.', 22),
(8, '2013-07-30', 38, 'Image shows the view of Mahabharata.', 23),
(9, '2013-07-30', 38, 'I wanna Drive this Car', 24),
(10, '2013-07-30', 38, 'This is my logo for further projects!!!!', 25),
(13, '2013-07-30', 38, 'Avi Kathuria Logo', 26),
(14, '2013-08-04', 39, 'nice flower.....:)', 32),
(15, '2013-08-04', 39, 'yummy cake....:p', 30),
(16, '2013-08-04', 39, 'awesum view......\r\n', 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbreg`
--

CREATE TABLE IF NOT EXISTS `tbreg` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `regnam` varchar(50) NOT NULL,
  `regeml` varchar(50) NOT NULL,
  `regpwd` varchar(50) NOT NULL,
  `regdat` date NOT NULL,
  PRIMARY KEY (`regcod`),
  UNIQUE KEY `regeml` (`regeml`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbreg`
--

INSERT INTO `tbreg` (`regcod`, `regnam`, `regeml`, `regpwd`, `regdat`) VALUES
(38, 'Avi Kathuria', 'avi@ak.com', 'avi', '2013-07-30'),
(39, 'shweta', 'sk@9', 'sk@9', '2013-08-04'),
(40, 'Rahul', 'rahul@ak.com', 'rahul', '2013-08-04'),
(41, 'Trial', 'trial@mail.com', 'trial', '2014-10-29'),
(42, 'Tester', 'avikathuria21@gmail.com', '123newq', '2014-11-08'),
(43, 'a', 'a@a.in', 'aaaaaa', '2014-11-17'),
(44, 'tryMe', 'trial@gmail.com', 'try123', '2020-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbrpt`
--

CREATE TABLE IF NOT EXISTS `tbrpt` (
  `albname` varchar(50) NOT NULL,
  `picname` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `exprep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbrpt`
--

INSERT INTO `tbrpt` (`albname`, `picname`, `date`, `exprep`) VALUES
('Ak', 'Clouds', '2014-11-16', 'Seems something not as usual to be there, plz check it out'),
('Birthday', 'Cake', '2014-11-16', 'Its very ugly, plz remove asap'),
('new', '1', '2014-11-17', 'yugvty');

-- --------------------------------------------------------

--
-- Table structure for table `tbshr`
--

CREATE TABLE IF NOT EXISTS `tbshr` (
  `shrcod` int(11) NOT NULL AUTO_INCREMENT,
  `shrregcod` int(11) NOT NULL,
  `shralbcod` int(11) NOT NULL,
  PRIMARY KEY (`shrcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbshr`
--

INSERT INTO `tbshr` (`shrcod`, `shrregcod`, `shralbcod`) VALUES
(1, 38, 18),
(2, 38, 19),
(3, 39, 19),
(4, 38, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbsug`
--

CREATE TABLE IF NOT EXISTS `tbsug` (
  `regcod` int(11) NOT NULL AUTO_INCREMENT,
  `suggest` varchar(250) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`regcod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbsug`
--

INSERT INTO `tbsug` (`regcod`, `suggest`, `date`) VALUES
(5, 'I made this project my own and it took much time as expected but I focused on even minute things. I embedded working mail fn, security by disabling mouse right click and printscrn key, etc.\r\nAt all enjoyed working on it', '2014-11-16'),
(6, 'Testing suggestions', '2014-11-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
