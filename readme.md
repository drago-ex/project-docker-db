# Drago Project with a database

The package extends Drago Project with a MySQL database in Docker.

[![PHP version](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db.svg)](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db)
[![Coding Style](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml)

## Requirements

- PHP >= 8.3, < 9
- [Drago Project](https://github.com/drago-ex/project)
- Docker

## Installation

```bash
composer require drago-ex/project-docker-db
```

## Files copied into the project

The files are copied into the project by [drago-ex/project-tools](https://github.com/drago-ex/project-tools),
as set in `extra.drago-tools` of this package's `composer.json`.

## The package does the following

- Copies a configured Neon file with database settings preconfigured for Docker.
- Adds Docker files for database setup.
- Integrates Dibi for database interaction.

The data of the database are in the Docker volume `db-data`, which is much faster than a directory of the project
on Windows. `docker compose down` keeps it, `docker compose down --volumes` deletes the data.

## Development only

The database user, passwords (`super`/`pass`, root `root`) and the published port 6033 in
`docker-compose.override.yaml` and `app/db.neon` are for local development. Change them, and do not publish
the port, before the setup runs anywhere else (the `docker:production` script uses the same files).

## Remember

The package extends the basic PHP Docker server with a MySQL database. Install and build the base Docker setup first, then add this database package and rebuild Docker.

https://github.com/drago-ex/project-docker
