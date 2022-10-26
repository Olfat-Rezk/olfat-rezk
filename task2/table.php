<?php
// dynamic table => 3 levels only
// dynamic rows //4
// dynamic columns // 4
// check if gender of user == m ==> male // 1
// check if gender of user == f ==> female // 1

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running',
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        // 'phones'=>"0123123",
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        // 'phones'=>"2345",
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        // 'phones'=>"",
    ]
];
$user1 = $users[1];
print_r($user1);
////foreach ($users as $key=>$value){
//    print_r($users[0]- );
//
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <!--    --><?php //foreach ($users As $user ){?>


        <h2> Table</h2>
        <?php if(!empty($users)){?>
            <table class='table'>
                <thead>
                    <?php foreach($users[0] AS $property=>$value) {
                echo ('<th><?=$probarty?></th>');
                    }?>

                </thead>
                <tbody>
                    <?php foreach ($users as $user) {?>


                    <tr>
                        <td>
                            <?php foreach ($user as $property => $value) {?>
                                <td>
                                   <?php if (gettype($value)=='array' ||gettype($value)=='object') {
                                        foreach ($value AS $keyOrProperty => $arrayOrObjectValue){
                                                                    if($property == 'gender' && $keyOrProperty == 'gender'){
                                                                        if($arrayOrObjectValue == 'm'){
                                                                            $arrayOrObjectValue = 'male';
                                                                        }elseif($arrayOrObjectValue == 'f'){
                                                                            $arrayOrObjectValue = 'female';
                                                                        }
                                                                    }else{
                                                                        echo $arrayOrObjectValue. '  ';
                                                                    }
                                        }
                                        
                                    }
                                }?>

                        </td>

                    </tr>
                <?php }?>
                
            </table>
           
        <?php }?>



</body>

</html>