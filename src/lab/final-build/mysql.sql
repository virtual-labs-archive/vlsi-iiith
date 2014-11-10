-- Documentor
--

use cse14 ;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE IF NOT EXISTS `content` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `cid` varchar(10) NOT NULL,
  `tid` varchar(10) NOT NULL,
  `cnid` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `posttext` text NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`srno`, `cid`, `tid`, `cnid`, `pid`, `title`, `author`, `posttext`, `date`) VALUES
(4, 'C001', 'T001', 'CN001', 'P002', 'QNX', 'Sushanth Poojary', 'QNX is a commercial Unix-like real-time operating system, aimed primarily at the embedded systems. As a microkernel-based OS, QNX is based on the idea of running most of the OS in the form of a number of small tasks, known as servers. This differs from the more traditional monolithic kernel, in which the operating system is a single very large program composed of a huge number of "parts" with special abilities.', ''),
(3, 'C001', 'T001', 'CN001', 'P001', 'Welcome to Virtual lab', 'Prof A M Kulkarnii', '<p>Physical distances and the lack of resources make us unable to perform experiments, especially when they involve sophisticated instruments. Also, good teachers are always a scarce resource. Web-based and video-based courses address the issue of teaching to some extent. Conducting joint experiments by two participating institutions and also sharing costly resources has always been a challenge. With the present day internet and computer technologies the above limitations can no more hamper students and researchers in enhancing their skills and knowledge.</p>\r\n<p>&nbsp;</p>\r\n<p>Also, in a country such as ours, costly instruments and equipment need to be shared with fellow researchers to the extent possible.  The armature of the DC motor is fed from a (controlled) three phase thyristor rectifier. The DC voltage to motor field is also provided by a similar controlled rectifier. All the interconnections of the components are made inside the panel. A measurement card is enclosed inside the panel, which is used to measure and scale down the voltages and currents of the motor and generator.</p>', ''),
(7, 'C001', 'T005', 'CN004', 'P007', 'sdf', 'sdf', '<p>dsfsdf</p>', 'May 17, 2010'),
(8, 'C001', 'T001', 'CN008', 'P008', 'Testq', 'Susahnth', '<p>sdfsdf</p>', 'May 21, 2010');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `Srno` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(30) NOT NULL,
  `clink` varchar(10) NOT NULL,
   `cid` varchar(10) NOT NULL,
    `tid` varchar(10) NOT NULL, 
    `icon` varchar(25) NOT NULL, 
   PRIMARY KEY (`Srno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Srno`, `cid`, `tid`, `caption`, `clink`, `icon`) VALUES
(1, 'C001', 'T001', 'Theory', 'Cn001', 'theory.jpg'),
(2, 'C001', 'T002', 'Procedure', 'CN002', 'procedure.jpg'),
(8, 'C001', 'T006', 'Self-evaluation', 'CN006', 'eval.jpg'),
(5, 'C001', 'T005', 'Simulator', 'CN005', 'sim.jpg');


CREATE TABLE IF NOT EXISTS `documentor` (
  `id` int(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


--
-- Table structure for table `topmenu`
--

CREATE TABLE IF NOT EXISTS `topmenu` (
  `Srno` int(5) NOT NULL AUTO_INCREMENT,
  `caption` varchar(30) NOT NULL,
  `link` varchar(200) NOT NULL,
  PRIMARY KEY (`Srno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Dumping data for table `topmenu`
--

INSERT INTO `topmenu` (`Srno`, `caption`, `link`) VALUES
(1, 'Home', 'index2.php');

