<style>
    html{
        margin: 1rem;
    }
    h1{
        margin-bottom: 2rem;
    }
    ul{
        list-style: none;
        padding: 0 0 1rem 0;
        border-bottom: 1px solid black;
    }
    li{
        display: inline-block;
    }
    li:first-child{
        width: 10rem;
    }
    li:first-child img{
        width: 8rem;
    }
    li:last-child{
        width: 80%;
    }
    h2{
        margin-top: 0;
    }
    a,
    a:visited{
        color: black;
    }
</style>

<h1>Listado de personajes</h1>

<?php foreach ($rowset as $row): ?>

    <ul>
        <li><img src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['nombre'] ?>"></li>
        <li>
            <h2><?php echo $row['nombre'] ?></h2>
            <p><?php echo $row['apellido'] ?></p>
            <p><?php echo $row['edad'] ?></p>
            <p><?php echo $row['equipo'] ?></p>
        </li>
    </ul>

<?php endforeach; ?>
