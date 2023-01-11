pipeline{
    agent any
    environment{
        staging_server="13.234.21.150"
    }
    stages{
        stage('Deploy to Remote'){
            steps{
                // sh '''
                //     for fileName in `find ${WORKSPACE} -type f -mmin -10 | grep -v ".git" | grep -v "Jenkinsfile"`
                //     do
                //         fil=$(echo ${fileName} | sed 's/'"${JOB_NAME}"'/ /' | awk {'print $2'})
                //         scp -r ${WORKSPACE}${fil} root@${staging_server}:/var/www/html/backend_api${fil}
                //     done
                // '''
                sh 'scp ${WORKSPACE}/* root@${staging_server}:/var/www/html/backend_api/'
            }
        }
    }
}

