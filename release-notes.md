# Release notes

## v2.0.2

- UI wording.
- ACL Bug Fix.

## v2.0.1

- Updated app store description and link to setup guide.

## v2.0.0

- Re-write to use more of the pca field mapping logic and less custom code.
- User can log in with their account code and password, which will generate a set 
  of keys to get Address, Email and Phone running in both Admin area and Customer facing site.

## v1.0.8

- load js with requirejs

## v1.0.7

- Add ability for customers to add custom JavaScript code
- Fix issue where US states dropdown isn't being updated when an address is selected
- Update default mappings to help with the above issue 

## v1.0.6

- Remove some console.log calls

## v1.0.5

- Fix issue where State/Province field not populating correctly

## v1.0.4

- Fix issue where services not loaded on certain address forms

## v1.0.3

- Fix mismatching versions (`composer.json` declares v1.0.1 in tagged 1.0.2)
- Fix [critical bug that breaks ACL rendering](https://github.com/magento/magento2/pull/4396)
- Update `etc/module.xml` to use XML namespace and convention
- Update requirements of other modules (previously undeclared)
- Upgrade release notes to Markdown

## v1.0.2

- Fix typo in composer.json

## v1.0.1

- Fix issue where address fields are not detecting changes when populating from search results

## v1.0.0

- Initial release.
