<?php

    namespace MyFirstPackage\Models;

    class Config {
        public function __construct()
        {
            $this->DB_HOST = "localhost";
            $this->DB_USER = "root";
            $this->DB_PASS = "";
            $this->DB_NAME = "sweda";
        }
    }
 