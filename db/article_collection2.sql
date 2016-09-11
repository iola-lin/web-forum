-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016-08-31 09:14:11
-- 伺服器版本: 5.6.30
-- PHP 版本： 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `article_collection`
--

-- --------------------------------------------------------

--
-- 資料表結構 `article_list`
--

CREATE TABLE IF NOT EXISTS `article_list` (
  `article_no` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `at_board` varchar(30) NOT NULL,
  `bulletinOrNot` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `article_list`
--

INSERT INTO `article_list` (`article_no`, `title`, `author`, `time`, `content`, `at_board`, `bulletinOrNot`) VALUES
(1, '測試公告1', '我是版主123', '2016-08-29 12:59:11', '測試測試，每帖請至少兩行。<br>否則刪文<br>by硬湊行數的版主', 'postAtIntro', 1),
(2, '測試文章1', '一介白衣', '2016-08-29 13:01:24', '大家好，我是某某某。<br>你們也許有聽過我，也許沒有。<br>但我們總會在世上某處相遇。', 'postAtIntro', 0),
(5, '創作版頭香', '測試版主', '2016-08-29 13:30:13', '沒有創作，但為了測試這個網站必須做出些犧牲(?<br>為了符合版規再多寫一行<br>測試王 筆', 'postAtCreate', 0),
(6, '心得版Top 1 pose', '測試版主', '2016-08-29 13:31:25', '沒錯，<br>又是我<br>測試王 筆', 'postAtReview', 0),
(7, '創作版版規', 'by 創新進取', '2016-08-29 14:06:33', '要貼東西<br>要貼介紹<br>有空上範例', 'postAtCreate', 1),
(8, '心得版版規', 'by 心想事成', '2016-08-29 14:07:26', '請貼自己的觀點，不得隨意轉載<br>要貼介紹<br>有空上範例', 'postAtReview', 1),
(9, '發佈測試1', '作者A', '2016-08-30 08:04:02', '第一行\r\n第二行\r\n第三行', 'postAtReview', 0),
(10, '標題1', '作者A', '2016-08-31 08:03:29', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(11, '標題2', '作者B', '2016-08-31 08:03:37', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(12, '標題3', '作者C', '2016-08-31 08:03:46', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(13, '標題4', '作者D', '2016-08-31 08:03:54', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(14, '標題5', '作者E', '2016-08-31 08:04:00', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(15, '標題6', '作者F', '2016-08-31 08:04:13', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(16, '標題7', '作者G', '2016-08-31 08:08:36', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(17, '標題8', '作者H', '2016-08-31 08:08:46', '第一行<br>第二行<br>第三行', 'postAtCreate', 0),
(18, '公告2', '版主123', '2016-08-31 09:12:42', '內容', 'postAtCreate', 1),
(19, '公告3', '版主123', '2016-08-31 09:12:50', '內容', 'postAtCreate', 1),
(20, '公告4', '版主123', '2016-08-31 09:12:55', '內容', 'postAtCreate', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `draft_list`
--

CREATE TABLE IF NOT EXISTS `draft_list` (
  `title` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `at_board` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `draft_list`
--

INSERT INTO `draft_list` (`title`, `author`, `content`, `at_board`) VALUES
('草稿測試1', '作者ABC', '第一行 結束\r\n第二行 結束\r\n第三行 結束', 'postAtReview'),
('草稿測試2', '作者DEF', '第一行 結束\r\n第二行 結束\r\n第三行 結束', 'postAtReview');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `article_list`
--
ALTER TABLE `article_list`
  ADD PRIMARY KEY (`article_no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `article_list`
--
ALTER TABLE `article_list`
  MODIFY `article_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
