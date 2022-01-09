<?php

namespace Wahdam\LivewireModal;

use Illuminate\Support\Arr;
use Livewire\Component;

abstract class LivewireModal extends Component
{
    public bool $isOpen = false;

    public $attributes = [];

    protected $listeners = [
        'toggleModal' => 'toggleModal',
    ];

    abstract public function title(): String;

    abstract public function content(): String;

    public function beforeOpen()
    {
    }

    /**
     * Toggle the modal
     *
     * @return void
     */
    public function toggleModal($data)
    {
        if ($this->getNameClass() === $data['name']) {
            $this->attributes = array_merge($this->attributes, Arr::except($data, ['name']));

            if (is_callable([$this, 'beforeOpen'])) {
                $this->beforeOpen();
            }

            $this->isOpen = ! $this->isOpen;
        }
    }

    public function getNameClass()
    {
        $path = explode('\\', get_class($this));

        return array_pop($path);
    }

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function render()
    {
        return view('livewire-modal::modal')
            ->with([
                'title' => $this->title(),
                'content' => $this->content(),
            ]);
    }
}
