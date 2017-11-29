/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/29/2017 6:00:31 AM                        */
/*==============================================================*/


drop table if exists BARANG;

drop table if exists DATA_PENGELUARAN;

drop table if exists PENDATAAN_BARANG;

drop table if exists USER;

/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG
(
   ID_BARANG            int not null auto_increment,
   NAMA_BARANG          varchar(30),
   HARGA                int,
   EXPIRED              int,
   primary key (ID_BARANG)
);

/*==============================================================*/
/* Table: DATA_PENGELUARAN                                      */
/*==============================================================*/
create table DATA_PENGELUARAN
(
   ID_TRANSAKSI         varchar(20) not null,
   ID_PENDATAAN         varchar(20),
   ID_BARANG            int,
   ID_USER              int not null,
   TANGGAL_TERJUAL      date,
   JUMLAH_TERJUAL       int,
   TOTAL_TERJUAL        int,
   primary key (ID_TRANSAKSI)
);

/*==============================================================*/
/* Table: PENDATAAN_BARANG                                      */
/*==============================================================*/
create table PENDATAAN_BARANG
(
   ID_PENDATAAN         varchar(20) not null,
   ID_BARANG            int not null,
   ID_USER              int not null,
   TANGGAL_MASUK        date,
   STOK                 int,
   STATUS_RETUR         varchar(10),
   primary key (ID_PENDATAAN)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              int not null auto_increment,
   USER                 varchar(20),
   PASSWORD             varchar(20),
   primary key (ID_USER)
);

alter table DATA_PENGELUARAN add constraint FK_MENCATAT foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table DATA_PENGELUARAN add constraint FK_MENGAKSES_NAMA foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table DATA_PENGELUARAN add constraint FK_MENGAMBIL_STOK foreign key (ID_PENDATAAN)
      references PENDATAAN_BARANG (ID_PENDATAAN) on delete restrict on update restrict;

alter table PENDATAAN_BARANG add constraint FK_MENGINPUTKAN foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table PENDATAAN_BARANG add constraint FK_MENYIMPAN_NAMA foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

