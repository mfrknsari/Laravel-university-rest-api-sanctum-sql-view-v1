<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_students
            AS
            SELECT
	schools.`id` AS school_id,
	schools.`name` AS school_name,
	campuses.`name` AS campuses_name,
	countries.`name` AS countries_name,
	countries.country_code,
	students.id,
	students.`name`,
	students.surname,
	students.email,
	students.phone,
	students.`no`
    FROM
	schools
	INNER JOIN campuses ON schools.id = campuses.school_id
	INNER JOIN countries ON campuses.country_id = countries.id
	INNER JOIN students ON campuses.id = students.campuses_id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ogrenci_view');
    }
};
