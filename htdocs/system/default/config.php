<? 


// после изменения некоторых параметров может потребоваться сбросить кеш,
// для этого зайтите на адрес-сайта/?go=@sync


// ИНТЕРФЕЙС
  
// использовать нелогичный, но более привычный порядок ссылок влево-вправо
  $_config['invert_prevnext_order'] = false; /* bool */
  
// разделитель между годами в копирайтах (если там больше 1 года)
  $_config['years_range_separator'] = '&mdash;'; /* хтмл */

// размер картиночки в файл-менеджере (по умолчанию — 48 пикселей)
  $_config['list_thumbnail_size'] = 48; /* пиксели */

// период, за который считаются самые комментируемые
  $_config['hot_period'] = 'month'; /* day, week, month, year, ever */



// ШАБЛОНЫ

// показывать данные для шаблонов вместо того, чтобы использовать сами шаблоны
  $_config['raw_template_data'] = false; /* bool */
  
// игнорировать (считать пустотой) не найденные файлы шаблона
  $_config['ignore_missing_template_files'] = true; /* bool */



// ТЕКСТ

// типографить ли тексты автоматически
  $_config['autotypography'] = true; /* bool */

// какой форматтер использовать по умолчанию (не меняйте это)
  $_config['default_formatter'] = 'calliope'; /* 'raw', 'calliope' */



// УРЛЫ И РЕДИРЕКТЫ

// форсировать канонические урлы
  $_config['force_canonical_urls'] = true; /* bool */
  
// предпочитаемое доменное имя, будет редиректить, если включён force_canonical_urls
  $_config['preferred_domain_name'] = null; /* null или string */
  
// генерировать ли человекопонятные (синтетические) урлы или использовать обычные ?параметры запроса
  $_config['url_composition'] = 'auto'; /* 'auto', 'real', 'synthetic' */
  


// РАЗНОЕ

// от имени какого адреса слать почту (если заканчивается на @, домен добавится)
  $_config['mail_from'] = 'blog@';
  
// ставить ли index, follow везде (иначе ставится только там, где нужно)
  $_config['index_follow_everything'] = false; /* bool */
  
// какие выставлять права для закачанных файлов
  $_config['uploaded_files_mode'] = 0777;

// через какой скрипт пропускать клики по внешним ссылкам
  $_config['link_redirect'] = '';

// хуис-сервис
  $_config['whois_service'] = 'https://www.nic.ru/whois/?ip='; /* урл */



// ОБНОВЛЕНИЕ
  
// следить ли за обновлениями?
  $_config['update_check'] = true; /* bool */
  
// интервал проверки на наличие обновлений
  $_config['update_check_interval'] = 120*60; /* секунды */
  
// сервер обновлений
  $_config['update_server'] = 'http://blogengine.ru/update/';



// КОНСТАНТЫ

// максимальная длина комментария
  $_config['max_comment_length'] = 131072; /* байты */

// время, в течение которого комментарий считается свежим
  $_config['comment_freshness_days'] = 14; /* дни */

// кол-во элементов в РСС-лентах
  $_config['rss_items'] = 10; /* шт. */



// ОТЛАДКА

// писать ли лог
  $_config['write_log'] = false;

// количество ошибок, после которого e2 останавливается
  $_config['max_errors'] = 256;

// показывать ли стек вызова функций при выводе сообщений (для отладки)?
  $_config['show_call_stack'] = 0; /* 0 — нет; 1 — администратору; 2 — всем */

// хранить ли список стеков для каждого сообщения в файле backtrace.psa?
  $_config['store_backtrace'] = false; /* bool */
  
// тормозить ли аджакс специально для удобства отладки
  $_config['debug_slow_ajax'] = false; /* bool */
  
// логировать ли запросы
  $_config['request_logging'] = false; /* bool */

  

?>