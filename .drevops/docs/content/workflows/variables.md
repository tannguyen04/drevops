# Variables

Environment variables allow to configure workflows.

## Override order (bottom values win):

- default value in container taken from image
- default value in `docker-compose.yml`
- value in `.env` (last value wins)
- value in `.env.local` (last value wins)
- value from environment

## Variables list

### `AHOY_CONFIRM_RESPONSE`

Set to `y` to suppress Ahoy prompts.

Default value: `UNDEFINED`

Defined in: `.env.local.default`

### `AHOY_CONFIRM_WAIT_SKIP`

When Ahoy prompts are suppressed ([`$AHOY_CONFIRM_RESPONSE`](#AHOY_CONFIRM_RESPONSE) is `1`), the command<br />will wait for `3` seconds before proceeding.<br />Set this variable to "`1`" to skip the wait.

Default value: `1`

Defined in: `.env.local.default`

### `COMPOSE_PROJECT_NAME`

Docker Compose project name.

Sets the project name for a Docker Compose project. Influences container and<br />network names.

Defaults to the name of the project directory.

Default value: `UNDEFINED`

Defined in: `ENVIRONMENT`

### `DOCKER_PASS`

The password (token) to log into the Docker registry.

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/deploy-docker.sh`, `scripts/drevops/download-db-docker-registry.sh`, `scripts/drevops/login-docker.sh`

### `DOCKER_REGISTRY`

Docker registry name.

Provide port, if required as `<server_name>:<port>`.

Default value: `docker.io`

Defined in: `.env`, `scripts/drevops/deploy-docker.sh`, `scripts/drevops/download-db-docker-registry.sh`, `scripts/drevops/login-docker.sh`

### `DOCKER_USER`

The username to log into the Docker registry.

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/deploy-docker.sh`, `scripts/drevops/download-db-docker-registry.sh`, `scripts/drevops/login-docker.sh`

### `DREVOPS_ACQUIA_APP_NAME`

Acquia application name to download the database from.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/download-db-acquia.sh`, `scripts/drevops/task-copy-db-acquia.sh`, `scripts/drevops/task-copy-files-acquia.sh`, `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_ACQUIA_KEY`

Acquia Cloud API key.

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/download-db-acquia.sh`, `scripts/drevops/task-copy-db-acquia.sh`, `scripts/drevops/task-copy-files-acquia.sh`, `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_ACQUIA_SECRET`

Acquia Cloud API secret.

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/download-db-acquia.sh`, `scripts/drevops/task-copy-db-acquia.sh`, `scripts/drevops/task-copy-files-acquia.sh`, `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_CI_ARTIFACTS`

Directory to store test artifacts in CI.

Default value: `/tmp/artifacts`

Defined in: `CI config`

### `DREVOPS_CI_BEHAT_IGNORE_FAILURE`

Ignore Behat test failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_BEHAT_PROFILE`

Test Behat profile to use in CI. If not set, the `default` profile will be used.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_NPM_LINT_IGNORE_FAILURE`

Ignore NPM linters failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_PHPCS_IGNORE_FAILURE`

Ignore PHPCS failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_PHPMD_IGNORE_FAILURE`

Ignore PHPMD failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_PHPSTAN_IGNORE_FAILURE`

Ignore PHPStan failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_PHPUNIT_IGNORE_FAILURE`

Ignore PHPUnit test failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_RECTOR_IGNORE_FAILURE`

Ignore Rector failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_CI_TEST_RESULTS`

Directory to store test results in CI.

Default value: `/tmp/tests`

Defined in: `CI config`

### `DREVOPS_CI_TWIGCS_IGNORE_FAILURE`

Ignore Twigcs failures.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_COMPOSER_VERBOSE`

Print output from Composer install.

Default value: `1`

Defined in: `.env`

### `DREVOPS_DB_DIR`

Database dump directory.

Default value: `./.data`

Defined in: `.env`, `scripts/drevops/download-db-acquia.sh`, `scripts/drevops/download-db-curl.sh`, `scripts/drevops/download-db-docker-registry.sh`, `scripts/drevops/download-db-ftp.sh`, `scripts/drevops/download-db-lagoon.sh`, `scripts/drevops/download-db.sh`, `scripts/drevops/provision.sh`

### `DREVOPS_DB_DOCKER_IMAGE`

Name of the database docker image to use.

See https://github.com/drevops/mariadb-drupal-data to seed your DB image.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/download-db-docker-registry.sh`, `scripts/drevops/export-db.sh`, `scripts/drevops/info.sh`, `scripts/drevops/provision.sh`

### `DREVOPS_DB_DOCKER_IMAGE_BASE`

Name of the database fall-back docker image to use.

If the image specified in [`$DREVOPS_DB_DOCKER_IMAGE`](#DREVOPS_DB_DOCKER_IMAGE) does not exist and base<br />image was provided - it will be used as a "clean slate" for the database.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/download-db-docker-registry.sh`

### `DREVOPS_DB_DOWNLOAD_ACQUIA_DB_NAME`

Acquia database name to download the database from.

Default value: `your_site`

Defined in: `.env`, `scripts/drevops/download-db-acquia.sh`

### `DREVOPS_DB_DOWNLOAD_CURL_URL`

Database dump file sourced from CURL, with optional HTTP Basic Authentication<br />credentials embedded into the value.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/download-db-curl.sh`

### `DREVOPS_DB_DOWNLOAD_ENVIRONMENT`

Environment to download the database from.

Default value: `prod`

Defined in: `.env`, `scripts/drevops/download-db-acquia.sh`, `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_FORCE`

Always override existing downloaded DB dump.

Default value: `1`

Defined in: `.env.local.default`, `.env.local.default`, `scripts/drevops/download-db.sh`

### `DREVOPS_DB_DOWNLOAD_FTP_FILE`

Database dump FTP file name.

Default value: `db.sql`

Defined in: `.env`, `scripts/drevops/download-db-ftp.sh`

### `DREVOPS_DB_DOWNLOAD_FTP_HOST`

Database dump FTP host.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/download-db-ftp.sh`

### `DREVOPS_DB_DOWNLOAD_FTP_PASS`

Database dump FTP password.

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/download-db-ftp.sh`

### `DREVOPS_DB_DOWNLOAD_FTP_PORT`

Database dump FTP port.

Default value: `21`

Defined in: `.env`, `scripts/drevops/download-db-ftp.sh`

### `DREVOPS_DB_DOWNLOAD_FTP_USER`

Database dump FTP user.

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/download-db-ftp.sh`

### `DREVOPS_DB_DOWNLOAD_LAGOON_REMOTE_DIR`

Remote DB dump directory location.

Default value: `/tmp`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_LAGOON_REMOTE_FILE`

Remote DB dump file name. Cached by the date suffix.

Default value: `db_$(date +%Y%m%d).sql`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_LAGOON_REMOTE_FILE_CLEANUP`

Wildcard file name to cleanup previously created dump files.

Cleanup runs only if the variable is set and [`$DREVOPS_DB_DOWNLOAD_LAGOON_REMOTE_FILE`](#DREVOPS_DB_DOWNLOAD_LAGOON_REMOTE_FILE)<br />does not exist.

Default value: `db_*.sql`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_LAGOON_SSH_HOST`

The SSH host of the Lagoon environment.

Default value: `ssh.lagoon.amazeeio.cloud`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_LAGOON_SSH_PORT`

The SSH port of the Lagoon environment.

Default value: `32222`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_LAGOON_SSH_USER`

The SSH user of the Lagoon environment.

Default value: `LAGOON_PROJECT-${DREVOPS_DB_DOWNLOAD_ENVIRONMENT`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_PROCEED`

Proceed with download.

Default value: `1`

Defined in: `scripts/drevops/download-db.sh`

### `DREVOPS_DB_DOWNLOAD_REFRESH`

Flag to download a fresh copy of the database.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_SOURCE`

Note that "docker_registry" works only for database-in-Docker-image<br />database storage (when [`$DREVOPS_DB_DOCKER_IMAGE`](#DREVOPS_DB_DOCKER_IMAGE) variable has a value).

Default value: `curl`

Defined in: `.env`, `scripts/drevops/download-db.sh`

### `DREVOPS_DB_DOWNLOAD_SSH_FINGERPRINT`

The SSH key fingerprint.

If provided - the key will be looked-up and loaded into ssh client.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_DOWNLOAD_SSH_KEY_FILE`

SSH key file used to access Lagoon environment to download the database.<br />Create an SSH key and add it to your account in the Lagoon Dashboard.

Default value: `HOME/.ssh/id_rsa`

Defined in: `.env.local.default`, `scripts/drevops/download-db-lagoon.sh`

### `DREVOPS_DB_EXPORT_DOCKER_ARCHIVE_FILE`

Docker image archive file name.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/export-db-docker.sh`

### `DREVOPS_DB_EXPORT_DOCKER_DIR`

Directory with database image archive file.

Default value: `DREVOPS_DB_DIR`

Defined in: `scripts/drevops/export-db-docker.sh`

### `DREVOPS_DB_EXPORT_DOCKER_IMAGE`

Docker image to store in a form of `<org>/<repository>`.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/export-db-docker.sh`, `scripts/drevops/export-db.sh`

### `DREVOPS_DB_EXPORT_DOCKER_REGISTRY`

Docker registry name.

Default value: `docker.io`

Defined in: `scripts/drevops/export-db-docker.sh`

### `DREVOPS_DB_EXPORT_DOCKER_SERVICE_NAME`

The service name to capture.

Default value: `mariadb`

Defined in: `scripts/drevops/export-db-docker.sh`

### `DREVOPS_DB_EXPORT_FILE_DIR`

Directory with database dump file.

Default value: `./.data`

Defined in: `scripts/drevops/export-db-file.sh`

### `DREVOPS_DB_FILE`

Database dump file name.

Default value: `db.sql`

Defined in: `.env`, `scripts/drevops/download-db-acquia.sh`, `scripts/drevops/download-db-curl.sh`, `scripts/drevops/download-db-ftp.sh`, `scripts/drevops/download-db-lagoon.sh`, `scripts/drevops/provision.sh`

### `DREVOPS_DEBUG`

Set to `1` to print debug information in DrevOps scripts.

Default value: `UNDEFINED`

Defined in: `.env.local.default`

### `DREVOPS_DEPLOY_ACTION`

Deployment action.

Values can be one of: deploy, deploy_override_db, destroy.
- deploy: Deploy code and preserve database in the environment.
- deploy_override_db: Deploy code and override database in the environment.
- destroy: Destroy the environment (if the provider supports it).

Default value: `create`

Defined in: `scripts/drevops/deploy-lagoon.sh`, `scripts/drevops/deploy.sh`

### `DREVOPS_DEPLOY_ALLOW_SKIP`

Flag to allow skipping of a deployment using additional flags.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy.sh`

### `DREVOPS_DEPLOY_ARTIFACT_DST_BRANCH`

Remote repository branch. Can be a specific branch or a token.<br />@see https://github.com/drevops/git-artifact#token-support

Default value: `[branch]`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_ARTIFACT_GIT_REMOTE`

Remote repository to push code to.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_ARTIFACT_GIT_USER_EMAIL`

Name of the user who will be committing to a remote repository.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_ARTIFACT_GIT_USER_NAME`

Email address of the user who will be committing to a remote repository.

Default value: `Deployment Robot`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_ARTIFACT_REPORT_FILE`

Deployment report file name.

Default value: `DREVOPS_DEPLOY_ARTIFACT_ROOT/deployment_report.txt`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_ARTIFACT_ROOT`

The root directory where the deployment script should run from. Defaults to<br />the current directory.

Default value: `(pwd)`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_ARTIFACT_SRC`

Source of the code to be used for artifact building.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-artifact.sh`

### `DREVOPS_DEPLOY_BRANCH`

The Lagoon branch to deploy.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-lagoon.sh`, `scripts/drevops/deploy.sh`

### `DREVOPS_DEPLOY_DOCKER_MAP`

Comma-separated map of docker services and images to use for deployment in<br />format "service1=org/image1,service2=org/image2".

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-docker.sh`, `scripts/drevops/export-db.sh`

### `DREVOPS_DEPLOY_LAGOON_INSTANCE`

The Lagoon instance name to interact with.

Default value: `amazeeio`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_LAGOON_INSTANCE_GRAPHQL`

The Lagoon instance GraphQL endpoint to interact with.

Default value: `https://api.lagoon.amazeeio.cloud/graphql`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_LAGOON_INSTANCE_HOSTNAME`

The Lagoon instance hostname to interact with.

Default value: `ssh.lagoon.amazeeio.cloud`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_LAGOON_INSTANCE_PORT`

The Lagoon instance port to interact with.

Default value: `32222`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_LAGOON_LAGOONCLI_BIN_PATH`

Location of the Lagoon CLI binary.

Default value: `/tmp`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_LAGOON_LAGOONCLI_FORCE_INSTALL`

Flag to force the installation of Lagoon CLI.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_LAGOON_LAGOONCLI_VERSION`

Lagoon CLI version to use.

Default value: `latest`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_MODE`

Deployment mode.

Values can be one of: branch, tag.

Default value: `branch`

Defined in: `scripts/drevops/deploy.sh`

### `DREVOPS_DEPLOY_PR`

The PR number to deploy.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-lagoon.sh`, `scripts/drevops/deploy.sh`

### `DREVOPS_DEPLOY_PR_BASE_BRANCH`

The PR base branch (the branch the PR is raised against). Defaults to 'develop'.

Default value: `develop`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_PR_HEAD`

The PR head branch to deploy.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_SSH_FILE`

Default SSH file used if custom fingerprint is not provided.

Default value: `HOME/.ssh/id_rsa`

Defined in: `scripts/drevops/deploy-artifact.sh`, `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_SSH_FINGERPRINT`

SSH key fingerprint used to connect to remote.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-artifact.sh`, `scripts/drevops/deploy-lagoon.sh`

### `DREVOPS_DEPLOY_TYPES`

The type of deployment.

Combination of comma-separated values to support multiple deployment targets:<br />`artifact`,`docker`, `webhook`, `lagoon`.

See https://docs.drevops.com/workflows/deploy

Default value: `artifact`

Defined in: `.env`, `scripts/drevops/deploy.sh`

### `DREVOPS_DEPLOY_WEBHOOK_METHOD`

Webhook call method.

Default value: `GET`

Defined in: `scripts/drevops/deploy-webhook.sh`

### `DREVOPS_DEPLOY_WEBHOOK_RESPONSE_STATUS`

The status code of the expected response.

Default value: `200`

Defined in: `scripts/drevops/deploy-webhook.sh`

### `DREVOPS_DEPLOY_WEBHOOK_URL`

The URL of the webhook to call.<br />Note that any tokens should be added to the value of this variable outside<br />this script.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/deploy-webhook.sh`

### `DREVOPS_DOCKER_IMAGE_TAG`

The tag of the image to push to.

Default value: `latest`

Defined in: `scripts/drevops/deploy-docker.sh`

### `DREVOPS_DOCTOR_CHECK_BOOTSTRAP`

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_CONTAINERS`

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_MINIMAL`

Check minimal Doctor requirements.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_PORT`

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_PYGMY`

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_SSH`

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_TOOLS`

Default value: `1`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_CHECK_WEBSERVER`

Default value: `UNDEFINED`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DOCTOR_SSH_KEY_FILE`

Default SSH key file.

Default value: `HOME/.ssh/id_rsa`

Defined in: `scripts/drevops/doctor.sh`

### `DREVOPS_DRUPAL_CONFIG_PATH`

Path to configuration directory.

Default value: `./config/default`

Defined in: `scripts/drevops/provision.sh`

### `DREVOPS_DRUPAL_PRIVATE_FILES`

Path to private files.

Default value: `./${DREVOPS_WEBROOT/sites/default/files/private}`

Defined in: `scripts/drevops/provision.sh`

### `DREVOPS_EXPORT_CODE_DIR`

Directory to store exported code.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_EXPORT_DB_DOCKER_DEPLOY_PROCEED`

Proceed with Docker image deployment after it was exported.

Default value: `UNDEFINED`

Defined in: `CI config`

### `DREVOPS_GITHUB_DELETE_EXISTING_LABELS`

Delete existing labels to mirror the list below.

Default value: `1`

Defined in: `scripts/drevops/github-labels.sh`

### `DREVOPS_GITHUB_REPO`

GitHub repository as "org/name" to perform operations on.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/github-labels.sh`

### `DREVOPS_INSTALLER_URL`

The URL of the installer script.

Default value: `https://install.drevops.com`

Defined in: `scripts/drevops/update-drevops.sh`

### `DREVOPS_INSTALL_COMMIT`

Allow providing custom DrevOps commit hash to download the sources from.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/update-drevops.sh`

### `DREVOPS_LAGOON_PRODUCTION_BRANCH`

Dedicated branch to identify the production environment.

Default value: `main`

Defined in: `.env`

### `DREVOPS_LOCALDEV_URL`

Local development URL.<br />Override only if you need to use a different URL than the default.

Default value: `<current_dir>.docker.amazee.io`

Defined in: `.env.local.default`, `scripts/drevops/info.sh`

### `DREVOPS_MIRROR_CODE_BRANCH_DST`

Destination branch name to mirror code.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_BRANCH_SRC`

Source branch name to mirror code.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_GIT_USER_EMAIL`

Name of the user who will be committing to a remote repository.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_GIT_USER_NAME`

Email address of the user who will be committing to a remote repository.

Default value: `Deployment Robot`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_PUSH`

Flag to push the branch.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_REMOTE_DST`

Destination remote name.

Default value: `origin`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_SSH_FILE`

Default value: `DREVOPS_MIRROR_CODE_SSH_FINGERPRINT//:/`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_MIRROR_CODE_SSH_FINGERPRINT`

Optional SSH key fingerprint to use for mirroring.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/mirror-code.sh`

### `DREVOPS_NOTIFY_BRANCH`

Deployment reference, such as a git SHA.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_CHANNELS`

The channels of the notifications.

Can be a combination of comma-separated values: email,newrelic,github,jira

Default value: `email`

Defined in: `.env`, `scripts/drevops/notify.sh`

### `DREVOPS_NOTIFY_EMAIL_ENVIRONMENT_URL`

Environment URL to notify about.

Default value: `DREVOPS_NOTIFY_ENVIRONMENT_URL`

Defined in: `scripts/drevops/notify-email.sh`

### `DREVOPS_NOTIFY_EMAIL_FROM`

Email to send notifications from.

Default value: `webmaster@your-site-url.example`

Defined in: `.env`, `scripts/drevops/notify-email.sh`

### `DREVOPS_NOTIFY_EMAIL_PROJECT`

Project name to notify.

Default value: `DREVOPS_NOTIFY_PROJECT`

Defined in: `scripts/drevops/notify-email.sh`

### `DREVOPS_NOTIFY_EMAIL_RECIPIENTS`

Email address(es) to send notifications to.

Multiple names can be specified as a comma-separated list of email addresses<br />with optional names in the format "email|name".<br />Example: "to1@example.com|Jane Doe, to2@example.com|John Doe"

Default value: `webmaster@your-site-url.example`

Defined in: `.env`, `scripts/drevops/notify-email.sh`

### `DREVOPS_NOTIFY_EMAIL_REF`

Git reference to notify about.

Default value: `DREVOPS_NOTIFY_REF`

Defined in: `scripts/drevops/notify-email.sh`

### `DREVOPS_NOTIFY_ENVIRONMENT_TYPE`

Deployment environment type: production, uat, dev, pr.

Default value: `PR`

Defined in: `scripts/drevops/notify-github.sh`

### `DREVOPS_NOTIFY_ENVIRONMENT_URL`

Deployment environment URL.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-github.sh`, `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_EVENT`

The event to notify about. Can be 'pre_deployment' or 'post_deployment'.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-github.sh`, `scripts/drevops/notify.sh`

### `DREVOPS_NOTIFY_GITHUB_TOKEN`

Deployment GitHub token.

Default value: `GITHUB_TOKEN`

Defined in: `scripts/drevops/notify-github.sh`

### `DREVOPS_NOTIFY_JIRA_ASSIGNEE`

Assign the ticket to this account.

If left empty - no assignment will be performed.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_JIRA_COMMENT_PREFIX`

Deployment comment prefix.

Default value: `Deployed to `

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_JIRA_ENDPOINT`

JIRA API endpoint.

Default value: `https://jira.atlassian.com`

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_JIRA_TOKEN`

JIRA token.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_JIRA_TRANSITION`

State to move the ticket to.

If left empty - no transition will be performed.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_JIRA_USER`

JIRA user.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-jira.sh`

### `DREVOPS_NOTIFY_NEWRELIC_APIKEY`

NewRelic API key, usually of type 'USER'.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_APPID`

Optional NewRelic Application ID.

Will be discovered automatically from application name if not provided.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_APP_NAME`

NewRelic application name as it appears in the dashboard.

Default value: `DREVOPS_NOTIFY_NEWRELIC_PROJECT-${DREVOPS_NOTIFY_NEWRELIC_REF}`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_CHANGELOG`

Optional NewRelic notification changelog.

Defaults to the description.

Default value: `DREVOPS_NOTIFY_NEWRELIC_DESCRIPTION`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_DESCRIPTION`

Optional NewRelic notification description.

Default value: `DREVOPS_NOTIFY_NEWRELIC_REF deployed`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_ENDPOINT`

Optional NewRelic endpoint.

Default value: `https://api.newrelic.com/v2`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_PROJECT`

Project name to notify.

Default value: `DREVOPS_NOTIFY_PROJECT`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_REF`

Deployment reference, such as a git branch or pr.

Default value: `DREVOPS_NOTIFY_REF`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_SHA`

Deployment commit reference, such as a git SHA.

Default value: `DREVOPS_NOTIFY_SHA`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_NEWRELIC_USER`

Optional name of the user performing the deployment.

Default value: `Deployment robot`

Defined in: `scripts/drevops/notify-newrelic.sh`

### `DREVOPS_NOTIFY_PROJECT`

The project to notify about.

Default value: `DREVOPS_PROJECT`

Defined in: `scripts/drevops/notify.sh`

### `DREVOPS_NOTIFY_REF`

Deployment reference, such as a git SHA.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-github.sh`

### `DREVOPS_NOTIFY_REPOSITORY`

Deployment repository.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify-github.sh`

### `DREVOPS_NOTIFY_SKIP`

Flag to skip running of all notifications.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/notify.sh`

### `DREVOPS_NPM_VERBOSE`

Print output from NPM install.

Default value: `UNDEFINED`

Defined in: `.env`

### `DREVOPS_PROJECT`

Project name.

Drives internal naming within the codebase.<br />Does not affect the names of containers and development URL - those depend on<br />the project directory and can be overridden with [`$COMPOSE_PROJECT_NAME`](#COMPOSE_PROJECT_NAME).

Default value: `your_site`

Defined in: `.env`, `scripts/drevops/info.sh`

### `DREVOPS_PROVISION_ACQUIA_SKIP`

Skip Drupal site provisioning in Acquia environment.

Default value: `UNDEFINED`

Defined in: `ACQUIA ENVIRONMENT`

### `DREVOPS_PROVISION_ENVIRONMENT`

Current environment name discovered during site provisioning.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/provision.sh`

### `DREVOPS_PROVISION_OVERRIDE_DB`

Overwrite existing database if it exists.

Usually set to `0` in deployed environments and can be temporary set to `1` for<br />a specific deployment.<br />Set this to `1` in .env.local to override when developing locally.

Default value: `UNDEFINED`

Defined in: `.env`, `.env.local.default`, `scripts/drevops/provision.sh`

### `DREVOPS_PROVISION_POST_OPERATIONS_SKIP`

Flag to skip running of operations after site provision is complete.<br />Useful to only import the database from file (or install from profile) and not<br />perform any additional operations. For example, when need to capture database<br />state before any updates ran (for example, DB caching in CI).

Default value: `UNDEFINED`

Defined in: `scripts/drevops/provision.sh`

### `DREVOPS_PROVISION_SANITIZE_DB_ADDITIONAL_FILE`

Path to file with custom sanitization SQL queries.

To skip custom sanitization, remove the file defined in<br />DREVOPS_PROVISION_SANITIZE_DB_ADDITIONAL_FILE variable from the codebase.

Default value: `./scripts/sanitize.sql`

Defined in: `scripts/drevops/provision-sanitize-db.sh`

### `DREVOPS_PROVISION_SANITIZE_DB_EMAIL`

Sanitization email pattern. Sanitization is enabled by default in all<br />non-production environments.<br />@see https://docs.drevops.com/workflows/build#sanitization

Default value: `user_%uid@your-site-url.example`

Defined in: `.env`, `scripts/drevops/provision-sanitize-db.sh`

### `DREVOPS_PROVISION_SANITIZE_DB_PASSWORD`

Password replacement used for sanitised database.

Default value: `<RANDOM STRING>`

Defined in: `.env`, `scripts/drevops/provision-sanitize-db.sh`

### `DREVOPS_PROVISION_SANITIZE_DB_REPLACE_USERNAME_WITH_EMAIL`

Replace username with email after database sanitization. Useful when email<br />is used as username.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/provision-sanitize-db.sh`

### `DREVOPS_PROVISION_SANITIZE_DB_SKIP`

Skip database sanitization.

Database sanitization is enabled by default in all non-production<br />environments and is always skipped in the production environment.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/provision.sh`

### `DREVOPS_PROVISION_SKIP`

Flag to skip site provisioning.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/provision.sh`

### `DREVOPS_PROVISION_USE_MAINTENANCE_MODE`

Put the site into a maintenance mode during site provisioning.

Default value: `1`

Defined in: `.env`, `scripts/drevops/provision.sh`

### `DREVOPS_PROVISION_USE_PROFILE`

Set to `1` to install a site from profile instead of the database file dump.

Default value: `UNDEFINED`

Defined in: `.env`, `scripts/drevops/provision.sh`

### `DREVOPS_PURGE_CACHE_ACQUIA_SKIP`

Skip purging of edge cache in Acquia environment.

Default value: `UNDEFINED`

Defined in: `ACQUIA ENVIRONMENT`

### `DREVOPS_SHOW_LOGIN`

Show one-time login link.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/info.sh`

### `DREVOPS_TASK_COPY_DB_ACQUIA_DST`

Destination environment name to copy DB to.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-copy-db-acquia.sh`

### `DREVOPS_TASK_COPY_DB_ACQUIA_NAME`

Database name to copy.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-copy-db-acquia.sh`

### `DREVOPS_TASK_COPY_DB_ACQUIA_SKIP`

Skip copying of database between Acquia environment.

Default value: `UNDEFINED`

Defined in: `ACQUIA ENVIRONMENT`

### `DREVOPS_TASK_COPY_DB_ACQUIA_SRC`

Source environment name to copy DB from.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-copy-db-acquia.sh`

### `DREVOPS_TASK_COPY_DB_ACQUIA_STATUS_INTERVAL`

Interval in seconds to check task status.

Default value: `10`

Defined in: `scripts/drevops/task-copy-db-acquia.sh`

### `DREVOPS_TASK_COPY_DB_ACQUIA_STATUS_RETRIES`

Number of status retrieval retries. If this limit reached and task has not<br />yet finished, the task is considered failed.

Default value: `600`

Defined in: `scripts/drevops/task-copy-db-acquia.sh`

### `DREVOPS_TASK_COPY_FILES_ACQUIA_DST`

Destination environment name to copy to.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-copy-files-acquia.sh`

### `DREVOPS_TASK_COPY_FILES_ACQUIA_SKIP`

Skip copying of files between Acquia environment.

Default value: `UNDEFINED`

Defined in: `ACQUIA ENVIRONMENT`

### `DREVOPS_TASK_COPY_FILES_ACQUIA_SRC`

Source environment name to copy from.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-copy-files-acquia.sh`

### `DREVOPS_TASK_COPY_FILES_ACQUIA_STATUS_INTERVAL`

Interval in seconds to check task status.

Default value: `10`

Defined in: `scripts/drevops/task-copy-files-acquia.sh`

### `DREVOPS_TASK_COPY_FILES_ACQUIA_STATUS_RETRIES`

Number of status retrieval retries. If this limit reached and task has not<br />yet finished, the task is considered failed.

Default value: `300`

Defined in: `scripts/drevops/task-copy-files-acquia.sh`

### `DREVOPS_TASK_LAGOON_BIN_PATH`

Location of the Lagoon CLI binary.

Default value: `/tmp`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_BRANCH`

The Lagoon branch to run the task on.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_COMMAND`

The task command to execute.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_INSTALL_CLI_FORCE`

Flag to force the installation of Lagoon CLI.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_INSTANCE`

The Lagoon instance name to interact with.

Default value: `amazeeio`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_INSTANCE_GRAPHQL`

The Lagoon instance GraphQL endpoint to interact with.

Default value: `https://api.lagoon.amazeeio.cloud/graphql`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_INSTANCE_HOSTNAME`

The Lagoon instance hostname to interact with.

Default value: `ssh.lagoon.amazeeio.cloud`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_INSTANCE_PORT`

The Lagoon instance port to interact with.

Default value: `32222`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_LAGOONCLI_VERSION`

Lagoon CLI version to use.

Default value: `latest`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_NAME`

The task name.

Default value: `Automation task`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_LAGOON_PROJECT`

The Lagoon project to run tasks for.

Default value: `LAGOON_PROJECT`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_PURGE_CACHE_ACQUIA_DOMAINS_FILE`

File with a list of domains that should be purged.

Default value: `domains.txt`

Defined in: `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_TASK_PURGE_CACHE_ACQUIA_ENV`

An environment name to purge cache for.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_TASK_PURGE_CACHE_ACQUIA_STATUS_INTERVAL`

Interval in seconds to check task status.

Default value: `10`

Defined in: `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_TASK_PURGE_CACHE_ACQUIA_STATUS_RETRIES`

Number of status retrieval retries. If this limit reached and task has not<br />yet finished, the task is considered failed.

Default value: `300`

Defined in: `scripts/drevops/task-purge-cache-acquia.sh`

### `DREVOPS_TASK_SSH_FILE`

Default SSH file used if custom fingerprint is not provided.

Default value: `HOME/.ssh/id_rsa`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TASK_SSH_FINGERPRINT`

SSH key fingerprint used to connect to remote.

If not used, the currently loaded default SSH key (the key used for code<br />checkout) will be used or deployment will fail with an error if the default<br />SSH key is not loaded.<br />In most cases, the default SSH key does not work (because it is a read-only<br />key used by CircleCI to checkout code from git), so you should add another<br />deployment key.

Default value: `UNDEFINED`

Defined in: `scripts/drevops/task-custom-lagoon.sh`

### `DREVOPS_TZ`

The timezone for the containers.

Default value: `Australia/Melbourne`

Defined in: `.env`

### `DREVOPS_WEBROOT`

Name of the webroot directory with Drupal codebase.

Default value: `web`

Defined in: `.env`, `scripts/drevops/download-db-lagoon.sh`, `scripts/drevops/info.sh`, `scripts/drevops/provision.sh`, `scripts/drevops/reset.sh`

### `DRUPAL_ADMIN_EMAIL`

Drupal admin email. May need to be reset if database was sanitized.

Default value: `webmaster@your-site-url.example`

Defined in: `.env`

### `DRUPAL_CLAMAV_ENABLED`

Enable ClamAV integration.

Default value: `1`

Defined in: `.env`

### `DRUPAL_CLAMAV_MODE`

ClamAV mode.

Run ClamAV in either daemon mode by setting it to `0` (or 'daemon') or in<br />executable mode by setting it to `1`.

Default value: `daemon`

Defined in: `.env`

### `DRUPAL_ENVIRONMENT`

Override detected Drupal environment type.

Used in the application to override the automatically detected environment type.

Default value: `UNDEFINED`

Defined in: `ENVIRONMENT`

### `DRUPAL_PROFILE`

Drupal profile name (used only when installing from profile).

Default value: `standard`

Defined in: `.env`, `scripts/drevops/provision.sh`

### `DRUPAL_REDIS_ENABLED`

Enable Redis integration.<br />See settings.redis.php for details.

Default value: `UNDEFINED`

Defined in: `.env`

### `DRUPAL_SHIELD_PRINT`

Shield print message.

Default value: `Restricted access.`

Defined in: `.env`

### `DRUPAL_SITE_EMAIL`

Drupal site email.<br />Used only when installing from profile.

Default value: `webmaster@your-site-url.example`

Defined in: `.env`, `scripts/drevops/provision.sh`

### `DRUPAL_SITE_NAME`

Drupal site name.<br />Used only when installing from profile.

Default value: `DREVOPS_PROJECT`

Defined in: `.env`, `scripts/drevops/provision.sh`

### `DRUPAL_STAGE_FILE_PROXY_ORIGIN`

Stage file proxy origin. Note that HTTP Auth provided by Shield will be<br />automatically added to the origin URL.

Default value: `https://your-site-url.example/`

Defined in: `.env`

### `DRUPAL_THEME`

Drupal theme name.

Default value: `your_site_theme`

Defined in: `.env`

### `DRUPAL_UNBLOCK_ADMIN`

Unblock admin account when logging in.

Default value: `1`

Defined in: `.env`, `scripts/drevops/login.sh`, `scripts/drevops/logout.sh`

### `GITHUB_TOKEN`

GitHub token used to overcome API rate limits or access private repositories.<br />@see https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token

Default value: `UNDEFINED`

Defined in: `.env.local.default`, `scripts/drevops/github-labels.sh`

### `LAGOON_PROJECT`

Lagoon project name. May be different from [`$DREVOPS_PROJECT`](#DREVOPS_PROJECT).

Default value: `your_site`

Defined in: `.env`, `scripts/drevops/deploy-lagoon.sh`, `scripts/drevops/download-db-lagoon.sh`

### `NEWRELIC_ENABLED`

Enable New Relic in Lagoon environment.

Set as project-wide variable.

Default value: `UNDEFINED`

Defined in: `LAGOON ENVIRONMENT`

### `NEWRELIC_LICENSE`

New Relic license.

Set as project-wide variable.

Default value: `UNDEFINED`

Defined in: `LAGOON ENVIRONMENT`

### `TARGET_ENV_REMAP`

Special variable to remap target env to the sub-domain prefix based on UI name.

Default value: `target_env`

Defined in: `scripts/drevops/task-purge-cache-acquia.sh`

