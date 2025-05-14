## Ticket System Laravel Project Template

This is the skeleton of a Laravel application that I use to save the initial setup that I usually make. Feel free to use and to customize according to your needs.

**To create a project from this repository:**

```
git clone --depth=1 --branch=master https://github.com/federicocadierno/lav-tickets-system.git <projectName>
cd !$
rm -rf .git
composer run-script post-root-package-install
composer install
composer run-script post-create-project-cmd
```

### What is included

- `laravel/sail` package.
- Base asset structure to resources directory.
- `Dockerfile`, `docker-compose.yml` and a 'database' directory to store database container data.

## Usage

Install [Docker](https://www.docker.com/) on your system.

* [Install instructions](https://docs.docker.com/installation/mac/) for Mac OS X
* [Install instructions](https://docs.docker.com/installation/ubuntulinux/) for Ubuntu Linux
* [Install instructions](https://docs.docker.com/installation/) for other platforms

Install [Docker Compose](http://docs.docker.com/compose/) on your system.

To start the containers

```bash
docker-compose build # only the first time
docker-compose up
```

If you are running the application for the first time you should
run the migrations and the default gulp task (to compile the assets)

```bash
docker exec -i -t <projectName>_web_1 composer install    # install php dependencies
docker exec -i -t <projectName>_web_1 php artisan migrate # run migrations
```


### License

This project is open-source and licensed under the [MIT license](http://opensource.org/licenses/MIT)