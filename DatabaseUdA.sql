CREATE DATABASE bedandbreakfast;

USE bedandbreakfast;

CREATE TABLE Proprietari (
    Id_Proprietario Integer not null AUTO_INCREMENT primary key,
    Cognome varchar(30) not null,
    Nome varchar(30) not null,
    Telefono varchar(10) not null,
    Email varchar(30) not null,
    Password varchar(30) not null

)ENGINE=InnoDb;

CREATE TABLE Comuni (
    Id_Comune Integer not null AUTO_INCREMENT primary key,
    CAP int not null,
    Comune varchar(30) not null,
    Provincia varchar(30) not null,
    Nazione varchar(30) not null
)ENGINE=InnoDb;

CREATE TABLE Appartamenti (
    Id_Appartamento Integer not null AUTO_INCREMENT primary key,
    Nome_via varchar(30) not null,
    Civico Integer not null,
    id_comuneapp Integer not null,
    FOREIGN KEY (id_comuneapp) REFERENCES Comuni(Id_Comune),
    Prezzo Float not null,
    Descrizione varchar(30),
    id_proprietario Integer not null,
    FOREIGN KEY (id_proprietario) REFERENCES Proprietari(Id_Proprietario)
)ENGINE=InnoDb;

CREATE TABLE Clienti (
    Id_Cliente Integer not null AUTO_INCREMENT primary key,
    Cognome varchar(30) not null,
    Nome varchar(30) not null,  
    Telefono varchar(10) not null,
    Email varchar(30) not null,
    Password varchar(30) not null,
    Num_Creditcard varchar(30) not null
)ENGINE=InnoDb;

CREATE TABLE Affitta (
    Id_Affitta Integer not null AUTO_INCREMENT primary key,
    id_appartamento Integer not null,
    FOREIGN KEY (id_appartamento) REFERENCES Appartamenti(Id_Appartamento),
    id_cliente Integer not null,
    FOREIGN KEY (id_cliente) REFERENCES Clienti(Id_Cliente),
    Check_in Date not null,
    Check_out Date
)ENGINE=InnoDb;

INSERT INTO Proprietari (Cognome, Nome, Telefono, Email, Password )
VALUES 
('Loizzi', 'Francesco', 3882530304, 'loizzifrancesco@gmail.com',"Password1"),
('Cuscito', 'Michele', 3894545803, 'miki.cuscito@gmail.com',"Bari123");

INSERT INTO Comuni (CAP, Comune, Provincia, Nazione ) VALUES 
(70010, 'Valenzano', 'Bari', 'Italia'),
(70121, 'Bari', 'Bari', 'Italia'),
(03039, 'Sora', 'Frosinone', 'Italia');

INSERT INTO Appartamenti (Nome_via, Civico, id_comuneapp, Prezzo, Descrizione, id_proprietario) VALUES 
('Via Bari', 175, 2, 70, '2 piani 150 mq 3 vani',1),
('Via De Frutti', 177, 3, 45, '1 piano 100 mq 2 vani',2),
('Via Chiancaro',150, 1, 40, '4 piani 300 mq 5 vani',1);

INSERT INTO Clienti (Cognome, Nome, Telefono, Email, Password, Num_Creditcard) VALUES
('Squeo', 'Gabriele', 391394050, 'gsqueo3@gmail.com', 'Sacchetti', '1234567890123456'),
('Petralla', 'Valerio',  334273882, 'yeahpigeon@gmail.com', 'Mario32', '8741378612783613'),
('Menolascina','Nicolandrea',  389174187, 'menolascinandrea@gmail.com', 'Tamporra', '4632749672674823' ),
('Gabriele','Amoruso' ,333946689,'gabrieleamoruso@gmail.com','banana1','7813426741637841');

INSERT INTO Affitta (id_appartamento,id_cliente,Check_in,Check_out) VALUES
(1,2,'2008-11-10', '2008-12-10'),
(2,1,'2019-02-04', '2019-02-28'),
(3,3,'2021-04-06', '2021-05-24'),
(1,1,'2022-03-18', '2022-03-25');