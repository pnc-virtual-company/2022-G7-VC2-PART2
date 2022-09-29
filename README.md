# RUN PROJECT ON DEVELOMENT

## BACK

- On php MyAdmin, create a new database : example_db

- Go to /back
- Copy the .env.example to .env

- on .env file, update the database name :
  DB_DATABASE=example_db

- Launch composer install
- Launch npm install
- Launch php artisan migrate

- Launch php artisan key:generate
- Launch php artisan storage:link ( to allow the image folder to be public)

- Launch php artisan serve

## FRONT

- Go to /front
- Launch npm install
- Run npm run serve to launch on developpment mode

# RUN PROJECT ON PRODUCTION

## First time :

    - Clone project

    - On php MyAdmin, create a  new database : example_db

    - Go to /back
    - Copy the .env.example to .env
    - on  .env file, update the database name :
    	DB_DATABASE=example_db
      and remove all command and then past the below command :
      APP_NAME=Laravel
      APP_ENV=local
      APP_KEY=base64:L0/JJAhn5APPJCIvzU8nnyr6xV18VmjIRCuEXrcBIO8=
      APP_DEBUG=true
      APP_URL=http://localhost

      LOG_CHANNEL=stack
      LOG_DEPRECATIONS_CHANNEL=null
      LOG_LEVEL=debug

      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=pnc_alumni
      DB_USERNAME=root
      DB_PASSWORD=

      OADCAST_DRIVER=log
      CHE_DRIVER=file
      LESYSTEM_DISK=local
      EUE_CONNECTION=sync
      SSION_DRIVER=file
      SSION_LIFETIME=120

      MEMCACHED_HOST=127.0.0.1
      
      REDIS_HOST=127.0.0.1
      REDIS_PASSWORD=null
      REDIS_PORT=6379

      # // Setup Mail 
      MAIL_DRIVER=smtp
      MAIL_HOST=smtp.googlemail.com
      MAIL_PORT=465
      MAIL_USERNAME=facebook2pointzero@gmail.com
      MAIL_PASSWORD=mtdtzvsmwvdzjkaw
      MAIL_ENCRYPTION=ssl
      MAIL_FROM_ADDRESS=pnc.alumni.cambodia@passerellesnumeriques.org
      MAIL_FROM_NAME=pnc_alumni

      AWS_ACCESS_KEY_ID=
      AWS_SECRET_ACCESS_KEY=
      AWS_DEFAULT_REGION=us-east-1
      AWS_BUCKET=
      AWS_USE_PATH_STYLE_ENDPOINT=false

      PUSHER_APP_ID=
      PUSHER_APP_KEY=
      PUSHER_APP_SECRET=
      PUSHER_APP_CLUSTER=mt1

      MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
      MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

     Launch  composer install
     Launch  npm install
     Launch php artisan migrate
     Launch  php artisan key:generate
     Go to /front
     Launch  npm install

## Other times :

    - git pull

    - Go to /front
    - Run npm run build