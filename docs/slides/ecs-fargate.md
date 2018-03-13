## ECS Fargate

Containers without Servers



### Cluster
EC2 or Fargate instances provisioned to handle running Docker Containers.



### Service
Defines how many Tasks to run on a Cluster.



### Task Definition
The ECS version of a Docker Compose configuration.



### Task
An instance of a Task Definition.



### Create a Cluster

```
$ ecs-cli configure --region us-east-1 --default-launch-type FARGATE
$ ecs-cli up
```



### Create a Service
```
ecs-cli compose --project-name my-application service up
```



ECS / Fargate Demo
