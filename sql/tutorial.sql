CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200),
    Email varchar(200),
    Phone varchar(12),
    Password varchar(200)
);
CREATE TABLE reportlost(
    litemId int PRIMARY KEY AUTO_INCREMENT,
    litemName varchar(30),
    liCategory   
    LostDate date,
    lLostLocation varchar(50),
    lLostTime enum('m', 'a', 'e'),
    lItemDescription varchar(50),
    Contact bigint(11),
    itemimage
);
CREATE TABLE reportlost(
    fitemId int PRIMARY KEY AUTO_INCREMENT,
    fitemName varchar(30), 
    fiCategory,  
    FDate date,
    fLocation varchar(50),
    fTime enum('m', 'a', 'e'),
    fItemDescription varchar(50),
    Contact bigint(11),
    fitemimage,
);

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Bag'),
(4, 'Watch'),
(5, 'others'),
(6, 'Books'),
(7, 'Stationary'),
(9, 'Mobile'),
(11, 'keys'),
(13, 'Notes'),
;