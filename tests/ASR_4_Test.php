<?php

require_once('BaseSetting.php'); 

class ASR_4_Test extends BaseSetting
{
    public function test_4_MasterClientView()
    {
        /*
        *   This test deals with changing master and puck name & location.
        */

        sleep(SLEEPY_TIME);
        $this->byName('Firmware')->click();
        sleep(1);

        // For Master
        $this->byXpath($this->basepath."/android.widget.ListView[1]/android.view.View[1]")->click();
        sleep(1);
        $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[1]")->click();
        sleep(1);
        $this->keyEvent(127);
        for($i=0; $i<20; $i++) {
            $this->keyEvent(67);
        }
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[0]->setText('Ground-Floor');
        $this->hideKeyboard();
        sleep(1);
        $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[1]")->click();
        $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[2]/android.view.View[1]")->click();
        sleep(1);



        // For Puck
        $el = $this->byXpath($this->basepath.'/android.widget.ListView[2]/android.view.View[4]');
        $el->click();
        sleep(1);
        $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[1]")->click();
        sleep(1);
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[0]->click();
        sleep(1);
        $this->keyEvent(127);
        for($i=0; $i<20; $i++) {
            $this->keyEvent(67);
        }
        $puck_name = 'Puck'.rand(0, 1000);
        $el[0]->setText($puck_name);        
        $this->hideKeyboard();
        $el[1]->click();
        sleep(1);
        $this->keyEvent(127);
        for($i=0; $i<20; $i++) {
            $this->keyEvent(67);
        }
        $location_name = 'Room-'.rand(0, 1000);
        $el[1]->setText($location_name);
        $this->hideKeyboard();
        sleep(1);
        $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[1]")->click();
        $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[4]/android.view.View[1]")->click();
    } 
}

?>