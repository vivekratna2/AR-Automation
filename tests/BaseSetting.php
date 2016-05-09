<?php

// AirScout apk location.
define('APP_PATH', realpath(dirname(__FILE__).'/../home/vivek/APK/android-armv7-debug.apk'));
define('SLEEPY_TIME', 5);

class BaseSetting extends PHPUnit_Extensions_AppiumTestCase
{
	public static $browsers = array(
        array(
            'local' => true,
            'port' => 4723,
            'browserName' => '',
            'desiredCapabilities' => array(
                'app' => APP_PATH,
                'platformName' => 'Android',
                'platformVersion' => '4.4.4',
                'deviceName' => '',
                'newCommandTimeout' => '60*8',
                'appPackage' => 'com.greenlee.airscout_dev',
                'appActivity' => '.AirScout'
            )
        )
    );

    protected $basepath = "//android.widget.LinearLayout[1]/android.widget.FrameLayout[1]/android.widget.FrameLayout[1]/android.widget.FrameLayout[1]/android.widget.FrameLayout[1]/android.webkit.WebView[1]";

    /*
    *   The resolution_x and resolution_y are resolutions for a tablet device calculated in landscape mode.
    */

    protected $details = [
        'app_name' => 'AirScout Dev',
        'cloud_username' => 'no-pro',
        'cloud_password' => 'greenlee',
        'device_number' => 2,
        'floor_number' => 8,
        'resolution_x' => 2048,
        'resolution_y' => 1536,
        'scroll_limit' => 3,
        'ssid_master' => 'AirScout-0008f0',
        'ssid_wifi' => 'ribera-1',
        'ssid_wifi_password' => 'R1bera07022014x1',
        'test_loop' => 1,
        'test_wait_time' => 7,
    ];

    protected $customer_details = [
        'address_1' => 'ktm',
        'address_2' => 'ktm',
        'city' => 'Kathmandu',
        'country' => 'Neapl',
        'email' => 'john@doe.com',
        'phone' => '9234567890',
        'sla_down' => 15,
        'sla_up' => '',
        'state' => 'Bagmati',
        'technician_name' => 'John Doe',
        'work_order' => 'Automation Test',
        'work_order_comments' => 'Work order test comments.',
        'zip_code' => '44600',
    ];
}

?>