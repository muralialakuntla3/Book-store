# LAMP [ Linux, Apache, MySQL, PHP]

## Deployment through Jenkins Pipeline
- launch server
- t2.medium
- os: ubuntu 20.04
- ports: 22, 80, 8080, 3306
- Root Volume: 15 GB
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
- sudo usermod -aG docker jenkins
- newgrp docker
### Jenkins Configuration 
- open jenkins in browser and install suggested plugins
- configure node details if any ( install java & docker)
### docker hub credentials updating
- goto docker hub and generate token
- goto jenkins -> manage jenkins -> credentilas -> add docker hub details
### Slack configuration
- goto your slack workspace and create channel and configure with JenkinsCI
- install **slack plugin & Pipeline Utility Steps** plugins in jenkins
- restart jenkins after plugin install
- goto manage jenkins -> system 
- Global Slack Messages -> this settings for after build status you need to include slack in Jenkinsfile
- Slack -> this is for slack intigration in Jenkinsfile -> workspace , token -> test connection
### Create Pipeline job for Application
- create pipeline job for application
- configure github details
- select branch and specify Jenkinsfile path
- save & run pipeline
- check application through browser whether it is running or not
### Github-webhook trigger
- goto your github repo
- goto settings-> Webhooks
- Add Webhook
- Payload Url: **http://Jenkins-pub-ip:8080/github-webhook/**
- select push event and click on Add Webhook
- goto you jenkins job -> configure -> select **GitHub hook trigger for GITScm polling**
