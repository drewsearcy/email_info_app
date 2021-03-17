#!/bin/sh
kubectl create namespace emailinfoapp
kubectl apply -f k8s_deploy_email_info_app.yml
