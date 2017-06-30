<?php
/**
 * Created by PhpStorm.
 * User: bmabi
 * Date: 6/29/2017
 * Time: 11:48 AM
 */


namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    //Only Guard the database input that is sensitive
    protected $guarded=['id'];

}