<?php

namespace gabu\phpmvc;

use gabu\phpmvc\db\DbModel;


abstract class UserModel extends DbModel{
    abstract public function getDisplayName(): string;
    
}