<?php

namespace App\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;

class ManageOptions extends Component
{
    public $options;

    public $newOption = [
        'name' => '',
        'type' => 2,
        'features' => [
            [
                'value' => '',
                'description' => ''
            ]
        ]
    ];

    public $openModal = true;

    public function mount()
    {
        $this->options = Option::with('features')->get();
    }

    public function addFeature()
    {
        $this->newOption['features'][] = [
            'value' => '',
            'description' => ''
        ];
        
    }

    public function removeFeature($index)
    {
        unset($this->newOption['features'][$index]);
        $this->newOption['features'] = array_values($this->newOption['features']);
        
    }

    public function addOption() 
    {
        $rules = [
            'newOption.name' => 'required',
            'newOption.type' => 'required|in:1,2',
            'newOption.features' => 'required'
        ];

        foreach ($this->newOption['features'] as $index => $feature) {
            // $rules['newOption.features.' . $index . '.value'] = 'required';
            if ($this->newOption['type'] == 1) {
                $rules['newOption.features.' . $index . '.value'] = 'required';
            } else {
                //color
                $rules['newOption.features.' . $index . '.value'] = 'required|regex:/^#([0-9a-fA-F]{3}|[0-9a-fA-F]{6})$/';
            }
            
            $rules['newOption.features.' . $index . '.description'] = 'required';
        }

    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
