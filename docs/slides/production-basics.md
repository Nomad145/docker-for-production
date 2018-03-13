Docker for Development is great, but how does that help me in Production?

Note:
Docker for Dev gets hype for how easy it is to get started

Spin up projects quickly



Docker works the same in Production as it does in Development

Note:
Application Stack was defined via Docker Compose.

Prod Environments version controlled.

We based our dev environment off of our prod environment.  No more discrepancies between dev and prod.

Prod was much easier to manage given the size of our team.
	- Changes to the PHP configuration could peer reviewed and tested locally to work.
	- Load Balancing and auto scaling were now available options.

Why does it seem like there's such a high learning curve for running Docker in Production?

Answer: Orchestration



Orchestration describes automated arrangement, coordination, and management of complex computer systems, and services.

Note:
Put simply, Orchestration is the process of managing your Docker environment in production

Can define how many containers for scalability

Can help with load balancing and zero downtime deployments



Orchestration Services
* Amazon ECS
* Kubernetes
* Rancher
* Docker Swarm

Note:
My favorite is ECS
	- Has a high learning curve, but once its understood it feels really well thought out

I've used Rancher

Docker Swarm is built in

Kubernetes is from Google.  I want to try it out

What does Orchestration look like?



Homeland on ECS

![homeland-on-ecs](https://www.lucidchart.com/publicSegments/view/96d2e62f-1add-452e-95f0-bb91746bcce9/image.png)

Note:
This was Heartland in Production

Does it need to be this complicated?  No!



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

Note:
Store a single compose file on a server and run `docker-compose up`

This is one way to do it, but can we sprinkle in a _little_ orchestration without going overboard?
