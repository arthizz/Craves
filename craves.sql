-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2019 at 10:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craves`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_tbl`
--

CREATE TABLE `account_tbl` (
  `cID` int(11) NOT NULL,
  `cUsername` varchar(255) NOT NULL,
  `cPassword` varchar(255) NOT NULL,
  `cLevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_tbl`
--

INSERT INTO `account_tbl` (`cID`, `cUsername`, `cPassword`, `cLevel`) VALUES
(1, 'johnly123', '321321', 'customer'),
(2, 'johnly', 'dalunos', 'customer'),
(22, 'admin', '123', 'Admin'),
(24, 'kim', '123321', 'customer'),
(25, 'robert', '123321', 'waiter'),
(26, 'mary', '123123', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cID` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cFname` varchar(255) NOT NULL,
  `cLname` varchar(255) NOT NULL,
  `cProduct` varchar(255) NOT NULL,
  `cPrice` varchar(255) NOT NULL,
  `cProduct_img` varchar(255) NOT NULL,
  `cProduct_size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashier_tbl`
--

CREATE TABLE `cashier_tbl` (
  `cID` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cWaiter_name` varchar(255) NOT NULL,
  `cProduct` varchar(255) NOT NULL,
  `cPrice` varchar(255) NOT NULL,
  `cCashier` varchar(255) NOT NULL,
  `cStatus` varchar(255) NOT NULL,
  `cDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier_tbl`
--

INSERT INTO `cashier_tbl` (`cID`, `user_id`, `cWaiter_name`, `cProduct`, `cPrice`, `cCashier`, `cStatus`, `cDate`) VALUES
(19, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 04:08:38 pm'),
(20, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 04:08:38 pm'),
(21, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 04:08:38 pm'),
(22, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 04:08:38 pm'),
(27, '25', 'Robert Javier', 'Craves black burger', '209', '', '2', '06-09-19 04:48:35 pm'),
(28, '25', 'Robert Javier', 'Craves black burger', '209', '', '2', '06-09-19 04:48:35 pm'),
(29, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 04:48:35 pm'),
(30, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 04:48:35 pm'),
(31, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 04:48:35 pm'),
(32, '25', 'Robert Javier', 'Craves Queen Colored Burger', '599', '', '2', '06-09-19 05:36:33 pm'),
(33, '25', 'Robert Javier', 'Craves Queen Colored Burger', '599', '', '2', '06-09-19 05:36:33 pm'),
(34, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 05:36:33 pm'),
(35, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 05:36:33 pm'),
(36, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 06:15:20 pm'),
(37, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 06:15:20 pm'),
(38, '25', 'Robert Javier', 'Fried chicken', '120', '', '2', '06-09-19 06:15:20 pm'),
(39, '25', 'Robert Javier', 'Fried chicken', '120', '', '2', '06-09-19 06:15:20 pm'),
(40, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 06:15:20 pm'),
(41, '25', 'Robert Javier', 'Crave colored Burger', '129', '', '2', '06-09-19 06:15:20 pm'),
(42, '25', 'Robert Javier', 'Craves black burger', '209', '', '2', '06-09-19 06:15:20 pm'),
(43, '25', 'Robert Javier', 'Craves black burger', '209', '', '2', '06-09-19 06:15:20 pm'),
(44, '25', 'Robert Javier', 'Cheesy fries', '89', '', '2', '06-09-19 06:15:20 pm'),
(45, '25', 'Robert Javier', 'Cheesy fries', '89', '', '2', '06-09-19 06:15:20 pm'),
(46, '25', 'Robert Javier', 'Bacon and cheese fries', '109', '', '2', '06-09-19 06:15:20 pm'),
(47, '25', 'Robert Javier', 'Bacon and cheese fries', '109', '', '2', '06-09-19 06:15:20 pm'),
(48, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 06:58:48 pm'),
(49, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 06:58:48 pm'),
(50, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 06:58:48 pm'),
(51, '25', 'Robert Javier', 'Blue Lemonade', '49', '', '2', '06-09-19 06:58:48 pm');

-- --------------------------------------------------------

--
-- Table structure for table `chart_tbl`
--

CREATE TABLE `chart_tbl` (
  `cID` int(11) NOT NULL,
  `cBudget_date` varchar(255) NOT NULL,
  `cExpenses` varchar(255) NOT NULL,
  `cRevenue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_tbl`
--

INSERT INTO `chart_tbl` (`cID`, `cBudget_date`, `cExpenses`, `cRevenue`) VALUES
(1, '2019-06-30', '300', '600'),
(2, '2019-07-31', '400', '700'),
(3, '2019-08-31', '200', '800'),
(4, '2019-09-30', '100', '50'),
(5, '2019-10-31', '100', '900'),
(6, '2019-11-30', '300', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_tbl`
--

CREATE TABLE `checkout_tbl` (
  `cID` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cFname` varchar(255) NOT NULL,
  `cLname` varchar(255) NOT NULL,
  `cProduct` varchar(255) NOT NULL,
  `cPrice` varchar(255) NOT NULL,
  `cImg` varchar(255) NOT NULL,
  `cDate` datetime NOT NULL,
  `cStatus` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_tbl`
--

INSERT INTO `checkout_tbl` (`cID`, `user_id`, `cFname`, `cLname`, `cProduct`, `cPrice`, `cImg`, `cDate`, `cStatus`) VALUES
(10, '2', 'johnly', 'dalunos', 'Blue Lemonade', '49', '60660082_391737978216770_4521242665827696640_n.jpg', '2019-06-09 09:38:02', '1'),
(11, '2', 'johnly', 'dalunos', 'Blue Lemonade', '49', '60660082_391737978216770_4521242665827696640_n.jpg', '2019-06-09 09:38:02', '1'),
(12, '2', 'johnly', 'dalunos', 'Bacon and cheese fries', '109', '60443298_638535589953181_7685915448742772736_n.jpg', '2019-06-09 09:38:02', '1'),
(13, '2', 'johnly', 'dalunos', 'Cheesy fries', '89', '60423142_428299637951445_8543497826502443008_n.jpg', '2019-06-09 09:38:02', '1'),
(17, '24', 'kim', 'abellanes', 'Blue Lemonade', '49', '60660082_391737978216770_4521242665827696640_n.jpg', '2019-06-09 09:38:31', '1'),
(18, '24', 'kim', 'abellanes', 'Crave colored Burger', '129', '51359041_405137103393459_4020364344272355328_n.jpg', '2019-06-09 09:38:31', '1'),
(19, '24', 'kim', 'abellanes', 'Bacon and cheese fries', '109', '60443298_638535589953181_7685915448742772736_n.jpg', '2019-06-09 09:38:31', '1'),
(20, '24', 'kim', 'abellanes', 'Cheesy fries', '89', '60423142_428299637951445_8543497826502443008_n.jpg', '2019-06-09 09:38:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deliver_tbl`
--

CREATE TABLE `deliver_tbl` (
  `deliver_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `who_deliver` varchar(255) NOT NULL,
  `datetime_created` datetime DEFAULT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tbl`
--

CREATE TABLE `gallery_tbl` (
  `cID` int(11) NOT NULL,
  `cImg` varchar(255) NOT NULL,
  `cCaption` varchar(255) NOT NULL,
  `cDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_tbl`
--

INSERT INTO `gallery_tbl` (`cID`, `cImg`, `cCaption`, `cDate`) VALUES
(4, '21231333_1948184218770620_3867619101261069911_n.jpg', '@Craves Avenue', '2019-06-02'),
(5, '21271130_1948184205437288_2205424442526990846_n.jpg', '', '2019-06-02'),
(6, '21271304_1948184158770626_5110800627941382816_n.jpg', '', '2019-06-02'),
(7, '21369652_1948184015437307_5135486411381491464_n.jpg', '', '2019-06-02'),
(8, '21370906_1948184045437304_481181547937402149_n.jpg', '', '2019-06-02'),
(9, '36287196_413574039144112_7837654869488959488_n.jpg', '', '2019-06-02'),
(10, '42521700_2449654348408201_8866665747267452928_n.jpg', '', '2019-06-02'),
(11, '42576111_2449654325074870_9097769240156438528_n.jpg', '', '2019-06-02'),
(12, '42581056_2449697451737224_1747170984953118720_n.jpg', '', '2019-06-02'),
(13, '44089952_496344350867080_8470080415753830400_n.jpg', '', '2019-06-02'),
(14, '44300366_496344217533760_2507535682751168512_n.jpg', '', '2019-06-02'),
(15, '44321820_496344280867087_2049099970316861440_n.jpg', '', '2019-06-02'),
(16, '44359188_496344147533767_5715675433077309440_n.jpg', '', '2019-06-02'),
(17, '44370897_496344244200424_1058975069306355712_n.jpg', '', '2019-06-02'),
(18, '44377822_496344310867084_386999209322086400_n.jpg', '', '2019-06-02'),
(19, '44427372_496344414200407_6788487800384651264_n.jpg', '', '2019-06-02'),
(20, '45708506_506599799841535_1590002381947404288_n.jpg', '', '2019-06-02'),
(21, '45718441_506599679841547_4949678611520028672_n.jpg', '', '2019-06-02'),
(22, '45769032_506599939841521_1884122446752120832_n.jpg', '', '2019-06-02'),
(23, '45783520_506599763174872_734258984629829632_n.jpg', '', '2019-06-02'),
(24, '50103859_546315319203316_6726056263144177664_n.jpg', '', '2019-06-02'),
(25, '50227057_546262829208565_4337849035462279168_n.jpg', '', '2019-06-02'),
(26, '50822399_550805058754342_1740705994020749312_n.jpg', '', '2019-06-02'),
(27, '52898306_574672003034314_2778695075729768448_n.jpg', '', '2019-06-02'),
(30, '53110499_571519450016236_5121526652534259712_n.jpg', '', '2019-06-02'),
(31, '53317879_574672016367646_6586180431127773184_n.jpg', '', '2019-06-02'),
(32, '53362452_571519423349572_4147326953386409984_n.jpg', '', '2019-06-02'),
(33, '53419767_574672153034299_3458477098904059904_n.jpg', '', '2019-06-02'),
(34, '53602121_574671979700983_5091491138779480064_n.jpg', '', '2019-06-02'),
(35, '53609542_574672136367634_1374491179416027136_n.jpg', '', '2019-06-02'),
(36, '54169402_574672173034297_3432347986754011136_n.jpg', '', '2019-06-02'),
(37, '55764323_586613028506878_6110058228052131840_n.jpg', '', '2019-06-02'),
(38, '55782323_586613065173541_7972306290401607680_n.jpg', '', '2019-06-02'),
(39, '55935234_586612968506884_8059414682500333568_n.jpg', '', '2019-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `history_tbl`
--

CREATE TABLE `history_tbl` (
  `cID` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cFname` varchar(255) NOT NULL,
  `cLname` varchar(255) NOT NULL,
  `cProduct` varchar(255) NOT NULL,
  `cPrice` varchar(255) NOT NULL,
  `cImg` varchar(255) NOT NULL,
  `cDate` datetime NOT NULL,
  `cStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `order_quantity` varchar(255) NOT NULL,
  `cashier_name` decimal(10,2) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `datetime_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pcategory_tbl`
--

CREATE TABLE `pcategory_tbl` (
  `cID` int(11) NOT NULL,
  `cCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcategory_tbl`
--

INSERT INTO `pcategory_tbl` (`cID`, `cCategory`) VALUES
(1, 'Sandwiches'),
(2, 'Salad'),
(3, 'Pasta'),
(5, 'Rice Meal'),
(6, 'Appetizer'),
(7, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `cID` int(11) NOT NULL,
  `cProduct_name` varchar(255) NOT NULL,
  `cProduct_price` varchar(255) NOT NULL,
  `cProduct_quantity` varchar(255) NOT NULL,
  `cProduct_category` varchar(255) NOT NULL,
  `cProduct_details` varchar(255) NOT NULL,
  `cProduct_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`cID`, `cProduct_name`, `cProduct_price`, `cProduct_quantity`, `cProduct_category`, `cProduct_details`, `cProduct_img`) VALUES
(2, 'Fried chicken', '120', '1', 'Rice Meal', 'Main ingredients: Chicken, batter Serving temperature: Hot or cold', '61106398_448922219202065_6183281209926221824_n.jpg'),
(3, 'Blue Lemonade', '49', '120', 'Beverages', 'Lemonade can be any one of a variety of sweetened beverages found throughout the world, but which are traditionally all characterized by a lemon flavor.', '60660082_391737978216770_4521242665827696640_n.jpg'),
(4, 'Crave colored Burger', '129', '1', 'Sandwiches', 'Five oddly colored burgers that can snitch your appetite', '51359041_405137103393459_4020364344272355328_n.jpg'),
(5, 'Craves black burger', '209', '1', 'Sandwiches', 'Five oddly colored burgers that can snitch your appetite', '51489573_236541180557038_217330993059594240_n.jpg'),
(6, 'Cheesy fries', '89', '1', 'Appetizer', 'Easy and fast, these Cheddar cheese fries are served with bacon and dipped in ranch dressing', '60423142_428299637951445_8543497826502443008_n.jpg'),
(7, 'Bacon and cheese fries', '109', '1', 'Appetizer', 'These tempting bacon cheese fries are one finger food I can make a meal of. Quick to fix, they\'re a hit at parties and as a snack. Ranch dressing is a tasty alternative to sour cream', '60443298_638535589953181_7685915448742772736_n.jpg'),
(8, 'Pink lemonade', '49', '1', 'Beverages', 'This refreshing recipe for pink lemonade is the perfect drink to serve at any summertime celebration.', '60608112_2379600442062850_5862392512341082112_n.jpg'),
(9, 'Sizzling sisig w/ Rice', '89', '1', 'Rice Meal', 'Sizzling Sisig makes a great party appetizer as well as a hearty dinner entree. The perfect blend of tangy, savory and spicy, it has all the bold, delicious flavors youâ€™ll love', '60919178_382338402365377_2748923264377028608_n.jpg'),
(10, 'Breaded pork chop', '109', '1', 'Rice Meal', 'One way to dress-up pork chops and make them more appealing is to fry them country style. They might look simple; it is because they really are. Aside from being simple, here are some of the reasons why you should try country fried breaded pork chop', '61126873_397586257637126_2552999303148732416_n.jpg'),
(11, 'Crave colored Burger w/ fries and drinks', '129', '1', 'Sandwiches', 'Recreate the authentic American diner experience with burgers in colored buns, and a thick slice of our potato fries', '60910198_2172197302857823_3367437574778912768_n.jpg'),
(12, 'Grilled Pork chop', '109', '1', 'Rice Meal', ' Perfect Grilled Pork Chops are actually really easy to make and it will caught your love.', '60781257_362686914379079_6728038459270758400_n.jpg'),
(13, 'Burger steak', '89', '1', 'Rice Meal', 'Burger steak is made of flavorful burger patties that are smothered in a rich and luxurious mushroom gravy sauce. It is a very filling entree often served with mashed potatoes or better, heaps and heaps of rice', '60809790_346424229410251_3294984534512107520_n.jpg'),
(14, 'Carbonara', '109', '1', 'Pasta', 'Delight your family with this favorite dish! Creamy Recipes. Know Your Cream.', '60615088_698741380560201_6518316580596613120_n.jpg'),
(15, 'Bacon liempo', '109', '1', 'Rice Meal', 'hin pork belly slices and a couple of pantry staples', '60532351_1601288893341318_6274339563187994624_n.jpg'),
(16, 'Chicken Pesto', '139', '1', 'Pasta', 'Chicken Pesto Pasta is chicken and penne in a basil pesto sauce. This is one of those recipes that\'s great for a busy weeknight. You only need a handful of ingredients to make it. ... Pesto is full of flavor. Prepared pesto mainly consists of basil, olive', '60706275_443877839750337_4671184105889595392_n.jpg'),
(17, 'Meaty Spaghetti', '109', '1', 'Pasta', 'the tastiest and meatiest ever from Craves! With the chunkiest slices of savory ham and cheese', '60752248_2340199062705127_140631703310827520_n.jpg'),
(18, 'Mac and Cheese', '139', '1', 'Pasta', 'Cheesy, gooey, creamy and oh-so-delicious', '60774477_332371174095323_5298144340630044672_n.jpg'),
(19, 'Colored Clubhoue', '149', '1', 'Sandwiches', '4 slice of a meaty bread w/ our finest craves potato fries', '60484619_364121540895809_8791016516893016064_n.jpg'),
(20, 'Color Burger w/ Fries', '129', '1', 'Sandwiches', 'Five oddly colored burgers that can snitch your appetite', '60644999_589415224899529_4094496321614905344_n.jpg'),
(21, 'Buttered olive shrimp', '149', '1', 'Rice Meal', 'An amazing flavor combination of garlicky, buttery goodness', '60699478_2464364506958707_1337392132381474816_n.jpg'),
(22, 'Craves Queen Colored Burger', '599', '1', 'Sandwiches', '600g pure beef 10 burger with potato chips & drinks good for 5 person', '60828122_525779884493938_649935092843544576_n.jpg'),
(23, 'sisig', '109', '1', 'Rice Meal', 'Sizzling Sisig makes a great party appetizer as well as a hearty dinner entree. The perfect blend of tangy, savory and spicy, it has all the bold, delicious flavors youâ€™ll love', ''),
(24, 'chicken parmisan', '139', '1', 'Pasta', 'This is a very nice dinner for two. Serve it with your favorite pasta and tossed greens', '60452131_358866108313496_244258002759057408_n.jpg'),
(25, 'Crave colored Burger', '489', '4', 'Sandwiches', '1', '50992717_2007885665998290_665545095646281728_n.jpg'),
(26, 'Spicy shrimp & chicken fettussin', '149', '1', 'Pasta', 'creamy cheese and butter pasta with grilled chicken and spicy shrimp.', '60348693_629445437519424_7605318854130008064_n.jpg'),
(27, 'chicken quesadilla', '119', '1', 'Rice Meal', 'a tortilla that is filled primarily with cheese, and meats, beans, vegetables, and spices, and then cooked on a griddle', '60463782_2495023547176843_8108907093890695168_n.jpg'),
(28, 'Chocolate Milkshake', '109', '1', 'Beverages', 'the perfect combination of rich, sweet and delicious chocolate, it is sure to be a family favorite', '51742020_554233935071053_5527665881099796480_n.jpg'),
(29, 'Banana split', '109', '1', 'Appetizer', 'A banana is cut in half lengthwise and laid in the dish.', '59978908_645143685957985_8533517473557774336_n.jpg'),
(30, 'crave ala mode', '99', '1', 'Appetizer', 'a cookie or brownie served warm with a big scoop of ice cream on top', ''),
(31, 'Mocha choco milkshake', '129', '1', 'Beverages', ' Blended coffee, vanilla ice cream and 1 tablespoon of chocolate syrup together in a blender until smooth. Pour the milkshake into one very large or two medium sized glasses. Top with a very generous head of whipped cream and drizzle with additional choco', '60459410_446247602859019_1798960014140899328_n.jpg'),
(32, 'brownies ala mode', '109', '1', 'Appetizer', '', '60512334_506542303215185_724595544437030912_n.jpg'),
(33, 'Chicken ala king', '119', '1', 'Rice Meal', 'Chicken Ã  la King is a dish consisting of diced chicken in a cream sauce, and often with sherry, mushrooms, and vegetables, served over rice, noodles, or bread', '60524891_834483246907913_3691001349794693120_n.jpg'),
(34, 'Avocado milkshake', '109', '1', 'Beverages', ' Avocado Milkshake is a creamy milkshake made with fresh avocados and milk', '60556473_362699307551702_5789713505254899712_n.jpg'),
(35, 'Crazy caramel machiato', '109', '1', 'Beverages', 'Vanilla ice cream, brewed coffee and rich caramel sauce together in a creamy milkshake topped with whipped cream and drizzled with more caramel. Add coffee, vanilla ice cream and caramel syrup to a blender. Blend until smooth.', ''),
(36, 'Crave Taco', '109', '1', 'Appetizer', 'tacos are crisp-fried corn tortillas filled with seasoned ground beef, cheese, lettuce, and sometimes tomato, onion, salsa, sour cream, and avocado or guacamole.', '60620416_463283417784290_5433133118338891776_n.jpg'),
(37, 'Pomorodo', '130', '1', 'Pasta', 'Juicy white chicken breast topped with a tomato, cream, and basil sauce. ', '60788873_414213185825816_5327966596373676032_n.jpg'),
(38, 'Crave Leche plan', '79', '1', 'Appetizer', 'Satisfy your family\'s craving for this dessert - creaminess and richness like no other.', '60767500_348889682307788_9197561924810702848_n.jpg'),
(39, 'Caramel milkshake', '109', '1', 'Beverages', ' Drizzle a bit of caramel sauce down the sides of the glass and then pour the caramel milkshake in. The caramel along the sides will make your homemade milkshake look totally fresh', '61064353_285206805765952_640382754864758784_n.jpg'),
(40, 'Crave coffee', '50', '1', 'Beverages', 'Coffee is a brewed drink prepared from roasted coffee beans, the seeds of berries from certain Coffea species', '60848176_2260697064192195_6093522286134951936_n.jpg'),
(41, 'taco chips', '109', '1', 'Appetizer', 'A tortilla chip is a snack food made from corn tortillas, which are cut into wedges and then friedâ€”or baked Corn tortillas are made of corn, vegetable oil, salt and water.', '60852058_2278474555707164_8285915435031855104_n.jpg'),
(42, 'Liempo', '109', '1', 'Rice Meal', 'grilled pork belly so delicious!!', '60448912_2301380256783547_1111265471501434880_n.jpg'),
(43, 'Chicken mustard steak', '119', '1', 'Rice Meal', 'Chicken thighs and legs browned, then braised in white wine and Dijon mustard sauce with a bit of cream', '60895949_458177584932468_8475919531166924800_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_tbl`
--

CREATE TABLE `reservation_tbl` (
  `cID` int(11) NOT NULL,
  `cCustomer_quantity` varchar(255) NOT NULL,
  `cFrom_datetime` datetime NOT NULL,
  `cTo_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_tbl`
--

CREATE TABLE `table_tbl` (
  `table_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `cID` int(11) NOT NULL,
  `cFname` varchar(255) NOT NULL,
  `cLname` varchar(255) NOT NULL,
  `cAddress` varchar(255) NOT NULL,
  `cContact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`cID`, `cFname`, `cLname`, `cAddress`, `cContact`, `email`, `verified`) VALUES
(1, 'johnly', 'dalunos', 'Purok 6 New Cabalan', '09123456781', 'Choiyaneh71@gmail.com', '0'),
(2, 'johnly', 'dalunos', 'prk 6 new cabalan aguila st.', '09101558184', 'Choiyaneh71@gmail.com', '1'),
(24, 'kim', 'abellanes', 'purok 6 new cabalan', '09123154123', 'kimabellanes123@gmail.com', '0'),
(25, 'Robert', 'Javier', 'Olongapo', '09123456789', 'robertjavier@gmail.com', '1'),
(26, 'mary', 'grace', 'olongapo', '09051100511', 'marygrace123@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `waiter_cart_tbl`
--

CREATE TABLE `waiter_cart_tbl` (
  `cID` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cFname` varchar(255) NOT NULL,
  `cLname` varchar(255) NOT NULL,
  `cProduct` varchar(255) NOT NULL,
  `cPrice` varchar(255) NOT NULL,
  `cProduct_img` varchar(255) NOT NULL,
  `cDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbl`
--
ALTER TABLE `account_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `cashier_tbl`
--
ALTER TABLE `cashier_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `chart_tbl`
--
ALTER TABLE `chart_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `checkout_tbl`
--
ALTER TABLE `checkout_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `deliver_tbl`
--
ALTER TABLE `deliver_tbl`
  ADD PRIMARY KEY (`deliver_id`);

--
-- Indexes for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `history_tbl`
--
ALTER TABLE `history_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pcategory_tbl`
--
ALTER TABLE `pcategory_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `reservation_tbl`
--
ALTER TABLE `reservation_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `table_tbl`
--
ALTER TABLE `table_tbl`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- Indexes for table `waiter_cart_tbl`
--
ALTER TABLE `waiter_cart_tbl`
  ADD PRIMARY KEY (`cID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbl`
--
ALTER TABLE `account_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cashier_tbl`
--
ALTER TABLE `cashier_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `chart_tbl`
--
ALTER TABLE `chart_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout_tbl`
--
ALTER TABLE `checkout_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `deliver_tbl`
--
ALTER TABLE `deliver_tbl`
  MODIFY `deliver_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `history_tbl`
--
ALTER TABLE `history_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pcategory_tbl`
--
ALTER TABLE `pcategory_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `table_tbl`
--
ALTER TABLE `table_tbl`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `waiter_cart_tbl`
--
ALTER TABLE `waiter_cart_tbl`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
