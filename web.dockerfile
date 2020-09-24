FROM nginx:1.13.3

COPY vhost.conf /etc/nginx/conf.d/default.conf
