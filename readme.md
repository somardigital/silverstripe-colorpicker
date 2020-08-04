This is a fork of https://github.com/silverstripe/silverstripe-colorpicker with added Icon Picker.

# Colorpicker Module

[![Build Status](https://travis-ci.org/silverstripe/silverstripe-colorpicker.svg?branch=master)](https://travis-ci.org/silverstripe/silverstripe-colorpicker)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/silverstripe/silverstripe-colorpicker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/silverstripe/silverstripe-colorpicker/?branch=master)
[![codecov](https://codecov.io/gh/silverstripe/silverstripe-colorpicker/branch/master/graph/badge.svg)](https://codecov.io/gh/silverstripe/silverstripe-colorpicker)

This module adds a color picker field which can be used anywhere in the CMS.

In order to keep the site accessible, custom color selection is not implemented.

## Installation

To install this module, you can do so with Composer:

```
composer require silverstripe/colorpicker
```

To install this fork of the module, add custom repository to your `composer.json` first:

```
...
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/SomarDesignStudios/silverstripe-colorpicker.git"
    }
]
...
```

## Usage

You can use the `ColorPickerField` as follows:

```php
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Main',
            [
                ColorPickerField::create(
                    'MyColorField',
                    _t(
                        __CLASS__ . '.MyColorField',
                        'My Color Field'
                    ),
                    [
                        [
                            'Title' => 'Red',
                            'CSSClass' => 'red',
                            'Color' => '#E51016',
                        ],
                        [
                            'Title' => 'Blue',
                            'CSSClass' => 'blue',
                            'Color' => '#1F6BFE',
                        ],
                        [
                            'Title' => 'Green',
                            'CSSClass' => 'green',
                            'Color' => '#298436',
                        ]
                    ]
                )
            ]
        );

        return $fields;
    }
```

The `IconPickerField` just adds additional classes to each option element, you have to add CSS for your icons to the CMS e.g. with .yml file:

```yml
SilverStripe\Admin\LeftAndMain:
    extra_requirements_css:
        - app/client/dist/css/my_icons.css
```

Example of `IconPickerField` use:

```php
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.Main',
            [
                IconPickerField::create(
                    'MyIconField',
                    _t(
                        __CLASS__ . '.MyIconField',
                        'My Icon Field'
                    ),
                    [
                        [
                            'Title' => 'Icon 1',
                            'CSSClass' => 'icon1',
                        ],
                        [
                            'Title' => 'Icon 2',
                            'CSSClass' => 'icon2',
                        ],
                        [
                            'Title' => 'Icon 3',
                            'CSSClass' => 'icon$',
                        ]
                    ]
                )
                    ->setOptionClass('my-icons')
                    ->setCSSClassPrefix('icon')
            ]
        );

        return $fields;
    }
```

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.
