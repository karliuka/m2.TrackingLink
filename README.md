# Magento2 TrackingLink

Extension add Tracking Url in Shipment Email.

### Config

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/config.png" style="width:100%"/>

### Track Email

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/email.png" style="width:100%"/>

### Target Service

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/ups.png" style="width:100%"/>

## Install with Composer as you go

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-tracking-link
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento setup:static-content:deploy  (optional)

