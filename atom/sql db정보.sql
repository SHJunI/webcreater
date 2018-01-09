use bachelor;
create table stdtb1(
stdname varchar(10) not null primary key,
addr char(4) not null);

create table clubtb1(
clubname varchar(10) not null primary key,
roomno char(4) not null);

create table stdclubtb1(
num int auto_increment not null primary key,
stdname varchar(10) not null,
clubname varchar(10) not null,
foreign key(stdname) references stdtb1(stdname),
foreign key(clubname) references clubtb1(clubname)
);

insert into stdtb1 values ('김범수','경남'),('성시경','서울'),('조용필','경기'),('은지원','경북'),('바비킴','서울');
insert into clubtb1 values ('수영','101호'),('바둑','102호'),('축구','103호'),('봉사','104호');
insert into stdclubtb1 values ('','김범수','바둑'),('','김범수','축구'),('','조용필','축구'),('','은지원','축구'),('','은지원','봉사'),('','바비킴','봉사');
