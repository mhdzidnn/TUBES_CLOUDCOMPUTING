pipeline {
    agent any

    stages {
        stage('Checkout Source Code (Github)') {
            steps {
                // Checkout the code from your GitHub repository
                git branch: 'master', credentialsId: 'github-credentials', url: 'https://github.com/mhdzidnn/TUBES_CLOUDCOMPUTING.git'
            }
        }
        stage('Pull Docker Image (Docker) ') {
            steps {
                script {
                    // docker.image("laravel-app:latest").pull()
                    echo "Skipping Docker image pull for now."
                }
            }
        }
        stage('Execute Tests (Docker) ') {
            steps {
                script {
                    // Run tests using Docker Compose
                    // bat 'docker-compose run --rm app php artisan test'
                    echo "Skipping test execution for now."
                }
            }
        }
        stage('Deploy Application (Docker)') {
            steps {
                script {
                    // Deploy the application using Docker Compose
                    // bat 'docker-compose up -d'
                    echo "Skipping application deployment for now."
                }
            }
        }
        stage('Notify via Microsoft Teams (Microsoft Teams)') {
            steps {
                office365ConnectorSend webhookUrl: 'https://telkomuniversityofficial.webhook.office.com/webhookb2/c8a0a4ba-3698-43da-a492-65ef86fe47c6@90affe0f-c2a3-4108-bb98-6ceb4e94ef15/JenkinsCI/9a9862098f5149b193fcb8ddc110e5a6/c794b311-2978-4f64-9306-c923210d493f/V2W4IzNdCIhhjDm1aHwKgg3PQKkPAH177KCrcLSYZXi-U1',
                                       status: currentBuild.currentResult,
                                       message: "Build ${currentBuild.fullDisplayName} - ${currentBuild.currentResult}"
            }
        }
        stage('Integrate with (Grafana)') {
            steps {
                script {
                    // Uncomment the following lines if you need to integrate with Grafana in the future
                    // def grafanaUrl = 'http://your-grafana-url'
                    // if (grafanaUrl) {
                    //     def grafanaResponse = httpRequest(
                    //         url: grafanaUrl + '/api/dashboards/db/your-dashboard',
                    //         customHeaders: [[name: 'Authorization', value: "Bearer YOUR_API_KEY"]]
                    //     )
                    //     echo "Grafana Response: ${grafanaResponse.content}"
                    // } else {
                    //     echo "Grafana URL is empty. Skipping Grafana Integration stage."
                    // }
                    echo "Skipping Grafana integration for now."
                }
            }
        }
    }
}