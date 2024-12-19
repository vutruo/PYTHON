<form action="{{ route('issues.update', $issue->id) }}" method="POST">
    @csrf
    @method('POST') <!-- Correct method to PUT -->
    
    <label for="computer_id">Chọn máy tính:</label>
    <select name="computer_id" id="computer_id" required>
        @foreach ($computers as $computer)
            <option value="{{ $computer->id }}" @if($computer->id == $issue->computer_id) selected @endif>{{ $computer->computer_name }}</option>
        @endforeach
    </select>
    
    <label for="reported_by">Người báo cáo:</label>
    <input type="text" name="reported_by" value="{{ $issue->reported_by }}" id="reported_by" required>

    <label for="reported_date">Ngày báo cáo:</label>
    <input type="datetime-local" id="reportedDate" name="reported_date" 
    value="{{ \Carbon\Carbon::parse($issue->reported_date)->format('Y-m-d\TH:i') }}" class="form-control" required>        
    
    <label for="description">Mô tả sự cố:</label>
    <textarea name="description" id="description" required>{{ $issue->description }}</textarea>
    
    <label for="urgency">Mức độ sự cố:</label>
    <select name="urgency" id="urgency" required>
        <option value="Low" @if($issue->urgency == 'Low') selected @endif>Thấp</option>
        <option value="Medium" @if($issue->urgency == 'Medium') selected @endif>Trung bình</option>
        <option value="High" @if($issue->urgency == 'High') selected @endif>Cao</option>
    </select>
    
    <label for="status">Trạng thái:</label>
    <select name="status" id="status" required>
        <option value="Open" @if($issue->status == 'Open') selected @endif>Mới</option>
        <option value="In Progress" @if($issue->status == 'In Progress') selected @endif>Đang xử lý</option>
        <option value="Resolved" @if($issue->status == 'Resolved') selected @endif>Đã giải quyết</option>
    </select>
    
    <button type="submit">Cập nhật</button>
</form>

<style>
    /* Improved CSS Styling for Issue Form */
form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    width: 50%;
    margin: 30px auto;
    font-family: 'Roboto', sans-serif;
}

form h2 {
    text-align: center;
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 20px;
}

form label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
    color: #333;
}

form input,
form select,
form textarea {
    width: 100%;
    padding: 14px;
    margin-bottom: 18px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 1rem;
    background-color: #f9f9f9;
    transition: all 0.3s ease;
}

form input:focus,
form select:focus,
form textarea:focus {
    border-color: #007bff;
    background-color: #fff;
    outline: none;
}

form button {
    background-color: #28a745;
    color: white;
    padding: 14px;
    font-size: 1.1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    transition: all 0.3s ease;
}

form button:hover {
    background-color: #218838;
}

form button:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.6);
}

form .btn-primary {
    margin-top: 30px;
    width: 100%;
}

@media (max-width: 768px) {
    form {
        width: 90%;
    }
}

</style>