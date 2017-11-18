<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Flash;

class EmployeeController extends Controller
{

    public function index()
    {
        $data['listEmployee'] = Employee::orderBy('name', 'ASC')->get();

        return view('employee.index', $data);
    }

    public function form($id = NULL)
    {        
        $data['id'] = $id;
        $data['employee'] = Employee::where('id_user', $id)->first();
        $data['listSkills'] = [];
        
        if ($data['employee']) {
            $skills = json_decode($data['employee']->skills);
            if ($skills) {
                foreach ($skills as $row) {
                    $data['listSkills'][$row->skill] = $row->skill;
                }
            }
        }

        return view('employee.form', $data);
    }

    public function proccess(Request $request)
    {
        $message = "The employee registration can not be completed";
        $type = 'danger';

        try{
            DB::beginTransaction();

            $idUser = $request->input('id_user', NULL);
            $skill = $request->input('skill', NULL);
            $listSkills = [];

            if (!is_null($skill)) {
                foreach ($skill as $row) {
                    $listSkills[] = ['skill' => $row];
                }
            }
            
            $message = "The email is already registered";
            if (is_null($idUser)) {

                $verifyUniq = Employee::where('email', $request->input('email'))->first();
                if ($verifyUniq) {
                    Flash($message, $type);
                    return redirect()->route('employee.form');
                }

                $employee = new Employee();
                $data = [
                    'id' => md5(uniqid()),
                    'isOnline' => $request->input('isOnline', Employee::STATE_ONLINE_ACTIVE),
                    'salary' => number_format((!is_null($request->input('salary', null)) ? $request->input('salary', null): 0), 2, '.', ','),
                    'age' => $request->input('age', 0),
                    'position' => $request->input('position', null),
                    'name' => trim($request->input('name', null)),
                    'gender' => $request->input('gender', null),
                    'email' => $request->input('email', null),
                    'phone' => $request->input('phone', null),
                    'address' => $request->input('address', null),
                    'skills' => json_encode($listSkills)
                ];

                $employee = $employee->create($data);

                if (isset($employee->id_user)) {
                    DB::commit();

                    $message = "Employed registered!!";
                    $type = 'success';
                }
            } else {
                $employee = Employee::where('id_user', $idUser)->first();
                if (!$employee) {
                    Flash::message("There is no information for the id of the employee sent", $type);
                    return redirect()->route('employee.form');
                }

                $verifyUniq = Employee::where('email', $request->input('email'))->where('id_user', '<>', $employee->id_user)->first();
                if ($verifyUniq) {
                    Flash($message, $type);
                    return redirect()->route('employee.form');
                }

                $employee->isOnline = $request->input('isOnline', null);
                if ($request->input('salary', null) != $employee->salary)
                    $employee->salary = number_format((!is_null($request->input('salary', null)) ? $request->input('salary', null): 0), 2, '.', ',');
                
                $employee->age = $request->input('age', 0);
                $employee->position = $request->input('position', null);
                $employee->name = $request->input('name', null);
                $employee->gender = $request->input('gender', null);
                $employee->email = $request->input('email', null);
                $employee->phone = $request->input('phone', null);
                $employee->address = $request->input('address', null);
                $employee->skills = json_encode($listSkills);

                $employee->save();

                DB::commit();

                $message = "Employed updated!!";
                $type = 'success';
            }

        }catch(Exception $ex){
            $message = "ERROR: " . $ex->getMessage();
            $type = 'danger';
            DB::rollBack();
        }
        
        Flash::message($message, $type);
        return redirect()->route('employee.form', $employee->id_user);
    }

}

