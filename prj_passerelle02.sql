-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juin 2023 à 11:12
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prj_passerelle02`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentary`
--

CREATE TABLE `commentary` (
  `id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentary`
--

INSERT INTO `commentary` (`id`, `creation_date`, `content`, `recipe_id`, `user_id`) VALUES
(1, '2023-06-02 11:04:02', 'Très bon plat !!', 1, 1),
(2, '2023-06-02 11:04:16', 'Ce poulet est délicieux\r\n', 2, 1),
(3, '2023-06-02 11:04:40', 'En accompagnement c&#039;est un délice :)', 4, 1),
(4, '2023-06-02 11:04:50', 'Une tuerie', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `title_recipe` varchar(50) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recipes`
--

INSERT INTO `recipes` (`id`, `creation_date`, `title_recipe`, `preparation_time`, `ingredients`, `instructions`, `user_id`, `image`) VALUES
(1, '2023-06-01 22:26:17', 'Rougail saucisse', 60, '6 saucisses fumées, 4 tomates, 4 oignons, 6 gousses d&#039;ail, huile d&#039;olive, sel/poivre, 1 cuillère à café de curcuma en poudre, 1/2 cuillère à café de gingembre moulu, 1 cuillère à café de massalé, 1 piment.', 'Piquez les saucisses et faites les cuire dans de l&#039;eau bouillante pendant 10 minutes, puis réservez les saucisses.\r\nDans une marmite faites chauffer de l&#039;huile d&#039;olive. Faites-y revenir les oignons préalablement émincés et l&#039;ail écrasé jusqu&#039;à ce qu&#039;ils commencent à colorer.\r\nCoupez les saucisses en tronçons de 1 ou 2 cm et faites les revenir avec les oignons.\r\nAu bout de 5 minutes, ajoutez les tomates coupées en petits morceaux ainsi que le curcuma, le massalé, le gingembre et le piment.\r\nMélangez bien et laissez mijoter à feu doux en retirant de temps en temps le couvercle pour éliminer l&#039;excès d&#039;eau.\r\nA servir avec un bon riz.', 0, '1685651177764565915.jpg'),
(2, '2023-06-01 22:41:28', 'Poulet massalé', 105, '5 blancs de poulet, 2 gros oignons, 5 tomates, 3 cuillères à soupe d&#039;huile d&#039;olive, 2 gousses d&#039;ail, sel/poivre, 4 cuillères à soupe de massalé, 1 cuillère à soupe de cumin en poudre, ', 'Émincez les oignons finement, découpez les blancs de poulet en morceux, émincez l&#039;ail et coupez les tomates en morceaux.\r\nFaites dorer les oignons dans l&#039;huile d&#039;olive. Ajoutez les morceaux de poulet. Saupoudrez le massalé et le cumin. Bien remuer l&#039;ensemble.\r\nSalez, poivrez et ajoutez l&#039;ail broyé. Retirez le poulet quand il est bien doré et remplacez-le par les tomates coupées en quartiers.\r\nLaissez cuire 10-15 minutes et disposez le poulet dans un plat allant au four et couvrez-le avec la sauce d&#039;oignons, ail, tomates et épices.\r\nVous pouvez servir le poulet massalé avec du riz ou des pommes de terre.', 0, '16856520881095719105.jpg'),
(3, '2023-06-02 00:13:41', 'Cari de porc', 45, '600 grammes d&#039;épaule de porc ou de sauté de porc,\r\n2 oignons, 2 gousses d&#039;ail.\r\n3 tomates.\r\n1/2 litre de bouillon de volaille ou d&#039;eau.\r\n1 cuillère à café de curcuma.\r\nThym, sel, poivre, huile.', 'Coupez le porc en petits dés. Hachez les tomates. Pilez l&#039;ail, avec le sel et le poivre. Hachez finement les oignons.\r\nChauffez l&#039;huile dans une marmite, y mettre le porc et le faire dorer sur tous les côtés, afin de le caramélisé.\r\nLorsque le porc est doré, ajoutez l&#039;ail pilé et mélangez.\r\nAjoutez les oignons ainsi que le curcuma.\r\nAjoutez les tomates et laissez mijoter pendant 10 minutes.\r\nAjoutez un verre de bouillon, lorsque l&#039;eau s&#039;est évaporée, couvrir avec du bouillon et laissez cuire à feu doux 20 à 30 minutes.\r\nServir avec du riz.', 0, '16856576211127519469.jpg'),
(4, '2023-06-02 00:34:30', 'Mataba de Mayotte', 190, 'Beaucoup de feuilles de manioc.\r\n1 boîte de lait de coco.\r\n20g de noix de coco râpée.\r\n1/3 de cuillère à soupe de purée de piment.\r\n2 oignons.\r\n6 gousses d&#039;ail.\r\n1 cuillère à soupe d&#039;huile neutre pour cuisson.', 'Pilez les feuilles de manioc très finement.\r\nFaire revenir l&#039;ail haché dans l&#039;huile.\r\nCiselez 2 oignons et ajouter sur l&#039;ail.\r\nAjoutez un peu de la purée de piment.\r\nVersez la boîte de lait de coco ainsi que la noix de coco râpée.\r\nAjoutez les feuilles de manioc pilées.\r\nLaissez réduire  sur feu vif en remuant sans arrêt afin que les feuilles n&#039;attachent pas au fond.\r\nRemuez pendant 30 bonne minutes afin de faire réduire le lait de coco, afin d&#039;obtenir une purée.\r\nServir avec du riz.', 0, '16856588702130565173.jpg'),
(5, '2023-06-02 00:44:10', 'Pilao au poulet de Mayotte', 30, '1 kilo de riz.\r\n1 kilo de cuisses de poulet.\r\n2 tomates.\r\n1 boîtes de concentré de tomate.\r\n5 oignons.\r\nSafran.\r\nCanelle.\r\n4 clous de girofle.\r\nSel / Poivre.', 'Rincez le riz.\r\nÉmincez les oignons.\r\nLavez et coupez les tomates.\r\nÉcrasez le safran.\r\nAjoutez une cuillère à soupe d&#039;huile dans une marmite et mettre à feu doux.\r\nAjoutez les oignons, les tomates et les épices et les cuisses de poulet.\r\nLaissez cuire pendant 20 minutes.\r\nDans une autre marmite mettre une cuillère à soupe d&#039;huile.\r\nAjoutez le riz et bien mélanger pendant 5 minutes.\r\nAjoutez la sauce préalablement cuite et mélangez.\r\nAjoutez de l&#039;eau chaude pour recouvrir les aliments.\r\nLaissez cuire pendant 40/50 minutes environ.', 0, '16856594501962702937.jpg'),
(6, '2023-06-02 00:51:19', 'Rougail chouchou', 20, '2 chouchous.\r\n3 gousses d&#039;ail.\r\n1 oignon.\r\n4 piments.\r\nSel.\r\nHuile.', 'Pelez les chouchous.\r\nHachez les deux chouchous en petits carrés.\r\nPilez le piment et le sel.\r\nFaire revenir l&#039;ail pilé au préalable et l&#039;oignon dans une poêle puis ajoutez les chouchous et mélangez pendant 4/5 minutes.\r\nVersez cette préparation dans une serviette afin d&#039;essorer l&#039;eau puis mélangez les épices pilées.\r\n\r\nLe rougail chouchou se consomme froid ou à température ambiante avec du riz ou un cari.', 0, '1685659879858459562.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `administration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `creation_date`, `pseudo`, `email`, `password`, `secret`, `administration`) VALUES
(1, '2023-06-01 22:02:40', 'Michael', 'mhgz@mhgz.fr', 'aq1163e112d2cf37fd7957d2d044d1eb26d361e2ea81208', 'b4c2fbebb1cfb99636671dc25a1654554d13c18d1685649760', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
