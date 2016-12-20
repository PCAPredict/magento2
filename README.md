#PCAPredict Magento 2 Integration
##Quick instructions

###Manual Install
- Create folder structure /app/code/PCAPredict/Tag/

####From a .ZIP file
- Download the .ZIP file from the [PCAPredict website](TODO URL HERE "PCAPredict")
- Extract the contents of the .ZIP file to the folder you just created

#### Run install commands:
```
php bin/magento setup:upgrade
```
- You may need to run the following command to flush the Magento cache:
```
php bin/magento cache:flush
```

##Configuration Instructions
The configuration for the extension is located under Stores > Configuration > PCAPredict > Settings.

Once you have entered your PCAPredict Account Code, visit your PCAPredict Account Dashboard to set up Address Validation, following the setup instructions to configure the new service on your website.


### Main Options
- Account Code - Enter your PCAPredict Account Code here.
- Field Mappings - These are some custom field mappings that allow our services to work in Magento 2. Normally, you shouldn't need to change these, but can do so if instructed by the PCAPredict Support team or your developer

