# Drago Project with a database

The package extends the Drago Project to include mysqli database on docker.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/drago-ex/project-db/blob/main/license)
[![PHP version](https://badge.fury.io/ph/drago-ex%2Fproject-db.svg)](https://badge.fury.io/ph/drago-ex%2Fproject-db)
[![Coding Style](https://github.com/drago-ex/project-db/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/project-db/actions/workflows/coding-style.yml)

## Requirements
- PHP >= 8.3
- Nette Framework
- Docker
- Dibi
- Drago Project core packages

## Installation
```bash
composer require drago-ex/project-db
```

## The package does the following
- Copies a configured Neon file with database settings preconfigured for Docker.
- Adds Docker files for database setup.
- Integrates Dibi for database interaction.

## Remember
The package extends the basic php server on docker with a mysqli database and requires an existing build before the update, and only then can the docker update be performed.

https://github.com/drago-ex/project-docker
