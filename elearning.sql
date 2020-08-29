-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 12:22 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_role_id` int(11) DEFAULT NULL,
  `admin_image` varchar(45) DEFAULT NULL,
  `admin_name` varchar(45) DEFAULT NULL,
  `admin_email` varchar(45) DEFAULT NULL,
  `admin_address` varchar(45) DEFAULT NULL,
  `admin_contactno` varchar(45) DEFAULT NULL,
  `admin_password` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_role_id`, `admin_image`, `admin_name`, `admin_email`, `admin_address`, `admin_contactno`, `admin_password`) VALUES
(1, 1, '1595159905Admin-image-1.jpg', 'Md. Amiruzzaman Munna', 'info@itclanbd.com', 'gazipur', '01641064685', '$2y$10$ANU/G8iWGX8gHdn/.5qJFuORroubloYPLotpBWep9MtiB0UugDqpK'),
(2, 3, '1595246496Admin-image-1.jpg', 'Test sdf', 'test@gmail.com', 'gazipur', '01641064685', '$2y$10$UBc6GyvIFpTrnnhnZvtyFeLldadS4Ny2pI7xvojH3p8hNts6pZyou');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminrole`
--

CREATE TABLE `tbl_adminrole` (
  `adminrole_id` int(11) NOT NULL,
  `adminrole_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_adminrole`
--

INSERT INTO `tbl_adminrole` (`adminrole_id`, `adminrole_name`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login_page`
--

CREATE TABLE `tbl_admin_login_page` (
  `admin_login_page_id` int(11) NOT NULL,
  `admin_login_page_short_title` longtext DEFAULT NULL,
  `admin_login_page_image1` varchar(255) DEFAULT NULL,
  `admin_login_page_image2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_login_page`
--

INSERT INTO `tbl_admin_login_page` (`admin_login_page_id`, `admin_login_page_short_title`, `admin_login_page_image1`, `admin_login_page_image2`) VALUES
(1, 'It\'s Okay to be Smart. Experience the simplicity of SmartAdmin everywhere you go!', '1597915799logo-1.PNG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_image` varchar(45) DEFAULT NULL,
  `blog_blooger_name` varchar(45) DEFAULT NULL,
  `blog_details` longtext DEFAULT NULL,
  `blog_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_category_id`, `blog_title`, `blog_image`, `blog_blooger_name`, `blog_details`, `blog_date`) VALUES
(3, 6, 'Why Swift UI Should Be on the Radar of Every Mobile Developer', '1596797215blog-image-1.jpg', 'Amiruzzaman Bin Ali', '<div class=\"ic-title-bottom-txt\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Swift UI is a user interface framework intended to make it easier to build Apple platform apps in the Swift programming language fmobile development. It was introduced at the annual Worldwide Developers Conference (WWDC) in 2019, alongside many new APIs and frameworks, all intended to grow the base of mobile developers fluent in developing for Apple products. As the Cupertino-based company explained, “Swift UI is an innovative, exceptionally simple way to build user interfaces across all Apple platforms with the power of Swift.”</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">As Apple plans for the next decade, this new UI framework is Apple’s effort to make iOS development more approachable for beginner mobile developers. Though Swift UI is still in its infancy, its potential to shift how Apple apps are developed is so significant that we mobile developers should start to take note of it. Job descriptions requiring Swift UI expertise are likely to appear in the next few years.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Why is Apple prioritizing Swift UI?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">The Apple App Store of today looks very different from that of 2008 when it was first introduced to the world. With older Apple p models (iPod Touch, first-generation iPad, etc.) still in use today, there are dozens of screen sizes accessing content from today’s App Store. Auto Layout has long been the default Swift system for managing layouts on various screen sizes and orientations. But with so much fragmentation in the device landscape, mobile developers have been asking for a much simpler and mintuitive way of building apps that can scale across all Apple devices. This is why Swift UI has entered the scene, with features including:</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Drag-and-drop code creation:</span>&nbsp;Using Swift UI, developers can drag a button or other component from the object library and drop it onto the canvas. Swift UI automatically writes the necessary code. This drag-and-drop method is even applicable to attributes like font weight.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Vertical-Horizontal-Z Axis Stack:</span>&nbsp;The VHZ stack lets developers create complex designs simply by dragging and dropping elements in orientations either vertical to, horizontal to, or along the Z-axis of other elements. It’s similar to building within rows or columns, with no manual coding required. This is akin to using the Bootstrap library to build complex interfaces for web design.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Reusable UI components:</span>&nbsp;Once you’ve created layouts in Swift UI, they can be reused throughout your app. For example, if you’ve built an appearance comprised of a photo left-justified with a precise caption design to the right of the image, that component can be reused by extracting a new subview.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Build across Apple platforms: With Swift UI, Apple’s made it easier to build across Apple platforms like WatchOS, TV OS, and macOS by using the subview components made in one app across other apps.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">How will Swift UI change mobile development?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">2019 saw the popularity of declarative programming skyrocket, mostly thanks to the rise of React, one of the most popular front-end frameworks used today. Much of the excitement and expertise React developers have for the framework’s functionality has made its way to the world of mobile development. Other examples include Google’s shiny new cross-platform UI framework, Flutter, as well as the Kotlin-based JetPack Compose. React, Flutter and JetPack Compose all use a declarative style for building UIs and managing state.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">With Apple entering Swift UI into the ring, we’re moving further into the declarative world for mobile development. Hopefully, with continued investment and development into Swift UI, it will become a more enjoyable way of creating iOS apps and adopted by the next generation of iOS developers. I believe the simpler syntax and more straightforward state management will encourage more people to pick up Swift and iOS development.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Swift UI vs. Flutter</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p></div>', '2020-08-07'),
(4, 6, 'Why Swift UI Should Be on the Radar of Every Mobile Developer', '1596797228blog-image-1.jpg', 'Amiruzzaman Bin Ali', '<div class=\"ic-title-bottom-txt\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Swift UI is a user interface framework intended to make it easier to build Apple platform apps in the Swift programming language fmobile development. It was introduced at the annual Worldwide Developers Conference (WWDC) in 2019, alongside many new APIs and frameworks, all intended to grow the base of mobile developers fluent in developing for Apple products. As the Cupertino-based company explained, “Swift UI is an innovative, exceptionally simple way to build user interfaces across all Apple platforms with the power of Swift.”</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">As Apple plans for the next decade, this new UI framework is Apple’s effort to make iOS development more approachable for beginner mobile developers. Though Swift UI is still in its infancy, its potential to shift how Apple apps are developed is so significant that we mobile developers should start to take note of it. Job descriptions requiring Swift UI expertise are likely to appear in the next few years.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Why is Apple prioritizing Swift UI?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">The Apple App Store of today looks very different from that of 2008 when it was first introduced to the world. With older Apple p models (iPod Touch, first-generation iPad, etc.) still in use today, there are dozens of screen sizes accessing content from today’s App Store. Auto Layout has long been the default Swift system for managing layouts on various screen sizes and orientations. But with so much fragmentation in the device landscape, mobile developers have been asking for a much simpler and mintuitive way of building apps that can scale across all Apple devices. This is why Swift UI has entered the scene, with features including:</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Drag-and-drop code creation:</span>&nbsp;Using Swift UI, developers can drag a button or other component from the object library and drop it onto the canvas. Swift UI automatically writes the necessary code. This drag-and-drop method is even applicable to attributes like font weight.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Vertical-Horizontal-Z Axis Stack:</span>&nbsp;The VHZ stack lets developers create complex designs simply by dragging and dropping elements in orientations either vertical to, horizontal to, or along the Z-axis of other elements. It’s similar to building within rows or columns, with no manual coding required. This is akin to using the Bootstrap library to build complex interfaces for web design.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Reusable UI components:</span>&nbsp;Once you’ve created layouts in Swift UI, they can be reused throughout your app. For example, if you’ve built an appearance comprised of a photo left-justified with a precise caption design to the right of the image, that component can be reused by extracting a new subview.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Build across Apple platforms: With Swift UI, Apple’s made it easier to build across Apple platforms like WatchOS, TV OS, and macOS by using the subview components made in one app across other apps.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">How will Swift UI change mobile development?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">2019 saw the popularity of declarative programming skyrocket, mostly thanks to the rise of React, one of the most popular front-end frameworks used today. Much of the excitement and expertise React developers have for the framework’s functionality has made its way to the world of mobile development. Other examples include Google’s shiny new cross-platform UI framework, Flutter, as well as the Kotlin-based JetPack Compose. React, Flutter and JetPack Compose all use a declarative style for building UIs and managing state.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">With Apple entering Swift UI into the ring, we’re moving further into the declarative world for mobile development. Hopefully, with continued investment and development into Swift UI, it will become a more enjoyable way of creating iOS apps and adopted by the next generation of iOS developers. I believe the simpler syntax and more straightforward state management will encourage more people to pick up Swift and iOS development.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Swift UI vs. Flutter</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p></div>', '2020-08-07'),
(5, 8, 'It & Software', '1597722951blog-image-1.jpg', 'Shakil', '<p><span style=\"color: rgb(51, 55, 69); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">Are you familar with Keyword Planner? The AdWords Keyword Planner is an incredibly useful and powerful keyword research tool, built into the AdWords interface, that combines two of the most popular former&nbsp;</span><a href=\"https://www.wordstream.com/blog/ws/2016/05/19/free-adwords-tools\" style=\"box-sizing: inherit; color: rgb(0, 122, 189); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">Google Ads tools</a><span style=\"color: rgb(51, 55, 69); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">, the&nbsp;</span><a href=\"https://www.wordstream.com/keyword-tool-google\" style=\"box-sizing: inherit; color: rgb(0, 122, 189); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">Google Keyword Tool</a><span style=\"color: rgb(51, 55, 69); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">&nbsp;and the&nbsp;</span><a href=\"https://www.wordstream.com/adwords-traffic-estimator\" style=\"box-sizing: inherit; color: rgb(0, 122, 189); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">AdWords Traffic Estimator</a><span style=\"color: rgb(51, 55, 69); font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif; font-size: 18px;\">, and adds to it a wizard-like integrated workflow to guide users through the process of finding keywords for creating new Ad Groups and/or Campaigns.</span><br></p>', '2020-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user_id` int(11) NOT NULL,
  `cart_course_id` varchar(45) NOT NULL,
  `cart_course_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_user_id`, `cart_course_id`, `cart_course_price`) VALUES
(1, 1, '2', 100),
(2, 1, '2', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(45) DEFAULT NULL,
  `coupon_limit` int(11) DEFAULT NULL,
  `coupon_amount` varchar(45) DEFAULT NULL,
  `coupon_start_date` date DEFAULT NULL,
  `coupon_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`coupon_id`, `coupon_name`, `coupon_limit`, `coupon_amount`, `coupon_start_date`, `coupon_end_date`) VALUES
(1, 'Amir', 10, '22', '2020-07-16', '2020-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_category_id` varchar(45) DEFAULT NULL,
  `course_name` varchar(45) DEFAULT NULL,
  `course_short_title` varchar(255) DEFAULT NULL,
  `course_image` varchar(45) DEFAULT NULL,
  `course_authorname` varchar(45) DEFAULT NULL,
  `course_credithour` int(11) DEFAULT NULL,
  `course_description` longtext DEFAULT NULL,
  `course_defficultylevel` varchar(45) DEFAULT NULL,
  `course_requirement` longtext DEFAULT NULL,
  `course_price` float DEFAULT NULL,
  `course_free_course` int(11) DEFAULT NULL,
  `course_video` varchar(45) DEFAULT NULL,
  `course_coupon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_category_id`, `course_name`, `course_short_title`, `course_image`, `course_authorname`, `course_credithour`, `course_description`, `course_defficultylevel`, `course_requirement`, `course_price`, `course_free_course`, `course_video`, `course_coupon_id`) VALUES
(2, '6', 'Web Design', 'Learn Yourselt and prepare yourself for the best job interview', '1595758203course-image-1.png', 'Amiruzzaman', 12, 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', '2', 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', 100, 0, '1595756847course-video-1.mp4', 1),
(3, '1', 'Advance Course', NULL, '1595758288course-image-1.png', 'Amiruzzaman', 2, 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', '2', 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', 120, 0, NULL, NULL),
(5, '2', 'Graphics Animation', NULL, '1595757533course-image-1.jpg', 'Graphics Desinger', 2, 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', '1', 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', 20, 1, '1595757533course-video-1.mp4', NULL),
(6, '1', 'Web Design Advance', NULL, '1595993711course-image-1.png', 'K.A Manon', 5, 'Short Description', '1', 'Simple Course Requirements', 250, 0, '1595993711course-video-1.mp4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_category`
--

CREATE TABLE `tbl_course_category` (
  `course_category_id` int(11) NOT NULL,
  `course_category_name` varchar(45) NOT NULL,
  `course_category_parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course_category`
--

INSERT INTO `tbl_course_category` (`course_category_id`, `course_category_name`, `course_category_parent_id`) VALUES
(1, 'Web Design', 0),
(2, 'Graphics Design', 0),
(3, 'UI/UX Design', 0),
(4, 'Development', 0),
(5, 'All Developement', 4),
(6, 'Web Development', 4),
(7, 'Data Science', 4),
(8, 'IT & Software', 0),
(9, 'Marketing', 0),
(10, 'Mobile App', 4),
(11, 'All Marketing', 9),
(12, 'Digital Marketing', 9),
(13, 'Game Development', 4),
(15, 'Search Engine Optimization', 9),
(16, 'Branding', 9),
(17, 'Photography', 0),
(18, 'Music', 0),
(19, 'Personal Development', 0),
(20, 'Business', 0),
(22, 'Programming Language', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_content`
--

CREATE TABLE `tbl_course_content` (
  `course_content_id` int(11) NOT NULL,
  `course_content_course_id` int(11) NOT NULL,
  `course_content_title` varchar(45) NOT NULL,
  `course_content_description` longtext DEFAULT NULL,
  `course_content_video_title` varchar(45) DEFAULT NULL,
  `course_content_course_video` varchar(45) DEFAULT NULL,
  `course_content_video_poster` varchar(45) DEFAULT NULL,
  `course_content_video_summary` longtext DEFAULT NULL,
  `course_content_video_excercise` longtext DEFAULT NULL,
  `course_content_video_description` longtext DEFAULT NULL,
  `course_content_audio_title` varchar(45) DEFAULT NULL,
  `course_content_audio` varchar(45) DEFAULT NULL,
  `course_content_audio_description` longtext DEFAULT NULL,
  `course_content_pdf_title` varchar(45) DEFAULT NULL,
  `course_content_pdf` varchar(45) DEFAULT NULL,
  `course_content_pdfdescription` longtext DEFAULT NULL,
  `course_content_online_test` int(11) DEFAULT NULL,
  `course_content_result` int(11) DEFAULT NULL,
  `course_content_contactform` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course_content`
--

INSERT INTO `tbl_course_content` (`course_content_id`, `course_content_course_id`, `course_content_title`, `course_content_description`, `course_content_video_title`, `course_content_course_video`, `course_content_video_poster`, `course_content_video_summary`, `course_content_video_excercise`, `course_content_video_description`, `course_content_audio_title`, `course_content_audio`, `course_content_audio_description`, `course_content_pdf_title`, `course_content_pdf`, `course_content_pdfdescription`, `course_content_online_test`, `course_content_result`, `course_content_contactform`) VALUES
(4, 2, 'Introduction', 'Test', 'Lecture Video', '1595910478lecture-video-1.mp4', '1595910523course-video-poster-1.jpg', 'Let us start with basic programming language features in general. All programming languages ​​typically provide: built-in data types, one can define variables, so you give basically an object of a certain type a name, control structures, and functions thatum first kind of abstraction because they can encapsulate a certain functionality.\r\n\r\nThis is the basic feature set. Then there are two main additional features that modern language ​​provide. The first is that you cdefine your own data types. This is realized by classes in C ++. The second feature is that you have the possibility to use a rich set of library routines. C ++ provides the standard library, that offers a lot of functionality. Examples are input / output, random numbers, strings and so\r\n\r\nNow to the main question: How do we teach C ++ in this course? Of course you should already have some background in C ++ from the first two VHB C ++ programming courses or from other programming experiences with C ++.\r\n\r\nn this course we want to concentrate on newer features of C ++. In the last decade there were several new language standards. Starting from C ++ 11, there were major changes to the language and there is now basically a period of three years until a new standard is released. After C ++ 11, there is C ++ 14,', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS', NULL, 'Audio', '1595910644course-video-1.mp3', 'Let us start with basic programming language features in general. All programming languages ​​typically provide: built-in data types, one can define variables, so you give basically an object of a certain type a name, control structures, and functions that are the first kind of abstraction because they can encapsulate a certain functionality.\r\n\r\nThis is the basic feature set. Then there are two main additional features that modern languages ​​provide. The first is that you can define your own data types. This is realized by classes in C ++. The second feature is that you have the possibility to use a rich set of library routines. C ++ provides the standard library, that offers a lot of functionality. Examples are input / output, random numbers, strings and so on.', 'Lecture Pdf Title', '1595910644pdf-file-1.pdf', 'Let us start with basic programming language features in general. All programming languages ​​typically provide: built-in data types, one can define variables, so you give basically an object of a certain type a name, control structures, and functions thatum first kind of abstraction because they can encapsulate a certain functionality. This is the basic feature set. Then there are two main additional features that modern language ​​provide. The first is that you cdefine your own data types. This is realized by classes in C ++. The second feature is that you have the possibility to use a rich set of library routines. C ++ provides the standard library, that offers a lot of functionality. Examples are input / output, random numbers, strings and so Now to the main question: How do we teach C ++ in this course? Of course you should already have some background in C ++ from the first two VHB C ++ programming courses or from other programming experiences with C ++. n this course we want to concentrate on newer features of C ++. In the last decade there were several new language standards. Starting from C ++ 11, there were major changes to the language and there is now basically a period of three years until a new standard is released. After C ++ 11, there is C ++ 14,', 1, 1, 1),
(5, 2, 'Advance Lecture', 'Advance Lecture', NULL, '1595910825lecture-video-1.mp4', '1595910825course-video-poster-1.png', 'Lecture Summary.Lecture Summary.Lecture Summary.Lecture Summary.Lecture Summary.Lecture Summary.', 'Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.', NULL, 'Audio', '1595910825course-video-1.mp3', 'Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.', 'Pdf Lecture', '1595910825pdf-file-1.pdf', 'Pdf Description.Pdf Description.Pdf Descripti', 1, 1, 1),
(6, 2, 'Dynamic Lecture', 'This course is advanced dynamic web design content.Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1595915852pdf-file-1.pdf', NULL, 1, 1, 1),
(7, 7, 'Test Test', 'Test Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 'Advance Web Development', 'Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.', NULL, '1595911833lecture-video-1.mp4', '1595911834course-video-poster-1.jpg', 'Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.', 'Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.', NULL, 'Audio', '1595911834course-video-1.mp3', 'Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.', 'Advance Web Development', '1595911834pdf-file-1.pdf', 'Advance Web Development pdf Short Description', 1, 1, 1),
(10, 2, 'Test', 'asf', 'asdf', NULL, NULL, 'asdf', 'asdf', NULL, 'asdfasdf', NULL, 'asdf', 'asdf', NULL, 'asdf', 0, 0, 0),
(11, 3, 'Course Lecture 1', '<p>Test<br></p>', 'Course Lecture Video Title', NULL, NULL, 'Course Lecture Summary', 'Course Lecture Excercise', NULL, NULL, NULL, 'Test', 'Course Lecture 1 Pdf', NULL, 'Course Lecture pdf Description', 0, 0, 0),
(21, 5, 'Lecture Graphics', '<p>Lecture Graphics<br></p>', 'Lecture Graphics', '1597731593lecture-video-1.mp4', '1597731593course-video-poster-1.jpg', '<p>Lecture Graphics<br></p>', '<p>Lecture Graphics<br></p>', NULL, 'Lecture Graphics', '1597731593course-audio-1.mp3', '<p>Lecture Graphics<br></p>', 'Lecture Graphics', '1597731593pdf-file-1.pdf', '<p>Lecture Graphics<br></p>', 1, 1, 1),
(22, 5, 'Lecture 2', '<p>Lecture 2<br></p>', 'Lecture 2', '1597732055lecture-video-1.mp4', '1597732055course-video-poster-1.jpg', '<p>Lecture 2<br></p>', '<p>Lecture 2<br></p>', NULL, 'Lecture 2', '1597732055course-audio-1.mp3', '<p>Lecture 2<br></p>', 'Lecture 2', '1597732055pdf-file-1.pdf', '<p>Lecture 2<br></p>', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_module`
--

CREATE TABLE `tbl_course_module` (
  `course_module_id` int(11) NOT NULL,
  `course_module_course_id` int(11) NOT NULL,
  `course_module_name` varchar(45) NOT NULL,
  `course_module_description` longtext DEFAULT NULL,
  `course_module_file` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course_module`
--

INSERT INTO `tbl_course_module` (`course_module_id`, `course_module_course_id`, `course_module_name`, `course_module_description`, `course_module_file`) VALUES
(1, 2, 'Content', '<p>This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.</p>', NULL),
(2, 2, 'Responsible', 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.', NULL),
(3, 2, 'Structure', 'Introduction\r\nType deduction and initialization syntax\r\nMove Semantics\r\nLambda\r\nExtended OO\r\nSmart pointer\r\nExtended Library\r\nTemplates\r\nC ++ 20 Standard', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_difficulty_level`
--

CREATE TABLE `tbl_difficulty_level` (
  `difficulty_level_id` int(11) NOT NULL,
  `difficulty_level_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_difficulty_level`
--

INSERT INTO `tbl_difficulty_level` (`difficulty_level_id`, `difficulty_level_name`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_answer`
--

CREATE TABLE `tbl_exam_answer` (
  `exam_answer_id` int(11) NOT NULL,
  `exam_answer_lecture_id` int(11) DEFAULT NULL,
  `exam_answer_user_id` int(11) DEFAULT NULL,
  `exam_answer_exam_id` int(11) DEFAULT NULL,
  `exam_answer_answer_name` varchar(255) DEFAULT NULL,
  `exam_answer_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_exam_answer`
--

INSERT INTO `tbl_exam_answer` (`exam_answer_id`, `exam_answer_lecture_id`, `exam_answer_user_id`, `exam_answer_exam_id`, `exam_answer_answer_name`, `exam_answer_marks`) VALUES
(1, 4, 1, 1, 'A', 50),
(2, 4, 1, 2, 'D', 50),
(8, 21, 1, 3, 'aa', 20),
(9, 21, 1, 4, 'bb', 20),
(10, 21, 1, 5, 'cc', 20),
(11, 21, 1, 6, 'dd', 20),
(12, 21, 1, 7, 'ee', 20),
(13, 22, 1, 5, 'a', 10),
(14, 22, 1, 6, 'b', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_type`
--

CREATE TABLE `tbl_exam_type` (
  `exam_type_id` int(11) NOT NULL,
  `exam_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_exam_type`
--

INSERT INTO `tbl_exam_type` (`exam_type_id`, `exam_type_name`) VALUES
(1, 'Fill in the Blank'),
(2, 'MCQ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fill_exam`
--

CREATE TABLE `tbl_fill_exam` (
  `fill_exam_id` int(11) NOT NULL,
  `fill_exam_lecture_id` int(11) DEFAULT NULL,
  `tbl_fill_exam_name` varchar(255) DEFAULT NULL,
  `fill_exam_answer` varchar(245) DEFAULT NULL,
  `fill_exam_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_fill_exam`
--

INSERT INTO `tbl_fill_exam` (`fill_exam_id`, `fill_exam_lecture_id`, `tbl_fill_exam_name`, `fill_exam_answer`, `fill_exam_marks`) VALUES
(1, 5, 'Question 1', 'A', 50),
(2, 5, 'Question 2', 'B', 50),
(3, 21, 'Question 1', 'A', 10),
(4, 21, 'Question 2', 'B', 10),
(5, 22, 'Question 1', 'a', 10),
(6, 22, 'Question 2', 'b', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_forget_password`
--

CREATE TABLE `tbl_forget_password` (
  `forget_password_id` int(11) NOT NULL,
  `forget_password_mail` varchar(45) DEFAULT NULL,
  `forget_password_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_homepage`
--

CREATE TABLE `tbl_homepage` (
  `homepage_id` int(11) NOT NULL,
  `homePage_header_image` varchar(255) DEFAULT NULL,
  `homePage_header_title` varchar(255) DEFAULT NULL,
  `homepage_header_paragraph` varchar(255) DEFAULT NULL,
  `homepage_middle_image` varchar(255) DEFAULT NULL,
  `homePage_middle_title` varchar(255) DEFAULT NULL,
  `homepage_middle_paragraph` varchar(255) DEFAULT NULL,
  `homePage_footer_image` varchar(255) DEFAULT NULL,
  `homePage_footer_title` varchar(255) DEFAULT NULL,
  `homePage_footer_paragraph` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_homepage`
--

INSERT INTO `tbl_homepage` (`homepage_id`, `homePage_header_image`, `homePage_header_title`, `homepage_header_paragraph`, `homepage_middle_image`, `homePage_middle_title`, `homepage_middle_paragraph`, `homePage_footer_image`, `homePage_footer_title`, `homePage_footer_paragraph`) VALUES
(1, '1597550200header-image-1.jpg', 'You can learn anything for bright future', 'Anywhere, anytime. Start learning today!', '1597550200middle-image-1.png', 'Become a expert with us. Learn From Anywhere', 'Take classes on the go with the Skillshare app. Stream or download to watch on the plane, the subway, or wherever you learn best.', '1597550200footer-image-1.jpg', 'Alliance Academic', 'Aliquam dapibus nunc tellus nitu rutrum turpisionpn rutrum actio. Morbi et eros a turpis vulpuscelerisque. Aenean ultricies risus diam, quis maximus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecture_exam`
--

CREATE TABLE `tbl_lecture_exam` (
  `lecture_exam_id` int(11) NOT NULL,
  `lecture_exam_lecture_id` int(11) DEFAULT NULL,
  `lecture_exam_title` varchar(255) DEFAULT NULL,
  `lecture_exam_question_type_id` int(11) DEFAULT NULL,
  `lecture_exam_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lecture_exam`
--

INSERT INTO `tbl_lecture_exam` (`lecture_exam_id`, `lecture_exam_lecture_id`, `lecture_exam_title`, `lecture_exam_question_type_id`, `lecture_exam_marks`) VALUES
(1, 4, 'Test', 2, 100),
(2, 5, 'Fill in the Blank', 1, 100),
(3, 21, 'Lecture Exam', 2, 100),
(5, 22, 'Lecture 2', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecture_files`
--

CREATE TABLE `tbl_lecture_files` (
  `lecture_files_id` int(11) NOT NULL,
  `lecture_files_content_id` int(11) DEFAULT NULL,
  `lecture_files_files` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lecture_files`
--

INSERT INTO `tbl_lecture_files` (`lecture_files_id`, `lecture_files_content_id`, `lecture_files_files`) VALUES
(1, 4, '1595500982pdf.pdf'),
(2, 4, '1595500983pdf.pdf'),
(3, 4, '1595500982video.mp4'),
(4, 4, '1595740116pdf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mcq_exam`
--

CREATE TABLE `tbl_mcq_exam` (
  `mcq_exam_id` int(11) NOT NULL,
  `mcq_exam_lecture_id` int(11) DEFAULT NULL,
  `mcq_exam_name` varchar(255) DEFAULT NULL,
  `tbl_mcq_exam_answer` varchar(255) DEFAULT NULL,
  `tbl_mcq_exam_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mcq_exam`
--

INSERT INTO `tbl_mcq_exam` (`mcq_exam_id`, `mcq_exam_lecture_id`, `mcq_exam_name`, `tbl_mcq_exam_answer`, `tbl_mcq_exam_marks`) VALUES
(1, 4, 'Question 1', 'A', 50),
(2, 4, 'Question 2', 'D', 50),
(3, 21, 'A', 'aa', 20),
(4, 21, 'B', 'bb', 20),
(5, 21, 'C', 'cc', 20),
(6, 21, 'D', 'dd', 20),
(7, 21, 'E', 'ee', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mcq_option`
--

CREATE TABLE `tbl_mcq_option` (
  `mcq_option_id` int(11) NOT NULL,
  `mcq_option_mcq_exam_id` int(11) DEFAULT NULL,
  `mcq_option_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mcq_option`
--

INSERT INTO `tbl_mcq_option` (`mcq_option_id`, `mcq_option_mcq_exam_id`, `mcq_option_name`) VALUES
(1, 1, 'A'),
(2, 1, 'B'),
(3, 2, 'C'),
(4, 2, 'D'),
(5, 3, 'aa'),
(6, 3, 'bb'),
(7, 4, 'bb'),
(8, 4, 'cc'),
(9, 5, 'cc'),
(10, 5, 'dd'),
(11, 6, 'dd'),
(12, 6, 'ee'),
(13, 7, 'ee'),
(14, 7, 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `menu_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_name`, `menu_parent_id`, `menu_order_id`) VALUES
(1, 'Solution', 0, 1),
(2, 'Resource', 0, 2),
(3, 'Quick Links', 0, 3),
(4, 'About us', 1, 4),
(5, 'Careers', 1, 5),
(6, 'Download', 2, 6),
(7, 'Event', 2, 7),
(8, 'Teach', 2, 8),
(9, 'Team', 3, 9),
(10, 'Privacy Policy', 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_course_id` int(11) DEFAULT NULL,
  `notification_lecture_id` varchar(45) DEFAULT NULL,
  `notification_user_id` int(11) DEFAULT NULL,
  `notification_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_course_id`, `notification_lecture_id`, `notification_user_id`, `notification_date`) VALUES
(4, 2, '20', 1, '2020-08-17 10:17:49'),
(5, 5, '21', 1, '2020-08-18 06:19:59'),
(6, 5, '22', 1, '2020-08-18 06:27:39'),
(7, 2, '23', 1, '2020-08-19 05:07:28'),
(8, 2, '24', 1, '2020-08-19 05:19:09'),
(9, 2, '25', 1, '2020-08-19 05:26:30'),
(10, 2, '26', 1, '2020-08-19 05:29:39'),
(11, 2, '27', 1, '2020-08-19 05:31:35'),
(12, 2, '28', 1, '2020-08-19 05:32:24'),
(13, 2, '29', 1, '2020-08-19 05:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) DEFAULT NULL,
  `order_course_id` int(11) DEFAULT NULL,
  `order_amount` float DEFAULT NULL,
  `order_date` varchar(45) DEFAULT NULL,
  `order_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_user_id`, `order_course_id`, `order_amount`, `order_date`, `order_status`) VALUES
(1, 1, 2, 56, '2020-08-05', '1'),
(2, 1, 5, 20, '2020-08-05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pages_id` int(11) NOT NULL,
  `pages_submenu_id` int(11) DEFAULT NULL,
  `pages_title` varchar(45) DEFAULT NULL,
  `pages_link` varchar(255) DEFAULT NULL,
  `pages_description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pages_id`, `pages_submenu_id`, `pages_title`, `pages_link`, `pages_description`) VALUES
(1, 4, 'About Us', '/aboutus', '<div style=\"line-height: 22px;\"><font color=\"#d4d4d4\" face=\"Consolas, Courier New, monospace\" style=\"\"><span style=\"font-size: 16px; white-space: pre;\"><span style=\"background-color: rgb(30, 30, 30);\">About Us</span><span style=\"background-color: rgb(255, 255, 255);\">.</span></span></font><br></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_parent_id` int(11) DEFAULT NULL,
  `permission_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`permission_id`, `permission_parent_id`, `permission_name`) VALUES
(1, 0, 'User'),
(2, 1, 'Show User'),
(3, 1, 'Add User'),
(4, 1, 'Edit User'),
(5, 1, 'Delete User'),
(6, 0, 'Course Category'),
(7, 6, 'Course Category Show'),
(8, 6, 'Course Category Add'),
(9, 6, 'Course Category Edit'),
(10, 6, 'Course Category Delete'),
(11, 0, 'Role'),
(12, 11, 'Role List'),
(13, 11, 'Role Add'),
(14, 11, 'Role Edit'),
(15, 11, 'Role Delete'),
(16, 11, 'Role Permission'),
(17, 0, 'Coupon'),
(18, 17, 'Coupon List'),
(19, 17, 'Coupon Add'),
(20, 17, 'Coupon Edit'),
(21, 17, 'Coupon Delete'),
(22, 0, 'Admin'),
(23, 22, 'Admin List'),
(24, 22, 'Admin Add'),
(25, 22, 'Admin Edit'),
(26, 22, 'Admin Delete'),
(27, 0, 'Course'),
(28, 27, 'Course list'),
(29, 27, 'Course Add'),
(30, 27, 'Course Edit'),
(31, 27, 'Course Delete'),
(32, 0, 'Course Content'),
(33, 32, 'Course Content List'),
(34, 32, 'Course Content Add'),
(35, 32, 'Course Content Edit'),
(36, 32, 'Course Content Delete'),
(37, 0, 'Lecture File'),
(38, 37, 'Lecture File List'),
(39, 37, 'Lecture File Add'),
(40, 37, 'Lecture File Edit'),
(41, 37, 'Lecture File Delete'),
(42, 0, 'Course Module'),
(43, 42, 'Course Module List'),
(44, 42, 'Course Module Add'),
(45, 42, 'Course Module Edit'),
(46, 42, 'Course Module Delete'),
(47, 0, 'Course Order'),
(48, 47, 'Order Active'),
(49, 47, 'Order Delete'),
(50, 0, 'Blog'),
(51, 50, 'Blog Add'),
(52, 50, 'Blog Edit'),
(53, 50, 'Blog Delete'),
(54, 50, 'Blog List'),
(55, 0, 'Login Page'),
(56, 55, 'Login Page List'),
(57, 55, 'Login Page Add'),
(58, 55, 'Login Page Edit'),
(59, 55, 'Login Page Delete'),
(60, 0, 'Home Page'),
(61, 60, 'Home Page List'),
(62, 60, 'Home Page Add'),
(63, 60, 'Home Page Edit'),
(64, 60, 'Home Page Delete');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratings`
--

CREATE TABLE `tbl_ratings` (
  `ratings_id` int(11) NOT NULL,
  `ratings_user_id` int(11) DEFAULT NULL,
  `ratings_course_id` int(11) DEFAULT NULL,
  `ratings_rate` int(11) DEFAULT NULL,
  `ratings_comments` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ratings`
--

INSERT INTO `tbl_ratings` (`ratings_id`, `ratings_user_id`, `ratings_course_id`, `ratings_rate`, `ratings_comments`) VALUES
(2, 1, 2, 4, 'This course is nice');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_permission`
--

CREATE TABLE `tbl_role_permission` (
  `role_permission_id` int(10) UNSIGNED NOT NULL,
  `role_permission_role_id` int(11) DEFAULT NULL,
  `role_permission_per_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role_permission`
--

INSERT INTO `tbl_role_permission` (`role_permission_id`, `role_permission_role_id`, `role_permission_per_id`) VALUES
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 1, 10),
(9, 2, 7),
(10, 2, 8),
(11, 2, 2),
(13, 1, 12),
(14, 1, 13),
(15, 1, 14),
(16, 1, 15),
(17, 1, 16),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 23),
(23, 1, 24),
(24, 1, 25),
(25, 1, 26),
(26, 1, 28),
(27, 1, 29),
(28, 1, 30),
(29, 1, 31),
(30, 1, 33),
(31, 1, 34),
(32, 1, 35),
(33, 1, 36),
(34, 1, 38),
(35, 1, 39),
(36, 1, 40),
(37, 1, 41),
(38, 1, 43),
(39, 1, 44),
(40, 1, 45),
(41, 1, 46),
(42, 1, 2),
(43, 1, 3),
(44, 1, 4),
(45, 1, 5),
(46, 1, 48),
(47, 1, 49),
(48, 1, 51),
(49, 1, 52),
(50, 1, 53),
(51, 1, 54),
(52, 1, 56),
(53, 1, 57),
(54, 1, 58),
(55, 1, 59),
(56, 1, 61),
(57, 1, 62),
(58, 1, 63),
(59, 1, 64);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `signup_id` int(11) NOT NULL,
  `signup_name` varchar(45) NOT NULL,
  `signup_email` varchar(45) DEFAULT NULL,
  `signup_image` varchar(45) DEFAULT NULL,
  `signup_address` varchar(45) DEFAULT NULL,
  `signup_phonum` varchar(45) DEFAULT NULL,
  `signup_password` varchar(100) NOT NULL,
  `signup_professional_tag` varchar(45) DEFAULT NULL,
  `signup_professionalbio` longtext DEFAULT NULL,
  `signup_wblinks` varchar(75) DEFAULT NULL,
  `signup_fblinks` varchar(75) DEFAULT NULL,
  `signup_ttlinks` varchar(75) DEFAULT NULL,
  `signup_social_type` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`signup_id`, `signup_name`, `signup_email`, `signup_image`, `signup_address`, `signup_phonum`, `signup_password`, `signup_professional_tag`, `signup_professionalbio`, `signup_wblinks`, `signup_fblinks`, `signup_ttlinks`, `signup_social_type`) VALUES
(1, 'Md. Amiruzzaman Munna', 'info@itclanbd.com', NULL, 'gazipur', '01787284068', '$2y$10$wL48zbruyvdeDsD7hl.Km.qBW5YpjNl7NKVxA3fOlISN199k6Ye8a', 'Software Engineer', 'Software Engineer. Professional Laravel Developer', 'https://stackoverflow.com/', 'https://www.facebook.com/', 'https://twitter.com/', 0),
(4, 'Md. Amiruzzaman Munna', 'test@gmail.com', '1594895584user-image-1.jpg', 'gazipur', '01641064685', '$2y$10$hyQ.ZkjGJYfi5SOeUDwOve4rhba8cAv1N5FNBkpgMV8Ggw1JKor/6', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'আমিরুজ্জামান মুন্না', 'munna.ak17@gmail.com', NULL, NULL, NULL, '$2y$10$k5iGxGcE8iNU9YmpXmVf..XZQ3dYQWncTIGSw.OCFdwxy3rD8rOGO', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profilelinks`
--

CREATE TABLE `tbl_user_profilelinks` (
  `user_profilelinks_id` int(11) NOT NULL,
  `user_profilelinks_user_id` int(11) NOT NULL,
  `user_profilelinks_link` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_profilelinks`
--

INSERT INTO `tbl_user_profilelinks` (`user_profilelinks_id`, `user_profilelinks_user_id`, `user_profilelinks_link`) VALUES
(10, 1, 'Test Update'),
(11, 1, 'Test Amir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_submit_file`
--

CREATE TABLE `tbl_user_submit_file` (
  `user_submit_file_id` int(11) NOT NULL,
  `user_submit_file_form_id` int(11) DEFAULT NULL,
  `user_submit_file_files` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_submit_file`
--

INSERT INTO `tbl_user_submit_file` (`user_submit_file_id`, `user_submit_file_form_id`, `user_submit_file_files`) VALUES
(1, 1, '1597207194files.png'),
(2, 1, '1597207195files.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_submit_form`
--

CREATE TABLE `tbl_user_submit_form` (
  `user_submit_form_id` int(11) NOT NULL,
  `user_submit_form_user_id` int(11) DEFAULT NULL,
  `user_submit_form_lecture_id` int(11) DEFAULT NULL,
  `user_submit_form_description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_submit_form`
--

INSERT INTO `tbl_user_submit_form` (`user_submit_form_id`, `user_submit_form_user_id`, `user_submit_form_lecture_id`, `user_submit_form_description`) VALUES
(1, 1, 4, 'This Images have problem. Please check this problem as soos as possible.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wishlist_user_id` int(11) DEFAULT NULL,
  `wishlist_course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `wishlist_user_id`, `wishlist_course_id`) VALUES
(1, 1, 3),
(2, 1, 3),
(3, 1, 2),
(4, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_adminrole`
--
ALTER TABLE `tbl_adminrole`
  ADD PRIMARY KEY (`adminrole_id`);

--
-- Indexes for table `tbl_admin_login_page`
--
ALTER TABLE `tbl_admin_login_page`
  ADD PRIMARY KEY (`admin_login_page_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_course_category`
--
ALTER TABLE `tbl_course_category`
  ADD PRIMARY KEY (`course_category_id`);

--
-- Indexes for table `tbl_course_content`
--
ALTER TABLE `tbl_course_content`
  ADD PRIMARY KEY (`course_content_id`);

--
-- Indexes for table `tbl_course_module`
--
ALTER TABLE `tbl_course_module`
  ADD PRIMARY KEY (`course_module_id`);

--
-- Indexes for table `tbl_difficulty_level`
--
ALTER TABLE `tbl_difficulty_level`
  ADD PRIMARY KEY (`difficulty_level_id`);

--
-- Indexes for table `tbl_exam_answer`
--
ALTER TABLE `tbl_exam_answer`
  ADD PRIMARY KEY (`exam_answer_id`);

--
-- Indexes for table `tbl_exam_type`
--
ALTER TABLE `tbl_exam_type`
  ADD PRIMARY KEY (`exam_type_id`);

--
-- Indexes for table `tbl_fill_exam`
--
ALTER TABLE `tbl_fill_exam`
  ADD PRIMARY KEY (`fill_exam_id`);

--
-- Indexes for table `tbl_forget_password`
--
ALTER TABLE `tbl_forget_password`
  ADD PRIMARY KEY (`forget_password_id`);

--
-- Indexes for table `tbl_homepage`
--
ALTER TABLE `tbl_homepage`
  ADD PRIMARY KEY (`homepage_id`);

--
-- Indexes for table `tbl_lecture_exam`
--
ALTER TABLE `tbl_lecture_exam`
  ADD PRIMARY KEY (`lecture_exam_id`);

--
-- Indexes for table `tbl_lecture_files`
--
ALTER TABLE `tbl_lecture_files`
  ADD PRIMARY KEY (`lecture_files_id`);

--
-- Indexes for table `tbl_mcq_exam`
--
ALTER TABLE `tbl_mcq_exam`
  ADD PRIMARY KEY (`mcq_exam_id`);

--
-- Indexes for table `tbl_mcq_option`
--
ALTER TABLE `tbl_mcq_option`
  ADD PRIMARY KEY (`mcq_option_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  ADD PRIMARY KEY (`ratings_id`);

--
-- Indexes for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD PRIMARY KEY (`role_permission_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`signup_id`);

--
-- Indexes for table `tbl_user_profilelinks`
--
ALTER TABLE `tbl_user_profilelinks`
  ADD PRIMARY KEY (`user_profilelinks_id`);

--
-- Indexes for table `tbl_user_submit_file`
--
ALTER TABLE `tbl_user_submit_file`
  ADD PRIMARY KEY (`user_submit_file_id`);

--
-- Indexes for table `tbl_user_submit_form`
--
ALTER TABLE `tbl_user_submit_form`
  ADD PRIMARY KEY (`user_submit_form_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_adminrole`
--
ALTER TABLE `tbl_adminrole`
  MODIFY `adminrole_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin_login_page`
--
ALTER TABLE `tbl_admin_login_page`
  MODIFY `admin_login_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_course_category`
--
ALTER TABLE `tbl_course_category`
  MODIFY `course_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_course_content`
--
ALTER TABLE `tbl_course_content`
  MODIFY `course_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_course_module`
--
ALTER TABLE `tbl_course_module`
  MODIFY `course_module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_difficulty_level`
--
ALTER TABLE `tbl_difficulty_level`
  MODIFY `difficulty_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_exam_answer`
--
ALTER TABLE `tbl_exam_answer`
  MODIFY `exam_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_exam_type`
--
ALTER TABLE `tbl_exam_type`
  MODIFY `exam_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_fill_exam`
--
ALTER TABLE `tbl_fill_exam`
  MODIFY `fill_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_forget_password`
--
ALTER TABLE `tbl_forget_password`
  MODIFY `forget_password_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_homepage`
--
ALTER TABLE `tbl_homepage`
  MODIFY `homepage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lecture_exam`
--
ALTER TABLE `tbl_lecture_exam`
  MODIFY `lecture_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_lecture_files`
--
ALTER TABLE `tbl_lecture_files`
  MODIFY `lecture_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mcq_exam`
--
ALTER TABLE `tbl_mcq_exam`
  MODIFY `mcq_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_mcq_option`
--
ALTER TABLE `tbl_mcq_option`
  MODIFY `mcq_option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_ratings`
--
ALTER TABLE `tbl_ratings`
  MODIFY `ratings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  MODIFY `role_permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user_profilelinks`
--
ALTER TABLE `tbl_user_profilelinks`
  MODIFY `user_profilelinks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user_submit_file`
--
ALTER TABLE `tbl_user_submit_file`
  MODIFY `user_submit_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_submit_form`
--
ALTER TABLE `tbl_user_submit_form`
  MODIFY `user_submit_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
