start:
	@docker-compose up -d
	@symfony serve -d

set-db-url:
	@$(eval DB_HOST = $(docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' countries_prueba_database_1))
	@export DB_HOST = $(DB_HOST)