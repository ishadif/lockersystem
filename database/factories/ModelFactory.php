<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'id' => $faker->numberBetween($min = 100, $max = 1000),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->name
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'label' => $faker->name
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\StudyProgram::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Student::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'id' => $faker->unique()->numberBetween($min = 100, $max = 1000000),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\RentalsSubmission::class, function (Faker\Generator $faker) {
	return [
    	'student_id' => function () {
    		return factory(App\Student::class)->create()->id;
    	}
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Sewa::class, function (Faker\Generator $faker) {
    return [
        'rental_submission_id' => function () {
            return factory(App\RentalsSubmission::class)->create(['approved' => true])->id;
        },
        'student_id' => function (array $sewa) {
            return App\RentalsSubmission::find($sewa['rental_submission_id'])->student_id;
        },
        'locker_id' => function () {
            return factory(App\Locker::class)->create()->id;
        },
        'status' => 'pembayaran'
    ];
});

$factory->state(App\Sewa::class,'pengambilan kunci', function($faker){
    return [
        'status' => 'pengambilan kunci'
    ];
});

$factory->state(App\Sewa::class,'berjalan', function($faker){
    return [
        'status' => 'berjalan',
        'starts_date' => Carbon\Carbon::now(),
        'ends_date' => Carbon\Carbon::now()->addYear(),
    ];
});

$factory->state(App\Sewa::class,'selesai', function($faker){
    return [
        'status' => 'selesai',
        'starts_date' => Carbon\Carbon::subYear(),
        'ends_date' => Carbon\Carbon::now(),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\MaintenancesSubmission::class, function (Faker\Generator $faker) {

    return [
        'sewa_id' => function() {
            return factory(App\Sewa::class)->states('berjalan')->create()->id;
        },
        'student_id' => function(array $submission) {
            return App\Sewa::find($submission['sewa_id'])->student_id;
        },
        'locker_id' => function(array $submission) {
            return App\Sewa::find($submission['sewa_id'])->locker_id;
        },
        'maintenance_type' => $faker->word,
        'description' => $faker->paragraph
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Maintenance::class, function (Faker\Generator $faker) {
    return [
        'maintenances_submission_id' => function() {
            return factory(App\MaintenancesSubmission::class)->create([
                'approved' => true
            ])->id;
        },
        'student_id' => function(array $maintenance) {
            return App\MaintenancesSubmission::find($maintenance['maintenances_submission_id'])->student_id;
        },
        'locker_id' => function(array $maintenance) {
            return App\MaintenancesSubmission::find($maintenance['maintenances_submission_id'])->locker_id;
        },
        'sewa_id' => function(array $maintenance) {
            return App\MaintenancesSubmission::find($maintenance['maintenances_submission_id'])->sewa_id;
        },
        'maintenance_type' => function(array $maintenance) {
            return App\MaintenancesSubmission::find($maintenance['maintenances_submission_id'])->maintenance_type;
        },
        'status' => $faker->word
    ];
});

$factory->state(App\Maintenance::class, 'selesai', function($faker) {
    return [
        'status' => 'selesai',
        'starts_date' => Carbon::now()->subWeek(),
        'ends_date' => Carbon::now()
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\MaintenancePayment::class, function (Faker\Generator $faker) {

    return [
        'maintenance_id' => function() {
            return factory(App\Maintenance::class)->create([
                'status' => 'pembayaran'
            ])->id;
        },
        'student_id' => function(array $payment) {
            return App\Maintenance::find($payment['maintenance_id'])->student_id;
        },
        'fee' => 20000
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Locker::class, function (Faker\Generator $faker) {
    return [
        'id' => "STD-{$faker->numberBetween($min = 100, $max = 1000)}"
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Sewa::class, function (Faker\Generator $faker) {
    return [
        'student_id' => function () {
            return factory(App\Student::class)->create()->id;
        },
        'rental_submission_id' => function () {
            return factory(App\RentalsSubmission::class)->create()->id;
        },
        'locker_id' => function () {
            return factory(App\Locker::class)->create()->id;
        },
        'status' => 'pembayaran'
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\RentalPayment::class, function (Faker\Generator $faker) {
    return [
        'sewa_id' => function() {
            return factory(App\Sewa::class)->create([
                'rental_submission_id' => function() {
                    return factory(App\RentalsSubmission::class)->create([
                        'approved' => true,
                        'processed_at' => Carbon\Carbon::now()
                    ])->id;
                },
                'status' => 'berjalan',
                'starts_date' => Carbon\Carbon::now(),
                'ends_date' => Carbon\Carbon::now()->addYear()
            ])->id;
        },
        'fee' => 50000
    ];
});
