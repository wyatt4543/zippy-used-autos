<?php include '../view/header.php'; ?>
<main>
    <h2>Add New Vehicle</h2>
    <form action="." method="post" id="add_vehicle_form">
        <input type="hidden" name="action" value="add_vehicle">

        <label>Make:</label>
        <select name="make_id" required>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['make_id']; ?>">
                    <?php echo $make['make_name']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Type:</label>
        <select name="type_id" required>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['type_id']; ?>">
                    <?php echo $type['type_name']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Class:</label>
        <select name="class_id" required>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['class_id']; ?>">
                    <?php echo $class['class_name']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label>Year:</label>
        <input type="number" name="year" min="1900" max="2100" required><br>

        <label>Model:</label>
        <input type="text" name="model" required><br>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vehicle"><br>
    </form>
    <p><a href=".">View Full Vehicle List</a></p>
</main>
<?php include '../view/footer.php'; ?>