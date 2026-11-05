# Drago Project Docker Database

A MariaDB database in Docker for Drago Project, the mysqli extension in the PHP image and the database connection
of the application (Dibi).

[![PHP version](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db.svg)](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db)
[![Coding Style](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml)

## Requirements

- PHP >= 8.3, < 9
- [Drago Project](https://github.com/drago-ex/project) with [Project Docker](https://github.com/drago-ex/project-docker)
- Docker

## Installation

```bash
composer require drago-ex/project-docker-db
```

[Project Tools](https://github.com/drago-ex/project-tools) copies `docker-compose.override.yaml`, the Dockerfile
of the database image and `local/db.neon` into the project. Build the images again afterwards
(`npm run docker:build`).

## Usage

- The database `app` runs as the service `db`; the connection of the application is in `local/db.neon`
  (keep it out of git). `docker compose watch` (`npm run docker:dev`) copies its changes into the container.
- The data are in the Docker volume `db-data`. `docker compose down` keeps them, `docker compose down --volumes`
  deletes them.
- The database listens on `127.0.0.1:6033`, so tools on your computer can connect to it. `DB_PORT=6033`
  publishes it on every interface; Docker bypasses firewalls such as `ufw`, so never do so on a server.

## Development Only

The user and passwords (`super`/`pass`, root `root`) in `docker-compose.override.yaml` and `local/db.neon` are
for local development. Change them before the setup runs anywhere else; the `docker:production` script uses the
same files.
