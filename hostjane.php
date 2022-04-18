<?php
/**
 * Plugin Name: Tip My Work - HostJane Payments
 * Plugin URI: https://www.hostjane.com/
 * Description: Accept tips for your work in a fast and convenient way. Instant payments via Stripe and PayPal to your HostJane account.
 * Version: 1.0.2
 * Author: HostJane
 * Author URI: https://www.hostjane.com/about
 */

define('HOSTJANE_PLUGIN_VERSION', '1.0.2');
define('HOSTJANE_URL', 'https://www.hostjane.com/marketplace/');

/**
 * Including admin panel page
 * @return void
 */
function hostjane_includeAdminPage()
{
    include(plugin_dir_path(__FILE__).'/admin/index.php');
}

/**
 * SVG code for used logo
 * @param $width - width in pixels
 * @param $height - height in pixels
 * @return string
 */
function hostjane_getLogo($width = 50, $height = 50)
{
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 368 484" width="'.$width.'" height="'.$height.'">
        <path fill="#E41937" d="M129.799 471.619C34.826 443.766-3.566 355.587.258 273.07c1.649-34.06 15.452-66.352 38.875-91.059-4.307 18.551-1.025 78.59 31.921 105.213-6.93-28.832-6.236-59.001 2.025-87.503 24.326-66.118 93.301-83.869 86.076-144.116C157.243 36.014 151.27 17.079 141.52 0c39.437 13.302 74.174 37.781 99.991 70.454 20.538 26.403 31.688 58.865 31.619 92.328-.157 11.856-1.545 23.626-4.187 35.192 5.326-14.114 13.336-27.04 23.598-38.114 17.821-17.501 39.652-30.501 63.503-37.914-13.826 26.949-18.808 57.613-14.12 87.539 5.575 33.456 31.448 77.524 25.009 129.92-4.45 62.079-47.356 114.737-107.307 131.736-42.682-9.966-87.181-9.829-129.827.478z"/>
        <path fill="#98012E" d="M259.659 471.142c26.523-32.541 45.491-92.936 14.633-127.434-2.344 20.298-11.355 39.208-25.579 53.817 5.372-10.33 7.261-22.118 5.575-33.611-4.505-42.463-43.453-50.018-44.898-76.962-1.342-11.516.955-23.188 6.431-33.332-18.662 6.844-34.887 19.155-46.572 35.29-9.661 13.493-14.826 29.673-14.757 46.264.035 5.96.706 11.833 1.923 17.614-2.424-6.942-6.156-13.428-10.98-19.071-8.18-8.625-18.341-15.18-29.595-18.979 20.151 51.544-8.26 54.936-14.074 85.725-7.316 28.901 18.888 60.987 28.058 71.157 21.039 6.623 42.771 10.704 64.731 12.381 22.164-1.458 44.087-5.782 65.104-12.859z"/>
    </svg>';
}

/**
 * SVG code for used logo with tip icon
 * @param $width - width in pixels
 * @param $height - height in pixels
 * @return string
 */
function hostjane_getTipLogo($width = 50, $height = 50)
{
    return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 550 550" width="'.$width.'" height="'.$height.'">
        <path fill="#E41937" d="M234.222 482.984c-94.244-27.764-132.378-115.666-128.285-197.479 1.694-33.733 15.632-65.886 38.717-90.372-4.174 18.514-.981 78.042 31.536 104.581-6.773-28.74-5.752-58.536 2.401-86.967 24.264-65.509 92.754-83.137 85.808-142.918-2.183-19.459-7.845-38.32-17.4-55.368 39.071 13.21 73.448 37.789 99.221 70.272 20.225 26.167 31.105 58.427 30.983 91.739-.129 11.856-1.41 23.326-4.257 34.964 5.619-13.857 13.533-26.838 23.631-37.84 17.814-17.545 39.757-30.436 63.141-37.563-13.788 26.827-18.899 57.14-13.922 86.975 5.216 33.448 30.522 76.949 24.507 129.05-4.759 61.74-47.213 113.98-106.85 130.626-42.439-10.108-86.704-9.731-129.231.3z"/>
        <path fill="#E41937" d="M234.162 483.199c-89.817-26.469-128.748-107.498-128.74-185.855 0-3.961.104-7.914.299-11.848 1.695-33.783 15.656-65.996 38.778-90.516l.542-.578-.179.774c-.888 3.947-1.445 9.801-1.445 16.817-.004 25.489 7.367 66.271 32.421 87.138-2.91-12.537-4.332-25.268-4.332-38.008 0-16.295 2.331-32.576 6.875-48.453 23.182-62.468 86.337-81.466 86.288-134.536 0-2.668-.165-5.424-.488-8.283-2.184-19.428-7.83-38.262-17.367-55.279l-.275-.49.535.174c39.114 13.222 73.506 37.833 99.3 70.345 20.175 26.065 31.051 58.179 31.051 91.351v.519c-.117 10.997-1.237 21.676-3.669 32.462 5.554-12.971 13.148-25.103 22.656-35.486 17.851-17.575 39.822-30.484 63.239-37.624l.487-.162-.225.465c-10.324 20.054-15.773 42.068-15.773 64.366 0 7.481.61 14.991 1.873 22.477 4.646 29.871 25.402 67.866 25.41 112.922 0 5.293-.285 10.689-.924 16.178-4.751 61.828-47.283 114.135-107.102 130.824-20.85-4.961-42.131-7.414-63.439-7.414-22.039 0-44.089 2.611-65.689 7.717l-.057.018-.05-.015zm.06-.217.059-.191-.059.191zM106.147 285.518c-.193 3.926-.292 7.875-.288 11.826.003 78.223 38.802 159.006 128.366 185.434 21.61-5.117 43.676-7.721 65.732-7.721 21.344 0 42.669 2.441 63.432 7.412 59.538-16.625 101.946-68.789 106.683-130.438.637-5.477.917-10.857.917-16.135.008-44.928-20.723-82.865-25.413-112.856-1.257-7.507-1.876-15.042-1.876-22.545 0-22.202 5.392-44.112 15.589-64.111-23.178 7.147-44.9 19.972-62.553 37.363-10.077 10.973-17.972 23.922-23.598 37.771l-.405-.132c2.842-11.625 4.13-23.077 4.264-34.911-.008-.184-.004-.355-.004-.521 0-33.078-10.867-65.1-30.959-91.083-25.611-32.305-59.753-56.784-98.572-70.021 9.402 16.944 14.992 35.653 17.15 54.96.33 2.863.491 5.635.491 8.323-.057 53.474-63.286 72.413-86.302 134.67-4.541 15.819-6.867 32.068-6.867 48.318 0 12.913 1.464 25.829 4.461 38.534l.155.615-.499-.4c-25.628-20.92-33.063-62.148-33.071-87.875.004-6.606.491-12.173 1.298-16.141-22.731 24.367-36.434 56.244-38.131 89.664z"/>
        <path fill="#98012E" d="M363.45 482.963c26.319-32.119 45.265-92.395 14.826-126.674-2.433 19.842-11.222 38.764-25.52 53.246 5.5-10.23 7.203-21.621 5.5-33.404-4.375-41.863-43.354-49.656-44.469-76.42-1.39-11.432 1.005-23.023 6.246-33.169-18.361 6.911-34.542 19.044-46.139 35.017-9.495 13.34-14.841 29.611-14.841 45.875 0 6.248.942 11.686 1.967 17.65-2.515-6.926-5.84-13.547-11.048-18.922-7.966-8.658-18.111-15.195-29.42-19.014 19.93 51.262-8.212 54.551-13.916 85.313-7.218 28.574 18.585 60.57 27.752 70.525 20.837 6.912 42.614 10.775 64.277 12.594 21.928-1.592 43.856-5.682 64.785-12.617z"/>
        <path fill="#FFF" d="M411.519 329.71c55.261 22.021 82.211 84.669 60.22 139.931-22.021 55.274-84.671 82.225-139.931 60.204-55.275-22.021-82.225-84.658-60.204-139.93 22.004-55.248 84.639-82.213 139.915-60.205z"/>
        <path fill="#FFE57F" d="M469.837 468.885c17.854-44.813 2.745-94.695-33.694-122.809-5.769-3.706-11.967-6.939-18.573-9.576-55.258-22.02-117.911 4.933-139.93 60.204-11.69 29.357-9.561 60.795 3.272 87.12 11.488 19.322 29.178 35.193 51.636 44.148 54.137 21.541 115.72-4.951 137.289-59.087z"/>
        <path fill="#FFD740" d="M448.997 354.821c23.93 29.332 31.683 70.379 16.677 108.042-22.008 55.258-84.66 82.21-139.929 60.19-14.595-5.813-27.198-14.479-37.481-25.082 11.208 13.715 25.936 24.859 43.544 31.873 55.257 22.02 117.911-4.933 139.931-60.204 16.178-40.653 5.849-85.286-22.742-114.819z"/>
        <path fill="#37474F" d="M331.054 531.743c-56.213-22.407-83.731-86.354-61.35-142.569 22.408-56.227 86.356-83.744 142.569-61.335 56.227 22.38 83.744 86.344 61.336 142.555-22.38 56.215-86.343 83.731-142.555 61.349zm79.721-200.134c-54.146-21.568-115.731 4.923-137.301 59.072-21.556 54.137 4.952 115.721 59.073 137.291 54.137 21.54 115.72-4.952 137.289-59.088 21.57-54.12-4.921-115.705-59.061-137.275z"/>
        <path fill="#FFD740" d="M405.513 344.826c46.911 18.673 69.794 71.868 51.107 118.792-18.688 46.926-71.882 69.811-118.806 51.122-46.927-18.688-69.797-71.88-51.124-118.806 18.703-46.91 71.896-69.811 118.823-51.108z"/>
        <path fill="#FFCA28" d="M292.755 402.726c18.675-46.912 71.868-69.812 118.792-51.109 12.13 4.817 22.646 11.968 31.265 20.711-9.552-11.828-22.165-21.482-37.299-27.501-46.925-18.702-100.12 4.198-118.822 51.108-13.843 34.797-4.837 73.024 19.877 98.084-20.036-24.865-26.48-59.516-13.813-91.293z"/>
        <path fill="#FFE57F" d="M436.747 365.55c20.046 24.851 26.492 59.502 13.822 91.295-18.686 46.923-71.879 69.81-118.79 51.122-12.129-4.845-22.644-11.983-31.247-20.738 9.536 11.854 22.15 21.48 37.282 27.512 46.924 18.688 100.117-4.196 118.806-51.122 13.858-34.796 4.84-73.008-19.873-98.069z"/>
        <path fill="#37474F" d="M337.073 516.628c-47.893-19.067-71.336-73.553-52.253-121.447 19.068-47.88 73.538-71.322 121.432-52.255 47.896 19.098 71.34 73.553 52.269 121.448-19.096 47.908-73.552 71.336-121.448 52.254zm67.671-169.93c-45.787-18.228-97.896 4.178-116.152 49.99-18.256 45.8 4.177 97.911 49.977 116.167 45.814 18.257 97.925-4.178 116.165-49.977 18.243-45.813-4.179-97.923-49.99-116.18z"/>
        <path fill="#FFF" d="m378.979 422.394 14.48-36.349c9.635 5.367 12.63 11.838 10.826 18.984l20.147 8.021c2.757-13.752-9.403-30.381-26.701-37.746l3.268-8.208-11.315-4.511-3.267 8.189c-15.256-5.631-38.26-3.298-46.252 12.415-11.703 22.945 7.889 39.966 20.385 52.538l-14.412 36.176c-6.424-4.088-10.687-11.09-8.771-18.604l-21.208-8.44c-2.974 14.114 11.573 32.035 25.581 38.095l-4.708 11.783 11.328 4.524 4.691-11.787c19.034 7.118 38.104 2.91 46.316-12.563 12.115-22.766-4.146-38.385-20.388-52.517zm-9.646-8.721c-5.952-7.026-13.848-15.563-10.511-23.962 3.251-8.151 15.178-9.726 23.321-8.176l-12.81 32.138zm-11.885 62.794 12.745-31.999c9.729 8.507 13.838 15.49 10.501 23.899-3.337 8.348-11.385 11.271-23.246 8.1z"/>
        <path fill="#FFE57F" d="M386.093 377.216c-15.347-5.736-35.577-4.599-43.741 11.413-10.521 20.637 2.792 34.89 19.93 50.105l1.068.959-15.804 39.649-2.029-1.151c-10.629-6.052-12.324-13.429-11.177-19.519l-16.67-6.659c-1.143 12.158 9.463 26.839 25.247 33.599l1.823.785-3.936 9.846 7.556 3.018 3.184-8.016.752-1.846 1.848.698c18.505 6.899 36.511 2.133 43.835-11.614.034-.083.056-.156.098-.234.627-1.203 1.182-2.402 1.65-3.582 7.329-18.351-5.5-31.856-21.71-46.211l-1.07-.955.537-1.334 14.468-36.351.873-2.176 2.031 1.161c8.692 5.021 12.474 11.885 11.086 19.636l16.678 6.64c1.062-12.069-9.544-26.648-25.303-33.375l-1.819-.791.737-1.831 3.261-8.214-7.547-3.001-3.992 10.054-1.864-.703zm-15.613 44.532-2.176-2.088c-7.433-7.153-13.764-14.966-11.582-23.937.134-.75.311-1.477.593-2.235.277-.646.605-1.227.962-1.793 4.085-7.396 13.291-10.356 24.722-7.612l2.275.535-14.794 37.13zm-14.541 58.49 12.744-31.997 1.114-2.789 2.177 2.083c8.043 7.698 14.936 16.223 10.992 26.1-3.601 9.032-13.179 12.513-25.654 9.332l-2.236-.576.863-2.153z"/>
        <path fill="#37474F" d="M358.82 389.715c-3.944 9.924 2.963 18.442 10.993 26.175l2.177 2.087 14.784-37.125-2.283-.542c-12.322-2.96-22.169.627-25.671 9.405zm11.646 21.094c-7.869-8.08-10.14-13.865-7.87-19.588 2.484-6.234 9.522-8.992 18.647-7.44l-10.777 27.028zm-13.881 67.809 2.236.577c12.475 3.181 22.053-.316 25.645-9.331 3.938-9.906-2.952-18.403-10.985-26.1l-2.174-2.084-14.722 36.938zm16.248-29.792c7.851 8.073 10.138 13.848 7.861 19.541-2.604 6.526-9.314 9.159-18.597 7.383l10.736-26.924z"/>
        <path fill="#37474F" d="m383.288 422.567 13.039-32.757c6.837 4.654 8.943 10.452 6.235 17.282l.004.001 24.494 9.759c4.915-14.152-6.369-33.098-24.818-41.86l4.038-10.173-15.088-6.021-4.06 10.166c-20.073-6.745-39.169-1.113-46.896 14.04-12.498 24.49 5.704 41.521 19.791 54.056l-12.992 32.592c-6.973-4.658-9.021-10.293-6.29-17.178l-24.496-9.757c-4.967 14.235 6.294 33.274 24.751 42.05l-3.969 9.97 15.116 6.021 3.963-9.971c19.809 6.628 38.907.941 46.948-14.172 12.878-24.22-5.531-41.405-19.77-54.048zm16.17 52.129c-7.295 13.763-25.313 18.527-43.805 11.614l-1.86-.684-3.924 9.85-7.556-3.004 3.921-9.863-1.809-.771c-15.794-6.757-26.393-21.451-25.26-33.597l16.684 6.657c-1.163 6.074.533 13.439 11.177 19.519l2.027 1.152 15.792-39.649-1.056-.958c-17.138-15.216-30.45-29.476-19.934-50.111 8.153-16.021 28.4-17.16 43.733-11.423l1.859.718 4.007-10.067 7.544 3.017-3.993 10.044 1.809.789c15.769 6.714 26.374 21.308 25.313 33.377l-16.69-6.655c1.394-7.73-2.381-14.6-11.073-19.62l-2.031-1.161-15.877 39.858 1.068.944c17.296 15.343 30.755 29.69 19.934 50.024z"/>
        <path fill="none" d="M0 0h550v550H0z"/>
    </svg>';
}

/**
 * Getting array of available themes
 * Should be included as hostjane-{theme_title} in assets/style.css file
 * @return array
 */
function hostjane_getThemes()
{
    return [
        'cornflowerblue',
        'coral',
        'mediumorchid',
        'mediumaquamarine',
        'tomato',
        'violet',
    ];
}

/**
 * Database installation / insert default values
 * @return boolean
 */
function hostjane_dbInstall()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'hostjane';

    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      username varchar(120) DEFAULT NULL,
      theme varchar(20) DEFAULT NULL,
      enabled tinyint(1) DEFAULT 0,
      settings text DEFAULT NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    $result = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");

    if (! $result) {
        $settings = [
            'align' => 'right',
            'side_spacing' => '18',
            'bottom_spacing' => '18',
        ];

        $wpdb->insert(
            $table_name,
            array(
                'username' => '',
                'theme' => 'cornflowerblue',
                'enabled' => 0,
                'settings' => serialize($settings),
            )
        );
    }

    return true;
}

/**
 * Register a custom menu page in admin panel
 * @return void
 */
function hostjane_addAdminLink()
{
    add_menu_page(
        __('HostJane Tips', 'hostjane'),
        'HostJane Tips',
        'manage_options',
        'includeAdminPage',
        'hostjane_includeAdminPage',
        plugins_url('/assets/icon.png', __FILE__),
        99
    );
}

/**
 * Register a floating button in front-end
 * @return void
 */
function hostjane_addTipButton()
{
    $plugin = hostjane_getConfig();
    $is_left_sided = ($plugin->align == 'left') ? 'left-sided' : '';
    $margin_css = ($plugin->align == 'right') ? 'margin-left: auto;' : 'margin-right: auto;';
    if ($plugin->enabled && ! isset($_REQUEST['disable_tip'])) {
        echo "
            <div class='hostjane-plugin hostjane-".esc_html($plugin->theme)."-theme'
                style='bottom: ".esc_html($plugin->bottom_spacing)."px; ".esc_html($plugin->align).": ".esc_html($plugin->side_spacing)."px;'>
                <div class='hostjane-plugin-container ".$is_left_sided."'>
                    <span class='hostjane-plugin-container-title'>Tip me on HostJane</span>
                    <div class='hostjane-tip-container-main'>
                        <span>".hostjane_getLogo(40, 40)."</span>
                        <span class='x'>x</span>
                        <span class='hostjane-tip-option hostjane-tip-option-5 selected' onclick='hostjane_setTipAmount(5)'>$5</span>
                        <span class='hostjane-tip-option hostjane-tip-option-10' onclick='hostjane_setTipAmount(10)'>$10</span>
                        <span class='hostjane-tip-option hostjane-tip-option-20' onclick='hostjane_setTipAmount(20)'>$20</span>
                        <span><input id='hostjane_tip_amount' type='text' placeholder='$' min='1' max='4' onkeyup='hostjane_setCustomTipAmount(this)' value='$5'></span>
                    </div>
                    <a class='hostjane-tip-submit' href='".esc_html($plugin->studio_url)."?send_tip=5' target='_blank'>Support $<span id='hostjane_tip_custom_amount'>5</span></a>
                    <a class='hostjane-studio-link' href='".esc_html($plugin->studio_url)."' target='_blank'>View my studio</a>
                </div>
                <a id='hostjane_tip_btn' style='".$margin_css."' onclick='hostjane_toogleTips()'>
                    <span class='closed'>".hostjane_getTipLogo(80, 80)."</span>
                    <span class='opened'>".hostjane_getLogo(80, 80)."</span>
                </a>
            </div>
        ";
    }
}

/**
 * Including custom CSS and JS files required by plugin
 */
function hostjane_loadCustomCssJsAssets()
{
    wp_register_style('hostjane.css', plugins_url('/assets/style.css', __FILE__ ));
    wp_enqueue_style('hostjane.css');
    wp_enqueue_script('hostjane.js', plugins_url('/assets/script.js', __FILE__ ));
    wp_enqueue_script('hostjane.js');
}

/**
 * Getting database's values
 * @return object
 */
function hostjane_getConfig()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'hostjane';
    $plugin = $wpdb->get_row("SELECT * FROM $table_name WHERE id = 1");

    if ($plugin) {
        $settings = unserialize($plugin->settings);
        $plugin->align = $settings['align'];
        $plugin->side_spacing = $settings['side_spacing'];
        $plugin->bottom_spacing = $settings['bottom_spacing'];
        $plugin->studio_url = ($plugin->username) ? HOSTJANE_URL.$plugin->username : '#';
    }

    return $plugin ?? null;
}

/**
 * Updating database's values
 * @return object
 */
function hostjane_updateConfig($post)
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'hostjane';

    $username = (isset($post['username'])) ? trim($post['username']) : "";
    $theme = (isset($post['theme'])) ? $post['theme'] : "cornflowerblue";
    $enabled = (isset($post['enabled']) && $post['enabled'] == 1) ? 1 : 0;
    $align = (isset($post['align']) && $post['align'] == 'left') ? 'left' : 'right';
    $side_spacing = (isset($post['side_spacing']) && $post['side_spacing'] > 0 && $post['side_spacing'] < 201) ? $post['side_spacing'] : '18';
    $bottom_spacing = (isset($post['bottom_spacing']) && $post['bottom_spacing'] > 0 && $post['bottom_spacing'] < 201) ? $post['bottom_spacing'] : '18';
    $settings = [
        'align' => $align,
        'side_spacing' => $side_spacing,
        'bottom_spacing' => $bottom_spacing,
    ];

    $wpdb->update(
        $table_name,
        array(
            'username' => $username,
            'theme' => $theme,
            'enabled' => $enabled,
            'settings' => serialize($settings),
        ),
        array(
            'id' => 1,
        )
    );

    return true;
}

register_activation_hook(__FILE__, 'hostjane_dbInstall');
add_action('admin_menu', 'hostjane_addAdminLink');
add_action('admin_init', 'hostjane_loadCustomCssJsAssets');
add_action('wp_enqueue_scripts', 'hostjane_loadCustomCssJsAssets');
add_action('wp_footer', 'hostjane_addTipButton');
