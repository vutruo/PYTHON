<?php

namespace App\Http\Controllers;
use App\Models\Issue;
use App\Models\Computer; // Thêm dòng này để import đúng lớp Computer



use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
{
    // Backend validation to ensure data is valid before storing
    $request->validate([
        'computer_id' => 'required|exists:computers,id', // Ensure the computer exists
        'reported_by' => 'nullable|string|max:50', // Optional but limited in length
        'reported_date' => 'required|date', // Ensure the date is valid
        'description' => 'required|string', // Description is mandatory and must be a string
        'urgency' => 'required|in:Low,Medium,High', // Must be one of the predefined values
        'status' => 'required|in:Open,In Progress,Resolved', // Must be one of the predefined values
    ]);

    // If validation passes, store the issue
    Issue::create($request->all());

    // Redirect to the index page with a success message
    return redirect()->route('issues.index')->with('success', 'Issue added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $issue = Issue::findOrFail($id);

        // Truyền biến $issue vào view
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id)
{
    // Truy vấn bản ghi Issue dựa trên id
    $issue = Issue::findOrFail($id);

    // Truy vấn tất cả các bản ghi Computer
    $computers = Computer::all();

    // Truyền dữ liệu vào view
    return view('issues.edit', compact('issue', 'computers'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Fetch the issue by ID
    $issue = Issue::findOrFail($id); // This will fetch the Issue model by its ID

    // Validate the request data
    $request->validate([
        'computer_id' => 'required|exists:computers,id',
        'reported_by' => 'nullable|string|max:50',
        'reported_date' => 'required|date',
        'description' => 'required|string',
        'urgency' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Open,In Progress,Resolved',
    ]);

    // Update the issue with the validated data
    $issue->update($request->all());

    // Redirect to the issues list with a success message
    return redirect()->route('issues.index')->with('success', 'Issue updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
{
    // Truy vấn bản ghi Issue dựa trên id
    $issue = Issue::findOrFail($id);

    // Xóa bản ghi
    $issue->delete();

    // Chuyển hướng về trang danh sách Issue với thông báo thành công
    return redirect()->route('issues.index')->with('success', 'Issue deleted successfully.');
}
}