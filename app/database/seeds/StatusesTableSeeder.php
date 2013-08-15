<?php

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('statuses')->truncate();

		$statuses = array(
			array(
				'code' => 'V',
				'description' => 'Present',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),				
				),
			array(
				'code' => 'A',
				'description' => 'Absent',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),				
				),
		);

		// Uncomment the below to run the seeder
		 DB::table('statuses')->insert($statuses);
	}

}
