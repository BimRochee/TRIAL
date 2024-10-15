<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="{{ url('/create-user') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="consolidator">Consolidator</option>
            <option value="farmer">Farmer</option>
        </select><br><br>
        <button type="submit">Create User</button>
    </form>
</body>
</html>
