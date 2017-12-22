<?php
/**
 * Tests the TestCategoryController functions that store, edit and delete testCategories 
 * @author  (c) @iLabAfrica, Emmanuel Kitsao, Brian Kiprop, Thomas Mapesa, Anthony Ereng
 */
class TestCategoryControllerTest extends TestCase 
{
    /**
     * Initial setup function for tests
     *
     * @return void
     */
    public function setUp(){
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
        $this->setVariables();
    }

	/**
	 * Contains the testing sample data for the TestCategoryController.
	 *
	 * @return void
	 */
    public function setVariables()
    {
    	// Initial sample storage data
		$this->testCategoryData = array(
			'name' => 'Karasitlogy',
			'description' => 'Lets see',
		);

		
		// Edition sample data
		$this->testCategoryUpdate = array(
			'name' => 'Karasitology',
			'description' => 'I honestly have no idea',
		);
    }
	
	/**
	 * Tests the store function in the TestCategoryController
	 * @param  void
	 * @return int $testTestCategoryId ID of TestCategory stored; used in testUpdate() to identify test for update
	 */    
 	public function testStore() 
  	{
		echo "\n\nTEST CATEGORY CONTROLLER TEST\n\n";
  		 // Store the TestCategory
        Input::replace($this->testCategoryData);
        $testCategory = new TestCategoryController;
        $testCategory->store();
		$testCategorystored = TestCategory::orderBy('id','desc')->take(1)->get()->toArray();

		$testCategoriesSaved = TestCategory::find($testCategorystored[0]['id']);
		$this->assertEquals($testCategoriesSaved->name , $this->testCategoryData['name']);
		$this->assertEquals($testCategoriesSaved->description ,$this->testCategoryData['description']);
  	}

  	/**
  	 * Tests the update function in the TestCategoryController
	 * @param  void
	 * @return void
     */
	public function testUpdate()
	{
		// Update the TestCategory
        Input::replace($this->testCategoryData);
        $testCategory = new TestCategoryController;
        $testCategory->store();
		$testCategorystored = TestCategory::orderBy('id','desc')->take(1)->get()->toArray();

        Input::replace($this->testCategoryUpdate);
        $testCategory->update($testCategorystored[0]['id']);

		$testCategorySaved = TestCategory::find($testCategorystored[0]['id']);
		$this->assertEquals($testCategorySaved->name , $this->testCategoryUpdate['name']);
		$this->assertEquals($testCategorySaved->description ,$this->testCategoryUpdate['description']);
	}

	/**
  	 * Tests the update function in the TestCategoryController
	 * @param  void
	 * @return void
     */
	public function testDelete()
	{
        Input::replace($this->testCategoryData);
        $testCategory = new TestCategoryController;
        $testCategory->store();
		$testCategorystored = TestCategory::orderBy('id','desc')->take(1)->get()->toArray();

        $testCategory->delete($testCategorystored[0]['id']);

		$testCategoriesDeleted = TestCategory::withTrashed()->find($testCategorystored[0]['id']);
		$this->assertNotNull($testCategoriesDeleted->deleted_at);
	}
}