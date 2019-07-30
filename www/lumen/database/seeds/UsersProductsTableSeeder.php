<?php

use App\UsersProducts;
use Illuminate\Database\Seeder;

class UsersProductsTableSeeder extends Seeder
{

    /**
     * DB table name
     *
     * @var string
     */
    protected $table;

    /**
     * CSV filename
     *
     * @var string
     */
    protected $filename;

    /**
     * Constructor
     */
    public function __construct(){

        $this->table = 'users_products';
        $this->filename = base_path('database/seeds/csv/usersproducts.csv');

    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$products = factory(Product::class, 10)->create();
        DB::table($this->table)->delete();
        $seedData = $this->seedFromCSV($this->filename, ',');
        DB::table($this->table)->insert($seedData);
    }


    /**
     * Collect data from a given CSV file and return as array
     *
     * @param $filename
     * @param string $deliminator
     * @return array|bool
     */
    private function seedFromCSV($filename, $delimitor = ",")
    {
        if(!file_exists($filename) || !is_readable($filename))
        {
            return FALSE;
        }
 
        $header = NULL;
        $data = array();
 
        if(($handle = fopen($filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, 1000, $delimitor)) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
 
        return $data;
    }
}