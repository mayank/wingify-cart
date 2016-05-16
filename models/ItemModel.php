<?php

namespace Model;


class ItemModel
{
    public function toArray()
    {
        return array(
            'id' => $this->itemId,
            'name' => $this->itemName,
            'details' => json_decode( $this->details, true )
        );
    }
}


 ?>
