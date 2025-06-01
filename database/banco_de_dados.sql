CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario`  int(11),
  `nome` varchar(20) NOT NULL,
  `raca` varchar(20) NOT NULL,
  `url_foto` varchar(1000) NOT NULL,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  PRIMARY KEY (`id`)
);

INSERT INTO `admins`
  (`id`, `email`, `senha`)
VALUES 
  (1, 'eduarda@gmail.com', '123456'),
  (2, 'luciana@gmail.com', '123456');

INSERT INTO `usuarios`
  (`id`, `nome`, `email`, `telefone`) 
VALUES 
  (1000, 'João Victor', 'joao@gmail.com', '(11) 99999-9999'),
  (1001, 'Maria Clara', 'maria@gmail.com', '(11) 98888-8888'),
  (1002, 'Pedro José', 'pedro@gmail.com', '(11) 97777-7777'),
  (1003, 'Ana  Laura', 'ana@gmail.com', '(11) 96666-6666');

INSERT INTO `pets`
  (`id`, `id_usuario`, `nome`, `raca`, `url_foto`)
VALUES 
  (2000,1000,'Marley','Cão Poodle','https://img.freepik.com/fotos-premium/fotografia-de-cachorro-cachorrinho-bonito_1288657-15036.jpg?ga=GA1.1.499753897.1746488730&semt=ais_items_boosted&w=740'),
  (2001,NULL,'Bobby','Cão Pit Bull','https://love-a-bull.org/wp-content/uploads/2024/12/FAQ.png'),
  (2002,NULL,'Rex','Cão Pastor Alemão','https://cobasi.vteximg.com.br/arquivos/ids/728382/pastor-alemao-filhote.png?v=637593663339670000'),
  (2003,1001,'Luna','Gato Siamês','https://www.agrosete.com.br/wp-content/uploads/2017/07/siames-1.jpg'),
  (2004,NULL,'Mia','Gato Persa','https://purina.cl/sites/default/files/2022-10/purina-brand-conoce-al-gato-persa-1.png');

