<?php

namespace Users\Model;

class Users {

    public $id;
    public $name;
    public $email;
    public $mobile;
    public $address;

    public function exchangeArray($data) {

        $this->id = (!empty($data['id'])) ? $data['id'] : null;

        $this->name = (!empty($data['name'])) ? $data['name'] : null;

        $this->email = (!empty($data['email'])) ? $data['email'] : null;

        $this->mobile = (!empty($data['mobile'])) ? $data['mobile'] : null;

        $this->address = (!empty($data['address'])) ? $data['address'] : null;
    }

    public function getArrayCopy() { return get_object_vars($this); }

}
 