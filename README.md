#PCA Predict Magento 2 Integration
##Quick instructions

###Manual Install
- Create folder structure /app/code/PCAPredict/Tag/

####From Git
- Clone the Git repository (https://github.com/pcapredict/magento2.git) to the folder you just created

####From a .ZIP file
- Download the .ZIP file from the [PCA Predict website](http://go.postcodeanywhere.com/l/52622/2016-03-15/b2zm2r "PCA Predict")
- Extract the contents of the .ZIP file to the folder you just created

####Composer Installation
- Add the repository to your list of respositories:<br />
<pre>composer config repositories.pca-predict vcs https://github.com/PCAPredict/magento2.git</pre>
- Pull in the latest version:<br />
<pre>composer require pcapredict/tag:^1.0.8</pre>

#### Run install commands:
```
php bin/magento setup:upgrade
```
- You may need to run the following command to flush the Magento cache:
```
php bin/magento cache:flush
```

##Configuration Instructions
The configuration for the extension is located under Stores > Configuration > PCA Predict > Settings.

Once you have entered your PCA Predict Account Code, visit your PCA Predict Account Dashboard to set up Address Validation, and (optional) Email & Phone Validation services, following the setup instructions to configure each new service on your website.

 

### Main Options
- Account Code - Enter your PCA Predict Account Code here.
- Field Mappings - These are some custom field mappings that allow our services to work in Magento 2. Normally, you shouldn't need to change these, but can do so if instructed by the PCA Predict Support team or your developer

