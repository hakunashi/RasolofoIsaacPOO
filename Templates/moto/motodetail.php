Detail sur la <?php echo $moto->getBrand() . " " . $moto->getModel()?>

<p>Marque: <?php echo $moto->getBrand() ?></p>
<p>Modele: <?php echo $moto->getModel() ?></p>
<p>Type: <?php echo $moto->getType() ?></p>
<p>Prix: <?php echo $moto->getPrice() ?> €</p>
<img src="<?php echo $moto->getImageUrl() ?>" alt="">