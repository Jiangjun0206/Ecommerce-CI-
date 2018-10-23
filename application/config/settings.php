<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Settings Table Name
| -------------------------------------------------------------------
| 
| The name of the table used to store the settings in.
|
*/

$config['settings']['table'] = 'settings';


/*
| -------------------------------------------------------------------
|  Settings Key Field
| -------------------------------------------------------------------
| 
| The name of the field used to store the setting's name.
|
*/

$config['settings']['key_field'] = 'key';


/*
| -------------------------------------------------------------------
|  Settings Value Field
| -------------------------------------------------------------------
| 
| The name of the field used to store the setting's value.
|
*/

$config['settings']['value_field'] = 'value';


/*
| -------------------------------------------------------------------
|  Setting Caching
| -------------------------------------------------------------------
| 
| Set whether or not the retrived settings should be cached.
|
*/

$config['settings']['cache'] = FALSE;


/*
| -------------------------------------------------------------------
|  Cache Name
| -------------------------------------------------------------------
| 
| The desired name of the cache, if caching is enabled.
|
*/

$config['settings']['cache_name'] = 'settings';


/*
| -------------------------------------------------------------------
|  Cache TTL
| -------------------------------------------------------------------
| 
| The caches time to live in seconds.
|
*/

$config['settings']['cache_ttl'] = 300;


/*
| -------------------------------------------------------------------
|  Cache Configuration
| -------------------------------------------------------------------
| 
| The config array passed into the Cache Driver when initializing it.
|
*/

$config['settings']['cache_config'] = array('adapter' => 'file');


/*
| -------------------------------------------------------------------
|  Value Serialization
| -------------------------------------------------------------------
| 
| Set whether or not to serialize each setting's value, without this enabled
| only scalar/null types can be stored.
|
*/

$config['settings']['serialize'] = FALSE;


/* End of file Settings.php */
/* Location: ./sparks/settings/1.0.0/config/Settings.php */