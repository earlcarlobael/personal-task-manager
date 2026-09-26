<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f4f4;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #eee;
        }

        .edit {
            color: blue;
            margin-right: 10px;
        }

        .delete {
            color: red;
        }

        .success {
            background: #d4edda;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="btn">
        + Add Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>

        @forelse($tasks as $task)

            <tr>
                <td>{{ $task->task_name }}</td>

                <td>{{ $task->description }}</td>

                <td>{{ $task->status }}</td>

                <td>{{ $task->due_date }}</td>

                <td>

                    <a href="{{ route('tasks.edit', $task) }}"
                       class="edit">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="delete"
                                onclick="return confirm('Delete this task?')">
                            Delete
                        </button>

                    </form>

                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5">
                    No tasks yet.
                </td>
            </tr>

        @endforelse

    </table>

</div>

</body>
</html>
