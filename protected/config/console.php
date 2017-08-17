<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

if(!function_exists('mb_ucfirst')) {
    function mb_ucfirst($str, $enc = 'utf-8') {
        return mb_strtoupper(mb_substr($str, 0, 1, $enc), $enc).mb_substr($str, 1, mb_strlen($str, $enc), $enc);
    }
}

Yii::setPathOfAlias('google_libs', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../google-api-php-client');
Yii::setPathOfAlias('booster', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/yiibooster');

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Заморозь Лето!',

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
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'generatorPaths' => array(
                'booster.gii',
            ),
            'password' => 'superadmin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('77.232.149.249', '77.232.154.198', '::1'),
        ),
        'admin' => array(),
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

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '' => 'site/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        // database settings are configured in database.php
        'db' => require(dirname(__FILE__) . '/database.php'),
//        'db' => require(dirname(__FILE__) . '/database-client-test.php'),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
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
                    'client_id' => '480594145423860',
                    'client_secret' => 'e10b09139f73e707072f4beba85a2200',
                    'title' => 'fb',
                    'scope' => 'user_friends,user_birthday',
                ),
                'vkontakte' => array(
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'CustomVKontakteService',
                    'client_id' => '4977575',
                    'client_secret' => 'U8245zhrrzjLipcFV4SP',
                    'title' => 'vk',
                    'scope' => 'friends',
                ),
                'odnoklassniki' => array(
                    // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                    // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                    'class' => 'CustomOdnoklassnikiService',
                    'client_id' => '1144101120',
                    'client_public' => 'CBAKJCDFEBABABABA',
                    'client_secret' => 'A036596A78B74A60C6BBBE2C',
                    'title' => 'od',
                ),
            ),
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
);
