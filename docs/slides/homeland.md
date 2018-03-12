## My Experience with Docker

A story of Homeland, Docker, and Continuous Agile




Development Challenges

* Shared Database
  * Shared PHP Sessions
  * Legacy app handled authentication
* Two versions of PHP (5.6, 7.1)




First Attempt: Vagrant + Virtualbox

* Required two VMs for both version of PHP
* Had to bind to multiple ports for HTTP (80, 81)
* Required NAT across the VMs for DB access
* Resource intensive



Second Attempt: Docker

![homeland](https://www.lucidchart.com/publicSegments/view/bf34af3c-a853-4d4f-aca4-aeecbfeff6be/image.png)



* Multiple Application Stacks
* Shares a Database
* Single HTTP Server bound to the Host




Version Controlled!
