drop schema scoreboard;
create schema scoreboard;
use scoreboard;

create table people(
	id int primary key,
	name varchar(50) unique not null
);

create table event(
	id int primary key
);

create table scores(
	id int primary key,
	eid int not null,
	pid int not null,
	foreign key (eid) references event(id),
	foreign key (pid) references people(id)
);
