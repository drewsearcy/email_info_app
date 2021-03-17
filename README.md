# Building and deploying email_info_app.php to Kubernetes

### Overview
This application accepts an HTTP POST request with data that includes a raw email in binary format. It will
return a JSON object in the response with the result of specific fields from the header section of the email.

<b>The specific fields are:</b>
```
To:
From:
Date:
Subject:
Message-ID:
```

<b>Example response:</b>

```json
{
 "To": "santa@northpole.com",
 "From": "\"L.L.Bean\" <llbean@e1.llbean.com>",
 "Date": "Thu, 16 Mar 2017 04:22:00 -0700",
 "Subject": "Climbing mountains. Breaking barriers.",
 "Message-ID": "<0.0.4D.537.1D2EDF347E56956.0@omp.e1.llbean.com>"
}
```
#### Application Dependencies
1. Git
2. Docker
2. Kubernetes

# How to use

#### Step 1: Get the code
`git clone git@github.com:drewsearcy/email_info_app.git`

#### Step 2: Build the image
This application uses Apache and PHP from https://hub.docker.com/_/php for simplicity. The build process
simply places the email_info_app.php file in the web root of the image.

<b>Build Image Option 1:</b>

`docker build -t email_info_app .`

<b>Build Image Option 2:</b>
Execute the supplied build_email_app_image.sh file:

`sh build_email_app_image.sh`

#### Step 3: Deploy the container to Kubernetes
This step will use the Docker image built in step 2 and deploy the service to Kubernetes on port 30001. Alternatively, you could
deploy your image to your own  registry and adjust the `imagePullPolicy` in `k8s_deploy_email_info_app.yml` file.

<b>Deployment Option 1:</b>

`kubectl apply -f k8s_deploy_email_info_app.yml`

<b>Deployment Option 2:</b>

Execute the supplied deploy_email_info_app.sh file:
`sh deploy_email_info_app.sh`

#### Example usage

This example uses the supplied email file (sample_email.msg) in the POST request.

`curl -XPOST --data-binary @sample_email.msg http://localhost:30001/email_info_app.php`
