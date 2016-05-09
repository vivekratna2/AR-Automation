<?php

require_once('BaseSetting.php'); 

class ASR_3_Test extends BaseSetting
{
    public function test_3_Login()
    {
        /*
        *   Test - 3
        */
        sleep(SLEEPY_TIME);
        $this->keyEvent(3);
        sleep(1);
        $this->byName('Settings')->click();
        sleep(1);
        $this->byName('Wi-Fi')->click();
        sleep(1);
        $this->byName($this->details['ssid_wifi'])->click();
        $el = $this->byID('com.android.settings:id/password');
        $el->setText($this->details['ssid_wifi_password']);
        $this->byName('Connect')->click();
        $this->keyEvent(3);

        sleep(1);
        $this->byName($this->details['app_name'])->click();
        sleep(SLEEPY_TIME);
        $this->byName('Settings')->click();
        sleep(SLEEPY_TIME);
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[0]->click();
        $this->keyEvent(127);
        for($i=0; $i<15; $i++) {
            $this->keyEvent(67);
        }
        $el[0]->setText('test');
        $this->hideKeyboard();
        $el[1]->click();
        $this->keyEvent(127);
        for($i=1; $i<15; $i++) {
            $this->keyEvent(67);
        }
        $el[1]->setText('greenlee123');
        $this->hideKeyboard();
        $this->byName('SAVE')->click();
        sleep(20);
        $el = $this->byXPath($this->basepath."/android.view.View[9]/android.view.View[1][@content-desc='Login Failed']");
        $this->assertNotNull($el);

        $this->byName('OK')->click();
        sleep(1);

        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[0]->click();
        $this->keyEvent(127);
        for($i=0; $i<15; $i++) {
            $this->keyEvent(67);
        }
        $el[0]->setText($this->details['cloud_username']);
        $this->hideKeyboard();
        $el[1]->click();
        $this->keyEvent(127);
        for($i=1; $i<15; $i++) {
            $this->keyEvent(67);
        }
        $el[1]->setText($this->details['cloud_password']);
        $this->hideKeyboard();
        $this->byName('SAVE')->click();
        sleep(20);
        $el = $this->byXPath($this->basepath."/android.view.View[9]/android.view.View[1][@content-desc='Settings Saved']");
        $this->assertNotNull($el);
        $this->byName('OK')->click();

        // Disconnecting from wifi and connecting to Master device.
        $this->keyEvent(3);
        sleep(1);
        $this->byName('Settings')->click();
        sleep(1);
        $this->byName('Wi-Fi')->click();
        sleep(1);
        $this->byName($this->details['ssid_wifi'])->click();
        sleep(1);
        $this->byName('Forget')->click();
        sleep(1);
        $this->byName($this->details['ssid_master'])->click();
        sleep(1);
        $this->byName('Connect')->click();
        $this->keyEvent(3);
        sleep(1);
        $this->byName($this->details['app_name'])->click();
    }
}

?>