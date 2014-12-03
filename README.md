# Price Tracker

This project includes two parts, Client and Server.

Client has a typical MVC architecture and it is a single page build on cakePhP. It allows clients to create, remove, update and delete the wishlists.
Server is build in Java. It crawls the products' websites the clients saved and sends email notices to clients when the products is decreasing to the target price.

## Client Screenshot

![alt tag](https://github.com/qf28/CS575/blob/master/doc/main.png)

## Server Directory

![alt tag](https://github.com/qf28/CS575/blob/master/doc/server.png)

## How to build and test

#### Set up local mysql databse:

create database and table using db.sql

#### Client(Need an environment of web server such as Http Server):

<br>1. Set up : put client folder in a local server folder(I use MAMP/htdocs)</br>
<br>2. configure database:  Client/app/database.php</br>
<br>3. open browser: http://localhost:8888/CS575/Client/</br>

#### Server:

<br>1. Edit config file(Server/config) with local mysql database information</br>
<br>2. Import Server folder to Java IDE such as Eclipse and configure buildpath by adding jars from Server/lib</br>
<br>3. Run in eclipse IDE.</br>
