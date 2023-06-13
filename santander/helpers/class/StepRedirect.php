<?php
class StepRedirect
{
    public $status = 0;
    public $steps = [];
    public $timeToRedirect = 3;

    #function to set a status value
    public function setStatus($status) {
        $this->status = $status;
    }

    public function setStep($stepStatus, $redirect, $actionType = 'N/A', $actionValue = NULL) {
        $this->steps[$stepStatus] = ['redirect' => $redirect, $actionType => $actionValue];
    }

    #function to set the time of the redirect ot recharge the page
    public function setTimeToRedirect(int $timeToRedirect) {
        $this->timeToRedirect = $timeToRedirect;
    }

    public function redirect($url) {
        header("location: ".$url."");
    }

    public function refresh() {
        header("Refresh: ".$this->timeToRedirect."");
    }

    public function start($debug = FALSE) {
        $refresh = TRUE;
        foreach ($this->steps as $step => $value) {
            if ($step == $this->status) {
                $refresh = FALSE;
                if (!empty($value['update'])) $_SESSION['update'] = $value['update'];
                if (!empty($value['error'])) $_SESSION['error'] = $value['error'];
                $debugging = ($debug) ? print('redirect to : '.$value['redirect'].'<br>') : $this->redirect($value['redirect']);
            }
        }
        if ($refresh) {
            $debugging = ($debug) ? print('refresh : '.$this->timeToRedirect.'<br>') : $this->refresh();
        }
    }
}