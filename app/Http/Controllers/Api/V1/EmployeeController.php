<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;

class EmployeeController extends Controller
{

    public function getSearchBySalary($range = null)
    {
        $content = '<?xml version="1.0"?>';
        $content .= '<!DOCTYPE listin SYSTEM "LISTIN.DTD"> ';

        $message = '<message>Your request is not processed</message>';
        if (!is_null($range)) {
            try {
                $modelEmployee = new Employee();
                
                $dataRange = explode('-', $range);
                sort($dataRange);
                list($rangeMin, $rangeMax) = array_pad($dataRange, 2, null);
         
                $listEmployees = $modelEmployee->listByRangeSalary($rangeMin, $rangeMax);
      
                if ($listEmployees) {
                    $messageTemp = '<employees>';
                    foreach ($listEmployees as $row) {
                        $messageTemp .= '<employee>';
                        $messageTemp .= '<name>' . $row->name . '</name>';
                        $messageTemp .= '<email>' . $row->email . '</email>';
                        $messageTemp .= '<phone>' . $row->phone . '</phone>';
                        $messageTemp .= '<address>' . $row->address . '</address>';
                        $messageTemp .= '<position>' . $row->position . '</position>';
                        $messageTemp .= '<salary>$ ' . number_format($row->salary, 2, '.', ',') . '</salary>';
                        $messageTemp .= '<skills>';
                        if ($row->skills) {
                            $dataSkills = json_decode($row->skills, true);
                            foreach ($dataSkills as $rowSkill) {
                                $messageTemp .= '<skill>' . $rowSkill['skill'] . '</skill>';
                            }
                        }
                        $messageTemp .= '</skills>';
                        $messageTemp .= '</employee>';
                    }
                    $messageTemp .= '</employees>';
                    $message = $messageTemp;
                }
            } catch (Exception $ex) {
                $message = '<error>' . $ex->getMessage() . '</error>';
            }            
        }

        $content .= $message;

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

}