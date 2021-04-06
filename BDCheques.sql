/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     05/04/2021 11:07:51 p. m.                    */
/*==============================================================*/


drop table if exists BANCO;

drop table if exists BANCO_CUENTA;

drop table if exists BITACORA;

drop table if exists CHEQUE;

drop table if exists CHEQUERA;

drop table if exists CHEQUE_CHEQ;

drop table if exists CLIENTE;

drop table if exists CUENTA;

drop table if exists CUENTA_CHEQU;

drop table if exists CUENTA_CLI;

drop table if exists NIVEL;

drop table if exists USUARIO;

drop table if exists USU_BITA;

drop table if exists USU_NIVEL;

/*==============================================================*/
/* Table: BANCO                                                 */
/*==============================================================*/
create table BANCO
(
   ID_BANCO             int(10) not null,
   NOMBRE               varchar(250),
   DIRECCION            varchar(0),
   primary key (ID_BANCO)
);

/*==============================================================*/
/* Table: BANCO_CUENTA                                          */
/*==============================================================*/
create table BANCO_CUENTA
(
   ID_CUENTA            int not null,
   ID_BANCO             int(10) not null,
   primary key (ID_CUENTA, ID_BANCO)
);

/*==============================================================*/
/* Table: BITACORA                                              */
/*==============================================================*/
create table BITACORA
(
   ID_BITACORA          int not null,
   FECHA                datetime,
   DETALLE              varchar(250),
   primary key (ID_BITACORA)
);

/*==============================================================*/
/* Table: CHEQUE                                                */
/*==============================================================*/
create table CHEQUE
(
   ID_CHEQUE            int not null,
   FECHA                datetime,
   MONTO                decimal(10,2),
   BENEFICIARIO         varchar(250),
   ESTADO               varchar(120),
   primary key (ID_CHEQUE)
);

/*==============================================================*/
/* Table: CHEQUERA                                              */
/*==============================================================*/
create table CHEQUERA
(
   ID_CHEQUERA          int not null,
   ESTADO               varchar(150),
   CANTIDAD             int(10),
   primary key (ID_CHEQUERA)
);

/*==============================================================*/
/* Table: CHEQUE_CHEQ                                           */
/*==============================================================*/
create table CHEQUE_CHEQ
(
   ID_CHEQUERA          int not null,
   ID_CHEQUE            int not null,
   primary key (ID_CHEQUERA, ID_CHEQUE)
);

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   ID_CLIENTE           int not null,
   NOMBRE               varchar(150),
   DIRECCION            varchar(175),
   DPI                  varchar(13),
   primary key (ID_CLIENTE)
);

/*==============================================================*/
/* Table: CUENTA                                                */
/*==============================================================*/
create table CUENTA
(
   ID_CUENTA            int not null,
   NUM_CUENTA           varchar(0),
   SALDO                decimal(15,2),
   TIPO                 varchar(60),
   ESTADO               varchar(60),
   primary key (ID_CUENTA)
);

/*==============================================================*/
/* Table: CUENTA_CHEQU                                          */
/*==============================================================*/
create table CUENTA_CHEQU
(
   ID_CUENTA            int not null,
   ID_CHEQUERA          int not null,
   primary key (ID_CUENTA, ID_CHEQUERA)
);

/*==============================================================*/
/* Table: CUENTA_CLI                                            */
/*==============================================================*/
create table CUENTA_CLI
(
   ID_CLIENTE           int not null,
   ID_CUENTA            int not null,
   primary key (ID_CLIENTE, ID_CUENTA)
);

/*==============================================================*/
/* Table: NIVEL                                                 */
/*==============================================================*/
create table NIVEL
(
   ID_NIVEL             int not null,
   NIVEL                varchar(200),
   DETALLE              varchar(200),
   primary key (ID_NIVEL)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USU               int not null,
   NOMBRE               varchar(150),
   USUARIO              varchar(200),
   PASS                 varchar(200),
   primary key (ID_USU)
);

/*==============================================================*/
/* Table: USU_BITA                                              */
/*==============================================================*/
create table USU_BITA
(
   ID_USU               int not null,
   ID_BITACORA          int not null,
   primary key (ID_USU, ID_BITACORA)
);

/*==============================================================*/
/* Table: USU_NIVEL                                             */
/*==============================================================*/
create table USU_NIVEL
(
   ID_USU               int not null,
   ID_NIVEL             int not null,
   primary key (ID_USU, ID_NIVEL)
);

alter table BANCO_CUENTA add constraint FK_REFERENCE_11 foreign key (ID_CUENTA)
      references CUENTA (ID_CUENTA) on delete restrict on update restrict;

alter table BANCO_CUENTA add constraint FK_REFERENCE_12 foreign key (ID_BANCO)
      references BANCO (ID_BANCO) on delete restrict on update restrict;

alter table CHEQUE_CHEQ add constraint FK_REFERENCE_7 foreign key (ID_CHEQUERA)
      references CHEQUERA (ID_CHEQUERA) on delete restrict on update restrict;

alter table CHEQUE_CHEQ add constraint FK_REFERENCE_8 foreign key (ID_CHEQUE)
      references CHEQUE (ID_CHEQUE) on delete restrict on update restrict;

alter table CUENTA_CHEQU add constraint FK_REFERENCE_5 foreign key (ID_CUENTA)
      references CUENTA (ID_CUENTA) on delete restrict on update restrict;

alter table CUENTA_CHEQU add constraint FK_REFERENCE_6 foreign key (ID_CHEQUERA)
      references CHEQUERA (ID_CHEQUERA) on delete restrict on update restrict;

alter table CUENTA_CLI add constraint FK_REFERENCE_10 foreign key (ID_CUENTA)
      references CUENTA (ID_CUENTA) on delete restrict on update restrict;

alter table CUENTA_CLI add constraint FK_REFERENCE_9 foreign key (ID_CLIENTE)
      references CLIENTE (ID_CLIENTE) on delete restrict on update restrict;

alter table USU_BITA add constraint FK_REFERENCE_3 foreign key (ID_USU)
      references USUARIO (ID_USU) on delete restrict on update restrict;

alter table USU_BITA add constraint FK_REFERENCE_4 foreign key (ID_BITACORA)
      references BITACORA (ID_BITACORA) on delete restrict on update restrict;

alter table USU_NIVEL add constraint FK_REFERENCE_1 foreign key (ID_USU)
      references USUARIO (ID_USU) on delete restrict on update restrict;

alter table USU_NIVEL add constraint FK_REFERENCE_2 foreign key (ID_NIVEL)
      references NIVEL (ID_NIVEL) on delete restrict on update restrict;

