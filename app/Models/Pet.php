<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'pet_name',
        'animal_type',
        'pet_owner',
        'address'

    ];

    public function getId()
    {
        return $this->id;
    }

    public function getPetName()
    {
        return $this->pet_name;
    }

    public function getAnimalType()
    {
        return $this->animal_type;
    }

    public function getPetOwner()
    {
        return $this->pet_owner;
    }

    public function getAddress()
    {
        return $this->address;
    }

public function setPetName($value)
{
    $this->pet_name = $value;
    return $this->save();
}

public function setAnimalType($value)
{
    $this->animal_type = $value;
    return $this->save();
}

public function setPetOwner($value)
{
    $this->pet_owner = $value;
    return $this->save();
}

public function setAddress($value)
{
    $this->address = $value;
    return $this->save();
}

}
