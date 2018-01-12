
<!DOCTYPE html>
<html>
    <head>
        <title>Demo 1</title>
        <meta charset="UTF-8">
    </head>
<body>

<form action="" method="post"><br>
    <br>data ir laikas: 
    <br><input name="date" type="text" value="<?= $values['date'] ?>">
    <br>numeris
    <br><input name="number" type="text" value="<?= $values['number'] ?>">
    <br>atstumas metrais
    <br><input name="distance" type="text" value="<?= $values['distance'] ?>">
    <br>sugaistas laikas
    <br><input name="time" type="text" value="<?= $values['time'] ?>">
    <br>Vardas
    <br><input name="name" type="text" value="<?= $values['name'] ?>">
    <br>Miestas
    
    <br><input name="city" type="text" value="<?= $values['city'] ?>">  
    <input name="id" type="hidden" value="<?= $values['id'] ?>">
    <input name="driverid" type="number" value="<?= $values['driverid'] ?>">

    <br><button>Saugoti</button>
</form>
    <form  method="get">
        <button name="automobiliai"value="">Automobiliai</button>
        <button name="metai">Metai</button>
        <button name="menuo">Menuo</button>
        <button name="home">Home</button>
    </form>

