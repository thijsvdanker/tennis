# Tennis

Imagine you work for a consultancy company, and one of your colleagues has been doing some work for the Tennis Society. The contract is for 10 hours billable work, and your colleague has spent 8.5 hours working on it. Unfortunately he has now fallen ill. He says he has completed the work, and the tests all pass. Your boss has asked you to take over from him. She wants you to spend an hour or so on the code so she can bill the client for the full 10 hours. She instructs you to tidy up the code a little and perhaps make some notes so you can give your colleague some feedback on his chosen design. You should also prepare to talk to your boss about the value of this refactoring work, over and above the extra billable hours.

## Getting started

### 1. Clone this repository
```bash
git clone git@gitlab.com:adsysco_nl/tennis-app.git
```
### 2. Install the dependencies
```bash
composer install
npm install
npm run dev
```
### 3. Setup your database
 - setup db credentials in .env
 - run migrations
 ```bash
 php artisan db:migrate
 ```
### 5. Checkout the app
Visit the `/` home route in your browser and play your first TennisMatch TM.
### 4. Run the tests
```bash
php artisan test
```
