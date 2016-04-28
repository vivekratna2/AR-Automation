<?php

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
                'appPackage' => 'com.greenlee.airscoutdev',
                'appActivity' => '.AirScout'
            )
        )
    );

    protected $basepath = "//android.widget.LinearLayout[1]/android.widget.FrameLayout[1]/android.widget.FrameLayout[1]/android.widget.FrameLayout[1]/android.widget.FrameLayout[1]/android.webkit.WebView[1]";

    /*
    *   Device      postition_center_x      position_center_y       position_floorlist_x        position_floorlist_y
    *   Tab E       640                     400                     1200                        400
    *   Tab A       512                     384                     940                         384
    *   Tab S2      1024                    768                     1880                        768
    */

    protected $details = [
        'app_name' => 'AirScout Dev',
        'device_number' => 2,
        'floor_number' => 8,
        'position_center_x' => 640,
        'position_center_y' => 400,
        'position_floorlist_x' => 1200,
        'position_floorlist_y' => 400,
        'scroll_limit' => 3,
        'ssid_master' => 'AirScout-0008f0',
        'ssid_wifi' => 'ribera-1',
        'ssid_wifi_password' => 'R1bera07022014x1',
        'test_loop' => 6,
        'test_wait_time' => 7,
    ];

    protected $customer_details = [
        'address_1' => 'Rato Pool',
        'address_2' => 'Rato Pool',
        'city' => 'Kathmandu',
        'country' => 'Neapl',
        'email' => 'john@doe.com',
        'phone' => '9234567890',
        'sla_down' => '',
        'sla_up' => 0,
        'state' => 'Bagmati',
        'technician_name' => 'John Doe',
        'work_order' => 'Automation Test - Tab E',
        'work_order_comments' => 'Work order test comments.',
        'zip_code' => '44600',
    ];
}

?>