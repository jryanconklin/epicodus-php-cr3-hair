
-- Command Line for Database Construction

CREATE DATABASE hair_salon;
USE hair_salon;

CREATE TABLE stylists (
    id serial PRIMARY KEY,
    name VARCHAR(70)
    );

CREATE TABLE clients (
    id serial PRIMARY KEY,
    name VARCHAR(70),
    stylist_id INT
    );
