## ECS Fargate

Containers without Servers

Note:
Fargate launched in January

Runs Docker containers without owning EC2 instances

Amazon abstracts the creation of servers away from the developer

When using the CLI, services are created from the docker-compose file



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

Note:

Once you have the cluster and the service, you can start to customize the deployment.



My Approach to Docker Environments and Continuous Deployment

Note:
My Approach to Docker in Production

SRP between service images and application images.
	- The application image only contained the application code.
	- The service images contained only the service and it's configuration.
	- This led to small, lightweight Application Images that were easily interchangeable between environments.
	- Testing a release meant you only had to fetch the new application image.
	- Service containers shared the application code via Named Volumes.
	- Deployments required updating one image tag for the application code rather than three or four image tags for the services.
	- Packaging application code with the service is common practice, but I named volumes are a better solution.
Environment Variables
	- Application Environment Variables
		- Allowed us to run the application in multiple environments.
			- Prod and Staging databases were different.
		- Easily changed in Bamboo/ECS.  A non-dev could have been trained to do it.
	- PHP Environment Variables
		- PHP can load env vars, too.
		- Highly useful for things like enabling/disabling PHP Opcache between environments.

CI/CD Basics
	- Builds
		- Our Build server handled building and running our PHPUnit/Behat tests.
		- When a build for a PR failed, the build server would prohibit that PR from merging to the master branch.
		- When a build for a PR succeeded, and it was merged into the master branch, a build for the master branch would commence.
	- Deployments
		- When a build for the master branch was successful, the Docker Image hosting our application code was pushed to our Docker registry with a tag.
		- The build server would then deploy the new Docker Image to Amazon ECS by updating the "Docker Compose" file with the new image tag.
		- ECS would drain the connections from half of the old containers to spin up the same amount of containers for the new instances.
		- Once the new instances were up, the load balancer would redirect traffic to the new instance.
		- The deployment was completed once all the old container instances were destroyed and all the new container instances were stable.
		- If at any time during the deployment the new instances were considered unstable, ECS would route traffic back to the old instances.
	- Services I've Used
		- Bamboo
		- Travis
		- ECS
		- Rancher



ECS / Fargate Demo
