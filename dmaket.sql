/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - dmaket
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dmaket` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dmaket`;

/*Table structure for table `board` */

DROP TABLE IF EXISTS `board`;

CREATE TABLE `board` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(15) NOT NULL,
  `wdate` date NOT NULL,
  `title` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

/*Data for the table `board` */

insert  into `board`(`no`,`userid`,`wdate`,`title`,`content`,`attachment`) values 
(1,'user1','2022-06-03','물품 문의','물품 문의',''),
(2,'user1','2022-06-03','물품 문의','물품 문의',''),
(3,'user1','2022-06-03','물품 문의','물품 문의',''),
(4,'user1','2022-06-03','물품 문의','물품 문의',''),
(5,'user1','2022-06-03','물품 문의','물품 문의',''),
(6,'user1','2022-06-03','물품 문의','물품 문의',''),
(7,'user1','2022-06-03','물품 문의','물품 문의',''),
(8,'user1','2022-06-03','물품 문의','물품 문의',''),
(9,'user1','2022-06-03','물품 문의','물품 문의',''),
(10,'user1','2022-06-03','물품 문의','물품 문의',''),
(11,'user1','2022-06-03','물품 문의','물품 문의',''),
(12,'user1','2022-06-03','물품 문의','물품 문의',''),
(13,'user1','2022-06-03','물품 문의','물품 문의',''),
(14,'user1','2022-06-03','물품 문의','물품 문의',''),
(15,'user1','2022-06-03','물품 문의','물품 문의',''),
(54,'master','2022-06-03','로그인이 안되는 경우','회원가입 시 입력한\r\n이메일과 비밀번호를 확인하세요.',''),
(55,'master','2022-06-03','물품 1','물품 1','shopping1.JPG'),
(56,'master','2022-06-03','물품 2','물품 2','shopping2.JPG'),
(57,'master','2022-06-03','물품 3','물품 3','shopping3.JPG'),
(58,'master','2022-06-03','물품 4','물품 4','shopping4.JPG'),
(59,'master','2022-06-03','물품 5','물품 5','shopping5.JPG'),
(60,'master','2022-06-03','물품 6','물품 6','shopping6.JPG'),
(61,'master','2022-06-03','리뷰 작성 시 주의사항','리뷰 작성 시 주의사항',''),
(62,'master','2022-06-03','문의 작성 시 주의사항','문의 작성 시 주의사항',''),
(63,'master','2022-06-03','회원정보 수정 관련','회원정보 수정 관련',''),
(64,'master','2022-06-03','회원탈퇴 후 재가입','회원탈퇴 후 재가입 가능.',''),
(65,'master','2022-06-03','이용 불만사항 ','이용 불만사항 ',''),
(66,'master','2022-06-03','내 정보 확인','내 정보 확인',''),
(67,'master','2022-06-03','파일업로드','ㅇㅇㅇ','view1.JPG');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `userid` varchar(15) NOT NULL,
  `sellname` varchar(40) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`sellname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

insert  into `cart`(`userid`,`sellname`,`qty`,`price`) values 
('master','UV프로텍터 멀티디펜스',1,34000),
('master','메타그린 슬림업',2,122400),
('user1','네이처스웨이 비타구미 비타민D',2,69800),
('user1','칠성사이다 제로',1,22900);

/*Table structure for table `orditem` */

DROP TABLE IF EXISTS `orditem`;

CREATE TABLE `orditem` (
  `ordno` varchar(20) NOT NULL,
  `seq` int(2) NOT NULL,
  `sellname` varchar(40) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`ordno`,`seq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `orditem` */

insert  into `orditem`(`ordno`,`seq`,`sellname`,`qty`,`price`) values 
('001',1,'UV프로텍터 멀티디펜스',1,34000),
('001',2,'칠성사이다 제로',2,45800),
('002',1,'칠성사이다 제로',3,68700),
('003',1,'UV프로텍터 멀티디펜스',1,34000),
('003',2,'메타그린 슬림업',1,61200);

/*Table structure for table `porder` */

DROP TABLE IF EXISTS `porder`;

CREATE TABLE `porder` (
  `ordno` varchar(20) NOT NULL,
  `userid` varchar(15) NOT NULL,
  `orddate` date NOT NULL,
  `ADDRESS_ZIPCODE` int(5) NOT NULL,
  `ADDRESS_ROAD` varchar(30) NOT NULL,
  `ADDRESS_DETAIL` varchar(30) NOT NULL,
  `ADDRESS_SUBDETAIL` varchar(30) NOT NULL,
  `omunt` int(11) NOT NULL,
  `delant` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`ordno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `porder` */

insert  into `porder`(`ordno`,`userid`,`orddate`,`ADDRESS_ZIPCODE`,`ADDRESS_ROAD`,`ADDRESS_DETAIL`,`ADDRESS_SUBDETAIL`,`omunt`,`delant`,`total`) values 
('001','user1','2022-05-31',11159,'경기 포천시 호국로 1007','공과대학 4층','(선단동)',79800,3000,82800),
('002','master','2022-06-03',11159,'경기 포천시 호국로 1007','공과대학 4층',' (선단동)',68700,3000,71700),
('003','master','2022-06-03',11159,'경기 포천시 호국로 1007','공과대학 4층',' (선단동)',95200,3000,98200);

/*Table structure for table `selllist` */

DROP TABLE IF EXISTS `selllist`;

CREATE TABLE `selllist` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `selllist` */

insert  into `selllist`(`id`,`name`,`price`,`photo`) values 
(1,'UV프로텍터 멀티디펜스',34000,'shopping1.jpg'),
(2,'메타그린 슬림업',61200,'shopping2.jpg'),
(3,'칠성사이다 제로',22900,'shopping3.jpg'),
(4,'네이처스웨이 비타구미 비타민D',34900,'shopping4.jpg'),
(5,'펩시콜라 제로',21900,'shopping5.jpg'),
(6,'탐스제로',21900,'shopping6.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` varchar(15) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `ADDRESS_ZIPCODE` int(5) NOT NULL,
  `ADDRESS_ROAD` varchar(30) NOT NULL,
  `ADDRESS_DETAIL` varchar(30) NOT NULL,
  `ADDRESS_SUBDETAIL` varchar(30) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`userid`,`pwd`,`name`,`email`,`phone`,`ADDRESS_ZIPCODE`,`ADDRESS_ROAD`,`ADDRESS_DETAIL`,`ADDRESS_SUBDETAIL`) values 
('master','000000','관리자','master@ccc.com','10',11159,'경기 포천시 호국로 1007','공과대학 4층',' (선단동)'),
('user1','123123','김유저','aaa@aaa.com','010-1111-1111',13117,'경기 성남시 수정구 복정로 76','1호관',' (복정동)'),
('user2','000000','김말똥','bbb@bbb.com','010-2222-3323',11340,'경기 동두천시 벌마들로40번길 30','2호관',' (상패동)'),
('user3','111111','박소똥','ccc@ccc.com','010-5545-4434',13117,'경기 성남시 수정구 복정로 76','3호관',' (복정동)'),
('user5','123123','고박사','sss@sss.com','010-5455-5555',11159,'경기 포천시 호국로 1007','인문대학',' (선단동)');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
