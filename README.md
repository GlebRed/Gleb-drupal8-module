# Gleb module for Drupal 8: Interactive map of railway stations in France :icecream:

Based on jQuery Mapael plugin https://github.com/neveldo/jQuery-Mapael and French railway services API https://ressources.data.sncf.com/explore/dataset/referentiel-gares-voyageurs/api/?sort=intitule_gare

### This is codebase for the course "Drupal 8 module development + useful tips"

#### Find initial map source html and js in folder "INITIAL MAP HERE", see `map.html` for main script code

##### As I'm using MAMP (on mac OS) to run a local server, here's my snippet from httpd.conf to set up an alias (to make Drupal run from http://localhost:8888/my-drupal8/).

MAMP for Windows and mac OS: https://www.mamp.info/en/

```
Alias /my-drupal8 "/Applications/MAMP/htdocs/my-drupal8/web"

<Directory "/Applications/MAMP/htdocs/my-drupal8/web">
        #Options Indexes MultiViews
        Options All
        AllowOverride All
        Order allow,deny
        Allow from all
</Directory>
```