<?php
    $_title = 'Questionaire';
    include('header.php');
    include('menu.php');
    require_once('questionairecs.php');

    if(!isLogged()){
        header('Location:index.php');
    }

    if(isset($_POST['submit'])){
        $responses = getUserResponses($_SESSION['userid']);
        foreach($responses as $response) {
            if(isset($_POST[$response['id']]) && $response['response'] != $_POST[$response['id']]) {
                updateResponse($response['id'],$_POST[$response['id']]);
            }
        }
    } else {
        insertNewResponses($_SESSION['userid']);
    }

    $responses = getUserResponses($_SESSION['userid']);

    echo '<div class="info">There are '.getResponsesWithoutResponse($_SESSION['userid']).' responses without response!</div>';
?>

    <span>What is your feeling about the following topics:</span>

<?php
    echo '<form class="fillparent" method="post" action="'.$_SERVER['PHP_SELF'].'">';
    echo '<table class="fillparent"><tr><th>Category</th><th>Topic</th><th>Answer</th></tr>';
    foreach($responses as $response) {
        echo '<tr class="'.($response['response']==0 ? 'responsemissing':'').'"><td>'.$response['category'].'</td><td>'.$response['topic'].'</td><td class="verticalalign">
        <label for="love'.$response['id'].'">Love</label>
        <input type="radio" id="love'.$response['id'].'" name='.$response['id'].' value=1 '
        .($response['response']==1 ? 'checked':'').'>
        <label for="hate'.$response['id'].'">Hate</label>
        <input type="radio" id="hate'.$response['id'].'" name='.$response['id'].' value=2 '
        .($response['response']==2 ? 'checked':'').'></td></tr>';
    }
    echo '</table>';
    echo '<input type="submit" name="submit" id="submit" value="Save">';
    echo '</form>';
?>