<?php
namespace App\Supports;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;

class DataHandler{
    public $data;
    public $validation_passed = true;
    public $errors = [];
    public $user = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate($rules)
    {
        $data = $this->data;
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            $this->validation_passed = false;
            $this->errors = $validator->errors()->all();
        }
        $this->validation_passed = true;
        return $this;
    }

    public function purify()
    {
        if($this->validation_passed)
        {
            $this->data = $this->clean($this->data);
        }

        return $this;

    }

    private function clean($data)
    {
        foreach ($data as $key => $value)
        {
            if (is_array($value))
            {
                $data[$key] = $this->clean($value);
            }
            else
            {
                $data[$key] = Purifier::clean($value);
            }
        }
        return $data;
    }

    public function get($key, $default = null)
    {
        if(!empty($this->data[$key]))
        {
            return $this->data[$key];
        }
        return $default;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function hash($key)
    {
        return Hash::make($this->get($key));
    }

    public function all()
    {
        return $this->data;
    }

    public function fromDateTime($key)
    {
        if($this->get($key))
        {
            return date('Y-m-d H:i:s', strtotime($this->get($key)));
        }

        return null;

    }
}
