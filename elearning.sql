-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 01:13 PM
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
-- Database: `elearning`
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
(1, 1, '1595159905Admin-image-1.jpg', 'Md. Amiruzzaman Munna', 'munna.ak17@gmail.com', 'gazipur', '01641064685', '$2y$10$eBxQWqVUZXrgzzB76re/2.kAExqkUUlDOuYk/dwanPWIVQGHeslrC'),
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
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_image` varchar(45) DEFAULT NULL,
  `blog_blooger_name` varchar(45) DEFAULT NULL,
  `blog_details` longtext,
  `blog_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `blog_image`, `blog_blooger_name`, `blog_details`, `blog_date`) VALUES
(3, 'Why Swift UI Should Be on the Radar of Every Mobile Developer', '1596797215blog-image-1.jpg', 'Amiruzzaman Bin Ali', '<div class=\"ic-title-bottom-txt\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Swift UI is a user interface framework intended to make it easier to build Apple platform apps in the Swift programming language fmobile development. It was introduced at the annual Worldwide Developers Conference (WWDC) in 2019, alongside many new APIs and frameworks, all intended to grow the base of mobile developers fluent in developing for Apple products. As the Cupertino-based company explained, “Swift UI is an innovative, exceptionally simple way to build user interfaces across all Apple platforms with the power of Swift.”</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">As Apple plans for the next decade, this new UI framework is Apple’s effort to make iOS development more approachable for beginner mobile developers. Though Swift UI is still in its infancy, its potential to shift how Apple apps are developed is so significant that we mobile developers should start to take note of it. Job descriptions requiring Swift UI expertise are likely to appear in the next few years.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Why is Apple prioritizing Swift UI?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">The Apple App Store of today looks very different from that of 2008 when it was first introduced to the world. With older Apple p models (iPod Touch, first-generation iPad, etc.) still in use today, there are dozens of screen sizes accessing content from today’s App Store. Auto Layout has long been the default Swift system for managing layouts on various screen sizes and orientations. But with so much fragmentation in the device landscape, mobile developers have been asking for a much simpler and mintuitive way of building apps that can scale across all Apple devices. This is why Swift UI has entered the scene, with features including:</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Drag-and-drop code creation:</span>&nbsp;Using Swift UI, developers can drag a button or other component from the object library and drop it onto the canvas. Swift UI automatically writes the necessary code. This drag-and-drop method is even applicable to attributes like font weight.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Vertical-Horizontal-Z Axis Stack:</span>&nbsp;The VHZ stack lets developers create complex designs simply by dragging and dropping elements in orientations either vertical to, horizontal to, or along the Z-axis of other elements. It’s similar to building within rows or columns, with no manual coding required. This is akin to using the Bootstrap library to build complex interfaces for web design.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Reusable UI components:</span>&nbsp;Once you’ve created layouts in Swift UI, they can be reused throughout your app. For example, if you’ve built an appearance comprised of a photo left-justified with a precise caption design to the right of the image, that component can be reused by extracting a new subview.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Build across Apple platforms: With Swift UI, Apple’s made it easier to build across Apple platforms like WatchOS, TV OS, and macOS by using the subview components made in one app across other apps.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">How will Swift UI change mobile development?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">2019 saw the popularity of declarative programming skyrocket, mostly thanks to the rise of React, one of the most popular front-end frameworks used today. Much of the excitement and expertise React developers have for the framework’s functionality has made its way to the world of mobile development. Other examples include Google’s shiny new cross-platform UI framework, Flutter, as well as the Kotlin-based JetPack Compose. React, Flutter and JetPack Compose all use a declarative style for building UIs and managing state.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">With Apple entering Swift UI into the ring, we’re moving further into the declarative world for mobile development. Hopefully, with continued investment and development into Swift UI, it will become a more enjoyable way of creating iOS apps and adopted by the next generation of iOS developers. I believe the simpler syntax and more straightforward state management will encourage more people to pick up Swift and iOS development.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Swift UI vs. Flutter</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p></div>', '2020-08-07'),
(4, 'Why Swift UI Should Be on the Radar of Every Mobile Developer', '1596797228blog-image-1.jpg', 'Amiruzzaman Bin Ali', '<div class=\"ic-title-bottom-txt\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Swift UI is a user interface framework intended to make it easier to build Apple platform apps in the Swift programming language fmobile development. It was introduced at the annual Worldwide Developers Conference (WWDC) in 2019, alongside many new APIs and frameworks, all intended to grow the base of mobile developers fluent in developing for Apple products. As the Cupertino-based company explained, “Swift UI is an innovative, exceptionally simple way to build user interfaces across all Apple platforms with the power of Swift.”</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">As Apple plans for the next decade, this new UI framework is Apple’s effort to make iOS development more approachable for beginner mobile developers. Though Swift UI is still in its infancy, its potential to shift how Apple apps are developed is so significant that we mobile developers should start to take note of it. Job descriptions requiring Swift UI expertise are likely to appear in the next few years.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Why is Apple prioritizing Swift UI?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">The Apple App Store of today looks very different from that of 2008 when it was first introduced to the world. With older Apple p models (iPod Touch, first-generation iPad, etc.) still in use today, there are dozens of screen sizes accessing content from today’s App Store. Auto Layout has long been the default Swift system for managing layouts on various screen sizes and orientations. But with so much fragmentation in the device landscape, mobile developers have been asking for a much simpler and mintuitive way of building apps that can scale across all Apple devices. This is why Swift UI has entered the scene, with features including:</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Drag-and-drop code creation:</span>&nbsp;Using Swift UI, developers can drag a button or other component from the object library and drop it onto the canvas. Swift UI automatically writes the necessary code. This drag-and-drop method is even applicable to attributes like font weight.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Vertical-Horizontal-Z Axis Stack:</span>&nbsp;The VHZ stack lets developers create complex designs simply by dragging and dropping elements in orientations either vertical to, horizontal to, or along the Z-axis of other elements. It’s similar to building within rows or columns, with no manual coding required. This is akin to using the Bootstrap library to build complex interfaces for web design.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\"><span style=\"font-weight: 700;\">Reusable UI components:</span>&nbsp;Once you’ve created layouts in Swift UI, they can be reused throughout your app. For example, if you’ve built an appearance comprised of a photo left-justified with a precise caption design to the right of the image, that component can be reused by extracting a new subview.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Build across Apple platforms: With Swift UI, Apple’s made it easier to build across Apple platforms like WatchOS, TV OS, and macOS by using the subview components made in one app across other apps.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">How will Swift UI change mobile development?</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">2019 saw the popularity of declarative programming skyrocket, mostly thanks to the rise of React, one of the most popular front-end frameworks used today. Much of the excitement and expertise React developers have for the framework’s functionality has made its way to the world of mobile development. Other examples include Google’s shiny new cross-platform UI framework, Flutter, as well as the Kotlin-based JetPack Compose. React, Flutter and JetPack Compose all use a declarative style for building UIs and managing state.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">With Apple entering Swift UI into the ring, we’re moving further into the declarative world for mobile development. Hopefully, with continued investment and development into Swift UI, it will become a more enjoyable way of creating iOS apps and adopted by the next generation of iOS developers. I believe the simpler syntax and more straightforward state management will encourage more people to pick up Swift and iOS development.</p></div><div class=\"ic-blog-details-small-title\" style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, &quot;Noto Sans&quot;, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px;\"><h4 style=\"margin-top: 0px; margin-bottom: 18px; line-height: 24px; font-size: 24px; font-family: Assistant, sans-serif; color: rgb(51, 51, 51);\">Swift UI vs. Flutter</h4><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p><p style=\"font-family: Assistant, sans-serif; color: rgb(51, 51, 51); line-height: 24px;\">Flutter is a UI framework developed by Google to build native cross-platform apps using the Dart programming language. It’s been widely embraced by mobile developers and ranked as one of the most loved frameworks in the latest StackOverflow survey. Having taught courses in both Swift UI and Flutter, I’ve seen many similarities between the two.</p></div>', '2020-08-07');

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
(20, 1, '2', 100),
(21, 1, '3', 120);

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
  `course_description` longtext,
  `course_defficultylevel` varchar(45) DEFAULT NULL,
  `course_requirement` longtext,
  `course_price` float DEFAULT NULL,
  `course_free_course` int(11) DEFAULT NULL,
  `course_video` varchar(45) DEFAULT NULL,
  `course_coupon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_category_id`, `course_name`, `course_short_title`, `course_image`, `course_authorname`, `course_credithour`, `course_description`, `course_defficultylevel`, `course_requirement`, `course_price`, `course_free_course`, `course_video`, `course_coupon_id`) VALUES
(2, '6', 'Web Design', 'Learn Yourselt and prepare yourself for the best job interview', '1595758203course-image-1.png', 'Amiruzzaman', 12, 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', '2', 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.\n\nThis course introduces newer features of C ++. There have been several new language standards in the past ten years. Based on the C ++ 11 standard, there have been major language changes and a new standard is currently being published every three years. After C ++ 11 there is therefore C ++ 14, C ++ 17, C ++ 20 and the next one will be C ++ 23. The aim of this course is to familiarize the students with the terminology of the C ++ standards and to teach the most important new concepts and how they can be used in their own code.\n\nType deduction and initialization syntax: Changes in the C ++ type system and the possibility of uniform initialization of objects are introduced here\n\nMove Semantics: C ++ now also allows objects to be moved in addition to copying. The necessary savings expansions are shown and explained using examples\n\nLambda: Lambda functions that allow a functional programming style in C ++ are introduced\n\nExtended OO: Some innovations in the implementation of classes and generally object-oriented programming are presented. Heredity and dynamic polymorphism are also discussed.\n\nSmart pointer: The possibilities of intelligent pointers for easier organization of dynamic memory are shown. Extended Library: Newer parts of the standard library such as random numbers, regular expressions or a library for easier handling of time measurement and time variables are presented. Templates: Some more advanced techniques in dealing with templates such as variadic templates (any number of template arguments) or type traits (conditions for template argument types ) are introduced\n\nC ++ 20 Standard: The last chapter gives an outlook on the latest language standard.handling of time measurement and time', 100, 1, '1595756847course-video-1.mp4', 1),
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
  `course_content_description` longtext,
  `course_content_video_title` varchar(45) DEFAULT NULL,
  `course_content_course_video` varchar(45) DEFAULT NULL,
  `course_content_video_poster` varchar(45) DEFAULT NULL,
  `course_content_video_summary` longtext,
  `course_content_video_excercise` longtext,
  `course_content_video_description` longtext,
  `course_content_audio_title` varchar(45) DEFAULT NULL,
  `course_content_audio` varchar(45) DEFAULT NULL,
  `course_content_audio_description` longtext,
  `course_content_pdf_title` varchar(45) DEFAULT NULL,
  `course_content_pdf` varchar(45) DEFAULT NULL,
  `course_content_pdfdescription` varchar(45) DEFAULT NULL,
  `course_content_online_test` int(11) DEFAULT NULL,
  `course_content_result` int(11) DEFAULT NULL,
  `course_content_contactform` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course_content`
--

INSERT INTO `tbl_course_content` (`course_content_id`, `course_content_course_id`, `course_content_title`, `course_content_description`, `course_content_video_title`, `course_content_course_video`, `course_content_video_poster`, `course_content_video_summary`, `course_content_video_excercise`, `course_content_video_description`, `course_content_audio_title`, `course_content_audio`, `course_content_audio_description`, `course_content_pdf_title`, `course_content_pdf`, `course_content_pdfdescription`, `course_content_online_test`, `course_content_result`, `course_content_contactform`) VALUES
(4, 2, 'Introduction', 'Test', 'Lecture Video', '1595910478lecture-video-1.mp4', '1595910523course-video-poster-1.jpg', 'Let us start with basic programming language features in general. All programming languages ​​typically provide: built-in data types, one can define variables, so you give basically an object of a certain type a name, control structures, and functions thatum first kind of abstraction because they can encapsulate a certain functionality.\r\n\r\nThis is the basic feature set. Then there are two main additional features that modern language ​​provide. The first is that you cdefine your own data types. This is realized by classes in C ++. The second feature is that you have the possibility to use a rich set of library routines. C ++ provides the standard library, that offers a lot of functionality. Examples are input / output, random numbers, strings and so\r\n\r\nNow to the main question: How do we teach C ++ in this course? Of course you should already have some background in C ++ from the first two VHB C ++ programming courses or from other programming experiences with C ++.\r\n\r\nn this course we want to concentrate on newer features of C ++. In the last decade there were several new language standards. Starting from C ++ 11, there were major changes to the language and there is now basically a period of three years until a new standard is released. After C ++ 11, there is C ++ 14,', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS', NULL, 'Audio', '1595910644course-video-1.mp3', 'Let us start with basic programming language features in general. All programming languages ​​typically provide: built-in data types, one can define variables, so you give basically an object of a certain type a name, control structures, and functions that are the first kind of abstraction because they can encapsulate a certain functionality.\r\n\r\nThis is the basic feature set. Then there are two main additional features that modern languages ​​provide. The first is that you can define your own data types. This is realized by classes in C ++. The second feature is that you have the possibility to use a rich set of library routines. C ++ provides the standard library, that offers a lot of functionality. Examples are input / output, random numbers, strings and so on.', 'Lecture Pdf Title', '1595910644pdf-file-1.pdf', 'Let us start with basic programming language', 1, 1, 1),
(5, 2, 'Advance Lecture', 'Advance Lecture', NULL, '1595910825lecture-video-1.mp4', '1595910825course-video-poster-1.png', 'Lecture Summary.Lecture Summary.Lecture Summary.Lecture Summary.Lecture Summary.Lecture Summary.', 'Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.Lecture Excercise.', NULL, 'Audio', '1595910825course-video-1.mp3', 'Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.Lecture Audio Short Description.', 'Pdf Lecture', '1595910825pdf-file-1.pdf', 'Pdf Description.Pdf Description.Pdf Descripti', 1, 1, 1),
(6, 2, 'Dynamic Lecture', 'This course is advanced dynamic web design content.Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1595915852pdf-file-1.pdf', NULL, 1, 1, 1),
(7, 7, 'Test Test', 'Test Test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 'Advance Web Development', 'Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.Advance Web Development.', NULL, '1595911833lecture-video-1.mp4', '1595911834course-video-poster-1.jpg', 'Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.Advance Web Development Summary.', 'Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.Advance Web Development Excercise.', NULL, 'Audio', '1595911834course-video-1.mp3', 'Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.Advance Web Development Lecture Audio Short Description.', 'Advance Web Development', '1595911834pdf-file-1.pdf', 'Advance Web Development pdf Short Description', 1, 1, 1),
(10, 2, 'Test', 'asf', 'asdf', NULL, NULL, 'asdf', 'asdf', NULL, 'asdfasdf', NULL, 'asdf', 'asdf', NULL, 'asdf', 0, 0, 0),
(11, 3, 'Course Lecture 1', NULL, 'Course Lecture Video Title', NULL, NULL, 'Course Lecture Summary', 'Course Lecture Excercise', NULL, NULL, NULL, NULL, 'Course Lecture 1 Pdf', NULL, 'Course Lecture pdf Description', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_module`
--

CREATE TABLE `tbl_course_module` (
  `course_module_id` int(11) NOT NULL,
  `course_module_course_id` int(11) NOT NULL,
  `course_module_name` varchar(45) NOT NULL,
  `course_module_description` longtext,
  `course_module_file` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course_module`
--

INSERT INTO `tbl_course_module` (`course_module_id`, `course_module_course_id`, `course_module_name`, `course_module_description`, `course_module_file`) VALUES
(1, 2, 'Content', 'This course shows and explains newer features of C ++. In the last ten years there have been several new language standards. Starting with C ++ 11, there have been major changes to the language and there is now basically a three-year time span until a new standard is released. After C ++ 11 there are C ++ 14, C ++ 17, C ++ 20, and the next one will be C ++ 23. The purpose of this course is to familiarize you with the terminology of the C ++ standard and to learn the major new features and how to use them in your own code. Of course, it is not really useful to base a C ++ programming course directly on the C ++ standard, because it is not suitable for learning C ++. It is mainly written for compiler constructors and is more of a technical document. Nevertheless, technical terms from the C ++ standard are used and thus a theoretical approach to teaching C ++ is also pursued. In the following the basic terms of the programming language C ++ should be defined correctly. Various newer language constructs (C ++ 11 standard and later) will be reproduced and tasks will be solved with the help of newer language constructs. New language constructs based on the C ++ language standard and code testing should be understood and evaluated independently.', NULL),
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
(46, 42, 'Course Module Delete');

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
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 1, 10),
(9, 2, 7),
(10, 2, 8),
(11, 2, 2),
(12, 1, 2),
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
(41, 1, 46);

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
  `signup_professionalbio` longtext,
  `signup_wblinks` varchar(75) DEFAULT NULL,
  `signup_fblinks` varchar(75) DEFAULT NULL,
  `signup_ttlinks` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`signup_id`, `signup_name`, `signup_email`, `signup_image`, `signup_address`, `signup_phonum`, `signup_password`, `signup_professional_tag`, `signup_professionalbio`, `signup_wblinks`, `signup_fblinks`, `signup_ttlinks`) VALUES
(1, 'Md. Amiruzzaman Munna', 'munna.ak17@gmail.com', NULL, 'gazipur', '01787284068', '$2y$10$wL48zbruyvdeDsD7hl.Km.qBW5YpjNl7NKVxA3fOlISN199k6Ye8a', 'Software Engineer', 'Software Engineer. Professional Laravel Developer', 'https://stackoverflow.com/', 'https://www.facebook.com/', 'https://twitter.com/'),
(4, 'Md. Amiruzzaman Munna', 'test@gmail.com', '1594895584user-image-1.jpg', 'gazipur', '01641064685', '$2y$10$hyQ.ZkjGJYfi5SOeUDwOve4rhba8cAv1N5FNBkpgMV8Ggw1JKor/6', NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `tbl_lecture_files`
--
ALTER TABLE `tbl_lecture_files`
  ADD PRIMARY KEY (`lecture_files_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`permission_id`);

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
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `course_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `tbl_lecture_files`
--
ALTER TABLE `tbl_lecture_files`
  MODIFY `lecture_files_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  MODIFY `role_permission_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_profilelinks`
--
ALTER TABLE `tbl_user_profilelinks`
  MODIFY `user_profilelinks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
