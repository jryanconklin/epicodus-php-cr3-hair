# Hair Salon
Database Basics with PHP

*Code Review #3*

## Features
Database application to record a list of stylists and their respective clients.

## Technologies

PHP, SQL, Silex, Twig, HTML, CSS and Bootstrap.

## Usage

To use the code, you can clone the repository at [https://github.com/jryanconklin/epicodus-php-cr3-hair](https://github.com/jryanconklin/epicodus-php-cr3-hair).

For best results, please:

- Install Composer (available at [https://getcomposer.org/](https://getcomposer.org/))
- Clone the Repository
- Install Silex and Twig via Composer
- Port the Provided "To Do" Database to Your MySQL Provider
- Launch Project in Server Mode

## Specifications

#### Specification 1 ####
*Create and Display a Stylist.*

__Input__: 'Bilbo Baggins'

__Output__: 'Bilbo Baggins'

#### Specification 2 ####
*Edit a Stylist*

__Input__: 'Bilbo Baggins'

__Output__: 'Frodo Baggins'

#### Specification 3 ####
*Delete a Stylist*

__Input__: 'Bilbo Baggins'

__Output__: ''

#### Specification 4 ####
*Create and Display a Client.*

__Input__: 'Gandalf the Grey'

__Output__: 'Gandalf the Grey'

#### Specification 5 ####
*Edit a Client*

__Input__: 'Gandalf the Grey'

__Output__: 'Thorin Oakenshield'

#### Specification 6 ####
*Delete a Client*

__Input__: 'Gandalf the Grey'

__Output__: ''

## SQL Database Install Commands ##

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

## Author/s
J. Ryan Conklin

##License
This work can be used under the MIT License.
Copyright (c) 2016 J. Ryan Conklin
