<?php return array (
  'backpack/basset' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Basset\\BassetServiceProvider',
    ),
    'aliases' => 
    array (
      'Basset' => 'Backpack\\Basset\\Facades\\Basset',
    ),
  ),
  'backpack/crud' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\CRUD\\BackpackServiceProvider',
    ),
    'aliases' => 
    array (
      'CRUD' => 'Backpack\\CRUD\\app\\Library\\CrudPanel\\CrudPanelFacade',
      'Widget' => 'Backpack\\CRUD\\app\\Library\\Widget',
    ),
  ),
  'backpack/generators' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\Generators\\GeneratorsServiceProvider',
    ),
  ),
  'backpack/theme-tabler' => 
  array (
    'providers' => 
    array (
      0 => 'Backpack\\ThemeTabler\\AddonServiceProvider',
    ),
  ),
  'creativeorange/gravatar' => 
  array (
    'providers' => 
    array (
      0 => 'Creativeorange\\Gravatar\\GravatarServiceProvider',
    ),
    'aliases' => 
    array (
      'Gravatar' => 'Creativeorange\\Gravatar\\Facades\\Gravatar',
    ),
  ),
  'laravel/sail' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sail\\SailServiceProvider',
    ),
  ),
  'laravel/sanctum' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Sanctum\\SanctumServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'pestphp/pest-plugin-laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Pest\\Laravel\\PestServiceProvider',
    ),
  ),
  'prologue/alerts' => 
  array (
    'providers' => 
    array (
      0 => 'Prologue\\Alerts\\AlertsServiceProvider',
    ),
    'aliases' => 
    array (
      'Alert' => 'Prologue\\Alerts\\Facades\\Alert',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
);