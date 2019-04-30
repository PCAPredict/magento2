# **Manual Install**

### From Git
- Locate the **/app/code** directory which should be under the magento root installation.
- If the **code** folder is not there, create it.
- Create a folder **PCAPredict** inside the **code** folder. 
- Change to the **PCAPredict** folder and clone the Git repository (https://github.com/pcapredict/magento2.git) into **PCAPredict** specifying the local repository folder to be **Tag** 
e.g. ``` git clone https://github.com/pcapredict/magento2.git Tag```

### From ZIP File
- Locate the **/app/code** directory which should be under the magento root installation.
- If the **code** folder is not there, create it.
- Create the folder structure **PCAPredict/Tag/** inside the **code** folder. 
- Download the latest release from the github site (https://github.com/PCAPredict/magento2/releases/).
- Extract the zip contents to the **Tag** folder you just created. The README.md and all other files and folders should be under the **Tag** folder.

### If you're using Composer
- Integrated with Packagist, so you should be able to get the latest version with:
```composer require pcapredict/tag:^2.0.8```

### Magento Setup
- Make sure you have the correct file and folder permissions set on your magento installation so that the magnento store can install the app.
- Refer to the Magento 2 documentation for full instructions on how to install an app, the commands should be similar to the following:
```php bin/magento setup:upgrade - This tells magento to install the app.```
```php bin/magento cache:flush - This flushes the cache so the app appears in the admin area correctly.```

# **App Configuration Options**

The configuration for the extension is located under *Stores* > *Other Settings* > **PCA Predict Settings**.

### Main screen
- Account Code - Enter your PCAPredict Account Code here.
- Password - The password you used when you setup the account.

### Logged in screen
- Back-end custom javascript - This is for any custom javascript to be injected into the back-end of the website when the app loads.
- Front-end custom javascript - This is for any custom javascript to be injected into the front-end of the website when the app loads.