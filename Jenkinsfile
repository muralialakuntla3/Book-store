pipeline {
    agent{
       label 'slave'
     }
    environment {
        DOCKERHUB_CREDENTIALS = credentials('docker-hub')
        registry = "muralialakuntla3/book-store"
        registryCredential = 'docker-hub'
            dockerImage = ''
    }
    stages{
        stage('Docker Build') {
            steps {
                sh 'docker build -t muralialakuntla3/book-store .'
             }
          }
        stage('Docker Login & Push') {
            steps {
                sh 'echo $dockerhub_PSW | docker login -u $dockerhub_USR --password-stdin'
                sh 'docker push muralialakuntla3/book-store'
            }
          }
        stage('Docker Network') {
            steps {
                
		        sh 'docker network create -d bridge booknetwork'
            }
          }
        stage('Remove Docker Images') {
            steps {
                sh 'docker rmi -f muralialakuntla3/book-store'
              }
          }
        stage('Creating Database') {
            steps {
                sh 'docker run -dt --name mysql --network booknetwork -p 3306:3306 -e MYSQL_ROOT_PASSWORD=Qwerty@123 mysql'
                }
           }
        stage('Running the docker container') {
            steps {
                sh 'docker run -dt --name book --network booknetwork -p 80:80 -e DB_SERVERNAME=mysql -e DB_USERNAME=root -e DB_PASSWORD=Qwerty@123 -e DB_NAME=mkbook muralialakuntla3/book-store'
                }
              }
        stage ('Slack Notification'){
            steps {
                slackSend channel: 'jenkins-slacks', color: '439FE0', message: 'slackSend "started ${env.JOB_NAME} ${env.BUILD_NUMBER} (<${env.BUILD_URL}|Open>)"', teamDomain: 'konalms', tokenCredentialId: 'slack', username: 'jenkins-murali'
            }
        }
    }
}
