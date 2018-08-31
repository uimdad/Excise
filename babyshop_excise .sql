-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2018 at 01:49 AM
-- Server version: 10.1.31-MariaDB-cll-lve
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
-- Database: `babyshop_excise`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl`
--

CREATE TABLE `acl` (
  `id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acl`
--

INSERT INTO `acl` (`id`, `aco_id`, `role_id`) VALUES
(3, 4, 1),
(4, 5, 1),
(5, 6, 1),
(6, 7, 1),
(7, 8, 1),
(8, 9, 1),
(9, 10, 1),
(10, 11, 1),
(11, 13, 1),
(12, 14, 1),
(13, 15, 1),
(14, 16, 1),
(15, 17, 1),
(16, 1, 1),
(74, 10, 3),
(75, 11, 3),
(76, 13, 3),
(77, 14, 3),
(78, 16, 3),
(79, 17, 3),
(80, 15, 7),
(81, 16, 7),
(82, 7, 4),
(83, 8, 4),
(84, 9, 4),
(85, 19, 4),
(86, 20, 4),
(87, 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `icons` varchar(250) NOT NULL,
  `displaystatus` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `class`, `method`, `display_name`, `icons`, `displaystatus`, `parent_menu`) VALUES
(1, 'Roles', 'roles_all', 'Roles', '<i class=\"material-icons\">gavel</i>', 1, 0),
(4, 'Permissions', 'show_all_permissions', 'Permissions', '<i class=\"material-icons\">dns</i>', 2, 0),
(5, 'Vechicle', 'show_vechicle', 'vehicle', '', 0, 0),
(6, 'Users', 'show_users', 'Users', '<i class=\"material-icons\">supervisor_account</i>', 1, 0),
(7, 'Vechicles', 'seized_vechicles', 'Seized vehicle', '<i class=\"material-icons\">directions_car</i>', 1, 0),
(8, 'Vechicles', 'show_vechicles_all', 'confiscations', '<i class=\"material-icons\">view_list</i>', 1, 0),
(9, 'Vechicles', 'show_history_vechicles', 'Seized vehicle History', '<i class=\"material-icons\">assignment</i>', 1, 4),
(10, 'Vechicles', 'warehouse_checkin', 'Checked In', '<i class=\"material-icons\">directions_car</i>', 1, 0),
(11, 'Vechicles', 'fsl_report_dispatched', 'Dispatched vehicles', '', 1, 1),
(13, 'Vechicles', 'fsl_report_received', 'Received vehicles', '', 1, 1),
(14, 'Vechicles', 'warehouse_confiscations', 'confiscated vehicles', '<i class=\"material-icons\">view_list</i>', 1, 0),
(15, 'Vechicles', 'warehouse_allot_vechicle', 'Allot vehicle', '', 1, 2),
(16, 'Vechicles', 'alloted_vechicles', 'Alloted vehicles', '', 1, 2),
(17, 'Vechicles', 'returned_vechicles', 'Cleared vehicles', '<i class=\"material-icons\">directions_car</i>', 1, 0),
(19, 'Vechicles', 'confiscated_history', 'confiscated History', '<i class=\"material-icons\">view_list</i>', 1, 4),
(20, 'Vechicles', 'mra_dispatched', 'Dispacted vehicle', '', 1, 8),
(21, 'Vechicles', 'mra_recieved', 'MRA Reports', '', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'default'),
(2, 'Inspector'),
(3, 'warehouse'),
(4, 'Eto'),
(7, 'DG'),
(10, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accesories`
--

CREATE TABLE `tbl_accesories` (
  `accessoryid` int(11) NOT NULL,
  `accessoryname` varchar(255) NOT NULL,
  `accessoryicon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accesories`
--

INSERT INTO `tbl_accesories` (`accessoryid`, `accessoryname`, `accessoryicon`) VALUES
(1, 'Alloy Rims', '<i class=\"icon alloy_rims\"></i>'),
(2, 'Air Bags', '<i class=\"icon air_bags\"></i>'),
(3, 'Air Conditioning', '<i class=\"icon air_conditioning\"></i>'),
(4, 'AM/FM Radio', '<i class=\"icon am_fm_radio\"></i>'),
(5, 'Dvd/Cd player', '<i class=\"icon cd_player\"></i>'),
(6, 'Cassette Player', '<i class=\"icon cassette_player \"></i>'),
(7, 'Cool Box', '<i class=\"icon coolbox\"></i>'),
(8, 'Climate Control', '<i class=\"icon cruise_control\"></i>'),
(9, 'Front Speaker', '<i class=\"icon front_speakers\"></i>'),
(10, 'Front Camera', '<i class=\"icon front_camera\"></i>'),
(11, 'Heated Seats', '<i class=\"icon heated_seats\"></i>'),
(12, 'Immobilizer key', '<i class=\"icon immobilizer_key\"></i>'),
(13, 'Keyless Entry', '<i class=\"icon keyless_entry\"></i>'),
(14, 'Navigation System', '<i class=\"icon navigation_system\"></i>'),
(15, 'Power Locks', '<i class=\"icon power_locks\"></i>'),
(16, 'Power Mirrors', '<i class=\"icon power_mirrors\"></i>'),
(17, 'Power Windows', '<i class=\"icon power_windows\"></i>'),
(18, 'Power Steering', '<i class=\"icon power_steering\"></i>'),
(19, 'Rear Seat Entertaiment', '<i class=\"icon rear_seat_entertainment\"></i>'),
(20, 'Rear Speaker', '<i class=\"icon rear_speakers\"></i>'),
(21, 'Sun Roof', '<i class=\"icon sun_roof\"></i>'),
(22, 'Steering Switches', '<i class=\"icon steering_switches\"></i>'),
(25, 'Usb & Auxilary Cables', '<i class=\"icon usb_and_auxillary_cable\"></i>'),
(26, 'Cruise Control', '<i class=\"icon cruise_control\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bodybuild`
--

CREATE TABLE `tbl_bodybuild` (
  `bodybuild` int(11) NOT NULL,
  `bodybuildname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bodybuild`
--

INSERT INTO `tbl_bodybuild` (`bodybuild`, `bodybuildname`) VALUES
(1, 'Hatchback'),
(2, 'Sedan'),
(3, 'MUV/SUV'),
(4, 'MPV'),
(5, 'Crossover '),
(6, 'Coupe'),
(7, 'Convertible'),
(8, 'Wagon'),
(9, 'Van'),
(10, 'Jeep');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `colorid` int(11) NOT NULL,
  `colorname` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`colorid`, `colorname`) VALUES
(1, 'White'),
(2, 'Silver'),
(3, 'Black'),
(4, 'Grey'),
(5, 'Blue'),
(6, 'Green'),
(7, 'Red'),
(8, 'Gold'),
(9, 'Marron'),
(10, 'Beige'),
(11, 'Pink  '),
(12, 'Brown'),
(13, 'Burgendy'),
(14, 'Yellow'),
(15, 'Bronze'),
(16, 'Purple'),
(17, 'Turquoise'),
(18, 'Orange'),
(19, 'Indigo'),
(20, 'Magenta'),
(21, 'Navy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dashboard`
--

CREATE TABLE `tbl_dashboard` (
  `dashboard_id` int(11) NOT NULL,
  `dasboard_controller` varchar(255) NOT NULL,
  `dashboard_function` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dashboard`
--

INSERT INTO `tbl_dashboard` (`dashboard_id`, `dasboard_controller`, `dashboard_function`, `role_id`) VALUES
(1, 'Auth', 'Eto_dashboard', 4),
(2, 'Auth', 'Dg_dashboard', 7),
(3, 'Auth', 'warehouse_dashboard', 3),
(4, 'Auth', 'secretary_dashboard', 10),
(5, 'Auth', 'super_admin_dashboard', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `districtid` int(11) NOT NULL,
  `districtname` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`districtid`, `districtname`) VALUES
(1, 'CHITRAL'),
(2, 'UPPER DIR'),
(3, 'LOWER DIR'),
(4, 'SWAT'),
(5, 'SHANGLA'),
(7, 'MALAKAND'),
(8, 'KOHISTAN'),
(9, 'MANSEHRA'),
(10, 'TORGHAR'),
(11, 'BATAGRAM'),
(12, 'ABBOTTABAD'),
(13, 'HARIPUR'),
(14, 'MARDAN'),
(15, 'SWABI'),
(16, 'CHARSADDA'),
(17, 'PESHAWAR'),
(18, 'NOWSHERA'),
(19, 'KOHAT'),
(20, 'HANGU'),
(21, 'KARAK'),
(22, 'BANNU'),
(23, 'LAKKI MARWAT'),
(24, 'DERA ISMAIL KHAN'),
(25, 'TANK'),
(26, 'BUNER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_engine_capacity`
--

CREATE TABLE `tbl_engine_capacity` (
  `enginetypeid` int(11) NOT NULL,
  `enginecapacity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_engine_capacity`
--

INSERT INTO `tbl_engine_capacity` (`enginetypeid`, `enginecapacity`) VALUES
(1, 1300),
(2, 1000),
(3, 660),
(4, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eto_approved_date`
--

CREATE TABLE `tbl_eto_approved_date` (
  `approvedid` int(11) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `approved_date` varchar(255) NOT NULL,
  `approved_time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_eto_approved_date`
--

INSERT INTO `tbl_eto_approved_date` (`approvedid`, `vechicle_id`, `approved_date`, `approved_time`) VALUES
(2, 1, '29-Aug-2018', '02:10:PM'),
(3, 2, '29-Aug-2018', '03:19:PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fsl_report`
--

CREATE TABLE `tbl_fsl_report` (
  `fslreportid` int(11) NOT NULL,
  `fslcheckin` int(11) NOT NULL DEFAULT '0',
  `fslcheckout` int(11) NOT NULL DEFAULT '0',
  `upload` varchar(250) NOT NULL,
  `letterno` int(11) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `seized_category` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sytemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mra_report`
--

CREATE TABLE `tbl_mra_report` (
  `mraid` int(11) NOT NULL,
  `letterno` int(11) NOT NULL,
  `mradate` varchar(255) NOT NULL,
  `mratime` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `mracheckin` int(11) NOT NULL,
  `mracheckout` int(11) NOT NULL,
  `createdat` datetime DEFAULT CURRENT_TIMESTAMP,
  `vehicle_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mra_report`
--

INSERT INTO `tbl_mra_report` (`mraid`, `letterno`, `mradate`, `mratime`, `Description`, `upload`, `mracheckin`, `mracheckout`, `createdat`, `vehicle_id`) VALUES
(1, 123, '30/08/2018', '10:51 am', 'this is a demo ', '466543198.jpg', 1, 0, '2018-08-30 01:55:19', 3),
(2, 123, '11/11/2011', '11:11 am', 'asfadsfasd', '1641510367.jpg', 0, 1, '2018-08-30 03:50:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent_menu`
--

CREATE TABLE `tbl_parent_menu` (
  `menuid` int(11) NOT NULL,
  `menuname` varchar(255) NOT NULL,
  `menuicon` varchar(255) NOT NULL,
  `role_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parent_menu`
--

INSERT INTO `tbl_parent_menu` (`menuid`, `menuname`, `menuicon`, `role_id`) VALUES
(1, 'FSL Report', '<i class=\"material-icons\">perm_media</i>', '3'),
(2, 'Allotments', '<i class=\"material-icons\">perm_media</i>', '3,7,1'),
(4, 'History', '<i class=\"material-icons\">perm_media</i>', '4'),
(5, 'History', '<i class=\"material-icons\">perm_media</i>', '3'),
(8, 'MRA', '<i class=\"material-icons\">directions_car</i>', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_released_vehicle`
--

CREATE TABLE `tbl_released_vehicle` (
  `vehicleid` int(11) NOT NULL,
  `letterno` int(11) NOT NULL,
  `releasedate` varchar(255) NOT NULL,
  `releasetime` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `createdby` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receivername` varchar(255) NOT NULL,
  `receivercnic` varchar(255) NOT NULL,
  `receivermobileno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_released_vehicle`
--

INSERT INTO `tbl_released_vehicle` (`vehicleid`, `letterno`, `releasedate`, `releasetime`, `upload`, `description`, `vehicle_id`, `createdby`, `receivername`, `receivercnic`, `receivermobileno`) VALUES
(1, 123, '11:11 am', '11/11/2011', '2084671016.jpg', 'sflkajdfka', 3, '2018-08-30 06:00:36', 'Naqib', '1234124124', '03460661921');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sendbacktowarehouse`
--

CREATE TABLE `tbl_sendbacktowarehouse` (
  `sendbacketoid` int(11) NOT NULL,
  `confiscationorderno` int(11) NOT NULL,
  `confiscationorderdate` varchar(255) NOT NULL,
  `confiscationordetime` varchar(255) NOT NULL,
  `confiscationdescription` varchar(255) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sendbacktowarehouse`
--

INSERT INTO `tbl_sendbacktowarehouse` (`sendbacketoid`, `confiscationorderno`, `confiscationorderdate`, `confiscationordetime`, `confiscationdescription`, `vechicle_id`, `upload`, `systemdate`) VALUES
(1, 12213, '11/11/2011', '11:11', 'dasd', 2, '1473617872.jpg', '2018-08-16 07:15:49'),
(2, 12213, '11/11/2011', '11:11', 'dasd', 1, '1371723074.jpg', '2018-08-16 07:15:50'),
(3, 123, '12/03/2012', '12:31', 'dsaf', 2, '274428797.jpg', '2018-08-28 00:42:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sendtoeto`
--

CREATE TABLE `tbl_sendtoeto` (
  `sendtoetoid` int(11) NOT NULL,
  `sendtoetodate` varchar(255) NOT NULL,
  `sendtoetotime` varchar(255) NOT NULL,
  `sendtoetodescription` varchar(255) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vechicle_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `usercnic` bigint(13) NOT NULL,
  `usermobile` int(11) NOT NULL,
  `createdby_id` int(11) NOT NULL,
  `createddate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifydate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modifyby_id` int(11) NOT NULL,
  `isactive` tinyint(4) NOT NULL,
  `api_token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `password`, `role_id`, `usercnic`, `usermobile`, `createdby_id`, `createddate`, `modifydate`, `modifyby_id`, `isactive`, `api_token`) VALUES
(5, 'imdad', '827ccb0eea8a706c4c34a16891f84e7b', 0, 123455, 124, 0, '2018-08-01 07:43:11', '2018-08-30 01:04:38', 0, 1, ''),
(19, 'shahzeb', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1730186547029, 123456, 0, '2018-08-15 00:45:17', '2018-08-29 08:01:31', 0, 1, ''),
(21, 'anmol', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1730141845498, 123455, 0, '2018-08-15 00:53:14', '2018-08-29 08:01:42', 0, 1, ''),
(22, 'nazim', '827ccb0eea8a706c4c34a16891f84e7b', 0, 12345, 124, 0, '2018-08-15 00:57:04', '2018-08-30 01:04:38', 0, 0, ''),
(24, 'sheraz', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1350377902365, 123455, 0, '2018-08-16 05:38:48', '2018-08-30 01:04:38', 0, 1, ''),
(26, 'ETO', '827ccb0eea8a706c4c34a16891f84e7b', 0, 123455, 123455, 0, '2018-08-16 06:02:15', '2018-08-30 01:04:38', 0, 0, ''),
(27, 'safdar kamal', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1110114457327, 123455, 0, '2018-08-16 06:10:14', '2018-08-30 01:04:38', 0, 1, ''),
(28, 'DG', '827ccb0eea8a706c4c34a16891f84e7b', 0, 12345, 12345, 0, '2018-08-29 00:47:59', '2018-08-30 01:04:38', 0, 0, ''),
(29, 'secretary', '827ccb0eea8a706c4c34a16891f84e7b', 0, 123455, 123455, 0, '2018-08-29 00:48:25', '2018-08-30 01:04:38', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_district`
--

CREATE TABLE `tbl_user_district` (
  `udid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_district`
--

INSERT INTO `tbl_user_district` (`udid`, `user_id`, `district_id`, `entrydate`) VALUES
(1, 19, 2, '2018-08-15 00:45:17'),
(2, 20, 2, '2018-08-15 00:47:57'),
(3, 21, 3, '2018-08-15 00:53:14'),
(4, 22, 2, '2018-08-15 00:57:04'),
(5, 23, 2, '2018-08-15 12:51:08'),
(6, 24, 12, '2018-08-16 05:38:48'),
(8, 26, 12, '2018-08-16 06:02:15'),
(9, 27, 5, '2018-08-16 06:10:14'),
(10, 28, 0, '2018-08-29 00:47:59'),
(11, 29, 0, '2018-08-29 00:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile`
--

CREATE TABLE `tbl_vechile` (
  `vechileid` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `vehicleseize_category` int(11) DEFAULT NULL,
  `vechicle_make` int(11) NOT NULL,
  `vehicleengine_capcaity` int(11) NOT NULL,
  `vehicletype` varchar(255) NOT NULL,
  `vehicle_model` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upated_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `vechiclemake_sub` int(11) NOT NULL,
  `chasisno` varchar(255) NOT NULL,
  `engineno` varchar(255) NOT NULL,
  `vechileregistrationno` varchar(255) NOT NULL DEFAULT 'N/A',
  `drivercnicno` bigint(20) DEFAULT NULL,
  `drivermobileno` bigint(20) NOT NULL,
  `driveraddress` varchar(250) NOT NULL DEFAULT 'N/A',
  `vechileownername` varchar(250) DEFAULT 'N/A',
  `vechileownercnic` bigint(20) DEFAULT NULL,
  `vechileownermobileno` bigint(20) DEFAULT NULL,
  `mobilesquadno` bigint(20) NOT NULL,
  `seizedlocationlat` varchar(250) NOT NULL,
  `seizedlocationlong` varchar(250) NOT NULL,
  `mileage` varchar(250) NOT NULL,
  `vechicledescription` varchar(250) DEFAULT 'N/A',
  `transmission` varchar(250) NOT NULL,
  `enginetype` varchar(255) NOT NULL,
  `assembely` enum('imported','Local') NOT NULL,
  `build_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `formserialno` bigint(20) DEFAULT NULL,
  `drivername` varchar(250) DEFAULT NULL,
  `datesiezeddate` varchar(250) NOT NULL,
  `siezedtime` varchar(250) NOT NULL,
  `vechilewheels` int(11) NOT NULL,
  `seizedat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vechiclemodelyear` varchar(255) NOT NULL,
  `vechiclestatus` int(11) NOT NULL DEFAULT '0' COMMENT 'proceedstatus=1| fsldispatchedstatus=2 | checkin =3 | fslreceivedstatus =4 | sendtoetostatus = 5 | sendbackbyeto = 6 | alloated = 7 | received = 8 | acknowledge=9 | returntoowner =10 mrasent=11 mrareceived=12'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile`
--

INSERT INTO `tbl_vechile` (`vechileid`, `district_id`, `vehicleseize_category`, `vechicle_make`, `vehicleengine_capcaity`, `vehicletype`, `vehicle_model`, `user_id`, `upated_on`, `vechiclemake_sub`, `chasisno`, `engineno`, `vechileregistrationno`, `drivercnicno`, `drivermobileno`, `driveraddress`, `vechileownername`, `vechileownercnic`, `vechileownermobileno`, `mobilesquadno`, `seizedlocationlat`, `seizedlocationlong`, `mileage`, `vechicledescription`, `transmission`, `enginetype`, `assembely`, `build_id`, `color_id`, `formserialno`, `drivername`, `datesiezeddate`, `siezedtime`, `vechilewheels`, `seizedat`, `vechiclemodelyear`, `vechiclestatus`) VALUES
(1, 2, 2, 4, 233, 'commercial', 206, 19, '2018-08-30 00:22:47', 0, 'as1245', 'fg2556', 'N/A', 1730186547029, 3025557173, '', 'N/A', 0, 0, 2345, '33.9981746', '71.4684789', '2222', '', 'Automatic', 'diesel', 'Local', 6, 6, 1234, 'khan', '29-Aug-2018', '12:43 PM', 4, '2018-08-29 03:46:07', '3', 0),
(2, 2, 1, 1, 2252, 'private', 3, 19, '2018-08-30 00:39:58', 0, '652535', '2355', 'N/A', 4253525328348, 52534283285, '', 'N/A', 0, 0, 22525, '33.9981194', '71.4684668', '225', 'ghgh', 'Mannual', 'CNG', 'imported', 5, 6, 2255, 'fhvh', '29-Aug-2018', '3:09 PM', 2, '2018-08-29 06:12:41', '1', 1),
(3, 2, 1, 1, 555, 'private', 1, 19, '2018-08-30 06:00:36', 0, 'fyg', 'fhc', 'N/A', 4253525458525, 52522255555, '', 'N/A', 0, 0, 5588, '33.9978349', '71.4683648', '23555', '', 'Mannual', 'petrol', 'imported', 1, 2, 5355, 'fyfg', '29-Aug-2018', '5:09 PM', 2, '2018-08-29 08:13:00', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_accessories`
--

CREATE TABLE `tbl_vechile_accessories` (
  `vechicleaccessoryid` int(11) NOT NULL,
  `accessories_id` int(11) NOT NULL,
  `vechicle_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile_accessories`
--

INSERT INTO `tbl_vechile_accessories` (`vechicleaccessoryid`, `accessories_id`, `vechicle_id`) VALUES
(1, 3, 1),
(2, 5, 1),
(3, 22, 1),
(4, 1, 1),
(5, 25, 1),
(6, 21, 1),
(7, 2, 1),
(8, 4, 1),
(9, 26, 1),
(10, 1, 2),
(11, 1, 3),
(12, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_allotment`
--

CREATE TABLE `tbl_vechile_allotment` (
  `allotmentid` int(11) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `authorisedby` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_formb`
--

CREATE TABLE `tbl_vechile_formb` (
  `formbid` int(11) NOT NULL,
  `description` varchar(255) DEFAULT 'N/A',
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vechicle_id` int(11) DEFAULT NULL,
  `form_bno` int(11) DEFAULT NULL,
  `systemdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_images`
--

CREATE TABLE `tbl_vechile_images` (
  `imageid` int(11) NOT NULL,
  `imagepath` varchar(250) NOT NULL,
  `vechile_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile_images`
--

INSERT INTO `tbl_vechile_images` (`imageid`, `imagepath`, `vechile_id`) VALUES
(1, '20180829_124419_579432126.jpg', 1),
(2, '20180829_124423_-1545110977.jpg', 1),
(3, '20180829_124430_-229627523.jpg', 1),
(4, '20180829_124434_1106606646.jpg', 1),
(5, '20180829_124441_-306785541.jpg', 1),
(6, '20180829_124445_-460492517.jpg', 1),
(7, '20180829_124449_1911321614.jpg', 1),
(8, '20180829_151031_471069667.jpg', 2),
(9, '20180829_151040_389329991.jpg', 2),
(10, '20180829_151051_-749930356.jpg', 2),
(11, '20180829_151104_1842193247.jpg', 2),
(12, '20180829_151110_-1800346822.jpg', 2),
(13, '20180829_151121_286553784.jpg', 2),
(14, '20180829_151126_807868002.jpg', 2),
(15, '20180829_151132_436642760.jpg', 2),
(16, '20180829_171034_-2010282278.jpg', 3),
(17, '20180829_171112_-610760179.jpg', 3),
(18, '20180829_171143_1883464134.jpg', 3),
(19, '20180829_171150_2038839183.jpg', 3),
(20, '20180829_171157_734906013.jpg', 3),
(21, '20180829_171203_-843726912.jpg', 3),
(22, '20180829_171209_-1496957505.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_make`
--

CREATE TABLE `tbl_vechile_make` (
  `makeid` int(11) NOT NULL,
  `makename` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile_make`
--

INSERT INTO `tbl_vechile_make` (`makeid`, `makename`) VALUES
(1, 'Toyota'),
(2, 'Suzuki'),
(3, 'Honda'),
(4, 'Daihatsu'),
(5, 'Nissan'),
(6, 'Adam'),
(7, 'Alfa Romeo'),
(8, 'Audi'),
(9, 'Austin'),
(10, 'Bentley'),
(11, 'BMW'),
(12, 'Buick'),
(13, 'Cadillac'),
(14, 'Changan'),
(15, 'Chery'),
(16, 'Chevrolet'),
(17, 'Chrysler'),
(18, 'Citroen'),
(19, 'Classic Cars'),
(20, 'Daehan'),
(21, 'Daewoo'),
(22, 'Daimler'),
(23, 'Datsun'),
(24, 'DFSK'),
(25, 'Dodge'),
(26, 'Dongfeng'),
(27, 'FAW'),
(28, 'Ferrari'),
(29, 'Fiat'),
(30, 'Ford'),
(31, 'Geely'),
(32, 'GMC'),
(33, 'Golden Dragon'),
(34, 'Golf'),
(35, 'Hillman'),
(36, 'Hino'),
(37, 'Hummer'),
(38, 'Hyundai'),
(39, 'Isuzu'),
(40, 'JAC'),
(41, 'Jaguar'),
(42, 'Jeep'),
(43, 'JW Forland'),
(44, 'Kaiser Jeep'),
(45, 'KIA'),
(46, 'Lada'),
(47, 'Lamborghini'),
(48, 'Land Rover'),
(49, 'Lexus'),
(50, 'Lincoln'),
(51, 'Maserati'),
(52, 'Master'),
(53, 'Mazda'),
(54, 'Mercedes Benz'),
(55, 'MG'),
(56, 'MINI'),
(57, 'Mitsubishi'),
(58, 'Morris'),
(59, 'Moto Guzzi'),
(60, 'Oldsmobile'),
(61, 'Opel'),
(62, 'Others'),
(63, 'Peugeot'),
(64, 'Plymouth'),
(65, 'Pontiac'),
(66, 'Porsche'),
(67, 'Proton'),
(68, 'Range Rover'),
(69, 'Renault'),
(70, 'Rolls Royce'),
(71, 'Roma'),
(72, 'Rover'),
(73, 'Royal Enfield'),
(74, 'Saab'),
(75, 'Scion'),
(76, 'Skoda'),
(77, 'Smart'),
(78, 'Sogo'),
(79, 'Sokon'),
(80, 'SsangYong'),
(81, 'Subaru'),
(82, 'Tesla'),
(83, 'Triumph'),
(84, 'United'),
(85, 'Vauxhall'),
(86, 'Volkswagen'),
(87, 'Volvo'),
(88, 'Willys');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_make_sub`
--

CREATE TABLE `tbl_vechile_make_sub` (
  `submakeid` int(11) NOT NULL,
  `make_parent_id` int(11) NOT NULL,
  `submakename` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile_make_sub`
--

INSERT INTO `tbl_vechile_make_sub` (`submakeid`, `make_parent_id`, `submakename`) VALUES
(1, 1, 'Corolla'),
(2, 1, 'Vitz'),
(3, 1, 'Passo'),
(4, 1, 'Aqua'),
(5, 1, 'Prius'),
(6, 1, 'Allion'),
(7, 1, 'Alphard'),
(8, 1, 'Alphard G'),
(9, 1, 'Alphard Hybrid'),
(10, 1, 'Alphard V'),
(11, 1, 'Altezza'),
(12, 1, 'Aristo'),
(13, 1, 'Auris'),
(14, 1, 'Avalon'),
(15, 1, 'Avanza'),
(16, 1, 'Avensis'),
(17, 1, 'Aygo'),
(18, 1, 'B B'),
(19, 1, 'Belta'),
(20, 1, 'Biyana'),
(21, 1, 'C-HR'),
(22, 1, 'Caldina'),
(23, 1, 'Cami'),
(24, 1, 'Camry'),
(25, 1, 'Carina'),
(26, 1, 'Celica'),
(27, 1, 'Chaser'),
(28, 1, 'Coaster'),
(29, 1, 'Corolla Assista'),
(30, 1, 'Corolla Axio'),
(31, 1, 'Corolla Fielder'),
(32, 1, 'Corona'),
(33, 1, 'Cressida'),
(34, 1, 'Cresta'),
(35, 1, 'Crown'),
(36, 1, 'Duet'),
(37, 1, 'Echo'),
(38, 1, 'Ecotec'),
(39, 1, 'Esquire'),
(40, 1, 'Estima'),
(41, 1, 'Fj Cruiser'),
(42, 1, 'Fortuner'),
(43, 1, 'Gaia'),
(44, 1, 'Harrier'),
(45, 1, 'Hiace'),
(46, 1, 'Hilux'),
(47, 1, 'iQ'),
(48, 1, 'ISIS'),
(49, 1, 'IST'),
(50, 1, 'Kluger'),
(51, 1, 'Land Cruiser'),
(52, 1, 'Lite Ace'),
(53, 1, 'Lucida'),
(54, 1, 'Mark II'),
(55, 1, 'Mark X'),
(56, 1, 'Matrix'),
(57, 1, 'MR'),
(58, 1, 'Noah'),
(59, 1, 'Other'),
(60, 1, 'Pickup'),
(61, 1, 'Pixis Epoch'),
(62, 1, 'Platz'),
(63, 1, 'Porte'),
(64, 1, 'Prado'),
(65, 1, 'Premio'),
(66, 1, 'Previa'),
(67, 1, 'Prius Alpha'),
(68, 1, 'Probox'),
(69, 1, 'Ractis'),
(70, 1, 'Raum'),
(71, 1, 'Rav'),
(72, 1, 'Roomy'),
(73, 1, 'Runx'),
(74, 1, 'Rush'),
(75, 1, 'Sai'),
(76, 1, 'Sera'),
(77, 1, 'Sienta'),
(78, 1, 'Soarer'),
(79, 1, 'Spacio'),
(80, 1, 'Spade'),
(81, 1, 'Sprinter'),
(82, 1, 'Starlet'),
(83, 1, 'Succeed'),
(84, 1, 'Supra'),
(85, 1, 'Surf'),
(86, 1, 'Tacoma'),
(87, 1, 'Tank'),
(88, 1, 'Tercel'),
(89, 1, 'Town Ace'),
(90, 1, 'Toyo Ace'),
(91, 1, 'Tundra'),
(92, 1, 'Urban Cruiser'),
(93, 1, 'Van'),
(94, 1, 'Vanguard'),
(95, 1, 'Verossa'),
(96, 1, 'Vios'),
(97, 1, 'Voxy'),
(98, 1, 'Will'),
(99, 1, 'Wish'),
(100, 1, 'Yaris'),
(101, 2, 'Mehran'),
(102, 2, 'Cultus'),
(103, 2, 'Alto'),
(104, 2, 'Wagon R'),
(105, 2, 'Every'),
(106, 2, 'Aerio'),
(107, 2, 'Alto Lapin'),
(108, 2, 'APV'),
(109, 2, 'Baleno'),
(110, 2, 'Bolan'),
(111, 2, 'Cappuccino'),
(112, 2, 'Carry'),
(113, 2, 'Cervo'),
(114, 2, 'Ciaz'),
(115, 2, 'Escudo'),
(116, 2, 'Every Wagon'),
(117, 2, 'FX'),
(118, 2, 'Gn'),
(119, 2, 'Hustler'),
(120, 2, 'Ignis'),
(121, 2, 'Jimny'),
(122, 2, 'Jimny Sierra'),
(123, 2, 'Kei'),
(124, 2, 'Khyber'),
(125, 2, 'Kizashi'),
(126, 2, 'Landy'),
(127, 2, 'Liana'),
(128, 2, 'Lj'),
(129, 2, 'Margalla'),
(130, 2, 'Mega Carry Xtra'),
(131, 2, 'MR Wagon'),
(132, 2, 'Other'),
(133, 2, 'Palette'),
(134, 2, 'Palette Sw'),
(135, 2, 'Potohar'),
(136, 2, 'Ravi'),
(137, 2, 'Samuari'),
(138, 2, 'Sj'),
(139, 2, 'Solio'),
(140, 2, 'Solio Bandit'),
(141, 2, 'Spacia'),
(142, 2, 'Splash'),
(143, 2, 'Swift'),
(144, 2, 'Sx'),
(145, 2, 'Twin'),
(146, 2, 'Vitara'),
(147, 3, 'Civic'),
(148, 3, 'City'),
(149, 3, 'Vezel'),
(150, 3, 'N Wgn'),
(151, 3, 'Accord'),
(152, 3, 'Accord Tourer'),
(153, 3, 'Acty'),
(154, 3, 'Acura'),
(155, 3, 'Airwave'),
(156, 3, 'Beat'),
(157, 3, 'BR-V'),
(158, 3, 'Civic Hybrid'),
(159, 3, 'Concerto'),
(160, 3, 'Cr X'),
(161, 3, 'CR-V'),
(162, 3, 'CR-Z Sports Hybrid'),
(163, 3, 'Cross Road'),
(164, 3, 'Element'),
(165, 3, 'Ferio'),
(166, 3, 'Ferio'),
(167, 3, 'Fit'),
(168, 3, 'Fit Aria'),
(169, 3, 'Freed'),
(170, 3, 'Grace Hybrid'),
(171, 3, 'HR-V'),
(172, 3, 'Insight'),
(173, 3, 'Insight Exclusive'),
(174, 3, 'Inspire'),
(175, 3, 'Integra'),
(176, 3, 'Jade'),
(177, 3, 'Jazz'),
(178, 3, 'Life'),
(179, 3, 'Mobilio'),
(180, 3, 'N Box'),
(181, 3, 'N Box Custom'),
(182, 3, 'N Box Plus'),
(183, 3, 'N Box Plus Custom'),
(184, 3, 'N Box Slash'),
(185, 3, 'N One'),
(186, 3, 'Odyssey'),
(187, 3, 'Other'),
(188, 3, 'Partner'),
(189, 3, 'Passport'),
(190, 3, 'Prelude'),
(191, 3, 'S'),
(192, 3, 'S'),
(193, 3, 'Spike'),
(194, 3, 'Stepwagon'),
(195, 3, 'Stepwagon Spada'),
(196, 3, 'Stream'),
(197, 3, 'Thats'),
(198, 3, 'Today'),
(199, 3, 'Vamos'),
(200, 3, 'Vamos Hobio'),
(201, 3, 'Zest'),
(202, 3, 'Zest Spark'),
(203, 4, 'Mira'),
(204, 4, 'Cuore'),
(205, 4, 'Move'),
(206, 4, 'Hijet'),
(207, 4, 'Charade'),
(208, 4, 'Atrai Wagon'),
(209, 4, 'Bego'),
(210, 4, 'Boon'),
(211, 4, 'Cast'),
(212, 4, 'Charmant'),
(213, 4, 'Coo'),
(214, 4, 'Copen'),
(215, 4, 'Esse'),
(216, 4, 'Feroza'),
(217, 4, 'Gran Max'),
(218, 4, 'Mira Cocoa'),
(219, 4, 'Mira Gino'),
(220, 4, 'Move Conte'),
(221, 4, 'Move Latte'),
(222, 4, 'Naked'),
(223, 4, 'Opti'),
(224, 4, 'Other'),
(225, 4, 'Rocky'),
(226, 4, 'Sirion'),
(227, 4, 'Sonica'),
(228, 4, 'Storia'),
(229, 4, 'Tanto'),
(230, 4, 'Terios'),
(231, 4, 'Terios Kid'),
(232, 4, 'Wake'),
(233, 4, 'Xenia'),
(234, 5, 'Dayz'),
(235, 5, 'Dayz Highway Star'),
(236, 5, 'Clipper'),
(237, 5, 'Sunny'),
(238, 5, 'Juke'),
(239, 5, 'AD Van'),
(240, 5, 'Almera'),
(241, 5, 'Blue Bird'),
(242, 5, 'Bluebird Sylphy'),
(243, 5, 'Caravan'),
(244, 5, 'Cedric'),
(245, 5, 'Cefiro'),
(246, 5, 'Cima'),
(247, 5, 'Cube'),
(248, 5, 'Dualis'),
(249, 5, 'Elgrand'),
(250, 5, 'Figaro'),
(251, 5, 'Fuga'),
(252, 5, 'Gloria'),
(253, 5, 'GT-R'),
(254, 5, 'Infinity'),
(255, 5, 'Kix'),
(256, 5, 'Lafesta'),
(257, 5, 'Latio'),
(258, 5, 'Leaf'),
(259, 5, 'Liberty'),
(260, 5, 'March'),
(261, 5, 'Maxima'),
(262, 5, 'Micra'),
(263, 5, 'Moco'),
(264, 5, 'Murrano'),
(265, 5, 'Navara'),
(266, 5, 'Note'),
(267, 5, 'Nv Vanette Wagon'),
(268, 5, 'Nv Caravan Wagon'),
(269, 5, 'Other'),
(270, 5, 'Otti'),
(271, 5, 'Path Finder'),
(272, 5, 'Patrol'),
(273, 5, 'Pickup'),
(274, 5, 'Pino'),
(275, 5, 'Pixo'),
(276, 5, 'President'),
(277, 5, 'Primera'),
(278, 5, 'Pulsar'),
(279, 5, 'Qashqai'),
(280, 5, 'Qashqai +'),
(281, 5, 'Roox'),
(282, 5, 'Safari'),
(283, 5, 'Serena'),
(284, 5, 'Skyline'),
(285, 5, 'Skyline Crossover'),
(286, 5, 'Stagea'),
(287, 5, 'Sylphy'),
(288, 5, 'Terrano'),
(289, 5, 'Tiida'),
(290, 5, 'Titan'),
(291, 5, 'Vanette'),
(292, 5, 'Wingroad'),
(293, 5, 'X Trail'),
(294, 5, 'Z Series');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_model`
--

CREATE TABLE `tbl_vechile_model` (
  `modelid` int(11) NOT NULL,
  `modelyear` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile_model`
--

INSERT INTO `tbl_vechile_model` (`modelid`, `modelyear`) VALUES
(1, 1999),
(2, 2000),
(3, 2005),
(4, 2006);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vechile_seized`
--

CREATE TABLE `tbl_vechile_seized` (
  `siezedid` int(11) NOT NULL,
  `seizedtype` varchar(250) NOT NULL COMMENT 'this is seized category table'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vechile_seized`
--

INSERT INTO `tbl_vechile_seized` (`siezedid`, `seizedtype`) VALUES
(1, 'suspicious Chasis No'),
(2, 'suspicious Registration No'),
(3, 'suspicious Documents'),
(4, 'suspicious Cavaties'),
(5, 'Narcotics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warehouse_images`
--

CREATE TABLE `tbl_warehouse_images` (
  `imageid` int(11) NOT NULL,
  `vechicle_id` int(11) NOT NULL,
  `imagepath` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wheels`
--

CREATE TABLE `tbl_wheels` (
  `wheelid` int(11) NOT NULL,
  `wheelnumber` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wheels`
--

INSERT INTO `tbl_wheels` (`wheelid`, `wheelnumber`) VALUES
(1, 2),
(2, 4),
(3, 3),
(4, 8),
(5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 5, 1),
(2, 19, 2),
(4, 21, 3),
(5, 22, 4),
(6, 23, 2),
(7, 24, 2),
(9, 26, 4),
(10, 27, 3),
(11, 28, 7),
(12, 29, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aco_id` (`aco_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_accesories`
--
ALTER TABLE `tbl_accesories`
  ADD PRIMARY KEY (`accessoryid`);

--
-- Indexes for table `tbl_bodybuild`
--
ALTER TABLE `tbl_bodybuild`
  ADD PRIMARY KEY (`bodybuild`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`colorid`);

--
-- Indexes for table `tbl_dashboard`
--
ALTER TABLE `tbl_dashboard`
  ADD PRIMARY KEY (`dashboard_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`districtid`);

--
-- Indexes for table `tbl_engine_capacity`
--
ALTER TABLE `tbl_engine_capacity`
  ADD PRIMARY KEY (`enginetypeid`);

--
-- Indexes for table `tbl_eto_approved_date`
--
ALTER TABLE `tbl_eto_approved_date`
  ADD PRIMARY KEY (`approvedid`);

--
-- Indexes for table `tbl_fsl_report`
--
ALTER TABLE `tbl_fsl_report`
  ADD PRIMARY KEY (`fslreportid`);

--
-- Indexes for table `tbl_mra_report`
--
ALTER TABLE `tbl_mra_report`
  ADD PRIMARY KEY (`mraid`);

--
-- Indexes for table `tbl_parent_menu`
--
ALTER TABLE `tbl_parent_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `tbl_released_vehicle`
--
ALTER TABLE `tbl_released_vehicle`
  ADD PRIMARY KEY (`vehicleid`);

--
-- Indexes for table `tbl_sendbacktowarehouse`
--
ALTER TABLE `tbl_sendbacktowarehouse`
  ADD PRIMARY KEY (`sendbacketoid`);

--
-- Indexes for table `tbl_sendtoeto`
--
ALTER TABLE `tbl_sendtoeto`
  ADD PRIMARY KEY (`sendtoetoid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
  ADD PRIMARY KEY (`udid`);

--
-- Indexes for table `tbl_vechile`
--
ALTER TABLE `tbl_vechile`
  ADD PRIMARY KEY (`vechileid`);

--
-- Indexes for table `tbl_vechile_accessories`
--
ALTER TABLE `tbl_vechile_accessories`
  ADD PRIMARY KEY (`vechicleaccessoryid`);

--
-- Indexes for table `tbl_vechile_allotment`
--
ALTER TABLE `tbl_vechile_allotment`
  ADD PRIMARY KEY (`allotmentid`);

--
-- Indexes for table `tbl_vechile_formb`
--
ALTER TABLE `tbl_vechile_formb`
  ADD PRIMARY KEY (`formbid`);

--
-- Indexes for table `tbl_vechile_images`
--
ALTER TABLE `tbl_vechile_images`
  ADD PRIMARY KEY (`imageid`);

--
-- Indexes for table `tbl_vechile_make`
--
ALTER TABLE `tbl_vechile_make`
  ADD PRIMARY KEY (`makeid`);

--
-- Indexes for table `tbl_vechile_make_sub`
--
ALTER TABLE `tbl_vechile_make_sub`
  ADD PRIMARY KEY (`submakeid`);

--
-- Indexes for table `tbl_vechile_model`
--
ALTER TABLE `tbl_vechile_model`
  ADD PRIMARY KEY (`modelid`);

--
-- Indexes for table `tbl_vechile_seized`
--
ALTER TABLE `tbl_vechile_seized`
  ADD PRIMARY KEY (`siezedid`);

--
-- Indexes for table `tbl_warehouse_images`
--
ALTER TABLE `tbl_warehouse_images`
  ADD PRIMARY KEY (`imageid`);

--
-- Indexes for table `tbl_wheels`
--
ALTER TABLE `tbl_wheels`
  ADD PRIMARY KEY (`wheelid`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acl`
--
ALTER TABLE `acl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_accesories`
--
ALTER TABLE `tbl_accesories`
  MODIFY `accessoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_bodybuild`
--
ALTER TABLE `tbl_bodybuild`
  MODIFY `bodybuild` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `colorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_dashboard`
--
ALTER TABLE `tbl_dashboard`
  MODIFY `dashboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `districtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_engine_capacity`
--
ALTER TABLE `tbl_engine_capacity`
  MODIFY `enginetypeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_eto_approved_date`
--
ALTER TABLE `tbl_eto_approved_date`
  MODIFY `approvedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fsl_report`
--
ALTER TABLE `tbl_fsl_report`
  MODIFY `fslreportid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mra_report`
--
ALTER TABLE `tbl_mra_report`
  MODIFY `mraid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_parent_menu`
--
ALTER TABLE `tbl_parent_menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_released_vehicle`
--
ALTER TABLE `tbl_released_vehicle`
  MODIFY `vehicleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sendbacktowarehouse`
--
ALTER TABLE `tbl_sendbacktowarehouse`
  MODIFY `sendbacketoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sendtoeto`
--
ALTER TABLE `tbl_sendtoeto`
  MODIFY `sendtoetoid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user_district`
--
ALTER TABLE `tbl_user_district`
  MODIFY `udid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_vechile`
--
ALTER TABLE `tbl_vechile`
  MODIFY `vechileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vechile_accessories`
--
ALTER TABLE `tbl_vechile_accessories`
  MODIFY `vechicleaccessoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_vechile_allotment`
--
ALTER TABLE `tbl_vechile_allotment`
  MODIFY `allotmentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vechile_formb`
--
ALTER TABLE `tbl_vechile_formb`
  MODIFY `formbid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vechile_images`
--
ALTER TABLE `tbl_vechile_images`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_vechile_make`
--
ALTER TABLE `tbl_vechile_make`
  MODIFY `makeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_vechile_make_sub`
--
ALTER TABLE `tbl_vechile_make_sub`
  MODIFY `submakeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `tbl_vechile_model`
--
ALTER TABLE `tbl_vechile_model`
  MODIFY `modelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_vechile_seized`
--
ALTER TABLE `tbl_vechile_seized`
  MODIFY `siezedid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_warehouse_images`
--
ALTER TABLE `tbl_warehouse_images`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wheels`
--
ALTER TABLE `tbl_wheels`
  MODIFY `wheelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
