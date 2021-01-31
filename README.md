# Magento2 Tracking Link

[![Total Downloads](https://poser.pugx.org/faonni/module-tracking-link/downloads)](https://packagist.org/packages/faonni/module-tracking-link)
[![Latest Stable Version](https://poser.pugx.org/faonni/module-tracking-link/v/stable)](https://packagist.org/packages/faonni/module-tracking-link)

Extension add Tracking Url in Shipment Email.

Native shipment email doesn’t include a clickable tracking number link, just plain text one. The customer has to copy and then go to the courier site to get the tracking information. The extension make the tracking number a clickable link that will bring them to the carriers site and display the tracking information.
The extension supports all couriers which support shipping tracking.

## Compatibility

Magento CE(EE) 2.0.x, 2.1.x, 2.2.x, 2.3.x, 2.4.x

## Install

#### Install via Composer (recommend)

1. Go to Magento2 root folder

2. Enter following commands to install module:

     For Magento CE(EE) 2.0.x, 2.1.x, 2.2.x, 2.3.x

    ```bash
    composer require faonni/module-tracking-link:2.0.*
    ```
     For Magento CE (EE) 2.4.x

    ```bash
    composer require faonni/module-tracking-link:2.4.*
    ```
   Wait while dependencies are updated.

#### Manual Installation

1. Create a folder {Magento root}/app/code/Faonni/TrackingLink

2. Download the corresponding latest version

3. Copy the unzip content to the folder ({Magento root}/app/code/Faonni/TrackingLink)

#### Completion of installation

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile
    php bin/magento setup:static-content:deploy (optional)
    ```
### Configuration

In the Magento Admin Panel go to *Stores > Configuration > Sales > Tracking Settings > Tracking Service Url*.

<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/config.png" style="width:100%"/>

## Usage
#### Shipment Email
<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/email.png" style="width:100%"/>

#### Service Tracking Page
<img alt="Magento2 Tracking Link" src="https://karliuka.github.io/m2/tracking-link/ups.png" style="width:100%"/>

## Uninstall

#### Remove database data

This works only with modules defined as Composer packages.

1. Go to Magento2 root folder

2. Enter following commands to remove database data:

    ```bash
    php bin/magento module:uninstall -r Faonni_TrackingLink

#### Remove Extension

1. Go to Magento2 root folder

2. Enter following commands to remove:

    ```bash
    composer remove faonni/module-tracking-link
    ```

#### Completion of uninstall

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile
    php bin/magento setup:static-content:deploy  (optional)

