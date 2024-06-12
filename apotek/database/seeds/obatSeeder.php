<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class obatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();
        for($i=0;$i<100;$i++){
            DB::table('obat')->insert([
                'namaObat' => $faker->word(),
                'jenisObat' => $faker->word(),
                'dosis' =>$faker->randomNumber(),
                'harga' => $faker->randomNumber(),
                'tanggalProduksi' =>$faker->date(),
                'tanggalKadaluarsa' => $faker->date(),
                'gambarObat' =>$faker->url()
            ]);
        }
    }
}
