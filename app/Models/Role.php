<?php

namespace App\Models;

use Kreait\Firebase\Factory;

class Role
{
    protected $database;

    public function __construct(Factory $factory)
    {
        $this->database = $factory->createDatabase();
    }

    public function all()
    {
        return $this->database->getReference('roles')->getValue();
    }

    public function find($id)
    {
        return $this->database->getReference('roles/' . $id)->getValue();
    }

    public function create(array $data)
    {
        return $this->database->getReference('roles')->push($data);
    }

    public function update($id, array $data)
    {
        return $this->database->getReference('roles/' . $id)->update($data);
    }

    public function delete($id)
    {
        return $this->database->getReference('roles/' . $id)->remove();
    }
}