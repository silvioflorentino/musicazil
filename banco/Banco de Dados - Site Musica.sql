create database Musicas;

use musicas;

create table Tb_Usuario
(
	Id_Usua int not null primary key auto_increment,
    Email_Usua varchar(45) not null,
    Senha_Usua varchar(8) not null
);

create table Tb_Cliente
(
	Id_Clie int not null primary key auto_increment,
    Nome_Clie varchar(60) not null,
	Dt_Nasc date not null,
    Fone_Clie varchar(15) null,
    
    Id_Usua int not null,
    constraint Id_Usu_Clie
    foreign key (Id_Usua)
    references Tb_Usuario (Id_Usua)
);

create table Tb_Artista
(
	Id_Artis int not null primary key auto_increment,
    
    Id_Clie int not null,
    constraint Id_Clie_Art
    foreign key (Id_Clie)
    references Tb_Cliente (Id_Clie)
);

create table Tb_Musica
(
	Id_Mus int not null primary key auto_increment,
    Nome_Mus varchar(50) not null,
    Genero_Mus varchar(12) not null,
    Album_Mus varchar(30) not null,
    Duracao_Mus time null,
    Link_Mus varchar(250) not null,
    Capa_Mus varchar(5) null,
    Data_Lança_Mus date not null,
    Letra_Mus text null,
    
    Id_Artis int not null,
    constraint Id_Mus_Artis
    foreign key (Id_Artis)
    references Tb_Artista (Id_Artis)
);

create table Tb_Avaliacao
(
	Id_Avalia int not null primary key auto_increment,
    Nota_Avalia int not null,
    
    Id_Mus int not null,
    constraint Id_Avalia_Mus
    foreign key (Id_Mus)
    references Tb_Musica (Id_Mus)
);

create table Playlist
(
	Id_Playlist int not null primary key auto_increment,
	Id_Mus int not null,
    Id_Clie int not null,
    constraint Id_Play_Clie
    foreign key (Id_Clie)
    references Tb_Cliente (Id_Clie),
    
    constraint Id_Play_Mus
    foreign key (Id_Mus)
    references Tb_Musica (Id_Mus)
);

desc Tb_Usuario;
desc Tb_Cliente;
desc Tb_Artista;
desc Tb_Musica;
desc Tb_Avaliacao;
desc Playlist;