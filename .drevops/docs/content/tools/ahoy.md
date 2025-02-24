# Ahoy

https://github.com/ahoy-cli/ahoy

> Automate and organize your workflows, no matter what technology you use.
>
> Ahoy is command line tool that gives each of your projects their own CLI app
with zero code and dependencies.

Usually, Ahoy is used to wrap the commands to make the development workflow
consistent and easy to use.

DrevOps comes with [pre-configured Ahoy file](../../../../.ahoy.yml) that has
commands wrapped around the most common tasks:

- Working with Docker
- Building the project locally
- Running tests
- Running code quality checks

It also provides an example of [local Ahoy file](../../../../.ahoy.local.example.yml)
to be used in your projects. Once copied to `.ahoy.local.yml`, the file will
be excluded from the repository and can be used to add local project-specific
commands.

## Usage

```shell
# Run a command in the global Ahoy file.
ahoy COMMAND [ARGUMENTS] [OPTIONS]

# Run a command in the local Ahoy file.
ahoy local COMMAND [ARGUMENTS] [OPTIONS]

# Show all available commands.
ahoy --help
```

## Configuration

See [configuration reference](https://github.com/ahoy-cli/ahoy#example-of-new-yaml-setup-in-v2).

Adding a new command with passed arguments:

```yml
commands:
  custom:
    cmd: .vendor/bin/phpunit --group="smoke" "$@"
```

Adding a new multi-line command with usage details and calling another Ahoy
commands after confirmation:

```yml

commands:
  custom:
    usage: Custom action
    cmd: |
      ahoy confirm "Are you sure?" &&
      .vendor/bin/phpunit --group="smoke" "$@" &&
      ahoy info
```

### Environment variables

The configuration is set up to load environment variables from `.env` and
`.env.local` files, giving the precedence to the values in the existing
environment. See more details in the [Variables](../workflows/variables.md)
section.
