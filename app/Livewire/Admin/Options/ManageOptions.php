<?php

namespace App\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;

class ManageOptions extends Component
{
    public $options;

    public $newOption = [
        'name' => '',
        'type' => 1,
        'features' => [
            [
                'name' => '',
                'value' => ''
            ]
        ]
    ];

    public $openModal = true;

    public function mount()
    {
        $this->options = Option::with('features')->get();
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
