@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('assproducts.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assproducts.update', $assproduct->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $assproduct->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <?php
            $student_name = DB::table("students")->where("id",$assproduct->students_id)->value("name");

            $project_name = App\models\Project::where("id",$assproduct->projects_id)->value("name");


?>
                <select name="students_id" class="form-control">
                <option value="{{ $assproduct->students_id }}">
                {{ $student_name }}
            </option>
         @foreach($students as $student)

            <option value="{{ $student->id }}">
                {{ $student->name }}
            </option>

         @endforeach

      </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <select name="projects_id" class="form-control">
                <option value="{{ $assproduct->projects_id }}">
                {{ $project_name }}
            </option>
            @foreach($projects as $project)

                <option value="{{ $project->id }}">
                    {{ $project->name }}
                </option>

            @endforeach

     </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection