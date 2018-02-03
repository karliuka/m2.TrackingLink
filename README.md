# Magento2 Tracking Link

[![Total Downloads](https://poser.pugx.org/faonni/module-tracking-link/downloads)](https://packagist.org/packages/faonni/module-tracking-link)
[![Latest Stable Version](https://poser.pugx.org/faonni/module-tracking-link/v/stable)](https://packagist.org/packages/faonni/module-tracking-link)	

Extension add Tracking Url in Shipment Email.

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/email.png" style="width:100%"/>

Native shipment email doesn’t include a clickable tracking number link, just plain text one. The customer has to copy and then go to the courier site to get the tracking information. The extension make the tracking number a clickable link that will bring them to the carriers site and display the tracking information.

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/ups.png" style="width:100%"/>

The extension supports all couriers which support shipping tracking.

## Compatibility

Magento CE 2.0.x, 2.1.x, 2.2.x

## Install

#### Install via Composer (recommend)

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require require faonni/module-tracking-link
    ```
   Wait while dependencies are updated.
   
#### Manual Installation
   
1. Create a folder {Magento root}/app/code/Faonni/TrackingLink

2. Download the corresponding [latest version](https://github.com/karliuka/m2.TrackingLink/releases)

3. Copy the unzip content to the folder ({Magento root}/app/code/Faonni/TrackingLink)

### Completion of installation

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento setup:static-content:deploy  (optional)

### Configuration

In the Magento Admin Panel go to *Stores > Configuration > Sales > Tracking Settings > Tracking Service Url*.

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/config.png" style="width:100%"/>

