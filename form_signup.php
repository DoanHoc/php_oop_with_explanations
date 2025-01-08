<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            font-size: 12px;
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Đăng ký tài khoản</h2>
        <form id="registrationForm" onsubmit="return submit()" method="POST" action="submit.php">
            <div class="form-group">
                <label for="name">Họ và Tên</label>
                <input type="text" id="name" name="name" placeholder="Nhập họ và tên" required>
                <span id="nameError" class="error-message"></span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email" required>
                <span id="emailError" class="error-message"></span>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                <span id="passwordError" class="error-message"></span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Xác nhận mật khẩu</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Xác nhận mật khẩu" required>
                <span id="confirmPasswordError" class="error-message"></span>
            </div>

            <button type="submit">Đăng ký</button>
        </form>
    </div>
</body>

</html>
<script>
    function validateForm() {
        // Lấy giá trị từ các trường input
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        let isValid = true;

        // Reset thông báo lỗi
        document.getElementById('nameError').style.display = 'none';
        document.getElementById('emailError').style.display = 'none';
        document.getElementById('passwordError').style.display = 'none';
        document.getElementById('confirmPasswordError').style.display = 'none';

        // Kiểm tra trường tên
        if (name === '') {
            document.getElementById('nameError').innerText = 'Tên không được để trống.';
            document.getElementById('nameError').style.display = 'inline';
            isValid = false;
        }

        // Kiểm tra trường email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === '' || !emailPattern.test(email)) {
            document.getElementById('emailError').innerText = 'Vui lòng nhập email hợp lệ.';
            document.getElementById('emailError').style.display = 'inline';
            isValid = false;
        }

        // Kiểm tra trường mật khẩu
        if (password === '') {
            document.getElementById('passwordError').innerText = 'Mật khẩu không được để trống.';
            document.getElementById('passwordError').style.display = 'inline';
            isValid = false;
        } else if (password.length < 6) {
            document.getElementById('passwordError').innerText = 'Mật khẩu phải có ít nhất 6 ký tự.';
            document.getElementById('passwordError').style.display = 'inline';
            isValid = false;
        }

        // Kiểm tra xác nhận mật khẩu
        if (confirmPassword !== password) {
            document.getElementById('confirmPasswordError').innerText = 'Mật khẩu xác nhận không khớp.';
            document.getElementById('confirmPasswordError').style.display = 'inline';
            isValid = false;
        }
        return isValid;
    }
    function submit(){
        if(validateForm()){
            document.getElementById("registrationForm").submit;
        }
    }
</script>