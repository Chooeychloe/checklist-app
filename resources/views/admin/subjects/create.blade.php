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
                    <h1 class="mb-0">Add Subject</h1>
                    <hr />
                    @if (session()->has('error') )
                    <div>
                        {{session('error')}}
                    </div>
                        
                    @endif                    
                    <p><a href="{{ route('admin/subjects') }}" class="btn btn-primary">Go Back</a></p>
                    <form action="{{ route('admin/subjects/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="subject_code" class="form-control"
                                    placeholder="Subject Code">
                                    @error('subject_code')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="subject_name" class="form-control"
                                    placeholder="Subject Name">
                                    @error('subject_name')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="credit_unit_lec" class="form-control"
                                    placeholder="Unit Lec">
                                    @error('credit_unit_lec')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="credit_unit_lab" class="form-control"
                                    placeholder="Unit Lab">
                                    @error('credit_unit_lab')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="contact_hrs_lec" class="form-control"
                                    placeholder="Contact Hrs Lec">
                                    @error('contact_hrs_lec')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="contact_hrs_lab" class="form-control"
                                    placeholder="Contact Hrs Lab">
                                    @error('contact_hrs_lab')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="pre_requisite" class="form-control"
                                    placeholder="Prerequisite">
                                    @error('pre_requisite')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="semester_yr_taken" class="form-control"
                                    placeholder="Semester & Year Taken">
                                    @error('semester_yr_taken')
                                    <span class="text-danger">{{$message}}</span>                                        
                                    @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="grade" class="form-control" placeholder="Grade">
                                @error('grade')
                                <span class="text-danger">{{$message}}</span>                                        
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="instructor" class="form-control" placeholder="Instructor">
                                @error('instructor')
                                <span class="text-danger">{{$message}}</span>                                        
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
