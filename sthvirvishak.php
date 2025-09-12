<?php
session_start();

// अगर session नहीं है तो redirect कर दो
if (!isset($_SESSION['unlocked']) || $_SESSION['unlocked'] !== true) {
    header("Location: lock.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sthvir Vishak — Protected</title>
  <style>
    body{margin:0;font-family:Inter,system-ui,Arial,sans-serif;background:linear-gradient(135deg,#141e30,#243b55);color:#fff;min-height:100vh}
    nav{display:flex;align-items:center;justify-content:space-between;padding:14px 20px;background:rgba(0,0,0,0.35)}
    .logo{font-weight:700}
    .nav-links a{color:#fff;text-decoration:none;margin-left:12px}
    .wrap{max-width:960px;margin:48px auto;padding:22px;background:rgba(255,255,255,0.03);border-radius:12px}
    h1{margin:0 0 10px}
    p{opacity:0.9}
    .danger{margin-top:18px}
    .logout{display:inline-block;padding:8px 12px;background:linear-gradient(135deg,#ff5f6d,#ffc371);color:#111;border-radius:999px;text-decoration:none;font-weight:700}
  </style>
</head>
<body>
  <nav>
    <div class="logo">🔐 Sthvir Vishak</div>
    <div class="nav-links">
      <a href="index.html">Home</a>
      <a class="logout" href="logout.php">Logout</a>
    </div>
  </nav>

  <main class="wrap">
    <h1>Welcome — Protected Page</h1>
    <p>This page is protected by server-side session. Direct access without correct password is blocked and will redirect to the lock page.</p>

    <!-- यहाँ तुम protected content रख सकते हो -->
    <section>
      <h2>Secret area</h2>
      <p>Only available after unlocking.</p>
    </section>
  </main>
</body>
</html>
