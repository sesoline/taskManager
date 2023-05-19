<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Task;
use App\Http\Controllers\TaskController;

class taskUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function test_to_know_if_taskController_is_modifying_data()
    {

        
        $test = 1;
        $taskController = new TaskController();


  +request: Symfony\Component\HttpFoundation\ParameterBag {#36 ▼
    #parameters: array:5 [▼
      "Name" => "sadasd lihkjg,hmfgndbfn"
      "Detail" => "op[ipugyfjhvbkln;m,/."
      "Deadline" => "2023-05-10"
      "Completed" => false
      "User_id" => 11
    ]
  }
        $_REQUEST['name'] = 'aaaaa'
        $_REQUEST['Det']

        $taskController->store();



        // // We are going to test if controller is saving ok
        // $data = Task::factory()->create([
        //     'Name'      => 'Imprimir informes',
        //     'Detail'    => 'Imprimir informes del consejo academico con formato 5',
        //     //'Deadline'  => '20/04/2023',
        //     'Completed' => false,
        //     'User_id'   => 12,
        // ]);

        // $controller = new TaskController();

        // $result = $controller->store($data);

        // $this->assertEquals($data->Name, $result['Name']);
        // $this->assertEquals($data->Detail, $result['Detail']);

        
         
                // $task = new Task();
                // $product->Name = 'lorem ispum';
                // $product->Detail = 'dansm lorem ispum okaste';
                // $product->deadline = date('2020-12-12');
                // $product->Completed = true;
                // $product->save();

                // $this->assertDatabaseHas('products', [                
                //     'Name' => 'lorem ispum',
                //     'Detail' => 'dansm lorem ispum okaste',
                //     'Deadline' => date('2020-12-12'),
                //     'Completed' => true,
                    
                // ]);
         

    
    }
}
