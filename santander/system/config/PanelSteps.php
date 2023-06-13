<?php
class PanelSteps {
    public $steps  = [];
    public $labels = [];
    public $options = [];

    public function addLabel($status, $label) {
        $this->labels[$status] = [
            'status' => $status, 
            'button_selected' => '<button type="button" class="btn btn-secondary btn-sm" >'.$label.'</button>',
        ];
    }


    /**
    * @param string $function static | generic| dinamic
    * @param string $type error | empty | expired
    * @param array  $button type : {button, link} in case of type link need a target value
    */
    public function addStep($name, $function = 'static', $status, $user_id, $dbValue, $type, $label, $button = ['type' => 'button']) {
        $this->addLabel($status, $label);

        $buttonClass = '';
        switch ($type) {
            case 'error': $buttonClass = 'btn-danger'; break;
            case 'empty': $buttonClass = 'btn-info'; break;
            case 'expired': $buttonClass = 'btn-warning'; break;
            default: $buttonClass = 'btn-secondary'; break;
        }

        $btn = '';
        switch ($button['type']) {
            case 'link':
                $btn = '<a href="'.$button['target'].'='.$user_id.'&step='.$status.'"><button type="button" class="btn '.$buttonClass.' btn-sm" >'.$label.'</button></a>';
                break;
            default:
                $btn = '<a href="?step='.$status.'&id='.$user_id.'"><button type="button" class="btn '.$buttonClass.' btn-sm" >'.$label.'</button></a>';
                break;
        }

        if (!isset($this->steps[$name])) {
            $this->steps[$name] = [
                $type => [
                    'status'  => $status, 'label'   => $label, 
                    'user_id' => $user_id, 'function' => $function,
                    'button' => $btn,
                ]
            ];
        } else {
            $addStep = false;

            switch ($function) {
                case 'dinamic':
                    if (count($this->steps[$name]) >= 1 && !empty($dbValue)) {
                        $addStep = true;
                        foreach ($this->steps[$name] as $key => $value) {
                            if ($value['function'] == 'generic') unset($this->steps[$name][$key]);
                        }
                    }
                    break;
                case 'generic':
                    $addStep = true;
                    break;
                case 'static':
                    $addStep = true;
                    break;
        }
            if ($addStep) {
                $this->steps[$name][$type] = [
                    'status'  => $status, 'label'   => $label, 
                    'user_id' => $user_id, 'function' => $function,
                    'button' => $btn,
                ];
            }
        }
    }

    public function clearSteps() {
        unset($this->steps);
    }

    /**
    * @param string $buttonClass success | danger| info | warning
    */
    public function addOption($status, $user_id, $label, $buttonClass = 'success') {
        $this->addLabel($status, $label);
        switch ($buttonClass) {
            case 'danger': $buttonClass = 'btn-danger'; break;
            case 'info': $buttonClass = 'btn-info'; break;
            case 'warning': $buttonClass = 'btn-warning'; break;
            case 'success': $buttonClass = 'btn-success'; break;
            default: $buttonClass = 'btn-secondary'; break;
        }
        $this->options[] = [
            'status' => $status, 
            'button' => '<a href="?step='.$status.'&id='.$user_id.'"><button type="button" class="btn '.$buttonClass.' btn-sm" >'.$label.'</button></a>',
        ];
    }

    public function showOptions($status) {
        $result = '';
        $parseOptions = [0 => '<br>'];
        foreach ($this->options as $value) {
            if ($value['status'] != $status) {
                $parseOptions[] = $value['button'];
            }
        }

        if (count($parseOptions) <= 2) unset($parseOptions[0]);
        foreach ($parseOptions as $value) {
            $result .= $value;
        }

        return $result;
    }

    public function clearOptions() {
        unset($this->options);
    }

    public static function showResult($result) {
        return ($result) ?? '<b style="color: red">N/A</b>';
    }
}