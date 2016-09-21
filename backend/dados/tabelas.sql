CREATE TABLE IF NOT EXISTS `artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumo` text NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `nivel` varchar(50) NOT NULL,
  `secao` varchar(20) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `dt_atualizacao` date DEFAULT NULL,
  `dt_criacao` date NOT NULL,
  `ordem` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;