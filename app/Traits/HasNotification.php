<?php

namespace App\Traits;

trait HasNotification
{
    public $sweetSuccess = "sweet-success";
    public $sweetError = "sweet-error";
    public $sweetConfirm = "sweet-confirm";
    public $title, $text, $id, $icon, $footer;

    public function sweetSuccess($title, $text, $id = null, $icon = null, $footer = null)
    {   
        $this->dispatch($this->sweetSuccess, title: $title, text: $text);
        //footer: '<a href="#">Why do I have this issue?</a>'
    }

    public function sweetError($title, $text, $id = null, $icon = null, $footer = null)
    {   
        $this->dispatch($this->sweetError, title: $title, text: $text);
        //footer: '<a href="#">Why do I have this issue?</a>'
    }

    public function sweetConfirm($title, $text, $id = null, $icon = null, $footer = null)
    {   
        $this->dispatch($this->sweetConfirm, title: $title, text: $text, id: $id);
        //footer: '<a href="#">Why do I have this issue?</a>'
    }
}
