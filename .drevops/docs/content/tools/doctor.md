# Doctor

The DrevOps Doctor is a standalone, self-contained script designed to
inspect the current state of your DrevOps project. Its primary functions include
checking project requirements and displaying system information.

Also, it runs before and after you build the project with `ahoy build` to make
sure that all the requirements are met.

## Features

The DrevOps Doctor script performs a series of checks to ensure the project
environment is correctly set up:

- Availability of the necessary tools (Docker, Docker Compose, Pygmy, Ahoy etc.)
- Port availability on the host machine
- Pygmy availability
- Container status
- Presence of SSH key within a container
- Webserver status
- Application bootstrap status

## Checking project status

```bash
$ ahoy doctor

[INFO] Checking project requirements
[ OK ] All required tools are present.
[ OK ] Port 80 is available.
[ OK ] Pygmy is running.
[ OK ] All containers are running
[ OK ] SSH key is available within CLI container.
[ OK ] Web server is running and accessible at http://drevops.docker.amazee.io.
[ OK ] Bootstrapped website at http://drevops.docker.amazee.io.
[ OK ] All required checks have passed.
```

## Getting system information

```bash
$ ahoy doctor info

System information report

OPERATING SYSTEM
ProductName:            macOS
ProductVersion:         13.1
BuildVersion:           22C65

DOCKER
Path to binary: /usr/local/bin/docker
Docker version 23.0.5, build bc4487a
Client:
 Context:    default
 Debug Mode: false
 Plugins:
  buildx: Docker Buildx (Docker Inc.)
    Version:  v0.10.4
    Path:     /Users/johndoe/.docker/cli-plugins/docker-buildx
  compose: Docker Compose (Docker Inc.)
    Version:  v2.17.3
    Path:     /Users/johndoe/.docker/cli-plugins/docker-compose
  dev: Docker Dev Environments (Docker Inc.)
    Version:  v0.1.0
    Path:     /Users/johndoe/.docker/cli-plugins/docker-dev
  extension: Manages Docker extensions (Docker Inc.)
    Version:  v0.2.19
    Path:     /Users/johndoe/.docker/cli-plugins/docker-extension
  init: Creates Docker-related starter files for your project (Docker Inc.)
    Version:  v0.1.0-beta.4
    Path:     /Users/johndoe/.docker/cli-plugins/docker-init
  sbom: View the packaged-based Software Bill Of Materials (SBOM) for an image (Anchore Inc.)
    Version:  0.6.0
    Path:     /Users/johndoe/.docker/cli-plugins/docker-sbom
  scan: Docker Scan (Docker Inc.)
    Version:  v0.26.0
    Path:     /Users/johndoe/.docker/cli-plugins/docker-scan
  scout: Command line tool for Docker Scout (Docker Inc.)
    Version:  v0.10.0
    Path:     /Users/johndoe/.docker/cli-plugins/docker-scout

Server:
 Containers: 69
  Running: 51
  Paused: 0
  Stopped: 18
 Images: 460
 Server Version: 23.0.5
 Storage Driver: overlay2
  Backing Filesystem: extfs
  Supports d_type: true
  Using metacopy: false
  Native Overlay Diff: true
  userxattr: false
 Logging Driver: json-file
 Cgroup Driver: cgroupfs
 Cgroup Version: 2
 Plugins:
  Volume: local
  Network: bridge host ipvlan macvlan null overlay
  Log: awslogs fluentd gcplogs gelf journald json-file local logentries splunk syslog
 Swarm: inactive
 Runtimes: io.containerd.runc.v2 runc
 Default Runtime: runc
 Init Binary: docker-init
 containerd version: 2806fc1057397dbaeefbea0e4e17bddfbd388f38
 runc version: v1.1.5-0-gf19387a
 init version: de40ad0
 Security Options:
  seccomp
   Profile: builtin
  cgroupns
 Kernel Version: 5.15.49-linuxkit
 Operating System: Docker Desktop
 OSType: linux
 Architecture: aarch64
 CPUs: 5
 Total Memory: 31.31GiB
 Name: docker-desktop
 ID: 05da5eb2-2904-49ae-965d-bb10b896e7ac
 Docker Root Dir: /var/lib/docker
 Debug Mode: false
 HTTP Proxy: http.docker.internal:3128
 HTTPS Proxy: http.docker.internal:3128
 No Proxy: hubproxy.docker.internal
 Registry: https://index.docker.io/v1/
 Experimental: false
 Insecure Registries:
  hubproxy.docker.internal:5555
  127.0.0.0/8
 Live Restore Enabled: false


DOCKER COMPOSE V2
Docker Compose version v2.17.3

DOCKER-COMPOSE V1
Path to binary: /usr/local/bin/docker-compose
WARNING: Compose V1 is no longer supported and will be removed from Docker Desktop in an upcoming release. See https://docs.docker.com/go/compose-v1-eol/
docker-compose version 1.29.2, build 5becea4c
docker-py version: 5.0.0
CPython version: 3.9.0
OpenSSL version: OpenSSL 1.1.1h  22 Sep 2020

PYGMY
Path to binary: /Users/johndoe/gems/bin/pygmy
Pygmy version unidentifiable.

AHOY
Path to binary: /usr/local/bin/ahoy
2.0.2
```
