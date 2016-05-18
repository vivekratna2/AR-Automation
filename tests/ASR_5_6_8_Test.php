<?php

require_once('BaseSetting.php');

class ASR_5_6_8_Test extends BaseSetting
{
    public function test_5_6_8_Airscout()
    {
        $position_center_x = intval($this->details['resolution_x'] / 2);
        $position_center_y = intval($this->details['resolution_y'] / 2);
        $floorlist_center_x = intval($this->details['resolution_x'] - (($this->details['resolution_x'] * 0.2) / 2));
        $floorlist_center_y = $position_center_y;

        /*
        *   Assertion for the text above the input boxes.
        */
        sleep(SLEEPY_TIME);
        $el = $this->byName('Customer Form');
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[1][@content-desc='scan']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[1][@content-desc='Order Details']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[2]/android.view.View[1][@content-desc='Work Order']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[3]/android.view.View[1][@content-desc='Technician Information']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[4]/android.view.View[1][@content-desc='Service Level Bandwidth (down)']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[5]/android.view.View[1][@content-desc='Service Level Bandwidth (up)']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[6]/android.view.View[1][@content-desc='Work Order Comments']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[7][@content-desc='Customer Information']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[8]/android.view.View[1][@content-desc='Email']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[9]/android.view.View[1][@content-desc='Phone']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[10]/android.view.View[1][@content-desc='Address 1']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[11]/android.view.View[1][@content-desc='Address 2']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[12]/android.view.View[1][@content-desc='City']");
        $this->assertNotNull($el);

        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[13]/android.view.View[1][@content-desc='State']");
        $this->assertNotNull($el);
        
        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[14]/android.view.View[1][@content-desc='Zip Code']");
        $this->assertNotNull($el);
        
        $el = $this->byXpath($this->basepath."/android.view.View[7]/android.view.View[15]/android.view.View[1][@content-desc='Country']");
        $this->assertNotNull($el);


        /*
        *   Assertion for the Coustomer Information input boxes.
        */        
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));

        $this->assertNotNull($el[3]);
        $this->assertNotNull($el[4]);
        $this->assertNotNull($el[5]);
        $this->assertNotNull($el[6]);
        $this->assertNotNull($el[7]);
        $this->assertNotNull($el[8]);
        $this->assertNotNull($el[9]);
        $this->assertNotNull($el[10]);
        $this->assertNotNull($el[11]);
        $this->assertNotNull($el[12]);


        /*
        *   Checking to see if the navigation bar is working.
        */
        // Tapping on Reports tab.
        $this->byXpath($this->basepath."/android.view.View[1]/android.view.View[2]")->click();
        sleep(1);
        $el = $this->byXpath($this->basepath."/android.widget.ListView[1]/android.view.View[1]/android.view.View[1][@content-desc='Recent Reports']");
        $this->assertNotNull($el);
        sleep(1);

        // Tapping on Firmware tab.
        $this->byXpath($this->basepath."/android.view.View[1]/android.view.View[3]")->click();
        sleep(1);
        $el = $this->byXpath($this->basepath."/android.widget.ListView[1]/android.view.View[1]/android.view.View[1][@content-desc='ASM300']");
        $this->assertNotNull($el);
        sleep(1);

        // Tapping on Settings tab.
        $this->byXpath($this->basepath."/android.view.View[1]/android.view.View[4]")->click();
        sleep(1);
        $el = $this->byXpath($this->basepath."/android.widget.ListView[1]/android.view.View[1]/android.view.View[1][@content-desc='Settings']");
        $this->assertNotNull($el);
        sleep(1);

        // Tapping on Test tab.
        $this->byXpath($this->basepath."/android.view.View[1]/android.view.View[1]")->click();
        sleep(1);

        /*
        *   Checking the error message displayed when the continue button is pressed without entering the work order.
        */
        $this->byName('CONTINUE')->click();
        sleep(1);
        $el = $this->byXPath($this->basepath."/android.view.View[8]/android.view.View[1][@content-desc='Work Order Required']");
        $this->assertNotNull($el);
        sleep(1);
        $this->byName('OK')->click();
        sleep(1);

        /*
        *   Entering text into the input boxes.
        */
        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        
        $el[0]->setText($this->customer_details['work_order']);
        $this->hideKeyboard();

        $el[1]->setText($this->customer_details['technician_name']);
        $this->hideKeyboard();

        $el[4]->setText($this->customer_details['work_order_comments']);
        $this->hideKeyboard();

        $el[5]->setText($this->customer_details['email']);
        $this->hideKeyboard();

        $el[6]->setText($this->customer_details['phone']);
        $this->hideKeyboard();

        $el[7]->setText($this->customer_details['address_1']);
        $this->hideKeyboard();

        $el[8]->setText($this->customer_details['address_2']);
        $this->hideKeyboard();

        $el[9]->setText($this->customer_details['city']);
        $this->hideKeyboard();

        $el[10]->setText($this->customer_details['state']);
        $this->hideKeyboard();

        $el[11]->setText($this->customer_details['zip_code']);
        $this->hideKeyboard();

        $el[12]->setText($this->customer_details['country']);
        $this->hideKeyboard();
        
        if($this->customer_details['sla_up'] === '') {
            $el[3]->click();
            sleep(1);
            $this->keyEvent(123);
            $this->keyEvent(67);
        } else {
            $el[3]->setText($this->customer_details['sla_up']);
        }
        $this->hideKeyboard();

        if($this->customer_details['sla_down'] === '') {
            $el[2]->click();
            sleep(1);
            $this->keyEvent(123);
            $this->keyEvent(67);
        } else {
            $el[2]->setText($this->customer_details['sla_down']);
        }
        $this->hideKeyboard();        
        sleep(1);

        $this->byName('CONTINUE')->click();
        sleep(2);

        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Work Order']");
        $this->assertNotNull($el);

        // Asserting the Work Order title.
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[4][@content-desc='".$this->customer_details['work_order']."']");
        $this->assertNotNull($el);

        /*
        *   Section 6.1 - Order details assertion.
        */
        sleep(1);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.view.View[1]/android.view.View[1][@content-desc='Order Details']");
        $this->assertNotNull($el);


        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[1]/android.view.View[1][@content-desc='".$this->customer_details['work_order']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[1]/android.view.View[2][@content-desc='Work Order']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[2]/android.view.View[1][@content-desc='".$this->customer_details['technician_name']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[2]/android.view.View[2][@content-desc='Technician Information']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[3]/android.view.View[2][@content-desc='Service Level Agreement']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[4]/android.view.View[1][@content-desc='".$this->customer_details['email']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[4]/android.view.View[2][@content-desc='".$this->customer_details['phone']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[4]/android.view.View[3][@content-desc='Customer Information']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[1][@content-desc='".$this->customer_details['address_1']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[2][@content-desc='".$this->customer_details['address_2']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[3][@content-desc='".$this->customer_details['city']." ".$this->customer_details['state']." ".$this->customer_details['zip_code']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[4][@content-desc='".$this->customer_details['country']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[5][@content-desc='Address']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[6]/android.view.View[1]/android.view.View[1][@content-desc='".$this->customer_details['work_order_comments']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[6]/android.view.View[2][@content-desc='Work Order Comments']");
        $this->assertNotNull($el);

        /*
        *   Testing Edit button in work order screen & asserting the value after editing the work order/customer information.
        */
        $this->byName(' Edit')->click();
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Customer Form']");
        $this->assertNotNull($el);

        $el = $this->elements($this->using('class name')->value('android.widget.EditText'));
        

        /*
            Process for editing the values for work order & customer details.
            All these long process because when the value of the SLAs are null or '' extra android.widget.EditText is add to the view which produces problems for entering into other fields.

            This process enters 2 at the front of all the fields except for sla up & sla down fields.
        */
        $c = 12;
        $flag = 0;
        if($this->customer_details['sla_up'] === '') 
            $c++;

        if($this->customer_details['sla_down'] === '')
            $c++;

        if($this->customer_details['sla_up'] === '' && $this->customer_details['sla_down'] !== '') {
            $flag = 1;
        } elseif ($this->customer_details['sla_up'] !== '' && $this->customer_details['sla_down'] === '') {
            $flag = 2;
        } elseif ($this->customer_details['sla_up'] === '' && $this->customer_details['sla_down'] === '') {
            $flag = 3;
        }

        for($i=0; $i<=$c; $i++)
        {
            if($flag == 1) {
                if($i != 2 && $i != 3 && $i != 4) {
                    $el[$i]->click();
                    $this->keyEvent(122);
                    $this->keyEvent(9);
                    $this->hideKeyboard();
                }
            } elseif ($flag == 2) {
                if($i != 2 && $i != 3 && $i != 4) {
                    $el[$i]->click();
                    $this->keyEvent(122);
                    $this->keyEvent(9);
                    $this->hideKeyboard();
                }
            } elseif ($flag == 3) {
                if($i != 2 && $i != 3 && $i != 4 && $i != 5) {
                    $el[$i]->click();
                    $this->keyEvent(122);
                    $this->keyEvent(9);
                    $this->hideKeyboard();
                }
            } else {
                if($i != 2 && $i != 3) {
                    $el[$i]->click();
                    $this->keyEvent(122);
                    $this->keyEvent(9);
                    $this->hideKeyboard();
                }
            }
                
            
        }

        $this->byName('CONTINUE')->click();
        sleep(1);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.view.View[1]/android.view.View[1][@content-desc='Order Details']");
        $this->assertNotNull($el);


        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[1]/android.view.View[1][@content-desc='2".$this->customer_details['work_order']."']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[2]/android.view.View[1][@content-desc='2".$this->customer_details['technician_name']."']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[4]/android.view.View[1][@content-desc='2".$this->customer_details['email']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[4]/android.view.View[2][@content-desc='2".$this->customer_details['phone']."']");
        $this->assertNotNull($el);

        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[1][@content-desc='2".$this->customer_details['address_1']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[2][@content-desc='2".$this->customer_details['address_2']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[3][@content-desc='2".$this->customer_details['city']." 2".$this->customer_details['state']." 2".$this->customer_details['zip_code']."']");
        $this->assertNotNull($el);
        $el = $this->byXPath($this->basepath."/android.widget.ListView[1]/android.widget.ListView[5]/android.view.View[4][@content-desc='2".$this->customer_details['country']."']");
        $this->assertNotNull($el);


        /*
        *   Section 6.2 - Test Data
        */
        // Asserting AirScout button and checking if the clicking it leads to Test Setup page.
        $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2][@content-desc='AirScout']");
        $this->assertNotNull($el);
        $el->click();
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Test Setup']");
        $this->assertNotNull($el);
        $this->byName('  Back')->click();

        // Asserting Customer Gateway button and checking if the clicking it leads to Connect ASM page.
        $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[3][@content-desc='Customer Gateway']");
        $this->assertNotNull($el);
        $el->click();
        sleep(1);
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Connect ASM300']");
        $this->assertNotNull($el);
        $this->byName('  Back')->click();
        sleep(1);

        // Asserting Both button and checking if the clicking it leads to Connect ASM page.
        $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[4][@content-desc='Both']");
        $this->assertNotNull($el);
        sleep(1);
        $el->click();
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Connect ASM300']");
        $this->assertNotNull($el);
        $this->byName('  Back')->click();
        sleep(1);

        // Asserting the Work Order title after the edit.
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[4][@content-desc='2".$this->customer_details['work_order']."']");
        $this->assertNotNull($el);



        /*
        *   Section 6.3 - 
        */
        // Testing Save And Close button if it is unresponsive when no test are done.
        $this->byXPath($this->basepath."/android.view.View[3][@content-desc='SAVE AND CLOSE JOB']")->click();
        sleep(10);
        $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Work Order']");
        $this->assertNotNull($el);




        for($i=1; $i<=$this->details['test_loop']; $i++)
        {
            // Starting Airscout Test
            if($i <= $this->details['scroll_limit']) {
                $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2][@content-desc='AirScout']")->click();         
            } else {
                $this->byXPath($this->basepath."/android.view.View[5]/android.widget.ListView[1]/android.view.View[2][@content-desc='AirScout']")->click();
            }
            
            
            sleep(1);

            if($i==1) {
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

                // Asserting the text 'Step 1 of 3' next to the Back button.
                $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[3][@content-desc='Step 1 of 3']");
                $this->assertNotNull($el);

                // Checking to see if Start test button is disabled when there is no master and pucks on the floor.
                $this->byName('Start Test')->click();
                sleep(1);
                $el = $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.view.View[2][@content-desc='Test Setup']");
                $this->assertNotNull($el);

                $this->byXPath($this->basepath."/android.view.View[10]/android.view.View[2]/android.view.View[1][@content-desc='OK']")->click();
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
                        ->moveTo(['x' => $position_center_x, 'y' => ($position_center_y + 25)])
                        ->release()
                        ->perform();
                    sleep(2);

                }

                // Changing floor plan after adding devices.
                $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[1]")->click();
                sleep(1);
                $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[5]")->click();
                sleep(1);

                // Tapping on button 'USE FLOOR PLAN'.
                $this->byXPath($this->basepath."/android.view.View[10][@content-desc='USE FLOOR PLAN']")->click();
                sleep(1);

                // Draging Front Door on the Floor 1
                $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2]")->click();
                sleep(1);
                $el_1 = $this->byXPath($this->basepath.'/android.view.View[5]');
                $action = $this->initiateTouchAction();
                $action->longPress(['element' => $el_1])
                    ->moveTo(['x' => $position_center_x, 'y' => ($position_center_y + 45)])
                    ->release()
                    ->perform();
                sleep(2);
                $this->byXPath($this->basepath."/android.view.View[11]/android.view.View[2]/android.view.View[1]")->click();
                sleep(2);

                // Scrolling the Floor list.                
                $this->swipe($floorlist_center_x, $floorlist_center_y + 100, $floorlist_center_x, $floorlist_center_y - 100);
                sleep(1);

                // Scrolling the Isometric view of the floors.
                $this->byXPath($this->basepath."/android.view.View[4]")->click();
                sleep(1);
                $this->swipe($position_center_x, $position_center_y + 200, $position_center_x, $position_center_y - 200, 200);
                sleep(1);

                // Pressing 'Back' button and returning to the same page to see if all is ok.
                $this->byXPath($this->basepath."/android.view.View[2]/android.view.View[1]/android.widget.Button[1]")->click();
                sleep(1);
                $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2][@content-desc='AirScout']")->click();
                sleep(1);

                // Testing Section 8.5=>6
                // Tapping on NO
                $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[4]")->click();
                sleep(1);
                $this->byXPath($this->basepath."/android.view.View[11]/android.view.View[2]/android.view.View[1]")->click();
                sleep(1);

                // Tapping on YES & returning to the Test Setup page again.
                $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[4]")->click();
                sleep(1);
                $this->byXPath($this->basepath."/android.view.View[11]/android.view.View[2]/android.view.View[2]")->click();
                sleep(1);
                $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[1]")->click();
                sleep(1);
                $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2][@content-desc='AirScout']")->click();
                sleep(1);
            }
            
            // Tapping Start Test button.
            $this->byName('Start Test')->click();

            // Wait for test to be completed (about 4-7 minutes).
            sleep(60*$this->details['test_wait_time']);

            $this->byName('View Report')->click();
            sleep(1);
            $this->byName('CONTINUE')->click();
            sleep(1);

            // Add new test.
            $this->byXPath($this->basepath."/android.view.View[4]")->click();
            sleep(1);
        }



        /*
        *   Testing Add New Test button and close button for the scan type menu.
        */
        if($this->details['test_loop']<=2)
        {
            $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[2][@content-desc='AirScout']");
            $this->assertNotNull($el);
            $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[3][@content-desc='Customer Gateway']");
            $this->assertNotNull($el);
            $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[4][@content-desc='Both']");
            $this->assertNotNull($el);

            // close button for the scan type menu.
            $this->byXPath($this->basepath."/android.view.View[6]/android.view.View[1]")->click();
        } else {
            $el = $this->byXPath($this->basepath."/android.view.View[5]/android.widget.ListView[1]/android.view.View[2][@content-desc='AirScout']");
            $this->assertNotNull($el);
            $el = $this->byXPath($this->basepath."/android.view.View[5]/android.widget.ListView[1]/android.view.View[3][@content-desc='Customer Gateway']");
            $this->assertNotNull($el);
            $el = $this->byXPath($this->basepath."/android.view.View[5]/android.widget.ListView[1]/android.view.View[4][@content-desc='Both']");
            $this->assertNotNull($el);

            // close button for the scan type menu.
            $this->byXPath($this->basepath."/android.view.View[5]/android.view.View[2]/android.view.View[1]")->click();
        }
        sleep(1);
        


        /*
        *   Section 6.5 => 2
        *   Verify that navigating to Reports/Firmware/Settings tabs and back will not remove or alter tests already ran and listed. 
        */
        // Going to Settings tab & again back to Test tab.
        $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[4][@content-desc='Settings']")->click();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[1]/android.view.View[1][@content-desc='Test']")->click();
        sleep(1);

        if($this->details['test_loop']<=2) {
            $el = $this->byXPath($this->basepath."/android.widget.ListView[2]/android.view.View[1]");
            $this->assertNotNull($el);
        } else {
            $el = $this->byXPath($this->basepath."/android.view.View[5]/android.widget.ListView[1]/android.view.View[1]");
            $this->assertNotNull($el);
        }


        /*
        *   Disconnecting from AirScout Master device & connecting to the internet.
        */
        $this->keyEvent(3);
        sleep(1);
        $this->byName('Settings')->click();
        sleep(1);
        $this->byName('Wi-Fi')->click();
        sleep(1);
        $this->byName($this->details['ssid_master'])->click();
        sleep(1);
        $this->byName('Forget')->click();
        sleep(1);
        $this->byName('Wi-Fi')->click();
        sleep(1);
        $this->byName($this->details['ssid_wifi'])->click();
        sleep(1);
        $el = $this->byID('com.android.settings:id/password');
        $el->setText($this->details['ssid_wifi_password']);
        $this->byName('Connect')->click();
        $this->keyEvent(3);
        sleep(1);
        $this->byName($this->details['app_name'])->click();
        sleep(1);

        /*
        *   Save And Close section.
        */
        $this->byXPath($this->basepath."/android.view.View[3][@content-desc='SAVE AND CLOSE JOB']")->click();
        sleep(1);
        $this->byXPath($this->basepath."/android.view.View[7]/android.view.View[2]/android.view.View[2][@content-desc='YES']")->click();
        sleep(10);

        $this->byName('OK')->click();

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
    }
}

?>