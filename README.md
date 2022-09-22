# Steps to migrate:
* In a fresh Drupal installation, import the configuration present in config/default/sync.
```
$ drush cim
```
* A custom content type called **Cities** is present in these configurations, which will take imported data. 
* Enable the **migration_exercise** custom module.
* The json file for importation is present in /sites/default/files/migration_exercise.
* Using drush commands in series, check the migrations and import them in the custom content type.
```
$ drush ms
$ drush mim --group=cities
```
