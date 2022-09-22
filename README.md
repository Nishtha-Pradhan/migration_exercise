# Steps to migrate:
* In a fresh Drupal installation, enable the **migration_exercise** custom module.
```
$ drush en migration_exercise
```
* Import the configuration present in _config/default/sync_.
```
$ drush cim
```
* A custom content type called **Cities** is present in these configurations, which will take imported data.
* The json file for importation is present in _/sites/default/files/migration_exercise_.
* Using drush commands in series, check the migrations and import them in the custom content type.
```
$ drush ms
$ drush mim --group=cities
```
# Custom Content Entity module usage:
* Enable the **cities_migration_entity** module.
```
$ drush en cities_migration_entity
```
* You will find the new custom Entity by navigating to _/admin/structure/cities_migration_entity_types_ 