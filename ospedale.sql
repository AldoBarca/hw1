CREATE TABLE utenti (
nome_utente varchar(20) unique not null,
password varchar(20) not null,
nome varchar(20) not null ,
cognome varchar(20) not null,
codice_fiscale varchar(30) unique,
ruolo ENUM('Op','Paz'),
genere ENUM('M','F'),
posto_auto integer,
terapia text ,
reparto varchar(30),
primary key(nome_utente,password)
)engine=InnoDb;

CREATE TABLE visita(
nome_utente varchar(20) not null ,
 password varchar(20) not null,
visita varchar(30),
primary key(nome_utente,password,visita)
)engine=InnoDb;