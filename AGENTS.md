# Agent Guide

`drago-ex/project-docker-db` (type drago-tools-resource, PHP >=8.3 <9): adds MariaDB and mysqli to the Docker
setup of drago-ex/project-docker and the Dibi connection of the project. The workspace rules are in
`../AGENTS.md`; dependencies are in `composer.json`.

## Layout
- `docker-compose.override.yaml`: the services `php-db` and `db`, the server build override, the watch rule of `local/`.
- `docker/Dockerfile-db`: `FROM php` + mysqli.
- `resources/local/db.neon` → `local/db.neon` of the project (configuration of the environment, out of git).

## How it works
- `php-db` is a profiled service (never started); the override points the server build at it
  (`additional_contexts: php: service:php-db`), so `docker compose build` builds the whole chain.
- `local/` is copied into the image with the project; the override adds a `develop.watch` sync of `./local`
  (Compose appends it to the watch rules of project-docker). Nothing in the container writes `db.neon`; it is
  edited on the host only, so there is no bind mount.
- The data are in the named volume `db-data`; the npm script `docker:down` does not use `--volumes`.
- The database port is published only on `127.0.0.1` (`${DB_PORT:-127.0.0.1:6033}`, the same pattern as the
  server of project-docker), because Docker bypasses ufw. `db` runs with `no-new-privileges`. The fixed passwords
  are for development only.

## Commands
No tests or PHPStan; CI runs only the Nette Code Checker.
