## My Experience with Docker

Homeland

Note:
Legacy Application (8 Years in Production)

Platform for wholesaling real estate

Was on 5.4 and ZF1 when we got there

Tasked with rebuilding from the ground up as a Symfony 2.8 app (Heartland)

I was responsible for building all our build and deployment pipelines as well as managing the server environments.

If I could version control and automate something, I did.



Development Challenges

* Shared Database
  * Shared sessions between applications
  * Legacy app handled authentication
* Two versions of PHP (5.6, 7.1)

Note:
Started with the need to run a legacy application alongside a new application for development (Symfony 2.8).
	- Auth was handled in the legacy application.
	- Sessions were shared in the database.
	- We needed a dev environment that could handle this use case.

Had difficulty sharing a database with Virtualbox and our two PHP instances (5.6, 7.0).
	- Running two application stacks on the same VM was tricky.
	- Running two VMs was resource heavy and complicated http ports (80 - 81).

Docker was the new buzzword, so I thought I'd give it a try.

Docker for Mac was in Beta at the time.



Dev Environment

![homeland](https://www.lucidchart.com/publicSegments/view/bf34af3c-a853-4d4f-aca4-aeecbfeff6be/image.png)

Note:
After some research, it seemed Docker was perfect for our use case.
	- Multiple HTTP servers proxied by jwilder/nginx-proxy.
	- FPM instances sharing the same database container.
	- Version controlled environment configuration created a low barrier of entry and faster on-boarding process.

After a while, we decided to deploy Heartland to Amazon ECS running on Docker

I learned a lot about how docker worked under the hood and how ECS managed containers
