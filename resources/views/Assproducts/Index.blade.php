@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Assignment </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('assproducts.create') }}" title="Create a assproduct"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>STUDENT</th>
            <th>PROJECT</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($assproducts as $assproduct)
            <?php
            $student_name = DB::table("students")->where("id",$assproduct->students_id)->value("name");

            $project_name = App\models\Project::where("id",$assproduct->projects_id)->value("name");


           





            ?>

            
            >
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $assproduct->name }}</td>
                <td>{{ $student_name}}</td>
                <td>{{ $project_name}}</td>
               
                <td>{{ date_format($assproduct->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('assproducts.destroy', $assproduct->id) }}" method="POST">

                        <a href="{{ route('assproducts.show', $assproduct->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('assproducts.edit', $assproduct->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $assproducts->links() !!}

@endsection
