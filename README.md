Charcoal CMS Metadata Extension
===============================

A CMS module extension that provides an interface for content-level metadata information.

## Installation

#### With Composer

```shell
$ composer require locomotivemtl/charcoal-cms-meta
```

```json
{
	"require": {
		"locomotivemtl/charcoal-cms-meta": "@dev"
	}
},
"repositories": [
	{
		"type": "vcs",
		"url": "https://github.com/locomotivemtl/charcoal-legacy-cms-meta"
	}
]
```

#### With SVN

```shell
$ cd www/modules
$ svn propset svn:externals . "cms-meta https://github.com/locomotivemtl/charcoal-legacy-cms-meta/trunk"
```

#### With Git

```shell
$ git submodule add https://github.com/locomotivemtl/charcoal-legacy-cms-meta www/modules/cms-meta
```

## Usage

#### Example #1 `CMS_Section` (a.k.a. your content types)

#### Example #2 `Boilerplate_Config` (a.k.a. your site-wide information)

#### Example #3 `Boilerplate_Template_Controller`

This is where the use of PHP _Interfaces_ makes sense; the template controller is what you will be using in your templates to display your content meta data.

The methods you will inherit and extend in the template controller will take care of negotiating what to do display. If your Product doesn't have a meta description, fallback to the Section, followed by the Site.
