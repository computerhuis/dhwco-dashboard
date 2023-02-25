<?php

class BaliePersoon
{
    public function __construct(array $properties = array())
    {
        foreach ($properties as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function volledig_naam()
    {
        $naam = $this->voornaam;
        if (isset($this->tussenvoegels) && !is_blank($this->tussenvoegels)) {
            $naam = $naam . ' ' . $this->tussenvoegels;
        }
        return $naam . ' ' . $this->achternaam;
    }
}

?>
