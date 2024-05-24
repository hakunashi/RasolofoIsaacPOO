<?php
?>

<form action="" method="post">

    <label for="type">Marque de la moto:</label>
    <input type="text" name="brand" id="brand" value="<?php echo $moto->getBrand() ?>"> <br>
    <label for="type">Modele de la moto:</label>
    <input type="text" name="model" id="model" value="<?php echo $moto->getModel() ?>"> <br>
    <label for="type">Select a Type:</label>
    <select id="type" name="type">
        <option value="Enduro">Enduro</option>
        <option value="Custom">Custom</option>
        <option value="Sportive">Sportive</option>
        <option value="Roadster">Roadster</option>
    </select> <br>
    <label for="price">Prix de la moto:</label>
    <input type="number" min="0" name="price" id="price" value="<?php echo $moto->getPrice() ?>"> <br>
    <input type="submit" value="validé">
</form>