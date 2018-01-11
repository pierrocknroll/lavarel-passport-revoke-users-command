# lavarel-passport-revoke-users-command
This command revoke access and refresh tokens of given users in Laravel Passport

## Installation
* Install the command with composer :
```
composer require "pierrocknroll/lavarel-passport-revoke-users-command @dev"
```

* Add the command to your /app/console/Kernel.php in the $commands array :
``` 
protected $commands = [
    \Pierrocknroll\LavarelPassportRevokeUsersCommand\RevokeTokens::class
];
```

## Usage
```
php artisan passport:revoke 42 12 jacky@site.com
```
