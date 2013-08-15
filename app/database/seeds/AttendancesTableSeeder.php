<?php

class AttendancesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('attendances')->truncate();

		$attendances = array(
			array(
				'user_id' => '1',
				'status_id' => '1',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),				
				),
			array(
				'user_id' => '2',
				'status_id' => '1',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),				
				),
		);

		// Uncomment the below to run the seeder
		 DB::table('attendances')->insert($attendances);
	}

}
