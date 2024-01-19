
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
                              `id` int(11) NOT NULL AUTO_INCREMENT,
                              `author` varchar(50) NOT NULL,
                              `name` varchar(150) NOT NULL,
                              `quote` text NOT NULL,
                              `picture` varchar(300) NOT NULL,
                              `fullname` varchar(150) DEFAULT NULL,
                              `surname` varchar(150) DEFAULT NULL,
                              `knowas` varchar(150) DEFAULT NULL,
                              `gender` varchar(150) DEFAULT NULL,
                              `birthday` varchar(150) DEFAULT NULL,
                              `birthplace` varchar(150) DEFAULT NULL,
                              `heigth` varchar(150) DEFAULT NULL,
                              `weigth` varchar(150) DEFAULT NULL,
                              `occupation` varchar(150) DEFAULT NULL,
                              `status` varchar(150) DEFAULT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `characters` (`id`, `author`, `name`, `quote`, `picture`, `fullname`,
                          `surname`, `knowas`, `gender`, `birthday`, `birthplace`, `heigth`, `weigth`,
                          `occupation`, `status`)
VALUES
                        (1,	'admin',	'Iron Man',	'My armor, it was never a distraction or a hobby, it was a cocoon. And now, I\'m a changed man. You can take away my house, all my tricks and toys. But one thing you can\'t take away... I am Iron Man.',	'3683709190408-IronMan.png',	'Anthony Edward',	'Stark',	' Tony Stark',	'Male',	'May 29, 1970',	'Manhattan, New York',	'1.85 m',	'81.65 kg',	'Industrialist, genius inventor, and former playboy',	' Deceased'),
                        (2,	'admin',	'Chainsaw Man',	'Of all the women I know! Every single one of them tried to kill me!',	'6918908749050-ChainsawMan.png',	'Denji',	'Pochita',	'Chainsaw Man',	'Male',	'1980',	'Japan',	'186.8',	'60',	'Lumberjack, Private Devil Hunter, High School Student, Celebrity',	'Alive'),
                        (3,	'admin',	'Junkrat',	'It \'s a perfect day for some mayhem!',	'5364223406107-Junkrat.png',	'Jamison',	'Fawkes',	'JUNKRAT',	'Male',	'February 29th',	'	Junkertown, Australia',	'1.95 m',	'70,3 kg',	'Anarchist, Thief, Demolitionist, Mercenary, Scavenger',  'Alive'),
                        (4,	'admin',	'Uncle Iroh',	'	In the darkest times, hope is something you give yourself.	',	'5872175804959-Iroh.png',	' Hong',	'Mushi ',	'The Dragon of the West',	'Man',	' 35 ASC',	'Fire Nation',	'1.46 m',	'68 kg',	'Firebending instructor, Military,Tea brewer,  Grand Lotus of the White Lotus',	' Spirit'),
                        (10,	'w',	'Daria',	'Nie tot vlk kto vlk',	'18103477515697-s-dnem-rozhdeniya-kot-7.gif',	'Dasha',	'Nerealka',	'SuperPuper',	'yop',	'24.12.2003',	'Chernihiv',	'196',	'98kg',	'Boris nie vie cho to je',	'single woman with dogs(in the future)'),
                        (23,	'lala',	'batman',	'wadawwad',	'265981786511-batman.png',	'efsfesfse',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `gallerypictures`;
CREATE TABLE `gallerypictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_character` int(11) NOT NULL,
  `id_column` int(11) NOT NULL,
  `picture` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_character` (`id_character`),
  CONSTRAINT `gallerypictures_ibfk_1` FOREIGN KEY (`id_character`) REFERENCES `characters` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `gallerypictures` (`id`, `id_character`, `id_column`, `picture`) VALUES
(112,	1,	1,	'4961666690768-ironMan1.jpg'),
(113,	1,	2,	'4965045028866-ironMan2.jpg'),
(114,	1,	3,	'4967550628568-ironMan3.jpg'),
(115,	1,	2,	'4970040526552-ironMan4.jpg'),
(116,	3,	1,	'5734744370989-junk1.png'),
(118,	3,	2,	'5745168431686-junk2.jpg'),
(119,	4,	1,	'6646392029346-junk3.jpg'),
(120,	4,	2,	'6649262255150-junk2.png'),
(121,	4,	3,	'6652039404687-iroh1.jpg'),
(122,	2,	1,	'6689900904591-ChainsawMan1.jpeg'),
(123,	2,	2,	'6692436240312-ChainsawMan2.jpg'),
(126,	2,	1,	'6891130907303-chain.jpg'),
(127,	23,	1,	'596362068968-bat1.jpg');

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `id_character` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_character` (`id_character`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_character`) REFERENCES `characters` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `reviews` (`id`, `author`, `id_character`, `grade`, `text`) VALUES
(1,	'PeknyCel',	10,	5,	'Bla bla, som debil'),
(3,	'Gread Person',	10,	2,	'Hmmmmmmm'),
(6,	'w',	4,	3,	'awdawdawd');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(20,	'admin',	'admin.hero@gmail.com',	'$2y$12$tJUUQo5wRySddC6QveNJ/eZxS8ZMXgXfKWZBT6o/WrEUK57Ywswya',	'admin'),
(21,	'w',	'lox@pidr.sk',	'$2y$12$LRN0CuoNOcaDMXkLNayDwe78YvROdxb042xOjqzjyOMJuMQ.2RZGK',	'user'),
(22,	'lala',	'borys.plotnikov21@gmail.com',	'$2y$12$pSMHwYb/QDCj4yCAG5M/fudrhbTAv6lGmAknRGf/LDgSAel15eQkC',	'user'),
(23,	'test',	'bot@gmail.com',	'$2y$12$w0X4FRP/XejxF//sklZqJO6cPzc1nLGy3I7SkQLdFU7JQykhSPtaa',	'user');
