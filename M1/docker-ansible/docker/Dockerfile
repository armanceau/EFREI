
FROM debian
RUN apt-get update
RUN apt-get install -y nginx
EXPOSE 80 443
COPY index.html /var/www/html/index.html
ENTRYPOINT ["nginx", "-g","daemon off;"]