<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Edit Subject</h1>
                    <hr />
                    <form action="{{route('admin/subjects/update',$subjects->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">
                                    Subject Code
                                </label>
                                <input type="text" name="subject_code" class="form-control" placeholder="Subject Code" value="{{$subjects->subject_code}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">
                                    Subject Name
                                </label>
                                <input type="text" name="subject_name" class="form-control" placeholder="Subject Name" value="{{$subjects->subject_name}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">
                                     Grade
                                </label>
                                <input type="text" name="grade" class="form-control" placeholder="Grade" value="{{$subjects->grade}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">
                                    Instructor
                                </label>
                                <input type="text" name="instructor" class="form-control" placeholder="Instructor" value="{{$subjects->instructor}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-warning">Update</button>
                                 </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
