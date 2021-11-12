PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE buku_tbl(idbuku integer primary key, judul varchar, harga integer, penulis varchar);
INSERT INTO buku_tbl VALUES(2,'Basis Data SQLite',65000,'Abstar');
INSERT INTO buku_tbl VALUES(3,'Basis Data MySQL',70000,'Lukman');
INSERT INTO buku_tbl VALUES(4,'NodeJS',97000,'Budi Raharjo');
INSERT INTO buku_tbl VALUES(5,'Pembelajaran PHP ',50000,'A. Kadir');
INSERT INTO buku_tbl VALUES(6,'Test',0,'');
INSERT INTO buku_tbl VALUES(7,'Test',10000,'');
CREATE TABLE buku (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    judul TEXT NOT NULL,
    isbn TEXT NOT NULL,
    penerbit TEXT,
    tahun_terbit TEXT,
    halaman INTEGER
, penulis text);
INSERT INTO buku VALUES(15,'Fugit id fugit tem','12-21312-31231','Reprehenderit volupt','2000',180,'Raka Yuda P.');
INSERT INTO buku VALUES(16,'Porro dolores non ut','1238-2131-1231','Esse quia enim sint','2001',190,'Dede Ramdani');
INSERT INTO buku VALUES(17,'Provident est qui ','1231-1111-0213','Reiciendis sed maior','1978',190,'Syuja Ramadhani');
INSERT INTO buku VALUES(18,'Cillum voluptatibus ','1992-1232-2311','Id sint similique ea','2009',400,'Raka Y. P.');
INSERT INTO buku VALUES(19,'Iure in impedit iruas','1992-1231-2300','Dolore ad ipsa anim','2009',200,'Repudiandae inventor');
INSERT INTO buku VALUES(24,'Officia nemo est ani','1231-1111-0213','Hic in fugit tempor','1999',200,'Voluptatibus rem vel');
CREATE TABLE user (nim integer primary key, nama text not null);
INSERT INTO user VALUES(41519110143,'Raka Yuda Pradipta');
INSERT INTO user VALUES(41519110144,'Dede Ramdani');
INSERT INTO user VALUES(41519110145,'Syuja Ramadhani');
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('buku',25);
COMMIT;
