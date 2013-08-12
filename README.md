# Pricing table module

This is a module for manage easily the package 'fuel-lbPricingTable' (https://github.com/jhuriez/fuel-lbPricingTable).

It's contains 
- A backoffice with Twitter Bootstrap 3 and jQuery UI
- 3 examples themes for pricing table

## Installation :

1. Clone or download the pricingtable repository
2. Move it in your module folder
3. Add 'pricingtable' to the 'always_load.modules' array in app/config/config.php.
4. Open your oil console
5. Run 'refine migrate --modules=pricingtable' for generate migration (generate fake example, and copy js and css files in assets folder)


## Usage :

You access to the backoffice via this URI : http://mywebsite.com/pricingtable/backend

Warning: This module is not securised, i've not add a ACL or Auth security. 
You need to do it, or you can copy/extends my module.
