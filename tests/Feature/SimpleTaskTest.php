<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\SimpleTaskController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SimpleTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSimpleTaskWithCorrectInput()
    {
        $simpleTaskController = new SimpleTaskController();
        $passedCondition = $simpleTaskController->index(15);
        $this->assertTrue($passedCondition);
    }

    public function testSimpleTaskWithIncorrectInput()
    {
        $simpleTaskController = new SimpleTaskController();
        $passedCondition = $simpleTaskController->index(5);
        $this->assertFalse($passedCondition);
    }

    public function testGetViewRequest()
    {
        $response = $this->get('/sum');
        $response->assertStatus(200);
    }

    public function testGetViewRender()
    {
        $view = $this->view('sum',  ['pagename' => 'Sum two numbers']);
        $view->assertSee('Sum two numbers');
    }

    public function testALittleMoreComplexFunction()
    {
        $a = 1;
        $b = 2;

        $request = Request::create('/sum', 'POST', [
            '_token' => 'LDsqf5Sa388WtT9xUF8L7BkfBNPbiUoojeagdiVd',
            'a' => $a,
            'b' => $b,
        ]);

        $simpleTaskController = new SimpleTaskController();
        $passedCondition = $simpleTaskController->sum($request) == ($a + $b);

        $this->assertTrue($passedCondition);
    }
}
