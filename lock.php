<?php
session_start();

// अगर पहले से login है → direct access to protected page
if (isset($_SESSION['unlocked']) && $_SESSION['unlocked'] === true) {
    header("Location: sthvirvishak.php");
    exit();
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $correct  = "sthvirvishak@123";

    if ($password === $correct) {
        // सेट session — अब protected page access मिलेगा
        $_SESSION['unlocked'] = true;
        header("Location: sthvirvishak.php");
        exit();
    } else {
        $error = "Wrong password. Access denied.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Lock — Enter Password</title>
  <style>
    :root { --bg: #0f2027; --bg2:#203a43; --accent:#00c6ff; color-scheme: dark; }
    body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:linear-gradient(135deg,var(--bg),var(--bg2));color:#fff;min-height:100vh;display:flex;flex-direction:column;}
    nav{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;background:rgba(0,0,0,0.35);backdrop-filter:blur(6px)}
    .logo{font-weight:700}
    .nav-links{display:flex;gap:12px}
    .nav-links a{color:#fff;text-decoration:none;font-weight:600}
    .container{max-width:420px;margin:80px auto;padding:28px;background:rgba(255,255,255,0.03);border-radius:12px;box-shadow:0 6px 30px rgba(0,0,0,0.5);text-align:center}
    h1{margin:0 0 14px;font-family:"Great Vibes",cursive;font-size:36px}
    form{margin-top:8px;display:flex;flex-direction:column;gap:12px;align-items:center}
    input[type="password"]{width:100%;padding:12px;border-radius:8px;border:1px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.02);color:#fff;font-size:16px}
    button{cursor:pointer;padding:10px 18px;border-radius:8px;border:none;background:linear-gradient(135deg,#ff5f6d,#ffc371);color:#111;font-weight:700}
    .error{color:#ff8b8b;margin-top:6px}
    .back{display:inline-block;margin-top:12px;color:#fff;text-decoration:none;background:rgba(255,255,255,0.03);padding:8px 12px;border-radius:999px}
    @media(max-width:480px){.container{margin:40px 16px}}
  </style>
</head>
<body>
  <nav>
    <div class="logo">🔒 Secure</div>
    <div class="nav-links">
      <a href="index.html">Home</a>
    </div>
  </nav>

  <main class="container" role="main">
    <h1>Enter Password</h1>
    <p>Protected area — enter password to continue</p>

    <form method="post" autocomplete="off" onsubmit="document.getElementById('submitBtn').disabled=true;">
      <input type="password" name="password" placeholder="Password" required>
      <button id="submitBtn" type="submit">Unlock</button>
    </form>

    <?php if ($error): ?>
      <div class="error"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
    <?php endif; ?>

    <a class="back" href="services.html">⬅ Back</a>
  </main>
</body>
</html>
