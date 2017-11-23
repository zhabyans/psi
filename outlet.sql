/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/11/2017 09.56.19                          */
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
   ID_BARANG            int not null,
   NAMA_BARANG          text not null,
   HARGA                int not null,
   EXPIRED              date not null,
   primary key (ID_BARANG)
);

/*==============================================================*/
/* Table: DATA_PENGELUARAN                                      */
/*==============================================================*/
create table DATA_PENGELUARAN
(
   ID_TRANSAKSI         int not null,
   ID_PENDATAAN         int not null,
   ID_BARANG            int not null,
   ID_USER              int,
   TANGGAL_TERJUAL      date not null,
   JUMLAH_TERJUAL       int not null,
   TOTAL_HARGA          int not null,
   primary key (ID_TRANSAKSI)
);

/*==============================================================*/
/* Table: PENDATAAN_BARANG                                      */
/*==============================================================*/
create table PENDATAAN_BARANG
(
   ID_PENDATAAN         int not null,
   ID_BARANG            int,
   ID_USER              int not null,
   TANGGAL_MASUK        date not null,
   STOK                 int not null,
   STATUS_RETUR         text not null,
   primary key (ID_PENDATAAN)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              int not null,
   USER                 text not null,
   PASSWORD             text not null,
   primary key (ID_USER)
);

alter table DATA_PENGELUARAN add constraint FK_MENCATAT foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table DATA_PENGELUARAN add constraint FK_MENGAMBIL_DATA foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table DATA_PENGELUARAN add constraint FK_PROSES_PENGELUARAN foreign key (ID_PENDATAAN)
      references PENDATAAN_BARANG (ID_PENDATAAN) on delete restrict on update restrict;

alter table PENDATAAN_BARANG add constraint FK_MEMASUKKAN foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table PENDATAAN_BARANG add constraint FK_MENGAMBIL_DATA foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

