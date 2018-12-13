<?php
require './vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'mvctask',
    'username'  => 'mysql',
    'password'  => 'mysql',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

class Products extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('Category');
    }
}
class Category extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
}
class Photo extends Illuminate\Database\Eloquent\Model
{

}