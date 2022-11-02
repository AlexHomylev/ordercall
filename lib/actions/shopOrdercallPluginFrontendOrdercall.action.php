<?php

class shopOrdercallPluginFrontendOrdercallAction extends shopFrontendAction
{

    private $name;
    private $email;
    private $phone;
    private $timeCall;
    private $comment;

    public function execute()
    {
        if (wa()->getCaptcha()->isValid()) {
            $this->getOrderCallInfo();
            if (!$this->sendEmail()) echo 'Ошибка';
        }
    }

    private function getMessageText() {
        return " 
        Имя отправителя: $this->name \n
        Email: $this->email \n
        Телефон: $this->phone \n
        Время звонка:  $this->timeCall \n
        Коммент: $this->comment
        ";
    }

    private function getOrderCallInfo() {
        $this->name = waRequest::post()['name'];
        $this->email = waRequest::post()['email'];
        $this->phone = waRequest::post()['phone'];
        $this->timeCall = waRequest::post()['time_call'];
        $this->comment = waRequest::post()['comment'];
    }

    private function sendEmail() {
        $settings = wa('shop')->getPlugin('ordercall')->getSettings();
        $message = new waMailMessage('Новый заказ звонка на сайте', $this->getMessageText());
        return $message->setFrom($settings['email_from'])->setTo($settings['email_to'])->send();
    }
}