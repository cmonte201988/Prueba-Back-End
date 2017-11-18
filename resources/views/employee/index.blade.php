@extends('layouts.web')

@section('style-custom')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endsection

@section('script-custom')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function(){
            //--
            $('#tableEmployees').DataTable({
                "columnDefs": [ 
                    {
                        "targets": [ 0 ],
                        "searchable": false
                    },
                    {
                        "targets": [ 1 ],
                        "searchable": false
                    },
                    {
                        "targets": [ 3 ],
                        "searchable": false
                    },
                    {
                        "targets": [ 4 ],
                        "searchable": false
                    },
                    {
                        "targets": [ 5 ],
                        "searchable": false
                    },
                    {
                        "targets": [ 2 ],
                        "searchable": true
                    },                          
                ],
            });
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table" id="tableEmployees">
                    <thead> 
                        <tr> 
                            <th>#</th> 
                            <th>Name</th> 
                            <th>Email</th> 
                            <th>Position</th> 
                            <th>Salary</th> 
                            <th></th> 
                        </tr> 
                    </thead>
                    <tbody> 
                    @if($listEmployee)
                        @foreach($listEmployee as $index => $rowEmployee)
                            <tr> 
                                <td>{{ ($index + 1) }}</td> 
                                <td>{{ $rowEmployee->name }}</td> 
                                <td>{{ $rowEmployee->email }}</td> 
                                <td>{{ strtoupper($rowEmployee->position) }}</td> 
                                <td>$ {{ ($rowEmployee->salary) ? $rowEmployee->salary : 0 }}</td> 
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#preview{{ ($rowEmployee->id_user) }}">
                                    detail
                                    </button>
                                    <a type="button" class="btn btn-success" href="{{ route('employee.form', $rowEmployee->id_user) }}">
                                    edit
                                    </a>

                                    <div class="modal fade" id="preview{{ ($rowEmployee->id_user) }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Detail Employee</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td><strong>Name</strong></td><td>{{ $rowEmployee->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Email</strong></td><td>{{ $rowEmployee->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Phone</strong></td><td>{{ $rowEmployee->phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Address</strong></td><td>{{ $rowEmployee->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Position</strong></td><td>{{ strtoupper($rowEmployee->position) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Salary</strong></td><td>$ {{ ($rowEmployee->salary) ? $rowEmployee->salary : 0 }}</td>
                                                            </tr>                                                            
                                                            <tr>
                                                                <td><strong>Is online</strong></td>
                                                                <td>
                                                                    <span class="label label-{{ $rowEmployee->isOnline ? 'success' : 'danger' }}">{{ $rowEmployee->isOnline ? 'ACTIVE' : 'INACTIVE' }}</span>
                                                                </td>
                                                            </tr> 
                                                            <tr>
                                                                <td><strong>Skills</strong></td>
                                                                <td>
                                                                @if($rowEmployee->skills)
                                                                    @php
                                                                        $rowEmployee->skills = json_decode($rowEmployee->skills, true);
                                                                    @endphp
                                                                    <ul class="list-inline">
                                                                    @foreach($rowEmployee->skills as $rowSkill)
                                                                        <li><mark>{!! $rowSkill['skill'] !!}</mark></li>
                                                                    @endforeach
                                                                    </ul>
                                                                @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection