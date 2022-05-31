<?php return array (
  'app' => 
  array (
    'name' => 'Laravel',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'asset_url' => NULL,
    'timezone' => 'Asia/Karachi',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => 'base64:Wo4xM2sfM7pwmcKQ2vAvyhRuKf7hWclZjbYNENo1hWM=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Spatie\\Permission\\PermissionServiceProvider',
      23 => 'Lifetimesms\\Gateway\\LifetimesmsServiceProvider',
      24 => 'ctf0\\MediaManager\\MediaManagerServiceProvider',
      25 => 'App\\Providers\\AppServiceProvider',
      26 => 'App\\Providers\\AuthServiceProvider',
      27 => 'App\\Providers\\EventServiceProvider',
      28 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Lifetimesms' => 'Lifetimesms\\Gateway\\Facades\\LifetimesmsFacade',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
      ),
    ),
    'prefix' => 'laravel_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'ace_crm',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ace_crm',
        'username' => 'root',
        'password' => 'root',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ace_crm',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'ace_crm',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'options' => 
      array (
        'cluster' => 'predis',
      ),
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
    ),
  ),
  'enso' => 
  array (
    'datatable' => 
    array (
      'validations' => 'local',
      'labels' => 
      array (
        'crtNo' => '#',
        'actions' => 'Actions',
      ),
      'lengthMenu' => 
      array (
        0 => 10,
        1 => 15,
        2 => 30,
        3 => 50,
      ),
      'buttons' => 
      array (
        'global' => 
        array (
          'create' => 
          array (
            'icon' => 'plus',
            'class' => NULL,
            'routeSuffix' => 'create',
            'event' => 'create',
            'action' => 'router',
            'label' => 'Create',
          ),
          'excel' => 
          array (
            'icon' => 'file-excel',
            'class' => NULL,
            'routeSuffix' => 'exportExcel',
            'event' => 'export-excel',
            'action' => 'export',
            'label' => 'Excel',
          ),
          'action' => 
          array (
            'icon' => 'check',
            'class' => NULL,
            'routeSuffix' => 'action',
            'event' => 'custom-action',
            'postEvent' => 'custom-action-done',
            'action' => 'ajax',
            'method' => 'PATCH',
            'label' => 'Action',
            'message' => 'Custom Action. Are you sure?',
            'confirmation' => true,
          ),
        ),
        'row' => 
        array (
          'show' => 
          array (
            'icon' => 'eye',
            'class' => 'is-row-button',
            'routeSuffix' => 'show',
            'event' => 'show',
            'action' => 'router',
          ),
          'edit' => 
          array (
            'icon' => 'pencil-alt',
            'class' => 'is-row-button',
            'routeSuffix' => 'edit',
            'event' => 'edit',
            'action' => 'router',
          ),
          'destroy' => 
          array (
            'icon' => 'trash-alt',
            'class' => 'is-row-button',
            'routeSuffix' => 'destroy',
            'event' => 'destroy',
            'action' => 'ajax',
            'method' => 'DELETE',
            'message' => 'The selected record is about to be deleted. Are you sure?',
            'confirmation' => true,
            'postEvent' => 'destroyed',
          ),
          'download' => 
          array (
            'icon' => 'cloud-download-alt',
            'class' => 'is-row-button',
            'routeSuffix' => 'download',
            'event' => 'download',
            'action' => 'href',
          ),
        ),
      ),
      'style' => 
      array (
        'default' => 
        array (
          0 => 'hover',
          1 => 'center',
        ),
        'mapping' => 
        array (
          'left' => 'has-text-left',
          'center' => 'has-text-centered',
          'right' => 'has-text-right',
          'compact' => 'is-narrow',
          'striped' => 'is-striped',
          'bordered' => 'is-bordered',
          'hover' => 'is-hoverable',
        ),
        'highlight' => 'has-background-info',
      ),
      'controls' => 
      array (
        0 => 'length',
        1 => 'columns',
        2 => 'style',
        3 => 'reload',
        4 => 'reset',
      ),
      'export' => 
      array (
        'path' => 'exports',
        'timeout' => 3600,
        'notifications' => 
        array (
          0 => 'database',
          1 => 'broadcast',
        ),
      ),
      'queues' => 
      array (
        'exports' => 'heavy',
        'notifications' => 'notifications',
      ),
      'dateFormat' => 'd-M-Y',
      'fullInfoRecordLimit' => 1000000,
      'debounce' => 350,
      'responsive' => true,
      'method' => 'GET',
      'dataRouteSuffix' => 'tableData',
      'comparisonOperator' => 'LIKE',
    ),
    'forms' => 
    array (
      'validations' => 'local',
      'buttons' => 
      array (
        'create' => 
        array (
          'icon' => 'plus',
          'class' => 'is-info',
          'event' => 'create',
          'action' => 'router',
          'label' => 'Create',
        ),
        'show' => 
        array (
          'icon' => 'eye',
          'class' => 'is-success',
          'event' => 'show',
          'action' => 'router',
          'label' => 'Show',
        ),
        'back' => 
        array (
          'icon' => 'arrow-left',
          'class' => 'is-primary',
          'event' => 'back',
          'action' => 'router',
          'label' => 'Back',
        ),
        'store' => 
        array (
          'icon' => 'check',
          'class' => 'is-success',
          'event' => 'store',
          'action' => 'router',
          'label' => 'Save',
        ),
        'update' => 
        array (
          'icon' => 'check',
          'class' => 'is-success',
          'event' => 'update',
          'action' => 'router',
          'label' => 'Update',
        ),
        'destroy' => 
        array (
          'icon' => 'trash-alt',
          'class' => 'is-danger',
          'event' => 'destroy',
          'action' => 'ajax',
          'method' => 'DELETE',
          'message' => 'The selected record is about to be deleted. Are you sure?',
          'confirmation' => true,
          'label' => 'Delete',
        ),
      ),
      'dateFormat' => 'd-m-Y',
      'selectPlaceholder' => 'Choose',
      'authorize' => true,
      'dividerTitlePlacement' => 'center',
      'labels' => 'true',
    ),
    'tables' => 
    array (
      'apiVersion' => '3.1',
      'validations' => 'local',
      'dtRowId' => 'dtRowId',
      'labels' => 
      array (
        'crtNo' => '#',
        'actions' => 'Actions',
      ),
      'lengthMenu' => 
      array (
        0 => 15,
        1 => 25,
        2 => 50,
        3 => 100,
      ),
      'buttons' => 
      array (
        'global' => 
        array (
          'create' => 
          array (
            'icon' => 'plus',
            'class' => NULL,
            'routeSuffix' => 'create',
            'event' => 'create',
            'action' => 'router',
            'label' => 'Create',
          ),
          'excel' => 
          array (
            'icon' => 'file-excel',
            'class' => NULL,
            'routeSuffix' => 'exportExcel',
            'event' => 'export-excel',
            'action' => 'export',
            'label' => 'Excel',
          ),
          'action' => 
          array (
            'icon' => 'check',
            'class' => NULL,
            'routeSuffix' => 'action',
            'event' => 'custom-action',
            'postEvent' => 'custom-action-done',
            'action' => 'ajax',
            'method' => 'PATCH',
            'label' => 'Action',
            'message' => 'Custom Action. Are you sure?',
            'confirmation' => true,
          ),
        ),
        'row' => 
        array (
          'show' => 
          array (
            'icon' => 'eye',
            'class' => 'is-row-button',
            'routeSuffix' => 'show',
            'event' => 'show',
            'action' => 'router',
          ),
          'edit' => 
          array (
            'icon' => 'pencil-alt',
            'class' => 'is-row-button',
            'routeSuffix' => 'edit',
            'event' => 'edit',
            'action' => 'router',
          ),
          'destroy' => 
          array (
            'icon' => 'trash-alt',
            'class' => 'is-row-button',
            'routeSuffix' => 'destroy',
            'event' => 'destroy',
            'action' => 'ajax',
            'method' => 'DELETE',
            'message' => 'The selected record is about to be deleted. Are you sure?',
            'confirmation' => true,
            'postEvent' => 'destroyed',
          ),
          'download' => 
          array (
            'icon' => 'cloud-download-alt',
            'class' => 'is-row-button',
            'routeSuffix' => 'download',
            'event' => 'download',
            'action' => 'href',
          ),
        ),
      ),
      'style' => 
      array (
        'default' => 
        array (
          0 => 'hover',
          1 => 'center',
          2 => 'compact',
          3 => 'striped',
        ),
        'mapping' => 
        array (
          'left' => 'has-text-left',
          'center' => 'has-text-centered',
          'right' => 'has-text-right',
          'compact' => 'is-narrow',
          'striped' => 'is-striped',
          'bordered' => 'is-bordered',
          'hover' => 'is-hoverable',
        ),
        'highlight' => 'has-background-info',
      ),
      'controls' => 
      array (
        0 => 'length',
        1 => 'columns',
        2 => 'style',
        3 => 'reload',
        4 => 'reset',
      ),
      'export' => 
      array (
        'path' => 'exports',
        'timeout' => 3600,
        'notifications' => 
        array (
          0 => 'broadcast',
          1 => 'database',
        ),
      ),
      'queues' => 
      array (
        'exports' => 'heavy',
        'notifications' => 'notifications',
      ),
      'dateFormat' => 'd-M-Y',
      'fullInfoRecordLimit' => 1000000,
      'debounce' => 350,
      'responsive' => true,
      'method' => 'GET',
      'dataRouteSuffix' => 'tableData',
      'comparisonOperator' => 'LIKE',
      'searchModes' => 
      array (
        0 => 'full',
        1 => 'startsWith',
        2 => 'endsWith',
      ),
      'searchMode' => 'startsWith',
    ),
    'select' => 
    array (
      'trackBy' => 'id',
      'queryAttributes' => 
      array (
        0 => 'name',
      ),
      'comparisonOperator' => 'LIKE',
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'lifetimesms' => 
  array (
    'api_token' => NULL,
    'api_secret' => NULL,
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'daily',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'encryption' => NULL,
    'username' => NULL,
    'password' => NULL,
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\resources\\views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'mediaManager' => 
  array (
    'ignore_files' => '/^\\..*/',
    'storage_disk' => 'public',
    'controller' => '\\ctf0\\MediaManager\\Controllers\\MediaController',
    'allowed_fileNames_chars' => '\\._\\-\'\\s\\(\\),',
    'allowed_folderNames_chars' => '_-\\s',
    'unallowed_mimes' => 
    array (
      0 => 'php',
      1 => 'java',
    ),
    'extended_mimes' => 
    array (
      'image' => 
      array (
        0 => 'binary/octet-stream',
      ),
      'archive' => 
      array (
        0 => 'application/x-tar',
        1 => 'application/zip',
      ),
    ),
    'sanitized_text' => 'uniqid',
    'last_modified_format' => 'toDateString',
    'hide_files_ext' => true,
    'get_folder_info' => true,
    'enable_broadcasting' => false,
    'show_ratio_bar' => true,
    'preview_files_before_upload' => true,
    'database_connection' => 'mysql',
    'table_locked' => 'locked',
    'pagination_amount' => 50,
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'heavy,default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
      'webhook' => 
      array (
        'secret' => NULL,
        'tolerance' => 300,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\resources\\views',
    ),
    'compiled' => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel\\storage\\framework\\views',
  ),
  'debug-server' => 
  array (
    'host' => 'tcp://127.0.0.1:9912',
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
  'ide-helper' => 
  array (
    'filename' => '_ide_helper.php',
    'meta_filename' => '.phpstorm.meta.php',
    'include_fluent' => false,
    'include_factory_builders' => false,
    'write_model_magic_where' => true,
    'write_model_external_builder_methods' => true,
    'write_model_relation_count_properties' => true,
    'write_eloquent_model_mixins' => false,
    'include_helpers' => false,
    'helper_files' => 
    array (
      0 => 'E:\\Aakif Work\\Websites\\Managment\\LMS Laravel/vendor/laravel/framework/src/Illuminate/Support/helpers.php',
    ),
    'model_locations' => 
    array (
      0 => 'app',
    ),
    'ignored_models' => 
    array (
    ),
    'extra' => 
    array (
      'Eloquent' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'Illuminate\\Database\\Query\\Builder',
      ),
      'Session' => 
      array (
        0 => 'Illuminate\\Session\\Store',
      ),
    ),
    'magic' => 
    array (
    ),
    'interfaces' => 
    array (
    ),
    'custom_db_types' => 
    array (
    ),
    'model_camel_case_properties' => false,
    'type_overrides' => 
    array (
      'integer' => 'int',
      'boolean' => 'bool',
    ),
    'include_class_docblocks' => false,
    'force_fqn' => false,
    'additional_relation_types' => 
    array (
    ),
  ),
);
