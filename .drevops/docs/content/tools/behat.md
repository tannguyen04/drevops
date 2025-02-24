# Behat

https://github.com/Behat/Behat

https://docs.behat.org/en/latest/user_guide.html

> A php framework for autotesting your business expectations.

DrevOps comes with [pre-configured Behat profiles](../../../../behat.yml) for Drupal projects.

## Usage

Since Behat requires a running Drupal instance, it can only be run within
Docker environment.

```shell
docker compose exec -T cli php -d memory_limit=-1 vendor/bin/behat
```
or
```shell
ahoy test-bdd
```

**Running all tests in the file**

```shell
docker compose exec -T cli vendor/bin/behat tests/behat/features/my.feature
```
or
```shell
ahoy test-bdd tests/beaht/features/my.feature
```

**Running tagged tests with `@group_name` tag**

```shell
docker compose exec -T cli vendor/bin/behat --tags=group_name
```
or
```shell
ahoy test-bdd --tags=group_name
```

## Configuration

See [configuration reference](https://docs.behat.org/en/latest/user_guide/configuration.html).

All global configuration takes place in the [`behat.yml`](../../../../behat.yml) file.

By default, Behat will run all tests defined in `tests/behat/features` directory.

Adding or removing test targets:

```yml
default:
  suites:
    default:
      paths:
        - '%paths.base%/web/modules/custom/mymodule/tests/behat/features'
```

### Contexts and extensions

The configuration uses the following contexts and extensions:

- [Drupal Extension](https://github.com/jhedstrom/drupalextension): The Drupal Extension is an integration layer between Behat, Mink Extension, and Drupal. It provides step definitions for common testing scenarios specific to Drupal sites.
- [Behat Screenshot Extension](https://github.com/drevops/behat-screenshot): Behat extension and step definitions to create HTML and image screenshots on demand or when tests fail.
- [Behat Progress Fail Output Extension](https://github.com/drevops/behat-format-progress-fail): Behat output formatter to show progress as TAP and fails inline.
- [Behat Steps](https://github.com/drevops/behat-steps): Collection of Behat steps for Drupal

## Reports and screenshots

Behat is configured to generate test run reports in JUnit format stored in
`.logs/test_results/behat`.

Screenshots for failed tests or purposely made screenshots are stored in
`.logs/screenshots` directory.

Both test results and screenshots are stored as artifacts in CI.

### Profiles

Behat runs with `default` profile defined in the configuration file: this runs
all tests not tagged with `@skipped` tag.

There are also `p1` and `p2` profiles defined that run tests not tagged with
`@skipped` and tagged with `@p1` and `@p2` tags respectively. These profiles are
used in CI to run tests in parallel if parallel runners number is greater than 1.
Behat will run tests using `@pX` tags on tests, where `X` is the runner index
starting from `0`.

In the example below, if there is one runner, Behat will run all scenarios, but
if there are 2 runners - Behat will run only scenarios with `@p0` tag on the
first runner and scenarios with `@p1` tag on the second runner.

```gherkin
@homepage @smoke
Feature: Homepage

  Ensure that homepage is displayed as expected.

  @api @p0
  Scenario: Anonymous user visits homepage
    Given I go to the homepage
    And I should be in the "<front>" path
    Then I save screenshot

  @api @javascript @p1
  Scenario: Anonymous user visits homepage
    Given I go to the homepage
    And I should be in the "<front>" path
    Then I save screenshot
```

## Ignoring fail in CI

This tool runs in CI by default and fails the build if there are any violations.

Set `DREVOPS_CI_BEHAT_IGNORE_FAILURE` environment variable to `1` to ignore
failures. The tool will still run and report violations, if any.

## Writing tests

When writing tests, it is recommended to use the following structure:

```gherkin
@tag_describing_feature_group
Feature: Short feature description

  As a site owner
  I want to make sure that my feature does what it is supposed to do
  So that I can be sure that my site is working as expected

  @api
  Scenario: Anonymous user uses a feature
    Given I go to the homepage
    And I should be in the "<front>" path
    Then I save screenshot

  @api @javascript
  Scenario: Anonymous user uses a feature with AJAX
    Given I go to the homepage
    And I click ".button" element
    Then I save screenshot
```

Use `@api` tag for tests that do not require JavaScript and `@api @javascript`
for tests that require JavaScript.

!!! tip

    JavaScript tests are slow. Try using as few JavaScript tests as possible to
    keep the test run time low.

### `FeatureContext.php` and example tests

The [`FeatureContext.php`](../../../../tests/behat/bootstrap/FeatureContext.php)
file is a Behat custom context file that is loaded by default. This is where
custom step definitions and hooks should be placed.

It is recommended to use traits to organize step definitions and hooks and
include those traits in the `FeatureContext.php` file. There are already
several traits included from the [Behat Steps](https://github.com/drevops/behat-steps)
package (only basic ones are included; there are more available in the package).

There are also example tests in the [`tests/behat/features`](../../../../tests/behat/features)
directory that can be used as a starting point for writing tests. These tests
define `@smoke` tests for the homepage and login page as well as tests for
contributed modules.
