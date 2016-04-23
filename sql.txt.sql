CREATE TABLE IF NOT EXISTS `cv_members` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_pin` varchar(255) NOT NULL,
  `forgot_key` varchar(60) NOT NULL,
  `email_key` varchar(255) NOT NULL,
  `email_confirmed` int(1) NOT NULL,
  `terms` int(1) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `user_level` int(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `plan_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

INSERT INTO `cv_members` (`id`, `username`, `fullname`, `email`, `password`, `forgot_pin`, `forgot_key`, `email_key`, `email_confirmed`, `terms`, `browser`, `user_level`, `reg_date`, `last_login`, `status`, `plan_id`) VALUES
(1, 'admin', 'Master Admin', 'demos@jdwebdesigner.com', '$2y$10\$BZv2fyJrLPj1EWfapQf99.q3GPu3ngq1bx/FDsOOAZ5Ya0RBQQBxS', '', '', '', 1, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1, '2016-01-01 00:00:00', '2016-01-18 18:16:20', 'active', 0),
(14, 'regular', 'Regular', 'demo2@jdwebdesigner.com', '$2y$10\$Pg4xWwfQNyjrKiHnDDtqpOS9DPnbYm0yYImRBRcYlWyNxMuM6j5KC', '', '', '0', 0, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 2, '2016-01-18 18:26:16', '0000-00-00 00:00:00', 'active', 0);


/*MODIFICA*/
CREATE TABLE IF NOT EXISTS `cv_members` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_utente` int(15) null,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_pin` varchar(255) NOT NULL default '0.0.0.0',
  `forgot_key` varchar(60) NOT NULL default '0.0.0.0',
  `email_key` varchar(255) NOT NULL,
  `email_confirmed` int(1) NOT NULL default '0',
  `terms` int(1) NOT NULL,
  `browser` varchar(255) NOT NULL default 'null',
  `user_level` int(10) NOT null default 2,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL,
  `plan_id` int(15) DEFAULT '0',
  `cod_fiscale`  varchar(255) DEFAULT '000',
  `cod_piva`  varchar(255) DEFAULT '123456789',
  `data_nascita`  varchar(255) DEFAULT NULL default '0000-00-00 00:00:00',
  `numtelefono` int(16),
  `mobile` int(16),
  `certificatomedico` int(1) NOT NULL,
  `profilo_pic`  varchar(255) DEFAULT NULL,
  `certificato_pic`  varchar(255) DEFAULT NULL,
  `via`  varchar(255) DEFAULT NULL,
  `civico`  varchar(255) DEFAULT NULL,	
  `cap`  varchar(255) DEFAULT NULL,	
  `comune`  varchar(255) DEFAULT NULL,	
  `provincia`  varchar(255) DEFAULT NULL,	
  `sesso`  varchar(255) DEFAULT NULL,	
  `sposato`  varchar(255) DEFAULT NULL,	
  `figli`  varchar(255) DEFAULT NULL,	
  `professione` varchar(255) DEFAULT NULL,	
  `telefono`  varchar(255) DEFAULT NULL,	
  `cellulare`  varchar(255) DEFAULT NULL,	
  `facebook`  varchar(255) DEFAULT NULL,	
  `whatsapp`  varchar(255) DEFAULT NULL,	
  `googleplus`  varchar(255) DEFAULT NULL,	
  `twitter`  varchar(255) DEFAULT NULL,	
  `patente`  varchar(255) DEFAULT NULL,	
  `patente_tipo`  varchar(255) DEFAULT NULL,	
  `data_scadenza_patente` datetime default '0000-00-00 00:00:00',
  `uisp` varchar(255) DEFAULT NULL,	
  `uisp_numero` varchar(255) DEFAULT NULL,	
  `uisp_datarilascio` varchar(255) DEFAULT NULL default '0000-00-00 00:00:00',	
  `certificato` varchar(255) DEFAULT NULL,	
  `armatore` varchar(255) DEFAULT NULL,	
  `miglia` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `cantiere` varchar(255) DEFAULT NULL,
  `modello` varchar(255) DEFAULT NULL,
  `piedi` varchar(255) DEFAULT NULL,	 
  `fiv` varchar(255) DEFAULT NULL,	
  `fiv_scadenza`  datetime DEFAULT NULL default '0000-00-00 00:00:00',	
  `fiv_certificato` varchar(255) DEFAULT NULL,	
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;
/**/
INSERT INTO `cv_members` (`id`, `username`, `fullname`, `email`, `password`, `forgot_pin`, `forgot_key`, `email_key`, `email_confirmed`, `terms`, `browser`, `user_level`, `reg_date`, `last_login`, `status`, `plan_id`) VALUES
(1, 'admin', 'Master Admin', 'demos@jdwebdesigner.com', '$2y$10\$BZv2fyJrLPj1EWfapQf99.q3GPu3ngq1bx/FDsOOAZ5Ya0RBQQBxS', '', '', '', 1, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1, '2016-01-01 00:00:00', '2016-01-18 18:16:20', 'active', 0),
(14, 'regular', 'Regular', 'demo2@jdwebdesigner.com', '$2y$10\$Pg4xWwfQNyjrKiHnDDtqpOS9DPnbYm0yYImRBRcYlWyNxMuM6j5KC', '', '', '0', 0, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 2, '2016-01-18 18:26:16', '0000-00-00 00:00:00', 'active', 0);


-->Aggiornato al 11 Marzo
INSERT INTO `cv_members` 
(`id`,`id_utente`,`username`,`name`,`surname`,`email`,`password`,`forgot_pin`,`forgot_key`,`email_key`,`email_confirmed`,`terms`,`browser`,`user_level`,`reg_date`,`last_login`,`status`,`plan_id`,`cod_fiscale`,`cod_piva`,`data_nascita`,`numtelefono`,`mobile`,`certificatomedico`,`profilo_pic`,`certificato_pic`,`via`,`civico`,`cap`,`comune`,`provincia`,`sesso`,`sposato`,`figli`,`professione`,`telefono`,`cellulare`,`facebook`,`whatsapp`,`googleplus`,`twitter`,`patente`,`patente_tipo`,`data_scadenza_patente`,`uisp`,`uisp_numero`,`uisp_datarilascio`,`certificato`,`armatore`,`miglia`,`tipo`,`cantiere`,`modello`,`piedi`,`fiv`,`fiv_scadenza`,`fiv_certificato`) 
VALUES
(1, null, 'admin'  , 'Amministratore', 'Admin'  ,'demos@jdwebdesigner.com', '$2y$10\$BZv2fyJrLPj1EWfapQf99.q3GPu3ngq1bx/FDsOOAZ5Ya0RBQQBxS','','','' ,1,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1, '2016-01-01 00:00:00', '2016-01-18 18:16:20', 'active', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','' ),
(14,null, 'regular', 'Regular'       , 'Regular','demo2@jdwebdesigner.com', '$2y$10\$Pg4xWwfQNyjrKiHnDDtqpOS9DPnbYm0yYImRBRcYlWyNxMuM6j5KC','','','0',0,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 2, '2016-01-18 18:26:16', '0000-00-00 00:00:00', 'active', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '','', '','' );


--->

ALTER TABLE `oltremare`.`cv_members` 
CHANGE COLUMN `data_scadenza_patente` `data_scadenza_patente` VARCHAR(25) NULL DEFAULT '0000-00-00 00:00:00' COMMENT '' ;


INSERT INTO `cv_members` (`id`, `username`, `name`,`surname` ,`email`, `password`, `forgot_pin`, `forgot_key`, `email_key`, `email_confirmed`, `terms`, `browser`, `user_level`, `reg_date`, `last_login`, `status`, `plan_id`,`cod_fiscale`,`cod_piva`,`data_nascita`,`numtelefono`,`mobile`,`certificatomedico`,`profilo_pic`,`certificato_pic`,`via`,`civico`,`cap`,`comune`,`provincia`,
`sesso`,`sposato`,`figli`,`professione`,`telefono`,`cellulare`,`facebook`,`whatsapp`,`googleplus`,`twitter`,`patente`,`patente_tipo`,`data_scadenza_patente`,`uisp`,`uisp_numero`,`uisp_scadenza`,
`certificato`,`amatore`,`miglia`,`fiv`,`fiv_scadenza`,`fiv_certificato`) VALUES
(1, 'admin', 'Amministratore','Admin','Admin' 'demos@jdwebdesigner.com', '$2y$10\$BZv2fyJrLPj1EWfapQf99.q3GPu3ngq1bx/FDsOOAZ5Ya0RBQQBxS', '', '', '', 1, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 1, '2016-01-01 00:00:00', '2016-01-18 18:16:20', 'active', 0,'','','','','','','','','','','','','','','','','','','','','','','','','','','',''),
(14, 'regular', 'Regular','Regular', 'demo2@jdwebdesigner.com', '$2y$10\$Pg4xWwfQNyjrKiHnDDtqpOS9DPnbYm0yYImRBRcYlWyNxMuM6j5KC', '', '', '0', 0, 1, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36', 2, '2016-01-18 18:26:16', '0000-00-00 00:00:00', 'active', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '' );


--> ADD CONTABILITA --
create table cv_contabilita
(
	id int(11) not null auto_increment primary key,
        id_utente int(11) not null,
	name varchar(255) default null,
	username varchar(255) default null,
	surname varchar(255) default null,
	nome_banca varchar(255) default null,
  	abi varchar(255) default null,
    cab varchar(255) default null,
	cin varchar(255) default null,
    contocorrente varchar(255) default null,
    Iban varchar(255) default null, 
    cartacredito int(17) default null,
    datascadenzacc datetime default '0000-00-00 00:00:00',
    cvv int(5) default null,
    data_contabile  datetime default '0000-00-00 00:00:00',
    prodotto varchar(100) default null,
    quantita int(5) default null,
    descrizione varchar(255) default null, 
    doc_riferimento varchar(255) default null, 
    importo int(10) default null, 
    acconto int(10) default null,
    iva int(3) default '22',
    totale int(10) default null
    
)



---




create table cv_todolist(
	id int (11)not null auto_increment primary key,
    completated varchar(10) default 'false',
    titolo varchar(150)default null,
    descrizione varchar(350)default null,
    date datetime NOT NULL default '0000-00-00 00:00:00'
)

INSERT INTO `oltremare`.`cv_todolist` (`completated`, `titolo`, `date`) VALUES ('false', 'Da fare numero 2', '2016-03-22');



--->

/* ADD BARCA 26/03/2016 */
create table cv_generale(

id int(3)not null primary key auto_increment,
id_utente int(3)NULL,
name varchar(200) NULL,
surname varchar(200) NULL,
username varchar(200) NULL,
data_nascita varchar(15) NULL,
via varchar(200) NULL,
civico varchar(15) NULL,
cap varchar(15) NULL,
comune varchar(200) NULL,
provincia varchar(200) NULL,
cod_fiscale varchar(50) NULL,
cod_piva varchar(50)NULL,
sesso varchar(50) NULL,
sposato varchar(50) NULL,
figli varchar(50)NULL,
professione varchar(50) NULL
)

create table cv_socio
(
id int(3) not null auto_increment primary key,
id_utente int(3) null,
tess_uisp varchar(200) null,
uisp_numero varchar(100) null,
datarilascio varchar(100) null,
certificato varchar(15) null,
foto_cert varchar(100) null,
fiv varchar(50) null,
fiv_scadenza varchar(20) null,
fiv_certificato varchar(15) null,
patente  varchar(10) null,
patente_tipo varchar(100) null,
data_scadenza_patente varchar(100) null
)

create table cv_amministrazione
(
id int(3) not null auto_increment primary key,
id_utente int(3) null,
banca varchar(200) null,
abi varchar(100) null,
cab varchar(100) null,
cin varchar(15) null,
cc varchar(100) null,
iban varchar(50) null,
carta_credito varchar(20) null,
data_scadenza varchar(15) null,
ccv  varchar(10) null,
servizio varchar(100) null,
data_acquisto varchar(100) null,
anticipo varchar(10) null,
saldo varchar(10) null

)


create table cv_armatore(
    id int(11) not null auto_increment primary key,
    id_utente int(11) ,
    nome varchar(100) not null,
    cognome varchar(100) not null,
    armatore varchar(5)null,	
    attivita varchar(250),
    corso varchar(250),
    sede varchar(250),
    attivo int default 0,
    
    FOREIGN KEY (id_utente) REFERENCES cv_members(id)
)

/* ADD BARCA 26/03/2016 */

create table cv_barche
(
    id int(3)not null auto_increment primary key,
    id_utente int(3) default 0,
    nome      varchar(150) null ,
    cognome   varchar(150) null ,
    armatore  varchar(150) null ,
    tipo      varchar(150) null ,
    cantiere  varchar(150) null ,
    modello   varchar(150) null  ,
    metri     varchar(150) null 
    
)

INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Patente Senza Limiti', '','1');
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Estensione Patente Senza Limiti','',1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Locazione Mini Cabinato','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Locazione Grande Cabinato', '',1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Crociera (vacanza)', '',1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)   VALUES (null,null,'','Campus','', 1);
INSERT cv_armatore (id,id_utente, attivita, corso ,sede,  attivo ) VALUES (null,null,'','Formazione Aziendale in barca a vela','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Marineria','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Base 1','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Base 2','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Autonomia','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corsi Crociera Grandi Cabinati','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Crociera Costiera','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Altura','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Skipper','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corsi di approfondimento','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Lezioni private di vela','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Ormeggi','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Equipaggio ridotto','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Navigazione sportiva senza scalo','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso Manovre sportive in solitario','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Corsi di vela sportiva','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Corso Spi','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Corso Regata','','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Corso Regata in Regata','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Regate e trofei sociali','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Formazione Istruttori','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'','Corso Formazione Istruttori Nazionale UISP','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)VALUES (null,null,'','Formazione Istruttori di Circolo','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)VALUES (null,null,'','Corso di vela per ragazzi','', 0);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)VALUES (null,null,'','Corso Navigazione Astronomica','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES(null,null,'','Corso ISAF','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)VALUES (null,null,'','Corso BLSD','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'','Corso SRC','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'Corso Gennaker','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo) VALUES (null,null,'Corso Manutezione - Motore Diesel Entrobordo','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'Corso Impiombature','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'2016_NEW -1- Corso Base','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'2016_NEW -2- Perfezionamento','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'2016_NEW -3- Corso Avviamento Crociera','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'2016_NEW -4- Corso Crociera','', 1);
INSERT cv_armatore (id, id_utente, attivita, corso ,sede, attivo)  VALUES (null,null,'Corso Meteo','', 1);

/*ADD 26/03/2016*/
create table cv_cantiere(
	id int(3)not null auto_increment primary key,
    id_utente int(3) null,
    id_modello int(3)not null,
    nome_cantiere varchar(2500)null,
    Loa varchar(2500) null,
    cantiere varchar(2500) null
)

/*Derive */

INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Baby Boat','2.30','CNA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimi51','2.30','RIVA ERNESTO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimi51 - Follow 2','2.30','NAAIX ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimi51 - Reqata','2.30','NAAIX ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimi51 Club','2.30','WINNER ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimi51 scuola','2.30','MURE A DRITTA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist','2.30','NAUTIVELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist','2.30','SIBMA NAVALE ]TALIANA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist MK Il','2.30','WINNER ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist reqata','2.30','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimlst MK 12','2.30','WINNER ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimlst scuola','2.30','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist','2.33','PHILEAS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist','2.35','DEVOTI SAILING ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Optimist','2.35','PAIARDI ANGELO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Q£timist','2.35','CADEI ROSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Mariposa 260','2.60','MARIPOSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'"Tender 2','70"','2.70');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Libellula','2.77','VERGAPLAST ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Hunter 90','2.90','HUNTER MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Taz','2.95','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Mariposa 310','3.10','MARIPOSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Ufo X','3.10','UFO BOATS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Pipas','3.15','PHILEAS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Delfino 330','3.21','VERGAPLAST ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'','3.35','NAAIX ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Topper','3.40','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser Pieo Plus','3.50','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Mariposa 360','3.60','MARIPOSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'"Mela Strip ','"','3.60');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Zzap','3.60','NAUTIVELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Byte','3.65','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinghy','3.65','MONTISOLA di Archetti ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinghy','3.66','RIVA ERNESTO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinqhy 12','3.66','NAUTICA LODI ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinqhy 12','3.66','LILLIA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinqhy 12i','3.66','PATRONE MORENO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinqhy 12i','3.66','COLOMBO LEOPOLDO & C ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Delfino 380','3.72','VERGAPLAST ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Topaz','3.86','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Funboat','3.90','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Magno','3.94','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Ciuki','4.00','SIBMA NAVALE ]TALIANA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Skipper','4.00','CNA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Flying Junior Iso','4.04','POLETTO LABO NAUTICO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Flying Junior Race','4.04','POLETTO LABO NAUTICO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Flying Junior Std','4.04','POLETTO LABO NAUTICO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Flyinq Junior','4.04','CNA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'R 14','4.06','PAIARDI ANGELO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'X 14','4.06','CNA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Vaurien 51andard','4.08','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Vaurien reqata','4.08','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Vaurien scuola','4.08','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Barca Scuola','4.18','CADEI ROSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'420','4.20','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'420','4.20','NAUTIVELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'420','4.20','DEVOTI SAILING ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Blaze','4.20','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Buzz','4.20','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'"Vela 4','20"','4.20');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser','4.23','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser Vago','4.23','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Spiee','4.25','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'C 14','4.27','CNA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Hunter 140','4.27','HUNTER MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Wanderer','4.27','ANGIO MARINE SERVICES ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dedic','4.30','PHILEAS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Sonar','4.32','BARUFFALDI ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Sonar','4.32','NAUTICA LODI ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Phileas','4.35','PHILEAS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Delfino 440','4.44','VERGAPLAST ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser 2000','4.44','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Sport 14','4.45','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinqhy 4.S0','4.50','COLOMBO LEOPOLDO & C ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Finn','4.50','DEVOTI SAILING ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Mu51o Skiff','4.50','DEVOTI SAILING ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Vis','4.50','NAUTIVELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser 4000','4.64','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Omeqa','4.64','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'470','4.70','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'470','4.70','NAUTIVELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'470','4.70','DEVOTI SAILING ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Barca Scuola 2','4.70','CADEI ROSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Snipe','4.72','BARUFFALDI ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Snipe','4.72','FACCENDA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Snipe','4.72','LILLIA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Iso','4.74','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Jet','4.85','NAUTIVELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Boss','4.90','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Fireball','4.93','BARUFFALDI ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser 5tratos Keel','4.94','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser Stratos','4.94','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Sport 16','4.99','TOPPER INTERNATIONAL ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'5uelo','5.00','COLOMBO LEOPOLDO & C ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dingotto','5.00','MONTISOLA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Tridente 16','5.00','CNA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Noos 501','5.01','TEAM DIFFUSIONE VELA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Delfino 520','5.11','VERGAPLAST ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Hunter 170','5.13','HUNTER MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'R 18 S','5.50','PAIARDI ANGELO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Eos','5.60','RIVA ERNESTO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'ludie','5.60','PHILEAS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Violino 18','5.60','PAIARDI ANGELO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Fedro','5.64','RIVA ERNESTO ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dinqone 5.70','5.70','COLOMBO LEOPOLDO & C ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Open 5.70','5.70','PHILEAS ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'595 Bravo','5.95','CADEI ROSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Barca Scuola 3','6.00','CADEI ROSA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dingotto 6','6.00','MONTISOLA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser SB 3','6.20','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Dingone 6.30','6.30','COLOMBO LEOPOLDO & C ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Star','6.92','FOLLI ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Star','6.92','LILLIA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Sampierota','7.00','CREA ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser XD','','PERFORMANCE MARINE ');
INSERT INTO oltremare.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,1,'Laser XD Colar','','PERFORMANCE MARINE ');

/*Multicab*/

INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 24','7.30','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 24 MK Il','7.30','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Dragon!ly 800','8.00','QUORNING BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 27','8.25','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 28','8.66','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Dragon!ly 920','9.20','QUORNING BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 31','9.40','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 31R','9.40','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1000 Cabinato','9.90','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1000 Day','9.90','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Tris lO','9.98','MAGAZZY RESEARCH GROUP ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Dragon!ly 1000','10.00','QUORNING BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1000 Cata','10.00','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Seawind 1000','10.00','SEAWIND CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Prout','10.36','PROUT CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Prout','11.30','PROUT CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Prout','11.58','PROUT CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Athena 38','11.60','FOUNTAINE PAJOT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Lagoon380S2','11.60','LAGOON ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Prout','11.90','PROUT CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'F 36','11.95','CORSAIR MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Privilege 395','11.95','ALLIAURA MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Dragon!ly 1200','11.96','QUORNING BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'40i','12.00','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Bisso 12','12.00','COPLASS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Seawind 1200','12.00','SEAWIND CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Lagoon 410 52','12.37','LAGOON ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1300 Cata3','12.93','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'"Beii','e 43"','13.00');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1300 Day','13.00','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'"Cat','na 431"','13.10');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1300 Cabinato','13.10','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'privilege 435','13.13','AWAURAMARIHE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Lagoon 440','13.61','LAGOON ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'45i','13.70','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Prout','13.71','PROUT CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'8ahia 46','14.00','FOUNTAINE PAJOT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Catana 471','14.30','CATAHA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Yapluka 47','14.30','YAPLUKA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Privilege 465','14.34','ALLIAURA MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Prout','15.00','PROUT CATAMARANS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'40; Std','15.10','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'40i Light','15.10','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1500 Cata','15.20','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mattia 511','15.50','MATTIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Lagoon 500','15.54','LAGOON ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Catana 521','15.80','CATANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Yapluka 53','16.00','YAPLUKA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'55i Light','16.10','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'55i Std','16.10','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1600 Cata','16.30','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mattia 56i','17.00','MATTIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Lagoon 570','17.06','LAGOON ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Catana 522','17.30','CATANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Catana 581','17.70','CATANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Privilege 585','17.82','ALLIAURA MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Yapluka 60','18.00','YAPLUKA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Taiti 60','18.20','FOUNTAINE PAJOT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Eleuthera 60','18.28','FOUNTAINE PAJOT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Sunree! 60','18.30','SUNREEF YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Mec 1800 Cata','18.40','ANDROMEDA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Catana 582','19.00','CATANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'64;','19.50','OUTREMER ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Catana 21 M','19.80','CATANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Yapluka 70','21.30','YAPLUKA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'SunreeO5','22.50','SUNREEF YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Taiti 75','22.80','FOUNTAINE PAJOT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,2,'Yapluka 80','24.40','YAPLUKA ');


/*END */
/*Monotipi*/


INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Nome','L oa','Cantiere ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Dream','4.71','DREAM NAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Meteor','6.00','NAUTICA LODI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Explorer','6.50','COOPERATIVA NAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'TE Sait','6.50','PROTEUS YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Ufo 22','6.60','UFO BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'H 22','6.70','LION YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Mano 22','6.70','M VELA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Mano Junior','6.70','M VELA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'J 22','6.86','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Melges 24','7.31','DEVOTI SAILING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'J 24','7.32','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Farr 740','7.40','C.B.I. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Blusail24 sport','7.48','RIMINI SAIL (bIu saiI) ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Beneteau 25 Platu','7.50','BÉNÈTEAU ITALIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Dod 245','7.50','DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Este 24','7.50','D\'ESTE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'First Class 7.5','7.50','BÉNÈTEAU ITALIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Fun','7.50','LILLIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Nytee 25i','7.50','NUOVA NYTEC ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'protagonist 7.50','7.50','PROTAGONIST ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Surprise','7.65','ARCHAMBAULT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'lip 25','7.70','SICILCRAFT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'J 80','8.00','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Bad 27','8.04','BLUEWAVE YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Dolphin 81','8.10','MAXI DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Joker','8.10','MAXI DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Franchi 28 od','8.21','FRANCHI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Ufo One Desiqn','8.60','UFO BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Dragone','8.90','PETTICROWS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Proteus 90','9.00','PROTEUS YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'International Etehells','9.30','PETTICROWS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Mumm 30','9.43','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Sprinto','9.85','ARCHAMBAULT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'99 One Desiqn','9.90','ASSO 99 ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Evolution IO Raeer','9.99','EUREKA! ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Proteus 33 raeer','9.99','PROTEUS YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Ten PF One Desiqn','10.00','MAXI DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Giro 34i One Design','10.20','MAXI DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Figaro 2','10.50','BÉNÈTEAU ITALIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'50laris 36 Od','11.00','SE.RI.GI. DI AQUILEIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'IMX-40','12.10','X-YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Farr40','12.41','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'IMX45','13.75','X-YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'IC45','13.86','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,3,'Farr 52','15.85','V2 - FARR INTERNATIONAL ');








/**/

/*MULTISPORT*/

INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'KL 10.5','3.07','NAVISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Catsy','3.10','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat 12 Junior','3.50','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'KL Calibri 12','3.60','NAVISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Mari Cat 360','3.60','MARIPOSA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat 12 Racinq','3.60','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC Dragoon','3.91','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Teddy','3.91','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Wave','3.98','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'KL 13.5','4.15','NAVISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Gwynt 14','4.16','AVIOCONSUITING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat F2','4.20','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat Fl','4.20','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC 14','4.25','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Dart 16','4.30','PERFORMANCE SAIICRAFT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Phantom 14','4.30','CNA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Twixxy','4.38','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Naera 450','4.50','NACRA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat 15 Club','4.50','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat 15 Special','4.50','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat 16 5pecial','4.77','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat 16 Club','4.77','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Naera 81ast Race','4.80','NACRA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Phantom 16','4.85','CNA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC Max','4.90','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Mattia 16','4.90','MATTIA SPORT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Mattia Dedie','4.90','MATTIA SPORT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'New Cat Swing','4.90','NEW MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Top Cat K3','4.92','CATAMARAN SPORT ITALY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC 15','4.94','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Bim 16','4.96','BIMARE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'KL Booster','5.03','NAVISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'KL Booster Sport','5.03','NA VISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC 16','5.05','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Phantom Club','5.05','CNA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Getaway','5.07','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Top Cat K2','5.18','CATAMARAN SPORT ITALY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Naera Inter 17 sing','5.20','NACRA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC FX One','5.25','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Phantom 18','5.45','CNA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Dart 18','5.48','PERFORMANCE SAIICRAFT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC Pacifie','5.48','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'MattiaS','5.48','MATTIA SPORT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Bim 18H.T.Doppio C','5.50','BIMARE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Javelin','5.50','BIMARE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Kl Warp','5.50','NAVISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Top Cat K 1','5.50','CATAMARAN SPORT ITALY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC Tiger','5.51','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Mattia 5mile','5.51','MATTIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Kl Phenix F18','5.52','NAVISTRAT KL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Mattia F18','5.52','MATTIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Mattia S Sport','5.52','MATTIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Naera F 18','5.52','NACRA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Naera 570','5.70','NACRA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'HC Fax','6.10','HOBIE CAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Magnum 21','6.30','VIRUS BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,4,'Nacra Inter 20','','NACRA ');

/**/

INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Salona 40','11.99','AD BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Salona 45','13.55','AD BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Event 34','10.35','ADRIA EVENT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Brenta 38','11.66','ADRIA SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FY 49 fast eruiser','14.80','ADRIA SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Promenade 7.60','7.70','ALB-SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BA30i','9.20','ALB-SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BA4Oì','12.00','ALB-SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BA411','12.60','ALB-SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BA 50i Koala','15.00','ALB-SAIL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 38','11.7','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 40','12.0','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 43-45','13.1','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 44','13.4','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 45','13.4','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 46/50 MK II','14.5','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 48','14.8','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 50','15.2','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 50 MK II','15.2','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 52','16.1','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ALDEN 54','16.4','Alden ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ovni 345','11.40','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ovni 36','11.95','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ovni 395','12.68','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ovni 435','13.29','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Cigale e Levder 14','14.00','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ovni 455','14.46','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ovni 455 CC','15.00','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Cigale e Levrier 16','16.00','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Cigale e LevriN 18','18.28','ALUBAT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Super Maramu 2000','16.00','AMEL ITALIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'A40','11.99','ARCHAMBAULT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'AM 39i Sloop','11.65','ARREDOMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'AM 72; 5100p','21.85','ARREDOMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Luna 64','19.40','AZZURRA YACHTING ITALIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Luna 66 PH','20.15','AZZURRA YACHTING ITALIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ba!tic 50i','15.24','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Baltic 56','17.10','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Baltic 66','20.10','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 35','10.4','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 38','11.6','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 40','11.9','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 43','13.2','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 47','14.5','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 50','15.2','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Baltic 51','15.5','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 52','16.0','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 58','17.8','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 64','19.5','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 67','20.3','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BALTIC 87','26.4','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Baltic Breeze','15.0','Baltic Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'EC 17 Mosqulto','5.05','BARUFFALDI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'P/38 Magnum','8.40','BARUFFALDI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JNP 999','10.45','BARUFFALDI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JNP 999 Kit','10.45','BARUFFALDI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BAVARIA 31','9.5','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BAVARIA 32','10.2','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BAVARIA 36','11.5','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BAVARIA 38 OCEAN','11.7','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 32 Cruiser','10.30','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 35 Mateh','10.50','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 38 Match','11.39','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Bavaria 36 Crui','er"','11.40');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 38 Cruiser','12.13','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 42 Malch','12.55','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 42 Cruiser','12.99','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 46 Cruiser','14.20','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Bavaria 49 Cruiser','15.40','Bavaria Yachtbau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 281','8.7','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 311','9.8','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 321','9.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 352','10.6','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 36 CC','11.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 400','12.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OCEANIS 44 CC','13.6','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First21.7','6.40','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First211','6.40','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First 260 Spirlt','7.70','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First25.7','7.70','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First 27.7','8.85','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First 31.7','9.85','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oeeanis 323','10.01','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oeeanis 331','10.35','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oeeanis 343','10.66','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First 36.7','11.00','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oeeanis 373','11.25','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Oceani','393"','11.98');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First 40.7','11.99','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oceanis 423','12.64','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Cyclades 43','12.94','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oceanis 42 Cc','13.25','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'First44.7','13.65','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oceanis 473','14.30','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"First47','7"','14.50');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Beneteau 50','15.48','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oceanis 523','16.20','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Beneteau 57','17.20','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 25','7.4','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 311','9.8','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 361','11.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 36CC','10.8','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 36S7','10.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 411','12.7','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 50','15.4','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 53F5','16.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU 64','18.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 310','9.4','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 345','10.5','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 36.7','10.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 38','12.2','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 38s5','11.4','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 40.7','11.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 42S7','12.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 45F5','14.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU FIRST 47.7','14.5','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU IDDYLLE 15.5','15.4','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 321','9.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 351','10.6','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 352','10.6','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 36CC','10.8','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 37','10.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 381','11.7','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 390','11.6','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 40','12.5','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 400','12.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 44 CC','13.6','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BENETEAU OCEANIS 461','14.0','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FIRST 21','6.4','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FIRST 265','8.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FIRST 36S7','10.9','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FIRST 45F5','14.1','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FIRST 53F5','16.2','Bénéteau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hurricane 315 I.M.5.','9.60','BLU PHOENIX YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hurricane 375 IMS','11.60','BLU PHOENIX YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hurricane 425 IMS','13.05','BLU PHOENIX YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hurricane 625','18.05','BLU PHOENIX YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BuenaOnda 36 Corsa','10.60','BUENAONDA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BuenaOnda 36 Elite','10.60','BUENAONDA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BuenaOnda 60','18.50','BUENAONDA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 31 IMS','9.58','C.B.I. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 110 EXPRESS','11.1','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 121','12.2','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 29','8.7','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 30','9.1','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 37/40','12.0','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 40','12.1','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 51','15.7','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 52','15.7','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 99','9.9','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C 99','10.2','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'C&C LANDFALL 38','11.4','C&C Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'LimltTCI','5.00','CADEI ROSA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Illimit','5.98','CADEI ROSA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Cam 26i','5.99','CADEI ROSA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand Soleil37B&C','11.02','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand Soleil 40','12.29','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand 50leU 43','13.39','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand Soleil45','13.90','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand 50[eiI46.3','14.30','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand SoleU 50','14.90','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Grand Soleil 56','16.90','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'GRAND SOLEIL 37','11.6','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'GRAND SOLEIL 50','15.2','Cantieri Del Pardo ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Difference','7.15','CARDANI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 22','6.5','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 22 MK II','6.5','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 25','7.6','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 250','7.6','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"CATALINA 250',' H2O"','7.6');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"CATALINA 250',' KEEL"','7.6');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"CATALINA 250',' WING"','7.6');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 27','8.2','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 270','8.2','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 28 MK II','8.6','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 30 MKIII','9.1','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 310','9.4','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 320','9.9','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 34','10.5','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 36','11.0','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 36 MKII','11.0','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 38','11.6','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 380','11.7','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 400','12.3','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 42','12.7','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 470','14.1','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CATALINA 50','15.3','Catalina Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catalina 22 mkll','6.55','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catailna 250','7.62','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Caailna 270','8.23','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catalina 28 mkll','8.70','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catalina 30mklll','9.12','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catalina 310','9.45','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catalina 320','10.00','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catalina 34 mkll','10.51','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Catailna 36 mkll','11.07','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CataUna 400','12.34','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CataUna 42mkll','12.75','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CataUna 470','14.53','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'CataUna 50','15.37','CATALINA YACHTS/MORGAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 33 5','9.86','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 33 Charter','9.86','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 33 Outlaw','9.86','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 47 Charter','14.50','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 47 Outlaw','14.50','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 47 S','14.50','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 53 5','15.70','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 53 Charter','15.70','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Class 53 Outlaw','15.70','CLASS YACHT ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'42i fast eruiser','12.81','CN YACHT 2OOO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Starkel 79 C','24.50','CN YACHT 2OOO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Brezza 22','6.50','CNA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Princetime 37.8','11.50','COLANGELO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Calboat 6','20"','6.20');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ditterenee','7.15','COLOMBO LEOPOLDO & C ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 33 Cruise','10.20','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 33 Perf.','10.20','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 36','10.90','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 45 Sport','13.80','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 50 CI','15.20','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 51 Cc','15.40','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 51 Dh','15.40','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 51 Sport','15.40','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 511 Sport','15.40','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 54 Dh','16.20','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comet 65 Sport','19.90','COMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comlortina 35','10.70','COMFORT YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Comfortina 42','12.86','COMFORT YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Contest 44 Cs','13.30','CONYPLEX- Contest Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Contest 48 Cs','14.75','CONYPLEX- Contest Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Contest 50 Cs','14.99','CONYPLEX- Contest Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Contest 5S Cs','16.75','CONYPLEX- Contest Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Contest 60','18.30','CONYPLEX- Contest Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Contest 60 Cs','18.30','CONYPLEX- Contest Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Explorer 20','6.20','COOPERATIVA NAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Explerer 32','9.60','COOPERATIVA NAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Explorer 43','13.10','COOPERATIVA NAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Fortuna 60','18.30','CRUZ DEL SUR YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Custom 50','15.50','CUSTOM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Este 31','9.53','D\'ESTE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Este 39','11.95','D\'ESTE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Este 72','22.30','D\'ESTE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Daka 45','13.60','DAKA BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler 25','7.50','DEHLER INTERNATIONAL B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler 29','8.75','DEHLER INTERNATIONAL B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler 34','10.21','DEHLER INTERNATIONAL B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler 36','10.95','DEHLER INTERNATIONAL B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler 39 SQ','11.99','DEHLER INTERNATIONAL B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler 47','14.30','DEHLER INTERNATIONAL B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehier 41 Cr','12.45','DEHLER INTERNATIONAL BV ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dehler41 Ds','12.45','DEHLER INTERNATIONAL BV ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Delphia 24','7.60','DELPHIA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Delphia 29','9.02','DELPHIA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Delphia 37','10.74','DELPHIA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Delphia 40','12.30','DELPHIA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 32','9.9','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 32 CLASSIC','9.9','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 35','10.7','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 36 CLASSIC','11.0','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 38','11.6','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 38','11.6','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 41','12.3','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 43 CC','13.0','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'DUFOUR 45','14.0','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dufour 34','10.60','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dulour 365 GL','10.81','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dufour 40','12.32','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Dufour 44','13.67','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Dufo""r 455 GL"','13.76','Dufour Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Elan 31','9.40','Elan Marine ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Impression 344','9.99','Elan Marine ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Elan 333','10.45','Elan Marine ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Impression 434','11.25','Elan Marine ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Elan 37','11.33','Elan Marine ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Elan 40','12.20','Elan Marine ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 26 i','8.00','ETAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 30 i','9.35','ETAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 345','10.63','ETAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 37 5','11.26','ETAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Etap 46 d','"','14.00');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Alfa 51','15.41','EURO ALFA SAILING YACHIS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Finngulf 28','8.60','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'ulf33','10.13','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Finngul136','10.94','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'finngull 37','11.30','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Finngulf 391','11.97','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Finngulf391 DH','11.97','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Finnulf 41','12.50','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Finngulf 44','14.00','FINNGULF Yachts OY ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'43 L','13.20','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'43 S','13.20','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'471','14.42','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'47 S','14.42','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'53i 5 Cutter','16.60','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'53i L Culter','16.60','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'63 L','19.20','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'755','23.15','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'75 L','23.19','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'76 L','23.26','FRANCHINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Passoa 43','13.35','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Passoa 46','14.60','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Gareia 48 Cc','15.45','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Passoa 50','15.70','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Passoa 54','16.80','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Passoa 55 Cc','16.90','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Garcia 60 Cc','18.50','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Garcia 70','22.25','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Garcia 75','23.69','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Garcia 86','26.29','GARCIA ALUMINIUM ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Gemini 52 Med','15.98','GEMINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Gemini 52 Md','16.34','GEMINI YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'GIBSEA 362','10.9','GibSea ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'GIBSEA 392','11.9','GibSea ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'GIBSEA 472','14.2','GibSea ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Gielle 45','13.70','GIEFFE SAILING YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Gieffe 51','15.85','GIEFFE SAILING YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Gieffe 55','16.60','GIEFFE SAILING YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR31','9.62','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR34','10.28','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR 37','11.32','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR 40','12.40','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR 43','13.57','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR 48','14.99','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR 53','16.44','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HR 62','18.88','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 31','9.5','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 34','10.3','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 352','10.5','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 36','10.9','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 39','11.8','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 42','13.2','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 46','14.7','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 49','14.9','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 53','16.4','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HALLBERG-RASSY 62','18.8','Hallberg Rassy ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'41 Tradibonal','12.47','HANS CHRISTIAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'43 Traditional','12.99','HANS CHRISTIAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'43 Christina','13.10','HANS CHRISTIAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'48 Traditional','14.60','HANS CHRISTIAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Christina Cutter','15.80','HANS CHRISTIAN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 21 i','6.56','HAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 24 i','8.02','HAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Etap 32 5','9.84','HAP YACHTING ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Huner 27 Base','8.33','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 27 Crociera','8.33','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 306','9.12','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 33','10.21','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 36','10.82','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 38','11.64','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 41','12.29','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 41 DS','12.29','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 44','13.17','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 44 Ds','13.17','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Passae 420','13.23','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter 46','14.05','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'passage 456','14.05','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hunter HC 50','15.24','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 19','5.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER (UK) CHANNEL 323','9.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 23.5','7.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 240','7.3','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 26','7.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 260 KEEL','7.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 27','8.3','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 280','8.5','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 29.5','9.0','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 290','8.7','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 30','9.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 310','9.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 323F','9.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 336','10.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 340','10.3','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 35.5','10.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 356','10.8','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 37 CUTTER','11.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 37.5','11.4','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 376','11.3','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 40.5','12.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 410','12.3','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 42','12.9','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 430','12.9','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 45','13.7','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 450','13.5','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER 460','13.5','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER PASSAGE 420','13.2','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'HUNTER PASSAGE 450','13.4','HUNTER MARINE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 109','10.7','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 46','14.0','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J/145','14.1','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-105','10.5','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-110','10.9','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-120','12.2','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-125','12.5','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-130','13.0','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-160','16.0','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-24','7.3','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-30','9.1','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-32','9.8','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-35','10.8','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-40','12.3','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"J-42',' DEEP DRAFT"','12.8');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"J-42',' SHOAL DRAFT"','12.8');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-44','13.5','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-60','18.2','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-80','8.0','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-90','9.1','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J-92','9.1','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 92','9.09','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 100','10.00','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 105','10.48','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 109','10.85','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 120','12.20','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'J 133','13.11','J-BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun 2000','6.64','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 29.2','8.80','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Fast 32 i','9.60','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 32','9.60','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Fast 35','10.75','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 35','10.75','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Sun Fa','t 37"','11.40');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 37','11.40','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5un Odyssey 40 Ds','12.20','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Fast 40.3','12.20','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5un Odyssey 43 Ds','13.21','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5un Odyssey 49','14.98','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 49 Ds','14.98','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 52.2','15.39','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun Odyssey 54 Ds','16.38','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sun 2500','','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN FAST 32i','9.6','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 28.1','8.7','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 32.2','9.5','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 36','11.0','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 37.2','11.4','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 39','11.9','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 40DS','12.2','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 42cc','12.8','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 44','13.3','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUN ODYSSEY 45.2','14.1','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN FAST 36','11.3','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 34.2','10.2','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 36.2','10.4','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 37','10.9','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 42CC','12.8','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 44','13.3','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 45.2','13.7','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 47 CC','14.3','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 51','15.4','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU 52.2','15.4','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU ATTALIA 32','9.7','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU ODYSSEY 47','14.3','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN 37.1','11.4','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN KISS 45','13.2','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN KISS 45 modified','13.9','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN ODDYSSEY 42.2','12.8','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN ODYSSEY 37','11.3','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN ODYSSEY 43 DS','13.2','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN ODYSSEY 45.1','14.1','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEAU SUN ODYSSEY 52.2','15.4','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'JEANNEU SUN ODYSSEY 40','12.2','Jeanneau ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 2200 M','22.08','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 20 T','23.50','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 2700 M','26.70','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 25 DS','28.80','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 30T','30.00','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 3200 m','32.50','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Jongert 40 T','41.24','JONGERT B.V. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feelinq 30','9.10','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feelinq 30 Di','9.10','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feelinq 32','9.95','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feelinq 32 Di','9.95','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feelinq 36','11.10','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feelinq 36 Di','11.10','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Feeling 39 Di','11.70','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FeeUn 39','11.70','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FeeUng 44','14.00','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'FeeUng 44 O;','14.00','KIRIE SOCIÈTÈ NOUVELLE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Locwind 47','14.50','LOCWIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Locwind 57','17.75','LOCWIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Malo 361','11.35','MALÒ YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Malo 39i','12.10','MALÒ YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Malo 42i','13.15','MALÒ YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Mal04Si','14.10','MALÒ YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Ju[ianicu',' 40 CL"','11.98');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Julianicus 46','14.00','MANCINI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Julianicus 53 CL','16.00','MANCINI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Maxi Doiphin 65i','19.66','MAXI DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 73i','22.30','MAXI DOLPHIN ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MELGES 24','7.3','Melges ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MELGES 30','9.1','Melges ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Tamer Deek','6.30','MONTISOLA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Tamer 650','6.50','MONTISOLA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Tamer 650','6.50','MONTISOLA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Tamer 7','7.00','MONTISOLA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 34','10.2','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 35','10.5','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 376','11.5','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 38','11.4','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 40','11.9','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 425','12.7','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 44','13.1','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'MOODY 46','14.0','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Moody 47','14.1','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Moody 47','14.53','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Moody 49','14.80','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Moody 54','16.72','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Moody 56','17.70','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Moody 64','19.34','MOODY YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 320','9.7','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 331','9.9','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 340','10.2','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 360','10.7','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 361','11.2','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 390','11.7','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAJAD 420','12.9','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Naiad 331','9.98','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Naiad 373','11.30','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Najad 391','12.10','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Najad 400','12.20','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Najad 460','13.95','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Najad 490','15.00','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Najad 511','15.50','NAJAD VARVET ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 32','9.8','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 331','10.1','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 35','10.4','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 38','11.4','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 39','11.6','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 42','12.7','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 43','13.0','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 44','13.3','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NAUTICAT 515','15.4','Nauticat ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 36','11.1','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 40','12.2','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 43','13.0','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 44','13.1','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 44 MK II','13.7','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 46 MK II','14.3','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 47','14.5','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 48','14.7','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 51 CB','15.6','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 51 keel','15.6','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 55','16.7','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 56','17.1','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 57 CB Sloop','17.4','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 57 CC','17.4','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 57 Keel Sloop','17.4','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 57 RS','17.8','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 60','19.0','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 68','20.5','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 77','23.4','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWAN 80','24.4','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 45','13.83','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 46','14.05','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5wan 48','15.09','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 53','16.48','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 56','17.53','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 601','18.30','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 62','19.12','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 68','21.01','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 70','21.35','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWan 75 FD','23.30','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 75 RS','23.30','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 82 FD','24.89','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 82 RS','24.89','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 82 S','24.89','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 100 FD','30.21','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 100 RS','30.21','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWan 100 s','30.21','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 112','34.34','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Swan 131','40.00','Nautor Swan ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NW43','13.10','NORTH WIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NW50','14.98','NORTH WIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NW56','16.87','NORTH WIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NW58','17.48','NORTH WIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NW65','19.99','NORTH WIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'NW68','20.20','NORTH WIND ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nova 7-13','7.13','NOVELLI TEODORICO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nova Grinta','7.25','NOVELLI TEODORICO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nova 30i','9.13','NOVELLI TEODORICO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nova 37i','11.17','NOVELLI TEODORICO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nova 41i','13.10','NOVELLI TEODORICO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nytec 20i','6.00','NUOVA NYTEC ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nytee 23i','7.20','NUOVA NYTEC ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nytee 28i','8.46','NUOVA NYTEC ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ocean 5tar 48.1','14.60','OCEAN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ocean 5tar 51.2','15.45','OCEAN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Ocean Star 56.1','16.55','OCEAN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTA 30','12.2','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTA 42','12.8','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 41','12.2','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 42','13.0','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 435','13.2','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 45','14.0','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Oyster 45','13.5','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 45 (1998)','13.5','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 485','14.7','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 49 PH','14.9','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 53','16.4','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 61','18.5','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 68','20.5','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 70','21.5','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'OYSTER 80','24.2','Oyster ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Isola 21','7.05','POLITI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Isola 34','9.99','POLITI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'[sola 40','12.00','POLITI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Harmony 33','10.44','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Diva 38','11.60','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Harmony 38','11.67','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Harmony 42','12.86','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Diva 44','13.50','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Harmony 47','14.39','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Harmony 52','16.09','PONCIN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Rimar 31.3','9.30','RIMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Rimar 36','11.20','RIMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Rimar 42.1','12.63','RIMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Rimar 44.3','13.80','RIMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Rimar 50','15.09','RIMAR ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Blusail 24 eab','7.48','RIMINI SAIL (bIu saiI) ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'BlusaU 48','14.50','RIMINI SAIL (bIu saiI) ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'81usail 54','16.30','RIMINI SAIL (bIu saiI) ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Blusail61','18.00','RIMINI SAIL (bIu saiI) ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'RO 265','7.49','RONAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'RO 340','9.60','RONAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'RO 400','11.86','RONAUTICA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nibbio 20','6.00','ROTENSE ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Rustler 36','10.77','RUSTLER YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sunbeam 37','11.30','SCHÒCHL YACHTBAU ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5unbeam 39','12.30','SCHÒCHL YACHTBAU ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5unbeam 42','12.60','SCHÒCHL YACHTBAU ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sunbeam 44','13.40','SCHÒCHL YACHTBAU ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Solari',' 44 CP"','13.46');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Solaris 46 SC','14.00','SE.RI.GI. DI AQUILEIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Solaris 52 Cp','16.30','SE.RI.GI. DI AQUILEIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Solaris 60 SC','18.50','SE.RI.GI. DI AQUILEIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Solaris 72 Cp','21.55','SE.RI.GI. DI AQUILEIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Solaris 76 Cp','23.33','SE.RI.GI. DI AQUILEIA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'5tar 28','8.60','SETTEMARI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Star 28 Express','8.60','SETTEMARI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Star 42','12.70','SETTEMARI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Star 43 Ketch','13.08','SETTEMARI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Pellicano 2+2','4.20','SIBMA NAVALE ]TALIANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'promenade 2000','5.40','SIBMA NAVALE ]TALIANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'EM 25','7.45','SIBMA NAVALE ]TALIANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'EM 8.50','8.30','SIBMA NAVALE ]TALIANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'EM6','6.20','SIBMA NAVALE ITALIANA ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 321 Sloop','10.00','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 331 Keteh','10.40','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 37 Sloop','11.23','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 38 Ketch','11.80','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 39 Sloop','11.85','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Naubcat 42 Ketch','13.00','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 42 Sloop','13.00','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 44 Ketch','13.60','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Nauticat 515 5100p','15.42','SILTALA YACHTS O.Y. ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'S[eeker 45','13.88','SLEEKER BOATS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Soleri 26 1/2 Cruise','7.98','SOLERI FABIO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Soleri 26 1/2 Cruise','7.98','SOLERI FABIO ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 72i','21.89','SOUTHERN WIND SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Reichel-Pugh 781','23.99','SOUTHERN WIND SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr Nauta 93;','28.34','SOUTHERN WIND SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr Nauta 95i','29.00','SOUTHERN WIND SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sportina 600','6.20','SPORTINA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sportina 680','6.80','SPORTINA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Sportina 730','7.35','SPORTINA YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Millenium 40','12.00','STARMARINE HIGHTECH ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUNBEAM 32','9.8','Sunbeam ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUNBEAM 34','10.4','Sunbeam ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUNBEAM 34 W SPOILER','11.2','Sunbeam ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUNBEAM 37','11.2','Sunbeam ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUNBEAM 39','12.3','Sunbeam ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SUNBEAM 44','13.2','Sunbeam ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWY 370','11.15','SWEDEN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWY 390','11.88','SWEDEN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWY 42','13.25','SWEDEN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWY45','14.15','SWEDEN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWY53','16.64','SWEDEN YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWEDE 55','16.0','Sweden Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWEDEN 45','14.1','Sweden Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWEDEN YACHTS 370','11.2','Sweden Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWEDEN YACHTS 390','11.9','Sweden Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'SWEDEN YACHTS 45','13.8','Sweden Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Tango 30','9.30','TANGO YACHTS ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Trintella 42i','12.80','TRINTELLA SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Trintella 47i','14.40','TRINTELLA SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Trintella 65i','18.75','TRINTELLA SHIPYARD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 395','12.01','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 50 Ph','15.38','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 56 Ph','17.60','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 60 Ph','18.36','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 63 Ph','19.27','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Farr 645 Ds','19.40','V2 - FARR INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Vagabond','14.2','Vagabond ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VAGABOND 47','14.2','Vagabond ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VAGABOND 52','15.8','Vagabond ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VALIANT 32','9.8','Vailant ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VALIANT 39 CE','11.9','Vailant ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VALIANT 40','11.9','Vailant ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VALIANT 42','12.8','Vailant ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VALIANT 42 RS','12.8','Vailant ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'VALIANT 50','15.4','Vailant ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'E Boat','6.75','VELA 77 ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Vismara 50','15.36','VISMARA MARINE GROUP ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Vismara 54','16.50','VISMARA MARINE GROUP ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WAUQUIEZ 33','9.1','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WAUQUIEZ 38','11.6','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Wauquiez 48','14.9','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WAUQUIEZ 60','18.5','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WAUQUIEZ CENTURION 36','10.9','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WAUQUIEZ PILOT SALOON 40','12.5','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WAUQUIEZ PRETORIEN 35','10.7','Wauquiez ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Centurion 40 s','12.55','WAUQUIEZ INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Pilot Saloon 40','12.70','WAUQUIEZ INTERNATIONAL ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'"Centurion 45','"','14.00');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY 43','13.3','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY CENTAUR','7.9','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY CORSAIR','10.9','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY OCEAN 33','10.1','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY OCEAN 35','10.5','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY OCEAN 38','11.6','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'WESTERLY OCEAN 41','12.3','Westerly ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X37','11.36','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X40','12.19','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X43','12.93','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X46','14.01','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X 50','15.24','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-302','8.8','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-332','10.0','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-362 SPORT','11.0','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-382','11.5','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-412','12.5','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-442 MK II','13.5','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-482','14.6','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-512','15.5','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-612','18.2','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'X-99','9.7','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'XPRESS 110','12.2','X-Yachts ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hanse 312','9.45','YACHTZENTRUM GREIFSWALD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hanse 342','10.35','YACHTZENTRUM GREIFSWALD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hanse 371','11.25','YACHTZENTRUM GREIFSWALD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hanse411','12.35','YACHTZENTRUM GREIFSWALD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hanse 461','14.20','YACHTZENTRUM GREIFSWALD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Hanse 531','16.15','YACHTZENTRUM GREIFSWALD ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Queentime 44 CC','13.80','ZETA GROUP ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'Fax','9.99','ZUANELLI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'34 by luanelli','10.50','ZUANELLI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'40 by Zuanlli','12.30','ZUANELLI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'401 by Zuanelli','12.70','ZUANELLI ');
INSERT INTO UOLTRE.cv_cantiere(id, id_utente, id_modello,nome_cantiere,loa,cantiere) VALUES (null,null,5,'49 by Zuanelli','15.72','ZUANELLI ');
/*END CANTIERE*/

/*FORMZIONE */

create table cv_formazione_oltremare
(
id int(3) not null auto_increment primary key,
nome_corso varchar(250) null,
attivo varchar(5)
)


insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Patente Entro 12 Miglia','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Patente Senza Limiti','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Estensione Patente Senza Limiti','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Locazione Mini Cabinato','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Locazione Grande Cabinato','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Crociera (vacanza)','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Campus','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Formazione Aziendale in barca a vela','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Marineria','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Base 1','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Base 2','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Autonomia','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corsi Crociera Grandi Cabinati','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Crociera Costiera','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Altura','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Skipper','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corsi di approfondimento','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Lezioni private di vela','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Ormeggi','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Equipaggio ridotto','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Navigazione sportiva senza scalo','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Manovre sportive in solitario','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corsi di vela sportiva','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Spi','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Regata','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Regata in Regata','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Regate e trofei sociali','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Formazione Istruttori','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Formazione Istruttori Nazionale UISP','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Formazione Istruttori di Circolo','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso di vela per ragazzi','False');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Navigazione Astronomica','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso ISAF','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso BLSD','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso SRC','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Gennaker','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Manutezione - Motore Diesel Entrobordo','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Impiombature','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','2016_NEW -1- Corso Base','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','2016_NEW -2- Perfezionamento','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','2016_NEW -3- Corso Avviamento Crociera','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','2016_NEW -4- Corso Crociera','True');
insert into  `UOLTRE`.`cv_formazione_oltremare`(`id`,`nome_corso`,`attivo`) VALUES('null','Corso Meteo','True');

/**/

create table cv_formazione_utente
(
id int(3) not null auto_increment primary key,
id_utente int(3) null,
nome varchar(255) null,
cognome varchar(255) null,
attivita_oltremare varchar(250) null,
attivita_extra varchar(250) null,
data varchar(12)null,
id_istruttore varchar(3)not null,
istruttore varchar(100)not null,
voto varchar(10) null,
note varchar(300) null
)

create table cv_stampacv (
id int(3) not null auto_increment primary key,
attivita_formative varchar(300) null,
attivita_presso_oltremare varchar(300) null,
data varchar(12) null,
istruttore varchar(200) null,
attivita_presso_altre_scuole varchar(200) null,
scuola	varchar(250) null,
sede varchar(250)null,
data_scuola varchar(12) null,
titoli_abilitazioni	varchar(250)null,
data_titoli varchar(250)null,
esperienza	varchar(250)null,
luogo	varchar(250)null,
data_esperienza varchar(12)null

)





/* ADD */

create table cv_profile_complete
(
    `id` int(11) auto_increment not null primary key,
    `idmember` int(11) not null,
    `idtutor` int(11) not null,
    `photo` varchar(255)not null,
    `codicefiscale` varchar(16) not null,
    `partitaiva` varchar(11),
    `datanascita` varchar(10),
    `stato` enum('celibe','nubile','sposato') DEFAULT NULL,
    `sposato` enum('si','no') DEFAULT NULL,
    `professione` varchar(255),
    `sesso` enum('uomo','donna') DEFAULT NULL,
    `via`varchar(100) ,
    `civico` varchar(100),
    `cap` varchar(20),
    `comune` varchar(200),
    `provincia` varchar(200),
    `numtelefono` int(16),
    `mobile` int(16),
    `tshirt` enum ('XS','S','M','L','XL','XXL','XXXL'),
    `caparra` int(16),
    `iban` varchar(50),
    `numerocartacredito` int(16),
    `codicefornitore` int(11),
    `attivitafornitore` varchar(255),
    `numuisp` varchar(255),
    `datarilascio` varchar(50),
    `certificatomedico` enum('si','no') default null,
    `uploadcertificato` varchar(255),
    `datarilasciomedico` varchar(16),
    `prezzotessera` int(11),
    `pagatoil` varchar(20),
    `modalitapagamento` enum('online','bonifico','contanti'),
    `fattura` enum('si','no'),
    `numfattura` varchar(50),
    `datafattura` varchar(20)
)  



/* ADD */

create table cv_provincie
(
	id int(11) not null auto_increment primary key,
	comune varchar(200) not null,
    provincia varchar(200) not null,
    regione varchar(200)not null,
    abbreviazione varchar(100) not null,
    cap varchar(6)
)

------------------


-------------------
CREATE TABLE IF NOT EXISTS `cv_email_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_activation` text NOT NULL,
  `forgot_password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `cv_email_content` (`id`, `email_activation`, `forgot_password`) VALUES
(1, '<p><strong>Ciao {\$fullname}, </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ti ringrazio per esserti registrato al nostro sito! Qui puoi trovare i dettagli del tuo account:</p>\r\n\r\n<p><strong>Username: {\$username} </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Per usare il tuo account devi confermare la tua email cliccando sotto:</p>\r\n\r\n<p>{\$link}</p>\r\n\r\n<p><strong>Grazie!</strong><br />\r\n<strong>CV.OLTREMARE</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><strong>Ciao {\$fullname},</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Hai ricevuto una richiesta per il reset della password per il tuo account sul notro website. &nbsp;Se fai questa richiesta, devi seguire il link sotto per reset password.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span class=\"marker\"><strong>Username: {\$username}</strong></span></p>\r\n\r\n<p><span class=\"marker\"><strong>Pin Temporaneo : {\$pin}</strong></span></p>\r\n\r\n<p>{\$link}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Grazie</strong><br />\r\n<strong>CV.OLTREMARE</strong></p>\r\n');
-------------------------------------

CREATE TABLE IF NOT EXISTS `cv_login_attempts` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `time` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26;
--------------------------------
CREATE TABLE IF NOT EXISTS `cv_permission_levels` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` int(15) NOT NULL,
  `redirect_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `cv_permission_levels` (`id`, `name`, `level`, `redirect_login`) VALUES
(1, 'Admin', 1, ''), (2, 'Specialist', 2, '');

------------------------------------------
CREATE TABLE IF NOT EXISTS `cv_rl_settings` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `public_registration` int(1) NOT NULL,
  `require_cap` int(1) NOT NULL,
  `require_email_activation` int(1) NOT NULL,
  `require_terms` int(1) NOT NULL,
  `default_user_level` int(15) NOT NULL,
  `min_password_length` int(2) NOT NULL,
  `require_plans` int(1) NOT NULL,
  `redirect_login` varchar(255) NOT NULL,
  `redirect_logout` varchar(255) NOT NULL,
  `gc_key` varchar(255) NOT NULL,
  `gc_secret` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `cv_rl_settings` (`id`, `public_registration`, `require_cap`, `require_email_activation`, `require_terms`, `default_user_level`, `min_password_length`, `require_plans`, `redirect_login`, `redirect_logout`, `gc_key`) VALUES
(1, 1, 0, 1, 1, 2, 5, 1, '', '', '');

-------------------------------------
CREATE TABLE IF NOT EXISTS `cv_settings` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `cv_settings` (`id`, `meta_title`, `meta_description`, `site_title`, `site_email`, `site_logo`) VALUES
(1, 'CV.OLTREMARE', 'CV.OLTREMARE | PHP User Management Script ', 'CV.OLTREMARE', 'jobmassaro@gmail.com', 'lplogo-1.png');
------------------------------------

CREATE TABLE IF NOT EXISTS `cv_inactivity_settings` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `timeout_enabled` int(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `inactivity_timer` int(15) NOT NULL,
  `inactivity_warning` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `cv_inactivity_settings` (`id`, `timeout_enabled`, `title`, `message`, `inactivity_timer`, `inactivity_warning`) VALUES
(1, 0, 'Session Expiration Warning!', 'Because you have been inactive, your session is about to expire!', 30, 150);
-------------------------------------
CREATE TABLE IF NOT EXISTS `cv_memberships` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `trial_period` int(10) NOT NULL,
  `trial_cost` decimal(10,2) NOT NULL,
  `membership_cost` decimal(10,2) NOT NULL,
  `recurring_period` varchar(15) NOT NULL,
  `user_level` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;

INSERT INTO `cv_memberships` (`id`, `title`, `trial_period`, `trial_cost`, `membership_cost`, `recurring_period`, `user_level`) VALUES
(1, 'Free for Life', 0, '0.00', '0.00', '0', 3),
(3, 'Basic', 0, '0.00', '19.99', '0', 2),
(5, 'Super Plan!', 30, '0.00', '149.90', 'annually', 2),
(6, 'Premium', 21, '1.95', '49.99', 'quarterly', 2);
------------------------------------------------

CREATE TABLE IF NOT EXISTS `cv_membership_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `plan_id` int(15) NOT NULL,
  `order_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

INSERT INTO `cv_membership_items` (`id`, `plan_id`, `order_id`, `title`) VALUES
(2, 1, 1, '1 GB Bandwidth'),
(3, 1, 4, 'Free Support!'),
(4, 1, 2, '500MB Disc Space'),
(5, 1, 3, '5 Users'),
(6, 1, 5, 'Free Setup'),
(7, 3, 1, '5GB Bandwidth'),
(8, 3, 2, '1GB Data Storage'),
(9, 3, 3, 'Another Cool Feature'),
(10, 3, 4, 'Free Setup!'),
(11, 3, 5, 'Awesome Support'),
(12, 6, 1, '10 GB Bandwidth'),
(13, 6, 2, '10 GB Data Storage'),
(14, 6, 3, '10X Faster Speeds!'),
(15, 6, 4, 'Advanced Stuff'),
(16, 6, 5, 'Free Setup'),
(17, 5, 1, 'Unlimited Bandwidth'),
(18, 5, 2, 'Unlimited Storage'),
(19, 5, 3, 'Unlimited Everything!'),
(20, 5, 4, 'Super Fast 100X Faster'),
(21, 5, 5, 'Free Setup');

--------------------------------------

CREATE TABLE IF NOT EXISTS `cv_page_tracker` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `session_id` int(15) NOT NULL,
  `action_order` int(10) NOT NULL,
  `page` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--------------------------------
CREATE TABLE IF NOT EXISTS `cv_traffic_statistics` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `device_type` int(1) NOT NULL,
  `os` varchar(30) NOT NULL,
  `country` varchar(3) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;



---------------------------------------------------------------------
INSERT INTO `1oltre`.`lp_permission_levels` (`id`, `name`, `level`) VALUES ('', 'Istruttore', '3');
UPDATE `1oltre`.`lp_permission_levels` SET `name`='Utente' WHERE `id`='2';
INSERT INTO `1oltre`.`lp_permission_levels` (`name`, `level`) VALUES ('Fornitore', '4');



