#!/bin/sh
echo "Removing Kubernetes Deployment"
kubectl delete -n emailinfoapp service,pod,deployment --all

echo "Removing Kubernetes emailinfoapp namespace"
kubectl delete namespace emailinfoapp

echo "Removing email_info_app Docker image"
docker image rm -f email_info_app
