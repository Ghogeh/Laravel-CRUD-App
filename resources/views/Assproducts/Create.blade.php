@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Assign Projects to Students</h2>
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
    <form action="{{ route('assproducts.store') }}" method="POST" >
        @csrf

   


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Supervisor Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Class:</strong>
                    <textarea class="form-control" style="height:50px" name="class"
                        placeholder="Class"></textarea>
                </div>
                 -->

                 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <select name="students_id" class="form-control">
         <option>
            Select Student
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
            <option>
                    Select project
            </option>
            @foreach($projects as $project)

                <option value="{{ $project->id }}">
                    {{ $project->name }}
                </option>

            @endforeach

     </select>
                </div>
            </div>
               
    
     <br>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Assign</button>
            </div>
        </div>

        

    </form>
@endsection