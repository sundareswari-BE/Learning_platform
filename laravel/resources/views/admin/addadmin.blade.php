<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Form</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        h4 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #333;
            text-align: center;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 6px;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 6px rgba(74, 144, 226, 0.5);
        }

        button {
            background-color: #4a90e2;
            color: #fff;
            border: none;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .error-message {
            color: #f94144;
            font-size: 12px;
            margin-top: -10px;
            margin-bottomx;
            display: none;
        }

        .error-message.active {
            display: block;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
            }

            h4 {
                font-size: 20px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="{{ $data['url'] }}" method="post">
            <h4>{{ $data['title'] }}</h4>
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $data['name']) }}">
            @error('name')
                <div class="error-message active">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $data['email']) }}">
            @error('email')
                <div class="error-message active">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ old('password', $data['password']) }}">
            @error('password')
                <div class="error-message active">{{ $message }}</div>
            @enderror

            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="">Select role</option>
                <option value="admin" {{ old('role', $data['role']) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="superadmin" {{ old('role', $data['role']) === 'superadmin' ? 'selected' : '' }}>Super Admin</option>
            </select>
            @error('role')
                <div class="error-message active">{{ $message }}</div>
            @enderror

            <button type="submit">{{ $data['button'] }}</button>
        </form>
    </div>
</body>
</html>
