#!/usr/bin/env bash
##
# Export database as a file.
#
# shellcheck disable=SC2086

t=$(mktemp) && export -p >"${t}" && set -a && . ./.env && if [ -f ./.env.local ]; then . ./.env.local; fi && set +a && . "${t}" && rm "${t}" && unset t

set -eu
[ "${DREVOPS_DEBUG-}" = "1" ] && set -x

# Directory with database dump file.
DREVOPS_DB_EXPORT_FILE_DIR="${DREVOPS_DB_DIR:-${DREVOPS_DB_DIR:-./.data}}"

# ------------------------------------------------------------------------------

# @formatter:off
note() { printf "       %s\n" "${1}"; }
info() { [ "${TERM:-}" != "dumb" ] && tput colors >/dev/null 2>&1 && printf "\033[34m[INFO] %s\033[0m\n" "${1}" || printf "[INFO] %s\n" "${1}"; }
pass() { [ "${TERM:-}" != "dumb" ] && tput colors >/dev/null 2>&1 && printf "\033[32m[ OK ] %s\033[0m\n" "${1}" || printf "[ OK ] %s\n" "${1}"; }
fail() { [ "${TERM:-}" != "dumb" ] && tput colors >/dev/null 2>&1 && printf "\033[31m[FAIL] %s\033[0m\n" "${1}" || printf "[FAIL] %s\n" "${1}"; }
# @formatter:on

info "Started database file export."

drush() { ./vendor/bin/drush -y "$@"; }

# Create directory to store database dump.
mkdir -p "${DREVOPS_DB_EXPORT_FILE_DIR}"

# Create dump file name with a timestamp or use the file name provided
# as a first argument.
dump_file=$([ "${1:-}" ] && echo "${DREVOPS_DB_EXPORT_FILE_DIR}/${1}" || echo "${DREVOPS_DB_EXPORT_FILE_DIR}/export_db_$(date +%Y%m%d_%H%M%S).sql")

# Dump database into a file. Also, provide a path to a parent directory if
# relative path is provided, as the result file is relative to Drupal root,
# but provided paths are relative to the project root.
drush sql:dump --skip-tables-key=common --extra-dump=--no-tablespaces --result-file="${dump_file/.\//../}" -q

# Check that file was saved and output saved dump file name.
if [ -f "${dump_file}" ] && [ -s "${dump_file}" ]; then
  note "Exported database dump saved ${dump_file}."
else
  fail "Unable to save dump file ${dump_file}." && exit 1
fi

pass "Finished database file export."
