<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <title>Groupe</title>
</head>
<style>
#div1 {width:100px; height:100px; padding:10px; border:1px solid #aaaaaa;}

#left
{border: 1px solid #aaaa; width: 150px;	float: left }

#right
{border: 1px solid #aaaa; width: 150px;	float: right;}

#container
{width: 580px;	margin: auto;}

p
{font-size: 25px; text-align: center;}
</style>

<script>
function allowDrop(ev) {ev.preventDefault();}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>

<body>
    <main class="main">
        <?php include('../src/sidebar.php'); ?>
        <div id="container">
            <p>Drag and Drop Image into the squares</p>
            <img id="drag1" src="../uploads/soso.jpg" draggable="true" ondragstart="drag(event)" width="100">
            <div id="left">
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <br>
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <br>
            </div>
            <div id="right">
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <br>
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <br>
            </div>
        </div>
    </main>

    
</body>
</html>