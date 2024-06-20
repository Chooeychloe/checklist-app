<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Subjects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Subject Lists</h1>
                        <a href="{{ route('admin/subjects/create')}}" class="btn btn-primary">Add Subjects</a>
                    </div>
                    <hr />
                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                        </div>                        
                    @endif

                    <table class="table table-hove">
                        <thead class="table-primary">
                            <tr>
                                <th>Subject Code</th>
                                <th>Subject Name</th>
                                <th>Unit Lec</th>
                                <th>Unit Lab</th>
                                <th>Hrs Lec</th>
                                <th>Hrs Lab</th>
                                <th>Prerequisite</th>
                                <th>Semester or Year Taken</th>
                                <th>Grade</th>
                                <th>Instructor</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subjects as $subject)
                            <tr>
                                <td class="align-middle">{{$subject->subject_code}}</td>
                                <td class="align-middle">{{$subject->subject_name}}</td>
                                <td class="align-middle">{{$subject->credit_unit_lec}}</td>
                                <td class="align-middle">{{$subject->credit_unit_lab}}</td>
                                <td class="align-middle">{{$subject->contact_hrs_lec}}</td>
                                <td class="align-middle">{{$subject->contact_hrs_lab}}</td>
                                <td class="align-middle">{{$subject->pre_requisite}}</td>
                                <td class="align-middle">{{$subject->semester_yr_taken}}</td>
                                <td class="align-middle">{{$subject->grade}}</td>
                                <td class="align-middle">{{$subject->instructor}}</td>
                                <td class="align-middle">
                                    <div class="btn-group" role="" aria-label="Basic example">
                                        <a href="{{ route('admin/subjects/edit', ['id'=>$subject->id])}}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/subjects/delete', ['id'=>$subject->id])}}" type="button" class="btn btn-danger">Delete</a>

                                    </div>
                                </td>


                            </tr>
                                
                            @empty
                                
                            <tr>
                                <td class="text-center" colspan="5">Subjects not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
