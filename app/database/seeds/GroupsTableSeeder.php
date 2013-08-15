<?php

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('groups')->truncate();

		$groups = array(
			array(
				'name' => 'One Group',
				'room' => '201A',
				'leader_id' => '1',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),				
				),
			array(
				'name' => 'Two Group',
				'room' => '202A',
				'leader_id' => '2',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),				
				),
		);

		// Uncomment the below to run the seeder
		 DB::table('groups')->insert($groups);
	}

}
