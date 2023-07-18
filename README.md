# Onesignal Push Notification Laravel Lib.
## It allows you to send notifications via laravel using Onesignal push notification service.

## Installation

Install the dependencies and devDependencies.

"```sh
composer require hatasever/onesignal
```

Add these 3 parameters to the .env file

```sh
ONESIGNAL_APP_ID= Onesignal App id
ONESIGNAL_REST_API_KEY= Onesignal Api Key
USER_AUTH_KEY= OneSignal Auth Key
```



Add it to the service provider array in the config/app.php file

```sh
 'providers' => [
   .
   .
   
   * Package Service Providers...
     Hatasever\OneSignal\OneSignalServiceProvider::class,

     ],
     
 'aliases' => [
    .
    .
    .
    'OneSignal' =>     Hatasever\OneSignal\OneSignalServiceProvider::class,
 ]

```


## Send Notifications



```sh

    use OneSignal;

      $params = [];
                              $params['include_external_user_ids'] = [$userId];
                              /* Mobile app icon */
                              $params['small_icon'] = 'mdpi'; 
                              $params['large_icon'] = 'xxxhdpi';
                              $contents = [
                              "en" =>'Hello World!',
                              "tr" => 'Merhaba Dünya!',
                              ];
                              $params['contents'] = $contents;


                              OneSignal::sendNotificationCustom($params);
```

