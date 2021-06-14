<?php

namespace App\Http\Controllers;

use App\Models\route;
use App\Models\transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SalesmanController extends Controller
{
    //
    public function salesmanList()
    {
        echo "<h2>task 1</h2>";
        echo "<p>Using laravel and MYsql get the similar structure of JSON</p><br>";

        $route_data = route::all();
        $data_transaction = transaction::all();
        $route_data_decode = json_decode($route_data, true);

        // $qtodos = $mysqli->query("SELECT * FROM negocios");
        if ($route_data_decode !== '') {
            foreach ($route_data_decode as $data) {
                $json_data = array(
                    "data" => array(array(
                        "salesman" => array(
                            "route_id" => $data['id'],
                            "route_name" => $data['route_name'],
                            "route_no" => $data['route_no'],
                            "saleman_summary" => array(
                                "total_amount" => $data_transaction[0]['total_amount'],
                                "total_hour" => array(),
                            )
                        ),
                    ))



                );
            }
        }
        echo "<pre>";
        echo json_encode(json_decode(json_encode($json_data)), JSON_PRETTY_PRINT);
        echo "</pre>";


        echo "<br><h2>task 2</h2>";
        echo "<p>Suppose we have Profile have this Structure</p>";

        $id=1;
        $first_name='John';
        $last_name='Due';
        
        echo "Id= ". $id . "<br>";
        echo "first_name= ". $first_name  . "<br>";
        echo "last_name= ". $last_name . "<br>";


        echo "<p>we need to have this response </p>";

        $json2_data = array(
            "data" => array(
                "id"=>$id,
                "name"=>$first_name,
                "full_name"=> $first_name.' '.$last_name,
                "first_name"=> $first_name,
                "last_name"=> $last_name,


        ));

        echo "<pre>";
        echo json_encode(json_decode(json_encode($json2_data)), JSON_PRETTY_PRINT);
        echo "</pre>";



    }
}
