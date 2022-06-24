# Payment setup plugin for Woocommerce
### Version: 1.0.0

## Installing the dependencies
**Install the plugin autoload and dependencies with the composer**
```shell
composer install
```

**Install the node dependencies with the yarn or npm**
```shell
yarn install
```
```shell
npm install
```

**Build styles and scripts with the yarn or npm**
```shell 
yarn build
```
```shell 
npm run build
```


### Files and folders ignored
- vendor/
- dist/
- node_modules/

## File Tree
```
.
├── app
│   ├── Controllers
│   │   ├── Actions
│   │   │   └── index.php
│   │   ├── Gateways
│   │   │   ├── Gateway.php
│   │   │   └── InterfaceGateways.php
│   │   ├── Gateways.php
│   │   ├── Logs.php
│   │   ├── Notifications.php
│   │   ├── Orders
│   │   │   └── index.php
│   │   ├── Render
│   │   │   └── Checkout.php
│   │   ├── Render.php
│   │   ├── Service.php
│   │   ├── Status.php
│   │   ├── Webhooks
│   │   │   ├── Example.php
│   │   │   └── InterfaceWebhooks.php
│   │   ├── Webhooks.php
│   │   └── Woocommerce.php
│   ├── Helpers
│   │   ├── Functions.php
│   │   ├── Hooks.php
│   │   └── Utils.php
│   ├── index.php
│   ├── Model
│   │   ├── Options.php
│   │   └── PostMeta.php
│   ├── Services
│   │   └── index.php
│   └── Views
│       ├── index.php
│       └── templates
│           ├── checkout
│           │   ├── checkout.php
│           │   └── index.php
│           ├── myaccount
│           │   └── index.php
│           └── thankyou-page
│               └── index.php
├── composer.json
├── languages
│   └── index.php
├── LICENSE
├── package.json
├── README.md
├── readme.txt
├── resources
│   ├── admin.js
│   ├── images
│   │   └── index.php
│   ├── scripts
│   │   ├── admin
│   │   │   └── index.js
│   │   └── theme
│   │       └── index.js
│   ├── styles
│   │   ├── admin
│   │   │   ├── base
│   │   │   │   ├── index.scss
│   │   │   │   └── _vars.scss
│   │   │   ├── components
│   │   │   │   └── index.scss
│   │   │   └── index.scss
│   │   └── theme
│   │       ├── base
│   │       │   ├── index.scss
│   │       │   └── _vars.scss
│   │       ├── components
│   │       │   └── index.scss
│   │       └── index.scss
│   └── theme.js
├── vendor
│   ├── autoload.php
│   └── composer
│       ├── autoload_classmap.php
│       ├── autoload_namespaces.php
│       ├── autoload_psr4.php
│       ├── autoload_real.php
│       ├── autoload_static.php
│       ├── ClassLoader.php
│       ├── installed.json
│       ├── installed.php
│       ├── InstalledVersions.php
│       └── LICENSE
└── wc-plugin-template.php

```
