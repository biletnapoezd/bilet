<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'findclic_massbas');

/** Имя пользователя MySQL */
define('DB_USER', 'findclic_admin');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'altkEN12scl');

define('WP_HOME', 'http://bilet-na-poezd.com/');
define('WP_SITEURL', 'http://bilet-na-poezd.com/');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');


/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Ubz]|a^|!q)k5>a~F)1pRX;I%[jLOSWI^|3C$pzbeU(F=?7pGjsb$M`S5Ylg|`+0');
define('SECURE_AUTH_KEY',  '7b3+cFdYM2U1Dt77Q|UL!IzYd[SX.^f;*-K?lpH;$sb!soJ|)P@Z(|%a-V=As-P]');
define('LOGGED_IN_KEY',    '%TV%3Yc2_S-6hz!s!RDA]9i,xOHMM&={YP_=$yU#l{S@k$C?; NQnSIz>/rX)w_ ');
define('NONCE_KEY',        '<iM)S+%91gv2)B0vyF+Ba&8`QCt?rY=v$jHt]:oO]~S[mHChbm~l3S6b3HrY.-E9');
define('AUTH_SALT',        'xVzk7)Lp|U8c=b/h-{gf@2dL*@Rbt4KHT{8{|=aF]OpXA[cQ[aeVWY?L?^gnaM$[');
define('SECURE_AUTH_SALT', '98[9lOx% 1v+Yb&pYsCz{r&2;I_hZbN-;|!Eph#^MbMzd@OAHANsMkpm-yS4*W]w');
define('LOGGED_IN_SALT',   '/>v(K6D-FcfzQjN(~Z`&Uc7.{tYsU=Lzq#[9+G!o78Ta;U)~St^mr*(f3.:<7dR/');
define('NONCE_SALT',       'GhfT}CF0|v;*AjC eq5vlfbX6L#=DF2ps<2Xe?@H9XSI+Lk|;s{OQA/]$-:*&`j)');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
