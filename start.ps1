Set-Location -Path .\DankDevHub
Start-Process php -ArgumentList "artisan serve" 

Set-Location -Path ..\nodejs-api
Start-Process node -ArgumentList "app.js"

Set-Location -Path ..\
