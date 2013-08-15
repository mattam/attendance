<?php

class EloquentAttendanceRepositoryTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        $this->repo = App::make('EloquentAttendanceRepository');
    }

    public function testFindByIdReturnsModel()
    {
        $attendance = $this->repo->findById(1,1);
        $this->assertTrue($attendance instanceof Illuminate\Database\Eloquent\Model);
    }

    public function testFindAllReturnsCollection()
    {
        $attendances = $this->repo->findAll(1);
        $this->assertTrue($attendances instanceof Illuminate\Database\Eloquent\Collection);
    }

    public function testValidatePasses()
    {
        $reply = $this->repo->validate(array(
            'post_id'     => 1,
            'content'     => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.',
            'author_name' => 'Testy McTesterson'
        ));

        $this->assertTrue($reply);
    }

    public function testValidateFailsWithoutContent()
    {
        try {
            $reply = $this->repo->validate(array(
                'post_id'     => 1,
                'author_name' => 'Testy McTesterson'
            ));
        }
        catch(ValidationException $expected)
        {
            return;
        }

        $this->fail('ValidationException was not raised');
    }

    public function testValidateFailsWithoutAuthorName()
    {
        try {
            $reply = $this->repo->validate(array(
                'post_id'     => 1,
                'content'     => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.'
            ));
        }
        catch(ValidationException $expected)
        {
            return;
        }

        $this->fail('ValidationException was not raised');
    }

    public function testValidateFailsWithoutPostId()
    {
        try {
            $reply = $this->repo->validate(array(
                'author_name' => 'Testy McTesterson',
                'content'     => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.'
            ));
        }
        catch(ValidationException $expected)
        {
            return;
        }

        $this->fail('ValidationException was not raised');
    }

    public function testStoreReturnsModel()
    {
        $attendance_data = array(
            'content'     => 'Lorem ipsum Fugiat consectetur laborum Ut consequat aliqua.',
            'author_name' => 'Testy McTesterson'
        );

        $attendance = $this->repo->store(1, $attendance_data);

        $this->assertTrue($attendance instanceof Illuminate\Database\Eloquent\Model);
        $this->assertTrue($attendance->content === $attendance_data['content']);
        $this->assertTrue($attendance->author_name === $attendance_data['author_name']);
    }

    public function testUpdateSaves()
    {
        $attendance_data = array(
            'content' => 'The Content Has Been Updated'
        );

        $attendance = $this->repo->update(1, 1, $attendance_data);

        $this->assertTrue($attendance instanceof Illuminate\Database\Eloquent\Model);
        $this->assertTrue($attendance->content === $attendance_data['content']);
    }

    public function testDestroySaves()
    {
        $reply = $this->repo->destroy(1,1);
        $this->assertTrue($reply);

        try {
            $this->repo->findById(1,1);
        }
        catch(NotFoundException $expected)
        {
            return;
        }

        $this->fail('NotFoundException was not raised');
    }

    public function testInstanceReturnsModel()
    {
        $attendance = $this->repo->instance();
        $this->assertTrue($attendance instanceof Illuminate\Database\Eloquent\Model);
    }

    public function testInstanceReturnsModelWithData()
    {
        $attendance_data = array(
            'title' => 'Un-validated title'
        );

        $attendance = $this->repo->instance($attendance_data);
        $this->assertTrue($attendance instanceof Illuminate\Database\Eloquent\Model);
        $this->assertTrue($attendance->title === $attendance_data['title']);
    }

}