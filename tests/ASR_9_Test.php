<?php

require_once('BaseSetting.php');

class ASR_9_Test extends BaseSetting
{
    public function test_9_Surveying()
    {
    	sleep(SLEEPY_TIME);

        // Entering text into the input boxes.
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        
        $el[0]->setText($this->customer_details['work_order']);
        $this->hideKeyboard();

        $this->byName('CONTINUE')->click();
        sleep(2);

        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Work Order']");
        $this->assertNotNull($el);

        $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2][@content-desc='AirScout']")->click();         
        sleep(1);

        // Selecting floor plan & rotating 90 degree.
        $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2]")->click();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[9]/android.widget.Image[1]")->click();

        // Tapping on button 'USE FLOOR PLAN'.
        $this->byXPath($this->basepath."/android.view.View[10][@content-desc='USE FLOOR PLAN']")->click();
        sleep(1);

        // Tapping on button 'CANCEL'.
        $this->byXPath($this->basepath."/android.view.View[8]/android.view.View[3]/android.view.View[1][@content-desc='CANCEL']")->click();
        sleep(1);

        // Tapping on button 'USE FLOOR PLAN'.
        $this->byXPath($this->basepath."/android.view.View[10][@content-desc='USE FLOOR PLAN']")->click();
        sleep(1);              

        // Tapping on button 'SAVE'.
        $this->byXPath($this->basepath."/android.view.View[8]/android.view.View[3]/android.view.View[2][@content-desc='SAVE']")->click();
        sleep(1);
        
        // Adding floors.
        for($c=1; $c < $this->details['floor_number']; $c++)
        {
            $this->byXPath($this->basepath."/android.view.View[7][@content-desc='Add Floor']")->click();
            sleep(1);
            $this->byXPath($this->basepath."/android.view.View[9]/android.view.View[3]/android.view.View[2][@content-desc='SAVE']")->click();
            sleep(1);
        }

        // Adding devices to various floors.
        for($c=1; $c <= $this->details['device_number']; $c++)
        {
            $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[".($c+1)."]")->click();
            sleep(1);
            // Draging the master and pucks.
            $el_1 = $this->byXPath($this->basepath.'/android.widget.ListView[1]/android.view.View[1]/android.view.View[1]');
            $action = $this->initiateTouchAction();
            $action->longPress(['element' => $el_1])
                ->moveTo(['x' =>990, 'y' =>1025])
                ->release()
                ->perform();
            sleep(2);

        }

            
        // Tapping Start Test button.
        $this->byName('Start Test')->click();
        sleep(5);

        // Canceling Test.
        $this->byName('CANCEL TEST')->click();
        sleep(1);
        $this->byName('YES')->click();
    }
}

?>