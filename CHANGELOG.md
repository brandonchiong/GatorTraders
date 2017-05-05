# Change Log

## Release Branch

This branch is to be updated at every point the development branch has completed a usable and publishable milestone.

## Development Branch

This branch is to be updated at every point during the development process and will be the branch to be merged with feature branches.

* Merged View_base_Initial_Setup with dev.

## Feature Branches

### View_base_Initial_Setup
* Added Navigation Bar to `gatortraders/app/Resources/view/base.html.twig`
* Added Bootstrap CDN to `gatortraders/app/Resources/view/base.html.twig`
* Added JQuery CDN to `gatortraders/app/Resources/view/base.html.twig`
* Wrapped Navigation Bar in block `{% block nav %}` to `gatortraders/app/Resources/view/base.html.twig`
* Wrapped CDN in block `{% block javascripts %}` to `gatortraders/app/Resources/view/base.html.twig`
* Merged with dev branch

### Vertical Protoyple
New Folders created:
* Created `groupseven/src/AppBundle/Entity/`
* Created `/src/AppBundle/Resources/config/doctrine/`

New Files created:
* Created `groupseven/src/AppBundle/Controller/GenusController.php`
* Created `groupseven/src/AppBundle/Controller/Result.php`
* Created `groupseven/src/AppBundle/Entity/Table1.php`
* Created `/src/AppBundle/Resources/config/doctrine/Table1.orm.yml`
