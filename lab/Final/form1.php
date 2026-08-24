<?php require_once "form1_process.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>workspace</title>
        <link rel="stylesheet" href="form1.css?v=1">
    </head>
    <body>
         <form class="card" method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
         <header class="card-header">  
         <h6>GET STARTED</h6>
            <h1>Create your workspace</h1>
            <p>Please complete all fields below.</p>
            </header>
 
            <div class="field">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Jane Doe" value="<?= $name ?>">
                <?php if ($nameErr): ?><span class="error"><?= $nameErr ?></span><?php endif; ?>
            </div>
 
            <div class="field">
                <label for="phone">Phone number</label>
                <input type="text" inputmode="numeric" placeholder="01862787757" id="phone" name="phone" value="<?= $phone ?>">
                <?php if ($phoneErr): ?><span class="error"><?= $phoneErr ?></span><?php endif; ?>
            </div>
 
            <div class="field">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" value="<?= $dob ?>">
                <?php if ($dobErr): ?><span class="error"><?= $dobErr ?></span><?php endif; ?>
            </div>
 
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="saha@gmail.com" value="<?= $email ?>">
                <?php if ($emailErr): ?><span class="error"><?= $emailErr ?></span><?php endif; ?>
            </div>
 
            <div class="check">
                <input type="checkbox" id="updates" name="updates" value="yes" <?= ($updates === "yes") ? "checked" : "" ?>>
                <label for="updates">Email me product updates and tips</label>
            </div>
 
            <div class="check">
                <input type="checkbox" id="terms" name="terms" value="yes" <?= ($terms === "yes") ? "checked" : "" ?>>
                <label for="terms">I agree to the Terms & Privacy policy</label>
                <?php if ($termsErr): ?><span class="error"><?= $termsErr ?></span><?php endif; ?>
            </div>
 
            <?php if ($dbErr): ?><span class="error"><?= $dbErr ?></span><?php endif; ?>
 
            <div class="buttons">
                <button type="submit" class="btn-primary">Create workspace</button>
                <button type="reset" class="btn-secondary">Reset</button>
            </div>
        </form>
 
        <?php if ($isValid): ?>
            <section class="card summary">
                <h2>Workspace created successfully</h2>
                <table class="result-table">
                    <tr><td>Full Name</td><td><?= $name ?></td></tr>
                    <tr><td>Phone Number</td><td><?= $phone ?></td></tr>
                    <tr><td>Date of Birth</td><td><?= $dob ?></td></tr>
                    <tr><td>Email Address</td><td><?= $email ?></td></tr>
                </table>
            </section>
        <?php endif; ?>
    </body>
</html>
 