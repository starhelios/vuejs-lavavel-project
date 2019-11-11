<?php
namespace App\Traits;

trait HasLabel {

    public function getLabelAttribute()
    {
        $label = "";
        $i = 0;
        foreach( $this->data as $key => $item ) {
            if($i !== 0) {
                $label .= '_';
            }
            $label .= $item;
            $i++;
        }
        return $label;
    }
}