# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.34)
# Database: nummry
# Generation Time: 2022-03-08 09:02:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `correct_ans` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;

INSERT INTO `answers` (`id`, `question_id`, `correct_ans`, `created_at`, `updated_at`)
VALUES
	(1,1,'15','2022-03-07 12:30:31','2022-03-07 12:30:31'),
	(2,2,'14','2022-03-07 12:30:52','2022-03-07 12:30:52'),
	(3,3,'test','2022-03-07 12:36:09','2022-03-07 12:36:09'),
	(4,4,'0','2022-03-07 17:20:24','2022-03-07 17:20:24');

/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comp_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comp_category`;

CREATE TABLE `comp_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comp_category` WRITE;
/*!40000 ALTER TABLE `comp_category` DISABLE KEYS */;

INSERT INTO `comp_category` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'Learning Exercises',NULL,NULL),
	(2,'Tests',NULL,NULL),
	(3,'Incorrect Answer Percentage',NULL,NULL),
	(4,'Correct Answer Percentage',NULL,NULL),
	(5,'Time Correct Answers',NULL,NULL),
	(6,'Incorrect Answer Proximity',NULL,NULL);

/*!40000 ALTER TABLE `comp_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comparisons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comparisons`;

CREATE TABLE `comparisons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comp_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comparisons` WRITE;
/*!40000 ALTER TABLE `comparisons` DISABLE KEYS */;

INSERT INTO `comparisons` (`id`, `comp_category_id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,1,'Overall ',NULL,NULL),
	(2,1,'Counting Tens',NULL,NULL),
	(3,1,'Counting Pictures',NULL,NULL),
	(4,2,'Initial',NULL,NULL),
	(5,2,'Weekly',NULL,NULL),
	(6,2,'Monthly',NULL,NULL),
	(7,3,'100%-95%',NULL,NULL),
	(8,3,'94%-90%',NULL,NULL),
	(9,3,'89%-84%',NULL,NULL),
	(10,3,'83%-78%',NULL,NULL),
	(11,3,'77%-72%',NULL,NULL),
	(12,3,'71%-66%',NULL,NULL),
	(13,3,'65%-60%',NULL,NULL),
	(14,3,'59%-54%',NULL,NULL),
	(15,3,'53%-48%',NULL,NULL),
	(16,3,'47%-42%',NULL,NULL),
	(17,3,'43%-37%',NULL,NULL),
	(18,3,'36%-30%',NULL,NULL),
	(19,4,'100%-95%',NULL,NULL),
	(20,4,'94%-90%',NULL,NULL),
	(21,4,'89%-84%',NULL,NULL),
	(22,4,'83%-78%',NULL,NULL),
	(23,4,'77%-72%',NULL,NULL),
	(24,4,'71%-66%',NULL,NULL),
	(25,4,'65%-60%',NULL,NULL),
	(26,4,'59%-54%',NULL,NULL),
	(27,4,'53%-48%',NULL,NULL),
	(28,4,'47%-42%',NULL,NULL),
	(29,4,'43%-37%',NULL,NULL),
	(30,4,'36%-30%',NULL,NULL),
	(31,5,'<30 Seconds',NULL,NULL),
	(32,5,'31-60 Seconds',NULL,NULL),
	(33,5,'1-2 Minutes',NULL,NULL),
	(34,5,'2-3 Minutes',NULL,NULL),
	(35,5,'3-4 Minutes',NULL,NULL),
	(36,5,'4-5 Minutes',NULL,NULL),
	(37,5,'5-6 Minutes',NULL,NULL),
	(38,5,'>6 Minutes',NULL,NULL),
	(39,6,'One',NULL,NULL),
	(40,6,'Two-Three',NULL,NULL),
	(41,6,'Four Or More',NULL,NULL);

/*!40000 ALTER TABLE `comparisons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table lessons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lessons`;

CREATE TABLE `lessons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `datetime` timestamp NULL DEFAULT NULL,
  `complete_status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `token` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pause_timer` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;

INSERT INTO `lessons` (`id`, `name`, `datetime`, `complete_status`, `user_id`, `token`, `created_at`, `updated_at`, `pause_timer`)
VALUES
	(1,'test','2022-03-08 00:00:00',1,2,'6d051a847d269b9cd3f4353af3eb92e4','2022-03-07 12:30:04','2022-03-07 12:44:59',0),
	(2,'test','2022-03-04 00:00:00',1,2,'5b65131bda6ac28ea647a0271c525a3f','2022-03-07 12:30:10','2022-03-07 12:33:43',0),
	(3,'test','2022-02-02 00:00:00',0,2,'c8602a463be6ca29c64eeb0dd1a80755','2022-03-07 17:20:03','2022-03-07 17:20:03',0),
	(4,'test','2022-03-05 00:00:00',4,2,'5cf15c62f03ea90df7ce9201f41016b5','2022-03-07 17:38:29','2022-03-07 17:38:29',0),
	(5,'test','2022-03-21 00:00:00',3,2,'70c512a7cbdfec012258159f95a913be','2022-03-07 17:38:36','2022-03-07 17:38:36',0);

/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) NOT NULL DEFAULT '',
  `question_name` varchar(255) NOT NULL DEFAULT '',
  `question_main` text,
  `q_one` text,
  `q_two` text,
  `q_three` text,
  `q_four` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `subject_name`, `question_name`, `question_main`, `q_one`, `q_two`, `q_three`, `q_four`, `created_at`, `user_id`, `lesson_id`, `status`, `updated_at`)
VALUES
	(1,'Test subject','Test question','6+9',NULL,NULL,NULL,NULL,'2022-03-07 18:03:35',2,2,1,'2022-03-07 12:33:35'),
	(2,'Test subject2','Test question22','7+7','14','12','8','-0','2022-03-07 18:03:43',2,2,1,'2022-03-07 12:33:43'),
	(3,'Test subject','Test question','test',NULL,NULL,NULL,NULL,'2022-03-07 18:14:59',2,1,1,'2022-03-07 12:44:59'),
	(4,'rererrer','Test questionfff','7-7',NULL,NULL,NULL,NULL,'2022-03-07 17:20:24',2,3,0,'2022-03-07 17:20:24');

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table results
# ------------------------------------------------------------

DROP TABLE IF EXISTS `results`;

CREATE TABLE `results` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answer_user` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;

INSERT INTO `results` (`id`, `question_id`, `answer_id`, `user_id`, `answer_user`, `created_at`, `updated_at`, `lesson_id`, `time`)
VALUES
	(1,1,NULL,2,'15','2022-03-07 12:33:35','2022-03-07 12:33:35',2,'2022-03-07 12:33:35'),
	(2,2,NULL,2,'12','2022-03-07 12:33:43','2022-03-07 12:33:43',2,'2022-03-07 12:33:43'),
	(3,3,NULL,2,'testy','2022-03-07 12:44:59','2022-03-07 12:44:59',1,'2022-03-07 12:44:59');

/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resume_pause
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resume_pause`;

CREATE TABLE `resume_pause` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pause` timestamp NULL DEFAULT NULL,
  `resume` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `resume_pause` WRITE;
/*!40000 ALTER TABLE `resume_pause` DISABLE KEYS */;

INSERT INTO `resume_pause` (`id`, `pause`, `resume`, `created_at`, `updated_at`, `lesson_id`, `user_id`)
VALUES
	(1,'2022-03-07 12:32:19','2022-03-07 12:33:02','2022-03-07 12:32:19','2022-03-07 12:33:02',2,2),
	(2,'2022-03-07 12:32:49','2022-03-07 12:33:02','2022-03-07 12:32:49','2022-03-07 12:33:02',2,2),
	(5,'2022-03-07 12:39:28','2022-03-07 12:40:32','2022-03-07 12:39:28','2022-03-07 12:40:32',1,2),
	(6,'2022-03-07 12:40:49','2022-03-07 12:40:59','2022-03-07 12:40:49','2022-03-07 12:40:59',1,2);

/*!40000 ALTER TABLE `resume_pause` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stat_progress
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stat_progress`;

CREATE TABLE `stat_progress` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stat_progress_title_id` int(11) DEFAULT NULL,
  `metric_one` varchar(255) DEFAULT NULL,
  `metric_two` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stat_progress` WRITE;
/*!40000 ALTER TABLE `stat_progress` DISABLE KEYS */;

INSERT INTO `stat_progress` (`id`, `stat_progress_title_id`, `metric_one`, `metric_two`, `created_at`, `updated_at`, `user_id`)
VALUES
	(1,1,'4:05','2/2/22',NULL,NULL,2),
	(2,1,'4:12','2/3/22',NULL,NULL,2),
	(4,4,'4:06','Correct','2022-03-07 10:04:00','2022-03-07 10:04:00',2),
	(5,2,'78%','Correct','2022-03-07 10:09:51','2022-03-07 10:09:51',2),
	(6,1,'4:06','Average','2022-03-07 10:10:09','2022-03-07 10:10:09',2);

/*!40000 ALTER TABLE `stat_progress` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stat_progress_title
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stat_progress_title`;

CREATE TABLE `stat_progress_title` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stat_id` int(11) DEFAULT NULL,
  `timeprogress_name` varchar(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stat_progress_title` WRITE;
/*!40000 ALTER TABLE `stat_progress_title` DISABLE KEYS */;

INSERT INTO `stat_progress_title` (`id`, `stat_id`, `timeprogress_name`, `title`, `created_at`, `updated_at`)
VALUES
	(1,1,'7-days','Increase of 17 Seconds',NULL,NULL),
	(2,1,'7-days','Increase of 10 Seconds','2022-03-07 09:26:55','2022-03-07 09:26:55'),
	(3,1,'2-weeks','Increase of 90 Seconds','2022-03-07 09:27:09','2022-03-07 09:27:09'),
	(4,4,'7-days','Increase of 9 Seconds','2022-03-07 09:27:57','2022-03-07 09:27:57');

/*!40000 ALTER TABLE `stat_progress_title` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comparison_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `metric_one` varchar(255) DEFAULT NULL,
  `metric_two` varchar(255) DEFAULT NULL,
  `progress` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `stats` WRITE;
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;

INSERT INTO `stats` (`id`, `comparison_id`, `title`, `metric_one`, `metric_two`, `progress`, `created_at`, `updated_at`, `user_id`)
VALUES
	(1,1,'Overall Answers','79%','Correct',1,NULL,NULL,2),
	(2,1,'Overall Time','4:02','Average',0,NULL,NULL,2),
	(3,2,'Free Response Answers: Overall','78%','Correct',NULL,'2022-02-28 17:18:53','2022-02-28 17:18:53',2),
	(4,2,'Free Response Answers Time','4:06','Average',1,'2022-02-28 17:20:29','2022-02-28 17:20:29',2);

/*!40000 ALTER TABLE `stats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teacher_student
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teacher_student`;

CREATE TABLE `teacher_student` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `teacher_student` WRITE;
/*!40000 ALTER TABLE `teacher_student` DISABLE KEYS */;

INSERT INTO `teacher_student` (`id`, `teacher_id`, `student_id`, `created_at`, `updated_at`)
VALUES
	(1,13,2,'2022-03-07 15:57:35','2022-03-07 15:57:35');

/*!40000 ALTER TABLE `teacher_student` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tests`;

CREATE TABLE `tests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `complete_status` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table testtimes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `testtimes`;

CREATE TABLE `testtimes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `testtimes` WRITE;
/*!40000 ALTER TABLE `testtimes` DISABLE KEYS */;

INSERT INTO `testtimes` (`id`, `user_id`, `lesson_id`, `start_time`, `end_time`, `created_at`, `updated_at`)
VALUES
	(1,2,1,'2022-03-07 12:31:48','2022-03-07 12:44:59','2022-03-07 12:31:48','2022-03-07 12:44:59'),
	(2,2,2,'2022-03-07 12:31:56','2022-03-07 12:33:43','2022-03-07 12:31:56','2022-03-07 12:33:43'),
	(3,13,3,'2022-03-07 17:26:48',NULL,'2022-03-07 17:26:48','2022-03-07 17:26:48');

/*!40000 ALTER TABLE `testtimes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`)
VALUES
	(1,'Sumanta Kundu','sumantasam1990@gmail.com',NULL,'$2y$10$wYHK1iJOOvj4UBk6G.PDGOsqS0A6NBJvp4TN6axWEOI2DZgXmOZyi','LhW8AQDCwcXCzsOsoz2dmidjdI50SwNOX40OPJJHDzjZsLJRWIsZLorSqH5I','2022-02-18 14:42:42','2022-02-18 14:42:42','Administrator'),
	(2,'Peter','peter@gmail.com',NULL,'$2y$10$nYfwTOPY9GX1G3TjqX7UUO2vCQIxc.zrIPK6hVpq9ctRexfMuEu0u','gAVb0WzGesAY1BquQ38CTgWqp0p6NeXA0wEnDyFSue3kwIHrydPmswEWDI81','2022-02-18 15:57:40','2022-02-18 15:57:40',NULL),
	(3,'Sumanta Kundu','sam@gmail.com',NULL,'$2y$10$fPnegqOuGte53/XBiFcue.RSI/sQuYA2m9QE43.S1ncLDNUzL0t8G',NULL,'2022-03-07 15:28:59','2022-03-07 15:28:59',NULL),
	(13,'Teacher','teacher@gmail.com',NULL,'$2y$10$tAJ3UAT8zdB9UF1sT6/gjuUHnSOmGm.Mwn9TbKGbzmS4u6PzYhX9q','HDLBcEb0O7gRRbfW7Ka6ftcDRrGZjFZSuCyv6mWyFhyTmTfxsMnmGVb3UlA1','2022-03-07 15:57:35','2022-03-07 15:57:35','teacher'),
	(20,'Sumanta Kundu','sumanta.php@gmail.com',NULL,'$2y$10$4aqEKryD/O6r0zYriu3Tx.CpDhSAEkPJ8swlcWBhSozt11ju/yqWC','eKZpuEYrtnosJPPJiRY7eBsHhqwDxUjLuGuqXNJ6rCVQSC8oeTVBsrm5xM38','2022-03-07 18:41:39','2022-03-07 18:41:39','sp');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
