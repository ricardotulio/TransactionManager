CREATE TABLE customer (
	id integer primary key,
	name varchar(60) not null
);

CREATE TABLE customer_address (
	id integer primary key,
	customer_id integer not null,
	street varchar(120) not null,
	FOREIGN KEY (customer_id) REFERENCES customer (id)
);