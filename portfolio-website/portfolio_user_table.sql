create table if not exists `LoginPage` (
    `username` varchar(20) not null unique,
    `password` varchar(15) not null,
    ) CHARACTER SET utf8 COLLATE utf8_general_ci;
