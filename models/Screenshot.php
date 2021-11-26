<?php

class Screenshot
{
    private $id;
    private $name;
    private $date;
    private $img;

    /**
     * @param $id
     * @param $name
     * @param $date
     * @param $img
     */
    public function __construct($id, $name, $date, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->img = $img;
    }


}