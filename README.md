# lavarel-passport-revoke-users-command
This command revokes access and refresh tokens of given users in Laravel Passport

## Installation
* Install the command with composer :
```
composer require "pierrocknroll/lavarel-passport-revoke-users-command @dev"
```

* For Laravel <= 5.4, add the command to your /config/app.php in the providers array :
```
\Pierrocknroll\LavarelPassportRevokeUsersCommand\ServiceProvider::class
```
For Laravel >= 5.5, the package is auto discovered.

## Usage
You can pass users ids or emails like this :
```
php artisan passport:revoke 42 12 jacky@site.com
```
