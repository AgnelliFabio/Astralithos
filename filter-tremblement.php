<!--?php
 session_start();
?>

<script src="scripts/script.js"></script>
<form class="formulaireFiltre" action="" method="post">
    <label for="minuteFrom">Entre </label>
    <input type="range" value="0" min="0" max="59" id="minuteFrom" oninput="updateRangeValue('minuteFrom', 'rangeNumberFrom')">
    <input type="number" id="rangeNumberFrom" min="0" name ="minuteFrom" max="59" value="0" oninput="updateNumberValue('rangeNumberFrom', 'minuteFrom')">

    <label for="minuteTo"> minutes et </label> 
    <input type="range" value="1" min="1" max="60" id="minuteTo" oninput="updateRangeValue('minuteTo', 'rangeNumberTo')">
    <input type="number" id="rangeNumberTo" min="1" name ="minuteTo" max="60" value="1" oninput="updateNumberValue('rangeNumberTo', 'minuteTo')">

    <label for="submit"> minutes.</label>
    <button class="boutonFiltre" type="submit" name="submit">Filtrer</button>
</form>
?php
if (isset($_POST['minuteFrom'])){
    $_SESSION['minFrom'] = $_POST['minuteFrom'];
    $_SESSION['minTo'] = 25;
}
?>
-->

<?php
 // ----------------------
 // Ce code permet de prendre la valeur de la range et de l'envoyer dans le server dans avoir à recharcger la page
 // ----------------------
?>
<script src="scripts/script.js"></script>
<form id="myForm" class="formulaireFiltre" action="" method="post">
    <label for="minuteFrom">Entre </label>
    <input type="hidden" name="filtre" value="tremblement">
    
    <input type="range" value="0" min="0" max="59" id="minuteFrom" oninput="updateRangeValue('minuteFrom', 'rangeNumberFrom')">
    <input type="number" id="rangeNumberFrom" min="0" name="minuteFrom" max="59" value="0" oninput="updateNumberValue('rangeNumberFrom', 'minuteFrom')">

    <label for="minuteTo"> minutes et </label> 
    <input type="range" value="1" min="1" max="60" id="minuteTo" oninput="updateRangeValue('minuteTo', 'rangeNumberTo')">
    <input type="number" id="rangeNumberTo" min="1" name="minuteTo" max="60" value="1" oninput="updateNumberValue('rangeNumberTo', 'minuteTo')">

    <label for="submit"> minutes.</label>
    <button class="boutonFiltre" type="submit">Filtrer</button>
</form>
