# Messenger for Laravel
## Goal
Provide a drop-in application-wide alerting functionality to display various
 types of alerts and notifications to the user in response to their actions.

## Prerequisites
- Bootstrap 3 or 4
- Laravel 5.5
- PHP >= 7.0.0

## Installation
To install bones-flash as a stand-alone module:

```sh
composer require genealabs/laravel-messenger
```

Nothing else needs to be done, as the service provider and facades will be auto-
 loaded.

## Configuration
```php
/*
|--------------------------------------------------------------------------
| CSS Framework Configuration
|--------------------------------------------------------------------------
|
| Here you may configure the CSS framework to be used by Messenger for
| Laravel. This allows you to switch or upgrade frameworks without
| having to recreate all your alerts.
|
| Available Settings: "bootstrap3", "bootstrap4"
|
*/

'framework' => 'bootstrap4',

/*
|--------------------------------------------------------------------------
| JavaScript Blade Section
|--------------------------------------------------------------------------
|
| Your layout blade template will need to have a section dedicated to
| inline JavaScript methods and commands that are injected by this
| package. This will eliminate conflicts with Vue, as well as
| making sure that JS is run after all deps are loaded.
|
*/

'javascript-blade-section' => 'js',
```

## Usage
1. Add the placeholder to your layout blade file:
  ```php
  <div class="container">

      @deliver

  </div>
  ```
2. Trigger an alert using either the facade/IoC helper, or a blade directive
 in another view:
  ```php
  // IoS helper:
  app('messenger')->send('message', 'title', 'level', autoHide, 'framework');

  // Facade:
  Messenger::send('message', 'title', 'level', autoHide, 'framework');

  // Blade directive:
  @send ('message', 'title', 'level', autoHide, 'framework')
  ```

### Parameters
- **message**: string|required
  The body of the message you want to deliver to your user. This may contain
  HTML. If you add links, be sure to add the appropriate classes for the
  framework you are using.
- **title**: string | optional | default: ''
  Title of the notification, will be inserted as an `<h4>` tag, can also include
  HTML. Again, keep in mind to add any framework-specific formatting yourself.
- **level**: string | optional | default: 'info'
  If provided, must be one of the following: 'info', 'success', 'warning',
  'danger'.
- **autoHide**: boolean | optional | default: false
  Allows you to let the notification disappear automatically after 15 seconds. If
  autoHide is false, the user will be provided a close button in the alert.
- **framework**: string | optional | default: 'bootstrap3'
  Specify the framework you are using. Right now it only supports 'bootstrap3'
  or 'bootstrap4'.
- **type**: string | optional | default: 'alert'
  Invoke any of the available alert modes. Currently only supports 'alert' or
  'modal'.
