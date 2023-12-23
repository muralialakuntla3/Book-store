# LAMP [ Linux, Apache, MySQL, PHP]


## Docker Deployment without Docker Network
### Mysql Setup
- docker run -dt --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=Qwerty@123 mysql

### PHP Setup:
- git clone -b docker-v2 https://github.com/muralialakuntla3/Book-store.git
- cd Book-store
- docker build -t book .
- docker run -dt --name book --link mysql:mysql -p 80:80 -e DB_SERVERNAME=mysql -e DB_USERNAME=root -e DB_PASSWORD=Qwerty@123 -e DB_NAME=mkbook book
-------------------------------------------------------------------------------------------------------------------------------------------------------
## Docker Deployment with Docker Network

### Docker Network Setup
- docker network create -d bridge book
### Mysql Setup
- docker run -dt --name mysql --network book -p 3306:3306 -e MYSQL_ROOT_PASSWORD=Qwerty@123 mysql

### PHP Setup:
- git clone -b docker-v2 https://github.com/muralialakuntla3/Book-store.git
- cd Book-store
- docker build -t book .
- docker run -dt --name book --network book -p 80:80 -e DB_SERVERNAME=mysql -e DB_USERNAME=root -e DB_PASSWORD=Qwerty@123 -e DB_NAME=mkbook book
