#! /bin/bash

docker tag sskorc/tidy-compass-dist:latest sskorc/tidy-compass-dist:$TRAVIS_BUILD_NUMBER

docker push sskorc/tidy-compass-dist

# curl -u sskorc:$DOCKER_CLOUD_API_KEY -H "Content-Type: application/json" -X POST -d '{"reuse_volumes":false}' https://cloud.docker.com/api/app/v1/service/$PHP_SERVICE_UUID/redeploy/
