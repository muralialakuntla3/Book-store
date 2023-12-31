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
-------------------------------------------------------------------------------------------------------------------------------------------------------
## Deployment through Jenkins Pipeline
- launch server
### install java and jenkins
- sudo apt install openjdk-17* -y
- sudo wget -O /usr/share/keyrings/jenkins-keyring.asc \
  https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key
- echo deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] \
  https://pkg.jenkins.io/debian-stable binary/ | sudo tee \
  /etc/apt/sources.list.d/jenkins.list > /dev/null
- sudo apt-get update
- sudo apt-get install jenkins -y
- sudo visudo
- add this: **jenkins ALL=(ALL:ALL) ALL**
- restart jenkins: sudo systemctl restart jenkins
### install docker for building images
- curl -fsSL https://get.docker.com -o install-docker.sh
- sudo sh install-docker.sh
- sudo usermod -aG docker ubuntu
- newgrp docker
### docker hub credentials updating
- open jenkins in browser and install suggested plugins
- goto docker hub and generate token
- goto jenkins -> manage jenkins -> credentilas -> add docker hub details
### Slack configuration
- goto your slack workspace and create channel and configure with JenkinsCI
- install slack plugin in jenkins
- restart jenkins after plugin install
- goto manage jenkins -> system 
- Global Slack Messages -> this settings for after build status you need to include slack in Jenkinsfile
- Slack -> this is for slack intigration in Jenkinsfile -> workspace , token -> test connection
### create Pipeline 
- configure node details if any ( install java & docker)
- create pipeline job for application
- run pipeline
- check application through browser whether it is running or not 
