Set-Location -Path ../

Set-ExecutionPolicy Bypass -Scope Process -Force; Invoke-WebRequest https://chocolatey.org/install.ps1 -UseBasicParsing | Invoke-Expression

choco install nodejs -y

choco install php -y

Set-Content composer.bat '@php "%~dp0composer.phar" %*'

choco install mysql -y


Set-Location -Path ./DanDevHub

Set-Location -Path ./nodejs-api
npm install

Set-Location -Path ../DankDevHub
composer install
php artisan migrate --seed
php artisan storage:link

Set-Location -Path ../
