-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2017 at 03:42 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startupfundingclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `welcome_text` varchar(200) NOT NULL,
  `welcome_subtitle` text NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `result_request` int(10) UNSIGNED NOT NULL COMMENT 'The max number of shots per request',
  `status_page` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Offline, 1 Online',
  `email_verification` enum('0','1') NOT NULL COMMENT '0 Off, 1 On',
  `email_no_reply` varchar(200) NOT NULL,
  `email_admin` varchar(200) NOT NULL,
  `captcha` enum('on','off') NOT NULL DEFAULT 'on',
  `file_size_allowed` int(11) UNSIGNED NOT NULL COMMENT 'Size in Bytes',
  `twitter` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `googleplus` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `angellist` varchar(200) NOT NULL,
  `currency_symbol` char(10) NOT NULL,
  `currency_code` varchar(20) NOT NULL,
  `min_investment_amount` int(11) UNSIGNED NOT NULL,
  `max_investment_amount` int(10) UNSIGNED NOT NULL,
  `min_startup_amount` int(11) UNSIGNED NOT NULL,
  `max_startup_amount` int(11) UNSIGNED NOT NULL,
  `payment_gateway` enum('Stripe') NOT NULL DEFAULT 'Stripe',
  `stripe_secret_key` varchar(255) NOT NULL,
  `stripe_public_key` varchar(255) NOT NULL,
  `min_width_height_image` varchar(100) NOT NULL,
  `fee_investment` int(10) UNSIGNED NOT NULL,
  `auto_approve_startups` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `title`, `description`, `welcome_text`, `welcome_subtitle`, `keywords`, `result_request`, `status_page`, `email_verification`, `email_no_reply`, `email_admin`, `captcha`, `file_size_allowed`, `twitter`, `facebook`, `googleplus`, `instagram`, `linkedin`, `angellist`, `currency_symbol`, `currency_code`, `min_investment_amount`, `max_investment_amount`, `min_startup_amount`, `max_startup_amount`, `payment_gateway`, `stripe_secret_key`, `stripe_public_key`, `min_width_height_image`, `fee_investment`, `auto_approve_startups`) VALUES
(1, 'Startup Funding Club', 'Startup Funding Club.', 'Invest in UK Startups', 'SEIS Funds, Angel Investing, Startup Services, Mentoring and Advisory', 'Startup Funding Club', 8, '1', '0', 'no-reply@startupfundingclub.com', 'admin@startupfundingclub.com', 'off', 10240, 'https://twitter.com/Startupfundingc', 'https://www.facebook.com/startupfundingclub', '', '', 'https://www.linkedin.com/company-beta/3856489/', 'https://angel.co/startup-funding-club', '£', 'GBP', 500, 10000000, 1, 1000000000, 'Stripe', 'sk_test_ARt2v7nFjwPLkuS5frQ3cv2L', 'pk_test_MX1EveIPBcvcB3bEt2YZFWL0', '800x400', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `mode` enum('on','off') NOT NULL DEFAULT 'on',
  `image` varchar(200) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `mode`, `image`) VALUES
(1, 'Aerospace', 'Aerospace', 'on', 'default.jpg'),
(2, 'Artificial Intelligence', 'Artificial Intelligence', 'on', 'default.jpg'),
(3, 'Agriculture', 'Agriculture', 'on', 'default.jpg'),
(4, 'Biotech', 'Biotech', 'on', 'default.jpg'),
(5, 'Business Services', 'Business Services', 'on', 'default.jpg'),
(6, 'Data Analytics', 'Data Analytics', 'on', 'default.jpg'),
(7, 'Digital Media', 'Digital Media', 'on', 'default.jpg'),
(8, 'Ecommerce', 'Ecommerce', 'on', 'default.jpg'),
(9, 'Education', 'Education', 'on', 'default.jpg'),
(10, 'Energy', 'Energy', 'on', 'default.jpg'),
(11, 'FinTech', 'FinTech', 'on', 'default.jpg'),
(12, 'Food & Drink', 'Food & Drink', 'on', 'default.jpg'),
(13, 'Gaming', 'Gaming', 'on', 'default.jpg'),
(14, 'Hardware', 'Hardware', 'on', 'default.jpg'),
(15, 'Healthcare', 'Healthcare', 'on', 'default.jpg'),
(16, 'Internet', 'Internet', 'on', 'default.jpg'),
(17, 'IoT', 'IoT', 'on', 'default.jpg'),
(18, 'Life Sciences', 'Life Sciences', 'on', 'default.jpg'),
(19, 'Marketing', 'Marketing', 'on', 'default.jpg'),
(20, 'Media & Entertainment', 'Media & Entertainment', 'on', 'default.jpg'),
(21, 'Mobile', 'Mobile', 'on', 'default.jpg'),
(22, 'Other', 'Other', 'on', 'default.jpg'),
(23, 'Real Estate', 'Real Estate', 'on', 'default.jpg'),
(24, 'Recruitment', 'Recruitment', 'on', 'default.jpg'),
(25, 'Retail', 'Retail', 'on', 'default.jpg'),
(26, 'Robotics', 'Robotics', 'on', 'default.jpg'),
(27, 'SaaS', 'SaaS', 'on', 'default.jpg'),
(28, 'Security', 'Security', 'on', 'default.jpg'),
(29, 'Social Impact', 'Social Impact', 'on', 'default.jpg'),
(30, 'Software', 'Software', 'on', 'default.jpg'),
(31, 'Sports', 'Sports', 'on', 'default.jpg'),
(32, 'Sustainability', 'Sustainability', 'on', 'default.jpg'),
(33, 'Technology', 'Technology', 'on', 'default.jpg'),
(34, 'Telecommunications', 'Telecommunications', 'on', 'default.jpg'),
(35, 'Tourism', 'Tourism', 'on', 'default.jpg'),
(36, 'Transportation', 'Transportation', 'on', 'default.jpg'),
(37, 'Virtual Reality', 'Virtual Reality', 'on', 'default.jpg'),
(38, 'Wearables', 'Wearables', 'on', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'GB', 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL DEFAULT 'default',
  `startups_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filesize` decimal(18,2) NOT NULL,
  `token_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `filename`, `startups_id`, `date`, `path`, `type`, `filesize`, `token_id`) VALUES
(1, 'Cashflow', 1, '2017-04-23 19:38:08', 'cashflow-sfc-jti1d.xlsx', 'xlsx', '1.47', '6KXMQLQch4rwPjwjNfSXCc1ucYBzGX09DTNVIJ3PyyJaMCckOM8cRQ91gRgGAGK4ktHsC7G0ZQQbcs8H5hZwDs9Lixw592nAOjA6gbImSZEGKjPbIvmcOWwNymHAmS6xAHK0azpy4PyenNuaa7I9uZz0AEoQfX9pmj897xsQc1UyIiDdzhmZOKjUjxZeDKjWWDVkiyRe'),
(2, 'Pitchdeck', 1, '2017-04-24 11:14:48', 'pitchdeck-sfc-9hep7.pdf', 'pdf', '10.07', 'lCnDo0tf3ij41Mca1amL1uIsRtAHPHTyz0QEMk2G1a6xNW0IvyehgVisBvCYHgfKIYygzT4U5AyILJTUZ3tCjXQrCJ9dahUZ25PRTtselXTih9daNrXllXcrltoWyj21ZJYxiSUhYdxRq0t81llf5y1xMoLUaj2RzhMkmsNiHIhpey3bcR1zI8jBw2d7keiG1Pq7mggu'),
(3, 'Pitchdeck', 2, '2017-04-24 11:26:38', 'pitchdeck-sfc-9amux.pdf', 'pdf', '2.13', 'k6S0ffeqgwljdfLyDHvFeBOsze1czUKMxZw3RiCQqOpHDEJoxgk57CunnTBycoxEycxukhPULh6uRg0eKC6PUvjiEOEevfc7yDyTXWQazsSKn1F5SzQfcEZra5g0gu7UvSMPSu96DfBJNnsIwnNrEnL9SK20lHbPW9qbr4me9Ybnxj0tLupYjYHKXzh4S8OTL4Blc95q'),
(4, 'Pitchdeck', 3, '2017-04-24 11:41:11', 'pitchdeck-sfc-q86br.pdf', 'pdf', '3.41', 'SwgZogUPtFOsQqlPMuBE8GiEFwDvfFD7aTOha99ZrzkmOBYP1Irnm0t80fFm880FVN4C0WjFslSzY8TiOBLUfByFiXhy8bPcvcuo4en4kQZsmNl8lhaAVYibRY3x8qWZGzJaOIy6iqQWmk9uXwPjTfmTNQMayO7upshryQiEyzvosdRqMpMrVPYfF4plEpvGkAYQvW4o');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE `investments` (
  `id` int(10) UNSIGNED NOT NULL,
  `startups_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `investment` int(11) UNSIGNED NOT NULL,
  `valuation` int(11) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL,
  `oauth_uid` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `anonymous` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 No, 1 Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `startups_id`, `user_id`, `txn_id`, `fullname`, `email`, `country`, `postal_code`, `investment`, `valuation`, `payment_gateway`, `oauth_uid`, `comment`, `date`, `anonymous`) VALUES
(1, 3, 5, 'null', 'Mark Cuban', 'investor@startupfundingclub.com', 'United Kingdom', 'WC1H 8BU', 150000, 2000000, 'Stripe', '', 'Good Luck - Mark', '2017-04-24 12:51:02', '0'),
(2, 2, 5, 'null', 'Mark Cuban', 'investor@startupfundingclub.com', 'United Kingdom', 'WC1H 8BU', 50000, 675000, 'Stripe', '', 'Good Luck Torsion - Mark', '2017-04-24 13:03:36', '0'),
(3, 1, 5, 'null', 'Mark Cuban', 'investor@startupfundingclub.com', 'United Kingdom', 'WC1H 8BU', 200000, 2000000, 'Stripe', '', 'Good Luck Intupod - Mark', '2017-04-24 13:04:31', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `slug`) VALUES
(1, 'Blog Post - 1 ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containingkds kndkfndklfnskdnfsknflknsd Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'blog-1');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `startups`
--

CREATE TABLE `startups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `categories_id` int(10) UNSIGNED NOT NULL,
  `token_id` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `cover` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `oneliner` text NOT NULL,
  `website` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `pitchdeck` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','pending') NOT NULL DEFAULT 'active',
  `goal` int(11) UNSIGNED NOT NULL,
  `equity` decimal(6,2) NOT NULL,
  `valuation` int(11) UNSIGNED NOT NULL,
  `tax` varchar(255) NOT NULL,
  `location` varchar(200) NOT NULL,
  `finalized` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 No 1 Yes',
  `featured` enum('0','1') NOT NULL DEFAULT '0',
  `opportunity` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 No 1 Yes',
  `portfolio` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 No 1 Yes',
  `video` varchar(255) NOT NULL,
  `problem` text NOT NULL,
  `solution` text NOT NULL,
  `market` text NOT NULL,
  `model` text NOT NULL,
  `traction` text NOT NULL,
  `competitors` text NOT NULL,
  `team` text NOT NULL,
  `spend` text NOT NULL,
  `strengths` text NOT NULL,
  `weaknesses` text NOT NULL,
  `why` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `startups`
--

INSERT INTO `startups` (`id`, `user_id`, `categories_id`, `token_id`, `logo`, `cover`, `title`, `description`, `oneliner`, `website`, `twitter`, `facebook`, `linkedin`, `pitchdeck`, `date`, `status`, `goal`, `equity`, `valuation`, `tax`, `location`, `finalized`, `featured`, `opportunity`, `portfolio`, `video`, `problem`, `solution`, `market`, `model`, `traction`, `competitors`, `team`, `spend`, `strengths`, `weaknesses`, `why`) VALUES
(1, 2, 29, 'V8E4UruBXoBWc8YFk5xCCSUiBlcTU32w13CFLLI0vxuhqh66GX2iFYkp5qRUqbcdSA4Zji15cZbkrnphoKuMU0OOrZtj9yCfUGnNoYPYUanry3pqQjW6Z4xACS0Le6yu6CzMz6Z0mSP49hjCbY1NJxhW8LEmoIVNCeB3r8P4fHziYTlE5zCh8SSiVKsXjsiFpHd6l6Tz', '121492889925v2zkgin04neno9b.jpg', '1214928899681gbbqtpkc2ds0ky.jpg', 'Intupod', 'INTU Global Shelter (IGS) was established in 2015 to provide innovative design solutions to meet housing and shelter needs worldwide. Over the past 18 months the company has developed and prototyped products ready for market. IGS shelter products are designed to be scalable for global impact.', 'INTU Global Shelter provides innovative design solutions to meet housing and shelter needs worldwide.', 'http://intupod.com', 'http://www.facebook.com', 'http://www.facebook.com', 'http://www.facebook.com', 'intupod.pdf', '2017-04-22 18:36:30', 'active', 500000, '20.00', 2000000, 'SEIS', 'Belfast, Ireland', '0', '1', '1', '0', 'https://www.youtube.com/embed/dhreqc-WYy8', 'Globally there are currently an estimated 65Million people displaced from their homes, 21Million of them refugees 39% are hosted in Middle East and North Africa, 29% in Africa and 6% in Europe. The average life span of a refugee camp is 14-17 years.', 'The innovation uses poly-based materials to provide a high strength structural form, which is light weight and has exceptional durability and a long lifespan (30-50years). The poly-composite core product creates safe and secure building envelopes or complete structures which are sustainable and fast', 'Housing & shelter, Disaster response, Schools, Medical clinics, Food storage, Tourism and Construction labour camps.', 'IGS objective is to achieve 200 sales in the UK and Ireland over 3 years and within that 3 year period, using our international networks identify global business partners; to provide delivery capacity under license or JV agreements to achieve international sales of up to 2800units.', 'In the UK and Ireland: IGS, branded intupod, provides multi-use accommodation units for outdoor activity, commercial or domestic use. Intupod is targeted at the Tourism, Holiday Parks, Private Land owners etc. Since November 2016 we have generated a pipeline of £300k. £55,000 is confirmed.', 'United Nations, Steel Frames Housing, ATCO / Wernick Group, Porta-Cabin, CSI Domes, Monolithic Domes, J-Domes International, Weatherhaven and Ikea.', 'INTU brings together a diverse and experienced prof. team from the construction, manufacturing and NGO sectors, including; high-performance architectural wall cladding systems, bespoke timber frame housing innovation, international project and program management, business and financial expertise.', 'Market development in UK / Working capital to deliver sales and draw down on matched grant funding / Injection mould product dev. / Modular manufacturing capacity / Development of international partners / Strategic international product placement.', 'The management team have the experience in the global market. Peter founded Habitat for Humanity in Northern Ireland and promoting housing expertise in global markets. Steve Edmondson Programme director for the $26B Masdar Green City. Innovation and technology leader for AECOM in the Middle East.', 'What is holding us back right now is the lack of funds to progress the international opportunities.', 'To become a global business through housing and shelter innovation, focussing on permanent housing for transitional communities. Our Mission is to design, develop and deliver high quality, affordable building systems to scale to help the people displaced from natural and man-made disasters'),
(2, 3, 28, '9TvthKGw1LRc6DLyQ9Y77p37MjcMxHA8yDTGFfRloLIf12u5zp3l6rCkhfUqF3pRSMSt5aeB407CIgJ7g2b1HKKcONsF2K1E45O2OWBiJyUi7bAgbw7bmBVA1mEw0RZ5m4utZiZjP8Lz7dA5n0BO892FWYwvQH5etcc0C37RFQQh86qOeR928OCwYhlVaYoRd69UKtoC', '151493036408pbmlgkraqolau1h.png', '151493036470ip9dfg7dferflih.jpg', 'Torsion Security', 'Torsion is an innovative cyber security company, focussed on preventing insider security breaches and simplifying compliance through automated, precise information access control and validation. Delivered through a cloud-based, cross-platform information security engine for enterprise customers.', 'Torsion is an innovative cyber security company, focussed on preventing insider security breaches.', 'http://www.torsionis.com/', 'https://twitter.com/TorsionIS', 'http://www.facebook.com/torsionis', 'https://www.linkedin.com/company-beta/10042043?pathWildcard=10042043', '', '2017-04-24 11:18:28', 'active', 75000, '10.00', 675000, 'SEIS', 'London', '0', '1', '1', '0', 'https://player.vimeo.com/video/120892916?title=0&byline=0&portrait=0', '89% of companies suffer at least one information security breach each month, which was caused by a staff member. Among a vast sea of documents, constant business change causes 7 in 10 staff to have access to information they shouldn’t have - creating severe security risks and compliance challenges.', 'Torsion is focussed on Access Control and Validation - controlling who has access to what, and validating who has access to what. It constantly ensures that all staff can access only the information they need, and lets auditors quickly validate access in compliance with critical regulations.', 'Torsion identifies with the Identity and Access Control segment of the Cyber Security market. Total Addressable Market: $1.9bn (2016) to $3.5bn (2021) (UK and W. Europe), and $8.1bn (2016) to $14.8bn (2021) (globally). Target verticals are Banking & Finance, Professional Services and Public Sector.', 'Torsion will operate a value-based SaaS business model, based on customer company size, with a 30-day free trial. Basic pricing at £5 per month per customer staff member, with premium features restricted to higher subscription levels. Average customer spend approximately £30K recurring annually.', 'Designed and built prototype, held numerous meetings with CTOs, CIOs and partners to validate demand, iterated the prototype per feedback, and built a functional subset of the product vision as the MVP. First partnership (key route to market) is secured, and first pilot customer is engaged.', 'Most approach the problem by providing tools to IT admins. Building on a false assumption – that IT actually knows what any information is, or who should have it. Torsion builds on a deep understanding of enterprise information management, approaching security as a business challenge, not an IT one.', 'Peter Bradley, Founder & CEO: 13-year consultant in secure information management. Business (MBA) and technical (Comp Sci) background. James Stevenson, Board Advisor: Former VP Sales & Marketing with Citrix & HP, invested 2016. Barry Wakelin, Board Advisor: >25 years exp. in domain, invested 2016', 'Establish the initial technical and delivery scale to support our first customer pilots, and ensure they are delivered perfectly. Most immediate priority is bringing on board a strong CTO, and leading the first customer pilots into first revenues.', 'Torsion has a validated, high-value market proposition, and its MVP is ready. It has established its first partnership, engaged its first pilot customer, and built a customer pipeline. Led by deeply experienced IT industry professionals, and strategically positioned in an enormous growth market.', 'The company is currently under-capitalised to strongly deliver the first customer pilots, and the sole-founder is currently doing both CEO and CTO roles. The funds from the first tranche of this investment process will be used to directly offset both issues.', 'Having spent years working on these problems with past consulting clients, the shortcomings of all available solutions on the market were very apparent. Torsion is bringing genuine innovation to an old problem, and the vibrant response from the industry pros who have seen it has been very exciting.'),
(3, 4, 15, '1as1BEc1VxDG3bJhQP4sR2WTL5gJztsoPb4ny0H7yOyiiD6uxABuFIoSf38fP6EZxeRD2A89eboKaL4zKIalJ9lY3nkUfTBXxO7WNFLfds6c8z4b6sGheOnvGxq4w8T2BzhASSPhnTqVk4WVvNHE4tw86cZ0ZdVJfesLlYi7uR3yrUMDqZ4uvmSb9WBKm2wjMSCdP2Wt', '161493037372v8qp4g72feypm5a.png', '161493037441jrr7miuxykuwqkr.png', 'Jupiter Diagnostics', 'Jupiter Diagnostics offers a faster, cheaper way to obtain accurate blood tests. Our patent-protected reader can replace the lab, delivering multiple tests in 10 minutes from a prick of blood at prices a third cheaper. With customers lined up, we are looking to top up our recent &pound;1.6m round.', 'Jupiter Diagnostics offers a faster, cheaper way to obtain accurate blood tests', 'http://www.jupiterdiagnostics.com', '', '', 'https://www.linkedin.com/company-beta/10249729/?pathWildcard=10249729', '', '2017-04-24 11:35:02', 'active', 500000, '20.00', 2000000, 'EIS', 'London', '0', '1', '1', '0', '', 'Clinic-based doctors lack ready access to reliable blood tests. Today’s solution – either sending the patient or a blood sample to a lab – is fundamentally inefficient, as doctors have to wait a day or more for this basic medical information, meaning diagnosis and treatment are delayed.', 'Our answer is to offer faster and cheaper blood testing using a low-cost handheld reader. Thanks to the company’s patented technology, Jupiter can replace the lab, delivering similar quality results in ten minutes for multiple tests from a prick of blood – and at prices a third cheaper.', 'Our first products are for the £100 million IVF test market, where current IVF blood testing is inconvenient and costly.', 'We follow the standard business model in the medical diagnostics sector, providing readers for free and making money on single-use disposable test cards. We will use specialist distributors to reach target customers, and expect to capture 25% of the reimbursed price of the test.', 'We have confirmed interest from private IVF clinics and gynaecologists in UK and Germany, and an agreement in place with Concile, a distributor already selling point-of-care tests to target customers in Germany and Spain. We are performing clinical studies at the Royal Free Hospital in London.', 'Competitors are big hospital laboratories, and desktop analysers or smaller mini-analysers which cost thousands of pounds. Laboratories are cheap but slow, while desktop analysers are expensive and only makes sense in the largest clinics.', 'Chris Ball, CEO: Ex-VC and medical doctor, launched £200m blood glucose meter for Johnson and Johnson Gareth Jones, CTO: Serial inventor for 10 UK diagnostic companies Dick Sandberg, Chair: Chair of Oxford Immunotec, where he raised £50m and listed it on NASDAQ. Founded and sold Dianon Systems', '1) Working capital to allow a longer runway to demonstrate sales growth 2) Expansion of tests on platform', 'Experienced management team with track record of delivering value to investors Well-developed patent-protected technology with clear route to market Proven demand with clear route to market Attractive exit opportunities', 'Tight budgets leave little room for error: raising additional capital now will clearly more the company through its next valuation increase Close to market but 12 months to go: at "works-like/looks-like" prototype stage - delivering final version Q2-17 for validation annd clinical testing', 'I used to work as a doctor and found taking blood and waiting for the results was a painful experience for my patients and me. I decided there had to be a better way and became an entrepreneur to find an answer which could make healthcare more efficient and better for patients.');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'default',
  `startups_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `title` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shareholding` decimal(6,2) NOT NULL,
  `token_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `startups_id`, `date`, `avatar`, `title`, `bio`, `linkedin`, `email`, `shareholding`, `token_id`) VALUES
(1, 'David Maxwell', 1, '2017-04-23 19:51:00', 'david maxwell-sfc-cbexo.jpg', 'Co-founder', 'INTU Global Shelter (IGS) was established in 2015 to provide innovative design solutions to meet housing and shelter needs worldwide. Over the past 18 months the company has developed and prototyped products ready for market. IGS shelter products are designed to be scalable for global impact.', 'https://www.linkedin.com/in/david-maxwell-842a68140/', 'david@startupfundingclub.com', '13.40', 'AmQg7DzZBwyxkUUI6Zwv36ywCRz0mit1MYPfhmZSrVtvxh4wGxzlwAXFuap2VFfbAX9IoG1CuYg10ZJeBmIiCnhWGu2ScoTXy8eujvbLxZQ8FB0lBD19kxvsgeKsoGZSo2t9BaqMoJ2lJJF1Zqo4yjmYycTBAswwtAgUer2lLhKUkMAj9EKieoLuJWZK74udTivsDIPH'),
(2, 'Peter Farquharson', 1, '2017-04-23 20:38:02', 'peter farquharson-sfc-7upsn.jpg', 'Co-founder', 'Pleased to see EBar Initiatives receiving column inches.....\r\nAberdeen is a fantastic place to be base to start up a firm!', 'https://www.linkedin.com/', 'peter@startupfundingclub.com', '17.50', '9xsZ56wkRdMyYNrAY972dQOu8jNtiv4B6deVWCj4R7zpms5VUN1Y6g5cGziuylDsqeHQnIlGa945wD9RmTTGvW1diMV4qtpo1x4uLVfYS7U60Pt5Hf6FJnu1SVqDLP0g6OYb5tk07khham7dWaRgJnCdxaY1pORk1rY6mwgIskYumHKANu41RhafBRuKwcClhCOmIPnf'),
(3, 'Peter Bradley', 2, '2017-04-24 11:27:49', 'peter bradley-sfc-9j2yg.jpg', 'CEO', 'Peter has spent a career as a consultant, specializing in secure information management. His deep understanding of the nature of information flow and lifecycle in organisations enables him to make a powerful and effective contribution to the information security discussion.', 'https://www.linkedin.com/in/petebradley/', 'peter.bradley@torsionis.com', '85.00', 'DJp1Ogo81rYhSj2WnJkqgTR7Hre3GBEHMUQhT6oJgdBXjVdlATEFM88vK36DEM8Ex5DB9JEdzYWAHj2Eatt4Tb4rLXiS1ADyo05crNgTdAtm4k8zD5ZJQ4sSb43XQWYwfuWWJTOGIiwYaRXGlBy52iVvwLofaf0MGYH5cT5kwWiVlmGCAlLInczWmQ1NGJRWkhR4qmmX'),
(4, 'Chris Ball', 3, '2017-04-24 11:42:04', 'chris ball-sfc-vko3j.jpg', 'CEO', 'Life sciences companies commercialization, management and investment', 'https://www.linkedin.com/in/chris-ball-67274/', 'chris.ball@jupiterdiagnostics.com', '35.00', 'zo8jpIPfXfUEkX49G7V0ojMCddZwn62KCSOzUrsCdytLXOSCPZCMSSJY6LszjbJozM2nuWMW45VPC6I9PzpzjgzwI4Se0MDztS5S0rwHxmBdk1H0H7zvEWEtNQ8YcLRzMTNUni79zdYISnPb1fjZ7pAlLNxMekhiLUf1x5xL687v4SCtGK6sYn3qCeW25HagkK4zQy5e');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startups_id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `countries_id` char(25) NOT NULL,
  `password` char(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(70) NOT NULL,
  `status` enum('pending','active','suspended','delete') NOT NULL DEFAULT 'active',
  `role` enum('normal','admin','startup','investor') NOT NULL DEFAULT 'normal',
  `remember_token` varchar(100) NOT NULL,
  `token` varchar(80) NOT NULL,
  `confirmation_code` varchar(125) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_gateway` varchar(50) NOT NULL,
  `bank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `countries_id`, `password`, `email`, `date`, `avatar`, `status`, `role`, `remember_token`, `token`, `confirmation_code`, `updated_at`, `created_at`, `payment_gateway`, `bank`) VALUES
(1, 'Daniel Tait', '1', '$2y$10$eAMKLcKxjtSHkSKuvGIpZeS7nHCPhdo88qn4qBrT3P5PN8dwABP8G', 'admin@startupfundingclub.com', '2017-04-05 11:04:42', '11491342072qzpjasbzac1nwxw.jpg', 'active', 'admin', 'MrHmxpVE4NJkFGoDQeLPHVwmBVQJxQDmyLmkPA15mZOqHx6yVBR720EOxXYC', 'Wy4VkAl2dxHb9WHoXjTowSGPXFPnEQHca6RBe2yeqqmRafs0hSbCEobhNkZZAbCDIru60ceLzAAOI3fj', '', '2017-04-24 11:49:10', '2017-04-05 15:34:42', '', ''),
(2, 'David Maxwell', '1', '$2y$10$Lb35snFQGOl25DEYn3/kQOf9HMA0YFkX5BoY5nIIEheGnSEDM0A/K', 'intupod@startupfundingclub.com', '2017-04-22 19:36:30', '121492988186b9fvw3nsqcscpgn.jpg', 'active', 'startup', 'LqqMQQb4sZnm0LSVxlwWZ6elsPVYgTUUmawlJEEKSQd1mWScmXN7cTmz9nar', 'j7Uwtr1JckVVZfc4S7agpQNWnU3aPWP5c2RUnFPUXqBxPVkKbXj0Frsy1LIEiVnaeFbccgo11ml', '', '2017-04-24 12:02:47', '2017-04-22 18:36:30', '', ''),
(3, 'Peter Bradley', '1', '$2y$10$g35Q0zpvz26wNuTA59eBees/vC74sr7CE9YSqqq6ZjF04JdPispVq', 'torsion@startupfundingclub.com', '2017-04-24 12:18:28', '151493037213zmpmoiy0hjl4yqg.jpg', 'active', 'startup', '5uRsffM0TROSOFghuAUqYiqBrHB6GL7O1aVNx4cwImJ6FoUpH1jE3ydQOaud', 't8fRL2ISZEfjf5ZqeMWVCLD7PnJDcxlWcL6Buh3GuBF3p7jUTVF4aCyQ9Me8MQSf3PC9ptYHa9k', '', '2017-04-24 12:00:36', '2017-04-24 11:18:28', '', ''),
(4, 'Chris Ball', '1', '$2y$10$PeI71g/4pDO1zJGvI7txt.ZZeghg.RjPpvd8LS01COVXuxHWl9cHG', 'jupiter@startupfundingclub.com', '2017-04-24 12:35:02', '161493037953duskuj3btdwibsv.jpg', 'active', 'startup', 'nSZgaI546EuCHfipJWFpTl6Gv8oRfa7Pogfe1Ks2gPcLt1VMvgjwwijsjMjW', 'FI50sRATTP0BdgiUOpWrackvUWuEaZGuj5h5O1ryRhPnszgOHRjXN5nARZr3dTGr9AvrPCUfHul', '', '2017-04-24 12:00:16', '2017-04-24 11:35:02', '', ''),
(5, 'Mark Cuban', '1', '$2y$10$JxwyZcxRhY4ZztvtjuSa2OyYt6JZeYVqPqFnCNk.98Jpqfka5QWkS', 'investor@startupfundingclub.com', '2017-04-24 12:45:10', '171493038203tzmv2h2yzwc0bni.jpg', 'active', 'investor', 'tzISNgjVcHyHJlb2jtg0c6CcaLmepMa4dzI8NlnNmgqkNZjeBwwftArIt4pm', 'wE5FY1yZtyg12w23IoLfaMS0Cxl0TDWVF0guW12W1QbLIbt3gtLFnQSmp1po4MSvy3y7Sj67XwJ', '', '2017-04-24 11:53:27', '2017-04-24 11:45:10', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token_id` (`token_id`),
  ADD KEY `startups_id` (`startups_id`);

--
-- Indexes for table `investments`
--
ALTER TABLE `investments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `startups_id` (`startups_id`),
  ADD KEY `users_id` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hash` (`token`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `startups`
--
ALTER TABLE `startups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_id` (`token_id`),
  ADD KEY `author_id` (`user_id`,`status`,`token_id`),
  ADD KEY `goal` (`goal`),
  ADD KEY `categories_id` (`categories_id`),
  ADD KEY `valutation` (`valuation`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token_id` (`token_id`),
  ADD KEY `startups_id` (`startups_id`),
  ADD KEY `startups_id_2` (`startups_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_id` (`token_id`),
  ADD KEY `author_id` (`token_id`),
  ADD KEY `image` (`image`),
  ADD KEY `category_id` (`startups_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username` (`status`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `investments`
--
ALTER TABLE `investments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `startups`
--
ALTER TABLE `startups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
