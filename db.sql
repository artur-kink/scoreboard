drop schema scoreboard;
create schema scoreboard;
use scoreboard;

create table people(
	id int primary key AUTO_INCREMENT,
	name varchar(25) unique not null
);

create table event_status(
    id int primary key AUTO_INCREMENT,
    name nvarchar(25) unique not null
);

create table events(
	id int primary key AUTO_INCREMENT,
	name nvarchar(50) not null,
	time datetime not null,
    status int not null,
    foreign key (status) references event_status(id)
);

create table scores(
	id int primary key AUTO_INCREMENT,
	eid int not null,
	pid int not null,
	score int not null,
	foreign key (eid) references event(id),
	foreign key (pid) references people(id)
);


create view scores_view as(
	select s.*, p.name
	from scores s
	inner join people p on s.pid = p.id
)
