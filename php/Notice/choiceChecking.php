<?php
    header('Access-Control-Allow-Origin: *');
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<?php
    $QnAID = $_POST['myQnAID'];
    $myMemberID = $_POST['myMemberID'];
    $myReplyID = $_POST['myReplyID'];

    $plusSql = "UPDATE myQnA SET isChoiced='yes' WHERE myMemberID=$myMemberID and myQnAID=$QnAID;";
    $result = $connect -> query($plusSql);

    $plusSql2 = "UPDATE myReply SET great='yes' WHERE myReplyID=$myReplyID;";
    $result2 = $connect -> query($plusSql2);
    
    if ($result) {
        $jsonResult = "good";
    }
    else {
        $jsonResult = "bad"; 
    }
    
    echo json_encode(array("result" => $jsonResult));
?>