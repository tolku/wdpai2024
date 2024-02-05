#konfiguracja dockera dla serwera nginx
FROM nginx:1.17.8-alpine

COPY . /app/
#przekopiowujemy lokalny plik z konfiguracja nginx'a do zdalnego folderu z konfiguracja
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf
