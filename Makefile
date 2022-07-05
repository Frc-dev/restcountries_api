start:
	@docker-compose up -d
	@symfony serve -d

get-db-url:
	@docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' countries_prueba_database_1

migrate:
	@php bin/console make:migration