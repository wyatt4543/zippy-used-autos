<footer>
        <hr>

        <nav>
            <?php if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false): ?>
                <p>
                    <?php if ($action !== 'list_vehicles') echo '<a href="index.php?action=list_vehicles">Vehicle Inventory</a> | '; ?>
                    <?php if ($action !== 'show_add_form') echo '<a href="index.php?action=show_add_form">Add Vehicle</a> | '; ?>
                    <?php if ($action !== 'list_makes') echo '<a href="index.php?action=list_makes">Edit Makes</a> | '; ?>
                    <?php if ($action !== 'list_types') echo '<a href="index.php?action=list_types">Edit Types</a> | '; ?>
                    <?php if ($action !== 'list_classes') echo '<a href="index.php?action=list_classes">Edit Classes</a>'; ?>
                </p>
            <?php endif; ?>
        </nav>

        <p>&copy; <?php echo date("Y"); ?> Zippy Used Autos</p>
    </footer>
</body>
</html>