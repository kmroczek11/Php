<?php
// if(isset($_GET['liczba1'],$_GET['liczba2'],$_GET['operator'])){
//     if ($_GET['operator'] == '+'){
//         echo($_GET['liczba1'] + $_GET['liczba2']);
//     }elseif($_GET['operator'] == '-'){
//         echo($_GET['liczba1'] - $_GET['liczba2']);
//     }elseif($_GET['operator'] == '*'){
//         echo($_GET['liczba1'] * $_GET['liczba2']);
//     }
// }else{
//     echo("Nie podano liczb lub operatora.");
// }

switch ($_GET['operator']){
    case '+':
    echo($_GET['liczba1'] + $_GET['liczba2']);
    break;
    case '-':
    echo($_GET['liczba1'] - $_GET['liczba2']);
    break;
    case '*':
    echo($_GET['liczba1'] * $_GET['liczba2']);
    break;
    default:
    echo("Zły operator.");
}
?>