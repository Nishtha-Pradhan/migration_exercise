# Steps to migrate:
* In a fresh Drupal installation, import the configuration present in config/default/sync.
* Enable the **migration_exercise** custom module.
* Using drush commands in series:
```
$ drush ms
$ drush mim --group=cities
```
