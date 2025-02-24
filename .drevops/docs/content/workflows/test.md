# ✅ Test

DrevOps supports running Unit (PHPUnit) and BDD (Behat) tests.

For local development, the tests can be run using handy Ahoy commands:

```bash
ahoy test # Run all tests

ahoy test-unit # Run Unit tests

ahoy test-kernel # Run Kernel tests

ahoy test-functional # Run Functional tests

ahoy test-bdd # Run BDD tests
```

In CI, tests are run by calling the test binaries directly.

## Unit testing

DrevOps uses PHPUnit as a framework for Unit testing.

It is configured to use a copy of Drupal core's `core/phpunit.xml.dist`
configuration file. This is done to allow per-project customisations.

### Reporting

Test reports are stored in `$DREVOPS_TEST_RESULTS_DIR/phpunit` directory
separated into multiple files and named after the suite name.
These reports are usually used in CI to track tests performance and stability.

### Scaffold

DrevOps provides a Unit test scaffold for custom [modules](../../../../web/modules/custom/ys_core/tests/src),
[themes](../../../../web/themes/custom/your_site_theme/tests/src) and
[scripts](../../../../tests/phpunit).

These tests already run in CI when you install DrevOps and can be used as a
starting point for writing your own.

#### Drupal settings tests

DrevOps provides a [Drupal settings tests](../../../../tests/phpunit/DrupalSettingsTest.php)
to test that Drupal settings are correct based on the environment type the site
is running: with the number of custom modules multiplied by the number of
environment types, it is easy to miss certain settings which may lead to
unexpected issues with deployments.

It is intended to be used in a consumer site and kept up-to-date with the
changes to the `settings.php` file.

#### CI configuration tests

DrevOps provides a [CI configuration tests](../../../../tests/phpunit/CircleCiConfigTest.php)
to assert that CI configuration is correct. It is intended to be used in a consumer
site and kept up-to-date with the CI configurations.

For example, there are tests for the regular expressions that control for which
branches the deployment job runs. Such test makes sure that there are no
unexpected surprises during the consumer site release to production.

## BDD testing

DrevOps uses Behat for Behavior-Driven Development (BDD) testing.

It provides full Behat support, including configuration in [behat.yml](../../../../behat.yml)
and a [browser container](../../../../docker-compose.yml) to run interactive tests.

It also provides additional features:

1. [Behat Drupal Extension](https://github.com/drupalprojects/drupalextension) - an extension to work with Drupal.
2. [Behat steps](https://github.com/drevops/behat-steps) - a library of re-usable Behat steps.
2. [Behat Screenshot](https://github.com/drevops/behat-screenshot) - extension to capture screenshots on-demand and on failure.
3. [Behat Progress formatter](https://github.com/drevops/behat-format-progress-fail) - extension to show progress as TAP and fails inline.
4. Parallel profiles - configuration to allow running tests in parallel.

### FeatureContext

The [FeatureContext.php](../../../../tests/behat/bootstrap/FeatureContext.php) file comes with
included steps from [Behat steps](https://github.com/drevops/behat-steps) package.

Custom steps can be added into this file.

### Profiles

Behat `default` profile configured with sensible defaults to allow running Behat
with provided extensions.

The profile can be overridden using `$DREVOPS_CI_BEHAT_PROFILE` environment
variable.

### Parallel runs

In CI, Behat tests can be tagged to be split between multiple runners. The tags
are then used by profiles with the identical names to run them.

Out of the box, DrevOps provides support for unlimited parallel runners, but
only 2 parallel profiles `p0` and `p1`: a feature can be tagged by either `@p0`
or `@p1`to run in a dedicated runner, or with both tags to run in both runners.

Note that you can easily add more `p*` profiles in your `behat.yml` by copying
existing `p1`profile and changing several lines.

Features without `@p*` tags will always run in the first CI runner, so even
if you forget to tag the feature, it will still be allocated to a runner.

If CI has only one runner - a `default` profile will be used and all tests
(except for those that tagged with `@skipped`) will be run.

### Skipping tests

Add `@skipped` tag to a feature or scenario to exclude it from the test run.

### Screenshots

Test screenshots are stored into `.logs/screenshots` location by default,
which can be overwritten using `$BEHAT_SCREENSHOT_DIR` variable (courtesy of
[Behat Screenshot](https://github.com/drevops/behat-screenshot) package). In CI, screenshots are stored as artifacts
and are accessible in the Artifacts tab.

### Format

Out of the box, DrevOps comes with [Behat Progress formatter](https://github.com/drevops/behat-format-progress-fail)
Behat output formatter to show progress as TAP and fails inline. This allows to
continue test runs after failures while maintaining a minimal output.

### Reporting

Test reports produced if `$DREVOPS_TEST_RESULTS_DIR` is set. They are stored in
`$DREVOPS_TEST_RESULTS_DIR/behat` directory. These reports are usually used in
CI to track tests performance and stability.

### Scaffold

DrevOps provides a BDD test scaffold for custom [modules](../../../../web/modules/custom/ys_core/tests/src)
and [themes](../../../../web/themes/custom/your_site_theme/tests/src).

These tests already run in CI when you install DrevOps and can be used as a
starting point for writing your own.
