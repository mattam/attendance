<?php

class GroupsControllerTest extends TestCase {

    /**
     * Test Basic Route Responses
     */
    public function testIndex()
    {
        $response = $this->call('GET', route('v1.groups.index'));
        $this->assertTrue($response->isOk());
    }

    public function testShow()
    {
        $response = $this->call('GET', route('v1.groups.show', array(1)));
        $this->assertTrue($response->isOk());
    }

    public function testCreate()
    {
        $response = $this->call('GET', route('v1.groups.create'));
        $this->assertTrue($response->isOk());
    }

    public function testEdit()
    {
        $response = $this->call('GET', route('v1.groups.edit', array(1)));
        $this->assertTrue($response->isOk());
    }

    /**
     * Test that controller calls repo as we expect
     */
    public function testIndexShouldCallFindAllMethod()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('findAll')->once()->andReturn('foo');
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('GET', route('v1.groups.index'));
        $this->assertTrue(!! $response->original);
    }

    public function testShowShouldCallFindById()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('findById')->once()->andReturn('foo');
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('GET', route('v1.groups.show', array(1)));
        $this->assertTrue(!! $response->original);
    }

    public function testCreateShouldCallInstanceMethod()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('instance')->once()->andReturn(array());
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('GET', route('v1.groups.create'));
        $this->assertViewHas('Group');
    }

    public function testEditShouldCallFindByIdMethod()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('findById')->once()->andReturn(array());
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('GET', route('v1.groups.edit', array(1)));
        $this->assertViewHas('Group');
    }

    public function testStoreShouldCallStoreMethod()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('store')->once()->andReturn('foo');
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('POST', route('v1.groups.store'));
        $this->assertTrue(!! $response->original);
    }

    public function testUpdateShouldCallUpdateMethod()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('update')->once()->andReturn('foo');
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('PUT', route('v1.groups.update', array(1)));
        $this->assertTrue(!! $response->original);
    }

    public function testDestroyShouldCallDestroyMethod()
    {
        $mock = Mockery::mock('GroupRepositoryInterface');
        $mock->shouldReceive('destroy')->once()->andReturn(true);
        App::instance('GroupRepositoryInterface', $mock);

        $response = $this->call('DELETE', route('v1.groups.destroy', array(1)));
        $this->assertTrue( empty($response->original) );
    }

}