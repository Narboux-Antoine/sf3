CREATE TABLE `propositions` (
 `uuid` char(36) NOT NULL,
  `describe` varchar(255) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `price_currency` char(3) NOT NULL DEFAULT '',
  `id_tickets` char(36) NOT NULL,
    `id_members` char(36) NOT NULL,
    PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;