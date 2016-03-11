#PCA Predict Magento 2 Integration
##Quick instructions

###Manual Install
- Create folder structure /app/code/PCAPredict/Tag/
####From Git
- Clone the Git repository (https://github.com/pcapredict/magento2.git) to the folder you just created
####From a zip file
- Download the zip file from the PCA Predict website (INSERT URL HERE)
- Extract the contents of the zip file to the folder you just created

- Run install commands:
```
php bin/magento setup:upgrade
```
- You may need to run the following command to flush the Magento cache:
```
php bin/magento cache:flush
```

##Configuration Instructions
The configuration for the extension is located under Stores -> Configuration -> PCA Predict -> Settings.

Once you have entered your PCA account code, go to your PCA account section to setup new Capture+, and optionally Email Validation & Phone Validation services, following the setup instructions to configure each new service on your website.

 

### Main Options
- Account Code - Enter your PCA Predict Account Code here.
- Field Mappings - These are some custom field mappings that allow our services to work in Magento 2. Normally, you shouldn't need to change these, but can be if directed to do so by technical support.

