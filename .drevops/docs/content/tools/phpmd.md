# PHPMD - PHP Mess Detector

https://github.com/phpmd/phpmd

> What PHPMD does is: It takes a given PHP source code base and look for several
> potential problems within that source. These problems can be things like:
>
> - Possible bugs
> - Suboptimal code
> - Overcomplicated expressions
> - Unused parameters, methods, properties

DrevOps comes with [pre-configured PHPMD ruleset](../../../../phpmd.xml)
for Drupal projects.

## Usage

```shell
vendor/bin/phpmd . text phpmd.xml
```
or
```shell
ahoy lint-be
```

## Configuration

See [configuration reference](https://phpmd.org/documentation/index.html).

All global configuration takes place in the [`phpmd.xml`](../../../../phpmd.xml)
file.

Targets include custom modules and themes, settings and tests.

Adding targets is not supported via configuration file. Instead, use the
exclusion patterns to exclude files and directories.

```xml
<exclude-pattern>*\/dir\/another\/*\.php</exclude-pattern>
```

## Ignoring

Ignoring rules **globally** takes place in
the [`phpstan.neon`](../../../../phpstan.neon) file:

```yaml
parameters:
  ignoreErrors:
    - # Comment about why this rules is excluded.
      # 'message' is a regular expression with `#` as begin and end delimiters.
      message: '#.*no value type specified in iterable type array.#'
      paths:
        - path/to/exclude/all_dir_files/*
        - path/to/exclude/a_file.php
```

PHPMD does not support ignoring of **all PHPMD rules** within a file.

PHPMD does not support ignoring of **a specific rule** within a file.

PHPMD does not support ignoring of the **code blocks**.

PHPMD does not support ignoring the current and the **next line**.

PHPMD supports ignoring rules for **methods or classes**.

```php
/**
 * This will suppress all the PMD warnings in
 * this class.
 *
 * @SuppressWarnings(PHPMD)
 */
class Bar {
    function  foo() {
        $baz = 23;
    }
}

class Bar {
  /**
   * This will suppress UnusedLocalVariable
   * warnings in this method
   *
   * @SuppressWarnings(PHPMD.UnusedLocalVariable)
   */
  public function foo() {
      $baz = 42;
  }
}
```

## Ignoring fail in CI

This tool runs in CI by default and fails the build if there are any violations.

Set `DREVOPS_CI_PHPMD_IGNORE_FAILURE` environment variable to `1` to ignore
failures. The tool will still run and report violations, if any.
