@servers(['web' => 'ADSDCH@adsd.clow.nl'])

@setup
$git['url']     = 'git@gitlab.com:codinghighway/codinghighway.git';
$git['branch']  = 'dev';

$base           = '/home/adsdch/codinghighway';
$shared         = ['vendor', 'node_modules', '.env'];
$current        = \Carbon\Carbon::now()->format('YmdHis');
@endsetup

@story('deploy:cold')
make:shared
git:setup
make:release
make:link
install
set:live
set:fin
@endstory

@story('deploy')
git:update
make:release
make:link
install
set:live
set:fin
@endstory

@task('install')
cd {{ $base.'/releases/'.$current }}
composer install
npm install
@endtask

@task('git:setup')
cd {{ $base }}
cd {{ $base.'/repo' }}
git clone {{ $git['url'] }} .
git pull origin {{ $git['branch'] }}
@endtask

@task('git:update')
cd {{ $base.'/repo' }}
git checkout {{ $git['branch'] }}
git pull origin {{ $git['branch'] }}
@endtask

@task('make:shared')
cd {{ $base }}
mkdir shared repo releases shared/node_modules shared/vendor
@endtask

@task('make:release')
cd {{ $base.'/releases' }}
mkdir {{ $current }}
cp -r {{ $base.'/repo/*' }} {{ $base.'/releases/'.$current.'/' }}
@endtask

@task('make:link')
cd {{ $base.'/releases/'.$current }}
@foreach($shared as $sh)
  rm -rf {{ $sh }}
  ln -s {{ $base.'/shared/'.$sh }} {{ $sh }}
@endforeach
@endtask

@task('set:live')
  cd {{ $base }}
  rm -f current
  ln -s {{ $base.'/releases/'.$current }} current
@endtask

@task('set:fin')
  cd {{ $base.'/current' }}
  chmod 777 -R storage/
  php artisan storage:link
@endtask

@task('set:up')
  cd {{ $base.'/current' }}
  php artisan up
@endtask

@task('set:down')
  cd {{ $base.'/current' }}
  php artisan down
@endtask