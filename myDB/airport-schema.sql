.mode columns
.headers on
.nullvalue NULL	
PRAGMA foreign_keys = ON;


-- drop these tables from schema if they already exist
drop table if exists onboard;
drop table if exists flights;
drop table if exists passengers;
drop table if exists planes;


--create the following tables:

create table passengers (
    f_name TEXT NOT NULL,
    m_name TEXT,
    l_name TEXT NOT NULL,
    ssn    TEXT PRIMARY KEY
);



create table planes (
	tail_no INTEGER PRIMARY KEY,
	make TEXT NOT NULL,
	model TEXT NOT NULL,
	capacity INTEGER,
	mph INTEGER
);



create table flights (
	flight_no INTEGER PRIMARY KEY,
	dep_loc TEXT NOT NULL,
	dep_time TEXT NOT NULL,
	arr_loc TEXT NOT NULL,
	arr_time TEXT NOT NULL,
	tail_no INTEGER,
	foreign key (tail_no) references planes(tail_no) on update cascade on delete cascade
);



create table onboard (
	ssn TEXT,
	flight_no INTEGER,
	seat TEXT,
	primary key(ssn,flight_no),
	foreign key(ssn) references passengers(ssn),
	foreign key(flight_no) references flights(flight_no) on update cascade on delete cascade
);