
@servers(['localhost' => '127.0.0.1'])

@task('deploy_qa', ['on' => 'localhost'])
git fetch
@if ($branch)
  git checkout --
  git checkout {{ $branch }}
  git pull origin {{ $branch }}
@endif

composer install --no-interaction --prefer-dist --optimize-autoloader

@if ($fresh)
  php artisan migrate:fresh --seed
@elseif ($sql)
  echo 'todo add sql'
@else
  php artisan migrate
@endif

yarn
yarn run prod

{{-- php artisan horizon:terminate --}}

@endtask
