[![Build Status](https://travis-ci.org/GeneaLabs/bones-flash.svg?branch=master)](https://travis-ci.org/GeneaLabs/bones-flash) [![Latest Stable Version](https://poser.pugx.org/genealabs/bones-flash/v/stable.svg)](https://packagist.org/packages/genealabs/bones-flash) [![Latest Unstable Version](https://poser.pugx.org/genealabs/bones-flash/v/unstable.svg)](https://packagist.org/packages/genealabs/bones-flash) [![License](https://poser.pugx.org/genealabs/bones-flash/license.svg)](https://packagist.org/packages/genealabs/bones-flash)

# Laravel Bones Flash Notification (bones-flash) 

## Installation

To install bones-flash as a stand-alone module:

```sh
composer require "genealabs/bones-flash":"*"
```

or add it to you composer.json file:

```json
    "require": {
        /* ... */,
        "genealabs/bones-flash": "*"
    },
    /* ... */
```

## Usage

You can add any one of the following alerts anywhere in your app. Most common-place is probably the controller or global.php (for error catching).

```php
use use GeneaLabs\BonesFlash\Flash;

class MyController extends BaseController
{
	public function index()
	{
		Flash::info("test");

		return View::make('index');
	}
}
```

or:

```php
App::error(function(Exception $exception, $code)
{
    Flash::danger("An error occurred");
	Log::error($exception);
	View::make('my.view');
});
```

## Methods

The following methods are available to use:

```php
// shows a bootstrap success message
Flash::success($message);

// shows a bootstrap info message
Flash::info($message);

// shows a bootstrap warning message
Flash::warning($message);

// shows a bootstrap danger message
Flash::danger($message);

// shows a message in a bootstrap modal window
Flash::modal($message);
```

## Dependencies

At this time this package requires:

- Laravel 4.2+
- Bootstrap 3.1+
- jQuery 1.7+
