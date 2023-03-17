<?php
namespace App\Http\Controllers;

use App\Models\Assproduct;
use App\Models\Student;
use App\Models\Project;
use Illuminate\Http\Request;

class AssproductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assproducts = Assproduct::latest()->paginate(5);

        return view('assproducts.index', compact('assproducts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function create()
    {
        // return view('assproducts.create');
         $students = Student::get();
         $projects = Project::get();

        return view('assproducts.create', compact('students','projects'));

         

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'students_id' => 'required',
            'projects_id' => 'required'
        ]);

        Assproduct::create($request->all());

        return redirect()->route('assproducts.index')
            ->with('success', 'assproduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assproduct  $assproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Assproduct $assproduct)
    {
        return view('assproducts.show', compact('assproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assproduct  $assproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Assproduct $assproduct)
    {
        // return view('assproducts.edit', compact('assproduct'));

        $students = Student::get();
         $projects = Project::get();

        return view('assproducts.edit', compact('assproduct','students','projects'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assproduct  $assproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assproduct $assproduct)
    {
        $request->validate([
            'name' => 'required',
            'students_id' => 'required',
            'projects_id' => 'required'
            
        ]);
        $assproduct->update($request->all());

        return redirect()->route('assproducts.index')
            ->with('success', 'assproduct updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assproduct  $assproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assproduct $assproduct)
    {
        $assproduct->delete();

        return redirect()->route('assproducts.index')
            ->with('success', 'assproduct deleted successfully');
    }
}
