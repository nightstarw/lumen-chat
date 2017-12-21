<?php
namespace App\Libraries;

use MongoDB\Client;

class MongoDB
{
    protected $table = "tadpole";

    protected $mongo;

    public function __construct()
    {
        $this->setMongo();
        $db = $this->mongo->pad;

        $table = $this->table;

        $this->model = $db->$table;
    }

    public function setGender($id)
    {
        $gender = rand(0, 1);

        $this->model->updateOne(
            ['id' => $id],
            [
                '$set' => [
                    'gender'    => $gender
                ]
            ],
            ['upsert' => true]
        );
    }

    public function getGender($id)
    {
        return $this->model->findOne(['id' => $id])->gender;
    }

    protected function setMongo()
    {
        $mongo = new Client();
        $this->mongo = $mongo;
    }
}