# **Manual Install**

## From Git
- Locate the **/app/code** directory which should be under the magento root installation.
- If the **code** folder is not there, create it.
- Create a folder **PCAPredict** inside the **code** folder. 
- Change to the **PCAPredict** folder and clone the Git repository (https://github.com/pcapredict/magento2.git) into **PCAPredict** specifying the local repository folder to be **Tag** 
e.g. ``` git clone https://github.com/pcapredict/magento2.git Tag```

## From ZIP File
- Locate the **/app/code** directory which should be under the magento root installation.
- If the **code** folder is not there, create it.
- Create the folder structure **PCAPredict/Tag/** inside the **code** folder. 
- Extract the contents of the .ZIP file to the **Tag** folder you just created.

## Magento Setup
- Make sure you have the correct file and folder permissions set on your magento installation so that the magnento store can install the app.
- Refer to the Magento 2 documentation for full instructions on how to install an app, the commands should be similar to the following:
```
# This tells magento to install the app.
php bin/magento setup:upgrade
```
```
# You may need to run the following command to flush the Magento cache so the app works correctly:
php bin/magento cache:flush
```

# **App Configuration Options**

The configuration for the extension is located under *Stores* > *Other Settings* > **PCA Predict Settings**.

## Main screen
- Account Code - Enter your PCAPredict Account Code here.
- Password - The password you used when you setup the account.

## Logged in screen
- Back-end custom javascript - This is for any custom javascript to be injected into the back-end of the website when the app loads.
- Front-end custom javascript - This is for any custom javascript to be injected into the front-end of the website when the app loads.