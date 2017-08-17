<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst($str, $enc = 'utf-8')
    {
        return mb_strtoupper(mb_substr($str, 0, 1, $enc), $enc) . mb_substr($str, 1, mb_strlen($str, $enc), $enc);
    }
}

Yii::setPathOfAlias('google_libs', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../google-api-php-client');
Yii::setPathOfAlias('booster', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/yiibooster');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'РентПроф',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.widgets.*',
        'application.helpers.*',
        'application.extensions.eoauth.*',
        'application.extensions.eoauth.lib.*',
        'application.extensions.lightopenid.*',
        'application.components.gd-text.*',
		'application.components.WideImage.*',
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => array(
                'booster.gii',
            ),
            'password' => 'superadmin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '77.232.154.198', '10.249.214.100', '10.249.0.213', '::1'),
        ),
        'admin' => array(
            'components' => array(
                'booster' => array(
                    'class' => 'application.extensions.yiibooster.components.Booster',
                ),
                'preload' => array('booster'),
                'urlManager' => array(
                    'class' => 'system.web.CUrlManager',
                )
            )
        ),

    ),

    // application components
    'components' => array(
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            'driver' => 'GD',
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'booster' => array(
            'class' => 'application.extensions.yiibooster.components.Booster',
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'loginUrl' => array('admin/default/login')
        ),

        'session' => array(
        	'autoStart'=>true,
        ),

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '' => 'site/index',

                'about' => 'site/about',
                'contacts' => 'site/contacts',
                'delivery' => 'site/delivery',
                'pay' => 'site/pay',
                'faq' => 'site/faq',
                'articles' => 'site/articles',
                'items' => 'site/items',
                'reviews' => 'site/reviews',
                'category/<id:\d+>' => 'site/category',
                'catalog/<id:\d+>' => 'site/catalog',

                'admin' => 'admin',

                'admin/<controller:\w+>/<id:\d+>' => 'admin/<controller>/view',
                'admin/<controller:\w+>/<action:\w+>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin/<controller:\w+>/<action:\w+>' => 'admin/<controller>/<action>',

                '<alias1:([a-zA-Z0-9\-\_]+)>' => 'site/catalog',
                '<alias1:([a-zA-Z0-9\-\_]+)>/<alias2:([a-zA-Z0-9\-\_]+)>' => 'site/catalog',
                '<alias1:([a-zA-Z0-9\-\_]+)>/<alias2:([a-zA-Z0-9\-\_]+)>/<alias3:([a-zA-Z0-9\-\_]+)>' => 'site/catalog',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'eauth' => array(
            'class' => 'ext.eauth.EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache'.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'services' => array( // You can change the providers and their classes.
                'facebook' => array(
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'CustomFacebookService',
                    'client_id' => '1884564165127300',
                    'client_secret' => '8423781956f09228c3b09f9517e3246a',
                    'title' => 'fb',
                    'scope' => 'email,public_profile',
                ),
                'vkontakte' => array(
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'CustomVKontakteService',
                    'client_id' => '6123718',
                    'client_secret' => 'FGOjoignNFMiKYTMxLW7',
                    'title' => 'vk',
                    'scope' => '',
                ),
                'instagram' => array(
                    'class' => 'CustomInstagramService',
                    'client_id' => '5310d96a3e0246c08a8d49a8b6ea0ba0',
                    'client_secret' => 'c3dd03c52133438fb1ea683d5ba7e13f',
                    'title' => 'ig',
                    'scope' => 'basic',
                ),
                'odnoklassniki' => array(
                    // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                    // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                    'class' => 'CustomOdnoklassnikiService',
                    'client_id' => '1252230656',
                    'client_public' => 'CBAHIEKLEBABABABA',
                    'client_secret' => 'DB913582B5B38F6E956A7E81',
                    'title' => 'od',
                ),
            ),
        ),

        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, info',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),

        'clientScript' => array(
            'packages' => array(
                'fancybox' => array(
                    'baseUrl' => '/js/fancyapps-fancyBox-18d1712',
                    'js' => array(
                        'source/jquery.fancybox.pack.js',
                        'lib/jquery.mousewheel-3.0.6.pack.js',
                        'source/helpers/jquery.fancybox-buttons.js',
                        'source/helpers/jquery.fancybox-media.js',
                        'source/helpers/jquery.fancybox-thumbs.js',
                    ),
                    'css' => array(
                        'source/jquery.fancybox.css',
                        'source/helpers/jquery.fancybox-buttons.css',
                        'source/helpers/jquery.fancybox-thumbs.css',
                    ),
                    'depends' => array('jquery')
                ),
            ),
        ),
    ),

    'sourceLanguage' => 'ru',
    'language' => 'ru',

    'params' => array(
        'adminEmail' => 'shipilov@e-produce.ru',
        'salt' => 'dhf9dsa79A9a0&*'
    ),
);
