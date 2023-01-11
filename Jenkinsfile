node(){
    stage('Cloning Git') {
        checkout scm
    }
        
    stage('Package Build') {
        sh "tar -zcvf bundle.tar.gz backend_api/"
    }

    stage('Artifacts Creation') {
        fingerprint 'bundle.tar.gz'
        archiveArtifacts 'bundle.tar.gz'
        echo "Artifacts created"
    }

    stage('Stash changes') {
        stash allowEmpty: true, includes: 'bundle.tar.gz', name: 'buildArtifacts'
    }
}

node('awsnode') {
    echo 'Unstash'
    unstash 'buildArtifacts'
    echo 'Artifacts copied backend'

    echo 'Copy'
    sh "yes | sudo cp -R bundle.tar.gz /var/www/html && cd /var/www/html && sudo tar -xvf bundle.tar.gz"
    echo 'Copy completed for backend'
}

// pipeline{
//     agent any
//     environment{
//         staging_server="3.111.33.73"
//     }
//     stages{
//         stage('Deploy to Remote'){
//             agent {label 'slave_api'}
//             steps{
//                 // sh '''
//                 //     for fileName in `find ${WORKSPACE} -type f -mmin -10 | grep -v ".git" | grep -v "Jenkinsfile"`
//                 //     do
//                 //         fil=$(echo ${fileName} | sed 's/'"${JOB_NAME}"'/ /' | awk {'print $2'})
//                 //         scp -r ${WORKSPACE}${fil} root@${staging_server}:/var/www/html/backend_api${fil}
//                 //     done
//                 // '''
//                 sh 'scp ${WORKSPACE}/* root@${staging_server}:/var/www/html/backend_api/'
//             }
//         }
//     }
// }

