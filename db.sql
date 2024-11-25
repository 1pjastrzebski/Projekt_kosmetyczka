create database kosmetyczka;

use kosmetyczka;

create table oferty
(
	id_oferty int not null AUTO_INCREMENT PRIMARY KEY,
	nazwa varchar(60) not null,
    opis varchar(100) not null,
    czas_trwania int not null,
    cena decimal(2,1) not null,
    termin_oferty date not null
);

create table klienci
(
	id_klienta int not null AUTO_INCREMENT PRIMARY KEY,
    imie char(30) not null,
    nazwisko varchar(50) not null,
    email varchar(50) not null,
  	plec ENUM("K","M"),
    haslo varchar(300)
);