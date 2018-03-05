docker-php-nginx-mysql-memcached
====

## Overview

php + nginx + mysql環境の docker-compose のサンプルです。

## Description(Japanse)

下記をベースにつくりました  
[【超簡単】Docker を使って1クリックでモダンな PHP 開発環境ができるようにする（PHP, MySQL, PHP-FPM, nginx, memcached）](http://koni.hateblo.jp/entry/2017/01/28/150522)



## インストール

Install Docker for Mac.

[Docker forMac](https://docs.docker.com/docker-for-mac/)

Clone this repository.

```bash
$ git clone https://github.excite.ad.jp/shunsuke-nagano/docker-php-sample
```

## ファイル全般
### ディレクトリ構成
基本的にコンテナごとにディレクトリをきっています。  
特筆すること
root/  
    ├ misc/data: 永続化データ保存用  
    ├ mysql: mysql用コンテナ  
    │  └ initial.sql:  DB初期化用sql。この[シェル](https://github.com/docker-library/mysql/blob/master/5.7/docker-entrypoint.sh)が動きます。  
    ├ nginx: nginx用コンテナ  
    ├ php:   サンプルphp用コンテナ(simple php)  
    └ slim:   サンプルphp用コンテナ(framework php)  
       └ sample:  slim用プロジェクト  
### ファイルについて
基本的には各ミドルウェアや言語に必要なファイルを置いておく。
実際の実行パスはDockerfileかcomposeに記述しておく。以下のファイルは極力コンテナ単位で作っておくと良いと思われる。
* .env:  与える環境変数。系を記述。基本はgit管理しないように
* Dockerfile:  コンテナのビルドを記述する


## Usage

Up:

```bash
$ cd $PROJECT_HOME
$ docker-compose up
```

Stop:

```bash
$ cd $PROJECT_HOME
$ docker-compose down
```

run (nginx only)
```
$ cd $PROJECT_HOME/nginx
$ docker run -p "80:80" -v "$PWD/public:/usr/share/nginx/html" --name sample_nginx_default -d nginx
```


## License

This software is released under the MIT License, see [LICENSE](https://github.com/koni/docker-php-nginx-mysql-memcached/blob/master/LICENSE).

## Author

[shunsuke](https://github.excite.ad.jp/shunsuke-nagano/)
