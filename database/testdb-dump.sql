DROP TABLE IF EXISTS `task_assignment`;
DROP TABLE IF EXISTS `leden`;
DROP TABLE IF EXISTS `tasks`;

--
-- Table structure for table `leden`
--

CREATE TABLE `leden` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `status` int NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Table structure for table `task_assignment`
--

CREATE TABLE `task_assignment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_id` int NOT NULL,
  `lid_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `lid_id` (`lid_id`),
  CONSTRAINT `task_assignment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  CONSTRAINT `task_assignment_ibfk_2` FOREIGN KEY (`lid_id`) REFERENCES `leden` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leden`
--

LOCK TABLES `leden` WRITE;
INSERT INTO `leden` VALUES (1,'daan','test123!'),(2,'jan','test456!'),(3,'puk','test789!'),(4,'klaas','test012!');
UNLOCK TABLES;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
INSERT INTO `tasks` VALUES (1,'taak 1',0,'bla bla'),(2,'taak 2',1,'bla bla'),(3,'taak 3',2,'fdssdfsdfsdf');
UNLOCK TABLES;

--
-- Dumping data for table `task_assignment`
--

LOCK TABLES `task_assignment` WRITE;
INSERT INTO `task_assignment` VALUES (1,1,1),(2,2,1),(3,3,3);
UNLOCK TABLES;
