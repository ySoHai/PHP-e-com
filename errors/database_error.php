<?php include '../Views/header.php'; ?>
<body>
    <div id="main">
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the database.</p>

    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
    </div>
</body>
<?php include '../Views/footer.php'; ?>