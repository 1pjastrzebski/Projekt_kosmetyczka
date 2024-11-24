CREATE TABLE Klienci (
    id_klienta INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) not null,
    nazwisko VARCHAR(50) not null,
    email VARCHAR(100) not null,
    haslo Varchar(300) not null,
    telefon VARCHAR(15) not null,
    data_rejestracji DATE not null
);