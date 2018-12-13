<?php
require "config.php";
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;



Capsule::schema()->dropIfExists('categories');
Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->string('CategoryName');
    $table->string('CategoryText');
});

Capsule::schema()->dropIfExists('products');
Capsule::schema()->create('products', function (Blueprint $table) {
    $table->increments('id');
    $table->string('ProductName');
    $table->integer('categories');
    $table->integer('Price');
    $table->string('Photo');
    $table->string('Text');
});
header( 'Location: '. 'index.php' );

?>
<script type="text/javascript">
window.onload = function () {
    document.getElementById("entry_form").reset();
}
</script>