FROM nginx:1.18-alpine

SHELL ["/bin/ash", "-oeux", "pipefail", "-c"]

COPY ./default.conf /etc/nginx/conf.d/default.conf

WORKDIR /work