Docker for Development is great, but how does that help me get to Production?



Docker works the same in Production as it does in Development



Orchestration describes automated arrangement, coordination, and management of complex computer systems, and services.



Orchestration Services
* Amazon ECS
* Kubernetes
* Rancher
* Docker Swarm



Homeland on ECS

![homeland-on-ecs](https://www.lucidchart.com/publicSegments/view/96d2e62f-1add-452e-95f0-bb91746bcce9/image.png)



Or, run Docker on a single host!
```
# /app/docker-compose.yml

version: '2'

services:
  web:
    image: my-application/nginx:latest
    volumes_from:
      - app
    ports:
      - 80:80

  fpm:
    image: php:7.2-fpm
    volumes_from:
      - app
    environment:
      - FOO
      - BAR

  app:
    image: my-application:latest

  db:
    image: mariadb:latest
    volume:
      - database:/var/lib/mysql

volumes:
  database:
```
