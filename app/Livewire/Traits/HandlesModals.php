<?php

namespace App\Livewire\Traits;

trait HandlesModals
{
    public function openModal(string $id)
    {
        $this->js("window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: '$id' } }))");
    }

    public function closeModal(string $id)
    {
        $this->js("window.dispatchEvent(new CustomEvent('close-modal', { detail: { id: '$id' } }))");
    }
}
