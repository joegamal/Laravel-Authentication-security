<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JWT Auth</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
        }
        input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
        }
        .btn-submit {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .error {
            background: #fee;
            color: #c33;
            padding: 0.75rem;
            border-radius: 6px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            display: none;
        }
        .error.show {
            display: block;
        }
        .token-display {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            display: none;
        }
        .token-display.show {
            display: block;
        }
        .token-label {
            font-size: 0.75rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        .token-value {
            word-break: break-all;
            font-family: monospace;
            font-size: 0.85rem;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Sign In</h2>
        <div class="error" id="error"></div>
        <form id="loginForm">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="you@example.com">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" class="btn-submit">Sign In</button>
        </form>
        <div class="token-display" id="tokenDisplay">
            <div class="token-label">Access Token</div>
            <div class="token-value" id="tokenValue"></div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const errorEl = document.getElementById('error');
            const tokenDisplay = document.getElementById('tokenDisplay');
            const tokenValue = document.getElementById('tokenValue');

            errorEl.classList.remove('show');
            tokenDisplay.classList.remove('show');

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ email, password })
                });

                const data = await response.json();

                if (response.ok) {
                    tokenValue.textContent = data.access_token;
                    tokenDisplay.classList.add('show');
                    document.getElementById('loginForm').reset();
                } else {
                    errorEl.textContent = data.error || 'Login failed';
                    errorEl.classList.add('show');
                }
            } catch (err) {
                errorEl.textContent = 'Network error. Please try again.';
                errorEl.classList.add('show');
            }
        });
    </script>
</body>
</html>