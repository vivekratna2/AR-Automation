<?php

require_once('BaseSetting.php');

class ASR_14_Test extends BaseSetting
{
    public function test_14_WorkOrder()
    {
        /*
        * Search using only Work Order Number.
        */
        sleep(SLEEPY_TIME);
        
        // Tapping on the Reports on the navigation menu.
        $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[2]")->click();
        sleep(1);
        
        // Entering Work Order and tapping on 'SEARCH'
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[0]->setText($this->customer_details['search_work_order']);
        $this->hideKeyboard();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[3]/android.view.View[3]")->click();
        sleep(20);

        // Tapping on Search Again button.
        $this->byXPath($this->basepath."/android.view.View[3]")->click();

        // Entering RANDOM Work Order and tapping on 'SEARCH' to see if the alert message is displayed if no work worder is found.
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $rand_text = rand(10000, 10000000);
        $el[0]->setText('random' . $rand_text . 'text');
        $this->hideKeyboard();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[3]/android.view.View[3]")->click();
        sleep(20);

        // Tapping on the OK button on the alert box.
        $this->byXPath($this->basepath."/android.view.View[6]/android.view.View[2]/android.view.View[1]")->click();

        // Deleting the text on the search input.
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[0]->click();
        $this->keyEvent(123);
        for($i=0; $i<18; $i++) {
            $this->keyEvent(67);
        }

        // Entering Work Order and tapping on 'SEARCH'
        $el[0]->setText($this->customer_details['search_work_order']);
        $this->hideKeyboard();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[3]/android.view.View[3]")->click();
        sleep(20);

        // Tapping on the first report on the list.
        $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[1]")->click();
        sleep(1);

        // Tapping on the first Test Data for the selected report.
        $this->byXPath($this->basepath."/android.widget.ListView[4]")->click();
    }

    public function test_14_CustomerInformation()
    {
        /*
        * Search using only Customer Information.
        */
        sleep(SLEEPY_TIME);
        
        // Tapping on the Reports on the navigation menu.
        $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[2]")->click();
        sleep(1);
        
        // Entering Work Order and tapping on 'SEARCH'
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[1]->setText($this->customer_details['phone']);
        $this->hideKeyboard();
        $el[7]->setText($this->customer_details['country']);
        $this->hideKeyboard();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[4]/android.view.View[9]")->click();
        sleep(20);

        // Tapping on Search Again button.
        $this->byXPath($this->basepath."/android.view.View[3]")->click();

        // Entering RANDOM Work Order and tapping on 'SEARCH' to see if the alert message is displayed if no work worder is found.
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $rand_text = rand(10000, 10000000);
        $el[7]->setText('random' . $rand_text . 'text');
        $this->hideKeyboard();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[4]/android.view.View[9]")->click();
        sleep(20);

        // Tapping on the OK button on the alert box.
        $this->byXPath($this->basepath."/android.view.View[6]/android.view.View[2]/android.view.View[1]")->click();

        // Deleting the text on the search input.
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        $el[7]->click();
        $this->keyEvent(123);
        for($i=0; $i<18; $i++) {
            $this->keyEvent(67);
        }
        $this->hideKeyboard();

        // Entering Work Order and tapping on 'SEARCH'
        $el[1]->setText($this->customer_details['phone']);
        $this->hideKeyboard();
        $el[7]->setText($this->customer_details['country']);
        $this->hideKeyboard();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[4]/android.view.View[9]")->click();
        sleep(20);

        // Tapping on the first report on the list.
        $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[1]")->click();
        sleep(1);

        // Tapping on the first Test Data for the selected report.
        $this->byXPath($this->basepath."/android.widget.ListView[4]")->click();
    }
}

?>