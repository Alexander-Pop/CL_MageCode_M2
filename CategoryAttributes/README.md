# Magento 2 Category Attributes
This is a sample extension to show you how to create category attributes.

## Installation

NOTE:  It will build sample attributes (my_custom_wysiwyg, my_custom_text). Make sure to modify them before installing the extension.

1. Create the following directory structure `app/code/Codelegacy/CategoryAttributes`
2. Execute: php bin/magento setup:upgrade

In Magento Admin Panel visit Stores > Products > Categories to see new attributes.

## Overview

This module creates some category attributes using EavSetupFactory model and then make them visible by extending the uiComponent `category_form.xml`.

## Compatibility Tested
- Magento 2.2
- Magento 2.3