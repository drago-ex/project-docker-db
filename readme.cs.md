# Drago Project with a database

Balíček rozšiřuje Drago Project o databázi MySQL v Dockeru.

[![PHP version](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db.svg)](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db)
[![Coding Style](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml)

## Požadavky

- PHP >= 8.3, < 9
- Nette Framework
- Docker
- Dibi
- Základní balíčky Drago Project

## Instalace

```bash
composer require drago-ex/project-docker-db
```

## Soubory projektu

Kopírování souborů obstarává automaticky [drago-ex/project-tools](https://github.com/drago-ex/project-tools),
který musí být v projektu nainstalovaný. Bez něj zkopírujte soubory ručně podle sekce `copy`
v `composer.json` tohoto balíčku. Pro přeskočení balíčku nastavte `"skip": true` v
`extra.drago-tools.packages.<package-name>` v kořenovém `composer.json`.

## Co balíček dělá

- Zkopíruje soubor Neon s nastavením databáze připraveným pro Docker.
- Přidá soubory Dockeru pro databázi.
- Zapojí Dibi pro práci s databází.

## Jen pro vývoj

Uživatel databáze, hesla (`super`/`pass`, root `root`) a zveřejněný port 6033 v
`docker-compose.override.yaml` a `app/db.neon` jsou pro lokální vývoj. Než nastavení poběží jinde, změňte je
a port nezveřejňujte (skript `docker:production` používá stejné soubory).

## Nezapomeňte

Balíček rozšiřuje základní PHP server v Dockeru o databázi MySQL. Nejdřív nainstalujte a sestavte základní Docker, potom přidejte tento databázový balíček a Docker sestavte znovu.

https://github.com/drago-ex/project-docker
