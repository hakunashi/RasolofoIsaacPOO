Toutes les motos de type <?php echo $type ?>

<nav>
    <ul>
        <li>
            <a href="./">Toutes les motos</a>
        </li>
    </ul>
</nav>

<ul>
    <?php
        foreach ($motos as $key => $moto) {
    ?>
        <li>
            <p>Marque: <?php echo $moto->getBrand() ?></p>
            <p>Modele: <?php echo $moto->getModel() ?></p>
            <p>Type: <?php echo $moto->getType() ?></p>
            <p>Prix: <?php echo $moto->getPrice() ?> €</p>
            <img src="<?php echo $moto->getImageUrl() ?>" alt="">
        </li>
    <?php
        }
    ?>

</ul>