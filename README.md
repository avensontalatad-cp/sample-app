# Laravel Boilerplate

To start a new project, clone and reset this repo.

```
git clone --depth 1 git@github.com:rdaitan-cp/laravel-boilerplate.git project-name
cd project-name
rm -rf .git
git init
```

Once you're done, you can remove this part from the README.

### Notes

Github workflows are included in this repository. Feel free to modify them according to your
project's requirements.

- `test_and_deploy.yml`
  - Run tests on each PR.
  - Deploy to staging or master branch. These are disabled by default. Uncomment to enable.
  
- `housekeeping.yml`
  - Update the PHP and JS dependencies daily in the `internal` branch.
  - Make sure you have an `internal` branch.

## Setup Instructions 
1. Clone the project.
2. In the project directory, copy `.env.example`.
   ```
   cp .env.example .env
   ```
3. Modify the `.env` file according to your system.
4. Run the following commands
   ```
   composer install
   php artisan key:generate
   php artisan migrate --seed
   ```
