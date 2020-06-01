<?php


return [


    /* === BACK END === */
    /**
     * The url prefix of Omen file manager
     ** default is 'filemanager'
     *! The url prefix must not match any file in public folder
     */
    'urlPrefix' => 'omenfilemanager',


    /**
     * The disk to use for uploads storage
     * 
     * must be set in config/filesystem.php
     ** default is config('filesystems.public')
     *
     ** 'public' => [
     **     'driver' => 'local',
     **     'root' => storage_path('app/public'),
     **     'url' => env('APP_URL').'/storage',
     **     'visibility' => 'public',
     ** ]
     *
     */
    'publicDisk' => config('filesystems.public'),

    /**
     * The path where to store uploaded files
     * on the public disk
     *
     ** default is 'omen/uploads'
     */
    'publicPath' => 'omen/uploads',


    /**
     * The disk to use for Thumbs storage
     * 
     * It is recommended to be the local one since
     * thumbnails are generated by Omen, it should
     * be stored on the same instance
     * Thumbnails are served by Omen only
     * 
     * Everything in private disk is served by Omen
     * and cannot be accessed directly
     * 
     ** default is config('filesystems.default')
     *
     ** 'local' => [
     **      'driver' => 'local',
     **      'root' => storage_path('app'),
     **  ]
     */
    'privateDisk' => config('filesystems.default'),

    /**
     * The path where to store Omen Working Files
     * on the private disk
     * 
     *! Do not point private folder under the public Path
     *! on the same disk, you may expose unwanted files to the internet
     * 
     ** default is 'omen/private'
     */
    'privatePath' => 'omen/private',

    /**
     * When a file is created or uploaded
     * this is used to set its visibility
     * a private file won't be accessible to the internet
     * only to people who have access to Omen
     * 
     ** default is 'private'
     * accepted values are 'private' and 'public'
     */
    'defaultVisibility' => 'private',

    /**
     * Allowed Upload Extensions
     * This will be checked against mimeType
     * 
     * these are ordered for your convenience
     * just add your extension in 'autorizedUploadExtensions' array, anywhere to allow it
     */
    'autorizedUploadExtensions' => [
        'ext_img'       => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'ico'],
        'ext_file'      => ['doc', 'docx', 'rtf', 'pdf', 'xls', 'xlsx', 'txt', 'csv', 'html', 'xhtml', 'psd', 'sql', 'log', 'fla', 'xml', 'ade', 'adp', 'mdb', 'accdb', 'ppt', 'pptx', 'odt', 'ots', 'ott', 'odb', 'odg', 'otp', 'otg', 'odf', 'ods', 'odp', 'css', 'ai', 'kmz', 'dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'tiff'],
        'ext_video'     => ['mov', 'mpeg', 'm4v', 'mp4', 'avi', 'mpg', 'wma', "flv", "webm"],
        'ext_audio'     => ['mp3', 'mpga', 'm4a', 'ac3', 'aiff', 'mid', 'ogg', 'wav'],
        'ext_archive'   => ['zip', 'rar', 'gz', 'tar', 'iso', 'dmg', '7z']
    ],

    /**
     * Disallowed Upload Extensions
     * This will be checked against mimeType
     * 
     * these are ordered for your convenience
     * just add your extension in 'deniedUploadExtensions' array, anywhere to block it
     * 
     * this can be set to false if you dont want to block any
     */
    'deniedUploadExtensions' => [
        'php', 'exe', 'msi'
    ],

    /* === FRONT END === */

    /**
     * Title displayed ( in <title></title>)
     ** default is 'Omen FileManager'
     */
    'title' => 'Omen FileManager',

    /**
     * The public path where are stored
     * omen asset files
     * 
     * Change this if you want to modify
     * published assets folder under /public
     ** default is 'vendor/omen'
     */
    'assetPath' => 'vendor/omen',

    /**
     * If set to true you will need to double click to open
     * Folder and files
     * 
     * this does not apply on files action
     */
    'doubleClickToOpen' => true,

    /* === Language === */

    /**
     * Change here to locale you want to display in
     * eg: set 'fr' to display in french
     ** default is config('app.local')
     */
    'locale' => config('app.locale', 'en'),

    /**
     * force locale
     * if you want to display only one locale
     * and don't allow to change it set if here
     * like 'forceLocale' => 'de'
     * 
     * * default is null
     */
    'forceLocale' => null,

    /**
     * Available locales
     * remove locales you don't want to be available
     * add here any custom local you may have added
     * 
     ** default is array('localA', 'localB', ...)
     */

    'locales' => [
        'en', 'fr'
    ],

    /* === JS PART === */

    /**
     * Show a scroll bar for the bread crumb
     * or ellipse the content with js
     ** default is true
     */
    'breadcrumbEllipsis' => true,

    /**
     * The document embed viewer
     * This relies on a third party webservice
     * to display documents (writer, calc, impress)
     * 
     * If this url is not valid display for these documents
     * will be disabled.
     * The required parameter is strictly ###URL### which
     * will be replaced with the document url
     * 
     * if you want to disable this feature just put false value
     * 
     * * default is 'whatEverUrl###URL###'
     */
    'documentEmbedViewer' => 'https://docs.google.com/gview?url=###URL###&embedded=true',

    /* === CORS Headers === */

    /**
     * ! Touch this only if you know what you are doing
     * 
     * Put in here the trusted domain you need
     * Actually this would be needed only for 'documentEmbedViewer'
     * 
     * unsafe-eval is needed for pdf.js and base64.js
     * 
     * This configuration is for CSP level 3 browsers
     * If you wish more compatibilities set scp rules in script-src
     * "'unsafe-inline'", "https:", "http:", "'strict-dynamic'"
     * 
     * check your urles at https://csp-evaluator.withgoogle.com/
     * 
     ** Note the the scheme (http, https) is mandatory, please use https as much as possible
     ** blob and data are needed on self to display FileReader data (in upload modal)
     *
     *! pdf.js policies are workaround for Firefox bug
     * https://bugzilla.mozilla.org/show_bug.cgi?id=1582115
     */
    'csp' => [
        'default-src' => ["'self'", "data:"],
        'script-src' => ["'unsafe-eval'", "resource://pdf.js/"],
        'frame-src' => ["'self'"],
        'object-src' =>  ["'self'", "blob:"],
        'base-uri' => ["'self'", "resource://pdf.js/web/"],
        'media-src' =>  ["'self'", "blob:"]
    ],

    /**
     * provide X-Frame-Options : sameorigin or deny
     * false => deny, true => sameorigin
     ** default is false
     */
    'useXFrameOptions' => false,


    /* === PROTECTED DONT THOUCH THIS === */
    /**
     *! WARNING: don't touch this
     * is needed to avoid you from
     * publishing config if you dont
     * need to
     * default is true
     */
    'omenIsLoaded' => true,


    // ===============================================================================================

    /**
     * The disk to use
     * must be set in config/filesystem.php
     * default is 'local'
     */
    'disk' => config('filesystems.default'),

    /**
     * The disk to use for Thumbs and RFM private files
     * must be set in config/filesystem.php
     * default is 'local'
     */
    'privateDisk' => config('filesystems.default'),

    /**
     * The path where to upload files
     * it is relative to the disk 'root'
     * set in config/filesystem.php
     */
    'storagePath' => 'responsiveFileManager/files/',

    /**
     * The path where will be stored thumbs
     * it is relative to the disk 'root'
     * set in config/filesystem.php
     * 
     * !! Don't set thumbs in your storage path or upload path !!
     */
    'thumbsPath' => 'responsiveFileManager/thumbs/',

    /**
     * The path where will be stored uploads
     *   If is false (or not a string) it's value is the same as 'filemanager_storage_path'
     *   Otherwise it can be set with a arbitratry path
     * it is relative to the disk 'root'
     * set in config/filesystem.php
     */
    'uploadPath' => false,

    /*
    |--------------------------------------------------------------------------
    | Optional security
    |--------------------------------------------------------------------------
    |
    | if set to true only those will access RF whose url contains the access key(akey) like:
    | <input type="button" href="../filemanager/dialog.php?field_id=imgField&lang=en_EN&akey=myPrivateKey"
        value="Files">
    | in tinymce a new parameter added: filemanager_access_key:"myPrivateKey"
    | example tinymce config:
    |
    | tiny init ...
    | external_filemanager_path:"../filemanager/",
    | filemanager_title:"Filemanager" ,
    | filemanager_access_key:"myPrivateKey" ,
    | ...
    |
    */
    'use_access_key' => true,

    /*
    |--------------------------------------------------------------------------
    | Access keys
    |--------------------------------------------------------------------------
    |
    | add access keys eg: array('myPrivateKey', 'someoneElseKey');
    | keys should only containt (a-z A-Z 0-9 \ . _ -) characters
    | if you are integrating lets say to a cms for admins, i recommend making keys randomized something like this:
    | $username = 'Admin';
    | $salt = 'dsflFWR9u2xQa' (a hard coded string)
    | $akey = md5($username.$salt);
    | DO NOT use 'key' as access key!
    | Keys are CASE SENSITIVE!
    |
    */

    'access_keys' => array(env('RFM_KEY')),


    // 'upload_max_filesize' => 

    /**
     * Allocate additionnal memory
     * for the file conversion
     * It increases php.ini "memory_limit"
     * Max execution time is set to 30 sec by php as default
     * You can change this here if wanted for
     * files operation
     */
    'file_operation_time_limit' => ini_get('max_execution_time') ?? 30,

    /**
     * Allocate additionnal memory
     * for the file conversion
     * It increases php.ini "memory_limit"
     */
    'file_operation_memory_alloc' => true,

    /**
     * Max allocation for thumbs creation
     * Thumbs won't be created the operation could exceed
     * this value in memory allocation
     * can contain XM or X where X is a number
     * eg: 64M or 64
     * 
     * How much memory do i need ?
     * https://www.dotsamazing.com/en/labs/phpmemorylimit
     */
    'file_operation_max_memory_alloc' => ini_get('memory_limit'),

    /**
     * Allowed gd or imagick
     * 
     * make sure php has ext-gd or ext-imagick
     * php can be compiled with gd
     */
    'file_operation_image_driver' => 'gd',


    // TO CHECK MB functions
    'mb_internal_encoding' => 'UTF-8',
    'mb_http_output' => 'UTF-8',
    'mb_http_input' => 'UTF-8',
    'mb_language' => 'uni',
    'mb_regex_encoding' => 'UTF-8',
    'ob_start' => 'mb_output_handler',
    'date_default_timezone_set' => config('app.timezone'),

    /**
     * Cookie TTL
     * to remeber usr last visited path
     */
    'rfm.remember_last_path' => \time() + (86400 * 7),

    /**
     * Inodes info TTL such as
     * Size, name, path, size in Bytes
     * 
     * default: 60 (minutes)
     */
    'rfm.cache_inodes_info' => 60,

    'editor.default' => 'tinymce',


    // END OK SETTINGS ==================================================




    /*
    |--------------------------------------------------------------------------
    | mime file control to define files extensions
    |--------------------------------------------------------------------------
    |
    | If you want to be forced to assign the extension starting from the mime type
    |
    */
    'mime_extension_rename' => true,


    /*
    |--------------------------------------------------------------------------
    | FTP configuration BETA VERSION
    |--------------------------------------------------------------------------
    |
    | If you want enable ftp use write these parametres otherwise leave empty
    | Remember to set base_url properly to point in the ftp server domain and
    | upload dir will be ftp_base_folder + upload_dir so without final /
    |
    */
    'ftp_host'         => false, //put the FTP host
    'ftp_user'         => "user",
    'ftp_pass'         => "pass",
    'ftp_base_folder'  => "base_folder",
    // Directory where place files before to send to FTP with final /
    'ftp_temp_folder'  => "../temp/",
    /*
    |---------------------------------------------------------------------------
    | path from ftp_base_folder to base of thumbs folder with start and final /
    |---------------------------------------------------------------------------
    */
    'ftp_thumbs_dir' => '/thumbs/',
    'ftp_ssl' => false,
    'ftp_port' => 21,

    /* EXAMPLE
    'ftp_host'         => "host.com",
    'ftp_user'         => "test@host.com",
    'ftp_pass'         => "pass.1",
    'ftp_base_folder'  => "",
    */

    /*
    |--------------------------------------------------------------------------
    | Multiple files selection
    |--------------------------------------------------------------------------
    | The user can delete multiple files, select all files , deselect all files
    */
    'multiple_selection' => true,

    /*
    |
    | The user can have a select button that pass a json to external input or pass the first file selected to editor
    | If you use responsivefilemanager tinymce extension can copy into editor multiple object like images, videos, audios, links in the same time
    |
     */
    'multiple_selection_action_button' => true,

    //--------------------------------------------------------------------------------------------------------
    // YOU CAN COPY AND CHANGE THESE VARIABLES INTO FOLDERS config.php FILES TO CUSTOMIZE EACH FOLDER OPTIONS
    //--------------------------------------------------------------------------------------------------------

    /*
    |--------------------------------------------------------------------------
    | Maximum size of all files in source folder
    |--------------------------------------------------------------------------
    |
    | in Megabytes
    |
    */
    'MaxSizeTotal' => false,

    /*
    |--------------------------------------------------------------------------
    | Maximum upload size
    |--------------------------------------------------------------------------
    |
    | in Megabytes
    |
    */
    'MaxSizeUpload' => 10,

    /*
    |--------------------------------------------------------------------------
    | File and Folder permission
    |--------------------------------------------------------------------------
    |
    */
    'filePermission' => 0755,
    'folderPermission' => 0777,


    /*
    |--------------------------------------------------------------------------
    | default language file name
    |--------------------------------------------------------------------------
    */
    'default_language' => false,

    /*
    |--------------------------------------------------------------------------
    | Icon theme
    |--------------------------------------------------------------------------
    |
    | Default available: ico and ico_dark
    | Can be set to custom icon inside filemanager/img
    |
    */
    'icon_theme' => "ico",


    //Show or not total size in filemanager (is possible to greatly increase the calculations)
    'show_total_size'                       => false,
    //Show or not show folder size in list view feature in filemanager (is possible, if there is a large folder, to greatly increase the calculations)
    'show_folder_size'                      => false,
    //Show or not show sorting feature in filemanager
    'show_sorting_bar'                      => true,
    //Show or not show filters button in filemanager
    'show_filter_buttons'                   => true,
    //Show or not language selection feature in filemanager
    'show_language_selection'               => true,
    //active or deactive the transliteration (mean convert all strange characters in A..Za..z0..9 characters)
    'transliteration'                       => false,
    //convert all spaces on files name and folders name with $replace_with variable
    'convert_spaces'                        => false,
    //convert all spaces on files name and folders name this value
    'replace_with'                          => "_",
    //convert to lowercase the files and folders name
    'lower_case'                            => false,

    //Add ?484899493349 (time value) to returned images to prevent cache
    'add_time_to_img'                       => false,


    //*******************************************
    //Images limit and resizing configuration
    //*******************************************

    // set maximum pixel width and/or maximum pixel height for all images
    // If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected
    // if you don't need a limit set both to 0
    'image_max_width'                         => 0,
    'image_max_height'                        => 0,
    'image_max_mode'                          => 'auto',
    /*
    #  $option:  0 / exact = defined size;
    #            1 / portrait = keep aspect set height;
    #            2 / landscape = keep aspect set width;
    #            3 / auto = auto;
    #            4 / crop= resize and crop;
    */

    //Automatic resizing //
    // If you set $image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension
    // If you set width or height to 0 the script automatically calculates the other dimension
    // Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit
    'image_resizing'                          => false,
    'image_resizing_width'                    => 0,
    'image_resizing_height'                   => 0,
    'image_resizing_mode'                     => 'auto', // same as $image_max_mode
    'image_resizing_override'                 => false,
    // If set to TRUE then you can specify bigger images than $image_max_width & height otherwise if image_resizing is
    // bigger than $image_max_width or height then it will be converted to those values


    //******************
    //
    // WATERMARK IMAGE
    //
    //Watermark path or false
    'image_watermark'                          => false, //"../watermark.png",
    # Could be a pre-determined position such as:
    #           tl = top left,
    #           t  = top (middle),
    #           tr = top right,
    #           l  = left,
    #           m  = middle,
    #           r  = right,
    #           bl = bottom left,
    #           b  = bottom (middle),
    #           br = bottom right
    #           Or, it could be a co-ordinate position such as: 50x100
    'image_watermark_position'                 => 'br',
    # padding: If using a pre-determined position you can
    #         adjust the padding from the edges by passing an amount
    #         in pixels. If using co-ordinates, this value is ignored.
    'image_watermark_padding'                 => 10,

    //******************
    // Default layout setting
    //
    // 0 => boxes
    // 1 => detailed list (1 column)
    // 2 => columns list (multiple columns depending on the width of the page)
    // YOU CAN ALSO PASS THIS PARAMETERS USING SESSION VAR => $_SESSION['RF']["VIEW"]=
    //
    //******************
    'default_view'                            => 0,

    //set if the filename is truncated when overflow first row
    'ellipsis_title_after_first_row'          => true,

    //*************************
    //Permissions configuration
    //******************
    'delete_files'                            => true,
    'create_folders'                          => true,
    'delete_folders'                          => true,
    'upload_files'                            => true,
    'rename_files'                            => true,
    'rename_folders'                          => true,
    'duplicate_files'                         => true,
    'extract_files'                           => true,
    'copy_cut_files'                          => true, // for copy/cut files
    'copy_cut_dirs'                           => true, // for copy/cut directories
    'chmod_files'                             => true, // change file permissions
    'chmod_dirs'                              => true, // change folder permissions
    'preview_text_files'                      => true, // eg.: txt, log etc.
    'edit_text_files'                         => true, // eg.: txt, log etc.
    'create_text_files'                       => true, // only create files with exts. defined in $config['editable_text_file_exts']
    'download_files'              => true, // allow download files or just preview

    // you can preview these type of files if $preview_text_files is true
    'previewable_text_file_exts'              => array("bsh", "c", "css", "cc", "cpp", "cs", "csh", "cyc", "cv", "htm", "html", "java", "js", "m", "mxml", "perl", "pl", "pm", "py", "rb", "sh", "xhtml", "xml", "xsl", 'txt', 'log', ''),

    // you can edit these type of files if $edit_text_files is true (only text based files)
    // you can create these type of files if $config['create_text_files'] is true (only text based files)
    // if you want you can add html,css etc.
    // but for security reasons it's NOT RECOMMENDED!
    'editable_text_file_exts'                 => array('txt', 'log', 'xml', 'html', 'css', 'htm', 'js', ''),

    'jplayer_exts'                            => array("mp4", "flv", "webmv", "webma", "webm", "m4a", "m4v", "ogv", "oga", "mp3", "midi", "mid", "ogg", "wav"),

    'cad_exts'                                => array('dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'svg'),

    // Preview with Google Documents
    'googledoc_enabled'                       => true,
    'googledoc_file_exts'                     => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'odt', 'odp', 'ods'),

    // defines size limit for paste in MB / operation
    // set 'FALSE' for no limit
    'copy_cut_max_size'                       => 100,
    // defines file count limit for paste / operation
    // set 'FALSE' for no limit
    'copy_cut_max_count'                      => 200,
    //IF any of these limits reached, operation won't start and generate warning

    //**********************
    //Allowed extensions (lowercase insert)
    //**********************
    'ext_img'                                 => array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'ico'), //Images
    'ext_file'                                => array('doc', 'docx', 'rtf', 'pdf', 'xls', 'xlsx', 'txt', 'csv', 'html', 'xhtml', 'psd', 'sql', 'log', 'fla', 'xml', 'ade', 'adp', 'mdb', 'accdb', 'ppt', 'pptx', 'odt', 'ots', 'ott', 'odb', 'odg', 'otp', 'otg', 'odf', 'ods', 'odp', 'css', 'ai', 'kmz', 'dwg', 'dxf', 'hpgl', 'plt', 'spl', 'step', 'stp', 'iges', 'igs', 'sat', 'cgm', 'tiff', ''), //Files
    'ext_video'                               => array('mov', 'mpeg', 'm4v', 'mp4', 'avi', 'mpg', 'wma', "flv", "webm"), //Video
    'ext_audio'                               => array('mp3', 'mpga', 'm4a', 'ac3', 'aiff', 'mid', 'ogg', 'wav'), //Audio
    'ext_archive'                             => array('zip', 'rar', 'gz', 'tar', 'iso', 'dmg'), //Archives


    //*********************
    //  If you insert an extensions blacklist array the filemanager don't check any extensions but simply block the extensions in the list
    //  otherwise check Allowed extensions configuration
    //*********************
    'ext_blacklist'                           => false, //['exe','bat','jpg'],


    //Empty filename permits like .htaccess, .env, ...
    'empty_filename'                          => false,

    /*
    |--------------------------------------------------------------------------
    | accept files without extension
    |--------------------------------------------------------------------------
    |
    | If you want to accept files without extension, remember to add '' extension on allowed extension
    |
    */
    'files_without_extension'                 => false,

    /******************
     * TUI Image Editor config
     *******************/
    // Add or modify the options below as needed - they will be json encoded when added to the configuration so arrays can be utilized as needed
    'tui_active'                           => true,
    'tui_position'                         => 'bottom',
    // 'common.bi.image'                      => "../assets/images/logo.png",
    // 'common.bisize.width'                  => '70px',
    // 'common.bisize.height'                 => '25px',
    'common.backgroundImage'               => 'none',
    'common.backgroundColor'               => '#ececec',
    'common.border'                        => '1px solid #E6E7E8',

    // header
    'header.backgroundImage'               => 'none',
    'header.backgroundColor'               => '#ececec',
    'header.border'                        => '0px',

    // main icons
    'menu.normalIcon.path'                 => '/vendor/responsivefilemanager' . '/svg/icon-d.svg',
    'menu.normalIcon.name'                 => 'icon-d',
    'menu.activeIcon.path'                 => '/vendor/responsivefilemanager' . '/svg/icon-b.svg',
    'menu.activeIcon.name'                 => 'icon-b',
    'menu.disabledIcon.path'               => '/vendor/responsivefilemanager' . '/svg/icon-a.svg',
    'menu.disabledIcon.name'               => 'icon-a',
    'menu.hoverIcon.path'                  => '/vendor/responsivefilemanager' . '/svg/icon-c.svg',
    'menu.hoverIcon.name'                  => 'icon-c',
    'menu.iconSize.width'                  => '24px',
    'menu.iconSize.height'                 => '24px',

    // submenu primary color
    'submenu.backgroundColor'              => '#ececec',
    'submenu.partition.color'              => '#000000',

    // submenu icons
    'submenu.normalIcon.path'              => '/vendor/responsivefilemanager' . '/svg/icon-d.svg',
    'submenu.normalIcon.name'              => 'icon-d',
    'submenu.activeIcon.path'              => '/vendor/responsivefilemanager' . '/svg/icon-b.svg',
    'submenu.activeIcon.name'              => 'icon-b',
    'submenu.iconSize.width'               => '32px',
    'submenu.iconSize.height'              => '32px',

    // submenu labels
    'submenu.normalLabel.color'            => '#000',
    'submenu.normalLabel.fontWeight'       => 'normal',
    'submenu.activeLabel.color'            => '#000',
    'submenu.activeLabel.fontWeight'       => 'normal',

    // checkbox style
    'checkbox.border'                      => '1px solid #E6E7E8',
    'checkbox.backgroundColor'             => '#000',

    // rango style
    'range.pointer.color'                  => '#333',
    'range.bar.color'                      => '#ccc',
    'range.subbar.color'                   => '#606060',

    'range.disabledPointer.color'          => '#d3d3d3',
    'range.disabledBar.color'              => 'rgba(85,85,85,0.06)',
    'range.disabledSubbar.color'           => 'rgba(51,51,51,0.2)',

    'range.value.color'                    => '#000',
    'range.value.fontWeight'               => 'normal',
    'range.value.fontSize'                 => '11px',
    'range.value.border'                   => '0',
    'range.value.backgroundColor'          => '#f5f5f5',
    'range.title.color'                    => '#000',
    'range.title.fontWeight'               => 'lighter',

    // colorpicker style
    'colorpicker.button.border'            => '0px',
    'colorpicker.title.color'              => '#000',


    //The filter and sorter are managed through both javascript and php scripts because if you have a lot of
    //file in a folder the javascript script can't sort all or filter all, so the filemanager switch to php script.
    //The plugin automatic swich javascript to php when the current folder exceeds the below limit of files number
    'file_number_limit_js'                    => 500,

    //**********************
    // Hidden files and folders
    //**********************
    // set the names of any folders you want hidden (eg "hidden_folder1", "hidden_folder2" ) Remember all folders with these names will be hidden (you can set any exceptions in config.php files on folders)
    'hidden_folders'                          => array(),
    // set the names of any files you want hidden. Remember these names will be hidden in all folders (eg "this_document.pdf", "that_image.jpg" )
    'hidden_files'                            => array('config.php'),

    // hides files and folders starting with a '.' (dot)
    'hide_dot_starting' => true,
    /*******************
     * URL upload
     *******************/
    'url_upload'                             => true,


    //************************************
    //Thumbnail for external use creation
    //************************************


    // New image resized creation with fixed path from filemanager folder after uploading (thumbnails in fixed mode)
    // If you want create images resized out of upload folder for use with external script you can choose this method,
    // You can create also more than one image at a time just simply add a value in the array
    // Remember than the image creation respect the folder hierarchy so if you are inside source/test/test1/ the new image will create at
    // path_from_filemanager/test/test1/
    // PS if there isn't write permission in your destination folder you must set it
    //
    'fixed_image_creation'                    => false, //activate or not the creation of one or more image resized with fixed path from filemanager folder
    'fixed_path_from_filemanager'             => array('../test/', '../test1/'), //fixed path of the image folder from the current position on upload folder
    'fixed_image_creation_name_to_prepend'    => array('', 'test_'), //name to prepend on filename
    'fixed_image_creation_to_append'          => array('_test', ''), //name to appendon filename
    'fixed_image_creation_width'              => array(300, 400), //width of image
    'fixed_image_creation_height'             => array(200, 300), //height of image
    /*
    #             $option:     0 / exact = defined size;
    #                          1 / portrait = keep aspect set height;
    #                          2 / landscape = keep aspect set width;
    #                          3 / auto = auto;
    #                          4 / crop= resize and crop;
    */
    'fixed_image_creation_option'             => array('crop', 'auto'), //set the type of the crop


    // New image resized creation with relative path inside to upload folder after uploading (thumbnails in relative mode)
    // With Responsive filemanager you can create automatically resized image inside the upload folder, also more than one at a time
    // just simply add a value in the array
    // The image creation path is always relative so if i'm inside source/test/test1 and I upload an image, the path start from here
    //
    'relative_image_creation'                 => false, //activate or not the creation of one or more image resized with relative path from upload folder
    'relative_path_from_current_pos'          => array('./', './'), //relative path of the image folder from the current position on upload folder
    'relative_image_creation_name_to_prepend' => array('', ''), //name to prepend on filename
    'relative_image_creation_name_to_append'  => array('_thumb', '_thumb1'), //name to append on filename
    'relative_image_creation_width'           => array(300, 400), //width of image
    'relative_image_creation_height'          => array(200, 300), //height of image
    /*
     * $option:     0 / exact = defined size;
     *              1 / portrait = keep aspect set height;
     *              2 / landscape = keep aspect set width;
     *              3 / auto = auto;
     *              4 / crop= resize and crop;
     */
    'relative_image_creation_option'          => array('crop', 'crop'), //set the type of the crop


    // Remember text filter after close filemanager for future session
    'remember_text_filter'                    => false,

];
