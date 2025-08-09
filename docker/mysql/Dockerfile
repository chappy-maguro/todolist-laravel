FROM mysql:5.7

ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=todolist
ENV MYSQL_USER=user
ENV MYSQL_PASSWORD=password

# MySQL設定ファイルをコンテナにコピー
COPY ./my.cnf /etc/mysql/conf.d/my.cnf