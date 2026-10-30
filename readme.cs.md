# Drago Project with a database

Balíček rozšiřuje Drago Project o databázi MySQL v Dockeru.

[![PHP version](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db.svg)](https://badge.fury.io/ph/drago-ex%2Fproject-docker-db)
[![Coding Style](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/project-docker-db/actions/workflows/coding-style.yml)

## Požadavky

- PHP >= 8.3, < 9
- [Drago Project](https://github.com/drago-ex/project)
- Docker

## Instalace

```bash
composer require drago-ex/project-docker-db
```

## Soubory kopírované do projektu

Soubory do projektu kopíruje [drago-ex/project-tools](https://github.com/drago-ex/project-tools)
podle nastavení v `extra.drago-tools` v `composer.json` tohoto balíčku.

## Co balíček dělá

- Zkopíruje soubor Neon s nastavením databáze připraveným pro Docker.
- Přidá soubory Dockeru pro databázi.
- Zapojí Dibi pro práci s databází.

Data databáze jsou v Docker volume `db-data`, které je na Windows mnohem rychlejší než adresář projektu.
`docker compose down` je zachová, `docker compose down --volumes` data smaže.

Připojení k databázi je v `local/db.neon`. Adresář `local/` je připojený do kontejneru, takže co do něj
aplikace zapíše (např. instalátor), přežije nový obraz; do gitu nepatří.

## Jen pro vývoj

Uživatel databáze a hesla (`super`/`pass`, root `root`) v `docker-compose.override.yaml` a
`local/db.neon` jsou pro lokální vývoj. Než nastavení poběží jinde, změňte je (skript `docker:production`
používá stejné soubory).

Databáze poslouchá jen na `127.0.0.1:6033`, takže se k ní připojí nástroje na vašem počítači. Pro zveřejnění
na všech rozhraních nastavte `DB_PORT=6033`; Docker obchází firewally jako `ufw`, proto to na serveru nikdy nedělejte.

## Nezapomeňte

Balíček rozšiřuje základní PHP server v Dockeru o databázi MySQL. Nejdřív nainstalujte a sestavte základní Docker, potom přidejte tento databázový balíček a Docker sestavte znovu.

https://github.com/drago-ex/project-docker
