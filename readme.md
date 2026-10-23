# Drago Project with a database

English | [Čeština](readme.cs.md)

The package extends Drago Project with a MySQL database in Docker.

[![PHP version](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db.svg)](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db)
[![Coding Style](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml)

## Requirements

- PHP >= 8.3, < 9
- Nette Framework
- Docker
- Dibi
- Drago Project core packages

## Installation

```bash
composer require drago-ex/project-docker-db
```

## Project files

File copying is handled automatically by [drago-ex/project-tools](https://github.com/drago-ex/project-tools),
which must be installed in your project. Without it, copy the files manually according to the `copy` section
in this package's `composer.json`. To skip this package, set `"skip": true` under
`extra.drago-tools.packages.<package-name>` in your root `composer.json`.

## The package does the following

- Copies a configured Neon file with database settings preconfigured for Docker.
- Adds Docker files for database setup.
- Integrates Dibi for database interaction.

## Development only

The database user, passwords (`super`/`pass`, root `root`) and the published port 6033 in
`docker-compose.override.yaml` and `app/db.neon` are for local development. Change them, and do not publish
the port, before the setup runs anywhere else (the `docker:production` script uses the same files).

## Remember

The package extends the basic PHP Docker server with a MySQL database. Install and build the base Docker setup first, then add this database package and rebuild Docker.

https://github.com/drago-ex/project-docker
