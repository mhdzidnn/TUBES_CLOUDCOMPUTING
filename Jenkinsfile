pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Checkout the code from your GitHub repository
                git branch: 'main', credentialsId: 'github-credentials', url: 'https://github.com/mhdzidnn/TUBES_CLOUDCOMPUTING.git'
            }
        }
        stage('Pull Existing Docker Image') {
            steps {
                script {
                    // Pull the existing Docker image if needed
                    // This step can be omitted if you are sure the image is already available
                    docker.image("laravel-app:latest").pull()
                }
            }
        }
        stage('Run Tests') {
            steps {
                script {
                    // Run tests using Docker Compose
                    bat 'docker-compose run --rm app php artisan test'
                }
            }
        }
        stage('Deploy') {
            steps {
                script {
                    // Deploy the application using Docker Compose
                    bat 'docker-compose up -d'
                }
            }
        }
    }
}