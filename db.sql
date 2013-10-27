drop schema scoreboard;
create schema scoreboard;
use scoreboard;

create table people(
	id int primary key AUTO_INCREMENT,
	name varchar(50) unique not null
);

create table events(
	id int primary key AUTO_INCREMENT,
	name nvarchar(50) not null,
	time datetime not null
);

create table scores(
	id int primary key AUTO_INCREMENT,
	eid int not null,
	pid int not null,
	score int not null,
	foreign key (eid) references event(id),
	foreign key (pid) references people(id)
);