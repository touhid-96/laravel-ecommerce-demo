<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Laravel Eloquent ORM Feature:
     *
     * If we didn't explicitly specify the table name
     * Laravel will use the plural form of the model's class name to guess the table name.
     *
     * if our table name is different from the assumed default
     * We can manually specify the table name in the $table variable like this below
     *
     * Because of our table name is same as Laravel assumed default,
     * The db table is not necessary to be specified here.
     * But, we declared and specified the table anyway to stay out of the confusion.
     */
    protected $table = 'products';

    use HasFactory;
}
