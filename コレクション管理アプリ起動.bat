@echo off

cd /d "%~dp0"

start "Laravel" cmd /k "php artisan serve"

start "Vite" cmd /k "npm run dev"

timeout /t 10 /nobreak > nul

start "" "http://127.0.0.1:8000/collections"