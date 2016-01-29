#PCA Predict Magento 2 Integration
##Quick instructions

###Install via composer

First add the repository:
```
composer config repositories.craftyclicks git https://github.com/pcapredict/magento2.git
```
& make sure that your your minimum-stability is alpha.
Then, request composer to fetch the module:
```
composer require pcapredict/module-tag
```

Then execute install script
```
php -f bin/magento setup:upgrade
```

###Manual Install

- Create folder structure /app/code/PCAPredict/Tag/
- Download & copy the git contents to the folder
- Run install script
```
php -f bin/magento setup:upgrade
```

##Configuration Instructions
The configuration for the extension is located under Stores -> Configuration -> PCA Predict -> Settings.
There are 3 sub-sections.
#### Main Options
Account Code - Enter your PCA Predict Account Code here.

##End-user Instructions

